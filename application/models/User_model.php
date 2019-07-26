<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table_name = 'user';

	public function get_all_user() {
		$query = $this->db->get($this->table_name);
		return $query->result();
	}

	public function get_user($data) {
		$query = $this->db->get_where($this->table_name, $data);		
		return $query->row();
	}

	public function add_user($data) {
		$this->db->insert($this->table_name, $data);
		$user_id = $this->db->insert_id();

		return $user_id;
	}

	public function update_user($data, $user_id) {
		$this->db->update($this->table_name, $data, array('id' => $user_id));
	}
}