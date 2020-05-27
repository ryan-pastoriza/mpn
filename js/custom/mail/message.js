$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$(document).on('click', '#btn_send_message', function(e){
	e.preventDefault();
	$.ajax({
	type:"POST",
	url:"post/message",
	dataType:'json',
	data: {
		email:$('#email').val(),
		message:$('#message').val()
	},
	success: function(data)
	{
		console.log("Console: "+data);
	}});
});