<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Berita_m');
	}
	public function index()
	{
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_home');
		$this->load->view('frontend/layout/footer');
	}
	public function wisata()
	{
		$data = array(
			'wisata' => $this->Wisata_m->get()->result(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/wisata/v_wisata', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function detail($id)
	{
		$data = array(
			'wisata' => $this->Wisata_m->getid($id)->row(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/wisata/v_detail', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function berita()
	{
		$data = array(
			'berita' => $this->Berita_m->get()->result(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_berita', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function IsiBerita($id)
	{
		$data = array(
			'berita' => $this->Berita_m->get($id)->row(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_isi_berita', $data);
		$this->load->view('frontend/layout/footer');
	}
}
