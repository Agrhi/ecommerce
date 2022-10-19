<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjual extends CI_Model
{
	public function get()
	{
		$sql = "SELECT
			user.iduser,
			celler.idceller,
			celler.nama,
			celler.namastan,
			user.nama,
			user.username,
			user.pass,
			user.role,
			user.active
			FROM user
			LEFT JOIN celler ON user.idceller = celler.idceller
			WHERE user.role = '0'";


		$data = $this->db->query($sql);

		return $data->result();
	}

}
