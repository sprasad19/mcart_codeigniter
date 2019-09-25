<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_signup_model extends CI_Model
{
	// var $db;
	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->db = $this->load->database("default", TRUE);
	// }
	// public function saveuser($arraydata) {
	// 	$this->db->insert("user",$arraydata);//insert as per codeigniter
	// 	return true;
	// }
/*
************************************************************************************************************
							LOGIN MODEL
************************************************************************************************************

*/
	function can_login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('user');

		if ($query->num_rows() > 0) {

			return true;
		} else {
			return false;
		}
	}

	
/*
************************************************************************************************************
							SIGNUP MODEL
************************************************************************************************************

*/
	private $_fullname;
	private $_middleName;
	private $_lastName;
	private $_email;
	private $_password;
	private $_vh;
	private $_mobile;

	function setFullname($fullname)
	{
		$this->_fullname = $fullname;
	}
	function setMiddlename($middlename)
	{
		$this->_middleName = $middlename;
	}
	function setLastname($lastname)
	{
		$this->_lastName = $lastname;
	}
	function setEmail($email)
	{
		$this->_email = $email;
		$this->_vh = md5($email);
	}
	function set_password($password)
	{
		$this->_password = md5($password);
	}
	function setMobile($mobile)
	{
		$this->_mobile = $mobile;
	}

	function finuseruser()
	{
		$this->db->from('user');
		$this->db->select('email');
		$this->db->where('email', $this->_email);
		$user_query = $this->db->get();
		if ($user_query->result()) {
			return true;
		} else {
			return false;
		}
	}
	function findmobile()
	{
		$this->db->from('user');
		$this->db->select('mobile');
		$this->db->where('mobile', $this->_mobile);
		$user_query = $this->db->get();
		if ($user_query->result()) {
			return true;
		} else {
			return false;
		}
	}
	function register_user()
	{
		$data_arr = array(
			'firstname' => $this->_fullname,
			'mobile' => $this->_mobile,
			'middlename' => $this->_middleName,
			'lastname' => $this->_lastName,
			'email' => $this->_email,
			'password' => $this->_password,
			'vh' => $this->_vh
		);
		$register_query = $this->db->insert('user', $data_arr);
		return $register_query;
	}
}
