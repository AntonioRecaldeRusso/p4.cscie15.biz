	counter = 0;
	index = '';
	last_message = '';

	var options = {
			type: "POST",
			url: "/decision/p_tree2/",
			beforeSend: function() {
				id = $('input[name="path"]:checked').attr('id');
				
				if ($('#no').is(':disabled'))
					$('#no').attr('disabled', false);
				
				if (id == 'yes')
				{
					$('#response' + (counter - 1)).css('background-color', 'lime');
					index = index.concat('1');
				}
					
				else
				{
					$('#response' + (counter - 1)).css('background-color', 'red');
					index = index.concat('0');
				}
			},
			data: {
				username: $('#username').data("username"),
				tree_name: $('#tree_name').data("tree_name")
			},
			success: function(response) {
				var data = $.parseJSON(response);
				 
				if (data['end'] == true)
				{
					$('#response' + (counter - 1)).css('background-color', 'yellow');
					alert("End of branch.\n\n" + last_message);
				}
				
				if (data['link'] != null)
						index = data['link'];
					
				
				$("#yes").val('' + index + '1');
				$('#no').val('' + index + '0');
				$('#response' + counter++).html(data['content']);
				last_message = data['content'];  
				console.log(data);
			}
	};

	$("form").ajaxForm(options);
