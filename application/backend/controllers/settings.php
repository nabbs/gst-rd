<?php

/*
 * Settings.php
 * Created by : Mr.Gurpreet Singh
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle Admin profile related information
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('config_helper');
		
    }

    /*
     * Settings.php
     * Function :profile
     * Created by : Mr.Gurpreet Singh
     * Created on: 9 Feb,2015
     * Purpose: Function server the edit profile functionality of the admin
     * */
	 
	public function index(){
		$reqData = $this->input->post();

		If(isset($reqData['page_name'])){
			$verify = $this->db->select("id")->from('gp_settings')->where('page_name',$reqData['page_name'])->get()->num_rows();
			if($verify==0){
				$reqData['created'] = time();
				$this->db->insert('gp_settings',$reqData);
			}else{
		
				$reqData['modify'] = time();
				$this->db->where('page_name',$reqData['page_name']);
				$this->db->update('gp_settings',$reqData);
            			
			}
		}
		
		
		$data['results'] = $this->db->select('*')->from('gp_settings')->get()->result_array();
		foreach($data['results'] as $key=>$val){
			
			if($val['page_name']=='home'){
				$data['home'] = $val;
			}
			if($val['page_name']=='flight'){
				$data['flight'] = $val;
			}
			if($val['page_name']=='hotels'){
				$data['hotel'] = $val;
			}
			if($val['page_name']=='car_hire'){
				$data['car_hire'] = $val;
			}
			if($val['page_name']=='holidays'){
				$data['holidays'] = $val;
			}
			if($val['page_name']=='umrah'){
				$data['umrah'] = $val;
			}
			if($val['page_name']=='about'){
				$data['about'] = $val;
			}
			if($val['page_name']=='privacy-policy'){
				$data['privacy'] = $val;
			}
			if($val['page_name']=='cookie'){
				$data['cookie'] = $val;
			}
			if($val['page_name']=='support'){
				$data['support'] = $val;
			}
			if($val['page_name']=='footer'){	
              $data['meta_description'] = $val['meta_description'];				
				$data['footer'] = $val['analytic_code'];			
			}
			if($val['page_name']=='hajj'){				
				$data['hajj'] = $val;			
			}
		}
		
		$data["master_title"] = "Page Settings"; 
        $data["master_body"] = "index";   
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  
		
	} 

    public function profile() {
        $postdata = $this->input->post();
        if (isset($postdata) && !empty($postdata)) {
            $usersessiondata = $this->session->userdata('userdata');
            $userdata['first_name'] = $this->input->post('first_name');
            $userdata['last_name'] = $this->input->post('last_name');
            $userdata['email'] = $this->input->post('email');
            $userdata['id'] = $usersessiondata['id'];
            $this->db->where('id', $usersessiondata['id']);
            if ($this->db->update('admins', $userdata)) {
                $this->session->set_userdata('userdata', $userdata);
                $data['update'] = 'successful';
            }
        }
        $data["master_title"] = "Profile panel";   // Please enter the title of page......
        $data["master_body"] = "profile";   // Please enter the body of page......
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  // Loading theme		
    }

    /*

     * Settings.php
     * Function :Change Password
     * Created by : Mr.Gurpreet Singh
     * Created on: 9 Feb,2015
     * Purpose: Function server the change password functionality for admin
     * */

    public function changepassword() {

        $postdata = $this->input->post();
        if (isset($postdata) && !empty($postdata)) {
            $usersessiondata = $this->session->userdata('userdata');
            $password = $this->db->select('*')->from('admins')->where(array('id' => $usersessiondata['id']))->get()->result();
            $password = $password[0]->password;
            if ($password == md5($this->input->post('old_password'))) {
                $userdata['password'] = md5($this->input->post('new_password'));
                $userdata['id'] = $usersessiondata['id'];
                $this->db->where('id', $usersessiondata['id']);
                if ($this->db->update('admins', $userdata)) {
                    $data['update'] = 'successful';
                }
            } else {
                $data['update'] = 'wrong_old_pass';
            }
        }
	
        $data["master_title"] = "Change password";   // Please enter the title of page......
        $data["master_body"] = "changepassword";   // Please enter the body of page......
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  // Loading theme 
    }
	
	
	/* public function system_settings(){
		$userdata['userdata'] = $this->session->userdata('userdata');
		
		$this->load->model('profile_model');
		
		$userdata['form_data'] = $this->input->post();
		
		if(!empty($userdata['form_data'])){
		$response = $this->profile_model->insert_settings($userdata);
		
			if(!empty($response)){
				$data['default_setting'] = $this->profile_model->default_settings($userdata['userdata']['id']);
				$data["master_title"] = "System Settings"; 
                $data['msg'] = "Successfully updated";					
				$data["master_body"] = "system_settings";
                $this->load->theme('mainlayout', $data);
			}
			else{
				$data['default_setting'] = $this->profile_model->default_settings($userdata['userdata']['id']);
				$data["master_title"] = "System Settings";
                $data['msg'] = "There is an error to update system settings";				
				$data["master_body"] = "system_settings"; 
               	$this->load->theme('mainlayout', $data);
			}
			
		}
		$data['default_setting'] = $this->profile_model->default_settings($userdata['userdata']['id']);
        $data["master_title"] = "System Settings";  
        $data["master_body"] = "system_settings";   
        $this->load->theme('mainlayout', $data);
		
		
	} */
	
	public function edit_mandrill(){
		$this->load->model('user_model');
		$post_data = $this->input->post();
		if(!empty($post_data)){
		$response = $this->user_model->edit_configdata($post_data);
		if($response){
				$result['result'] = 'success';
				$result['message'] = 'Updated Successfully';
				echo json_encode($result);
                die;
				}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some problem to update data.Please try again!';
				echo json_encode($result);
                die;
				  
				  }
		}
		 $data["master_title"] = "Edit Mandrill";  
        $data["master_body"] = "edit_mandrill";   
        $this->load->theme('mainlayout', $data);
		
		
		}
		
		
		public function edit_amazon(){
		$this->load->model('user_model');
		
		$post_data = $this->input->post();
		if(!empty($post_data)){
		 $response = $this->user_model->edit_configdata($post_data);
		if($response){
				$result['result'] = 'success';
				$result['message'] = 'Updated Successfully';
				echo json_encode($result);
                die;
				}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some problem to update data.Please try again!';
				echo json_encode($result);
                die;
				  
				  } 
		}
		$data["master_title"] = "Edit Amazon";  
        $data["master_body"] = "edit_amazon";   
        $this->load->theme('mainlayout', $data);
		
		
		}
		
		
		public function edit_sendgrid(){
		$this->load->model('user_model');
		
		$post_data = $this->input->post();
		if(!empty($post_data)){
	    $response = $this->user_model->edit_configdata($post_data);
		 if($response){
				$result['result'] = 'success';
				$result['message'] = 'Updated Successfully';
				echo json_encode($result);
                die;
				}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some problem to update data.Please try again!';
				echo json_encode($result);
                die;
				  
				  }  
		}
		 $data["master_title"] = "Edit Sendgrid";  
        $data["master_body"] = "edit_sendgrid";   
        $this->load->theme('mainlayout', $data);
		
		
		}
		
		public function edit_sparkpost(){
		$this->load->model('user_model');
		
		$post_data = $this->input->post();
		if(!empty($post_data)){
		
	    $response = $this->user_model->edit_configdata($post_data);
		 if($response){
				$result['result'] = 'success';
				$result['message'] = 'Updated Successfully';
				echo json_encode($result);
                die;
				}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some problem to update data.Please try again!';
				echo json_encode($result);
                die;
				  
				  }  
		}
		 $data["master_title"] = "Edit Sparkpost";  
        $data["master_body"] = "edit_sparkpost";   
        $this->load->theme('mainlayout', $data);
		
		
		}
	
	public function set_gatway(){
		$this->load->model('user_model');
		$data = $this->input->post();
		$response = $this->user_model->set_default_gatway($data);	
		redirect(BASEURL.'/settings/system_settings');
		
	}
	
	
	
	public function general_settings(){
	
	$reqData = $this->input->post();
		
		
		
		if($reqData){
					
			//$reqData['logo'] = $reqData['logo'];
			//unset($reqData['logo']);
			$this->db->where('id',1);
			$this->db->update('general_setting',$reqData);

		}
		$query = $this->db->select('*');
		$this->db->from('general_setting');
		$this->db->where('id',1);
		$query = $this->db->get();
		
		$data['result'] = $query->row_array();
	
		$data["master_title"] = "General setting";   // Please enter the title of page......
		$data["master_body"] = "system_settings";   // Please enter the body of page......
		$this->load->theme('mainlayout', $data); 
	
	
	
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
