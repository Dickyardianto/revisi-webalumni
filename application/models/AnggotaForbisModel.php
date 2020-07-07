<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Anggota Forum Bisnis Model
 * Created by Lut Dinar Fadila 2018
 */

class AnggotaForbisModel extends CI_Model
{

    function getInfoForbisById()
    {
        $this->db->select('id_forbis, nama_bisnis_usaha, nama_jenis_bisnis, deskripsi_bisnis, tb_forum_bisnis.alamat, nama_foto_bisnis, no_telp_bisnis, nama_lengkap');
        $this->db->where('pemilik_id', $this->session->userdata('aid'));
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_forum_bisnis.pemilik_id');
        $this->db->join('tb_jenis_bisnis', 'tb_jenis_bisnis.id_jenis_bisnis = tb_forum_bisnis.id_jenis_bisnis');

        return $this->db->get('tb_forum_bisnis')->result();

    }

    public function getAllJenisBisnis()
    {
        return $this->db->get('tb_jenis_bisnis')->result();
    }

    public function getDataForbisById($id)
    {
        $this->db->select('id_forbis, nama_bisnis_usaha, tb_forum_bisnis.id_jenis_bisnis, nama_jenis_bisnis, deskripsi_bisnis, tb_forum_bisnis.alamat, nama_foto_bisnis, no_telp_bisnis, nama_lengkap');
        $this->db->where('pemilik_id', $this->session->userdata('aid'));
        $this->db->where('id_forbis', $id);
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_forum_bisnis.pemilik_id');
        $this->db->join('tb_jenis_bisnis', 'tb_jenis_bisnis.id_jenis_bisnis = tb_forum_bisnis.id_jenis_bisnis');

        return $this->db->get('tb_forum_bisnis')->result();
    }

    public function saveForbisAnggota($data)
    {
        $this->db->insert('tb_forum_bisnis', $data);
    }

    public function saveUpdateForbis($data, $id)
    {
        $this->db->update('tb_forum_bisnis', $data);
        $this->db->where('id_forbis', $id);
    }

}