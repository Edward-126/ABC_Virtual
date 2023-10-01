CREATE DATABASE  IF NOT EXISTS `abc_virtual` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `abc_virtual`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: abc_virtual
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `r_appointments`
--

DROP TABLE IF EXISTS `r_appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `r_appointments` (
  `a_ID` int NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(45) DEFAULT NULL,
  `a_lastname` varchar(45) DEFAULT NULL,
  `a_date` date DEFAULT NULL,
  `a_reason` varchar(45) DEFAULT NULL,
  `a_reschedule_reason` varchar(45) DEFAULT NULL,
  `receptionists_r_ID` int NOT NULL,
  `doctors_d_ID` int NOT NULL,
  PRIMARY KEY (`a_ID`),
  KEY `fk_appointments_copy1_receptionists1_idx` (`receptionists_r_ID`),
  KEY `fk_r_appointments_doctors1_idx` (`doctors_d_ID`),
  CONSTRAINT `fk_appointments_copy1_receptionists1` FOREIGN KEY (`receptionists_r_ID`) REFERENCES `receptionists` (`r_ID`),
  CONSTRAINT `fk_r_appointments_doctors1` FOREIGN KEY (`doctors_d_ID`) REFERENCES `doctors` (`d_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_appointments`
--

LOCK TABLES `r_appointments` WRITE;
/*!40000 ALTER TABLE `r_appointments` DISABLE KEYS */;
INSERT INTO `r_appointments` VALUES (50,'Thilina','Rathnayaka','2023-08-01','CRAZY',NULL,22,22),(51,'Thilina','Rathnayaka','2023-08-02','CRAZY',NULL,22,22),(52,'Thilina','Rathnayaka','2023-08-20','Test','dumb1',22,22),(53,'Thilina','Rathnayaka','2023-08-24','DEAD','WOW',22,22);
/*!40000 ALTER TABLE `r_appointments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-27 17:04:17
