<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Login Model
 * Created by Lut Dinar Fadila 2018
*/

class LoginModel extends CI_Model
{

  function cek_user($user, $pass)
  {
    $this->db->select('id_user, username, password, status_akun, role');
    $this->db->where('username', $user);
    $this->db->where('password', $pass);

    return $this->db->get('tb_user')->result();
  }

  function get_id($user)
  {
    $this->db->select('username');
    $this->db->where('username', $user);

    return $this->db->get('tb_pemulihan')->result();
  }

  function cek_akun($user)
  {
    $this->db->select('id_user, username, status_akun');
    $this->db->where('username', $user);

    return $this->db->get('tb_user')->result();
  }

  function saveForgotPasswordAkun($anggota)
  {
    $this->db->insert('tb_pemulihan', $anggota);
  }

  function saveRegisterAnggota($anggota)
  {
    $this->db->insert('tb_anggota', $anggota);
  }

  public function saveBayarAnggota($anggota)
  {
    $this->db->insert('tb_bukti_bayar', $anggota);
  }


  public function getIdAnggota()
  {
    $query = "SELECT * FROM `tb_anggota` ORDER BY id_anggota DESC LIMIT 1";
    return $this->db->query($query)->result();
  }
}