<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        $this->load->model('user_model');
        $data["user_data"]=$this->user_model->get_Users();
        $data["master_title"] = "Send email to users";   // Please enter the title of page......
        $data["master_body"] = "send_email";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme     		
    }
	
	public function send_email_two() {
		$token_response = 0;
		$this->load->model("email_model");
		$email_data = $this->input->post(NULL, FALSE);  
        if(!empty($email_data)){
			$emailarray['backend'] = 'backend';
			$emailarray['message'] = $email_data['description'];
			$emailarray['subject'] = $email_data['subject'];
			$emailarray['to'] = implode(',',$email_data['email']);
			
				$response = $this->email_model->sendIndividualEmail($emailarray);				
			
			    $result['result'] = 'success';
				echo json_encode($result);
				die;

		}		
		
    }
	
	
	public function send_email() {
		$token_response = 0;
		$this->load->model("email_model");
		$email_data = $this->input->post();  
        if(!empty($email_data)){
			$emailarray['backend'] = 'backend';
			$emailarray['message'] = $email_data['description'];
			$emailarray['subject'] = $email_data['subject'];
			
			foreach($email_data['email'] as $key=>$val){
				$emailarray['to'] = $val; 
				$response = $this->email_model->sendIndividualEmail($emailarray);				
			}
			    $result['result'] = 'success';
				echo json_encode($result);
				die;

		}		
		
    }

	
	public function test_email(){
		$post_data = $this->input->post();
		
		$admin_name = $this->config->item("adminname");
		$admin_email = $this->config->item("adminemail");
		$this->load->model('email_model');
		$emailarray['message'] = $post_data['des'];
		$emailarray['subject'] = $post_data['sub'];
		$emailarray['to'] = $post_data['email'];
		$emailarray['from_name'] = $admin_name;
		$emailarray['from_email'] = $admin_email;
		$this->load->model("email_model");
		$this->email_model->sendIndividualEmail($emailarray);
		redirect(BASEURL.'/email/'.$template_data['id']);
		}
	
    	
}
