<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->Auth_m->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				if ($row->status == "Admin") {
					$params = array(
						'id_user' 	=> $row->id_user,
					);
					$this->session->set_userdata($params);
					echo "<script> 
				alert('login berhasil sebagai admin');
				window.location='" . site_url('dashboard') . "';
				</script>";
				} else {
					$params = array(
						'id_user' 	=> $row->id_user,
					);
					$this->session->set_userdata($params);
					echo "<script> 
				alert('login berhasil pengunjung');
				window.location='" . site_url('home') . "';
				</script>";
				}
			} else {
				echo "<script> 
				alert('login gagal');
				window.location='" . site_url('auth') . "';
				</script>";
			}
		}
	}
	public function logout()
	{
		$params = array('id_user');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
	public function save()
	{
		$post = $this->input->post(null, true);
		$this->User_m->save($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Registrasi Berhasil, Silahkan Login
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		}
		redirect('auth');
	}
}
