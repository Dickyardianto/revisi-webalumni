<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NotifRegisterForAnggota extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('M_anggota');
    }

    function index()
    {
        flashMessage('success', '<p>Anda berhasil mendaftar. Silahkan Untuk melakukan proses pembayaran dengan keterangan seperti berikut.</p>');
        $data['title'] = 'Registrasi Calon Anggota IKASMA3BDG';

        $data['id_user'] = $this->LoginModel->getIdAnggota();
        $this->login_render('login/NotifRegisterForAnggota', $data);
    }

    function notif()
    {
        $data['title'] = 'Menu Pembayaran';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));
        $data['id_user'] = $this->LoginModel->getIdAnggota();
        $this->admin_render('admin/anggotaBayar', $data);
    }
}
