<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' 		=> 'Coffe'
		];
		$this->load->view('content/landingpage/index', $data);
		
		// $this->load->view('layout/header', $data);
		// $this->load->view('layout/sidebar', $data);
		// $this->load->view('layout/navbar');
		// $this->load->view('content/admin/dashboard/index', $data);
		// $this->load->view('layout/footer');
	}
}
