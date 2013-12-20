	counter = 0;
	index = '';
	path = '';
	var options = {
			type: "POST",
			url: "/decision/p_tree",
			beforeSend: function() {
				path = $('input[name="path"]:checked').val();
				index = index.concat(path);
			},	
			data: {
				index: index
			},
			success: function(response) {
				console.log('response: ' + response);
				console.log('index value: ' + index);
			}
			
	};

	$("form").ajaxForm(options);
