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
										<h2>Rekapitulasi Pembayaran Bagi Hasil</h2>
										<p>Rekapitulasi pembayaran bagi hasil ke karyawan</p>
									</div>
								</div>
							</div>

                            <div class="pull-right">
								<form class="form-inline" action="<?php echo base_url(); ?>laporan/rekappembayaranbagihasil" method="post">
                                <select class="selectpicker" data-live-search="true" name="bulan">
                                    <option value="" selected>-Pilih Bulan-</option>
									<?php $bulan=array("January","February", "March","April","May","June",
                                                        "July","August","September","October","November","December");
                                        $jlh_bln=count($bulan);
                                        for($c=0; $c<$jlh_bln; $c+=1){
                                            echo "<option value='".$bulan[$c]."'>".$bulan[$c]."</option>";
                                        }
                                    ?>
								</select>&nbsp;&nbsp;&nbsp;&nbsp;
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
                            <h2>Tabel Rekapitulasi Transaksi Bulanan</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%" >#</th>
                                        <th>Nama Karyawan</th>
                                        <th>Bulan Transaksi</th>
                                        <th>Jumlah Transaksi</th>
                                        <th>Total Hasil Transaksi</th>
                                        <th>Persentase Pembagian Hasil</th>
                                        <th>Total Pembagian Hasil</th>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($pembayaran as $data){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($data->nama); ?></td>
                                            <td><?php echo ucwords($data->bulan_transaksi); ?></td>
                                            <td><?php echo $data->qty; ?> (kali)</td>
                                            <td><?php echo "Rp.".number_format($data->total_transaksi,0,",","."); ?></td>
                                            <td><?php echo $karyawan_fee; ?>%</td>
                                            <td>
                                                <?php  $hasil = ($data->total_transaksi * $karyawan_fee)/100; 
                                                        echo "Rp.".number_format($hasil,0,",",".");
                                                ?>
                                            </td>
                                            <!-- <td style="text-align: center;">
                                                <a href="<?php echo base_url(); ?>laporan/show/<?php echo $data->id_pl; ?>" class="btn btn-info notika-btn-info btn-sm waves-effect">Detail</a>
                                            </td> -->
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
