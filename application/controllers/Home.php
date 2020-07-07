<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Home Front Page
 * Created by Lut Dinar Fadila 2018
*/

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('KoordinatorAnggotaModel');
        $this->load->model('M_anggota');
    }

    function index()
    {
        $data['title'] = 'Beranda IKASMA3BDG';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        $this->frontend_render('frontend/home', $data);
    }

    function cariAnggota()
    {
        $data['title'] = 'Cari Teman';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        $data['dataAnggota'] = $this->FrontPageModel->getAllAnggota();
        // $data['dataAnggota'] = $this->M_anggota->findAnggotaLikeNamaForFrontEnd($nama);
        $this->frontend_render('frontend/cariTeman', $data);
        // $this->load->view('frontend/cariTeman', $data);
    }

    function cariTeman()
    {
        $data['title'] = 'Cari Teman';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $nama = $this->input->post('namaAnggota');

        $data['dataAnggota'] = $this->FrontPageModel->findAnggotaForFrontEnd($nama);
        $this->frontend_render('frontend/cariTeman', $data);
        // $this->load->view('frontend/cariTeman', $data);
    }

    function cariAlumni()
    {
        $data['title'] = 'Cari Alumni';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['dataAnggota'] = $this->FrontPageModel->findAlumniForFrontEnd();
        $this->frontend_render('frontend/cariAlumni', $data);
    }

    function cariAlumniIka()
    {
        $data['title'] = 'Cari Alumni';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $nama = $this->input->post('namaAnggota');

        $data['dataAnggota'] = $this->FrontPageModel->findAlumniForFrontEndByNama($nama);
        $this->frontend_render('frontend/cariAlumni', $data);
    }

    function forumBisnisAnggota()
    {
        $data['title'] = 'Forum Bisnis IKASMA3BDG';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['forumBisnis'] = $this->FrontPageModel->getAllForumBisnis();

        $this->load->view('frontend/forumBisnis', $data);
    }

    function cariForumBisnis()
    {
        $data['title'] = 'Forum Bisnis IKASMA3BDG';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $nama = $this->input->post('namaForbis');

        $data['forumBisnis'] = $this->FrontPageModel->findForumBisnisLikeNama($nama);

        $this->load->view('frontend/forumBisnis', $data);
    }

    public function getForbisById()
    {
        $id = $this->input->post('id');
        $data['forbis'] = $this->FrontPageModel->findForumBisnis(array('tb_forum_bisnis.id_forbis = ' => $id));

        echo json_encode($data);
    }
}
