-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 Mar 2019 pada 14.50
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(6) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`) VALUES
(10, 'Petugas01', '$2y$10$UoJjS8hK5uJgNERTmydNXels6sX6aLViBloxjuZR/A8Gpiv4Z/FIu'),
(11, 'Risma Septiani', '$2y$10$YIFmVjdjZkED9FXBBArSLuDQuf83g8VBrP7oq/OhfR7rD6eYgkj.m'),
(12, 'Faraz Arrahman', '$2y$10$Oo2qC3aSsbc3WKEO.L7rzuU.Zmdf23Yf2.IhyfXSmByvcL4FICBOC'),
(13, 'Ilyas Walida Fasa', '$2y$10$/obiQi4flJjIvSTNL7aODeMCyAmipYWTR/2cDHJX1mEyr7dzEd6zu'),
(14, 'Tarysa Akfini', '$2y$10$GUrnk8E89nbsO6/oxLvp0.tEqHtqF1copNVujOYypsH.zf/NHkuMC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id` int(6) NOT NULL,
  `tanggal_entry` date DEFAULT NULL,
  `nomor_anggota` varchar(15) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_anggota`
--

INSERT INTO `t_anggota` (`id`, `tanggal_entry`, `nomor_anggota`, `nama`, `alamat`, `email`, `no_telp`) VALUES
(1141, NULL, 'AG-001', 'Risma ', 'Bandung', 'risma@gmail.com', '12345511'),
(1142, NULL, 'AG-002', 'Dindin', 'Katapang', 'dindin00@gmail.com', '0897816'),
(1143, NULL, 'AG-004', 'Ari Abdul Faqih', 'Katapang Permai', 'arimangprang@gmail.com', '089171567816'),
(1144, NULL, 'AG-9999', 'Hermawan Dermawan', 'Soreang', 'hermawan66@gmail.com', '0876561111'),
(1145, '2019-03-02', 'AG-4444', 'Arisal Erlangga', 'Cincin Permata Indah', 'elnino142@gmail.com', '087276725719'),
(1146, '2019-03-13', 'AG-112', 'Alfiyani Nurul Huda', 'Bojong Sero', 'alfiyahnurulhuda@gmail.co', '081189787811'),
(1147, '2019-03-04', 'AG-222', 'Zenia Aurima', 'Gading Tutuka 1', 'zeniazeze@gmail.com', '082289891801');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku`
--

CREATE TABLE `t_buku` (
  `id` int(6) NOT NULL,
  `kode_buku` varchar(10) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `pengarang` varchar(25) DEFAULT NULL,
  `penerbit` varchar(30) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `jml_copy` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_buku`
--

INSERT INTO `t_buku` (`id`, `kode_buku`, `judul`, `pengarang`, `penerbit`, `tahun`, `jml_copy`) VALUES
(24, 'B001', 'RPL1', 'Amir', 'Erlangga', '2020', 1),
(25, 'HJ-101', 'Hijrah Jahro', 'Alya Annisa', 'Erlangga', '2040', 1),
(26, 'K89011', 'Kimia', 'Evi Laili', 'Gramedia', '2014', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku_detail`
--

CREATE TABLE `t_buku_detail` (
  `id` int(6) NOT NULL,
  `id_buku` int(6) DEFAULT NULL,
  `nomor_registrasi` varchar(10) DEFAULT NULL,
  `status_tersedia` int(1) DEFAULT NULL,
  `dipinjam_oleh` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_buku_detail`
--

INSERT INTO `t_buku_detail` (`id`, `id_buku`, `nomor_registrasi`, `status_tersedia`, `dipinjam_oleh`) VALUES
(52, 24, 'RB001', 1, NULL),
(54, 25, 'REG-9912', 1, NULL),
(55, 26, 'REG551', 0, 1147);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sirkulasi`
--

CREATE TABLE `t_sirkulasi` (
  `id` int(6) NOT NULL,
  `tanggal_entry` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `kode_sirkulasi` varchar(10) DEFAULT NULL,
  `id_anggota` int(6) DEFAULT NULL,
  `id_buku_detail` int(6) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_batas_kembali` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` decimal(6,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sirkulasi`
--

INSERT INTO `t_sirkulasi` (`id`, `tanggal_entry`, `kode_sirkulasi`, `id_anggota`, `id_buku_detail`, `tanggal_pinjam`, `tanggal_batas_kembali`, `tanggal_kembali`, `denda`) VALUES
(78, '2019-01-29 09:37:03', '000001', 1141, 52, '2019-01-29', '2019-02-05', '2019-01-29', '1000'),
(79, '2019-01-29 09:39:01', '000002', 1142, 53, '2019-01-29', '2019-02-05', '2019-01-29', '5000'),
(80, '0000-00-00 00:00:00', '000003', 1147, 55, '2019-03-04', '2019-03-11', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomor_anggota` (`nomor_anggota`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `t_buku_detail`
--
ALTER TABLE `t_buku_detail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`),
  ADD KEY `fk_buku` (`id_buku`);

--
-- Indexes for table `t_sirkulasi`
--
ALTER TABLE `t_sirkulasi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku_detail` (`id_buku_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1148;
--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `t_buku_detail`
--
ALTER TABLE `t_buku_detail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `t_sirkulasi`
--
ALTER TABLE `t_sirkulasi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_sirkulasi`
--
ALTER TABLE `t_sirkulasi`
  ADD CONSTRAINT `t_sirkulasi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `t_anggota` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
