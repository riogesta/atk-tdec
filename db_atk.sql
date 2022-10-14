-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_atk
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB

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
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_satuan` (`id_satuan`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES
(3,'Amplop Surat Polos',2,6),
(4,'Balliner Biru',3,0),
(5,'Balliner Hitam',3,0),
(6,'Ballpoint Pen Biru',3,0),
(7,'Ballpoint Pen Hitam',3,0),
(8,'Binder Clip 107',2,0),
(9,'Binder Clip No 260',2,0),
(10,'Binder Clip No.111',2,0),
(11,'Binder Clip No.200',3,0),
(12,'Bold Liner Elite',3,0),
(13,'Boxfile Keranjang (Plastik)',3,0),
(14,'Boxfile Toyo',3,0),
(15,'Buku Ekspedisi (HardCover)',3,0),
(16,'Buku Folio (HardCover)',3,0),
(17,'Buku Tulis Besar (HardCover)',3,0),
(18,'Clear Holder (Clear Book)',3,0),
(19,'Cutter L-500',3,0),
(20,'Double Tape Kecil',4,0),
(21,'Double Tape Sedang',4,0),
(22,'DVD R',3,0),
(23,'Gunting Besar',3,0),
(24,'Isi Cutter L-500',3,0),
(25,'Isi Stepler Besar',2,0),
(26,'Isi Stepler Kecil',2,0),
(27,'Isolasi Besar Bening',4,0),
(28,'Karet Penghapus Pensil',3,0),
(29,'Kertas A4 70 gr',5,0),
(30,'Kertas Buram',5,0),
(31,'Kertas f4 70 gr',5,0),
(32,'Kertas Folio Bergaris',5,0),
(33,'Kertas Ujian',5,0),
(34,'Kertas Warna Biru F4 70 gr',5,0),
(35,'Kertas Warna Hijau F4',5,0),
(36,'Kertas Warna Kuning F4 70 gr',5,0),
(37,'Kertas Warna Merah F4 70 gr',5,0),
(38,'Lak Ban Hitam',4,0),
(39,'Lem Kertas',3,0),
(40,'Map Kertas Biola',3,0),
(41,'Map Plastik (Bussiness File) Biru',3,0),
(42,'Map Plastik (Bussiness File) Hijau',3,0),
(43,'Map Plastik (Bussiness File) Kuning',3,0),
(44,'Map Plastik (Bussiness File) Merah',3,0),
(45,'Map Spring File',3,0),
(46,'Ordner Besar',3,0),
(47,'Ordner Kecil',3,0),
(48,'Paper Clip (Kecil)',2,0),
(49,'Pembolong Kertas (Punch) Besar',3,0),
(50,'Pembolong Kertas (Punch) Kecil',3,0),
(51,'Penggaris Besi',3,0),
(52,'Penghapus White Board',3,0),
(53,'Pensil',3,0),
(54,'Rak 3 Susun (Doc Tray)',3,0),
(55,'Serutan Pensil Dispenser',3,0),
(56,'Spidol Biru',3,0),
(57,'Spidol Hitam',3,0),
(58,'Spidol Merah',3,0),
(59,'Stabilo Boss Biru',3,0),
(60,'Stabilo Boss Hijau',3,0),
(61,'Stabilo Boss Kuning',3,0),
(62,'Stabilo Boss Pink',3,0),
(63,'Stapler Besar',3,0),
(64,'Stapler Kecil',3,0),
(65,'Sticky Note',3,0),
(66,'Tinta Canon Biru',6,0),
(67,'Tinta Canon Hitam',6,0),
(68,'Tinta Canon Kuning',6,0),
(69,'Tinta Canon Merah',6,0),
(71,'Tinta Epson Biru',6,0),
(72,'Tinta Epson Hitam',6,0),
(73,'Tinta Epson Kuning',6,0),
(74,'Tinta Epson Merah',6,0),
(75,'Tipe X',3,0),
(92,'Sapu',3,0),
(95,'Meja',3,0),
(103,'Meja',3,0),
(104,'Kapur Putih',2,10);
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
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '[0 = proses, 1 = approve proses, 2 = kirim, 3 = selesai]',
  `id_tahun_akademik` int(11) unsigned DEFAULT NULL,
  `jumlah_approve` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengajuan`) USING BTREE,
  KEY `id_barang` (`id_barang`),
  KEY `id_unit_prodi` (`id_unit_prodi`),
  KEY `id_tahun_akademik` (`id_tahun_akademik`),
  CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_unit_prodi`) REFERENCES `unit_prodi` (`id_unit_prodi`),
  CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan`
--

