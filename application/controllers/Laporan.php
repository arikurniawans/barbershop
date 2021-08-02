<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Pembagian_model');
        $this->load->model('ProdukLayanan_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        redirect('dashboard');
	}

    public function rekapLayanan()
    {
        if($this->input->post() != NULL)
        {
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            
            if($tgl1 == "" AND $tgl2 == ""){
                $data['layanan'] = $this->Transaksi_model->showRekapLayanan("", "")->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }else{
                $data['layanan'] = $this->Transaksi_model->showRekapLayanan($tgl1, $tgl2)->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }

            $this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_rekap-layanan', $data);
            $this->load->view('parts/footer');
        }else{
            $data['layanan'] = $this->Transaksi_model->showRekapLayanan("", "")->result();
            $data['cal1'] = $this->Calendar_model->indodate();
            $data['cal2'] = $this->Calendar_model->indodate();

            $this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_rekap-layanan', $data);
            $this->load->view('parts/footer');
        }
        
    }

    public function rekapProduk()
    {
        if($this->input->post() != NULL)
        {
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            
            if($tgl1 == "" AND $tgl2 == ""){
                $data['produk'] = $this->Transaksi_model->showRekapProduk("", "")->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }else{
                $data['produk'] = $this->Transaksi_model->showRekapProduk($tgl1, $tgl2)->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }

            $this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_rekap-produk', $data);
            $this->load->view('parts/footer');
        }else{
            $data['produk'] = $this->Transaksi_model->showRekapProduk("", "")->result();
            $data['cal1'] = $this->Calendar_model->indodate();
            $data['cal2'] = $this->Calendar_model->indodate();

            $this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_rekap-produk', $data);
            $this->load->view('parts/footer');
        }
        
    }
    
    public function rekapPembagianHasil()
    {
        $data['bagi'] = $this->Pembagian_model->showPembagian()->row();
        $data['owner_fee'] = $data['bagi']->pihak_1;
        $data['karyawan_fee'] = $data['bagi']->pihak_2;

        if($this->input->post() != NULL)
        {
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            
            if($tgl1 == "" AND $tgl2 == ""){
                $data['layanan'] = $this->Transaksi_model->showRekapPembagian("", "")->result();
            }else{
                $data['layanan'] = $this->Transaksi_model->showRekapPembagian($tgl1, $tgl2)->result();
            }

            $this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_rekap-bagi-hasil', $data);
            $this->load->view('parts/footer');
        }else{
            $data['layanan'] = $this->Transaksi_model->showRekapPembagian("", "")->result();

            $this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_rekap-bagi-hasil', $data);
            $this->load->view('parts/footer');
        }
        //var_dump($data);
    }

    public function cetakLayanan()
    {
        if($this->input->post() != NULL)
        {
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            
            if($tgl1 == "" AND $tgl2 == ""){
                $data['layanan'] = $this->Transaksi_model->showRekapLayanan("", "")->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }else{
                $data['layanan'] = $this->Transaksi_model->showRekapLayanan($tgl1, $tgl2)->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }

            $this->load->view('pdf_view/v_cetak-layanan', $data);
        }else{
            $data['layanan'] = $this->Transaksi_model->showRekapLayanan("", "")->result();
            $data['cal1'] = $this->Calendar_model->indodate();
            $data['cal2'] = $this->Calendar_model->indodate();

            $this->load->view('pdf_view/v_cetak-layanan', $data);
        }
        
    }

    public function cetakProduk()
    {
        if($this->input->post() != NULL)
        {
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            
            if($tgl1 == "" AND $tgl2 == ""){
                $data['produk'] = $this->Transaksi_model->showRekapProduk("", "")->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }else{
                $data['produk'] = $this->Transaksi_model->showRekapProduk($tgl1, $tgl2)->result();

                $data['cal1'] = $tgl1;
                $data['cal2'] = $tgl2;
            }

            $this->load->view('pdf_view/v_cetak-produk', $data);
        }else{
            $data['produk'] = $this->Transaksi_model->showRekapProduk("", "")->result();
            $data['cal1'] = $this->Calendar_model->indodate();
            $data['cal2'] = $this->Calendar_model->indodate();

            $this->load->view('pdf_view/v_cetak-produk', $data);
        }
        
    }

    public function show($id)
    {
        $data['layanan'] = $this->ProdukLayanan_model->detailLayanan($id)->row();
        $data['transaksi'] = $this->Transaksi_model->detailTransaksi($id)->result();

        $data['id'] = $data['layanan']->id_produk_layanan;
        $data['nama'] = $data['layanan']->nama_produk_layanan;
        $data['deskripsi'] = $data['layanan']->deskripsi_produk_layanan;
        $data['harga'] = $data['layanan']->harga_item;
        $data['foto'] = $data['layanan']->foto_produk_layanan;

        $this->load->view('parts/header');
        $this->load->view('parts/ribbon');
        $this->load->view('v_detail-rekap-bagihasil', $data);
        $this->load->view('parts/footer');

    }

}