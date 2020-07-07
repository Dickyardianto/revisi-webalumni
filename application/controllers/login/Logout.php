<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    function index()
    {
        // Unset Session if user logout
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        session_destroy();

        redirect('login');
    }
}
