<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get()
	{

		$sql = "SELECT * FROM `user`";

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
		print_r($data); die;
	}
}
