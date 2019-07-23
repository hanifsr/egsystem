<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
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

			$set = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$hash = substr(str_shuffle($set), 0, 32);

			$data = array(
				'email' => $email,
				'password' => $password,
				'hash' => $hash
			);

			$user = $this->user_model->get_user($email, $password, 0);

			if($user) {
				$this->session->set_flashdata('message', 'Email has already been registered!');
				redirect(site_url('login'));
			} else {
				$user = $this->user_model->set_user($data);

				if($user) {
					$data_session = array(
						'id' => $user->id,
						'email' => $email,
						'online' => TRUE
					);
					$this->session->set_userdata($data_session);

					redirect(site_url('home'));
				} else {
					$this->session->set_flashdata('message', 'Something went wrong when registering user!');
					redirect(site_url('login'));
				}
			}

			/*
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => '<a href="mailto:hanifsr96@gmail.com" rel="nofollow">hanifsr96@gmail.com</a>',
				'smtp_pass' => 'hanifsr96',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$message = "
							<html>
							<head>
								<title>Verification Code</title>
							</head>
							<body>
								<h2>Thank you for registering.</h2>
								<p>Your account:</p>
								<p>Email:" .$email. "</p>
								<p>Password:" .$password. "</p>
								<p>Please click the link to activate your account.</p>
								<h4><a href='" .site_url('login/activate/'.$email.'/'.$hash)."'>Activate My Account</a></h4>
							</body>
							</html>
			";

			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('Sign up Verification Email');
			$this->email->message($message);

			if($this->email->send()) {
				$this->session->set_flashdata('message', 'Activation code sent to email');
			} else {
				$this->session->set_flashdata('message', $this->email->print_debugger());
			}
			*/

			// redirect(site_url('home'));
		}
	}

	/*
	public function activate() {
		$email = $this->uri_segment(3);
		$hash = $this->uri_segment(4);

		$user = $this->user_model->get_user($email);

		if($user->hash == $hash) {
			$data['is_verified'] = TRUE;
			$query = $this->user_model->activate_user($email, $data);

			if($query) {
				$this->session->set_flashdata('message', 'User activated successfully');
			} else {
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		} else {
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect(site_url('login'));
	}
	*/

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

			$user = $this->user_model->get_user($email, $password, 1);

			if($user) {
				$data_session = array(
					'id' => $user->id,
					'email' => $email,
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