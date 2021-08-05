<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class User_model extends CI_Model{

	public $table = 'user';
	public $id = 'token_user';
	public $order = 'DESC';
	
	function __construct(){
		parent::__construct();
	}	

	function getUser(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table);
	}

	function getWhere($where, $table){
		return $this->db->get_where($this->table, $where);
	}

	function insertData($data, $table){
		$this->db->insert($this->table, $data);
	}

	function getUpdate($where, $data, $table){
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}

	function getDelete($where, $table){
		$this->db->where($where);
		$this->db->delete($this->table);
	}
	
	function validUser($where, $table){
		$this->db->where($where);
		$query = $this->db->get($this->table);

		if ($query->num_rows() > 0){
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
?>