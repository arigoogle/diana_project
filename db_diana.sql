-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20 Jun 2015 pada 14.17
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
-- Struktur dari tabel `tb_ampu_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_ampu_dosen` (
  `id_ampu` int(11) NOT NULL,
  `id_mk` text NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
`id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(80) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  `hari` varchar(15) NOT NULL,
  `is_auto_generate` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=484 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matakuliah`
--

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
`id_mk` int(11) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_option`
--

CREATE TABLE IF NOT EXISTS `tb_option` (
`id_option` int(11) NOT NULL,
  `option_key` varchar(140) NOT NULL,
  `option_value` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=484;
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
