<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public $data;
	public function __construct()
	{
		parent::__construct();
		$this->data['mode'] = isset($_GET['mode']) ? $_GET['mode'] : 'new';
	}

	public function index()
	{
		if ($this->session->userdata('user')) {
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', 'You are already logged in');
			redirect(URL . 'dashboard');
		}



		if (isset($_GET['to']) && !empty($_GET['to'])) {
			$this->data['to'] = $_GET['to'];
		} else {
			$this->data['to'] = URL . 'dashboard';
		}

		$this->data['title'] = $this->is_admin_exists() ? 'Login' : 'Install';
		$this->data['page'] = $this->is_admin_exists() ? 'auth' : 'create_admin';

		$this->load->view('index', $this->data);
	}

	public function installSoftware()
	{
		$data = $this->input->post();
		if ($this->install_admin($data)) {
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', 'Admin account created successfully. Please log in.');
		} else {
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', 'Failed to create admin account. Please try again.');
		}
		redirect(URL);
	}

	public function loginUser()
	{
		$data = $this->input->post();

		$search_user = $this->Handler->get_row('users', ['where' => [
			'username' => $data['username'],
		]]);

		if (empty($search_user)) {
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', 'Username not found. Please try again.');
			redirect(URL);
		} else {
			if ($search_user->password_hash != md5($data['password'])) {
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', 'Password incorrect for user ' . $data['username']);
				redirect(URL);
			} else {
				$this->session->set_userdata('user', $search_user);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', 'Logged In Successfully .Welcome to ' . APP_NAME);
				redirect($data['to_url']);
			}
		}
	}
	public function install_admin(array $data): bool
	{
		$admin = [
			'username' => $data['username'],
			'full_name' => $data['full_name'],
			'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT),
			'role_id' => 1,
			'email' => $data['email'],
			'phone' => $data['phone'],
		];

		return $this->db->insert('users', $admin);
	}

	public function is_admin_exists(): bool
	{
		return $this->Handler->get_all('users', ['only_count' => true, 'where' => ['role_id' => 1]]) > 0;
	}


	public function logoutUser()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', 'Logged out successfully.');
		redirect(URL);
	}
}
