<?php

class Data_nilaiakhir extends CI_Controller{


		public function __construct(){
		parent::__construct();

		$this->load->model('Nilaiakhir_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload','pdf'));

	}

	public function index(){
		
		   $this->proses_nilai();
	   
		
		   
	   }

	public function proses_nilai(){
		$this->Nilaiakhir_model->getDelete('ranking');
		$data['k_list'] = $this->Nilaiakhir_model->getKriteria()->num_rows();
		$data['kr_list'] = $this->Nilaiakhir_model->getKriteria()->result();
		$data['a_list'] = $this->Nilaiakhir_model->getAlternatif()->result();
		$data['ar_list'] = $this->Nilaiakhir_model->getAlternatif()->num_rows();
		
		$this->template->load('media/template','akhir/akhir_list1', $data);
	}
	public function cetak(){
		$data['c_list'] = $this->Nilaiakhir_model->cetak()->result();
	
		
		
	$this->load->view('akhir/cetak', $data);
	
	$paper_size = 'Legal';
	$orientation = 'portrait';
	$html = $this->output->get_output();

	$this->pdf->set_paper('A4', 'portrait');
	$this->pdf->load_html($html);
	$this->pdf->render();
	$this->pdf->stream("Cetak-WP.pdf", array('Attachment' => 0));
}

}