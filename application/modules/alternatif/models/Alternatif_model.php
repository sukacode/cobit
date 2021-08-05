<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Alternatif_model extends CI_Model{

	public $table = 'alternatif';
	public $id = 'id_alternatif';
	public $order = 'ASC';
	
	function __construct(){
		parent::__construct();
	}	

	function getUser(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table);
	}

	public function getWhere($where, $table){
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