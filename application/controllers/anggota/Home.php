<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Home Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Home extends MY_Controller
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
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '4') {
            redirect('alumni');
        }
    }

    public function index()
    {
        $data['title'] = 'Beranda Anggota';

        $anggotaByUID = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if (empty($anggotaByUID)) {
            redirect('logout');
        } else {
            $data['info'] = $anggotaByUID;
            $this->anggota_render('anggota/home', $data);
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
}
