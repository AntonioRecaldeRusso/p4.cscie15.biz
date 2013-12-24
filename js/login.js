/**
 * This file ajaxifies the login form...
 */

$('#p_login').click(function() {

		$.ajax({
			type: 'POST',
			url: '/users/p_login',
			data: {
				username: $('#username').val(),
				password: $('#password').val(),
			},
			success: function(response) {
				data = $.parseJSON(response);

				if (data['success'] == true)
					document.location.href = '/';

				else
					$('#response').html('Invalid username:password combination');
				
			}
		});
	});