<?php  
	 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	function get_value_by_keyConfig($data){
	
	   $ci=& get_instance();
	  $ci->load->model('user_model');
	  return $config_data= $ci->user_model->get_configdata($data);
		}
		function get_data_Config(){
		  $ci=& get_instance();
		  $ci->load->model('user_model');
		  return $config_data= $ci->user_model->get_data_Config();
		}
		
	
	?>