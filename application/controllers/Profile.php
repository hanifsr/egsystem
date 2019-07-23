<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		$user_profile = $this->profile_model->get_profile($user_id);

		if(empty($user_profile)) {
			redirect(site_url('profile/update_profile'));
		} else {
			$data = array(
				'profile_id' => $user_profile->id,
				'first_name' => $user_profile->first_name,
				'last_name' => $user_profile->last_name,
				'profile_image' => $user_profile->profile_image,
				'empty' => FALSE
			);

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar_navigation');
			$this->load->view('templates/top_navigation');
			$this->load->view('profile_view', $data);
			$this->load->view('templates/footer_content');
			$this->load->view('templates/footer');
		}
	}

	public function update_profile() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar_navigation');
		$this->load->view('templates/top_navigation');
		$this->load->view('update_profile_view');
		$this->load->view('templates/footer_content');
		$this->load->view('templates/footer');
	}

	public function update_user_profile() {
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$user_id = $this->session->userdata('id');
		$config = array(
			'upload_path' => 'upload/',
			'allowed_types' => 'gif|jpg|png',
			'file_name' => $user_id,
			'overwrite' => TRUE,
			'max_size' => 1024
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload('profile_image')) {
			$this->upload->data('file_name');
		}
	}
}