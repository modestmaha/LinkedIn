<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Search extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index($data = NULL, $results_contacts = NULL, $results_non_contacts = NULL)
	{

		$this->load->helper('url');

		if($this->session->userdata('email'))
		{
			$data['heading'] = "Search | LinkedIn";
			$data['css_url'] = "LinkedInToo/style";
			$data['css_url_1'] = "LinkedInToo/inside-linkedin";
			$data['result_contacts'] = $results_contacts;
			$data['result_non_contacts'] = $results_non_contacts;
			$this->load->view('LinkedInToo/sprint3 step1 - Advanced Search', $data);
			
		}
		else
		{
			redirect('LinkedIn/login', 'refresh');
		}
	}

	public function search_users()
	{
		$data['keywords'] = $this->input->post('keywords');
		$data['contactFName'] = $this->input->post('contactFName');
		$data['contactLName'] = $this->input->post('contactLName');
		$data['job_title'] = $this->input->post('job_title');
		$data['company'] = $this->input->post('company');
		$data['school'] = $this->input->post('school');
		$data['location'] = $this->input->post('location');
		$data['country'] = $this->input->post('country');

		$this->load->model('LinkedIn/search_model');
		// Validate the user can login
		//$results_contacts = $this->search_model->search_connections($data);
		$results_non_contacts = $this->search_model->search_non_connections($data);
		// $results_contacts = $this->search_model->search_connections($data);;
		// $this->index($data, $results_contacts, $results_non_contacts);
	}
};