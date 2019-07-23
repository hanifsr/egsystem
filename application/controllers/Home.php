<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		$data['users'] = $this->user_model->get_all_user();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar_navigation');
		$this->load->view('templates/top_navigation');
		$this->load->view('home_view', $data);
		$this->load->view('templates/footer_content');
		$this->load->view('templates/footer');
	}
}