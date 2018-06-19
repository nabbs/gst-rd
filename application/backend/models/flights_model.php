<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Flights_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    function get_all_flights()
    {
	 
        $query = $this->db->select('flights_id');
		$this->db->from('gp_flights_options');
		$this->db->where('status',1);
		$query = $this->db->get();
		$flights_id = $query->result_array();
		
		foreach($flights_id as $val){
			$id[] = 	$val['flights_id'];
		}
		
		$query = $this->db->select('*');
		$this->db->from('gp_flights');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		/* $data['results'] = $query->result_array();	 */
        return $query->result();
    }
 
    function add_new_entry($name,$body)
    {
        $data = array(
            'entry_name' => $name,
            'entry_body' => $body
        );
        $this->db->insert('entry',$data);
    }
}
 
/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */