<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembeli extends CI_Model
{
	public function get_all_data($celler)
	{
		if ($celler == '') {
		$sql = "SELECT * FROM `pembeli`
		JOIN celler ON celler.idceller = pembeli.idceller
		JOIN jualan ON jualan.idjualan = pembeli.idjualan;";
		} else {
		$sql = "SELECT * FROM `pembeli`
		JOIN celler ON celler.idceller = pembeli.idceller
		JOIN jualan ON jualan.idjualan = pembeli.idjualan
		WHERE pembeli.idceller = '".$celler."';";
		}


		$data = $this->db->query($sql);

		return $data->result();
	}

	public function get_data()
	{
		$sql = "SELECT
			pembeli.idpembeli,
			celler.idceller,
			celler.namastan,
			pembeli.nik,
			pembeli.nama,
			pembeli.alamat,
			pembeli.nohp,
			pembeli.jml,
			pembeli.ktp
			FROM pembeli
			LEFT JOIN celler ON pembeli.idceller = celler.idceller
			WHERE pembeli.idpembeli ";


		$data = $this->db->query($sql);

		return $data->result();
	}

	public function send($data, $id)
	{
		$this->db->set('status', $data);
		$this->db->where('idpembeli', $id);
		$this->db->update('pembeli');
	}

	public function done($data, $id)
	{
		$this->db->set('status', $data);
		$this->db->where('idpembeli', $id);
		$this->db->update('pembeli');
	}

}
