<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{


	public function total_user()
	{
		return $this->db->get('user')->num_rows();
	}

	public function pembeli($celler)
	{
		if ($celler == '') {
		} else {
			$this->db->where('idceller', $celler);
		}
		return $this->db->get('pembeli')->num_rows();
	}

	public function penjual($celler)
	{
		if ($celler == '') {
		} else {
			$this->db->where('idceller', $celler);
		}
		return $this->db->get('jualan')->num_rows();
	}

	public function celler()
	{
		return $this->db->get('celler')->num_rows();
	}
}
