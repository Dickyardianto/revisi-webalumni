<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NotifRegister extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }
    
    function index() {
	    flashMessage('success', 'Anda berhasil mendaftar. Tunggu konfirmasi dari Admin / Koordinator jika Keanggotaan Anda telah di aktifkan / verifikasi');
        $data['title'] = 'Registrasi Calon Anggota IKASMA3BDG';
        $this->login_render('login/NotifRegister', $data);
	}

}