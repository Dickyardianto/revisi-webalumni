<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        // load Login Model
        $this->load->model('LoginModel');
        //        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
        //            $data['title'] = 'Login IKASMA3BDG';
        //            $this->login_render('login/Login', $data);
        //        } else
        if ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 1) {
            redirect('admin');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 2) {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 3) {
            redirect('anggota');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 4) {
            redirect('alumni');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 5) {
            redirect('umum');
        }
    }

    public function loginPage()
    {
        $data['title'] = 'Login IKASMA3BDG';
        $this->login_render('login/Login', $data);
    }

    public function auth()
    {
        $user = $this->input->post('userName');
        $pass = $this->input->post('passWord');
        $passWord = md5($pass);

        if ((!empty($user)) && (!empty($passWord))) {
            $cekUser = $this->LoginModel->cek_user($user, $passWord);

            if ($cekUser) {

                if ($cekUser[0]->status_akun == '0') {
                    flashMessage('warning', 'Keanggotaan Anda belum aktif / verifikasi');
                    redirect('login');
                } else {
                    foreach ($cekUser as $sess) {
                        $sess_data['logged_in']    = 'Sudah Login';
                        $sess_data['uid']       = $sess->id_user;
                        $sess_data['username']  = $sess->username;
                        $sess_data['role']      = $sess->role;
                        $sess_data['status']    = $sess->status_akun;
                        $this->session->set_userdata($sess_data);
                    }

                    if ($this->session->userdata('status') == '1') {
                        if ($this->session->userdata('role') == '1') {
                            redirect('admin');
                        } else if ($this->session->userdata('role') == '2') {
                            redirect('koordinator');
                        } else if ($this->session->userdata('role') == '3') {
                            redirect('anggota');
                        } else if ($this->session->userdata('role') == '4') {
                            redirect('alumni');
                        } else if ($this->session->userdata('role') == '5') {
                            redirect('');
                        }
                    }
                }
            } else {
                // Show alert error login
                // Username or Password invalid
                flashMessage('error', 'Username / Password salah! Silahkan coba lagi');
                redirect('login');
            }
        }
    }

    // Show session in JSON format
    public function loginJSON()
    {
        echo json_encode($this->session->userdata());
    }
}
