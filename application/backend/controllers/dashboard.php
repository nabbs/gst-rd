<?php

/*
 * Dashboard.php
 * Created by : Mr.Gurpreet Singh
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle the dashboard the admin and all the data coming over it.
 * */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// require_once(FRONT_BASE_URL.'/en/wp-load.php');
// define('WP_USE_THEMES',TRUE);
class dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        
    }

    /*
     * Dashboard.php
     * Function :index
     * Created by : Mr.Gurpreet Singh
     * Created on: 9 Feb,2015
     * Purpose: Function server the main landing page functionality when admin gets logged in
     * */

    public function index() {
	
	// Code for update db with .sql file
	$currentuserdata=$this->session->userdata['userdata'];

	if(!$currentuserdata){
	redirect(BASEURL.'/login','refresh');
	}
	$path    = FCPATH.'db';
	$files = scandir($path);
	$files = array_diff(scandir($path), array('.', '..'));
	
	$get_files = $this->db->select('file_name');
	$this->db->from('gp_db_updates');
	$this->db->where('status',1);
	$get_files = $this->db->get();

	$res = $get_files->result_array();
	foreach($res as $key=>$val){
		foreach($files as $k=>$v){
			if($v==$val['file_name']){
				$pos = array_search($v,$files);		
				unset($files[$pos]);
			}
		}

	}

	foreach($files as $key=>$val){
		$verify = $this->db->select('file_name');
		$this->db->from('gp_db_updates');
		$this->db->where('file_name',$val);
		$verify = $this->db->get();
		
		if($verify->num_rows < 1){
			$this->db->insert('gp_db_updates',['file_name'=>$val]);
		}
		$read = file_get_contents($path.'/'.$val);
		
		$query = $this->db->query($read);
		
		if($query){
			$sendData = ['status'=>$query]; 
			$this->db->where('file_name',$val);
			$this->db->update('gp_db_updates',$sendData);			
		}
		
	}
	
	   /*********count hajj*******/
	 $data['totalhajj']=$this->db->from("gp_hajj")->count_all_results();
	 $data['totalUmrah']=$this->db->from("gp_umrah")->count_all_results();
	  $data['totalBlog']=$this->db->from("blogs")->count_all_results();
	 $data['totalusers']=$this->db->from("users")->count_all_results();
	
	$data["master_title"] = "Dashboard";   // Please enter the title of page......
	$data["master_body"] = "dashboard";   // Please enter the body of page......
	$data['userdata'] = $this->session->userdata('userdata');
	$this->load->theme('mainlayout', $data);  // Loading theme		
    }

    /*
     * Dashboard.php
     * Function :logout
     * Created by : Mr.Gurpreet Singh
     * Created on: 9 Feb,2015
     * Purpose: Function server log out functionality of the Admin panel
     * 
	 public function view() {
        en();
		ob_start();
		include('en/wp-includes/template-loader.php');
		$template= ob_get_clean();
		$this->loadBlogContent($template);
    }*/
    public function logout() {
        $this->session->unset_userdata('userdata');
        delete_cookie('user_cookie');
		
             redirect(BASEURL.'/login','refresh');
	
    }

}
