	var counter = 0;
	var path;
	var last_index = "start"; console.log('here ' + last_index);
	var options = {
			
			type: "POST",
			url: "/decision/p_tree",
			beforeSubmit: function() {
				path = $("input[type='radio'][name='path']:checked").val();
			},
			data: {
				index: last_index,
				path: path
			},
			success: function(response) {
			//	var data = $.parseJSON(response);
			//	$("#response" + counter++).html(data['string']);
			//	console.log("index is " + last_index);
				
			//	if (last_index == "start")
			//		last_index = ""
						
			//	last_index = last_index + data['index'];
			//	console.log("after concat " + last_index);
			//	console.log("data index " + data['index']);
				console.log(response);	
			}
	};

	$("form").ajaxForm(options);
