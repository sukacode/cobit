<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Nilai_model extends CI_Model{
	public $jumlah;
	var $tbl_domain = 'tbl_domain';
	var $id2= 'id_domain';
	var $order2 = 'ASC';

	var $table = 'penilaian';
	var $id = 'id_penilaian';
	var $order = 'ASC';

	var $table3 = 'kriteria';
	var $id3 = 'id_kriteria';
	var $order3= 'ASC';

	var $table4 = 'parameter';
	var $id4 = 'id_parameter';
	var $order4= 'ASC';
	
	var $table5 = 'ranking';
	
	function __construct(){
		parent::__construct();
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('tbl_domain');
		return $this->db->get();
	}
	function getAll1(){
		$this->db->select('*');
		$this->db->from('tbl_domain');
		$this->db->join('tbl_hasil', ' tbl_domain.id_domain  =  tbl_hasil.id_domain', 'LEFT');
		return $this->db->get();
	}
	function getUser(){
		$this->db->order_by($this->id2, $this->order2);
		return $this->db->get($this->tbl_domain);
	}
	
	function getWhere1($where, $table){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->table2, ' penilaian.id_alternatif  =  alternatif.id_alternatif', 'LEFT');
		$this->db->join($this->table3, ' penilaian.id_kriteria  =  kriteria.id_kriteria','LEFT');
		$this->db->where($where);
		
		return $this->db->get();
	}

	function getWhere2($where, $table){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->table3, ' penilaian.id_kriteria  =  kriteria.id_kriteria','LEFT');
		$this->db->join($this->table4, ' parameter.id_kriteria   = kriteria.id_kriteria ','LEFT');
		$this->db->where($where);
		
		return $this->db->get();
	}
	function getWhere3($where, $table){
		$this->db->select('*');
		$this->db->group_by('kriteria.nama_kriteria');
		$this->db->from($this->table);
		$this->db->join($this->table3, ' penilaian.id_kriteria  =  kriteria.id_kriteria','LEFT');
		$this->db->join($this->table4, ' parameter.id_kriteria   = kriteria.id_kriteria ','LEFT');
		$this->db->where($where);
		
		return $this->db->get();
	}

	function kriteria(){
		$this->db->order_by($this->id3, $this->order3);
		return $this->db->get($this->table3);
	}

	
	
	
		

		
		public function save()
		{
			$alternatif = $this->input->post('id_alternatif');
			$result = array();
			foreach ($alternatif as $key => $val) {
				$result_add = array(
					'id_alternatif' => $_POST['id_alternatif'][$key],
					'kode_gedung' => $_POST['id_alternatif'][$key],
					'id_sub_kriteria' => $_POST['id_kriteria'][$key],
					'nilai' => $_POST['nilai'][$key]
	
				);
				array_push($result,$result_add);
			} 
			$this->db->insert_batch($this->table, $result);
		}
	function insertData($data){
		$this->db->insert()($this->table5, $data);
	}

	public function delete1(){
		$this->db->empty_table('penilaian');
		$this->db->empty_table('ranking');

	}
	function getWhere($where, $table){
		return $this->db->get_where($table, $where);
	}
	function getUpdate($where, $data, $table){
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}

	function getDelete($table){
		$this->db->empty_table($table);
	}

	function validNikSkck($where, $table){
		$this->db->where($where);
		$query = $this->db->get($this->table);

		if ($query->num_rows() > 0){
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/*-- selected value from dropdown list jns_pelayanan --
	function dropdownList($where, $table){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->table2, 'skck.id_jnspel = jns_pelayanan.id_jnspel');
		$this->db->where($where);
		$this->db->order_by($this->id, $this->order);
		return $rec = $this->db->get();

		$data = array();
		$data[0] = 'SELECT';

		foreach($rec->result() as $row){
			$data[$row->id_jnspel] = $row->nm_jnspel;
		}
		return $data;
	}
	*/

}
?>
