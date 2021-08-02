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
                            <h2>Tabel Data Produk</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah / Stok Produk</th>
                                        <th>Harga produk</th>
                                        <th width="25%" style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($produk as $data){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo ucwords($data->nama_produk_layanan); ?></td>
                                        <td><?php echo $data->jumlah_item; ?> Item</td>
                                        <td><?php echo "Rp.".number_format($data->harga_item,0,",","."); ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url(); ?>produk/show/<?php echo $data->id_produk_layanan; ?>" class="btn btn-warning notika-btn-warning btn-xs waves-effect">Detail</a>
                                            <a href="<?php echo base_url(); ?>produk/change/<?php echo $data->id_produk_layanan; ?>" class="btn btn-info notika-btn-info btn-xs waves-effect">Ubah</a>
                                            <button class="btn btn-danger notika-btn-danger btn-xs waves-effect" data-toggle="modal" data-target="#hapusproduk<?php echo $data->id_produk_layanan; ?>" data-backdrop="static" data-keyboard="false">Hapus</button>
                                        </td>
                                    </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapusproduk<?php echo $data->id_produk_layanan; ?>" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #F44336; color: white;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Hapus Data</h4>
                                                </div>
                                                <form method="post" action="<?php echo base_url(); ?>produk/delete">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $data->id_produk_layanan; ?>"/>
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
        <form method="post" action="<?php echo base_url(); ?>produk/create" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label for="email">Nama Produk</label>
                <input type="text" class="form-control" name="nama" required autocomplete="off" placeholder="Ketikan nama produk">
            </div>

            <div class="form-group">
                <label for="email">Jumlah / Stok Produk</label>
                <input type="number" class="form-control" name="jumlah" required autocomplete="off" placeholder="Ketikan jumlah / stok produk">
            </div>

            <div class="form-group">
                <label for="email">Harga Produk</label>
                <input type="text" class="form-control" name="harga" id="rupiah" required autocomplete="off" placeholder="Ketikan harga produk">
            </div>

            <div class="form-group">
                <label for="email">Foto Produk</label>
                <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg, image/jpg" required>
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
    swal("Berhasil","Data produk barbershop berhasil ditambahkan","success");
<?php }else if($this->session->flashdata('message') == 'error') { ?>
    swal("Berhasil","Data produk barbershop gagal ditambahkan","error");
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
    swal("Berhasil","Data produk barbershop berhasil diubah","success");
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
    swal("Berhasil","Data produk barbershop gagal diubah","error");
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
    swal("Berhasil","Data produk barbershop berhasil dihapus","success");
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
    swal("Berhasil","Data produk barbershop gagal dihapus","error");
<?php } ?>
</script>