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
-- Table structure for table `reception_accounts`
--

DROP TABLE IF EXISTS `reception_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reception_accounts` (
  `ra_ID` int NOT NULL AUTO_INCREMENT,
  `ra_firstname` varchar(45) DEFAULT NULL,
  `ra_lastname` varchar(45) DEFAULT NULL,
  `ra_age` int DEFAULT NULL,
  `ra_gender` varchar(45) DEFAULT NULL,
  `ra_position` varchar(45) DEFAULT NULL,
  `ra_username` varchar(45) DEFAULT NULL,
  `ra_password` varchar(45) DEFAULT NULL,
  `ra_email` varchar(45) DEFAULT NULL,
  `ra_contact` varchar(45) DEFAULT NULL,
  `ra_address` varchar(45) DEFAULT NULL,
  `ra_province` varchar(45) DEFAULT NULL,
  `ra_district` varchar(45) DEFAULT NULL,
  `ra_zip` varchar(45) DEFAULT NULL,
  `users_u_ID` int NOT NULL,
  PRIMARY KEY (`ra_ID`),
  KEY `fk_reception_accounts_users1_idx` (`users_u_ID`),
  CONSTRAINT `fk_reception_accounts_users1` FOREIGN KEY (`users_u_ID`) REFERENCES `users` (`u_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reception_accounts`
--

LOCK TABLES `reception_accounts` WRITE;
/*!40000 ALTER TABLE `reception_accounts` DISABLE KEYS */;
INSERT INTO `reception_accounts` VALUES (2,'Maleesha','Jayathilaka',21,'Female','Front-desk','math126','1111','immortalshadow810@gmail.com','0718913548','Dandagamuwa','Northwestern ','Kurunegala','60200',44),(3,'Sanidu','Gunathilaka',21,'Male','Customer Support','sani126','1111','immortalshadow810@gmail.com','0795625200','Dematagoda','Northwestern ','Kurunegala','60201',47);
/*!40000 ALTER TABLE `reception_accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-27 17:04:19
