<?php
class Fungsi
{
	protected $ci;
	function __construct()
	{
		$this->ci = &get_instance();
	}
	function user_login()
	{
		$this->ci->load->model('User_m');
		$id = $this->ci->session->userdata('user_id');
		$user_data = $this->ci->User_m->get($id)->row();
		return $user_data;
	}
}
