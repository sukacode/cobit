<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Nilaiakhir_model extends CI_Model{

	public $table = 'alternatif';
	public $id = 'id_alternatif';
	public $order = 'ASC';

	public $table2 = 'penilaian';
	public $id2 = 'id_penilaian';
	public $order2 = 'ASC';

	public $table3 = 'kriteria';
	public $id3 = 'id_kriteria';
	public $order3 = 'ASC';

	public $table4 = 'ranking';
	public $id4 = 'id_ranking';
	public $order4 = 'ASC';
	
	function __construct(){
		parent::__construct();
	}	

	function getJoin(){
		$this->db->select('*');
		$this->db->from($this->table4);
		$this->db->join($this->table, ' rankings.id_alternatif  =  alternatif.id_alternatif', 'left');
		$this->db->order_by('total','DESC');
		// $this->db->where('orang_tua`.`username','hafiz33');
		return $this->db->get();
	}
	function getAlternatif(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table);
	}
	function getCetak(){
		$this->db->order_by($this->id4, $this->order4);
		return $this->db->get($this->table4);
	}
	function getKriteria(){
		$this->db->order_by($this->id3, $this->order3);
		return $this->db->get($this->table3);
	}
	function getNilai(){
		$this->db->order_by($this->id2, $this->order2);
		return $this->db->get($this->table2);
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

	function getDelete($table){
		$this->db->empty_table($table);
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