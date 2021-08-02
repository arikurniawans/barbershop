<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('ProdukLayanan_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['produk'] = $this->ProdukLayanan_model->showProduk()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_produk', $data);
		$this->load->view('parts/footer');
	}

    public function change($id)
	{
        $data['produk'] = $this->ProdukLayanan_model->detailProduk($id)->row();

        $data['id'] = $data['produk']->id_produk_layanan;
        $data['nama'] = $data['produk']->nama_produk_layanan;
        $data['jumlah'] = $data['produk']->jumlah_item;
        $data['harga'] = $data['produk']->harga_item;

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_edit-produk', $data);
		$this->load->view('parts/footer');
        //var_dump($data['layanan']->nama_produk_layanan);
	}

    public function show($id)
	{
        $data['produk'] = $this->ProdukLayanan_model->detailProduk($id)->row();

        $data['id'] = $data['produk']->id_produk_layanan;
        $data['nama'] = $data['produk']->nama_produk_layanan;
        $data['jumlah'] = $data['produk']->jumlah_item;
        $data['harga'] = $data['produk']->harga_item;
        $data['foto'] = $data['produk']->foto_produk_layanan;

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_detail-produk', $data);
		$this->load->view('parts/footer');
        //var_dump($data['layanan']->nama_produk_layanan);
	}

    public function create()
    {
        $berkas = $_FILES['foto']['name'];
        $config['upload_path'] = './foto_produk';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', $error); 
			$this->load->view('parts/header');
            $this->load->view('parts/ribbon');
            $this->load->view('v_produk');
            $this->load->view('parts/footer');
        }else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $data = array(
                'nama_produk_layanan' => $this->input->post('nama'),
                'jumlah_item' => $this->input->post('jumlah'),
                'harga_item' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
                'jenis' => 'produk',
                'foto_produk_layanan' => $file_name,
                'created_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->ProdukLayanan_model->createProduk($data);
            if($simpan)
            {
                $this->session->set_flashdata('message','successfull'); 
                redirect('produk');
            }
            else
            {
                $this->session->set_flashdata('message','error'); 
                redirect('produk');
            }
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');

        $berkas = $_FILES['foto']['name'];
        $config['upload_path'] = './foto_produk';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $produk = $this->ProdukLayanan_model->detailProduk($id)->row();

        if($berkas == ""){
            
            $data = array(
                'nama_produk_layanan' => $this->input->post('nama'),
                'jumlah_item' => $this->input->post('jumlah'),
                'harga_item' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
                'updated_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->ProdukLayanan_model->editProduk($id, $data);
            if($simpan)
            {
                $this->session->set_flashdata('message2','successfull'); 
                redirect('produk');
            }
            else
            {
                $this->session->set_flashdata('message2','error'); 
                redirect('produk');
            }
        }else{
            $target = './foto_produk/'.$produk->foto_produk_layanan;
            unlink($target);

            if ( ! $this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', $error); 
                $this->load->view('parts/header');
                $this->load->view('parts/ribbon');
                $this->load->view('v_produk');
                $this->load->view('parts/footer');
            }else{
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $data = array(
                    'nama_produk_layanan' => $this->input->post('nama'),
                    'jumlah_item' => $this->input->post('jumlah'),
                    'harga_item' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
                    'foto_produk_layanan' => $file_name,
                    'updated_at' => $this->Calendar_model->indocal()
                );
        
                $simpan = $this->ProdukLayanan_model->editProduk($id, $data);
                if($simpan)
                {
                    $this->session->set_flashdata('message2','successfull'); 
                    redirect('produk');
                }
                else
                {
                    $this->session->set_flashdata('message2','error'); 
                    redirect('produk');
                }
            }
            
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');

        $produk = $this->ProdukLayanan_model->detailProduk($id)->row();

        $target = './foto_produk/'.$produk->foto_produk_layanan;
        unlink($target);
        
        $hapus = $this->ProdukLayanan_model->deleteProduk($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('produk');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('produk');
        }
    }


}