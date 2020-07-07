<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

class Pengaturan extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_anggota');
        $this->load->model('M_user');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3') {
            redirect('anggota');
        }
    }
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    function index()
    {
        $data['title'] = 'Admin - Pengaturan';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/pengaturan', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    function setUpdateUsername()
    {
        $idUser = $this->input->post('idUserUsername');
        $user['username'] = $this->input->post('usernameBaru');

        $sukses = $this->M_user->updateUser($user, $idUser);

        if (!$sukses) {
            flashMessage('success', 'Username Anda telah diperbarui. Silahkan masuk kembali menggunakan Username Baru');
            redirect('login/Logout');
        } else {
            flashMessage('error', 'Username Anda gagal diperbarui! Silahkan coba lagi');
            redirect('admin/Pengaturan');
        }
        // echo json_encode($username);
    }

    function setUpdatePassword()
    {
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $idUser = $this->input->post('idUserPassword');
        $passwordLama = $this->input->post('passwordLama');
        $password = $this->input->post('passwordBaru');
        $ulangiPassword = $this->input->post('ulangiPasswordBaru');

        // jika password yang lama cocok dengan form password lama
        if (md5($passwordLama) == $data['info'][0]->password) {

            // jika password lama berbeda dengan password baru
            if ($passwordLama != $password) {

                // jika password baru dengan ulangi password sama
                if ($password == $ulangiPassword) {
                    $user['password'] = md5($password);
                    $sukses = $this->M_user->updateUser($user, $idUser);

                    if (!$sukses) {
                        flashMessage('success', 'Password Anda telah diperbarui. Silahkan masuk kembali menggunakan password yang baru');
                        redirect('logout');
                    } else {
                        flashMessage('error', 'Password Anda gagal diperbarui! Silahkan coba lagi');
                        redirect('admin/Pengaturan');
                    }
                } else {
                    flashMessage('error', 'Password Baru dengan Ulangi Password Baru tidak cocok! Silahkan coba lagi.');
                    redirect('admin/Pengaturan');
                }
            } else {
                flashMessage('error', 'Password Lama dengan Password Baru tidak boleh sama! Silahkan coba lagi.');
                redirect('admin/Pengaturan');
            }
        } else {
            flashMessage('error', 'Password Anda tidak cocok dengan yang sebelumnya! Silahkan coba lagi.');
            redirect('admin/Pengaturan');
        }
    }

    function setUpdateImageProfile()
    {

        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $idAnggota = $_POST['idPengguna'];
        // $namaLengkap = $_POST['namaPengguna'];

        $filename = "IKA-SMA3-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);


        if ($this->upload->do_upload('fileSaya')) {
            $old_image = $data['info'][0]->nama_foto;
            if ($old_image != 'no-image.jpg') {
                unlink(FCPATH . 'uploads/avatars/' . $old_image);
            }
            $new_image = $this->upload->data();
            // $this->db->set('nama_foto', $new_image['file_name']);

            $anggota['nama_foto'] = $new_image['file_name'];
            $sukses = $this->M_anggota->updateAnggota($anggota, $idAnggota);

            if (!$sukses) {
                flashMessage('success', 'Foto profil Anda berhasil diperbarui');
                redirect('admin/Pengaturan');
            } else {
                flashMessage('error', 'Foto profil Anda gagal diperbarui! Silahkan coba lagi');
                redirect('admin/Pengaturan');
            }
        } else {
            flashMessage('error', 'Foto profil Anda gagal diperbarui! Silahkan coba lagi');
            redirect('admin/Pengaturan');
        }

        // if (!$this->upload->do_upload('fileSaya')) {
        //     flashMessage('error', 'Maaf, Upload gambar profil baru Anda gagal! Silahkan coba lagi');
        //     redirect('admin/Pengaturan');
        // } else {
        //     $upload_data = $this->upload->data();
        //     $anggota['nama_foto'] = $upload_data['file_name'];
        //     $sukses = $this->M_anggota->updateAnggota($anggota, $idAnggota);

        //     if (!$sukses) {
        //         flashMessage('success', 'Foto profil Anda berhasil diperbarui');
        //         redirect('admin/Pengaturan');
        //     } else {
        //         flashMessage('error', 'Foto profil Anda gagal diperbarui! Silahkan coba lagi');
        //         redirect('admin/Pengaturan');
        //     }
        // }
    }
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
}
