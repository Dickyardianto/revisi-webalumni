<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Adhy Wiranto Sudjana - 173040038
*/

class Berita extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_berita');
        $this->load->model('M_kategori');

        $this->load->library('pagination');
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
        $data['title'] = 'Berita';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['start'] = $this->uri->segment(3);

        $config['base_url'] = base_url('berita/index');
        $config['total_rows'] = $this->M_berita->getBeritaSize();
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        // $config['attributes'] = array('class' => 'btn btn-default');

        $this->pagination->initialize($config);

        $data['daftarBerita'] = $this->M_berita->getBerita($config['per_page'], $data['start']);
        $data['daftarKategori'] = $this->M_kategori->getAllKategori();

        $this->frontend_render('frontend/berita/index', $data);
    }

    function baca($id)
    {
        $data['berita'] = $this->M_berita->findBeritaLikeId($id);
        $data['title'] = $data['berita'][0]->judul_berita;
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        $data['daftarBerita'] = $this->M_berita->getBerita(5, 0);
        $data['daftarKategori'] = $this->M_kategori->getAllKategori();

        $this->frontend_render('frontend/berita/bacaBerita', $data);
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    function cariBerita()
    {
        $data['title'] = 'Berita';

        $judul = $this->input->post('judulBerita');

        $where = "tb_berita.stat_berita != 0";
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['start'] = $this->uri->segment(4);

        $config['base_url'] = base_url('berita/cariBerita');
        $config['total_rows'] = $this->M_berita->getBeritaSizeLikeJudul($judul);
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['daftarBerita'] = $this->M_berita->findBeritaLikeJudulFrontend($where, $judul, $config['per_page'], $data['start']);
        $data['daftarKategori'] = $this->M_kategori->getAllKategori();

        if ($judul == "") {
            redirect('berita');
        }

        $this->frontend_render('frontend/berita/index', $data);
    }

    function kategori($id)
    {
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['start'] = $this->uri->segment(4);

        $config['base_url'] = base_url('berita/kategori/') . $id;
        $config['total_rows'] = $this->M_berita->getBeritaSizeLikeKategori($id);
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        // $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['daftarBerita'] = $this->M_berita->findBeritaLikeKategori($id, $config['per_page'], $data['start']);
        $data['daftarKategori'] = $this->M_kategori->getAllKategori();

        // var_dump($data['daftarBerita']);
        // die;

        if (!$data['daftarBerita']) {
            flashMessage('error', 'Berita kosong');
            redirect('berita');
        } else {
            $data['title'] = $data['daftarBerita'][0]->kategori;
            $data['kategori'] = '<h2 class="text-info"><b>#' . $data['title'] . '</b></h2>';

            $this->frontend_render('frontend/berita/index', $data);
        }
    }
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    //
    //
    //
}
