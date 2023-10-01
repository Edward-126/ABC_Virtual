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
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_accounts` (
  `ua_ID` int NOT NULL AUTO_INCREMENT,
  `ua_firstname` varchar(45) DEFAULT NULL,
  `ua_lastname` varchar(45) DEFAULT NULL,
  `ua_age` int DEFAULT NULL,
  `ua_gender` varchar(45) DEFAULT NULL,
  `ua_username` varchar(45) DEFAULT NULL,
  `ua_password` varchar(45) DEFAULT NULL,
  `ua_email` varchar(45) DEFAULT NULL,
  `ua_contact` varchar(45) DEFAULT NULL,
  `ua_address` varchar(45) DEFAULT NULL,
  `ua_province` varchar(45) DEFAULT NULL,
  `ua_district` varchar(45) DEFAULT NULL,
  `ua_zip` int DEFAULT NULL,
  `users_u_ID` int NOT NULL,
  PRIMARY KEY (`ua_ID`),
  KEY `fk_user_accounts_users1_idx` (`users_u_ID`),
  CONSTRAINT `fk_user_accounts_users1` FOREIGN KEY (`users_u_ID`) REFERENCES `users` (`u_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_accounts`
--

LOCK TABLES `user_accounts` WRITE;
/*!40000 ALTER TABLE `user_accounts` DISABLE KEYS */;
INSERT INTO `user_accounts` VALUES (66,'Thilina','Rathnayaka',20,'Male','thili126','1111','immortalshadow810@gmail.com','0718913548','Dandagamuwa','Northwestern ','Kurunegala',60200,40),(67,'Indika','Rathnayaka',58,'Female','indi126','1111','immortalshadow810@gmail.com','0718913548','Dandagamuwa','Northwestern ','Kurunegala',60200,41),(68,'Aaryan ','Fenazir',20,'Male','Aary111','Aryan123','adheeb0402@gmail.com','+94 778801387','19/11, dehiwala','Western','Kandy',1,48);
/*!40000 ALTER TABLE `user_accounts` ENABLE KEYS */;
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
