<?php

class Transaksi_model extends CI_Model
{

    public function createKeranjang($data)
    {
        $keranjang = $this->db->insert('cart_transaksi',$data);
        return $keranjang;
    }

    public function createTransaksi($data)
    {
        $transaksi = $this->db->insert('transaksi',$data);
        return $transaksi;
    }

    public function showKeranjang($kode)
    {
        $this->db->select('produk_layanan.id_produk_layanan, 
                        produk_layanan.nama_produk_layanan,
                        produk_layanan.harga_item, produk_layanan.jenis,
                        cart_transaksi.id_cart, cart_transaksi.kode_transaksi,
                        SUM(cart_transaksi.jumbel) AS kuantitas, SUM(cart_transaksi.sub_total) AS subtotal');
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan','produk_layanan.id_produk_layanan = cart_transaksi.id_pl');
        $this->db->where('cart_transaksi.kode_transaksi', $kode);
        $this->db->group_by('id_pl');
        $this->db->order_by('id_cart', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showTotal($kode)
    {
        $this->db->select('kode_transaksi, SUM(cart_transaksi.sub_total) AS total');
        $this->db->from('cart_transaksi');
        $this->db->where('kode_transaksi', $kode);
        $query = $this->db->get();
        return $query;
    }

    public function showRekapLayanan($tgl1, $tgl2)
    {
        $this->db->select("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') AS tgl_transaksi, 
                        produk_layanan.nama_produk_layanan AS nama_layanan, 
                        produk_layanan.harga_item AS tarif_layanan, SUM(cart_transaksi.jumbel) AS qty, 
                        SUM(cart_transaksi.sub_total) AS total_transaksi");
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan','produk_layanan.id_produk_layanan = cart_transaksi.id_pl');
        $this->db->join('transaksi','transaksi.kode_transaksi = cart_transaksi.kode_transaksi');
        $this->db->where('jenis', 'layanan');
        if($tgl1 != null AND $tgl2 != null){
            $this->db->where("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') >=", $tgl1);
            $this->db->where("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') <=", $tgl2);
        }
        $this->db->group_by('id_pl');
        $this->db->group_by("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d')");
        $this->db->order_by('id_cart', 'DESC');
        $query = $this->db->get();
        return $query;
        
    }

    public function showRekapProduk($tgl1, $tgl2)
    {
        $this->db->select("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') AS tgl_transaksi, 
                        produk_layanan.nama_produk_layanan AS nama_produk, 
                        produk_layanan.harga_item AS tarif_produk, SUM(cart_transaksi.jumbel) AS qty, 
                        SUM(cart_transaksi.sub_total) AS total_transaksi");
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan','produk_layanan.id_produk_layanan = cart_transaksi.id_pl');
        $this->db->join('transaksi','transaksi.kode_transaksi = cart_transaksi.kode_transaksi');
        $this->db->where('jenis', 'produk');
        if($tgl1 != null AND $tgl2 != null){
            $this->db->where("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') >=", $tgl1);
            $this->db->where("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') <=", $tgl2);
        }
        $this->db->group_by('id_pl');
        $this->db->group_by("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d')");
        $this->db->order_by('id_cart', 'DESC');
        $query = $this->db->get();
        return $query;
        
    }

    public function showRekapPembagian($tgl1, $tgl2)
    {
        $this->db->select("id_pl, DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') AS tgl_transaksi, 
                        produk_layanan.nama_produk_layanan AS nama_layanan, 
                        produk_layanan.harga_item AS tarif_layanan, SUM(cart_transaksi.jumbel) AS qty, 
                        SUM(cart_transaksi.sub_total) AS total_transaksi");
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan','produk_layanan.id_produk_layanan = cart_transaksi.id_pl');
        $this->db->join('transaksi','transaksi.kode_transaksi = cart_transaksi.kode_transaksi');
        $this->db->join('users','users.id_user = transaksi.id_user');
        $this->db->where('jenis', 'layanan');
        if($this->session->userdata('user_status') == 'karyawan'){
            $this->db->where('users.id_user', $this->session->userdata('id'));
        }
        if($tgl1 != null AND $tgl2 != null){
            $this->db->where("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') >=", $tgl1);
            $this->db->where("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d') <=", $tgl2);
        }
        $this->db->group_by('id_pl');
        $this->db->group_by("DATE_FORMAT(transaksi.created_at, '%Y-%m-%d')");
        $this->db->order_by('id_cart', 'DESC');
        $query = $this->db->get();
        return $query;
        
    }

    public function detailTransaksi($id)
    {
        $this->db->select('users.nama, transaksi.kode_transaksi , transaksi.created_at AS tgl_transaksi, 
                            produk_layanan.nama_produk_layanan AS nama_layanan, 
                            produk_layanan.harga_item AS tarif_layanan, SUM(cart_transaksi.jumbel) AS qty, 
                            SUM(cart_transaksi.sub_total) AS total_transaksi');
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan', 'produk_layanan.id_produk_layanan=cart_transaksi.id_pl');
        $this->db->join('transaksi', 'transaksi.kode_transaksi=cart_transaksi.kode_transaksi');
        $this->db->join('users', 'users.id_user=transaksi.id_user');
        $this->db->where('produk_layanan.jenis', 'layanan');
        $this->db->where('id_pl', $id);
        $this->db->group_by("transaksi.kode_transaksi");
        $this->db->order_by('id_cart', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function grafikTransaksi()
    {
        $this->db->select("DATE_FORMAT(transaksi.created_at, '%M') AS bulan_transaksi, 
                        SUM(cart_transaksi.jumbel) AS qty");
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan', 'produk_layanan.id_produk_layanan=cart_transaksi.id_pl');
        $this->db->join('transaksi', 'transaksi.kode_transaksi=cart_transaksi.kode_transaksi');
        $this->db->group_by("DATE_FORMAT(transaksi.created_at, '%m')");
        $this->db->order_by('id_cart', 'ASC');
        $this->db->order_by('transaksi.created_at', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function itemTerlaris()
    {
        $this->db->select("produk_layanan.nama_produk_layanan AS nama_produk , 
                        SUM(cart_transaksi.jumbel) AS qty");
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan', 'produk_layanan.id_produk_layanan=cart_transaksi.id_pl');
        $this->db->join('transaksi', 'transaksi.kode_transaksi=cart_transaksi.kode_transaksi');
        $this->db->where('produk_layanan.jenis', 'produk');
        $this->db->group_by("id_pl");
        $this->db->order_by('qty', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query;
    }

    public function itemTerpopuler()
    {
        $this->db->select("produk_layanan.nama_produk_layanan AS nama_layanan , 
                        SUM(cart_transaksi.jumbel) AS qty");
        $this->db->from('cart_transaksi');
        $this->db->join('produk_layanan', 'produk_layanan.id_produk_layanan=cart_transaksi.id_pl');
        $this->db->join('transaksi', 'transaksi.kode_transaksi=cart_transaksi.kode_transaksi');
        $this->db->where('produk_layanan.jenis', 'layanan');
        $this->db->group_by("id_pl");
        $this->db->order_by('qty', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query;
    }

    public function rekapPembayaranHasil($bulan)
    {
        $this->db->select("users.id_user,users.nama, DATE_FORMAT(transaksi.created_at, '%M') AS bulan_transaksi,
                        SUM(cart_transaksi.jumbel) AS qty,SUM(transaksi.total) AS total_transaksi");
        $this->db->from('transaksi');
        $this->db->join('users','users.id_user=transaksi.id_user');
        $this->db->join('cart_transaksi','cart_transaksi.kode_transaksi=transaksi.kode_transaksi');
        $this->db->join('produk_layanan','produk_layanan.id_produk_layanan=cart_transaksi.id_pl');
        $this->db->where_not_in('user_status','owner');
        $this->db->where('jenis','layanan');
        if($bulan != null){
            $this->db->where("DATE_FORMAT(transaksi.created_at,'%M')", $bulan);
        }
        $this->db->group_by('transaksi.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function deleteKeranjang($id, $kode)
    {
        $this->db->where('kode_transaksi', $kode);
        $this->db->where('id_pl', $id);
        $this->db->delete('cart_transaksi');
        return true;
    }

    public function deleteAllKeranjang($kode)
    {
        $this->db->where('kode_transaksi', $kode);
        $this->db->delete('cart_transaksi');
        return true;
    }

    public function detailKeranjang($kode, $idpl)
    {
        $this->db->select('SUM(jumbel) AS qty');
        $this->db->from('cart_transaksi');
        $this->db->where('kode_transaksi', $kode);
        $this->db->where('id_pl', $idpl);
        $query = $this->db->get();
        return $query;
    }

    public function buat_kode(){

        $this->db->select('RIGHT(transaksi.id_transaksi, 4) as kode', FALSE);
        $this->db->order_by('id_transaksi','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('transaksi');    
        if($query->num_rows() <> 0){       
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        // $kodejadi = "TRX".rand($kodemax, 500).$kodemax;
        $kodejadi = "TRX".$kodemax;
        return $kodejadi;  
  }

}