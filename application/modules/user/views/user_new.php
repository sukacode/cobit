<?php
 	defined('BASEPATH') OR exit ('No direct script access allowed');

 	if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!DOCTYPE html>
<html lang="en">

<!-- pesan ketika data berhasil tersimpan -->
<?php echo $this->session->flashdata('success'); ?>

<div class="page-header">
	<h1>
		Input Pengguna Baru
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'user/user_list/actNew';?>" enctype="multipart/form-data" >
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Username pengguna" class="col-xs-10 col-sm-7" name="userNm" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Password pengguna" class="col-xs-10 col-sm-7" name="pswd" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pengguna </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Nama lengkap pengguna" class="col-xs-10 col-sm-7" name="nmPengguna" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> e-Mail Pengguna </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="e-Mail pengguna" class="col-xs-10 col-sm-7" name="emailPengguna" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto Pengguna </label>

				<div class="col-sm-5">
					<input type="file" id="id-input-file-1" name="berkas" required />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" name="btnSubmit" >
						<i class="ace-icon fa fa-check bigger-110"></i>
						Save
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset" name="btnReset" onclick="self.history.back();">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Cancel
					</button>
				</div>
			</div>
		</form>

	<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

</html>
