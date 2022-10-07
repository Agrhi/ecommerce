<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		cek_login();
		check_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'Management User',
			'user' => $this->M_user->get()
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/management_user/index', $data);
		$this->load->view('layout/footer');
	}

	public function add()
	{

		$role = $this->session->userdata('role');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Anda belum memasukan Nama User']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Anda belum memasukan Username User']);
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[3]', ['required' => 'Anda belum memasukan Password User', 'min_length' => 'Minimal Password 3 Digit Huruf/Angka/Karakter']);
		$this->form_validation->set_rules('active', 'Aktif', 'trim|required', ['required' => 'Anda belum memilih Status']);
		if ($role == 1) {
			$this->form_validation->set_rules('role', 'Role', 'trim|required', ['required' => 'Anda belum memilih Role Akses User']);
		} else {
		}

		if ($this->form_validation->run() != false) {
			$data 	= [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'pass' => $this->input->post('pass'),
				'role' => $this->input->post('role'),
				'active' => $this->input->post('active'),
			];
			$this->M_user->insert($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
			redirect('Management_User');
		}
	}

	public function edit($iduser = NULL)
	{
		$data = array(
			'iduser'	=> $iduser,
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'pass' => $this->input->post('pass'),
			'role' => $this->input->post('role'),
		);
		$this->M_user->update($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!!');
		redirect('Management_User');
	}

	public function delete($iduser = NULL)
	{
		$data = array('iduser' => $iduser);
		$this->M_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('Management_User');
	}

	public function nonaktif($id)
	{
		$result = $this->M_user->nonaktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Akun Berhasil di Non Aktifkan');
			redirect('Management_User');
		} else {
			$this->session->set_flashdata('error', 'Akun Gagal di Non Aktifkan');
			redirect('Management_User');
		}
	}

	public function aktif($id)
	{
		$result = $this->M_user->aktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Akun Berhasil di Aktifkan');
			redirect('Management_User');
		} else {
			$this->session->set_flashdata('error', 'Akun Gagal di Aktifkan');
			redirect('Management_User');
		}
	}
}
