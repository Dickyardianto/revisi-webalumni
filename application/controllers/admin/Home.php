<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Anggota Admin
 * Created by 
 *      Adhy Wiranto Sudjana
 *      Dicky Ardianto
 *      Rafly Yunandi Aliansyah
 * Architecture by 
 *      Lut Dinar Fadila
 * 
 * 2020
*/

class Home extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================    
    function __construct()
    {
        parent::__construct();
        $this->load->model('AdminHomeModel');
        $this->load->model('M_berita');


        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 2) {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 3) {
            redirect('anggota');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 4) {
            redirect('alumni');
        }
    }
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    function index()
    {
        $data['title'] = 'Beranda Admin';
        $data['info'] = $this->AdminHomeModel->getInfoBySessionId();
        $data['jumlah_anggota'] = $this->AdminHomeModel->hitungJumlahAnggota();
        $data['jumlah_anggota_belum_verifikasi'] = $this->AdminHomeModel->hitungJumlahAnggotaBelumVerifikasi();
        $data['jumlah_pendaftar_anggota'] = $this->AdminHomeModel->pendaftarAnggota();
        $data['jumlah_pendaftar_alumni'] = $this->AdminHomeModel->pendaftarAlumni();
        $data['berita'] = $this->AdminHomeModel->beritaTerkini();
        $data['jumlahBeritaNon'] = $this->AdminHomeModel->hitungJumlahBeritaNon();
        $data['komunitas'] = $this->AdminHomeModel->komunitasTerkini();
        $data['jumlahKomunitasNon'] = $this->AdminHomeModel->hitungJumlahKomunitasNon();
        $data['jumlahForbisNon'] = $this->AdminHomeModel->hitungJumlahForbisNon();

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/home', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================

}
