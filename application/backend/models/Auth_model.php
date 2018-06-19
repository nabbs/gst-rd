<?php 
class Auth_model extends CI_Model { 
 
    public $Allow=array();
    function __construct()
    {
        parent::__construct();
        if($this->Allow=="*"){
            return true;
        }else{
            return false;
        }
	
    }
	/************************************************* Email functions starts **************************************************/	
    
    
    
}