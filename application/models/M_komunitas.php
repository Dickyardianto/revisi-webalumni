<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_komunitas extends CI_Model
{

    function getAllKomunitas()
    {
        $queryKomunitas = "SELECT tb_komunitas.*, tb_user.username FROM tb_komunitas JOIN tb_user ON tb_komunitas.id_pengupload = tb_user.id_user ORDER BY tb_komunitas.id_komunitas DESC";
        $komunitas = $this->db->query($queryKomunitas)->result();

        return $komunitas;

        // return $this->db->get('tb_komunitas')->result();
    }

    function getAllActiveKomunitas()
    {
        $queryKomunitas = "SELECT tb_komunitas.*, tb_user.username FROM tb_komunitas JOIN tb_user ON tb_komunitas.id_pengupload = tb_user.id_user WHERE tb_komunitas.stat_komunitas = 1 ORDER BY tb_komunitas.id_komunitas DESC";
        $komunitas = $this->db->query($queryKomunitas)->result();

        return $komunitas;

        // return $this->db->get('tb_komunitas')->result();
    }

    public function getAllKomunitasForSpecificUser($where, $user_id)
    {
        $this->db->select('tb_komunitas.*, tb_user.username');
        $this->db->from('tb_komunitas');
        $this->db->join('tb_user', 'tb_komunitas.id_pengupload=tb_user.id_user');
        $this->db->where($where);
        $this->db->where('tb_komunitas.id_pengupload = ' . $user_id);
        $this->db->order_by('tb_komunitas.date_created', 'DESC');
        $this->db->order_by('tb_komunitas.time_created', 'DESC');

        return $this->db->get()->result();
    }

    function findKomunitas($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_komunitas', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_komunitas')->result();
    }

    function findKomunitasLikeNama($where, $nama)
    {
        $this->db->select('tb_komunitas.*, tb_user.username');
        $this->db->from('tb_komunitas');
        $this->db->join('tb_user', 'tb_komunitas.id_pengupload=tb_user.id_user');
        $this->db->where($where);
        $this->db->like('nama_komunitas', $nama, 'both');

        return $this->db->get()->result();
    }

    function findKomunitasLikeNamaForSpecificUser($where, $nama, $userId)
    {
        $this->db->select('tb_komunitas.*, tb_user.username');
        $this->db->from('tb_komunitas');
        $this->db->join('tb_user', 'tb_komunitas.id_pengupload=tb_user.id_user');
        $this->db->where($where);
        $this->db->where("tb_komunitas.id_pengupload = ", $userId);
        $this->db->like('nama_komunitas', $nama, 'both');

        return $this->db->get()->result();
    }

    function insertNewKomunitas($komunitas)
    {
        $this->db->insert('tb_komunitas', $komunitas);
    }

    function updateKomunitas($komunitas, $id)
    {
        $this->db->where('id_komunitas', $id);
        $this->db->update('tb_komunitas', $komunitas);
    }

    function deleteKomunitas($id)
    {
        $this->db->where('id_komunitas', $id);
        $this->db->delete('tb_komunitas');
    }

    function findKomunitasLikeId($id)
    {
        $this->db->select('tb_komunitas.*');
        $this->db->from('tb_komunitas');
        $this->db->where('tb_komunitas.id_komunitas', $id);

        return $this->db->get()->result();
    }
}
