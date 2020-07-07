<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Koordinator Home Model
 * Created by Lut Dinar Fadila 2018
 */
class KoordinatorHomeModel extends CI_Model
{
	
	function getInfoBySessionId($id)
	{
		$this->db->select('nama_lengkap, nama_foto');
		$this->db->where('user_id', $id);

		return $this->db->get('tb_anggota')->result();
	}
}
