<?php
/**
 * 
 * This class manages all processes related to user accounts
 * 
 * @author admin
 *
 */
class users_controller extends base_controller 
{
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Redirects to a page depending on login status
	 */
	public function index() {
		# Make sure this page cannot be accessed when the user is logged in
		if ($this->user)
			Router::redirect('/decision/index');
		
		else
			Router::redirect('/users/login');
	}
	
	/**
	 * Enables view for signup page
	 */
	public function signup()
	{
		# Make sure this page cannot be accessed when the user is logged in
		if ($this->user)
			Router::redirect('/users/index');
	
		# Set up the View
		$this->template->content = View::instance("v_users_signup");
	
		# Set up header files
		$client_files_head = array("/css/style.css", '/css/users_signup.css');
		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		# Set client files in body
		$client_files_body = array('/js/signup.js');
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		
		# Set title
		$this->template->title = 'Sign Up';
		
		# Render
		echo $this->template;
	}
	
	/**
	 * Processes data from signup form
	 */
	public function p_signup()
	{
		# Prepare data array
		$data = Array();	
		
		#Sanitize
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		#Check to see if the username has already been chosen. Usernames must be UNIQUE in the database. If the username is found, set variable to true
		$username_exists = DB::instance(DB_NAME)->select_field("SELECT username FROM users WHERE username = '".$_POST['username']."'");
		if ($username_exists)
		{
			$username_exists = TRUE;
			$data['username_error'] = 'Username already exists.';
		}
		
		$password_error = FALSE;					// holds until tested wrong
		
		#check for password match
		if ($_POST['password'] != $_POST['password2'])
		{
			$password_error = TRUE;
			$data['password_error'] = 'Password missmatch.';
		}
		
		# Ensure password length is at least 6 chars
		if (strlen($_POST['password']) < 6)
		{
			if (isset($data['password_error']))
			{
				$password_error = TRUE;
				$data['password_error'] = $data['password_error'].' Password too short';
			}
			else 
			{
				$password_error = TRUE;
				$data['password_error'] = 'Password too short';
			}
		}
		
		$empty_field = FALSE;
		#check for empty fields
		foreach ($_POST as $key => $value)
		{
			if ( strlen($value) < 1 )
			{
				$empty_field = TRUE;
				$data['empty_fields_error'] = "All fields are required.";
			}
			
		#check for fields with only the blank character
			if (ltrim($value, ' ') === '')
			{
				$empty_field = TRUE;
				$data['empty_fields_error'] = "All fields are required.";
			}
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
			$data['success'] = TRUE;
		}
		
		#There are errors, display the signup page again, returning the cause
		else
		{
			$data['success'] = FALSE;
		}
		echo json_encode($data);
	}
	
	/**
	 * Enables View for login page
	 */
	public function login() {
		#Make sure logged in users cannot access this page
		if ($this->user)
			Router::redirect('/');
	
		#Set up View
		$this->template->content = View::instance('v_users_login');
	
		#Set title
		$this->template->title = "Login";
	
		#Set header information
		$client_files_head = array('/css/users_login.css');
		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		#Add files to body
		$client_files_body = array('/js/login.js');
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		
		#Display the view
		echo $this->template;
	}
	
	public function p_login() {
		// Prepare our response array.
		$data = Array();
		// Sanitize
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		#Encrypt
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		#Get token from DB
		$q = "SELECT token FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
		$token = DB::instance(DB_NAME)->select_field($q);
		
		#Success
		if($token)
		{
			setcookie('token', $token, strtotime('+1 week'), '/');
			$data['success'] = TRUE;
		}
		else
		{
			$data['error'] = 'Login Failed';
			$data['success'] = FALSE;
		}	
		echo json_encode($data);
		
	}
	
	/**
	 * Logs user out
	 */
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

	/**
	 * Processes navAccess.js. Disables hyperlinks depending on login state
	 */
	public function p_navAccess() {
		$data = Array();
		$data['logged_in'] = FALSE;
		
		if ($this->user)
			$data['logged_in'] = TRUE;
		
		echo json_encode($data);
		
	}






}
?>