<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('template_model');
         }

    public function index() {
        $this->load->model('template_model');
        $data["template_data"]=$this->template_model->get_template_list();		
        $data["master_title"] = "Manage Templates";
        $data["master_body"] = "template"; 
        $this->load->theme('mainlayout', $data);     		
    } 		 public function add_template(){                        @$reqData = $this->input->post();          		if(!empty($reqData)){            $response = $this->db->insert('template',$reqData);				redirect(BASEURL.'/template');		   }    	        $data["master_title"] = "Add Template";        $data["master_body"] = "add_template";         $this->load->theme('mainlayout', $data);   }   
	public function edit_template($id) {
	//print_r($_SERVER['REDIRECT_QUERY_STRING']);
        $this->load->model('template_model');
        $data["template_data"]=$this->template_model->get_template($id);
		
        $updatetemplate_data = $this->input->post();
		if(!empty($updatetemplate_data)){
            // $updatetemplate_data['description'] = str_replace(array("<br/>"),"",$updatetemplate_data['description']);
            $response = $this->template_model->update_template_data($updatetemplate_data,$id);
            if(!empty($response)){
				$result['result'] = 'success';
				  // echo json_encode($result);
				 				
				}else{
				   $result['result'] = 'error';
				   //echo json_encode($result);
				   		
				}
				redirect(BASEURL.'/'.$_SERVER['REDIRECT_QUERY_STRING']);
		   }
    	
        $data["master_title"] = "Edit Template";
        $data["master_body"] = "edit_template"; 
        $this->load->theme('mainlayout', $data);     		
    }
	public function delete($id){		$this->db->where('id', $id);			$this->db->delete('template');	redirect(BASEURL.'/template/');	}
	public function subscribers(){
	
	
	$this->db->select('*');
			
			$this->db->from('gp_subscription');
			$query = $this->db->get();
			$data['subscribers'] = $query->result_array();	
	        
	$data["master_title"] = "Subscribers";
        $data["master_body"] = "subscribers"; 
        $this->load->theme('mainlayout', $data);
	}
	public function remove_subscriber($id){
	
	$this->db->where('id', $id);
			$this->db->delete('gp_subscription');
	redirect(BASEURL.'/template/subscribers');
	}
	
	   public function test_mail($id){
   
   $template=$this->template_model->get_template($id); 

   //$replace=array('#user#');
   //$from=array('Admin');
   //$template['description'];
   
  $to      = 'nabiarshad@gmail.com';
$subject = $template['subject'];
$message = $template['description'];
$headers = 'From: admin@gosearh.com' . "\r\n" .
    'Reply-To: webmaster@goseach.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   if(mail($to, $subject, $message, $headers)){
    $this->session->set_flashdata('success_msg','Mail sent');
   } else{
	$this->session->set_flashdata('error_msg','There is some error not sent mail'); 
	}
	
	redirect(BASEURL.'/template/');
	
   }
   
   public function duplicate($id){
   
   $data["template_data"]=$this->template_model->get_template($id);
		
        $reqData = $this->input->post();
		if(!empty($reqData)){
            
            $response = $this->db->insert('template',$reqData);
            if(!empty($response)){
				$result['result'] = 'success';
				  // echo json_encode($result);
				 				
				}else{
				   $result['result'] = 'error';
				   //echo json_encode($result);
				   		
				}
				redirect(BASEURL.'/template');
		   }
    	
        $data["master_title"] = "Edit Template";
        $data["master_body"] = "duplicate"; 
        $this->load->theme('mainlayout', $data);
   
   
   }
   
   
   public function sendmailsubscribe($id){
   
   
   $data["template_data"]=$this->template_model->get_template($id);
   $this->db->select('*');
			
			$this->db->from('gp_subscription');
			$query = $this->db->get();
			$data['subscribers'] = $query->result_array();	
		
        $reqData = $this->input->post();
		if(!empty($reqData)){
            
            $response = $this->db->insert('template',$reqData);
            if(!empty($response)){
				$result['result'] = 'success';
				  // echo json_encode($result);
				 				
				}else{
				   $result['result'] = 'error';
				   //echo json_encode($result);
				   		
				}
				redirect(BASEURL.'/template');
		   }
    	
        $data["master_title"] = "Mail To Single Subscriber";
        $data["master_body"] = "sendmailsubscribe"; 
        $this->load->theme('mainlayout', $data);
   
   
   }
   
   public function mailtosubscriber($id){
   $template=$this->template_model->get_template($id);
    $template=$reqData = $this->input->post();

		if(!empty($reqData)){
  $to      = $template['subscriber_mail'];;
$subject = $template['subject'];
$message = $template['description'];
$headers = 'From: admin@gosearh.com' . "\r\n" .
    'Reply-To: webmaster@goseach.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   if(mail($to, $subject, $message, $headers)){
    $this->session->set_flashdata('success_msg','Mail sent');
   } else{
	$this->session->set_flashdata('error_msg','There is some error not sent mail'); 
	}

		}
   redirect(BASEURL.'/template');
   }
   
   public function view_email_list(){
   
   $this->db->select('*');
			
			$this->db->from('subscription_list');
			$query = $this->db->get();
			$data['mail_list'] = $query->result_array();
   
    $data["master_title"] = "View Mailing List";
        $data["master_body"] = "view_email_list"; 
        $this->load->theme('mainlayout', $data);
   }
   
   
   public function create_list(){
   
   $this->db->from('gp_subscription');
			$query = $this->db->get();
			$data['subscribers'] = $query->result_array();	
			 $reqData = $this->input->post();
			
			if(!empty($reqData)){
			
			$data=array('name'=>$reqData['list_name'],'subscritption_emails'=>implode(',',$reqData['subscriber_mail']));
            
            $response = $this->db->insert('subscription_list',$data);
            if(!empty($response)){
				$result['result'] = 'success';
				  // echo json_encode($result);
				 				
				}else{
				   $result['result'] = 'error';
				   //echo json_encode($result);
				   		
				}
				redirect(BASEURL.'/template/view_email_list');
		   }
   
   $data["master_title"] = "Create Mailing List";
        $data["master_body"] = "create_list"; 
        $this->load->theme('mainlayout', $data);
   }
   

