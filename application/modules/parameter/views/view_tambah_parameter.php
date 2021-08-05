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
		Input Data Parameter
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<form class="form-horizontal" role="form" method="post" action="create" enctype="multipart/form-data" >
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Kriteria </label>
					<div class="col-sm-9">
						<select class="form-control select2" name="id_kriteria" style="width: 58.5%;" required>
							<?php foreach($rows as $row){ ?>
								<option value='<?php echo $row->id_kriteria; ?>'><?php echo $row->nama_kriteria; ?></option>
							<?php } ?>
            			</select>
					</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Parameter </label>
					<div class="col-sm-9">
						<input type="text" id="form-field-1" class="col-xs-10 col-sm-7" name="parameter_nilai" required />
					</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bobot Parameter </label>
					<div class="col-sm-9">
						<input type="text" id="form-field-1" class="col-xs-10 col-sm-7" name="bobot_parameter" required />
					</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan Parameter </label>
					<div class="col-sm-9">
						<input type="text" id="form-field-1" class="col-xs-10 col-sm-7" name="keterangan" required />
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