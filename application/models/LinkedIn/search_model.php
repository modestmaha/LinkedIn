<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Search_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function search_connections($data){
		
		$own_id = $this->session->userdata('user_id');
		
		$this->db->from('user');
		// $this->db->join('connection', 'user.user_id = connection.user_id2', 'left outer');
		// $this->db->join('profile', 'profile.user_id = user.user_id', 'left outer');
		// $this->db->join('job', 'job.user_id = user.user_id', 'left outer');
		// $this->db->join('company', 'company.company_id = job.company_id', 'left outer');
		// $this->db->join('education', 'education.education_id = user.user_id', 'left outer');
		// $this->db->join('institution', 'institution.institution_id = education.institution_id', 'left outer');
		// $this->db->where('user_id1', $own_id);
		// // Prep the query
		// if($data['keywords']!='')
		// {	
		// 	$this->db->where('firstName', $data['keywords']);
		// 	$this->db->or_where('lastName', $data['keywords']);
		// 	$this->db->or_where('job_title', $data['keywords']);
		// 	$this->db->or_where('company_name', $data['keywords']);
		// 	$this->db->or_where('institution_name', $data['keywords']);
		// 	// $this->db->or_where('location', $data['keywords']);
		// 	// $this->db->or_where('country', $data['keywords']);
		// }
		// if($data['contactFName'] != '')
		// {
		// 	$this->db->where('firstName', $data['contactFName']);
		// }
		// if($data['contactLName'] != '')
		// {
		// 	$this->db->where('lastName', $data['contactLName']);			
		// }
		// if($data['job_title'] != '')
		// {
		// 	$this->db->where('job_title', $data['job_title']);
		// }
		// if($data['company'] != '')
		// {
		// 	$this->db->where('company_name', $data['company']);
		// }
		// if($data['school'] != '')
		// {
		// 	$this->db->where('institution_name', $data['school']);	
		// }
		// if($data['location'] != '')
		// {
		// 	$this->db->where('location', $data['location']);
		// }
		// if($data['country'] != '')
		// {
		// 	$this->db->where('country', $data['country']);
		// }
		// $this->db->select('');

		// Run the query
		
		$query = $this->db->get();
		// Let's check if there are any results
		$results = $query->result();
		return $results;

	}

	public function search_non_connections($data){
		
		$own_id = $this->session->userdata('user_id');
		
		$this->db->from('user');
		$this->db->join('connection', 'user.user_id = connection.user_id2', 'left outer');
		$this->db->join('profile', 'profile.user_id = user.user_id', 'left outer');
		$this->db->join('job', 'job.user_id = user.user_id', 'left outer');
		$this->db->join('company', 'company.company_id = job.company_id', 'left outer');
		$this->db->join('education', 'education.education_id = user.user_id', 'left outer');
		$this->db->join('institution', 'institution.institution_id = education.institution_id', 'left outer');
		$this->db->where('user_id1', $own_id);
		// Prep the query
		if($data['keywords']!='')
		{	
			$this->db->where('firstName', $data['keywords']);
			$this->db->or_where('lastName', $data['keywords']);
			$this->db->or_where('job_title', $data['keywords']);
			$this->db->or_where('company_name', $data['keywords']);
			$this->db->or_where('institution_name', $data['keywords']);
			// $this->db->or_where('location', $data['keywords']);
			// $this->db->or_where('country', $data['keywords']);
		}
		if($data['contactFName'] != '')
		{
			$this->db->where('firstName', $data['contactFName']);
		}
		if($data['contactLName'] != '')
		{
			$this->db->where('lastName', $data['contactLName']);			
		}
		if($data['job_title'] != '')
		{
			$this->db->where('job_title', $data['job_title']);
		}
		if($data['company'] != '')
		{
			$this->db->where('company_name', $data['company']);
		}
		if($data['school'] != '')
		{
			$this->db->where('institution_name', $data['school']);	
		}
		// if($data['location'] != '')
		// {
		// 	$this->db->where('location', $data['location']);
		// }
		// if($data['country'] != '')
		// {
		// 	$this->db->where('country', $data['country']);
		// }
		// $this->db->select('');

		// Run the query
		$query = $this->db->get();
		// Let's check if there are any results
		$results = $query->result();
		return $results;

	}
}
?>