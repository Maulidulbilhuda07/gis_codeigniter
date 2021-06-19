<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_m extends CI_Model
{
	public function get()
	{
		$this->db->select('*');
		$this->db->from('wisata');
		$this->db->order_by('id_wisata', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function getid($id)
	{
		$this->db->select('*');
		$this->db->from('wisata');
		$this->db->where('id_wisata', $id);
		$query = $this->db->get();
		return $query;
	}
	public function save($post)
	{
		$data = [
			'nama_wisata' => $post['nama_wisata'],
			'alamat_wisata' => $post['alamat_wisata'],
			'lat' => $post['lat'],
			'lng' => $post['lng'],
			'foto' => $post['foto'],
			'harga' => $post['harga'],
			'detail' => $post['detail'],
			'id_user' => $this->session->userdata('id_user'),
		];
		$this->db->insert('wisata', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_wisata', $id);
		$this->db->delete('wisata');
	}
	public function update($post)
	{
		$params = array(
			'nama_wisata' => $post['nama_wisata'],
			'alamat_wisata' => $post['alamat_wisata'],
			'lat' => $post['lat'],
			'lng' => $post['lng'],
			'harga' => $post['harga'],
			'detail' => $post['detail'],
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($post['foto'] != null) {
			$params['foto'] = $post['foto'];
		}
		$id = $this->input->post('id_wisata');
		$this->db->where('id_wisata', $id);
		$this->db->update('wisata', $params);
	}
}
