<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Profile Koordinator Model 
 * Created by Lut Dinar Fadila 2018
*/

class KoordinatorProfileModel extends CI_Model {
    
    function getInfoBySessionId($id) {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        
        return $this->db->get('tb_anggota')->result();
    }
    
    function getDataDiriById($id)
	{
		$this->db->select('id_anggota, nama_lengkap, jenis_kelamin, nama_panggilan_alias, tempat_lahir, tanggal_lahir, angkatan, golongan_darah, no_telp, no_telp_alternatif, NIK, email');
        $this->db->where('id_anggota', $id);
        
        return $this->db->get('tb_anggota')->result();
	}

	function getDomisiliById($id)
	{
		$this->db->select('id_anggota, negara, provinsi, kabupaten_kota, alamat');
        $this->db->where('id_anggota', $id);

        return $this->db->get('tb_anggota')->result();
	}

	function getProfesiById($id)
    {
        $this->db->select('id_anggota, pendidikan_terakhir, status_bekerja, bidang_industri, jabatan, nama_perusahaan, bisnis_usaha');
        $this->db->where('id_anggota', $id);

        return $this->db->get('tb_anggota')->result();
    }
    
    function saveUpdateDataDiri($idAnggota, $anggota) {
        $this->db->where('id_anggota', $idAnggota);
        $this->db->update('tb_anggota', $anggota);
    }

    function saveUpdateDomisili($data, $id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->update('tb_anggota', $data);
    }

    function saveUpdateProfesi($data, $id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->update('tb_anggota', $data);
    }
    
}