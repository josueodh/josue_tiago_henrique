-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: es
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `bonifications`
--

DROP TABLE IF EXISTS `bonifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bonifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `partner_id` bigint unsigned NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expirationDate` date NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'final',
  `imglink` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bonifications_student_id_foreign` (`student_id`),
  KEY `bonifications_partner_id_foreign` (`partner_id`),
  CONSTRAINT `bonifications_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bonifications_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonifications`
--

LOCK TABLES `bonifications` WRITE;
/*!40000 ALTER TABLE `bonifications` DISABLE KEYS */;
INSERT INTO `bonifications` VALUES (1,4,2,'Necessitatibus vitae tenetur neque.','1997-10-07','final','img/bonifications/e0823c9e7bc21801d3f21e0f244b6428.png','2021-03-11 01:50:37','2021-03-11 01:50:37'),(2,8,2,'Quis aperiam sit illo non.','1971-03-25','final','img/bonifications/80957af2080da70cc2668199113046f6.png','2021-03-11 01:50:37','2021-03-11 01:50:37'),(3,3,1,'Aluno teve media maior do que o criterio','2021-04-09','materia',NULL,'2021-03-11 02:36:27','2021-03-11 02:36:27'),(4,7,1,'Aluno teve media maior do que o criterio','2021-04-09','materia',NULL,'2021-03-11 02:36:27','2021-03-11 02:36:27'),(5,12,1,'Aluno teve media maior do que o criterio','2021-04-09','materia',NULL,'2021-03-11 02:36:27','2021-03-11 02:36:27'),(6,3,1,'Aluno teve media maior do que o criterio','2021-04-09','materia',NULL,'2021-03-11 02:53:50','2021-03-11 02:53:50'),(7,7,1,'Aluno teve media maior do que o criterio','2021-04-09','materia',NULL,'2021-03-11 02:53:50','2021-03-11 02:53:50'),(8,12,1,'Aluno teve media maior do que o criterio','2021-04-09','materia',NULL,'2021-03-11 02:53:50','2021-03-11 02:53:50');
/*!40000 ALTER TABLE `bonifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Repudiandae et vitae quo aperiam eveniet qui praesentium perspiciatis.','7','2021-03-11 01:50:08','2021-03-11 01:50:08'),(2,'Alias autem saepe fugiat.','7','2021-03-11 01:50:08','2021-03-11 01:50:08'),(3,'Ea voluptatem omnis saepe qui vel doloremque.','4','2021-03-11 01:50:08','2021-03-11 01:50:08'),(4,'Quis ut odit laudantium accusantium eum fuga ullam.','5','2021-03-11 01:50:09','2021-03-11 01:50:09'),(5,'Unde quam soluta laborum dolor est.','4','2021-03-11 01:50:09','2021-03-11 01:50:09'),(6,'Soluta consequuntur enim aperiam veniam error.','9','2021-03-11 01:50:09','2021-03-11 01:50:09'),(7,'Molestias rerum architecto sit odit corrupti et eum.','0','2021-03-11 01:50:09','2021-03-11 01:50:09'),(8,'Est quis eligendi optio sit vel id.','7','2021-03-11 01:50:09','2021-03-11 01:50:09'),(9,'Facilis minima placeat tempore provident molestiae et.','1','2021-03-11 01:50:09','2021-03-11 01:50:09'),(10,'Omnis veritatis voluptatem cumque eos possimus mollitia veniam.','7','2021-03-11 01:50:09','2021-03-11 01:50:09'),(11,'Ciencia da computacao','3000','2021-03-11 02:22:34','2021-03-11 02:22:34');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses_subjects`
--

DROP TABLE IF EXISTS `courses_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses_subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned NOT NULL,
  `subject_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_subjects_course_id_foreign` (`course_id`),
  KEY `courses_subjects_subject_id_foreign` (`subject_id`),
  CONSTRAINT `courses_subjects_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `courses_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses_subjects`
--

