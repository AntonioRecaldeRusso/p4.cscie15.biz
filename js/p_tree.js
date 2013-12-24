/**
 * This file uses ajax to retrieve data from the database without refresing the page. This data gets placed inside
 * an array based on their 'binary_key' value. Subsequently their content gets printed into the page depending on 
 * the path in which the user is traversing the tree.
 * 
 */

$(function() {
	
	counter = 0;					// used to keep track of which div we want to write content into
	index = '';						// keeps track of current position in the tree
	last_message = '';				// used to print message once the tree has reached an end point.

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
				
				// preparing placeholder for retrieved objects
				var objects = Array();
				
				// store objects in array based on their binary_key
				for (var i = 0; i < data['length']; i++)
				{
					objects['' + data[i]['binary_key']] = data[i];
				}
				
				try {
					// if a link was provided, the new index is this link. This connects the current question to a previous question
					if (objects[index]["link"])
						index = objects[index]["link"];
					
					// attempt to read from objects[index]['content']. If null, it will throw an exception
					var content = objects[index]['content'];
					$('#response' + counter++).html(content);
					last_message = content;								
					
				// if there is an exception, it's the end of the branch. A final answer has been reached.
				} catch (err) {
					$("input[type=submit]").attr("disabled", "disabled");
					$('#response' + --counter).css('background-color', 'yellow');
					alert("End of branch.\n" + last_message);
				}
					
			}
	};

	$("form").ajaxForm(options);
	
});