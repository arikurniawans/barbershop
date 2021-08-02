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
										<i class="fas fa-hand-holding-usd"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Rekapitulasi Pembagian Hasil</h2>
										<p>Detail hasil rekapitulasi pembagian hasil</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="pull-right">
                                    <a href="<?php echo base_url(); ?>laporan/rekappembagianhasil" class="btn btn-default notika-btn-default waves-effect"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
                            <h2>Foto Data Layanan</h2>
                        </div>
                        <img src="<?php echo base_url(); ?>foto_layanan/<?php echo $foto; ?>" width="100%" class="img-thumbnail" alt="Foto Layanan Barbershop">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Informasi Data Layanan</h2>
                        </div>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td width="25%"><b>Nama Layanan</b></td>
                                        <td width="2%">:</td>
                                        <td><?php echo ucwords($nama); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><b>Deskripsi Layanan</b></td>
                                        <td width="2%">:</td>
                                        <td><?php echo $deskripsi; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><b>Harga Layanan</b></td>
                                        <td width="2%">:</td>
                                        <td><?php echo "Rp.".number_format($harga,0,",","."); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-example-wrap">
                        <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tabel Transaksi Layanan Barbershop</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th>Nama Karyawan</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal / Waktu Transaksi</th>
                                        <th>Jumlah Transaksi</th>
                                        <th>Total Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($transaksi as $data){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($data->nama); ?></td>
                                            <td><?php echo $data->kode_transaksi; ?></td>
                                            <td><?php echo $data->tgl_transaksi; ?></td>
                                            <td><?php echo $data->qty; ?> (kali)</td>
                                            <td><?php echo "Rp.".number_format($data->total_transaksi,0,",","."); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
