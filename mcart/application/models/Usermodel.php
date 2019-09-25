<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Usermodel extends CI_Model{
    function get_user($email)
	{
		$this->db->from('user');
		$this->db->select('id, firstname, middlename, lastname, email, mobile, vh, created_at ,isSeller');
		$this->db->where('email', $email);
		$user_query = $this->db->get();
		return $user_query->result();
	}


	public function set_user_profile()
	{
		# code...
	}
	public function set_seller_profile()
	{
		# code...
	}
}

?>
