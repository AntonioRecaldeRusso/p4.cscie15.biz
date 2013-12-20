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
			if ($_POST['index'] == "start")
				$_POST['index'] = "";
			
			$index = $data['index'] = $_POST['index'].$_POST['path'];
			$bin_arr = array(
					'1'  => 'string1',
					'10' => 'string2',
					'11' => 'string3'
			);
			$data['string'] = $bin_arr[$index];
			
		//	echo json_encode($temp);
			echo $_POST['path'];
			
		}
	}
?>