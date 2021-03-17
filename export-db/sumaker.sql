-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2019 pada 19.08
-- Versi server: 5.7.17-log
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `counter_kd` varchar(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nilai` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `counter`
--

INSERT INTO `counter` (`id`, `counter_kd`, `keterangan`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'ASKB', 'Agenda Surat Keluar Balasan', '1', '2019-10-10 23:44:13', '2019-10-10 23:44:13'),
(2, 'ASMU', 'Agenda Surat Masuk Umum', '1', '2019-10-13 17:07:42', '2019-10-13 17:07:42'),
(3, 'ASMD', 'Agenda Surat Masuk Undangan', '1', '2019-10-13 17:07:46', '2019-10-13 17:07:46'),
(4, 'ASKT', 'Agenda Surat Keluar Tugas', '1', '2019-10-10 23:10:35', '2019-10-10 23:10:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `suratmasuk_id` varchar(36) NOT NULL,
  `id_tujuan` varchar(36) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `user` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id` int(11) NOT NULL,
  `nama_kantor` text NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`id`, `nama_kantor`, `alamat_kantor`, `email`, `created_at`, `updated_at`) VALUES
(1, 'KEMENTRIAN AGRARIA DAN TATA RUANG<br>\r\n        BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA<br>\r\n        KANTOR PERTANAHAN KABUPATEN SLEMAN<br>\r\n        PROPINSI DAERAH ISTIMEWA YOGYAKARTA', 'Jl. Dr. Radjimin. Telp. (0274) 869501,869502 Fax. (0274) 869144 Triharjo, Sleman, Kode Pos 55514', 'barcelonastrygwyr@gmail.com', '2019-10-06 22:41:10', '2019-10-06 22:41:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(20) NOT NULL,
  `pegawai_id` varchar(36) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `gelar_dpn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gelar_blkng` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto_dir` varchar(255) DEFAULT NULL,
  `kd_role` varchar(25) NOT NULL,
  `sebagai` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `pegawai_id`, `username`, `password`, `nip`, `gelar_dpn`, `nama`, `gelar_blkng`, `email`, `hp`, `alamat`, `foto_dir`, `kd_role`, `sebagai`, `created_at`, `updated_at`) VALUES
(1, '5c5492a0-ca31-11e9-931d-ac1f6bab9462', 'admin', '21232f297a57a5a743894a0e4a801fc3', '10', 'Ir', 'Admin', 'S.Kom', 'admin@suratan.coms', '082132435959', 'Perumahan Griya Jadijaya', 'Foto-Profil-5c5492a0-ca31-11e9-931d-ac1f6bab9462-Admin.png', 'ADMIN', 'Administrator', '2019-10-02 18:11:17', '2019-10-02 18:11:17'),
(3, '344a246e-d339-11e9-8ce7-86903e88ec0a', 'loket', 'a9c8dcf6a784cb0d0672f8bcd3190b9c', '20', 'Dr.', 'Loket', 'S.Pd', 'loket@gmail.com', '081329002927', 'Perumahan Sidojoyo', 'Foto-Profil-344a246e-d339-11e9-8ce7-86903e88ec0a-Loket.jpg', 'LOKET', 'Loket Informasi', '2019-10-02 18:11:22', '2019-10-02 18:11:22'),
(4, '841cb5ca-e53b-11e9-b357-2779ea2a12dd', 'seksi-infrastruktur', '5842638e3539f98c1378a3cbae4ed0f1', '', '', 'Ka. Seksi Infrastruktur Pertanahan', '', 'seksi@gmail.com', '', '', NULL, 'SEKSI', 'Seksi Infrastruktur Pertanahan', '2019-10-03 02:28:45', '2019-10-03 02:28:45'),
(5, '841ed720-e53b-11e9-b357-2779ea2a12dd', 'seksi-hubunganhukum', '5842638e3539f98c1378a3cbae4ed0f1', '', '', 'Ka. Seksi Hubungan Hukum Pertanahan', '', 'seksi@gmail.com', '', '', NULL, 'SEKSI', 'Seksi Hubungan Hukum Pertanahan', '2019-10-03 02:28:50', '2019-10-03 02:28:50'),
(6, '841ef848-e53b-11e9-b357-2779ea2a12dd', 'seksi-tatausaha', '5842638e3539f98c1378a3cbae4ed0f1', '', '', 'Ka. Sub Bagian Tata Usaha', '', 'seksi@gmail.com', '', '', NULL, 'SEKSI', 'Sub Bagian Tata Usaha', '2019-10-03 02:28:54', '2019-10-03 02:28:54'),
(7, '841f1da9-e53b-11e9-b357-2779ea2a12dd', 'seksi-penataan', '5842638e3539f98c1378a3cbae4ed0f1', '', '', 'Ka. Seksi Penataan Pertanahan', '', 'seksi@gmail.com', '', '', NULL, 'SEKSI', 'Seksi Penataan Pertanahan', '2019-10-03 02:28:59', '2019-10-03 02:28:59'),
(8, '841f331d-e53b-11e9-b357-2779ea2a12dd', 'seksi-pengadaan', '5842638e3539f98c1378a3cbae4ed0f1', '', '', 'Ka. Seksi Pengadaan Tanah', '', 'seksi@gmail.com', '', '', NULL, 'SEKSI', 'Seksi Pengadaan Tanah', '2019-10-03 02:29:04', '2019-10-03 02:29:04'),
(9, '841f448e-e53b-11e9-b357-2779ea2a12dd', 'seksi-penanganan', '5842638e3539f98c1378a3cbae4ed0f1', '', '', 'Ka. Seksi Penanganan Masalah dan Pengendalian Pertanahan', '', 'seksi@gmail.com', '', '', NULL, 'SEKSI', 'Seksi Penanganan Masalah dan Pengendalian Pertanahan', '2019-10-03 02:29:10', '2019-10-03 02:29:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `kd_role` varchar(25) NOT NULL,
  `sbg_role` varchar(80) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`kd_role`, `sbg_role`, `created_at`, `updated_at`) VALUES
('ADMIN', 'Administrator/Asisten Kakan', '2019-08-29 06:36:09', '2019-08-29 06:36:09'),
('LOKET', 'Loket Informasi', '2019-08-29 06:36:09', '2019-08-29 06:36:09'),
('SEKSI', 'Seksi', '2019-08-29 06:36:09', '2019-08-29 06:36:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id` int(11) NOT NULL,
  `suratkeluar_id` varchar(36) NOT NULL,
  `nmr_surat` varchar(100) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `nmr_agenda` varchar(100) NOT NULL,
  `jns_surat` varchar(100) NOT NULL,
  `ringkasan` varchar(200) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `tgl_dikirim` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(11) NOT NULL,
  `suratmasuk_id` varchar(36) NOT NULL,
  `nmr_surat` varchar(100) NOT NULL,
  `tgl_diterima` datetime NOT NULL,
  `nmr_agenda` varchar(100) NOT NULL,
  `asal_surat` text NOT NULL,
  `jns_surat` varchar(100) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `ringkasan` varchar(200) NOT NULL,
  `tkt_keamanan` varchar(25) NOT NULL,
  `tgl_penyelesaian` date DEFAULT NULL,
  `tindaklanjut` text NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_kd` (`counter_kd`);

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_role` (`kd_role`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`kd_role`);

--
-- Indeks untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`kd_role`) REFERENCES `role` (`kd_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
