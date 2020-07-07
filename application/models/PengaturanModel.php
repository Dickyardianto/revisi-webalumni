<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Koordinator Pengaturan Model
 * Created by Lut Dinar Fadila 2018
*/

class PengaturanModel extends CI_Model
{
    
    function getInfoBySessionId($id)
    {
        // $this->db->select('id_anggota, nama_lengkap, username, id_user, nama_foto');
        // $this->db->where('user_id', $id);
        // $this->db->join('tb_user', 'tb_user.id_user = tb_anggota.user_id');

        // return $this->db->get('tb_anggota')->result();

        $this->db->where('user_id', $id);
        $this->db->join('tb_user', 'tb_anggota.user_id = tb_user.id_user');

        return $this->db->get('tb_anggota')->result();
    }

    function saveUsername($id, $username)
    {
        $this->db->set('username', $username);
        $this->db->where('id_user', $id);
        $this->db->update('tb_user');
    }

    function savePassword($id, $password)
    {
        $this->db->set('password', md5($password));
        $this->db->where('id_user', $id);
        $this->db->update('tb_user');
    }

    function saveImageProfile($foto, $id) {
        $this->db->set('nama_foto', $foto);
        $this->db->where('id_anggota', $id);
        $this->db->update('tb_anggota');
    }

}
