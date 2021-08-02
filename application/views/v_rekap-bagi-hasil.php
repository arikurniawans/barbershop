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
										<i class="fas fa-handshake"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Rekapitulasi Pembagian Hasil</h2>
										<p>Hasil rekapitulasi pembagian hasil</p>
									</div>
								</div>
							</div>

                            <div class="pull-right">
								<form class="form-inline" action="<?php echo base_url(); ?>laporan/rekappembagianhasil" method="post">
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
                            <h2>Tabel Data Rekapitulasi Pembagian Hasil</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%" rowspan="2" style="text-align: center; vertical-align: middle;">#</th>
                                        <th rowspan="2" style="vertical-align: middle;">Tanggal Transaksi</th>
                                        <th rowspan="2" style="vertical-align: middle;">Nama Layanan</th>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Tarif Layanan</th>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Jumlah Transaksi</th>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Subtotal Hasil Pendapatan</th>
                                        <th colspan="2" style="text-align: center; vertical-align: middle;">Pembagian Hasil</th>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Subtotal Hasil Pembagian</th>
                                        <!-- <th rowspan="2" style="text-align: center; vertical-align: middle;">Aksi</th> -->
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; vertical-align: middle;">Owner</th>
                                        <th style="text-align: center; vertical-align: middle;">Karyawan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $arrtotal=[]; $arrtotalusaha=[]; $no=1; foreach($layanan as $data){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->tgl_transaksi; ?></td>
                                            <td><?php echo ucwords($data->nama_layanan); ?></td>
                                            <td style="text-align: center;"><?php echo "Rp.".number_format($data->tarif_layanan,0,",","."); ?></td>
                                            <td style="text-align: center;"><?php echo $data->qty; ?> (kali)</td>
                                            <td style="text-align: center;"><?php echo "Rp.".number_format($data->total_transaksi,0,",","."); ?></td>
                                            <td style="text-align: center;"><?php echo $owner_fee; ?>%</td>
                                            <td style="text-align: center;"><?php echo $karyawan_fee; ?>%</td>
                                            <td style="text-align: center;">
                                                <?php if($this->session->userdata('user_status') == 'owner'){
                                                    $hasil = ($data->total_transaksi * $owner_fee)/100;
                                                }else if($this->session->userdata('user_status') == 'karyawan'){
                                                    $hasil = ($data->total_transaksi * $karyawan_fee)/100;
                                                } echo "Rp.".number_format($hasil,0,",","."); array_push($arrtotal, $hasil); array_push($arrtotalusaha, $data->total_transaksi); ?>
                                            </td>
                                            <!-- <td style="text-align: center;">
                                                <a href="<?php echo base_url(); ?>laporan/show/<?php echo $data->id_pl; ?>" class="btn btn-info notika-btn-info btn-sm waves-effect">Detail</a>
                                            </td> -->
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>

                            <br/>
                            <div class="panel panel-default pull-right" style="width: 50%; max-width: 100%; text-align: right;">
                                <div class="panel-heading"><strong><font size="4px">Total Pendapatan Usaha : <?php echo "Rp.".number_format(array_sum($arrtotalusaha),0,",","."); ?></font></strong></div>
                                <div class="panel-heading"><strong><font size="4px">Total Pembagian Hasil Usaha : <?php echo "Rp.".number_format(array_sum($arrtotal),0,",","."); ?></font></strong></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
