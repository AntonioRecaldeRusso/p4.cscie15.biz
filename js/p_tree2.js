	counter = 0;
	index = '';
	path = '';
	username = '';
	tree_name = '';
	
	$(function() {
		username = $('#username').data("username");
		tree_name = $('#tree_name').data("tree_name");
	});
	
	
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
			data: {
				username: username,
				tree_name: tree_name
			},
			success: function(response) {
			var data = $.parseJSON(response);
				 
				if (data['link'] != null)
					{
						index = data['link'];
					}
				
				$("#yes").val('' + index + '1');
				$('#no').val('' + index + '0');
				$('#response' + counter++).html(data['content']);
			}
			
	};

	$("form").ajaxForm(options);
