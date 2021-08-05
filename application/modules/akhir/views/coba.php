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
<th rowspan="2">Total</th>
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
                ->join('subkriteria', ' subkriteria.id_subkriteria  =  penilaian.id_subkriteria', 'left')
                ->where('penilaian.id_alternatif=',$idalt)
                ->order_by('id_penilaian');
				$query = $this->db->get()->result();
			?>

<?php $nilai_S = 1; ?>  
            <?php foreach($query as $row1){ ?>
                <?php $nilai_perbaikan = 0; ?>  
              
                    <?php foreach($kr_list as $row3){ ?>
                        <?php $nilai_perbaikan = $nilai_perbaikan + $row3->nilai_target;   ?>        
                    <?php } ?>
                    
                 
                <?php $nilai_normalisasi = round(($row1->nilai_target/$nilai_perbaikan),3);?> 
                <?php
                    if ($row1->jenis_penilaian=='Bennefit'){
                        $nilai_tot = $nilai_normalisasi * 1;
                    }
                    else {
                        $nilai_tot = $nilai_normalisasi * (-1);
                    }
                    ?>
                <?php $nilai_S = $nilai_S*(pow($row1->nilai,  $nilai_tot));?>
            <td><?php echo $row1->nilai; ?></td>
            <?php } ?>
            <td><?php echo round(($nilai_S),3); ?></td>
        <?php } ?>

        </tr>


        <?php } ?>

</tbody>
</table>
</div>

