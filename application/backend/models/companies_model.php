<?php
ob_start();

class Companies_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	public function get_comapnies_lists($limit=null,$start=null)
	{
		 return $this->db->select('*')->from('gp_comapnies')->order_by('created','DESC')->limit($limit,$start)->get()->result_array();
	}

	public function get_comapnies_for_job(){
			return $this->db->select('*')->from('gp_comapnies')->order_by('created','DESC')->get()->result_array();

	}
    
	public function insert_company($data) {
		$data['created'] = time();
		return $this->db->insert('gp_comapnies',$data);			
	}
	
	public function edit_company($data){
		
		$this->db->where(array('id'=>$data['id']));
		unset($data['id']);
		return $this->db->update('gp_comapnies',$data);
	}
	
	
	public function changestatus($data){
		
		$this->db->where(array('id'=>$data['id']));
		//unset($data['id']);
		if($this->db->update('gp_comapnies',$data)){
                $this->db->where(array('job_company_name'=>$data['id']));
		unset($data['id']);
		return $this->db->update('gp_jobs',$data);	
                }

	}
	
	public function delete_company($id){
		$this->db->where(array('id'=>$id));
		return $this->db->delete('gp_comapnies');
	}
	
 /* function used by helper */
	public function get_company_details_by_id($id_array){
		if(!$id_array['user_id']){

				return  $this->db->select('*')->from('gp_comapnies')->where(array('id'=>$id_array['id'], 'status'=>1))->get()->row_array();
			
		}else{

			 return  $this->db->select('*')->from('gp_comapnies')->where(array('user_id'=>$id_array['user_id'], 'status'=>1))->get()->row_array();
			
		}
				
			}
	
	
	public function job_companies_count(){
		return  $this->db->select('*')->from('gp_comapnies')->where(array('status'=>1))->get()->num_rows();
	}

	
	public function get_company_details_user_id($id){
		return $this->db->select("*")->from('gp_comapnies')->where(array('user_id'=>$id))->get()->row_array();		
	}
	
	public function post_by_companies(){
		return $this->db->select()->from('gp_jobs')->where(array('user_id <>'=>0,'status'=>0))->get()->result_array();

	}

	public function pending_post_count(){

		return $this->db->select()->from('gp_jobs')->where(array('user_id <>'=>0,'status'=>0))->get()->num_rows();
	}

}
