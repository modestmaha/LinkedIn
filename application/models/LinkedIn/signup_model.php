<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Signup_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function create_user($data){
		// Prep the query
		$this->db->where('email', $data['email']);
		
		// Run the query
		$query = $this->db->get('user');
		// Let's check if there are any results
		if($query->num_rows == 0)
		{
			$this->db->insert('user', $data);
			
			// create session data
			
			$sess_data = array(
					'email' => $data['email'],
					'validated' => true
					);
			$this->session->set_userdata($sess_data);
			return true;
		}
		// If the previous process did not validate
		// then return false.
		return false;
	}
}
?>