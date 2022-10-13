<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get()
	{

		$sql = "SELECT * FROM `user` WHERE `role` = '1'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('user', $data);
	}

	public function update($data)
	{
		$this->db->where('iduser', $data['iduser']);
		$this->db->update('user', $data);
	}

	public function delete($data)
	{
		$this->db->where('iduser', $data['iduser']);
		$this->db->delete('user', $data);
	}

	public function nonaktif($id)
	{
		$sql = "UPDATE `user` SET `active` = '0' WHERE `iduser` = '" . $id . "';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function aktif($id)
	{
		$sql = "UPDATE `user` SET `active` = '1' WHERE `iduser` = '" . $id . "';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function regist($data)
	{
		$sql = "INSERT INTO `celler`(`idceller`, `nama`, `nik`, `namastan`, `alamat`, `nohp`, `sku`) VALUES ('','" . $data['nama'] . "','" . $data['nik'] . "','" . $data['namastan'] . "','" . $data['alamat'] . "','" . $data['nohp'] . "','" . $data['sku'] . "')";
		$this->db->query($sql);
		$id = $this->db->insert_id();
		$sql1 = "INSERT INTO `user`(`iduser`, `nama`, `username`, `pass`, `idceller`, `role`, `active`) VALUES ('','" . $data['nama'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $id . "','" . $data['role'] . "','" . $data['active'] . "')";
		$this->db->query($sql1);
		$sql1 = "INSERT INTO `jualan`(`idjualan`, `idceller`) VALUES ('','" . $id . "')";
		$this->db->query($sql1);
		return $this->db->affected_rows();
	}
}
