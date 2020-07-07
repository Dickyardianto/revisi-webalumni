<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

class ForumBisnis extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_user');
        $this->load->model('M_forumBisnis');
        $this->load->model('M_jenisBisnis');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        }
    }

    function index()
    {
        $data['title'] = 'Kelola Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $id_pemilik = $data['info'];

        $id = $id_pemilik[0]->id_anggota;

        $data['forumBisnis'] = $this->M_forumBisnis->getAllForbisById($id);

        $this->alumni_render('alumni/forumBisnis', $data);
    }

    function tambahCalonForbis()
    {
        $data['title'] = 'Tambah Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();

        $this->alumni_render('alumni/tambahCalonForbis', $data);
    }

    public function setAddForbis()
    {
        $namaBisnisUsaha = $this->input->post('namaBisnisUsahaModal');
        $jenisBisnisUsaha = $this->input->post('jenisBisnisUsahaModal');
        $deskripsiBisnis = $this->input->post('deskripsiBisnisUsahaModal');
        $alamatBisnis = $this->input->post('alamatBisnisUsahaModal');
        $noTelpBisnis = $this->input->post('noTelpBisnisUsahaModal');
        $pemilikBisnis = $this->input->post('pemilikBisnisUsahaModal');

        $filename = "logo-" . $namaBisnisUsaha . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/logo-bisnis';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileLogo')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('alumni/ForumBisnis');
        } else {
            $upload_data = $this->upload->data();

            $data['nama_bisnis_usaha'] = $namaBisnisUsaha;
            $data['id_jenis_bisnis'] = $jenisBisnisUsaha;
            $data['deskripsi_bisnis'] = $deskripsiBisnis;
            $data['alamat_bisnis'] = $alamatBisnis;
            $data['no_telp_bisnis'] = $noTelpBisnis;
            $data['nama_foto_bisnis'] = $upload_data['file_name'];
            $data['pemilik_id'] = $pemilikBisnis;
            $data['stat_forbis'] = 0;


            // echo json_encode($data);
            // $sukses = $this->M_anggota->insertNewAnggota($data);

            $sukses = $this->M_forumBisnis->insertForumBisnis($data);

            if (!$sukses) {
                flashMessage('success', 'Bisnis / Usaha Anggota berhasil ditambahkan tunggu konfirmasi selanjutnya untuk ditampilkan');
                redirect('alumni/ForumBisnis/tambahCalonForbis');
            } else {
                flashMessage('error', 'Bisnis / Usaha Anggota gagal ditambahkan! Silahkan coba lagi.');
                redirect('alumni/ForumBisnis/tambahCalonForbis');
            }
        }
    }

    public function setUpdateForbis()
    {
        $id = $this->input->post('idForbisEdit');
        $namaBisnisEdit = $this->input->post('namaBisnisEdit');
        $jenisBisnisEdit = $this->input->post('jenisBisnisEdit');
        $deskripsiBisnisEdit = $this->input->post('deskripsiBisnisEdit');
        $alamatBisnisEdit = $this->input->post('alamatBisnisEdit');
        $noTelpBisnisEdit = $this->input->post('noTelpBisnisEdit');
        $pemilikBisnisEdit = $this->input->post('pemilikBisnisEdit');

        $data['nama_bisnis_usaha'] = $namaBisnisEdit;
        $data['id_jenis_bisnis'] = $jenisBisnisEdit;
        $data['deskripsi_bisnis'] = $deskripsiBisnisEdit;
        $data['alamat_bisnis'] = $alamatBisnisEdit;
        $data['no_telp_bisnis'] = $noTelpBisnisEdit;
        $data['pemilik_id'] = $pemilikBisnisEdit;
        $data['stat_forbis'] = 1;

        $sukses = $this->M_forumBisnis->updateForumBisnis($data, $id);

        if (!$sukses) {
            flashMessage('success', 'Bisnis / Usaha Anggota berhasil diperbarui.');
            redirect('alumni/ForumBisnis');
        } else {
            flashMessage('error', 'Bisnis / Usaha Anggota gagal diperbarui! Silahkan coba lagi.');
            redirect('alumni/ForumBisnis');
        }
    }

    public function setUpdateFoto()
    {
        $this->load->model('M_forumBisnis');

        $idFoto = $this->input->post('idUbahFoto');
        $judulFoto = $this->input->post('judulUbahFoto');

        $filename = "berita-" . $judulFoto . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/logo-bisnis';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        // load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar Forum Bisnis gagal! Silahkan coba lagi');
            redirect('alumni/ForumBisnis');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_forumBisnis->findForbisFoto('nama_foto_bisnis', array('tb_forum_bisnis.id_forbis = ' => $idFoto));

            $forbis['nama_foto_bisnis'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/logo-bisnis/' . $data[0]->nama_foto_bisnis);

            // echo json_encode($data);
            $sukses = $this->M_forumBisnis->updateForumBisnis($forbis, $idFoto);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('alumni/ForumBisnis');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('alumni/ForumBisnis');
            }
        }
    }

    public function getForbisById()
    {
        $id = $this->input->post('id');

        $data['forbis'] = $this->M_forumBisnis->findForumBisnis(array('tb_forum_bisnis.id_forbis = ' => $id));

        echo json_encode($data);
    }

    public function setDeleteForumBisnis()
    {
        $id = $this->input->post('idForbisDelete');

        $sukses = $this->M_forumBisnis->deleteForumBisnis($id);

        if (!$sukses) {
            flashMessage('success', 'Forum Bisnis berhasil dihapus');
            redirect('alumni/ForumBisnis');
        } else {
            flashMessage('error', 'Forum Bisnis gagal dihapus! Silahkan coba lagi');
            redirect('alumni/ForumBisnis');
        }
    }

    function forumBisnisNonaktif()
    {
        $data['title'] = 'Forum Bisnis Nonaktif';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $id_pemilik = $data['info'];
        $id = $id_pemilik[0]->id_anggota;

        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForbisByIdNonaktif($id);

        if ($this->session->userdata('role') == 4) {
            $this->alumni_render('alumni/forumBisnisNonaktif', $data);
        }
    }

    public function setDeleteForumBisnisNonaktif()
    {
        $id = $this->input->post('idForbisDelete');

        $sukses = $this->M_forumBisnis->deleteForumBisnis($id);

        if (!$sukses) {
            flashMessage('success', 'Forum Bisnis berhasil dihapus');
            redirect('alumni/ForumBisnis/forumBisnisNonaktif');
        } else {
            flashMessage('error', 'Forum Bisnis gagal dihapus! Silahkan coba lagi');
            redirect('alumni/forumBisnisNonaktif');
        }
    }

    public function cariForumBisnisNonAktif()
    {
        $data['title'] = 'Lihat Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $namaForbis = $this->input->post('namaBisnis');
        $id_pemilik = $data['info'];
        $id = $id_pemilik[0]->id_anggota;

        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $data['forumBisnis'] = $this->M_forumBisnis->cariForumBisnisNonAktif($id, $namaForbis);

        if (!$namaForbis) {
            redirect('alumni/forumBisnis/forumBisnisNonaktif');
        }

        $this->alumni_render('alumni/forumBisnisNonaktif', $data);
    }

    public function cariForumBisnis()
    {
        $data['title'] = 'Lihat Forum Bisnis';

        $namaForbis = $this->input->post('namaBisnis');

        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $id_pemilik = $data['info'];
        $id = $id_pemilik[0]->id_anggota;

        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $data['forumBisnis'] = $this->M_forumBisnis->cariForumBisnis($id, $namaForbis);

        if (!$namaForbis) {
            redirect('alumni/forumBisnis');
        }

        $this->alumni_render('alumni/forumBisnis', $data);
    }
}
