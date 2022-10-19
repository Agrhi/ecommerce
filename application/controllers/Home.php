<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penjualan');
	}

	public function index()
	{
		$data = [
			'title' 		=> 'Coffe',
			'celler'			=> $this->M_penjualan->get()
		];
		$this->load->view('content/landingpage/index', $data);
	}

	public function shope($id)
	{
		$data = [
			'title' 		=> 'Belanja',
			'celler'			=> $this->M_penjualan->get_where($id)
		];
		$this->load->view('content/landingpage/shope', $data);
	}

	public function jual()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'alamat' => $this->input->post('alamat'),
			'nohp' => $this->input->post('nohp'),
			'jml' => $this->input->post('jml'),
			'idceller' => $this->input->post('idceller'),
			'idjualan' => $this->input->post('idjualan'),
			'status' => '0',
			'ktp' => $_FILES['ktp']
		];
		$celler = $this->M_penjualan->get_where($data['idceller']);
		if ($data['jml'] > $celler->stok) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Jumlah Stok Kurang !`, `error`');
			redirect('home/shope/'.$data['idjualan']);
		} else {
			$stok = $celler->stok - $data['jml'];
			$jual = $celler->jual + $data['jml'];
		}		
		if ($data['ktp'] == '') {
		} else {
			$config['upload_path']        = './assets/ktp';
			$config['allowed_types']    = 'jpg|png|gif|jpeg';
			$config['file_name']        = 'ktp-' . $data['nik'];

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('ktp')) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Tersimpan !`, `error`');
				redirect('home');
				die();
			} else {
				$data['ktp'] = $this->upload->data('file_name');
			}
		}
		$this->M_penjualan->shop($data);
		$this->M_penjualan->minstok($stok, $jual, $data['idjualan']);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan! Silahkan hubungi Penjual pada Nomor yang Tertera`, `success`');
		redirect('home');
	}
}
