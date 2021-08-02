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
										<i class="fas fa-archive"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Data Produk</h2>
										<p>Manajemen Data Produk Barbershop</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="pull-right">
                                    <a href="<?php echo base_url(); ?>produk" class="btn btn-default notika-btn-default waves-effect"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Ubah Data Produk</h2>
                        </div>
                        <form method="post" action="<?php echo base_url(); ?>produk/edit" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Nama Produk</label>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required autocomplete="off" placeholder="Ketikan nama layanan">
                        </div>

                        <div class="form-group">
                            <label for="email">Jumlah / Stok Produk</label>
                            <input type="number" class="form-control" name="jumlah" value="<?php echo $jumlah; ?>" required autocomplete="off" placeholder="Ketikan jumlah / stok produk">
                        </div>

                        <div class="form-group">
                            <label for="email">Harga Produk</label>
                            <input type="text" class="form-control" name="harga" id="rupiah" value="<?php echo "Rp.".number_format($harga,0,",","."); ?>" required autocomplete="off" placeholder="Ketikan harga layanan">
                        </div>

                        <div class="form-group">
                            <label for="email">Foto Produk</label>
                            <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg, image/jpg" autocomplete="off">
                        </div>
                        <div class="form-example-int mg-t-15">
                            <button type="submit" class="btn btn-success notika-btn-success waves-effect">Simpan Perubahan Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
