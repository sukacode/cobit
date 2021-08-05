<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nilai Hasil Index Maturity Level</title>
	<style>
		table, th, td {
  border: 1px solid black;
}
	</style>
</head>
<body>

<center>
<h3>Nilai Hasil Index Maturity Level
</h3>
</center>

</div>
<center>
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
			<td><?php echo $total/$rows ?></td>
		</tr>

	</tbody>
</table>
</center>

<script>
	window.print();
</script>
</body>
</html>
