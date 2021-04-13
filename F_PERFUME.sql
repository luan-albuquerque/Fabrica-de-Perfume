-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: F_PERFUME
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `est_agua`
--

DROP TABLE IF EXISTS `est_agua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `est_agua` (
  `id_est` int NOT NULL AUTO_INCREMENT,
  `dt_registro` date DEFAULT NULL,
  `volume` float NOT NULL,
  `volumeInicial` float NOT NULL,
  PRIMARY KEY (`id_est`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_agua`
--

LOCK TABLES `est_agua` WRITE;
/*!40000 ALTER TABLE `est_agua` DISABLE KEYS */;
INSERT INTO `est_agua` VALUES (5,'2021-04-13',800,800),(6,'2021-04-13',500,1000);
/*!40000 ALTER TABLE `est_agua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `est_alcool`
--

DROP TABLE IF EXISTS `est_alcool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `est_alcool` (
  `id_est` int NOT NULL AUTO_INCREMENT,
  `dt_registro` date DEFAULT NULL,
  `volume` float NOT NULL,
  `volumeInicial` float NOT NULL,
  PRIMARY KEY (`id_est`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_alcool`
--

LOCK TABLES `est_alcool` WRITE;
/*!40000 ALTER TABLE `est_alcool` DISABLE KEYS */;
INSERT INTO `est_alcool` VALUES (4,'2021-04-13',7750,8000);
/*!40000 ALTER TABLE `est_alcool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `est_fragancia`
--

DROP TABLE IF EXISTS `est_fragancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `est_fragancia` (
  `id_est` int NOT NULL AUTO_INCREMENT,
  `dt_registro` date DEFAULT NULL,
  `volume` float NOT NULL,
  `volumeInicial` float NOT NULL,
  `id_frag` int NOT NULL,
  PRIMARY KEY (`id_est`),
  KEY `id_frag` (`id_frag`),
  CONSTRAINT `est_fragancia_ibfk_1` FOREIGN KEY (`id_frag`) REFERENCES `fragancia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_fragancia`
--

LOCK TABLES `est_fragancia` WRITE;
/*!40000 ALTER TABLE `est_fragancia` DISABLE KEYS */;
INSERT INTO `est_fragancia` VALUES (7,'2021-04-13',750,800,5),(9,'2021-04-13',0,200,5),(11,'2021-04-13',1000,1000,6);
/*!40000 ALTER TABLE `est_fragancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fragancia`
--

DROP TABLE IF EXISTS `fragancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fragancia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dtreg` date NOT NULL,
  `name` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fragancia`
--

LOCK TABLES `fragancia` WRITE;
/*!40000 ALTER TABLE `fragancia` DISABLE KEYS */;
INSERT INTO `fragancia` VALUES (5,'2021-04-13','Eau de Cologne ','Concentração de fragrância de até 2%. Perfeita para o dia, ela dura na pele por até 3h. '),(6,'2021-04-13','Body Splash','Geralmente ele traz entre 3 e 5% de essência na composição e tem fixação média de até 4h. ');
/*!40000 ALTER TABLE `fragancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfume`
--

DROP TABLE IF EXISTS `perfume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfume` (
  `idperf` int NOT NULL AUTO_INCREMENT,
  `dtregistro` date DEFAULT NULL,
  `id_frag` int NOT NULL,
  `volumeFra` float NOT NULL,
  `volumeAgua` float NOT NULL,
  `volumeAlcool` float NOT NULL,
  `volumeTotal` float NOT NULL,
  PRIMARY KEY (`idperf`),
  KEY `id_frag` (`id_frag`),
  CONSTRAINT `perfume_ibfk_1` FOREIGN KEY (`id_frag`) REFERENCES `fragancia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfume`
--

LOCK TABLES `perfume` WRITE;
/*!40000 ALTER TABLE `perfume` DISABLE KEYS */;
INSERT INTO `perfume` VALUES (3,'2021-04-13',5,250,500,250,1000);
/*!40000 ALTER TABLE `perfume` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-13 17:02:53
