<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		cek_login();
	}

	public function index()
	{
		$celler = $this->session->userdata('idceller');
		$data = [
			'title' 		=> 'Dashboard',
			'total_user'	=>	$this->M_admin->total_user(),
			'pembeli'	=>	$this->M_admin->pembeli($celler),
			'penjual'	=>	$this->M_admin->penjual($celler),
			'celler'	=>	$this->M_admin->celler(),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/dashboard/index', $data);
		$this->load->view('layout/footer');
	}
}
