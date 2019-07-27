<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$user = array(
			'id' => $this->session->userdata('id')
		);

		$data = array(
			'user' => $this->user_model->get_user($user)
		);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar_navigation', $data);
		$this->load->view('templates/top_navigation', $data);
		$this->load->view('profile_view', $data);
		$this->load->view('templates/footer_content');
		$this->load->view('templates/footer');
	}

	public function update_profile() {
		$user = array(
			'id' => $this->session->userdata('id')
		);

		$data = array(
			'user' => $this->user_model->get_user($user)
		);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar_navigation', $data);
		$this->load->view('templates/top_navigation', $data);
		$this->load->view('update_profile_view', $data);
		$this->load->view('templates/footer_content');
		$this->load->view('templates/footer');
	}

	public function update_user_profile() {
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->update_profile();
		} else {
			$user_id = $this->session->userdata('id');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');

			if(!empty($_FILES['profile_image']['name'])) {
				$this->load->helper('date');

				$format = '%Y%m%d%H%i%s';
				date_default_timezone_set('ETC/GMT-7');

				$config = array(
					'upload_path' => './uploads/',
					'allowed_types' => 'gif|jpg|png',
					'file_name' => $user_id.'_'.mdate($format),
					'overwrite' => TRUE,
					'max_size' => 1024
				);
	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('profile_image')) {
					$image_name = $this->upload->data('file_name');
				} else {
					$image_name = 'user.png';
				}
			} else {
				$image_name = $this->input->post('old_image');
			}

			$data = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'profile_image' => $image_name
			);

			$this->user_model->update_user($data, $user_id);

			redirect(site_url('profile'));
		}
	}
}