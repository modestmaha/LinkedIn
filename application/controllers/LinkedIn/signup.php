<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Signup extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index( $form_data = NULL, $main_error_msg = NULL, $firstname_error_msg = NULL, $lastname_error_msg = NULL, $email_error_msg = NULL, $password_error_msg = NULL){
		// Load our view to be displayed
		// to the user
		$this->load->helper('url');

		if($this->session->userdata('email')){
			redirect('LinkedIn/login/go_to_profile', 'refresh');
		}else{
			$data['heading'] = "World's Largest Professional Network | LinkedIn";
			$data['css_url'] = "LinkedIn/signup";
			
			$this->load->view('LinkedIn/header',$data);
			$this->load->view('LinkedIn/nav1');
			$data['main_error_msg'] = $main_error_msg;
			$data['firstname_error_msg'] = $firstname_error_msg;
			$data['lastname_error_msg'] = $lastname_error_msg;
			$data['email_error_msg'] = $email_error_msg;
			$data['password_error_msg'] = $password_error_msg;
			$data['firstname'] = $form_data['firstname'];
			$data['lastname'] = $form_data['lastname'];
			$data['email'] = $form_data['email'];
			$data['password'] = $form_data['password'];

			$this->load->view('LinkedIn/signup', $data);
			$this->load->view('LinkedIn/footer1');
			$this->load->view('LinkedIn/footer2');
			$this->load->view('LinkedIn/footer3');
		}
		//$this->load->view('common/footer',$data);
	}
	
	public function validate(){
		
		$firstname = $this->input->post('firstName');
		if (strlen($firstname)<2)
			$firstname_error_msg = "The text you provide must have at least 2 characters";
		else if (!preg_match("/^[A-Z].(['].[A-Z])?[a-z]+.$/", $firstname))
			$firstname_error_msg = "Please provide a valid name";
		else
			$firstname_error_msg = NULL;

		$lastname = $this->input->post('lastName');
		if  (strlen($lastname)<3)
			$lastname_error_msg = "The text you provide must have at least 3 characters";
		else if (!preg_match("/^[A-Z].(['].[A-Z])?[a-z]+.$/", $lastname))
			$lastname_error_msg = "Please provide a valid name";
		else
			$lastname_error_msg = NULL;
		
		$email = $this->input->post('emailAddress');	
		if (strlen($email)<3)
		{
			$email_error_msg = "The text you provide is too short (the minimum length is 3 characters, your text contains";
			$email_error_msg .=strlen($email);
			$email_error_msg .=" characters).";
		}
		else if (!preg_match("/^[a-z]+[a-z0-9_]*@[a-zA-z]+.[a-z]+$/", $email))
			$email_error_msg = "Invalid email address.";
		else
			$email_error_msg = NULL;

		$password = $this->input->post('password');
		if (strlen($password)<3)
			$password_error_msg = "The password you provide must have at least 6 characters";
		else if (!preg_match("/^[A-Za-z0-9]*+$/", $password))
			$password_error_msg = "Password may not contain symbols.";
		else
			$password_error_msg = NULL;

		$data['firstname'] = $firstname;
		$data['lastname'] = $lastname;
		$data['email'] = $email;
		$data['password'] = $password;

		if($firstname_error_msg != NULL || $lastname_error_msg != NULL || $email_error_msg !=NULL || $password_error_msg !=NULL)
		{
			$main_error_msg = "Please correct the marked field(s) below.";
			$this->index($data, $main_error_msg, $firstname_error_msg, $lastname_error_msg, $email_error_msg, $password_error_msg);
		}
		else
		{
			$this->load->model('LinkedIn/signup_model');
		// Validate the user can login
			$result = $this->signup_model->create_user($data);
			// Now we verify the result
			if(! $result){
				// If email is present, then show them login page again
				$email = $this->input->post('emailAddress');
				$main_error_msg = 'The email address, ';
				$main_error_msg .= $email;
				$main_error_msg .= ', is already registered.';
				$this->index($data, $main_error_msg);
			}
			else{
				// If user did validate, 
				// Send them to members area
				redirect('LinkedIn/profile','refresh');

			}	
		}	
	}
}
?>