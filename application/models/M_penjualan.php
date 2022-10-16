<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
	public function get_all_data()
	{
		$sql = "SELECT * FROM `jualan`
		JOIN celler ON celler.idceller = jualan.idceller;";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function get_data($idjualan) 
	{
		$sql = "SELECT * FROM `jualan` WHERE idjualan = '".$idjualan."'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	

	public function edit($data)
	{
		$this->db->where('idjualan', $data['idjualan']);
		$this->db->update('jualan', $data);
	}

}
