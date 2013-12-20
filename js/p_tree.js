	counter = 0;
	index = '';
	path = '';
	var options = {
			type: "POST",
			beforeSend: function() {
				path = $('input[name="path"]:checked').val();
				index = index.concat(path);
			},	
			url: "/decision/p_tree/1",
			data: {
				index: index,
			},
			success: function(response) {
				console.log('response: ' + response);
			}
			
	};

	$("form").ajaxForm(options);
