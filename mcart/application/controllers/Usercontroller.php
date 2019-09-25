<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usercontroller extends MY_controller {
	public function __construct()
	{
			parent::__construct();

	}


	public function profile(){
		if (!($this->session->userdata('user_email'))) {
			$this->session->set_flashdata('error', 'Please Login first');
			redirect(BASEURL . 'login');
		}else{
			$header_data['title'] = "Profile";
			// $firstname['uname'] = $this->session->userdata('user_firstname');
			$email = $this->session->userdata('user_email');
			$userData['user_data'] = $this->getUserdata($email);
			//from My_controller from core
			$this->render($header_data,'/home/profile',$userData);
			
			// $this->load->view('header', $data);
			// $this->load->view('navbar_after_login', $firstname);
			// // print_r($userData);
			// $this->load->view('/home/profile',$userData );
			// $this->load->view('footer');

			
		}
	}
	// function user()
	// {
	// 	$data_header['title'] = "User";

	// 	if (($this->session->userdata('user_email'))) {
	// 		if ($this->sessiontimeout() == true) {
	// 			$this->session->set_flashdata('error', 'Session expired');
	// 			redirect(BASEURL . 'login');
	// 		} else {
	// 			$email = $this->session->userdata('user_email');
	// 			$firstname['uname'] = $this->session->userdata('user_firstname');
	// 			// echo $firstname['uname'];
	// 			$data['user'] = $this->getUserdata($email);
	// 			// print_r($this->getUserdata($email));

	// 			$this->load->view('header', $data_header);
	// 			$this->load->view('navbar_after_login', $firstname);
	// 			$this->load->view('/home/user', $data);
	// 			$this->load->view('footer');
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Access Denied Plase login');
	// 		redirect(BASEURL . 'login');
	// 	}
	// }

}

?>
