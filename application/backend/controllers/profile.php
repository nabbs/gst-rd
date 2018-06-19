<?php

/*
 * Settings.php
 * Created by : Mr.Gurpreet Singh
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle Admin profile related information
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    /*
     * Settings.php
     * Function :profile
     * Created by : Mr.Gurpreet Singh
     * Created on: 9 Feb,2015
     * Purpose: Function server the edit profile functionality of the admin
     * */
    public function index() {
	   $this->load->model('profile_model');
	   $data['userdata'] = $this->session->userdata("userdata");
	   $id = $data['userdata']['id'];
	   $data['admin_info'] = $this->profile_model->get_admin_info($id);
       $update_data = $this->input->post();	
       if(!empty($update_data)){
	     $update_data['id'] = $data['userdata']['id'];
	     $this->profile_model->update_admin($update_data);
		 $result['result'] = 'success';
		 echo json_encode($result);
         die;
	   }
        $data["master_title"] = "Manage Your Profile";   // Please enter the title of page......
        $data["master_body"] = "profile";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       		
    }
    public function edit_profile() {
	   
	   $this->load->model('profile_model');
	   $data['userdata'] = $this->session->userdata("userdata");
	   $id = $data['userdata']['id'];
	   $data['admin_info'] = $this->profile_model->get_admin_info($id);
       $update_data = $this->input->post();	
       if(!empty($update_data)){
	     $update_data['id'] = $data['userdata']['id'];
	     $this->profile_model->update_admin($update_data);
		 $result['result'] = 'success';
		 echo json_encode($result);
         die;
	   }
        $data["master_title"] = "Manage Your Profile";   // Please enter the title of page......
        $data["master_body"] = "edit_profile";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme             		
    }  
	
	public function update_admin() {
	   
        $data["master_title"] = "Manage Your Profile ";   // Please enter the title of page......
        $data["master_body"] = "profile";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       		
    }
	public function update_profile_image(){
	    $this->load->model("profile_model");
		$userdata=$this->session->userdata("userdata");       
	    $config['upload_path'] ='./assets/profile_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $newFileName = $_FILES['userfile']['name'];
        $fileExt = array_pop(explode(".", $newFileName));		
        $config['file_name'] =  md5(time()).".".$fileExt;
  	  //$this->load->library('upload', $config);
       $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            die;
        } else{
            $data = array('upload_data' => $this->upload->data());
            $userinfo = array();
            $userinfo['image'] = BASEURL.substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];
		    $userinfo['id'] = $userdata['id'];
            $this->profile_model->upload_admin_image($userinfo);
            echo json_encode($userinfo);
            die;	
	       }

     }










	

}
