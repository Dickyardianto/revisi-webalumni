<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    function getAllKategori()
    {
        return $this->db->get('tb_kategori_berita')->result();
    }

    function findKategori($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_kategori_berita')->result();
    }

    function insertKategori($kategori)
    {
        $this->db->insert('tb_kategori_berita', $kategori);
    }

    function updateKategori($kategori, $id)
    {
        $this->db->set('kategori', $kategori);
        $this->db->where('id', $id);
        $this->db->update('tb_kategori_berita');
    }

    function deleteKategori($id)
    {
        $this->db->delete('tb_kategori_berita', ['id' => $id]);
    }
}
