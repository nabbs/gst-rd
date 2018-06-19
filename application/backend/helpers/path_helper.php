<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Path Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/xml_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Set Realpath
 *
 * @access	public
 * @param	string
 * @param	bool	checks to see if the path exists
 * @return	string
 */
if ( ! function_exists('set_realpath'))
{
	function set_realpath($path, $check_existance = FALSE)
	{
		// Security check to make sure the path is NOT a URL.  No remote file inclusion!
		if (preg_match("#^(http:\/\/|https:\/\/|www\.|ftp|[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})#i", $path))
		{
			show_error('The path you submitted must be a local server path, not a URL');
		}

		// Resolve the path
		if (function_exists('realpath') AND @realpath($path) !== FALSE)
		{
			$path = realpath($path).'/';
		}

		// Add a trailing slash
		$path = preg_replace("#([^/])/*$#", "\\1/", $path);

		// Make sure the path exists
		if ($check_existance == TRUE)
		{
			if ( ! is_dir($path))
			{
				show_error('Not a valid path: '.$path);
			}
		}

		return $path;
	}
	
	function get_user_paths($data=array())
	{
	      $ci=& get_instance();
		return  $user_path_Data = $ci->db->select('*')->from('path')->join('path_members','path_members.path_id=path.id')->where(array('path.id'=>$data['id']))->get()->result_array();

	}
	function get_detail_data()
	{
	      $ci=& get_instance();
//		 $data['userdata'] = $this->session->userdata("userdata");
  //       $sessiondata = $data['userdata'];
	//	return   $detail_Data = $ci->db->select('*')->from('path')->join('path_members','path_members.path_id=path.id')->join('user_relations','path_members.members_id=user_relations.id')->where(array("user_relations.user_id"=>$sessiondata['id']))->get()->result_array();

	}
	
}


/* End of file path_helper.php */
/* Location: ./system/helpers/path_helper.php */