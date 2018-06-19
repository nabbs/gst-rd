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
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Get "now" time
 *
 * Returns time() or its GMT equivalent based on the config file preference
 *
 * @access	public
 * @return	integer
 */
if ( ! function_exists('fetch_cms_data'))
{
	function fetch_cms_data($page_content_type=null)
	{
            $CI =& get_instance();
            $data=$CI->db->select("*")->from("cms_pages")->where(array("content-type"=>$page_content_type))->get()->row_array();
            return $data;
	}
        
        function get_visibility($visibility_id=null)
	{
            $namearray=array('1'=>'Visible','0'=>'Hidden');
            return $namearray[$visibility_id];
	}
        
        function update_user_session($user_id=null){
            $CI =&get_instance();
            $data=$CI->db->select("*")->from("users")->where(array("id"=>$user_id))->get()->row_array();
            $CI->session->set_userdata('userdata',$data);
        }
        
        function check_session_and_exit(){
            $CI =&get_instance();
            $userdata=$CI->session->userdata("userdata");
             
            
            if(empty($userdata)){
                $CI->session->set_flashdata("success_msg",INVALID_MSG);
                redirect(BASEURL.'/users/login');die;
            }            
        }
        
        function only_without_session_page(){
            $CI =& get_instance();
            $userdata=$CI->session->userdata("userdata");
            if(!empty($userdata)){
                redirect(BASEURL.'/account/dashboard');die;
            }    
        }
        function get_plan(){
			  $ci=& get_instance();
			  $ci->load->model('myplan_model');
			  $userdata= $ci->session->userdata("userdata");
			  $plan_data = $ci->myplan_model->get_plan($userdata);
              return;
	    }
		function build_profile_to_execute(){
			  $ci=& get_instance();	  
			  $ci->load->model('user_survey_model');
			  $userdata = $ci->session->userdata("userdata");
			  $survey_data = $ci->user_survey_model->get_client_survey($userdata);
              if(empty($survey_data)){

				 redirect(BASEURL.'/users/profile_builder');  
			  }
	    }
   






   
}
/* End of file data_helper.php */
/* Location: ./system/helpers/date_helper.php */
