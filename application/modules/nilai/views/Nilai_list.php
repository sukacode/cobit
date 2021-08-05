<div class="box-header">
	<h3 class="box-title ">Nilai Hasil Kusioner</h3>
</div>
<div class="table table-bordered table-responsive">
	<table class="table table-bordered table-responsive">
		<thead>
			
			<tr>
			<td rowspan="2">No</td>
				<?php foreach($tbl_nilai as $row){
					echo"<th colspan='{$row->total_pertanyaan}'>Level{$row->level} </th>";
					
				}
				?>
			</tr>
			<tr>
				<!-- <th>No</th> -->
				<?php foreach($tbl_nilai as $row){
					for ($i=1; $i <=$row->total_pertanyaan ; $i++) { 
						echo"<th>{$i} </th>";
					}
					
				}
				?>
			</tr>
		</thead>
		<tbody>
	
			<?php
			
						for($n=1;$n<=10;$n++){		
						?>
			<tr>
				<td><?php echo $n; $total_lain[$n]= 0;?></td>
				<?php $nilai_pertanyaan[$n]=0 ?>
				<?php foreach($tbl_nilai as $row){ ?>
					<?php
						$nilai_pertanyaan[$row->id_domain]=$row->total_pertanyaan*$row->jumlah_responden;
					$id_responden= "N$row->id_domain$n" ;
					
							$this->db->select('*')
							->from('tbl_nilai')
							->where('kode_responden=',$id_responden);
							$query = $this->db->get()->result();
					?>
					

					<!-- <?php print_r($n); ?> -->
					<?php $total[$n][$row->id_domain]=0 ?>
					
					<?php foreach($query as $row1){ ?>
						<td><?php echo $row1->nilai; ?></td>
						<?php $total[$n][$row1->id_domain]=$total[$n][$row1->id_domain] + $row1->nilai;
						
						
						?>
					<?php } ?>
					
					
				
				<?php } ?>

				
			</tr>
			<?php } ?>
			<tr>

			<td>Jumlah</td>
			
			<?php 
			foreach ($tbl_nilai as $row2) {
			
			
			$tot[$row2->id_domain]=0 ;
			?>
			<?php foreach ($total as $key => $value) {
				// 
				
				$tot[$row2->id_domain]= $tot[$row2->id_domain] + $value[$row2->id_domain];
			} ?>
			<td colspan="<?php echo $row2->total_pertanyaan?>"><?php echo $tot[$row2->id_domain];?></td>
			<?php
			$hasil_skor=$tot[$row2->id_domain];
			$hasil_index= $hasil_skor / ($row2->total_pertanyaan * $row2->jumlah_responden);
			$hasil_index= round($hasil_index,2);
			$sql = "insert into tbl_hasil (id_domain,hasil_skor,hasil_index) values('$row2->id_domain','$hasil_skor','$hasil_index')";
			$query = $this->db->query($sql);
		
		
		
		} ?>
			</tr>
		</tbody>
	</table>
</div>
