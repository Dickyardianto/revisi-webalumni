<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Anggota Data Model
 * Created by Lut Dinar Fadila 2018
 */

class AnggotaDataModel extends CI_Model
{
    
    function getAllAnggota() {
        $this->db->select('*');
        $this->db->where('nama_lengkap !=', 'admin');

        return $this->db->get('tb_anggota')->result();
    }

}
