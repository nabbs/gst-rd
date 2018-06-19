<?php
ob_start();

class Jobs_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    
	public function get_jobs(){
		return $this->db->select('*')->from('gp_jobs')->where(array('status'=>1))->get()->result_array();
	}
	public function insert_job($data) {
		$data['created'] = time();
       return $this->db->insert("gp_jobs",$data);
	}
		
	public function edit_job($data){
		
		$this->db->where(array('id'=>$data['id']));
		unset($data['id']);
		return $this->db->update('gp_jobs',$data);
	}
	
	public function update_jobs($data){
		$this->db->where(array('id'=>$data['id']));
		unset($data['id']);
		return $this->db->update('gp_jobs',$data);
	
	}

	/* job update added by user */

	public function user_update_job($data){
		$this->db->where(array('id'=>$data['id']));
		unset($data['id']);
		$data['modify'] = time();
		return $this->db->update('gp_jobs',$data);
	
	}
/* end job update added by user */

	
	public function changestatus($data){
		
		$this->db->where(array('id'=>$data['id']));
		unset($data['id']);
		return $this->db->update('gp_jobs',$data);	
	}
	
	public function delete_job($id){
		
		$this->db->where(array('id'=>$id));
		return $this->db->delete('gp_jobs');
	
	}
	
	public function get_job_details_by_id($id){
		/* $ip=$_SERVER["REMOTE_ADDR"]; 
		 if($ip=="103.54.100.18"){
			  $this->db->select('*')->from('gp_jobs')->where(array('id'=>$id))->get()->row_array();
			debug($this->db->last_query());die;
		} */
		
		return $this->db->select('*')->from('gp_jobs')->where(array('id'=>$id,'status'=>1))->get()->row_array();	
	}
	

	public function get_job_details_by_user_id($id){

		return $this->db->select('*')->from('gp_jobs')->where(array('user_id'=>$id))->get()->result_array();
	}
	public function get_single_job_byuserid($id){
		return $this->db->select('*')->from('gp_jobs')->where(array('id'=>$id))->get()->row_array();	

	}
/* function used for frontend views*/
	public function get_job_count(){
		return $this->db->select('*')->from('gp_jobs')->where(array('status'=>1))->get()->num_rows();
	}
	
	public function get_all_jobs($limit=null,$start=null){
		if(!empty($limit) || !empty($start)){
			return $this->db->select('*')->from('gp_jobs')->where(array('status'=>1))->order_by('created','DESC')->limit($limit,$start)->get()->result_array();		
		}
		else{
			return $this->db->select('*')->from('gp_jobs')->where(array('status'=>1))->order_by('created','DESC')->get()->result_array();
		}
	}	


	/* backend  job listing */

	public function get_all_jobs_backend($limit=null,$start=null){
		if(!empty($limit) || !empty($start)){
			return $this->db->select('*')->from('gp_jobs')->order_by('created','DESC')->limit($limit,$start)->get()->result_array();		
		}
		else{
			return $this->db->select('*')->from('gp_jobs')->order_by('created','DESC')->get()->result_array();
		}
	}	
	
	
	
	/* functiion for search */
	
	
	
	/* frontend search */
	
	public function get_job_count_search($get_data){
		$query = 'select gp_jobs.* , gp_comapnies.* from gp_comapnies INNER JOIN gp_jobs on gp_jobs.job_company_name = gp_comapnies.id where  gp_jobs.job_title LIKE "%'.$get_data["title"].'%"  AND  gp_comapnies.company_city LIKE "%'.$get_data["city"].'%" AND gp_comapnies.status=1 AND gp_jobs.status=1';
		
		return $this->db->query($query)->num_rows();
		
	}
	public function job_search($data){
$ip=$_SERVER["REMOTE_ADDR"];
		if(!empty($data["city"])){
		
			
			$query = 'select gp_jobs.id as job_id , gp_jobs.job_company_name,  gp_jobs.job_title  ,  gp_jobs.job_description  , gp_jobs.job_type ,  gp_comapnies.* from gp_comapnies 
			INNER JOIN gp_jobs on 
			gp_jobs.job_company_name = gp_comapnies.id 
			where  gp_jobs.job_title LIKE "%'.$data["title"].'%"  AND
			gp_comapnies.company_city LIKE "%'.$data["city"].'%" OR 
			gp_jobs.job_description LIKE "%'.$data["title"].'%"  AND 
			gp_comapnies.company_city LIKE "%'.$data["city"].'%"';
		}else{
	  $query = 'select gp_jobs.id as job_id , gp_jobs.job_company_name,  gp_jobs.job_title  ,  gp_jobs.job_description  , gp_jobs.job_type , gp_comapnies.* from gp_comapnies 
			INNER JOIN gp_jobs on 
			gp_jobs.job_company_name = gp_comapnies.id where  
			gp_jobs.job_title LIKE "%'.trim($data["title"]).'%" OR 
			gp_jobs.job_description LIKE "%'.trim($data["title"]).'%" OR
			gp_jobs.job_required_skills LIKE "%'.trim($data["title"]).'%" ';
		
		
		}
		$query .= 'AND gp_comapnies.status=1 AND gp_jobs.status=1 LIMIT '.$data["offset"].','.$data["per_page"];
		
			 
		
		
		 return  $this->db->query($query)->result_array();
		
		
		
		
		
		}
		
	/* job category */
	public function get_categories(){
	return $this->db->select('*')->from('gp_job_category')->order_by('created','DESC')->get()->result_array();
	
	}
	public function add_new_category($data){
    	$data['status'] =  1;
    	$data['created'] = time();

    	//debug($data);die;

		return $this->db->insert('gp_job_category',$data);
		//debug($this->db->last_query());die;
    }
		
	/* post by users */

	public function job_post_user($data){
		$data['status'] = 0;
		$data['created'] = time();
		unset($data['company_email']);
		return  $this->db->insert('gp_jobs',$data);
		
 	}

	
}
