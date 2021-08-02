<?php if(!empty($produk)){ foreach($produk as $dataproduk){ ?>
    <div class=" col-md-4">
        <div class="thumbnail">
            <img src="<?php echo base_url(); ?>foto_produk/<?php echo $dataproduk->foto_produk_layanan; ?>" alt="Foto Produk">
        <div class="caption">
            <p><?php if(strlen($dataproduk->nama_produk_layanan) >= 30){ echo substr(ucwords($dataproduk->nama_produk_layanan), 0, 30)."..."; }else{ echo ucwords($dataproduk->nama_produk_layanan); } ?></p>
            <h3><?php echo "Rp.".number_format($dataproduk->harga_item,0,",","."); ?></h3>
            
            <?php if($dataproduk->jumlah_item <= 10 AND $dataproduk->jumlah_item >= 1){ ?>
                <a id="beli_item" class="btn btn-xs btn-success"  onclick="beli(<?php echo $dataproduk->id_produk_layanan; ?>)"><i class="fa fa-shopping-cart"></i> Beli Produk</a>
                <br/>
                <span class="badge badge-pill" style="background-color: #d9534f; color: white;">Stok Menipis</span>
            <?php }else if($dataproduk->jumlah_item == 0){ ?>
                <span class="badge badge-pill" style="background-color: #d9534f; color: white;">Stok Habis</span>
           <?php }else { ?>
                 <a id="beli_item" class="btn btn-xs btn-success"  onclick="beli(<?php echo $dataproduk->id_produk_layanan; ?>)"><i class="fa fa-shopping-cart"></i> Beli Produk</a>
            <?php } ?>

        </div>                                               
        </div>
        </div>
<?php } }else{ echo "<center>Daftar produk barbershop tidak ditemukan !</center>"; } ?>
<!-- END PRoduct-->
