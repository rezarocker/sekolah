<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventaris - Peminjam | <?php  echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- dialog CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/dialog/dialog.css">

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/normalize.css">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/wave/waves.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/responsive.css">
    <!-- bootstrap select CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/bootstrap-select/bootstrap-select.css">
    <!-- modernizr JS

		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/vendor/modernizr-2.8.3.min.js"></script>
     <!-- Daterange picker
        ============================================ -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('assets/dashboard/');?>css/daterangepicker.css" />

    <!-- jquery
        ============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/vendor/jquery-1.12.4.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
      <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                </li>
                                <li><a  href="<?php echo site_url('peminjam/peminjaman'); ?>">Peminjaman</a>
                                </li>
                                <li><a  href="<?php echo site_url('auth/keluar'); ?>">Logout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        
                        <li <?php echo $title=='Peminjaman' ? 'class="active"':''; ?>><a  href="<?php echo site_url('peminjam/peminjaman'); ?>"><i class="notika-icon notika-bar-chart"></i> Peminjaman</a>
                        </li>
                        <li <?php echo $title=='Setting' ? 'class="active"':''; ?>><a  href="<?php echo site_url('peminjam/setting'); ?>"><i class=""></i> Setting</a>
                        </li>

                        <li><a  href="<?php echo site_url('auth/keluar'); ?>"> Logout</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->