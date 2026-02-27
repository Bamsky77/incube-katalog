-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: catalog_project
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Teknologi & Gaming','tech-gaming','2026-02-24 03:15:11','2026-02-24 03:15:11'),(2,'Gaya Hidup Pintar','smart-living','2026-02-24 03:15:11','2026-02-24 03:15:11'),(3,'Kekuatan Industri','industrial','2026-02-24 03:15:11','2026-02-24 03:15:11'),(4,'Pakaian Masa Depan','future-apparel','2026-02-24 03:15:11','2026-02-24 03:15:11'),(5,'Produk Retail Pilihan','retail-selected','2026-02-24 03:15:11','2026-02-24 03:15:11');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `favorites_user_id_product_id_unique` (`user_id`,`product_id`),
  KEY `favorites_product_id_foreign` (`product_id`),
  CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inquiries_product_id_foreign` (`product_id`),
  CONSTRAINT `inquiries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_02_04_074539_create_categories_table',1),(5,'2026_02_04_074539_create_products_table',1),(6,'2026_02_04_074540_create_product_images_table',1),(7,'2026_02_04_074541_create_inquiries_table',1),(8,'2026_02_05_052006_create_favorites_table',1),(9,'2026_02_11_045304_add_badge_fields_to_products_table',1),(10,'2026_02_11_054332_add_sold_count_to_products_table',1),(11,'2026_02_11_133052_add_role_to_users_table',1),(12,'2026_02_24_102106_create_orders_table',2),(13,'2026_02_24_102106_create_reviews_table',2);
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
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'assets/images/vacuum_cleaner.png',1,'2026-02-24 03:15:12','2026-02-24 03:15:12'),(2,2,'https://images.unsplash.com/photo-1572635196237-14b3f281503f?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(3,3,'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(4,4,'assets/images/products/iphone_user.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(5,5,'assets/images/products/headset_user.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(6,6,'assets/images/hero_banner.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(7,7,'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(8,8,'assets/images/smart_coffee.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(9,9,'assets/images/products/silverqueen_chunky.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(10,10,'assets/images/products/yupi_strawberry.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(11,11,'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(12,12,'https://images.unsplash.com/photo-1632928274371-878938e4d825?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(13,13,'assets/images/printer_3d_pro.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(14,14,'assets/images/gaming_setup.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(15,15,'assets/images/products/cimory_yogurt.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(16,16,'assets/images/products/ps5_user.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(17,17,'assets/images/mouse_precision_pro.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(18,18,'assets/images/smartphone_purple.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(19,19,'assets/images/products/mouse_user.png',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(20,20,'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(21,21,'assets/images/products/chitato_lite.png',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(22,22,'https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(23,23,'https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(24,24,'assets/images/products/chiki_balls_choco.png',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(25,25,'assets/images/laptop_purple.png',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(26,26,'assets/images/products/desk_user.png',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(27,27,'https://images.unsplash.com/photo-1504148455328-c376907d081c?auto=format&fit=crop&q=80&w=800',1,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(28,28,'assets/images/watch_purple.png',1,'2026-02-24 03:15:14','2026-02-24 03:15:14');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL DEFAULT '0',
  `is_free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `has_installment` tinyint(1) NOT NULL DEFAULT '0',
  `rating` decimal(3,2) NOT NULL DEFAULT '0.00',
  `review_count` int NOT NULL DEFAULT '0',
  `sold_count` int NOT NULL DEFAULT '0',
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specs` text COLLATE utf8mb4_unicode_ci,
  `technical_specs` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,2,'Robot Vacuum Clean-X','robot-vacuum-clean-x-p4aiz','Pembersih otomatis dengan navigasi laser Lidar.',6200000,0,0,4.60,57,594,'Roborock','Kemasan ritel standar untuk produk Robot Vacuum Clean-X',NULL,'2026-02-24 03:15:11','2026-02-24 03:15:11'),(2,4,'Kacamata AR Vision','kacamata-ar-vision-ddmwl','Overlay data real-time dengan layar OLED mikro.',12000000,0,1,5.00,275,573,'Ray-Ban','Kemasan ritel standar untuk produk Kacamata AR Vision',NULL,'2026-02-24 03:15:12','2026-02-24 03:15:12'),(3,1,'Headset Aether 8K','headset-aether-8k-vd9hm','Audio spasial 3D dengan noise cancelling aktif.',4500000,0,0,3.00,72,280,'HyperX','Kemasan ritel standar untuk produk Headset Aether 8K',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(4,1,'iPhone 15 Pro Sunset Orange','iphone-15-pro-sunset-orange-fi5pq','Edisi terbatas Sunset Orange dengan material titanium yang tangguh dan elegan.',24500000,0,0,4.60,450,927,'Apple','Kemasan ritel standar untuk produk iPhone 15 Pro Sunset Orange',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(5,1,'Pro Gaming Headset X-7','pro-gaming-headset-x-7-uymcg','Audio presisi tinggi dengan surround sound 7.1 untuk pengalaman gaming kompetitif.',1850000,0,1,4.80,341,646,'Razer','Kemasan ritel standar untuk produk Pro Gaming Headset X-7',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(6,2,'Smart Hub Incube V4','smart-hub-incube-v4-ttdbl','Pusat integrasi rumah pintar masa depan.',5500000,0,1,4.60,490,250,'Incube','Kemasan ritel standar untuk produk Smart Hub Incube V4',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(7,3,'Drone Survey Ultra','drone-survey-ultra-amyi3','Pemetaan wilayah industri dengan kamera thermal.',85000000,0,0,3.10,427,250,'DJI','Kemasan ritel standar untuk produk Drone Survey Ultra',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(8,2,'Mesin Kopi Smart Brew','mesin-kopi-smart-brew-amz6l','Rasa kopi premium dari genggaman ponsel anda.',8900000,0,0,3.90,296,933,'Nespresso','Kemasan ritel standar untuk produk Mesin Kopi Smart Brew',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(9,5,'SilverQueen Chunky Bar','silverqueen-chunky-bar-gt7ui','Cokelat susu dengan kacang mente yang melimpah dan potongan chunky yang memuaskan.',22500,0,0,4.50,77,556,'SilverQueen','Kemasan ritel standar untuk produk SilverQueen Chunky Bar',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(10,5,'Yupi Strawberry Kiss','yupi-strawberry-kiss-ro1zb','Permen gummy kenyal berbentuk hati dengan rasa stroberi yang manis.',6500,0,1,4.00,276,817,'Yupi','Kemasan ritel standar untuk produk Yupi Strawberry Kiss',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(11,4,'Ransel Urban Tech','ransel-urban-tech-xtvlt','Kapasitas besar dengan pengisian daya tenaga surya.',3200000,0,1,4.70,348,966,'Peak Design','Kemasan ritel standar untuk produk Ransel Urban Tech',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(12,2,'Air Purifier Aero 9','air-purifier-aero-9-gt27v','Udara bersih maksimal dengan filter HEPA 14.',3800000,0,1,3.90,499,467,'Dyson','Kemasan ritel standar untuk produk Air Purifier Aero 9',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(13,3,'Printer 3D Resin Pro','printer-3d-resin-pro-5frp4','Presisi 8K untuk prototipe skala industri.',14000000,1,1,3.40,362,339,'Anycubic','Kemasan ritel standar untuk produk Printer 3D Resin Pro',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(14,1,'Keyboard Pulsar RGB','keyboard-pulsar-rgb-mh8le','Presisi tinggi dengan lampu ungu mewah.',2450000,1,1,3.80,110,742,'Logitech','Kemasan ritel standar untuk produk Keyboard Pulsar RGB',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(15,5,'Cimory Yogurt Drink Strawberry','cimory-yogurt-drink-strawberry-jp14s','Minuman yogurt segar dengan rasa stroberi yang nikmat dan kaya nutrisi.',9500,0,1,3.90,330,182,'Cimory','Kemasan ritel standar untuk produk Cimory Yogurt Drink Strawberry',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(16,1,'PlayStation 5 Slim Edition','playstation-5-slim-edition-q3zv0','Konsol gaming generasi terbaru dengan desain lebih ramping dan performa super cepat.',9500000,1,0,4.80,383,255,'Sony','Kemasan ritel standar untuk produk PlayStation 5 Slim Edition',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(17,1,'Mouse Precision Pro','mouse-precision-pro-mnjif','Sensor 30K DPI untuk gaming profesional.',1200000,1,0,3.00,449,618,'Razer','Kemasan ritel standar untuk produk Mouse Precision Pro',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(18,1,'Incube Smartphone Z1','incube-smartphone-z1-dpn7n','Flagship revolusioner dengan kamera termutakhir.',18500000,1,0,3.00,226,848,'Samsung','Kemasan ritel standar untuk produk Incube Smartphone Z1',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(19,1,'RGB Gaming Mouse Wolf Edition','rgb-gaming-mouse-wolf-edition-lsskk','Mouse gaming ergonomis dengan sensor optik 16K DPI dan pencahayaan RGB dinamis.',750000,0,0,4.60,244,484,'SteelSeries','Kemasan ritel standar untuk produk RGB Gaming Mouse Wolf Edition',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(20,4,'Sepatu Pintar Impulse','sepatu-pintar-impulse-cqmmp','Sistem pengikat otomatis dan pelacakan langkah.',7500000,1,0,3.10,193,935,'Nike','Kemasan ritel standar untuk produk Sepatu Pintar Impulse',NULL,'2026-02-24 03:15:13','2026-02-24 03:15:13'),(21,5,'Chitato Lite Rumput Laut','chitato-lite-rumput-laut-utp6u','Keripik kentang potong tipis dengan rasa rumput laut yang gurih.',12500,0,0,5.00,323,286,'Chitato','Kemasan ritel standar untuk produk Chitato Lite Rumput Laut',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(22,4,'Jaket Teknis Graphene','jaket-teknis-graphene-wpxjp','Pelindung suhu otomatis dengan serat graphene.',9500000,0,0,4.40,146,856,'North Face','Kemasan ritel standar untuk produk Jaket Teknis Graphene',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(23,3,'Sistem VR Training','sistem-vr-training-zbbes','Simulasi pelatihan industri berbasis cloud.',45000000,1,0,3.70,395,884,'Meta','Kemasan ritel standar untuk produk Sistem VR Training',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(24,5,'Chiki Balls Chocolate','chiki-balls-chocolate-wtbhp','Snack bola renyah dengan rasa cokelat yang manis dan lezat.',8500,1,1,3.10,475,37,'Chiki','Kemasan ritel standar untuk produk Chiki Balls Chocolate',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(25,1,'Laptop Quantum Elite X','laptop-quantum-elite-x-v3h9v','Laptop gaming sultan dengan performa tanpa batas.',35000000,0,0,3.20,189,221,'Asus','Kemasan ritel standar untuk produk Laptop Quantum Elite X',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(26,2,'Smart Study Desk Oak White','smart-study-desk-oak-white-czh1i','Meja belajar minimalis dengan manajemen kabel pintar dan desain modern.',4500000,1,1,4.90,278,292,'IKEA','Kemasan ritel standar untuk produk Smart Study Desk Oak White',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(27,3,'Bor Industri T-900','bor-industri-t-900-ocjca','Tenaga torsi tinggi untuk pengerjaan logam berat.',12500000,1,1,4.90,422,430,'Bosch','Kemasan ritel standar untuk produk Bor Industri T-900',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14'),(28,4,'Jam Luxury Purple X','jam-luxury-purple-x-kt0di','Ikon kemewahan dengan mekanisme tourbillon ungu.',125000000,1,1,3.70,200,198,'Rolex','Kemasan ritel standar untuk produk Jam Luxury Purple X',NULL,'2026-02-24 03:15:14','2026-02-24 03:15:14');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,21,5,'mantp=ap','2026-02-24 05:55:46','2026-02-24 05:55:46'),(2,1,21,5,'enak','2026-02-24 05:55:59','2026-02-24 05:55:59'),(3,1,28,5,'keren','2026-02-24 07:13:16','2026-02-24 07:13:16');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('6HV0iCMVMc1c8ffcIOvYMSFYH9Piew1KUe1q1cQY',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDlIM1pIcDZ5TDBZenRUVmd1SlY5OUJoTklNakh3MUFOd0d2NlhIUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cz9jYXRlZ29yeT1zbWFydC1saXZpbmcmcGFnZT0yIjtzOjU6InJvdXRlIjtzOjE0OiJwcm9kdWN0cy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1772178947),('7OqUb4Gi0BYz7eVnrZeYZpy3HaauT6N8uKMCKrQG',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT2JhVE51WUloVkhKV3QyaVJuTnFyNWNma0NjNTZlaHp4cDRDQzF4NiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1771942655),('8DEVLgcOdn7ULnTIPWH8ogOZ51YzOY7NxuxtI06O',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSndnUVVHMUVKdGJTTnc1eDVENFI0SVNUYnMyZ0hBWUxoNk1XUGpZcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoxNDoicHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1771941146);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user','ibam','ibam@admin.com','2026-02-24 03:15:11','$2y$12$OOr7/RBFLTeWe.3gpnxA7exw4prs2.p6mwjElpQNwDfbZFAS.Jb5O',NULL,'2026-02-24 03:15:11','2026-02-24 03:15:11');
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

-- Dump completed on 2026-02-27 14:56:12
