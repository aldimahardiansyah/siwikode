-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsiwikode
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jenis_kuliner`
--

DROP TABLE IF EXISTS `jenis_kuliner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_kuliner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kuliner`
--

LOCK TABLES `jenis_kuliner` WRITE;
/*!40000 ALTER TABLE `jenis_kuliner` DISABLE KEYS */;
INSERT INTO `jenis_kuliner` VALUES (1,'Kedai/Cafe'),(2,'Restaurant'),(3,'Pasar Kaget');
/*!40000 ALTER TABLE `jenis_kuliner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_wisata`
--

DROP TABLE IF EXISTS `jenis_wisata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_wisata`
--

LOCK TABLES `jenis_wisata` WRITE;
/*!40000 ALTER TABLE `jenis_wisata` DISABLE KEYS */;
INSERT INTO `jenis_wisata` VALUES (1,'Argo Wisata'),(2,'Kuliner'),(3,'Taman Wisata'),(4,'Museum'),(5,'Water Park / Kolam Renang');
/*!40000 ALTER TABLE `jenis_wisata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesi`
--

DROP TABLE IF EXISTS `profesi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesi`
--

LOCK TABLES `profesi` WRITE;
/*!40000 ALTER TABLE `profesi` DISABLE KEYS */;
INSERT INTO `profesi` VALUES (1,'Artist'),(2,'Pejabat'),(3,'Mahasiswa'),(4,'Pegawai Swasta'),(5,'Umum');
/*!40000 ALTER TABLE `profesi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `wisata_id` int(11) NOT NULL,
  `profesi_id` int(11) NOT NULL,
  `rating` smallint(6) DEFAULT NULL,
  `komentar` text,
  PRIMARY KEY (`id`),
  KEY `fk_testimoni_wisata1_idx` (`wisata_id`),
  KEY `fk_testimoni_profesi1_idx` (`profesi_id`),
  CONSTRAINT `fk_testimoni_profesi1` FOREIGN KEY (`profesi_id`) REFERENCES `profesi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_testimoni_wisata1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimoni`
--

LOCK TABLES `testimoni` WRITE;
/*!40000 ALTER TABLE `testimoni` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wisata`
--

DROP TABLE IF EXISTS `wisata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `jenis_wisata_id` int(11) NOT NULL,
  `fasilitas` text,
  `bintang` smallint(6) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `latlong` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `jenis_kuliner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wisata_jenis_wisata_idx` (`jenis_wisata_id`),
  KEY `fk_wisata_jenis_kuliner1_idx` (`jenis_kuliner_id`),
  CONSTRAINT `fk_wisata_jenis_kuliner1` FOREIGN KEY (`jenis_kuliner_id`) REFERENCES `jenis_kuliner` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wisata_jenis_wisata` FOREIGN KEY (`jenis_wisata_id`) REFERENCES `jenis_wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wisata`
--

LOCK TABLES `wisata` WRITE;
/*!40000 ALTER TABLE `wisata` DISABLE KEYS */;
/*!40000 ALTER TABLE `wisata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-24  8:51:48