LOCK TABLES `pengajuan` WRITE;
/*!40000 ALTER TABLE `pengajuan` DISABLE KEYS */;
INSERT INTO `pengajuan` VALUES
(18,4,2,1,'2022-09-23','0',1,0),
(19,3,2,3,'2022-09-26','2',1,2);
/*!40000 ALTER TABLE `pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pengaturan`),
  KEY `id_tahun_akademik` (`id_tahun_akademik`),
  CONSTRAINT `pengaturan_ibfk_1` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaturan`
--

LOCK TABLES `pengaturan` WRITE;
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` VALUES
(1,1);
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;
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
-- Table structure for table `tahun_akademik`
--

DROP TABLE IF EXISTS `tahun_akademik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tahun_akademik`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun_akademik`
--

LOCK TABLES `tahun_akademik` WRITE;
/*!40000 ALTER TABLE `tahun_akademik` DISABLE KEYS */;
INSERT INTO `tahun_akademik` VALUES
(1,'2021/2022'),
(2,'2022/2023');
/*!40000 ALTER TABLE `tahun_akademik` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_prodi`
--

LOCK TABLES `unit_prodi` WRITE;
/*!40000 ALTER TABLE `unit_prodi` DISABLE KEYS */;
INSERT INTO `unit_prodi` VALUES
(1,'Teknik Komputer Informatika'),
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
(14,'Kasubag Kepegawaian'),
(15,'Kasubag Keu'),
(16,'Kasubag Umum'),
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
  PRIMARY KEY (`id_user`),
  KEY `id_unit_prodi` (`id_unit_prodi`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_unit_prodi`) REFERENCES `unit_prodi` (`id_unit_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(4,'kasubagumum','68K4QaBq+J2prs6f0CM34e8TH3dTOZcSxbXggxF57wzkXIZqZ+utAX+lZluy6YJSiw4GOYyhbyOH2N4TANNbD41+vnipNPQ0wutVoTE6+KymPebw',16,'1'),
(10,'tekkomp','aaUoK7Do5HBgLyWPGEKLJpoasAOvNlCsIlKHTVK/9JKhn48gl9HqTFfd6Oh79zg0+Y69NarI0UMUbbCKFxMV76yNlHlNgod7e7VZEcSBht9p7YoF',1,'0'),
(11,'akademik','ZT+R7Ic81Fgay+PA8nU7gtDTtFxTddTGC+vbPoIHyTbnAaOhNrUN/5sWZiI2oDtmlDbruvSoisDtWHvdr/RHLv6Nz+ga6LpiQ76aIf39vfYLfBKc',17,'0'),
(12,'mesin','CSiozKmJMoVZN6NYHwfrZJ5SW8SCoKU9K4wWKmduR4Kl+b45ud1cYkE3xmL5oD99hwRm0teNrYNM6aMMYBgx5WM4W5mOLVG6/IrmRh8R6e2+8rxz',3,'0'),
(15,'elektro','OygoJf/7Gyjf1RADFQ3qcKpb/KiLGDRH5e1QhsGjqNch04e5WcnC17qNhIht/JeT2VQZYVuJEOTbFTUKWzfsA6i8x3P59/kGaL0uan1QLH8Q+WmS',2,'0'),
(16,'akuntasi','5YxkR12IP7ZhIbtPvkDRvp0qDfpb3YcwUzA0pUZNEZCxsdVjhhhUGBRYQ6hyOLjNoVkDZ7UPST2GkmdcL9PfJPU7Fl8kpth8QZIJeDwnxDbMhSWf',4,'0'),
(17,'rekammedik','LmfSCfTUqaP+Uj9yJi7fBHbzh4/os5GnA8KlaWZZ+ZGgRSwYr0MZqJURpw1ojL94oBzByOt4Pl4eC9YjXhQuSeD6KWaB4nONGeVlOmVTveh07yTU',5,'0'),
(18,'kimia','lc65Vt5ZHsuskgaq+rOv7s1y5nlIk4JxTEMtzvulZH9rloYKCJfQlwYpkBEZguJUpVNCXI624aviTUrwOtYALDpCK0iQEr5faMywHDm9hFYidaYC',6,'0'),
(19,'otomotif','nHljWApRf1kwMbEfygox999lV4F5bYe5nVtANwJk/C+j1cvbRH7/CUmRgA8fyC86yPvKSXSfCPma8M7iAnwTxaWjy0QiWmxI47ELmQYYHKf7EOsH',7,'0'),
(20,'kontruksibangun','Wefm2qaPM/BvvlaaNxi4stlD4bvSXO9gNP6OanmoGGYKVBlsgakajrBHgDKuzHkgO+xpB/LRf4A9whowLFt9+8GhHcfKKkwhhAT9RPxeLWJLGUUx',8,'0'),
(21,'wadir1','0qTetB0CN996iu2kwnniKZKC46otktT1MK1MvjiA3mP5TWxG2zEpFZI16q2+2PdrbTXzfZFftJRzRvrSNtdx90hZzeWsbZTaaUvyItWAs+vKT8zo',9,'0'),
(22,'wadir2','knYCmWrMnrL7MpLWnAosfBkSGSwaIhL37TcWs78LTrywKYFQJL6cLrIWx3GaI6IF2jXLQFDVbbZUt+q11/aiWQ4G/EN+xC3i3lj8pFNDc8E9LGq9',10,'0'),
(23,'wadir3','Fw7j3M7/F7KBfD7eO+8LgF0gKjJBn08oWABc7ap75dwYR+7sodPMJF98e3m4JPRenw9SceDASSqNOWgG1yb4tcGcLIqmItJB/nHUTzn2nruf1ksv',11,'0'),
(24,'kabagtaus','9ESrT7UQ3mEtr37lfQgsSiMWotA6mLUjRN1TQYxQmD3S3NQWqDdQtQXxUl6xLV2qEk35qgR4pEecXJ7bYMZrX/reIA2rkiV2zKQ0QCvHDBIKhgDi',12,'0'),
(25,'kasubagkmh','5+BAQWXfTqFFnP01VDqVTGS+nOQEFWKZN0NQBaCD66IBA1CG4FHjw0MIn4HKOtfEzbHfhf9qv9/ctTvsG3GQna70bWXtANIdQcIKCjK5TS1RAX3l',13,'0'),
(26,'kasubagkepeg','8wIoqv3kkh1uxIeuJSehE3RwIPHEwp4lEV9ZDBNAnz31eeYcw1nutmnp8bd8UyJxQQ+qz5EsPwo7qKE9O7hRC8X5LtazptFy7kyQJM7UGAxy8zOQ',14,'0'),
(27,'kasubagkeu','KDHcasdS46qaKOREJIGZRwSA7lre8A1cSwnyrYLkJqkYVOgzeItKKpJ20MamrSyZ2ZSkm7DECtNQR06KTFM0DpIlotagMyA68botIL7TEbhMoC7O',15,'0'),
(28,'sekdir','SxQUqSAXozy5rxB1LJt3eqcr+H8ETI9sa8B60XbfTch0RVq5pnlOOd73bgast0cp0LXLD5QKIqwOSAOSuGmBOte79tf3+b/ueMUJBbquXyL2d68I',18,'0'),
(29,'unitpdpt','j42jfupvMjqzEPQPlbgayIkUNxKwRQqQOZYxT2XhvPGHPZWa9QjCRewf2w/hlKIoRPp4eVAsyA6qSXg/aSXFdZYbr247gaG8RAOfOH6xUuYBPJ3z',19,'0'),
(30,'unitp2m','PW5oYbeTo/st+6Rg2QA/7BmXM8pgcVv8ZVw/EWMY7QC3ntyB81RhfiFSQHsAmOCGERGnUN/6PoSPdN5zVhgyiQM7O5GTnjvHn4l/EIx1njC7PhE9',20,'0'),
(31,'penjaminanmutu','SJOK/KqQmLntpggcoJtJLpuuPTuKJAvY3f/50LA6qj6v4+7Hpz0UjHVxFmSiX8RBGF7pr4rCi/oUnIiLMp2alAZsGAwP1nMr70do+QBn5kHvl1WZ',21,'0'),
(32,'perpustakaan','i3WZJBdYYWVf/kPYGgWcUZUQT8Mb+CMI4PXGqajC0eAIyS1b4J0fbb0NNeisYWP499potSYcvHWMWItMepHo+ZgmHQKfilNVC1Moz/SpED75hgT/',22,'0'),
(33,'humas','fZugrTiA5rjZ6t3TIEPcwpI8bKURtVoghGebotkdZbv+PusP63XgzJrMUBbqjD3mfZfmuQFiHhvm9ELxQNZkr+DZpsyfxKhGKAPZ8lfjnLYFePbB',23,'0'),
(34,'unitlsp','vJ+EFJXOk+vL21gHSzyns8p1y74MzLYXteXrhaIMI9kG2HTZdefJEzx3fZBfNULUUmymxVkYw5oDw8TZE6He5yNx+gm+36stwMTKqw81xeuRcrGk',27,'0');
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

-- Dump completed on 2022-10-10 21:41:37
