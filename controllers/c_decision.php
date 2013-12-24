<?php
	class decision_controller extends base_controller {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			# Ensure login
			if (!$this->user)
				Router::redirect('/users/login');
			
			#Set up the View
			$this->template->content = View::instance('v_decision_index');
			
			#Set header information
			$client_files_head = array('/css/trees_users.css');
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
			
			#Set body information
			$client_files_body = array();
			$this->template->client_files_body = Utils::load_client_files($client_files_body);
			
			#Set title
			$this->template->title = 'p4.cscie15.biz';
			
			# Build the query to get all the trees
			$q = "SELECT *
			FROM trees_users";
			
			# Execute the query to get all the users.
			# Store the result array in the variable $users
			$trees = DB::instance(DB_NAME)->select_rows($q);
			
			# Pass data to view
			$this->template->content->trees = $trees;
			
			#Render the view
			echo $this->template;
		}	
		
		public function tree($username = NULL, $tree_name = NULL) {
			# Ensure login
			if (!$this->user)
				Router::redirect('/users/login');
			
			# wrong address, redirect
			if ($username == NULL || $tree_name == NULL)
				Router::redirect('/decision/');
			
			# Set up the View
			$this->template->content = View::instance('v_decision_tree');
				
			# Set header information
			$client_files_head = array('/css/decision_tree.css');
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
			
			# Set body information
			$client_files_body = array('/js/p_tree.js');
			$this->template->client_files_body = Utils::load_client_files($client_files_body);
				
			# Set title
			$this->template->title = 'p4.cscie15.biz';
			
			# Get first question for the tree.. or tree title
			$q = "SELECT title FROM trees_users WHERE username = '".$username."' AND tree_name = '".$tree_name."'" ;
			$tree_title = DB::instance(DB_NAME)->select_field($q);
			
			# Pass data
			$this->template->content->username = $username;
			$this->template->content->tree_name = $tree_name;
			$this->template->content->tree_title = $tree_title;
			
			
			#Render the view
			echo $this->template;
		}
		
		public function p_tree($username = NULL, $tree_name = NULL)
		{
			$data = Array();
			$path = $_POST['path'];
			
			# This will pass data to display questions
			$q = "SELECT content FROM tree_posts WHERE username = '".$_POST['username']."' AND tree_name = '".$_POST['tree_name']."' AND binary_key = '".$path."'";
			$result = DB::instance(DB_NAME)->select_field($q);
			$data['content'] = $result;
			
			# if empty, check to see if there is a link variable declared in the database. If so, this question will branch into the linked one.
			if ($result == '')
			{
				$link = "SELECT link FROM tree_posts WHERE username = '".$_POST['username']."' AND tree_name = '".$_POST['tree_name']."' AND binary_key = '".$path."'";
				$new_path = DB::instance(DB_NAME)->select_field($link);
				$q = "SELECT content FROM tree_posts WHERE username = '".$_POST['username']."' AND tree_name = '".$_POST['tree_name']."' AND binary_key = '".$new_path."'";
				$result = DB::instance(DB_NAME)->select_field($q);
				$data['link'] = $new_path;
				$data['content'] = $result;
				
				# If there is no link, it means that this is the end of a branch. Data end will inform this to the .js file.
				if ($new_path == '')
					$data['end'] = true;
			} 
			
			echo json_encode($data);
		}
		
		public function create() {
			# Ensure login
			if (!$this->user)
				Router::redirect('/users/login');
				
			#Set up the View
			$this->template->content = View::instance('v_decision_create');
						
			#Set header information
			$client_files_head = array('/css/decision_create.css');
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
						
			#Set body information
			$client_files_body = array('/js/p_create.js');
			$this->template->client_files_body = Utils::load_client_files($client_files_body);
				
			#Set title
			$this->template->title = 'Create';
				
			#Render the view
			echo $this->template;
		}
		
		public function p_create() {		
			$data = Array();
			$data['error'] = '';
			
			# Sanitize
			$_POST = DB::instance(DB_NAME)->sanitize($_POST);
			
			# Check to see if database name already exists for this user. The same user cannot have two trees with the same name
			$tree_name_exists = DB::instance(DB_NAME)->select_field("SELECT tree_name FROM tree_posts WHERE username = '".$this->user->username."' AND tree_name = '".$_POST['tree_name']."'");                        
			if ($tree_name_exists)
			{
				$data['error'] = ' Tree name already exists.';
			}
			
			if (!isset($_POST['tree_name']) || empty($_POST['tree_name']))
				$data['error'] .= " Tree name must be provided.";
				
			if (!isset($_POST['tree_title']) || empty($_POST['tree_title']))
				$data['error'] .= " Tree title must be provided.";
			
			if (!isset($_POST['1']) || empty($_POST['1']))
				$data['error'] .= " Text field 1 cannot be empty.";
			
			if (!isset($_POST['10']) || empty($_POST['10']))
				$data['error'] .= " Text field 10 cannot be empty.";
			
			if (!isset($_POST['11']) || empty($_POST['11']))
				$data['error'] .= " Text field 11 cannot be empty.";
			
			# If data error is an empty string, it means there are no erros. So proceed to interacting with the database
			if ($data['error'] == "")
			{	
				# First, prepare the data, and insert into trees_users info related to authorship and name of tree.
				$row_data2 = Array();
				$row_data2['title'] = $_POST['tree_title'];
				$row_data2['username'] = $this->user->username;
				$row_data2['tree_name'] = $_POST['tree_name'];
				
				DB::instance(DB_NAME)->insert_row('trees_users', $row_data2);
				
				# There will be inserts within a loop. Unsetting undesired data so that they are not part of the operation.
				$tree_name = $_POST['tree_name'];			// this is still needed, save it here.
				$tree_title = $_POST['tree_title'];			// ..same
				unset($_POST['tree_name']);
				unset($_POST['tree_title']);
				
				# Unsetting all empty variables
				foreach ($_POST as $key=>$value)
				{
					if(empty($_POST[$key]))
						unset($_POST[$key]);
				}
				
				# This foreach loop will insert each row, one at a time.
				foreach ($_POST as $key=>$value)
				{
					$row_data = Array();
					
					# Re-check just in case. Value must not be empty in order to insert
					if ($value == "")
					{
						continue;
					}
					else 
					{ 	# if the first character is "@", this is a link to another question.. thus created 'link' index so it will be passed.
						if (substr($_POST[$key], 0, 1) == '@')
							$row_data['link'] = $_POST[$key];
							
						$row_data['tree_name'] = $tree_name;
						$row_data['username'] = $this->user->username;
						$row_data['binary_key'] = $key;
						$row_data['content'] = $value;
						
						DB::instance(DB_NAME)->insert_row('tree_posts', $row_data);
					}				
					
				} 
			} 
			echo json_encode($data);
		
		}
}
?>
	
