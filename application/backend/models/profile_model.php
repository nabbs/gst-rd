<?php
	
	/*
		* User_model.php
		* Created by : Mr.Gurpreet Singh
		* Created on: 9 Feb,2015
		* Purpose: File is used to manage database related queries for the models
	* */
	
	// It is good practice to use buffered output
	
	ob_start();
	
	class profile_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		function get_profile_data($userdata){  
			$userData['userData_basic'] = $this->db->select("*")->from("users")->where(array("id" =>$userdata['id'], 'status' => 1))->get()->row_array();
			$userData['userData_username'] = $this->db->select("*")->from("step_data")->where(array("user_id" =>$userdata['id'], 'status' => 1))->get()->row_array();
			return  $userData;
		}
		
		function get_admin_info($id=null){  
			return  $admin_info = $this->db->select("*")->from("admins")->where(array("id" =>$id, 'status' => 1))->get()->row_array();
		} 
		function update_profile_data($data){ 
			if((isset($data["getresponse_compaignname"]) && !empty($data['getresponse_compaignname'])) || (isset($data["convertkit_sequencesname"]) && !empty($data['convertkit_sequencesname'])) || (isset($data["aweber_list_id"]) && !empty($data["aweber_list_id"]))){
				$autoresponder_data = array('user_id'=>$data['id'],'autoresponder_id'=>$data['services'],'created'=>time());				
				
				if(isset($data["getresponse_compaignname"]) && !empty($data['getresponse_compaignname'])){
					
					$autoresponder_data['api_key']=$data['getresponse_api_key'];
					$autoresponder_data['list_id']=$data['getresponse_compaignname'];
					$autoresponder_data['type']='Get Response';
					
					
				}
				if(isset($data["convertkit_sequencesname"]) && !empty($data['convertkit_sequencesname'])){
					$autoresponder_data['api_key']=$data['convertkit_api_key'];
					$autoresponder_data['list_id']=$data['convertkit_sequencesname'];
					$autoresponder_data['type']='Convertkit';
					
				}
				if(isset($data["aweber_list_id"]) && !empty($data["aweber_list_id"])){	
					
					$autoresponder_data['list_id']=$data['aweber_list_id'];
					$autoresponder_data['type']='Aweber';
					$autoresponder_data['autoresponder_id'] =2;
					$autoresponder_data['access_key']=$data['access_key'];
					$autoresponder_data['access_token']=$data['access_token'];
					$autoresponder_data['account_id']=$data['account_id'];
					
					
				}		
				$check_list = $this->checkemailvalidity($autoresponder_data['list_id'],$data['id']);
				
			}
			$request_data=array('fname' => $data['fname'],'lname' => $data['lname'],'email' => $data['email'],'phone_no'=>$data['mobile'],'custom_video'=>$data['custom_video'],'custom_video_text'=>$data['custom_video_text'],'custom_video_link'=>$data['custom_video_link'],'custom_description'=>$data['custom_description'],'enable_step_5'=>$data['enable_step_5'],'auto_responder_enable'=>$data['auto_responder_enable'],'services'=>$data['services']);
			$this->db->where(array('id' => $data['id']));		   
			if($this->db->update('users',$request_data)){
				if($data['step_one_username']!=""){
					$request_data_two['step_one_username'] = $data['step_one_username'];
					}if($data['step_two_username']!=""){
					$request_data_two['step_two_username'] = $data['step_two_username'];
					}if($data['step_three_username']!=""){
					$request_data_two['step_three_username'] = $data['step_three_username'];
					}if($data['step_four_username']!=""){
					$request_data_two['step_four_username'] = $data['step_four_username'];
					}if($data['step_five_username']!=""){
					$request_data_two['step_five_username'] = $data['step_five_username'];
					} if($data['step_six_username']!=""){
					$request_data_two['step_six_username'] = $data['step_six_username'];
					} if($data['step_seven_username']!=""){
					$request_data_two['step_seven_username'] = $data['step_seven_username'];
					} if($data['step_eight_username']!=""){
					$request_data_two['step_eight_username'] = $data['step_eight_username'];
				} 
				$request_data_two["created"] = time();
				//$request_data_two["created"] = '111111';
				
				$check_user_usernames = $this->db->select("*")->from("step_data")->where(array('user_id' => $data['id']))->get()->num_rows();
				if($check_user_usernames>0){
					$this->db->where(array('user_id' => $data['id']));
					if($this->db->update('step_data',$request_data_two)){
						if($check_list ==1 ){
							return $this->db->insert('autoresponder_settings',$autoresponder_data);
						}
						return true;
						}else{
						return false;
					} 				
					}else{
					$request_data_two["user_id"] = $data['id'];
					if($this->db->insert('step_data',$request_data_two)){
						if($check_list ==1){
							return $this->db->insert('autoresponder_settings',$autoresponder_data);
						}
						return true;
						}else{
						return false;
					} 
				}
			}
			
		}
		public function settings($data){

			$request_data = array('default_gateway'=>$data['default_gateway'],'paypal_email'=>$data['paypal_email'],'paypal_api_username'=>$data['api_username'],'paypal_api_password'=>$data['api_password'],'paypal_api_signature'=>$data['api_signature'],'stripe_secret_key'=>$data['secret_key'],'stripe_publisher_key'=>$data['publisher_key'],'authorizedLogin_id'=>$data['authorizedLogin_id'],'authorizedTransaction_key'=>$data['authorizedTransaction_key'],'payzaa_email'=>$data['payzaa_email']);
			$this->db->where('id',$data['id']);
			return $this->db->update('users',$request_data);
			
		}
		
		public function checkemailvalidity($list,$id) {
			
			$valid = true;
			$list_id = $list;
			$userdata = $this->session->userdata('userdata');
			if (!empty($list_id)) {
				$user = $this->db->select("*")->from("autoresponder_settings")->where(array("list_id" =>$list, 'user_id'=>$id))->get()->row_array();
				if (empty($user)) {
					$valid = true;
					} else {
					$valid = false;
				}
				return $valid; 
			}
			
		}	
		
		
		
		
		
		public function get_autoresponder_services($id){
			
			$autoresponder_data = $this->db->select("*")->from("autoresponder_settings")->where(array('user_id' => $id))->get()->result_array();
			$autoresponder_array = array();
			if(!empty(autoresponder_data)){
				$i=0;
				foreach($autoresponder_data as $key=>$val)
				{
					if($val['autoresponder_id']==1){
						
						$autoresponder_array['id'][$i] = $val['id'];
						$autoresponder_array['list_id'][$i]= $val['list_id'];
						$autoresponder_array['type'][$i]= $val['type'];
					}
					if($val['autoresponder_id']==2){
						
						$autoresponder_array['id'][$i]= $val['id'];
						$list_id = explode("_", $val['list_id']);
						$autoresponder_array['list_id'][$i] = $list_id[1];
						$autoresponder_array['type'][$i]= $val['type'];
					}
					
					if($val['autoresponder_id']==3){
						
						$autoresponder_array['id'][$i]= $val['id'];
						$list_id = explode("_", $val['list_id']);
						$autoresponder_array['list_id'][$i] = $list_id[1];
						$autoresponder_array['type'][$i]= $val['type'];
					}
					
					
					$i++;
				}
				
			}
			
			
			//debug($autoresponder_array);
			return $autoresponder_array;
			//return $autoresponder_data;
		}	
		public function autoresponder_services($id){
			
			return $this->db->select("*")->from("autoresponder_settings")->where(array('user_id' => $id))->get()->result_array();
			
		}	
		public function autoresponder_delete($id,$services){
			$this->db->where('id', $id);		
 			if($services['services']==$id){
				$request_data['auto_responder_enable'] = '0';
				$this->db->update('users',$request_data);				
			}			
		   	if($this->db->delete('autoresponder_settings')){
				return true;				
				}else{
				return false;
			}
		}
		
		public function get_service($id){
			return $userData = $this->db->select("services")->from("users")->where(array("id"=>$id , "isDeleted"=>0))->get()->row_array();   
		}
		
		
		function change_password($data=null){ 
			$password = $this->db->select('*')->from('users')->where(array('id' => $data['id']))->get()->result();
			$password = $password[0]->password;
			if ($password == md5($data['old_password'])) {
				$userdata['password'] = md5($data['new_password']);
				$userdata['id'] = $data['id'];
				$this->db->where('id', $data['id']);
				if ($this->db->update('users', $userdata)) {
					return true;
					} else {
					return false;
				}			
				} else {
				return false;
			}
		}
		
		function upload_admin_image($data=null){  
			
			$request_data=array('image' => $data['image']);
			$this->db->where(array('id' => $data['id']));
			$this->db->update('admins',$request_data);
		} 
		function update_admin($data=null){  
			$update_data = array('first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'display_name'=>$data['display_name'],'email'=>$data['email'],'about_myself'=>$data['about_myself'],'fb_link'=>$data['fb_link'],'tw_link'=>$data['tw_link'],'linked_in_link'=>$data['linked_in_link'],'last_login'=>time());
			$this->db->where('id',$data['id']);
			$this->db->update('admins',$update_data);
		} 	 
		public function update_link($data){
			$requested_data = array('auto_responder_enable'=>$data['enable_autorespoder']);
			$this->db->where(array('id' => $data['userdata']['id']));
			if($this->db->update('users',$requested_data)){
				return true;
				}else{
				return false;
			} 
		}
		
		
		
		public function update_recruiting_autoresponder($data){
			
			$recruiting_site_data = array('user_id'=>$_POST['user_id'],'my_recruiting_sites_autoresponder'=>$_POST['my_recruiting_sites_autoresponder'],'created'=>time(),'modified'=>time());
			
			$updatedata = array('auto_responder_enable'=>$data['auto_responder']);
			$this->db->where(array("id"=>$data['user_id']));
			if($this->db->update('users', $updatedata)){
				$check_row = $this->db->select('*')->from("my_sites_settings")->where(array('user_id'=>$data['user_id']))->get()->num_rows();	 
				if($check_row>0){
					
					$this->db->where(array("user_id"=>$data['user_id']));
					if($this->db->update('my_sites_settings', $recruiting_site_data)){
						return true;  
						}else{
						return false;
					}
					}else{
					if($this->db->insert('my_sites_settings', $recruiting_site_data)){
						return true;  
						}else{
						return false;
					}
				}
				}else{
				return false;
			}	
		}
		
		
		public function insert_settings($data){
			$request_data = array('system_settings'=>$data['form_data']['default_email'],
			
			);
			$this->db->where(array('id' => $data['userdata']['id']));		   
			return $this->db->update('admins',$request_data);
			
		}
		
		public function default_settings($data){
			return $this->db->select('system_settings,admin_reseller_gatway,secret_key,publisher_key,authorizedLogin_id,authorizedTransaction_key')->from('admins')->where(array('id'=>$data))->get()->row_array();
		}
		public function update_capture_data($data)
		{  
			
			$capture_page = $this->db->select("capture_page")->from("my_sites_settings")->where(array('user_id'=>$data['userdata']['id'],'capture_page'=>$data['capture_data']['capture_page']))->get()->row_array();
			
			$request_data = array('user_id'=>$data['userdata']['id'],'my_recruiting_sites_autoresponder'=>$data['capture_data']['my_recruiting_sites_autoresponder'],'capture_page'=>$data['capture_data']['capture_page'],'created'=>time(),'modified'=>time(),'status'=>1);
			
			if(!empty($capture_page['capture_page']))
			{   
				$this->db->where(array('user_id'=>$data['userdata']['id'],'capture_page'=>$data['capture_data']['capture_page']));
				return $this->db->update('my_sites_settings',$request_data);
				
			}	
			else{
				return $this->db->insert('my_sites_settings',$request_data);
				
			}
			
		}
		public function selected_campaign($data){
			
			$responder_settings=$this->db->select("*")->from("my_sites_settings")->where(array('user_id'=>$data['userdata']['id']))->get()->result_array();
			foreach($responder_settings as $key=>$val){
				$responder_array[$val['capture_page']]=$val['my_recruiting_sites_autoresponder'];	
			}
			
			return $responder_array;
		}
		public function update_landing_data($data){
			
			$request_data = array('default_landing_page'=>$data['landing_page']['landing_data']);
			$this->db->where(array('id'=>$data['userdata']['id']));
			return $this->db->update('users',$request_data);
		}
		
		public function landing_page($data){
			
			return $this->db->select('default_landing_page')->from('users')->where(array('id'=>$data['id']))->get()->row_array();
			
		}
		public function update_postion($data){
			
		 $request_array = array('position'=>$data['position']);
			$this->db->where(array('id'=>$data['id']));
		      return $this->db->update('videos',$request_array);
		}
		
		
		public function get_user_details($where){
			return $userData = $this->db->select('*')->from("users")->where(array("display_name"=>$where['display_name']))->get()->row_array();		}
		
		
		
	}
	
