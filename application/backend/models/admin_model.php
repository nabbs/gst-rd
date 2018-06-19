<?php
ob_start();

class admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function get_admin(){
	    $get_admin = array();
        $get_admin['admin_first'] = $this->db->select("*")->from("admins")->where(array("id"=>1))->get()->row_array();
        $get_admin['admin_second'] = $this->db->select("*")->from("admins")->where(array("id"=>2))->get()->row_array();
		return $get_admin;
    }
	
	public function get_admin_details(){
	
	$admin_details = $this->db->select("*")->from("admins")->where(array("id"=>1))->get()->row_array();
	  return $admin_details;
	}
	

}
