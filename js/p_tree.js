/**
 * This file uses ajax to dynamically display content on the decision tree page. The content varies depending on whehter an 
 * answer is YES or NO. Because of issues with passing dynamically update data to php, the updated value is kept into the
 * form's radio buttons value.
 * 
 * While at the end of this project I was able to use a different method, I decided to keep this setup granted that I felt this was a
 * very original solution. 
 * 
 */

	counter = 0;
	index = '';
	last_message = '';

	var options = {
			type: "POST",
			url: "/decision/p_tree/",
			beforeSend: function() {
				id = $('input[name="path"]:checked').attr('id');				// detect which option was picked
				
				if ($('#no').is(':disabled'))									// "NO" starts disabled.. if here, enable.
					$('#no').attr('disabled', false);
				
				if (id == 'yes')
				{
					// if yes, change the background color question just answered to green
					$('#response' + (counter - 1)).css('background-color', 'lime');
					// update the index... thus, if index was 10... now it's 101. Everytime YES is chosen, it appends a 1.
					index = index.concat('1');
				}
					
				else
				{	
					// color red for questions answersed "NO"
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
				 
				if (data['end'] == true)				// if this is the end of a branch... it means it's the final answer.
				{
					$('#response' + (counter - 1)).css('background-color', 'yellow');
					alert("End of branch.\n\n" + last_message);
				}
				
				/*
				 * if there is a link declared, the new index is that link. Thus, question can connect to other questions.
				 * E.g. If the YES answer to question 1000 links to question 111, then the program will thereon proceed from 111.
				 */
				if (data['link'] != null)				
						index = data['link'];
					
				/*
				 * updating values of radio buttons.. 
				 */
				$("#yes").val('' + index + '1');
				$('#no').val('' + index + '0');
				$('#response' + counter++).html(data['content']);
				last_message = data['content'];  
			}
	};

	$("form").ajaxForm(options);