<?php

class users_controller extends base_controller 
{
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		# Set up the view
		$this->template->content = View::instance("v_users_index");
	
		# Set header information
	//	$client_files_head = array("/css/users.css");
	//	$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		# Set title
		$this->template->title = "p4.cscie15.biz";
		
		# Render the page
		echo $this->template;
	}
	
	public function signup($username = NULL, $password = NULL, $empty_field = NULL)
	{
		# Make sure this page cannot be accessed when the user is logged in
		if ($this->user)
			Router::redirect('/users/index');
	
		# Set up the View
		$this->template->content = View::instance("v_users_signup");
	
		# Set up header files
		$client_files_head = array("/css/style.css", "/css/popbox.css", "/js/popbox.min.js");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		# Set title
		
		# Pass info to View
		
		# Render
		echo $this->template;
	}
	
	public function p_signup()
	{
		#Sanitize
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		#Check to see if the username has already been chosen. Usernames must be UNIQUE in the database. If the username is found, set variable to true
		$username_exists = DB::instance(DB_NAME)->select_field("SELECT username FROM users WHERE username = '".$_POST['username']."'");
		if ($username_exists)
			$username_exists = true;
		
		#check for password match
		if( $_POST['password'] != $_POST['password2'] || strlen($_POST['password']) < 6)
			$password_error = true;
		else $password_error = false;
		
		#check for empty fields
		$empty_field = false;
		foreach ($_POST as $key => $value)
		{
			if ( strlen($value) < 1 )
				$empty_field = true;
			
		#check for fields with only the blank character
			if (ltrim($value, ' ') === '')
				$empty_field = true;
		}

		#Update the post data in order to inject into database
		$_POST['password']  = sha1(PASSWORD_SALT.$_POST['password']);
		$_POST['token']     = sha1(TOKEN_SALT.$_POST['username'].Utils::generate_random_string());
		unset($_POST['password2']);     //password2 cannot go into the database
		
		#Insert into database if there are no errors or impediments
		if (!$username_exists && !$password_error && !$empty_field)
		{
			$_POST['last_login']   = Time::now();
			DB::instance(DB_NAME)->insert_row('users', $_POST);
			$token = $_POST['token'];
			setcookie('token', $token, strtotime('+1 week'), '/');
			Router::redirect('/users/index');
		}
		
		#There are errors, display the signup page again, returning the cause
		else
			$this->signup($username_exists, $password_error, $empty_field);
	}
	
	public function login() {
		#Make sure logged in users cannot access this page
		if ($this->user)
			Router::redirect('/');
	
		#Set up View
		$this->template->content = View::instance('v_users_login');
	
		#Set title
		$this->template->title = "Login";
	
		#Set header information
//		$client_files_head = array('/css/users_login.css');
//		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		#Display the view
		echo $this->template;
		
	}
	
	public function p_login() {
		#If the user clicked on the register link, redirect...
		if ($_POST['submit'] == "Register")
			Router::redirect('/users/signup');
		
		#Encrypt
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		#Get token from DB
		$q = "SELECT token FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
		$token = DB::instance(DB_NAME)->select_field($q);
		
		#Success
		if($token)
		{
		setcookie('token', $token, strtotime('+1 week'), '/');
		Router::redirect('./index');
		}
		else
		{
		echo "Login Failed!";
		}
	}
	
	public function logout() {
		#Only logged in users can logout
		if (!$this->user)
			Router::redirect('/users/login');
		
		#Change token data so if connected via multiple windows or computers, it logs out on all of them.. among other things
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
		$data = Array('token' =>$new_token);
		DB::instance(DB_NAME)->update('users', $data, 'WHERE user_id ='.$this->user->user_id);
		setcookie('token', '', strtotime('-1 year'), '/');
		Router::redirect('/');
	}








}
?>