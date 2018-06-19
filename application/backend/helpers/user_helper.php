<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_company_details_by_id($id_array){
		//debug($id_array);
	  $ci=& get_instance();
	  $ci->load->model('companies_model');
	  return $ci->companies_model->get_company_details_by_id($id_array);

	}

	

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


	function pending_post_count(){
		$ci=& get_instance();
		$ci->load->model('job_application_model');
		return $ci->companies_model->pending_post_count();;

	}


?>