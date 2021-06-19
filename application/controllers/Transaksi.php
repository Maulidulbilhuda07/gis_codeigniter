<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
			'user' => $this->Transaksi_m->get()->row(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_pesanan', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function alldata()
	{
		$data = array(
			'pemesanan' => $this->Transaksi_m->alldata()->result(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('backend/user/v_data_pemesanan', $data);
		$this->load->view('backend/layout/footer');
	}
	public function pesan($id)
	{
		$data = array(
			'wisata' => $this->Wisata_m->getid($id)->row(),
			'user' => $this->User_m->session_user()->row(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_transaksi', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function save()
	{
		$post = $this->input->post(null, true);
		$this->Transaksi_m->save($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Disimpan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('Transaksi');
	}
	public function history()
	{
		$data = array(
			'history' => $this->Transaksi_m->history()->result(),
			'user' => $this->User_m->session_user()->row(),
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_history', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function delete($id)
	{
		$this->Transaksi_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('delete', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Berhasil Di Delete
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('transaksi/history');
	}
	public function print($id)
	{
		$data['user'] = $this->Transaksi_m->detail($id)->row();
		$this->load->view('frontend/pengunjung/v_print', $data);
	}
	public function detail($id)
	{
		$data['user'] = $this->Transaksi_m->detail($id)->row();
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/pengunjung/v_detail_pesanan', $data);
		$this->load->view('frontend/layout/footer');
	}
	public function konfirmasi()
	{
		$config['upload_path'] = './konfirmasi/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']     = '2048';
		$config['file_name']     = 'Wisata-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		// load libbrary
		$this->load->library('upload', $config);
		$post = $this->input->post(null, true);
		if (@$_FILES['foto']['name'] != null) {
			if ($this->upload->do_upload('foto')) {
				$post['foto'] = $this->upload->data('file_name');
				// var_dump($post['foto'] = $this->upload->data('file_name'));
				// die();
				$this->Transaksi_m->konfirmasi($post);
				$this->Transaksi_m->update_status($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Bukti Pembayaran Sudah Terkirim
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
					redirect('transaksi/history');
				}
			}
		} else {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('transaksi/history');
		}
	}
}
