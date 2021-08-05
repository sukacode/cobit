<?php

class Report extends CI_Controller{


		public function __construct(){
		parent::__construct();

		$this->load->model('Report_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload','pdf'));

	}

	public function index(){
		
		$data['p_list'] = $this->Report_model->cetak()->result();
		$this->template->load('media/template','report/report_list', $data);
	   
		
		   
	   }

	public function proses_nilai(){
		$this->report_model->getDelete('ranking');
		$data['k_list'] = $this->report_model->getKriteria()->num_rows();
		$data['kr_list'] = $this->report_model->getKriteria()->result();
		$data['a_list'] = $this->report_model->getAlternatif()->result();
		
		$this->template->load('media/template','akhir/akhir_list', $data);
	}
	public function cetak_data(){
	
		$data['d_list'] = $this->Report_model->getCetak()->result();
		
		
		$this->load->view('report/cetak_data', $data);
	
	$paper_size = 'A4';
	$orientation = 'portrait';
	$html = $this->output->get_output();

	$this->pdf->set_paper('A4', 'portrait');
	$this->pdf->load_html($html);
	$this->pdf->render();
	$this->pdf->stream("Cetak-penilaian.pdf", array('Attachment' => 0));
}
	public function cetak_kayu(){
	
		$data['p_list'] = $this->Report_model->cetak()->result();
		
		
		$this->load->view('report/cetak_penilaian', $data);
	
	$paper_size = 'A4';
	$orientation = 'portrait';
	$html = $this->output->get_output();

	$this->pdf->set_paper('A4', 'portrait');
	$this->pdf->load_html($html);
	$this->pdf->render();
	$this->pdf->stream("Cetak-penilaian.pdf", array('Attachment' => 0));
}

}