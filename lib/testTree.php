$bin_arr = array(
					'1'  			=> 'Did anyone see you',
					'10' 			=> 'Was it sticky?',
					'11' 			=> 'Was it a boss/lover/parent?',
					'100'			=> 'Is it an Emausaurus?',
					'101'			=> 'Is is a raw steak?',
					'110'			=> 'EAT IT',
					'111'			=> 'Was it expensive',
					'1000'			=> 'Did the cat lick it',
					'1001'			=> 'Are you a Megalosaurus',
					'1010'			=> 'Did the cat lick it',
					'1011'			=> 'Are you a Puma?'
					);
					
					
					
					
						var counter = 0;
	var index = '';
	var path;
	var options = {
			type: "POST",
			url: "/decision/p_tree",
			beforeSubmit: function() {
				path = $('input[name="path"]:checked').val();
			//	console.log("path: " + path);
				index = index.concat(path);
			//	console.log("index" + index);
			},
			success: function(response) {
			//	var data = $.parseJSON(response);
				console.log(response);	
			},
			data: {
				index: index,
			},
	};

	$("form").ajaxForm(options);
					