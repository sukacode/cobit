<?php
 	defined('BASEPATH') OR exit ('No direct script access allowed');

 	if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!DOCTYPE html>
<html lang="en">

<div class="page-header">
	<h1>
		Ubah Data Domain
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<?php foreach($dad as $row){ ?>

		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'domain/domain/updateData';?>" enctype="multipart/form-data" >
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Domain </label>

				<div class="col-sm-9">
					<input type="hidden" name="id" value="<?php echo $row->id_domain; ?>" >
					<input type="text" id="form-field-1" placeholder="Nama Domain " class="col-xs-10 col-sm-7" name="nama_domain" value="<?php echo $row->nama_domain; ?>" required />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Level</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Level" class="col-xs-10 col-sm-7" name="level"  value="<?php echo $row->level; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total Pertanyaan </label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Total Pertanyaan" class="col-xs-10 col-sm-7" name="total_pertanyaan" value="<?php echo $row->total_pertanyaan; ?>"  required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumalah Responden </label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Jumalah Responden" class="col-xs-10 col-sm-7" name="jumlah_responden" value="<?php echo $row->jumlah_responden; ?>"  required />
				</div>
			</div>

			

			<div class="space-4"></div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" name="btnSubmit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Save changes
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset" name="btnReset" onclick="self.history.back();">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Cancel
					</button>
				</div>
			</div>
		</form>

		<?php } ?>

	<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

</html>
