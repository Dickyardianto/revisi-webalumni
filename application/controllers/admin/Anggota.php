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

class Anggota extends MY_Controller
{

    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();


        // Load Admin Anggota Model
        $this->load->model('AdminAnggotaModel');
        $this->load->model('AdminHomeModel');
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
        $data['title'] = 'Kelola Calon Anggota';

        $where = array(
            'tb_anggota.status_anggota = ' => '0',
            'tb_anggota.nama_lengkap != ' => 'admin'
        );

        $data['calonAnggota'] = $this->M_anggota->findAnggota('*', $where);
        $data['daftarHakAkses'] = $this->M_anggota->getAllRole();
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/anggotaBaru', $data);
        }
    }

    function kelolaAnggota()
    {
        $data['title'] = 'Kelola Anggota';

        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );
        $data['anggota'] = $this->M_anggota->findAnggota('*', $where);
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/kelolaAnggota', $data);
        }
    }

    function detailAnggota($id)
    {
        $data['title'] = 'Detail Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['anggota'] = $this->M_anggota->findAnggota('*', array('tb_anggota.id_anggota = ' => $id));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/detailAnggota', $data);
        }
    }

    function kelolaPemulihanAnggota()
    {
        $data['title'] = 'Kelola Pemulihan Anggota';

        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );
        $data['pemulihan'] = $this->M_anggota->getAllPemulihanAnggota();
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/kelolaPemulihanAnggota', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    public function tambahCalonAnggota()
    {
        $namaLengkap = $this->input->post('namaLengkap');
        $namaPanggilan = $this->input->post('namaPanggilanAlias');
        $angkatan = $this->input->post('angkatan');
        $noTelepon = $this->input->post('noTelepon');
        $email = $this->input->post('email');

        $filename = "IKA-SMA3-" . $namaLengkap . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;


        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('admin/Anggota');
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

            $sukses = $this->M_anggota->insertNewAnggota($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Anggota Baru berhasil di daftarkan. Silahkan verifikasi di Permohonan Calon Anggota');
                redirect('admin/Anggota');
            } else {
                flashMessage('error', 'Calon Anggota Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('admin/Anggota');
            }
        }
    }
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    function aktivasiCalonAnggota()
    {
        $this->load->model('M_user');

        $pass = $this->input->post('password');
        $idAnggota = $this->input->post('idAnggota');

        $user['username'] = $this->input->post('username');
        $user['password'] = md5($pass);
        $user['status_akun'] = '1';
        $user['role'] = $this->input->post('role');

        if ($user['role'] != "") {

            $sukses = $this->M_user->insertUser($user);

            if ($sukses != 0) {

                $anggota['user_id'] = $sukses;
                $anggota['status_anggota'] = '1';
                $updateAnggota = $this->M_anggota->updateAnggota($anggota, $idAnggota);

                $this->sendEmailKeanggotaan();

                if (!$updateAnggota) {
                    flashMessage('success', 'Calon Anggota berhasil di aktifkan dan dapat masuk menggunakan Username & Password sesuai yang tertera pada saat Aktivasi');
                    redirect('admin/Anggota');
                } else {
                    flashMessage('error', 'Aktivasi Calon Anggota gagal! Silahkan coba lagi...');
                    redirect('admin/Anggota');
                }
            } else {
                flashMessage('error', 'Maaf, Terjadi kesalahan pada saat proses pembuatan akun anggota baru');
                redirect('admin/Anggota');
            }
        } else {
            flashMessage('error', 'Mohon pilih kolom keanggotaan !');
            redirect('admin/Anggota');
        }
    }

    public function setUpdateAnggota()
    {
        $this->load->model('M_user');

        $idAnggota = $this->input->post('idAnggota');
        $idUser = $this->input->post('idUser');
        $sosialPendidikan = $this->input->post('infoProgram1');
        $sosialKemanusiaan = $this->input->post('infoProgram2');
        $pengembanganSarPras = $this->input->post('infoProgram3');
        $silaturahim = $this->input->post('infoProgram4');
        $sponsorshipDonasi = $this->input->post('infoProgram5');
        $support = $this->input->post('keanggotaan1');
        $loyalist = $this->input->post('keanggotaan2');

        $anggota['nama_lengkap'] = $this->input->post('namaLengkap');
        $anggota['nama_panggilan_alias'] = $this->input->post('panggilanAlias');
        $anggota['jenis_kelamin'] = $this->input->post('jenisKelamin');
        $anggota['tempat_lahir'] = $this->input->post('tempatLahir');
        $anggota['tanggal_lahir'] = $this->input->post('tanggalLahir');
        $anggota['angkatan'] = $this->input->post('angkatan');
        $anggota['golongan_darah'] = $this->input->post('golonganDarah');
        $anggota['no_telp'] = $this->input->post('telepon');
        $anggota['no_telp_alternatif'] = $this->input->post('teleponAlternatif');
        $anggota['NIK'] = $this->input->post('nik');
        $anggota['email'] = $this->input->post('email');
        $anggota['negara'] = $this->input->post('negara');
        $anggota['provinsi'] = $this->input->post('provinsi');
        $anggota['kabupaten_kota'] = $this->input->post('kabupatenKota');
        $anggota['alamat'] = $this->input->post('alamat');
        $anggota['pendidikan_terakhir'] = $this->input->post('pendidikanTerakhir');
        $anggota['status_bekerja'] = $this->input->post('statusBekerja');
        $anggota['bidang_industri'] = $this->input->post('bidangIndustri');
        $anggota['jabatan'] = $this->input->post('jabatan');
        $anggota['nama_perusahaan'] = $this->input->post('namaPerusahaan');
        $anggota['bisnis_usaha'] = $this->input->post('bisnisUsaha');

        if ($sosialPendidikan == "on") {
            $anggota['sosial_pendidikan'] = "1";
        } else {
            $anggota['sosialPendidikan'] = "0";
        }

        if ($sosialKemanusiaan == "on") {
            $anggota['sosial_kemanusiaan'] = "1";
        } else {
            $anggota['sosial_kemanusiaan'] = "0";
        }

        if ($pengembanganSarPras == "on") {
            $anggota['pengembangan_sarana_prasarana'] = "1";
        } else {
            $anggota['pengembangan_sarana_prasarana'] = "0";
        }

        if ($silaturahim == "on") {
            $anggota['silaturahim_kebersamaan'] = "1";
        } else {
            $anggota['silaturahim_kebersamaan'] = "0";
        }

        if ($sponsorshipDonasi == "on") {
            $anggota['penawaran_sponsorship_donasi'] = "1";
        } else {
            $anggota['penawaran_sponsorship_donasi'] = "0";
        }

        if ($support == "on") {
            $anggota['support'] = "1";
        } else {
            $anggota['support'] = "0";
        }

        if ($loyalist == "on") {
            $anggota['loyalist'] = "1";
        } else {
            $anggota['loyalist'] = "0";
        }

        $anggota['iuran_sukarela'] = $this->input->post('iuranSukarela');

        $user['username'] = $this->input->post('username');
        $user['role'] = $this->input->post('hakAkses');

        $updateAnggota = $this->M_anggota->updateAnggota($anggota, $idAnggota);

        $sukses = $this->AdminAnggotaModel->updateAnggota($anggota, $user, $idAnggota, $idUser);

        if (!$updateAnggota) {

            $updateUser = $this->M_user->updateUser($user, $idUser);

            if (!$updateUser) {
                flashMessage('success', 'Data anggota berhasil diubah');
                redirect('admin/Anggota/kelolaAnggota');
            } else {
                flashMessage('error', 'Data anggota gagal diubah! Silahkan coba lagi');
                redirect('admin/Anggota/kelolaAnggota');
            }
        } else {
            flashMessage('error', 'Maaf, Terjadi kesalahan pada saat perubahan data anggota');
            redirect('admin/Anggota/kelolaAnggota');
        }
    }

    public function setUpdateFoto()
    {
        $this->load->model('M_anggota');

        $idAnggota = $this->input->post('idUbahFotoAnggota');
        $namaAnggota = $this->input->post('namaUbahFotoAnggota');

        $filename = "IKA-SMA3-" . $namaAnggota . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        // load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar anggota gagal! Silahkan coba lagi');
            redirect('admin/anggota/kelolaAnggota');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_anggota->findAnggota('nama_foto', array('tb_anggota.id_anggota = ' => $idAnggota));

            $anggota['nama_foto'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/avatars/' . $data[0]->nama_foto);

            $sukses = $this->M_anggota->updateAnggota($anggota, $idAnggota);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('admin/anggota/kelolaAnggota');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('admin/anggota/kelolaAnggota');
            }
        }
    }

    function aktivasiPemulihanAnggota()
    {
        $this->load->model('M_user');

        $idPemulihan = $this->input->post('idPemulihan');
        $userIdPemulihan = $this->input->post('userId');

        //$getIdUser = $this->M_anggota->findIdUserPemulihan($idPemulihan);

        $statusPemulihan['status_pemulihan'] = '1';

        $sukses = $this->M_anggota->updatePemulihan($statusPemulihan, $idPemulihan);


        if ($sukses != NULL) {
            flashMessage('error', 'Error');
        } else {
            $pass = "12345678";
            $passWord = md5($pass);
            $user['password'] = $passWord;
            $updateAnggota = $this->M_user->updateUser($user, $userIdPemulihan);

            $this->M_anggota->deletePemulihan($idPemulihan);
            $this->sendEmail();

            if (!$updateAnggota) {
                flashMessage('success', 'Calon Anggota berhasil di aktifkan dan dapat masuk menggunakan Username & Password sesuai yang tertera pada saat Aktivasi');
                redirect('admin/Anggota/kelolaPemulihanAnggota');
            } else {
                flashMessage('error', 'Aktivasi Calon Anggota gagal! Silahkan coba lagi...');
                redirect('admin/Anggota/kelolaPemulihanAnggota');
            }
        }
        redirect('admin/Anggota/kelolaPemulihanAnggota');
    }
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================
    function tolakCalonAnggota()
    {
        $idAnggota = $this->input->post('idCalonAnggota');

        $data = $this->M_anggota->findAnggota('nama_foto', array('tb_anggota.id_anggota = ' => $idAnggota));

        // menghapus file foto dahulu
        unlink(FCPATH . 'uploads/avatars/' . $data[0]->nama_foto);

        // menghapus data di database
        $sukses = $this->M_anggota->deleteAnggota($idAnggota);

        if (!$sukses) {
            $this->sendEmailTolakKeanggotaan();
            flashMessage('success', 'Calon Anggota berhasil ditolak sebagai keanggotaan');
            redirect('admin/Anggota');
        } else {
            flashMessage('error', 'Calon Anggota gagal ditolak sebagai keanggotaan! Silahkan coba lagi');
            redirect('admin/Anggota');
        }
    }

    public function hapusAnggota()
    {
        $this->load->model('M_user');

        $id = $this->input->post('idAnggotaHapus');
        $idUser = $this->input->post('idUserHapus');

        $data = $this->M_anggota->findAnggota('nama_foto', array('tb_anggota.id_anggota = ' => $id));

        // menghapus file foto dahulu
        unlink(FCPATH . 'uploads/avatars/' . $data[0]->nama_foto);

        $deleteAnggota = $this->M_anggota->deleteAnggota($id);
        $deleteUser = $this->M_user->deleteUser($idUser);

        if (!$deleteUser) {
            flashMessage('success', 'Anggota berhasil dihapus');
            redirect('admin/Anggota/kelolaAnggota');
        } else {
            flashMessage('error', 'Anggota gagal dihapus! Silahkan coba lagi');
            redirect('admin/Anggota/kelolaAnggota');
        }
    }

    function tolakPemulihanAnggota()
    {
        $idPemulihan = $this->input->post('idCalonPemulihan');

        $sukses = $this->M_anggota->deletePemulihan($idPemulihan);

        if (!$sukses) {
            flashMessage('success', 'Calon Anggota berhasil ditolak sebagai keanggotaan');
            redirect('admin/Anggota/kelolaPemulihanAnggota');
        } else {
            flashMessage('error', 'Calon Anggota gagal ditolak sebagai keanggotaan! Silahkan coba lagi');
            redirect('admin/Anggota/kelolaPemulihanAnggota');
        }
    }
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    function cariAnggota()
    {
        $data['title'] = 'Kelola Anggota';

        $nama = $this->input->post('namaAnggota');

        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );
        $data['anggota'] = $this->M_anggota->findAnggotaLikeNama($where, $nama);
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 1) {
            if (!$nama) {
                redirect('admin/anggota/kelolaAnggota');
            }
            $this->admin_render('admin/kelolaAnggota', $data);
        }
    }
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
    function anggotaJSON()
    {
        $id = $this->input->post('id');

        $data['anggota'] = $this->M_anggota->findAnggota('*', array('tb_anggota.id_anggota = ' => $id));

        echo json_encode($data);
    }

    function pemulihanJSON()
    {
        $id = $this->input->post('id');
        $data['pemulihan'] = $this->M_anggota->findPemulihan($id);

        echo json_encode($data);
    }

    function dataMaster()
    {
        $data['title'] = 'Tambah Data Anggota Master';
        $data['dataMaster'] = $this->AdminAnggotaModel->getAllDataMaster();
        $data['info'] = $this->AdminHomeModel->getInfoBySessionId($this->session->userdata('aid'));

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/dataMasterAnggota', $data);
        }
    }

    public function getAnggotaById($id)
    {
        $data['anggota'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.id_anggota = ' => $id));

        echo json_encode($data);
    }

    private function sendEmail()
    {
        $emailName = $this->input->post('emailName');

        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'iika.sma3.bandung@gmail.com';
        $config['smtp_pass'] = 'ikasma3bdg';
        $config['smtp_port'] = 465;
        $config['newline'] = "\r\n";


        $this->load->library('email', $config);
        $this->email->from('no-reply@ikasma3bdg.com', 'email@ikasma3bdg.com');
        $this->email->to($emailName);
        $this->email->subject('Lupa Password ?');
        $this->email->message('Permintaan lupa password berhasil disetujui oleh pihak admin, password anda saat ini | 12345678 | Harap untuk segera di ubah');

        if ($this->email->send()) {
            flashMessage('success', 'Calon Anggota berhasil di aktifkan dan dapat masuk menggunakan Username & Password sesuai yang tertera pada saat Aktivasi');
            redirect('admin/Anggota/kelolaPemulihanAnggota');
        } else {
            flashMessage('error', 'Aktivasi Calon Anggota gagal! Silahkan coba lagi...');
            redirect('admin/Anggota/kelolaPemulihanAnggota');
        }
    }


    private function sendEmailKeanggotaan()
    {
        $emailName = $this->input->post('emailAnggotaBaru');
        $role = $this->input->post('role');
        $username = $this->input->post('username');

        $namaRole = '';
        if ($role == '1') {
            $namaRole = "Admin";
        } else if ($role == '2') {
            $namaRole = "Koordinator";
        } else if ($role == '3') {
            $namaRole = "Anggota";
        } else if ($role == '4') {
            $namaRole = "Alumni";
        }
        // else {
        //     flashMessage('error', 'Mohon pilih kolom kenanggotaan !');
        //     redirect('admin/Anggota');
        // }



        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'iika.sma3.bandung@gmail.com';
        $config['smtp_pass'] = 'ikasma3bdg';
        $config['smtp_port'] = 465;
        $config['newline'] = "\r\n";

        $message = "Selamat, Akun anda telah berhasil di verifikasi oleh pihak admin dengan kategori sebagai berikut : <br>
        <b>Diterima sebagai</b>     | " . $namaRole . "<br>
        <b>Username Anda</b>        | " . $username . "<br>
        <b>Password Anda</b>        | 12345678 <br>
        Harap untuk segera mengubah password anda ! <br>
        Demikian informasi seputar registrasi akun untuk keanggotaan alumni SMA Negeri 3 Bandung.";

        $this->load->library('email', $config);
        $this->email->from('no-reply@ikasma3bdg.com', 'email@ikasma3bdg.com');
        $this->email->to($emailName);
        $this->email->subject('Registrasi akun berhasil');
        $this->email->message($message);

        if ($this->email->send()) {
            flashMessage('success', 'Calon Anggota berhasil di aktifkan dan dapat masuk menggunakan Username & Password sesuai yang tertera pada saat Aktivasi');
            redirect('admin/Anggota');
        } else {
            flashMessage('error', 'Aktivasi Calon Anggota gagal! Silahkan coba lagi...');
            redirect('admin/Anggota');
        }
    }




    public function sendEmailTolakKeanggotaan()
    {
        $emailName = $this->input->post('tolakEmailAnggotaBaru');

        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'iika.sma3.bandung@gmail.com';
        $config['smtp_pass'] = 'ikasma3bdg';
        $config['smtp_port'] = 465;
        $config['newline'] = "\r\n";

        $message = "Mohon maaf untuk saat ini anda belum dapat diterima di keanggotaan ikatan alumni SMA Negeri 3 Bandung. <br>
        <b>Pastikan anda adalah alumni keanggotaan SMA Negeri 3 Bandung</b>. <br>
        Terimakasih.";

        $this->load->library('email', $config);
        $this->email->from('no-reply@ikasma3bdg.com', 'email@ikasma3bdg.com');
        $this->email->to($emailName);
        $this->email->subject('Registrasi akun gagal');
        $this->email->message($message);

        if ($this->email->send()) {
            flashMessage('success', 'Calon Anggota berhasil di tolak');
            redirect('admin/Anggota');
        } else {
            flashMessage('error', 'Aktivasi Calon Anggota gagal ditolak ! Silahkan coba lagi...');
            redirect('admin/Anggota');
        }
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
}