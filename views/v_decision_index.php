<h3 id="response">You dropped food on the floor, do you eat it?</h3>

<form>
	<input type="radio" name="path" value='1' checked>Yes
	<input type="radio" name="path" value='0'>No
	<input type="submit">
	
	<p id="response0"></p>
	<p id="response1"></p>
	<p id="response2"></p>
	<p id="response3"></p>	
</form>

<h2>Control Panel</h2>

<!-- These empty divs are where JavaScript will inject the ajax results -->
Number of posts: <div id='post_count'></div><br>
Number of users: <div id='user_count'></div><br>
Most recent post: <div id='most_recent_post'></div><br>
<button id='refresh-button'>Refresh</button>








