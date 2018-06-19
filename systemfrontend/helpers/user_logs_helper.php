<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function user_log(){
	
	 $ci=& get_instance();
	
	 $ci->load->model('user_logs_model');

	$userdata = $ci->session->userdata("userdata"); 
		
	$ci->load->library('Mobile_Detect');
			
	$detect = new Mobile_Detect();
	
	$deviceType = ($detect->isMobile() ?( $detect->isTablet() ? 'tablet' : 'Mobile'): 'computer');

	$data = array();
	
	$data['user_id'] = $userdata['id'];
	$data['user_name'] = $userdata['display_name'];
	$data['device_type'] = $deviceType;
	// Next up, we want to know what page we're on, use the router class
	$data['section'] = $ci->router->class;

	$data['action'] = $ci->router->method;

	// Lastly, we need to know when this is happening
	$data['when'] = time();

	// We don't need it, but we'll log the URI just in case
	$data['url'] = current_url();
	// And write it to the database

	$ci->user_logs_model->insert_user_log($data);

	

	}