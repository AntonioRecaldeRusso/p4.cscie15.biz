	counter = 0;
	index = '';
	path = '';
	
	var options = {
			type: "POST",
			url: "/decision/p_tree2/",
			beforeSend: function() {
				id = $('input[name="path"]:checked').attr('id');
				
				if ($('#no').is(':disabled'))
					$('#no').attr('disabled', false);
				
				if (id == 'yes')
					index = index.concat('1');
				else
					index = index.concat('0');
			},
			success: function(response) {
				console.log(response);
				$("#yes").val('' + index + '1');
				$('#no').val('' + index + '0');
				$('#response' + counter++).html(response);
				
			}
			
	};

	$("form").ajaxForm(options);
