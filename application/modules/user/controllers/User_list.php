<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class User_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('User_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['u_list'] = $this->User_model->getUser()->result();
		$this->template->load('media/template','user/user_list', $data);
	}

	function newData(){
		$this->template->load('media/template','user/user_new');
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './foto_user/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
		$config['max_size'] = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		/*-- hapus spasi pada nama file foto --*/
		$config['remove_space'] = TRUE;
 		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);		
		/*-- end --*/

		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");
		
		$user = $this->input->post('userNm');
		$passOrigin = $this->input->post('pswd');
		$pass = md5($passOrigin);
		$nmUser = $this->input->post('nmPengguna');
		$email = $this->input->post('emailPengguna');
		$token = sha1($user);
	
		if ($_FILES['berkas']['name']){
			if (!$this->upload->do_upload('berkas')){
				$error = $this->upload->display_errors();
				print_r($error);
				exit();		
			} else {
				$gbr = $this->upload->data();
			}
		}
		
		$data = array(
			'username' => $user,
			'pswd' => $pass,
			'pswd_origin' => $passOrigin,
			'nm_user' => $nmUser,
			'email_user' => $email,
			'crea_dt_user' => $tglskrg,
			'crea_tm_user' => $jamskrg,
			'foto_user' => $gbr['file_name'],
			'token_user' => $token
		);
		
		$this->form_validation->set_rules('userNm','Username','callback_valid_username');
		$this->form_validation->set_rules('emailPengguna','e-Mail Pengguna', 'valid_email');

		if ($this->form_validation->run() == false){
			$this->template->load('media/template','user/user_list');
		} else {
			$this->User_model->insertData($data, 'user');
			$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data pengguna telah tersimpan.
                    <br />
                </div>");
			redirect(base_url('user/user_list'));
		}
	}

	function details($id){
		$where = array('token_user' => $id);
		$data['dna'] = $this->User_model->getWhere($where, 'user')->result();
		$this->template->load('media/template','user/user_detail', $data);
	}
	
	function editData($id){
		$where = array('token_user' => $id);
		$data['dad'] = $this->User_model->getWhere($where, 'user')->result();
		$this->template->load('media/template','user/user_edit', $data);
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './foto_user/';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
		$config['max_size'] = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		/*-- hapus spasi pada nama file foto --*/
		$config['remove_space'] = TRUE;
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);
		/*-- end --*/

		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$id = $this->input->post('id');
		$fileLama = $this->input->post('filelama');
		$user = $this->input->post('userNm');
		$passOrigin = $this->input->post('pswd');
		$pass = md5($passOrigin);
		$nama = $this->input->post('nmPengguna');
		$email = $this->input->post('emailPengguna');
		$status = $this->input->post('statusPengguna');

		if ($_FILES['berkas']['name']){
			if (!$this->upload->do_upload('berkas')){
				$error = $this->upload->display_errors();
				print_r($error);
				exit();	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'username' => $user,
					'pswd' => $pass,
					'pswd_origin' => $passOrigin,
					'nm_user' => $nama,
					'email_user' => $email,
					'mod_dt_user' => $tglskrg,
					'mod_tm_user' => $jamskrg,
					'status_user' => $status,
					'foto_user' => $gbr['file_name']
				);

				@unlink($path.$fileLama);
			}
		} else {
		
		/*-- update data jika foto user tidak diganti --*/
		$data = array(
			'username' => $user,
			'pswd' => $pass,
			'pswd_origin' => $passOrigin,
			'nm_user' => $nama,
			'email_user' => $email,
			'mod_dt_user' => $tglskrg,
			'mod_tm_user' => $jamskrg,
			'status_user' => $status
			);
		}

		$where = array(
			'token_user' => $id
			);

		$this->form_validation->set_rules('emailPengguna','e-Mail Pengguna','valid_email');

		if ($this->form_validation->run() == false){
			$this->template->load('media/template','user/user_list');
		} else {
			$this->User_model->getUpdate($where, $data, 'user');
			$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data pengguna telah diperbarui.
                    <br />
                </div>");
			redirect(base_url('user/user_list'));
		}
	}

	function deleteData($id){		
		$path = './foto_user/';

		$where = array('token_user' => $id);

		/*-- ambil data (foto_user) dari tabel user --*/
		$query = $this->User_model->getUser();
		$row = $query->row();

		unlink($path.$row->foto_user);

		$this->User_model->getDelete($where, 'token_user');
		$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data pengguna telah terhapus.
                    <br />
                </div>");
		redirect(base_url('user/user_list'));
	}

	function valid_username($user){
		$where = array('username' => $user);
		$res = $this->User_model->validUser($where, 'user');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_username','Username sudah digunakan.');
			return FALSE;
		}
	}

}
?>