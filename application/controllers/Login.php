<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_user');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('content/login/index');
    }

    public function regist()
    {
        $this->load->view('content/login/regist');
    }

    public function registrasi()
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
                'active' => '0',
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
                    redirect('loker');
                    die();
                } else {
                    $data['sku'] = $this->upload->data('file_name');
                }
            }
            $this->M_user->regist($data);
            $this->session->set_flashdata('swetalert', '`Good job!`, `Silahkan Tunggu Proses Verifikasi Akun Anda 1x24 Jam!`, `success`');
            redirect('Home');
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `'.validation_errors().'`, `error`');
            redirect('Home');
        }
    }

    public function prosses()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $cekuser = $this->M_login->cekuser($username);
        if ($cekuser) {

            $ceklogin = $this->M_login->ceklogin($username, $password);

            if ($ceklogin) {
                foreach ($ceklogin as $row)

                    if ($row->active == 1) {

                        $this->session->set_userdata('name', $row->nama);
                        $this->session->set_userdata('username', $row->username);
                        $this->session->set_userdata('role', $row->role);
                        $this->session->set_userdata('idceller', $row->idceller);
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf User Anda Belum Aktif`, `error`');
                        redirect('login');
                    }
            } else {
                $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf Username dan Password Anda Salah`, `error`');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf User Anda Belum Terdaftar`, `error`');
            redirect('login');
        }
    }

    public function checkuser()
    {
        $username   = $this->input->post('username');
        // print_r($username); die;

        $cekuser = $this->M_login->cekuser($username);
        if ($cekuser) {
            if ($cekuser->active != 1) {
                $this->session->set_flashdata('swetalert', '`Upsss!`, `Akun Anda belum di verifikasi silahkan hubungi admin untun mengkonfirmasi`, `error`');
                redirect('home');
            } else {
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `Silahkan Registrasi Terlebih Dahulu`, `error`');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('swetalert', '`Good job!`, `Abda Berhasil Logout`, `success`');
        redirect('login');
    }

    public function blocked()
    {
        $this->load->view('content/login/blocked');
    }
}
