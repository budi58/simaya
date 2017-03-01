-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 02:31 PM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_ag` int(2) NOT NULL COMMENT 'ID Agenda',
  `agenda` varchar(15) NOT NULL COMMENT 'Agenda Surat Masuk',
  `jabatan` varchar(30) NOT NULL COMMENT 'Jabatan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_ag`, `agenda`, `jabatan`) VALUES
(1, 'Ketua', 'Ketua Dewan'),
(2, 'Sekretaris', 'Sekretaris Dewan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(2) NOT NULL COMMENT 'ID Bagian',
  `bagian` varchar(50) NOT NULL COMMENT 'Bagian',
  `uac` varchar(10) NOT NULL COMMENT 'User Account'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `bagian`, `uac`) VALUES
(1, 'Kabag Umum', 'KBG'),
(2, 'Kasubbag TU dan Kepegawaian', 'KSBG'),
(3, 'Kasubag Keuangan', 'SBGK'),
(4, 'Kasubbag PEP', 'KPEP'),
(5, 'Kabag Rapat dan Perundang-undangan', 'KBGR'),
(6, 'Kasubag Perundang-undangan dan Perpustakaan', 'KSPU'),
(7, 'Kasubbag Rapat', 'KSBR'),
(8, 'Kasubbag Risalah', 'KSRI'),
(9, 'Kabag Perlengkapan dan Humas', 'KPH'),
(10, 'Kasubag Perlengkapan', 'KPER'),
(11, 'Kasubag Humas dan Protokol', 'KSHum'),
(12, 'Kasubbag Rumahtangga', 'KSRT'),
(13, 'Ketua Komisi A', 'KMA'),
(14, 'Ketua Komisi B', 'KMB'),
(15, 'Ketua Komisi C', 'KMC'),
(16, 'Ketua Komisi D', 'KMD'),
(17, 'Sekretaris Dewan', 'SWN'),
(18, 'Ketua Dewan', 'DWN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dispo`
--

CREATE TABLE `tb_dispo` (
  `id_dispo` int(11) NOT NULL COMMENT 'No Disposisi',
  `id_sm` int(11) DEFAULT NULL COMMENT 'Nomor Agenda',
  `dispo` varchar(10) NOT NULL,
  `isidispo` text NOT NULL COMMENT 'Isi Dispo',
  `tembusan` varchar(10) NOT NULL,
  `isi_tindakan` text NOT NULL,
  `ket` int(2) NOT NULL COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dispo`
--

INSERT INTO `tb_dispo` (`id_dispo`, `id_sm`, `dispo`, `isidispo`, `tembusan`, `isi_tindakan`, `ket`) VALUES
(1, 1, 'SWN', 'hadiri sesusai permintaan', 'KBG', 'TL dispo pak ketua', 1),
(2, 2, 'SWN', 'koordinasikan dengan pihak terkait', 'KBG', 'TL dispo pak ketua', 1),
(3, 3, 'KBG', 'TL koordinasikan ', 'KSBG', 'Dihadiri sendiri', 1),
(4, 4, 'KBG', 'nanaksdnjka', 'KBG', 'TL dispo pak sekwan', 1),
(5, 5, 'KBGR', 'Tindaklanjuti dan laksanakan', 'KSPU', 'Tl dispo pak sekwan', 1),
(6, 6, 'KPH', 'laksanakan dengan bagian terkait', 'KPH', 'TL dispo pak sekwan', 1),
(7, 7, 'KBG', 'Tindaklanjuti dan koordinasikan', 'KBG', 'TL dispo pak sekwan', 1),
(8, 8, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL COMMENT 'ID Jenis',
  `jenis` char(40) NOT NULL COMMENT 'Jenis Surat',
  `kode` char(5) NOT NULL COMMENT 'Kode Jenis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`, `kode`) VALUES
(1, 'Surat Biasa', 'S'),
(2, 'Surat Tugas', 'ST'),
(3, 'Nota DInas', 'ND'),
(4, 'Surat Keterangan', 'KET'),
(5, 'Undangan', 'UND'),
(6, 'Surat Rahasia', 'R'),
(7, 'Surat Sangat Rahasia', 'SR'),
(8, 'Laporan', 'LAP'),
(9, 'Surat Izin', 'SI'),
(10, 'Nota Dinas Rahasia', 'NDR'),
(11, 'Berita Acara', 'BA'),
(12, 'Berita Acara Serah Terima', 'BAST'),
(13, 'Memo', 'Mo'),
(14, 'Surat Keputusan', 'KEP'),
(15, 'Surat Pengantar', 'SP'),
(16, 'Peraturan', 'PER'),
(17, 'Surat Pernyataan Tanggungjawab Pekerjaan', 'SPTPL'),
(18, 'Surat Perintah', 'PRINT'),
(19, 'Berita Acara Rekonsiliasi', 'BAR'),
(20, 'Nota Pertimbangan', 'NP'),
(21, 'Surat Perintah Kerja', 'SPK'),
(22, 'Pemberitahuan', 'PEM'),
(23, 'Surat Pernyataan Melaksanakan Tugas', 'SPMT'),
(24, 'Surat Edaran', 'SE'),
(25, 'Berita Acara Pembayaran', 'BAP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kantor`
--

CREATE TABLE `tb_kantor` (
  `id` int(2) NOT NULL COMMENT 'ID',
  `kab` varchar(50) NOT NULL COMMENT 'Nama Kabupaten',
  `kantor` varchar(50) NOT NULL COMMENT 'Kantor DPRD',
  `alamat` varchar(50) NOT NULL COMMENT 'Alamat Kantor',
  `pos` varchar(10) NOT NULL COMMENT 'Kode Pos',
  `telp` varchar(15) NOT NULL COMMENT 'Telepon',
  `faks` varchar(15) NOT NULL COMMENT 'Faksimile',
  `email` varchar(30) NOT NULL COMMENT 'E-mail',
  `web` varchar(30) NOT NULL COMMENT 'Website',
  `logo` varchar(200) NOT NULL COMMENT 'Logo Kabupaten'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kantor`
--

INSERT INTO `tb_kantor` (`id`, `kab`, `kantor`, `alamat`, `pos`, `telp`, `faks`, `email`, `web`, `logo`) VALUES
(1, 'KABUPATEN PATI', 'DEWAN PERWAKILAN RAKYAT DAERAH', 'Jl. Dr. Wahidin No. 2A Pati', '59115', '(0295) 381719', '(0295) 385881', '-', 'www.dprd-patikab.go.id', 'pemda3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengirim`
--

CREATE TABLE `tb_pengirim` (
  `id_pengirim` int(5) NOT NULL COMMENT 'ID Pengirim',
  `pengirim` varchar(50) NOT NULL COMMENT 'Nama Pengirim/Instansi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengirim`
--

INSERT INTO `tb_pengirim` (`id_pengirim`, `pengirim`) VALUES
(1, 'Setda Pati'),
(2, 'Bupati Pati'),
(3, 'Setda Prov. Jateng'),
(4, 'Kantor Departemen Agama Cab Pati'),
(5, 'Partai Demokrat'),
(6, 'Bappeda'),
(7, 'Kilas Fakta'),
(8, 'Kodam Pati'),
(9, 'Polres Pati'),
(10, 'Sekda Pati'),
(11, 'Kemenag Pati'),
(12, 'PPP'),
(13, 'RSUD Soewondo Pati'),
(14, 'Warga keboromo Tayu'),
(15, 'PDIP'),
(16, 'PMI'),
(17, 'Pabrik Gula Trangkil'),
(18, 'Pabrik Garuda Pati'),
(19, 'PMII'),
(20, 'Partai PDIP'),
(21, 'Ponpes Mathaliul Falah'),
(22, 'Warga Gabus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sifat`
--

CREATE TABLE `tb_sifat` (
  `id_sifat` int(2) NOT NULL COMMENT 'ID Sifat',
  `sifat` varchar(15) NOT NULL COMMENT 'Sifat Surat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sifat`
--

INSERT INTO `tb_sifat` (`id_sifat`, `sifat`) VALUES
(1, 'Segera'),
(2, 'Sangat Segera'),
(3, 'Biasa'),
(4, 'Penting'),
(5, 'Rahasia'),
(6, 'Sangat Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_sk` int(10) NOT NULL COMMENT 'ID Surat Keluar',
  `nosk` varchar(30) NOT NULL COMMENT 'No Surat Keluar',
  `tglsurat` date NOT NULL COMMENT 'Tanggal Surat',
  `file` varchar(255) NOT NULL COMMENT 'FIle Surat',
  `pengirim` varchar(100) NOT NULL COMMENT 'Tujuan Surat',
  `perihal` text NOT NULL COMMENT 'Isi Ringkas',
  `id_us` int(11) DEFAULT NULL COMMENT 'Pengolah',
  `id_sifat` int(11) NOT NULL COMMENT 'Sifat Surat',
  `id_jenis` int(11) NOT NULL COMMENT 'Jenis Surat',
  `isisurat` text NOT NULL COMMENT 'Isi Surat',
  `uac` varchar(10) NOT NULL COMMENT 'User Account  Control',
  `status` int(2) NOT NULL COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_sk`, `nosk`, `tglsurat`, `file`, `pengirim`, `perihal`, `id_us`, `id_sifat`, `id_jenis`, `isisurat`, `uac`, `status`) VALUES
(1, 'SP/xii15/2017', '2017-01-15', '09E02129.pdf', 'PMII', 'Donor darah pegawai', 3, 3, 3, '', 'ADM', 1),
(2, 'SP/xii.16/2017', '2017-01-16', 'daftar_rencana_umum_pengadaan.pdf', 'Partai PDIP', 'Regulasi kebijakan tahun 2017', 7, 5, 6, '', 'ADM', 1),
(3, 'SP/16/2017', '2017-01-15', 'MODUL_LARAVEL_VERSI_4_2.docx', 'Warga Gabus', 'Demo pabrik semen', 6, 4, 21, '', 'ADM', 1),
(4, 'SP/17/XII/2017', '2017-01-16', 'Sekretariat_DPRD.docx', 'Bupati Pati', 'Pelantikan pegawai', 3, 1, 2, '', 'ADM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_sm` int(11) NOT NULL COMMENT 'ID Surat Masuk',
  `tglaccept` date NOT NULL COMMENT 'Tanggal Terima',
  `nosurat` varchar(30) NOT NULL COMMENT 'No Surat',
  `tglsurat` date NOT NULL COMMENT 'Tanggal Surat',
  `perihal` text NOT NULL COMMENT 'Perihal/Uraian',
  `pengirim` varchar(100) NOT NULL COMMENT 'Pengirim',
  `file` varchar(255) NOT NULL COMMENT 'File Surat',
  `id_ag` int(11) NOT NULL COMMENT 'Agenda Surat Masuk',
  `id_sifat` int(11) NOT NULL COMMENT 'Sifat Surat',
  `uac` varchar(10) NOT NULL COMMENT 'User Account',
  `status` int(2) NOT NULL COMMENT 'Status Surat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_sm`, `tglaccept`, `nosurat`, `tglsurat`, `perihal`, `pengirim`, `file`, `id_ag`, `id_sifat`, `uac`, `status`) VALUES
(1, '2017-01-15', 'SP/XI/2017', '2017-01-14', 'Undangan manten', 'Partai PDIP', '09E02129.pdf', 1, 4, 'DWN', 1),
(2, '2017-01-15', '132/vi/2017', '2017-01-14', 'Donor darah HUT PMII', 'PMII', 'jbptunikompp-gdl-nipiantiag-22185-3-unikom_n-i.pdf', 1, 6, 'DWN', 1),
(3, '2017-01-15', '132/vi/2017', '2017-01-13', 'Halal bi halal', 'Partai PDIP', 'Surat-Edaran-PPDB.pdf', 2, 6, 'SWN', 1),
(4, '2017-01-15', 'SK/I/2017', '2017-01-07', 'Pernikahan lurah', 'Warga keboromo Tayu', 'SYARAT_PENDADARAN_(BARU_&_ULANG)_TI-SI-MI_Ganjil_2016-2017.docx', 2, 2, 'SWN', 1),
(5, '2017-01-15', 'SK/I/2017', '2017-01-15', 'Tahlilan', 'Warga Gabus', 'MODUL_LARAVEL_VERSI_4_2.docx', 2, 4, 'SWN', 1),
(6, '2017-01-15', 'SP/XI1/2017', '2017-01-15', 'Perayaan maulid nabi', 'Ponpes Mathaliul Falah', 'daftar_rencana_umum_pengadaan.pdf', 2, 3, 'SWN', 1),
(7, '2017-01-16', 'XII/32/2017', '2017-01-15', 'undangan', 'Partai PDIP', 'Sekretariat_DPRD.docx', 2, 3, 'SWN', 1),
(8, '2017-01-21', '005/309', '2017-01-20', 'Upacara peringatan hari kesaktian pancasila tahun 2016', 'Sekda Pati', 'P_20161129_110705_DF.jpg', 2, 2, 'KSBG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_us` int(11) NOT NULL COMMENT 'ID User',
  `nip` varchar(15) NOT NULL COMMENT 'NIP',
  `nama` varchar(100) NOT NULL COMMENT 'Nama Pegawai',
  `bgn` varchar(50) NOT NULL COMMENT 'Bagian/Divisi',
  `uname` varchar(30) NOT NULL COMMENT 'Username',
  `upsw` varchar(40) NOT NULL COMMENT 'Password',
  `uac` varchar(10) NOT NULL COMMENT 'Tipe',
  `status` varchar(20) NOT NULL COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_us`, `nip`, `nama`, `bgn`, `uname`, `upsw`, `uac`, `status`) VALUES
(1, '19780320 200604', 'Waridi', 'Staf Tata usaha', 'admin', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'ADM', '1'),
(2, '197205162006042', 'Prima Erawati, SE.MM', 'Kasubag TU & Kepeg.', 'kasubag', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'KSBG', ''),
(3, '19650930 199310', 'Drs. Suharto, M.M', 'Kabag Umum', 'kabag', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'KBG', ''),
(4, '196412131992031', 'Ifan Bustanuddin, SE, MM', 'Sekretaris Dewan', 'sekwan', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'SWN', ''),
(5, '-', 'Ali Badrudin', 'Ketua DPRD', 'dewan', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'DWN', ''),
(6, '196503051992031', 'Sutoto, SH', 'Kabag Rapat & UU', 'karapat', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'KBGR', ''),
(7, '196405161988031', 'Bambang Santosa, S.Pd, MM', 'Kabag Perleng. & Humas', 'kahumas', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'KPH', ''),
(8, '-', 'H. Adjie Sudarmadji SH, MM', 'Ketua Komisi A', 'komisi.a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'KOMA', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_ag`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD KEY `uac` (`uac`);

--
-- Indexes for table `tb_dispo`
--
ALTER TABLE `tb_dispo`
  ADD PRIMARY KEY (`id_dispo`),
  ADD KEY `id_sm` (`id_sm`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kantor`
--
ALTER TABLE `tb_kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `tb_sifat`
--
ALTER TABLE `tb_sifat`
  ADD PRIMARY KEY (`id_sifat`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_sifat` (`id_sifat`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_bagian` (`id_us`),
  ADD KEY `id_us` (`id_us`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_sifat` (`id_sifat`),
  ADD KEY `id_ag` (`id_ag`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_ag` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID Agenda', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID Bagian', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_dispo`
--
ALTER TABLE `tb_dispo`
  MODIFY `id_dispo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'No Disposisi', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Jenis', AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_kantor`
--
ALTER TABLE `tb_kantor`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  MODIFY `id_pengirim` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID Pengirim', AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_sifat`
--
ALTER TABLE `tb_sifat`
  MODIFY `id_sifat` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID Sifat', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_sk` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID Surat Keluar', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Surat Masuk', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID User', AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dispo`
--
ALTER TABLE `tb_dispo`
  ADD CONSTRAINT `tb_dispo_ibfk_1` FOREIGN KEY (`id_sm`) REFERENCES `tb_suratmasuk` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD CONSTRAINT `tb_suratkeluar_ibfk_1` FOREIGN KEY (`id_sifat`) REFERENCES `tb_sifat` (`id_sifat`),
  ADD CONSTRAINT `tb_suratkeluar_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`);

--
-- Constraints for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD CONSTRAINT `tb_suratmasuk_ibfk_1` FOREIGN KEY (`id_ag`) REFERENCES `tb_agenda` (`id_ag`),
  ADD CONSTRAINT `tb_suratmasuk_ibfk_2` FOREIGN KEY (`id_sifat`) REFERENCES `tb_sifat` (`id_sifat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
