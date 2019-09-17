-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 05:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_sppd.v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(4) NOT NULL,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin2', 'operator'),
(2, 'kabag', 'camat1', 'kabag');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(5) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `id_golongan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `id_tujuan`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES
(1, '1-2-3-4-5-6-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31-32', '250000', '0', '0', '2'),
(2, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '250000', '0', '0', '3'),
(3, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '250000', '0', '0', '17'),
(4, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '250000', '0', '0', '18'),
(5, '1-2-3-4-5-6-7-8-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '250000', '0', '0', '19'),
(6, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '200000', '0', '0', '7'),
(7, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '200000', '0', '0', '6'),
(9, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '200000', '0', '0', '5'),
(10, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '200000', '0', '0', '4'),
(11, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '175000', '0', '0', '12'),
(12, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '175000', '0', '0', '13'),
(13, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '175000', '0', '0', '14'),
(14, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '175000', '0', '0', '15'),
(15, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '125000', '0', '0', '8'),
(16, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '125000', '0', '0', '9'),
(17, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '125000', '0', '0', '10'),
(18, '1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23-24-25-26-27-28-29-30-31', '125000', '0', '0', '11'),
(19, '5', '100000', '100000', '50000', '17');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(10) NOT NULL,
  `golongan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`) VALUES
(2, 'IV/b'),
(3, 'IV/a'),
(4, 'III/d'),
(5, 'III/c'),
(6, 'III/b'),
(7, 'III/a'),
(8, 'I/a'),
(9, 'I/b'),
(10, 'I/c'),
(11, 'I/d'),
(12, 'II/a'),
(13, 'II/b'),
(14, 'II/c'),
(15, 'II/d'),
(16, 'IVc'),
(17, 'IV/c'),
(18, 'IV/d'),
(19, 'IV/e');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id_kwitansi` int(11) NOT NULL,
  `id_sppd` int(4) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `dari` text NOT NULL,
  `untuk` text NOT NULL,
  `lama` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_sppd`, `id_pegawai`, `dari`, `untuk`, `lama`, `lumpsum`, `penginapan`, `transportasi`, `tujuan`) VALUES
(3, 114, '13', '		  KUASA PENGGUNA ANGGARAN / KEPALA BAGIAN KESEJAHTERAAN RAKYAT SEKRETARIAT DAERAH KECAMATAN MARGAHAYU', 'Perjalanan Dinas Ke Soreang', '1', '200000', '0', '0', 'Kecamatan Soreang');

-- --------------------------------------------------------

--
-- Table structure for table `lpd`
--

CREATE TABLE `lpd` (
  `id_lpd` int(5) NOT NULL,
  `id_spt` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `hasil` text NOT NULL,
  `hari` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpd`
--

