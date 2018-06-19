<?php 
class email_model extends CI_Model { 
 
    function __construct()
    {
        parent::__construct();
		//$this->load->model("store_model");
		//$this->load->model("user_model");
    }
	
	/************************************************* Email functions starts **************************************************/	
		
	public function sendIndividualEmail($emailarr=array())
	{
		$this->email->clear();		
		$this->email->to($emailarr["to"]);
		$this->email->from($this->config->item("adminemail"),$this->config->item("adminname"));
		$this->email->subject($emailarr["subject"]);
		$this->email->message($emailarr["message"]);
		$this->email->send();
	}
}