<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pinjam');
		$this->load->model('M_aset');
		cek_login();
	}

	public function index()
	{
		$data = [
			'title' => 'Data Peminjaman Aset Desa',
			'pinjam' => $this->M_pinjam->get_all_data(),
			'aset' => $this->M_aset->getaset()
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/peminjaman/index', $data);
		$this->load->view('layout/footer');
	}

	public function add()
	{
		$data = array(
			'nama'	=> $this->input->post('nama'),
			'nik'	=> $this->input->post('nik'),
			'alamat'	=> $this->input->post('alamat'),
			'dusun'	=> $this->input->post('dusun'),
			'tglpinjam'	=> $this->input->post('tglpinjam'),
			'tglkembali'	=> $this->input->post('tglkembali'),
			'idaset'	=> $this->input->post('idaset'),
			'jml'	=> $this->input->post('jml'),
			'status'	=> '1',
		);
		// Mengambil Data barang yang di pinjam
		$pinjam = $this->M_aset->get($data['idaset']);
		$jmlold = $pinjam->bagus;
		$jmlnow = $data['jml'];
		$jml = $jmlold - $jmlnow;
		// Update Jumlah Stok Barang
		if ($jmlnow > $jmlold) {
			$this->session->set_flashdata('error', 'Jumlah Peminjaman Melebihi Stok yang Tersedia !!!');
			redirect('peminjaman');
		}
		$this->M_aset->updatejml($data['idaset'], $jml);


		$this->M_pinjam->add($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		redirect('peminjaman');
	}

	public function edit($idpeminjaman = NULL)
	{
		$data = array(
			'idpeminjaman'	=> $idpeminjaman,
			'nama'	=> $this->input->post('nama'),
			'nik'	=> $this->input->post('nik'),
			'alamat'	=> $this->input->post('alamat'),
			'dusun'	=> $this->input->post('dusun'),
			'tglpinjam'	=> $this->input->post('tglpinjam'),
			'tglkembali'	=> $this->input->post('tglkembali'),
			'idaset'	=> $this->input->post('idaset'),
			'jml'	=> $this->input->post('jml'),
		);
		$pinjam = $this->M_pinjam->get($data['idpeminjaman']);
		$aset = $this->M_aset->get($data['idaset']);
		if ($pinjam->jml != $data['jml']) {
			if ($pinjam->jml > $data['jml']) {
				$juml = $pinjam->jml - $data['jml'];
				$jml = $aset->bagus + $juml;
			} else if ($pinjam->jml < $data['jml']) {
				$juml = $data['jml'] - $pinjam->jml;
				$jml = $aset->bagus - $juml;
			}
		}
		$this->M_aset->updatejml($data['idaset'], $jml);

		$this->M_pinjam->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!!');
		redirect('peminjaman');
	}

	public function updatest($idpeminjaman, $idasaet, $aset)
	{
		// Mengambil Data barang yang di pinjam
		$pinjam = $this->M_aset->get($idasaet);
		$jmlold = $pinjam->bagus;
		$jml = $jmlold + $aset;
		// Update Jumlah Stok Barang
		$this->M_aset->updatejml($idasaet, $jml);


		$this->M_aset->updatest($idpeminjaman);
		$this->session->set_flashdata('pesan', 'Aset Berhasil Di Kembalikan !!!');
		redirect('peminjaman');
	}

	public function delete($idpeminjaman = NULL, $jml, $idaset)
	{
		$data = [
			'idpeminjaman' => $idpeminjaman,
			'idaset' => $idaset,
			'jml' => $jml
		];
		$pinjam = $this->M_aset->get($data['idaset']);
		$jmlold = $pinjam->bagus;
		$jmlnow = $data['jml'];
		$jml = $jmlold + $jmlnow;
		$this->M_aset->updatejml($data['idaset'], $jml);

		$this->M_pinjam->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('peminjaman');
	}
}
