<?php
    defined('BASEPATH') OR exit ('No direct script access allowed');

    if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }

    foreach($dna as $row){
        $id = $row->token_user;
        $usernm = $row->username;
        $pswd = $row->pswd_origin;
        $nama = $row->nm_user;
        $email = $row->email_user;
        $tglPost = $row->crea_dt_user;
        $jamPost = $row->crea_tm_user;
        $tglUpdt = $row->mod_dt_user;
        $jamUpdt = $row->mod_tm_user;
        $foto = $row->foto_user;
        $status = $row->status_user == 'Admin' ? 'Admin' : 'User';
    }
?>

<!DOCTYPE html>
<html lang="en">

<div class="page-header">
    <h1>
        Rincian Data Pengguna
    </h1>
</div><!-- /.page-header -->

<div class="row">
    
    <div class="col-sm-5">
        <!-- PAGE CONTENT BEGINS -->   

        <form class="form-horizontal" role="form" method="" action="" >
            <table class="table table-striped">
                <tr>
                    <td align="center">
                        <?php if($foto != ''){ ?>
                            <img src="<?=base_url()?>foto_user/<?=$foto?>" style="width:50%" >
                        <?php } else { ?>
                            <img src="<?=base_url()?>foto_user/image_not_available.jpg" style="width:50%" >
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
                    <td><?php echo $usernm; ?></td>
                </tr>

                <tr>
                    <td>Password Origin</td>
                    <td><?php echo $pswd; ?></td>
                </tr>

                <tr>
                    <td>Nama Pengguna</td>
                    <td><?php echo $nama; ?></td>
                </tr>

                <tr>
                    <td>e-Mail Pengguna</td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td>Tanggal Rekam</td>
                    <td><?php echo $tglPost; ?></td>
                </tr>

                <tr>
                    <td>Jam Rekam</td>
                    <td><?php echo $jamPost; ?></td>
                </tr>

                <tr>
                    <td>Tanggal Ubah</td>
                    <td><?php echo $tglUpdt; ?></td>
                </tr>

                <tr>
                    <td>Jam Ubah</td>
                    <td><?php echo $jamUpdt; ?></td>
                </tr>

                <tr>
                    <td>Status Pengguna</td>
                    <td><?php echo $status; ?></td>
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
