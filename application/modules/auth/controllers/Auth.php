<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('login');
	}

	function actLogin()
	{
		$cek = $this->Auth_model->cekLogin();

		if ($cek) {
			foreach ($cek as $data_session) {
				$usernm = $data_session['username'];
				$pwd = $data_session['pswd'];
				$nama = $data_session['nm_user'];
				$email = $data_session['email_user'];
				$status = $data_session['status_user'];
				$img = $data_session['foto_user'];
			}

			$data_session = array(
				'username' => $usernm,
				'pswd' => $pwd,
				'nm_user' => $nama,
				'email_user' => $email,
				'status_user' => $status,
				'foto_user' => $img,
				'is_logged_in' => true,

			);

			$this->session->set_userdata($data_session);

			redirect(base_url('main/dashboard'));
		} else {
			$this->session->set_flashdata(
				"failed",
				"<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	<strong>
                        <i class='ace-icon fa fa-times'></i>
                        Telah terjadi kesalahan.
                    </strong>

                    Username atau password salah.
                    <br />
                </div>"
			);

			redirect(base_url('auth'));
		}
	}

	function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email_user', 'Email_user', 'trim|required|valid_email|is_unique[user.email_user]');
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('auth/registration', $data);
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'nm_user' => htmlspecialchars($this->input->post('username', true)),
				'email_user' => htmlspecialchars($this->input->post('email_user', true)),
				'pswd' => md5($this->input->post('password1'))

			];

			$this->db->insert('user', $data);

			redirect('auth', 'refresh');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
