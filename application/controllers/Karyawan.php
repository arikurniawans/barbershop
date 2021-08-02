<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        // $this->load->model('Calendar_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['karyawan'] = $this->Auth_model->showPengguna()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_karyawan', $data);
		$this->load->view('parts/footer');
	}

    public function create()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'alamat' => $this->input->post('alamat'),
            'no_telpon' => $this->input->post('telp'),
            'username' => $this->input->post('username')
        );

        $simpan = $this->Auth_model->createPengguna($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('karyawan');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('karyawan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'alamat' => $this->input->post('alamat'),
            'no_telpon' => $this->input->post('telp'),
            'username' => $this->input->post('username')
        );

        $simpan = $this->Auth_model->editPengguna($id, $data);
        if($simpan)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('karyawan');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('karyawan');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->Auth_model->deletePengguna($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('karyawan');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('karyawan');
        }
    }

    public function reset()
    {
        $id = $this->input->post('id');

        $data = array(
            'password' => password_hash('12345678', PASSWORD_BCRYPT)
        );

        $simpan = $this->Auth_model->editPengguna($id, $data);
        if($simpan)
        {
            $this->session->set_flashdata('message4','successfull'); 
            redirect('karyawan');
        }
        else
        {
            $this->session->set_flashdata('message4','error'); 
            redirect('karyawan');
        }
    }


}