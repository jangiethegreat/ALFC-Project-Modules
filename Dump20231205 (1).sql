-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: alfc
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `insurance_computations`
--

DROP TABLE IF EXISTS `insurance_computations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_computations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `provider_product_id` bigint unsigned NOT NULL,
  `insurance_coverage_id` bigint unsigned NOT NULL,
  `set_limit_minimum` decimal(20,9) NOT NULL,
  `set_limit_maximum` decimal(20,9) NOT NULL,
  `set_rate_minimum` decimal(20,9) NOT NULL,
  `set_rate_maximum` decimal(20,9) NOT NULL,
  `provider_net_rate` decimal(20,9) NOT NULL,
  `comm_based` decimal(20,9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `insurance_computations_provider_product_id_foreign` (`provider_product_id`),
  KEY `insurance_computations_insurance_coverage_id_foreign` (`insurance_coverage_id`),
  CONSTRAINT `insurance_computations_insurance_coverage_id_foreign` FOREIGN KEY (`insurance_coverage_id`) REFERENCES `insurance_coverages` (`id`),
  CONSTRAINT `insurance_computations_provider_product_id_foreign` FOREIGN KEY (`provider_product_id`) REFERENCES `provider_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_computations`
--

LOCK TABLES `insurance_computations` WRITE;
/*!40000 ALTER TABLE `insurance_computations` DISABLE KEYS */;
INSERT INTO `insurance_computations` VALUES (12,1,1,100000.000000000,2000000.000000000,0.010000000,0.017500000,0.008500000,0.000000000),(13,1,2,50000.000000000,50000.000000000,0.003900000,0.003900000,0.003900000,0.000000000),(14,1,2,75000.000000000,75000.000000000,0.003000000,0.003000000,0.003000000,0.000000000),(15,1,2,100000.000000000,100000.000000000,0.002700000,0.002700000,0.002700000,0.000000000),(16,1,2,400000.000000000,400000.000000000,0.001687500,0.001687500,0.001687500,0.000000000),(17,1,3,50000.000000000,50000.000000000,0.019500000,0.019500000,0.019500000,0.000000000),(18,1,3,75000.000000000,75000.000000000,0.013800000,0.013800000,0.013800000,0.000000000),(19,1,3,100000.000000000,100000.000000000,0.010950000,0.010950000,0.010950000,0.000000000),(20,1,3,400000.000000000,400000.000000000,0.003787500,0.003787500,0.003787500,0.000000000),(21,1,4,50000.000000000,50000.000000000,0.000000000,0.000000000,0.000000000,0.000000000),(22,1,5,500000.000000000,500000.000000000,0.005000000,0.005000000,0.005000000,0.000000000);
/*!40000 ALTER TABLE `insurance_computations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_coverages`
--

DROP TABLE IF EXISTS `insurance_coverages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_coverages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coverage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_coverages`
--

LOCK TABLES `insurance_coverages` WRITE;
/*!40000 ALTER TABLE `insurance_coverages` DISABLE KEYS */;
INSERT INTO `insurance_coverages` VALUES (1,'OWN DAMAGE/THEFT'),(2,'BODILY INJURY'),(3,'PROPERTY DAMAGE'),(4,'AUTO-PA-5 SEATS'),(5,'AOG');
/*!40000 ALTER TABLE `insurance_coverages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_products`
--

DROP TABLE IF EXISTS `insurance_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_products`
--

LOCK TABLES `insurance_products` WRITE;
/*!40000 ALTER TABLE `insurance_products` DISABLE KEYS */;
INSERT INTO `insurance_products` VALUES (1,'Sedan','Private Car'),(2,'Wagon','Private Car'),(3,'Truck','Private Car'),(4,'L300','Public Utility Vehicle'),(5,'FPA','');
/*!40000 ALTER TABLE `insurance_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_providers`
--

DROP TABLE IF EXISTS `insurance_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_providers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_providers`
--

LOCK TABLES `insurance_providers` WRITE;
/*!40000 ALTER TABLE `insurance_providers` DISABLE KEYS */;
INSERT INTO `insurance_providers` VALUES (1,'FGEN'),(2,'XYZ'),(3,'JHG');
/*!40000 ALTER TABLE `insurance_providers` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (14,'2014_10_12_000000_create_users_table',1),(15,'2014_10_12_100000_create_password_resets_table',1),(16,'2019_08_19_000000_create_failed_jobs_table',1),(17,'2019_12_14_000001_create_personal_access_tokens_table',1),(18,'2023_11_24_011536_create_insurance_providers_table',1),(19,'2023_11_24_012544_create_insurance_products_table',1),(20,'2023_11_24_012823_create_insurance_coverages_table',1),(21,'2023_11_24_013214_create_provider_products_table',1),(22,'2023_11_24_020145_create_insurance_computations_table',1),(23,'2023_11_24_034605_create_qoutations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_products`
--

DROP TABLE IF EXISTS `provider_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provider_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_provider_id` bigint unsigned NOT NULL,
  `insurance_product_id` bigint unsigned NOT NULL,
  `insurance_product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_products_insurance_provider_id_foreign` (`insurance_provider_id`),
  KEY `provider_products_insurance_product_id_foreign` (`insurance_product_id`),
  CONSTRAINT `provider_products_insurance_product_id_foreign` FOREIGN KEY (`insurance_product_id`) REFERENCES `insurance_products` (`id`),
  CONSTRAINT `provider_products_insurance_provider_id_foreign` FOREIGN KEY (`insurance_provider_id`) REFERENCES `insurance_providers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_products`
--

LOCK TABLES `provider_products` WRITE;
/*!40000 ALTER TABLE `provider_products` DISABLE KEYS */;
INSERT INTO `provider_products` VALUES (1,1,1,'Rate'),(2,1,2,'Rate'),(3,1,3,'Rate'),(4,1,4,'Rate'),(5,1,5,'Commission Based');
/*!40000 ALTER TABLE `provider_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qoutations`
--

DROP TABLE IF EXISTS `qoutations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qoutations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` bigint NOT NULL,
  `computation_rate_id` bigint unsigned NOT NULL,
  `insured_limit` decimal(20,9) NOT NULL,
  `insured_rate` decimal(20,9) NOT NULL,
  `insured_premium_rate` decimal(20,9) NOT NULL,
  `provider_premium_due` decimal(20,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qoutations_computation_rate_id_foreign` (`computation_rate_id`),
  CONSTRAINT `qoutations_computation_rate_id_foreign` FOREIGN KEY (`computation_rate_id`) REFERENCES `provider_products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qoutations`
--

LOCK TABLES `qoutations` WRITE;
/*!40000 ALTER TABLE `qoutations` DISABLE KEYS */;
/*!40000 ALTER TABLE `qoutations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2023-12-05  9:51:34
