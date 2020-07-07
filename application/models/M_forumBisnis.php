<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_forumBisnis extends CI_Model
{

    function getAllForumBisnis()
    {
        $query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
        `tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`stat_forbis` = 1 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        // $this->db->join('tb_jenis_bisnis', 'tb_forum_bisnis.id_jenis_bisnis = tb_jenis_bisnis.id_jenis_bisnis');
        // $this->db->join('tb_anggota', 'tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota');
        return $this->db->query($query)->result();
    }

    function getAllCalonForumBisnis()
    {
        $query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
        `tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`stat_forbis` = 0 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        return $this->db->query($query)->result();
    }

    function getAllForbisById($id)
    {
        $queryForbisById = "SELECT * FROM tb_forum_bisnis JOIN tb_anggota ON tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota WHERE tb_forum_bisnis.pemilik_id = $id AND `tb_forum_bisnis`.`stat_forbis` = 1 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        $forbis = $this->db->query($queryForbisById)->result();

        return $forbis;
    }

    function findForbisFoto($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_forbis', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_forum_bisnis')->result();
    }

    function findForumBisnis($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_forum_bisnis')->result();
    }

    function insertForumBisnis($forumBisnis)
    {
        $this->db->insert('tb_forum_bisnis', $forumBisnis);
    }

    function updateForumBisnis($forumBisnis, $id)
    {
        $this->db->where('id_forbis', $id);
        $this->db->update('tb_forum_bisnis', $forumBisnis);
    }

    function deleteForumBisnis($id)
    {
        $this->db->delete('tb_forum_bisnis', ['id_forbis' => $id]);
    }

    function findForumBisnisLikeNama($nama)
    {
        $query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
		`tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`nama_bisnis_usaha` LIKE '%$nama%'  AND  `tb_forum_bisnis`.`stat_forbis` = 1 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        return $this->db->query($query)->result();
    }

    function cariForumBisnis($id, $namaForbis)
    {
        $queryForbisById = "SELECT * FROM tb_forum_bisnis JOIN tb_anggota ON tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota WHERE tb_forum_bisnis.pemilik_id = $id AND `tb_forum_bisnis`.`stat_forbis` = 1 AND `tb_forum_bisnis`.`nama_bisnis_usaha` LIKE '%$namaForbis%' ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        $forbis = $this->db->query($queryForbisById)->result();

        return $forbis;
    }

    function getAllForbisByIdNonaktif($id)
    {
        $queryForbisById = "SELECT * FROM tb_forum_bisnis JOIN tb_anggota ON tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota WHERE tb_forum_bisnis.pemilik_id = $id AND `tb_forum_bisnis`.`stat_forbis` = 0 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        $forbis = $this->db->query($queryForbisById)->result();

        return $forbis;
    }

    function cariForumBisnisNonAktif($id, $namaForbis)
    {
        $queryForbisById = "SELECT * FROM tb_forum_bisnis JOIN tb_anggota ON tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota WHERE tb_forum_bisnis.pemilik_id = $id AND `tb_forum_bisnis`.`stat_forbis` = 0 AND `tb_forum_bisnis`.`nama_bisnis_usaha` LIKE '%$namaForbis%' ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        $forbis = $this->db->query($queryForbisById)->result();

        return $forbis;
    }

    function getLihatAllForbisById($id)
    {

        $this->db->select('*');
        $this->db->from('tb_forum_bisnis');
        $this->db->join('tb_anggota', 'tb_forum_bisnis.pemilik_id=tb_anggota.id_anggota');
        $this->db->like('tb_forum_bisnis.id_forbis', $id);
        $this->db->where('tb_forum_bisnis.stat_forbis', 1);

        return $this->db->get()->result();

        // $queryForbisById = "SELECT * FROM tb_forum_bisnis JOIN tb_anggota ON tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota WHERE tb_forum_bisnis.pemilik_id = $id AND `tb_forum_bisnis`.`stat_forbis` = 1 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        // return $this->db->query($queryForbisById)->result();
    }

    function getAllForumBisnisByJenis($id)
    {
        $query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
        `tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`stat_forbis` = 1 AND `tb_jenis_bisnis`.`id_jenis_bisnis` = $id ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        // $this->db->join('tb_jenis_bisnis', 'tb_forum_bisnis.id_jenis_bisnis = tb_jenis_bisnis.id_jenis_bisnis');
        // $this->db->join('tb_anggota', 'tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota');
        return $this->db->query($query)->result();
    }

    function getAllForumBisnisNotById($id)
    {
        $query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
        `tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`stat_forbis` = 1 AND `tb_forum_bisnis`.`id_forbis` != '$id' ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        return $this->db->query($query)->result();
    }
}
