<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_sponsor_details($field,$where){
	  $ci=& get_instance();
	  $ci->load->model('user_model');
	  return $sponsor_data= $ci->user_model->get_sponsor_details($field,$where);
	}

	function get_total_credits($where){
	  $ci=& get_instance();
	  $ci->load->model('user_model');
	  return $credits_data= $ci->user_model->get_total_credits($where);
	}

        function check_user_data($refered_by=null){
          $ci=& get_instance();
	  $ci->load->model('user_model');
          return $ci->user_model->check_user_data($refered_by);
        }
		
      function get_user_image($userid=null){
          $ci=& get_instance();
	      $ci->load->model('profile_model');
          return $ci->profile_model->get_user_image($userid);
        }	

        function status_link_rotator($userid=null){
          $ci=& get_instance();
	      $ci->load->model('user_model');
          return $ci->user_model->status_link_rotator($userid);
        }	
		
		function status_auto_responder($userid=null){
          $ci=& get_instance();
	      $ci->load->model('user_model');
          return $ci->user_model->status_auto_responder($userid);
        }			
		function retail_auto_responder($userid=null){
          $ci=& get_instance();
	      $ci->load->model('user_model');
          return $ci->user_model->retail_auto_responder($userid);
        }			
		function recruiting_auto_responder($userid=null){
          $ci=& get_instance();
	      $ci->load->model('user_model');
          return $ci->user_model->recruiting_auto_responder($userid);
        }	
	    function get_landing_link($referal_data='smgroup'){
          $ci=& get_instance();
	      $ci->load->model('capture_pages_model');
          return $ci->capture_pages_model->fetch_referal_data_link($referal_data);
        }	
	
	function get_all_compaign_name($API){
		$ci=& get_instance();
		require_once('json/jsonrpcphp/includes/jsonRPCClient.php');
		//$api_key = '48cdc939e66e3748bc53e3fa11da0003';
		$api_key = $API['api_key'];
		$api_url = 'http://api2.getresponse.com';
		$client = new jsonRPCClient($api_url);
		$campaigns = $client->get_campaigns(
		$api_key);
        foreach($campaigns as $key=>$val){
            $val['campaign_arraykey'] = $key; 		
            $campaigns_new[] = $val; 
		}
        return $campaigns_new;
	}
	
	function get_all_sequences_name($API){
		$ci=& get_instance();
	   // $siteaddressAPI = "https://api.convertkit.com/courses/?k=FrrUy9rNe4CYBo1PEyhvJg&v=1";
	   $siteaddressAPI = "https://api.convertkit.com/courses/?k=".$API['api_key']."&v=1";
	   $data_get = file_get_contents($siteaddressAPI);
	   $data_get = json_decode($data_get);
	   return  $data_get;
	   
	}
		
		
		
		
	
	
	
	
?>