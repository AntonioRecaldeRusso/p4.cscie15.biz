
<h3 id=""><?php echo $tree_title;?></h3>
<div id="username" <?php echo "data-username='".$username."'";?>></div>
<div id="tree_name" <?php echo "data-tree_name='".$tree_name."'";?>></div>

<a href="javascript:history.go(0)"id='restart'>Restart</a>
<form>
<input id="yes" type="radio" name="path" value='1' checked>Yes
<input id="no" type="radio" name="path" value='0' disabled>No
<input type="submit">

<p id="response0"></p>
<p id="response1"></p>
<p id="response2"></p>
<p id="response3"></p>
<p id="response4"></p>
<p id="response5"></p>
<p id="response6"></p>
<p id="response7"></p>
<p id="response8"></p>
<p id="response9"></p>
<p id="response10"></p>
</form>
