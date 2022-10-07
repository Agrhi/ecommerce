<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pinjam extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('aset', 'aset.idaset = peminjaman.idaset', 'left');
		$this->db->order_by('idpeminjaman', 'asc');
		return $this->db->get()->result();
	}
	
	public function getbulan($bln)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('aset', 'aset.idaset = peminjaman.idaset', 'left');
		$this->db->like('tglpinjam', $bln);
		return $this->db->get()->result();
	}

	public function get($id)
	{
		$this->db->from('peminjaman');
		$this->db->where('idpeminjaman', $id);
		return $this->db->get()->row();
	}

	public function get_detail($idpeminjaman)
	{
		$this->db->from('peminjaman');
		$this->db->where('idpeminjaman', $idpeminjaman);
		return $this->db->get()->row();
	}

	public function get_data($idpeminjaman)
	{
		$this->db->from('peminjaman');
		$this->db->where('idpeminjaman', $idpeminjaman);
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('peminjaman', $data);
	}

	public function edit($data)
	{
		$this->db->where('idpeminjaman', $data['idpeminjaman']);
		$this->db->update('peminjaman', $data);
	}

	public function delete($data)
	{
		$this->db->where('idpeminjaman', $data['idpeminjaman']);
		$this->db->delete('peminjaman', $data);
	}
}
