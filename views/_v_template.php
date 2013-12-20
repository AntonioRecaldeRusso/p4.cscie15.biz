<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="/js/jquery.form.js"></script>
	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	
	<div id="top">
		<!-- The first php block added for alignment purposes. Set to invisible -->	
		<h1 id="header"><span id="offset_balancer"><?php if (isset($user->username)) echo $user->username; ?></span>DecisionTree<a id="user_logged"><?php if (isset($user->username)) echo $user->username; ?></a></h1> <br>
			<div id="navbar"> 
		  	<ul> 
			<li><a href="/users/login">Login</a></li>
			<li><a href="/decision/stats">Stats</a></li>
			<li><a href="/users/logout">Logout</a></li>
			<li><a href="/decision/index">Trees</a></li> 
		  	</ul> 
		</div>
	</div>



	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>