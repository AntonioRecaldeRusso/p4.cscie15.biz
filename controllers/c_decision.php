<?php
	class decision_controller extends base_controller {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {	
			#Set up the View
			$this->template->content = View::instance('v_decision_index');
			
			#Set header information
			$client_files_head = array('/js/p_tree.js');
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
			
			#Set title
			$this->template->title = 'p4.cscie15.biz';
			
			#Render the view
			echo $this->template;
		}	
		
		public function stats() {
			# Set up the View
			$this->template->content = View::instance("v_decision_stats");
			
			# Set header information
			$client_files_head = array();
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
			
			
				
			#Set title
			$this->template->title = 'p4.cscie15.biz';
				
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
		
		public function tree() {
			#Set up the View
			$this->template->content = View::instance('v_decision_tree');
				
			#Set header information
			$client_files_head = array('/js/p_tree2.js');
			$this->template->client_files_head = Utils::load_client_files($client_files_head);
				
			#Set title
			$this->template->title = 'p4.cscie15.biz';
				
			#Render the view
			echo $this->template;
		}
		
		public function p_tree2($tree_name = null)
		{
			$data = Array();
			$path = $_POST['path'];
			
			$q = "SELECT content FROM tree_posts WHERE username = '".$this->user->username."' AND tree_name = 'test' AND binary_key = '".$path."'";
			$result = DB::instance(DB_NAME)->select_field($q);
			
			
			
			echo $result;
		}
		
		public function add_questions() {
			$data = Array();
			
			$data['username'] = $this->user->username;
			$data['tree_name'] = 'test';
			
			$bin_arr = array(
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
			
			foreach ($binary_array as $key => $value)
			{
				$data['binary_key'] = $key;
				$data['content'] = $value;
				DB::instance(DB_NAME)->insert('tree_posts', $data);
			}
			
		}
		
}
?>
	
