<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Add_connection extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{

		$this->load->helper('url');

		if($this->session->userdata('email'))
		{
			$data['heading'] = "Invite to Connect | LinkedIn";
			$data['css_url'] = "LinkedInToo/style";
			$data['css_url_1'] = "LinkedInToo/inside-linkedin";
			$data['contact_fname'] = $this->input->post('contact_fname');
			$data['contact_lname'] = $this->input->post('contact_lname');
			$data['contact_id'] = $this->input->post('contact_id');
			$data['firstName'] = $this->session->userdata('firstName');
			$data['lastName'] = $this->session->userdata('lastName');
			$this->load->view('LinkedInToo/sprint3 step2 - Connect', $data);
		}
		else
		{
			redirect('LinkedIn/login', 'refresh');
		}
	}

	public function send_connection_request()
	{
		$contact_id = $this->input->post('contact_id');
			
		$this->load->model('LinkedIn/add_connection_model');

		if($this->add_connection_model->check_request_sent($contact_id))
		{
			$data['result_message'] = "already sent";
		}
		else
		{
			if($this->add_connection_model->send_connection_request($contact_id))	
			{
				$data['result_message'] = "sent";
			}	
			else
			{
				$this->accept_request($contact_id);
			}	
		}
		$data['display_message'] = "The invitation to";
		$data['heading'] = "Request Sent | LinkedIn";
		$data['css_url'] = "LinkedInToo/style";
		$data['css_url_1'] = "LinkedInToo/inside-linkedin";
		$data['contact_fname'] = $this->input->post('contact_fname');
		$data['contact_lname'] = $this->input->post('contact_lname');

		$this->load->view('LinkedInToo/result_display', $data);
	}

	public function load_requests()
	{
		$this->load->model('LinkedIn/add_connection_model');
		$data['results'] = $this->add_connection_model->load_requests();
		$data['heading'] = "Connection Requests | LinkedIn";
		$data['css_url'] = "LinkedInToo/style";
		$data['css_url_1'] = "LinkedInToo/inside-linkedin";
		$this->load->view('LinkedInToo/sprint3 step3 - Accept or Ignore', $data);
	}

	public function accept_request($contact_id = NULL)
	{
		if($contact_id==NULL)
		{
			$contact_id = $this->input->post('contact_id');
		}
		$this->load->model('LinkedIn/add_connection_model');
		
		if ($this->add_connection_model->accept_request($contact_id)) 
		{
			$data['result_message'] = "added";
		}
		else
		{
			$data['result_message'] = "not added";
		}
		$data['display_message'] = "The connection";
		$data['heading'] = "Request Sent | LinkedIn";
		$data['css_url'] = "LinkedInToo/style";
		$data['css_url_1'] = "LinkedInToo/inside-linkedin";
		$data['contact_fname'] = $this->input->post('contact_fname');
		$data['contact_lname'] = $this->input->post('contact_lname');
		$this->load->view('LinkedInToo/result_display', $data);
	}

	public function ignore_request()
	{
		$contact_id = $this->input->post('contact_id');
		$this->load->model('LinkedIn/add_connection_model');
		
		if ($this->add_connection_model->ignore_request($contact_id)) 
		{
			$data['results'] = $this->add_connection_model->load_requests();
			$data['heading'] = "Connection Requests | LinkedIn";
			$data['css_url'] = "LinkedInToo/style";
			$data['css_url_1'] = "LinkedInToo/inside-linkedin";
			$this->load->view('LinkedInToo/sprint3 step3 - Accept or Ignore', $data);
		}
	}
};