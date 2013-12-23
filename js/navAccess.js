$( document ).ready(function() {
	$.ajax({
		type: 'POST',
		url: '/users/p_navAccess',
		success: function(response) {
			var data = $.parseJSON(response);
			
			if (data['logged_in'] == true)
			{
				$('.logged_off').bind('click', false);
				$('.logged_in').unbind('click', false);
			}
			else
			{
				$('.logged_in').bind('click', false);
				$('.logged_off').unbind('click', false);
			}
		}
	});
});