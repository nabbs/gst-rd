<?php 
class configuration_model extends CI_Model { 
	
    function __construct()
    {
        parent::__construct();
		$config_data =  $this->db->select("*")->from("config")->get()->result();
		
		foreach($config_data as $key=>$val){
			
			define("$val->key", $val->value, true);
			}
			
			
    }
	
       
	
				
	
	
	
	
}