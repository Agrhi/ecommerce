<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_Penjual extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penjual');
		$this->load->model('M_user');
		cek_login();
		check_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'Management Penjual',
			'penjual' => $this->M_penjual->get(),
			'user' => $this->M_user->get()
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/management_penjual/index', $data);
		$this->load->view('layout/footer');
	}

	public function reset($iduser = NULL)
	{
		$data = array(
			'iduser'	=> $iduser,
			'username' => $this->input->post('username'),
			'pass' => $this->input->post('pass'),
		);
		$this->M_user->update($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Reset !!!');
		redirect('Management_Penjual');
	}

	public function nonaktif($id)
	{
		$result = $this->M_user->nonaktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Akun Berhasil di Non Aktifkan');
			redirect('Management_Penjual');
		} else {
			$this->session->set_flashdata('error', 'Akun Gagal di Non Aktifkan');
			redirect('Management_Penjual');
		}
	}

	public function aktif($id)
	{
		$result = $this->M_user->aktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Akun Berhasil di Aktifkan');
			redirect('Management_Penjual');
		} else {
			$this->session->set_flashdata('error', 'Akun Gagal di Aktifkan');
			redirect('Management_Penjual');
		}
	}
}