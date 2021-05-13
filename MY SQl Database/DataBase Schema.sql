-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ubs
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertisement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `like` int DEFAULT '0',
  `dislike` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisement`
--

LOCK TABLES `advertisement` WRITE;
/*!40000 ALTER TABLE `advertisement` DISABLE KEYS */;
INSERT INTO `advertisement` VALUES (169,'10% Discount on Laptops','Hurry up!! Grab the offer before it expires. Visit UTA Bookstore for additional details.','UTA Bookstore','alexmooz@gmail.com','images/bookstore.jpg',7,11),(170,'Free Pizza every Friday','Come grab a pizza for free, all on Us.','Old School Pizza','kyathamomkar@gmail.com','images/pizza.jfif',3,0),(324,'Party','its  a party','CSE','ayman_omc@yahoo.com','images/1200px-7_Up_-_You_like_it,_it_likes_you,_1948.jpg',1,0);
/*!40000 ALTER TABLE `advertisement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `expiration` varchar(45) DEFAULT NULL,
  `cvv` int DEFAULT NULL,
  `item_selected_id` varchar(50) DEFAULT NULL,
  `purchasetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `flag` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
INSERT INTO `checkout` VALUES (235,'Aiman','ABDULLAH','ayman_omc@yahoo.com','7905 copper canyon Dr','United States','Texas',76002,'Credit','aiman abdullah','1111212124131432','02/22',124,'57','2021-04-10 19:53:17','ayman_omc@yahoo.com','true'),(236,'Aiman','ABDULLAH','ayman_omc@yahoo.com','7905 copper canyon Dr','United States','Texas',76002,'Debit','aiman abdullah','2323214233124311','22/33',343,'58','2021-04-10 19:55:04','ayman_omc@yahoo.com','true'),(265,'OMKAR','KYATHAM','omkar.kyatham@mavs.uta.edu','515 UTA BLVD','United States','Texas',76010,'Debit','sd','1111111111111111','11/11',123,'59','2021-04-15 18:52:35','ubs@gmail.com','true'),(267,'Fad','Q','me@me.com','1234 Main','United States','Texas',75201,'Credit','Fad','1231231234321234','12/32',111,'95','2021-04-16 00:27:54','ubs@gmail.com','true'),(268,'Aiman','ABDULLAH','ayman_omc@yahoo.com','7905 copper canyon Dr','United States','Texas',76002,'Credit','aiman abdullah','3333332133421111','02/22',232,'135','2021-05-11 00:38:01','ayman_omc@yahoo.com','true'),(269,'Aiman','ABDULLAH','ayman_omc@yahoo.com','7905 copper canyon Dr','United States','Texas',76002,'Credit','aiman abdullah','2323232222222222','09/22',454,'137','2021-05-11 22:47:37','ayman_omc@yahoo.com','true');
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clubmemberships`
--

