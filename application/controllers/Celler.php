<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Celler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_celler');
		cek_login();
	}

	public function index()
	{
		$celler = $this->session->userdata('idceller');
		$data = [
			'title' 		=> 'Data Agen Penjual',
			'celler' => $this->M_celler->get_all_data($celler)
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/celler/index', $data);
		$this->load->view('layout/footer');
	}

	public function add()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'trim|is_unique[celler.nik]', ['is_unique' => 'NIK yang anda masukkan telah memiliki Akun']);
        if ($this->form_validation->run() != false) {
            $data = [
                'namastan' => $this->input->post('namastan'),
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'alamat' => $this->input->post('alamat'),
                'nohp' => $this->input->post('nohp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'active' => '1',
                'role' => '0',
                'sku' => $_FILES['gambar']
            ];
            if ($data['sku'] == '') {
            } else {
                $config['upload_path']        = './assets/gambar';
                $config['allowed_types']    = 'jpg|png|gif|jpeg';
                $config['file_name']        = 'sku-' . $data['nik'];

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Tersimpan !`, `error`');
                    redirect('celler');
                    die();
                } else {
                    $data['sku'] = $this->upload->data('file_name');
                }
            }
            $this->M_celler->add($data);
            $this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan!`, `success`');
            redirect('celler');
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `'.validation_errors().'`, `error`');
            redirect('celler');
        }
    }

	public function edit($idceller = NULL)
	{
		$nik 				= $this->input->post('nik');
		$nama 				= $this->input->post('nama');
		$namastan 			= $this->input->post('namastan');
		$alamat 			= $this->input->post('alamat');
		$nohp 				= $this->input->post('nohp');
		$sku				= $_FILES['gambar'];
		if ($sku = '') {
		} else {
			$config['upload_path']		= './assets/gambar';
			$config['allowed_types']	= 'jpg|png|gif|jpeg';
			$config['file_name']        = 'sku-' . $nik;

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'idceller'			=> $idceller,
					'nik'				=> $nik,
					'nama'				=> $nama,
					'namastan'			=> $namastan,
					'alamat'			=> $alamat,
					'nohp'				=> $nohp,
				);
				$this->M_celler->edit($data);
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Edit!`, `success`');
				redirect('celler');
			} else {
				$sku = $this->upload->data('file_name');
			}
		}
		$celler = $this->M_celler->get_data($idceller);
		if ($celler->sku != "") {
			unlink('./assets/gambar/' . $celler->sku);
		}
		$data = array(
			'idceller'			=> $idceller,
			'nik'				=> $nik,
			'nama'				=> $nama,
			'namastan'			=> $namastan,
			'alamat'			=> $alamat,
			'nohp'				=> $nohp,
			'sku'				=> $sku,
		);
		$this->M_celler->edit($data);
		$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Edit!`, `success`');
		redirect('celler');
	}

	// public function delete($idceller = NULL)
	// {
	// 	//hapus gambar

	// 	// $celler = $this->M_celler->get_data($idceller);
	// 	// if ($celler->sku != "") {
	// 	// 	unlink('./assets/gambar/' . $celler->sku);
	// 	// }

	// 	$this->db->join('celler.idceller=user.idceller');
	// 	$this->db->join('celler.idceller=jualan.idceller');
	// 	$this->db->where('celler.idceller',$idceller);
	// 	$this->db->delete(array('celler','user','jualan'));
	// }

	

}
