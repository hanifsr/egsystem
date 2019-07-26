<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		$user = array(
			'id' => $this->session->userdata('id')
		);
		
		$data = array(
			'users' => $this->user_model->get_all_user(),
			'user' => $this->user_model->get_user($user)
		);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar_navigation', $data);
		$this->load->view('templates/top_navigation', $data);
		$this->load->view('home_view', $data);
		$this->load->view('templates/footer_content');
		$this->load->view('templates/footer');
	}
}