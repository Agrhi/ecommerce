<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembeli extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('pembeli');
		$this->db->order_by('idpembeli', 'asc');
		return $this->db->get()->result();
	}

}
