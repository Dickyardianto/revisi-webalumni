<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Profile Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Profile extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        }
    }

    function getDataDiriAnggota()
    {
        $id = $this->input->post('id');

        $select = "id_anggota, nama_lengkap, jenis_kelamin, nama_panggilan_alias, tempat_lahir, tanggal_lahir, angkatan, golongan_darah, no_telp, no_telp_alternatif, NIK, email";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['dataDiri'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getDomisiliAnggota()
    {
        $id = $this->input->post('id');

        $select = "id_anggota, negara, provinsi, kabupaten_kota, alamat";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['domisili'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getProfesiAnggota()
    {
        $id = $this->input->post('id');

        $select = "id_anggota, pendidikan_terakhir, status_bekerja, bidang_industri, jabatan, nama_perusahaan, bisnis_usaha";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['profesi'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getInfoProgramAnggota($id)
    {

        $select = "id_anggota, sosial_pendidikan, sosial_kemanusiaan, pengembangan_sarana_prasarana, silaturahim_kebersamaan, penawaran_sponsorship_donasi";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['infoProgram'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

    function getKeanggotaanAnggota($id)
    {
        $select = "id_anggota, support, loyalist, iuran_sukarela";
        $where = "tb_anggota.id_anggota = " . $id;
        $data['keanggotaan'] = $this->M_anggota->findAnggota($select, $where);

        echo json_encode($data);
    }

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
            flashMessage('success', 'Data diri Anda berhasil diperbarui');
            redirect('alumni/Home');
        } else {
            flashMessage('error', 'Data diri Anda gagal diperbarui! Silahkan coba lagi');
            redirect('alumni/Home');
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
            flashMessage('success', 'Domisili Anda berhasil diperbarui');
            redirect('alumni/Home');
        } else {
            flashMessage('error', 'Domisili Anda gagal diperbarui! Silahkan coba lagi.');
            redirect('alumni/Home');
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
            flashMessage('success', 'Profesi Anda berhasil diperbarui');
            redirect('alumni/Home');
        } else {
            flashMessage('error', 'Profesi Anda gagal diperbarui! Silahkan coba lagi.');
            redirect('alumni/Home');
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
            redirect('alumni/Home');
        } else {
            flashMessage('error', 'Info program gagal diperbarui! Silahkan coba lagi');
            redirect('alumni/Home');
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
            flashMessage('success', 'Keanggotaan Anda berhasil diperbarui');
            redirect('alumni/Home');
        } else {
            flashMessage('error', 'Keanggotaan Anda gagal diperbarui! Silahkan coba lagi');
            redirect('alumni/Home');
        }
    }
}