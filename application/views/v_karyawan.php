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
										<i class="fa fa-users"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Data Karyawan</h2>
										<p>Pengaturan Data Karyawan Barbershop</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button class="btn btn-success notika-btn-success waves-effect" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Tambah Data</button>
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
                            <h2>Tabel Data Karyawan</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th>Username</th>
                                        <th width="25%" style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($karyawan as $data){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo ucwords($data->nama); ?></td>
                                        <td><?php if($data->jenkel == "L"){ echo "Laki-laki"; }else if($data->jenkel == "P"){ echo "Perempuan"; } ?></td>
                                        <td><?php echo $data->alamat; ?></td>
                                        <td><?php echo $data->no_telpon; ?></td>
                                        <td><?php echo $data->username; ?></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-warning notika-btn-warning btn-xs waves-effect" data-toggle="modal" data-target="#resetpengguna<?php echo $data->id_user; ?>" data-backdrop="static" data-keyboard="false">Reset Password</button>
                                            <button class="btn btn-info notika-btn-info btn-xs waves-effect" data-toggle="modal" data-target="#editpengguna<?php echo $data->id_user; ?>" data-backdrop="static" data-keyboard="false">Ubah</button>
                                            <button class="btn btn-danger notika-btn-danger btn-xs waves-effect" data-toggle="modal" data-target="#hapuspengguna<?php echo $data->id_user; ?>" data-backdrop="static" data-keyboard="false">Hapus</button>
                                        </td>
                                    </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editpengguna<?php echo $data->id_user; ?>" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #00c292; color: white;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Ubah Data</h4>
                                                </div>
                                                <form method="post" action="<?php echo base_url(); ?>karyawan/edit">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Nama Karyawan</label>
                                                                <input type="hidden" name="id" value="<?php echo $data->id_user; ?>"/>
                                                                <input type="text" class="form-control" name="nama" required autocomplete="off" value="<?php echo $data->nama; ?>" placeholder="Ketikan nama karyawan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Jenis Kelamin</label>
                                                                <select class="form-control" name="jenkel" required>
                                                                    <option value="<?php echo $data->jenkel; ?>" selected><?php echo $data->jenkel; ?></option>
                                                                    <option value="L">Laki-laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Alamat Rumah</label>
                                                                <textarea class="form-control" name="alamat" required autocomplete="off"><?php echo $data->alamat; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">No. Telepon</label>
                                                                <input type="text" class="form-control" name="telp" required autocomplete="off" value="<?php echo $data->no_telpon; ?>" placeholder="Ketikan no. telepon">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Username</label>
                                                                <input type="text" class="form-control" name="username" required autocomplete="off" value="<?php echo $data->username; ?>" placeholder="Ketikan username">
                                                            </div>
                                                            <font size="2" color="red">(Password default otomatis di generate oleh aplikasi yaitu : 12345678)</font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan Data</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="resetpengguna<?php echo $data->id_user; ?>" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #FF9800; color: white;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Reset Password</h4>
                                                </div>
                                                <form method="post" action="<?php echo base_url(); ?>karyawan/reset">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $data->id_user; ?>"/>
                                                    Apakah anda yakin akan melakukan reset password pada pengguna berikut ?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning">Lanjutkan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapuspengguna<?php echo $data->id_user; ?>" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #F44336; color: white;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Hapus Data</h4>
                                                </div>
                                                <form method="post" action="<?php echo base_url(); ?>karyawan/delete">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $data->id_user; ?>"/>
                                                    Apakah anda yakin akan menghapus data berikut ?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Hapus Data</button>
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

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #00c292; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <form method="post" action="<?php echo base_url(); ?>karyawan/create">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" required autocomplete="off" placeholder="Ketikan nama karyawan">
                    </div>
                    <div class="form-group">
                        <label for="email">Jenis Kelamin</label>
                        <select class="form-control" name="jenkel" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Rumah</label>
                        <textarea class="form-control" name="alamat" required autocomplete="off"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">No. Telepon</label>
                        <input type="text" class="form-control" name="telp" required autocomplete="off" placeholder="Ketikan no. telepon">
                    </div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" name="username" required autocomplete="off" placeholder="Ketikan username">
                    </div>
                    <font size="2" color="red">(Password default otomatis di generate oleh aplikasi yaitu : 12345678)</font>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<script type='text/javascript'>
<?php if($this->session->flashdata('message') == 'successfull') { ?>
    swal("Berhasil","Data pengguna berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data pengguna gagal ditambahkan","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Data pengguna berhasil diubah","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Berhasil","Data pengguna gagal diubah","error");
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
    swal("Berhasil","Data pengguna berhasil dihapus","success");
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
    swal("Berhasil","Data pengguna gagal dihapus","error");
<?php } ?>

<?php if($this->session->flashdata('message4') == 'successfull') { ?>
    swal("Berhasil","Password pengguna berhasil di reset","success");
<?php }else if($this->session->flashdata('message4') == 'error') { ?>
    swal("Berhasil","Gagal melakukan reset password !","error");
<?php } ?>
</script>