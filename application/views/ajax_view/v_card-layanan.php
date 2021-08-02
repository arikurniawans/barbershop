<?php if(!empty($layanan)){ foreach($layanan as $datalayanan){ ?>
    <div class=" col-md-4">
        <div class="thumbnail">
            <img src="<?php echo base_url(); ?>foto_layanan/<?php echo $datalayanan->foto_produk_layanan; ?>" alt="Foto Layanan">
        <div class="caption">
            <p><?php if(strlen($datalayanan->nama_produk_layanan) >= 30){ echo substr(ucwords($datalayanan->nama_produk_layanan), 0, 30)."..."; }else{ echo ucwords($datalayanan->nama_produk_layanan); } ?></p>
            <h3><?php echo "Rp.".number_format($datalayanan->harga_item,0,",","."); ?></h3>
            <a id="pilih_item" class="btn btn-xs btn-success"  onclick="pilih(<?php echo $datalayanan->id_produk_layanan; ?>)"><i class="	far fa-hand-point-right"></i> Pilih Layanan</a> 
        </div>                                             
        </div>
    </div>
<?php } }else{ echo "<center>Daftar layanan barbershop tidak ditemukan !</center>"; } ?>
<!-- END PRoduct-->
