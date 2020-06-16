$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

$(window).load(function(){
	// 
});

$(document).on('click', '#btn_send_message', function(e){
	e.preventDefault();
	// console.log(e);
	var v_email = document.getElementById("email");
	var v_message = document.getElementById("message");
	var img_sending = document.getElementById("img_sending");
	var span_sending = document.getElementById("span_sending");
	img_sending.removeAttribute('hidden','');
	span_sending.removeAttribute('hidden','');

	if(validateEmail($('#email').val())){
		if ($('#message').val()) {
			$.ajax({
			type:"POST",
			url:"post/message",
			dataType:'json',
			data: {
				history_id:$('#email').attr('main_id'),
				email:$('#email').val(),
				message:$('#message').val()
			},
			success: function(data)
			{
				console.log("Console: "+data);
				if(data=="success"){
					toastr.success('Message sent');
					$('#email').val("");
					$('#message').val("");
					$('#actt_name').html("");
					img_sending.setAttribute('hidden','');
					span_sending.setAttribute('hidden','');
				}
			},error:function(data){
				toastr.error('Please check your connection','Something went wrong');
				img_sending.setAttribute('hidden','');
				span_sending.setAttribute('hidden','');
	        }});
		}else{
			v_message.focus();
			toastr.error('Message is required');
			img_sending.setAttribute('hidden','');
			span_sending.setAttribute('hidden','');
		}
	}else{
		v_email.focus();
		toastr.error('Please check email recipient');
		img_sending.setAttribute('hidden','');
		span_sending.setAttribute('hidden','');
	}

});

$(document).on('click','.e_accounts',function(){
	console.log($(this).attr('name'));
	$('#actt_name').html($(this).attr('name'));
	$('#email').val($(this).attr('email'));
	$('#email').attr('main_id',$(this).attr('id'));
});