/**
 * This file uses ajax to dynamically display content on the decision tree page. The content varies depending on whehter an 
 * answer is YES or NO. Because of issues with passing dynamically update data to php, the updated value is kept into the
 * form's radio buttons value.
 * 
 * While at the end of this project I was able to use a different method, I decided to keep this setup granted that I felt this was a
 * very original solution. 
 * 
 */

$(function() {
	

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
				tree_name: $('#tree_name').data("tree_name"),
			},
			success: function(response) {
				var data = $.parseJSON(response);
				
				
				var objects = Array();
				for (var i = 0; i < data['length']; i++)
				{
					objects['' + data[i]['binary_key']] = data[i];
				}
				
				try {
					
					if (objects[index]["link"])
						index = objects[index]["link"];
					
					var content = objects[index]['content'];
					$('#response' + counter++).html(content);
					last_message = content;
				} catch (err) {
					$('#response' + --counter).css('background-color', 'yellow');
					alert("End of branch.\n" + last_message);
				}
					
			}
	};

	$("form").ajaxForm(options);
	
});