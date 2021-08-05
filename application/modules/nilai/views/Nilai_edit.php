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
		Edit Data Alternatif
	</h1>
</div><!-- /.page-header -->

<<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'alternatif/Data_alternatif/actNew';?>" enctype="multipart/form-data" >			<div class="form-group">
			<?php foreach($dad1 as $row){ ?>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo $row->nama_subkriteria; ?> </label>
					<div class="col-sm-9">
					<input type="hidden" name="id_penilaian" value="<?php echo $row->id_penilaian; ?>" >
						<select class="form-control select2" name="id_alternatif" style="width: 58.5%;" required>
							<?php foreach($dad as $row){ ?>
								<option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
							<?php } ?>
            			</select>
					</div>
					<?php } ?>
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
