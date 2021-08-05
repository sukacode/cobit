<?php
  defined('BASEPATH') OR exit ('No direct script access allowed');

  if($this->session->userdata('is_logged_in') != true){
    redirect(base_url('auth'));
  }
  
 
  
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<style>
		p {
			width: 100%;
			text-align: justify;
		}

		.judul {
			font-size: x-large;
		}

		.sub_judul {
			font-size: large;
		}

		.kecil {
			font-size: small;
		}

		table, td, th {
  border: 1px solid black;
 
}

table {
  width: 100%;
  border-collapse: collapse;
  
}

		th {
			height: 50px;
		}

		td {
			height: 30px;
		}

		tr.abu {
			background: #f7f7f7;
		}

	</style>
</head>

<body>
	<p style="margin: 2em;">
		<center><b>
				<div class="judul">SMA NEGERI 1 BASO </div>
				<div class="judul">Laporan Data Gedung</div>
			</b></center><br />
	</p>
	<p style="margin: 5em auto 5em auto;">
		<center>
			<table>
				<thead>
					<tr>
						<th style="text-align:left">No</th>
						<th>Nama Gedung</th>
					</tr>
				</thead>
				<tbody id="dynamic_field">
					<?php
						if (!empty($d_list)){
							$no = 1;
							foreach($d_list as $row){				
						?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row->nama_gedung; ?></td>
					</tr>
					<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</center>
	</p>
</body>

</html>
