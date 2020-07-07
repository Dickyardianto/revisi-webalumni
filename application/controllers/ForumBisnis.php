<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Dicky Ardianto - 173040046
*/

class ForumBisnis extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_forumBisnis');
        $this->load->model('M_jenisBisnis');
    }

    function index()
    {
        $data['title'] = 'Forum Bisnis';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForumBisnis();
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $this->frontend_render('frontend/forumbisnis/forumBisnis', $data);
    }

    function lihatForbis($id)
    {
        $data['forumBisnis'] = $this->M_forumBisnis->getLihatAllForbisById($id);
        $data['forumBisnisLainnya'] = $this->M_forumBisnis->getAllForumBisnisNotById($id);
        $data['title'] = 'Forum Bisnis';
        // $data['title'] = $data['berita'][0]->judul_berita;
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        $this->frontend_render('frontend/forumbisnis/lihatForbis', $data);
    }

    public function jenisBisnis($id)
    {
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForumBisnisByJenis($id);
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['title'] = 'Forum Bisnis';
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $data['findJenisBisnis'] = $this->M_jenisBisnis->findJenisBisnisNew($id);
        $this->frontend_render('frontend/forumbisnis/jenisBisnis', $data);
    }

    public function cariForumBisnis()
    {
        $data['title'] = 'Forum Bisnis IKASMA3BDG';

        $nama = $this->input->post('namaForbis');
        $data['forumBisnis'] = $this->FrontPageModel->findForumBisnisLikeNama($nama);
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();

        $this->frontend_render('frontend/forumbisnis/forumBisnis', $data);
    }
}
