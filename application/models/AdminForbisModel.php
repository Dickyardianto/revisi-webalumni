<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Admin Forum Bisnis Model
 * Created by Lut Dinar Fadila 2018
*/

class AdminForbisModel extends CI_Model
{
    public function getJenisBisnis()
    {
        return $this->db->get('tb_jenis_bisnis')->result();
    }

    public function getAllForbis()
    {
        $this->db->select('id_forbis, nama_bisnis_usaha, nama_jenis_bisnis, tb_forum_bisnis.alamat, no_telp_bisnis, nama_lengkap, angkatan');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_forum_bisnis.pemilik_id');
        $this->db->join('tb_jenis_bisnis', 'tb_jenis_bisnis.id_jenis_bisnis = tb_forum_bisnis.id_jenis_bisnis');
        
        return $this->db->get('tb_forum_bisnis')->result();
    }

    public function getPemilikForbis()
    {
        $this->db->select('id_anggota, nama_lengkap');
        $this->db->where('support', '1');

        return $this->db->get('tb_anggota')->result();
    }

    public function saveTambahForbis($data)
    {
        $this->db->insert('tb_forum_bisnis', $data);
    }

    public function saveUpdateForbis($data, $id)
    {
        $this->db->where('id_forbis', $id);
        $this->db->update('tb_forum_bisnis', $data);
    }

    public function deleteForbis()
    {
        
    }

    public function saveTambahJenis($data)
    {
        $this->db->insert('tb_jenis_bisnis', $data);
    }

    public function saveUpdateJenis($id, $nama)
    {
        $this->db->set('nama_jenis_bisnis', $nama);
        $this->db->where('id_jenis_bisnis', $id);
        $this->db->update('tb_jenis_bisnis');
    }

    public function getDataForbisById($id)
    {
        $this->db->select('id_forbis, nama_bisnis_usaha, tb_forum_bisnis.id_jenis_bisnis, nama_jenis_bisnis, nama_lengkap, deskripsi_bisnis, tb_forum_bisnis.alamat, no_telp_bisnis, pemilik_id');
        $this->db->where('id_forbis', $id);
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_forum_bisnis.pemilik_id');
        $this->db->join('tb_jenis_bisnis', 'tb_jenis_bisnis.id_jenis_bisnis = tb_forum_bisnis.id_jenis_bisnis');

        return $this->db->get('tb_forum_bisnis')->result();
    }

    public function getDataJenisBisnisById($id)
    {
        $this->db->select('*');
        $this->db->where('id_jenis_bisnis', $id);

        return $this->db->get('tb_jenis_bisnis')->result();
    }
}