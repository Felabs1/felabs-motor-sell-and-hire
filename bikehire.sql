-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: bikehire
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bikes`
--

DROP TABLE IF EXISTS `bikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bikes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `bikeName` varchar(50) NOT NULL,
  `bikeModel` varchar(40) NOT NULL,
  `purpose` varchar(4) NOT NULL,
  `dateBought` date NOT NULL,
  `mileage` float NOT NULL,
  `bikeImage` text NOT NULL,
  `price` float NOT NULL,
  `owner` int NOT NULL,
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bikes`
--

LOCK TABLES `bikes` WRITE;
/*!40000 ALTER TABLE `bikes` DISABLE KEYS */;
INSERT INTO `bikes` VALUES (4,'Bajaj','KMDA 998T','sale','2022-03-01',200,'../images/uploads/bajaj2.jpeg',78000,1,'2022-03-04 12:16:34','available'),(5,'Test Bike','KMTC 900L','sale','2022-03-03',6999,'../images/uploads/bike2.jpeg',23000,2,'2022-03-04 13:35:00','unavailable'),(6,'Bajaj','KMTC 900T','sale','2022-03-01',67000,'../images/uploads/bajaj2.jpeg',300000,1,'2022-03-04 14:47:22','available');
/*!40000 ALTER TABLE `bikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hire`
--

DROP TABLE IF EXISTS `hire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hire` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `hireFullName` varchar(50) NOT NULL,
  `hireAddress` varchar(50) NOT NULL,
  `hireContact` varchar(14) NOT NULL,
  `hireReturnDate` date NOT NULL,
  `hireReason` varchar(50) NOT NULL,
  `hireAmount` float NOT NULL,
  `bikeId` int NOT NULL,
  `requestDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hire`
--

LOCK TABLES `hire` WRITE;
/*!40000 ALTER TABLE `hire` DISABLE KEYS */;
INSERT INTO `hire` VALUES (1,'felix','Kanyamedha','0111942081','2022-03-03','Hustle',300,1,'2022-03-03 05:19:39');
/*!40000 ALTER TABLE `hire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `saleFullName` varchar(40) NOT NULL,
  `saleAddress` varchar(40) NOT NULL,
  `saleContact` varchar(13) NOT NULL,
  `saleAmount` float NOT NULL,
  `bikeId` int NOT NULL,
  `saleDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'felix','Kisumu','0111942081',40000,2,'2022-03-03 17:19:15'),(2,'felix','Kisumu','0798275909',23000,5,'2022-03-04 13:40:53'),(3,'felix','Kisumu','0111942081',78000,4,'2022-03-04 13:41:18'),(4,'felix','Location x','0111942081',23000,3,'2022-03-04 13:42:32');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fullName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'felix','felix@gmail.com','$2y$10$s/zNmykC6JfqdjEdTXtscubUWcIgLJlP1yRVCHf6gbhilwdcCgH.a','0111942081','2022-03-01 12:55:15'),(2,'heyden ruth','heydenruth20@gmail.com','$2y$10$uQPTWbFEhhH74DGedJLXtO.mO4EkL9.zjPok3LB4LcAvE3qv95VLK','0798275909','2022-03-04 13:32:03');
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

-- Dump completed on 2022-03-15 14:11:27
