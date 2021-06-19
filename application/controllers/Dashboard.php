<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('User_m');
	}
	public function index()
	{
		$data = array(

			'user' => $this->User_m->session_user()->row(),
		);
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/layout/navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('backend/layout/footer');
	}
}
