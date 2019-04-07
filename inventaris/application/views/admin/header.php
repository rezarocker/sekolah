<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventaris - Admin | <?php  echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
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
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span id="rowNotif"></span></div></a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info text-center" id="notification">
                                        
                                       

                                    </div>

                                    <div class="hd-mg-va">
                                        <a href="<?php echo site_url('admin/request/') ?>">View All</a>
                                    </div>
                                </div>
                            </li>
                          
                           
                        </ul>
                    </div>
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
                                <li><a  href="<?php echo site_url('admin'); ?>">Dashboard</a>
                                </li>
                                <li><a href="<?php echo site_url('admin/pegawai'); ?>">Pegawai</a>
                                </li>
                                <li><a  href="<?php echo site_url('admin/barang'); ?>">Barang</a>
                                </li>
                                <li><a  href="<?php echo site_url('admin/peminjaman'); ?>">Peminjaman</a>
                                </li>
                                <li><a  href="<?php echo site_url('admin/pengembalian'); ?>">Pengembalian</a>
                                </li>
                                <li><a  href="<?php echo site_url('admin/laporan'); ?>">Laporan</a>
                                </li><!-- 
                                <li><a  href="<?php echo site_url('admin/setting'); ?>">Setting</a>
                                </li> -->
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
                        <li <?php echo ($title=='Dashboard' ? 'class="active"':''); ?>><a  href="<?php echo site_url('admin'); ?>"><i class="notika-icon notika-house"></i> Dashboard</a>
                        </li>
                        <li <?php echo $title=='Pegawai' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/pegawai'); ?>"><i class="notika-icon notika-support"></i> Pegawai</a>
                        </li>
                        <li <?php echo  $title == 'Barang' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/barang'); ?>"><i class="notika-icon notika-edit"></i> Barang</a>
                        </li>

                        <li <?php echo $title=='Supplier' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/supplier'); ?>"><i class="notika-icon notika-bar-chart"></i> Supplier</a>
                        </li>
                        <li <?php echo $title=='Peminjaman' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/peminjaman'); ?>"><i class="notika-icon notika-bar-chart"></i> Peminjaman</a>
                        </li>
                        <li <?php echo $title=='Pengembalian' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/pengembalian'); ?>"><i class="notika-icon notika-windows"></i> Pengembalian</a>
                        </li>
                        <li <?php echo $title=='Laporan' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/laporan'); ?>"><i class="notika-icon notika-form"></i> Laporan</a>
                        </li>
                        <li <?php echo $title=='Setting' ? 'class="active"':''; ?>><a  href="<?php echo site_url('admin/setting'); ?>"><i class=""></i> Setting</a>
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