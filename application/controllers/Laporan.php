<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('M_aset');
        $this->load->model('M_pinjam');
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Bulanan',
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar');
        $this->load->view('content/admin/laporan/index', $data);
        $this->load->view('layout/footer');
    }

    public function get($id, $bulan = '')
	{
		if ($bulan == '') {
			$bln = '';
		} else {
			$bln = $bulan;
		}
		$data = [
			'title' => 'Laporan Bulanan',
			'aset' => $this->M_aset->get_all_data(),
			'select' => $id,
			'bln' => $bln
		];
		$blan = '-'.$bln.'-';
		if ($id == 1) {
			$data['aset'] = $this->M_aset->get_all_data();			
		} else if ($id == 2) {
			$data['rusak'] = $this->M_aset->getrusak();			
		} else if ($id == 3) {
			$data['aset'] = $this->M_pinjam->get_all_data();			
		} else if ($id == 4) {
			$data['aset'] = $this->M_pinjam->getbulan($blan);						
		}
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('content/admin/laporan/indexx');
		$this->load->view('layout/footer');
	}

	public function cetak($id, $bulan = '')
	{
		if ($bulan == '') {
			$bln = '';
		} else {
			$bln = $bulan;
		}
		if ($bln == '01') {
			$blan = 'Januari';
		} else if ($bln == '02') {
			$blan = 'Februari';
		} else if ($bln == '03') {
			$blan = 'Maret';
		} else if ($bln == '04') {
			$blan = 'April';
		} else if ($bln == '05') {
			$blan = 'Mei';
		} else if ($bln == '06') {
			$blan = 'Juni';
		} else if ($bln == '07') {
			$blan = 'Juli';
		} else if ($bln == '08') {
			$blan = 'Agustus';
		} else if ($bln == '09') {
			$blan = 'September';
		} else if ($bln == '10') {
			$blan = 'Oktober';
		} else if ($bln == '11') {
			$blan = 'Novembar';
		} else if ($bln == '12') {
			$blan = 'Desembar';
		}
		$buulan = '-'.$bln.'-';	
		if ($id == 1) {
			$data =[
				'title' => 'Rekup Data Aset Desa',
				'select' => $id,
				'aset' => $this->M_aset->get_all_data()			
			];				
		} else if ($id == 2) {
			$data =[
				'title' => 'Data Aset Desa Yang Rusak',
				'select' => $id,
				'aset' => $this->M_aset->getrusak()			
			];
		} else if ($id == 3) {
			$data =[
				'title' => 'Data Seluru Peminjaman',
				'select' => $id,
				'aset' => $this->M_pinjam->get_all_data()
			];
		} else if ($id == 4) {	
					
			$data =[
				'title' => 'Rekup Data Tiket Berdasarkan Bulan '.$blan,
				'select' => $id,
				'bln' => $bln,
				'aset' => $this->M_pinjam->getbulan($buulan),			
			];
		}
		$this->load->view('layout/header', $data);
		$this->load->view('content/admin/laporan/print', $data);
	}
}
