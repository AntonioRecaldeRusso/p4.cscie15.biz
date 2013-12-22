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
		
		public function p_tree()
		{
			$index = $_POST['path'];
			
			$bin_arr = array(
					'1'  			=> 'Did anyone see you?',
					'10' 			=> 'Was it sticky?',
					'11' 			=> 'Was it a boss/lover/parent?',
					'100'			=> 'Is it an Emausaurus?',
					'101'			=> 'Is is a raw steak?',
					'110'			=> 'EAT IT!',
					'111'			=> 'Was it expensive?',
					'1000'			=> 'Did the cat lick it?',
					'1001'			=> 'Are you a Megalosaurus?',
					'1010'			=> 'Did the cat lick it?',
					'1011'			=> 'Are you a Puma?',
					'1110'			=> 'Is it bacon?',
					'1111'			=> 'Can you cut off the part that touched the floor?',
					'10000'			=> 'EAT IT',
					'10001'			=> 'Is your cat healthy?',
					'10010'			=> 'DON\'T EAT IT!',
					'10011'			=> 'EAT IT!',
					'10100'			=> 'EAT IT!',
					'10101'			=> 'Is your cat healthy?',
					'10110'			=> 'DON\'T EAT IT!',
					'10111'			=> 'EAT IT!',
					'11100'			=> 'DON\'T EAT IT!',
					'11101'			=> 'EAT IT!',
					'11110'			=> 'YOUR CALL!',
					'100010'		=> 'YOUR CALL!',
					'100011'		=> 'EAT IT!',
					'101010'		=> 'YOUR CALL!',
					'101011'		=> 'EAT IT!'
			);
			
			echo $bin_arr[$index];
		
		}
		
		public function tree($username = NULL, $tree_name = NULL) {
			
			if ($username == NULL || $tree_name == NULL)
				Router::redirect('/decision/');
			
			# Set up the View
			$this->template->content = View::instance('v_decision_tree');
				
			# Set header information
			$client_files_head = array('/js/p_tree2.js');
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
				
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
		
		public function p_tree2()
		{
			$data = Array();
			$path = $_POST['path'];
			
			$q = "SELECT content FROM tree_posts WHERE tree_name = 'children' AND binary_key = '".$path."'";
			$result = DB::instance(DB_NAME)->select_field($q);
			$data['content'] = $result;
			
			if ($result == '')
			{
				$link = "SELECT link FROM tree_posts WHERE tree_name = 'children' AND binary_key = '".$path."'";
				$new_path = DB::instance(DB_NAME)->select_field($link);
				$q = "SELECT content FROM tree_posts WHERE tree_name = 'children' AND binary_key = '".$new_path."'";
				$result = DB::instance(DB_NAME)->select_field($q);
				$data['link'] = $new_path;
				$data['content'] = $result;
			}
			
			echo json_encode($data);
		}
		
/*		public function add_questions() {
			$data = Array();
			
			$data['username'] = $this->user->username;
			$data['tree_name'] = 'children';
			
			$bin_arr = array(
					'0'				=> 'Are you ready for baby #3?',
					'1'				=> 'Do you wish you were more tired?',
					'10'			=> 'Do lots of space in your house?',
					'11'			=> 'Do you like the look of three-row minivans?',
					'100'			=> 'YOU MIGHT NOT BE READY YET!',
					'101'			=> '',
					'110'			=> 'YOU MIGHT NOT BE READY YET!',
					'111'			=> 'Do you really like cleaning?',
					'1110'			=> 'Are you other kids going to help?',
					'1111'			=> 'YES, YOU HAVE WHAT IT TAKES',
					'10000'			=> 'YOU MIGHT NOT BE READY YET',
					'10001'			=> 'STILL, YOU MIGHT NOT BE READY YET!'
			);
			
			foreach ($bin_arr as $key => $value)
			{
				$data['binary_key'] = $key;
				$data['content'] = $value;
				
				if ($value == '')
					$data['link'] = '11';
				else
					unset($data['link']);
				
				DB::instance(DB_NAME)->insert('tree_posts', $data);
			}
			
		} */
		
}
?>
	
