<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Anggota extends MY_Controller
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

    function index()
    {
        $data['title'] = 'Lihat Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $where = $this->session->userdata('uid');
        // var_dump($where);
        // die;

        $data['anggota'] = $this->M_anggota->findAnggotaByRole($where);

        $this->anggota_render('anggota/lihatAnggota', $data);
    }

    function kelolaAnggota()
    {
        $data['title'] = 'Tambah Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $angkatan = $data['info'][0]->angkatan;

        $where = array(
            'tb_anggota.angkatan' => $angkatan,
            'tb_anggota.status_anggota = ' => '1',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );
        $data['anggota'] = $this->M_anggota->findAnggota('*', $where);
        $this->anggota_render('anggota/anggotaBaru', $data);
    }

    public function tambahCalonAnggota()
    {
        $namaLengkap = $this->input->post('namaLengkap');
        $namaPanggilan = $this->input->post('namaPanggilanAlias');
        $angkatan = $this->input->post('angkatan');
        $noTelepon = $this->input->post('noTelepon');
        $email = $this->input->post('email');

        $filename = "anggota-" . $namaLengkap . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('anggota/Anggota/kelolaAnggota');
        } else {
            $upload_data = $this->upload->data();

            $data['nama_lengkap'] = $namaLengkap;
            $data['nama_panggilan_alias'] = $namaPanggilan;
            $data['tanggal_lahir'] = $this->input->post('tglLahir');
            $data['angkatan'] = $angkatan;
            $data['no_telp'] = $noTelepon;
            $data['email'] = $email;
            $data['nama_foto'] = $upload_data['file_name'];
            $data['status_anggota'] = '0';
            $data['role_id'] = 3;

            // echo json_encode($data);
            $sukses = $this->M_anggota->insertNewAnggota($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Anggota Baru berhasil di daftarkan. Silahkan untuk melakukan pembayaran pada daftar di bawah ini.');
                redirect('login/NotifRegisterForAnggota/notifForAnggota');
            } else {
                flashMessage('error', 'Calon Anggota Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('anggota/Anggota/kelolaAnggota');
            }
        }
    }

    function detailAnggota($id)
    {
        $data['title'] = 'Detail Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['anggota'] = $this->M_anggota->findAnggota('*', array('tb_anggota.id_anggota = ' => $id));

        if ($this->session->userdata('role') == 3) {
            $this->anggota_render('anggota/detailAnggota', $data);
        }
    }

    function cariAnggota()
    {
        $data['title'] = 'Kelola Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $nama = $this->input->post('namaAnggota');
        $where = $this->session->userdata('uid');

        // $where = "tb_anggota.status_anggota != 0";
        $data['anggota'] = $this->M_anggota->findAnggotaLikeNamaByRole($nama, $where);

        if ($this->session->userdata('role') == 3) {
            if (!$nama) {
                redirect('anggota/anggota');
            }

            $this->anggota_render('anggota/lihatAnggota', $data);
        }

        // echo json_encode($data);
        // echo '<br>';
        // echo json_encode($nama);
    }
}
