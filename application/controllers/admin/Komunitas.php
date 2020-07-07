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

        // Load Admin Anggota Model
        $this->load->model('AdminAnggotaModel');
        $this->load->model('AdminHomeModel');
        $this->load->model('M_anggota');
        $this->load->model('M_komunitas');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3') {
            redirect('anggota');
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
        $data['title'] = 'Kelola Calon Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $data['calonKomunitas'] = $this->M_komunitas->getAllKomunitas();

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/kelolaKomunitas', $data);
        }
        //         echo json_encode($data);
    }

    function komunitasNonaktif()
    {
        $data['title'] = 'Komunitas Nonaktif';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/komunitasNonaktif', $data);
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
            redirect('admin/komunitas/kelolaStatusKomunitas');
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
            if ($this->session->userdata('role') == 1) {
                $data['stat_komunitas'] = '1';
            }
            // } else {
            //     $data['stat_komunitas'] = '1';
            // }

            // echo json_encode($data);
            $sukses = $this->M_komunitas->insertNewKomunitas($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Komunitas Baru berhasil di daftarkan. Komunitas berhasil diaktifkan');
                redirect('admin/komunitas/kelolaStatusKomunitas');
            } else {
                flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('admin/komunitas/kelolaStatusKomunitas');
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
    function aktivasiCalonKomunitas()
    {
        $komunitas['stat_komunitas'] = $this->input->post('statKomunitas');
        $idKomunitas = $this->input->post('idKomunitas');

        // echo json_encode($user);
        $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idKomunitas);

        if ($sukses == 0) {
            flashMessage('success', 'Calon Komunitas berhasil di aktifkan sebagai Komunitas Aktif');
            redirect('admin/komunitas');
        } else {
            flashMessage('error', 'Aktivasi Calon Komunitas gagal! Silahkan coba lagi...');
            redirect('admin/komunitas');
        }
    }

    function KelolaStatusKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/kelolaStatusKomunitas', $data);
        }
    }

    public function setUpdateKomunitas()
    {
        $sifatUbahKomunitas = $this->input->post('sifatUbahKomunitas');
        $jenisUbahKomunitas = $this->input->post('jenisUbahKomunitas');
        $lokasiUbahKomunitas = $this->input->post('lokasiUbahKomunitas');
        $anggotaUbahKomunitas = $this->input->post('anggotaUbahKomunitas');
        $deskripsiUbahKomunitas = $this->input->post('deskripsiUbahKomunitas');

        $idUbahKomunitas = $this->input->post('idUbahKomunitas');
        $namaUbahKomunitas = $this->input->post('namaUbahKomunitas');
        $tautatUbahKomunitas = $this->input->post('tautatUbahKomunitas');

        $statUbahKomunitasss = $this->input->post('statUbahKomunitasss');

        $komunitas['sifat_komunitas'] = $sifatUbahKomunitas;
        $komunitas['jenis_komunitas'] = $jenisUbahKomunitas;
        $komunitas['lokasi_komunitas'] = $lokasiUbahKomunitas;
        $komunitas['anggota_komunitas'] = $anggotaUbahKomunitas;
        $komunitas['deskripsi_komunitas'] = $deskripsiUbahKomunitas;
        $komunitas['nama_komunitas'] = $namaUbahKomunitas;
        $komunitas['tautat_komunitas'] = $tautatUbahKomunitas;

        if ($statUbahKomunitasss == '1') {
            $komunitas['stat_komunitas'] = 1;
        }
        if ($statUbahKomunitasss == '0') {
            $komunitas['stat_komunitas'] = 0;
        }

        $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idUbahKomunitas);

        if (!$sukses) {
            flashMessage('success', 'Komunitas Baru berhasil diubah. Silahkan cek kembali');
            redirect('admin/komunitas/kelolaStatusKomunitas');
        } else {
            flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
            redirect('admin/komunitas/kelolaStatusKomunitas');
        }
    }

    public function setUpdateFotoKomunitas()
    {
        $idUbahFoto = $this->input->post('idUbahFoto');

        // $filename = "komunitas-" . $namaFotoKomunitas . "-" . time();
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
            redirect('admin/komunitas');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_komunitas->findKomunitas('logo_komunitas', array('tb_komunitas.id_komunitas = ' => $idUbahFoto));

            $komunitas['logo_komunitas'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/content/komunitas/' . $data[0]->logo_komunitas);

            // echo json_encode($data);
            $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idUbahFoto);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('admin/Komunitas/kelolaStatusKomunitas');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('admin/Komunitas/kelolaStatusKomunitas');
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
            redirect('admin/Komunitas/kelolaStatusKomunitas');
        } else {
            flashMessage('error', 'Komunitas gagal dihapus! Silahkan coba lagi');
            redirect('admin/Komunitas/kelolaStatusKomunitas');
        }
    }

    function tolakCalonKomunitas()
    {
        $idKomunitas = $this->input->post('idCalonKomunitas');

        $sukses = $this->M_komunitas->deleteKomunitas($idKomunitas);

        if (!$sukses) {
            flashMessage('success', 'Calon Komunitas berhasil ditolak sebagai Komunitasan');
            redirect('admin/Komunitas');
        } else {
            flashMessage('error', 'Calon Komunitas gagal ditolak sebagai keKomunitasan! Silahkan coba lagi');
            redirect('admin/Komunitas');
        }
        // echo json_encode($idKomunitas);
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
    function cariStatusKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas != 0";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            if (!$nama) {
                redirect('admin/komunitas/kelolaStatusKomunitas');
            }

            $this->admin_render('admin/kelolaStatusKomunitas', $data);
        }
    }

    function cariStatusKomunitasNon()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas = 0";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            if (!$nama) {
                redirect('admin/komunitas/komunitasNonaktif');
            }

            $this->admin_render('admin/komunitasNonaktif', $data);
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

    public function getKomunitasById($id)
    {
        $data['komunitas'] = $this->M_komunitas->findKomunitasAndUser(array('tb_komunitas.id_komunitas = ' => $id));

        echo json_encode($data);
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================

}
