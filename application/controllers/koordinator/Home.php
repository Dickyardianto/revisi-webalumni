<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Home Koordinator
 * Created by Lut Dinar Fadila 2018
*/

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('KoorHomeModel');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3') {
            redirect('anggota');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '4') {
            redirect('alumni');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '5') {
            redirect('umum');
        }
    }

    public function index()
    {
        $data['title'] = 'Beranda Koordinator';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['jumlah_anggota'] = $this->KoorHomeModel->hitungJumlahAnggota();
        $data['jumlah_anggota_belum_verifikasi'] = $this->KoorHomeModel->hitungJumlahAnggotaBelumVerifikasi();
        $data['jumlah_pendaftar_anggota'] = $this->KoorHomeModel->pendaftarAnggota();
        $data['jumlah_pendaftar_alumni'] = $this->KoorHomeModel->pendaftarAlumni();
        $data['berita'] = $this->KoorHomeModel->beritaTerkini();
        $data['jumlahBeritaNon'] = $this->KoorHomeModel->hitungJumlahBeritaNon();
        $data['komunitas'] = $this->KoorHomeModel->komunitasTerkini();
        $data['jumlahKomunitasNon'] = $this->KoorHomeModel->hitungJumlahKomunitasNon();
        $data['jumlahForbisNon'] = $this->KoorHomeModel->hitungJumlahForbisNon();
        $this->koordinator_render('koordinator/home', $data);
    }
}