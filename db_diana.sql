-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 03 Jun 2015 pada 14.04
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_diana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
`id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(80) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_dosen`
--

TRUNCATE TABLE `tb_dosen`;
--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`) VALUES
(1, 'Sumardi Karta Dinata As'),
(2, 'Leornado lamborgini'),
(3, 'Bagus Sadirja'),
(4, 'Sumarni Sembalo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
`id_jadwal` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `pukul` varchar(30) NOT NULL,
  `hari` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_jadwal`
--

TRUNCATE TABLE `tb_jadwal`;
--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_mk`, `id_dosen`, `id_kelas`, `pukul`, `hari`) VALUES
(1, 1, 1, 1, '11.00 - 12.40', '3'),
(2, 2, 2, 0, '10.00 - 11.40', '1'),
(3, 3, 3, 1, '08.00 - 10.30', '2'),
(4, 4, 4, 2, '11.00 - 01.30', '3'),
(5, 5, 1, 0, '10.00 - 12.30', '0'),
(6, 6, 2, 0, '08.00 - 09.40', '0'),
(7, 7, 3, 2, '08.00 - 10.30', '0'),
(8, 8, 4, 3, '10.00 - 12.30', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_kelas`
--

TRUNCATE TABLE `tb_kelas`;
--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'D 305'),
(2, 'E 301'),
(3, 'D 205'),
(4, 'A 202');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matakuliah`
--

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
`id_mk` int(11) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_matakuliah`
--

TRUNCATE TABLE `tb_matakuliah`;
--
-- Dumping data untuk tabel `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id_mk`, `nama_mk`, `sks`) VALUES
(1, 'Web Enterprise', 2),
(2, 'Kewarganegaraan', 2),
(3, 'Algortima dan Struktur Data', 3),
(4, 'Interaksi Manusia dan Komputer', 3),
(5, 'Enterprise dan Resource Planni', 3),
(6, 'Etika Bernegara', 2),
(7, 'Perancangan Basis Data', 3),
(8, 'Sistem Operasi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_option`
--

CREATE TABLE IF NOT EXISTS `tb_option` (
`id_option` int(11) NOT NULL,
  `option_key` varchar(140) NOT NULL,
  `option_value` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_option`
--

TRUNCATE TABLE `tb_option`;
--
-- Dumping data untuk tabel `tb_option`
--

INSERT INTO `tb_option` (`id_option`, `option_key`, `option_value`) VALUES
(1, 'changes_data', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_user`
--

TRUNCATE TABLE `tb_user`;
--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'root', 'smanuthamrin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
 ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
 ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `tb_option`
--
ALTER TABLE `tb_option`
 ADD PRIMARY KEY (`id_option`), ADD UNIQUE KEY `option_key` (`option_key`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_option`
--
ALTER TABLE `tb_option`
MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
