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

	// public function update($data)
	// {
	// 	$this->db->where('iduser', $data['iduser']);
	// 	$this->db->update('user', $data);
	// }

	// public function delete($data)
	// {
	// 	$this->db->where('iduser', $data['iduser']);
	// 	$this->db->delete('user', $data);
	// }

	// public function nonaktif($id)
	// {
	// 	$sql = "UPDATE `user` SET `active` = '0' WHERE `iduser` = '" . $id . "';";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	// public function aktif($id)
	// {
	// 	$sql = "UPDATE `user` SET `active` = '1' WHERE `iduser` = '" . $id . "';";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	// public function regist($data)
	// {
	// }
}
