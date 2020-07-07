<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jenisBisnis extends CI_Model
{

    function getAllJenisBisnis()
    {
        return $this->db->get('tb_jenis_bisnis')->result();
    }

    function findJenisBisnis($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_jenis_bisnis')->result();
    }

    function insertJenisBisnis($jenisBisnis)
    {
        $this->db->insert('tb_jenis_bisnis', $jenisBisnis);
    }

    function updateJenisBisnis($jenisBisnis, $id)
    {
        $this->db->set('nama_jenis_bisnis', $jenisBisnis);
        $this->db->where('id_jenis_bisnis', $id);
        $this->db->update('tb_jenis_bisnis');
    }

    function deleteJenisBisnis($id)
    {
        $this->db->delete('tb_jenis_bisnis', ['id_jenis_bisnis' => $id]);
    }

    function findJenisBisnisNew($where)
    {
        $this->db->like('id_jenis_bisnis', $where);
        return $this->db->get('tb_jenis_bisnis')->result();
    }
}
