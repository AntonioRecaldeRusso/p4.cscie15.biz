/**
 * This file toggles the accessibility to hyperlinks depending on login status
 */

$( document ).ready(function() {
	$.ajax({
		type: 'POST',
		url: '/users/p_navAccess',
		success: function(response) {
			var data = $.parseJSON(response);
			
			// If the user is logged in, disable links
			if (data['logged_in'] == true)			
			{
				$('.logged_off').bind('click', false);
				$('.logged_in').unbind('click', false);
			}
			else
			{
				// user is logged in, enable
				$('.logged_in').bind('click', false);
				$('.logged_off').unbind('click', false);
			}
		}
	});
});