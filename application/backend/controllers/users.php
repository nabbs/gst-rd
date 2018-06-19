<?php
	
	/*
		* Settings.php
		* Created by : Mr.Gurpreet Singh
		* Created on: 9 Feb,2015
		* Purpose: File is used to handle Admin profile related information
	* */
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class users extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('user_helper');
			$this->load->model('user_model');
		}
		
		/*
			* Users.php
			* Function :bulkaction
			* Created by : Mr.Gurpreet Singh
			* Created on: 9 Feb,2015
			* Purpose: Function server the edit profile functionality of the admin
		* */
		
		public function get_user_earnings(){
		     
		      $this->load->model('user_model');
			  $this->user_model->get_user_earnings();
		
		}
		
		
		public function bulkaction(){
			$data=$this->input->post();
			
			$this->load->model('user_model');
			if(!empty($data)){
                                if($data['submit']=='Delete'){
		    foreach($data['action'] as $key=>$val){
			$this->delete_User($val);
			 }
			  if($data['page']=='get_user'){
			  redirect(BASEURL.'/users/get_user/0');
			 }else if($data['page']=='index'){
			 redirect(BASEURL.'/users/');
			 }
		   }
				
		    if($data['submit']=='Activate'){
		     $status =1;
		     foreach($data['action'] as $key=>$val){
			    $this->changeStatus_users($status,$val);
			 }
			 if($data['page']=="get_user"){
			 redirect(BASEURL."/users/get_user/1");
			 }else if($data['page']=='index'){
			 redirect(BASEURL.'/users/');
			 }
		  }
				
				if($data['submit']=='Deactivate'){
		     $status =0;
		     foreach($data['action'] as $key=>$val){
			    $this->changeStatus_users($status,$val);
			 }
			 if($data['page']=="get_user"){
	         redirect(BASEURL."/users/get_user/0");
			 }else if($data['page']=='index'){
			 redirect(BASEURL."/users");
			 }
		  }

				if($data['action']=='deactivate'){
					foreach($data['check_user'] as $key=>$val){
						$updatearray['status']=0;
						$this->user_model->updateUserStatus($updatearray,$val);
						$this->session->set_flashdata('success_msg','User Deactivated successfully');
					}
				}
				if($data['action']=='activate'){
					foreach($data['check_user'] as $key=>$val){
						$updatearray['status']=1;
						$this->user_model->updateUserStatus($updatearray,$val);					
						$this->session->set_flashdata('success_msg','User Activated successfully');
					}
				}
				if($data['action']=='delete'){
					foreach($data['check_user'] as $key=>$val){
						$updatearray['isDeleted']=1;
						$this->user_model->updateUserStatus($updatearray,$val);
						$this->session->set_flashdata('success_msg','User Deleted successfully');
					}
				}
			}
			
			redirect(BASEURL."/users");
		}
		
		public function index() {
		
		
			
			
		///	$config["total_rows"] = $this->user_model->getUserAllDataCount();
				
	
			$data["user_data"] = $this->user_model->getUserAllData();	
		
			$data["master_title"] = "Manage Users";   
			$data["master_body"] = "index";  
			$this->load->theme('mainlayout', $data);  // Loading theme       		
		}
		
		public function user_earnings(){
		
			$this->load->library("pagination");
			$this->load->model('user_model');
			$config["base_url"] = base_url()."users/user_earnings?";
		    $config["total_rows"] = $this->user_model->get_user_earnings_count();
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$offset = $this->input->get('offset');
			$offset=!empty($offset)?$offset:'0';
			//$limit=$config["per_page"].",".$offset;
			$config['num_links'] = "5";
			$config["per_page"] = 50;
			$config['full_tag_open'] = '<ul class="pagination">';   
			$config['full_tag_close'] = '</ul>';	
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config["uri_segment"] = 3;
			$config['prev_link'] = ' Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';	
			$config['cur_tag_open'] = '<li class="active"><a href="">';	
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';	
			$config['num_tag_close'] = '</li>';	
			$this->pagination->initialize($config);

			$str_links = $this->pagination->create_links();
			
			
			$this->load->model('user_model');
			$this->load->helper('user_helper');
			$data['earning_data'] = $this->user_model->get_user_earnings($config["per_page"],$offset);
			$data["links"] = explode('&nbsp;',$str_links);
		    $data["master_title"] = "User Earnings";   
			$data["master_body"] = "user_earnings";  
			$this->load->theme('mainlayout', $data);
		
		}
		function outputCSV() {
			$status=$this->input->get("status");
			$filters['status']=$status;
			$search=$this->input->get("search");
			$filters['search']=$search;
			$subscription=$this->input->get("subscription");
			$filters['subscription']=$subscription;
			
			$from=$this->input->get("from");
			$filters['from']=$from;
			$to=$this->input->get("to");
			$filters['to']=$to;
			$this->load->model('user_model');
			$data = $this->user_model->getUserAllDataCSV($filters);
			$filename = "sample";
			header("Content-type: text/csv");
			header("Content-Disposition: attachment; filename={$filename}.csv");
			header("Pragma: no-cache");
			header("Expires: 0");		
			$outputBuffer = fopen("php://output", 'w');
			foreach($data as $key=>$val) {
				if($val['joining']){$val['joining'] =  date('m/d/Y', $val['joining']);}
				fputcsv($outputBuffer, $val);
			}
			fclose($outputBuffer);
		}
		
		public function view_profile($id=NULL){
			$this->load->model('user_model');
			$data["master_title"] = "User Profile Information";   // Please enter the title of page......
			$data["master_body"] = "view_profile";   // Please enter the body of page......
			//$data["user_broker_info"]=$this->user_model->get_users_broker_info($id);
			$data["user_details"]=$this->user_model->get_Users_details($id);
			
		
			$this->load->library('pagination');
			$config=array();
			$config["base_url"] = base_url()."users/view_profile/".$id."/?";	
			/*$config["total_rows"] = $this->user_model->current_user_logs_count($id);	
			
			$config["per_page"] = 25;
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$config['num_links'] = "5";
			$config['full_tag_open'] = '<ul class="pagination">';   
			$config['full_tag_close'] = '</ul>';	
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = ' Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';	
			$config['cur_tag_open'] = '<li class="active"><a href="">';	
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';	
			$config['num_tag_close'] = '</li>';	
			$this->pagination->initialize($config);
			$offset = $this->input->get('offset');	

			//$data["user_logs"]=$this->user_model->current_user_logs($id,$config["per_page"], $offset);
			
					
	         $str_links = $this->pagination->create_links(); 
			
			$data["links"] = explode('&nbsp;',$str_links);
			
			
			
			$data["logins_details"]=$this->user_model->current_user_logins_details($id);*/
			
			
			
			$this->load->theme('mainlayout', $data);  // Loading theme  
			
			
		}	
		
		
		public function view_advance_form($id,$recored_id) {
			$this->load->model('advance_request_form_model');	
			if($recored_id){
				$updatearray["status"]=1;
				$updatearray["id"]=$recored_id;
				$this->advance_request_form_model->update_status_adv($updatearray,$record_id);
			}
			$data['advance_forms'] = $this->advance_request_form_model->get_all_advance_form($id);
			// echo "<pre>";
			// print_r($data['advance_forms']);		
			// echo "</pre>";
			// die;
			$data['ID'] = $id;	
			$data["master_title"] = "Advance Filled Form";
			$data["master_body"] = "advance_view_form";
			$this->load->theme('mainlayout', $data);
		}
		
		public function view_replacement_form($id,$recored_id) {
			$this->load->model('replacement_request_form_model');	
			if($recored_id){
				$updatearray["status"]=1;
				$updatearray["id"]=$recored_id;
				$this->replacement_request_form_model->update_status_rep($updatearray,$record_id);
			}
			$data['request_forms'] = $this->replacement_request_form_model->get_all_replacement_form($id);
			$data['ID'] = $id;	   
			$data["master_title"] = "Replacement Filled Form";
			$data["master_body"] = "replacement_view_form";
			$this->load->theme('mainlayout', $data);
		} 
		public function get_view_form_advance($id=NULL,$ID=NULL){
			$this->load->model('advance_request_form_model');	
			$this->load->helper('user_helper');
			$arr = array("user_id"=>$ID,"id"=>$id);
			$data['advance_form_data'] = $this->advance_request_form_model->view_advance_form($arr);
			$data['ID'] = $ID;
			$data['recored_id'] = $id;
			$form_record = $this->input->post();
			if(!empty($form_record)){
				$form_record['user_id'] = $ID;
				$form_record['id'] = $id;
				$form_record['close_date'] = strtotime($form_record['close_date']) ;			
				$form_record['dilligence_expire'] = strtotime($form_record['dilligence_expire']) ;
				$res = $this->advance_request_form_model->update_advance_form($form_record);
				if($res == "updated"){
					$result['user_id'] = $ID;
					$result['id'] = $id;
					$result['result'] = 'success';
					echo json_encode($result);
					die;
					}else{
					$result['result'] = 'error';
					echo json_encode($result);
					die;
				}
			}
			$data["master_title"] = "Advance Filled Form";
			$data["master_body"] = "view_form_advance";  
			$this->load->theme('mainlayout', $data); 
		}
		
		
		public function get_advance_data($id=NULL,$ID=NULL){
			$this->load->model('advance_request_form_model');	
			$arr = array("user_id"=>$ID,"id"=>$id);
			$data['advance_form_data'] = $this->advance_request_form_model->view_advance_form_data($arr);
			$data['ID'] = $ID;
			$data['recored_id'] = $id;
			$data["master_title"] = "Confirm Advance Filled Form";
			$data["master_body"] = "advance_form_data_view";  
			$this->load->theme('mainlayout', $data); 
		}	
		
		
		
	    public function get_view_form_replacement($id=NULL,$ID=NULL){
			$this->load->model('replacement_request_form_model');	
			$this->load->helper('user_helper');
			$data['request_form_data'] = $this->replacement_request_form_model->view_replacement_form(array("user_id"=>$ID,"id"=>$id));
			$data['ID'] = $ID;
			$data['recored_id'] = $id;
			$form_record = $this->input->post();
			if(!empty($form_record)){
				$form_record['user_id'] = $ID;
				$form_record['id'] = $id;
				$form_record['close_date'] = strtotime($form_record['close_date']) ;			
				$form_record['dilligence_expire'] = strtotime($form_record['dilligence_expire']) ;
				$res = $this->replacement_request_form_model->update_replacement_form($form_record);
				if($res == "updated"){
					$result['user_id'] = $ID;
					$result['id'] = $id;
					$result['result'] = 'success';
					echo json_encode($result);
					die;
					}else{
					$result['result'] = 'error';
					echo json_encode($result);
					die;
				}
			}
			$data["master_title"] = "Replacement Filled Form";
			$data["master_body"] = "view_form_replacement";  
			$this->load->theme('mainlayout', $data); 
		}
		
		public function get_replacement_data($id=NULL,$ID=NULL){
			$this->load->model('replacement_request_form_model');	
			$data['request_form_data'] = $this->replacement_request_form_model->view_replacement_form_data(array("user_id"=>$ID,"id"=>$id));
			$data['ID'] = $ID;
			$data['recored_id'] = $id;
			$data["master_title"] = "Confirm Replacement Filled Form";
			$data["master_body"] = "replacement_form_data_view";  
			$this->load->theme('mainlayout', $data); 
		}	
		
		
		
		
		public function profile($id=null){
			if(empty($id)){
				echo "Invalid Id";die;
			}
			$this->load->model('user_model');
			$this->load->helper('insurance_helper');
			$data["master_title"] = "User Detail";   // Please enter the title of page......
			$data["master_body"] = "profile";   // Please enter the body of page......
			$data["userdata"]=$this->user_model->getUserDetail($id);
			//$data['relation_data']=$this->user_model->getUserRelationData($id);
			$data['relation_data']=$this->user_model->getuserdata($id);
			$this->load->theme('mainlayout', $data);  // Loading theme
		}
		
		public function changeStatus($status=0,$id=0){
			$this->load->model('user_model');
			$updatearray["status"]=$status;
			$statusstring=($status==0)?"Deactivated":"Activated";
			$response=$this->user_model->updateUserStatus($updatearray,$id);
			if($response){
				$this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
				}else{
				$this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
			}
			redirect(BASEURL.'/users/');
		}
		
		public function deleteUser($id=0){
			$this->load->model('user_model');
			$status = $this->user_model->delete_user($id);
			if($status=="true"){
				$this->session->set_flashdata('success_msg','Package deleted successfully');
				/* $result['result'] = 'success';
					echo json_encode($result);
				die;*/
				}else if($status=="false"){
				$this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
				/* $result['result'] = 'failed';
					echo json_encode($result);
				die;	*/		
			}
			redirect(BASEURL.'/users/');
		}
		
		public function change_Status($status=0,$id=0,$ID=NULL){
			$this->load->model('user_model');
			$updatearray["status"]=$status;
			$statusstring=($status==0)?"Deactivated":"Activated";
			$response=$this->user_model->update_advance_Status($updatearray,$id);
			if($response){
				$this->session->set_flashdata('success_msg','The action is performed successfully');
				}else{
				$this->session->set_flashdata('error_msg','Something went wrong . Please try again !');
			}
			redirect(BASEURL.'/users/view_advance_form/'.$ID);
		}
		public function change_Status_replacement($status=0,$id=0,$ID=NULL){
			$this->load->model('user_model');
			$updatearray["status"]=$status;
			$statusstring=($status==0)?"Deactivated":"Activated";
			$response=$this->user_model->update_replacement_Status($updatearray,$id);
			if($response){
				$this->session->set_flashdata('success_msg','The action is performed successfully');
				}else{
				$this->session->set_flashdata('error_msg','Something went wrong . Please try again !');
			}
			redirect(BASEURL.'/users/view_replacement_form/'.$ID);
		}    
		public function delete_adv_form($id=0,$ID=NULL){
			$this->load->model('advance_request_form_model');	
			$status = $this->advance_request_form_model->adv_delete_form($id);
			if($status=="true"){
				$this->session->set_flashdata('success_msg','Form has been deleted successfully');
				}else if($status=="false"){
				$this->session->set_flashdata('error_msg','There is some error deleting the form'); 
			}
			redirect(BASEURL.'/users/view_advance_form/'.$ID);
		}
		public function delete_rep_form($id=0,$ID=NULL){
			$this->load->model('replacement_request_form_model');	
			$status = $this->replacement_request_form_model->rep_delete_form($id);
			if($status=="true"){
				$this->session->set_flashdata('success_msg','Form has been deleted successfully');
				}else if($status=="false"){
				$this->session->set_flashdata('error_msg','There is some error deleting the form'); 	
			}
			redirect(BASEURL.'/users/view_replacement_form/'.$ID);
		}
		public function advance_form($status=NULL){
			$this->load->model('advance_request_form_model');	
			$data['advance_forms'] = $this->advance_request_form_model->get_forms($status);
			$data["master_title"] = "Advance Filled Form";
			$data["master_body"] = "form_advance";  
			$this->load->theme('mainlayout', $data); 
		}
		public function replacement_form($status=NULL){
			$this->load->model('replacement_request_form_model');	
			$data['request_forms'] = $this->replacement_request_form_model->get_forms($status);
			$data["master_title"] = "Replacement Filled Form";
			$data["master_body"] = "form_replacement";  
			$this->load->theme('mainlayout', $data); 
		}
		public function all_recieved_form($token){
			$this->load->model('replacement_request_form_model');	
			$this->load->model('advance_request_form_model');	
			if($token=="advance"){
				$data['advance_forms'] = $this->advance_request_form_model->get_all_forms();	
				$data["master_title"] = "Advance Filled Form";
				$data["master_body"] = "form_advance";  
				$this->load->theme('mainlayout', $data); 
				}else{
				$data['request_forms'] = $this->replacement_request_form_model->get_all_forms();
				$data["master_title"] = "Replacement Filled Form";
				$data["master_body"] = "form_replacement";  
				$this->load->theme('mainlayout', $data); 
			}
		}
		public function all_reimburse_form($token){
			$this->load->model('replacement_request_form_model');	
			$this->load->model('advance_request_form_model');	
			if($token=="advance"){
				$data['advance_forms'] = $this->advance_request_form_model->get_all_reimburse_form();	
				$data["master_title"] = "Advance Reimburse Forms";
				$data["master_body"] = "reimburse_advance";  
				$this->load->theme('mainlayout', $data); 
				}else{
				$data['request_forms'] = $this->replacement_request_form_model->get_all_reimburse_form();
				$data["master_title"] = "Replacement Reimburse Forms";
				$data["master_body"] = "reimburse_replacement";  
				$this->load->theme('mainlayout', $data); 
			}
		}
		
		public function get_all_user() {
						$data["status"]=$status;		
			$this->load->helper('appliedForms_helper');
			$this->load->model('user_model');
	        $this->load->library('pagination');
			$config=array();
			$config["base_url"] = base_url()."users?";	
			$config["total_rows"] = $this->user_model->record_count();	
			$config["per_page"] = 10;
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$config['num_links'] = "5";
			$config['full_tag_open'] = '<ul class="pagination">';   
			$config['full_tag_close'] = '</ul>';	
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = ' Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';	
			$config['cur_tag_open'] = '<li class="active"><a href="">';	
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';	
			$config['num_tag_close'] = '</li>';	
			$this->pagination->initialize($config);
			$offset = $this->input->get('offset');	
			

			$search_parameter = $this->input->get('search');
			if(isset($search_parameter) && !empty($search_parameter)){
				$data["user_data"] = $this->user_model->fetch_data_search($search_parameter,$config["per_page"], $offset);
			}else{

			    $data["user_data"]=$this->user_model->get_allUsers($config["per_page"], $offset);	
			}

			
	        $str_links = $this->pagination->create_links(); 
			
			$data["links"] = explode('&nbsp;',$str_links);		
			
			
			
			$data["master_title"] = "Users List"; 
			$data["master_body"] = "alluser_list";       
			$this->load->theme('mainlayout', $data);    		
		}	
		
		public function change_AdvanceStatus($id=0,$status=0,$ID=NULL){
			$this->load->model('user_model');
			$updatearray["status"]=$status;
			
			$response=$this->user_model->updateFormStatus('advance_request_form',$updatearray,$id);
			if($response){
				$this->session->set_flashdata('success_msg','Form status successfully updated');
				}else{
				$this->session->set_flashdata('error_msg','There is some error ');
			}
			redirect(BASEURL.'/users/view_advance_form/'.$ID);
		}
		
		public function change_ReplacementStatus($id=0,$status=0,$ID=NULL){
			$this->load->model('user_model');
			$updatearray["status"]=$status;
			
			$response=$this->user_model->updateFormStatus('replacement_request_form',$updatearray,$id);
			if($response){
				$this->session->set_flashdata('success_msg','Form status successfully updated');
				}else{
				$this->session->set_flashdata('error_msg','There is some error ');
			}
			redirect(BASEURL.'/users/view_replacement_form/'.$ID);
		}
		
		public function update_user_profile_data() {
			$this->load->model('user_model');
			$form_record = $this->input->post();
			
			if(!empty($form_record)){
				$res = $this->user_model->update_user_profile_data_byAdmin($form_record);
				if($res){
					   $result['result'] = 'success';
				} else {
					$result['result'] = 'error';
				}
				//echo json_encode($result);die;
				
			}  
			
			//echo $this->db->last_query();
           redirect($_SERVER['HTTP_REFERER']);			
		}	
		
		public function add_new_users(){

		
	     $post_data = $this->input->post();
		
		
		 if(!empty($post_data))
		 {
			 
			 $this->load->model('user_model');
			   $response = $this->user_model->add_new_users_data($post_data);
			   if($response){
				   $data['referal_data'] = $this->user_model->get_reference_data($post_data);
				   
				    //$direct_referal = $this->user_model->check_name($data['referal_data']['display_name']);
					    $total_sales = $data['referal_data']['total_sales'];
						$sales = $total_sales+1;
						$total_sales = array('total_sales'=>$sales);
						$this->user_model->update_user_sales($data['referal_data']['id'],$total_sales);
				   
				   
				   $referal = $data['referal_data'];
                      //$my_earnings = $this->user_model->my_earnings($referal['id'],$post_data,STRIPE_AMT);

				   $this->load->model('template_model');
				   $template_data = $this->template_model->get_template(2);
				    $message=$template_data['description'];
				   $loginlink = $this->config->item('front_base_url') . "users/login";
					$subject = $template_data['subject'];
						$message = str_replace("#link#", $link, $message);
					$message = str_replace("#user#", $post_data['fname'] . ' ' . $post_data['lname'], $message);
						$message = str_replace("#username#", $post_data['display_name'] , $message);			
						$message = str_replace("#password#", $post_data['password'] , $message);	
						$message = str_replace("#loginlink#", $loginlink , $message);
				 					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $post_data['email'];
				  	$this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
				  
				   $referal_data = $this->db->select("*")->from("users")->where(array("display_name" => $post_data['reference_by']))->get()->row_array();
					   $this->load->model('template_model');
					
				   	$date = date('m-d-Y',time());
					$template = $this->template_model->get_template(3);
					$subjectref = $template['subject'];
					$messagref = $template['description'];
					$messagref = str_replace("#user#", $referal_data['fname'] . ' ' . $referal_data['lname'], $messagref);
					$messagref = str_replace("#firstname# #lastname#", $post_data['fname'] . ' ' . $post_data['lname'], $messagref);
					$messagref = str_replace("#email#", $post_data['email'], $messagref);
				    $messagref = str_replace("#phone#", $post_data['phone_no'], $messagref);
					$messagref = str_replace("#date#", $date, $messagref);
				// debug($messagref);
				  //die;
					$refralarray['message'] = $messagref;
					$refralarray['subject'] = $subjectref;
					$refralarray['to'] = $referal_data['email'];
				
		
				     $this->load->model('email_model');
					$response = $this->email_model->sendIndividualEmail($refralarray);
	
				  
				  
				  
				/*$result['result'] = 'success';
				$result['message'] = 'Added Successfully';
				echo json_encode($result);*/
				
				$data["user_data"] = $this->user_model->getUserAllData();	
		 $data['success'] = 'New user Added Successfully';
			$data["master_title"] = "Manage Users";   
			$data["master_body"] = "index";  
			$this->load->theme('mainlayout', $data);
             
				}else{
				
				/*$result['result'] = 'error';
				$result['message'] = 'There is some problem to add data.Please try again!';
				echo json_encode($result);*/
				$data['error'] = 'There is some problem to add data.Please try again!';
				
				$data['master_title'] = 'Add New Users';
		$data['master_body'] = 'add_new_users';
		$this->load->theme('mainlayout',$data);
               
				  
				  }
				  
		}else{
		$data['master_title'] = 'Add New Users';
		$data['master_body'] = 'add_new_users';
		$this->load->theme('mainlayout',$data);
		}
		
		
		}
	

	
			
		 public function edit_users($id){
			  
			   
        $this->load->model('user_model');
	  $data["user_data"]=$this->user_model->get_Users_details($id);
			   $post_data = $this->input->post();
		 $data['id'] = $id;
			  
		 if(!empty($post_data))
		 {
			  //debug($post_data);
			 // die;
			 //$data['id'] = $id;
			 
			 $id=$post_data['id'];
			 $user_data['fname']=$post_data['fname'];
			 $user_data['lname']=$post_data['lname'];
			 $user_data['display_name']=$post_data['display_name'];
			 $user_data['email']=$post_data['email'];
			 $user_data['phone_no']=$post_data['phone_no'];
			 //$user_data['reference_by']=$post_data['reference_by'];
			 $user_data['menu_show']=implode(',',$post_data['menu_show']);
			 if(!empty($post_data['password']))
			 {			 
			 $user_data['password']=MD5($post_data['password']);
			 }
			 
			 $this->load->model('user_model');
			   $response = $this->user_model->update_user_details($user_data,$id);
			 
			  if($response){
				/*$result['result'] = 'success';
				$result['message'] = 'Added Successfully';
				echo json_encode($result);
                die;*/
					
		 $data['success'] = 'User Updated Successfully';
			
				}else{
				$data['error'] = 'Not updated something wrong';
				  
				  }
		 }
	  // $data['userdata'] = $this->session->userdata("userdata");
	  // $data['id'] = $id;
	  // $data['user_data'] = $this->user_model->step_data($id);
	   
	   $data["master_title"] = "Edit Users";   
       $data["master_body"] = "edit_users";   
       $this->load->theme('mainlayout', $data);  
	   
	   }
		

           public function checkemailvalidity() {
			$valid = true;
			$email = $this->input->post('email');
			$userdata = $this->session->userdata('userdata');
			if ($userdata['email'] != $email) {
				if (!empty($email)) {
					$user = $this->db->select("*")->from("users")->where(array("email" => $email, "isDeleted" => 0))->get()->row_array();
					if (count($user) == 0) {
						$valid = true;
						} else {
						$valid = false;
					}
				}
			}
			
			echo json_encode(array( 'valid' => $valid ));
			die;
		}


		

		public function nicknamevalidity() {
			$valid = true;
			$nick_name = $this->input->post('display_name');
			if (!empty($nick_name)) {
				$user = $this->db->select("*")->from("users")->where(array("display_name" => $nick_name, "isDeleted" => 0))->get()->row_array();
				if (count($user) == 0) {
					$valid = true;
					} else {
					$valid = false;
				}
			}			
			echo json_encode(array( 'valid' => $valid ));
			die;
		}

        

                public function delete_User($id=0){
            $this->load->model('user_model');
      	$status = $this->user_model->delete_user($id);
			//debug($status);
			
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','User deleted successfully');
		   
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the user'); 
			
		}
		
        redirect($_SERVER['HTTP_REFERER']);
    }


       				 
	public function changeStatus_users($status=0,$id=0){
        $this->load->model('user_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->user_model->updateUserStatus($updatearray,$id);
        if($response){
		     //if($statusstring=="Activated"){
			       //$user_info = $this->user_model->get_user_by_id($id);
					//$this->load->model('template_model');
					//$template_data = $this->template_model->get_template(2);
					//$subject = $template_data['subject'];
					//$message = $template_data['description'];
					//$message = str_replace("#user#", $user_info['fname'] . ' ' . $user_info['lname'] , $message);
					//$message = str_replace("#username#", $user_info['display_name'] , $message);
					//$message = str_replace("#password#", $user_info['unencrypted_password'], $message);	
					//$emailarray['message'] = $message;
					//$emailarray['subject'] = $subject;
					//$emailarray['to'] = $user_info['email'];					
					//$this->load->model("email_model");
					//$this->email_model->sendIndividualEmail($emailarray);
					//if(!empty($user_info['reference_by'])){
						//$reference_by = $user_info['reference_by'];
						//}
					//else{
					//	$reference_by = 'smgroup';
						//}
					//$referal_data = $this->db->select("*")->from("users")->where(array("display_name" => $reference_by))->get()->row_array();
					
					//$date = date('m-d-Y',$user_info['created']);
					//$template = $this->template_model->get_template(3);
					//$subjectref = $template['subject'];
					//$messagref = $template['description'];
					//$messagref = str_replace("#user#", $referal_data['fname'] . ' ' . $referal_data['lname'], $messagref);
					//$messagref = str_replace("#firstname# #lastname#", $user_info['fname'] . ' ' . $user_info['lname'], $messagref);
					//$messagref = str_replace("#email#", $user_info['email'], $messagref);
					//$messagref = str_replace("#phone#", $user_info['phone_no'], $messagref);
					//$messagref = str_replace("#date#", $date, $messagref);
					//$refralarray['message'] = $messagref;
					//$refralarray['subject'] = $subjectref;
					//$refralarray['to'] = $referal_data['email'];
					//$this->email_model->sendIndividualEmail($refralarray);
				 //}
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        
    }	



      		public function get_user($status=NULL){
		    $data["status"]=$status;		
			$this->load->helper('appliedForms_helper');
			$this->load->model('user_model');
	        $this->load->library('pagination');
			$config=array();
			$search = $this->input->get('search');
			if (!empty($search)){
			$config["base_url"] = base_url()."users/get_user/".$status."?status=".$status."&search=".$search;
		    }else{
				$config["base_url"] = base_url()."users/get_user/".$status."?status=".$status;
			}
			$config["total_rows"] = $this->user_model->record_count_inactive($status);	
			$config["per_page"] = 10;
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<ul class="pagination">';   
			$config['full_tag_close'] = '</ul>';	
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = ' Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';	
			$config['cur_tag_open'] = '<li class="active"><a href="">';	
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';	
			$config['num_tag_close'] = '</li>';	
			$this->pagination->initialize($config);
			$offset = $this->input->get('offset');
			$get_data = $this->input->get();
			
			
			if(!empty($get_data['search'])){
			 $data["user_data"] = $this->user_model->get_user_by_status_page_search($get_data,$config["per_page"], $offset);
			
				}else{
				 $data["user_data"]=$this->user_model->get_user_by_status_page($data["status"],$config["per_page"], $offset);
			  	 
			} 
		 $str_links = $this->pagination->create_links();
		 $data["links"] = explode('&nbsp;',$str_links);
		
		 $data["master_title"] = "Users List"; 
		 $data["master_body"] = "user_list";       
		 $this->load->theme('mainlayout', $data);   		
   		 }


		 public function cancel_admin_subscription(){
			$data = $this->input->post();
			 
			$this->load->model('user_model');
			 
			$response = $this->user_model->admin_cancel_subs($data['id']);
		
				if($response){ 
					$result['result'] = 'success';
					$result['message'] = 'Admin subscription Plan has been canceled successfully';
					echo json_encode($result);
					die;
					}else{
					$result['result'] = 'error';
					$result['message'] = 'There is some error cancel the admin subscription.Please try again';
					echo json_encode($result);
					die;
				}
			}
			
			
			
		public function cancel_referal_subscription(){
			$data = $this->input->post();
			$this->load->model('user_model');
			$response = $this->user_model->user_cancel_subs($data['id']);
			if($response){ 
					$result['result'] = 'success';
					$result['message'] = 'User subscription Plan has been canceled successfully';
					echo json_encode($result);
					die;
					}else{
					$result['result'] = 'error';
					$result['message'] = 'There is some error cancel the user subscription.Please try again';
					echo json_encode($result);
					die;
				}
		}
		

		public function subscription(){
								
			$this->load->helper('appliedForms_helper');
			$this->load->model('user_model');
	        	$this->load->library('pagination');
			$config=array();
			$user = $this->input->get('subscription');
			$search =$this->input->get('search');
			if ($user=="admin_sub_id" && !empty($search)){
				$config["base_url"] = base_url()."users/subscription?subscription=".$user."&search=".$search;
		  	  }else if ($user=="admin_sub_id" && empty($search)){
				$config["base_url"] = base_url()."users/subscription?subscription=".$user;
			}	
			
			if($user=="user_sub_id" && !empty($search)){
				$config["base_url"] = base_url()."users/subscription?subscription=".$user."&search=".$search;
			}
			else if ($user=="user_sub_id" && empty($search)){
				$config["base_url"] = base_url()."users/subscription?subscription=".$user;			
			}
			
			if($user=="both" && !empty($search)){
				$config["base_url"] = base_url()."users/subscription?subscription=".$user."&search=".$search;
			}
			else if ($user=="both" && empty($search)){
				$config["base_url"] = base_url()."users/subscription?subscription=".$user;			
			}
			
			
			if(!empty($search)){
				$config["total_rows"] = $this->user_model->count_search_subscription_data($user,$search);	
				
			}
			else{
				$config["total_rows"] = $this->user_model->count_search_subscription_data($user);
				//debug($config["total_rows"]);die;
				
			}
			
			$config["per_page"] = 10;
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<ul class="pagination">';   
			$config['full_tag_close'] = '</ul>';	
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = ' Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';	
			$config['cur_tag_open'] = '<li class="active"><a href="">';	
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';	
			$config['num_tag_close'] = '</li>';	
			$this->pagination->initialize($config);
			$offset = $this->input->get('offset');
			$get_data = $this->input->get();
			
			
			if(!empty($get_data['subscription']) && !empty($search)){
				
			 $data["user_data"] = $this->user_model->search_subscription_data($get_data['subscription'],$search,$config["per_page"], $offset);
			
			}else if(!empty($get_data['subscription']) && empty($search)){
				
			 $data["user_data"] = $this->user_model->search_subscription_data($get_data['subscription'],$search,$config["per_page"], $offset);
				
			}
			else{
				 $data["user_data"]=$this->user_model->search_subscription_data('both',$config["per_page"], $offset);
			} 
			 $str_links = $this->pagination->create_links();
			 $data["links"] = explode('&nbsp;',$str_links);

			 $data["master_title"] = "Users List"; 
			 $data["master_body"] = "index";       
			 $this->load->theme('mainlayout', $data);   	
				
		}

		   public function subscribe_admin_sub(){
			 $user_id = $this->input->get('user_id');
			 $this->load->model('user_model');
             $response = $this->user_model->add_admin_subscription($user_id);
			   if($response){
			     $this->session->set_flashdata('msg', 'Admin Subscription Activated Successfully');
				   redirect(BASEURL.'/users/');
				   
                 }
			   
			   }
		public function subscribe_user_sub(){
			 $user_id = $this->input->get('user_id');
			 $this->load->model('user_model');
             $response = $this->user_model->add_user_subscription($user_id);
			   if($response){
			     $this->session->set_flashdata('msg', 'UOP SMS Pro Subscription Activated Successfully');
				   redirect(BASEURL.'/users/');
				   
                 }
			   
			   }
		   

      



          
		
		
		
	}
