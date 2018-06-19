<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
        function check_if_step_checked($step_id,$user_id){
              $ci=& get_instance();
              $ci->load->model('step_data_model');
              return $get_step_username = $ci->step_data_model->check_if_step_checked($step_id,$user_id);
        }
		
	function perview_step_data($user_id){
		$ci=& get_instance();
          $ci->load->model('step_data_model');
		return $get_step_username = $ci->step_data_model->perview_step_data($user_id);
	}  	

	function check_if_user_refered($step_id,$refered_id){
	      $ci=& get_instance();
              $ci->load->model('step_data_model');
              return $get_step_username = $ci->step_data_model->check_if_user_refered($step_id,$refered_id);
        }
		
	function step_default_link($step_id){		
	      $ci=& get_instance();
              $ci->load->model('step_data_model');
              return $get_step_link = $ci->step_data_model->step_default_link($step_id);
        }
		

        function get_next_step($current_step_id,$refered_by){
              $ci=& get_instance();
              $ci->load->model('step_data_model');
              return $get_step_username = $ci->step_data_model->get_next_step($current_step_id,$refered_by);
        }

function current_step_save($step_id=null){
$ci=& get_instance();
$stepsarray=$ci->config->item('stepsarray');
return $stepsarray[$step_id];

}


	function ckeck_step_username($data){
	  $ci=& get_instance();
	  $ci->load->model('step_data_model');
	  return $get_step_username = $ci->step_data_model->get_step_username($data);
	}
		
	function ckeck_step_username_ref($data,$reference_by){
	  $ci=& get_instance();
	  $ci->load->model('step_data_model');
	  return $get_step_username_ref = $ci->step_data_model->ckeck_step_username_ref($data,$reference_by);
	}
		
	function get_step_name($data){
	  $ci=& get_instance();
	  $ci->load->model('step_data_model');
	  return $get_step_name= $ci->step_data_model->get_step_name($data);
	}
			
	function get_step_video($data){
	  $ci=& get_instance();
	  $ci->load->model('step_data_model');
	  return $get_step_video= $ci->step_data_model->get_step_video($data);
	}
	function get_NWC_Link($data){
	  $ci=& get_instance();
	  $ci->load->model('step_data_model');
	  return $_get_NWC= $ci->step_data_model->get_NWC_Link($data);
	}	
	function get_4CA_Link($data){
	  $ci=& get_instance();
	  $ci->load->model('step_data_model');
	  return $_4CA_Link= $ci->step_data_model->get_4CA_Link($data);
	}
	
?>