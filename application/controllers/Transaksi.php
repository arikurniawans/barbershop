<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('ProdukLayanan_model');
        $this->load->model('Transaksi_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['produk'] = $this->ProdukLayanan_model->showProduk()->result();
        $data['layanan'] = $this->ProdukLayanan_model->showLayanan()->result();
        $data['autonumber'] = $this->Transaksi_model->buat_kode(); 
        $data['tgltransaksi'] = $this->Calendar_model->indodate2(); 

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_transaksi', $data);
		$this->load->view('parts/footer');
	}

    public function carilayanan()
	{
        $nama = $this->input->post('cari');

        $data['layanan'] = $this->ProdukLayanan_model->searchLayanan($nama)->result();
        $this->load->view('ajax_view/v_card-layanan', $data);
	}

    public function cariproduk()
	{
        $nama = $this->input->post('cari');

        $data['produk'] = $this->ProdukLayanan_model->searchProduk($nama)->result();
        $this->load->view('ajax_view/v_card-produk', $data);
	}

    public function keranjangproduk()
	{
        $kode = $this->input->post('kode');

        $data['produk'] = $this->ProdukLayanan_model->detailProduk($kode)->row();
        //echo json_encode($data);
        $subtotal = $data['produk']->harga_item * 1;

        $stok = $data['produk']->jumlah_item;
        if($stok == 0){
            echo "empty";
        }else{
            
            $keranjang = array(
                'kode_transaksi' => $this->Transaksi_model->buat_kode(),
                'id_pl' => $data['produk']->id_produk_layanan,
                'jumbel' => '1',
                'sub_total' => $subtotal,
                'created_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->Transaksi_model->createKeranjang($keranjang);
            $ambilstok = $this->ProdukLayanan_model->kurangStok($data['produk']->id_produk_layanan, '1');
            
            if($simpan)
            {
                echo "Keranjang berhasil ditambahkan";
                $this->showkeranjang();
                $this->showgrandtotal();
            }else{
                echo "Gagal";
            }

        }

	}

    public function keranjanglayanan()
	{
        $kode = $this->input->post('kode');

        $data['layanan'] = $this->ProdukLayanan_model->detailLayanan($kode)->row();

        $subtotal = $data['layanan']->harga_item * 1;

        $keranjang = array(
            'kode_transaksi' => $this->Transaksi_model->buat_kode(),
            'id_pl' => $data['layanan']->id_produk_layanan,
            'jumbel' => '1',
            'sub_total' => $subtotal,
            'created_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->Transaksi_model->createKeranjang($keranjang);
        
        if($simpan)
        {
            echo "Keranjang berhasil ditambahkan";
            $this->showkeranjang();
            $this->showgrandtotal();
        }else{
            echo "Gagal";
        }
        //echo json_encode($data['layanan']->nama_produk_layanan);
	}

    public function showkeranjang()
    {
        $data['keranjang'] = $this->Transaksi_model->showKeranjang($this->Transaksi_model->buat_kode())->result();

        $this->load->view('ajax_view/v_keranjang', $data);
    }

    public function tombolTransaksi()
    {
        $data['keranjang'] = $this->Transaksi_model->showKeranjang($this->Transaksi_model->buat_kode())->result();

        if(!empty($data['keranjang']))
        {
            $this->load->view('ajax_view/v_tombol');
        }
    }

    public function showgrandtotal()
    {
        $data['totals'] = $this->Transaksi_model->showTotal($this->Transaksi_model->buat_kode())->row();
        if(!empty($data['totals']))
        {
            $data['grand'] = $data['totals']->total;
        }else{
            $data['grand'] = "0";
        }

        $this->load->view('ajax_view/v_panel_total', $data);
    }

    public function create()
    {
        $data['totals'] = $this->Transaksi_model->showTotal($this->Transaksi_model->buat_kode())->row();
        if(!empty($data['totals']))
        {
            $grand = $data['totals']->total;
        }else{
            $grand = "0";
        }
        
        $transaksi = array(
            'kode_transaksi' => $this->input->post('kode'),
            'id_user' => $this->session->userdata('id'),
            'total' => $grand,
            'created_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->Transaksi_model->createTransaksi($transaksi);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            $this->session->set_flashdata('cetak', $this->input->post('kode')); 
            redirect('transaksi');
        }
        else
        {
            $this->session->set_flashdata('message','error');
            $this->session->set_flashdata('cetak','false');
            redirect('transaksi');
        }
    }


    public function delete()
	{
        $kode = $this->input->post('kode');
        $id = $this->input->post('id_pl');

        $data['keranjang'] = $this->Transaksi_model->detailKeranjang($kode, $id)->row();
        $jumbel = $data['keranjang']->qty;
        
        $hapus = $this->Transaksi_model->deleteKeranjang($id, $kode);

        $balikstok = $this->ProdukLayanan_model->tambahStok($id, $jumbel);
        
        if($hapus)
        {
            echo "Keranjang berhasil dihapus";
            $this->showkeranjang();
            $this->showgrandtotal();
        }else{
            echo "Gagal";
        }
        //echo "ID ".$id." - ".$jumbel;
        
	}

    public function deleteAll()
	{
        $kode = $this->input->post('kode');

        $hapus = $this->Transaksi_model->deleteAllKeranjang($kode);
        
        if($hapus)
        {
            $this->session->set_flashdata('message2','successfull');
            redirect('transaksi');
        }
        else
        {
            $this->session->set_flashdata('message2','error');
            redirect('transaksi');
        }
        
	}

    public function cetakStruk($kode)
    {
        $data['keranjang'] = $this->Transaksi_model->showKeranjang($kode)->result();
        $data['totals'] = $this->Transaksi_model->showTotal($kode)->row();
        $data['grand'] = $data['totals']->total;
        $data['inv'] = $kode;

        $this->load->view('v_cetak-struk', $data);
    }

}