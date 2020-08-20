require("js/custom/home/amount-to-words.js");
require("js/custom/video/webcam.min.js");
require("js/custom/video/capture.js");

class Search{
	searchStudent(ssi_id){
		// console.log("got in searchStudent",ssi_id,stud_year,stud_semester,stud_term);
		
		$.ajax({
		type:"GET",
		url:"search/student",
		dataType:'json',
		data:{
		ssi_id:ssi_id
		},
		success: function(data)
		{
			var i=0;
			console.log("Data:"+data['StudentInfo'][i].fname);
			var $birthday=new Date(data['StudentInfo'][i].birthdate).toDateString();
			$('#stud_birthdate').val($birthday);
			$('#stud_birthplace').val(data['StudentInfo'][i].birthplace);
			$('#stud_gender').val(data['StudentInfo'][i].gender);
			$('#stud_civ_status').val(data['StudentInfo'][i].civ_status);
			$('#stud_weight').val(data['StudentInfo'][i].weight);
			$('#stud_height').val(data['StudentInfo'][i].height);
			$('#stud_blood_type').val(data['StudentInfo'][i].blood_type);
			$('#stud_religion').val(data['StudentInfo'][i].religion);
			// Sub Stud
			if (data['StudentInfo'][i].suffix==null) {
				$('#stud_fullname').val(data['StudentInfo'][i].fname+
					" "+data['StudentInfo'][i].mname[0]+
					". "+data['StudentInfo'][i].lname);
			}else{
				$('#stud_fullname').val(data['StudentInfo'][i].fname+
					" "+data['StudentInfo'][i].mname[0]+
					". "+data['StudentInfo'][i].lname+
					" "+data['StudentInfo'][i].suffix);
			}
			// Records
			$('#reload-content-records').trigger('click');

			if (data['PromissoryNote'].length !=i)
			{
				var $date_promised = new Date(data['PromissoryNote'][i].pn_date_promised).toDateString();
				var $date_created = new Date(data['PromissoryNote'][i].created_at).toDateString();
				$('#stud_pn_date_filed').val($date_created);
				$('#stud_pn_date_promised').val($date_promised);
				$('#stud_pn_amount_promised').val(data['PromissoryNote'][i].pn_amount_promised).trigger('clicked');
				$('#stud_pn_remarks').val(data['PromissoryNote'][i].pn_remarks);
				$('#stud_suffix').val(data['StudentInfo'][i].suffix);
				$('#stud_pn_amount_promised').trigger('click');
				// Guardian info 
				$('#g_fullname').val(data['PromissoryNote'][i].rep_fullname);
				$('#presented_valid_id').attr('src', data['PromissoryNote'][i].rep_id_presented);
				$('#g_relation').val(data['PromissoryNote'][i].rep_relation);
				$('#g_address').val(data['PromissoryNote'][i].rep_address);
				$('#g_email').val(data['PromissoryNote'][i].rep_email_address);
				$('#g_contact').val(data['PromissoryNote'][i].rep_contact_num);
			}else{
				$('#stud_pn_date_filed').val(" ");
				$('#stud_pn_date_promised').val(" ");
				$('#stud_pn_amount_promised').val(" ");
				$('#stud_pn_amount_promised_words').val(" ");
				$('#stud_pn_remarks').val(" ");
				$('#stud_suffix').val(" ");
				// Guardian info
				$('#g_fullname').val(" ");
				$('#g_pres_id').val(" ");
				$('#presented_valid_id').attr('src', 'images/admin-logo-grey.png');
				$('#g_relation').val(" ");
				$('#g_address').val(" ");
				$('#g_email').val(" ");
				$('#g_contact').val(" ");
				// swal({
				// 	title:"",
				//   	text: "",
		  		//		icon: "info",
				//   	buttons: {cancel: "Close",}
				// });
				toastr["info"]("No Records Found!!!", "Promissory Note Record")
			}
			
		}});
	}
	getTotalbill(ssi_id,stud_year,stud_semester){
		// console.log("got in totalbill",ssi_id,stud_year,stud_semester,stud_term);
		
		$.ajax({
		type:"GET",
		url:"get/totalbill",
		dataType:'json',
		data:{
			ssi_id:ssi_id,
			stud_year:stud_year,
			stud_semester:stud_semester
		},
		success: function(data)
		{
			EBuild.clearChildElements("assessment");
			if (data['totalBill'])
			{
				var $partial=("<h5>Partial payment must be at least <b style='color:red;'>₱ 1,500<b></h5>");
				$("#assessment_status").html($partial);
			}else
			{
				$("#assessment_status").html("");
			}
			console.log("totalbill: "+data['totalBill']);
			console.log("Payments: "+data.Payments);
			console.log("Discount: "+data.Discount);
			var total_bill =data['totalBill']; //(student_bill.billAmount)
			var payment =data['Payments']; //(student_bill.billAmount)
			var discount =0; //(student_bill.billAmount)
			var Prelim_percent =0.45; //(fee_schedule.percent)
			var Midterm_percent =0.65; //(fee_schedule.percent)
			var Pre_final_percent =0.85; //(fee_schedule.percent)
			var Final_percent =1; //(fee_schedule.percent)
			
			var Prelim_breakdown = (Prelim_percent * total_bill)-discount-payment;
			if (Prelim_breakdown<0) {
				Prelim_breakdown=0;
			}
			var Midterm_breakdown = (Midterm_percent * total_bill)-discount-payment-Prelim_breakdown;
			if (Midterm_breakdown<0) {
				Midterm_breakdown=0;
			}
			var Pre_final_breakdown = (Pre_final_percent * total_bill)-discount-payment-Prelim_breakdown-Midterm_breakdown;
			if (Pre_final_breakdown<0) {
				Pre_final_breakdown=0;
			}
			var Final_breakdown = (Final_percent * total_bill)-discount-payment-Prelim_breakdown-Midterm_breakdown-Pre_final_breakdown;
			if (Final_breakdown<0) {
				Final_breakdown=0;
			}
			$('#assess_total_bill').val("₱ "+total_bill.toFixed(2)+" ");
			$('#assess_prelim').val("₱ "+Prelim_breakdown.toFixed(2)+" ");
			$('#assess_midterm').val("₱ "+Midterm_breakdown.toFixed(2)+" ");
			$('#assess_prefi').val("₱ "+Pre_final_breakdown.toFixed(2)+" ");
			$('#assess_final').val("₱ "+Final_breakdown.toFixed(2)+" ");
		}});
	}
	getoldaccounts(ssi_id){
		// console.log("got in oldaccounts",ssi_id);
		$.ajax({
		type:"GET",
		url:"get/oldaccounts",
		dataType:'json',
		data:{
			ssi_id:ssi_id
		},
		success: function(data)
		{
			// document.getElementById('oldaccount_count').innerHTML=data.length;
			EBuild.clearChildElements("old_accounts");
			if (data.length != 0)
			{
				var oldaccount_payable =0;
				for (var i = 0; i < data.length; i++)
				{
					console.log("OLD accounts: "+data[i].totalOld + ": "+(25*data[i].totalOld/100));
					oldaccount_payable += (25*data[i].totalOld/100);//25% of old accounts must be paid
					var $html = (
					'<div class="col-sm-4">'+
                            '<label class="form-label Floating">Year</label>'+
                            '<input type="text" id="old_acount_year_'+i+'" class="form-control" value="'+data[i].school_year+'" readonly>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                            '<label class="form-label">Semester</label>'+
                            '<input type="text" id="old_acount_sem_'+i+'" class="form-control" value="'+data[i].semester+' Semester'+'" readonly>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                            '<label class="form-label">Bill</label>'+
                            '<input type="text" id="old_acount_bill_'+i+'" class="form-control" value="₱ '+data[i].totalOld+'" readonly>'+
                    '</div>'+
                    '<hr>');
					EBuild.addElement("old_accounts", "div", "", "old_division_found","row","","", "",$html);
				}
				var $span_payable=("<h5>Your 25% account payable is <b style='color:red;'>₱ "+oldaccount_payable.toFixed(2)+"<b></h5>");
				EBuild.addElement("old_accounts", "div", "", "account_payable","","","", "",$span_payable);
			}else
			{
				var $html = (
					'<div class="col-sm-12">'+
						'<h5>No Record Found</h5>'+
                    '</div>');
				EBuild.addElement("old_accounts", "div", "", "old_division_not_found","row","","", "",$html);
			}
		}});
	}
	getstdFullname(ssi_id){
		$.ajax({
		type:"GET",
		url:"get/fullname",
		dataType:'json',
		data:{
			ssi_id:ssi_id
		},
		success: function(data)
		{
			if (data[0]!=null) 
			{
				if (data[0].suffix!="null") {
					$('#sub_stud_fullname').val(data[0].fname+" "+
						data[0].mname[0]+". "+
						data[0].lname);
				}else{
					$('#sub_stud_fullname').val(data[0].fname+" "+
						data[0].mname[0]+". "+
						data[0].lname+" "+data[0].suffix);
				}
			}else{
				console.log("Fullname not found");
			}
		}});
	}
	getstdContact(ssi_id){
		$.ajax({
		type:"GET",
		url:"get/contact",
		dataType:'json',
		data:{
			ssi_id:ssi_id
		},
		success: function(data)
		{
			console.log(data)
			$('#sub_stud_contact').val(data);
		}});
	}
	getstdEmail(ssi_id){
		$.ajax({
		type:"GET",
		url:"get/email",
		dataType:'json',
		data:{
			ssi_id:ssi_id
		},
		success: function(data)
		{
			console.log(data)
			$('#sub_stud_email').val(data);
		}});
	}
}

