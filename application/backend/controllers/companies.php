<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companies extends CI_Controller {

    public function __construct() {
        parent::__construct();
		
		  $this->load->model('companies_model');
		  $this->load->helper('user');
    }

    public function index() {
       // $data["job_companies"]=$this->companies_model->job_companies_count();
      //  $data["companies"]=$this->companies_model->get_comapnies_lists();	



		$this->load->library("pagination");

		$config["base_url"] = base_url()."/companies/?";
	    $config["total_rows"] = $this->companies_model->job_companies_count();
		//debug($config["total_rows"]);die;
		$config['use_page_numbers'] = FALSE;
		$config['query_string_segment'] = 'offset';	
		$offset = $this->input->get('offset');
		$offset=!empty($offset)?$offset:'0';
		//$limit=$config["per_page"].",".$offset;
		$config['num_links'] = "5";
		$config["per_page"] = 10;
		$config['full_tag_open'] = '<ul class="pagination">';   
		$config['full_tag_close'] = '</ul>';	
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config["uri_segment"] = 3;
		$config['prev_link'] = ' Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';	
		$config['cur_tag_open'] = '<li class="active"><a href="">';	
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';	
		$config['num_tag_close'] = '</li>';	
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();			
		$data["companies"]=$this->companies_model->get_comapnies_lists($config["per_page"],$offset);

		//$data["jobs"]=$this->jobs_model->get_all_jobs();
		$data["links"] = explode('&nbsp;',$str_links);


        $data["master_title"] = "All Comapies Lists";
        $data["master_body"] = "index"; 
        $this->load->theme('mainlayout', $data);     		
    } 
	
	public function add_new_company() {		
        //$data["videos_data"]=$this->jobs_model->get_all_jobs();		
        $data["master_title"] = "Add New Company";
        $data["master_body"] = "add_new_company"; 
        $this->load->theme('mainlayout', $data);     		
    } 
	
	
	public function insert_company() {		
		$data = $this->input->post();
		$response =   $this->companies_model->insert_company($data);     
		if($response){ 
				$result['result'] = 'success';
				$result['message'] = 'User subscription Plan has been canceled successfully';
				echo json_encode($result);
			die;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some error cancel the user subscription.Please try again';
				echo json_encode($result);
			die;
		}

	 
	} 
    
	public function post_by_companies(){
		$data["post_companies"]=$this->companies_model->post_by_companies();		
        $data["master_title"] = "Posts By Companies";
        $data["master_body"] = "post_by_companies"; 
        
        $this->load->theme('mainlayout', $data);  

	}


	public function edit_company($id=null){
		$data = $this->input->post();
		if(!empty($data)){
			$response = $this->companies_model->edit_company($data);
			if($response){ 
				$result['result'] = 'success';
				$result['message'] = 'User subscription Plan has been canceled successfully';
				echo json_encode($result);
			die;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some error cancel the user subscription.Please try again';
				echo json_encode($result);
			die;
		}
		}else{
			$data['company'] = $this->companies_model->get_company_details_by_id($id);
			$data["master_title"] = "Edit Company";
			$data["master_body"] = "edit_company"; 
			$this->load->theme('mainlayout', $data);  
		}	
		
		
	}		
	
	
	public function changestatus($id=null){
		
		$status = $this->input->get('status');
		$data = array('id'=>$id, 'status'=>$status);
		$response = $this->companies_model->changestatus($data);
		if($response){
			redirect(BASEURL.'/companies/', 'refresh');
		}
		
	}
	
	public function delete_company($id=null){	
		
		$response = $this->companies_model->delete_company($id);
		if($response){
			redirect(BASEURL.'/companies/', 'refresh');
		}
		
	}
	
	
	
		
    }
 
	