public function edit_email_list($id){
$this->db->from('gp_subscription');
			$query = $this->db->get();
			$data['subscribers'] = $query->result_array();	
			
	    $this->db->select('*');
			$this->db->where('id', $id);
			$this->db->from('subscription_list');
			$query = $this->db->get();
			$data['sub_mail'] = $query->row_array();
			
			$reqData = $this->input->post();
			if(!empty($reqData)){
			
			$data=array('name'=>$reqData['list_name'],'subscritption_emails'=>implode(',',$reqData['subscriber_mail']));
            $this->db->where('id', $id);
            $response = $this->db->update('subscription_list',$data);
            if(!empty($response)){
				$result['result'] = 'success';
				  // echo json_encode($result);
				 				
				}else{
				   $result['result'] = 'error';
				   //echo json_encode($result);
				   		
				}
				redirect(BASEURL.'/template/view_email_list');
		   }
		
			
	$data["master_title"] = "Edit Mailing List";
        $data["master_body"] = "edit_email_list"; 
        $this->load->theme('mainlayout', $data);
	}
   
   
   
   public function sendtolist($id){
   
   
   $data["template_data"]=$this->template_model->get_template($id);
   $this->db->select('*');
			
			$this->db->from('subscription_list');
			$query = $this->db->get();
			$data['list'] = $query->result_array();	
		
         $template=$reqData = $this->input->post();
		if(!empty($reqData)){
      
		 $this->db->select('*');
			$this->db->where('id', $reqData['list_id']);
			$this->db->from('subscription_list');
			$query = $this->db->get();
			$maillist=$query->row_array();
   $mails=explode(',',$maillist['subscritption_emails']);   foreach($mails as $email){      $to      = $email;
$subject = $template['subject'];
$message = $template['description'];
$headers = 'From: admin@gosearh.com' . "\r\n" .
    'Reply-To: webmaster@goseach.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  mail($to, $subject, $message, $headers);
 }
		
   redirect(BASEURL.'/template');
   
		   }
    	
        $data["master_title"] = "List Mail";
        $data["master_body"] = "sendtolist"; 
        $this->load->theme('mainlayout', $data);
   
   
   }
   
   
	
   
   
	
	
	
 public function remove_email_list($id){
	
	$this->db->where('id', $id);
			$this->db->delete('subscription_list');
	redirect(BASEURL.'/template/view_email_list');
	}
	
}
