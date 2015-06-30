-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30 Jun 2015 pada 04.01
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

DROP TABLE IF EXISTS `tb_ampu_dosen`;
CREATE TABLE IF NOT EXISTS `tb_ampu_dosen` (
`id_ampu` int(11) NOT NULL,
  `id_mk` text NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_ampu_dosen`
--

TRUNCATE TABLE `tb_ampu_dosen`;
--
-- Dumping data untuk tabel `tb_ampu_dosen`
--

INSERT INTO `tb_ampu_dosen` (`id_ampu`, `id_mk`, `id_dosen`) VALUES
(4, '["3","4","10"]', 4),
(5, '["7","9","8"]', 5),
(7, '["11","8"]', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

DROP TABLE IF EXISTS `tb_dosen`;
CREATE TABLE IF NOT EXISTS `tb_dosen` (
`id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(80) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_dosen`
--

TRUNCATE TABLE `tb_dosen`;
--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`) VALUES
(7, 'Mohammad Nasucha'),
(5, 'Hendi Hermawan'),
(4, 'Prio Handoko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

DROP TABLE IF EXISTS `tb_jadwal`;
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
`id_jadwal` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jam_awal` varchar(20) NOT NULL,
  `jam_akhir` varchar(20) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `is_auto_generate` tinyint(1) NOT NULL,
  `s` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=275 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_jadwal`
--

TRUNCATE TABLE `tb_jadwal`;
--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_mk`, `id_dosen`, `id_kelas`, `jam_awal`, `jam_akhir`, `hari`, `is_auto_generate`, `s`) VALUES
(274, 8, 7, 3, '1433592000', '1433601000', '0', 1, '2015-06-30 01:48:58'),
(273, 7, 5, 2, '1433592000', '1433601000', '1', 1, '2015-06-30 01:48:58'),
(272, 11, 7, 5, '1433592000', '1433601000', '3', 1, '2015-06-30 01:48:58'),
(271, 10, 4, 2, '1433570400', '1433579400', '0', 1, '2015-06-30 01:48:58'),
(270, 4, 4, 5, '1433592000', '1433601000', '2', 1, '2015-06-30 01:48:58'),
(269, 3, 4, 2, '1433574000', '1433583000', '4', 1, '2015-06-30 01:48:58'),
(268, 9, 5, 6, '1433577600', '1433586600', '0', 1, '2015-06-30 01:48:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE IF NOT EXISTS `tb_kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_kelas`
--

TRUNCATE TABLE `tb_kelas`;
--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'B301'),
(2, 'B302'),
(3, 'B303'),
(4, 'B304'),
(5, 'B305'),
(6, 'B306');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matakuliah`
--

DROP TABLE IF EXISTS `tb_matakuliah`;
CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
`id_mk` int(11) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_matakuliah`
--

TRUNCATE TABLE `tb_matakuliah`;
--
-- Dumping data untuk tabel `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id_mk`, `nama_mk`, `sks`) VALUES
(9, 'Rekayasa Perangkat Lunak', 3),
(3, 'Algortima dan Struktur Data', 3),
(4, 'Interaksi Manusia dan Komputer', 3),
(10, 'Quality Assurance', 3),
(11, 'Bahasa C+', 3),
(7, 'Perancangan Basis Data', 3),
(8, 'Sistem Operasi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_option`
--

DROP TABLE IF EXISTS `tb_option`;
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

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
`id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_user`
--

TRUNCATE TABLE `tb_user`;
--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'masvio', '202cb962ac59075b964b07152d234b70'),
(2, 'UPJ', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ampu_dosen`
--
ALTER TABLE `tb_ampu_dosen`
 ADD PRIMARY KEY (`id_ampu`);

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
-- AUTO_INCREMENT for table `tb_ampu_dosen`
--
ALTER TABLE `tb_ampu_dosen`
MODIFY `id_ampu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_option`
--
ALTER TABLE `tb_option`
MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
