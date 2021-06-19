  <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Transaksi_m extends CI_Model
	{
		public function get()
		{
			$this->db->select('*');
			$this->db->from('pembelian');
			$this->db->join('user', 'user.id_user=pembelian.id_user');
			$this->db->join('wisata', 'wisata.id_wisata=pembelian.id_wisata');
			$this->db->where('pembelian.id_user', $this->session->userdata('id_user'));
			$this->db->order_by('id_pembelian', 'desc');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query;
		}
		public function alldata()
		{
			$this->db->select('*');
			$this->db->from('pembelian');
			$this->db->join('user', 'user.id_user=pembelian.id_user');
			$this->db->join('wisata', 'wisata.id_wisata=pembelian.id_wisata');
			$this->db->order_by('id_pembelian', 'desc');
			$query = $this->db->get();
			return $query;
		}
		public function save($post)
		{
			$data = [
				'id_wisata' => $post['id_wisata'],
				'id_user' => $this->session->userdata('id_user'),
				'harga_tiket' => $post['harga_tiket'],
				'jumlah_tiket' => $post['jumlah_tiket'],
				'tgl_pembelian' => $post['tgl_pembelian'],
			];
			$this->db->insert('pembelian', $data);
		}
		public function history()
		{
			$this->db->select('*');
			$this->db->from('pembelian');
			$this->db->join('user', 'user.id_user=pembelian.id_user');
			$this->db->join('wisata', 'wisata.id_wisata=pembelian.id_wisata');
			$this->db->where('pembelian.id_user', $this->session->userdata('id_user'));
			$this->db->order_by('id_pembelian', 'desc');
			$query = $this->db->get();
			return $query;
		}
		public function detail($id)
		{
			$this->db->select('*');
			$this->db->from('pembelian');
			$this->db->join('user', 'user.id_user=pembelian.id_user');
			$this->db->join('wisata', 'wisata.id_wisata=pembelian.id_wisata');
			$this->db->where('pembelian.id_pembelian', $id);
			$this->db->where('pembelian.id_user', $this->session->userdata('id_user'));
			$query = $this->db->get();
			return $query;
		}
		public function delete($id)
		{
			$this->db->where('id_pembelian', $id);
			$this->db->delete('pembelian');
		}
		public function konfirmasi($post)
		{
			$data = [
				'id_user' => $this->session->userdata('id_user'),
				'id_pembelian' => $post['id_pembelian'],
				'id_wisata' => $post['id_wisata'],
				'foto' => $post['foto'],
				'pembayaran' => $post['pembayaran'],
			];
			$this->db->insert('konfirmasi', $data);
		}
		public function update_status($post)
		{
			$data = [
				'status_tiket' => "Sudah Kirim Bukti Pembayaran",
			];
			$this->db->where('id_pembelian', $post['id_pembelian']);
			$this->db->update('pembelian', $data);
		}
	}
