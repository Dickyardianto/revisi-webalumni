<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
    public function getAllBerita()
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    public function getAllBeritaForSpecificUser($where, $user_id)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where($where);
        $this->db->where('tb_berita.id_penulis = ' . $user_id);
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    public function getBerita($limit, $start)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where('tb_berita.stat_berita != 0');
        $this->db->limit($limit, $start);
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    public function getBeritaSize()
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where('tb_berita.stat_berita != 0');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return sizeof($this->db->get()->result());
    }

    public function getBeritaSizeLikeJudul($judul)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where('tb_berita.stat_berita != 0');
        $this->db->like('tb_berita.judul_berita', $judul, 'both');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return sizeof($this->db->get()->result());
    }

    public function getBeritaSizeLikeKategori($id)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where('tb_berita.stat_berita != 0');
        $this->db->like('tb_berita.id_kategori', $id, 'both');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return sizeof($this->db->get()->result());
    }

    function findBerita($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_berita', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_berita')->result();
    }

    function findBeritaLikeJudul($where, $judul)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where($where);
        $this->db->like('judul_berita', $judul, 'both');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    function findBeritaLikeJudulForSpecificUser($where, $judul, $user_id)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where($where);
        $this->db->where('tb_berita.id_penulis = ' . $user_id);
        $this->db->like('judul_berita', $judul, 'both');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    function findBeritaLikeJudulFrontend($where, $judul, $limit, $start)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $this->db->like('judul_berita', $judul, 'both');
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    function findBeritaLikeId($id)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->like('tb_berita.id_berita', $id);

        return $this->db->get()->result();
    }

    function findBeritaLikeKategori($id, $limit, $start)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->like('tb_kategori_berita.id', $id);
        $this->db->limit($limit, $start);
        $this->db->order_by('tb_berita.date_created', 'DESC');
        $this->db->order_by('tb_berita.time_created', 'DESC');

        return $this->db->get()->result();
    }

    function insertNewBerita($berita)
    {
        $this->db->insert('tb_berita', $berita);
    }

    function updateBerita($berita, $id)
    {
        $this->db->where('id_berita', $id);
        $this->db->update('tb_berita', $berita);
    }

    function deleteBerita($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('tb_berita');
    }

    function resetKategoriBerita($id)
    {
        $data['id_kategori'] = 1;

        $this->db->where('id_kategori', $id);
        $this->db->update('tb_berita', $data);
    }
}
