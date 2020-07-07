<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Berita Koordinator
 * Created by 
 *      Adhy Wiranto Sudjana
 *      Dicky Ardianto
 *      Rafly Yunandi Aliansyah
 * Architecture by 
 *      Lut Dinar Fadila
 * 
 * 2020
*/

class ForumBisnis extends MY_Controller
{

    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_forumBisnis');
        $this->load->model('M_jenisBisnis');

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
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================


    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    function index()
    {
        $data['title'] = 'Kelola Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForumBisnis();
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        // $data['pemilikForbis'] = $this->M_anggota->findAnggota('*', array('tb_anggota.support = ' => '1'));

        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );

        $data['pemilikForbis'] = $this->M_anggota->findAnggota('*', $where);

        if ($this->session->userdata('role') == 2) {
            $this->koordinator_render('koordinator/kelolaForumBisnis', $data);
        }
    }

    function kelolaJenisBisnis()
    {
        $data['title'] = 'Kelola Jenis Bisnis';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();

        if ($this->session->userdata('role') == 2) {
            $this->koordinator_render('koordinator/kelolaJenisBisnis', $data);
        }
    }

    function kelolaCalonForBis()
    {
        $data['title'] = 'Kelola Calon Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['kelolaCalonForBis'] = $this->M_forumBisnis->getAllCalonForumBisnis();
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();

        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );

        $data['pemilikForbis'] = $this->M_anggota->findAnggota('*', $where);

        if ($this->session->userdata('role') == 2) {
            $this->koordinator_render('koordinator/kelolaCalonForBis', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================


    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    public function setAddForbis()
    {
        $namaBisnisUsaha = $this->input->post('namaBisnisUsahaModal');
        $jenisBisnisUsaha = $this->input->post('jenisBisnisUsahaModal');
        $deskripsiBisnis = $this->input->post('deskripsiBisnisUsahaModal');
        $alamatBisnis = $this->input->post('alamatBisnisUsahaModal');
        $noTelpBisnis = $this->input->post('noTelpBisnisUsahaModal');
        $urlBisnis = $this->input->post('urlBisnisModal');
        $pemilikBisnis = $this->input->post('pemilikBisnisUsahaModal');

        $filename = "logo-" . $namaBisnisUsaha . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/logo-bisnis';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileLogo')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('koordinator/ForumBisnis');
        } else {
            $upload_data = $this->upload->data();

            $data['nama_bisnis_usaha'] = $namaBisnisUsaha;
            $data['id_jenis_bisnis'] = $jenisBisnisUsaha;
            $data['deskripsi_bisnis'] = $deskripsiBisnis;
            $data['alamat_bisnis'] = $alamatBisnis;
            $data['no_telp_bisnis'] = $noTelpBisnis;
            $data['url_bisnis'] = 'http://' . $urlBisnis;
            $data['nama_foto_bisnis'] = $upload_data['file_name'];
            $data['pemilik_id'] = $pemilikBisnis;
            $data['stat_forbis'] = 1;

            $sukses = $this->M_forumBisnis->insertForumBisnis($data);

            if (!$sukses) {
                flashMessage('success', 'Bisnis / Usaha Anggota berhasil ditambahkan dan akan ditampilkan');
                redirect('koordinator/ForumBisnis/kelolaCalonForBis');
            } else {
                flashMessage('error', 'Bisnis / Usaha Anggota gagal ditambahkan! Silahkan coba lagi.');
                redirect('koordinator/ForumBisnis/kelolaCalonForBis');
            }
        }
    }

    public function setAddJenisBisnis()
    {
        $data['nama_jenis_bisnis'] = $this->input->post('namaJenisBisnisModal');

        $sukses = $this->M_jenisBisnis->insertJenisBisnis($data);

        if (!$sukses) {
            flashMessage('success', 'Tambah jenis bisnis berhasil. Silahkan lihat pada Tambah Forum Bisnis');
            redirect('koordinator/ForumBisnis/kelolaJenisBisnis');
        } else {
            flashMessage('error', 'Tambah jenis bisnis gagal! Silahkan coba lagi.');
            redirect('koordinator/ForumBisnis/kelolaJenisBisnis');
        }
    }

    function aktivasiCalonForBis()
    {
        $this->load->model('M_forumBisnis');

        $forbis['stat_forbis'] = $this->input->post('statForbis');
        $idCalonForBis = $this->input->post('idCalonForbis');

        // echo json_encode($user);
        $sukses = $this->M_forumBisnis->updateForumBisnis($forbis, $idCalonForBis);


        if (!$sukses) {
            flashMessage('success', 'Calon Forum Bisnis telah  berhasil di aktifkan');
            redirect('koordinator/ForumBisnis/kelolaCalonForBis');
        } else {
            flashMessage('error', 'Aktivasi Calon Forum Bisnis gagal! Silahkan coba lagi...');
            redirect('koordinator/ForumBisnis/kelolaCalonForBis');
        }
    }
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================


    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
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
            redirect('admin/ForumBisnis');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_forumBisnis->findForbisFoto('nama_foto_bisnis', array('tb_forum_bisnis.id_forbis = ' => $idFoto));

            $forbis['nama_foto_bisnis'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/logo-bisnis/' . $data[0]->nama_foto_bisnis);

            // echo json_encode($data);
            $sukses = $this->M_forumBisnis->updateForumBisnis($forbis, $idFoto);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('koordinator/ForumBisnis');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('koordinator/ForumBisnis');
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
            redirect('koordinator/ForumBisnis');
        } else {
            flashMessage('error', 'Bisnis / Usaha Anggota gagal diperbarui! Silahkan coba lagi.');
            redirect('koordinator/ForumBisnis');
        }
    }

    public function setUpdateJenisBisnis()
    {
        $id = $this->input->post('idJenisBisnisEdit');
        $namaJenis = $this->input->post('namaJenisBisnisEdit', true);

        $sukses = $this->M_jenisBisnis->updateJenisBisnis($namaJenis, $id);

        if (!$sukses) {
            flashMessage('success', 'Jenis Bisnis berhasil diperbarui');
            redirect('koordinator/ForumBisnis/kelolaJenisBisnis');
        } else {
            flashMessage('error', 'Jenis Bisnis gagal diperbarui! Silahkan coba lagi');
            redirect('koordinator/ForumBisnis/kelolaJenisBisnis');
        }
    }
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================


    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================
    public function setDeleteForumBisnis()
    {
        $id = $this->input->post('idForbisDelete');

        $sukses = $this->M_forumBisnis->deleteForumBisnis($id);

        if (!$sukses) {
            flashMessage('success', 'Forum Bisnis berhasil dihapus');
            redirect('koordinator/ForumBisnis');
        } else {
            flashMessage('error', 'Forum Bisnis gagal dihapus! Silahkan coba lagi');
            redirect('koordinator/ForumBisnis');
        }
    }

    public function setDeleteJenisBisnis()
    {
        $id = $this->input->post('idJenisBisnisDelete');
        // $namaJenisDelete = $this->input->post('namaJenisBisnisDelete');

        $sukses = $this->M_jenisBisnis->deleteJenisBisnis($id);

        if (!$sukses) {
            flashMessage('success', 'Jenis Bisnis berhasil dihapus');
            redirect('koordinator/ForumBisnis/kelolaJenisBisnis');
        } else {
            flashMessage('error', 'Jenis Bisnis gagal dihapus! Silahkan coba lagi');
            redirect('koordinator/ForumBisnis/kelolaJenisBisnis');
        }
    }

    function tolakCalonForBis()
    {
        $idCalonForBis = $this->input->post('idCalonForbisTolak');

        $sukses = $this->M_forumBisnis->deleteForumBisnis($idCalonForBis);

        if (!$sukses) {
            flashMessage('success', 'Calon Forum Bisnis berhasil ditolak');
            redirect('koordinator/ForumBisnis/kelolaCalonForBis');
        } else {
            flashMessage('error', 'Calon Forum Bisnis gagal ditolak ! Silahkan coba lagi . . .');
            redirect('koordinator/ForumBisnis/kelolaCalonForBis');
        }
    }
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================

    function cariForumBisnis()
    {
        $data['title'] = 'Kelola Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $nama = $this->input->post('namaForbis');
        $data['forumBisnis'] = $this->M_forumBisnis->findForumBisnisLikeNama($nama);
        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );

        $data['pemilikForbis'] = $this->M_anggota->findAnggota('*', $where);

        if ($this->session->userdata('role') == 2) {
            if (!$nama) {
                redirect('koordinator/forumBisnis');
            }

            $this->koordinator_render('koordinator/kelolaForumBisnis', $data);
        }
    }


    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
    public function getForbisById()
    {
        $id = $this->input->post('id');

        $data['forbis'] = $this->M_forumBisnis->findForumBisnis(array('tb_forum_bisnis.id_forbis = ' => $id));

        echo json_encode($data);
    }

    public function getJenisBisnisById()
    {
        $id = $this->input->post('id');

        $data['jenisBisnis'] = $this->M_jenisBisnis->findJenisBisnis(array('tb_jenis_bisnis.id_jenis_bisnis = ' => $id));

        echo json_encode($data);
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
}
