<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();
	class blog  extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('blog_model');
			$this->load->model('template_model');
			$this->load->helper('url');
			
		}
		
		
		
		
		public function index($slug=null) {
		
		//this function will retrive all entry in the database
		//$data['results'] = $this->blog_model->get_all_post();
		 $query = $this->db->select('*');
			$this->db->from('blogs');
			$this->db->where(array('post_type'=>'blog'));
			$query = $this->db->get();			
			$data['results'] = $query->result();
		
		$data['page_title'] = "Blog";
		$data['master_body'] = "index";
		$this->load->layout('blog',$data);
 		}
		
		public function view($slug=null){
			// query for get blog view cotent
			$this->db->select('*');
			$this->db->where_in('post_slug',array($slug));
			$this->db->where('post_type','blog');
			$this->db->from('blogs');
			$query = $this->db->get();
			$data['results'] = $query->row_array();
			
			// query for get viewing comments
			$this->db->select('*');
			$this->db->where('blog_id',$data['results']['id']);
			$this->db->from('gp_comments');
			$query = $this->db->get();
			$data['comments'] = $query->result_array();
		
			$this->db->select('*');
			$this->db->where('id != ',$data['results']['id']);
			$this->db->from('blogs');
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			$data['recent_posts'] = $query->result_array();
				
			$data['page_title'] = $data['results']['post_title'];
			$data['master_body'] = "view";
			$this->load->layout('blog',$data);
			
		}
		
		
		public function subscription(){
			$reqData = $this->input->post();
			
			$this->db->select('*');
			$this->db->where('email',$reqData['email']);
			$this->db->from('gp_subscription');
			$query = $this->db->get();
			$res = $query->num_rows();	
			
			if($res<=0){
				$sendData = ['email'=>$reqData['email'],'created'=>time(),'modified'=>time()];
				
				if($this->db->insert('gp_subscription',$sendData)){
				
				          $template=$this->template_model->get_template(1);    
  $to      = $reqData['email'];
$subject = $template['subject'];
$message = $template['description'];
$headers = 'From: admin@gosearh.com' . "\r\n" .
    'Reply-To: webmaster@goseach.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   mail($to, $subject, $message, $headers);
				
					echo "<p class='alert-success' style='  margin-top: 6px;
    padding: 10px;  color: #155724;    background-color: #d4edda; border-color: #c3e6cb;'><strong>You are Subscribe in Our Newsletter</strong></p>";
					die;
				}
			}else{
				echo "<p class='alert-alert' style='margin-top: 6px;
    padding: 10px; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;'><strong>Email Already Exists ! </strong></p>";
					die;				
			}
		}
		
		
		public function comment(){
			
			$reqData = $this->input->post();
			$sendData = ['blog_id'=>$reqData['blog_id'],'name'=>$reqData['your-name'],'email'=>$reqData['email'],'comment'=>$reqData['comment-area'],'comment-type'=>$reqData['comment-type'],'created'=>time()];
			$data = $this->db->insert('gp_comments',$sendData);
			redirect($_SERVER['HTTP_REFERER']);
		}
	
	
		
	}	
