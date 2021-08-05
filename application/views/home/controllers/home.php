<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data ['title'] 	= "Home";
		$data ['page'] 		= "home";
		
		$this->load->view('v_home/v_app', $data);
	}

	
	public function about_us()
	{
		$data ['title'] 	= "About Us";
		$data ['page'] 		= "about_us";
		$this->load->view('v_home/v_app', $data);
	}

	public function download($nama){
		$nama_files = $nama; 
		$download = 'uploads/pengumuman/';
		if (!file_exists($download.$nama_files)) {
		  $error =  "<h3>Access forbidden!</h3>
		      <p> Anda tidak diperbolehkan mendownload file ini.</p>";
		  $this->session->set_flashdata('warning', $error);
		  redirect('home/formasi_asisten');
		}else{

		header("Content-Type: octet/stream");
  		header("Content-Disposition: attachment; filename=\"".$nama_files."\"");
  		$fp = fopen($download.$nama_files, "r");
  		$data = fread($fp, filesize($download.$nama_files));
  		fclose($fp);
  		print $data;
  		}
	}
}
