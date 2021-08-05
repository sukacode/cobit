<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('is_logged_in') != true){
        	redirect(base_url('auth'));
		}
		
	}
	function index(){
		if ($this->session->userdata('status_user') == 'Admin'){
			$this->template->load('media/template','main/dashboard');
		}
			else {
				$this->template->load('media/template','main/dashboard1');
			}
	
	}
}
?>