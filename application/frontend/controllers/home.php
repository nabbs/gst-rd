 <?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();
	class Home extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->helper('user');
			$this->load->library("pagination");
			
		}
		
		public function index() {
		  
			$query = $this->db->select('*');
			$this->db->from('gp_hotdeals');
			$query = $this->db->get();			
			$data['hotdeals'] = $query->result_array();
			
			$query = $this->db->select('*');
			$this->db->from('blogs');
			$this->db->where(array('post_type'=>'blog'));
			$query = $this->db->get();			
			$data['blogs'] = $query->result_array();
			
			$query = $this->db->select('*');
			$this->db->from('gp_topdestinations');
			$query = $this->db->get();
			$data['topdestinations'] = $query->result_array();
			
			$this->db->select('city');
                 $this->db->distinct();
			$this->db->from('gp_topdestinations');
			$query = $this->db->get();
			$data['topdestinationscity'] = $query->result_array();
			
			$query = $this->db->select('*');
		$this->db->from('sliders_tb');
		$query = $this->db->get();
		$data['sliders'] = $query->result_array();

		
			
			$data['page_title'] = "Home";
			$data['master_body'] = "index";
			$this->load->layout('home',$data);
 		}
	
	
	
	
		public function error(){
			$data['page_title'] = "Sorry ! Page Not Found";
			$data['master_body'] = "error";
			$this->load->layout('home',$data);
			
			
		}
		
		
		public function about_us(){	
			$data['userdata']  = $this->session->userdata('userdata');
			
			
			$data['page_title'] = "About";
			$data['master_body'] = "about";
			   $data['page']='about';
			$this->load->layout('home',$data);
		}
		
			public function  privacy_policy(){	
			$data['userdata']  = $this->session->userdata('userdata');
			$data['page_title'] = "Privacy and Policy";
			$data['master_body'] = "privacy_policy";
			   $data['page']='privacy-policy';
			$this->load->layout('home',$data);
		     }
			 public function cookies_policy(){	
			$data['userdata']  = $this->session->userdata('userdata');
			$data['page_title'] = "Cookie";
			$data['master_body'] = "cookie";
			   $data['page']='cookie';
			$this->load->layout('home',$data);
		     }

			 	public function support(){		
			$data['userdata']  = $this->session->userdata('userdata');	
			$data['page_title'] = "Support";
			$data['master_body'] = "support";
			$data['page']='support';
			$this->load->layout('home',$data);
		}
			 
			 
		public function contact(){		
			$data['userdata']  = $this->session->userdata('userdata');	
			$data['page_title'] = "Contact";
			$data['master_body'] = "contact";
			$this->load->layout('home',$data);
		}
		
		
		public function send_email(){

			$data = $this->input->post();
			
			$txt = '<b>Full Name :</b> '.$data['name'].'<br/>'.
			$txt = '<b>Email Id :</b> '.$data['email'].'<br/>'.
			$txt = '<b>Phone :</b> '.$data['phone'].'<br/>'.
			$txt = '<h4>'.$data['message'].'</h4><br/>';
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			$subject = "Query";
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from($data['email']);
			$this->email->to($this->config->item('email'));
			$this->email->subject($subject);
			$this->email->message($txt);						
			if($this->email->send())
			{
			echo 'Email send.';
			}
			else
			{
			show_error($this->email->print_debugger());
			}

			
			
			
			
		}
		
	}	
