<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();
	class flights  extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('flights_model');
			$this->load->helper('url');
		}
		public function index($slug=null) {
		//this function will retrive all entry in the database
		$data['results'] = $this->flights_model->get_all_flights();
		$data['page_title'] = "Flights";
		$data['master_body'] = "index";
		$this->load->layout('blog',$data);
 		}
		public function view($slug=null){
			$this->db->select('*');
			$this->db->where_in('post_slug',array($slug));
			$this->db->where('post_type','blog');
			$this->db->from('gp_post');
			$query = $this->db->get();
			$data['results'] = $query->row_array();
			$this->db->select('post_title,post_slug');
			$this->db->where('post_type','blog');
			$this->db->from('gp_post');
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
					echo "<p class='alert-success' style='  margin-top: 6px;
    padding: 10px;  color: #155724;    background-color: #d4edda; border-color: #c3e6cb;'><strong>You are Subscribe to Our Newsletter</strong></p>";
					die;
				}
			}else{
				echo "<p class='alert-alert' style='margin-top: 6px;
    padding: 10px; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;'><strong>Email Already Exists ! </strong></p>";
					die;				
			}
		}
	}	