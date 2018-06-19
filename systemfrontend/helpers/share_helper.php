<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('get_shares'))
{
	function get_shares($data=array())
	{
		 $ci=& get_instance();
		 return $share_data = $ci->db->select('entity_id')->from('share')->where(array('entity_id'=>$data['id'],'share_type'=>$data['share_type']))->get()->num_rows();
	}
		function get_user_shares($data=array())
	{
		 $ci=& get_instance();
		 return $share_data = $ci->db->select('entity_id')->from('share')->where(array('user_id'=>$data['user_id'],'entity_id'=>$data['id'],'share_type'=>$data['share_type']))->get()->num_rows();
	}
}
?>