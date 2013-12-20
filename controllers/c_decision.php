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
		
		public function p_tree($index = NULL)
		{
			
			echo $index;
			
		//	echo json_encode($data);
		}
}
?>
	
