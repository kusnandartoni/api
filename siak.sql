-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2018 at 08:29 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul`, `tanggal`, `gambar`, `isi`) VALUES
(4, 'Artikel Pertama', '2018-05-30', 'lokasi gambar artikel pertama', 'ini isinya artikel pertama'),
(9, 'Artikel kedua', '2018-05-31', '2323', '1231'),
(10, 'ARTIKEL kesekian', '2018-05-31', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kd_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `nama_kelas`) VALUES
('1a', 'I A'),
('1b', 'I B'),
('1c', 'I C'),
('2a', 'II A'),
('2b', 'II B'),
('2c', 'II C'),
('3a', 'III A'),
('3b', 'III B'),
('3c', 'III C'),
('4a', 'IV A'),
('4b', 'IV B'),
('4c', 'IV C'),
('5a', 'V A'),
('5b', 'V B'),
('5c', 'V C'),
('6a', 'VI A'),
('6b', 'VI B'),
('6c', 'VI C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_siswa`
--

CREATE TABLE `tb_kelas_siswa` (
  `periode` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kd_kelas` varchar(20) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `semester` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas_siswa`
--

INSERT INTO `tb_kelas_siswa` (`periode`, `nisn`, `kd_kelas`, `tahun_ajaran`, `semester`) VALUES
('20132', '0123', '1a', '2013/2014', '1'),
('20132', '1111', '1a', '2013/2014', '1'),
('20132', '6', '1a', '2013/2014', '1'),
('20171', '6', '1a', '2017/2018', '2'),
('20172', '0123', '1a', '2017/2018', '1'),
('20172', '6', '1b', '2017/2018', '1'),
('20182', '1', '1a', '2018/2019', '1'),
('20182', '10', '1a', '2018/2019', '1'),
('20182', '2', '1a', '2018/2019', '1'),
('20182', '3', '1a', '2018/2019', '1'),
('20182', '4', '1a', '2018/2019', '1'),
('20182', '5', '1a', '2018/2019', '1'),
('20182', '6', '1a', '2018/2019', '1'),
('20182', '7', '1a', '2018/2019', '1'),
('20182', '8', '1a', '2018/2019', '1'),
('20182', '9', '1a', '2018/2019', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_siswa_pelajaran`
--

CREATE TABLE `tb_kelas_siswa_pelajaran` (
  `periode` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kd_pelajaran` varchar(5) NOT NULL,
  `kkm` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas_siswa_pelajaran`
--

INSERT INTO `tb_kelas_siswa_pelajaran` (`periode`, `nisn`, `kd_pelajaran`, `kkm`, `nilai`) VALUES
('20132', '0123', 'BAR', 65, 46),
('20132', '1111', 'BAR', 65, 47),
('20132', '6', 'BAR', 65, 90),
('20132', '6', 'MTK', 65, 90),
('20182', '1', 'BAR', 65, 90),
('20182', '1', 'BID', 0, 0),
('20182', '1', 'BIN', 0, 0),
('20182', '1', 'IPA', 0, 0),
('20182', '1', 'IPS', 0, 0),
('20182', '1', 'MTK', 0, 0),
('20182', '1', 'PAG', 0, 0),
('20182', '10', 'BAR', 65, 98),
('20182', '10', 'BID', 0, 0),
('20182', '10', 'BIN', 0, 0),
('20182', '10', 'IPA', 0, 0),
('20182', '10', 'IPS', 0, 0),
('20182', '10', 'MTK', 0, 0),
('20182', '10', 'PAG', 0, 0),
('20182', '2', 'BAR', 65, 87),
('20182', '2', 'BID', 0, 0),
('20182', '2', 'BIN', 0, 0),
('20182', '2', 'IPA', 0, 0),
('20182', '2', 'IPS', 0, 0),
('20182', '2', 'MTK', 0, 0),
('20182', '2', 'PAG', 0, 0),
('20182', '3', 'BAR', 65, 89),
('20182', '3', 'BID', 0, 0),
('20182', '3', 'BIN', 0, 0),
('20182', '3', 'IPA', 0, 0),
('20182', '3', 'IPS', 0, 0),
('20182', '3', 'MTK', 0, 0),
('20182', '3', 'PAG', 0, 0),
('20182', '4', 'BAR', 65, 76),
('20182', '4', 'BID', 0, 0),
('20182', '4', 'BIN', 0, 0),
('20182', '4', 'IPA', 0, 0),
('20182', '4', 'IPS', 0, 0),
('20182', '4', 'MTK', 0, 0),
('20182', '4', 'PAG', 0, 0),
('20182', '5', 'BAR', 65, 87),
('20182', '5', 'BID', 0, 0),
('20182', '5', 'BIN', 0, 0),
('20182', '5', 'IPA', 0, 0),
('20182', '5', 'IPS', 0, 0),
('20182', '5', 'MTK', 0, 0),
('20182', '5', 'PAG', 0, 0),
('20182', '6', 'BAR', 65, 76),
('20182', '6', 'BID', 65, 80),
('20182', '6', 'BIN', 70, 90),
('20182', '6', 'IPA', 50, 95),
('20182', '6', 'IPS', 65, 80),
('20182', '6', 'MTK', 60, 80),
('20182', '6', 'PAG', 65, 90),
('20182', '7', 'BAR', 65, 65),
('20182', '7', 'BID', 0, 0),
('20182', '7', 'BIN', 0, 0),
('20182', '7', 'IPA', 0, 0),
('20182', '7', 'IPS', 0, 0),
('20182', '7', 'MTK', 0, 0),
('20182', '7', 'PAG', 0, 0),
('20182', '8', 'BAR', 65, 76),
('20182', '8', 'BID', 0, 0),
('20182', '8', 'BIN', 0, 0),
('20182', '8', 'IPA', 0, 0),
('20182', '8', 'IPS', 0, 0),
('20182', '8', 'MTK', 0, 0),
('20182', '8', 'PAG', 0, 0),
('20182', '9', 'BAR', 65, 78),
('20182', '9', 'BID', 0, 0),
('20182', '9', 'BIN', 0, 0),
('20182', '9', 'IPA', 0, 0),
('20182', '9', 'IPS', 0, 0),
('20182', '9', 'MTK', 0, 0),
('20182', '9', 'PAG', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelajaran`
--

CREATE TABLE `tb_pelajaran` (
  `kd_pelajaran` varchar(5) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelajaran`
--

INSERT INTO `tb_pelajaran` (`kd_pelajaran`, `nama_pelajaran`) VALUES
('BAR', 'Bahasa Arab'),
('BID', 'Bahasa Indonesia'),
('BIN', 'Bahasa Inggris'),
('IPA', 'Ilmu Pengetahuan Alam'),
('IPS', 'Ilmu Pengetahuan Sosial'),
('MTK', 'Matematika'),
('PAG', 'Pendidikan Agama'),
('PJK', 'Pendidikan Jasmani dan Kesehatan'),
('PKN', 'Pendidikan Kewarganegaraan'),
('SBK', 'Seni Budaya dan Keterampilan'),
('TIK', 'Teknologi Informasi dan Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`nama`, `alamat`, `telp`, `fax`, `email`) VALUES
('SDN PONDOK CABE ILIR ', 'Jl. SDN RT 01/ RW 02, cilandak, jakarta selatan, dki jakarta (12450)', '021-7654321', '021-7654321', 'admin@sdn.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL DEFAULT '-',
  `agama` varchar(20) NOT NULL DEFAULT '-',
  `alamat` text,
  `nama_ayah` varchar(255) NOT NULL DEFAULT '-',
  `nama_ibu` varchar(255) NOT NULL DEFAULT '-',
  `pekerjaan_ayah` varchar(255) NOT NULL DEFAULT '-',
  `pekerjaan_ibu` varchar(255) NOT NULL DEFAULT '-',
  `alamat_ortu` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nama`, `tgl_lahir`, `tpt_lahir`, `agama`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`) VALUES
('1', 'siswa1', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('10', 'siswa10', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('11', 'siswa11', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('12', 'siswa12', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('13', 'siswa13', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('14', 'siswa14', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('15', 'siswa15', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('16', 'siswa16', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('17', 'siswa17', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('18', 'siswa18', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('19', 'siswa19', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('2', 'siswa2', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('3', 'siswa3', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('4', 'siswa4', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('5', 'siswa5', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('6', 'siswa6', '2018-07-12', 'jakarta', 'islam', 'jl lingkar luar no 15', '-', '-', '-', '-', ''),
('7', 'siswa7', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('8', 'siswa8', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL),
('9', 'siswa9', '2018-07-12', '-', '-', NULL, '-', '-', '-', '-', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tb_kelas_siswa`
--
ALTER TABLE `tb_kelas_siswa`
  ADD PRIMARY KEY (`periode`,`nisn`);

--
-- Indexes for table `tb_kelas_siswa_pelajaran`
--
ALTER TABLE `tb_kelas_siswa_pelajaran`
  ADD PRIMARY KEY (`periode`,`nisn`,`kd_pelajaran`);

--
-- Indexes for table `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  ADD PRIMARY KEY (`kd_pelajaran`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
