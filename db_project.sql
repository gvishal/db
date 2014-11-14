-- MySQL dump 10.13  Distrib 5.6.20, for Linux (x86_64)
--
-- Host: localhost    Database: db_project
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `ACCOUNT`
--

DROP TABLE IF EXISTS `ACCOUNT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ACCOUNT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `provider` varchar(20) NOT NULL,
  `auth_token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_2` (`uid`,`provider`,`auth_token`),
  KEY `uid` (`uid`),
  CONSTRAINT `ACCOUNT_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ACCOUNT`
--

LOCK TABLES `ACCOUNT` WRITE;
/*!40000 ALTER TABLE `ACCOUNT` DISABLE KEYS */;
INSERT INTO `ACCOUNT` VALUES (3,4,'asdas','asdasd'),(2,4,'fb','asdasd12123'),(7,11,'facebook','asdasd213esadas'),(8,11,'twitter','asdasd123easdasd'),(11,14,'facebook','dasdad32423asd'),(13,14,'gmail','jlkjlnll123123asdas'),(14,14,'iiit','dadjaslkjl12312lklk'),(12,14,'twitter','asdasd234234asdas');
/*!40000 ALTER TABLE `ACCOUNT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `APP`
--

DROP TABLE IF EXISTS `APP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `APP` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_access` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_2` (`uid`,`name`),
  KEY `uid` (`uid`),
  CONSTRAINT `APP_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `APP`
--

