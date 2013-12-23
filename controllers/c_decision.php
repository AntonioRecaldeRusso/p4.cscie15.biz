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
			
			$q = "SELECT content FROM tree_posts WHERE username = '".$_POST['username']."' AND tree_name = '".$_POST['tree_name']."' AND binary_key = '".$path."'";
			$result = DB::instance(DB_NAME)->select_field($q);
			$data['content'] = $result;
			
			if ($result == '')
			{
				$link = "SELECT link FROM tree_posts WHERE username = '".$_POST['username']."' AND tree_name = '".$_POST['tree_name']."' AND binary_key = '".$path."'";
				$new_path = DB::instance(DB_NAME)->select_field($link);
				$q = "SELECT content FROM tree_posts WHERE username = '".$_POST['username']."' AND tree_name = '".$_POST['tree_name']."' AND binary_key = '".$new_path."'";
				$result = DB::instance(DB_NAME)->select_field($q);
				$data['link'] = $new_path;
				$data['content'] = $result;
				
				if ($new_path == '')
					$data['end'] = true;
			} 
			
			echo json_encode($data);
		}
		
		public function create() {
			
		}
		
}
?>
	
