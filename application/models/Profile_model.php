<?php
class Profile_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function set_profile($data) {
		return $this->db->insert('user', $data);
	}

	public function get_all_profile() {
		$query = $this->db->get('user');
		return $query->result();
	}

	public function get_profile($user_id) {
		$query = $this->db->get_where('profile', array('user_id' => $user_id));	
		return $query->row();
	}
}