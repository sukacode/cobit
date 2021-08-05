<?php
 	defined('BASEPATH') OR exit ('No direct script access allowed');

 	if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!-- pesan ketika data berhasil tersimpan -->

<?php echo $this->session->flashdata('success'); ?>


<!-- pesan ketika set rule ditemukan/dijalankan -->


<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Data Parameter</h3>

			<a href="<?php echo base_url('parameter/Data_Parameter/create');?>" class="btn" >
				<i class="ace-icon fa fa-pencil align-top bigger-125" ></i>
				Tambah Data
			</a>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				Results for "Data Parameter"
			</div>

			<!-- div.table-responsive -->
			<!-- div.dataTables_borderWrap -->
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							
							<th>No</th>
							<th>Nama Sub Kriteria</th>
							<th>Kelola</th>
						</tr>
					</thead>

					<tbody>

					<?php
					if (!empty($rows)){
						$no = 1;
						foreach($rows as $row){	
								
					?>

						<tr>
							
							<td><?php echo $no++; ?></td>
							<td><?php echo $row->nama_kriteria; ?></td>
							<td>

							
								<div class="hidden-sm hidden-xs action-buttons">
									<span class="badge badge-warning"><a href="<?php echo base_url('parameter/data_parameter/detail?id_kriteria='.$row->id_kriteria); ?>">Detail</a></span>
									 <span class="badge badge-danger"><a href="<?php echo base_url('parameter/data_parameter/delete?id_kriteria='.$row->id_kriteria); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
								</div>							

								<div class="hidden-md hidden-lg">
									<div class="inline pos-rel">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
													<span class="blue">
														<i class="ace-icon fa fa-search-plus bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>

					<?php } ?>
					<?php } ?>

					</tbody>
				</table>
			</div>
	</div>
</div>