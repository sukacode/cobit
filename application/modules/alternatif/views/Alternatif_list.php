<?php
 	defined('BASEPATH') OR exit ('No direct script access allowed');

 	if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!-- pesan ketika data berhasil tersimpan -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');
 ?>">  </div>
<?php echo $this->session->flashdata('success'); ?>


<!-- pesan ketika set rule ditemukan/dijalankan -->


<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Data Alternatif</h3>

		<a href="<?php echo base_url('alternatif/Data_alternatif/newData');?>" class="btn" >
				<i class="ace-icon fa fa-pencil align-top bigger-125" ></i>
				Tambah Data
			</a>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				Results for "Data Alternatif"
			</div>

			<!-- div.table-responsive -->
			<!-- div.dataTables_borderWrap -->
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</th>
							<th>No</th>
							<th>Kode Gedung</th>
							<th>Nama Gedung</th>
							
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>

					<?php
					if (!empty($a_list)){
						$no = 1;
						foreach($a_list as $row){	
								
					?>

						<tr>
							<td class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row->kode_gedung; ?></td>
							<td><?php echo $row->nama_gedung; ?></td>
							<td>
							
								<div class="hidden-sm hidden-xs action-buttons">
								<?php echo anchor('alternatif/Data_alternatif/editData/'.$row->id_alternatif,'<i class="ace-icon fa fa-pencil bigger-130"></i>'); ?>
								
								<?php echo anchor('alternatif/Data_alternatif/deleteData/'.$row->id_alternatif,'<i class="ace-icon fa fa-trash-o bigger-130"></i>'); ?>
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