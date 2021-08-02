<?php if(!empty($keranjang)) { foreach($keranjang as $data){ ?>
    <tr>
        <td><?php echo ucwords($data->nama_produk_layanan); ?></td>
        <td><?php echo "Rp.".number_format($data->harga_item,0,",","."); ?></td>
        <td><?php echo ucwords($data->jenis); ?></td>
        <td><?php echo $data->kuantitas; ?> Item</td>
        <td><?php echo "Rp.".number_format($data->subtotal,0,",","."); ?></td>
        <td><a class="btn btn-danger btn-xs" onclick="hapus(<?php echo $data->id_produk_layanan; ?>)" id="removecart" kode_trx="<?php echo $data->kode_transaksi; ?>" ><i class="fas fa-trash-alt"></i></a></td>
    </tr>
<?php } }else { ?>
    <tr>
        <td colspan="6" align="center"> Belum ada transaksi</td> 
    </tr>
<?php } ?>
