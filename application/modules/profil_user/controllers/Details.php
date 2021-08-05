<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Details extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->template->load('media/template','profil_user/details');
	}	
}
?>