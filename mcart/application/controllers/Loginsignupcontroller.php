<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginsignupcontroller extends MY_controller
{
	/*
		****************************************************************************
								USER LOGIN CONTROLLER START
		****************************************************************************
	*/

	public function index()
	{
		if (!($this->session->userdata('user_email'))) {
			$data_header['title'] = "Login";
			$view_data['login'] = "CodeIgniter Simple Login from Sessions";
			// $this->load->view('header', $data_header);
			// $this->load->view('login_signup/login', $data_home);
			// $this->load->view('footer');
			//from My_controller from core
			$this->render($data_header, 'login_signup/login',$view_data);

		} else {

			redirect(BASEURL . 'user/profile');
		}
	}
	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) { //if true
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			// print_r($data);
			//LoginModel
			// $this->load->model('Loginmodel');
			if ($this->Login_signup_model->can_login($email, $password)) {

				$data = $this->getUserdata($email);
				foreach ($data as $row) {
					$firstName = $row->firstname;
					$vh = $row->vh;
					$isSeller = $row->isSeller;
				}

				$session_t  = time();
				$session_e  = time() + 5000;
				$session_data = array(
					'user_email' => $email,
					'user_firstname' => $firstName,
					'isSeller' => $isSeller,
					'user_vh' =>  $vh,
					'session_create' => $session_t,
					'session_expired' => $session_e,
				);
				$this->session->set_userdata($session_data);

				redirect(BASEURL . 'products/?product=all');
			} else {
				$this->session->set_flashdata('error', 'Invalid Email or Password');
				redirect(BASEURL . 'login');
			}
		} else {
			$this->session->set_flashdata('error', 'Please enter email and password');
			redirect(BASEURL . 'login');
		}
	}
	function sessiontimeout()
	{
		if ((time() > $this->session->userdata('session_expired'))) {
			$session_data = array(
				'user_email' => '',
				'user_firstname' => '',
				'isSeller' => '',
				'user_vh' =>  '',
				'session_expired' => '',

			);
			$this->session->set_userdata($session_data);

			return true;
		} else {
			return false;
		}
	}
	function logout()
	{
		if (($this->session->userdata('user_email'))) {
			$session_data = array(
				'user_email' => '',
				'user_firstname' => '',
				'isSeller' => '',
				'user_vh' =>  '',
				'session_create' => '',
				'session_expired' => '',

			);
			$this->session->set_userdata($session_data);
			$this->session->set_flashdata('error', 'Logout Successfully');
			redirect(BASEURL);
			// $this->session->session_destroy();
		} else {
			redirect(BASEURL . 'login');
		}
	}

	// function getUserdata($email)
	// {
	// 	return $data = $this->Login_signup_model->get_user($email);
	// }
	
	    /*
		****************************************************************************
								USER	LOGIN CONTROLLER END
		****************************************************************************
	     */
	    /*
		****************************************************************************
								USER	SIGNUP CONTROLLER START
		****************************************************************************
	    */
	public function signup()
	{
		if (($this->session->userdata('user_email'))) {
			redirect(BASEURL . 'user');
		} else {


			$data_header['title'] = "Register";
			$view_data['register'] = "CodeIgniter Simple Registration Form";
			// $this->load->view('header', $data_header);
			// $this->load->view('login_signup/signup', $data_registr);
			// $this->load->view('footer');

			//from My_controller from core
			$this->render($data_header, 'login_signup/signup',$view_data);
		}
	}
	public function action_register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[2]');
		$this->form_validation->set_rules('middlename', 'Middle Name', 'alpha');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha|min_length[2]');
		$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|numeric|required|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Some Error occure');
			redirect(BASEURL . 'signup');
		} else {
			// get post value
			$firstname = $this->input->post('firstname');
			$middlename = $this->input->post('middlename');
			$lastname = $this->input->post('lastname');
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// set Psot value
			$this->Login_signup_model->setFullname($firstname);
			$this->Login_signup_model->setMobile($mobile);
			$this->Login_signup_model->setMiddlename($middlename);
			$this->Login_signup_model->setLastname($lastname);
			$this->Login_signup_model->setEmail($email);
			$this->Login_signup_model->set_password($password);
			if ($this->Login_signup_model->finuseruser()) {

				$this->session->set_flashdata('error', 'Email alredy Exist please try with another email');
				redirect(BASEURL . 'signup');
			} elseif ($this->Login_signup_model->findmobile()) {
				$this->session->set_flashdata('error', 'Mobile Number alredy Exist please try with another mobile number ');
				redirect(BASEURL . 'signup');
			} else {
				if ($this->Login_signup_model->register_user()) {
					$this->session->set_flashdata('success', 'Account  successfully created, Please <a href="login">Login</a>');
					redirect(BASEURL . 'signup');
				} else {
					$this->session->set_flashdata('error', 'Some Error occure please try again later');
					redirect(BASEURL . 'signup');
				}
			}
		}
	}
	/*
		****************************************************************************
								USER	SIGNUP CONTROLLER END
		****************************************************************************
	    */
}
