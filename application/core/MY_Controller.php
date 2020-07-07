<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function frontend_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/frontend/headerFrontEnd', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/frontend/footerFrontEnd', $data, TRUE);

        $this->load->view('template/frontend/indexFrontEnd', $data);
    }

    public function admin_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/admin/header', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/admin/footer', $data, TRUE);

        $this->load->view('template/admin/indexadmin', $data);
    }

    public function anggota_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/anggota/headerAnggota', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/anggota/footerAnggota', $data, TRUE);

        $this->load->view('template/anggota/indexAnggota', $data);
    }

    public function koordinator_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/koordinator/headerKoordinator', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/koordinator/footerKoordinator', $data, TRUE);

        $this->load->view('template/koordinator/indexKoordinator', $data);
    }

    public function alumni_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/alumni/headerAlumni', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/alumni/footerAlumni', $data, TRUE);

        $this->load->view('template/alumni/indexAlumni', $data);
    }

    public function umum_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/umum/headerUmum', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/umum/footerUmum', $data, TRUE);

        $this->load->view('template/umum/indexUmum', $data);
    }

    public function login_render($content, $data = NULL)
    {
        $data['header'] = $this->load->view('template/login/headerLogin', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/login/footerLogin', $data, TRUE);

        $this->load->view('template/login/indexLogin', $data);
    }
}