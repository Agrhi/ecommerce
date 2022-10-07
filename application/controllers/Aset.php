<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_aset');
		cek_login();
	}

	public function index()
	{
		$data = [
			'title' 		=> 'Data Aset Desa',
			'aset' => $this->M_aset->get_all_data(),
			'rusak' => $this->M_aset->getrusak()
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/aset/index', $data);
		$this->load->view('layout/footer');
	}

	public function add()
	{

		$data = array(
			'namaaset'	=> $this->input->post('namaaset'),
			'stok'	=> $this->input->post('stok'),
			'bagus'	=> $this->input->post('stok'),
			'rusak'	=> '0',
		);
		$this->M_aset->insert($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		redirect('aset');
	}

	public function addrusak()
	{

		$data = array(
			'idaset'	=> $this->input->post('idaset'),
			'rusak'	=> $this->input->post('rusak'),
		);
		// Mengambil Data barang yang di pinjam
		$pinjam = $this->M_aset->get($data['idaset']);
		$jmlbgs = $pinjam->bagus;
		$jmlold = $pinjam->stok;
		$jmlrsk = $pinjam->rusak;
		$jmlnow = $data['rusak'];
		$data['stok'] = $jmlold - $jmlnow;
		$data['bagus'] = $jmlbgs - $jmlnow;
		$data['rusak'] = $data['rusak'] + $jmlrsk;

		$this->M_aset->updaterusak($data);
		$this->session->set_flashdata('pesanrusak', 'Data Aset Rusak Berhasil Di Tambahkan !!!');
		redirect('aset');
	}

	public function edit($idaset = NULL)
	{
		$data = array(
			'idaset'	=> $idaset,
			'namaaset' => $this->input->post('namaaset'),
			'stok' => $this->input->post('stok'),
		);
		$pinjam = $this->M_aset->get($data['idaset']);
		$jmlbgs = $pinjam->bagus;
		$jmlold = $pinjam->stok;

		$jml = $data['stok'] - $jmlold;
		$data['bagus'] = $jml + $jmlbgs;
		$this->M_aset->update($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!!');
		redirect('aset');
	}

	public function delete($idaset = NULL)
	{
		$data = array('idaset' => $idaset);
		$this->M_aset->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('aset');
	}
}
