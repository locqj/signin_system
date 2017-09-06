-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: signin_system
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `awark_rule`
--

DROP TABLE IF EXISTS `awark_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `awark_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_length` int(11) NOT NULL COMMENT '打卡規則獎勵次數',
  `name` varchar(255) NOT NULL COMMENT '獎勵內容',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `awark_rule`
--

LOCK TABLES `awark_rule` WRITE;
/*!40000 ALTER TABLE `awark_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `awark_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_user`
--

DROP TABLE IF EXISTS `client_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) NOT NULL,
  `head_img` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_user`
--

LOCK TABLES `client_user` WRITE;
/*!40000 ALTER TABLE `client_user` DISABLE KEYS */;
INSERT INTO `client_user` VALUES (1,'xxx','http://wx.qlogo.cn/mmopen/RSasjBWyZeBiaeWWmEJZbyCibArcuic8lcibhtfock7iaibhUicuaRC6NiaQzER9icdlXeyeA26eVEnlDiaeIRByN1JziaUc9AJviaUGrak0/0','locqj','2017-08-13 11:35:44');
/*!40000 ALTER TABLE `client_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crontab_note`
--

DROP TABLE IF EXISTS `crontab_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crontab_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cron_openid` text NOT NULL COMMENT '用戶羣組',
  `note` text NOT NULL COMMENT '內容',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `matter_code` text NOT NULL,
  `start_time` varchar(255) NOT NULL COMMENT '定時開始時間',
  `end_time` varchar(255) NOT NULL COMMENT '定時結束時間',
  `crontab_time` varchar(255) NOT NULL COMMENT '定時時間',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crontab_note`
--

LOCK TABLES `crontab_note` WRITE;
/*!40000 ALTER TABLE `crontab_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `crontab_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days_matter`
--

DROP TABLE IF EXISTS `days_matter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days_matter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL COMMENT '倒計時唯一標識',
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `openid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days_matter`
--

LOCK TABLES `days_matter` WRITE;
/*!40000 ALTER TABLE `days_matter` DISABLE KEYS */;
INSERT INTO `days_matter` VALUES (1,'D1502334363r','考研倒計時',2017,12,24,1,'xxx'),(2,'D1502334375r','考研倒計時',2017,12,26,1,'xxx');
/*!40000 ALTER TABLE `days_matter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moon_calculate`
--

DROP TABLE IF EXISTS `moon_calculate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moon_calculate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '心情名稱',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `code` varchar(50) NOT NULL COMMENT '心情唯一標識',
  `openid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moon_calculate`
--

LOCK TABLES `moon_calculate` WRITE;
/*!40000 ALTER TABLE `moon_calculate` DISABLE KEYS */;
INSERT INTO `moon_calculate` VALUES (1,'很好',1,'moon1','xxx1'),(2,'差勁',0,'moon2','xxx'),(3,'一般',0,'moon3','xxx'),(4,'一般般',1,'moon4','xxx'),(5,'name',0,'moon5','xxx'),(6,'name',1,'moon6','xxx');
/*!40000 ALTER TABLE `moon_calculate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sign_actions`
--

DROP TABLE IF EXISTS `sign_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sign_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL COMMENT '活動唯一標識',
  `name` varchar(255) NOT NULL COMMENT '活動名稱',
  `start_time` varchar(255) DEFAULT NULL COMMENT '活動開始時間',
  `end_time` varchar(255) DEFAULT NULL COMMENT '活動結束時間',
  `week_set` text COMMENT '一周活動選擇',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `time_length` varchar(255) NOT NULL DEFAULT '0' COMMENT '活動長度',
  `openid` varchar(255) NOT NULL COMMENT '用戶唯一標識',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `matter_code` text NOT NULL COMMENT '倒計時任務的類目',
  `result_start` varchar(255) DEFAULT NULL,
  `result_end` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sign_actions`
--

LOCK TABLES `sign_actions` WRITE;
/*!40000 ALTER TABLE `sign_actions` DISABLE KEYS */;
INSERT INTO `sign_actions` VALUES (10,'A1502412064N','指定日期有效','2017-08-11','2017-08-22',NULL,0,'1','xxx','2017-08-11 08:08:41',NULL,'test',NULL,NULL,2),(11,'A1502412083N','指定時間有效',NULL,NULL,NULL,0,'0','xxx','2017-08-11 08:08:41',NULL,'test','08:41','08:59',3),(13,'A1502412218N','指定時間日期有效','2017-08-07','2017-08-31',NULL,1,'0','xxx','2017-08-11 08:08:43',NULL,'test','08:43','08:48',1),(16,'A1502416325N','測試status1','2017-08-11','2017-08-12',NULL,1,'0','xxx','2017-08-11 09:08:52',NULL,'test','09:51','10:59',1),(17,'A1502418163N','status4',NULL,NULL,NULL,1,'0','xxx','2017-08-11 10:08:22',NULL,'test',NULL,NULL,4);
/*!40000 ALTER TABLE `sign_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sign_log`
--

DROP TABLE IF EXISTS `sign_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sign_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) NOT NULL COMMENT '用戶唯一標識',
  `tag_code` varchar(50) NOT NULL COMMENT '讀物唯一標識',
  `moon_code` varchar(50) NOT NULL COMMENT '心情唯一標識',
  `action_code` varchar(50) NOT NULL COMMENT '活動唯一標識',
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `img_log` varchar(255) DEFAULT NULL COMMENT '圖片記錄',
  `status_log` int(11) NOT NULL COMMENT '打卡連擊次數',
  `created_at` varchar(255) NOT NULL,
  `status_tag` int(11) NOT NULL COMMENT '標記最新的連擊記錄',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sign_log`
--

LOCK TABLES `sign_log` WRITE;
/*!40000 ALTER TABLE `sign_log` DISABLE KEYS */;
INSERT INTO `sign_log` VALUES (13,'xxx','tag1','moon1','A1502412064N',2017,8,12,NULL,0,'2017-08-12 17:20:52',1),(14,'xxx','tag1','moon1','A1502412064N',2017,8,13,'',1,'2017-08-12 17:20:52',2),(15,'xxx1','tag1','moon1','A1502412064N',2017,8,13,'',1,'2017-08-12 17:20:52',1);
/*!40000 ALTER TABLE `sign_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_calculate`
--

DROP TABLE IF EXISTS `tag_calculate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_calculate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '讀物名稱',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '狀態',
  `code` varchar(50) NOT NULL COMMENT '類目唯一標識',
  `openid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_calculate`
--

LOCK TABLES `tag_calculate` WRITE;
/*!40000 ALTER TABLE `tag_calculate` DISABLE KEYS */;
INSERT INTO `tag_calculate` VALUES (1,'日文',0,'tag1','xxx'),(2,'英文',1,'tag2','xxx'),(3,'日语',1,'tag3','xxx');
/*!40000 ALTER TABLE `tag_calculate` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-16 16:43:15
