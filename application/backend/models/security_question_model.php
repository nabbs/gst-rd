<?php
	ob_start();
	
	class security_question_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		public function insert_question($data=array()){
			$data['created'] = time(); 
			return $this->db->insert('security_question',$data);
		}
		public function edit_question($data=array()){
			$this->db->where('id',$data['id']);
			return $this->db->update('security_question',$data);
		}
		public function get_all_question(){
			
			return $this->db->select("*")->from('security_question')->get()->result_array();
		}
		public function get_question_by_id($id=null){
			
			return $this->db->select("*")->from('security_question')->where('id',$id)->get()->row_array();
		}
		public function delete_question($id=null){
			$this->db->where('id',$id);
			return $this->db->delete('security_question');
		}
		public function insert_user_question($data=array()){
			$data['created'] = time(); 
			return $this->db->insert('users_security_questions',$data);
		}
		public function get_question_by_user($data=array()){
			return $this->db->select("*")->from('users_security_questions')->where('user_id',$data['id'])->get()->result_array();
		}
		public function delete_security_question($data=array()){
			$this->db->where(array('id'=>$data['id'],'user_id'=>$data['userdata']['id']));
			return $this->db->delete('users_security_questions');
		}
		public function check_security_answer($data=array()){
			$this->db->where(array('id'=>$data['id'],'user_id'=>$data['user_id'],'answer'=>trim($data['answer'])));
			return $this->db->select("*")->from('users_security_questions')->get()->num_rows();
			
		}
		public function user_details($id=null){
			return $this->db->select("id,fname,lname,display_name,email")->from('users')->where('id',$id)->get()->row_array();
		
		}
 
	}	