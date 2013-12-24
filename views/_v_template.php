<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="/js/jquery.form.js"></script>
	<script src="/js/navAccess.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	
	<div id="top">
		<!-- The first php block added for alignment purposes. Set to invisible -->	
		<h1 id="header"><span id="offset_balancer"><?php if (isset($user->username)) echo $user->username; ?></span>Decision Making Tree App!<a id="user_logged"><?php if (isset($user->username)) echo $user->username; ?></a></h1> <br>
			<div id="navbar"> 
		  	<ul> 
			<li><a class="logged_off" href="/users/login">Login</a></li>
			<li><a class="logged_off" href="/users/signup">Signup</a></li>
			<li><a class="logged_in" href="/decision/index">Trees</a></li>
			<li><a class="logged_in" href="/decision/create">Create</a></li>
			<li><a class="logged_in" href="/users/logout">Logout</a></li>
			
		  	</ul> 
		</div>
	</div>



	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>