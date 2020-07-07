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

class Komunitas extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_user');
        $this->load->model('M_komunitas');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
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
        $data['title'] = 'Kelola Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $where = "tb_komunitas.stat_komunitas = 1";

        $data['komunitas'] = $this->M_komunitas->getAllKomunitasForSpecificUser($where, $data['info'][0]->user_id);

        if ($this->session->userdata('role') == 3) {
            $this->anggota_render('anggota/kelolaKomunitas', $data);
        }
    }

    function komunitasNonaktif()
    {
        $data['title'] = 'Komunitas Nonaktif';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $where = "tb_komunitas.stat_komunitas = 0";

        $data['komunitas'] = $this->M_komunitas->getAllKomunitasForSpecificUser($where, $data['info'][0]->user_id);

        if ($this->session->userdata('role') == 3) {
            $this->anggota_render('anggota/komunitasNonaktif', $data);
        }
    }

    // function kelolaKomunitas()
    // {
    //     $data['title'] = 'Lihat Komunitas';
    //     $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

    //     $where = "tb_komunitas.stat_komunitas != 0";

    //     $data['komunitas'] = $this->M_komunitas->getAllKomunitasForSpecificUser($where, $data['info'][0]->user_id);

    //     if ($this->session->userdata('role') == 3) {
    //         $this->anggota_render('anggota/kelolaKomunitas', $data);
    //     }
    // }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //    
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    function tambahKomunitas()
    {
        $data['title'] = 'Tambah Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();
        $this->anggota_render('anggota/tambahKomunitas', $data);
    }

    public function tambahCalonKomunitas()
    {
        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $tanggal = date("Y-m-d", mktime(date('m'), date("d"), date('Y')));

        $this->load->model('M_anggota');

        $sifatKomunitas = $this->input->post('sifatKomunitas');
        $jenisKomunitas = $this->input->post('jenisKomunitas');
        $lokasiKomunitas = $this->input->post('lokasiKomunitas');
        $anggotaKomunitas = $this->input->post('anggotaKomunitas');
        $deskKomunitas = $this->input->post('deskKomunitas');

        $namaKomunitas = $this->input->post('namaKomunitas');
        $tautatKomunitas = $this->input->post('tautatKomunitas');
        $tglPengajuan = $tanggal;
        $waktuPengajuan = $jam;
        $idPengupload = $this->input->post('idPengupload');

        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/content/komunitas/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('anggota/Komunitas');
        } else {
            $upload_data = $this->upload->data();

            $data['sifat_komunitas'] = $sifatKomunitas;
            $data['jenis_komunitas'] = $jenisKomunitas;
            $data['lokasi_komunitas'] = $lokasiKomunitas;
            $data['anggota_komunitas'] = $anggotaKomunitas;
            $data['deskripsi_komunitas'] = $deskKomunitas;

            $data['nama_komunitas'] = $namaKomunitas;
            $data['tautat_komunitas'] = $tautatKomunitas;
            $data['date_created'] = $tglPengajuan;
            $data['time_created'] = $waktuPengajuan;
            $data['logo_komunitas'] = $upload_data['file_name'];
            $data['id_pengupload'] = $idPengupload;
            if ($this->session->userdata('role') == 3) {
                $data['stat_komunitas'] = '0';
            } else {
                $data['stat_komunitas'] = '1';
            }

            // echo json_encode($data);
            $sukses = $this->M_komunitas->insertNewKomunitas($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Komunitas Baru berhasil di daftarkan. Tunggu Verivikasi dari Admin 1x24 jam');
                redirect('anggota/Komunitas');
            } else {
                flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('anggota/Komunitas');
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
    public function setUpdateKomunitas()
    {
        $idKomunitas = $this->input->post('idUbahKomunitas');
        $sifatKomunitas = $this->input->post('sifatUbahKomunitas');
        $jenisKomunitas = $this->input->post('jenisUbahKomunitas');
        $lokasiKomunitas = $this->input->post('lokasiUbahKomunitas');
        $anggotaKomunitas = $this->input->post('anggotaUbahKomunitas');
        $deskKomunitas = $this->input->post('deskripsiUbahKomunitas');
        $namaKomunitas = $this->input->post('namaUbahKomunitas');
        $tautatKomunitas = $this->input->post('tautatUbahKomunitas');

        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        $komunitas['nama_komunitas'] = $namaKomunitas;
        $komunitas['deskripsi_komunitas'] = $deskKomunitas;
        $komunitas['tautat_komunitas'] = $tautatKomunitas;
        $komunitas['sifat_komunitas'] = $sifatKomunitas;
        $komunitas['jenis_komunitas'] = $jenisKomunitas;
        $komunitas['lokasi_komunitas'] = $lokasiKomunitas;
        $komunitas['anggota_komunitas'] = $anggotaKomunitas;
        // $komunitas['logo_komunitas'] = $upload_data['file_name'];

        // echo json_encode($data);
        $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idKomunitas);

        if (!$sukses) {
            flashMessage('success', 'Komunitas berhasil di perbarui.');
            redirect('anggota/Komunitas');
        } else {
            flashMessage('error', 'Komunitas gagal di perbarui! Silahkan coba lagi');
            redirect('anggota/Komunitas');
        }
        // }
    }

    public function setUpdateFotoKomunitas()
    {
        $idUbahFoto = $this->input->post('idUbahFoto');

        $namaKomunitas = $this->input->post('namaKomunitas');

        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/content/komunitas';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        // load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar Forum Bisnis gagal! Silahkan coba lagi');
            redirect('anggota/komunitas');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_komunitas->findKomunitas('logo_komunitas', array('tb_komunitas.id_komunitas = ' => $idUbahFoto));

            $komunitas['logo_komunitas'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/content/komunitas/' . $data[0]->logo_komunitas);

            // echo json_encode($data);
            $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idUbahFoto);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('anggota/Komunitas');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('anggota/Komunitas');
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
    public function hapusKomunitas()
    {
        $this->load->model('M_komunitas');

        $id = $this->input->post('idKomunitasHapus');

        $deleteKomunitas = $this->M_komunitas->deleteKomunitas($id);

        if (!$deleteKomunitas) {
            flashMessage('success', 'Komunitas berhasil dihapus');
            redirect('anggota/Komunitas');
        } else {
            flashMessage('error', 'Komunitas gagal dihapus! Silahkan coba lagi');
            redirect('anggota/Komunitas');
        }
    }

    public function batalkanPermohonanKomunitas()
    {
        $this->load->model('M_komunitas');

        $id = $this->input->post('idKomunitasHapus');

        $deleteKomunitas = $this->M_komunitas->deleteKomunitas($id);

        if (!$deleteKomunitas) {
            flashMessage('success', 'Permohonan Komunitas berhasil dibatalkan');
            redirect('anggota/Komunitas/komunitasNonaktif');
        } else {
            flashMessage('error', 'Terjadi Error! Silahkan coba lagi');
            redirect('anggota/Komunitas/komunitasNonaktif');
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
    function cariKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas = 1";

        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNamaForSpecificUser($where, $nama, $data['info'][0]->user_id);


        if ($this->session->userdata('role') == 3) {
            if (!$nama) {
                redirect('anggota/Komunitas');
            }
            $this->anggota_render('anggota/kelolaKomunitas', $data);
        }
    }

    function cariStatusKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas = 1";

        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNamaForSpecificUser($where, $nama, $data['info'][0]->user_id);

        if ($this->session->userdata('role') == 3) {
            if (!$nama) {
                redirect('anggota/Komunitas');
            }
            $this->anggota_render('anggota/lihatKomunitas', $data);
        }
    }

    function cariStatusKomunitasNonaktif()
    {
        $data['title'] = 'Kelola Status Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $nama = $this->input->post('namaKomunitas');

        $where = 'tb_komunitas.stat_komunitas = 0';

        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNamaForSpecificUser($where, $nama, $data['info'][0]->user_id);

        if ($this->session->userdata('role') == 3) {
            if (!$nama) {
                redirect('anggota/komunitas/komunitasNonaktif');
            }

            $this->anggota_render('anggota/komunitasNonaktif', $data);
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
    function komunitasJSON()
    {
        $id = $this->input->post('id');

        $data['komunitas'] = $this->M_komunitas->findKomunitas('*', array('tb_komunitas.id_komunitas = ' => $id));

        echo json_encode($data);
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================

}
