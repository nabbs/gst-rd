	<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('user');
		$this->load->model('jobs_model');
		$this->load->model('companies_model');
		$this->load->model('job_application_model');
    }

    public function index() {
       
		

		$this->load->library("pagination");

		$config["base_url"] = base_url()."/jobs/?";
	    $config["total_rows"] = $this->jobs_model->get_job_count();
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
		$data['jobs'] = $this->jobs_model->get_all_jobs_backend($config["per_page"],$offset);

		//$data["jobs"]=$this->jobs_model->get_all_jobs();
		$data["links"] = explode('&nbsp;',$str_links);



		$data["master_title"] = "All Jobs Listing";
        $data["master_body"] = "index"; 
        $this->load->theme('mainlayout', $data);     		
    } 
	
	public function add_new_job() {       
        		
		$data["companies"] = $this->companies_model->get_comapnies_for_job();		
        $data["master_title"] = "Add New Job";
        $data["master_body"] = "add_new_job"; 
        $this->load->theme('mainlayout', $data);     		
    } 
    		
	public function insert_job(){
		$data = $this->input->post();
		$response = $this->jobs_model->insert_job($data);
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
	
	
	public function edit_job($id=null){
		$data = $this->input->post();
		if(!empty($data)){
			$response = $this->jobs_model->edit_job($data);
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
			$data["companies"]=$this->companies_model->get_comapnies_for_job();		
			$data['job'] = $this->jobs_model->get_job_details_by_id($id);
			$data["master_title"] = "Edit job";
			$data["master_body"] = "edit_job"; 
			$this->load->theme('mainlayout', $data);  
		}	
		
		
	}		
	
	public function update_jobs(){
			$data = $this->input->post();
			$response = $this->jobs_model->update_jobs($data);
			if($response){ 
				$result['result'] = 'success';
				$result['message'] = 'Job has been updated!';
				echo json_encode($result);
			die;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some error ! Please try again';
				echo json_encode($result);
			die;
			}
	}
		
	public function changestatus($id=null){
		
		$status = $this->input->get('status');
		$data = array('id'=>$id, 'status'=>$status); 
		$response = $this->jobs_model->changestatus($data);
		if($response){
			redirect(BASEURL.'/jobs/', 'refresh');
		}
		
	}
	
	public function delete_job($id=null){	
	
		$response = $this->jobs_model->delete_job($id);
		if($response){
			redirect(BASEURL.'/jobs/', 'refresh');
		}
		
	}
	
	
	/* filled jobs*/
	public function new_job_filled(){
		$this->load->library("pagination");
			$config["base_url"] = base_url()."/jobs/filled_jobs/?";
		   
			$config["total_rows"] = $this->job_application_model->filled_jobs_count();	
			//debug($config["total_rows"]);die;
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$offset = $this->input->get('offset');
			$offset=!empty($offset)?$offset:'0';
			//$limit=$config["per_page"].",".$offset;
			$config['num_links'] = "5";
			$config["per_page"] = 20;
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
			
		
			$data["links"] = explode('&nbsp;',$str_links);
			
			$data["filled_jobs"] = $this->job_application_model->filled_jobs($config["per_page"],$offset);		
			$data["master_title"] = "New Job Filled";
			$data["master_body"] = "new_job_filled"; 
			$this->load->theme('mainlayout', $data);   
	}
	
	public function filled_jobs() {
		
		
		
			$this->load->library("pagination");
			$config["base_url"] = base_url()."/jobs/filled_jobs/?";
		   
			$config["total_rows"] = $this->job_application_model->filled_jobs_count();	
			//debug($config["total_rows"]);die;
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$offset = $this->input->get('offset');
			$offset=!empty($offset)?$offset:'0';
			//$limit=$config["per_page"].",".$offset;
			$config['num_links'] = "5";
			$config["per_page"] = 20;
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
			
		
			$data["links"] = explode('&nbsp;',$str_links);
		
		
	       	$data["filled_jobs"] = $this->job_application_model->filled_jobs($config["per_page"],$offset);		
	        $data["master_title"] = "Filled Jobs";
	        $data["master_body"] = "filled_jobs"; 
	        $this->load->theme('mainlayout', $data);     		
    } 



    /* function categories */


   public function add_new_category() {
   		$post = $this->input->post();

   		if(!empty($post)){
   		 $response = $this->jobs_model->add_new_category($post);	

   		if($response){ 
				$result['result'] = 'success';
				$result['message'] = 'Job has been added successfully!';
				echo json_encode($result);
			die;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'There is some error ! Please try again';
				echo json_encode($result);
			die;
			} 		
   		}else{
   				$data["categories"] =  $this->jobs_model->get_categories();
        $data["master_title"] = "Add New Categories";
        $data["master_body"] = "add_new_category"; 
        $this->load->theme('mainlayout', $data);     		
   		 }
    } 


	
}
 
	
