-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 02:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_panggilan_alias` varchar(100) DEFAULT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `golongan_darah` varchar(3) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `no_telp_alternatif` varchar(14) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `nama_foto` varchar(255) DEFAULT NULL,
  `negara` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pendidikan_terakhir` varchar(10) DEFAULT NULL,
  `status_bekerja` varchar(30) DEFAULT NULL,
  `bidang_industri` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `bisnis_usaha` char(1) DEFAULT NULL,
  `sosial_pendidikan` char(1) DEFAULT NULL,
  `sosial_kemanusiaan` char(1) DEFAULT NULL,
  `pengembangan_sarana_prasarana` char(1) DEFAULT NULL,
  `silaturahim_kebersamaan` char(1) DEFAULT NULL,
  `penawaran_sponsorship_donasi` char(1) DEFAULT NULL,
  `support` char(1) DEFAULT NULL,
  `loyalist` char(1) DEFAULT NULL,
  `iuran_sukarela` int(20) DEFAULT NULL,
  `status_anggota` char(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_lengkap`, `nama_panggilan_alias`, `NIK`, `angkatan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `no_telp`, `no_telp_alternatif`, `email`, `nama_foto`, `negara`, `provinsi`, `kabupaten_kota`, `alamat`, `pendidikan_terakhir`, `status_bekerja`, `bidang_industri`, `jabatan`, `nama_perusahaan`, `bisnis_usaha`, `sosial_pendidikan`, `sosial_kemanusiaan`, `pengembangan_sarana_prasarana`, `silaturahim_kebersamaan`, `penawaran_sponsorship_donasi`, `support`, `loyalist`, `iuran_sukarela`, `status_anggota`, `user_id`) VALUES
