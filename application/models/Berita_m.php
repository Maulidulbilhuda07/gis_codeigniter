<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('berita');
		if ($id != null) {
			$this->db->where('id_berita', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function save($post)
	{
		$data = [
			'judul' => $post['judul'],
			'isi' => $post['isi'],
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $post['foto'],
		];
		$this->db->insert('berita', $data);
	}
	public function update($post)
	{
		$params = array(
			'judul' => $post['judul'],
			'isi' => $post['isi_edit'],
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($post['foto'] != null) {
			$params['foto'] = $post['foto'];
		}
		$id = $this->input->post('id_berita');
		$this->db->where('id_berita', $id);
		$this->db->update('berita', $params);
	}
	public function delete($id)
	{
		$this->db->where('id_berita', $id);
		$this->db->delete('berita');
	}
}
