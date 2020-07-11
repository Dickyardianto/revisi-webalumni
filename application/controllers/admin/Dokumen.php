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

class Dokumen extends MY_Controller
{

    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();



        $this->load->model('AdminDokumenModel');
        $this->load->model('M_anggota');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3') {
            redirect('anggota');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '4') {
            redirect('alumni');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '5') {
            redirect('umum');
        }
    }

    function index()
    {
        $data['title'] = 'Kelola Dokumen';

        $data['dokumen'] = $this->AdminDokumenModel->getAllDokumen();

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/dokumen', $data);
        }
    }

    function tambahDokumen()
    {
        $namaDokumen = $this->input->post('namaDokumen');
        $filename = "Dokumen-" . $namaDokumen . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/berkas';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload Dokumen Gagal! Silahkan coba lagi');
            redirect('admin/Dokumen');
        } else {
            $upload_data = $this->upload->data();
            $data['nama_file'] = $upload_data['file_name'];
            $data['nama_dokumen'] = $namaDokumen;
            $sukses = $this->AdminDokumenModel->insertNewDokumen($data);
            if (!$sukses) {
                flashMessage('success', 'Tambah Dokumen berhasil. ');
                redirect('admin/Dokumen');
            } else {
                flashMessage('error', 'Tambah Dokumen gagal! Silahkan coba lagi.');
                redirect('admin/Dokumen');
            }
        }
    }

    function getDokumenById()
    {
        $id = $this->input->post('id');
        $data['dokumen'] = $this->AdminDokumenModel->findDokumen(array('tb_dokumen.id_dokumen = ' => $id));
        echo json_encode($data);
    }

    function ubahDokumen()
    {
        $idDokumen = $this->input->post('idDokumen');
        $namaDokumen = $this->input->post('namaDokumen');
        $filename = "Dokumen-" . $namaDokumen . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/berkas';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload Dokumen Gagal! Silahkan coba lagi');
            redirect('admin/Dokumen');
        } else {
            $upload_data = $this->upload->data();
            $data['nama_file'] = $upload_data['file_name'];
            $data['nama_dokumen'] = $namaDokumen;

            $sukses = $this->AdminDokumenModel->updateDokumen($data, $idDokumen);

            if ($sukses) {
                flashMessage('success', 'Dokumen berhasil di ubah.');
                redirect('admin/Dokumen');
            } else {
                flashMessage('error', 'Dokumen gagal di ubah! Silahkan coba lagi');
                redirect('admin/Dokumen');
            }
        }
    }

    function hapusDokumen()
    {
        $idDokumen = $this->input->post('idDokumen');
        $data = $this->AdminDokumenModel->findDokumenForDeleteFile('nama_file', array('tb_dokumen.id_dokumen = ' => $idDokumen));
        unlink(FCPATH . 'uploads/berkas/' . $data[0]->nama_file);
        $hapusDokumen = $this->AdminDokumenModel->hapusDokumen($idDokumen);

        if (!$hapusDokumen) {
            flashMessage('success', 'Dokumen berhasil dihapus');
            redirect('admin/Dokumen');
        } else {
            flashMessage('error', 'Dokumen gagal dihapus! Silahkan coba lagi');
            redirect('admin/Dokumen');
        }
    }
}
