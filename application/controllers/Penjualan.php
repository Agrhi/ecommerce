<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('M_penjualan');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Penjualan',
			'penjualan' => $this->M_penjualan->get_all_data()
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/penjualan/index', $data);
		$this->load->view('layout/footer');
	}

	public function edit()
    {
		$this->form_validation->set_rules('stok', 'Stok', 'required');
        if ($this->form_validation->run() != false) {
			$nik = $this->input->post('nik');
            $data = [
                'idjualan' => $this->input->post('idjualan'),                
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'jual' => '0',
                'gambar' => $_FILES['gambar']
            ];
			
			$jualan = $this->M_penjualan->get_data($data['idjualan']);
			if ($jualan == '0') {
				$data['jual'] = '0';
			} else {
				$data['jual'] = $jualan->jual;
			}
            if ($data['gambar'] == '') {
            } else {
                $config['upload_path']        = './assets/foto';
                $config['allowed_types']    = 'jpg|png|gif|jpeg';
                $config['file_name']        = 'jualan-' . $nik;

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Tersimpan !`, `error`');
                    redirect('penjualan');
                    die();
                } else {
                    $data['gambar'] = $this->upload->data('file_name');
                }
            }
            $this->M_penjualan->edit($data);
            $this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Edit!`, `success`');
            redirect('penjualan');
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `'.validation_errors().'`, `error`');
            redirect('penjualan');
        }
    }
}
