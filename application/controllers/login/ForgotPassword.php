<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('M_anggota');
    }

    function index()
    {
        $data['title'] = 'Registrasi Calon Anggota IKASMA3BDG';
        $this->login_render('login/ForgotPassword', $data);
    }

    public function forgotP()
    {
        $user = $this->input->post('userName');
        $alamat_email = $this->input->post('emailName');
        $tanggal = date("Y-m-d", mktime(date('m'), date("d"), date('Y')));

        $cekAkun = $this->LoginModel->cek_akun($user);
        // var_dump($cekAkun);
        // die;
        $cekId = $this->LoginModel->get_id($user);

        if ($cekAkun != NULL) {
            if (!empty($cekId)) {
                flashMessage('warning', 'Akun Sudah Terdaftar, Silahkan Tunggu verivikasi admin 1x24 jam');
                redirect('login/forgotPassword');
            }
            if ($cekAkun[0]->status_akun == '1') {
                $anggota['id_user'] = $cekAkun[0]->id_user;
                $anggota['date_created'] = $tanggal;
                $anggota['username'] = $user;
                $anggota['status_pemulihan'] = 0;
                $anggota['alamat_email'] = $alamat_email;
                $this->LoginModel->saveForgotPasswordAkun($anggota);
                flashMessage('success', 'Berhasil! .. Silahkan Tunggu verivikasi admin 1x24 jam');
                redirect('login/forgotPassword');
            } else {
                flashMessage('error', 'Akun Tidak Terdaftar');
                redirect('login/forgotPassword');
            }
        } else {
            flashMessage('error', 'Akun Tidak Terdaftar');
            redirect('login/forgotPassword');
        }
    }
}