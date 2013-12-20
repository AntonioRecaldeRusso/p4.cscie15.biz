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
					'1'  			=> 'Did anyone see you',
					'10' 			=> 'Was it sticky?',
					'11' 			=> 'Was it a boss/lover/parent?',
					'100'			=> 'Is it an Emausaurus?',
					'101'			=> 'Is is a raw steak?',
					'110'			=> 'EAT IT',
					'111'			=> 'Was it expensive',
					'1000'			=> 'Did the cat lick it',
					'1001'			=> 'Are you a Megalosaurus',
					'1010'			=> 'Did the cat lick it',
					'1011'			=> 'Are you a Puma?'
			);
			
			echo $bin_arr[$index];
		
		}
}
?>
	
