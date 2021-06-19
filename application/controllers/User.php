<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$data = array(
			'user' => $this->User_m->get()->result(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('backend/user/v_user', $data);
		$this->load->view('backend/layout/footer');
	}
	public function pengunjung()
	{
		$data = array(
			'user' => $this->User_m->pengunjung()->result(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('backend/user/v_pengunjung', $data);
		$this->load->view('backend/layout/footer');
	}
	public function save()
	{
		$post = $this->input->post(null, true);
		$this->User_m->save($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Disimpan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('user');
	}
	public function update()
	{
		$post = $this->input->post(null, true);
		$this->User_m->update($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', '<div class="alert alert-info alert-dismissible fade show" role="alert">
				Data Berhasil Di Update
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('user');
	}
	public function delete($id)
	{
		$this->User_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('delete', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Berhasil Di Delete
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('user');
	}
}
