<!-- Mobile Menu start -->
<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <?php if($this->session->userdata('user_status') == 'owner'){ ?>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Dashboard</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#"> Manajemen Data</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>layanan">Layanan Barbershop</a></li>
                                        <li><a href="<?php echo base_url(); ?>produk">Produk Barbershop</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Transaksi Barbershop</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>transaksi">Layanan & Penjualan Produk</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Laporan</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>laporan/rekaplayanan">Rekap Transaksi Layanan Barbershop</a></li>
                                        <li><a href="<?php echo base_url(); ?>laporan/rekapproduk">Rekap Transaksi Produk Barbershop</a></li>
                                        <!-- <li><a href="bar-charts.html">Laba Rugi</a></li> -->
                                        <li><a href="<?php echo base_url(); ?>laporan/rekappembagianhasil">Rekap Pembagian Hasil</a></li>
                                        <li><a href="<?php echo base_url(); ?>laporan/rekappembayaranbagihasil">Rekap Pembayaran Bagi Hasil</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Pengaturan</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>karyawan">Data Karyawan</a></li>
                                        <li><a href="<?php echo base_url(); ?>pembagianhasil">Pembagian Hasil</a></li>
                                    </ul>
                                </li>
                                <?php }else if($this->session->userdata('user_status') == 'karyawan'){ ?>
                                    <li><a data-toggle="collapse" data-target="#democrou" href="#">Transaksi Barbershop</a>
                                        <ul id="democrou" class="collapse dropdown-header-top">
                                            <li><a href="<?php echo base_url(); ?>transaksi">Layanan & Penjualan Produk</a></li>
                                        </ul>
                                    </li>

                                    <li><a data-toggle="collapse" data-target="#demolibra" href="#">Laporan</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>laporan/rekappembagianhasil">Rekap Pembagian Hasil</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
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
                <?php if($this->session->userdata('user_status') == 'owner'){ ?>
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Dashboard</a>
                        </li>
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-form"></i> Manajemen Data</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-app"></i> Transaksi</a>
                        </li>
                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Laporan</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tables"><i class="fa fa-gear"></i> Pengaturan</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>layanan">Layanan Barbershop</a></li>
                                <li><a href="<?php echo base_url(); ?>produk">Produk Barbershop</a></li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>transaksi">Layanan & Penjualan Produk</a></li>
                            </ul>
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>laporan/rekaplayanan">Rekap Transaksi Layanan Barbershop</a></li>
                                <li><a href="<?php echo base_url(); ?>laporan/rekapproduk">Rekap Transaksi Produk Barbershop</a></li>
                                <!-- <li><a href="bar-charts.html">Laba Rugi</a></li> -->
                                <li><a href="<?php echo base_url(); ?>laporan/rekappembagianhasil">Rekap Pembagian Hasil</a></li>
                                <li><a href="<?php echo base_url(); ?>laporan/rekappembayaranbagihasil">Rekap Pembayaran Bagi Hasil</a></li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>karyawan">Data Karyawan</a></li>
                                <li><a href="<?php echo base_url(); ?>pembagianhasil">Pembagian Hasil</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php }else if($this->session->userdata('user_status') == 'karyawan'){ ?>
                        <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                            <li class="active"><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-app"></i> Transaksi</a>
                            </li>
                            <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Laporan</a>
                            </li>
                        </ul>
                        <div class="tab-content custom-menu-content">
                        <div id="Interface" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>transaksi">Layanan & Penjualan Produk</a></li>
                            </ul>
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo base_url(); ?>laporan/rekappembagianhasil">Rekap Pembagian Hasil</a></li>
                            </ul>
                        </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->