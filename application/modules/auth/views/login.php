<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Analisa Sistem Menggunakan Cobit 4.1</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="icon" href="<?php echo base_url('favicon.ico') ?>" type="image/ico">

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('aceadmin/assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('aceadmin/assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url('aceadmin/assets/css/fonts.googleapis.com.css') ?>" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url('aceadmin/assets/css/ace.min.css') ?>" />

    <!--[if lte IE 9]>
            <link rel="stylesheet" href="<?php //echo base_url('aceadmin/assets/css/ace-part2.min.css') 
                                            ?>" />
        <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url('aceadmin/assets/css/ace-skins.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('aceadmin/assets/css/ace-rtl.min.css') ?>" />

    <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php //echo base_url('aceadmin/assets/css/ace-ie.min.css') 
                                        ?>" />
        <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
        <script src="<?php //echo base_url('aceadmin/assets/js/html5shiv.min.js') 
                        ?>"></script>
        <script src="<?php //echo base_url('aceadmin/assets/js/respond.min.js') 
                        ?>"></script>
        <![endif]-->
</head>

<body class="login-layout" style="background-color:#000">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">

                            <?php echo $this->session->flashdata('failed'); ?>

                            <h1>

                                <span class="white" id="id-text2">Rendang Mak Yus</span>
                            </h1>
                            <h4 class="blue" id="id-company-text"></h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            LOGIN USER
                                        </h4>

                                        <div class="space-6"></div>

                                        <form action="<?php echo base_url('auth/actLogin') ?>" method="post">
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control" placeholder="Username" name="usernm" required />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control" placeholder="Password" name="password" required />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary" name="submit">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">Login</span>
                                                    </button>

                                                </div>
                                                <div>
                                                    <hr>

                                                    <div class=" text-center">
                                                        <a href=" <?= base_url('auth/registration') ?>" class="small">
                                                            Create an Account!
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix">
                                        <div class=" text-white">

                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url('aceadmin/assets/js/jquery-2.1.4.min.js') ?>"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?php //echo base_url('aceadmin/assets/js/jquery-1.11.3.min.js') 
                ?>"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(aceadmin / assets / js / jquery . mobile . custom . min . js) ?>' >" + "<" + "/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $(document).on('click', '.toolbar a[data-target]', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible'); //hide others
                $(target).addClass('visible'); //show target
            });
        });



        //you don't need this, just used for changing background

        //jQuery(function($) {
        /*   
         $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');
            
            e.preventDefault();
         });
        */
        //$('#btn-login-light').on('click', function(e) {
        /*-- background color --*/
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');

        // e.preventDefault();
        //});
        /*
         $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');
            
            e.preventDefault();
         });
        */
        //});
    </script>
</body>

</html>