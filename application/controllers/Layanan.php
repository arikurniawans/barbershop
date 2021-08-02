<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

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
        $data['layanan'] = $this->ProdukLayanan_model->showLayanan()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_layanan', $data);
		$this->load->view('parts/footer');
	}

    public function change($id)
	{
        $data['layanan'] = $this->ProdukLayanan_model->detailLayanan($id)->row();

        $data['id'] = $data['layanan']->id_produk_layanan;
        $data['nama'] = $data['layanan']->nama_produk_layanan;
        $data['deskripsi'] = $data['layanan']->deskripsi_produk_layanan;
        $data['harga'] = $data['layanan']->harga_item;

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_edit-layanan', $data);
		$this->load->view('parts/footer');
        //var_dump($data['layanan']->nama_produk_layanan);
	}

    public function show($id)
	{
        $data['layanan'] = $this->ProdukLayanan_model->detailLayanan($id)->row();

        $data['id'] = $data['layanan']->id_produk_layanan;
        $data['nama'] = $data['layanan']->nama_produk_layanan;
        $data['deskripsi'] = $data['layanan']->deskripsi_produk_layanan;
        $data['harga'] = $data['layanan']->harga_item;
        $data['foto'] = $data['layanan']->foto_produk_layanan;

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_detail-layanan', $data);
		$this->load->view('parts/footer');
        //var_dump($data['layanan']->nama_produk_layanan);
	}

    public function create()
    {
        $berkas = $_FILES['foto']['name'];
        $config['upload_path'] = './foto_layanan';
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
            $this->load->view('v_layanan');
            $this->load->view('parts/footer');
        }else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $data = array(
                'nama_produk_layanan' => $this->input->post('nama'),
                'deskripsi_produk_layanan' => $this->input->post('deskripsi'),
                'harga_item' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
                'jenis' => 'layanan',
                'foto_produk_layanan' => $file_name,
                'created_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->ProdukLayanan_model->createLayanan($data);
            if($simpan)
            {
                $this->session->set_flashdata('message','successfull'); 
                redirect('layanan');
            }
            else
            {
                $this->session->set_flashdata('message','error'); 
                redirect('layanan');
            }
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');

        $berkas = $_FILES['foto']['name'];
        $config['upload_path'] = './foto_layanan';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $layanan = $this->ProdukLayanan_model->detailLayanan($id)->row();

        if($berkas == ""){
            
            $data = array(
                'nama_produk_layanan' => $this->input->post('nama'),
                'deskripsi_produk_layanan' => $this->input->post('deskripsi'),
                'harga_item' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
                'updated_at' => $this->Calendar_model->indocal()
            );
    
            $simpan = $this->ProdukLayanan_model->editLayanan($id, $data);
            if($simpan)
            {
                $this->session->set_flashdata('message2','successfull'); 
                redirect('layanan');
            }
            else
            {
                $this->session->set_flashdata('message2','error'); 
                redirect('layanan');
            }
        }else{
            $target = './foto_layanan/'.$layanan->foto_produk_layanan;
            unlink($target);

            if ( ! $this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', $error); 
                $this->load->view('parts/header');
                $this->load->view('parts/ribbon');
                $this->load->view('v_layanan');
                $this->load->view('parts/footer');
            }else{
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $data = array(
                    'nama_produk_layanan' => $this->input->post('nama'),
                    'deskripsi_produk_layanan' => $this->input->post('deskripsi'),
                    'harga_item' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
                    'jenis' => 'layanan',
                    'foto_produk_layanan' => $file_name,
                    'updated_at' => $this->Calendar_model->indocal()
                );
        
                $simpan = $this->ProdukLayanan_model->editLayanan($id, $data);
                if($simpan)
                {
                    $this->session->set_flashdata('message2','successfull'); 
                    redirect('layanan');
                }
                else
                {
                    $this->session->set_flashdata('message2','error'); 
                    redirect('layanan');
                }
            }
            
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');

        $layanan = $this->ProdukLayanan_model->detailLayanan($id)->row();

        $target = './foto_layanan/'.$layanan->foto_produk_layanan;
        unlink($target);
        
        $hapus = $this->ProdukLayanan_model->deleteLayanan($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('layanan');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('layanan');
        }
    }


}