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
										<i class="fas fa-file-invoice-dollar"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Rekapitulasi Transaksi Layanan Barbershop</h2>
										<p>Hasil rekapitulasi transaksi layanan barbershop</p>
									</div>
								</div>
							</div>

                            <div class="pull-right">
								<form class="form-inline" action="<?php echo base_url(); ?>laporan/rekaplayanan" method="post">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                                        <input type="text" style="width: 20ch;" class="form-control" autocomplete="off" name="tgl1" placeholder="Periode 1">
                                </div>
                                        s/d
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                                    <input type="text" style="width: 20ch;" class="form-control" name="tgl2" autocomplete="off" placeholder="Periode 2">
                                </div>
                                    <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-filter"></i> Filter Data</button>
                                </form>
							</div> 

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">

                            <div class="pull-right">
								<form class="form-inline" action="<?php echo base_url(); ?>laporan/cetaklayanan" method="post" target="_blank">
                                <input type="hidden" style="width: 20ch;" class="form-control" name="tgl1" autocomplete="off" value="<?php echo $cal1; ?>" placeholder="Periode 1">
                                   
                                    <input type="hidden" style="width: 20ch;" class="form-control" name="tgl2" value="<?php echo $cal2; ?>" autocomplete="off" placeholder="Periode 2">
                                    <button type="submit" class="btn btn-flat btn-info"><i class="fa fa-print"></i> Cetak Data</button>
                                </form>
							</div>

                            <h2>Tabel Data Rekapitulasi Transaksi Layanan</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama Layanan</th>
                                        <th>Tarif Layanan</th>
                                        <th>Jumlah Transaksi</th>
                                        <th>Total Hasil Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($layanan as $data){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data->tgl_transaksi; ?></td>
                                        <td><?php echo ucwords($data->nama_layanan); ?></td>
                                        <td><?php echo "Rp.".number_format($data->tarif_layanan,0,",","."); ?></td>
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
    <!-- Data Table area End-->
