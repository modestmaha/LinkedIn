<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index($form_data = NULL, $main_error_msg = NULL, $email_error_msg = NULL, $password_error_msg = NULL){
		// Load our view to be displayed
		// to the user
		$this->load->helper('url');

		if($this->session->userdata('email')){
			$this->go_to_profile();
		}
		else{
			$data['heading'] = "Sign In | LinkedIn";
			$data['css_url'] = "LinkedIn/style5";
			$this->load->view('LinkedIn/header', $data);
			$this->load->view('LinkedIn/nav1');
			
			$data['main_error_msg'] = $main_error_msg;
			$data['email_error_msg'] = $email_error_msg;
			$data['password_error_msg'] = $password_error_msg;
			$data['email'] = $form_data['email'];
			$data['password'] = $form_data['password'];

			$this->load->view('LinkedIn/screen5body', $data);
			$this->load->view('LinkedIn/footer3');
		}
		//$this->load->view('common/footer',$data);
	}
	
	public function go_to_profile()
	{

		$this->load->helper('url');
		if($this->session->userdata('email'))
		{
			$data['heading'] = $this->session->userdata('email');
			$data['css_url'] = "LinkedIn/profilepage";
		
			$this->load->view('LinkedIn/header', $data);
			$this->load->view('LinkedIn/profile', $data);
		}
		else
			$this->index();
	}

	public function validate(){
		
		$email = $this->input->post('login_textbox');	
		if (strlen($email)<3)
		{
			$email_error_msg = "The text you provide is too short (the minimum length is 3 characters, your text contains";
			$email_error_msg .=strlen($email);
			$email_error_msg .=" characters).";
		}
		else if (!preg_match("/^[a-z]+[a-z0-9_]*@[a-zA-z]+.[a-z]+$/", $email))
			$email_error_msg = "Please enter a valid email address.";
		else
			$email_error_msg = NULL;

		$password = $this->input->post('password_textbox');
		if(strlen($password)<1)
			$password_error_msg = "Please enter a password.";
		else if (strlen($password)<3)
			$password_error_msg = "The password you provide must have at least 6 characters";
		else
			$password_error_msg = NULL;

		$data['email'] = $email;
		$data['password'] = $password;
		if($email_error_msg !=NULL || $password_error_msg !=NULL)
		{
			$main_error_msg = "There were one or more errors in your submission. Please correct the marked fields below.";
			$this->index($data, $main_error_msg, $email_error_msg, $password_error_msg);

		
		}
		else
		{// Load the model
			$this->load->model('LinkedIn/login_model');
			$main_error_msg = NULL;
			// Validate the user can login
			$result = $this->login_model->validate($data, $main_error_msg);
			// Now we verify the result
			
			if($result==false){
				// If user did not validate, then show them login page again
				
				$this->index($data, $main_error_msg);
			}
			else
			{
				$this->go_to_profile();
			}
		}
	}
	public function do_logout(){
		$this->session->sess_destroy();
		redirect('LinkedIn/signup','refresh');
	}
}
?>