class Promissory{
	add(data){
		console.log(data);
		if (data.sub_g_trans_num && data.sub_g_fullname && data.sub_g_relation&& data.sub_g_amount_digits && data.sub_g_date_promised) {
			swal({
				title: "Are you sure?",
				text: "You want to continue!",
				icon: "warning",
				buttons: true,
				success: true,
			}).then((isContinue) => {
				if (isContinue) {
					$.ajax({
					type:"POST",
					url:"add/promissory",
					dataType:'json',
					data: {
						sub_g_fullname:data.sub_g_fullname,
						sub_g_address:data.sub_g_address,
						sub_g_relation:data.sub_g_relation,
						sub_g_idpres:data.sub_g_idpres,
						sub_g_email:data.sub_g_email,
						sub_g_contact:data.sub_g_contact,
						ssi_id:data.ssi_id,//done
						sub_g_trans_num:data.sub_g_trans_num,
						sub_g_amount_digits:data.sub_g_amount_digits,
						sub_g_date_promised:data.sub_g_date_promised,
						sub_g_semester:data.sub_g_semester,//done
						sub_g_term:data.sub_g_term,//done
						sub_g_sy:data.sub_g_sy,//done
						sub_g_remarks:data.sub_g_remarks
					},
					success: function(data)
					{
						console.log("Console Message!!!: ");
						console.log(data['message']);
						console.log("Console: "+data['exist']);
						if (data['message']) {
							$('#sub_g_trans_num').val("");
							$('#sub_g_fullname').val("");
							$('#sub_g_address').val("");
							$('#sub_g_relation').val("");
							$('#sub_g_idpres').val("");
							$('#sub_g_relation').val("");
							$('#sub_g_email').val("");
							$('#sub_g_contact').val("");
							$('#sub_g_amount_digits').val("");
							$('#sub_g_amount_words').val("");
							$('#sub_g_date_promised').val("");
							$('#sub_g_remarks').val("");
							$('#image-file').attr('src', 'images/camera.png');  // Clear the src
							toastr.success(data['message'],'Promissory Message');
						}

						if(data['exist']){
							toastr.success(data['exist'],'Promissory Message');	
						}
					},error: function(data){
						toastr.error('Smething went wrong :(');
					}});
				}
			});
		}else{
			toastr.warning('Please fill-up the required fields');
		}
	}
	get(data){
		try{
			$.ajax({
			type:"GET",
			url:"get/promissory",
			dataType:'json',
			data: {
				ssi_id:data
			},
			success: function(data)
			{
				console.log(data['PromissoryNote']);
				var $html ='';
				var semester,term;
				for (var i =0; i <=data['PromissoryNote'].length-1; i++) {
					if(data['PromissoryNote'][i].pn_semester=='1'){semester = '1st Semester';}
					else if(data['PromissoryNote'][i].pn_semester=='2'){semester = '2nd Semester';}

					if(data['PromissoryNote'][i].pn_term=='1'){term = 'Prelim';}
					else if(data['PromissoryNote'][i].pn_term=='2'){term = 'Midterm';}
					else if(data['PromissoryNote'][i].pn_term=='3'){term = 'Prefinal';}
					else if(data['PromissoryNote'][i].pn_term=='4'){term = 'Final';}
					let created_at =new Date(data['PromissoryNote'][i].created_at);
					let date_promised =new Date(data['PromissoryNote'][i].pn_date_promised);
					$html +='</tr>'+
					'<th>'+data['PromissoryNote'][i].pn_tracking_num+'</th>'+
	                '<th>'+data['PromissoryNote'][i].pn_amount_promised+'</th>'+
	                '<th>'+data['PromissoryNote'][i].pn_remarks+'</th>'+
	                '<th>'+created_at.getMonth()+"-"+created_at.getDate()+"-"+created_at.getFullYear()+'</th>'+
	                '<th>'+date_promised.getMonth()+"-"+date_promised.getDate()+"-"+date_promised.getFullYear()+'</th>'+
	                '<th>'+data['PromissoryNote'][i].rep_fullname+'</th>'+
	                '<th>'+data['PromissoryNote'][i].rep_relation+'</th>'+
	                '<th>'+semester+'</th>'+
	                '<th>'+term+'</th>'+
	                '<th>'+data['PromissoryNote'][i].pn_school_yr+'</th>'+
	                // '<th><img src="'+data['PromissoryNote'][i].rep_id_presented+'" width="90" height="50"></th>'+
	                // '<th><div class="btn-toolbar"><button type="button" class="btn btn-warning waves-effect">Update</button>'+
	                // '<button type="button" class="btn btn-danger waves-effect">Delete</button></div></th>'+
                	'</tr>';
				}
			    var dtbl = document.getElementById('promissory_table');
			    dtbl.removeAttribute("class");
				$('#promissory_table').dataTable().fnClearTable();
			    $('#promissory_table').dataTable().fnDraw();
			    $('#promissory_table').dataTable().fnDestroy();
				EBuild.appendElement('promissory_list',$html);
				// $('#promissory_table').dataTable();
				/*
					Uncomment for exportable data
				*/ 
				$('#promissory_table').dataTable(
				{	
					dom: 'Bfrtip',
			 	 	buttons: ['copy','csv','print']
			 	 	// buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			 	});
				$('#promissory_table').addClass("table-bordered table-striped table-hover");
			}});
		}catch(e){}
	}
}

class loadStudents{
	extractAll(){
		$.ajax({
		type:"GET",
		url:"load/student",
		dataType:'json',
		success: function(data)
		{	var $suffix ="";
			for (var i = 0; i < data.length; i++) {
				if(data[i].suffix !=null){$suffix = data[i].suffix}
				$('#name').append('<option data-id="'+data[i].ssi_id+'" value="'+data[i].lname+', '+data[i].fname+' '+$suffix+'" class="form-control"></option>');
				$suffix ="";
			};
		}});
	}
}

$(window).load(function(){
	let ls = new loadStudents;
	ls.extractAll();
	$('#promissory_table').dataTable();
});

$(document).ready(function() {
	//Search Student Function
	let search = new Search;
	let modPN = new Promissory;
	var stud_year=   $('#schoolyear option[value="'+$('#sub_g_sy').val()+'"]').data('id');
	var stud_semester=  $('#semester option[value="'+$('#sub_g_semester').val()+'"]').data('id');
	var stud_term=  $('#term option[value="'+$('#sub_g_term').val()+'"]').data('id');
	var ssi_id=  $('#name option[value="'+$('#student_name').val()+'"]').data('id');
	
	$(document).on('change', 'input[name=sub_g_sy]', function(){stud_year=  $('#schoolyear option[value="'+$('#sub_g_sy').val()+'"]').data('id'); console.log(stud_year);});
	$(document).on('change', 'input[name=sub_g_semester]', function(){stud_semester=  $('#semester option[value="'+$('#sub_g_semester').val()+'"]').data('id'); console.log(stud_semester);});
	$(document).on('change', 'input[name=sub_g_term]', function(){stud_term=  $('#term option[value="'+$('#sub_g_term').val()+'"]').data('id'); console.log(stud_term);});
	$(document).on('change', 'input[name=student_name]', function() {ssi_id=  $('#name option[value="'+$('#student_name').val()+'"]').data('id'); console.log(ssi_id);});
	
	$(document).on('click', '#btn_search_student', function(e) {
		e.preventDefault();
		console.log(ssi_id+" "+stud_year+" "+stud_semester+" "+stud_term);
		if(ssi_id && stud_year && stud_semester && stud_term)
		{
			//Promissory List
			modPN.get(ssi_id);
			//student basic info
			search.searchStudent(ssi_id);
			search.getTotalbill(ssi_id,stud_year,stud_semester);
			search.getoldaccounts(ssi_id);
			// search.getPNCount();
			search.getstdFullname(ssi_id);
			search.getstdContact(ssi_id);
			search.getstdEmail(ssi_id);
		}else{
			// swal({
			// 	title:"Missing attribute",
			//   	text: "",
			//   	buttons: {cancel: "Close"}
			// })
			toastr["warning"]("Check the search content","Missing attribute");
			// toastr.warning('Missing attribute','Please fill-up the required fields');

		}
	});
	$(document).on('click', '#sumbit_promissory', function(e){
		e.preventDefault();
		var data={
			"sub_g_fullname":$('#sub_g_fullname').val(),
			"sub_g_address":$('#sub_g_address').val(),
			"sub_g_relation":$('#sub_g_relation').val(),
			"sub_g_idpres":global_data_uri,
			"sub_g_email":$('#sub_g_email').val(),
			"sub_g_contact":$('#sub_g_contact').val(),
			"ssi_id":ssi_id,//done
			"sub_g_trans_num":$('#sub_g_trans_num').val(),
			"sub_g_amount_digits":$('#sub_g_amount_digits').val(),
			"sub_g_date_promised":$('#sub_g_date_promised').val(),
			"sub_g_semester":stud_semester,//done
			"sub_g_term":stud_term,//done
			"sub_g_sy":$('#sub_g_sy').val(),//done
			"sub_g_remarks":$('#sub_g_remarks').val()
		};
		modPN.add(data);
	});
	// Amount To words
	$(document).on('change || keyup', 'input[id="sub_g_amount_digits"]', function() {
	    console.log(parseFloat($('#sub_g_amount_digits').val()));
	    var $initvalue = parseFloat(document.getElementById('sub_g_amount_digits').value.replace(/,/g,''));
	    console.log($initvalue);
	    var $toeval = $initvalue.toString().split(".");
	    console.log($toeval);
	    var $result = "One: "+$toeval[0];
	    console.log($result);
	    $result = "Two: "+$toeval[1];
	    console.log($result);
	    $('#sub_g_amount_words').val(inWords($toeval[0],$toeval[1])).trigger('focus');
	    $('#sub_g_amount_digits').trigger('focus');
	});
});