<?php

/*
 * Settings.php
 * Created by : Mr.Gurpreet Singh
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle Admin profile related information
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class security_question extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('security_question_model');
		
    }
	
	public function index()
	{	$data['all_questions'] = $this->security_question_model->get_all_question();
		$data["master_title"] = "Manage Question's";  
		$data["master_body"] = "index";   
		$this->load->theme('mainlayout', $data);

	}
	public function add_question()
	{	
		$data = $this->input->post();
		if(!empty($data)){
		
			$res = $this->security_question_model->insert_question($data);
			if($res){
			redirect(BASEURL.'/security_question');
			
			}
		}
		$data["master_title"] = "Add Question's";  
		$data["master_body"] = "add_question";   
		$this->load->theme('mainlayout', $data);

	}
	public function edit_question($id=null)
	{	
		$data = $this->input->post();
		if(!empty($data)){
			
			$res = $this->security_question_model->edit_question($data);
			if($res){
			redirect(BASEURL.'/security_question');
			
			}
		}
	 	$data['question_detail'] = $this->security_question_model->get_question_by_id($id);
		$data["master_title"] = "Edit Question's";  
		$data["master_body"] = "edit_question";   
		$this->load->theme('mainlayout', $data);

	}
	public function delete_question($id=null)
	{	
		if(!empty($id)){
		
			$res = $this->security_question_model->delete_question($id);
			if($res){
			redirect(BASEURL.'/security_question');
			
			}
		}


	}
	
}	