<?php

class Domain extends CI_Controller{


function __construct(){
	parent::__construct();

	$this->load->model('Domain_model');
	$this->load->helper(array('form','fungsidate_helper','url'));
	$this->load->library(array('form_validation','session','upload'));
	}

	public function index(){
		$data['k_list'] = $this->Domain_model->getUser()->result();
		$this->template->load('media/template','domain/domain_list', $data);
	}

	function newData(){
		$this->template->load('media/template','domain/domain_new');
		
	}
	function actNew(){
	// $query = $this->db->query("select max(id_domain) as max_id from domain");
	// $rows = $query->row();
	// $kode= $rows->max_id;
	// $noUrut=(int)substr($kode,2);
	// $noUrut++;
	// $char="KR00";
	// $kode=$char.sprintf("%u", $noUrut);
	
		$namadomain  = $this->input->post ('nama_domain');
		$level  = $this->input->post ('level');
		$total_pertanyaan  = $this->input->post ('total_pertanyaan');
		$jumlah_responden  = $this->input->post ('jumlah_responden');
	
        $data=array (
                'nama_domain'       => $namadomain,
                'level'       => $level,
                'total_pertanyaan'       => $total_pertanyaan,
                'jumlah_responden'       => $jumlah_responden
                
        );
        
		$this->Domain_model->insertData($data, 'tbl_domain');
		$this->session->set_flashdata("success",
		"<div class='alert alert-block alert-success'>
			<button type='button' class='close' data-dismiss='alert'>
				<i class='ace-icon fa fa-times'></i>
			</button>

			   Data Domain telah tersimpan.
			<br />
		</div>");
    		redirect (base_url('domain/domain'));

	}
	function editData($id){
		$where = array('id_domain' => $id);
		$data['dad'] = $this->Domain_model->getWhere($where, 'domain')->result();
		$this->template->load('media/template','domain/domain_edit', $data);
	}
	function updateData(){
		/*-- upload file --*/


		$id = $this->input->post('id');
		$namadomain  = $this->input->post ('nama_domain');
		$level  = $this->input->post ('level');
		$total_pertanyaan  = $this->input->post ('total_pertanyaan');
		$jumlah_responden  = $this->input->post ('jumlah_responden');
		$data = array(
			'nama_domain'       => $namadomain,
			'level'       => $level,
			'total_pertanyaan'       => $total_pertanyaan,
			'jumlah_responden'       => $jumlah_responden
			);
		

		$where = array(
			'id_domain' => $id
			);

			$this->Domain_model->getUpdate($where, $data, 'domain');
			$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data Jenis Soal telah diperbarui.
                    <br />
                </div>");
			redirect(base_url('domain/domain'));
		
	}
	function deleteData($id){		
		

		$where = array('id_domain' => $id);

		/*-- ambil data (foto_user) dari tabel user --*/
		
		$this->Domain_model->getDelete($where, 'domain');
		$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data Domain telah terhapus.
                    <br />
                </div>");
				redirect(base_url('domain/domain'));
	}
	
}