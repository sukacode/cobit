<div class="box-header">
    <h3 class="box-title " >Nilai Matriks</h3>
</div>
<div class="table table-bordered table-responsive">
<table class="table table-bordered table-responsive">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th colspan="<?php echo $k_list; ?>">Kriteria</th>
</tr>
<tr>
<?php
for($n=1;$n<=$k_list;$n++){
	echo"<th>C{$n}</th>";
}
?>
</tr>
</thead>
<tbody>
          <?php
					if (!empty($a_list)){
						$no = 1;
						foreach($a_list as $row){				
					?>

          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->nama_siswa; ?></td>
            <?php $idalt = $row->id_alternatif; ?>
            <?php
						$this->db->select('*')
						->from('penilaian')
            ->where('id_alternatif=',$idalt)
            ->order_by('id_penilaian');
						$query = $this->db->get()->result();
			?>

            
          <?php foreach($query as $row1){ ?>
                            <?php
                    if (!empty($kr_list)){
                        $no = 1;
                        $no1 = 0;
                        
                        foreach($kr_list as $row2){		
                        $no1++;
                ?>
               
                    <?php $nilai_perbaikan = 0; ?>  
                    <?php foreach($kr_list as $row3){ ?>
                        <?php $nilai_perbaikan = $nilai_perbaikan + $row3->nilai_target;   ?>        
                    <?php } ?>
                    <?php $nilai_normalisasi = round(($row2->nilai_target/$nilai_perbaikan),3);
                    ?>  
                
					  <td><?php echo $row1->nilai*$nilai_normalisasi; ?></td>
					<?php } ?>
                    
                <?php } ?>
                <?php } ?>

          </tr>


          <?php } ?>
					<?php } ?>

</tbody>
</table>
</div>

<!-- perbaikan bobot -->
<div class="box-header">
    <h3 class="box-title " >Perbaikan Bobot</h3>
</div>
<div class="table table-bordered table-responsive">
<table class="table table-bordered table-responsive">
<thead>
<tr>
<th >No</th>
<th >Bobot</th>
<th> Kriteria </th>
</tr>

</thead>
<tbody>

<?php
    if (!empty($kr_list)){
        $no = 1;
        $no1 = 0;
        
        foreach($kr_list as $row2){		
        $no1++;
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo"W{$no1}";  ?></td>
    <?php $nilai_perbaikan = 0; ?>  
    <?php foreach($kr_list as $row3){ ?>
        <?php $nilai_perbaikan = $nilai_perbaikan + $row3->nilai_target;   ?>        
    <?php } ?>
    <?php $nilai_normalisasi = round(($row2->nilai_target/$nilai_perbaikan),3);
     ?>  
    <td align="center"><?php echo $nilai_normalisasi  ?></td>
  
</tr>

<?php



?>
<?php } ?>
<?php } ?>
</tbody>
</table>
</div>


<div class="box-header">
    <h3 class="box-title " >Nilai Matriks</h3>
</div>
<div class="table table-bordered table-responsive">
<table class="table table-bordered table-responsive">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th colspan="<?php echo $k_list; ?>">Kriteria</th>
</tr>
<tr>
<?php
for($n=1;$n<=$k_list;$n++){
	echo"<th>C{$n}</th>";
}
?>
</tr>
</thead>
<tbody>
          <?php
					if (!empty($a_list)){
						$no = 1;
						foreach($a_list as $row){				
					?>

          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->nama_siswa; ?></td>
            <?php $idalt = $row->id_alternatif; ?>
            <?php
						$this->db->select('*')
						->from('penilaian')
            ->where('id_alternatif=',$idalt)
            ->order_by('id_penilaian');
						$query = $this->db->get()->result();
					    ?>
          <?php foreach($query as $row1){ ?>
					  <td><?php echo $row1->nilai; ?></td>
					<?php } ?>

          </tr>


          <?php } ?>
					<?php } ?>

</tbody>
</table>
</div>
