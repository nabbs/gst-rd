<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();
	class Post_your_resume extends CI_Controller {
		public function __construct() {
			parent::__construct();
			
		}
		public function index() {
			
			$data['page_title'] = "Home";
			$data['master_body'] = "index";
			$this->load->layout('Post_your_resume',$data);
 		}
	
		
	}	