LOCK TABLES `courses_subjects` WRITE;
/*!40000 ALTER TABLE `courses_subjects` DISABLE KEYS */;
INSERT INTO `courses_subjects` VALUES (1,3,1,NULL,NULL),(2,4,1,NULL,NULL),(3,10,1,NULL,NULL),(4,6,2,NULL,NULL),(5,7,2,NULL,NULL),(6,8,2,NULL,NULL),(7,2,3,NULL,NULL),(8,6,3,NULL,NULL),(9,10,3,NULL,NULL),(10,3,4,NULL,NULL),(11,6,4,NULL,NULL),(12,7,4,NULL,NULL),(13,1,5,NULL,NULL),(14,3,5,NULL,NULL),(15,9,5,NULL,NULL),(16,2,6,NULL,NULL),(17,4,6,NULL,NULL),(18,10,6,NULL,NULL),(19,1,7,NULL,NULL),(20,5,7,NULL,NULL),(21,10,7,NULL,NULL),(22,1,8,NULL,NULL),(23,4,8,NULL,NULL),(24,10,8,NULL,NULL),(25,5,9,NULL,NULL),(26,8,9,NULL,NULL),(27,9,9,NULL,NULL),(28,4,10,NULL,NULL),(29,8,10,NULL,NULL),(30,9,10,NULL,NULL),(31,2,11,NULL,NULL),(32,3,11,NULL,NULL),(33,4,11,NULL,NULL),(34,3,12,NULL,NULL),(35,7,12,NULL,NULL),(36,8,12,NULL,NULL),(37,2,13,NULL,NULL),(38,5,13,NULL,NULL),(39,7,13,NULL,NULL),(40,2,14,NULL,NULL),(41,5,14,NULL,NULL),(42,7,14,NULL,NULL),(43,3,15,NULL,NULL),(44,9,15,NULL,NULL),(45,10,15,NULL,NULL),(46,2,16,NULL,NULL),(47,4,16,NULL,NULL),(48,9,16,NULL,NULL),(49,7,17,NULL,NULL),(50,8,17,NULL,NULL),(51,10,17,NULL,NULL),(52,1,18,NULL,NULL),(53,5,18,NULL,NULL),(54,10,18,NULL,NULL),(55,2,19,NULL,NULL),(56,4,19,NULL,NULL),(57,9,19,NULL,NULL),(58,2,20,NULL,NULL),(59,3,20,NULL,NULL),(60,8,20,NULL,NULL),(61,4,21,NULL,NULL),(62,6,21,NULL,NULL),(63,7,21,NULL,NULL),(64,1,22,NULL,NULL),(65,7,22,NULL,NULL),(66,9,22,NULL,NULL),(67,4,23,NULL,NULL),(68,7,23,NULL,NULL),(69,9,23,NULL,NULL),(70,1,24,NULL,NULL),(71,3,24,NULL,NULL),(72,10,24,NULL,NULL),(73,6,25,NULL,NULL),(74,7,25,NULL,NULL),(75,10,25,NULL,NULL),(76,7,26,NULL,NULL),(77,9,26,NULL,NULL),(78,10,26,NULL,NULL),(79,6,27,NULL,NULL),(80,7,27,NULL,NULL),(81,10,27,NULL,NULL),(82,3,28,NULL,NULL),(83,6,28,NULL,NULL),(84,7,28,NULL,NULL),(85,4,29,NULL,NULL),(86,5,29,NULL,NULL),(87,6,29,NULL,NULL),(88,4,30,NULL,NULL),(89,6,30,NULL,NULL),(90,7,30,NULL,NULL),(91,1,31,NULL,NULL),(92,4,31,NULL,NULL),(93,7,31,NULL,NULL),(94,7,32,NULL,NULL),(95,8,32,NULL,NULL),(96,10,32,NULL,NULL),(97,2,33,NULL,NULL),(98,4,33,NULL,NULL),(99,6,33,NULL,NULL),(100,4,34,NULL,NULL),(101,5,34,NULL,NULL),(102,9,34,NULL,NULL),(103,3,35,NULL,NULL),(104,4,35,NULL,NULL),(105,10,35,NULL,NULL),(106,6,36,NULL,NULL),(107,7,36,NULL,NULL),(108,10,36,NULL,NULL),(109,2,37,NULL,NULL),(110,5,37,NULL,NULL),(111,7,37,NULL,NULL),(112,5,38,NULL,NULL),(113,7,38,NULL,NULL),(114,8,38,NULL,NULL),(115,2,39,NULL,NULL),(116,7,39,NULL,NULL),(117,10,39,NULL,NULL),(118,3,40,NULL,NULL),(119,5,40,NULL,NULL),(120,10,40,NULL,NULL),(121,5,41,NULL,NULL),(122,7,41,NULL,NULL),(123,9,41,NULL,NULL),(124,2,42,NULL,NULL),(125,7,42,NULL,NULL),(126,8,42,NULL,NULL),(127,3,43,NULL,NULL),(128,8,43,NULL,NULL),(129,10,43,NULL,NULL),(130,4,44,NULL,NULL),(131,7,44,NULL,NULL),(132,10,44,NULL,NULL),(133,6,45,NULL,NULL),(134,7,45,NULL,NULL),(135,9,45,NULL,NULL),(136,1,46,NULL,NULL),(137,6,46,NULL,NULL),(138,8,46,NULL,NULL),(139,2,47,NULL,NULL),(140,9,47,NULL,NULL),(141,10,47,NULL,NULL),(142,1,48,NULL,NULL),(143,3,48,NULL,NULL),(144,10,48,NULL,NULL),(145,4,49,NULL,NULL),(146,6,49,NULL,NULL),(147,8,49,NULL,NULL),(148,2,50,NULL,NULL),(149,7,50,NULL,NULL),(150,9,50,NULL,NULL),(151,11,51,NULL,NULL),(152,11,52,NULL,NULL);
/*!40000 ALTER TABLE `courses_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint unsigned NOT NULL,
  `team_id` bigint unsigned NOT NULL,
  `grade` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grades_student_id_foreign` (`student_id`),
  KEY `grades_team_id_foreign` (`team_id`),
  CONSTRAINT `grades_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `grades_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'2021-03-11 01:50:34','2021-03-11 01:50:34',16,4,48),(2,'2021-03-11 01:50:34','2021-03-11 01:50:34',11,34,51),(3,'2021-03-11 01:50:34','2021-03-11 01:50:34',15,36,98),(4,'2021-03-11 01:50:34','2021-03-11 01:50:34',4,5,1),(5,'2021-03-11 01:50:34','2021-03-11 01:50:34',12,45,75),(6,'2021-03-11 02:28:57','2021-03-11 02:28:57',3,51,80),(7,'2021-03-11 02:29:59','2021-03-11 02:29:59',7,51,90),(9,'2021-03-11 02:30:43','2021-03-11 02:30:43',12,51,84),(10,'2021-03-11 02:31:03','2021-03-11 02:31:03',9,51,74),(11,'2021-03-11 02:34:44','2021-03-11 02:34:44',3,52,75),(12,'2021-03-11 02:34:58','2021-03-11 02:34:58',7,52,85),(13,'2021-03-11 02:35:12','2021-03-11 02:35:12',9,52,90),(14,'2021-03-11 02:35:26','2021-03-11 02:35:26',12,52,99);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_01_16_025544_create_courses_table',1),(5,'2021_01_16_032558_create_notifications_table',1),(6,'2021_01_31_183919_create_partners_table',1),(7,'2021_01_31_185145_create_teams_table',1),(8,'2021_02_01_163204_create_subjects_table',1),(9,'2021_02_01_172451_create_courses_subjects_table',1),(10,'2021_02_02_203302_create_students_teams_table',1),(11,'2021_02_19_025631_add_ira_goal_column',1),(12,'2021_02_21_200920_create_bonifications_table',1),(13,'2021_02_21_223639_create_grades_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('00b88d40-d236-4791-82bc-d6e722d66386','App\\Notifications\\NewGrade','App\\User',3,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/6\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 51 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:29:02','2021-03-11 02:29:02'),('05d63d2b-aae1-47eb-91f1-0d8a837da6ff','App\\Notifications\\NewGrade','App\\User',12,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/14\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 52 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:35:26','2021-03-11 02:35:26'),('180166ba-8d8e-4b33-bed3-a19985333ba5','App\\Notifications\\NewGrade','App\\User',7,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/8\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 51 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:30:17','2021-03-11 02:30:17'),('1c770cf0-f34c-4c88-83f6-ae62277db854','App\\Notifications\\NewGrade','App\\User',3,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/11\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 52 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:34:44','2021-03-11 02:34:44'),('2d9dc28f-bc3a-4de8-9e94-6c2f2e186b41','App\\Notifications\\NewGrade','App\\User',9,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/10\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 51 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:31:03','2021-03-11 02:31:03'),('596079fc-a1bd-407e-a392-61ff90ad42d2','App\\Notifications\\NewGrade','App\\User',12,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/9\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 51 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:30:43','2021-03-11 02:30:43'),('bf3ed0c4-f708-45b1-b4df-1ec9ce6824f9','App\\Notifications\\NewGrade','App\\User',9,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/13\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 52 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:35:12','2021-03-11 02:35:12'),('e2311988-16c1-4b78-9f81-16f28f2148e6','App\\Notifications\\NewGrade','App\\User',7,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/7\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 51 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:29:59','2021-03-11 02:29:59'),('e542cb22-3c18-4946-b94c-e57c920b47c3','App\\Notifications\\NewGrade','App\\User',7,'{\"route\":\"http:\\/\\/localhost:8000\\/notas\\/12\",\"icon\":\"fas fa-hand-holding-usd\",\"text\":\"Sua nota em 52 foi cadastrada\",\"title\":\"Nota\"}',NULL,'2021-03-11 02:34:58','2021-03-11 02:34:58');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imglink` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'2021-03-11 01:50:25','2021-03-11 01:50:25','Wuckert LLC','img/partners/3e708afa0cdcb3be1da1cdc05381ab2a.png'),(2,'2021-03-11 01:50:25','2021-03-11 01:50:25','Pacocha Inc','img/partners/d1fc4aa5770b7cde58068880999765ff.png');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `students_teams`
--

DROP TABLE IF EXISTS `students_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students_teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint unsigned NOT NULL,
  `team_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_teams_student_id_foreign` (`student_id`),
  KEY `students_teams_team_id_foreign` (`team_id`),
  CONSTRAINT `students_teams_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `students_teams_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_teams`
--

LOCK TABLES `students_teams` WRITE;
/*!40000 ALTER TABLE `students_teams` DISABLE KEYS */;
INSERT INTO `students_teams` VALUES (1,NULL,NULL,2,1),(2,NULL,NULL,3,1),(3,NULL,NULL,4,1),(4,NULL,NULL,7,1),(5,NULL,NULL,8,1),(6,NULL,NULL,9,1),(7,NULL,NULL,11,1),(8,NULL,NULL,12,1),(9,NULL,NULL,2,2),(10,NULL,NULL,3,2),(11,NULL,NULL,4,2),(12,NULL,NULL,5,2),(13,NULL,NULL,6,2),(14,NULL,NULL,8,2),(15,NULL,NULL,9,2),(16,NULL,NULL,12,2),(17,NULL,NULL,2,3),(18,NULL,NULL,3,3),(19,NULL,NULL,5,3),(20,NULL,NULL,6,3),(21,NULL,NULL,7,3),(22,NULL,NULL,8,3),(23,NULL,NULL,9,3),(24,NULL,NULL,12,3),(25,NULL,NULL,2,4),(26,NULL,NULL,3,4),(27,NULL,NULL,4,4),(28,NULL,NULL,5,4),(29,NULL,NULL,6,4),(30,NULL,NULL,9,4),(31,NULL,NULL,10,4),(32,NULL,NULL,12,4),(33,NULL,NULL,2,5),(34,NULL,NULL,3,5),(35,NULL,NULL,4,5),(36,NULL,NULL,7,5),(37,NULL,NULL,8,5),(38,NULL,NULL,9,5),(39,NULL,NULL,11,5),(40,NULL,NULL,12,5),(41,NULL,NULL,2,6),(42,NULL,NULL,3,6),(43,NULL,NULL,4,6),(44,NULL,NULL,5,6),(45,NULL,NULL,6,6),(46,NULL,NULL,7,6),(47,NULL,NULL,8,6),(48,NULL,NULL,10,6),(49,NULL,NULL,3,7),(50,NULL,NULL,4,7),(51,NULL,NULL,6,7),(52,NULL,NULL,8,7),(53,NULL,NULL,9,7),(54,NULL,NULL,10,7),(55,NULL,NULL,11,7),(56,NULL,NULL,12,7),(57,NULL,NULL,2,8),(58,NULL,NULL,3,8),(59,NULL,NULL,4,8),(60,NULL,NULL,6,8),(61,NULL,NULL,8,8),(62,NULL,NULL,9,8),(63,NULL,NULL,10,8),(64,NULL,NULL,12,8),(65,NULL,NULL,2,9),(66,NULL,NULL,3,9),(67,NULL,NULL,4,9),(68,NULL,NULL,6,9),(69,NULL,NULL,8,9),(70,NULL,NULL,9,9),(71,NULL,NULL,11,9),(72,NULL,NULL,12,9),(73,NULL,NULL,2,10),(74,NULL,NULL,3,10),(75,NULL,NULL,4,10),(76,NULL,NULL,5,10),(77,NULL,NULL,7,10),(78,NULL,NULL,8,10),(79,NULL,NULL,9,10),(80,NULL,NULL,10,10),(81,NULL,NULL,2,11),(82,NULL,NULL,4,11),(83,NULL,NULL,6,11),(84,NULL,NULL,7,11),(85,NULL,NULL,8,11),(86,NULL,NULL,9,11),(87,NULL,NULL,11,11),(88,NULL,NULL,12,11),(89,NULL,NULL,2,12),(90,NULL,NULL,3,12),(91,NULL,NULL,5,12),(92,NULL,NULL,6,12),(93,NULL,NULL,7,12),(94,NULL,NULL,8,12),(95,NULL,NULL,9,12),(96,NULL,NULL,10,12),(97,NULL,NULL,2,13),(98,NULL,NULL,3,13),(99,NULL,NULL,4,13),(100,NULL,NULL,7,13),(101,NULL,NULL,8,13),(102,NULL,NULL,9,13),(103,NULL,NULL,11,13),(104,NULL,NULL,12,13),(105,NULL,NULL,2,14),(106,NULL,NULL,3,14),(107,NULL,NULL,4,14),(108,NULL,NULL,6,14),(109,NULL,NULL,7,14),(110,NULL,NULL,8,14),(111,NULL,NULL,11,14),(112,NULL,NULL,12,14),(113,NULL,NULL,2,15),(114,NULL,NULL,5,15),(115,NULL,NULL,6,15),(116,NULL,NULL,7,15),(117,NULL,NULL,8,15),(118,NULL,NULL,9,15),(119,NULL,NULL,11,15),(120,NULL,NULL,12,15),(121,NULL,NULL,2,16),(122,NULL,NULL,5,16),(123,NULL,NULL,6,16),(124,NULL,NULL,7,16),(125,NULL,NULL,8,16),(126,NULL,NULL,9,16),(127,NULL,NULL,10,16),(128,NULL,NULL,11,16),(129,NULL,NULL,2,17),(130,NULL,NULL,4,17),(131,NULL,NULL,5,17),(132,NULL,NULL,7,17),(133,NULL,NULL,8,17),(134,NULL,NULL,9,17),(135,NULL,NULL,10,17),(136,NULL,NULL,12,17),(137,NULL,NULL,2,18),(138,NULL,NULL,3,18),(139,NULL,NULL,5,18),(140,NULL,NULL,6,18),(141,NULL,NULL,7,18),(142,NULL,NULL,10,18),(143,NULL,NULL,11,18),(144,NULL,NULL,12,18),(145,NULL,NULL,2,19),(146,NULL,NULL,3,19),(147,NULL,NULL,4,19),(148,NULL,NULL,5,19),(149,NULL,NULL,6,19),(150,NULL,NULL,7,19),(151,NULL,NULL,10,19),(152,NULL,NULL,12,19),(153,NULL,NULL,2,20),(154,NULL,NULL,3,20),(155,NULL,NULL,4,20),(156,NULL,NULL,5,20),(157,NULL,NULL,7,20),(158,NULL,NULL,8,20),(159,NULL,NULL,11,20),(160,NULL,NULL,12,20),(161,NULL,NULL,2,21),(162,NULL,NULL,3,21),(163,NULL,NULL,5,21),(164,NULL,NULL,6,21),(165,NULL,NULL,8,21),(166,NULL,NULL,9,21),(167,NULL,NULL,10,21),(168,NULL,NULL,11,21),(169,NULL,NULL,2,22),(170,NULL,NULL,3,22),(171,NULL,NULL,4,22),(172,NULL,NULL,7,22),(173,NULL,NULL,8,22),(174,NULL,NULL,9,22),(175,NULL,NULL,10,22),(176,NULL,NULL,12,22),(177,NULL,NULL,3,23),(178,NULL,NULL,4,23),(179,NULL,NULL,6,23),(180,NULL,NULL,7,23),(181,NULL,NULL,8,23),(182,NULL,NULL,9,23),(183,NULL,NULL,11,23),(184,NULL,NULL,12,23),(185,NULL,NULL,5,24),(186,NULL,NULL,6,24),(187,NULL,NULL,7,24),(188,NULL,NULL,8,24),(189,NULL,NULL,9,24),(190,NULL,NULL,10,24),(191,NULL,NULL,11,24),(192,NULL,NULL,12,24),(193,NULL,NULL,4,25),(194,NULL,NULL,5,25),(195,NULL,NULL,6,25),(196,NULL,NULL,7,25),(197,NULL,NULL,8,25),(198,NULL,NULL,9,25),(199,NULL,NULL,10,25),(200,NULL,NULL,12,25),(201,NULL,NULL,2,26),(202,NULL,NULL,3,26),(203,NULL,NULL,4,26),(204,NULL,NULL,5,26),(205,NULL,NULL,6,26),(206,NULL,NULL,7,26),(207,NULL,NULL,8,26),(208,NULL,NULL,9,26),(209,NULL,NULL,2,27),(210,NULL,NULL,3,27),(211,NULL,NULL,4,27),(212,NULL,NULL,7,27),(213,NULL,NULL,8,27),(214,NULL,NULL,10,27),(215,NULL,NULL,11,27),(216,NULL,NULL,12,27),(217,NULL,NULL,2,28),(218,NULL,NULL,3,28),(219,NULL,NULL,4,28),(220,NULL,NULL,5,28),(221,NULL,NULL,8,28),(222,NULL,NULL,9,28),(223,NULL,NULL,10,28),(224,NULL,NULL,12,28),(225,NULL,NULL,3,29),(226,NULL,NULL,4,29),(227,NULL,NULL,5,29),(228,NULL,NULL,6,29),(229,NULL,NULL,7,29),(230,NULL,NULL,9,29),(231,NULL,NULL,10,29),(232,NULL,NULL,12,29),(233,NULL,NULL,2,30),(234,NULL,NULL,3,30),(235,NULL,NULL,4,30),(236,NULL,NULL,5,30),(237,NULL,NULL,9,30),(238,NULL,NULL,10,30),(239,NULL,NULL,11,30),(240,NULL,NULL,12,30),(241,NULL,NULL,2,31),(242,NULL,NULL,3,31),(243,NULL,NULL,4,31),(244,NULL,NULL,6,31),(245,NULL,NULL,7,31),(246,NULL,NULL,9,31),(247,NULL,NULL,11,31),(248,NULL,NULL,12,31),(249,NULL,NULL,2,32),(250,NULL,NULL,3,32),(251,NULL,NULL,4,32),(252,NULL,NULL,6,32),(253,NULL,NULL,7,32),(254,NULL,NULL,8,32),(255,NULL,NULL,9,32),(256,NULL,NULL,12,32),(257,NULL,NULL,2,33),(258,NULL,NULL,4,33),(259,NULL,NULL,5,33),(260,NULL,NULL,6,33),(261,NULL,NULL,7,33),(262,NULL,NULL,9,33),(263,NULL,NULL,11,33),(264,NULL,NULL,12,33),(265,NULL,NULL,2,34),(266,NULL,NULL,3,34),(267,NULL,NULL,4,34),(268,NULL,NULL,7,34),(269,NULL,NULL,8,34),(270,NULL,NULL,9,34),(271,NULL,NULL,11,34),(272,NULL,NULL,12,34),(273,NULL,NULL,2,35),(274,NULL,NULL,3,35),(275,NULL,NULL,5,35),(276,NULL,NULL,7,35),(277,NULL,NULL,9,35),(278,NULL,NULL,10,35),(279,NULL,NULL,11,35),(280,NULL,NULL,12,35),(281,NULL,NULL,4,36),(282,NULL,NULL,5,36),(283,NULL,NULL,6,36),(284,NULL,NULL,7,36),(285,NULL,NULL,8,36),(286,NULL,NULL,9,36),(287,NULL,NULL,11,36),(288,NULL,NULL,12,36),(289,NULL,NULL,2,37),(290,NULL,NULL,4,37),(291,NULL,NULL,5,37),(292,NULL,NULL,6,37),(293,NULL,NULL,7,37),(294,NULL,NULL,8,37),(295,NULL,NULL,9,37),(296,NULL,NULL,10,37),(297,NULL,NULL,2,38),(298,NULL,NULL,3,38),(299,NULL,NULL,5,38),(300,NULL,NULL,6,38),(301,NULL,NULL,7,38),(302,NULL,NULL,9,38),(303,NULL,NULL,11,38),(304,NULL,NULL,12,38),(305,NULL,NULL,4,39),(306,NULL,NULL,5,39),(307,NULL,NULL,6,39),(308,NULL,NULL,7,39),(309,NULL,NULL,8,39),(310,NULL,NULL,9,39),(311,NULL,NULL,10,39),(312,NULL,NULL,11,39),(313,NULL,NULL,2,40),(314,NULL,NULL,4,40),(315,NULL,NULL,5,40),(316,NULL,NULL,7,40),(317,NULL,NULL,8,40),(318,NULL,NULL,9,40),(319,NULL,NULL,10,40),(320,NULL,NULL,12,40),(321,NULL,NULL,2,41),(322,NULL,NULL,3,41),(323,NULL,NULL,6,41),(324,NULL,NULL,7,41),(325,NULL,NULL,8,41),(326,NULL,NULL,9,41),(327,NULL,NULL,10,41),(328,NULL,NULL,12,41),(329,NULL,NULL,2,42),(330,NULL,NULL,6,42),(331,NULL,NULL,7,42),(332,NULL,NULL,8,42),(333,NULL,NULL,9,42),(334,NULL,NULL,10,42),(335,NULL,NULL,11,42),(336,NULL,NULL,12,42),(337,NULL,NULL,2,43),(338,NULL,NULL,3,43),(339,NULL,NULL,4,43),(340,NULL,NULL,6,43),(341,NULL,NULL,7,43),(342,NULL,NULL,8,43),(343,NULL,NULL,10,43),(344,NULL,NULL,12,43),(345,NULL,NULL,2,44),(346,NULL,NULL,3,44),(347,NULL,NULL,4,44),(348,NULL,NULL,5,44),(349,NULL,NULL,7,44),(350,NULL,NULL,8,44),(351,NULL,NULL,10,44),(352,NULL,NULL,12,44),(353,NULL,NULL,3,45),(354,NULL,NULL,4,45),(355,NULL,NULL,5,45),(356,NULL,NULL,6,45),(357,NULL,NULL,7,45),(358,NULL,NULL,9,45),(359,NULL,NULL,11,45),(360,NULL,NULL,12,45),(361,NULL,NULL,3,46),(362,NULL,NULL,4,46),(363,NULL,NULL,6,46),(364,NULL,NULL,7,46),(365,NULL,NULL,9,46),(366,NULL,NULL,10,46),(367,NULL,NULL,11,46),(368,NULL,NULL,12,46),(369,NULL,NULL,2,47),(370,NULL,NULL,3,47),(371,NULL,NULL,6,47),(372,NULL,NULL,8,47),(373,NULL,NULL,9,47),(374,NULL,NULL,10,47),(375,NULL,NULL,11,47),(376,NULL,NULL,12,47),(377,NULL,NULL,3,48),(378,NULL,NULL,4,48),(379,NULL,NULL,5,48),(380,NULL,NULL,6,48),(381,NULL,NULL,8,48),(382,NULL,NULL,9,48),(383,NULL,NULL,11,48),(384,NULL,NULL,12,48),(385,NULL,NULL,2,49),(386,NULL,NULL,3,49),(387,NULL,NULL,5,49),(388,NULL,NULL,6,49),(389,NULL,NULL,7,49),(390,NULL,NULL,9,49),(391,NULL,NULL,10,49),(392,NULL,NULL,12,49),(393,NULL,NULL,3,50),(394,NULL,NULL,4,50),(395,NULL,NULL,5,50),(396,NULL,NULL,7,50),(397,NULL,NULL,8,50),(398,NULL,NULL,9,50),(399,NULL,NULL,10,50),(400,NULL,NULL,11,50),(401,NULL,NULL,2,30),(402,NULL,NULL,3,51),(403,NULL,NULL,7,51),(404,NULL,NULL,9,51),(405,NULL,NULL,12,51),(406,NULL,NULL,3,52),(407,NULL,NULL,7,52),(408,NULL,NULL,9,52),(409,NULL,NULL,12,52);
/*!40000 ALTER TABLE `students_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Ex excepturi et.','kng430',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(2,'Accusantium quia repudiandae.','foz184',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(3,'Aut inventore expedita.','btg897',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(4,'Praesentium eum pariatur.','fct368',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(5,'Enim dignissimos occaecati.','ohy520',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(6,'Similique nihil eos.','sdb125',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(7,'Quos et rerum.','zsz892',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(8,'Dolor voluptas.','rzd765',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(9,'Suscipit odio.','uio474',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(10,'Non magni.','taj876',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(11,'Omnis optio quidem.','llf282',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(12,'Esse beatae debitis.','inf137',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(13,'Molestias aut rerum.','etf878',4,'2021-03-11 01:50:10','2021-03-11 01:50:10'),(14,'Voluptate beatae.','btb834',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(15,'Nihil quo consequatur.','nvm607',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(16,'Sit ut.','loj175',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(17,'Iste eum.','bte515',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(18,'Reprehenderit sunt velit.','frb185',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(19,'Voluptas soluta.','vvu281',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(20,'Facilis ipsum.','jcq296',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(21,'Porro et.','sbj055',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(22,'Qui molestias pariatur.','dzu396',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(23,'Aliquid sunt vitae.','ovg716',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(24,'Excepturi aut dolorem.','mnx684',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(25,'Velit quo ut.','xrz578',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(26,'Vero qui dolorem.','mht705',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(27,'Voluptatem repellendus.','djl561',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(28,'Et qui.','hnz051',4,'2021-03-11 01:50:11','2021-03-11 01:50:11'),(29,'Repudiandae repellendus.','shj750',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(30,'Et ea.','jxw067',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(31,'Cum consequatur quis.','fgz762',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(32,'Non quam distinctio.','vll524',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(33,'Ea soluta.','tqt655',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(34,'Molestiae error.','xoc112',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(35,'Quia vitae.','aml329',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(36,'Velit et.','axs453',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(37,'Omnis dolorem doloribus.','qgs387',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(38,'Eum non aspernatur.','jjs378',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(39,'Alias aut.','dqq880',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(40,'Reprehenderit doloremque aperiam.','mqc973',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(41,'Aliquam nobis eligendi.','qwa127',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(42,'Omnis eos nesciunt.','xvp934',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(43,'Eveniet in.','vvf844',4,'2021-03-11 01:50:12','2021-03-11 01:50:12'),(44,'Quos non et.','brv839',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(45,'Ab consequatur.','npg200',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(46,'Tenetur ipsam non.','yns460',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(47,'Iure sed sunt.','ygy331',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(48,'Et quam.','cds643',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(49,'Quia ut.','aef860',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(50,'Recusandae enim.','bcb950',4,'2021-03-11 01:50:13','2021-03-11 01:50:13'),(51,'Engenharia de Software','DCC523',4,'2021-03-11 02:26:31','2021-03-11 02:26:31'),(52,'Teoria dos Grafos','DCC43',4,'2021-03-11 02:26:51','2021-03-11 02:26:51');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `semester` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `teacher_id` bigint unsigned NOT NULL,
  `bonus` tinyint(1) NOT NULL,
  `value` int DEFAULT NULL,
  `rule` int DEFAULT NULL,
  `partner_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_teacher_id_foreign` (`teacher_id`),
  KEY `teams_partner_id_foreign` (`partner_id`),
  KEY `teams_subject_id_foreign` (`subject_id`),
  CONSTRAINT `teams_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  CONSTRAINT `teams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `teams_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,2,'Skylar Dare I',2005,1,13,0,NULL,NULL,2,'2021-03-11 01:50:26','2021-03-11 01:50:26',17),(2,1,'Cara Corkery',1990,1,15,0,NULL,NULL,1,'2021-03-11 01:50:26','2021-03-11 01:50:26',29),(3,2,'Dr. Emile Fahey',2018,1,15,0,NULL,NULL,1,'2021-03-11 01:50:26','2021-03-11 01:50:26',48),(4,1,'Reta Abbott',2001,1,14,0,NULL,NULL,2,'2021-03-11 01:50:26','2021-03-11 01:50:26',1),(5,2,'Dr. Loyal Gleason',1973,1,14,0,NULL,NULL,2,'2021-03-11 01:50:26','2021-03-11 01:50:26',21),(6,2,'Carissa Tromp',2007,1,13,0,NULL,NULL,1,'2021-03-11 01:50:26','2021-03-11 01:50:26',44),(7,1,'Santina Lang III',1990,1,15,0,NULL,NULL,2,'2021-03-11 01:50:26','2021-03-11 01:50:26',27),(8,2,'Austin Herzog',1973,1,16,0,NULL,NULL,1,'2021-03-11 01:50:26','2021-03-11 01:50:26',14),(9,2,'Ms. Albertha Reinger V',1984,1,14,0,NULL,NULL,2,'2021-03-11 01:50:26','2021-03-11 01:50:26',50),(10,2,'Miss Gregoria Maggio MD',1988,1,13,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',7),(11,1,'Prof. Bruce Smitham PhD',1971,1,13,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',38),(12,1,'Dr. Ardella Mann I',2015,1,16,0,NULL,NULL,2,'2021-03-11 01:50:27','2021-03-11 01:50:27',10),(13,2,'Prof. Ludie Bode PhD',1983,1,13,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',31),(14,1,'Kristian Huel',1972,1,16,0,NULL,NULL,2,'2021-03-11 01:50:27','2021-03-11 01:50:27',32),(15,2,'Otho Crona',1982,1,13,0,NULL,NULL,2,'2021-03-11 01:50:27','2021-03-11 01:50:27',42),(16,1,'Werner Cassin',1994,1,14,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',16),(17,1,'Beth Gorczany',2007,1,16,0,NULL,NULL,2,'2021-03-11 01:50:27','2021-03-11 01:50:27',8),(18,2,'Alia Senger',2008,1,17,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',45),(19,2,'Janessa Harber DVM',1983,1,13,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',35),(20,2,'Diana Connelly',2019,1,16,0,NULL,NULL,1,'2021-03-11 01:50:27','2021-03-11 01:50:27',42),(21,2,'Miss Tressie Walter DVM',1982,1,17,0,NULL,NULL,2,'2021-03-11 01:50:27','2021-03-11 01:50:27',45),(22,1,'Otis Effertz',2014,1,16,0,NULL,NULL,2,'2021-03-11 01:50:28','2021-03-11 01:50:28',17),(23,2,'Eleanore Hartmann',1981,1,16,0,NULL,NULL,1,'2021-03-11 01:50:28','2021-03-11 01:50:28',23),(24,1,'Prof. Germaine McCullough Jr.',2019,1,14,0,NULL,NULL,2,'2021-03-11 01:50:28','2021-03-11 01:50:28',19),(25,1,'Miss Cristal Feil',1993,1,16,0,NULL,NULL,2,'2021-03-11 01:50:28','2021-03-11 01:50:28',43),(26,2,'Jaqueline Pfannerstill',2018,1,13,0,NULL,NULL,1,'2021-03-11 01:50:28','2021-03-11 01:50:28',31),(27,2,'Fannie Jacobson IV',1996,1,16,0,NULL,NULL,2,'2021-03-11 01:50:28','2021-03-11 01:50:28',27),(28,1,'Francisca Braun',1998,1,14,0,NULL,NULL,2,'2021-03-11 01:50:28','2021-03-11 01:50:28',40),(29,1,'Mafalda Wuckert III',1973,1,14,0,NULL,NULL,1,'2021-03-11 01:50:29','2021-03-11 01:50:29',36),(30,2,'Alexander Greenholt',1990,1,17,0,NULL,NULL,2,'2021-03-11 01:50:29','2021-03-11 01:50:29',11),(31,2,'Ms. Myah Hauck',1975,1,14,0,NULL,NULL,2,'2021-03-11 01:50:29','2021-03-11 01:50:29',2),(32,1,'Miss Stephania Lockman',2011,1,16,0,NULL,NULL,1,'2021-03-11 01:50:29','2021-03-11 01:50:29',36),(33,2,'Mr. Deion Rempel III',1975,1,13,0,NULL,NULL,2,'2021-03-11 01:50:29','2021-03-11 01:50:29',10),(34,1,'Mr. Tyrique Bartoletti',1974,1,16,0,NULL,NULL,2,'2021-03-11 01:50:29','2021-03-11 01:50:29',26),(35,2,'Prof. Lora Anderson',2013,1,17,0,NULL,NULL,2,'2021-03-11 01:50:29','2021-03-11 01:50:29',33),(36,2,'Minerva Rowe',1992,1,16,0,NULL,NULL,1,'2021-03-11 01:50:29','2021-03-11 01:50:29',1),(37,2,'Constance Dickens DDS',1980,1,14,0,NULL,NULL,2,'2021-03-11 01:50:29','2021-03-11 01:50:29',3),(38,1,'Dr. Griffin Hand III',1989,1,17,0,NULL,NULL,1,'2021-03-11 01:50:30','2021-03-11 01:50:30',18),(39,2,'Antoinette Donnelly',1971,1,16,0,NULL,NULL,2,'2021-03-11 01:50:30','2021-03-11 01:50:30',33),(40,2,'Margaret Stanton',2003,1,17,0,NULL,NULL,2,'2021-03-11 01:50:30','2021-03-11 01:50:30',50),(41,2,'Mr. Domenick Daugherty',1970,1,15,0,NULL,NULL,1,'2021-03-11 01:50:30','2021-03-11 01:50:30',25),(42,2,'Dr. Marco Bogan DDS',2016,1,15,0,NULL,NULL,2,'2021-03-11 01:50:30','2021-03-11 01:50:30',45),(43,1,'Shania Zemlak',1976,1,13,0,NULL,NULL,1,'2021-03-11 01:50:30','2021-03-11 01:50:30',19),(44,2,'Elmira Kshlerin',2005,1,13,0,NULL,NULL,1,'2021-03-11 01:50:30','2021-03-11 01:50:30',11),(45,2,'Lorena Waelchi',2017,1,14,0,NULL,NULL,2,'2021-03-11 01:50:30','2021-03-11 01:50:30',46),(46,2,'Emmitt Wisoky V',1973,1,15,0,NULL,NULL,2,'2021-03-11 01:50:30','2021-03-11 01:50:30',16),(47,2,'Suzanne Effertz',2019,1,13,0,NULL,NULL,1,'2021-03-11 01:50:30','2021-03-11 01:50:30',24),(48,1,'Green Wyman',1994,1,17,0,NULL,NULL,2,'2021-03-11 01:50:31','2021-03-11 01:50:31',1),(49,1,'Sebastian Price',2011,1,16,0,NULL,NULL,2,'2021-03-11 01:50:31','2021-03-11 01:50:31',21),(50,2,'Buddy Halvorson',1983,1,16,0,NULL,NULL,2,'2021-03-11 01:50:31','2021-03-11 01:50:31',12),(51,1,'Grafos A',2020,0,14,1,80,80,1,'2021-03-11 02:28:25','2021-03-11 02:53:50',52),(52,1,'Engenharia de Software B',2020,0,13,0,NULL,NULL,NULL,'2021-03-11 02:33:55','2021-03-11 02:52:30',51);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '654321',
  `course_id` bigint unsigned DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `is_admin` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iraGoal` double(8,2) NOT NULL DEFAULT '60.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_course_id_foreign` (`course_id`),
  CONSTRAINT `users_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com.br',NULL,'$2y$10$/5lnJrHPTCMdcJY/P7Nz1.TCNtJlkKbddKgEp.Vcxu9eiRGRW96QS','654321',NULL,NULL,2,0,NULL,'2021-03-11 01:50:05','2021-03-11 01:50:05',60.00),(2,'Student','student@student.com.br',NULL,'$2y$10$UsWe.y4AWY.znFA3LHfKGud6bkH63UHCI9IZfzotyMR.LB3khB1LG','654321',NULL,NULL,0,0,NULL,'2021-03-11 01:50:05','2021-03-11 01:50:05',60.00),(3,'Aluno 4','aluno4@example.com','2021-03-11 01:50:18','$2y$10$teiM/el/C9BeA45Hz2sATuzVBpPSECMjBzHDMKFHqwJJqyMrn6qeS','464799883',11,'1983-06-28',0,0,'Jd37nUO9T0qx3ZN9Vew4JnTkQwu69UGpUP1bpSfILuuuMZLyqg7uY3bbDV6c','2021-03-11 01:50:18','2021-03-11 02:25:33',60.00),(4,'Nicklaus Mayer','harris.claude@example.net','2021-03-11 01:50:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','103550203',8,'2001-02-24',0,0,'lOg3Sa6zlJ','2021-03-11 01:50:19','2021-03-11 01:50:19',2.00),(5,'Ryan Strosin','amurray@example.org','2021-03-11 01:50:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1125836578',3,'2010-07-26',0,0,'v5vGTgVnQo','2021-03-11 01:50:19','2021-03-11 01:50:19',2.00),(6,'Euna Kirlin','yflatley@example.com','2021-03-11 01:50:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1609543536',8,'1992-02-16',0,0,'Qvr1FS9dIr','2021-03-11 01:50:19','2021-03-11 01:50:19',2.00),(7,'Aluno 2','aletha08@example.org','2021-03-11 01:50:18','$2y$10$YYjKqTWMOhYdwMmPLbKcaeiqbrF9xHpXc4CGaJVCfVA.lipG92FtS','1127528265',11,'1990-11-03',0,0,'UalxZQoF6R','2021-03-11 01:50:19','2021-03-11 02:24:55',2.00),(8,'Howell Considine','petra58@example.net','2021-03-11 01:50:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','125641188',10,'1991-03-19',0,0,'y9P1ldThbh','2021-03-11 01:50:19','2021-03-11 01:50:19',2.00),(9,'Aluno 3','donna47@example.com','2021-03-11 01:50:18','$2y$10$rxBDFcVEqjw5QQj/Wf0KlOuLYdYGBDSePYLtws0CYurjqyRixiFku','537801889',11,'2006-04-29',0,0,'WJeZPPq9FN','2021-03-11 01:50:19','2021-03-11 02:25:12',2.00),(10,'Mrs. Adeline Deckow','gschimmel@example.net','2021-03-11 01:50:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','610060569',4,'2000-10-06',0,0,'5ZvMGJunSG','2021-03-11 01:50:19','2021-03-11 01:50:19',2.00),(11,'Sylvan Mayert','erica24@example.net','2021-03-11 01:50:18','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','499432222',10,'2019-02-15',0,0,'2N1N8tHu3E','2021-03-11 01:50:19','2021-03-11 01:50:19',2.00),(12,'Aluno 1','brant.schulist@example.net','2021-03-11 01:50:18','$2y$10$3HSs66XXIDKaOoI4LYDWk.cbVVMFiIWno6D/ZatfDwbc8QTlCaqm2','1371705518',11,'1988-06-16',0,0,'WqfPkEP78w','2021-03-11 01:50:19','2021-03-11 02:24:32',2.00),(13,'Dr. Carmine Bode PhD','sawayn.eleanore@example.org','2021-03-11 01:50:20','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1590152584',NULL,NULL,1,0,'YwQIQWtajU','2021-03-11 01:50:20','2021-03-11 01:50:20',2.00),(14,'Roel Roberts','donato.robel@example.org','2021-03-11 01:50:20','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1464422827',NULL,NULL,1,0,'gTl9rxPF8u','2021-03-11 01:50:20','2021-03-11 01:50:20',2.00),(15,'Dallin Jaskolski','mackenzie21@example.org','2021-03-11 01:50:20','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1105859337',NULL,NULL,1,0,'V3xBHrSVdm','2021-03-11 01:50:20','2021-03-11 01:50:20',2.00),(16,'Mr. Makenna Ullrich','jnikolaus@example.com','2021-03-11 01:50:20','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1142353620',NULL,NULL,1,0,'D4Bmd3rk89','2021-03-11 01:50:20','2021-03-11 01:50:20',2.00),(17,'Dr. Felix Zieme','yjacobson@example.net','2021-03-11 01:50:20','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','801342446',NULL,NULL,1,0,'falSGTc4Mh','2021-03-11 01:50:20','2021-03-11 01:50:20',2.00);
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

-- Dump completed on 2021-03-10 21:04:28
