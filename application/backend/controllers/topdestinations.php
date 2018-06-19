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
class topdestinations extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('user_model');
        
    }

 

    public function index() {
		
		$query = $this->db->select('*');
		$this->db->from('gp_topdestinations');
		$query = $this->db->get();
		$data['results'] = $query->result_array();
		$data["master_title"] = "Top Destinations Lists";   // Please enter the title of page......
		$data["master_body"] = "index";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('topdestinations', $data);  // Loading theme		
    }
	
	
	public function add_new() {	
		$reqData = $this->input->post();
			
		if($reqData){			
			$reqData['created'] = time();
			$reqData['modified'] = time();			
			$this->db->insert('gp_topdestinations',$reqData);
			
			if(isset($reqData['package_logo'])){
				$this->db->where('select_img',$reqData['package_logo']);
				$this->db->delete('gp_temp');				
			}
		}
		
		$data["get_cities"] = $this->db->select('*')->from('gp_places')->where(array('status'=>1))->get()->result_array();	
		
		$data["master_title"] = "Add New Top Destinations";   // Please enter the title of page......
		$data["master_body"] = "add_new";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('topdestinations', $data);  // Loading theme		
    }
	
	
	public function edit($id=null){
		
		
		$query = $this->db->select('*');
		$this->db->from('gp_topdestinations');
		$this->db->where('id',$id);
		$query = $this->db->get();
		
		if($this->input->post()){
			
			$this->db->where('id',$id);
			$this->db->update('gp_topdestinations',$this->input->post());
			redirect(BASEURL.'/topdestinations');
		}
		
		$data['results'] = $query->row_array();
	
		$data["master_title"] = "Edit Top Destinations";   // Please enter the title of page......
		$data["master_body"] = "edit";   // Please enter the body of page......
		$this->load->theme('topdestinations', $data);  // Loading theme	
		
	}
	
	public function delete($id=null){
		
		$this->db->where('id',$id);
		$this->db->delete('gp_topdestinations');
		redirect(BASEURL.'/topdestinations');
		/* redirect(front_base_url.'/hajj'); */
	}
    
	
	public function addplaces($id=null) {
		
		$query = $this->db->select('*');
		$this->db->from('gp_places');
		$query = $this->db->get();
		$data['results'] = $query->result_array();
		
		$reqData = $this->input->post();
		
		if($reqData AND empty($id)){			
			$reqData['created'] = time();
			$reqData['modified'] = time();			
			$this->db->insert('gp_places',$reqData);	
			$this->session->set_flashdata('message_name', '<p class="alert-success text-center gp_white">#'.$reqData['city'].'  Add Successfully!</p>');			
		}
		
		
		if($reqData AND !empty($id)){	
			$this->db->where('id',$id);
			$this->db->update('gp_places',$this->input->post());
			redirect(BASEURL.'/topdestinations/addplaces');
		$this->session->set_flashdata('message_name', '<p class="alert-success text-center gp_white">#'.$reqData['city'].'  Update Successfully!</p>');
		}
		
		if(!empty($id) AND empty($reqData)){
			$query = $this->db->select('*');
			$this->db->where('id',$id);
			$this->db->from('gp_places');
			$query = $this->db->get();			
			$data['city_data'] = $query->row_array();			
		}
		
		

		$data["master_title"] = "Add Places";   // Please enter the title of page......
		$data["master_body"] = "addplaces";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('topdestinations', $data);  // Loading theme		
    }
	
	public function deleteplace($id=null){		
		$this->db->where('id',$id);
		$this->db->delete('gp_places');
		redirect(BASEURL.'/topdestinations/addplaces');
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
