<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Hasil Perbandingan GAP Maturity Level</title>
	<style>
		table, th, td {
  border: 1px solid black;
}
	</style>
</head>
<body>

<center>
<h3>Data Hasil Perbandingan GAP Maturity Level
</h3>
</center>

</div>
<center>
<table class="table table-bordered table-responsive">
		<thead>

		<tr>
			<td colspan="2" rowspan="2" style="width:30%">Proses</td>
			<td rowspan="2">Level</td>
			<td colspan="4">Maturi Level</td>
		</tr>
		<tr>
			<td>As is</td>
			<td>Skala</td>
			<td>To be</td>
			<td>GAP</td>
		</tr>
		</thead>
		<tbody>
			<?php
        $total_as=0;
        $total_skala=0;
        $total_tobe=0;
        $total_gap=0;
        $total=0;
        $rows=0;
        foreach($tbl_nilai as $row){ ?>
			<tr>
				<td><?php echo $row->nama_domain ?></td>
				<td><?php echo "Monitor and Evaluate IT Performance" ?></td>
				<td><?php echo $row->level ?></td>
				<td><?php echo $row->hasil_index; $total_as=$total_as + $row->hasil_index; $rows++; ?></td>
				<td><?php echo "4"; $total_skala=$total_skala + 4; ?></td>
				<td><?php echo "5" ; $total_tobe=$total_tobe + 5; ?></td>
				<td><?php echo 5  -  $row->hasil_index; $total_gap= $total_gap +  (5 - $row->hasil_index); ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="3">TOTAL</td>
				<td><?php echo $total_as ?></td>
				<td><?php echo $total_skala ?></td>
				<td><?php echo $total_tobe ?></td>
				<td><?php echo $total_gap ?></td>
			</tr>
			<tr>
				<td colspan="3">RATA-RATA INDEX</td>
				<td><?php echo round($total_as/$rows,2) ?></td>
				<td><?php echo round($total_skala/$rows,) ?></td>
				<td><?php echo round($total_tobe/$rows,2) ?></td>
				<td><?php echo round($total_gap/$rows,2) ?></td>
			</tr>

		</tbody>
	</table>
</center>

<script>
	window.print();
</script>
</body>
</html>

