<?php
ob_start();
/*
 * Dashboard.php
 * Created by : Mr.Gurpreet Singh
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle the dashboard the admin and all the data coming over it.
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// require_once(FRONT_BASE_URL.'/en/wp-load.php');
// define('WP_USE_THEMES',TRUE);
class flights extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('user_model');
    }
    public function index() {	
		$query = $this->db->select('flights_id');
		$this->db->from('gp_flights_options');
		$this->db->where('status',1);
		$query = $this->db->get();
		$flights_id = $query->result_array();
		foreach($flights_id as $val){
			$id[] = 	$val['flights_id'];
		}
		if(!empty($id)){
		$query = $this->db->select('*');
		$this->db->from('gp_flights');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		$data['results'] = $query->result_array();	
		}
		/* debug($this->db->last_query());die; */
		$data["master_title"] = "Flights Lists";   // Please enter the title of page......
		$data["master_body"] = "index";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('flights', $data);  // Loading theme		
    }
	public function add_new() {	
		$reqData = $this->input->post();
		$query = $this->db->select('*');
		$this->db->from('gp_flights');
		$query = $this->db->get();
		$data['results'] = $query->result_array();
		if($reqData){		
			$reqData['created'] = time();
			$reqData['modified'] = time();			
			$this->db->insert('gp_flights_options',$reqData);		
		}
		$data["master_title"] = "Add New Flights";   // Please enter the title of page......
		$data["master_body"] = "add_new";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('flights', $data);  // Loading theme		
    }
	public function edit($id=null){
		$query = $this->db->select('*');
		$this->db->from('gp_hajj');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($this->input->post()){
			$this->db->where('id',$id);
			$this->db->update('gp_hajj',$this->input->post());
			redirect(BASEURL.'/flights');
		}
		$data['results'] = $query->row_array();
		$data["master_title"] = "Edit  Flights";   // Please enter the title of page......
		$data["master_body"] = "edit";   // Please enter the body of page......
		$this->load->theme('flights', $data);  // Loading theme	
	}
	public function delete($id=null){
		$this->db->where('flights_id',$id);
		$this->db->delete('gp_flights_options');
		redirect(BASEURL.'/flights');
		/* redirect(front_base_url.'/hajj'); */
	}
	public function save_temp(){
		$reqData = $this->input->post();
		if(isset($reqData['select_img']) && isset($reqData['type']) && empty($reqData['trash'])){
			$res = $this->db->insert('gp_temp',$reqData);
		}
		if(isset($reqData['select_img']) && isset($reqData['type']) && isset($reqData['trash'])){
			$this->db->where('select_img',$reqData['select_img']);
			$res = $this->db->delete('gp_temp');
		}
		if($res){
			$result['result'] = 'success';
			$result['message'] = 'Record Delay Add Successfully!';
		}	
		else{
			$result['result'] = 'error';
			$result['message'] = 'please try again';
		}
		echo json_encode($result);die;
	}
	public function get_save_image(){
		$query = $this->db->select('*');
		$this->db->from('gp_temp');
		$query = $this->db->get();
		$img = $query->result_array();
		$result['result'] = 'success';
			$result['image_name'] = $img[0]['select_img'];
		echo json_encode($result);die;
	}
}