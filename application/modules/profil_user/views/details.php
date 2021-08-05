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
        Profil Pengguna
    </h1>
</div><!-- /.page-header -->

<div class="row">
    
    <div class="col-sm-5">
    
        <!-- PAGE CONTENT BEGINS -->
        
        <form class="form-horizontal" role="form" method="" action="" >
            <table class="table table-striped">
                <tr>
                    <td align="center">
                        <?php if($this->session->userdata('foto_user') != ''){ ?>
                            <img src="<?php echo base_url('foto_user/'.$this->session->userdata('foto_user'));?>" style="width:50%" >
                        <?php } else { ?>
                            <img src="<?php echo base_url('foto_user/image_not_available.jpg');?>" style="width:50%" >
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </form>
        

    <!-- PAGE CONTENT ENDS -->
    
    </div><!-- /.col -->

    <div class="col-sm-7">
        <!-- PAGE CONTENT BEGINS -->

        <form class="form-horizontal" role="form" method="" action="" >
            <table class="table table-striped">
                <tr>
                    <td>Username</td>
                    <td><?php echo ucfirst($this->session->userdata('username')); ?></td>
                </tr>

                <tr>
                    <td>Nama Pengguna</td>
                    <td><?php echo ucwords($this->session->userdata('nm_user')); ?></td>
                </tr>

                <tr>
                    <td>e-Mail Pengguna</td>
                    <td><?php echo $this->session->userdata('email_user'); ?></td>
                </tr>

                <tr>
                    <td>Status Pengguna</td>
                    <td><?php echo $this->session->userdata('status_user'); ?></td>
                </tr>
            </table>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn" type="reset" name="btnReset" onclick="self.history.back();">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Back
                    </button>
                </div>
            </div>
        </form>

    <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

</html>