INSERT INTO `lpd` (`id_lpd`, `id_spt`, `id_pegawai`, `hasil`, `hari`, `tanggal`) VALUES
(1, 66, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : \r\n		  1. Rapat Sosialisasi', 'Rabu', '2019-09-11'),
(2, 63, 31, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : \r\n		  1. musyawarah\r\n                ', 'Jumat', '2019-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `nppt`
--

CREATE TABLE `nppt` (
  `id_nppt` int(5) NOT NULL,
  `id_pegawai` varchar(60) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `maksud` text NOT NULL,
  `id_transportasi` varchar(100) NOT NULL,
  `lama` varchar(25) NOT NULL,
  `tgl_pergi` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nppt`
--

INSERT INTO `nppt` (`id_nppt`, `id_pegawai`, `id_tujuan`, `maksud`, `id_transportasi`, `lama`, `tgl_pergi`, `tgl_kembali`, `status`) VALUES
(87, '1-15', '3', 'Melaksanakan Kegiatan Sosialisasi Program Keluarga Harapan (PKH) Tahun 2016 di Kecamatan Rangsang', '1-3', '5', '2016-05-30', '2016-07-26', 'Y'),
(89, '29-30', '12', 'Rapat dana', '4', '1', '2019-12-20', '2019-12-21', 'Y'),
(90, '31', '5', 'Mengikuti Acara Penyusunan ANJAB-ABK', '4', '2', '2019-09-03', '2019-09-04', 'Y'),
(91, '20', '31', 'Rapat', '4', '1', '2019-09-03', '2019-09-03', 'Y'),
(92, '30', '7', 'Rapat', '4', '1', '2019-09-03', '2019-09-03', 'Y'),
(93, '13', '4', 'rapat Dana Desa', '2', '1', '2019-12-12', '2019-12-12', 'Y'),
(94, '', '0', 'Musyawarah', '3', '2', '2019-12-09', '2019-12-09', 'N'),
(95, '17', '1', 'Rapat', '2', '2', '2019-12-09', '2019-12-09', 'N'),
(96, '20', '1', 'rapat Tahunan', '2', '1', '2019-12-09', '2019-12-09', 'N'),
(97, '16', '2', 'Mengikuti sosialoisai', '2', '1', '2019-12-09', '2019-12-09', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nip` varchar(90) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `id_golongan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `pangkat`, `id_golongan`, `jabatan`, `unitkerja`, `username`, `password`) VALUES
(1, '196103111 198804 1 001', 'BENI ARDIANSYAH', 'Pembina', '3', 'Sekretaris Kecamatan', 'Kecamatan Margahayu', '196103111 198804 1 001', '196103111 198804 1 001'),
(13, '19790628 201102 1 001', 'Dra.TETI NURYATI', ' Penata Tingkat I', '4', 'Kasi Sosial Budaya', 'Kecamatan Margahayu', '19790628 201102 1 001', '19790628 201102 1 001'),
(14, '19760814 201102 1001', 'TEEN NOPLADIA SARAGIH,SP', 'PenataTingkat I', '4', 'Arsiparis Penyelia', 'Kecamatan Margahayu', '19760814 201102 1001', '19760814 201102 1001'),
(15, '19760410 200701 1003', 'ASEP HERMAWAN, SH', 'Penata Tingkat I', '4', 'Lurah', 'Kecamatan Margahayu', '19760410 200701 1003', '19760410 200701 1003'),
(31, '160613056', 'Yudi', 'Pembina Utama Muda', '16', 'Kasi Sosial Budaya', 'Kecamatan Margahayu', '160613056', '160613056'),
(16, '19850622 201001 2 024', 'NANANG SUPRIATNA,SP', 'Penata Tingkat 1', '4', 'Kasi Pemerintahan Kecamatan', 'Kecamatan Margahayu', '19850622 201001 2 024', '19850622 201001 2 024'),
(17, '19770403 2012 12 1 003', 'NURMASLIA, S.Sos', 'Penata Tingkat 1', '4', 'Kasi Pemberdayaan Masyarakat Kelurahan', 'Kecamatan Margahayu', '19770403 2012 12 1 003', '19770403 2012 12 1 003'),
(20, '19830403 201102 1001', 'Desy Erita', 'Penata Muda', '5', 'Staf Bagian Kesejahteraan Rakyat', 'Kecamatan Margahayu', '19830403 201102 1001', '19830403 201102 1001'),
(29, '1234567789', 'Tora', 'Kasubag', '3', 'Kasubag', 'Margahayu', '1234567789', '1234567789'),
(30, '197110091991011001', 'MOCHAMAD USMAN, S.Sos,MM', 'Pembina Tingkat I', '2', 'CAMAT', 'Kecamatan Margahayu', '197110091991011001', '197110091991011001'),
(32, '19876453748949948', 'Andry', 'Penata Muda', '3', 'Kasi Sosial', 'Kecamatan Margahayu', '19876453748949948', '19876453748949948'),
(33, '16789656432316576', 'Agas', 'Penata Muda Tingkat I', '7', 'Kasi Pemberdayaan', 'Kecamatan Margahayu', '16789656432316576', '16789656432316576');

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE `sppd` (
  `id_sppd` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `no_sppd` varchar(50) NOT NULL,
  `pemberi_perintah` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `mata_anggaran` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tgl_sppd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES
(99, '1', '87', '../sppd/', 'Sekretariat Daerah', 'Seretariat Daerah Kab.Kepulauan Meranti', 'APBD 2015', 'SS', '23/07/2016'),
(101, '13', '', '../sppd/', 'Camat', 'Seretariat Daerah Kab.Kepulauan Meranti', 'APBD 2015', 'Tugas dinas', '26/08/2019'),
(105, '16', '', '../sppd/', 'Camat', 'Kecamatan Margahayu', 'APBD 2015', '', '02/09/2019'),
(106, '17', '', '../sppd/', 'Camat', 'Kecamatan Margahayu', 'APBD 2015', '', '02/09/2019'),
(107, '16', '', '../sppd/', 'Camat', 'kecamatan Margahayu', 'APBD 2019', 'Rapat koordinasi', '02/09/2019'),
(108, '29', '', '../sppd/', 'Camat', 'kecamatan Margahayu', 'APBD 2019', 'Rapat koordinasi', '02/09/2019'),
(110, '30', '89', '../sppd/', 'Camat', 'kecamatan Margahayu', 'APBD 2015', 'Rapat bersama', '02/09/2019'),
(112, '31', '90', '../sppd/', 'Hj.YUNI ANGGRIANI S.Sos,MM', 'Kecamatan Margahayu', 'APBD 2019', 'Mengikuti kerja kelompok', '02/09/2019'),
(113, '30', '92', '../sppd/', 'CAMAT', 'Kecamatan Margahayu', 'APBD 2019', 'Perjalanan Dinas', '03/09/2019'),
(114, '13', '93', '../sppd/', 'CAMAT', 'Kecamatan Margahayu', 'APBD 2019', 'rapat Sosialisasi', '11/09/2019'),
(115, '14', '', '../sppd/', 'CAMAT', 'Kecamatan Margahayu', 'APBD 2019', 'Desa  sukamenak', '12/09/2019');

-- --------------------------------------------------------

--
-- Table structure for table `spt`
--

CREATE TABLE `spt` (
  `id_spt` int(6) NOT NULL,
  `no_spt` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `tugas` text NOT NULL,
  `tgl_spt` varchar(50) NOT NULL,
  `dasar_hukum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spt`
--

INSERT INTO `spt` (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES
(59, '../spt/', '87', '1-15', 'Melaksanakan Kegiatan Sosialisasi Program Keluarga Harapan (PKH) Tahun 2016 di Kecamatan Rangsang', '23/07/2016', '....'),
(60, '../spt/', '88', '14-15-16', 'Rapat', '26/08/2019', '....'),
(61, '123456789', '', '29-30', 'Rapat STMIK', '', 'APBD 2019'),
(62, '../spt/', '89', '29-30', 'Rapat dana', '02/09/2019', '....'),
(63, '../spt/', '90', '31', 'Mengikuti Acara Penyusunan ANJAB-ABK', '02/09/2019', '....'),
(64, '../spt/', '91', '20', 'Rapat', '03/09/2019', '....'),
(65, '../spt/', '92', '30', 'Rapat', '03/09/2019', '....'),
(66, '../spt/', '93', '13', 'rapat Dana Desa', '11/09/2019', '....'),
(67, '12/09/2019', '', '16', 'Anggaran dana', '', 'PPTK');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(5) NOT NULL,
  `transportasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `transportasi`) VALUES
(2, 'Kendaraan Pribadi'),
(3, 'Kendaraan Umum');

-- --------------------------------------------------------

--
-- Table structure for table `ttdkwitansi`
--

CREATE TABLE `ttdkwitansi` (
  `id` int(11) NOT NULL,
  `kabag` varchar(100) NOT NULL,
  `nip_kabag` varchar(100) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip_bendahara` varchar(100) NOT NULL,
  `pptk` varchar(100) NOT NULL,
  `nip_pptk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttdkwitansi`
--

INSERT INTO `ttdkwitansi` (`id`, `kabag`, `nip_kabag`, `bendahara`, `nip_bendahara`, `pptk`, `nip_pptk`) VALUES
(1, 'Hj.YUNI ANGGRIANI,S.Pd,MM', '19710607 199503 2 001', 'JUANDA', '19730317 201212 1 002', 'SITI INDAH HAMDAH', '19830315 200901 2 004');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(5) NOT NULL,
  `tujuan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `tujuan`) VALUES
(1, 'Kecamatan Rancabali'),
(2, 'Kecamatan Ciwidey'),
(3, 'Kecamatan Pasirjambu'),
(4, 'Kecamatan Soreang'),
(5, 'Kecamatan Kutawaringin'),
(6, 'Kecamatan Katapang'),
(8, 'Kecamatan Margaasih'),
(9, 'Kecamatan Dayeuhkolot'),
(10, 'Kecamatan Cangkuang'),
(11, 'Kecamatan Banjaran'),
(12, 'Kecamatan Cimaung'),
(13, 'Kecamatan Pangalengan'),
(14, 'Kecamatan Arjasari'),
(15, 'Kecamatan Pameungpeuk'),
(16, 'Kecamatan Baleendah'),
(17, 'Kecamatan Ciparay'),
(18, 'Kecamatan Paset'),
(19, 'Kecamatan Kertasari'),
(20, 'Kecamatan Majalaya'),
(21, 'Kecamatan Solokanjeruk'),
(22, 'Kecamatan Paseh'),
(23, 'Kecamatan Ibun'),
(24, 'Kecamatan Cileunyi'),
(25, 'Kecamatan Cimenyan'),
(26, 'Kecamatan Cilengkrang'),
(27, 'Kecamatan Bojongsoang'),
(28, 'Kecamatan Rancaekek'),
(29, 'Kecamatan Cicalengka'),
(30, 'Kecamatan Cikancung'),
(31, 'Kecamatan nagreg'),
(32, 'Margahayu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `lpd`
--
ALTER TABLE `lpd`
  ADD PRIMARY KEY (`id_lpd`);

--
-- Indexes for table `nppt`
--
ALTER TABLE `nppt`
  ADD PRIMARY KEY (`id_nppt`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `spt`
--
ALTER TABLE `spt`
  ADD PRIMARY KEY (`id_spt`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indexes for table `ttdkwitansi`
--
ALTER TABLE `ttdkwitansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id_kwitansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lpd`
--
ALTER TABLE `lpd`
  MODIFY `id_lpd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nppt`
--
ALTER TABLE `nppt`
  MODIFY `id_nppt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `spt`
--
ALTER TABLE `spt`
  MODIFY `id_spt` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ttdkwitansi`
--
ALTER TABLE `ttdkwitansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
