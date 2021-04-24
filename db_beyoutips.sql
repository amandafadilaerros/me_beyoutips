-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_beyoutips
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (2,'admin','admin@gmail.com','admin'),(3,'dila','dila@gmail.com','123');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_beli`
--

DROP TABLE IF EXISTS `tb_beli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_beli` (
  `id_beli` int(11) NOT NULL AUTO_INCREMENT,
  `pembeli` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no` int(15) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `jumbel` int(11) NOT NULL,
  `ket` text NOT NULL,
  `total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_beli`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_beli`
--

LOCK TABLES `tb_beli` WRITE;
/*!40000 ALTER TABLE `tb_beli` DISABLE KEYS */;
INSERT INTO `tb_beli` VALUES (40,'daslkmdsadas','dsa',12120222,'bukti1615687217.jpg',3,1,'',150000,'2021-03-14 02:10:23',19,3),(41,'Zahro Nurrobby Ashari','dsadsadsa',12120222,'bukti1615688337.jpg',3,2,'',300000,'2021-03-14 02:19:22',19,3);
/*!40000 ALTER TABLE `tb_beli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` VALUES (1,'Make Up'),(2,'Skincare'),(3,'Lotion'),(4,'Bodycare'),(5,'Bedak');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_login` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_login`
--

LOCK TABLES `tb_login` WRITE;
/*!40000 ALTER TABLE `tb_login` DISABLE KEYS */;
INSERT INTO `tb_login` VALUES (3,'je','je@gmail.com','123'),(4,'user1','user1@gmail.com','123');
/*!40000 ALTER TABLE `tb_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produk`
--

DROP TABLE IF EXISTS `tb_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produk`
--

LOCK TABLES `tb_produk` WRITE;
/*!40000 ALTER TABLE `tb_produk` DISABLE KEYS */;
INSERT INTO `tb_produk` VALUES (18,2,'Emina Liptint','Sangat Hoax dan akan membuat jerawatan',75000,200,'produk1614832612.jpg',20),(19,4,'Maybelline Prime','Recomended untuk kulit berjerawat',150000,100,'produk1614832649.jpg',13),(22,5,'Zahro Nurrobby Ashari','1000',0,100000,'produk1615830549.png',9),(23,5,'Anjaays','dsadsa',99999,1000,'produk1615830626.png',9);
/*!40000 ALTER TABLE `tb_produk` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-16  0:54:21
