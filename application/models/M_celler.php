<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_celler extends CI_Model
{

	public function get_all_data()
	{
		$this->db->from('celler');
		$this->db->order_by('idceller', 'asc');
		return $this->db->get()->result();
	}

	public function get_data($idceller) 
	{
		$this->db->from('celler');
		$this->db->where('idceller', $idceller);
		return $this->db->get()->row();
	}

	public function add($data)
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

	public function edit($data)
	{
		$this->db->where('idceller', $data['idceller']);
		$this->db->update('celler', $data);
	}

	public function delete($data)
	{
		$this->db->where('idceller', $data['idceller']);
		$this->db->delete('celler', $data);
	}
}
