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
										<i class="fa fa-dollar"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Data Pembagian Hasil</h2>
										<p>Pengaturan Persentase Pembagian Hasil Karyawan Barbershop</p>
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
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tabel Persentase Pembagian Hasil</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nilai Persentase Pihak 1 (Owner)</th>
                                        <th>Nilai Persentase Pihak 2 (Karyawan)</th>
                                        <th width="12%" style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bagi as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->pihak_1; ?> (%)</td>
                                        <td><?php echo $data->pihak_2; ?> (%)</td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-info notika-btn-success waves-effect" data-toggle="modal" data-target="#editpembagian<?php echo $data->id_bagi; ?>" data-backdrop="static" data-keyboard="false"><i class="fa fa-gear"></i> Setting</button>
                                        </td>
                                    </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editpembagian<?php echo $data->id_bagi; ?>" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #00c292; color: white;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Nilai Persentase Pembagian Hasil</h4>
                                                </div>
                                                <form method="post" action="<?php echo base_url(); ?>pembagianhasil/setting">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="email">Nilai Persentase Pihak 1 / Owner (dalam %)</label>
                                                        <input type="hidden" name="id" value="<?php echo $data->id_bagi; ?>"/>
                                                        <input type="text" class="form-control" name="nilai1" required autocomplete="off" value="<?php echo $data->pihak_1; ?>" placeholder="Ketikan nilai persentase pertama cth. 50">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Nilai Persentase Pihak 2 / Karyawan (dalam %)</label>
                                                        <input type="text" class="form-control" name="nilai2" required autocomplete="off" value="<?php echo $data->pihak_2; ?>" placeholder="Ketikan nilai persentase kedua cth. 50">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan Pengaturan Data</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

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

<script type='text/javascript'>
<?php if($this->session->flashdata('message') == 'successfull') { ?>
    swal("Berhasil","Data pembagian hasil berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data pembagian hasil gagal ditambahkan","error");
<?php } ?>

</script>