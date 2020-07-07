<?php

defined('BASEPATH') or exit('No direct access allowed');

/*
 * class Forum Bisnis Anggota
 * Created by Lut Dinar Fadila 2018
 */

class Forbis extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_forumBisnis');
        $this->load->model('M_jenisBisnis');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        }

    }

    public function index()
    {
        $data['title'] = 'Anggota - Forum Bisnis';
        $info = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        
        foreach ($info as $anggota) {
            $id = $anggota->id_anggota;
        }
        
        $id_anggota = $id;
        
        $data['info'] = $info;
        $data['forbis'] = $this->M_forumBisnis->findForumBisnis(array('tb_forum_bisnis.pemilik_id = ' => $id_anggota));
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();

        $this->anggota_render('anggota/forumBisnis', $data);
    }

    public function setTambahForbis()
    {
        $data['nama_bisnis_usaha'] = $this->input->post('namaBisnisModal');
        $data['id_jenis_bisnis'] = $this->input->post('jenisBisnisModal');
        $data['deskripsi_bisnis'] = $this->input->post('deskripsiBisnisModal');
        $data['alamat'] = $this->input->post('alamatBisnisModal');
        $data['no_telp_bisnis'] = $this->input->post('noTelpBisnisModal');
        $data['pemilik_id'] = $this->input->post('idAnggotaBisnisModal');

        // echo json_encode($data);
        $sukses = $this->M_forumBisnis->insertForumBisnis($data);

        if (!$sukses) {
            flashMessage('success', 'Bisnis / Usaha Anda berhasil ditambahkan dan akan ditampilkan');
            redirect('anggota/Forbis');
        } else {
            flashMessage('error', 'Bisnis / Usaha Anda gagal ditambahkan! Silahkan coba lagi');
            redirect('anggota/Forbis');
        }
    }

    function getForbisById()
    {
        $id = $this->input->post('id');

        $data['forbis'] = $this->M_forumBisnis->findForumBisnis(array('tb_forum_bisnis.id_forum_bisnis = ' => $id));

        echo json_encode($data);
    }

    function setEditForbis()
    {
        $id = $this->input->post('idForbisEdit');
        $data['nama_bisnis_usaha'] = $this->input->post('namaBisnisEdit');
        $data['id_jenis_bisnis'] = $this->input->post('jenisBisnisEdit');
        $data['deskripsi_bisnis'] = $this->input->post('deskripsiBisnisEdit');
        $data['alamat'] = $this->input->post('alamatBisnisEdit');
        $data['no_telp_bisnis'] = $this->input->post('noTelpBisnisEdit');

        $sukses = $this->M_forumBisnis->updateForumBisnis($data, $id);

        if (!$sukses) {
            flashMessage('success', 'Bisnis / Usaha Anda berhasil diperbarui.');
            redirect('anggota/Forbis');
        } else {
            flashMessage('error', 'Bisnis / Usaha Anda gagal diperbarui! Silahkan coba lagi.');
            redirect('anggota/Forbis');
        }
    }

}
