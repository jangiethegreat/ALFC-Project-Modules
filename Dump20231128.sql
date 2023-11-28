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
-- Table structure for table `insurance_categories`
--

DROP TABLE IF EXISTS `insurance_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_categories`
--

LOCK TABLES `insurance_categories` WRITE;
/*!40000 ALTER TABLE `insurance_categories` DISABLE KEYS */;
INSERT INTO `insurance_categories` VALUES (1,'Sedan','Private Car'),(2,'Wagon','Private Car'),(3,'Truck','Private Car'),(4,'L300','Public Utility Vehicle');
/*!40000 ALTER TABLE `insurance_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_computation_rates`
--

DROP TABLE IF EXISTS `insurance_computation_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_computation_rates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `provider_category_id` bigint unsigned NOT NULL,
  `insurance_coverage_id` bigint unsigned NOT NULL,
  `set_limit` decimal(20,9) NOT NULL,
  `set_rate` decimal(20,9) NOT NULL,
  `provider_net_limit` decimal(20,9) NOT NULL,
  `provider_net_rate` decimal(20,9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `insurance_computation_rates_provider_category_id_foreign` (`provider_category_id`),
  KEY `insurance_computation_rates_insurance_coverage_id_foreign` (`insurance_coverage_id`),
  CONSTRAINT `insurance_computation_rates_insurance_coverage_id_foreign` FOREIGN KEY (`insurance_coverage_id`) REFERENCES `insurance_coverages` (`id`),
  CONSTRAINT `insurance_computation_rates_provider_category_id_foreign` FOREIGN KEY (`provider_category_id`) REFERENCES `provider_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_computation_rates`
--

LOCK TABLES `insurance_computation_rates` WRITE;
/*!40000 ALTER TABLE `insurance_computation_rates` DISABLE KEYS */;
INSERT INTO `insurance_computation_rates` VALUES (1,1,1,500000.000000000,0.017500000,800000.000000000,0.008500000),(2,1,2,50000.000000000,0.003900000,0.000000000,0.003900000),(3,1,2,75000.000000000,0.003000000,0.000000000,0.003000000),(4,1,2,100000.000000000,0.002700000,0.000000000,0.002700000),(5,1,2,150000.000000000,0.002300000,0.000000000,0.002300000),(6,1,2,200000.000000000,0.002100000,0.000000000,0.002100000),(7,1,2,250000.000000000,0.002040000,0.000000000,0.002040000),(8,1,2,300000.000000000,0.001950000,0.000000000,0.001950000),(9,1,2,400000.000000000,0.001687500,0.000000000,0.001687500),(10,1,2,500000.000000000,0.001560000,0.000000000,0.001560000),(11,1,2,750000.000000000,0.001220000,0.000000000,0.001220000),(12,1,2,1000000.000000000,0.001050000,0.000000000,0.001050000),(13,1,3,50000.000000000,0.019500000,0.000000000,0.019500000),(14,1,3,75000.000000000,0.013800000,0.000000000,0.013800000),(15,1,3,100000.000000000,0.010950000,0.000000000,0.010950000),(16,1,3,150000.000000000,0.007800000,0.000000000,0.007800000),(17,1,3,200000.000000000,0.006225000,0.000000000,0.006225000),(18,1,3,250000.000000000,0.005280000,0.000000000,0.005280000),(19,1,3,300000.000000000,0.004650000,0.000000000,0.004560000),(20,1,3,400000.000000000,0.003787500,0.000000000,0.003787500),(21,1,3,500000.000000000,0.003270000,0.000000000,0.003270000),(22,1,3,750000.000000000,0.002560000,0.000000000,0.002560000),(23,1,3,1000000.000000000,0.002235000,0.000000000,0.002235000),(24,1,4,50000.000000000,0.000000000,50000.000000000,0.000000000),(25,1,5,500000.000000000,0.017500000,800000.000000000,0.000500000);
/*!40000 ALTER TABLE `insurance_computation_rates` ENABLE KEYS */;
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
INSERT INTO `insurance_coverages` VALUES (1,'OWN DAMAGE/THEFT'),(2,'BODILY INJURY'),(3,'PROPERTY DAMAGE'),(4,'AUTO-PA- 5 SEATS'),(5,'AOG');
/*!40000 ALTER TABLE `insurance_coverages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_11_24_011536_create_insurance_providers_table',1),(6,'2023_11_24_012544_create_insurance_categories_table',1),(7,'2023_11_24_012823_create_insurance_coverages_table',1),(8,'2023_11_24_013214_create_provider_categories_table',2),(9,'2023_11_24_020145_create_insurance_computation_rates_table',3),(10,'2023_11_24_034605_create_qoutations_table',4);
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
-- Table structure for table `provider_categories`
--

DROP TABLE IF EXISTS `provider_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provider_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_provider_id` bigint unsigned NOT NULL,
  `insurance_category_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_categories_insurance_provider_id_foreign` (`insurance_provider_id`),
  KEY `provider_categories_insurance_category_id_foreign` (`insurance_category_id`),
  CONSTRAINT `provider_categories_insurance_category_id_foreign` FOREIGN KEY (`insurance_category_id`) REFERENCES `insurance_categories` (`id`),
  CONSTRAINT `provider_categories_insurance_provider_id_foreign` FOREIGN KEY (`insurance_provider_id`) REFERENCES `insurance_providers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_categories`
--

LOCK TABLES `provider_categories` WRITE;
/*!40000 ALTER TABLE `provider_categories` DISABLE KEYS */;
INSERT INTO `provider_categories` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4);
/*!40000 ALTER TABLE `provider_categories` ENABLE KEYS */;
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
  CONSTRAINT `qoutations_computation_rate_id_foreign` FOREIGN KEY (`computation_rate_id`) REFERENCES `provider_categories` (`id`)
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

-- Dump completed on 2023-11-28 17:28:40
