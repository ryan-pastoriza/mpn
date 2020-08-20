$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$(window).load(function(){
	toastr.options = {
	  "preventDuplicates": true
	}
	// toastr['success'](($('.name').html()).toUpperCase(),"Welcome");
	// Notification Bell
	// $.ajax({
	// 	type:"GET",
	// 	url:"get/notifications",
	// 	dataType:'json',
	// 	data:{},
	// 	success: function(data)
	// 	{
	// 		var html='';
	// 		var notif_count=0;
	// 		// console.log(data);
	// 		for (var i = 0; i < data.length; i++) {
	// 			notif_count+=1;
	// 			html +='<li>'
	// 			+'    <a href="javascript:void(0);" class="waves-effect waves-block a_notif" id="'+data[i].notif_id+'">'
	// 			+'        <div class="icon-circle bg-blue">'
	// 			+'            <i class="material-icons">mode_edit</i>'
	// 			+'        </div>'
	// 			+'        <div class="menu-info">'
	// 			+'			<div class="row">'
	//          	+'				<div class="col-md-1 col-sm-1">'
	//             +'     				<i class="material-icons " >mail_outline</i>'
	//          	+'				</div>'
	//          	+'				<div class="col-md-11 col-sm-11">'
	//             +'     				<b style="top:-100px;">'+data[i].reo_fullname+'</b>'
	//             +'     				<br>'+data[i].rep_email_address
	//          	+'				</div>'
	//          	+'			</div>'
	// 			+'        </div>'
	// 			+'    </a>'
	// 			+'</li>';
	// 		}
	// 		$('#notif_menu').html(html);
	// 		$('#notif_count').html(notif_count);
	// 	}
	// });
	
	// To Message
	var to_send_count=0;
	$.ajax({
	type:"get",
	url:"get/toSendMessage",
	dataType:'json',
	data: {},
	success: function(data)
	{
		// console.log(data);
		for (var i = 0; i < data.length; i++) {
			to_send_count+=1;
			$('.to_mail_list').append('<a href="javascript:void(0);" class="waves-effect waves-block e_accounts" name="'+data[i].rep_fullname+'" id="'+data[i].history_id+'" email="'+data[i].rep_email_address+'">'
	     		+'	<div class="menu-info">'
	     		+'		<p><i class="material-icons">mail_outline</i>'
	     		+'		<b style="top:-100px;">'+data[i].rep_fullname+'</b>'
	     		+'		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+data[i].rep_email_address
	     		+'		</p>'
	     		+'	</div>'
	     		+'</a>'
         		);
		}
		if (to_send_count!=0) {
			$('#email_count1').html(to_send_count);
			$('#email_count2').html(to_send_count);
		}
	},error: function(data){
		// toastr['error'](data,"Error");
	}});
});
$(document).on('click','.a_notif',function(){
	console.log($(this).attr('id'));
});
