-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2020 pada 13.08
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

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
-- Struktur dari tabel `tb_anggota`
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
  `alamat` text,
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
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_lengkap`, `nama_panggilan_alias`, `NIK`, `angkatan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `no_telp`, `no_telp_alternatif`, `email`, `nama_foto`, `negara`, `provinsi`, `kabupaten_kota`, `alamat`, `pendidikan_terakhir`, `status_bekerja`, `bidang_industri`, `jabatan`, `nama_perusahaan`, `bisnis_usaha`, `sosial_pendidikan`, `sosial_kemanusiaan`, `pengembangan_sarana_prasarana`, `silaturahim_kebersamaan`, `penawaran_sponsorship_donasi`, `support`, `loyalist`, `iuran_sukarela`, `status_anggota`, `user_id`, `role_id`) VALUES
(1, 'root', 'admin', '173040046', 2017, '1', 'Bandung', '2020-06-23', 'A', '081911437177', '0', 'root123@gmail.com', 'IKA-SMA3-1592730823.jpeg', 'Indonesia Bandung 12', 'Jawa Barat', 'Kab. Cirebon', 'Jl. Nusa Indah No. 27 Wiratama - Tuparev', 'SMA12', '1', 'Informatika', 'CEO Apple', 'Apple, Inc', '1', '1', '1', '1', '1', NULL, '1', NULL, 12, '1', 1, 0),
(1232, 'My Koordinator', 'pak koor', '9387', 2017, '2', 'Bandung', '2020-06-24', 'O', 'koordinator', '', 'koordinator@ikasma3bdg.com', 'IKA-SMA3-My_Koordinator12-1594179943.jpg', 'Indonesia Jawa Barat', 'Jawa Barat', 'Kab. Cirebon', 'Bandung', 'SMAk', '1', 'Informatika', 'CEO Apple', 'Apple, Inc', '1', '1', '1', '1', '0', '1', '0', '0', 0, '1', 37, 0),
(1304, 'Dicky Ardianto', 'Dicky', '12', 2017, '1', 'Bandung', '2020-07-09', 'B', '021', '', 'dikiardianto19@gmail.com', 'anggota-Dicky_Ardianto-1594270403.JPG', 'Indonesia', 'Jawa Barat', 'Bandung', 'Bandung Asli', 'SMK', '1', 'Teknik', 'Manager', 'PT Tunggal Ika', '1', '1', '1', '1', NULL, '1', '1', '1', 15000, '1', 66, 3),
(1305, 'Ahdy Wiranti', 'Adhy', NULL, 2018, NULL, NULL, '2020-07-09', NULL, '010', NULL, 'dikiardianto19@gmail.com', 'IKA-SMA3-Ahdy_Wiranti-1594272299.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 67, 3),
(1306, 'Rafly Yunandi', 'Rafly', NULL, 2017, NULL, NULL, '2020-07-09', NULL, '02190', NULL, 'dikiardianto19@gmail.com', 'anggota-Rafly_Yunandi-1594272854.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 68, 3),
(1310, 'Coba Coba', 'Coba Coba', NULL, 2019, NULL, NULL, '2020-07-09', NULL, '091', NULL, 'dikiardianto19@gmail.com', 'IKA-SMA3-Coba_Coba-1594275267.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 74, 3),
(1312, 'Alumni Dicky 1998', 'Dicky', '12', 2017, '1', 'Bandung', '2020-07-07', 'B', '00', '', 'dikiardianto19@gmail.com', 'IKA-SMA3-Alumni_Dicky-1594275852.jpg', 'Indonesia Jawa Barat', 'Bandung', 'Banten', 'Banten Javar', 'Bandung', '0', 'Bandung', 'Bandung', 'Bandung', '1', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', 69, 4),
(1313, 'Alumniiiiii', 'alumni123', NULL, 2019, NULL, NULL, '2020-07-09', NULL, '01111', NULL, 'dikiardianto19@gmail.com', 'anggota-Alumniiiiii-1594279765.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 70, 4),
(1314, 'Alum', 'alum', NULL, 2019, NULL, NULL, '2020-07-09', NULL, '09', NULL, 'dikiardianto19@gmail.com', 'anggota-Alum-1594279890.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 71, 4),
(1315, 'Dicky Alumni Baru', 'Aaa dicky', NULL, 2018, NULL, NULL, '2020-07-09', NULL, 'alumni', NULL, 'berbagi.video19@gmail.com', 'anggota-Dicky_Alumni_Baru-1594281003.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 72, 4),
(1316, 'Dicky Ardianto', 'Dicky', NULL, 2019, NULL, NULL, '2020-07-09', NULL, '091', NULL, 'dikiardianto19@gmail.com', 'anggota-Dicky_Ardianto-1594299527.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 73, 3),
(1317, 'asmk', 'asmak', NULL, 0, NULL, NULL, '2020-07-09', NULL, 'amsksma', NULL, 'amska@mail.com', 'IKA-SMA3-asmk-1594299770.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 3),
(1318, 'Dicky Ardianto', 'amskams', NULL, 2019, NULL, NULL, '2020-07-09', NULL, '0219', NULL, 'dikiardianto19@gmail.com', 'anggota-Dicky_Ardianto-1594300268.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 4),
(1319, 'Coba', 'Coba', NULL, 2019, NULL, NULL, '2020-07-10', NULL, '123', NULL, 'al@gmail.com', 'anggota-Coba-1594352486.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
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
-- Struktur dari tabel `tb_bukti_bayar`
--

CREATE TABLE `tb_bukti_bayar` (
  `id` int(11) NOT NULL,
  `gambar_bukti_bayar` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id`, `gambar_bukti_bayar`, `id_user`) VALUES
(1, 'bukti-bayar-1594115231.PNG', 1280),
(2, 'bukti-bayar-1594117237.png', 1282),
(3, 'bukti-bayar-1594180243.jpeg', 1283),
(4, 'bukti-bayar-1594186662.PNG', 1284),
(5, 'bukti-bayar-1594188500.JPG', 1288),
(6, 'bukti-bayar-1594188705.JPG', 1289),
(7, 'bukti-bayar-1594193632.JPG', 1291),
(8, 'bukti-bayar-1594194156.jpeg', 1293),
(9, 'bukti-bayar-1594194317.PNG', 1294),
(10, 'bukti-bayar-1594212582.png', 1297),
(11, 'bukti-bayar-1594270431.jpeg', 1304),
(12, 'bukti-bayar-1594272316.jpeg', 1305),
(13, 'bukti-bayar-1594272882.png', 1306),
(14, 'bukti-bayar-1594274496.jpeg', 1307),
(15, 'bukti-bayar-1594274695.jpeg', 1308),
(16, 'bukti-bayar-1594274842.png', 1309),
(17, 'bukti-bayar-1594275364.png', 1310),
(18, 'bukti-bayar-1594275563.png', 1311),
(19, 'bukti-bayar-1594299538.jpeg', 1316),
(20, 'bukti-bayar-1594299781.png', 1317),
(21, 'bukti-bayar-1594352504.jpeg', 1319);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `nama_dokumen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumen`, `nama_file`, `nama_dokumen`) VALUES
(4, 'Dokumen-Dokumen_Asli_JANGAN_DIHAPUS-1594465054.pdf', 'Dokumen Asli JANGAN DIHAPUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_forum_bisnis`
--

CREATE TABLE `tb_forum_bisnis` (
  `id_forbis` int(11) NOT NULL,
  `nama_bisnis_usaha` varchar(255) NOT NULL,
  `id_jenis_bisnis` int(11) NOT NULL,
  `deskripsi_bisnis` text,
  `alamat_bisnis` text NOT NULL,
  `no_telp_bisnis` varchar(16) DEFAULT NULL,
  `url_bisnis` varchar(255) DEFAULT NULL,
  `nama_foto_bisnis` varchar(255) DEFAULT NULL,
  `pemilik_id` int(11) NOT NULL,
  `stat_forbis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_forum_bisnis`
--

INSERT INTO `tb_forum_bisnis` (`id_forbis`, `nama_bisnis_usaha`, `id_jenis_bisnis`, `deskripsi_bisnis`, `alamat_bisnis`, `no_telp_bisnis`, `url_bisnis`, `nama_foto_bisnis`, `pemilik_id`, `stat_forbis`) VALUES
(1, 'Coba', 1, 'Bandung', 'Bandung', '09', 'http://ikasma3bdg', 'logo-Coba-1594195173.jpg', 1295, 1),
(2, 'Jagung', 1, 'Bandung', 'Bangung', 'Bandung', 'http://bandung.co.id', 'logo-Jagung-1594281415.jpg', 1312, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_bisnis`
--

CREATE TABLE `tb_jenis_bisnis` (
  `id_jenis_bisnis` int(11) NOT NULL,
  `nama_jenis_bisnis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_bisnis`
--

INSERT INTO `tb_jenis_bisnis` (`id_jenis_bisnis`, `nama_jenis_bisnis`) VALUES
(1, 'Makanan/Minuman'),
(2, 'Baju'),
(3, 'Otomotif'),
(4, 'Hobi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_berita`
--

CREATE TABLE `tb_kategori_berita` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_berita`
--

INSERT INTO `tb_kategori_berita` (`id`, `kategori`) VALUES
(1, 'Tidak Ada Kategori'),
(2, 'Coba'),
(3, 'Nama 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komunitas`
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
-- Struktur dari tabel `tb_pemulihan`
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
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status_akun` char(1) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `status_akun`, `role`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', '1', '1'),
(37, 'koordinator', '25d55ad283aa400af464c76d713c07ad', '1', '2'),
(66, '021', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(67, '010', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(68, '02190', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(69, '00', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(70, '01111', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(71, '09', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(72, 'alumni', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(73, '091', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(74, '091', '25d55ad283aa400af464c76d713c07ad', '1', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_role`
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
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `tb_forum_bisnis`
--
ALTER TABLE `tb_forum_bisnis`
  ADD PRIMARY KEY (`id_forbis`),
  ADD UNIQUE KEY `nama_foto_bisnis` (`nama_foto_bisnis`);

--
-- Indeks untuk tabel `tb_jenis_bisnis`
--
ALTER TABLE `tb_jenis_bisnis`
  ADD PRIMARY KEY (`id_jenis_bisnis`);

--
-- Indeks untuk tabel `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indeks untuk tabel `tb_pemulihan`
--
ALTER TABLE `tb_pemulihan`
  ADD PRIMARY KEY (`id_pemulihan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1320;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_forum_bisnis`
--
ALTER TABLE `tb_forum_bisnis`
  MODIFY `id_forbis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_bisnis`
--
ALTER TABLE `tb_jenis_bisnis`
  MODIFY `id_jenis_bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  MODIFY `id_komunitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pemulihan`
--
ALTER TABLE `tb_pemulihan`
  MODIFY `id_pemulihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
