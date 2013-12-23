
<h3 id="tree_title"><?php echo $tree_title;?></h3>
<div id="username" <?php echo "data-username='".$username."'";?>></div><div id="tree_name" <?php echo "data-tree_name='".$tree_name."'";?>></div>

<p id="instructions">Click "Send" to start. Select Yes/No and get your answer</p>

<div id="form_div">
<a href="javascript:history.go(0)" id='restart'>Restart</a>
<form id="radio_form">
<input id="yes" type="radio" name="path" value='1' checked>Yes
<input id="no" type="radio" name="path" value='0' disabled>No
<input type="submit">
</form>
</div>

<div id="responses">

	<p class="branches" id="response0"></p>
	<p class="branches" id="response1"></p>
	<p class="branches" id="response2"></p>
	<p class="branches" id="response3"></p>
	<p class="branches" id="response4"></p>
	<p class="branches" id="response5"></p>
	<p class="branches" id="response6"></p>
	<p class="branches" id="response7"></p>
	<p class="branches" id="response8"></p>
	<p class="branches" id="response9"></p>
	<p class="branches" id="response10"></p>

</div>
