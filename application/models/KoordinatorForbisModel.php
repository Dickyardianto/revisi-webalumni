<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Koordinator Forum Bisnis Model
 * Created by Lut Dinar Fadila 2019
 */
class KoordinatorForbisModel extends CI_model
{
	
	function getInfoBySessionId($id)
	{
		$this->db->select('nama_lengkap');
		$this->db->where('id_anggota', $id);

		return $this->db->get('tb_anggota')->result();
	}

	function getAllForbis()
    {
        $this->db->select('id_forbis, nama_bisnis_usaha, nama_jenis_bisnis, tb_forum_bisnis.alamat, no_telp_bisnis, nama_lengkap, angkatan');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_forum_bisnis.pemilik_id');
        $this->db->join('tb_jenis_bisnis', 'tb_jenis_bisnis.id_jenis_bisnis = tb_forum_bisnis.id_jenis_bisnis');
        
        return $this->db->get('tb_forum_bisnis')->result();
    }

    function getJenisBisnis()
    {
        return $this->db->get('tb_jenis_bisnis')->result();
    }

    function getPemilikForbis()
    {
        $this->db->select('id_anggota, nama_lengkap');
        $this->db->where('support', '1');

        return $this->db->get('tb_anggota')->result();
    }

}