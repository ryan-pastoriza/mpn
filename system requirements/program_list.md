Assessment

1: Get the total bill
2: Selection Format
	
	SY       -> Format(String)
				->"2018-2019"

	Semester -> Format(Number)
				->1st Semester -> 1
				->2nd Semester -> 2

	Term     -> Format(Number)
				->Prelim  -> 1
				->Midterm -> 2
				->Pre-Fi  -> 3
				->Final   -> 4

3: Computation by Term percentage
	
	Prelim  -> 0.45
	Midterm -> 0.65
	Pre-Fi  -> 0.85
	Final   -> 1

4: Break down
	Prelim  -> amt
	Midterm -> amt
	Pre-Fi  -> amt
	Final   -> amt
	Total = 0.00




	$em_his=EmailHistory::where('history_id','=',$history_id);
            $em_his->message= $message;
            $em_his->status= 'done';
            $em_his->save();