(1, 'root', 'admin', '173040046', 2017, '1', 'Bandung', '2020-06-23', 'A', '081911437177', '0', 'root123@gmail.com', 'IKA-SMA3-1592730823.jpeg', 'Indonesia', 'Jawa Barat', 'Kab. Cirebon', 'Jl. Nusa Indah No. 27 Wiratama - Tuparev', 'SMA', '1', 'Informatika', 'CEO Apple', 'Apple, Inc', '1', NULL, '1', NULL, '1', NULL, '1', NULL, 12, '1', 1),
(1102, 'Nurcholidah S.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08122123214', NULL, 'nurcholidah@yahoo.com', NULL, NULL, NULL, NULL, 'Komp. Casa Jardin Blok D6 no. 18A Jakarta Barat', NULL, NULL, NULL, NULL, 'RSHS Bandung', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 0),
(1232, 'My Koordinator', 'pak koor', '9387', 2017, '2', 'Bandung', '2020-06-24', 'O', 'koordinator', '', 'koordinator@ikasma3bdg.com', 'IKA-SMA3-My_Koordinator-1592730527.jpg', 'Indonesia Jawa Barat', 'Jawa Barat', 'Kab. Cirebon', 'Bandung', 'SMAk', '1', 'Informatika', 'CEO Apple', 'Apple, Inc', '1', '1', '0', '0', '0', '0', '0', '0', 0, '1', 37),
(1266, '&lt;h1&gt;Nama&lt;/h1&gt;', 'Dicky Ardianto', NULL, 2019, NULL, NULL, '2020-06-26', NULL, '021', NULL, 'dikiardianto19@gmail.com', 'anggota-amplth1ampgtNamaamplth1ampgt-1593411445.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0),
(1269, 'asmkask', 'sas', NULL, 0, NULL, NULL, '2020-06-26', NULL, '010', NULL, '010@mail.com', 'IKA-SMA3-asmkask-1593522793.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0),
(1270, 'My Alumni Cobaasas', 'sas', NULL, 0, NULL, NULL, '2020-06-30', NULL, 'sas', NULL, 'root123@gmail.com', 'IKA-SMA3-My_Alumni_Cobaasas-1593524018.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0),
(1274, 'Anggota Nih', 'Dicky Ardianto', NULL, 2001, NULL, NULL, '2020-07-07', NULL, '021', NULL, 'dikiardianto19@gmail.com', 'anggota-Anggota_Nih-1594099827.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0),
(1275, 'Asmka', 'amskam', NULL, 0, NULL, NULL, '2020-07-07', NULL, '1', NULL, 'root123@gmail.com', 'anggota-Asmka-1594103579.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(1276, 'asmk', 'amsk', NULL, 0, NULL, NULL, '2020-07-07', NULL, '001', NULL, 'asmk@a.com', 'anggota-asmk-1594104042.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(1277, 'root', 'toro', NULL, 201, NULL, NULL, '2020-07-07', NULL, '012', NULL, '010@mail.com', 'anggota-root-1594104651.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(1278, 'amsk', 'amskas', NULL, 0, NULL, NULL, '2020-07-07', NULL, '010', NULL, 'dicky_173040046@mail.unpas.ac.id', 'anggota-amsk-1594110412.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(1279, 'amskamcoba', 'coba', NULL, 0, NULL, NULL, '2020-07-07', NULL, '122', NULL, 'coba@gmail.com', 'anggota-amskamcoba-1594113079.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(1280, 'rott', 'ottoo', NULL, 2010, NULL, NULL, '2020-07-07', NULL, '021', NULL, 'dikiardianto19@gmail.com', 'anggota-rott-1594115222.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(1281, 'root', 'alumni', NULL, 2010, NULL, NULL, '2020-07-07', NULL, '001', NULL, 'dikiardianto19@gmail.com', 'anggota-root-1594115869.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 4),
(1282, 'Dicky Ardianto', 'Dicky', NULL, 2019, NULL, NULL, '2020-07-07', NULL, '000010', NULL, 'dikiardianto19@gmail.com', 'anggota-Dicky_Ardianto-1594117230.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `isi_berita` varchar(10240) DEFAULT NULL,
  `sumber` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stat_berita` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti_bayar`
--

CREATE TABLE `tb_bukti_bayar` (
  `id` int(11) NOT NULL,
  `gambar_bukti_bayar` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id`, `gambar_bukti_bayar`, `id_user`) VALUES
(1, 'bukti-bayar-1594115231.PNG', 1280),
(2, 'bukti-bayar-1594117237.png', 1282);

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_bisnis`
--

CREATE TABLE `tb_forum_bisnis` (
  `id_forbis` int(11) NOT NULL,
  `nama_bisnis_usaha` varchar(255) NOT NULL,
  `id_jenis_bisnis` int(11) NOT NULL,
  `deskripsi_bisnis` text DEFAULT NULL,
  `alamat_bisnis` text NOT NULL,
  `no_telp_bisnis` varchar(16) DEFAULT NULL,
  `url_bisnis` varchar(255) DEFAULT NULL,
  `nama_foto_bisnis` varchar(255) DEFAULT NULL,
  `pemilik_id` int(11) NOT NULL,
  `stat_forbis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_bisnis`
--

CREATE TABLE `tb_jenis_bisnis` (
  `id_jenis_bisnis` int(11) NOT NULL,
  `nama_jenis_bisnis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_bisnis`
--

INSERT INTO `tb_jenis_bisnis` (`id_jenis_bisnis`, `nama_jenis_bisnis`) VALUES
(1, 'Makanan/Minuman'),
(2, 'Baju'),
(3, 'Otomotif'),
(4, 'Hobi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_berita`
--

CREATE TABLE `tb_kategori_berita` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_berita`
--

INSERT INTO `tb_kategori_berita` (`id`, `kategori`) VALUES
(1, 'Tidak Ada Kategori'),
(2, 'Coba'),
(3, 'Nama 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komunitas`
--

CREATE TABLE `tb_komunitas` (
  `id_komunitas` int(11) NOT NULL,
  `nama_komunitas` varchar(255) NOT NULL,
  `deskripsi_komunitas` varchar(255) NOT NULL,
  `tautat_komunitas` varchar(255) NOT NULL,
  `logo_komunitas` varchar(255) NOT NULL,
  `sifat_komunitas` varchar(255) NOT NULL,
  `jenis_komunitas` varchar(255) NOT NULL,
  `lokasi_komunitas` varchar(255) NOT NULL,
  `anggota_komunitas` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `id_pengupload` int(11) NOT NULL,
  `stat_komunitas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemulihan`
--

CREATE TABLE `tb_pemulihan` (
  `id_pemulihan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status_pemulihan` int(11) NOT NULL,
  `alamat_email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status_akun` char(1) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `status_akun`, `role`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', '1', '1'),
(37, 'koordinator', '25d55ad283aa400af464c76d713c07ad', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Koordinator'),
(3, 'Anggota'),
(4, 'Alumni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_forum_bisnis`
--
ALTER TABLE `tb_forum_bisnis`
  ADD PRIMARY KEY (`id_forbis`),
  ADD UNIQUE KEY `nama_foto_bisnis` (`nama_foto_bisnis`);

--
-- Indexes for table `tb_jenis_bisnis`
--
ALTER TABLE `tb_jenis_bisnis`
  ADD PRIMARY KEY (`id_jenis_bisnis`);

--
-- Indexes for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indexes for table `tb_pemulihan`
--
ALTER TABLE `tb_pemulihan`
  ADD PRIMARY KEY (`id_pemulihan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1283;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_forum_bisnis`
--
ALTER TABLE `tb_forum_bisnis`
  MODIFY `id_forbis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis_bisnis`
--
ALTER TABLE `tb_jenis_bisnis`
  MODIFY `id_jenis_bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  MODIFY `id_komunitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemulihan`
--
ALTER TABLE `tb_pemulihan`
  MODIFY `id_pemulihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
