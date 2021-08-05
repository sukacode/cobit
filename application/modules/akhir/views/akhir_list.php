	<div class="box-header">
		<h3 class="box-title ">Nilai Matriks</h3>
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
					<td><?php echo $row->nama_kayu; ?></td>
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
	<div class="box-header">
		<h3 class="box-title ">Nilai Evaluasi Faktor</h3>
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
					<td><?php echo $row->nama_kayu; ?></td>
					<?php $idalt = $row->id_alternatif; ?>
					<?php
						$this->db->select('*')
						->from('penilaian')
						->where('id_alternatif=',$idalt)
						->order_by('id_penilaian');
						$query = $this->db->get()->result();
					?>
					<?php $nilai = 0; $total=0; ?>
					<?php foreach($query as $row1){ ?>
					<?php
						$this->db->select('*')
						->from('kriteria')
						->where('id_kriteria=',$row1->id_kriteria);
						$query2 = $this->db->get()->result();
				?>
					<?php foreach($query2 as $row2){ ?>
					<?php $total=$total+$row2->bobot*$row1->nilai; ?>
					<td><?php echo $row2->bobot*$row1->nilai; ?></td>
					<?php } ?>

					<?php } ?>
					<td><?php echo $total; ?></td>
					<?php } ?>
				</tr>

				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="box-header">
		<h3 class="box-title ">Hasil Keputusan</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Total</th>
					<th>Keterangan</th>
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
					<td><?php echo $row->nama_kayu; ?></td>
					<?php $idalt = $row->id_alternatif; ?>
					<?php
						$this->db->select('*')
						->from('penilaian')
						->where('id_alternatif=',$idalt)
						->order_by('id_penilaian');
						$query = $this->db->get()->result();
					?>
					<?php $nilai = 0; $total=0; ?>
					<?php foreach($query as $row1){ ?>
					<?php
						if ($row->attribut=='Bennefit') {
							$this->db->select('*')
							->from('kriteria')
						->where('id_kriteria=',$row1->id_kriteria);
						$query2 = $this->db->get()->result();
						}else{
							$this->db->select('*')
							->from('kriteria')
						->where('id_kriteria=',$row1->id_kriteria);
						$query2 = $this->db->get()->result();
						}
						
				?>
					<?php foreach($query2 as $row2){ ?>
					<?php $total=$total+$row2->bobot*$row1->nilai; ?>

					<?php } ?>

					<?php } ?>
					<td><?php echo  round(($total),2); ?></td>
					<?php
                    	if ($total > 0.42){   ?>
						<td>Layak</td>
						<?php }
                    else { ?>
					<td>Tidak Layak</td>
					<?php } ?>
					<?php $sql = "insert into ranking (id_alternatif,total) values('$row->id_alternatif','$total')";
       				 $query10 = $this->db->query($sql);?>
					<?php } ?>
				</tr>

				<?php } ?>
			</tbody>
		</table>
	</div>