LOCK TABLES `APP` WRITE;
/*!40000 ALTER TABLE `APP` DISABLE KEYS */;
INSERT INTO `APP` VALUES (8,11,'owncloud','2014-11-11 17:25:58','2014-11-11 17:25:58'),(10,14,'mycloud','2014-11-11 18:26:53','2014-11-11 18:26:53'),(11,14,'owncloud','2014-11-11 18:26:53','2014-11-11 18:26:53'),(12,14,'yourcloud','2014-11-11 18:26:53','2014-11-11 18:26:53'),(13,14,'iiit','2014-11-11 18:26:53','2014-11-11 18:26:53');
/*!40000 ALTER TABLE `APP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CONTENT`
--

DROP TABLE IF EXISTS `CONTENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CONTENT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shared_link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONTENT`
--

LOCK TABLES `CONTENT` WRITE;
/*!40000 ALTER TABLE `CONTENT` DISABLE KEYS */;
INSERT INTO `CONTENT` VALUES (1,'folder','test1','2014-11-10 11:04:01',''),(2,'file','testfile1','2014-11-10 11:13:58',NULL),(5,'folder','test4','2014-11-10 11:50:21',NULL),(6,'folder','test3','2014-11-10 11:51:18',NULL),(8,'file','testfile2','2014-11-10 11:53:39',NULL),(10,'folder','test6','2014-11-10 18:01:43',NULL),(12,'folder','test4testfolder','2014-11-10 19:16:29',NULL),(13,'file','test4testfile','2014-11-10 19:16:41',NULL),(14,'file','shrenik','2014-11-11 19:10:25',NULL),(16,'folder','test1asdasd','2014-11-11 23:45:25',NULL),(17,'folder','testgsdasdas','2014-11-11 23:45:57',NULL),(28,'folder','testasdasd','2014-11-12 00:09:55',NULL);
/*!40000 ALTER TABLE `CONTENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DEVICE`
--

DROP TABLE IF EXISTS `DEVICE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DEVICE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_2` (`uid`,`type`,`name`),
  KEY `uid` (`uid`),
  CONSTRAINT `DEVICE_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DEVICE`
--

LOCK TABLES `DEVICE` WRITE;
/*!40000 ALTER TABLE `DEVICE` DISABLE KEYS */;
INSERT INTO `DEVICE` VALUES (7,14,'desktop','Ubuntu'),(6,14,'mobile','Android'),(5,14,'mobile','iOS');
/*!40000 ALTER TABLE `DEVICE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FILE`
--

DROP TABLE IF EXISTS `FILE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FILE` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FILE_ibfk_1` FOREIGN KEY (`id`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FILE`
--

LOCK TABLES `FILE` WRITE;
/*!40000 ALTER TABLE `FILE` DISABLE KEYS */;
INSERT INTO `FILE` VALUES (2),(8),(13),(14);
/*!40000 ALTER TABLE `FILE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FOLDER`
--

DROP TABLE IF EXISTS `FOLDER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FOLDER` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  KEY `cid` (`cid`),
  KEY `id` (`id`),
  CONSTRAINT `FOLDER_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FOLDER_ibfk_2` FOREIGN KEY (`id`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOLDER`
--

LOCK TABLES `FOLDER` WRITE;
/*!40000 ALTER TABLE `FOLDER` DISABLE KEYS */;
INSERT INTO `FOLDER` VALUES (1,NULL),(5,NULL),(6,NULL),(10,NULL),(5,12),(12,NULL),(5,13),(16,NULL),(17,NULL),(28,NULL);
/*!40000 ALTER TABLE `FOLDER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HOMEFOLDER`
--

DROP TABLE IF EXISTS `HOMEFOLDER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HOMEFOLDER` (
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `cid_2` (`cid`),
  CONSTRAINT `HOMEFOLDER_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE,
  CONSTRAINT `HOMEFOLDER_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HOMEFOLDER`
--

LOCK TABLES `HOMEFOLDER` WRITE;
/*!40000 ALTER TABLE `HOMEFOLDER` DISABLE KEYS */;
INSERT INTO `HOMEFOLDER` VALUES (11,1),(11,2),(11,5),(11,6),(11,8),(11,10),(11,14),(14,17),(14,28);
/*!40000 ALTER TABLE `HOMEFOLDER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PREFERENCE`
--

DROP TABLE IF EXISTS `PREFERENCE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PREFERENCE` (
  `uid` int(11) NOT NULL,
  `alerts` tinyint(1) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`),
  CONSTRAINT `PREFERENCE_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PREFERENCE`
--

LOCK TABLES `PREFERENCE` WRITE;
/*!40000 ALTER TABLE `PREFERENCE` DISABLE KEYS */;
INSERT INTO `PREFERENCE` VALUES (4,1,1),(11,1,0),(14,1,0);
/*!40000 ALTER TABLE `PREFERENCE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SESSION`
--

DROP TABLE IF EXISTS `SESSION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SESSION` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `os` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`uid`),
  CONSTRAINT `SESSION_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SESSION`
--

LOCK TABLES `SESSION` WRITE;
/*!40000 ALTER TABLE `SESSION` DISABLE KEYS */;
INSERT INTO `SESSION` VALUES (5,14,'2014-11-11 18:26:54','192.168.1.1','chrome','linux'),(6,14,'2014-11-11 18:26:54','10.1.40.44','firefox','linux'),(7,14,'2014-11-11 18:26:54','14.139.82.6','chrome','windows');
/*!40000 ALTER TABLE `SESSION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUBSCRIPTION`
--

DROP TABLE IF EXISTS `SUBSCRIPTION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUBSCRIPTION` (
  `uid` int(11) NOT NULL,
  `started_at` date NOT NULL,
  `space` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `duration` date DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`),
  CONSTRAINT `SUBSCRIPTION_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUBSCRIPTION`
--

LOCK TABLES `SUBSCRIPTION` WRITE;
/*!40000 ALTER TABLE `SUBSCRIPTION` DISABLE KEYS */;
INSERT INTO `SUBSCRIPTION` VALUES (11,'2014-11-10',10000000,'free','2014-12-11'),(14,'2014-11-11',10000000,'free','2014-12-11');
/*!40000 ALTER TABLE `SUBSCRIPTION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hash_password` varchar(40) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (4,1,'Vishal','vishal@example.org','vishal',''),(5,1,'admin','admin@example.org','admin',''),(11,NULL,'John Doe','john@example.org','hello',''),(14,NULL,'Test1','test1@example.org','hello','images/14.jpg');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VERSION`
--

DROP TABLE IF EXISTS `VERSION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VERSION` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `hash` varchar(230) NOT NULL,
  `location` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fileid` (`fileid`),
  CONSTRAINT `VERSION_ibfk_1` FOREIGN KEY (`fileid`) REFERENCES `FILE` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VERSION`
--

LOCK TABLES `VERSION` WRITE;
/*!40000 ALTER TABLE `VERSION` DISABLE KEYS */;
INSERT INTO `VERSION` VALUES (4,13,'asdasdas','files/13_4',12,'2014-11-10 19:16:42'),(7,2,'asdsdafsdfsadf','files/2_7',11,'2014-11-10 20:44:57'),(8,14,'asdasdas','files/14_8',12,'2014-11-11 19:10:25');
/*!40000 ALTER TABLE `VERSION` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-13 22:26:23
