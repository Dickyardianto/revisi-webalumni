<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    
    function getAllUser()
    {
        return $this->db->get('tb_user')->result();
    }

    function findUser($where)
    {
        $this->db->where($where);

        return $this->db->get('tb_user')->result();
    }

    function insertUser($user)
    {
        $this->db->insert('tb_user', $user);

        return $this->db->insert_id();
    }

    function updateUser($user, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $user);
    }

    function deleteUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
    }

}

