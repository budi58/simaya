-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_agenda`
--

DROP TABLE IF EXISTS `tb_agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_agenda` (
  `id_ag` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID Agenda',
  `agenda` varchar(15) NOT NULL COMMENT 'Agenda Surat Masuk',
  `jabatan` varchar(30) NOT NULL COMMENT 'Jabatan',
  PRIMARY KEY (`id_ag`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_agenda`
--

LOCK TABLES `tb_agenda` WRITE;
/*!40000 ALTER TABLE `tb_agenda` DISABLE KEYS */;
INSERT INTO `tb_agenda` VALUES (1,'Ketua','Ketua Dewan'),(2,'Sekretaris','Sekretaris Dewan');
/*!40000 ALTER TABLE `tb_agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bagian`
--

DROP TABLE IF EXISTS `tb_bagian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_bagian` (
  `id_bagian` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID Bagian',
  `bagian` varchar(50) NOT NULL COMMENT 'Bagian',
  `uac` varchar(10) NOT NULL COMMENT 'User Account',
  PRIMARY KEY (`id_bagian`),
  KEY `uac` (`uac`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bagian`
--

LOCK TABLES `tb_bagian` WRITE;
/*!40000 ALTER TABLE `tb_bagian` DISABLE KEYS */;
INSERT INTO `tb_bagian` VALUES (1,'Kabag Umum','KBG'),(2,'Kasubbag TU dan Kepegawaian','KSBG'),(3,'Kasubag Keuangan','SBGK'),(4,'Kasubbag PEP','KPEP'),(5,'Kabag Rapat dan Perundang-undangan','KBGR'),(6,'Kasubag Perundang-undangan dan Perpustakaan','KSPU'),(7,'Kasubbag Rapat','KSBR'),(8,'Kasubbag Risalah','KSRI'),(9,'Kabag Perlengkapan dan Humas','KPH'),(10,'Kasubag Perlengkapan','KPER'),(11,'Kasubag Humas dan Protokol','KSHum'),(12,'Kasubbag Rumahtangga','KSRT'),(13,'Ketua Komisi A','KOMA'),(14,'Ketua Komisi B','KOMB'),(15,'Ketua Komisi C','KOMC'),(16,'Ketua Komisi D','KOMD'),(17,'Sekretaris Dewan','SWN'),(18,'Ketua Dewan','DWN');
/*!40000 ALTER TABLE `tb_bagian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dispo`
--

DROP TABLE IF EXISTS `tb_dispo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dispo` (
  `id_dispo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'No Disposisi',
  `id_sm` int(11) DEFAULT NULL COMMENT 'Nomor Agenda',
  `dispo` varchar(10) NOT NULL,
  `isidispo` text NOT NULL COMMENT 'Isi Dispo',
  `tembusan` varchar(10) NOT NULL,
  `isi_tindakan` text NOT NULL,
  `ket` int(2) NOT NULL COMMENT 'Status',
  PRIMARY KEY (`id_dispo`),
  KEY `id_sm` (`id_sm`),
  CONSTRAINT `tb_dispo_ibfk_1` FOREIGN KEY (`id_sm`) REFERENCES `tb_suratmasuk` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dispo`
--

LOCK TABLES `tb_dispo` WRITE;
/*!40000 ALTER TABLE `tb_dispo` DISABLE KEYS */;
INSERT INTO `tb_dispo` VALUES (1,1,'SWN','hadiri sesusai permintaan','','TL dispo pak ketua BOS',1),(2,2,'SWN','koordinasikan dengan pihak terkait','','TL dispo pak ketua OK',1),(3,3,'KBG','TL koordinasikan ','KSBG','TL dispo pak sekwan',1),(4,4,'KBG','nanaksdnjka','KBG','TL dispo pak sekwan',1),(5,5,'KBGR','Tindaklanjuti dan laksanakan','KSPU','Tl dispo pak sekwan',1),(6,6,'KPH','laksanakan dengan bagian terkait','KPH','TL dispo pak sekwan',1),(7,7,'KBG','Tindaklanjuti dan koordinasikan','KBG','TL dispo pak sekwan',1),(8,8,'KPH','tolong dikoordinasikan dengan pihak terkait','KPER','TL dispo pak sekwan',1),(9,9,'KOMA','Mohon dikoordinasikan dengan pihak terkait','','surat diterima dan segera dilaksanakan',1),(10,10,'KOMB','ditindaklanjuti dan rapat dengan anggota yang lain','','waktu pelaksanaan hari senin jam 11 siang',1),(11,11,'KOMC','tolong pak ketua komisi c untuk hadiri undangan','','surat diterima dan akan ditindaklanjuti',1),(12,12,'KOMD','agendakan sesuai keperluan lapangan','','surat sudah diterima dan akan ditindaklanjuti',1);
/*!40000 ALTER TABLE `tb_dispo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jenis`
--

DROP TABLE IF EXISTS `tb_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Jenis',
  `jenis` char(40) NOT NULL COMMENT 'Jenis Surat',
  `kode` char(5) NOT NULL COMMENT 'Kode Jenis',
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenis`
--

LOCK TABLES `tb_jenis` WRITE;
/*!40000 ALTER TABLE `tb_jenis` DISABLE KEYS */;
INSERT INTO `tb_jenis` VALUES (1,'Surat Biasa','S'),(2,'Surat Tugas','ST'),(3,'Nota DInas','ND'),(4,'Surat Keterangan','KET'),(5,'Undangan','UND'),(6,'Surat Rahasia','R'),(7,'Surat Sangat Rahasia','SR'),(8,'Laporan','LAP'),(9,'Surat Izin','SI'),(10,'Nota Dinas Rahasia','NDR'),(11,'Berita Acara','BA'),(12,'Berita Acara Serah Terima','BAST'),(13,'Memo','Mo'),(14,'Surat Keputusan','KEP'),(15,'Surat Pengantar','SP'),(16,'Peraturan','PER'),(17,'Surat Pernyataan Tanggungjawab Pekerjaan','SPTPL'),(18,'Surat Perintah','PRINT'),(19,'Berita Acara Rekonsiliasi','BAR'),(20,'Nota Pertimbangan','NP'),(21,'Surat Perintah Kerja','SPK'),(22,'Pemberitahuan','PEM'),(23,'Surat Pernyataan Melaksanakan Tugas','SPMT'),(24,'Surat Edaran','SE'),(25,'Berita Acara Pembayaran','BAP');
/*!40000 ALTER TABLE `tb_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kantor`
--

DROP TABLE IF EXISTS `tb_kantor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kantor` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `kab` varchar(50) NOT NULL COMMENT 'Nama Kabupaten',
  `kantor` varchar(50) NOT NULL COMMENT 'Kantor DPRD',
  `alamat` varchar(50) NOT NULL COMMENT 'Alamat Kantor',
  `pos` varchar(10) NOT NULL COMMENT 'Kode Pos',
  `telp` varchar(15) NOT NULL COMMENT 'Telepon',
  `faks` varchar(15) NOT NULL COMMENT 'Faksimile',
  `email` varchar(30) NOT NULL COMMENT 'E-mail',
  `web` varchar(30) NOT NULL COMMENT 'Website',
  `logo` varchar(200) NOT NULL COMMENT 'Logo Kabupaten',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kantor`
--

LOCK TABLES `tb_kantor` WRITE;
/*!40000 ALTER TABLE `tb_kantor` DISABLE KEYS */;
INSERT INTO `tb_kantor` VALUES (1,'KABUPATEN PATI','DEWAN PERWAKILAN RAKYAT DAERAH','Jl. Dr. Wahidin No. 2A Pati','59115','(0295) 381719','(0295) 385881','-','www.dprd-patikab.go.id','pemda3.jpg');
/*!40000 ALTER TABLE `tb_kantor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengirim`
--

DROP TABLE IF EXISTS `tb_pengirim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pengirim` (
  `id_pengirim` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID Pengirim',
  `pengirim` varchar(50) NOT NULL COMMENT 'Nama Pengirim/Instansi',
  PRIMARY KEY (`id_pengirim`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengirim`
--

LOCK TABLES `tb_pengirim` WRITE;
/*!40000 ALTER TABLE `tb_pengirim` DISABLE KEYS */;
INSERT INTO `tb_pengirim` VALUES (1,'Setda Pati'),(2,'Bupati Pati'),(3,'Setda Prov. Jateng'),(4,'Kantor Departemen Agama Cab Pati'),(5,'Partai Demokrat'),(6,'Bappeda'),(7,'Kilas Fakta'),(8,'Kodam Pati'),(9,'Polres Pati'),(10,'Sekda Pati'),(11,'Kemenag Pati'),(12,'PPP'),(13,'RSUD Soewondo Pati'),(14,'Warga keboromo Tayu'),(15,'PDIP'),(16,'PMI'),(17,'Pabrik Gula Trangkil'),(18,'Pabrik Garuda Pati'),(19,'PMII'),(20,'Partai PDIP'),(21,'Ponpes Mathaliul Falah'),(22,'Warga Gabus'),(23,'Sekda'),(24,'KNPI DPD PATI'),(25,'KPUD');
/*!40000 ALTER TABLE `tb_pengirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sifat`
--

DROP TABLE IF EXISTS `tb_sifat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sifat` (
  `id_sifat` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID Sifat',
  `sifat` varchar(15) NOT NULL COMMENT 'Sifat Surat',
  PRIMARY KEY (`id_sifat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sifat`
--

LOCK TABLES `tb_sifat` WRITE;
/*!40000 ALTER TABLE `tb_sifat` DISABLE KEYS */;
INSERT INTO `tb_sifat` VALUES (1,'Segera'),(2,'Sangat Segera'),(3,'Biasa'),(4,'Penting'),(5,'Rahasia'),(6,'Sangat Rahasia');
/*!40000 ALTER TABLE `tb_sifat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_suratkeluar`
--

DROP TABLE IF EXISTS `tb_suratkeluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_suratkeluar` (
  `id_sk` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID Surat Keluar',
  `nosk` varchar(30) NOT NULL COMMENT 'No Surat Keluar',
  `tglsurat` date NOT NULL COMMENT 'Tanggal Surat',
  `file` varchar(255) NOT NULL COMMENT 'FIle Surat',
  `lamp` varchar(5) NOT NULL,
  `pengirim` varchar(100) NOT NULL COMMENT 'Tujuan Surat',
  `perihal` text NOT NULL COMMENT 'Isi Ringkas',
  `id_us` int(11) DEFAULT NULL COMMENT 'Pengolah',
  `id_sifat` int(11) NOT NULL COMMENT 'Sifat Surat',
  `id_jenis` int(11) NOT NULL COMMENT 'Jenis Surat',
  `isisurat` text NOT NULL COMMENT 'Isi Surat',
  `uac` varchar(10) NOT NULL COMMENT 'User Account  Control',
  `status` int(2) NOT NULL COMMENT 'Status',
  PRIMARY KEY (`id_sk`),
  KEY `id_sifat` (`id_sifat`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_bagian` (`id_us`),
  KEY `id_us` (`id_us`),
  CONSTRAINT `tb_suratkeluar_ibfk_1` FOREIGN KEY (`id_sifat`) REFERENCES `tb_sifat` (`id_sifat`),
  CONSTRAINT `tb_suratkeluar_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_suratkeluar`
--

LOCK TABLES `tb_suratkeluar` WRITE;
/*!40000 ALTER TABLE `tb_suratkeluar` DISABLE KEYS */;
INSERT INTO `tb_suratkeluar` VALUES (1,'SP/xii15/2017','2017-01-15','09E02129.pdf','-','PMII','Donor darah pegawai',3,3,3,'','ADM',1),(2,'SP/xii.16/2017','2017-01-16','daftar_rencana_umum_pengadaan.pdf','-','Partai PDIP','Regulasi kebijakan tahun 2017',7,5,6,'','ADM',1),(3,'SP/16/2017','2017-01-15','MODUL_LARAVEL_VERSI_4_2.docx','-','Warga Gabus','Demo pabrik semen',6,4,21,'','ADM',1),(4,'SP/17/XII/2017','2017-01-16','Sekretariat_DPRD.docx','-','Bupati Pati','Pelantikan pegawai',3,1,2,'','ADM',1),(5,'','2017-03-05','P_20161129_110421_DF.jpg','-','Sekda','Undangan',3,1,1,'<br> ','SWN',0),(6,'420/SK/2016','2017-03-05','P_20161129_110455_DF.jpg','-','KNPI DPD PATI','Pelantikan',3,3,1,'                                    <div style=\"text-align: center;\"><h4><span style=\"font-family: Arial;\"><span style=\"text-decoration: underline;\"><span style=\"font-weight: bold;\">SURAT KETERANGAN</span></span></span></h4><h4><span style=\"font-family: Arial;\"></span></h4><h4><span style=\"font-family: Arial;\">Nomor : 420/  SK  /2016<br><br></span></h4></div><div style=\"margin-left: 40px;\"><h4><span style=\"font-family: Arial;\">Berdasarkan surat Dekan Fakultas Bisnis dan Teknologi Informasi Nomor : 455/FITB-UTY/D-KI/XII/2016, yang bertanda tangan di bawah ini:<br><br></span><span style=\"font-family: Arial;\">Nama                            :    IFAN BUSTANUDDIN, SE, MM</span><br><span style=\"font-family: Arial;\"></span><span style=\"font-family: Arial;\">NIP                                :    196412131992031008<br>Pangkat/Gol. Ruang     :    Pembina Utama Muda (IV/c)<br>Jabatan                         :    Sekretaris DPRD Kabupaten Pati<br><br></span></h4></div><div style=\"text-align: center;\"><h4><span style=\"font-family: Arial;\"><span style=\"font-weight: normal;\"><span style=\"text-decoration: underline;\">MENERANGKAN</span></span><br></span></h4></div><div style=\"margin-left: 40px;\"><h4><span style=\"font-family: Arial;\"><br>Nama                           :    LUQMAN HAKIM<br>NIM                              :    3125111001<br>Semester                     :    IX<br>Program Studi              :    S1<br>Jurusan                        :    Teknik Informatika<br>Alamat                          :    Ds. Ngurenrejo RT.07 RW.02 Kec. Wedarijaksa Kab. Pati<br><br><br>Telah melaksanakan penelitian di Sekretariat DPRD Kabupaten Pati, untuk menyusun tugas akhir dengan judul Rancang Bangun Sistem Manajemen Pengarsipan Surat Berbasis Web.<br><br>Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.<br></span> </h4></div>      ','ADM',1);
/*!40000 ALTER TABLE `tb_suratkeluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_suratmasuk`
--

DROP TABLE IF EXISTS `tb_suratmasuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_suratmasuk` (
  `id_sm` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Surat Masuk',
  `tglaccept` date NOT NULL COMMENT 'Tanggal Terima',
  `nosurat` varchar(30) NOT NULL COMMENT 'No Surat',
  `tglsurat` date NOT NULL COMMENT 'Tanggal Surat',
  `perihal` text NOT NULL COMMENT 'Perihal/Uraian',
  `pengirim` varchar(100) NOT NULL COMMENT 'Pengirim',
  `file` varchar(255) NOT NULL COMMENT 'File Surat',
  `lamp` varchar(5) NOT NULL,
  `id_ag` int(11) NOT NULL COMMENT 'Agenda Surat Masuk',
  `id_sifat` int(11) NOT NULL COMMENT 'Sifat Surat',
  `uac` varchar(10) NOT NULL COMMENT 'User Account',
  `status` int(2) NOT NULL COMMENT 'Status Surat',
  PRIMARY KEY (`id_sm`),
  KEY `id_sifat` (`id_sifat`),
  KEY `id_ag` (`id_ag`),
  CONSTRAINT `tb_suratmasuk_ibfk_1` FOREIGN KEY (`id_ag`) REFERENCES `tb_agenda` (`id_ag`),
  CONSTRAINT `tb_suratmasuk_ibfk_2` FOREIGN KEY (`id_sifat`) REFERENCES `tb_sifat` (`id_sifat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_suratmasuk`
--

LOCK TABLES `tb_suratmasuk` WRITE;
/*!40000 ALTER TABLE `tb_suratmasuk` DISABLE KEYS */;
INSERT INTO `tb_suratmasuk` VALUES (1,'2017-01-15','SP/XI/2017','2017-01-14','Undangan manten','Partai PDIP','09E02129.pdf','-',1,4,'DWN',1),(2,'2017-01-15','132/vi/2017','2017-01-14','Donor darah HUT PMII','PMII','jbptunikompp-gdl-nipiantiag-22185-3-unikom_n-i.pdf','-',1,6,'DWN',1),(3,'2017-01-15','132/vi/2017','2017-01-13','Halal bi halal','Partai PDIP','Surat-Edaran-PPDB.pdf','-',2,6,'SWN',1),(4,'2017-01-15','SK/I/2017','2017-01-07','Pernikahan lurah','Warga keboromo Tayu','SYARAT_PENDADARAN_(BARU_&_ULANG)_TI-SI-MI_Ganjil_2016-2017.docx','-',2,2,'SWN',1),(5,'2017-01-15','SK/I/2017','2017-01-15','Tahlilan','Warga Gabus','MODUL_LARAVEL_VERSI_4_2.docx','-',2,4,'SWN',1),(6,'2017-01-15','SP/XI1/2017','2017-01-15','Perayaan maulid nabi','Ponpes Mathaliul Falah','daftar_rencana_umum_pengadaan.pdf','-',2,3,'SWN',1),(7,'2017-01-16','XII/32/2017','2017-01-15','undangan','Partai PDIP','Sekretariat_DPRD.docx','-',2,3,'SWN',1),(8,'2017-01-21','005/309','2017-01-20','Upacara peringatan hari kesaktian pancasila tahun 2016','Sekda Pati','P_20161129_110705_DF.jpg','-',2,2,'SWN',1),(9,'2017-03-03','005/4914','2017-02-24','Undangan','Sekda','P_20161129_110617_DF.jpg','-',1,1,'DWN',1),(10,'2017-03-03','01/KNPI-PATI/09/2016','2016-09-09','Undangan Pelantikan','KNPI DPD PATI','P_20161129_110455_DF.jpg','-',1,1,'DWN',1),(11,'2017-03-08','009/SP/2017','2017-03-04','Pengumuman Pemilu','KPUD','erd.docx','1',1,4,'DWN',1),(12,'2017-03-08','003/SN/2017','2017-03-06','Pilkada 2017','KPUD','16999128_1259010604179883_3119883251875259392_n.jpg','1',1,4,'DWN',1);
/*!40000 ALTER TABLE `tb_suratmasuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID User',
  `nip` varchar(15) NOT NULL COMMENT 'NIP',
  `nama` varchar(100) NOT NULL COMMENT 'Nama Pegawai',
  `bgn` varchar(50) NOT NULL COMMENT 'Bagian/Divisi',
  `uname` varchar(30) NOT NULL COMMENT 'Username',
  `upsw` varchar(40) NOT NULL COMMENT 'Password',
  `uac` varchar(10) NOT NULL COMMENT 'Tipe',
  `status` varchar(20) NOT NULL COMMENT 'Status',
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'19780320 200604','Waridi','Staf Tata usaha','admin','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','ADM','1'),(2,'197205162006042','Prima Erawati, SE.MM','Kasubag TU & Kepeg.','kasubag','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KSBG',''),(3,'19650930 199310','Drs. Suharto, M.M','Kabag Umum','kabag','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KBG',''),(4,'196412131992031','Ifan Bustanuddin, SE, MM','Sekretaris Dewan','sekwan','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','SWN',''),(5,'-','Ali Badrudin','Ketua DPRD','dewan','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','DWN',''),(6,'196503051992031','Sutoto, SH','Kabag Rapat & UU','karapat','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KBGR',''),(7,'196405161988031','Bambang Santosa, S.Pd, MM','Kabag Perleng. & Humas','kahumas','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KPH',''),(8,'-','H. Adjie Sudarmadji SH, MM','Ketua Komisi A','komisi.a','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KOMA',''),(9,'-','Soetarto Oenthersa, SH, MH','Ketua Komisi B','komisi.b','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KOMB',''),(10,'-','Hawid SH','Ketua Komisi C','komisi.c','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KOMC',''),(11,'-','Mussalam SAg MSi','Ketua Komisi D','komisi.d','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','KOMD','');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-08 23:09:28
