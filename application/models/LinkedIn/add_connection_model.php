<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Add_connection_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function check_request_sent($contact_id)
	{
		$own_id = $this->session->userdata('user_id');
		
		$this->db->where('user_id1', $own_id);
		$this->db->where('user_id2', $contact_id);

		$query = $this->db->get('request');
		if($query->num_rows == 0)
			return false;
		else
			return true;
	}

	public function send_connection_request($contact_id){
		// Prep the query	
		$own_id = $this->session->userdata('user_id');
		$this->db->where('user_id2', $contact_id);
		$this->db->where('user_id1', $own_id);
		$query = $this->db->get('request');
		if($query->num_rows == 0)
		{
			$data = array(
			   'user_id1' => $own_id,
			   'user_id2' => $contact_id
			);
			$this->db->insert('request', $data); 	
			return true;
		}
	}

	public function load_requests(){
		// Prep the query	
		$own_id = $this->session->userdata('user_id');
		$this->db->where('user_id1', $own_id);
		$query = $this->db->get('request');
		$results = $query->result();
		return $results;
	}

	public function accept_request($contact_id){
		// Prep the query	
		$own_id = $this->session->userdata('user_id');
		$data = array(
				   'user_id1' => $own_id,
				   'user_id2' => $contact_id
				);
		$this->db->delete('request', $data);
		$this->db->insert('connection', $data); 
		return true;
	}

	public function ignore_request($contact_id){
		// Prep the query	
		$own_id = $this->session->userdata('user_id');
		$data = array(
				   'user_id1' => $own_id,
				   'user_id2' => $contact_id
				);
		$this->db->delete('request', $data);
		return true;
	}
}
?>