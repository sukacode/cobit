<div class="box-header margin-5">

	<h3 class="box-title ">Nilai Hasil Index Maturity Level
		<a href="<?php echo base_url('nilai/Data_nilai/cetak_matury') ?>"
			class=" block pull-right btn btn-sm btn-success">Cetak</a>

	</h3>


</div>
<div class="table table-bordered table-responsive">
	<table class="table table-bordered table-responsive">
		<thead>

			<tr>
				<th>Proses</th>
				<th>Level</th>
				<th>Total Pertanyaan</th>
				<th>Jumlah Responden Kusioner</th>
				<th>Total Pertanyaan * Jumah Responden Kuesioner</th>
				<th>Hasil Skor</th>
				<th>Index</th>
			</tr>
		</thead>
		<tbody>
			<?php
        $total=0;
        $rows=0;
        foreach($tbl_nilai as $row){ ?>
			<tr>
				<td><?php echo $row->id_domain ?></td>
				<td><?php echo $row->level ?></td>
				<td><?php echo $row->total_pertanyaan ?></td>
				<td><?php echo $row->jumlah_responden ?></td>
				<td><?php echo $row->total_pertanyaan * $row->jumlah_responden ?></td>
				<td><?php echo $row->hasil_skor ?></td>
				<td><?php echo $row->hasil_index; $total=$total + $row->hasil_index; $rows++ ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="6">TOTAL</td>
				<td><?php echo $total ?></td>
			</tr>
			<tr>
				<td colspan="6">RATA-RATA INDEX</td>
				<td><?php echo round($total/$rows,2) ?></td>
			</tr>

		</tbody>
	</table>
</div>
