<?php
 	defined('BASEPATH') OR exit ('No direct script access allowed');

 	if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!-- pesan ketika data berhasil tersimpan -->
<?php echo $this->session->flashdata('success'); ?>

<!-- pesan ketika set rule ditemukan/dijalankan -->
<?php
	if(validation_errors()){
		echo"
			<div class='alert alert-danger'>
    			<button type='button' class='close' data-dismiss='alert'>
        			<i class='ace-icon fa fa-times'></i>
    			</button>";

		echo validation_errors();

		echo "</div>";
	}
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Data Pengguna</h3>

			<a href="<?php echo base_url('kriteria/Kriteria/newData');?>" class="btn" >
				<i class="ace-icon fa fa-pencil align-top bigger-125" ></i>
				Tambah Data
			</a>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				Results for "Latest Registered Data Pengguna"
			</div>

			<!-- div.table-responsive -->
			<!-- div.dataTables_borderWrap -->
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
						if (!empty($p_list)){
							$no = 1;
							foreach($p_list as $row){				
						?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row->nama_kayu; ?></td>
						<td><?php echo $row->total; ?></td>
						<td><?php if ($row->total > 0.42) {
							echo "Layak";
						}else{
						echo "Tidak Layak";
						}?></td>
					</tr>
					<?php } ?>
					<?php } ?>
				</tbody>
				</table>
			</div>
	</div>
</div>