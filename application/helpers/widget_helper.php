<?php
function five_title_post(){
$ci =& get_instance();
$ci->load->database(); //untuk memanggil class database;
$ci->db->select('nama_soal,id_soal');
$q = $ci->db->get('tbl_soal');
$data = $q->result();
return $data;
}