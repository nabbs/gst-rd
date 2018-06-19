<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	ob_start();
	class dashboard extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->helper('user');
			$this->load->model('jobs_model');
			$this->load->model('companies_model');
			$this->load->library("pagination");
				$this->load->model('user_model');
			
		}
	
		public function index(){
			$userdata = $this->session->userdata('userdata');
			if(empty($userdata)){
				redirect(BASEURL.'/login');
			}

			$data['userdata'] =  $userdata;
			$data["master_title"] = "dashboard";
			$data["master_body"] = "dashboard";
			$this->load->layout('dashboard', $data);
		}
	
		public function changepassword(){
			$userdata = $this->session->userdata('userdata');
			$res_data = $this->input->post();
			$oldpassword = $this->input->post('oldpassword');
			if(!empty($oldpassword)){

				
				$res =  $this->db->select("*")->from('users')->where(array('unencrypted_password'=>$oldpassword, 'id'=>$userdata['id']))
				 ->get()->row_array();
				if($res){


				}
				else{

					 $this->session->set_flashdata('msg', 'Old password doesn\t match');
				}
			}
			$data["master_title"] = "Change Password";
			$data["master_body"] = "changepassword";
			$this->load->layout('userdashboard', $data);
		}
		

		public function all_jobs(){
			$data["userdata"] = $this->session->userdata('userdata');
			if(!empty($data["userdata"])){
			$data['user_jobs'] = get_job_details_by_user_id($data["userdata"]['id']);		
			$data["master_title"] = "All Jobs";
			$data["master_body"] = "all_jobs";
			$this->load->layout('dashboard', $data);
		}else{
			redirect(BASEURL.'/login');
		}
		}


		public function view_job(){
			$id = $this->input->get('id');
			
			$data["userdata"] = $this->session->userdata('userdata');
			if(!empty($data["userdata"])){
			$data['user_jobs'] = get_single_job_byuserid($id);		
			$data["master_title"] = "Job Details";
			$data["master_body"] = "view_job";
			$this->load->layout('dashboard', $data);
			}else{
			redirect(BASEURL.'/login');
		}


		}
		public function new_post(){
			$data["master_title"] = "New Post";
			$data["master_body"] = "new_post";
			$this->load->layout('dashboard', $data);

		}

		public function profile(){
			$data["master_title"] = "My Profile";
			$data["master_body"] = "my_profile";
			$this->load->layout('userdashboard', $data);

		}
		public function check_old_password(){
			$userdata = $this->session->userdata('userdata');
			$data = $this->input->post();
			$data['user_id'] = $userdata['id'];
				if(!empty($data)){
				$res = $this->user_model->check_old_password($data);
					if($res){
						$result['result'] = 'success';
						$result['message'] = 'password matched';
					}
					else{
						$result['result'] = 'error';
						$result['message'] = 'please enter right password';
					}
					echo json_encode($result);die;
				}
		}
		public function update_password(){
			$userdata = $this->session->userdata('userdata');
			$data = $this->input->post();
			$data['user_id'] = $userdata['id'];
				if(!empty($data)){
				$res = $this->user_model->update_password($data);
					if($res){
						$result['result'] = 'success';
						$result['message'] = 'password update';
					}
					else{
						$result['result'] = 'error';
						$result['message'] = 'please try again';
					}
					echo json_encode($result);die;
				}

		}
		
	
		
		
		
		
	}	
