<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembeli');
		cek_login();
	}

	public function index()
	{
		$celler = $this->session->userdata('idceller');
		$data = [
			'title' => 'Data Pembeli',
			'pembeli' => $this->M_pembeli->get_all_data($celler)
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/pembeli/index', $data);
		$this->load->view('layout/footer');
	}

	public function send($id)
	{
		// Paket Telah Dikirim
		$data = '1';
		$this->M_pembeli->send($data, $id);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Paket Berhasil Dikirim`, `success`');
		redirect('pembeli');
	}
	
	public function done($id)
	{
		// Paket Telah diterima
		$data = '2';
		$this->M_pembeli->done($data, $id);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Paket Telah Diterima`, `success`');
		redirect('pembeli');
	}
}
