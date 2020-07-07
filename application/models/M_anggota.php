<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{

    function getAllAnggota()
    {
        return $this->db->get('tb_anggota')->result();
    }

    function getAllRole()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('tb_user_role')->result();
    }

    function findAnggota($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_anggota', 'DESC');

        // $this->db->join('tb_user', 'tb_anggota.user_id = tb_user.id_user');
        $this->db->where($where);
        $this->db->order_by('id_anggota', 'DESC');

        return $this->db->get('tb_anggota')->result();
    }

    function findCalonAnggota($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_anggota', 'DESC');
        $this->db->where($where);
        $this->db->order_by('id_anggota', 'DESC');

        return $this->db->get('tb_anggota')->result();
    }

    function findAnggotaAndUser($where)
    {
        $this->db->where($where);
        $this->db->join('tb_user', 'tb_anggota.user_id = tb_user.id_user');

        return $this->db->get('tb_anggota')->result();
    }

    function findAnggotaLikeNama($where, $nama)
    {
        $this->db->join('tb_user', 'tb_anggota.user_id = tb_user.id_user');
        $this->db->where($where);
        $this->db->like('nama_lengkap', $nama, 'both');
        $this->db->order_by('id_anggota', 'DESC');

        return $this->db->get('tb_anggota')->result();
    }

    function findAnggotaForKoor($where)
    {
        $this->db->select('*');
        $this->db->join('tb_user', 'tb_anggota.user_id = tb_user.id_user');
        $this->db->where($where);
        // $this->db->like('nama_lengkap', $nama, 'both');
        $this->db->order_by('id_anggota', 'DESC');

        return $this->db->get('tb_anggota')->result();
    }

    function insertNewAnggota($anggota)
    {
        $this->db->insert('tb_anggota', $anggota);
    }

    function updateAnggota($anggota, $id)
    {
        $this->db->where('id_anggota', $id);
        return $this->db->update('tb_anggota', $anggota);
    }

    function deleteAnggota($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('tb_anggota');
    }

    function deletePemulihan($id)
    {
        $this->db->where('id_pemulihan', $id);
        $this->db->delete('tb_pemulihan');
    }

    function getAllPemulihanAnggota()
    {
        return $this->db->get('tb_pemulihan')->result();
    }

    function findPemulihan($where)
    {
        $query = "SELECT * FROM `tb_pemulihan` WHERE tb_pemulihan.id_pemulihan = $where";
        return $this->db->query($query)->result();
    }

    function findIdUserPemulihan($user)
    {
        $this->db->select('id_user');
        $this->db->where('id_pemulihan', $user);

        return $this->db->get('tb_pemulihan')->result();
    }

    function updatePemulihan($statusPemuliahn, $id)
    {
        $this->db->where('id_pemulihan', $id);
        $this->db->update('tb_pemulihan', $statusPemuliahn);
    }

    function findAnggotaByRole($where)
    {
        $query = "SELECT * FROM `tb_anggota` JOIN `tb_user` ON `tb_anggota`.`user_id` = `tb_user`.`id_user` WHERE `tb_anggota`.`nama_lengkap` != 'root' AND `tb_anggota`.`status_anggota` != '0' AND `tb_user`.`role` = '3' AND `tb_anggota`.`user_id` != '$where'  ORDER BY `id_anggota` DESC";

        return $this->db->query($query)->result();
    }

    function findAnggotaLikeNamaByRole($nama, $where)
    {
        $query = "SELECT * FROM `tb_anggota` JOIN `tb_user` ON `tb_anggota`.`user_id` = `tb_user`.`id_user` WHERE `tb_anggota`.`nama_lengkap` LIKE '%$nama%' AND `tb_anggota`.`status_anggota` != '0' AND `tb_user`.`role` = '3' AND `tb_anggota`.`user_id` != '$where' ORDER BY `id_anggota` DESC";

        return $this->db->query($query)->result();
    }

    function findAnggotaByRoleAlumni($where)
    {
        $query = "SELECT * FROM `tb_anggota` JOIN `tb_user` ON `tb_anggota`.`user_id` = `tb_user`.`id_user` WHERE `tb_anggota`.`nama_lengkap` != 'root' AND `tb_anggota`.`status_anggota` != '0' AND `tb_user`.`role` = '4' AND `tb_anggota`.`user_id` != '$where' ORDER BY `id_anggota` DESC";

        return $this->db->query($query)->result();
    }

    function findAnggotaLikeNamaByRoleAlumni($nama, $where)
    {
        $query = "SELECT * FROM `tb_anggota` JOIN `tb_user` ON `tb_anggota`.`user_id` = `tb_user`.`id_user` WHERE `tb_anggota`.`nama_lengkap` LIKE '%$nama%' AND `tb_anggota`.`status_anggota` != '0' AND `tb_user`.`role` = '4' AND `tb_anggota`.`user_id` != '$where' ORDER BY `id_anggota` DESC";

        return $this->db->query($query)->result();
    }
}
