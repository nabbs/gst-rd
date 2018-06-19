<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getfamilyinsurance($id=null)
	{		
		$CI =& get_instance();
		$insurance_count = $CI->db->select("*")->from("family_insurance")->where(array("family_member_id"=>$id))->get()->num_rows();
        return $insurance_count;
	}
	
	

?>