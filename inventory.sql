-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2022 pada 06.04
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(5, 'ade', 'ade', 'ade fenna suryanna', 'gambar_admin/adefenna.jpeg'),
(7, 'admin', 'admin', 'admin', 'gambar_admin/avatar5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_alat` int(6) NOT NULL,
  `kd_alat` varchar(20) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `tgl_msk` date NOT NULL,
  `merk` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `dipinjamkan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_alat`, `kd_alat`, `nama_alat`, `tgl_msk`, `merk`, `satuan`, `lokasi`, `kondisi`, `keterangan`, `kategori`, `dipinjamkan`) VALUES
(10019, 'TKJ001', 'sendok', '2021-12-16', 'china', 'lusin', 'ruang alat', 'Baik', 'Baru', 'Tak Habis Pakai', 'Ya'),
(10022, 'TKJ002', 'garpu', '2021-12-16', '-', '-', '-', 'Baik', 'Baru', 'Tak Habis Pakai', 'Ya'),
(10024, 'TKJ003', 'korek', '2021-12-31', 'alfamart', '-', 'ruang alat', 'Baik', 'baru', 'Habis Pakai', 'Ya'),
(10025, 'TKJ004', 'stempel', '2021-12-01', '-', 'Unit', 'ruang alat', 'Baik', 'baru', 'Tak Habis Pakai', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `pinjam` varchar(50) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  `baik` varchar(10) DEFAULT NULL,
  `rusak` varchar(10) DEFAULT NULL,
  `pinjam1` varchar(50) DEFAULT NULL,
  `jumlah1` varchar(10) DEFAULT NULL,
  `baik1` varchar(10) DEFAULT NULL,
  `rusak1` varchar(10) DEFAULT NULL,
  `pinjam2` varchar(50) DEFAULT NULL,
  `jumlah2` varchar(10) DEFAULT NULL,
  `baik2` varchar(10) DEFAULT NULL,
  `rusak2` varchar(10) DEFAULT NULL,
  `pinjam3` varchar(50) DEFAULT NULL,
  `jumlah3` varchar(10) DEFAULT NULL,
  `baik3` varchar(10) DEFAULT NULL,
  `rusak3` varchar(10) DEFAULT NULL,
  `tgl_pinjam` varchar(255) DEFAULT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jabatan` varchar(10) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kembali`
--

INSERT INTO `kembali` (`id`, `nama`, `jenis_kelamin`, `kelas`, `pinjam`, `jumlah`, `baik`, `rusak`, `pinjam1`, `jumlah1`, `baik1`, `rusak1`, `pinjam2`, `jumlah2`, `baik2`, `rusak2`, `pinjam3`, `jumlah3`, `baik3`, `rusak3`, `tgl_pinjam`, `tgl_kembali`, `jabatan`, `status`) VALUES
('', 'bagus', 'L', 'X TKJ 4', 'router', '28', NULL, NULL, 'router', '67', NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '2021-11-11 06:34:26', 'Siswa', 'PENDING'),
('5', 'sentuno', 'L', 'X TKJ 1', 'Access Point', '3', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-09 13:02:48', '2021-11-11 06:11:19', 'Siswa', 'PENDING'),
('6', 'ade', 'L', 'X TKJ 1', 'Access Point', '3', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-10 10:42:32', '2021-11-11 06:12:25', 'Siswa', 'PENDING'),
('7', 'ardi', 'L', 'XII TKJ 5', 'thermal', '10', '10', '0', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-10 09:07:10', '2021-11-11 06:12:25', 'Siswa', 'DIKEMBALIKAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali1`
--

CREATE TABLE `kembali1` (
  `id` int(255) NOT NULL,
  `baik` varchar(10) DEFAULT NULL,
  `rusak` varchar(10) DEFAULT NULL,
  `baik1` varchar(10) DEFAULT NULL,
  `rusak1` varchar(10) DEFAULT NULL,
  `baik2` varchar(10) DEFAULT NULL,
  `rusak2` varchar(10) DEFAULT NULL,
  `baik3` varchar(10) DEFAULT NULL,
  `rusak3` varchar(10) DEFAULT NULL,
  `tgl_kembali` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kembali1`
--

INSERT INTO `kembali1` (`id`, `baik`, `rusak`, `baik1`, `rusak1`, `baik2`, `rusak2`, `baik3`, `rusak3`, `tgl_kembali`) VALUES
(1, '-2', '1', '0', '1', '', '', '', '', '2021-11-14 03:27:29'),
(2, '-2', '1', '1', '1', '2', '1', '3', '1', '2021-11-14 03:34:27'),
(3, '2', '1', '4', '1', '1', '1', '0', '1', '2021-11-14 04:48:22'),
(4, '13', '0', '7', '0', '8', '0', '11', '0', '2021-11-16 02:47:02'),
(7, '0', '1', '0', '1', '0', '1', '0', '1', '2021-11-16 02:48:28'),
(23, '1', '0', '1', '0', '1', '0', '1', '0', '2021-11-14 04:55:48'),
(24, '100', '0', '9', '0', '1', '0', '', '', '2021-11-30 10:27:13'),
(27, '12', '0', '', '', '', '', '', '', '2022-01-31 05:02:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `pinjam` varchar(50) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  `pinjam1` varchar(50) DEFAULT NULL,
  `jumlah1` varchar(10) DEFAULT NULL,
  `pinjam2` varchar(50) DEFAULT NULL,
  `jumlah2` varchar(10) DEFAULT NULL,
  `pinjam3` varchar(50) DEFAULT NULL,
  `jumlah3` varchar(10) DEFAULT NULL,
  `tgl_pinjam` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jabatan` varchar(10) NOT NULL,
  `status` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `nama`, `jenis_kelamin`, `kelas`, `pinjam`, `jumlah`, `pinjam1`, `jumlah1`, `pinjam2`, `jumlah2`, `pinjam3`, `jumlah3`, `tgl_pinjam`, `jabatan`, `status`) VALUES
(1, 'ade', 'L', 'X TKJ 1', 'router', '-1', 'router', '1', '', '', '', '', '2021-11-14 03:27:29', 'Siswa', 'DIKONFIRMASI'),
(2, 'bagus', 'L', 'X TKJ 2', 'router', '-1', 'router', '2', 'router', '3', 'router', '4', '2021-11-14 02:50:38', 'Guru', 'DIKEMBALIKAN'),
(3, 'SABTU', 'L', 'X TKJ 2', 'router', '3', 'router', '5', 'router', '2', 'router', '1', '2021-11-14 02:58:43', 'Siswa', 'DIKONFIRMASI'),
(4, 'ade fenna', 'L', '-- Pilih S', 'router', '13', 'router', '7', 'router', '8', 'router', '11', '2021-11-14 03:05:42', 'Siswa', 'DIKEMBALIKAN'),
(5, 'a', 'L', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 06:10:27', 'Guru', ''),
(6, 'b', 'L', 'X TKJ 1', 'router', '100', 'router', '10', '', '', '', '', '2021-11-13 06:10:27', 'Guru', ''),
(7, 'c', 'L', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 06:10:27', 'Siswa', 'PENDING'),
(8, 'ade fenna', 'L', 'X TKJ 2', 'router', '-2', 'router', '-1', 'router', '-1', 'router', '-1', '2021-11-13 06:10:27', 'Siswa', ''),
(9, 'd', 'P', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 06:10:27', 'Guru', ''),
(10, 'e', 'P', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 05:25:00', 'Siswa', ''),
(11, 'f', 'L', 'XI TKJ 5', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 05:25:00', 'Siswa', ''),
(12, 'g', 'P', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 05:25:00', 'Siswa', ''),
(13, 'h', 'L', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 06:10:27', 'Siswa', ''),
(14, 'i', 'L', 'X TKJ 2', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 06:10:27', 'Guru', ''),
(15, 'jodi', 'L', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-13 06:10:27', 'Siswa', ''),
(16, 'nurul', 'P', '-- Pilih S', 'router', '10', 'router', '20', 'router', '18', 'router', '31', '0000-00-00 00:00:00', 'Guru', 'KEMBALIKAN'),
(17, 'ema', 'P', 'X TKJ 3', 'router', '8', 'router', '7', 'router', '6', 'router', '10', '0000-00-00 00:00:00', 'Siswa', 'KEMBALIKAN'),
(18, 'bejo', 'L', '-- Pilih S', 'router', '15', 'router', '11', 'router', '3', 'router', '5', '0000-00-00 00:00:00', 'Guru', 'KEMBALIKAN'),
(19, 'umaroh', 'P', '', 'router', '3', 'router', '1', 'router', '1', 'router', '1', '0000-00-00 00:00:00', 'Guru', '14-11-2021 1'),
(20, 'sukaena', 'P', '', 'router', '3', 'router', '1', 'router', '3', 'router', '5', '0000-00-00 00:00:00', 'Guru', 'KEMBALIKAN'),
(21, 'eni', 'P', '', 'router', '10', 'router', '1', 'router', '8', 'router', '5', '2021-11-14 04:18:39', 'Guru', 'KEMBALIKAN'),
(22, 'supat', 'L', 'X TKJ 1', 'router', '1', 'router', '5', 'router', '5', 'router', '2', '2021-11-14 04:28:23', 'Siswa', 'BELUM DIKEMBALIKA'),
(23, 'supat', 'L', 'X TKJ 1', 'router', '1', 'router', '1', 'router', '1', 'router', '1', '2021-11-14 04:29:36', 'Siswa', 'DIKEMBALIKAN'),
(24, 'fathan', 'L', '', 'router', '100', 'router', '9', 'router', '1', '', '', '2021-11-30 10:25:41', 'Guru', 'DIKEMBALIKAN'),
(25, 'fathan aditya rizki', 'L', 'X TKJ 1', 'router', '1', 'router', '3', '', '', '', '', '2021-12-02 07:23:31', 'Siswa', 'BELUM DIKEMBALIKAN'),
(26, '123', 'L', 'XII TKJ 2', '(TKJ003)korek', '10', '', '', '', '', '', '', '2022-01-31 04:58:01', 'Siswa', 'BELUM DIKEMBALIKAN'),
(27, '123456', 'L', 'X TKJ 2', '(TKJ004)stempel', '12', '', '', '', '', '', '', '2022-01-31 04:59:49', 'Siswa', 'DIKEMBALIKAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam1`
--

CREATE TABLE `pinjam1` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `pinjam` varchar(50) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  `pinjam1` varchar(50) DEFAULT NULL,
  `jumlah1` varchar(10) DEFAULT NULL,
  `pinjam2` varchar(50) DEFAULT NULL,
  `jumlah2` varchar(10) DEFAULT NULL,
  `pinjam3` varchar(50) DEFAULT NULL,
  `jumlah3` varchar(10) DEFAULT NULL,
  `tgl_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jabatan` varchar(10) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pinjam1`
--

INSERT INTO `pinjam1` (`id`, `nama`, `jenis_kelamin`, `kelas`, `pinjam`, `jumlah`, `pinjam1`, `jumlah1`, `pinjam2`, `jumlah2`, `pinjam3`, `jumlah3`, `tgl_pinjam`, `jabatan`, `status`) VALUES
(5, 'sentuno', 'L', 'X TKJ 1', 'Access Point', '', '3', NULL, '3', NULL, '0', NULL, '2021-11-09 06:02:48', 'Siswa', 'PENDING'),
(6, 'ade', 'L', 'X TKJ 1', 'Access Point', '', '3', NULL, '3', NULL, '0', NULL, '2021-11-10 03:42:32', 'Siswa', 'PENDING'),
(7, 'ardi', 'L', 'XII TKJ 5', 'thermal', '', '10', NULL, '10', NULL, '0', NULL, '2021-11-10 02:07:10', 'Siswa', 'PENDING'),
(8, 'jodi', 'L', 'XII TKJ 3', 'Paku', '', '50', NULL, '50', NULL, '0', NULL, '2021-11-10 02:52:17', 'Siswa', 'PENDING'),
(9, 'bayu', 'L', 'X TKJ 1', 'botol', '', '50', NULL, '50', NULL, '0', NULL, '2021-11-11 05:07:19', 'Siswa', 'PENDING'),
(10, 'fathan', 'L', 'X TKJ 2', 'botol', '', '10', NULL, '10', NULL, '0', NULL, '2021-11-10 05:17:37', 'Siswa', ''),
(11, 'naufal', 'L', 'X TKJ 2', 'router-3', '', 'router-10', NULL, 'Pilih Barang Akan Dipinjam-', NULL, 'Pilih Barang Akan Dipinjam-', NULL, '2021-11-11 03:16:52', 'Siswa', ''),
(12, 'duta', 'L', 'X TKJ 4', 'router(30)', '', 'router-144', NULL, '-', NULL, '-', NULL, '2021-11-11 03:25:33', 'Siswa', ''),
(13, 'labib', 'L', 'X TKJ 1', 'router', '37', 'router', '50', '', '', '', '', '2021-11-11 05:06:23', 'Siswa', 'PENDING'),
(14, 'sentini', 'P', 'X TKJ 1', 'router', '1', 'router', '-1', '', '', '', '', '2021-11-11 06:53:18', 'Siswa', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kembali1`
--
ALTER TABLE `kembali1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam1`
--
ALTER TABLE `pinjam1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_alat` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10026;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pinjam1`
--
ALTER TABLE `pinjam1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kembali1`
--
ALTER TABLE `kembali1`
  ADD CONSTRAINT `kembali1_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pinjam` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
