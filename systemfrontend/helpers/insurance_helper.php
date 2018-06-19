<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getfamilyinsurance($id=null)
	{
		echo $id;
		die;
		$insurance = $this->db->select("*")->from("family_insurance")->where(array("family_member_id"=>$id))->get()->row_array();
		echo "<pre>";
		print_r($insurance);
		echo "<pre>";
		die;
        return $insurance;

	}
	
	
?>