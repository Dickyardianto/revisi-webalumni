-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2020 pada 09.49
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
(1, 'root12', 'admin', '173040046', 2017, '1', 'Bandung', '2020-06-23', 'A', '081911437177', '0', 'root123@gmail.com', 'IKA-SMA3-1592730823.jpeg', 'Indonesia Bandung 12', 'Jawa Barat', 'Kab. Cirebon', 'Jl. Nusa Indah No. 27 Wiratama - Tuparev', 'SMA12', '1', 'Informatika', 'CEO Apple', 'Apple, Inc', '1', '1', '1', '1', '1', NULL, '1', NULL, 12, '1', 1, 0),
(1102, 'Nurcholidah S.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08122123214', NULL, 'nurcholidah@yahoo.com', NULL, NULL, NULL, NULL, 'Komp. Casa Jardin Blok D6 no. 18A Jakarta Barat', NULL, NULL, NULL, NULL, 'RSHS Bandung', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 0, 0),
(1232, 'My Koordinator', 'pak koor', '9387', 2017, '2', 'Bandung', '2020-06-24', 'O', 'koordinator', '', 'koordinator@ikasma3bdg.com', 'IKA-SMA3-My_Koordinator12-1594179943.jpg', 'Indonesia Jawa Barat', 'Jawa Barat', 'Kab. Cirebon', 'Bandung', 'SMAk', '1', 'Informatika', 'CEO Apple', 'Apple, Inc', '1', '1', '1', '1', '0', '1', '0', '0', 0, '1', 37, 0),
(1266, '&lt;h1&gt;Nama&lt;/h1&gt;', 'Dicky Ardianto', NULL, 2019, NULL, NULL, '2020-06-26', NULL, '021', NULL, 'dikiardianto19@gmail.com', 'anggota-amplth1ampgtNamaamplth1ampgt-1593411445.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 0),
(1291, 'Coba k3', 'asmk', NULL, 201, NULL, NULL, '2020-07-08', NULL, '010', NULL, 'dikiardianto19@gmail.com', 'IKA-SMA3-Coba_k3-1594193621.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 59, 3),
(1292, 'Alumnus', 'Al', NULL, 2019, NULL, NULL, '2020-07-08', NULL, '02111', NULL, 'dikiardianto19@gmail.com', 'IKA-SMA3-Alumnus-1594193736.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 60, 4),
(1293, 'Anggota Coba', 'Coba', NULL, 2918, NULL, NULL, '2020-07-08', NULL, '031', NULL, 'dikiardianto19@gmail.com', 'anggota-Anggota_Coba-1594194145.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 61, 3),
(1294, 'Anggota 2 Coba', 'Coba', '010', 20, '', 'Bandung', '2020-07-08', 'B', '01234', '', 'dikiardianto19@gmail.com', 'IKA-SMA3-Anggota_2_Coba-1594194305.JPG', '', '', '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 62, 3),
(1295, 'Alumnussss', 'ALUMNUS', NULL, 2019, NULL, NULL, '2020-07-08', NULL, '01111', NULL, 'dikiardianto19@gmail.com', 'IKA-SMA3-Alumnussss-1594194399.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 63, 4),
(1296, 'amsaksm', 'amskam', NULL, 9191, NULL, NULL, '2020-07-08', NULL, '001', NULL, 'dikiardianto19@gmail.com', 'anggota-amsaksm-1594194507.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 3);

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

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `date_created`, `time_created`, `isi_berita`, `sumber`, `credit`, `foto`, `id_penulis`, `id_kategori`, `stat_berita`) VALUES
(1, 'Coba', '2020-07-08', '12:42:01', 'Coba', 'Coba', 'Coba', 'berita-Coba-1594186921.jpg', 1, 2, 1);

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
(9, 'bukti-bayar-1594194317.PNG', 1294);

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
(50, '021', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(51, '0001', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(52, '02112', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(53, '010', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(57, '021', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(59, '010', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(60, '02111', '25d55ad283aa400af464c76d713c07ad', '1', '4'),
(61, '031', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(62, '01234', '25d55ad283aa400af464c76d713c07ad', '1', '3'),
(63, '01111', '25d55ad283aa400af464c76d713c07ad', '1', '4');

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1297;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_forum_bisnis`
--
ALTER TABLE `tb_forum_bisnis`
  MODIFY `id_forbis` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_pemulihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
