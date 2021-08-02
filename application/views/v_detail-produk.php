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
                <div class="col-md-6">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Foto Data Produk</h2>
                        </div>
                        <img src="<?php echo base_url(); ?>foto_produk/<?php echo $foto; ?>" width="100%" class="img-thumbnail" alt="Foto Layanan Barbershop">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Informasi Data Produk</h2>
                        </div>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td width="25%"><b>Nama Produk</b></td>
                                        <td width="2%">:</td>
                                        <td><?php echo ucwords($nama); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><b>Jumlah / Stok Produk</b></td>
                                        <td width="2%">:</td>
                                        <td><?php echo $jumlah; ?> Item</td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><b>Harga Produk</b></td>
                                        <td width="2%">:</td>
                                        <td><?php echo "Rp.".number_format($harga,0,",","."); ?> / Item</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
