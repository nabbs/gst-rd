<?php
ob_start();

class job_application_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
	public function job_applications($data){
		$res_array = array('job_id'=>$data['job_id'],
							'full_name'=>$data['name'],
							'email_id'=>$data['email'],
							'phone_no'=>$data['phone'],
							'created'=>time(),
							'resume'=>$data['file_name']['upload_data']['file_name'],
							'file_path'=>$data['file_name']['upload_data']['full_path'],
							'file_type'=>$data['file_name']['upload_data']['file_type']);
		return $this->db->insert('gp_job_applications',$res_array);		
	}
	
	public function get_total_applications(){

		return $this->db->select('*')->from('gp_job_applications')->where('status',1)->get()->num_rows();
		
	}
	
	
	/* job filled */
	public function filled_jobs_count()	{	
		return 	$this->db->select("*")->from('gp_job_applications')->get()->num_rows();
	}
	public function filled_jobs($limit,$offset){
		
	return 	$this->db->select("*")->from('gp_job_applications')->LIMIT($limit,$offset)->get()->result_array();
		
	}
	
}
