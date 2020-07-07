<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita Alumni
 * Created by 
 *      Adhy Wiranto Sudjana
 *      Dicky Ardianto
 *      Rafly Yunandi Aliansyah
 * Architecture by 
 *      Lut Dinar Fadila
 * 
 * 2020
*/

class Berita extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();

        $this->load->model('AlumniAnggotaModel');
        $this->load->model('AlumniHomeModel');
        $this->load->model('M_anggota');
        $this->load->model('M_berita');
        $this->load->model('M_kategori');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3') {
            redirect('anggota');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '5') {
            redirect('umum');
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
        if ($this->session->userdata('role') == 4) {

            $data['title'] = 'Kelola Berita';
            $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

            $where = "tb_berita.stat_berita != 0";

            $data['berita'] = $this->M_berita->getAllBeritaForSpecificUser($where, $data['info'][0]->user_id);
            $data['daftarKategori'] = $this->M_kategori->getAllKategori();

            $this->alumni_render('alumni/kelolaBerita', $data);
        }
    }

    function formTambahCalonBerita()
    {
        if ($this->session->userdata('role') == 4) {

            $data['title'] = 'Tambah Berita';
            $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

            $data['calonBerita'] = $this->M_berita->getAllBerita();
            $data['daftarKategori'] = $this->M_kategori->getAllKategori();

            $this->alumni_render('alumni/tambahCalonBerita', $data);
        }
    }

    function beritaNonaktif()
    {
        if ($this->session->userdata('role') == 4) {

            $data['title'] = 'Berita Nonaktif';
            $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

            $where = "tb_berita.stat_berita != 1";

            $data['berita'] = $this->M_berita->getAllBeritaForSpecificUser($where, $data['info'][0]->user_id);
            $data['daftarKategori'] = $this->M_kategori->getAllKategori();

            $this->alumni_render('alumni/beritaNonaktif', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    public function tambahCalonBerita()
    {
        $this->load->model('M_berita');

        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $tanggal = date("Y-m-d", mktime(date('m'), date("d"), date('Y')));

        $judulBerita = $this->input->post('judulBerita');
        $isiBerita = $this->input->post('isiBerita');
        $tglPengajuan = $tanggal;
        $waktuPengajuan = $jam;
        $sumberBerita = $this->input->post('sumberBerita');
        $creditBerita = $this->input->post('creditBerita');
        $idKategori = $this->input->post('idKategori');
        $idPengupload = $this->input->post('idPengupload');

        $filename = "berita-" . $judulBerita . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/content/berita';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon berita gagal! Silahkan coba lagi');
            redirect('alumni/Berita');
        } else {
            $upload_data = $this->upload->data();

            $data['judul_berita'] = $judulBerita;
            $data['date_created'] = $tglPengajuan;
            $data['time_created'] = $waktuPengajuan;
            $data['isi_berita'] = $isiBerita;
            $data['sumber'] = $sumberBerita;
            $data['credit'] = $creditBerita;
            $data['foto'] = $upload_data['file_name'];
            $data['id_penulis'] = $idPengupload;
            $data['id_kategori'] = $idKategori;
            if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) {
                $data['stat_berita'] = '1';
            } else {
                $data['stat_berita'] = '0';
            }

            // echo json_encode($data);
            $sukses = $this->M_berita->insertNewBerita($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Berita Baru berhasil ditambahkan. Tunggu verifikasi dari admin untuk aktivasi');
                redirect('alumni/Berita');
            } else {
                flashMessage('error', 'Calon Berita Baru gagal ditambahkan! Silahkan coba lagi');
                redirect('alumni/Berita');
            }
        }
    }
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    public function setUpdateBerita()
    {
        $this->load->model('M_berita');

        $idBerita = $this->input->post('idUbahBerita');
        $judulBerita = $this->input->post('judulBerita');
        $isiBerita = $this->input->post('isiBerita');
        $sumberBerita = $this->input->post('sumberBerita');
        $creditBerita = $this->input->post('creditBerita');
        $kategoriBerita = $this->input->post('kategoriBerita');

        $berita['judul_berita'] = $judulBerita;
        $berita['isi_berita'] = $isiBerita;
        $berita['sumber'] = $sumberBerita;
        $berita['credit'] = $creditBerita;
        $berita['id_kategori'] = $kategoriBerita;

        // echo json_encode($data);
        $sukses = $this->M_berita->updateBerita($berita, $idBerita);

        if (!$sukses) {
            flashMessage('success', 'Berita berhasil di ubah.');
            redirect('alumni/Berita');
        } else {
            flashMessage('error', 'Berita gagal di ubah! Silahkan coba lagi');
            redirect('alumni/Berita');
        }
    }

    public function setUpdateFoto()
    {
        $this->load->model('M_berita');

        $idBerita = $this->input->post('idUbahFoto');
        $judulBerita = $this->input->post('judulUbahFotoBerita');

        $filename = "berita-" . $judulBerita . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/content/berita';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        // load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar berita gagal! Silahkan coba lagi');
            redirect('anggota/Berita');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_berita->findBerita('foto', array('tb_berita.id_berita = ' => $idBerita));

            $berita['foto'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/content/berita/' . $data[0]->foto);

            // echo json_encode($data);
            $sukses = $this->M_berita->updateBerita($berita, $idBerita);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('alumni/Berita');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('alumni/Berita');
            }
        }
    }
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================
    public function hapusBerita()
    {
        $this->load->model('M_berita');

        $id = $this->input->post('idBeritaHapus');

        // mengambil nama file foto dari database
        $data = $this->M_berita->findBerita('foto', array('tb_berita.id_berita = ' => $id));

        // menghapus berita di database
        $deleteBerita = $this->M_berita->deleteBerita($id);

        // menghapus file foto berita
        unlink(FCPATH . 'uploads/content/berita/' . $data[0]->foto);

        if (!$deleteBerita) {
            flashMessage('success', 'Berita berhasil dihapus');
            redirect('alumni/Berita');
        } else {
            flashMessage('error', 'Berita gagal dihapus! Silahkan coba lagi');
            redirect('alumni/Berita');
        }
    }
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    function cariBerita()
    {
        if ($this->session->userdata('role') == 4) {

            $data['title'] = 'Kelola Berita';

            $judul = $this->input->post('judulBerita');

            $where = "tb_berita.stat_berita != 0";
            $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
            $data['berita'] = $this->M_berita->findBeritaLikeJudulForSpecificUser($where, $judul, $data['info'][0]->user_id);

            if (!$judul) {
                redirect('alumni/berita');
            }

            $this->alumni_render('alumni/kelolaBerita', $data);
        }
    }

    function cariBeritaNonaktif()
    {
        if ($this->session->userdata('role') == 4) {

            $data['title'] = 'Berita Nonaktif';

            $judul = $this->input->post('judulBerita');

            $where = "tb_berita.stat_berita = 0";
            $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
            $data['berita'] = $this->M_berita->findBeritaLikeJudulForSpecificUser($where, $judul, $data['info'][0]->user_id);

            if (!$judul) {
                redirect('alumni/berita/beritaNonaktif');
            }

            $this->alumni_render('alumni/beritaNonaktif', $data);
        }
    }
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
    function beritaJSON()
    {
        $id = $this->input->post('id');

        $data['berita'] = $this->M_berita->findBerita('*', array('tb_berita.id_berita = ' => $id));

        echo json_encode($data);
    }

    function kategoriJSON()
    {
        $id = $this->input->post('id');

        $data['kategori'] = $this->M_kategori->findKategori('*', array('tb_kategori_berita.id = ' => $id));

        echo json_encode($data);
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
}
