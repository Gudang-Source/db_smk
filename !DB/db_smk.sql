-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Feb 2019 pada 03.48
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nip` int(11) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_tlp`, `jenis_kelamin`) VALUES
(1, 'guru', 'Ridwan', 'Cilebut', '2019-02-21', 'ngauu2x@duy.com', '081234567890', 'L'),
(2, 'guru', 'Purwa Sabrang Ramadhan', 'Jakarta', '2000-11-29', 'purwa.sabrang@gmail.com', '081283854955', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'XII-RPL 2 '),
(2, 'XII-RPL 1  '),
(4, 'XII-RPL-3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia '),
(3, 'Bahasa inggris'),
(5, 'Bahasa jepang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `harian` int(5) NOT NULL,
  `uts` int(5) NOT NULL,
  `uas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_pengajar`, `nis`, `harian`, `uts`, `uas`) VALUES
(1, 1, 1, 1, 2, 3),
(20, 26, 1, 1, 2, 3),
(23, 24, 3, 0, 0, 0),
(24, 1, 2, 2, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajar`
--

CREATE TABLE `tbl_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`id_pengajar`, `nip`, `id_mapel`, `id_kelas`) VALUES
(1, 1, 1, 1),
(24, 2, 1, 4),
(25, 2, 2, 4),
(26, 1, 2, 1),
(27, 1, 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_tlp`, `jenis_kelamin`, `id_kelas`) VALUES
(1, 'siswa', 'Yuda Aduy', 'Pemda', '2019-02-22', 'aduy@duy.com', '098123', 'L', 1),
(2, 'siswa', 'rio', 'pemda', '2019-02-23', 'rio@aduy.com', '0989', 'L', 1),
(3, 'siswa', 'Maul', 'Rumah Nenek', '2019-01-30', 'maul@duy.com', '081111111111', 'L', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_mapel_2` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
