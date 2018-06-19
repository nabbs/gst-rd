<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hotdeal extends CI_Controller {

    public function __construct() {
        parent::__construct();
		
		  $this->load->model('companies_model');
		  $this->load->helper('user');
    }

    public function index() {
	
	echo "adf";die;
	}
	
	
}


?>