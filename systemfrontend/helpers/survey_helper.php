<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function get_edit_acomplish($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('user_survey_model');
	  return $edit_acomplish= $ci->user_survey_model->get_edit_acomplish($data);
	}
	function get_edit_concerns($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('user_survey_model');
	  return $edit_concerns= $ci->user_survey_model->get_edit_concerns($data);
	}
	function get_edit_medications($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('user_survey_model');
	  return $edit_medications= $ci->user_survey_model->get_edit_medications($data);
	}	
	function get_edit_activities($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('user_survey_model');
	  return $edit_activities= $ci->user_survey_model->get_edit_activities($data);
	}	
	function get_edit_food_beverage($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('user_survey_model');
	  return $edit_food_beverage= $ci->user_survey_model->get_edit_food_beverage($data);
	}


?>