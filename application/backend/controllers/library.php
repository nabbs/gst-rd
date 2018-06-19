<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class library extends CI_Controller {

    public function __construct() {
        parent::__construct();		
		$this->load->model('companies_model');
		$this->load->helper('user');
    }

    public function index($id=null) {
		
		
		$reqdata = $this->input->post();
		$delete_img = $this->input->get('delete');
		
		if($delete_img){
			$this->db->where('id',$delete_img);
			$this->db->delete('gp_post');
		}
		
		if (!empty($_FILES))
            {
                $path = "../assets/files/";
                if (!is_dir($path))
                    mkdir($path, 0755);
 
                $pathMain = '../assets/files/';
                if (!is_dir($pathMain))
                    mkdir($pathMain, 0755);
 
                $pathThumb = '../assets/files/100X100';
                if (!is_dir($pathThumb))
                    mkdir($pathThumb, 0755);
 
                $path2Thumb = '../assets/files/200X200';
                if (!is_dir($path2Thumb))
                    mkdir($path2Thumb, 0755);
 
                $path3Thumb = '../assets/files/300X300';
                if (!is_dir($path3Thumb))
                    mkdir($path3Thumb, 0755);
 
                
 
                 $result = $this->do_upload('files', $pathMain);
         //print_r($result);
                if (!$result['status'])
                  $data['error_message'] ="Can not upload Image for " . $result['error'] . " ";
			
                else
                {
                   
                   $reqdata['post_title'] = '';
				$reqdata['post_slug'] = '';
				$reqdata['post_description'] = 
				$reqdata['post_tag'] = '';
				$reqdata['post_type'] = 'attachment';
				$reqdata['post_attachment_name'] = $result['upload_data']['file_name'];
				$reqdata['created'] = time();
				$reqdata['modify'] = time();				
				$this->db->insert('gp_post',$reqdata);
				
				    
                    //in other folder
                   if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $pathThumb . '/'.$result['upload_data']['file_name'],'100','100'))
                         $message =='success';
                    else
                        $message =='Failed';
                   if($this->resize_image2($pathMain . '/' . $result['upload_data']['file_name'], $path2Thumb . '/'.$result['upload_data']['file_name'],'200','200'))
                       $message =='success';
                    else
                        $message =='Failed';
                     if($this->resize_image2($pathMain . '/' . $result['upload_data']['file_name'], $path3Thumb . '/'.$result['upload_data']['file_name'],'300','300'))
                       $message =='success';
                    else
                         $message =='Failed';
 
                    echo "Your file was uploaded successfully.";
				redirect(BASEURL.'/library');
                }
            }
		
		
        $data["master_title"] = "Library";
        $data["master_body"] = "index"; 
        $this->load->theme('mainlayout', $data);     		
    }
	
	
	public function gallery_load(){
		$query = $this->db->select('*');
		$this->db->from('gp_post');
		$this->db->where('post_type','attachment' );
		$query = $this->db->get();
		$data['images'] = $query->result_array();	
		$data["master_title"] = "Library";
        $data["master_body"] = "gallery"; 
        $this->load->theme('ajax', $data); 		
	}
	
	
	public function view_gallery(){
		
		
		$query = $this->db->select('*');
		$this->db->from('gp_post');
		$this->db->where('post_type','attachment' );
		$query = $this->db->get();
		$data['images'] = $query->result_array();	
		
		$query = $this->db->select('*');
		$this->db->from('gp_temp');
		$this->db->where('type','image');
		$query = $this->db->get();
		$data['gp_temp'] = $query->result_array();	
		
		
		$data["master_title"] = "Library";
        $data["master_body"] = "view_gallery"; 
		$this->load->theme('ajax', $data); 
		
	}
	
	
	public function dropzoneupload(){
	
		
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		if (!empty($_FILES))
            {
                $path = "../assets/files/";
                if (!is_dir($path))
                    mkdir($path, 0755);
 
                $pathMain = '../assets/files/';
                if (!is_dir($pathMain))
                    mkdir($pathMain, 0755);
 
                $pathThumb = '../assets/files/100X100';
                if (!is_dir($pathThumb))
                    mkdir($pathThumb, 0755);
 
                $path2Thumb = '../assets/files/200X200';
                if (!is_dir($path2Thumb))
                    mkdir($path2Thumb, 0755);
 
                $path3Thumb = '../assets/files/300X300';
                if (!is_dir($path3Thumb))
                    mkdir($path3Thumb, 0755);
 
                
 
                 $result = $this->do_upload('file', $pathMain);
         //print_r($result);
                if (!$result['status'])
                    $message ="Can not upload Image for " . $result['error'] . " ";
                else
                {
                   
                   $reqdata['post_title'] = '';
				$reqdata['post_slug'] = '';
				$reqdata['post_description'] = 
				$reqdata['post_tag'] = '';
				$reqdata['post_type'] = 'attachment';
				$reqdata['post_attachment_name'] = $result['upload_data']['file_name'];
				$reqdata['created'] = time();
				$reqdata['modify'] = time();				
				$this->db->insert('gp_post',$reqdata);
				
				    
                    //in other folder
                   if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $pathThumb . '/'.$result['upload_data']['file_name'],'100','100'))
                         $message =='success';
                    else
                        $message =='Failed';
                   if($this->resize_image2($pathMain . '/' . $result['upload_data']['file_name'], $path2Thumb . '/'.$result['upload_data']['file_name'],'200','200'))
                       $message =='success';
                    else
                        $message =='Failed';
                     if($this->resize_image2($pathMain . '/' . $result['upload_data']['file_name'], $path3Thumb . '/'.$result['upload_data']['file_name'],'300','300'))
                       $message =='success';
                    else
                         $message =='Failed';
 
 
                }
            }
		
		
    //die('File upload dropzone');
	}
	
	
	
	function do_upload($htmlFieldName, $path)
    {
        $config['file_name'] = time();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
       
        if (!$this->upload->do_upload($htmlFieldName))
        {
            return array('error' => $this->upload->display_errors(), 'status' => 0);
        } else
        {
            return array('status' => 1, 'upload_data' => $this->upload->data());
        }
		 unset($config);
    }
	
	function resize_image($sourcePath, $desPath, $width = '500', $height = '500')
    {
	
	$config = array();
	$config['image_library'] = 'gd2';
 $config['source_image'] = $sourcePath;
 $config['new_image'] = $desPath;
 $config['quality'] = '100%';
 //$config['create_thumb'] = TRUE;
 $config['maintain_ratio'] = TRUE;
 $config['width'] = $width;
 $config['height'] = $height;

 $this->load->library('image_lib', $config); 

        if ($this->image_lib->resize())
            return true;
			
        return false;
		$this->image_lib->clear();
    }
	
		function resize_image2($sourcePath, $desPath, $width = '500', $height = '500')
    {
	
	$config = array();
	$config2['image_library'] = 'gd2';
 $config2['source_image'] = $sourcePath;
 $config2['new_image'] = $desPath;
 $config2['quality'] = '100%';
 //$config2['create_thumb'] = TRUE;
 $config2['maintain_ratio'] = TRUE;
 $config2['width'] = $width;
 $config2['height'] = $height;

 $this->image_lib->initialize($config2);

        if ($this->image_lib->resize())
            return true;
		return false;
		$this->image_lib->clear();
    }


}
 
	