DROP TABLE IF EXISTS `clubmemberships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clubmemberships` (
  `membershipid` int NOT NULL AUTO_INCREMENT,
  `clubname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `useremail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`membershipid`),
  KEY `clubfk` (`clubname`),
  KEY `userfk` (`useremail`),
  CONSTRAINT `clubfk` FOREIGN KEY (`clubname`) REFERENCES `clubs` (`clubname`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `userfk` FOREIGN KEY (`useremail`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubmemberships`
--

LOCK TABLES `clubmemberships` WRITE;
/*!40000 ALTER TABLE `clubmemberships` DISABLE KEYS */;
INSERT INTO `clubmemberships` VALUES (3,'Robotics Club','ubs@gmail.com'),(23,'Math Club','ubs@gmail.com'),(27,'Chess Club','ubs@gmail.com'),(31,'Engineering Club','ubs@gmail.com'),(42,'Chess Club','ayman_omc@yahoo.com'),(43,'Robotics Club','ayman_omc@yahoo.com'),(44,'Chess Club','ayman_omc1@yahoo.com'),(45,'Math Club','ayman_omc1@yahoo.com'),(46,'Robotics Club','ayman_omc1@yahoo.com'),(47,'Chess Club','ayman_omc2@yahoo.com'),(48,'Math Club','ayman_omc2@yahoo.com'),(49,'Robotics Club','ayman_omc2@yahoo.com'),(50,'Chess Club','ayman_omc3@yahoo.com');
/*!40000 ALTER TABLE `clubmemberships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clubs` (
  `clubid` int NOT NULL AUTO_INCREMENT,
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `clubname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clubowner` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`clubid`),
  UNIQUE KEY `clubs_clubname_uindex` (`clubname`),
  KEY `clubownerfk` (`clubowner`),
  CONSTRAINT `clubownerfk` FOREIGN KEY (`clubowner`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubs`
--

LOCK TABLES `clubs` WRITE;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;
INSERT INTO `clubs` VALUES (1,'This is a chess club for the university students. Events related to chess will be posted here','Chess Club','ubs@gmail.com'),(2,'This is a maths club for the university students. Events related to maths will be posted here','Math Club','ubs@gmail.com'),(3,'This is a robotic club for the university students. Events related to robotics will be posted here','Robotics Club','ubs@gmail.com'),(18,'Were super cool and want to hang out','Cool kids on campus','furs@gmail.com'),(19,'Join us for the coolest pets ever!','Coolest pets ever!','furs@gmail.com'),(43,'dance','Dance CLub','ubs@gmail.com'),(46,'Club for Engineers','Engineering Club','ubs@gmail.com'),(47,'cool dogs','goldendoodles','ubs@gmail.com'),(48,'Just join','Aiman Club','ayman_omc@yahoo.com');
/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchange`
--

DROP TABLE IF EXISTS `exchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exchange` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `posttime` datetime DEFAULT CURRENT_TIMESTAMP,
  `like` int DEFAULT '0',
  `dislike` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchange`
--

LOCK TABLES `exchange` WRITE;
/*!40000 ALTER TABLE `exchange` DISABLE KEYS */;
INSERT INTO `exchange` VALUES (6,'Covid-19 Update','Fall Classes are in person','ubs@gmail.com','/images/exchange/UTA.jpeg','2021-03-31 22:49:19',104,55),(11,'UBS System Update','Feature update','ubs@gmail.com','images/exchange/UBS.png','2021-04-02 02:57:10',0,1),(12,'Midterm September 16 2019, questions and answers','new','ayman_omc@yahoo.com','images/exchange/DSC_8323.jpg','2021-05-11 00:13:16',0,0);
/*!40000 ALTER TABLE `exchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendlist`
--

DROP TABLE IF EXISTS `friendlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friendlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `friendemail` varchar(100) DEFAULT NULL,
  `clubname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendlist`
--

LOCK TABLES `friendlist` WRITE;
/*!40000 ALTER TABLE `friendlist` DISABLE KEYS */;
INSERT INTO `friendlist` VALUES (5,'ayman_omc3@yahoo.com','ubs@gmail.com','Chess Club'),(6,'ayman_omc@yahoo.com','ubs@gmail.com','Chess Club');
/*!40000 ALTER TABLE `friendlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `messageid` int NOT NULL AUTO_INCREMENT,
  `messagetitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `messagedescription` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sender` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senderemail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `recipient` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `messagetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `clubmessage` tinyint(1) DEFAULT '0',
  `clubname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (4,'Updated Class Schedule','Hello students, I give up so class is cancelled for today','Fadiah','marky@gmail.com','ubs@gmail.com','2021-03-06 05:06:19',0,'null'),(5,'Club Meeting Postponed','Hello Team, Club meeting is postponed to next week','Chess Club','Chess Club','All users','2021-03-06 06:26:53',1,'Chess Club'),(6,'Spring Break Trip','Hey Alex, what about spring break?','Omkar','ubs@gmail.com','alexmooz@gmail.com','2021-03-06 19:20:25',0,'null'),(8,'presentation','what is the time','Omkar','ubs@gmail.com','alexmooz@gmail.com','2021-03-11 23:34:52',0,'null'),(35,'Update ','v2.0','Omkar','ubs@gmail.com','alexmooz@gmail.com','2021-04-28 23:56:24',0,'null'),(36,'Update ','v2.0','Omkar','ubs@gmail.com','ayman_omc@yahoo.com','2021-04-28 23:56:24',0,'null'),(37,'Update ','v2.0','Chess Club','Chess Club','All users','2021-04-28 23:56:25',1,'Chess Club'),(38,'eee','eererer','Aiman Club','Aiman Club','All users','2021-05-11 00:59:33',1,'Aiman Club'),(39,'rrt','eee','Aiman Club','Aiman Club','All users','2021-05-11 01:01:07',1,'Aiman Club');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int DEFAULT '0',
  `salefeature` varchar(20) DEFAULT NULL,
  `itemname` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sellerName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (57,'ubs@gmail.com','Never used book because Prof. Khalili\'s teachings are sufficient ',30,'Exchange','SE Book','https://images-na.ssl-images-amazon.com/images/I/513ME3UUZCL._SX380_BO1,204,203,200_.jpg',NULL),(58,'ubs@gmail.com','New because I failed last semester',80,'Lend','Graduation Cap','https://bkstr.scene7.com/is/image/Bkstr/18931976',NULL),(59,'ubs@gmail.com','Because Texas is 100% Open',10,'Sell','UTA Masks','/images/masks.jpg',NULL),(137,'ayman_omc@yahoo.com','new',25,'Sell','Java Book','images/DSC_8323.jpg','Aiman');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `states` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `zipcode` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Omkar','kyatham','c4662b15801a2ab6f4341ef54fcadd76','ubs@gmail.com','Arlington','Texas','76010','images/adminpic.png','https://fontawesome.com/icons/linkedin-in',NULL,NULL),(11,'Alex','Mooz','0cef1fb10f60529028a71f58e54ed07b','alexmooz@gmail.com','irving','Texas','75060',NULL,NULL,NULL,NULL),(27,'Fursie','Wursie','41a8dd72ef553db8a9b1d9084af29031','furs@gmail.com','dallas','Texas','75201',NULL,NULL,NULL,NULL),(29,'John','KYATHAM','c4662b15801a2ab6f4341ef54fcadd76','omkar.kyatham@gmail.com','ARLINGTON','Texas','76010','images/main_logo.png',NULL,NULL,NULL),(30,'Alex','Moozhayil','d49410e17bff102443546bdb2d8033bf','alex@gmail.com','Irving','Texas','75060',NULL,NULL,NULL,NULL),(31,'Fadiah','Q','c4662b15801a2ab6f4341ef54fcadd76','fad@gmail.com','Arlington','Tennessee','75123',NULL,NULL,NULL,NULL),(32,'Aiman','ABDULLAH','9bdcac431cbac1462dcbed5ad7a5d752','ayman_omc@yahoo.com','Saginaw','Texas','76131','images/DSC_8323-removebg-preview.jpg',NULL,NULL,NULL),(33,'Aiman','ABDULLAH','9bdcac431cbac1462dcbed5ad7a5d752','ayman_omc1@yahoo.com','Arlington','Texas','76002',NULL,NULL,NULL,NULL),(34,'Aiman','ABDULLAH','9bdcac431cbac1462dcbed5ad7a5d752','ayman_omc2@yahoo.com','Arlington','Texas','76002',NULL,NULL,NULL,NULL),(35,'Aimanwww','ABDULLAH','9bdcac431cbac1462dcbed5ad7a5d752','ayman_omc3@yahoo.com','Arlington','Texas','76002',NULL,'https://fontawesome.com/icons/linkedin-in','','');
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

-- Dump completed on 2021-05-12 22:56:32
