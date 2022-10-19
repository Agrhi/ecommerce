<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
	public function get()
	{
		$sql = "SELECT * FROM `jualan`
		JOIN celler ON celler.idceller = jualan.idceller
		WHERE stok != '0' AND stok != '';";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function get_where($id)
	{
		$sql = "SELECT * FROM `jualan`
		JOIN celler ON celler.idceller = jualan.idceller
		WHERE stok != '0' AND stok != '' AND jualan.idceller = '".$id."';";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function get_all_data($celler)
	{
		if ($celler == '') {
		$sql = "SELECT * FROM `jualan`
		JOIN celler ON celler.idceller = jualan.idceller;";
		} else {
		$sql = "SELECT * FROM `jualan`
		JOIN celler ON celler.idceller = jualan.idceller
		WHERE jualan.idceller = '".$celler."';";
		}

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
	
	public function shop($data)
	{
		$this->db->insert('pembeli', $data);
	}
	
	public function minstok ($stok, $jual, $idjualan)
	{
		$this->db->set('stok', $stok);
		$this->db->set('jual', $jual);
		$this->db->where('idjualan', $idjualan);
		$this->db->update('jualan');
	}

}
