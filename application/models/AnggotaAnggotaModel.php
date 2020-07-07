<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Anggota Anggota Model
 * Created by 
 *      Adhy Wiranto Sudjana
 *      Dicky Ardianto
 *      Rafly Yunandi Aliansyah
 * Architecture by 
 *      Lut Dinar Fadila
 * 
 * 2020
*/

class AnggotaAnggotaModel extends CI_Model
{

    public function saveAnggotaBaru($data)
    {
        $this->db->insert('tb_anggota', $data);
    }

    public function getCalonAnggota()
    {
        $this->db->select('id_anggota, nama_lengkap, angkatan, no_telp, email, nama_foto');
        $this->db->where('status_anggota', '0');
        $this->db->order_by('id_anggota', 'DESC');

        return $this->db->get('tb_anggota')->result();
    }

    function saveGambar($data)
    {
        $this->db->insert('tb_foto', $data);
    }

    function getCalonAnggotaById($id)
    {
        $this->db->select('id_anggota, nama_lengkap, nama_panggilan_alias, NIK, email, angkatan, status_anggota, no_telp');
        $this->db->where('id_anggota', $id);

        return $this->db->get('tb_anggota')->result();
    }

    function setAktifCalonAnggota($user)
    {
        $this->db->insert('tb_user', $user);

        return $this->db->insert_id();
    }

    function setUserForAnggotaNew($anggotaId, $userId)
    {
        $this->db->set('status_anggota', '1');
        $this->db->set('user_id', $userId);
        $this->db->where('id_anggota', $anggotaId);
        $this->db->update('tb_anggota');
    }

    function setTolakCalonAnggota($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('tb_anggota');
    }

    function getAllAnggota()
    {
        //        $this->db->select('id_anggota, nama_lengkap, jabatan, no_telp, email, alamat, nama_foto, status_bekerja');
        $this->db->where('status_anggota', '1');
        $this->db->where('nama_lengkap !=', 'admin');
        $this->db->join('tb_user', 'tb_user.id_user = tb_anggota.user_id');
        $this->db->order_by('nama_lengkap', 'ASC');

        return $this->db->get('tb_anggota')->result();
    }

    function getAnggotaByName($nama)
    {
        $this->db->select('id_anggota, nama_lengkap, jabatan, no_telp, email, alamat, nama_foto, status_anggota');
        $this->db->where('status_anggota', '1');
        $this->db->like('nama_lengkap', $nama, 'both');
        $this->db->join('tb_user', 'tb_user.id_anggota_fk = tb_anggota.id_anggota');

        $query = $this->db->get('tb_anggota')->result();

        $error = "Data tidak ditemukan";

        foreach ($query as $row) {
            return $row;
        }

        return $error;
    }

    function getAllDataMaster()
    {
        $this->db->select('id_anggota, nama_lengkap, nama_panggilan_alias, NIK, angkatan, jenis_kelamin, tempat_lahir, tanggal_lahir, golongan_darah, no_telp, no_telp_alternatif, email, nama_foto, negara, provinsi, kabupaten_kota, alamat, pendidikan_terakhir, status_bekerja, bidang_industri, jabatan, nama_perusahaan, bisnis_usaha, sosial_pendidikan, sosial_kemanusiaan, pengembangan_sarana_prasarana, silaturahim_kebersamaan, penawaran_sponsorship_donasi, support, loyalist, iuran_sukarela');
        $this->db->where('nama_lengkap !=', 'admin');
        $this->db->order_by('id_anggota', 'DESC');

        return $this->db->get('tb_anggota')->result();
    }

    function getDataAnggotaById($id)
    {
        $this->db->select('id_anggota, nama_lengkap, nama_panggilan_alias, jenis_kelamin, NIK, angkatan, tempat_lahir, tanggal_lahir, golongan_darah, no_telp, no_telp_alternatif, email, nama_foto, negara, provinsi, kabupaten_kota, alamat, pendidikan_terakhir, status_bekerja, bidang_industri, jabatan, nama_perusahaan, bisnis_usaha, sosial_pendidikan, sosial_kemanusiaan, pengembangan_sarana_prasarana, silaturahim_kebersamaan, penawaran_sponsorship_donasi, support, loyalist, iuran_sukarela, id_user, username, role');
        $this->db->where('id_anggota', $id);
        $this->db->join('tb_user', 'tb_user.id_user = tb_anggota.user_id');

        return $this->db->get('tb_anggota')->result();
    }

    function updateAnggota($anggota, $user, $idAnggota, $idUser)
    {
        $this->db->where('id_anggota', $idAnggota);
        $this->db->update('tb_anggota', $anggota);

        $this->db->where('id_user', $idUser);
        $this->db->update('tb_user', $user);
    }

    function deleteAnggotaById($id, $idUser)
    {
        $this->db->where('id_user', $idUser);
        $this->db->delete('tb_user');

        $this->db->where('id_anggota', $id);
        $this->db->delete('tb_anggota');
    }
}
