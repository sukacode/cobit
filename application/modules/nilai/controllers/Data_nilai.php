<?php

class Data_nilai extends CI_Controller{


function __construct(){
	parent::__construct();

	$this->load->model('Nilai_model');
	$this->load->helper(array('form','fungsidate_helper','url'));
	$this->load->library(array('form_validation','session','upload'));
	$this->model = $this->Nilai_model;
	}

	public function index(){
		$this->Nilai_model->getDelete('tbl_hasil');
		$data['tbl_nilai'] = $this->Nilai_model->getAll()->result();

		// foreach ($tbl_nilai as $row ) {
			
		// 	for ($i=0; $i <$row->jumlah_responden ; $i++) { 
		// 		$data[]=$row->jumlah_responden;
		// 	}
		// }
		// var_dump($data);
		// exit;

		$this->template->load('media/template','nilai/Nilai_list', $data);
	}
	public function matury(){
		$data['tbl_nilai'] = $this->Nilai_model->getAll1()->result();

		$this->template->load('media/template','nilai/Nilai_list_matury', $data);
	}
	public function cetak_matury(){
		$data['tbl_nilai'] = $this->Nilai_model->getAll1()->result();

		$this->load->view('nilai/Nilai_list_matury_cetak', $data);
	}
	public function gap(){
		$data['tbl_nilai'] = $this->Nilai_model->getAll1()->result();

		$this->template->load('media/template','nilai/Nilai_list_gap', $data);
	}
	public function cetak_gap(){
		$data['tbl_nilai'] = $this->Nilai_model->getAll1()->result();

		$this->load->view('nilai/Nilai_list_gap_cetak', $data);
	}
	function get_nilai($id_domain){
		$query1 = $this->db->query("select * from tbl_domain where id_domain='$id_domain' ");
		$query = $this->db->query("select max(kode_responden) as max_id from tbl_nilai where id_domain='$id_domain'");
		$rows= $query->row();
		$rows1= $query1->row();
		$kode= $rows->max_id;
		$noUrut=(int)substr($kode,2);
		$noUrut++;
		$char="N$rows1->id_domain";
		$data['kode']=$char.sprintf("%01s", $noUrut);
	
		$where = array('id_domain' => $id_domain);
		$where1 = array('id_domain' => $id_domain);
		$data['domain_list'] = $this->Nilai_model->getWhere($where, 'tbl_domain')->row();
		$data['total_list'] = (($this->Nilai_model->getWhere($where1, 'tbl_nilai')->num_rows()) / $rows1->total_pertanyaan) + 1;
		// var_dump($data);
		// exit;
		// $data['k_list']   = $this->Nilai_model->kriteria()->result();
		$this->template->load('media/template','nilai/Nilai_new', $data);
		
	}

	function newData(){
		$data['nil_list'] = $this->Nilai_model->getUser()->result();
		$data['k_list']   = $this->Nilai_model->kriteria()->result();
	
		$this->template->load('media/template','nilai/Nilai_new', $data);
		
	}

	
	function actNew(){
		
        $insert_data = array();
		$field_data = $this->input->post('nilai');
		$id_domain = $this->input->post('id_domain');
		$kode_responden = $this->input->post('kode_responden');
        for($i = 0; $i < count($field_data); $i++)
        {
            $insert_data[] = array(
				'kode_responden'  => $kode_responden ,
				'id_domain' => $id_domain,
				'nilai' 		 => $field_data[$i]
            );
		}
		
		
	
		$this->db->insert_batch('tbl_nilai', $insert_data);
		redirect (base_url('nilai/Data_nilai/get_nilai/'.$id_domain.''));

    }
	
	
	function editData($id){
		$where = array('penilaian.id_penilaian' => $id);
		$data['dad'] = $this->Nilai_model->getWhere2($where, 'penilaian')->result();
		$data['dad1'] = $this->Nilai_model->getWhere3($where, 'penilaian')->result();
		$this->template->load('media/template','nilai/Nilai_edit', $data);
	}
	function details($id){
		$where = array('penilaian.id_alternatif' => $id);
		$data['det'] = $this->Nilai_model->getWhere1($where, 'penilaian')->result();
		$this->template->load('media/template','nilai/Nilai_details', $data);
	}
	function updateData(){

		$id = $this->input->post('id');
		$kode_gedung   = $this->input->post ('kode_gedung');
		$nama   = $this->input->post ('nama_siswa');
		$jenis  = $this->input->post ('jk');
		$asal  = $this->input->post ('asal');

	
		
		/*-- update data jika foto user tidak diganti --*/
		$data = array(
			'kode_gedung' => $kode_gedung,
				'nama_siswa' => $nama,
				'jenis_kelamin' => $jenis,
				'asal_sekolah' => $asal
			
			);
		

		$where = array(
			'id_alternatif' => $id
			);

			$this->Nilai_model->getUpdate($where, $data, 'alternatif');
			$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data Jenis Soal telah diperbarui.
                    <br />
                </div>");
				redirect (base_url('nilai/Data_nilai'));

		
	}

	public function delete(){
		$this->model->delete1();
		$this->session->set_flashdata("success",
		"<div class='alert alert-block alert-success'>
			<button type='button' class='close' data-dismiss='alert'>
				<i class='ace-icon fa fa-times'></i>
			</button>

			  Data Berhasil Dihapus.
			<br />
		</div>");
		redirect (base_url('nilai/Data_nilai'));
		}

		
	function deleteData($id){		
		

		$where = array('id_alternatif' => $id);

		/*-- ambil data (foto_user) dari tabel user --*/
		
		$this->Nilai_model->getDelete($where, 'Alternatif');
		$this->session->set_flashdata("success",
				"<div class='alert alert-block alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>

                   	Data Jenis Soal telah terhapus.
                    <br />
                </div>");
				redirect (base_url('nilai/Data_nilai'));

	}
	
}