$('#p_signup').click(function() {

		$.ajax({
			type: 'POST',
			url: '/users/p_signup',
			data: {
				username: $('#username').val(),
				password: $('#password').val(),
				password2: $('#password2').val()
			},
			success: function(response) {
				data = $.parseJSON(response);

				if (data['success'] == true)
					document.location.href = '/';

				else
				{
					$('#username_error').html(data["username_error"]);
					$('#password_error').html(data["password_error"]);
					$('#fields_error').html(data["empty_fields_error"]);
				}
					
			
					console.log(data);
			}
		});
	});