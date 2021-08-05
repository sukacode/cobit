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
		Input Data Penilaian Kusioner Ke <?php echo $total_list ?>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" method="post"
			action="<?php echo base_url().'nilai/Data_nilai/actNew';?>" enctype="multipart/form-data">
			<?php for ($i=1; $i <= $domain_list->total_pertanyaan  ; $i++) { 	?>
				
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><strong>Nilai Pertanyaan <?php echo $i ?></strong>
				</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="1 - 5" class="col-xs-10 col-sm-7" name="nilai[]" 	 required />
				</div>
				
			</div>
			<?php } ?>
			<input type="hidden" name="id_domain" value="<?php echo $domain_list->id_domain; ?>">
			<input type="hidden" name="kode_responden" value="<?php echo $kode; ?>">
			

			<div class="space-4"></div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" name="btnSubmit">
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
