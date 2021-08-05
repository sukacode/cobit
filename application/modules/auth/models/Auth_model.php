<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public $table = 'user';

	function __construct()
	{
		parent::__construct();
	}

	function cekLogin()
	{
		$this->db->where('username', $this->input->post('usernm'));
		$this->db->where('pswd', md5($this->input->post('password')));
		$login = $this->db->get($this->table);

		if ($login->num_rows() == 1) {
			return $login->result_array();
		}
	}
}
