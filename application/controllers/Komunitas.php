<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_komunitas');
        $this->load->model('M_anggota');
    }

    function index()
    {
        $data['title'] = 'Komunitas';
        $data['komunitas'] = $this->M_komunitas->getAllActiveKomunitas();

        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $this->frontend_render('frontend/komunitas/index', $data);
    }

    function detailKomunitas($id)
    {
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeId($id);
        $data['title'] = 'Detail Komunitas';
        // $data['komunitas'] = $this->M_komunitas->getAllKomunitas();
        // $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        // $data['daftarBerita'] = $this->M_berita->getBerita(5, 0);
        // $data['daftarKategori'] = $this->M_kategori->getAllKategori();

        $this->frontend_render('frontend/komunitas/detailKomunitas', $data);
    }

    function cariKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas != 0";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($nama == "") {
            redirect('komunitas');
        }

        $this->frontend_render('frontend/komunitas/index', $data);
    }
}
