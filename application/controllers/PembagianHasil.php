<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembagianHasil extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('Pembagian_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['bagi'] = $this->Pembagian_model->showPembagian()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_pembagian-hasil', $data);
		$this->load->view('parts/footer');
	}

    public function setting()
    {
        $id = $this->input->post('id');
        
        $data = array(
            'pihak_1' => $this->input->post('nilai1'),
            'pihak_2' => $this->input->post('nilai2'),
            'updated_at' => $this->Calendar_model->indocal()
        );

        $simpan = $this->Pembagian_model->editPembagian($id, $data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('pembagianhasil');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('pembagianhasil');
        }
    }

}