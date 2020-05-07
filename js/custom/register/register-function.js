class Register{
	executeRegistration(data){
		$.ajax({
			type:"GET",
			url:"register",
			dataType:'json',
			data: {				
				user_role:data.role,
				user_username:data.username,
				user_password:data.password,
			},
			success: function(data)
			{
				alert("success");
			}
		});
	}
}

$(document).ready(function() {
	let register = new Register;
	$(document).on('click', '#btn_submit_reg', function(e){
		e.preventDefault();
		var data={
			"role":$('#role').val(),
			"username":$('#username').val(),
			"password":$('#password').val()
		};
		register.executeRegistration(data);
	});
});