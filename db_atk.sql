-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_atk
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES
(3,'Amplop Surat Polos',2),
(4,'Balliner Biru',3),
(5,'Balliner Hitam',3),
(6,'Ballpoint Pen Biru',3),
(7,'Ballpoint Pen Hitam',3),
(8,'Binder Clip 107',2),
(9,'Binder Clip No 260',2),
(10,'Binder Clip No.111',2),
(11,'Binder Clip No.200',3),
(12,'Bold Liner Elite',3),
(13,'Boxfile Keranjang (Plastik)',3),
(14,'Boxfile Toyo',3),
(15,'Buku Ekspedisi (HardCover)',3),
(16,'Buku Folio (HardCover)',3),
(17,'Buku Tulis Besar (HardCover)',3),
(18,'Clear Holder (Clear Book)',3),
(19,'Cutter L-500',3),
(20,'Double Tape Kecil',4),
(21,'Double Tape Sedang',4),
(22,'DVD R',3),
(23,'Gunting Besar',3),
(24,'Isi Cutter L-500',3),
(25,'Isi Stepler Besar',2),
(26,'Isi Stepler Kecil',2),
(27,'Isolasi Besar Bening',4),
(28,'Karet Penghapus Pensil',3),
(29,'Kertas A4 70 gr',5),
(30,'Kertas Buram',5),
(31,'Kertas f4 70 gr',5),
(32,'Kertas Folio Bergaris',5),
(33,'Kertas Ujian',5),
(34,'Kertas Warna Biru F4 70 gr',5),
(35,'Kertas Warna Hijau F4',5),
(36,'Kertas Warna Kuning F4 70 gr',5),
(37,'Kertas Warna Merah F4 70 gr',5),
(38,'Lak Ban Hitam',4),
(39,'Lem Kertas',3),
(40,'Map Kertas Biola',3),
(41,'Map Plastik (Bussiness File) Biru',3),
(42,'Map Plastik (Bussiness File) Hijau',3),
(43,'Map Plastik (Bussiness File) Kuning',3),
(44,'Map Plastik (Bussiness File) Merah',3),
(45,'Map Spring File',3),
(46,'Ordner Besar',3),
(47,'Ordner Kecil',3),
(48,'Paper Clip (Kecil)',2),
(49,'Pembolong Kertas (Punch) Besar',3),
(50,'Pembolong Kertas (Punch) Kecil',3),
(51,'Penggaris Besi',3),
(52,'Penghapus White Board',3),
(53,'Pensil',3),
(54,'Rak 3 Susun (Doc Tray)',3),
(55,'Serutan Pensil Dispenser',3),
(56,'Spidol Biru',3),
(57,'Spidol Hitam',3),
(58,'Spidol Merah',3),
(59,'Stabilo Boss Biru',3),
(60,'Stabilo Boss Hijau',3),
(61,'Stabilo Boss Kuning',3),
(62,'Stabilo Boss Pink',3),
(63,'Stapler Besar',3),
(64,'Stapler Kecil',3),
(65,'Sticky Note',3),
(66,'Tinta Canon Biru',6),
(67,'Tinta Canon Hitam',6),
(68,'Tinta Canon Kuning',6),
(69,'Tinta Canon Merah',6),
(71,'Tinta Epson Biru',6),
(72,'Tinta Epson Hitam',6),
(73,'Tinta Epson Kuning',6),
(74,'Tinta Epson Merah',6),
(75,'Tipe X',3),
(92,'Sapu',3),
(95,'Meja',3);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan`
--

DROP TABLE IF EXISTS `pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_unit_prodi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '[0 = proses, 1 = approve proses, 2 = kirim, 3 = selesai]',
  PRIMARY KEY (`id_pengajuan`) USING BTREE,
  KEY `id_barang` (`id_barang`),
  KEY `id_unitjurusan` (`id_unit_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan`
--

LOCK TABLES `pengajuan` WRITE;
/*!40000 ALTER TABLE `pengajuan` DISABLE KEYS */;
INSERT INTO `pengajuan` VALUES
(18,54,1,1,'2022-07-29','1'),
(19,29,17,2,'2022-07-29','3'),
(20,22,1,2,'2022-08-01','1'),
(21,45,1,1,'2022-08-01','0'),
(22,5,17,1,'2022-08-01','2'),
(23,71,1,3,'2022-08-02','0'),
(24,72,1,2,'2022-08-03','0'),
(28,46,1,1,'2022-08-04','0'),
(29,21,1,1,'2022-08-04','2'),
(30,21,1,1,'2022-08-04','0'),
(31,21,1,1,'2022-08-04','2'),
(32,24,2,6,'2022-08-04','2'),
(33,3,2,1,'2022-08-04','0');
/*!40000 ALTER TABLE `pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` VALUES
(1,'Lembar'),
(2,'Box'),
(3,'Buah'),
(4,'Roll'),
(5,'Rim'),
(6,'Botol'),
(10,'lusin');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_prodi`
--

DROP TABLE IF EXISTS `unit_prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit_prodi` (
  `id_unit_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `unit_prodi` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_unit_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_prodi`
--

LOCK TABLES `unit_prodi` WRITE;
/*!40000 ALTER TABLE `unit_prodi` DISABLE KEYS */;
INSERT INTO `unit_prodi` VALUES
(1,'Teknik Komp Inf'),
(2,'Teknik Elektro'),
(3,'Teknik Mesin'),
(4,'Akuntansi'),
(5,'Rekam Medik'),
(6,'Teknik Kimia'),
(7,'Mesin Otomotif'),
(8,'Kontruksi Bangunan'),
(9,'Wadir 1'),
(10,'Wadir 2'),
(11,'Wadir 3'),
(12,'Kabag Taus'),
(13,'Kasubag Kmh'),
(14,'Kasubag Kepeg'),
(15,'Kasubag Keu'),
(16,'Kasubbag Umum'),
(17,'Ka Akademik'),
(18,'Sekdir'),
(19,'Unit PDPT'),
(20,'Unit P2M'),
(21,'Penjaminan Mutu'),
(22,'Perpustakaan'),
(23,'Humas PMB'),
(27,'LSP');
/*!40000 ALTER TABLE `unit_prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit_prodi` int(11) NOT NULL,
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '0 = user, 1 = admin',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(4,'admin','9avk6tiuaiRA/3uyBgkuT56FXrW6CqYoouf3OIGVIosjmV6GQiG7D3w4yqd0gHu4eQRmj3WZbxlBNluB1+fLBbWL5p4GSyodx/nPmydm0P4HGsw=',4,'1'),
(10,'riogesta','/eehOnHEXrxe35zZ+5Go2PvgQusjCqT3BlMeROvC/uYq1tgu7bAnoxUonZDXZL9/f3LKaFr0Pqb/SrrmVy7RR8UqBqiSid7yKGDt52di65rHmsI=',1,'0'),
(11,'salsabila','uEzfDuR3mRq1K73jXpjtjGDFQfkbw5CcMR0ltmI93TVqiG+e3PyFrN83sXrU1sX1d7YixjSFheSVFaWxsZJA/ey25r9WwMaNAhT0/I9RnEj23uOW',17,'0'),
(12,'agus','v6kKZ1ImLurXflOTvPiqJNNQMKIc88D895OPElp6Tg6dEya+unKVBKGCLtKJGr5et7yZBdNcYnmVloHdXRfaWUfD51Y+xzOoUxv/G79zNjqrh8mUC/4p',2,'0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-04 18:02:11
