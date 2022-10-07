<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_aset extends CI_Model
{

	public function get_all_data()
	{
		$this->db->from('aset');
		$this->db->order_by('idaset', 'asc');
		return $this->db->get()->result();
	}

	public function get($id)
	{
		$this->db->from('aset');
		$this->db->where('idaset', $id);
		return $this->db->get()->row();
	}

	public function getrusak()
	{
		$this->db->from('aset');
		$this->db->where('rusak >=', '1');
		return $this->db->get()->result();
	}

	public function getaset()
	{
		$this->db->from('aset');
		$this->db->where('bagus >=', '1');
		return $this->db->get()->result();
	}

	public function insert($data)
	{
		$this->db->insert('aset', $data);
	}

	public function update($data)
	{
		$this->db->where('idaset', $data['idaset']);
		$this->db->update('aset', $data);
	}

	public function updaterusak($data)
	{
		$this->db->where('idaset', $data['idaset']);
		$this->db->update('aset', $data);
	}
	
	public function updatejml($id, $jml)
	{
		$this->db->where('idaset', $id);
		$this->db->set('bagus', $jml);
		$this->db->update('aset');
	}

	public function updatest($id)
	{
		$this->db->where('idpeminjaman', $id);
		$this->db->set('status', '0');
		$this->db->update('peminjaman');
	}

	public function delete($data)
	{
		$this->db->where('idaset', $data['idaset']);
		$this->db->delete('aset', $data);
	}
}
