CREATE DATABASE  IF NOT EXISTS `onlinefood`;
USE `onlinefood`;
-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: onlinefood
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `card_details`
--

DROP TABLE IF EXISTS `card_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `card_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint NOT NULL,
  `exp_month` smallint NOT NULL,
  `exp_year` smallint NOT NULL,
  `cvc` smallint NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reservation_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `card_details_reservation_id_index` (`reservation_id`),
  KEY `card_details_order_id_index` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_details`
--

LOCK TABLES `card_details` WRITE;
/*!40000 ALTER TABLE `card_details` DISABLE KEYS */;
/*INSERT INTO `card_details` VALUES (1,'Atif Ibrahim',4242424242424242,3,2022,542,34,'2020-10-09 15:55:23','2020-10-09 15:55:23',NULL,NULL),(2,'Jhon Doe',4242876764717263,1,2021,345,34,'2020-10-09 15:57:29','2020-10-09 15:57:29',NULL,NULL),(3,'Atif',4343434343434343,5,2020,123,34,'2020-10-09 18:35:21','2020-10-09 18:35:21',NULL,NULL),(4,'Atif',4242897898764563,4,2022,432,34,'2020-10-09 20:53:57','2020-10-09 20:53:57',NULL,NULL),(5,'Mr Khan',4242424242424242,2,2021,432,34,'2020-10-09 20:57:35','2020-10-09 20:57:35',35,NULL),(6,'Mr Khan',4242424242424242,3,2020,123,34,'2020-10-09 22:06:38','2020-10-09 22:06:38',NULL,1),(7,'Mr Jhon',4242424242424242,3,2022,123,34,'2020-10-09 22:09:41','2020-10-09 22:09:41',NULL,2),(8,'Mr Khan',4242424242424242,2,2021,123,34,'2020-10-09 22:10:58','2020-10-09 22:10:58',36,NULL),(9,'Shanze Malik',5234098787659876,4,2021,123,34,'2020-10-09 22:12:52','2020-10-09 22:12:52',NULL,3),(10,'Maria B.',4242424242424242,4,2022,200,34,'2020-10-09 22:18:52','2020-10-09 22:18:52',NULL,4),(11,'Mr Khan',4242424242424242,3,2023,123,34,'2020-10-09 22:19:32','2020-10-09 22:19:32',NULL,5),(12,'Jhon Doe',4242424242424242,5,2023,123,34,'2020-10-09 22:20:39','2020-10-09 22:20:39',NULL,6),(13,'Sarah Deo',4242424242424242,3,2022,123,34,'2020-10-09 22:53:23','2020-10-09 22:53:23',NULL,7),(14,'Mr Jhon',4242424242424242,2,2024,123,34,'2020-10-09 22:54:20','2020-10-09 22:54:20',37,NULL);*/
/*!40000 ALTER TABLE `card_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `categoryID` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurantID` int unsigned DEFAULT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `isArchive` tinyint DEFAULT '0',
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*INSERT INTO `category` VALUES (11,2,'Indian Food',0,'2020-09-17 19:58:57','2020-09-17 19:58:57',NULL,NULL,NULL),(12,NULL,'adasdas',0,'2020-09-17 20:04:35','2020-09-17 20:04:35',NULL,NULL,NULL),(14,3,'Mexican',0,'2020-09-18 20:33:52','2020-09-18 20:33:52',NULL,NULL,NULL),(15,3,'Fast Food',0,'2020-09-18 20:34:56','2020-09-18 20:34:56',NULL,NULL,NULL),(16,3,'Indian Food',0,'2020-09-18 20:35:43','2020-09-18 20:35:43',NULL,NULL,NULL),(17,6,'Fast Foods',0,'2020-09-20 13:51:31','2020-09-20 14:14:58',NULL,NULL,NULL),(18,7,'Fast Foods',0,'2020-09-27 22:41:14','2020-09-27 22:41:14',NULL,NULL,NULL),(19,8,'Fast Food',0,'2020-09-28 08:47:03','2020-09-28 08:47:03',NULL,NULL,NULL),(20,9,'Mexican',0,'2020-09-28 09:01:40','2020-09-28 09:01:40',NULL,NULL,NULL),(21,10,'Fast Food',0,'2020-09-28 09:10:21','2020-09-28 09:10:21',NULL,NULL,NULL),(22,11,'The coffee club',0,'2020-09-28 09:57:19','2020-09-28 09:57:19',NULL,NULL,NULL),(23,12,'apple',0,'2020-10-05 12:16:23','2020-10-05 12:16:23',NULL,NULL,NULL),(24,13,'Soup',0,'2020-10-05 17:55:26','2020-10-05 17:55:26',NULL,NULL,NULL),(25,1,'Bar BQ',0,'2020-10-09 12:51:22','2020-10-09 12:51:22',NULL,NULL,NULL),(26,1,'Chicken & Beef Burger',0,'2020-10-09 12:51:43','2020-10-09 12:51:43',NULL,NULL,NULL),(27,1,'Sandwiches',0,'2020-10-09 12:52:04','2020-10-09 12:52:04',NULL,NULL,NULL);*/
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foodItems`
--

