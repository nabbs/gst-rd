<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sliders extends CI_Controller {

    public function __construct() {
        parent::__construct();
		
         }

    public function index() {
	
        $query = $this->db->select('*');
		$this->db->from('sliders_tb');
		$query = $this->db->get();
		$data['results'] = $query->result_array();		
        $data["master_title"] = "Sliders";
        $data["master_body"] = "index"; 
        $this->load->theme('slider', $data);     		
    } 

	public function add_new() {	
		$reqData = $this->input->post();
			
		if($reqData){			
					
			$this->db->insert('sliders_tb',$reqData);
			
			if(isset($reqData['pic'])){
				$this->db->where('select_img',$reqData['pic']);
				$this->db->delete('gp_temp');				
			}
			
			redirect(BASEURL.'/sliders');
		}
		
		$data["master_title"] = "Add New Slider";   // Please enter the title of page......
		$data["master_body"] = "add_new";   // Please enter the body of page......
		$data['userdata'] = $this->session->userdata('userdata');
		$this->load->theme('slider', $data);  // Loading theme		
    }
	
	
	public function edit($id=null){
		
		
		$query = $this->db->select('*');
		$this->db->from('sliders_tb');
		$this->db->where('id',$id);
		$query = $this->db->get();
		
		if($this->input->post()){
			$this->db->where('id',$id);
			$this->db->update('sliders_tb',$this->input->post());
			redirect(BASEURL.'/sliders');
		}
		
		$data['results'] = $query->row_array();
	
		$data["master_title"] = "Edit Slider";   // Please enter the title of page......
		$data["master_body"] = "edit";   // Please enter the body of page......
		$this->load->theme('slider', $data);  // Loading theme	
		
	}
	
	public function delete($id=null){
		
		$this->db->where('id',$id);
		$this->db->delete('sliders_tb');
		redirect(BASEURL.'/sliders');
		/* redirect(front_base_url.'/hajj'); */
	}
    
	public function save_temp(){
		$reqData = $this->input->post();
		if(isset($reqData['select_img']) && isset($reqData['type']) && empty($reqData['trash'])){
			$res = $this->db->insert('gp_temp',$reqData);
		}
		if(isset($reqData['select_img']) && isset($reqData['type']) && isset($reqData['trash'])){
			$this->db->where('select_img',$reqData['select_img']);
			$res = $this->db->delete('gp_temp');
		}
		if($res){
			$result['result'] = 'success';
			$result['message'] = 'Record Delay Add Successfully!';
		}	
		else{
			$result['result'] = 'error';
			$result['message'] = 'please try again';
		}
		echo json_encode($result);die;

		
		
	}
	
	
	public function get_save_image(){
		
		$query = $this->db->select('*');
		$this->db->from('gp_temp');
		$query = $this->db->get();
		$img = $query->result_array();
		
		$result['result'] = 'success';
			$result['image_name'] = $img[0]['select_img'];
		echo json_encode($result);die;
	}
	
}
