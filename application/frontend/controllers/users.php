<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	ob_start();
	class users extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->helper('user');
			$this->load->model('jobs_model');
			$this->load->model('companies_model');
			$this->load->library("pagination");
			$this->load->model('user_model');
			$this->load->model('template_model');
			
		}
	
		
		public function register() {
			$userdata = $this->session->userdata('userdata');
			$data = $this->input->post();
			if(!empty($userdata)){
				redirect(BASEURL.'/dashboard');	
				}
			else{
				if(!empty($data)){
				$random_number = md5(time());
				$userdata['company_name'] = $data['company_name'];
				$userdata['phone_no'] = $data['mobile'];
				$userdata['display_name'] = $data['username'];
				$userdata['email'] = $data['email'];
				$userdata['password'] = md5($data['password']);
				$userdata['unencrypted_password'] = $data['password'];
				$userdata['password_reset_token'] = $random_number;
				$userdata['created'] = time();
				$userdata['ip_address'] = $_SERVER['REMOTE_ADDR'];
				$userdata['status'] = '0';
				$response = $this->user_model->insert_user($userdata);
				//$response = 1;
				if($response){


					$link = 'http://chandigarhrecruiters.com/users/verifyemail/'.$random_number;

					/*$txt = '<h4>Email Related Account verification</h4><br/>'.
					$txt = 'Click Here For Verify This Account </br>'.$link; */

					$txt = '<div class="" style="border: 1px solid; text-align: center; margin: 0px auto; min-height: 380; width: 30%;">
	<div class=""><img src="http://chandigarhrecruiters.com/application/frontend/layout/advanced/assets/img/logo_243.png" style="margin-top: 30px; margin-bottom: 50px; width: 239px;"><div>
	<div class="">
	<h4>Email Related Account verification</h4><br/>
	Click Here For Verify This Account </br>'.$link.'
	<h5>For More Details: <a herf="http://www.chandigarhrecruiters.com/about/">Click Here</a></h4><br/>
	</div>
</div></div></div>';



					//debug($txt);die;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$subject = "Chandigarh Recruiters verification Email";
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->from($this->config->item('emailforcom'), 'Chandigarh Recruiters');
					$this->email->to($data['email']);
					$this->email->subject($subject);
					$this->email->message($txt);
					/*$this->email->attach($data['file_name']['upload_data']['full_path']);*/
					if($this->email->send())
					{



						$txt = '<h4>New Company Registered!</h4><br/>'.
						$txt = '<b>Company Name:</b> '.$userdata['company_name'].' <br/>'.
						$txt = '<b>Company Email:</b> '.$userdata['email'].' <br/>'.
						$txt = '<b>Company Phone:</b> '.$userdata['phone_no'].' <br/>'.
						$txt = '<b>Company User Name:</b> '.$userdata['display_name'].' <br/>';


						//debug($txt);die;
						$config['mailtype'] = 'html';
						$this->email->initialize($config);

						$subject = "Chandigarh Recruiters verification Email";
						$this->load->library('email');
						$this->email->set_newline("\r\n");
						$this->email->from($this->config->item('emailforcom'), 'Chandigarh Recruiters');
						$this->email->to($this->config->item('emailforcom'));
						$this->email->subject($subject);
						$this->email->message($txt);

						$this->email->send();


							$userdata = array("result" => "success", "message" => "Account Created Check Your email. ");
							echo json_encode($userdata);
						die;
					}
					else
					{
					//show_error($this->email->print_debugger());
					$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
					echo json_encode($userdata);
						die;	
					}

					
				}else{

					$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
					echo json_encode($userdata);
						die;	

				}
			}
			}
			
			//redirect(BASEURL.'/thankyou');
			$data['master_title'] = "Register";
			$data['master_body'] = "register";
			$this->load->layout('users',$data);				

		}
		public function verifyemail($verification_code = null) {
			// debug($verification_code);die;
		//	only_without_session_page();
			$user = $this->db->select("*")->from("users")->where(array("password_reset_token" => $verification_code))->get()->row_array();

		//	debug($this->db->last_query());die;
			if (count($user) > 0){
				$this->db->where("id", $user['id']);
				$this->db->update("users", array("status" => 1, "password_reset_token" => ''));
				$this->session->set_userdata('userdata', $user);


				$txt = '<h4>Email Related Account verification</h4><br/>'.
					$txt = '<h3>Thank-You For Join Us.</h3><br>'.
					$txt = '<p>For any other information please contact with us. <br>Email: chandigarhrecruiters03@gmail.com</p>';

					//debug($txt);die;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$subject = "Chandigarh Recruiters verification Email";
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->from($this->config->item('emailforcom'), 'Chandigarh Recruiters');
					$this->email->to($user['email']);
					$this->email->subject($subject);
					$this->email->message($txt);
					/*$this->email->attach($data['file_name']['upload_data']['full_path']);*/
					if($this->email->send())
					{
							redirect(BASEURL.'/dashboard');
					}

				

				} else {
				echo "Invalid Link";
				die;
			} 
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

		public function checkusernamevalidity() {
				$valid = true;
				$username = $this->input->post('username');

				$userdata = $this->session->userdata('userdata');
				if ($userdata['username'] != $username) {
					if (!empty($username)) {
						$user = $this->db->select("*")->from("users")->where(array("display_name" => $username, "isDeleted" => 0))->get()->row_array();
						
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

		public function checkcompanyvalidity() {
				$valid = true;
				$company_name = $this->input->post('company_name');

				$userdata = $this->session->userdata('userdata');
				if ($userdata['company_name'] != $company_name) {
					if (!empty($company_name)) {
						$user = $this->db->select("*")->from("users")->where(array("company_name" => $company_name, "isDeleted" => 0))->get()->row_array();
						
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



		public function login() {
			$userdata = $this->session->userdata('userdata');
			//only_without_session_page();
			$data = $this->input->post();
			if(!empty($userdata)){
				redirect(BASEURL.'/dashboard');	
				}
			else{		
			
			if (!empty($data)) {

				//array("email" => $data['email'], "password" => md5($data['password']), "isDeleted" => "0");
			//	$where = 'email= "'.$data['email'].'" OR display_name = '".$data['email']."' AND password = '".$data['email']."' AND isDeleted ="0" ';
				//$where  =  " `email`='".$data['email']."' OR `display_name`='".$data['email']."' AND  `password` = '".md5($data['password'])."' AND `isDeleted` = 0";  

				$userdata = $this->db->select("*")->from("users")->where(array("display_name"=>$data['email'], 'password'=>md5($data['password']), 'isDeleted'=>0))->or_where("email",$data['email'])->get()->row_array();


				//$userdata = $this->db->select("*")->from("users")->where($where)->get()->row_array();

			//	debug($this->db->last_query());die;
				if (empty($userdata)) {
					$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Invalid username and password</b>");
					echo json_encode($userdata);
							die;
					}
					else if ($userdata['status'] == 0 && !empty($userdata['password_reset_token'])) {
					$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Check your email. This account is not verified yet.</b>");
					echo json_encode($userdata);
							die;
							
					echo json_encode($userdata);
					} else if ($userdata['status'] == 0) {
					$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Your account is currently disabled by Administrator</b>");
					echo $userdata['message'];die;
					} else if (count($userdata) >= 1) {
					   //$res = $this->user_model->update_pass($data);
					   $user_info['id'] = $userdata['id'];
                       $user_info['fname'] = $userdata['fname'];
                       $user_info['lname'] = $userdata['lname'];
					   $user_info['display_name'] = $userdata['display_name'];
					   $user_info['unencrypted_password'] = $data['password'];
					   $user_info['email'] = $userdata['email'];
					   $user_info['phone_no'] = $userdata['phone_no'];
					$this->session->set_userdata('userdata', $user_info);
					$userdata = $this->session->userdata('userdata');


						$userdata = array("result" => "success", "message" => "Account Verified");
								echo json_encode($userdata);
							die;
					} else {


					$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
					$data['result']=$userdata['result'];
					$data['message']=$userdata['message'];
				}
			}
		}
			$data["master_title"] = "Login";
			$data["master_body"] = "login";
			$this->load->layout('users', $data);
		}
	
		
		public function logout() {
			$userdata = $this->session->userdata("userdata");
			$this->session->unset_userdata('userdata');
			redirect(BASEURL.'/login');
		}
		
		



/* login user info check function here */

		public function loginusernamevalidity(){


				$username = $this->input->post('email');
					if (!empty($username)) {
						$user = $this->db->select("*")->from("users")->where(array("display_name" => $username, "isDeleted" => 0))->get()->row_array();
						
						if (count($user) == 0) {

							$res= $this->db->select("*")->from("users")->where(array("email" => $username, "isDeleted" => 0))->get()->row_array();
							
							//debug($this->db->last_query());die;
							if (count($res) == 0) {
								echo json_encode(array( 'valid' => false ));
							} else {
									echo json_encode(array( 'valid' => true ));
							}	
							
							} 
							else
							{

								echo json_encode(array( 'valid' => true ));
							}

							
					}		
				
				die;
		}

		public function company_email_verify(){


				$username = $this->input->post('company_email');
					if (!empty($username)) {
						$user = $this->db->select("*")->from("gp_companies")->where(array("company_email" => $username, "isDeleted" => 0))->get()->row_array();
						
						if (count($user) == 0) {

								echo json_encode(array( 'valid' => true ));							
							} 
							else
							{

								echo json_encode(array( 'valid' => false ));
							}

							
					}		
				
				die;
		}
		
		public function update_profile(){

			$userdata = $this->session->userdata('userdata');
			$data = $this->input->post();
			$res =	$this->user_model->update_profile($data);
			if($res){

					$msg = array("result" => "success", "message" => "Profile Updated ");
								echo json_encode($msg);
							die;

				}else{

					$msg = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
					$data['result']=$msg['result'];
					$data['message']=$msg['message'];
				}
		}

/* post job by user */

		public function post_job(){
				$userdata = $this->session->userdata('userdata');
			$data = $this->input->post();
			$res = $this->jobs_model->job_post_user($data);
			//$res =1;
			if($res){



					$template = $this->template_model->get_template(2);
					//	debug($template);die;
					$subjectref = $template['subject'];
					$messagref = $template['description'];
					$messagref = str_replace("#user#", $userdata['fname'] . ' ' . $userdata['lname'], $messagref);
					$messagref = str_replace("#jobtitle#", $data['job_title'], $messagref);
					
					$refralarray['message'] = $messagref;
					$refralarray['subject'] = $subjectref;
					$refralarray['to'] = $userdata['email'];


					//$this->email_model->sendIndividualEmail($refralarray);


					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$subject = $refralarray['subject'];
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->from($this->config->item('emailforcom'), 'Chandigarh Recruiters');
					$this->email->to($data['company_email']);
					$this->email->subject($subject);
					$this->email->message($messagref);
					

					if($this->email->send())
					{

						$res_data = array('notification_name'=>'post_job','username'=>$userdata['display_name'],'user_email'=>$userdata['email'],'company_email'=>$data['company_email']);
							$this->user_model->notification($res_data);



						
						$msg = array("result" => "success", "message" => "Job Posted.", "user_msg"=>"you need to wait for activate this post by admin.");
								echo json_encode($msg);
							die;
					}
					else{

							$msg = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
				echo json_encode($msg);
							die;
					}



					/*$txt = '<h4>Email Related New Post verification</h4><br/>'.
					$txt = '<h3>Thank-You For Submit Post.</h3><br>'.
					$txt = '<p>Job Post Submission Is Pending For Publish When Admin Will No Verified This . Thankyou</p>';

					
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$subject = "Chandigarh Recruiters verification Email";
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->from($this->config->item('emailforcom'), 'Chandigarh Recruiters');
					$this->email->to($data['company_email']);
					$this->email->subject($subject);
					$this->email->message($txt);
					
					if($this->email->send())
					{
						$msg = array("result" => "success", "message" => "Job Posted.", "user_msg"=>"you need to wait for activate this post by admin.");
								echo json_encode($msg);
							die;
					}
					else{

							$msg = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
				echo json_encode($msg);
							die;
					}

				
					*/
			}
			else{

				$msg = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
				echo json_encode($msg);
							die;
			}
		}	


		public function update_job(){

			$data = $this->input->post();
			if(!empty($data)){
			$res = $this->jobs_model->user_update_job($data);
			if($res){

				$msg = array("result" => "success", "message" => "Post Updated");
								echo json_encode($msg);
							die;

			}else{

				$msg = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
				echo json_encode($msg);
							die;

			}
		}else{

			$msg = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
				echo json_encode($msg);
							die;
		}

		}
	}	

	
