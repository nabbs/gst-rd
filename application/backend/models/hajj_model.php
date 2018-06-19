<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hajj_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    function get_search($data)
    {
	
		$query = $this->db->select('*');
		$this->db->from('gp_hajj');
		$this->db->or_where($data);
		$query = $this->db->get();

       return $query->result();
    }
 
    function all()
    {
        $query = $this->db->select('*');
		$this->db->from('gp_hajj');
		$query = $this->db->get();

       return $query->result_array();
    }
}
 
/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */