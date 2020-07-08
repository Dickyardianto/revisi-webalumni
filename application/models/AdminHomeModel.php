<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Admin Home Model
 * Created by Lut Dinar Fadila 2018
 */
class AdminHomeModel extends CI_Model
{

	function getInfoBySessionId()
	{
		$this->db->select('nama_lengkap, nama_foto');
		$this->db->where('user_id', $this->session->userdata('uid'));

		return $this->db->get('tb_anggota')->result();
	}

	public function hitungJumlahAnggota()
	{
		$query = $this->db->query("SELECT * FROM tb_anggota WHERE status_anggota = 1");
		$total = $query->num_rows();
		return $total;
	}

	public function hitungJumlahAnggotaBelumVerifikasi()
	{
		$query = $this->db->query("SELECT * FROM tb_anggota WHERE status_anggota = 0 AND role_id = 3");
		$total = $query->num_rows();
		return $total;
	}

	public function hitungJumlahAlumniBelumVerifikasi()
	{
		$query = $this->db->query("SELECT * FROM tb_anggota WHERE status_anggota = 0 AND role_id = 4");
		$total = $query->num_rows();
		return $total;
	}

	public function pendaftarAnggota()
	{
		$query = $this->db->query("SELECT * FROM `tb_user` WHERE `role` = 3");
		$total = $query->num_rows();
		return $total;
	}

	public function pendaftarAlumni()
	{
		$query = $this->db->query("SELECT * FROM `tb_user` WHERE `role` = 4");
		$total = $query->num_rows();
		return $total;
	}

	public function beritaTerkini()
	{
		$date = date('Y-m-d');
		$query = "SELECT * FROM `tb_berita` WHERE `date_created` LIKE '$date' AND stat_berita = 1";
		return $this->db->query($query)->result();
	}

	public function hitungJumlahBeritaNon()
	{
		$query = $this->db->query("SELECT * FROM tb_berita WHERE stat_berita = 0");
		$total = $query->num_rows();
		return $total;
	}

	public function komunitasTerkini()
	{
		$date = date('Y-m-d');
		$query = "SELECT * FROM `tb_komunitas` WHERE `date_created` LIKE '$date' AND stat_komunitas = 1";
		return $this->db->query($query)->result();
	}

	public function hitungJumlahKomunitasNon()
	{
		$query = $this->db->query("SELECT * FROM tb_komunitas WHERE stat_komunitas = 0");
		$total = $query->num_rows();
		return $total;
	}

	public function hitungJumlahForbisNon()
	{
		$query = $this->db->query("SELECT * FROM tb_forum_bisnis WHERE stat_forbis = 0");
		$total = $query->num_rows();
		return $total;
	}
}
