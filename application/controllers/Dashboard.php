<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Auth_model');
        $this->load->model('Calendar_model');
        $this->load->model('Transaksi_model');
        if($this->Auth_model->isNotLogin()) redirect('auth');
    }

	public function index()
	{
        $data['karyawan'] = $this->db->where_not_in('user_status', 'owner')->from("users")->count_all_results();
        $data['layanan'] = $this->db->where('jenis', 'layanan')->from("produk_layanan")->count_all_results();
        $data['produk'] = $this->db->where('jenis', 'produk')->from("produk_layanan")->count_all_results();
        $data['transaksi'] = $this->db->query('SELECT COUNT(*) AS jml_transaksi FROM transaksi WHERE date(created_at)=CURDATE()')->row();
        $data['grafik'] = $this->Transaksi_model->grafikTransaksi()->result();
        $data['terlaris'] = $this->Transaksi_model->itemTerlaris()->result();
        $data['terpopuler'] = $this->Transaksi_model->itemTerpopuler()->result();

		$this->load->view('parts/header');
        $this->load->view('parts/ribbon');
		$this->load->view('v_dashboard', $data);
		$this->load->view('parts/footer');
        //var_dump($data['terpopuler']);
	}

}