-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jun 2015 pada 09.49
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

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
  `id_ampu` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` text NOT NULL,
  `id_dosen` int(11) NOT NULL,
  PRIMARY KEY (`id_ampu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tb_ampu_dosen`
--

INSERT INTO `tb_ampu_dosen` (`id_ampu`, `id_mk`, `id_dosen`) VALUES
(1, '["3"]', 1),
(2, '["5","6","4"]', 2),
(3, '["7","8","1"]', 3),
(4, '["3","4","10"]', 4),
(5, '["7","9","8"]', 5),
(6, 'null', 6),
(7, '["11","8"]', 7),
(8, '["7"]', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(80) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `pukul` varchar(30) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `is_auto_generate` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1159 ;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_mk`, `id_dosen`, `id_kelas`, `pukul`, `hari`, `is_auto_generate`) VALUES
(1115, 7, 5, 3, '09.00 - 03.30', '0', 0),
(35, 8, 2, 2, '08.00 - 10.30', '4', 0),
(1157, 8, 7, 3, '10.00 - 12.30', '2', 1),
(1156, 7, 7, 1, '11.00 - 13.30', '2', 1),
(1155, 11, 7, 5, '13.00 - 15.30', '4', 1),
(1154, 10, 7, 1, '10.00 - 12.30', '3', 1),
(1153, 4, 7, 3, '13.00 - 15.30', '4', 1),
(1152, 10, 4, 3, '10.00 - 03.30', '2', 1),
(1151, 9, 7, 0, '13.00 - 15.30', '4', 1),
(1158, 3, 4, 1, '08.00 - 03.30', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
  `id_mk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  PRIMARY KEY (`id_mk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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

CREATE TABLE IF NOT EXISTS `tb_option` (
  `id_option` int(11) NOT NULL AUTO_INCREMENT,
  `option_key` varchar(140) NOT NULL,
  `option_value` text NOT NULL,
  PRIMARY KEY (`id_option`),
  UNIQUE KEY `option_key` (`option_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'masvio', '202cb962ac59075b964b07152d234b70'),
(2, 'UPJ', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
