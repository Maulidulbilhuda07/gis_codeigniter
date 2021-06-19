<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beritaa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('Berita_m');
	}
	public function index()
	{
		$data = array(
			'berita' => $this->Berita_m->get()->result(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('backend/berita/v_berita', $data);
		$this->load->view('backend/layout/footer');
	}
	public function save()
	{
		$config['upload_path'] = './berita/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']     = '2048';
		$config['file_name']     = 'Berita-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		// load libbrary
		$this->load->library('upload', $config);
		$post = $this->input->post(null, true);
		if (@$_FILES['foto']['name'] != null) {
			if ($this->upload->do_upload('foto')) {
				$post['foto'] = $this->upload->data('file_name');
				$this->Berita_m->save($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Disimpan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
					redirect('Beritaa');
				}
			}
		} else {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('Beritaa');
		}
	}
	public function edit($id)
	{
		$data = array(
			'berita' => $this->Berita_m->get($id)->row(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('backend/berita/v_edit', $data);
		$this->load->view('backend/layout/footer');
	}
	public function update()
	{
		$config['upload_path'] = './berita/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']     = '2048';
		$config['file_name']     = 'Berita-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);
		$post = $this->input->post(null, true);
		if (@$_FILES['foto']['name'] != null) {
			if ($this->upload->do_upload('foto')) {
				$post['foto'] = $this->upload->data('file_name');
				$this->Berita_m->update($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Diupdate
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
					redirect('Beritaa');
				}
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('Beritaa');
			}
		} else {
			$post['foto'] = null;
			$this->Berita_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Diupdate
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			}
			redirect('Beritaa');
		}
	}
	public function delete($id)
	{
		$this->Berita_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('delete', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Berhasil Di Delete
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('beritaa');
	}
}
