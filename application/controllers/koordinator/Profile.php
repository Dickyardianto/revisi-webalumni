<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

class Profile extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');

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
    //
    //
    //
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    function index()
    {
        $data['title'] = 'Koordinator - Profile';

        $select = '*';
        $where = "tb_anggota.user_id = " . $this->session->userdata('uid');
        $data['info'] = $this->M_anggota->findAnggota($select, $where);

        if ($this->session->userdata('role') == 2) {
            $this->koordinator_render('koordinator/profile', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    function setUpdateDataDiri()
    {
        $namaLengkap = $this->input->post('namaLengkap');
        $jenisKelamin = $this->input->post('jenisKelamin');
        $namaPanggilanAlias = $this->input->post('panggilanAlias');
        $tempatLahir = $this->input->post('tempatLahir');
        $tanggalLahir = $this->input->post('tanggalLahir');
        $angkatan = $this->input->post('angkatan');
        $golonganDarah = $this->input->post('golonganDarah');
        $telepon = $this->input->post('telepon');
        $teleponAlternatif = $this->input->post('teleponAlternatif');
        $nik = $this->input->post('nik');
        $email = $this->input->post('email');

        $idAnggota = $this->input->post('idAnggotaDataDiri');
        $anggota['nama_lengkap'] = $namaLengkap;
        $anggota['jenis_kelamin'] = $jenisKelamin;
        $anggota['nama_panggilan_alias'] = $namaPanggilanAlias;
        $anggota['tempat_lahir'] = $tempatLahir;
        $anggota['tanggal_lahir'] = $tanggalLahir;
        $anggota['angkatan'] = $angkatan;
        $anggota['golongan_darah'] = $golonganDarah;
        $anggota['no_telp'] = $telepon;
        $anggota['no_telp_alternatif'] = $teleponAlternatif;
        $anggota['NIK'] = $nik;
        $anggota['email'] = $email;

        $sukses = $this->M_anggota->updateAnggota($anggota, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Data diri berhasil diperbarui');
            redirect('koordinator/Profile');
        } else {
            flashMessage('error', 'Data diri gagal diperbarui! Silahkan coba lagi');
            redirect('koordinator/Profile');
        }
    }

    function setUpdateDomisili()
    {

        $idAnggota = $this->input->post('idAnggotaDomisili');
        $data['negara'] = $this->input->post('negara');
        $data['provinsi'] = $this->input->post('provinsi');
        $data['kabupaten_kota'] = $this->input->post('kabupatenKota');
        $data['alamat'] = $this->input->post('alamatLengkap');

        $sukses = $this->M_anggota->updateAnggota($data, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Domisili berhasil diperbarui');
            redirect('koordinator/Profile');
        } else {
            flashMessage('error', 'Domisili gagal diperbarui! Silahkan coba lagi.');
            redirect('koordinator/Profile');
        }
    }

    function setUpdateProfesi()
    {
        $idAnggota = $this->input->post('idAnggotaProfesi');
        $data['pendidikan_terakhir'] = $this->input->post('pendidikanTerakhir');
        $data['status_bekerja'] = $this->input->post('statusBekerja');
        $data['bidang_industri'] = $this->input->post('bidangIndustri');
        $data['jabatan'] = $this->input->post('jabatan');
        $data['nama_perusahaan'] = $this->input->post('namaPerusahaan');
        $data['bisnis_usaha'] = $this->input->post('bisnisUsaha');

        $sukses = $this->M_anggota->updateAnggota($data, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Profesi berhasil diperbarui');
            redirect('koordinator/Profile');
        } else {
            flashMessage('error', 'Profesi gagal diperbarui! Silahkan coba lagi.');
            redirect('koordinator/Profile');
        }
    }

    function setUpdateInfoProgram()
    {
        $idAnggota = $this->input->post('idAnggotaInfoProgram');

        $data['sosial_pendidikan'] = $this->input->post('infoProgram1');
        $data['sosial_kemanusiaan'] = $this->input->post('infoProgram2');
        $data['pengembangan_sarana_prasarana'] = $this->input->post('infoProgram3');
        $data['silaturahim_kebersamaan'] = $this->input->post('infoProgram4');
        $data['penawaran_sponsorship_donasi'] = $this->input->post('infoProgram5');

        $sukses = $this->M_anggota->updateAnggota($data, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Info program berhasil diperbarui');
            redirect('koordinator/Profile');
        } else {
            flashMessage('error', 'Info program gagal diperbarui! Silahkan coba lagi');
            redirect('koordinator/Profile');
        }
    }

    function setUpdateKeanggotaan()
    {
        $idAnggota = $this->input->post('idAnggotaKeanggotaan');

        $data['support'] = $this->input->post('support');
        $data['loyalist'] = $this->input->post('loyalist');
        $data['iuran_sukarela'] = $this->input->post('iuranSukarela');

        $sukses = $this->M_anggota->updateAnggota($data, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Keanggotaan berhasil diperbarui');
            redirect('koordinator/Profile');
        } else {
            flashMessage('error', 'Keanggotaan gagal diperbarui! Silahkan coba lagi');
            redirect('koordinator/Profile');
        }
    }
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
    function getDataDiriKoordinator()
    {
        $id = $this->input->post('id');

        $select = "id_anggota, nama_lengkap, jenis_kelamin, nama_panggilan_alias, tempat_lahir, tanggal_lahir, angkatan, golongan_darah, no_telp, no_telp_alternatif, NIK, email";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['dataDiri'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getDomisiliKoordinator()
    {
        $id = $this->input->post('id');

        $select = "id_anggota, negara, provinsi, kabupaten_kota, alamat";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['domisili'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getProfesiKoordinator()
    {
        $id = $this->input->post('id');

        $select = "id_anggota, pendidikan_terakhir, status_bekerja, bidang_industri, jabatan, nama_perusahaan, bisnis_usaha";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['profesi'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getInfoProgramKoordinator($id)
    {

        $select = "id_anggota, sosial_pendidikan, sosial_kemanusiaan, pengembangan_sarana_prasarana, silaturahim_kebersamaan, penawaran_sponsorship_donasi";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['infoProgram'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getKeanggotaanKoordinator($id)
    {
        $select = "id_anggota, support, loyalist, iuran_sukarela";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['keanggotaan'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
}
