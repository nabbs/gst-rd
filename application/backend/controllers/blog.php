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
class blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('user_model');
        
    }

 

    public function index() {
		
		$query = $this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('post_type','blog');
		$query = $this->db->get();
		$data['results'] = $query->result_array();
		$data["master_title"] = "All Blogs";   // Please enter the title of page......
		$data["master_body"] = "index";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('blog', $data);  // Loading theme		
    }
	
	
	public function add_new() {	
		$reqData = $this->input->post();
		
		if($reqData){	
			//post_attachment_name
			$reqData['post_title'] = trim($reqData['post_title']);
			$remove_full_stop = str_replace('.','',$reqData['post_title']);
			$reqData['post_slug'] = strtolower(str_replace(' ','-',$remove_full_stop));
			$reqData['post_attachment_name'] = $reqData['package_logo'];
			unset($reqData['package_logo']);			
			$reqData['created'] = time();
			$reqData['modify'] = time();			
			$this->db->insert('blogs',$reqData);
			
			if(isset($reqData['package_logo'])){
				$this->db->where('select_img',$reqData['package_logo']);
				$this->db->delete('gp_temp');				
			}			redirect(BASEURL.'/blog');
		}
		
		$data["master_title"] = "Add New Post";   // Please enter the title of page......
		$data["master_body"] = "add_new";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('blog', $data);  // Loading theme		
    }
	
	
	public function edit($id=null){
		$reqData = $this->input->post();
		
		$query = $this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('id',$id);
		$query = $this->db->get();
		
		if($reqData){
			$reqData['post_title'] = trim($reqData['post_title']);
			$remove_full_stop = str_replace('.','',$reqData['post_title']);
			$reqData['post_slug'] = strtolower(str_replace(' ','-',$remove_full_stop));
					
			$reqData['post_attachment_name'] = $reqData['package_logo'];
			unset($reqData['package_logo']);
			$this->db->where('id',$id);
			$this->db->update('blogs',$reqData);
			redirect(BASEURL.'/blog');
		}
		
		$data['results'] = $query->row_array();
	
		$data["master_title"] = "Edit Hot Deal";   // Please enter the title of page......
		$data["master_body"] = "edit";   // Please enter the body of page......
		$this->load->theme('blog', $data);  // Loading theme	
		
	}
	
	public function delete($id=null){
		
		$this->db->where('id',$id);
		$this->db->delete('blogs');
		redirect(BASEURL.'/blog');
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
	
	
	public function email_subscription(){
		
		$query = $this->db->select('*');
		$this->db->from('gp_subscription');
		$query = $this->db->get();
		$data['results'] = $query->result_array();
	
		
		$data["master_title"] = "Email Subscription";  
		// Please enter the title of page......
		$data["master_body"] = "email_subscription";   
		// Please enter the body of page......
		$this->load->theme('blog', $data);  // Loading theme	
		
	}
	
	
	public function delete_subscription($id=null){
		$this->session->set_flashdata('message_name', '#'.$id.'  Email Subscription Removed!');

		$this->db->where('id',$id);
		$this->db->delete('gp_subscription');
		redirect(BASEURL.'/blog/email_subscription');
		
	}
	
	
}
