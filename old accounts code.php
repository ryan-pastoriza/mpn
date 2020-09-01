<?php
function checkoldsys($acctno)
{
	$DB4 = $this->load->database('db4', TRUE);
	$data=array();
	$balance=0;
	$assesstotal=0;
	$discount=0;
	$payment=0;
	$bridgtotal=0;
	$bridgpayment=0;
	$tutortotal=0;

	$query = $DB4->query("SELECT
			enrolled.course,
			enrolled.sem,
			enrolled.sy,
			enrolled.`status`
			FROM
			enrolled
			WHERE
			enrolled.acctno = '{$acctno}'
			ORDER BY
			enrolled.sy ASC,
			enrolled.sem ASC");
	if ($query->num_rows() > 0)
	{
		foreach ($query->result() as $row)
		{
			$course=$row->course;
			$sem=$row->sem;
			$sy=$row->sy;
			$status=$row->status;
			//assessment
			$assesstotal=$this->getamt("SELECT
					Sum(tbl_assessment_copy.amt) as `amt`
				FROM
					tbl_assessment_copy
				WHERE
					tbl_assessment_copy.acctno = '{$acctno}' AND
					tbl_assessment_copy.sy = '{$sy}' AND
					tbl_assessment_copy.sem = '{$sem}'"
			);
			//discount
			$discount=$this->getamt("SELECT
					Sum(tbl_discount2.amt) as `amt`
				FROM
					tbl_discount2
				WHERE
					tbl_discount2.acctno = '{$acctno}' AND
					tbl_discount2.sy = '{$sy}' AND
					tbl_discount2.sem = '{$sem}'"
			);
			//payment
			$payment=$this->getamt("SELECT
					Sum(payment.Amt) AS `amt`
				FROM
					payment
				WHERE
					payment.acctno = '{$acctno}' AND
					payment.SY = '{$sy}' AND
					payment.SEM = '{$sem}' AND
					payment.`MODE` = 'cash'"
			);

			//Add Old Account, Bridging Balance and Tutorial Balance 

			$balance=$assesstotal-$discount-$payment;
			if(strpos($course, "SENIORHIGH") !== false){
				//bridging
				$bridgtotal=$this->getamt("SELECT
						(Sum(tbl_schedule.Total_credit_unit)*(SELECT
							course.Unit
						From
							course
						Where
							course.sy = '{$sy}' AND
							course.sem = '{$sem}' AND
							course.course = '{$course}' AND
							course.`status` = '{$status}' LIMIT 1)) as `amt`
					From
						tbl_stud_load
					INNER JOIN tbl_bridging_subj ON tbl_stud_load.Subject_code = tbl_bridging_subj.Subject_code
					INNER JOIN tbl_schedule ON tbl_stud_load.Subject_code = tbl_schedule.Subject_code
					Where
						tbl_bridging_subj.sem = '{$sem}' AND
						tbl_bridging_subj.sy = '{$sy}' AND
						tbl_stud_load.sem_load = '{$sem}' AND
						tbl_stud_load.yearLoad = '{$sy}' AND
						tbl_stud_load.acctno = '{$acctno}'"
				);
				//bridging payment
				$bridgpayment=$this->getamt("SELECT
						Sum(tbl_bridging_payment.amount) as `amt`
					FROM `tbl_bridging_payment`
					WHERE
						`sem` = '{$sem}' AND
						`sy` = '{$sy}' AND
						`acctno` = '{$acctno}'"
				);
				$bridgtotal=$bridgtotal-$bridgpayment;
			}
			else
			{
				$tutortotal=$this->gettutorial($sy,$sem,$course,$status,$acctno);
			}

			if($balance>0.4 || $bridgtotal>0.4 || $tutortotal>0.4)
			{
				$p1=$this->getpayment($acctno,"assessment",$sy,$sem);
				$p2=$this->getpayment($acctno,"bridging",$sy,$sem);
				$p3=$this->getpayment($acctno,"tutorial",$sy,$sem);
				$balance=$balance-$p1;
				$bridgtotal=$bridgtotal-$p2;
				$tutortotal=$tutortotal-$p3;
				if($balance>0.4 || $bridgtotal>0.4 || $tutortotal>0.4)
				{
					$data[]=array["sy"=>$sy,"sem"=>$sem,"ass"=>$this->checkneg($balance),"bridg"=>$this->checkneg($bridgtotal),"tutorial"=>$this->checkneg($tutortotal)];
				}

			}
		}
	}
	return json_encode($data);
}

function gettutorial($sy,$sem,$course,$status,$acctno)
{
	$DB4 = $this->load->database('db4', TRUE);
	$amt=0;
	$tpu=0;
	$nou=0;
	$rnoe=15;
	$noe=0;
	$pay=0;
	$query1 = $DB4->query("SELECT
		course.Unit
	From
		course
	Where
		course.sy = '{$sy}' AND
		course.sem = '{$sem}' AND
		course.course = '{$course}' AND
		course.`status` = '{$status}'");
	if ($query1->num_rows() > 0)
	{
		foreach ($query1->result() as $row1)
		{
			$tpu=$row1->Unit;
		}
	}
	$query2 = $DB4->query("SELECT
		tbl_schedule.no_of_enrollees,
		tbl_schedule.Total_credit_unit
	From
		tbl_stud_load
	INNER JOIN tbl_tutorial_subj ON tbl_stud_load.Subject_code = tbl_tutorial_subj.Subject_code
	INNER JOIN tbl_schedule ON tbl_stud_load.Subject_code = tbl_schedule.Subject_code
	Where
		tbl_tutorial_subj.sem = '{$sem}' AND
		tbl_tutorial_subj.sy = '{$sy}' AND
		tbl_stud_load.sem_load = '{$sem}' AND
		tbl_stud_load.yearLoad = '{$sy}' AND
		tbl_stud_load.acctno = '{$acctno}'
	Group by tbl_stud_load.Subject_code ");
	if ($query2->num_rows() > 0)
	{
		foreach ($query2->result() as $row2)
		{
			$noe=$row2->no_of_enrollees;
			$nou=$row2->Total_credit_unit;
			$amt=($tpu*$nou*($rnoe-$noe))/$noe;
		}
	}
	$query3 = $DB4->query("SELECT
		Sum(tbl_tut_payment_details.amount) AS `amt`
	From tbl_tutorial_payment
	INNER JOIN tbl_tut_payment_details ON tbl_tutorial_payment.tut_payment_ID = tbl_tut_payment_details.tut_payment_ID
	WHERE
		tbl_tutorial_payment.acctno = '{$acctno}' AND
		tbl_tutorial_payment.sy = '{$sy}' AND
		tbl_tutorial_payment.sem = '{$sem}'");
	if ($query3->num_rows() > 0)
	{
		foreach ($query3->result() as $row3)
		{
			$pay+=$row3->amt;
		}
	}
	if($amt>0)
	{
		$amt=$amt-$pay;
	}
	return round($amt);
}
