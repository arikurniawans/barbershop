<?php

class ProdukLayanan_model extends CI_Model
{

    // ========================== Data Layanan ==========================
    public function createLayanan($data)
    {
        $sarana = $this->db->insert('produk_layanan',$data);
        return $sarana;
    }

    public function showLayanan()
    {
        $this->db->order_by('id_produk_layanan','DESC');
        $query = $this->db->get_where('produk_layanan', array('jenis' => 'layanan'));        
        return $query;
    }

    public function detailLayanan($id)
    {
        $query = $this->db->get_where('produk_layanan', array('id_produk_layanan' => $id));        
        return $query;
    }

    public function searchLayanan($nama)
    {
        $this->db->select('*');
		$this->db->from('produk_layanan');
		$this->db->where('jenis', 'layanan');
		if($nama != null){
            $this->db->like('nama_produk_layanan',$nama);
        }
        $this->db->order_by('id_produk_layanan','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function editLayanan($id, $data)
    {
        $this->db->where('id_produk_layanan',$id);
        $this->db->update('produk_layanan',$data);
        return true;
    }

    public function deleteLayanan($id)
    {
        $this->db->where('id_produk_layanan',$id);
        $this->db->delete('produk_layanan');
        return true;
    }

    // ================================ Data Produk =================================
    public function createProduk($data)
    {
        $sarana = $this->db->insert('produk_layanan',$data);
        return $sarana;
    }

    public function showProduk()
    {
        $this->db->order_by('id_produk_layanan','DESC');
        $query = $this->db->get_where('produk_layanan', array('jenis' => 'produk'));
        return $query;
    }

    public function detailProduk($id)
    {
        $query = $this->db->get_where('produk_layanan', array('id_produk_layanan' => $id));        
        return $query;
    }

    public function searchProduk($nama)
    {
        $this->db->select('*');
		$this->db->from('produk_layanan');
		$this->db->where('jenis', 'produk');
		if($nama != null){
            $this->db->like('nama_produk_layanan',$nama);
        }
        $this->db->order_by('id_produk_layanan','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function editProduk($id, $data)
    {
        $this->db->where('id_produk_layanan',$id);
        $this->db->update('produk_layanan',$data);
        return true;
    }

    public function deleteProduk($id)
    {
        $this->db->where('id_produk_layanan',$id);
        $this->db->delete('produk_layanan');
        return true;
    }

    public function kurangStok($id, $stok)
    {
        $this->db->query("UPDATE produk_layanan SET jumlah_item=jumlah_item - $stok WHERE id_produk_layanan='$id'");
        return true;
    }

    public function tambahStok($id, $stok)
    {
        $this->db->query("UPDATE produk_layanan SET jumlah_item=jumlah_item + $stok WHERE id_produk_layanan='$id'");
        return true;
    }

}