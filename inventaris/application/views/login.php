<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Inventaris</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/responsive.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/wave/waves.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/wave/button.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
             <div class="logo"><img src=""></div>

            <div class="nk-form">
            	<?php echo form_open('auth/masuk'); ?>
                 	<?php echo $this->session->pesan; ?>
            	
                 <div class="form-group ic-cmp-int float-lb floating-lb mg-tb-30">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">

                                        <label class="nk-label">Username</label>
                                        <input type="text" class="form-control" name="username" >
                                    </div>

                </div>
                <div class="form-group ic-cmp-int float-lb floating-lb mg-tb-30">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">

                                        <label class="nk-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>

                </div>

                <div class="fm-checkbox">
                </div>
                <div class="form-group text-right">
                <button class="btn btn-success notika-btn-success waves-effect">Masuk</button>
                </div>
                <?php echo form_close(); ?>
            </div>

           
        </div>

       

        <!-- Forgot Password -->
     
    </div>
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/knob/jquery.knob.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/knob/jquery.appear.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/wave/waves.min.js"></script>
    <!-- <script src="<?php echo base_url('assets/dashboard/');?>js/wave/wave-active.js"></script> -->
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/main.js"></script>
</body>

</html>