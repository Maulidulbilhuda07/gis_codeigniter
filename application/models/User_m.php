  <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class User_m extends CI_Model
	{
		public function get($id = null)
		{
			$this->db->select('*');
			$this->db->from('user');
			if ($id != null) {
				$this->db->where('id_user', $id);
			}
			$this->db->where('status', "Admin");
			$query = $this->db->get();
			return $query;
		}
		public function pengunjung($id = null)
		{
			$this->db->select('*');
			$this->db->from('user');
			if ($id != null) {
				$this->db->where('id_user', $id);
			}
			$this->db->where('status', "Pengunjung");
			$query = $this->db->get();
			return $query;
		}
		public function session_user()
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user', $this->session->userdata('id_user'));
			$query = $this->db->get();
			return $query;
		}
		public function save($post)
		{
			if ($this->session->userdata('id_user')) {
				$data = [
					'name' => $post['name'],
					'alamat' => $post['alamat'],
					'nohp' => $post['nohp'],
					'jk' => $post['jk'],
					'username' => $post['username'],
					'password' => sha1($post['password']),
					'status' => "Admin",
				];
			} else {
				$data = [
					'name' => $post['name'],
					'alamat' => $post['alamat'],
					'nohp' => $post['nohp'],
					'jk' => $post['jk'],
					'username' => $post['username'],
					'password' => sha1($post['password']),
				];
			}
			$this->db->insert('user', $data);
		}
		public function update($post)
		{
			$data = [
				'name' => $post['name'],
				'alamat' => $post['alamat'],
				'nohp' => $post['nohp'],
				'jk' => $post['jk'],
				'username' => $post['username'],
				'password' => sha1($post['password']),
			];
			$this->db->where('id_user', $post['id_user']);
			$this->db->update('user', $data);
		}
		public function delete($id)
		{
			$this->db->where('id_user', $id);
			$this->db->delete('user');
		}
	}
