<?php
ob_start();

class template_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
	public function get_template_list() {
       return  $this->db->select("*")->from("template")->where(array("status"=>1))->get()->result_array(); 

	}
	public function get_template($id) {
       return $this->db->select("*")->from("template")->where(array("id"=>$id,"status"=>1))->get()->row_array();   
	}
	public function update_template_data($data=array(),$id) {
		$this->db->where('id',$id);
		if($this->db->update('template', $data)){
			return true;
		}else{
			return false;
		}
	}	
	
	
}
