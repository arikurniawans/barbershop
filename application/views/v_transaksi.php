<!-- Breadcomb area Start-->
<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="fas fa-cart-arrow-down"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Transaksi / Point Of Sale</h2>
										<p>Data transaksi layanan dan produk barbershop</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->

    <!-- Data Table area Start-->
    <div class="form-example-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Data Transaksi Pelanggan </h2>
                        </div>
                        <i class="far fa-calendar-alt"> </i> Tanggal : <?php echo $tgltransaksi; ?>
                        <div class="pull-right">
                            <i class="fas fa-tags"> </i> No. Transaksi : <?php echo $autonumber; ?>
                        </div>
                        <br/><br/>
                        <div class="bsc-tbl" style="max-height: 350px; overflow-y: scroll;">
                            <table class="table table-sc-ex table-striped table-bordered">
                                <thead>
                                    <tr style="background-color: #00c292;">
                                        <th style="color: white;">Produk</th>
                                        <th style="color: white;">Harga</th>
                                        <th style="color: white;">Jenis</th>
                                        <th style="color: white;">Kuantitas</th>
                                        <th style="color: white;">Subtotal</th>
                                        <th style="color: white;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <tr>
                            			<td colspan="6" align="center"> Belum ada transaksi</td> 
                            		</tr>
                                </tbody>
                            </table>
                        </div><br/>

                        <div class="panel panel-default" id="TotalBiaya">
                            <div class="panel-heading" style="text-align: right;"><b>Total Biaya : Rp.0</b></div>
                        </div>
                        <div class="row" id="tomboltransaksi"></div>
                        <!-- <div class="pull-right" style="margin-top: -15px">
							<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"> Batal</button>
							<button class="btn btn-success" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"> Pembayaran</button>					
						</div> -->

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Daftar Layanan dan Produk Barbershop</h2>
                        </div>
                        
                        <div class="widget-tabs-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Layanan Barbershop</a></li>
                                <li><a data-toggle="tab" href="#menu1">Produk Barbershop</a></li>
                            </ul>
                            <div class="tab-content tab-custom-st">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="tab-ctn">

                                        <div class="form-inline pull-right">
                                            <div class="input-group">
                                                <input type="text" style="width: 38ch;" class="form-control" name="carilayanan" id="carilayanan" autocomplete="off" placeholder="Cari Nama Layanan">		
                                                <div class="input-group-addon">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </div><br/><br/>
                                    
                                        <div class="row mg-files" id="postListLayanan" style="margin-top: 10px; max-height: 500px;overflow-y: scroll;">
                                                    
                                                    <?php if(!empty($layanan)){ foreach($layanan as $datalayanan){ ?>
                                                    <div class=" col-md-4">
                                                    <div class="thumbnail">
                                                        <img src="<?php echo base_url(); ?>foto_layanan/<?php echo $datalayanan->foto_produk_layanan; ?>" alt="Foto Layanan">
                                                        <div class="caption">
                                                            <p><?php if(strlen($datalayanan->nama_produk_layanan) >= 30){ echo substr(ucwords($datalayanan->nama_produk_layanan), 0, 30)."..."; }else{ echo ucwords($datalayanan->nama_produk_layanan); } ?></p>
                                                            <h3><?php echo "Rp.".number_format($datalayanan->harga_item,0,",","."); ?></h3>
                                                            <a id="pilih_item" class="btn btn-xs btn-success"  onclick="pilih(<?php echo $datalayanan->id_produk_layanan; ?>)"><i class="	far fa-hand-point-right"></i> Pilih Layanan</a>
                                                            <!-- <a class="btn btn-xs btn-danger">Stok Habis</a> -->
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                    <?php } }else{ echo "<center>Daftar layanan barbershop tidak ditemukan !</center>"; } ?>
                                                <!-- END PRoduct-->
                                            </div> 
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="tab-ctn">

                                    <div class="form-inline pull-right">
                                            <div class="input-group">
                                                <input type="text" style="width: 38ch;" class="form-control" name="cariproduk" id="cariproduk" autocomplete="off" placeholder="Cari Nama Produk">		
                                                <div class="input-group-addon">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </div><br/><br/>

                                                <div class="row mg-files" id="postListProduk" style="margin-top: 10px; max-height: 500px;overflow-y: scroll;">
                                                
                                                    <?php if(!empty($produk)){ foreach($produk as $data){ ?>
                                                    <div class=" col-md-4">
                                                    <div class="thumbnail">
                                                        <img src="<?php echo base_url(); ?>foto_produk/<?php echo $data->foto_produk_layanan; ?>" alt="Foto Produk">
                                                        <div class="caption">
                                                            <p><?php if(strlen($data->nama_produk_layanan) >= 30){ echo substr(ucwords($data->nama_produk_layanan), 0, 30)."..."; }else{ echo ucwords($data->nama_produk_layanan); } ?></p>
                                                            <h3><?php echo "Rp.".number_format($data->harga_item,0,",","."); ?></h3>

                                                            <?php if($data->jumlah_item <= 10 AND $data->jumlah_item >= 1){ ?>
                                                                <a id="beli_item" class="btn btn-xs btn-success"  onclick="beli(<?php echo $data->id_produk_layanan; ?>)"><i class="fa fa-shopping-cart"></i> Beli Produk</a>
                                                                <br/>
                                                                <span class="badge badge-pill" style="background-color: #d9534f; color: white;">Stok Menipis</span>
                                                            <?php }else if($data->jumlah_item == 0){ ?>
                                                                <span class="badge badge-pill" style="background-color: #d9534f; color: white;">Stok Habis</span>
                                                            <?php }else { ?>
                                                                <a id="beli_item" class="btn btn-xs btn-success"  onclick="beli(<?php echo $data->id_produk_layanan; ?>)"><i class="fa fa-shopping-cart"></i> Beli Produk</a>
                                                            <?php } ?>

                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                    <?php } }else{ echo "<center>Daftar produk barbershop tidak ditemukan !</center>"; } ?>
                                                <!-- END PRoduct-->
                                            </div> 

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-pembayaran" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #5bc0de; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Pembayaran</h4>
                                                </div>
                <form method="post" action="<?php echo base_url(); ?>transaksi/create">
                    <div class="modal-body">
                    <input type="hidden" name="kode" value="<?php echo $autonumber; ?>"/>
                            Apakah anda yakin akan menyelesaikan transaksi pelanggan berikut ?
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Ya, Saya Yakin</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-pembatalan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #d9534f; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Pembatalan Transaksi</h4>
                                                </div>
                <form method="post" action="<?php echo base_url(); ?>transaksi/deleteall">
                    <div class="modal-body">
                    <input type="hidden" name="kode" value="<?php echo $autonumber; ?>"/>
                            Apakah anda yakin akan membatalkan transaksi pelanggan berikut ?
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, Saya Yakin</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

        var keywords = document.getElementById('carilayanan');

        keywords.addEventListener('keyup', function(e){
            var cari = document.getElementById('carilayanan').value;
            $.ajax({
                url: '<?php echo base_url(); ?>transaksi/carilayanan',
                type: 'POST',
                data: {cari: cari},
                //dataType: 'json',
                success: function(response){
                    //console.log(response);
                    $('#postListLayanan').html(response);
                }
            });
        });

        var keyproduk = document.getElementById('cariproduk');

        keyproduk.addEventListener('keyup', function(e){
            var cari = document.getElementById('cariproduk').value;
            $.ajax({
                url: '<?php echo base_url(); ?>transaksi/cariproduk',
                type: 'POST',
                data: {cari: cari},
                //dataType: 'json',
                success: function(response){
                    //console.log(response);
                    $('#postListProduk').html(response);
                }
            });
        });

        function beli(elem)
        {
            $.post('<?php echo base_url(); ?>transaksi/keranjangproduk', 
                    {kode: elem}, function(response){
                    //console.log("Respon produk : "+response);
                    $('#show_data').html(response);
                    if(response != ''){
                        if(response == 'empty'){
                            swal("Gagal","Stok barang habis !","error").then(function() { window.location = '<?php echo base_url(); ?>transaksi'; });
                        }else{
                            $.get('<?php echo base_url(); ?>transaksi/tombolTransaksi', function(response){
                                //console.log(response);
                                $('#tomboltransaksi').html(response);
                            });

                            $.get('<?php echo base_url(); ?>transaksi/showgrandtotal', function(response){
                                //console.log(response);
                                document.getElementById("TotalBiaya").innerHTML = response;
                            });
                        }
                        
                    }
			});

        }

        function pilih(elem)
        {
            $.post('<?php echo base_url(); ?>transaksi/keranjanglayanan', 
                    {kode: elem}, function(response){
                    //console.log("Respon Layanan : "+response);
                    $('#show_data').html(response);
                    if(response != ''){
                        $.get('<?php echo base_url(); ?>transaksi/tombolTransaksi', function(response){
                            //console.log(response);
                            $('#tomboltransaksi').html(response);
			            });

                        $.get('<?php echo base_url(); ?>transaksi/showgrandtotal', function(response){
                        //console.log(response);
                        document.getElementById("TotalBiaya").innerHTML = response;
			            });
                    }
			});

        }

        function hapus(elem)
        {
            let link = document.querySelector('#removecart');
            if (link) {
                let kode = link.getAttribute('kode_trx');
                
                $.post('<?php echo base_url(); ?>transaksi/delete', 
                    {kode: kode, id_pl: elem}, function(response){
                    $('#show_data').html(response);
                    if(response != ''){
                        $.get('<?php echo base_url(); ?>transaksi/tombolTransaksi', function(response){
                            // console.log(response);
                            $('#tomboltransaksi').html(response);
			            });

                        $.get('<?php echo base_url(); ?>transaksi/showgrandtotal', function(response){
                        //console.log(response);
                        document.getElementById("TotalBiaya").innerHTML = response;
			            });
                    }
                    
			    });
                //console.log(kode+" - "+elem);
                

            }
        }

        $(document).ready(function(){
            $.get('<?php echo base_url(); ?>transaksi/showkeranjang', function(response){
                    // console.log(response);
                    $('#show_data').html(response);
			});

            $.get('<?php echo base_url(); ?>transaksi/tombolTransaksi', function(response){
                    // console.log(response);
                    $('#tomboltransaksi').html(response);
			});

            $.get('<?php echo base_url(); ?>transaksi/showgrandtotal', function(response){
                    //console.log(response);
                    document.getElementById("TotalBiaya").innerHTML = response;
			});
        });

</script>

<script type='text/javascript'>
<?php if($this->session->flashdata('message') == 'successfull') { ?>
    swal("Berhasil","Transaksi pembayaran berhasil di selesaikan, silahkan klik OK untuk cetak struk","success").then(function() { window.open('<?php echo base_url(); ?>transaksi/cetakstruk/<?php echo $this->session->flashdata('cetak'); ?>', '_blank'); });
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Gagal","Transaksi pembayaran gagal di selesaikan !","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Transaksi berhasil dibatalkan","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Gagal","Transaksi gagal dibatalkan !","error");
<?php } ?>

</script>