DROP TABLE IF EXISTS `foodItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foodItems` (
  `foodItemsID` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurantID` int DEFAULT NULL,
  `categoryID` int DEFAULT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `itemPrice` varchar(255) DEFAULT NULL,
  `isArchive` tinyint DEFAULT '0',
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_by` int DEFAULT '0',
  PRIMARY KEY (`foodItemsID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foodItems`
--

LOCK TABLES `foodItems` WRITE;
/*!40000 ALTER TABLE `foodItems` DISABLE KEYS */;
/*INSERT INTO `foodItems` VALUES (3,NULL,11,'Chicken Curry','100',0,'2020-09-17 19:59:19','2020-09-17 19:59:19',NULL,NULL,0),(4,NULL,11,'Chicken Biryani','50',0,'2020-09-17 19:59:46','2020-09-17 19:59:46',NULL,NULL,0),(5,3,14,'Pasta','20',0,'2020-09-18 20:34:09','2020-09-18 20:34:09',NULL,NULL,0),(6,3,14,'pizza','30',0,'2020-09-18 20:34:34','2020-09-18 20:34:34',NULL,NULL,0),(7,3,15,'Zinger burger','30',0,'2020-09-18 20:35:13','2020-09-18 20:35:13',NULL,NULL,0),(8,3,15,'Fries','5',0,'2020-09-18 20:35:29','2020-09-18 20:35:29',NULL,NULL,0),(9,3,16,'Chicken Curry','24',0,'2020-09-18 20:36:05','2020-09-18 20:36:05',NULL,NULL,0),(10,6,17,'Pizza','50',0,'2020-09-20 13:52:43','2020-09-20 13:52:43',NULL,NULL,0),(11,6,17,'Burger','20',0,'2020-09-20 14:15:22','2020-09-20 14:15:22',NULL,NULL,0),(12,7,18,'Burger','20',0,'2020-09-27 22:41:31','2020-09-27 22:41:31',NULL,NULL,0),(13,8,19,'Quarter Pounder','14',0,'2020-09-28 08:48:42','2020-09-28 08:53:21',NULL,NULL,0),(14,8,19,'Cheesy Beef Burger','15',0,'2020-09-28 08:52:39','2020-09-28 08:52:39',NULL,NULL,0),(15,8,19,'Crispy Spicy Chicken McWrap','12',0,'2020-09-28 08:53:55','2020-09-28 08:53:55',NULL,NULL,0),(16,9,20,'Whole Chicken','21',0,'2020-09-28 09:03:13','2020-09-28 09:03:13',NULL,NULL,0),(17,9,20,'Feast for One','19',0,'2020-09-28 09:03:36','2020-09-28 09:03:36',NULL,NULL,0),(18,9,20,'Cheesy Garlic Mini Pita','4',0,'2020-09-28 09:03:58','2020-09-28 09:03:58',NULL,NULL,0),(19,9,20,'4 Grilled Tenderloins','10',0,'2020-09-28 09:04:48','2020-09-28 09:04:48',NULL,NULL,0),(20,9,20,'Smashed Avocado and Feta','14',0,'2020-09-28 09:06:11','2020-09-28 09:06:11',NULL,NULL,0),(21,10,21,'Big Jack Meal','13',0,'2020-09-28 09:11:13','2020-09-28 09:11:13',NULL,NULL,0),(22,10,21,'Whopper Cheese','14',0,'2020-09-28 09:11:38','2020-09-28 09:11:38',NULL,NULL,0),(23,10,21,'Bacon Deluxe','15',0,'2020-09-28 09:12:37','2020-09-28 09:12:37',NULL,NULL,0),(24,10,21,'Tendercrisp Peri Peri','13',0,'2020-09-28 09:15:36','2020-09-28 09:15:36',NULL,NULL,0),(25,11,22,'Cheese burger','13',0,'2020-09-28 09:58:27','2020-09-28 09:58:27',NULL,NULL,0),(26,12,23,'jalebi','24',0,'2020-10-05 12:16:56','2020-10-05 12:16:56',NULL,NULL,0),(27,12,23,'samosa','21',0,'2020-10-05 12:17:32','2020-10-05 12:17:32',NULL,NULL,0),(28,13,24,'test','20',0,'2020-10-05 17:56:42','2020-10-05 17:56:42',NULL,NULL,0),(29,13,24,'teste','20',0,'2020-10-05 17:57:19','2020-10-05 17:57:19',NULL,NULL,0),(30,1,25,'Chicken Piece','190',0,'2020-10-09 12:53:43','2020-10-09 12:53:43',NULL,NULL,0),(31,1,25,'Chicken Kabab','90',0,'2020-10-09 12:54:30','2020-10-09 12:54:30',NULL,NULL,0),(32,1,25,'Bihari Kabab','130',0,'2020-10-09 12:54:46','2020-10-09 12:54:46',NULL,NULL,0);*/
/*!40000 ALTER TABLE `foodItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fooditems`
--

DROP TABLE IF EXISTS `fooditems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fooditems` (
  `foodItemsID` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurantID` int DEFAULT NULL,
  `categoryID` int DEFAULT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `itemPrice` varchar(255) DEFAULT NULL,
  `isArchive` tinyint DEFAULT '0',
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_by` int DEFAULT '0',
  PRIMARY KEY (`foodItemsID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fooditems`
--

LOCK TABLES `fooditems` WRITE;
/*!40000 ALTER TABLE `fooditems` DISABLE KEYS */;
/*!40000 ALTER TABLE `fooditems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (7,'2014_10_12_100000_create_password_resets_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2020_10_09_202344_create_card_details_table',2),(10,'2020_10_10_012809_add_columns_in_card_details',2),(11,'2020_10_10_024432_create_orders_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `subtotal` int NOT NULL,
  `total_items` int NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `order_status` enum('pending','delivered','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_sidenote` text COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_restaurant_id_index` (`restaurant_id`),
  KEY `orders_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*INSERT INTO `orders` VALUES (1,3,188,3,'[{\"item_id\":5,\"restaurant_id\":3,\"item_name\":\"Pasta\",\"item_category\":14,\"item_price\":\"20\",\"item_qty\":\"4\"},{\"item_id\":9,\"restaurant_id\":3,\"item_name\":\"Chicken Curry\",\"item_category\":16,\"item_price\":\"24\",\"item_qty\":\"2\"},{\"item_id\":7,\"restaurant_id\":3,\"item_name\":\"Zinger burger\",\"item_category\":15,\"item_price\":\"30\",\"item_qty\":\"2\"}]',NULL,'pending',NULL,34,'2020-10-09 22:06:38','2020-10-09 22:06:38'),(2,3,140,2,'{\"0\":{\"item_id\":5,\"restaurant_id\":3,\"item_name\":\"Pasta\",\"item_category\":14,\"item_price\":\"20\",\"item_qty\":\"4\"},\"2\":{\"item_id\":7,\"restaurant_id\":3,\"item_name\":\"Zinger burger\",\"item_category\":15,\"item_price\":\"30\",\"item_qty\":\"2\"}}',NULL,'pending',NULL,34,'2020-10-09 22:09:41','2020-10-09 22:09:41'),(3,9,65,3,'[{\"item_id\":18,\"restaurant_id\":9,\"item_name\":\"Cheesy Garlic Mini Pita\",\"item_category\":20,\"item_price\":\"4\",\"item_qty\":\"1\"},{\"item_id\":16,\"restaurant_id\":9,\"item_name\":\"Whole Chicken\",\"item_category\":20,\"item_price\":\"21\",\"item_qty\":\"2\"},{\"item_id\":17,\"restaurant_id\":9,\"item_name\":\"Feast for One\",\"item_category\":20,\"item_price\":\"19\",\"item_qty\":\"1\"}]',NULL,'pending',NULL,34,'2020-10-09 22:12:52','2020-10-09 22:12:52'),(4,1,320,2,'[{\"item_id\":30,\"restaurant_id\":1,\"item_name\":\"Chicken Piece\",\"item_category\":25,\"item_price\":\"190\",\"item_qty\":1},{\"item_id\":32,\"restaurant_id\":1,\"item_name\":\"Bihari Kabab\",\"item_category\":25,\"item_price\":\"130\",\"item_qty\":1}]',NULL,'pending',NULL,34,'2020-10-09 22:18:52','2020-10-09 22:18:52'),(5,1,270,1,'[{\"item_id\":31,\"restaurant_id\":1,\"item_name\":\"Chicken Kabab\",\"item_category\":25,\"item_price\":\"90\",\"item_qty\":\"3\"}]',NULL,'pending',NULL,34,'2020-10-09 22:19:32','2020-10-09 22:19:32'),(6,1,960,2,'[{\"item_id\":32,\"restaurant_id\":1,\"item_name\":\"Bihari Kabab\",\"item_category\":25,\"item_price\":\"130\",\"item_qty\":\"3\"},{\"item_id\":30,\"restaurant_id\":1,\"item_name\":\"Chicken Piece\",\"item_category\":25,\"item_price\":\"190\",\"item_qty\":\"3\"}]',NULL,'pending',NULL,34,'2020-10-09 22:20:39','2020-10-09 22:20:39'),(7,3,24,1,'[{\"item_id\":9,\"restaurant_id\":3,\"item_name\":\"Chicken Curry\",\"item_category\":16,\"item_price\":\"24\",\"item_qty\":1}]',NULL,'pending',NULL,34,'2020-10-09 22:53:23','2020-10-09 22:53:23');*/
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `reservationID` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurantID` int DEFAULT NULL,
  `size` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `expectedTime` datetime DEFAULT NULL,
  `isArchive` tinyint DEFAULT '0',
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_by` int DEFAULT '0',
  PRIMARY KEY (`reservationID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*INSERT INTO `reservation` VALUES (6,1,4,'sdsd','3014052791','2020-09-18 19:59:00',0,'2020-09-18 20:59:42','2020-09-18 20:59:42',NULL,NULL,0),(7,1,5,'df','3014052791','2020-09-16 20:01:00',0,'2020-09-18 21:01:14','2020-09-18 21:01:14',NULL,NULL,0),(8,1,5,'sdsd','3014052791','2020-09-18 20:03:00',0,'2020-09-18 21:03:06','2020-09-18 21:03:06',NULL,NULL,0),(9,4,6,'nk','3698521470','2020-09-25 12:52:00',0,'2020-09-19 09:22:32','2020-09-19 09:22:32',NULL,NULL,0),(10,1,4,'nik','1478523690','2020-09-26 12:53:00',0,'2020-09-19 09:23:53','2020-09-19 09:23:53',NULL,NULL,0),(11,2,5,'Syed','+61413687753','2020-09-20 12:26:00',0,'2020-09-19 20:57:04','2020-09-19 20:57:04',NULL,NULL,0),(12,6,3,'Raz123','12333','2020-09-20 17:16:00',0,'2020-09-20 14:17:14','2020-09-20 14:17:14',NULL,NULL,0),(13,2,-8,'nik','1258749630','2020-10-01 12:43:00',0,'2020-09-21 09:13:06','2020-09-21 09:13:06',NULL,NULL,0),(14,6,4,'wajeeh','04136654221','2020-09-23 16:05:00',0,'2020-09-21 12:35:51','2020-09-21 12:35:51',NULL,NULL,0),(15,1,4,'nik','0452369780','2020-09-30 10:18:00',0,'2020-09-27 06:48:45','2020-09-27 06:48:45',NULL,NULL,0),(17,1,2,'nik','1203654789','2020-10-09 13:24:00',0,'2020-09-28 09:54:27','2020-09-28 09:54:27',NULL,NULL,0),(18,11,2,'nik','0450123012','2020-10-01 13:26:00',0,'2020-09-28 09:56:48','2020-09-28 09:56:48',NULL,NULL,0),(19,8,3,'Syed Rafay Mukhtar','+61413687753','2020-09-28 15:22:00',0,'2020-09-28 11:52:41','2020-09-28 11:52:41',NULL,NULL,0),(20,8,2,'3erw','rwer','2020-10-01 20:08:00',0,'2020-09-28 12:34:45','2020-09-28 12:34:45',NULL,NULL,0),(21,8,2,'3erw','rwer','2020-10-01 20:08:00',0,'2020-09-28 12:35:23','2020-09-28 12:35:23',NULL,NULL,0),(22,10,2,'Hj','0897898980','2020-10-01 07:08:00',0,'2020-10-01 04:38:25','2020-10-01 04:38:25',NULL,NULL,0),(23,8,4,'Name','12345678','2020-10-03 20:36:00',0,'2020-10-01 21:07:05','2020-10-01 21:07:05',NULL,NULL,0),(24,1,2,'Nik','6562473926','2020-10-05 07:20:00',0,'2020-10-05 04:51:07','2020-10-05 04:51:07',NULL,NULL,0),(25,10,2,'Syed Rafay Mukhtar','+61413687753','2020-10-05 14:09:00',0,'2020-10-05 11:39:25','2020-10-05 11:39:25',NULL,NULL,0),(26,1,2,'apple','4216527250','2020-10-06 14:51:00',0,'2020-10-05 12:21:23','2020-10-05 12:21:23',NULL,NULL,0),(27,3,3,'Anisha Kunwar','4216527250','2020-12-17 15:10:00',0,'2020-10-05 12:35:25','2020-10-05 12:35:25',NULL,NULL,0),(28,13,5,'test','1250','2020-10-05 16:25:00',0,'2020-10-05 17:56:12','2020-10-05 17:56:12',NULL,NULL,0),(29,1,4,'Atif Ibrahim','302 4698165','2020-10-16 22:44:00',0,'2020-10-09 12:42:18','2020-10-09 12:42:18',NULL,NULL,0),(30,3,4,'Atif Ibrahim','302 4698165','2020-10-24 17:20:00',0,'2020-10-09 15:55:23','2020-10-09 15:55:23',NULL,NULL,0),(31,9,16,'Mr Kane','302 4698165','2020-10-15 14:00:00',0,'2020-10-09 15:57:29','2020-10-09 15:57:29',NULL,NULL,0),(32,6,3,'Atif Ibrahim','302 4698165','2020-10-16 17:35:00',0,'2020-10-09 18:35:21','2020-10-09 18:35:21',NULL,NULL,0),(33,3,4,'Atif Ibrahim','302 4698165','2020-12-30 01:00:00',0,'2020-10-09 20:53:57','2020-10-09 20:53:57',NULL,NULL,0),(34,3,4,'Mr Khan','302 4698165','2020-10-17 20:00:00',0,'2020-10-09 20:55:59','2020-10-09 20:55:59',NULL,NULL,0),(35,3,4,'Mr Khan','302 4698165','2020-10-17 20:00:00',0,'2020-10-09 20:57:35','2020-10-09 20:57:35',NULL,NULL,0),(36,7,45,'Atif Ibrahim','302 4698165','2020-10-16 23:13:00',0,'2020-10-09 22:10:58','2020-10-09 22:10:58',NULL,NULL,0),(37,7,4,'Atif Ibrahim','302 4698165','2019-11-30 12:59:00',0,'2020-10-09 22:54:20','2020-10-09 22:54:20',NULL,NULL,0);*/
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant` (
  `restaurantID` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurantName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_image` varchar(400) DEFAULT NULL,
  `isArchive` tinyint DEFAULT '0',
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`restaurantID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
/*INSERT INTO `restaurant` VALUES (1,'Jawa','java@gmail.com','03014052791','H#400 St#25 Mughal Pura Lahore',NULL,0,'2020-09-16 19:22:58','2020-09-17 19:59:42',NULL,NULL,NULL),(2,'Groove train','groove@gmail.com','0413687753','Casuarina Sq.',NULL,1,'2020-09-17 19:54:44','2020-09-17 20:08:14',NULL,NULL,NULL),(3,'Safron','safron@asdsa','23123231','Scriven St.',NULL,0,'2020-09-18 20:33:31','2020-09-18 20:38:08',NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,0,'2020-09-19 09:21:13','2020-09-19 09:21:13',NULL,NULL,NULL),(5,'domino','domino@gmail.com','0415669874','14 scriven st, alawa 0810',NULL,0,'2020-09-20 13:04:45','2020-09-20 13:15:16',NULL,NULL,NULL),(6,'1964','1964@gmail.com','12365','shsdjh',NULL,0,'2020-09-20 13:47:34','2020-09-20 13:50:56',NULL,NULL,NULL),(7,'Eden Garden','test@gmail.com','55555','dsd',NULL,0,'2020-09-27 22:39:26','2020-09-27 22:40:37',NULL,NULL,NULL),(8,'McDonalds (Casuarina)','mcdonalds@gmail.com','0413687753','Casuarina Sq.',NULL,0,'2020-09-28 08:44:37','2020-09-28 08:57:36',NULL,NULL,NULL),(9,'Nandos (Casuarina)','nandos@gmail.com','+61413687753','Casuarina Sq.',NULL,0,'2020-09-28 09:00:45','2020-09-28 09:07:31',NULL,NULL,NULL),(10,'Hungry Jacks (Darwin)','hungryjacks@gmail.com','+61413687753','Casuarina Sq.',NULL,0,'2020-09-28 09:09:05','2020-09-28 09:16:48',NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,0,'2020-09-28 09:55:43','2020-09-28 09:55:43',NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,0,'2020-10-05 12:14:33','2020-10-05 12:14:33',NULL,NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL,0,'2020-10-05 17:54:27','2020-10-05 17:54:27',NULL,NULL,NULL);*/
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurantID` int unsigned DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(150) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(400) DEFAULT NULL,
  `isArchive` tinyint DEFAULT '0',
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*INSERT INTO `users` VALUES (2,NULL,'Ali','Raza','admin@example.com','$2y$10$zLWn88XpgUUZeqe1w2EIn.tx.T.wqNmWZy.ZYe61hEigJSZUq.3Pe',NULL,NULL,NULL,NULL,0,'2020-09-14 16:29:24','2020-09-14 16:34:04',NULL,NULL,NULL),(3,NULL,'Ali','Raza','1alishah22020@gmail.com','$2y$10$TdTv2r1M4N40gXcjTRuopO8iXaU3zN0vkxDHsFjrBZKEx21ZcF/1W',NULL,NULL,NULL,NULL,0,'2020-09-14 16:52:28','2020-09-14 16:52:28',NULL,NULL,NULL),(5,NULL,'abc','test','abc@gmail.com','$2y$10$7d1pUkrI8a8bcnD3SDk/F.iDas0sNGcuruE5CuCHV7ioCBgFpZ13q','User',NULL,NULL,NULL,0,'2020-09-16 13:27:48','2020-09-16 14:11:42',NULL,NULL,NULL),(6,NULL,'Ali','Raza','a@gmail.com','$2y$10$QBiDilD2/gJtr20gVLoKou/2jYBpmmL5r4ZsJjQr86mmt5elvS0hS','Manager',NULL,NULL,NULL,0,'2020-09-16 19:08:30','2020-09-16 19:08:30',NULL,NULL,NULL),(7,1,'eli','Raza','eli@gmail.com','$2y$10$2aFavat4Qw82N5MHbMP9K.c2FpZY8UWSSrSaJHNOJBlNCe8Y9TbPe','Manager',NULL,NULL,NULL,0,'2020-09-16 19:22:58','2020-09-16 19:22:58',NULL,NULL,NULL),(8,2,'Syed','Rafa','rafay_syed1@yahoo.com','$2y$10$gQyuC07ny2U8YDpFzGrdGOwk.aN0G9Iz2RK//DiNvL6LvFQA3hLEi','Manager',NULL,NULL,NULL,0,'2020-09-17 19:54:44','2020-09-17 19:54:44',NULL,NULL,NULL),(9,NULL,'Front','Demo','front@gmail.com','$2y$10$AqJoZzaQxM3kvO5waJL5/.gbWGrOv5MjYZPOZ8gKKEEu4F/rfmU.C','User',NULL,NULL,NULL,0,'2020-09-17 20:57:18','2020-09-17 20:57:18',NULL,NULL,NULL),(10,NULL,'Nick','Mariyad','1234@gmail.com','$2y$10$cnRqUdB6.ROWFAn0bs2e8eJWVPOa./DKbu3o0CFWZv.99J5uvJ1C2','User',NULL,NULL,NULL,0,'2020-09-18 20:18:08','2020-09-20 14:11:47',NULL,NULL,NULL),(11,3,'Syed','Rafay','rdx_pro1@yahoo.com','$2y$10$490LanAT4l1QrikPGJpj2OXtpOC8NsLZh6o1u054BtuOtRgK.7Qpi','Manager',NULL,NULL,NULL,0,'2020-09-18 20:33:31','2020-09-18 20:33:31',NULL,NULL,NULL),(12,NULL,'Syed','Shah','rafay_syed3@yahoo.com','$2y$10$Q6YKEDLKyhzWJ0NtKAFN1.jTmFUF9zvwQiw/8NnAGJHLQJMwrQC/S','User',NULL,NULL,NULL,0,'2020-09-18 20:44:44','2020-09-18 20:44:44',NULL,NULL,NULL),(13,NULL,'as','bs','as@gmail.com','$2y$10$VjAZ6S.ys5wfMxGZQCfSLeJtVoH38F/YyZwFrsaItFsu2kwLB8OP2','User',NULL,NULL,NULL,0,'2020-09-18 20:51:36','2020-09-18 20:51:36',NULL,NULL,NULL),(14,4,'nik','mariy','12345@gmail.com','$2y$10$Ab5heVh2euCm1Q1g8X.i2uLregfVyR0QmwICM4xksV1a0r0soKNDi','Manager',NULL,NULL,NULL,0,'2020-09-19 09:21:13','2020-09-19 09:21:13',NULL,NULL,NULL),(15,NULL,'Syed','Mukhtar','rafay_syed2@yahoo.com','$2y$10$sqUyGpkArZfHet1FhZdeCuosJ4SUdcRkElqSYTxxE8G149/EaWJB6','User',NULL,NULL,NULL,0,'2020-09-19 20:46:04','2020-09-20 14:11:09',NULL,NULL,NULL),(16,5,'ABC','XYZ','wajeeh.hasan322@gmail.com','$2y$10$LEpMK6Ej6KmOBlrX8xSFXe8e/a1L8StF63ZmKRJPACjrcFZ63gmMS','Manager',NULL,NULL,NULL,0,'2020-09-20 13:04:45','2020-09-20 13:04:45',NULL,NULL,NULL),(17,6,'abc','xyz','xyz@gmail.com','$2y$10$Dt4mN6Wqp1Aiq2hVqprc7ePhGSXWqndY3gXMlnhisbV37ZbylTpZO','Manager',NULL,NULL,NULL,0,'2020-09-20 13:47:34','2020-09-20 13:47:34',NULL,NULL,NULL),(18,NULL,'abc','xzy','officialjunks@yahoo.com','$2y$10$D2aJ3.4sGTAFmEXi2AKFheDtDZT0ENSF2TSg8CHQpEjIQPzBtc90q','User',NULL,NULL,NULL,0,'2020-09-21 12:32:31','2020-09-21 12:32:31',NULL,NULL,NULL),(20,NULL,'NIk','MAR','123456@gmail.com','$2y$10$Itc83Kpw27Y3QiBxTxh24uLaZlNBap79wn6ZSBpJcjxgT6o.LKJuy','User',NULL,NULL,NULL,0,'2020-09-27 06:44:43','2020-09-27 06:44:43',NULL,NULL,NULL),(21,NULL,'abc','abc','abc123@gmail.com','$2y$10$ywQyqly/dl57RYOIFnmJZ.zjXZaC9CEfQoXvQ3bKz15v8LZmKmESG','User',NULL,NULL,NULL,0,'2020-09-27 22:16:58','2020-09-27 22:16:58',NULL,NULL,NULL),(22,7,'Eden','Gaden','eden@abc.com','$2y$10$9MMehxZ1b1n7AUxQ4PbocObsM5Pqgyv8xeU8Qyt.JEqbpmqBwnen.','Manager',NULL,NULL,NULL,0,'2020-09-27 22:39:26','2020-09-27 22:39:26',NULL,NULL,NULL),(23,8,'Syed','Mukhtar','mcdonalds@gmail.com','$2y$10$lp523Q0nP/FfqoVE7JDJ1uxcgNAWDW4RScnw/ss62.wo28dQeLsgK','Manager',NULL,NULL,NULL,0,'2020-09-28 08:44:37','2020-09-28 08:44:37',NULL,NULL,NULL),(24,NULL,'Syed','Mukhtar','rafay@gmail.com','$2y$10$Dv15uXGFyotSI4a5VNYGx.Rq0S4LtVJmFG523c2wwGB4MvAxCddO.','User',NULL,NULL,NULL,0,'2020-09-28 08:55:16','2020-09-28 08:55:16',NULL,NULL,NULL),(25,9,'Syed','Mukhtar','nandos@gmail.com','$2y$10$uHpfEy.7BJOxs7xQk7RXhOuZGXJWUklbkrk8wdbPw1rmsnElr7tFO','Manager',NULL,NULL,NULL,0,'2020-09-28 09:00:45','2020-09-28 09:00:45',NULL,NULL,NULL),(26,10,'Syed','Mukhtar','hungryjacks@gmail.com','$2y$10$vLRuCypqyfbyEBATPCq6dOB5xBVwrPLYMHhzeAnq3d2TKD7752BpO','Manager',NULL,NULL,NULL,0,'2020-09-28 09:09:05','2020-09-28 09:09:05',NULL,NULL,NULL),(27,11,'nik','mar','12341@gmail.com','$2y$10$lnSfa6QIFkcUlKqXcuKyyO.78dO4oUUItTfllyb/h6JaL3VDwDuYW','Manager',NULL,NULL,NULL,0,'2020-09-28 09:55:44','2020-09-28 09:55:44',NULL,NULL,NULL),(28,NULL,'Na','me','name@gmail.com','$2y$10$DMm5D8lA7d8xbJiLpJE/yuGWEJUxvBdHungoGIjLFXA6Ve9VGfmGG','User',NULL,NULL,NULL,0,'2020-10-01 04:36:20','2020-10-01 04:36:20',NULL,NULL,NULL),(29,NULL,'Raza','Bhukari','alishah22020@gmail.com','$2y$10$yoM2EZiJg4zeiNQtMqmPJ.8TMXOiysq1.ORDikCazg5Pcu9yE/jMq','User',NULL,NULL,NULL,0,'2020-10-04 16:32:24','2020-10-04 16:32:24',NULL,NULL,NULL),(30,12,'apple','apple','apple@gmail.com','$2y$10$oZ9rOaysKTSb/eg/jGGTb.bR9aWgpdCyuGutRHpSKJkrany1ZBoEm','Manager',NULL,NULL,NULL,0,'2020-10-05 12:14:33','2020-10-05 12:14:33',NULL,NULL,NULL),(31,NULL,'orange','orange','orange@gmail.com','$2y$10$Ewf/MEjYfyXIuM6318diD.o.W20lMo6UBNkxv9MW64EIpxkEGMiOC','User',NULL,NULL,NULL,0,'2020-10-05 12:18:39','2020-10-05 12:18:39',NULL,NULL,NULL),(32,13,'Testy Point','Test','nmarediya530@gmail.com','$2y$10$9S4W4vwwddGeJJSulsdc.epRhI6uzObb3XDYer/j.lZ6RboajqSdO','Manager',NULL,NULL,NULL,0,'2020-10-05 17:54:27','2020-10-05 18:28:31',NULL,NULL,NULL),(33,NULL,'nasir','marediya','marediya_nas@yahoo.com','$2y$10$Ls4GmqFwlzB..5Yqj/GEC.H9Dq.7S0Fp5rFAv5DoV5.tztB9IvBTu','User',NULL,NULL,NULL,0,'2020-10-05 18:01:26','2020-10-05 18:01:26',NULL,NULL,NULL),(34,NULL,'Atif','Ibrahim','user@dede.com','$2y$10$2aFavat4Qw82N5MHbMP9K.c2FpZY8UWSSrSaJHNOJBlNCe8Y9TbPe','User',NULL,NULL,NULL,0,'2020-10-09 12:40:18','2020-10-09 12:40:18',NULL,NULL,NULL);*/
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

-- Dump completed on 2020-10-10  8:57:17
