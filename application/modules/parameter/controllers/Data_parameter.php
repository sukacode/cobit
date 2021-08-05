<?php

class Data_parameter extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('Parameter_model');
		$this->model = $this->Parameter_model;
	}

	public function index(){
		$this->select(); 
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_kriteria = $_POST['id_kriteria'];	
			$this->model->parameter_nilai = $_POST['parameter_nilai'];	
			$this->model->bobot_parameter = $_POST['bobot_parameter'];
			$this->model->keterangan = $_POST['keterangan'];
			$this->model->insert();
			$this->session->set_flashdata("success",
			"<div class='alert alert-block alert-success'>
				<button type='button' class='close' data-dismiss='alert'>
					<i class='ace-icon fa fa-times'></i>
				</button>
				Data Parameter tersimpan.
				<br />
			</div>");
			redirect('parameter/Data_parameter/index');
		} else {
			$rows = $this->model->select1();
			$this->template->load('media/template','parameter/view_tambah_parameter', ['rows'=>$rows]);
		}
	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->template->load('media/template','parameter/view_data_parameter', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->template->load('media/template','parameter/view_data_parameter', ['rows'=>$rows]); }
	}

	public function detail(){
	$this->model->id_kriteria = $_GET['id_kriteria'];
	$this->model->detail();
	$rows = $this->model->detail();
	$this->template->load('media/template','parameter/view_detail_parameter', ['rows'=>$rows]);
	}


	public function update(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id = $_POST['id_parameter'];
			$this->model->parameter_nilai = $_POST['parameter_nilai'];
			$this->model->bobot_parameter = $_POST['bobot_parameter'];
			$this->model->keterangan = $_POST['keterangan'];
			$this->model->update();
			$this->session->set_flashdata("success",
			"<div class='alert alert-block alert-success'>
				<button type='button' class='close' data-dismiss='alert'>
					<i class='ace-icon fa fa-times'></i>
				</button>
				Data Parameter Berhasil Di Ubah.
				<br />
			</div>");
			
			redirect('parameter/data_parameter/index');
		} else {
			$id_parameter = $_GET['id_parameter'];
			$query = $this->db->query("select * from kriteria a join parameter b 
				on a.id_kriteria=b.id_kriteria where b.id_parameter='$id_parameter'");
			$this->template->load('media/template','parameter/view_ubah_parameter',['query'=>$query]);
		}
	}

	public function delete(){
	$this->model->id = $_GET['id_kriteria'];
	$this->model->delete();
	$this->session->set_flashdata("success",
			"<div class='alert alert-block alert-success'>
				<button type='button' class='close' data-dismiss='alert'>
					<i class='ace-icon fa fa-times'></i>
				</button>
				Data Parameter Berhasil Dihapus.
				<br />
			</div>");
	redirect('parameter/data_parameter/index');
	}
}