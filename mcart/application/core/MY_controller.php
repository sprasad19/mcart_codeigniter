<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_controller extends CI_Controller{

    
    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }



    public function render($header_data, $view, $view_data)
    {
        $firstname['uname'] = $this->session->userdata('user_firstname');
        $this->load->view('header.php', $header_data);
        $this->load->view('navbar_after_login', $firstname);
        $this->load->view($view, $view_data);
        $this->load->view('footer.php');
    }


    function getUserdata($email)
	{
		return $data = $this->Usermodel->get_user($email);
	}
}


    // Auto_controller
?>