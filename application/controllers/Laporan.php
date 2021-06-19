<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('Transaksi_m');
	}
	public function index()
	{
		$data = array(
			'pemesanan' => $this->Transaksi_m->alldata()->result(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('backend/user/v_all_pemesanan', $data);
		$this->load->view('backend/layout/footer');
	}
	public function print()
	{
		$data = array(
			'pemesanan' => $this->Transaksi_m->alldata()->result(),
		);
		$this->load->view('backend/user/v_print_all_pemesanan', $data);
	}
}
