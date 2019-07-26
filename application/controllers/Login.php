<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$online = $this->session->userdata('online');
		if($online) {
			redirect(site_url('home'));
		} else {
			$this->load->view('templates/header');
			$this->load->view('login_view');
			$this->load->view('templates/footer');
		}
	}

	public function register() {
		$this->form_validation->set_rules('email_register', 'E-mail', 'valid_email|required');
		$this->form_validation->set_rules('password_register', 'Password', 'required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password_register]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('login_view');
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email_register');
			$password = $this->input->post('password_register');

			$data = array(
				'email' => $email
			);

			$user = $this->user_model->get_user($data);

			if(!empty($user)) {
				$this->session->set_flashdata('message', 'Email has already been registered!');
				redirect(site_url('login'));
			} else {
				$name = explode("@", $email);
				$data['password'] = $password;
				$data['first_name'] = $name[0];

				$user_id = $this->user_model->add_user($data);

				if(!empty($user_id)) {
					$data_session = array(
						'id' => $user_id,
						'online' => TRUE
					);
					$this->session->set_userdata($data_session);

					redirect(site_url('home'));
				} else {
					$this->session->set_flashdata('message', 'Something went wrong when registering user!');
					redirect(site_url('login'));
				}
			}
		}
	}

	public function login_check() {
		$this->form_validation->set_rules('email_login', 'E-mail', 'valid_email|required');
		$this->form_validation->set_rules('password_login', 'Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('login_view');
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email_login');
			$password = $this->input->post('password_login');

			$data = array(
				'email' => $email,
				'password' => $password
			);

			$user = $this->user_model->get_user($data);

			if(!empty($user)) {
				$data_session = array(
					'id' => $user->id,
					'online' => TRUE
				);
				$this->session->set_userdata($data_session);

				redirect(site_url('home'));
			} else {
				$this->session->set_flashdata('message', 'E-mail and Password are incorrect!');
				redirect(site_url('login'));
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}