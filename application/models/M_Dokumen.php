<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Admin Dokumen Model
 * Created by Dicky Ardianto
*/

class M_Dokumen extends CI_Model
{
    public function getAllDokumen()
    {
        return $this->db->get('tb_dokumen')->result();
    }

    function insertNewDokumen($dokumen)
    {
        $this->db->insert('tb_dokumen', $dokumen);
    }

    function findDokumen($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_dokumen')->result();
    }

    function updateDokumen($dokumen, $id)
    {
        $this->db->where('id_dokumen', $id);
        return $this->db->update('tb_dokumen', $dokumen);
    }

    function findDokumenForDeleteFile($select, $where)
    {
        $this->db->select($select);
        $this->db->where($where);
        return $this->db->get('tb_dokumen')->result();
    }

    function findSelectDocument($select, $where)
    {
        $this->db->select($select);
        $this->db->where($where);
        return $this->db->get('tb_dokumen')->result();
    }

    function hapusDokumen($id)
    {
        $this->db->where('id_dokumen', $id);
        $this->db->delete('tb_dokumen');
    }
}
