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
		Ubah Data Pengguna
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<?php foreach($dad as $row){ ?>

		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'user/user_list/updateData';?>" enctype="multipart/form-data" >
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

				<div class="col-sm-9">
					<input type="hidden" name="id" value="<?php echo $row->token_user; ?>" >
					<input type="text" id="form-field-1" placeholder="Username pengguna" class="col-xs-10 col-sm-7" name="userNm" value="<?php echo $row->username; ?>" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password Origin </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Password asli pengguna (sebelum di enrkipsi)" class="col-xs-10 col-sm-7" name="pswd" required value="<?php echo $row->pswd_origin; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pengguna </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="Nama lengkap pengguna" class="col-xs-10 col-sm-7" name="nmPengguna" required value="<?php echo $row->nm_user; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> e-Mail Pengguna </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="e-Mail pengguna" class="col-xs-10 col-sm-7" name="emailPengguna" required value="<?php echo $row->email_user; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pengguna </label>
					
				<div class="col-sm-6">	
					<input name="statusPengguna" type="radio" class="ace" value="Admin" <?php echo set_value('Admin', $row->status_user) == 'Admin' ? "checked" : ""; ?> /> 
					<span class="lbl"> Administrator </span>

					<input name="statusPengguna" type="radio" class="ace" value="User" <?php echo set_value('User', $row->status_user) == 'User' ? "checked" : ""; ?> />
					<span class="lbl"> User </span>
				</div>
			</div> 
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto Pengguna </label>

				<div class="col-sm-9">
					<?php if($row->foto_user != ''){ ?>
						<!-- file img_user awal dibuat pada field hidden -->
						<input type="hidden" id="form-field-1" class="col-xs-10 col-sm-7" name="filelama" value="<?php echo $row->foto_user; ?>" />
						<img src="<?=base_url()?>foto_user/<?=$row->foto_user?>" style="width:25%" >
					<?php } else { ?>
						<img src="<?=base_url()?>foto_user/image_not_available.jpg" style="width:25%" >
					<?php } ?>
				</div>
			</div>	
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ubah Foto Pengguna </label>

				<div class="col-sm-5">
					<input type="file" id="id-input-file-1" name="berkas" />
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
