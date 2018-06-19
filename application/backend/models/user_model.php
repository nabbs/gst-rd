<?php
	/*
		* User_model.php
		* Created by : Mr.Gurpreet Singh
		* Created on: 9 Feb,2015
		* Purpose: File is used to manage database related queries for the models
	* */
	// It is good practice to use buffered output
	ob_start();
	class user_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		/*     * *********************************************** Admin login functions starts ************************************************* */
		
		

		public function get_Users(){
			return $userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0))->get()->result_array();     
		}   
		public function get_allUsers($limit, $offset){
			return $userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0))->limit($limit, $offset)->get()->result_array();     
		}
		public function get_service($id){
			return $userData = $this->db->select("services")->from("users")->where(array("id"=>$id , "isDeleted"=>0))->get()->row_array(); 
		}
		/*public function get_Users_fields(){
			return $userData = $this->db->select('fname,lname,email')->from("users")->where(array("isDeleted"=>0))->get()->result_array();     
		}*/
		
		
		public function get_user_by_status($status=NULL){
			return $userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0,"status"=>$status))->get()->result_array();     
		}	
		public function check_user_data($refered_by=null){
			$userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0,"display_name"=>$refered_by))->get()->row_array();
			return $userData;  
		}
		public function get_users_broker_info($id=NULL){
			return $user_broker_info = $this->db->select("*")->from("step_data")->where(array("user_id"=>$id))->get()->row_array();     
		}	
		public function get_Users_details($id=NULL){
			return $user_details = $this->db->select("*")->from("users")->where(array("isDeleted"=>0,"id"=>$id))->get()->row_array();     
		}	
		
		public function current_user_logs_count($id){
			$count = $this->db->select("*")->from('user_logs_data')->where(array("user_id"=>$id))->get()->result_array();
			return count($count);
		}
		public function current_user_logs($id,$limit,$offset){
			return $this->db->select("*")->from('user_logs_data')->where(array('user_id'=>$id))->limit($limit,$offset)->get()->result_array();
		}
		
		public function current_user_logins_details($id){
			return $this->db->select("*")->from('ecc_user_login_details')->where(array('user_id'=>$id))->get()->result_array();
		}
		public function get_Users_form_details($id=NULL){
			//        return $user_form_details = $this->db->select("*")->from("users")->where(array("isDeleted"=>0,"id"=>$id))->get()->row_array();     
		}		
		public function update_schedule($data=null) {
			$update_schedule = array('ingridients'=>$data['ingridients'],'meals'=>$data['meals'],'exercises'=>$data['exercises']);
			$this->db->where(array('user_id'=>$data['id']))->delete('user_diet_schedule');
			for($i=1;$i<=7;$i++){
				$update_schedule = array('user_id'=>$data['id'],'day'=>$i,'ingridients'=>$data['ingridients'][$i],'meals'=>$data['meals'][$i],'exercises'=>$data['exercises'][$i],'created'=>time(),'modified'=>time());
				$this->db->where(array('day'=>$i,'user_id'=>$data['id']));
				$this->db->insert('user_diet_schedule',$update_schedule);
			}
			return true;	
		}
		public function get_user_info($data=null) {
			return $user_info = $this->db->select("*")->from("users")->where(array("id" =>$data['id']))->get()->row_array();		
		}
		public function get_last_time_user($data=null){
			return $get_last_active = $this->db->select("send_at")->from("messages")->order_by('send_at','desc')->where(array("send_by"=>$data['id']))->get()->row_array();
		}
		public function get_all_conversation($data=null) {
			return $conversation = $this->db->select("*")->from("conversation")->where(array("admin_id" =>$data['id']))->get()->result_array();
		}
		public function get_userdata($id=NULL) {
			return $userdata=$this->db->select("*")->from("users")->where(array("id" =>$id))->get()->row_array();
		}
		public function get_dummy_schedule($data) {
			return $dummy_schedule_data=$this->db->select("*")->from("dummy_schedule")->where(array("day" =>$data["day"]))->get()->result_array();
		}
		public function get_user_schedule($data) {
			return $user_schedule_data=$this->db->select("*")->from("user_diet_schedule")->where(array("day" =>$data["day"],"user_id"=>$data["user_id"]))->get()->row_array();
		}
		public function check_custom_schedule($data) {
			$custom_schedule=$this->db->select("count('id') as schedulecount")->from("user_diet_schedule")->where(array("user_id"=>$data["user_id"]))->get()->row_array();
			if($custom_schedule['schedulecount']==0){
				$genderkey = ($data['gender']=="Male")? "" :"_female";			 
				for($i=1;$i<=7;$i++){
					$schedule = $this->insert_schedule($i);
					$set_custom_schedule = array('user_id'=>$data['user_id'],'day'=>$i,'ingridients'=>$schedule['ingridients'.$genderkey],'meals'=>$schedule['meals'.$genderkey],'exercises'=>$schedule['exercises'.$genderkey],'created'=>time(),'modified'=>time());
					$this->db->insert('user_diet_schedule',$set_custom_schedule);
				}
			}
			return;		 
		}
		public function insert_schedule($day=null){
			return $user_schedule_data=$this->db->select("*")->from("dummy_schedule")->where(array("day" =>$day))->get()->row_array();
		}	
		public function set_user_conversation($userid) {	
			$userdata=$this->db->select("*")->from("users")->where(array("id" =>$userid))->get()->row_array();
			$set_conversation_one = array('admin_id'=>1,'user_id'=>$userdata['id'],'started'=>time(),'last_updated'=>time());		
			$this->db->insert('conversation', $set_conversation_one); 
			$set_conversation_two = array('admin_id'=>2,'user_id'=>$userdata['id'],'started'=>time(),'last_updated'=>time());
			$this->db->insert('conversation', $set_conversation_two); 		
		}
		public function check_admin_login($arr = array()) {
			$userData = $this->db->select("*")->from("users")->where(array("email" => $arr['username'], "password" => md5($arr['password']), 'status' => 1))->get()->row_array();
			return $userData;
		}
		public function getAdminByCookie($hash = null) {
			$userData = $this->db->select("*")->from("users")->where(array("hash" => $hash, 'status' => 1))->get()->row_array();
			return $userData;
		}
		public function getAdminByUserId($user_id = null) {
			$userData = $this->db->select("*")->from("users")->where(array("id" => $user_id, 'status' => 1))->get()->row_array();
			return $userData;
		}
		public function get_User(){
			return $userData = $this->db->select("*")->from("users")->order_by('id','desc')->where(array("isDeleted"=>0))->get()->row_array();
		}
		public function getUsers(){
			$userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0))->get()->result_array();
			return count($userData);
		}
		public function get_active_users(){
			$userData = $this->db->select("*")->from("users")->where(array("status"=>1,"isDeleted"=>0))->get()->result_array();
			return count($userData);
		}
		public function get_inactive_users(){
			$userData = $this->db->select("*")->from("users")->where(array("status"=>0,"isDeleted"=>0))->get()->result_array();
			return count($userData);
		}
		public function pending_jobs(){
			$pending_jobs= $this->db->select("*")->from("gp_comapnies")->where(array("status"=>'0'))->get()->num_rows();
			
			return $pending_jobs;

		}
		public function getuserdata($user_id=null)
		{
			$user_data= $this->db->select("*")->from("user_relations")->where(array("user_id"=>$user_id))->get()->result_array();
			return $user_data;
		}
		public function getUserRelationData($user_id=null){
			$user_relations=$this->db->select("*")->from("user_relations")->join("relations","user_relations.relation_id=relations.id")->join("users","user_relations.user_id=users.id")->where(array("user_relations.user_id"=>$user_id,"user_relations.isDeleted"=>0,"relations.isDeleted"=>0,"users.isDeleted"=>0))->get()->result_array();
			return $user_relations;        
		}
		public function getUserDetail($id=null){
			$userData = $this->db->select("*")->from("users")->where(array("id"=>$id,"isDeleted"=>0))->get()->row_array();
			return $userData;
		}
		public function updateUserStatus($updatearray=array(),$id=null){
			$this->db->where('id', $id);
			if($this->db->update('users', $updatearray)){
				return true;
				}else{
				return false;
			}
		}
		public function updateFormStatus($table,$updatearray=array(),$id=null){
			$this->db->where('id', $id);
			if($this->db->update($table, $updatearray)){
				return true;
				}else{
				return false;
			}
		}
		public function update_advance_Status($updatearray=array(),$id=null){
			$this->db->where('id', $id);
			if($this->db->update('advance_request_form', $updatearray)){
				return true;
				}else{
				return false;
			}
		}	
		public function update_replacement_Status($updatearray=array(),$id=null){
			$this->db->where('id', $id);
			if($this->db->update('replacement_request_form', $updatearray)){
				return true;
				}else{
				return false;
			}
		}	
		public function delete_user($id=null){
			$this->db->where('id', $id);
			if($this->db->delete('users')){
				$msg = 'true';
				return $msg;
				}else{
				$msg = 'false';
				return $msg;		
			}
		}
		public function checkUserAuthorization() {
			$userdata = $this->session->userdata('userdata');
			$userid = $userdata['id'];
			if (isset($userid) && !empty($userid)) {
				$validate = $this->user_model->getAdminByUserId($userid);
				if (count($validate) != 0) {
					redirect(BASEURL);
					} else {
					redirect(BASEURL . '/login');
				}
				} else {
				redirect(BASEURL . '/login');
			}
		}
		public function get_sponsor_details($field,$where){
			$userData = $this->db->select($field)->from("users")->where(array("display_name"=>$where))->get()->row_array();		
			return $userData[$field];
		}	
		public function get_Users_referrals_count($data=array()){
		
		//$userData =  $this->db->select('fname,lname,phone_no,email,created')->from("users")->where(array("reference_by"=>$where))->get()->result_array();	
			
			//$query="select * from users where 1=1";
		$query="select * from users where `reference_by`='".$data['display_name']."'";
			if(!empty($data['search'])){
				$search = trim($data['search']);
				$keyword = explode(" ",$search);
				foreach($keyword as $key=>$val){
				$query.=" and (`fname` LIKE '%$val%' OR `lname` LIKE '%$val%' OR `display_name` LIKE '%$val%' OR `email` LIKE '%$val%' OR `phone_no` LIKE '%$val%')";
				}
					
			}
			
			
			$userData = $this->db->query($query)->result_array();
			return count($userData);
		}
		
		public function get_Users_referrals($data=array()){
			//$query="select * from users where 1=1";
			$query="select * from users where `reference_by`='".$data['display_name']."'";
		//debug($query);die;
			if(!empty($data['search'])){
				$search = trim($data['search']);
				$keyword = explode(" ",$search);
				foreach($keyword as $key=>$val){
				$query.=" and (`fname` LIKE '%$val%' OR `lname` LIKE '%$val%' OR `display_name` LIKE '%$val%' OR `email` LIKE '%$val%' OR `phone_no` LIKE '%$val%')";
				}
					
			}
			
			if(!empty($data['limit'])){
				$limit=$data['limit'];
				$query.=" LIMIT $limit";
			}
			
			 return  $this->db->query($query)->result_array();
			
			
			//return $userData = $this->db->select('fname,lname,phone_no,email,created')->from("users")->where(array("reference_by"=>$where))->limit($limit,$offset)->get()->result_array();		
		}
		public function get_Users_referrals_file($where){
			return $userData = $this->db->select('fname,lname,phone_no,email,created')->from("users")->where(array("reference_by"=>$where['display_name']))->get()->result_array();		
		}
		public function get_Users_leads($where){
			$query="select myleads.fname as fname,myleads.email as email,myleads.phone as phone,myleads.created as created from (select * from (select fname,email,phone,created from earning_from_home where reference_by='".$where['display_name']."'  UNION select fname,email,phone,created from discover_how where reference_by='".$where['display_name']."'  UNION select fname,email,phone,created from profit_and_loss where reference_by='".$where['display_name']."' UNION select fname,email,phone,created from cp_four where reference_by='".$where['display_name']."') as leads  group by leads.email order by leads.created DESC) as myleads LEFT JOIN users on (users.email=myleads.email) where users.fname IS NULL order by myleads.created DESC";
			
			
			return $userData = $this->db->query($query)->result_array();
			//debug($userData);die;
		}
		public function get_total_credits($where){
			return $this->db->select('*')->from("users")->where(array("reference_by"=>$where))->get()->num_rows();		 
		}	
		public function update_user_profile_data_byAdmin($data=array()){
		 
			if($data['submit_profile']){
				$update_user_profile = array("fname"=>$data['fname'],"lname"=>$data['lname'],"email"=>$data['email']);  		
				$this->db->where(array("id"=>$data['user_id']));
				if($this->db->update('users', $update_user_profile)){  
					
					/*if(!empty($data['step_one_username'])){
						$updatearray['step_one_username'] = $data['step_one_username'];  		   
						}if(!empty($data['step_two_username'])){
						$updatearray['step_two_username'] = $data['step_two_username'];
						}if(!empty($data['step_three_username'])){
						$updatearray['step_three_username'] = $data['step_three_username'];  
						}if(!empty($data['step_four_username'])){
						$updatearray['step_four_username'] = $data['step_four_username'];   
						}if(!empty($data['step_five_username'])){
						$updatearray['step_five_username'] = $data['step_five_username'];   
						}if(!empty($data['step_six_username'])){
						$updatearray['step_six_username'] = $data['step_six_username'];   
					}	
					$this->db->where(array("id"=>$data['stepdata_id'],"user_id"=>$data['user_id']));
					if($this->db->update('step_data', $updatearray)){
						return true;
						}else{
						return false;
					}				
					}else{
					return false;*/
					return true;
				}
				else{
				
				return false;
				}
				
				}else{
				$updatepassword = array("password"=>md5($data['password']));  	
				$this->db->where(array("id"=>$data['user_id']));
				if($this->db->update('users', $updatepassword)){
					return true;
					}else{
					return false;    
				}				
			}
		}
		public function get_leader_board($data=null){
			$month = date('m',time()); 
			$year =  date('Y',time()); 
			$time =  strtotime($month.'/01'.'/'.$year);
			$whereClause = array('created >='=>$time,'reference_by <>'=>'smgroup','fname <>'=>'','lname <>'=>'');		   
			$ref_data = $this->db->select('reference_by, COUNT(reference_by) as total')->from("users")->group_by('reference_by')->order_by('total', 'desc')->where($whereClause)->limit(10)->get()->result_array(); 
			
			foreach($ref_data as $key=>$val){
				$reference_by = trim($val['reference_by']);
				if(!empty($reference_by)){
					$user_details = $this->db->select("fname,lname")->from("users")->where(array("display_name"=>$val['reference_by']))->get()->row_array(); 
					$leader_board_details[] =  str_replace($val['reference_by'],$user_details['fname'].' '.$user_details['lname'] , $val);			
				}
			}
			return $leader_board_details;
		}	
		public function get_leaderboard_nintydays($data=null){
			$format = 'Y-m-j'; 		
			$d = date ( $format, strtotime ( '-90 days' ) );
			$whereClause = array('created >='=>$d,'reference_by <>'=>'smgroup','fname <>'=>'','lname <>'=>'');		   
			$ref_data = $this->db->select('reference_by, COUNT(reference_by) as total')->from("users")->group_by('reference_by')->order_by('total', 'desc')->where($whereClause)->limit(10)->get()->result_array(); 
			
			foreach($ref_data as $key=>$val){
				$reference_by = trim($val['reference_by']);
				if(!empty($reference_by)){
					$user_details = $this->db->select("fname,lname")->from("users")->where(array("display_name"=>$val['reference_by']))->get()->row_array(); 
					$leader_board_details[] =  str_replace($val['reference_by'],$user_details['fname'].' '.$user_details['lname'] , $val);			
				}
			}
			return $leader_board_details;
		}	
		public function get_leaderboard_alltime($data=null){

			$whereClause = array('reference_by <>'=>'smgroup','fname <>'=>'','lname <>'=>'');		   
			$ref_data = $this->db->select('reference_by, COUNT(reference_by) as total')->from("users")->group_by('reference_by')->order_by('total', 'desc')->where($whereClause)->limit(10)->get()->result_array(); 
			
			foreach($ref_data as $key=>$val){
				$reference_by = trim($val['reference_by']);
				if(!empty($reference_by)){
					$user_details = $this->db->select("fname,lname")->from("users")->where(array("display_name"=>$val['reference_by']))->get()->row_array(); 
					$leader_board_details[] =  str_replace($val['reference_by'],$user_details['fname'].' '.$user_details['lname'] , $val);			
				}
			}
			return $leader_board_details;
			
		}
		public function status_auto_responder($id){
			$result =  $this->db->select('auto_responder_enable')->from('users')->where(array('id'=>$id))->get()->row_array();
			return $result['auto_responder_enable'];
		}
		public function recruiting_auto_responder($id){
			$result =  $this->db->select('auto_responder_enable')->from('users')->where(array('id'=>$id))->get()->row_array();
			return $result['auto_responder_enable'];
		}
		public function get_subscribers_referrals($data){
			$reference_by = $data['display_name'];
			$query2 = $this->db->select("email,created,reference_by")->from("earning_from_home")->where(array("reference_by"=>$reference_by))->get()->result_array();
			$one = $this->db->last_query();
			$query1 = $this->db->select("email,created,reference_by")->from("profit_and_loss")->where(array("reference_by"=>$reference_by))->get()->result_array();
			$two = $this->db->last_query();
			$query3 = $this->db->select("email,created,reference_by")->from("discover_how")->where(array("reference_by"=>$reference_by))->get()->result_array();
			$three = $this->db->last_query();
			$query4 = $this->db->select("email,created,reference_by")->from("cp_four")->where(array("reference_by"=>$reference_by))->get()->result_array();
			$four = $this->db->last_query();
			$query = $this->db->query("Select * from (".$one." UNION ".$two." UNION ".$three." UNION ".$four." order by created) as temp_table group by reference_by");
			$data = $query->result_array();
		}
		public function get_emails($data)
		{
			$query1 = $this->db->select('email')->from('earning_from_home')->where(array('reference_by'=>$data['display_name']))->get()->result_array();
			$one = $this->db->last_query();
			$query = $this->db->select('email')->from('users')->where(array('display_name'=>$data['display_name']))->get()->result_array();
			$two = $this->db->last_query();
			$query3 = $one." EXCEPT ".$two;
			echo $query3;
			$response = $this->db->query($query3)->result_array();
			//debug($response);
		}
		public function record_count($user,$search) {
			//return $this->db->count_all("users"); 
			if($user=="admin_sub_id" || $user=="user_sub_id" && empty($search)){
				if($user=="admin_sub_id"){
				return $userData = $this->db->select('id')->from("users")->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0))->get()->num_rows(); 
				}
				else{
				return $userData = $this->db->select('id')->from("users")->where(array("user_customer_id <>"=>'', "user_sub_id <>"=>'', "isDeleted"=>0))->get()->num_rows(); 	
				}
			}
			else if($user=="admin_sub_id" || $user=="user_sub_id" && !empty($search)){
				/*return $userData = $this->db->select('id')->from("users")->where(array("user_customer_id <>"=>'', "user_sub_id <>"=>'', "isDeleted"=>0))->get()->num_rows(); 	*/
				$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0));
					return $this->db->get('users')->num_rows();
			}
			else if($user=="both" && empty($search)){
				return $userData = $this->db->select('id')->from("users")->where(array("isDeleted"=>0))->get()->num_rows(); 
			}
			else{
				return $this->db->count_all("users"); 
			}
		}
		//public function fetch_data_search($search_parameter,$limit,$offset) {
			//return $this->db->select('*')->from('users')->where(array('display_name'=>$search_parameter))->limit($limit, $offset)->get()->result_array();
		//}
		
		public function getUserAllData($data=array()){
			
			 return $this->db->select('*')->from('users')->where('isDeleted',0)->get()->result_array();

		//	debug($data);die;
			//echo $this->db->last_query();die;
		}
		
		public function getUserAllDataCSV($data=array()){
			
			
			$query="select fname as FirstName,lname as LastName,display_name as Username,email as Email,phone_no as Phone, created as joining from users where 1=1";
			if(!empty($data['status'])){
				$status=($data['status']=='active')?"1":"0";
				$query.=" and status='$status'";
			}
			if(!empty($data['search'])){
				$search=$data['search'];
				$query.=" and (fname like '%$search%' or lname like '%$search%' or email like '%$search%' or display_name like '%$search%')";
			}
			if(!empty($data['subscription'])){
				if($data['subscription']=="admin"){
					$query.=" and admin_customer_id <>'' and admin_sub_id <> ''";
				}else if($data['subscription']=="customer"){
					$query.=" and user_customer_id <>'' and user_sub_id <> ''";			
				}
			}
			if(!empty($data['from']) && !empty($data['to'])){
				$date = strtotime($data['from']);
				$to = strtotime($data['to']);				
				$query.= " and created >='$date' and created <= '$to'";
			}
			if(!empty($data['paid_by'])){
				$paid_by = $data['paid_by'];
				$query.= " and paid_by ='$paid_by'";
			}
			
			if(!empty($data['limit'])){
				$limit=$data['limit'];
				$query.=" LIMIT $limit";
			}
			
			
			return  $this->db->query($query)->result_array();
		}
		
		
		
		public function getUserAllDataCount($data=array()){
			
			$query="select * from users where 1=1";
			if(!empty($data['status'])){
				$status=($data['status']=='active')?"1":"0";
				$query.=" and status='$status'";
			}
			if(!empty($data['search'])){
				$search=$data['search'];
				$query.=" and (fname like '%$search%' or lname like '%$search%' or email like '%$search%' or display_name like '%$search%')";
			}
			if(!empty($data['subscription'])){
				if($data['subscription']=="admin"){
					$query.=" and admin_customer_id <>'' and admin_sub_id <> ''";
				}else if($data['subscription']=="customer"){
					$query.=" and user_customer_id <>'' and user_sub_id <> ''";			
				}
			}
			if(!empty($data['from']) && !empty($data['to'])){
				$date=strtotime($data['from']);
				$to = strtotime($data['to']);
				$query.= " and created >='$date' and created <= '$to'";
			}
			if(!empty($data['paid_by'])){
				$paid_by = $data['paid_by'];
				$query.= " and paid_by ='$paid_by'";
			}
			
			return $this->db->query($query)->num_rows();
		}
		
		
		
		public function fetch_data_search($data,$search,$limit,$offset) {
			/*$this->db->like('display_name',$search, 'both');
			$this->db->or_like('fname', $search);
			$this->db->or_like('lname', $search);
			$this->db->or_like('email', $search);
			$this->db->limit($limit, $offset);
			return $this->db->get('users')->result_array();*/
			if($data=="admin_sub_id" && empty($search)){
			
					return $userData = $this->db->select('*')->from("users")->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 
				}
				else if($data=="user_sub_id" && empty($search)){
					return $userData = $this->db->select('*')->from("users")->where(array("user_customer_id <>"=>'', "user_sub_id <>"=>'', "isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 			
				}
				else if($data=="both" && empty($search)){
					return $userData = $this->db->select('*')->from("users")->where(array("isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 		
				}
			
				if($data=="admin_sub_id" && !empty($search)){
					$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0));
					return $this->db->get('users')->result_array();
				
				}else if($data=="user_sub_id" && !empty($search)){
					$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("user_customer_id <>"=>'',"user_sub_id <>"=>'',"isDeleted"=>0));
					return $this->db->get('users')->result_array();
				}
				else if($data=="both" && !empty($search)){
					$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("isDeleted"=>0));
					return $this->db->get('users')->result_array();
				}
			
			
			
			//return $this->db->select('*')->from('users')->where(array('display_name'=>$search))->limit($limit, $offset)->get()->result_array();
		}
		
		//public function fetch_data_search_status($where,$limit,$offset) {
			//return $this->db->select('*')->from('users')->where(array('display_name'=>$where['search'],'status'=>$where['status'],"isDeleted"=>0,))->limit($limit, $offset)->get()->result_array();
		//}
		
		
		public function fetch_data_search_status($where,$limit,$offset) {
		    $this->db->like('display_name',$where['search'], 'both');
			$this->db->or_like('fname',$where['search']);
			$this->db->or_like('lname',$where['search']);
			$this->db->limit($limit, $offset);
		    $this->db->where('status',$where['status']);
			$listdata = $this->db->get('users')->result_array();
		    foreach($listdata as $valdata => $val){
				if($val['status']==$where['status']){
					$filterdata[] = $val ;
				}
			}
			return $filterdata;
			
			
		}
		public function fetch_data($user,$limit,$offset) {
			/*$query = $this->db->get("users", $limit, $offset);
			return $query->result_array();	*/
			if($user=="admin_sub_id"){
			
					return $userData = $this->db->select('*')->from("users")->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 
				}
				else if($data=="user_sub_id"){
					return $userData = $this->db->select('*')->from("users")->where(array("user_customer_id <>"=>'', "user_sub_id <>"=>'', "isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 			
				}
				else if($data=="both"){
					return $userData = $this->db->select('*')->from("users")->where(array("isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 		
				}else{
			$query = $this->db->get("users", $limit, $offset);
			return $query->result_array();
				}
			
		}
		public function get_reference_data($data){
			if($data['reference_by']==''){
				$reference_by = 'smgroup';
			}
			else{
				$reference_by = $data['reference_by'];
				
			}
			return	$this->db->select("*")->from("users")->where(array('display_name'=>$reference_by))->get()->row_array();
		}
		public function fetch_user($email=null){
			return $this->db->select("*")->from("users")->where(array('email'=>$email))->get()->row_array();
		} 
		public function my_earnings($id,$userdata,$amount){
			$request_array =array('user_id'=>$id,'name'=>$userdata['fname'].' '.$userdata['lname'],'email'=>$userdata['email'],'phone'=>$userdata['phone_no'],'amount'=>$amount,'payment_method'=>$userdata['payment_method'],'date'=>time(),'status'=>1);
			
			return $this->db->insert('my_earnings',$request_array);
		}
		public function get_earnings($data){
			return $this->db->select("*")->from("my_earnings")->order_by('id','desc')->where(array("user_id"=>$data['id']))->get()->result_array();
			
		}

public function get_earningsById($id){
			return $this->db->select("*")->from("my_earnings")->order_by('id','desc')->where(array("user_id"=>$id))->get()->result_array();
			
		}
		
		public function my_team_referals($data){
			
			return  $this->db->select("*")->from("users")->where(array('reference_by'=>$data['display_name']))->order_by('created','desc')->get()->result_array();

		}
		public function check_name($name){
			return  $this->db->select('*')->from("users")->where(array('display_name'=>$name))->get()->row_array();
		}
		public function hangout_video(){
			return $this->db->select('*')->from('hangout')->get()->row_array();  
		}
		public function sales_video(){
			return $this->db->select('*')->from('sales')->get()->row_array();  
		}


		
	public function add_new_users_data($data){
	
	$menushow=implode(',',$data['menu_show']);			
			      $request_array = array('fname'=>$data['fname'],'lname'=>$data['lname'],'reference_by'=>$data['reference_by'],'reference_name'=>$data['reference_name'],'display_name'=>$data['display_name'],'email'=>$data['email'],'password'=>MD5($data['password']),'phone_no'=>$data['phone_no'],'menu_show'=>$menushow,'status'=>1);

					 $this->db->insert('users',$request_array);
					return $this->db->insert_id();
		}



     public function update_user_details($data,$id) {
			$this->db->where('id', $id);
		
			if($this->db->update('users', $data)){
				//echo  $this->db->last_query();
				//die;
				return true;
				}else{
				return false;
			}
			 
			}

		/////////////////////////////////////////////////////////////////////////////////////
	
     public function get_paymentreference_data($data){
			 return $reference_userdata = $this->get_heirachical_referal($data['reference_by']);
		}

      public function get_heirachical_referal($username){

              
                $response_payment = $this->db->select('*')->from('users')->where(array('display_name'=>$username))->get()->row_array();
                //debug($response_payment);
			  if(CHECK_PARENT_PAYMENT==1){ 
				  $validgateway=check_valid_gateway($username);
				  while(!($response_payment['payment_configuration']==1) && $username !="smgroup"){

					  	if(!$validgateway || empty($response_payment['default_gateway'])){
 						   $username = $response_payment['reference_by'];
							$response_payment = $this->db->select('*')->from('users')->where(array('display_name'=>$username))->get()->row_array();
						}
					}
                         }else{
$validgateway=check_valid_gateway($username);
if(empty($response_payment['default_gateway']) || !$validgateway || $response_payment['payment_configuration']==0){
$username="smgroup";
$response_payment = $this->db->select('*')->from('users')->where(array('display_name'=>$username))->get()->row_array();
}
}
                return $response_payment;

	       }

         public function update_payment_configuration($id,$payment_referal){
			  $request_array = array('payment_configuration'=>1,'payment_referal'=>$payment_referal);
              $this->db->where('id', $id);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}


			  }
			 

		public function get_payment_configuration($id){
            $response_payment = $this->db->select('payment_configuration')->from('users')->where(array('id'=>$id))->get()->row_array();
                return $response_payment['payment_configuration'];

			  }
			  
		
			
			public function user_login_details($id)
			{
				$ip = $_SERVER['REMOTE_ADDR'];
				$time = time();
				$req_data = array('user_id'=>$id,'ip_address'=>$ip,'login_time'=>$time);
				return $this->db->insert('ecc_user_login_details',$req_data);
			}
		public function update_user_login_details($id){
			$rows = $this->db->select('id')->from('ecc_user_login_details')->where(array('user_id'=>$id))->get()->result_array();
			$get_id = end($rows);
			$time = time();
			$req_data = array('logout_time'=>$time);
			$this->db->where(array('id'=>$get_id['id']));
			return $this->db->update('ecc_user_login_details',$req_data);
		}
		
		
			public function add_stripe_data($id,$data){
                
			$this->db->where('id', $id);
			return $this->db->update('users',$data);

                     
				}
		
		
				
		public function get_subscription_data($id) 
		 {

         return  $this->db->select("id,fname,lname,display_name,payment_referal,admin_secret_key,user_secret_key,admin_customer_id,admin_sub_id,user_customer_id,payment_configuration,user_sub_id,paypal_profile_id,authorized_sub_id,email,paid_by,cancel_auth_login_id,cancel__auth_transaction_key,payzaa_sub_id,admin_paid_by")->from("users")->where(array('id'=>$id))->get()->row_array();

		  }
		
		
/* short view code by gpsingh*/
		
		public function get_week_earning($data){
					
		
				
				$month = date('m',time()); 
			$year =  date('Y',time()); 
			$current_data =  date("m/d/Y"); 
			
			$time =  strtotime($current_data);
			$whereClause = array('date >='=>'WEEK('.$time.')-'.$data['week'],'user_id'=>$data['user_id']);		   
			$total_earnign =  $this->db->select('amount')->from("my_earnings")->where($whereClause)->get()->result_array(); 
			
				$total = 0 ;
				foreach($total_earnign as $key=>$val){
					
					$total += $val['amount']	;		
				}
		
			return  $total;
			
			
				
				
		}
		
		
		
		public function get_leads_month($data){
		
			
		
		$month = date('m',time()); 
			$year =  date('Y',time()); 
			$time =  strtotime($month.'/01'.'/'.$year);
			$whereClause = array('created >='=>$time,'reference_by <>'=>$data['display_name'],'fname <>'=>'','lname <>'=>'');		   
	$query="select myleads.fname as fname,myleads.email as email,myleads.phone as phone,myleads.created as created from (select * from (select fname,email,phone,created from earning_from_home where created = '".$time."' AND reference_by='".$data['display_name']."'  UNION select fname,email,phone,created from discover_how where created = '".$time."' AND reference_by='".$data['display_name']."'  UNION select fname,email,phone,created from profit_and_loss where created = '".$time."' AND reference_by='".$data['display_name']."' UNION select fname,email,phone,created from cp_four where created = '".$time."' AND reference_by='".$data['display_name']."') as leads  group by leads.email order by leads.created DESC) as myleads LEFT JOIN users on (users.email=myleads.email) where users.fname IS NULL order by myleads.created DESC"; 
			
			
			return $userData = $this->db->query($query)->result_array();
			
			
				
				
		}
		
/* end short view code by gpsingh*/
		
		
		
		
		
		

		  public function get_secret_key($payment_referal){
               
              $response_payment = $this->db->select('stripe_secret_key')->from('users')->where(array('display_name'=>$payment_referal))->get()->row_array();
               return $response_payment['stripe_secret_key']; 

			  }
		  public function get_referal_email($payment_referal){
               
              $response_payment = $this->db->select('email,fname,lname')->from('users')->where(array('display_name'=>$payment_referal))->get()->row_array();
               return $response_payment; 

			  }
		
			  
		   public function cancel_admin_subscription($sub_id,$secret_key){
			   $userdata = $this->session->userdata("userdata"); 
				require_once('stripe/init.php');
				try{
					 
					require_once('stripe/lib/Stripe.php');
						
					   \Stripe\Stripe :: setApiKey($secret_key);
						$subscription_admin = \Stripe\Subscription::retrieve($sub_id);
						$status_admin =  $subscription_admin->status;
						if($status_admin=='active'){
							$subscription_admin->cancel();
						}
					 
				}catch(Exception $e) {
					
				}
		   
		   }	  
			  
           public function cancel_user_subscription($id){
            
             $data['payment_configuration'] = $this->get_payment_configuration($id);
			 $data['subscribe_data'] = $this->get_subscription_data($id);
			  $referal_email = $this->get_referal_email($data['subscribe_data']['payment_referal']);  
				require_once('stripe/init.php');
						try{
							 
							require_once('stripe/lib/Stripe.php');
						
							 \Stripe\Stripe :: setApiKey($data['subscribe_data']['user_secret_key']);
							$subscription_user = \Stripe\Subscription::retrieve($data['subscribe_data']['user_sub_id']);
							$status_user =  $subscription_user->status;
					        //$subscription_user->cancel(array('at_period_end' => true));
					        if($status_user=='active'){
								$subscription_user->cancel();
								
								$this->load->model('template_model');
								$template_data = $this->template_model->get_template(9);
								$date = date("m-d-Y");
								
								$subject = $template_data['subject'];
								$message = $template_data['description'];
						$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message);
						$message = str_replace("#username#",$data['subscribe_data']['display_name'], $message);
                                $emailarray['message'] = $message;
								$emailarray['subject'] = $subject;
							   
								$emailarray['to'] = $referal_email['email'];					
								$this->load->model("email_model");
								$this->email_model->sendIndividualEmail($emailarray);
								
								$this->load->model('template_model');
								$template_data = $this->template_model->get_template(7);
								$date = date("m-d-Y");
								$subject = $template_data['subject'];
								$message = $template_data['description'];
							$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
								$message = str_replace("#username#",$data['subscribe_data']['display_name'], $message);
                                $emailarray['message'] = $message;
								$emailarray['subject'] = $subject;
								$emailarray['to'] = $data['subscribe_data']['email'];					
								$this->load->model("email_model");
								$this->email_model->sendIndividualEmail($emailarray);
								
								
								
									
							 } 
							
						    $name =$this->config->item('admin');
							$key = array_rand($name);
							$admin_name =$name[$key];
							//$secret_key = get_secret_key($admin_name);
							$admin_email = $this->get_referal_email($admin_name);
						   \Stripe\Stripe :: setApiKey($data['subscribe_data']['admin_secret_key']);
							$subscription_admin = \Stripe\Subscription::retrieve($data['subscribe_data']['admin_sub_id']);
                            $status_admin =  $subscription_admin->status;
                            if($status_admin=='active'){
								
								$subscription_admin->cancel();
								
								$template_data = $this->template_model->get_template(8);
								$date = date("m-d-Y");
								
								$subject = $template_data['subject'];
								$message = $template_data['description'];
								$admin_name=$this->config->item('admin_name');
								$message = str_replace("#user#",$admin_name, $message);
							    $message = str_replace("#user_name#",$data['subscribe_data']['display_name'], $message);
						   $message = str_replace("#username#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
						   
                                $emailarray['message'] = $message;
								$emailarray['subject'] = $subject;
								
								$emailarray['to'] = $this->config->item('email');	
								$this->email_model->sendIndividualEmail($emailarray);
								}
					        $this->update_payment_config($id);
                             
					}catch(Exception $e) {
							
							echo $e->getMessage();die;
							
					}
                    return true;
			   }

            public function update_payment_config($id){
			
			  $request_array = array('payment_configuration'=>0,'admin_customer_id'=>'','admin_sub_id'=>'','user_customer_id'=>'','user_sub_id'=>'','admin_secret_key'=>'','user_secret_key'=>'');
              $this->db->where('id', $id);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}


			  }
		public function get_subscribed_users(){
			
		return $this->db->select('id,fname,lname,email,payment_configuration,payment_referal,admin_secret_key,user_secret_key,admin_customer_id,admin_sub_id,user_customer_id,user_sub_id')->from('users')->where(array('payment_configuration'=>1))->get()->result_array();
		    
		   }
		   
		   
		   public function edit_payment_config($data){
		  
			$request_array = array('payment_configuration'=>$data['status']);
              $this->db->where('id', $data['id']);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}
			
			
			}
			
			public function edit_payment_config_paypal($data){
		  
			$request_array = array("payment_referal"=>$data['payment_referal'],"paypal_profile_id"=>$data['profile_id'],"paid_by"=>$data['paid_by']);
              $this->db->where('id', $data['id']);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}  
		 }
		 
		
		
			public function get_users_for_paypal(){
			
			$row=$this->db->select("id,admin_sub_id,paypal_profile_id,admin_secret_key")->from("users")->where(array("paid_by"=>"Paypal"))->get()->result_array();
			return $row;
		
			}
		
	/*code for authorizednet*/	
			public function insert_data($data){
			
			 $this->db->insert('users',$data);
			  return $userid = $this->db->insert_id();
			}
	/* end code for authorizednet*/
		
		
	/* code for authorizednet recurring*/ 
			public function authorized_sub_id($subscription_id,$reference_data_id){
			
			$request_array = array('authorized_sub_id'=>$subscription_id,'paid_by'=>'authorizenet');
				
			$this->db->where(array('id'=>$reference_data_id));
			$this->db->update('users',$request_array);
			
			}
			
			
	/* end code for authorizednet recurring*/
		
		/*     * *********************************************** Admin login functions ends ************************************************* */

   public function check_payments($user_id){
			
		$payment_data =  $this->db->select("admin_customer_id,admin_sub_id,user_customer_id,user_sub_id,paypal_profile_id")->from("users")->where(array('id'=>$user_id))->get()->row_array();
	    
	     if(!empty(($payment_data['admin_customer_id']) && !empty($payment_data['admin_sub_id']))){
               if((!empty($payment_data['user_customer_id'])  && !empty($payment_data['user_sub_id'])) || !empty($payment_data['paypal_profile_id'])){
					$request_array = array('payment_configuration'=>1);
					$this->db->where('id',$user_id);
					return $this->db->update('users', $request_array);
				}
			} 
		}
		
		public function get_payment_status($user_id){
			
			$payment_data =  $this->db->select("admin_customer_id,admin_sub_id,paypal_profile_id")->from("users")->where(array('id'=>$user_id))->get()->row_array();
			$status=0;
			 if(!empty(($payment_data['admin_customer_id']) && ($payment_data['admin_sub_id']))){
				   if(!empty(($payment_data['paypal_profile_id']))){
						$status=1;
				  }
			 } 
			 return $status;
		}
			public function update_payment_referal($id,$data){
              $this->db->where('id', $id);
			if($this->db->update('users', $data)){
				return true;
				}else{
				return false;
			}

        }
	  		public function check_subscription($email){
            $response_payment = $this->db->select('payment_configuration')->from('users')->where(array('email'=>$email))->get()->row_array();
                return $response_payment;

			  }

	public function get_default_gateway($display_name){
		return  $this->db->select("default_gateway,paypal_api_username,paypal_api_password,paypal_api_signature")->from("users")->where(array('display_name'=>$display_name))->get()->row_array();
		
		}

           public function record_count_inactive($status) {
			$searchdata=$this->input->get("search");
			if(!empty($searchdata)){
				$this->db->like("display_name",$searchdata,'both');
				$this->db->where('status',$status);
				return $this->db->count_all_results("users");
			}
		    else{ $this->db->where(array('status'=>$status));
				return $this->db->count_all_results("users"); 
			} 
		}



                public function get_user_by_status_page_search($where,$limit,$offset) {
		    $this->db->like('display_name',$where['search'], 'both');
			$this->db->or_like('fname', $where['search']);
			$this->db->or_like('lname', $where['search']);
			$this->db->or_like('email', $where['search']);
			$this->db->limit($limit, $offset);
			$this->db->where('status',$where['status']);
			$listdata = $this->db->get('users')->result_array();
			foreach($listdata as $key => $val){
			   if($val['status']==$where['status']){
			     $filtered_data[] = $val; 
			   }
			}
			return $filtered_data;

		}

                 public function get_user_by_status_page($status=NULL,$limit,$offset){
			return $this->db->select('*')->from('users')->where(array('status'=>$status))->limit($limit, $offset)->get()->result_array();
		}
                
		public function edit_configdata($data){
				     
					 
					foreach ($data as $key=>$val){
					$request_array = array('value'=>$val);
					$this->db->where(array('key'=>$key));
					$this->db->update('config',$request_array);
						
						}
						return true;
					
					}
                 public function get_configdata($data){
			
				$query =  	$this->db->select("value")->from('config')->where(array('key'=>$data))->get()->row_array();
					return $query['value'];
					}
		
		public function admin_authorize_cancel_subscription($id){
		     $userdata = $this->get_userdata($id);
		     $data['payment_configuration'] = $this->get_payment_configuration($id);
		     $data['subscribe_data'] = $this->get_subscription_data($id);
			 $referal_email = $this->get_referal_email($data['subscribe_data']['payment_referal']);
			  if($data['subscribe_data']['admin_paid_by']=='Authorize.Net'){
				 
			     require 'Authorizeddotnet/vendor/autoload.php';
			     ini_set("display_errors", 0);	
				 define("AUTHORIZENET_LOG_FILE", "phplog");
				  
			    try{
				  $subscriptionId = $data['subscribe_data']['admin_sub_id'];
				 $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($data['subscribe_data']['admin_customer_id']);
				echo $merchantAuthentication->setTransactionKey($data['subscribe_data']['admin_secret_key']);
				$refId = 'ref' . time();
				$request = new net\authorize\api\contract\v1\ARBCancelSubscriptionRequest();	
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setRefId($refId);
				$request->setSubscriptionId($subscriptionId);
				$controller = new net\authorize\api\controller\ARBCancelSubscriptionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
				if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
				{
				    $successMessages = $response->getMessages()->getMessage();
					$this->load->model('template_model');
                    $template_data = $this->template_model->get_template(8);
					$date = date("m-d-Y");
                    $subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
					$message = str_replace("#user#",$admin_name, $message);
				
					$message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#user_name#",$userdata['display_name'], $message);

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
                   
					$emailarray['to'] = $this->config->item('email');
					//$emailarray['to'] = "karamjeet301@gmail.com";
					$this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];
					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->update_admin_payment_config($id); 
					
				}
				} catch(Exception $e){
					echo $e->getMessage();
				
				}
				  
			  } else if($data['subscribe_data']['admin_paid_by']=='stripe' || $data['subscribe_data']['admin_paid_by']=='Stripe'){
			       require_once('stripe/init.php');
				try
					{

					require_once('stripe/lib/Stripe.php');

					$name =$this->config->item('admin');
					$key = array_rand($name);
					$admin_name =$name[$key];
					
					$admin_email = $this->get_referal_email($admin_name);
					\Stripe\Stripe :: setApiKey($data['subscribe_data']['admin_secret_key']);
					$subscription_admin = \Stripe\Subscription::retrieve($data['subscribe_data']['admin_sub_id']);
						
					echo $status_admin =  $subscription_admin->status;
					if($status_admin=='active'){
                    $subscription_admin->cancel();
					$this->load->model('template_model');
                    $template_data = $this->template_model->get_template(8);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
					$message = str_replace("#user#",$admin_name, $message);
					$message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#user_name#",$userdata['display_name'], $message);
						

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $this->config->item('email');
					 $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
						
						
						$this->update_admin_payment_config($id);
					}
					
				     
					}catch(Exception $e){
					   echo $e->getMessage();
					}
		         }
		      return true;
		}
		
         public function admin_cancel_subscription($id){
		    $userdata = $this->session->userdata('userdata');
			$data['payment_configuration'] = $this->get_payment_configuration($id);
		   
			$data['subscribe_data'] = $this->get_subscription_data($id);
			
			$referal_email = $this->get_referal_email($data['subscribe_data']['payment_referal']); 
			
		     require_once('stripe/init.php');
				try
					{

					require_once('stripe/lib/Stripe.php');

					$name =$this->config->item('admin');
					$key = array_rand($name);
					$admin_name =$name[$key];
					
					$admin_email = $this->get_referal_email($admin_name);
					\Stripe\Stripe :: setApiKey($data['subscribe_data']['admin_secret_key']);
					$subscription_admin = \Stripe\Subscription::retrieve($data['subscribe_data']['admin_sub_id']);
						
					echo $status_admin =  $subscription_admin->status;
					if($status_admin=='active'){
                    $subscription_admin->cancel();
					$this->load->model('template_model');
                    $template_data = $this->template_model->get_template(8);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
					$message = str_replace("#user#",$admin_name, $message);
				  $message = str_replace("#user_name#",$userdata['display_name'], $message);
				  $message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $this->config->item('email');
					 $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
						
						
						$this->update_admin_payment_config($id);
					}
					
				     
					}catch(Exception $e){
					   echo $e->getMessage();
					}
		            return true;
		
		}
		
		public function admin_cancel_subs($id){

			$userdata = $this->db->select('*')->from('users')->where(array('id'=>$id))->get()->row_array();
			
			if($userdata['admin_customer_id']=='Manual' && $userdata['admin_sub_id']=='Manual'){
				
				$request_array = array('admin_customer_id'=>'','admin_sub_id'=>'','payment_configuration'=>0);
				
				
			    $this->db->where(array('id'=>$id));
			    $this->db->update('users',$request_array);
				
				  
				    $this->load->model('template_model');
					$template_data = $this->template_model->get_template(8);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$admin_name, $message);
				  $message = str_replace("#user_name#",$userdata['display_name'], $message);
					   $message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $userdata['email'];
				    $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
			
			    return true;
			} else{
			
			$data['payment_configuration'] = $this->get_payment_configuration($id);
			
			$data['subscribe_data'] = $this->get_subscription_data($id);
			///debug($data['subscribe_data']);die;
			$referal_email = $this->get_referal_email($data['subscribe_data']['payment_referal']);
		if($data['subscribe_data']['admin_paid_by']=='stripe' || $data['subscribe_data']['admin_paid_by']=='Stripe'){
		     require_once('stripe/init.php');
			
				try
					{
						
					require_once('stripe/lib/Stripe.php');

					$name =$this->config->item('admin');
					$key = array_rand($name);
					$admin_name =$name[$key];
					
					$admin_email = $this->get_referal_email($admin_name);
					\Stripe\Stripe :: setApiKey($data['subscribe_data']['admin_secret_key']);
					$subscription_admin = \Stripe\Subscription::retrieve($data['subscribe_data']['admin_sub_id']);
					$status_admin =  $subscription_admin->status;
					if($status_admin=='active'){
                   		  $subscription_admin->cancel();
					      $this->load->model('template_model');
                  		  $template_data = $this->template_model->get_template(8);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
				$message = str_replace("#user#",$admin_name, $message);
				  $message = str_replace("#user_name#",$userdata['display_name'], $message);
					   $message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
						

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $this->config->item('email');
					 $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
						$this->update_admin_payment_config($id);
					}else{
					
					      	$this->load->model('template_model');
                  		  $template_data = $this->template_model->get_template(8);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
				$message = str_replace("#user#",$admin_name, $message);
				  $message = str_replace("#user_name#",$userdata['display_name'], $message);
					   $message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
						

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $this->config->item('email');
					 $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
						$this->update_admin_payment_config($id);
					}
					
					}catch(Exception $e){
						      $this->load->model('template_model');
                  		  $template_data = $this->template_model->get_template(8);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
				$message = str_replace("#user#",$admin_name, $message);
				  $message = str_replace("#user_name#",$userdata['display_name'], $message);
					   $message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
						

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $this->config->item('email');
					 $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
						$this->update_admin_payment_config($id);
					}
		          } else if($data['subscribe_data']['admin_paid_by']=='Authorize.Net' || $data['subscribe_data']['admin_paid_by']=='Authorize.net'){
		
		         require 'Authorizeddotnet/vendor/autoload.php';
			     ini_set("display_errors", 0);	
				 define("AUTHORIZENET_LOG_FILE", "phplog");
				  
			    try{
				 $subscriptionId = $data['subscribe_data']['admin_sub_id'];
				 $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($data['subscribe_data']['admin_customer_id']);
			    $merchantAuthentication->setTransactionKey($data['subscribe_data']['admin_secret_key']);
				$refId = 'ref' . time();
				$request = new net\authorize\api\contract\v1\ARBCancelSubscriptionRequest();	
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setRefId($refId);
				$request->setSubscriptionId($subscriptionId);
				$controller = new net\authorize\api\controller\ARBCancelSubscriptionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
				if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
				{
				    $successMessages = $response->getMessages()->getMessage();
					$this->load->model('template_model');
                    $template_data = $this->template_model->get_template(8);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$admin_name=$this->config->item('admin_name');
				$message = str_replace("#user#",$admin_name, $message);
				  $message = str_replace("#user_name#",$userdata['display_name'], $message);
					   $message = str_replace("#username#",$userdata['fname'].' '.$userdata['lname'], $message);
						

					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $this->config->item('email');
					 $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
					
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
						$this->update_admin_payment_config($id);
					
				}
				} catch(Exception $e){
					echo $e->getMessage();
				
				}
		
		           }
		            return true;
			}
		}
		public function user_cancel_subs($id)
		{
			
			$userdata = $this->db->select('*')->from('users')->where(array('id'=>$id))->get()->row_array();
			
			if($userdata['user_customer_id']=='Manual' && $userdata['user_sub_id']=='Manual'){
				$request_array = array('user_customer_id'=>'','user_sub_id'=>'','payment_configuration'=>0);
				
				
			    $this->db->where(array('id'=>$id));
			    $this->db->update('users',$request_array);
				  
				    $this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#username#",$userdata['display_name'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $userdata['email'];
				    $this->load->model('email_model');
					$this->email_model->sendIndividualEmail($emailarray);
			
			    return true;
			} else{
			
			$data['payment_configuration'] = $this->get_payment_configuration($id);
			$data['subscribe_data'] = $this->get_subscription_data($id);
				//debug($data['subscribe_data']);die;
			$referal_email = $this->get_referal_email($data['subscribe_data']['payment_referal']);  
			if($data['subscribe_data']['paid_by']=='stripe'){
		     require_once('stripe/init.php');
				try
					{
				
					require_once('stripe/lib/Stripe.php');

					\Stripe\Stripe :: setApiKey($data['subscribe_data']['user_secret_key']);
					$subscription_user = \Stripe\Subscription::retrieve($data['subscribe_data']['user_sub_id']);
				
					 $status_user =  $subscription_user->status; 
					
					if($status_user=='active'){
					$subscription_user->cancel();

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message );
					$message = str_replace("#username#",$userdata['display_name'], $message );
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
						
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
                         $this->update_user_payment_config($id);
						
                    	}else{
						
						$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message );
					$message = str_replace("#username#",$userdata['display_name'], $message );
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
						
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
					 $this->update_user_payment_config($id);	
					
					
					} 
                      
					
					}
					
					catch(Exception $e) {
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message );
					$message = str_replace("#username#",$userdata['display_name'], $message );
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
						
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
                         $this->update_user_payment_config($id);
					}
					return true;
			 }else if($data['subscribe_data']['paid_by']=='authorizenet'){
			
			    //$authorized_data = $this->get_referal_data($data['subscribe_data']['payment_referal']);  
				require 'Authorizeddotnet/vendor/autoload.php';
			     ini_set("display_errors", 0);	
				 define("AUTHORIZENET_LOG_FILE", "phplog");
				try{
				$subscriptionId = $data['subscribe_data']['authorized_sub_id'];
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($data['subscribe_data']['cancel_auth_login_id']);
				$merchantAuthentication->setTransactionKey($data['subscribe_data']['cancel__auth_transaction_key']);
				$refId = 'ref' . time();
				$request = new net\authorize\api\contract\v1\ARBCancelSubscriptionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setRefId($refId);
				$request->setSubscriptionId($subscriptionId);
				$controller = new net\authorize\api\controller\ARBCancelSubscriptionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);

				if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
				{
				$successMessages = $response->getMessages()->getMessage();
								

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message);
					$message = str_replace("#username#",$userdata['display_name'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			         $this->update_authorize_payment_config($id);
					
				}else{
					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message);
					$message = str_replace("#username#",$userdata['display_name'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			         $this->update_authorize_payment_config($id);
				
				}
					
			  }catch(Exception $e){
				 $this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message);
					$message = str_replace("#username#",$userdata['display_name'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			         $this->update_authorize_payment_config($id);
				
				}
				 return true;
			}
			
			} 

				}
		
		public function user_cancel_subscription($id)
		{
			
		    $userdata = $this->session->userdata('userdata');
			$data['payment_configuration'] = $this->get_payment_configuration($id);
			
			$data['subscribe_data'] = $this->get_subscription_data($id);
			
			//echo $data['subscribe_data']['paid_by'];die;

			$referal_email = $this->get_referal_email($data['subscribe_data']['payment_referal']);  
			if($data['subscribe_data']['paid_by']=='stripe' || $data['subscribe_data']['paid_by']=='Stripe'){
		     require_once('stripe/init.php');
				try
					{

					require_once('stripe/lib/Stripe.php');

					\Stripe\Stripe :: setApiKey($data['subscribe_data']['user_secret_key']);
					$subscription_user = \Stripe\Subscription::retrieve($data['subscribe_data']['user_sub_id']);
					
					 $status_user =  $subscription_user->status; 
					
					if($status_user=='active'){
					$subscription_user->cancel();

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message );
					$message = str_replace("#username#",$userdata['display_name'], $message );
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
						
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
                        $this->update_user_payment_config($id);
                    } 
                      
					
					}
					
					catch(Exception $e) {
					echo $e->getMessage();
					}
			 }else if($data['subscribe_data']['paid_by']=='Authorize.net'){
				
			    
				require 'Authorizeddotnet/vendor/autoload.php';
			     ini_set("display_errors", 0);	
				 define("AUTHORIZENET_LOG_FILE", "phplog");
				try{
				$subscriptionId = $data['subscribe_data']['authorized_sub_id'];
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($data['subscribe_data']['cancel_auth_login_id']);
				$merchantAuthentication->setTransactionKey($data['subscribe_data']['cancel__auth_transaction_key']);
				$refId = 'ref' . time();
				$request = new net\authorize\api\contract\v1\ARBCancelSubscriptionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setRefId($refId);
				$request->setSubscriptionId($subscriptionId);
				$controller = new net\authorize\api\controller\ARBCancelSubscriptionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
                 
				if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
				{
				$successMessages = $response->getMessages()->getMessage();
								

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(9);
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$referal_email['fname'].' '.$referal_email['lname'], $message);
					$message = str_replace("#username#",$userdata['display_name'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $referal_email['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);

					$this->load->model('template_model');
					$template_data = $this->template_model->get_template(7);
					$date = date("m-d-Y");
					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$data['subscribe_data']['fname'].' '.$data['subscribe_data']['lname'], $message);
					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $data['subscribe_data']['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			         $this->update_authorize_payment_config($id);
				}
			  }catch(Exception $e){
				  echo $e->getMessage();
				
				}
			}
			else if($data['subscribe_data']['paid_by']=='Payzaa'){
				
				
			}
				   return true;

				}
		
		
		
		public function update_admin_payment_config($id){
			   $request_array =array('payment_configuration'=>0,'admin_customer_id'=>'','admin_sub_id'=>'','admin_secret_key'=>'');
             $this->db->where('id', $id);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}
			
			}
		
         public function update_authorize_payment_config($id){
			   $request_array = array('payment_configuration'=>0,'authorized_sub_id'=>'','cancel_auth_login_id'=>'','cancel__auth_transaction_key'=>'');
             $this->db->where('id', $id);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}
			
			}
		
		public function update_user_payment_config($id){
			   $request_array = array('payment_configuration'=>0,'user_customer_id'=>'','user_sub_id'=>'','user_secret_key'=>'');
             $this->db->where('id', $id);
			if($this->db->update('users', $request_array)){
				return true;
				}else{
				return false;
			}
			
			}
		
		public function edit_user_payment_config($data){
		 $this->db->where('id', $data['id']);
			if($this->db->update('users', $data)){
				return true;
				}else{
				return false;
			}
		
		}
		
		
		public function auth_check_payments($user_id)
		{
		$auth_data =  $this->db->select("admin_customer_id,admin_sub_id,authorized_sub_id")->from("users")->where(array('id'=>$user_id))->get()->row_array();
	 
	
			if(!empty(($auth_data['admin_customer_id']) && !empty($auth_data['admin_sub_id']))){
               if(!empty($auth_data['admin_sub_id'])){
					$request_array = array('payment_configuration'=>1);
					$this->db->where('id',$user_id);
					return $this->db->update('users', $request_array);
				}
			} 
			
			
			
			   }
		public function add_authorized_data($id,$data)
		{
			
			$this->db->where('id', $id);
			return $this->db->update('users',$data);
		}
		
		public function get_all_subscribed_users(){
			$paid_by = array('Stripe','stripe','Authorize.net');
//$paid_by = array('stripe');
		   return  $this->db->select('id,fname,lname,email,display_name,payment_configuration,payment_referal,admin_secret_key,user_secret_key,admin_customer_id,admin_sub_id,user_customer_id,user_sub_id,paid_by,paypal_profile_id,authorized_sub_id,cancel_auth_login_id,cancel__auth_transaction_key')->from('users')->where_in('paid_by',$paid_by)->where(array('user_secret_key <>'=>'Manual','user_customer_id <>'=>'Manual','user_sub_id <>'=>'Manual'))->get()->result_array();
			
		}
		public function get_admin_payment_configuration(){
		 return $this->db->select('id,fname,lname,email,display_name,payment_configuration,payment_referal,admin_secret_key,admin_customer_id,admin_sub_id,admin_paid_by')->from('users')->where(array('admin_secret_key <> '=>'Manual','admin_customer_id <> '=>'Manual','admin_sub_id <> '=>'Manual','admin_payment_type <> '=>'one_time'))->where(array('admin_secret_key <> '=>'','admin_customer_id <> '=>'','admin_sub_id <> '=>''))->get()->result_array();
		}
		
		public function check_admin_subscription($id){
				return $this->db->select('admin_customer_id,admin_sub_id')->from("users")->where(array('id'=>$id))->get()->row_array();
		}
		
		
		
		public function check_user_subscription($id){
		
		return $this->db->select('user_customer_id,user_sub_id,paypal_profile_id,paypal_profile_id,authorized_sub_id,payzaa_sub_id,paid_by')->from("users")->where(array('id'=>$id))->get()->row_array();
		
		}
		
		public function get_total_users(){
			
			$time = strtotime(date("Y-m-d"));
			return $this->db->select('id')->from('users')->where(array('created >='=>$time))->get()->num_rows();
			
	
		}
		
	
	
		
		
		
		public function count_search_subscription_data($user,$search){
		
			if($user=="admin_sub_id" && empty($search)){
				return $userData = $this->db->select('id')->from("users")->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0))->get()->num_rows(); 
			}
			else if($user=="user_sub_id" && empty($search)){
				return $userData = $this->db->select('id')->from("users")->where(array("user_customer_id <>"=>'', "user_sub_id <>"=>'', "isDeleted"=>0))->get()->num_rows(); 			
			}
			else if($user=="both" && empty($search)){
				return $userData = $this->db->select('id')->from("users")->where(array("isDeleted"=>0))->get()->num_rows(); 
			}
			if($user=="admin_sub_id" && !empty($search)){

				//return $userData = 	$this->db->select('id')->from("users")->like(array("fname"=>$search,"lname"=>$search,"email"=>$search))->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0))->get()->num_rows(); 
				$this->db->like('display_name',$search, 'both');
				$this->db->or_like('fname', $search);
				$this->db->or_like('lname', $search);
				$this->db->or_like('email', $search);
				$this->db->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0));
				return $this->db->get('users')->num_rows();
			}
			else if($user=="user_sub_id" && !empty($search)){
				$this->db->like('display_name',$search, 'both');
				$this->db->or_like('fname', $search);
				$this->db->or_like('lname', $search);
				$this->db->or_like('email', $search);
				$this->db->where(array("user_customer_id <>"=>'',"user_sub_id <>"=>'',"isDeleted"=>0));
				return $this->db->get('users')->num_rows();
			}
			else{
				$this->db->like('display_name',$search, 'both');
				$this->db->or_like('fname', $search);
				$this->db->or_like('lname', $search);
				$this->db->or_like('email', $search);
				$this->db->where(array("isDeleted"=>0));
				return $this->db->get('users')->num_rows();
			
			}

		}
		
		
		public function search_subscription_data($data,$search,$limit,$offset){
		
			if($data=="admin_sub_id" && empty($search)){
			
					return $userData = $this->db->select('*')->from("users")->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 
				}
				else if($data=="user_sub_id" && empty($search)){
					return $userData = $this->db->select('*')->from("users")->where(array("user_customer_id <>"=>'', "user_sub_id <>"=>'', "isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 			
				}
				else if($data=="both" && empty($search)){
					return $userData = $this->db->select('*')->from("users")->where(array("isDeleted"=>0))->limit($limit, $offset)->get()->result_array(); 		
				}
			
				if($data=="admin_sub_id" && !empty($search)){
					$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("admin_customer_id <>"=>'',"admin_sub_id <>"=>'',"isDeleted"=>0));
					return $this->db->get('users')->result_array();
				
				}else if($data=="user_sub_id" && !empty($search)){
					$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("user_customer_id <>"=>'',"user_sub_id <>"=>'',"isDeleted"=>0));
					return $this->db->get('users')->result_array();
				}
				else if($data=="both" && !empty($search)){
					$this->db->like('display_name',$search, 'both');
					$this->db->or_like('fname', $search);
					$this->db->or_like('lname', $search);
					$this->db->or_like('email', $search);
					$this->db->where(array("isDeleted"=>0));
					return $this->db->get('users')->result_array();
				}
			
		}
		
		
		public function checkemail($email){
			
		return  $this->db->select("email")->from("users")->where(array("email" =>$email))->get()->num_rows();
		
		}
		
		public function checkusername($username){
			
		return  $this->db->select("display_name")->from("users")->where(array("display_name" =>$username))->get()->num_rows();
		
		}
		
		public function get_payzaa_user_data($id){
		return  $this->db->select("*")->from("users")->where(array("id" =>$id))->get()->row_array();
		
		}
		
		public function update_payzaa_data($data){
		  $this->db->where(array('id'=>$data['user_id']));
			unset($data['user_id']);
		  return $this->db->update('users',$data);
		
		}
		
		public function update_paypal_data($data){
		  $this->db->where(array('id'=>$data['user_id']));
			unset($data['user_id']);
		     $this->db->update('users',$data);
			  $last_query =  $this->db->last_query();
		       return $last_query;
		}
		
		
		public function get_heirachical_referal_for_product($referal_id,$product_id){
		   
			$paid_to_details=$this->db->select("id")->from("users")->where("display_name",$referal_id)->get()->row_array();
			$user_id=$paid_to_details['id']; 
			if(!check_admin_subscription($user_id)){
				
				$paid_to='smgroup';
			}else{
				$referal_data=$this->db->select("id,user_id")->from("product_users")->where(array("user_id"=>$user_id,"product_id"=>$product_id))->get()->row_array();
				
				
				if(!empty($referal_data['id'])){
					$paid_to=$this->db->select("display_name")->from("users")->where("id",$referal_data['user_id'])->get()->row_array();
					$paid_to=$paid_to['display_name'];
				}else{
					$paid_to="varis";
				}
			}
			return $this->db->select("*")->from("users")->where(array("display_name"=>$paid_to))->get()->row_array();
			
			
			
		}
		
		public function get_reseller_referal_product($product_id,$referal_name){
		
		    $paid_to_details=$this->db->select("*")->from("users")->where("display_name",$referal_name)->get()->row_array();
			
			$user_id=$paid_to_details['id']; 
			if(!check_basic_rules($product_id,$referal_name)){
				
				$paid_to='smgroup';
			}else{
				$paid_to = $paid_to_details['display_name'];
			}
			
			
			return $this->db->select("*")->from("users")->where(array("display_name"=>$paid_to))->get()->row_array();
			
		
		
		}
		
		public function admin_subscription($username){
				return $this->db->select('admin_customer_id,admin_sub_id')->from("users")->where(array('display_name'=>$username))->get()->row_array();
		}
		
	public function get_user_earnings($limit,$start){
	
	  return $this->db->select('user_id,name,email,phone,payment_method,date,status,SUM(amount) AS amount')->from("my_earnings")->group_by('user_id')->order_by('amount','desc')->limit($limit,$start)->get()->result_array();
		
		
	}   
		public function get_user_earnings_count(){
	
	  return $this->db->select('user_id,name,email,phone,payment_method,date,status,SUM(amount) AS amount')->from("my_earnings")->group_by('user_id')->order_by('amount','desc')->get()->num_rows();
		
		
	}  
		
		public function update_user_sales($id,$sales){
			
		$this->db->where(array('id'=>$id));
		return $this->db->update('users',$sales);
		
		}
		public function update_ipn_data($last_query,$ipn_id){
			
			$request_array = array('insert_query'=>$last_query);
			$this->db->where(array('id'=>$ipn_id));
		   return $this->db->update('paypalIPN_common',$request_array);
		
		}
		
		public function paypal_subscriber_data($user_id,$subscriber_id){
			        
		
	   $request_array = array('paypal_profile_id'=>'','paid_by'=>'','payment_configuration'=>'');
			
		   $this->db->where(array('id'=>$user_id,'paypal_profile_id'=>$subscriber_id));
		   $this->db->update('users',$request_array);
			   return true;
		  
		}
		
		public function add_passup_data($data){
			
			$this->db->insert('passup_sales',$data);
			$userdata = $this->get_userdata($data['user_id']);
			$direct_referal = $this->check_name($data['direct_referal']);
		            
			        $this->load->model('template_model');
					$template_data = $this->template_model->get_template(21);
					$date = date("m-d-Y");

					$subject = $template_data['subject'];
					$message = $template_data['description'];
					$message = str_replace("#user#",$direct_referal['fname'].' '.$direct_referal['lname'], $message);
			        $message = str_replace("#name#",$userdata['fname'].' '.$userdata['lname'], $message);
			        $message = str_replace("#email#",$userdata['email'], $message);
					$message = str_replace("#username#",$userdata['display_name'], $message);
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;

					$emailarray['to'] = $direct_referal['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			return true;
		}
		
		public function get_passup_users($direct_referal){
			
		
		$passup_users = $this->db->select("*")->from("passup_sales")->where(array('direct_referal'=>$direct_referal))->get()->result_array();
		return $passup_users;
		
		}
		
		public function get_admin_keys($user_id){
		
			$admin_data = $this->db->select("admin_secret_key,admin_customer_id,admin_sub_id")->from("users")->where(array('id'=>$user_id))->get()->row_array();
		return $admin_data;
		
		}
		
		public function get_inactive_step($id){
		
return $this->db->select('status')->from("videos")->where(array('id'=>$id))->get()->row_array();
			
		}
		
		public function add_admin_subscription($user_id){
			
				  $request_array = array('admin_secret_key'=>'Manual','admin_customer_id'=>'Manual','admin_sub_id'=>'Manual','paid_by'=>'Manual');
			
		$payment_data = $this->db->select('user_customer_id,user_sub_id,paypal_profile_id,authorized_sub_id,payzaa_sub_id')->from('users')->where(array('id'=>$user_id))->get()->row_array();
			
			if((!empty($payment_data['user_customer_id'])  && !empty($payment_data['user_sub_id'])) || !empty($payment_data['paypal_profile_id']) || !empty($payment_data['authorized_sub_id']) || !empty($payment_data['payzaa_sub_id'])){
				 $request_array['payment_configuration'] = 1;
			}
	
		 	
					  $this->db->where(array('id'=>$user_id));
					 $this->db->update('users',$request_array);
			 
			          $userdata = $this->get_userdata($user_id);
			       $this->load->model('template_model');
			       $template_data = $this->template_model->get_template(25);
					$date = date("m-d-Y");
				
					$subject = $template_data['subject'];
					$message = $template_data['description'];
			        $message = str_replace("#user#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#name#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#Product#",'ECC Software & Reseller Licensing', $message);
					$message = str_replace("#email#", $userdata['email'] , $message);			
					//$message = str_replace("#date#", $date, $message);					
					$amount_one = number_format((STRIPE_ADMIN_PAYMENT/100),2);
					$message = str_replace("#amount#", '$'.$amount_one, $message);					
					$message = str_replace("#payment_method#",'Manual', $message);
					$message = str_replace("#admin#",$this->config->item('admin_name'), $message);					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $userdata['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			        return true;
			
			
		}
		
		public function add_user_subscription($user_id){
		 $request_array = array('user_secret_key'=>'Manual','user_customer_id'=>'Manual','user_sub_id'=>'Manual','paid_by'=>'Manual','payment_configuration'=>1,'payment_referal'=>'smgroup');
			$res = 	$this->db->select('admin_customer_id,admin_sub_id')->from('users')->where(array('id'=>$user_id))->get()->row_array();
			
			if(!empty($res['admin_customer_id']) && !empty($res['admin_sub_id'])){
			   $request_array['payment_configuration'] = 1;
			}else{
			  $request_array['payment_configuration'] = 0;
			}
			
		  $this->db->where(array('id'=>$user_id));
		   $this->db->update('users',$request_array);
			$userdata = $this->get_userdata($user_id);
			       $this->load->model('template_model');
			       $template_data = $this->template_model->get_template(26);
					$date = date("m-d-Y");
				
					$subject = $template_data['subject'];
					$message = $template_data['description'];
			        $message = str_replace("#user#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#name#",$userdata['fname'].' '.$userdata['lname'], $message);
					$message = str_replace("#Product#",'UOP SMS Pro', $message);
					$message = str_replace("#email#", $userdata['email'] , $message);			
					//$message = str_replace("#date#", $date, $message);					
					$amount_one = number_format((STRIPE_UOP_PAYMENT/100),2);
					$message = str_replace("#amount#", '$'.$amount_one, $message);					
					$message = str_replace("#payment_method#",'Manual', $message);
					$message = str_replace("#admin#",$this->config->item('admin_name'), $message);					
					$emailarray['message'] = $message;
					$emailarray['subject'] = $subject;
					$emailarray['to'] = $userdata['email'];					
					$this->load->model("email_model");
					$this->email_model->sendIndividualEmail($emailarray);
			        return true;
			
			
			
		}
		
		public function set_default_gatway($data){
		
			$this->db->where(array('id'=>1));
			 return $this->db->update('admins',$data);
				
		}
		
		public function edit_admin_authorize($id){
		
		$request_array = array('admin_auth_sub_id'=>'','admin_auth_login_id'=>'','admin_auth_transaction_key'=>'','admin_paid_by'=>'');
			$this->db->where(array('id'=>$id));
			$this->db->update('users',$request_array);
			return true;
			
		}
		
		
		public function add_sub_data($id,$data){
				$this->db->where('id', $id);
				return $this->db->update('users',$data);				
			}

		public function check_existing_payment_type($data=array())
		{
			return $this->db->select("*")->from("users")->where(array('display_name'=>$data['reference_by']))->get()->row_array();


		}
		public function recover_account($data=array())
		{
		return $this->db->select("id,email,display_name,password")->from("users")->or_where(array('display_name'=>trim($data['recover_user']),'email'=>trim($data['recover_user'])))->get()->row_array();


		}
		
		//CHD REC.....
		
		public function insert_user($data=array()){
				
		$this->db->insert('users',$data);
				
	$last_id = $this->db->insert_id();
      //$last_id = 1;
		$com_data = array(
				'user_id'=>$last_id,
				'company_name'=>$data['company_name'],
				'company_phone'=>$data['phone_no'],
				'company_email'=>$data['email'],
				'register_by'=>'form'
			);

		return $this->db->insert('gp_comapnies',$com_data);
		 
		}

		public function check_old_password($data=array()){
			$password = md5($data['old_password']);
			return $this->db->select('*')->from('users')->where(array('id'=>$data['user_id'],'password'=>$password))->get()->row_array();
			
			
		}
		public function update_password($data){
                $request_array = array('password'=>md5($data['password']),'unencrypted_password'=>$data['password']);
				$this->db->where('id', $data['user_id']);
				return $this->db->update('users', $request_array); 
			}
		
		public function update_profile($data){


				$user_data = array('fname'=>$data['fname'],'lname'=>$data['lname']);
				$this->db->where(array('id'=>$data['id']));
				$this->db->update('users',$user_data);
			
				$com_data = array('company_name'=>$data['company_name'],
					'company_description'=>$data['company_description'],
					'company_email'=>$data['company_email'],
					'company_address'=>$data['company_address'],
					'company_city'=>$data['company_city'],
					'company_pincode'=>$data['company_pincode'],
					'company_state'=>$data['company_state'],
					'company_phone'=>$data['company_phone']
					);
			
				$this->db->where(array('user_id'=>$data['id']));
				 return $this->db->update('gp_comapnies',$com_data);
				// debug($this->db->last_query());die;
				 


 
			}


			/* notication code */
			public function notification($data){
				$data['created'] = time();
				$data['status'] = 1;
			return $this->db->insert('gp_notification',$data);
			}
			/* get notification data*/
			public function get_notification(){
				return $this->db->select('*')->from('gp_notification')->where('status',1)->get()->result_array();				
			}
			
			
			/* public function get_cities(){
			
return $this->db->select('*')->from('gp_places')->where(array('status'=>1))->get()->result_array();				
			} */
			
			
		
	}		