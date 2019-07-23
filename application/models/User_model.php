<?php
class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function set_user($data) {
		return $this->db->insert('user', $data);
	}

	public function get_all_user() {
		$query = $this->db->get('user');
		return $query->result();
	}

	public function get_user($email, $password, $state) {
		if($state == 0) {
			$query = $this->db->get_where('user', array('email' => $email));
		} else if($state == 1) {
			$query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
		}
		
		return $query->row();
	}

	/*
	public function activate_user($email, $data) {
		$this->db->where('email', $email);
		return $this->db->update('user', $data);
	}
	*/
}