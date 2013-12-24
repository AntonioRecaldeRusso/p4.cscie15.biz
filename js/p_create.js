$('#create_button').click(function() {

	$.ajax({
		type: 'POST',
		url: '/decision/p_create',
		data: {
			tree_name: $('#tree_name').val(),
			tree_title: $('#tree_title').val(),
			1: $('#input-1').val(),
			10: $('#input-10').val(),
			11: $('#input-11').val(),
			100: $('#input-100').val(),
			101: $('#input-101').val(),
			110: $('#input-110').val(),
			111: $('#input-111').val(),
			1000: $('#input-1000').val(),
			1001: $('#input-1001').val(),
			1010: $('#input-1010').val(),
			1011: $('#input-1011').val(),
			1100: $('#input-1100').val(),
			1101: $('#input-1101').val(),
			1110: $('#input-1110').val(),
			1111: $('#input-1111').val(),
			10000: $('#input-10000').val(),
			10001: $('#input-10001').val(),
			10010: $('#input-10010').val(),
			10011: $('#input-10011').val(),
			10100: $('#input-10100').val(),
			10101: $('#input-10101').val(),
			10110: $('#input-10110').val(),
			10111: $('#input-10111').val(),
			11000: $('#input-11000').val(),
			11001: $('#input-11001').val(),
			11010: $('#input-11010').val(),
			11011: $('#input-11011').val(),
			11100: $('#input-11100').val(),
			11101: $('#input-11101').val(),
			11110: $('#input-11110').val(),
			11111: $('#input-11111').val()
		},
		success: function(response) {
			data = $.parseJSON(response);
			$('#error').html(data['error']);
			console.log(data);
		}
	});
});