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
		table{
			width: 100%;
		}
		th{
			background: #c2dcf3;
		}
		td{
			height: 20px;
		}
		tr.abu{
			background:#f7f7f7;
		}

	</style>
</head>

<body>
	<p style="margin: 2em;">
		<center><b>
				<div class="judul">CV BUNGA </div>
				<div class="judul">Laporan Jurnal</div>
			</b></center><br />
	</p>
	<p style="margin: 3em auto 3em auto;">
		<center>
			<table>
				<thead>
					<tr>
						<th style="text-align:left">No</th>
						<th>Nama Kayu</th>
						<th>Nilai</th>
            			<th>Keterangan</th>
					</tr>
				</thead>
				<tbody id="dynamic_field">
					<?php
						if (!empty($j_list)){
							$no = 1;
							foreach($j_list as $row){				
						?>
					<tr>
						<td>
							<div class="text-bold">
								Journal Entry #<?php echo $row->no_jurnal; ?> |<?php echo $row->tgl_jurnal; ?>
							</div>
						</td>
						<td></td>
						<td></td>
					</tr>
					<?php $totald=0; $totalk=0; ?>
					<?php
								$this->db->select('*')
								->from('detail_jurnal')
								->join('akun', ' detail_jurnal.kode_akun  =  akun.kode_akun', 'LEFT')
								->where('detail_jurnal.no_jurnal=',$row->no_jurnal);
								$query = $this->db->get()->result();
								?>
					<?php foreach($query as $row2){ ?>
					<tr>
						<td>
							<div class="ml-4">( <?php echo $row2->kode_akun; ?>) -
								<?php echo $row2->nama_akun; ?>
							</div>
						</td>
						<td style="text-align:right">
							<div class="ml-4"><?php echo $row2->debit; ?></div>
						</td>
						<td style="text-align:right">
							<div class="ml-4"><?php echo $row2->kredit; ?></div>
						</td>
					</tr>
					<?php $totald=$totald+$row2->debit; $totalk=$totalk+$row2->kredit; ?>
					<?php } ?>
					<tr>
						<td style="text-align:right;border-top:2px solid black">Total</td>
						<td style="text-align:right;border-top:2px solid black"><?php echo number_format($totald); ?>
						</td>
						<td style="text-align:right;border-top:2px solid black"><?php echo number_format($totalk); ?>
						</td>
					</tr>
					<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</center>
	</p>
</body>

</html>
