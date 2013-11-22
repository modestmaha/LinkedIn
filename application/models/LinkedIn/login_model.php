<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function validate($data, &$main_error_msg){
		
		// Prep the query
		$this->db->where('email', $data['email']);
		$query = $this->db->get('user');
		if($query->num_rows == 0)
		{
			$main_error_msg = "Hmm, we don't recognize that email. Please try again.";
		}
		else
		{
			$row = $query->row();
			if($row->password != $data['password'])
			{
				$main_error_msg = "Hmm, that's not the right password. Please try again or <a href='<?php echo base_url()index.php/LinkedIn/edit_profile/edit_password ?>'>request a new one.<a/>";
			}
			else
			{
				$sess_data = array(
					'email' => $row->email,
					'user_id'=> $row->user_id,
					'firstName' => $row->firstName,
					'lastName' => $row->lastName,
					'validated' => true
					);
			$this->session->set_userdata($sess_data);
			return true;
			}

		}
		
		return false;
	}
}
?>