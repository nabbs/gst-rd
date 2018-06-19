<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_company_details_by_id($id){
	  $ci=& get_instance();
	  $ci->load->model('companies_model');
	  return $ci->companies_model->get_company_details_by_id($id);
	}
	/* get company details by user id */

	function get_company_details_user_id($id){
	  $ci=& get_instance();
	  $ci->load->model('companies_model');
	  return $ci->companies_model->get_company_details_user_id($id);
	}

	function get_job_details_by_id($id){
	  $ci=& get_instance();
	  $ci->load->model('jobs_model');
	  return $ci->jobs_model->get_job_details_by_id($id);
	}
	
	function get_total_applications(){
		$ci=& get_instance();
		$ci->load->model('job_application_model');
		return $ci->job_application_model->get_total_applications();
	}

/* user job details for frontend*/


	function get_job_details_by_user_id($id){
	  $ci=& get_instance();
	  $ci->load->model('jobs_model');
	  return $ci->jobs_model->get_job_details_by_user_id($id);
	}

	
/* End code for user job details for frontend*/


	function get_single_job_byuserid($id){
	  $ci=& get_instance();
	  $ci->load->model('jobs_model');
	  return $ci->jobs_model->get_single_job_byuserid($id);
	}

	function get_Users_details($id){
		$ci=& get_instance();
	  $ci->load->model('user_model');
	  return $ci->user_model->get_Users_details($id);

	}
?>