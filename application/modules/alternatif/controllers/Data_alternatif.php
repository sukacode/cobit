<?php

class Data_alternatif extends CI_Controller{


function __construct(){
	parent::__construct();

	$this->load->model('Alternatif_model');
	$this->load->helper(array('form','fungsidate_helper','url'));
	$this->load->library(array('form_validation','session','upload'));
	}

	public function index(){
		$data['a_list'] = $this->Alternatif_model->getUser()->result();
		$this->template->load('media/template','Alternatif/Alternatif_list', $data);
	}

	function newData(){
		$this->template->load('media/template','Alternatif/Alternatif_new');
		
	}
	function actNew(){
		$kode_gedung   = $this->input->post ('kode_gedung');
		$nama   = $this->input->post ('nama_gedung');
		
        
        $data=array (
				'kode_gedung' => $kode_gedung,
				'nama_gedung' => $nama
			
				
                
        );
        
		$this->Alternatif_model->insertData($data, 'alternatif');
		$this->session->set_flashdata("success",
		"<div class='alert alert-block alert-success'>
			<button type='button' class='close' data-dismiss='alert'>
				<i class='ace-icon fa fa-times'></i>
			</button>
			Data Alternatif Berhasil Disimpan.
			<br />
		</div>");
    		redirect (base_url('alternatif/Data_alternatif'));

	}
	function editData($id){
		$where = array('id_Alternatif' => $id);
		$data['dad'] = $this->Alternatif_model->getWhere($where, 'Alternatif')->result();
		$this->template->load('media/template','Alternatif/Alternatif_edit', $data);
	}
	function updateData(){

		$id = $this->input->post('id');
		$kode_gedung   = $this->input->post ('kode_gedung');
		$nama   = $this->input->post ('nama_gedung');
	

			$data = array(
			'kode_gedung' => $kode_gedung,
				'nama_gedung' => $nama
				
			
			);
		
		$where = array(
			'id_alternatif' => $id
			);

			$this->Alternatif_model->getUpdate($where, $data, 'alternatif');
			$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data Jenis Alternatif telah diperbarui.
                    <br />
                </div>");
				redirect (base_url('alternatif/Data_alternatif'));

		
	}
	function deleteData($id){		
		
		$where = array('id_alternatif' => $id);
		
		$this->Alternatif_model->getDelete($where, 'Alternatif');
		$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data Jenis Alternatif telah terhapus.
                    <br />
                </div>");
				redirect (base_url('alternatif/Data_alternatif'));

	}
	
}