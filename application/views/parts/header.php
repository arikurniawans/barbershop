<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aplikasi Barbershop</title>
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notification/notification.css">
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet"></link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <!-- Grafik -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.1.2/highcharts.js" integrity="sha512-prZV5wNX5I3fC7LuHbGSVaZdkGSaGozWsk6GjjDqulbi3kcummKxIiR7O5lFh2ec/M0AxlHC8zokmLco+SfD/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<style>
    .thumbnail {
                height: 290px;
                display: inline-block;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                border: 1px solid hsl(0deg 4% 79% / 92%);
    }
    .caption {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
    }
    .caption p {
                font-size: 12px;
                margin: 0px;
    }
    .caption h3 {
                font-size: 16px;
                margin: 2px;
    }                       
    .thumbnail img {
                max-width: 100%;
                max-height: 100%;
                height: 50%;
                display: block;
                margin: 0 auto;
    }
</style>

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
                        <a href="#"><img src="<?php echo base_url(); ?>assets/img/logo/logo_barber.png" style="height: 40px; width: 50%;" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item" style="margin-left: 10px;">
                                <a href="javascript:void(0);" role="button" data-toggle="modal" data-target="#modal-ubahpass" data-backdrop="static" data-keyboard="false" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <font size="3px"><?php echo ucwords($this->session->userdata('nama')); ?></font> <i class="fa fa-user"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>auth/signout" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->


    <!-- Modal -->
  <div class="modal fade" id="modal-ubahpass" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #00c292; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Password</h4>
        </div>
        <form method="post" action="<?php echo base_url(); ?>auth/changepass">
        <div class="modal-body">
            <div class="form-group">
                <label for="email">Password Baru</label>
                <input type="text" class="form-control" name="password" required autocomplete="off" placeholder="Ketikan password baru anda">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan Perubahan Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
        </form>
      </div>
    </div>
  </div>