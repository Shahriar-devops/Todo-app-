-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 06:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: smart_larakit
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'Role', 'created', 'App\\Models\\Backend\\Role', 'created', 1, NULL, NULL, '{\"attributes\":{\"name\":\"Admin\",\"slug\":\"admin\"}}', NULL, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(2, 'Role', 'created', 'App\\Models\\Backend\\Role', 'created', 2, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"slug\":\"user\"}}', NULL, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(3, 'User', 'created', 'App\\Models\\User', 'created', 1, NULL, NULL, '{\"attributes\":{\"name\":\"Super Admin\",\"email\":\"superadmin@example.com\",\"phone\":\"01820030000\",\"designations\":\"Admin\",\"date_of_birth\":\"05-09-2022\",\"gender\":\"1\",\"role_id\":1}}', NULL, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(4, 'User', 'created', 'App\\Models\\User', 'created', 2, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"user@example.com\",\"phone\":\"01820000000\",\"designations\":\"User\",\"date_of_birth\":\"05-09-2022\",\"gender\":\"1\",\"role_id\":2}}', NULL, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(5, 'User', 'created', 'App\\Models\\User', 'created', 3, NULL, NULL, '{\"attributes\":{\"name\":\"User 2\",\"email\":\"user2@example.com\",\"phone\":\"01820000000\",\"designations\":\"User 2\",\"date_of_birth\":\"05-09-2022\",\"gender\":\"1\",\"role_id\":2}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(6, 'User', 'created', 'App\\Models\\User', 'created', 4, NULL, NULL, '{\"attributes\":{\"name\":\"User 3\",\"email\":\"user3@example.com\",\"phone\":\"01820000000\",\"designations\":\"User 3\",\"date_of_birth\":\"05-09-2022\",\"gender\":\"1\",\"role_id\":2}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(7, 'User', 'created', 'App\\Models\\User', 'created', 5, NULL, NULL, '{\"attributes\":{\"name\":\"User 4\",\"email\":\"user4@example.com\",\"phone\":\"01820000000\",\"designations\":\"User 4\",\"date_of_birth\":\"05-09-2022\",\"gender\":\"1\",\"role_id\":2}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(8, 'Language', 'created', 'App\\Models\\Backend\\Language', 'created', 1, NULL, NULL, '{\"attributes\":{\"name\":\"English\",\"code\":\"en\",\"icon_class\":\"flag-icon flag-icon-us\",\"text_direction\":\"LTR\"}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(9, 'Language', 'created', 'App\\Models\\Backend\\Language', 'created', 2, NULL, NULL, '{\"attributes\":{\"name\":\"Bangla\",\"code\":\"bn\",\"icon_class\":\"flag-icon flag-icon-bd\",\"text_direction\":\"LTR\"}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(10, 'Language', 'created', 'App\\Models\\Backend\\Language', 'created', 3, NULL, NULL, '{\"attributes\":{\"name\":\"Arabic\",\"code\":\"ar\",\"icon_class\":\"flag-icon flag-icon-ae\",\"text_direction\":\"RTL\"}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(11, 'LanguageConfig', 'created', 'App\\Models\\Backend\\LanguageConfig', 'created', 1, NULL, NULL, '{\"attributes\":{\"language.name\":\"English\",\"name\":\"English\",\"script\":\"Latn\",\"native\":\"English\",\"regional\":\"en_GB\"}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(12, 'LanguageConfig', 'created', 'App\\Models\\Backend\\LanguageConfig', 'created', 2, NULL, NULL, '{\"attributes\":{\"language.name\":\"Bangla\",\"name\":\"Bangla\",\"script\":\"Latn\",\"native\":\"Bengali\",\"regional\":\"bn_BN\"}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(13, 'LanguageConfig', 'created', 'App\\Models\\Backend\\LanguageConfig', 'created', 3, NULL, NULL, '{\"attributes\":{\"language.name\":\"Arabic\",\"name\":\"Arabic\",\"script\":\"Latn\",\"native\":\"Arabian\",\"regional\":\"ar_AR\"}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(14, 'Todo', 'created', 'App\\Models\\Backend\\Todo', 'created', 1, NULL, NULL, '{\"attributes\":{\"title\":\"Todo List 1\",\"user.name\":\"Super Admin\",\"date\":\"1\\/8\\/2022\",\"description\":\"Todo list 1\",\"status\":1}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(15, 'Todo', 'created', 'App\\Models\\Backend\\Todo', 'created', 2, NULL, NULL, '{\"attributes\":{\"title\":\"Todo List 2\",\"user.name\":\"Super Admin\",\"date\":\"1\\/8\\/2022\",\"description\":\"Todo list 2\",\"status\":2}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(16, 'Todo', 'created', 'App\\Models\\Backend\\Todo', 'created', 3, NULL, NULL, '{\"attributes\":{\"title\":\"Todo List 3\",\"user.name\":\"User\",\"date\":\"1\\/8\\/2022\",\"description\":\"Todo list 3\",\"status\":2}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(17, 'Todo', 'created', 'App\\Models\\Backend\\Todo', 'created', 4, NULL, NULL, '{\"attributes\":{\"title\":\"Todo List 4\",\"user.name\":\"Super Admin\",\"date\":\"1\\/8\\/2022\",\"description\":\"Todo list 4\",\"status\":3}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(18, 'Todo', 'created', 'App\\Models\\Backend\\Todo', 'created', 5, NULL, NULL, '{\"attributes\":{\"title\":\"Todo List 5\",\"user.name\":\"User\",\"date\":\"1\\/8\\/2022\",\"description\":\"Todo list 5\",\"status\":3}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(19, 'Todo', 'created', 'App\\Models\\Backend\\Todo', 'created', 6, NULL, NULL, '{\"attributes\":{\"title\":\"Todo List 6\",\"user.name\":\"Super Admin\",\"date\":\"1\\/8\\/2022\",\"description\":\"Todo list 6\",\"status\":3}}', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(20, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 1, NULL, NULL, '{\"attributes\":{\"title\":\"name\",\"value\":\"laravel blog admin\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(21, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 2, NULL, NULL, '{\"attributes\":{\"title\":\"phone\",\"value\":\"01820000000\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(22, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 3, NULL, NULL, '{\"attributes\":{\"title\":\"email\",\"value\":\"admin@gmail.com\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(23, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 4, NULL, NULL, '{\"attributes\":{\"title\":\"logo\",\"value\":null}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(24, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 5, NULL, NULL, '{\"attributes\":{\"title\":\"favicon\",\"value\":null}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(25, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 6, NULL, NULL, '{\"attributes\":{\"title\":\"copyright\",\"value\":\"Copyright \\u00a9 2022 Laravel blog admin. All rights reserved.\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(26, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 7, NULL, NULL, '{\"attributes\":{\"title\":\"default_language\",\"value\":\"en\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(27, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 8, NULL, NULL, '{\"attributes\":{\"title\":\"mail_driver\",\"value\":\"smtp\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(28, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 9, NULL, NULL, '{\"attributes\":{\"title\":\"sendmail_path\",\"value\":\"\\/usr\\/sbin\\/sendmail -bs -i\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(29, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 10, NULL, NULL, '{\"attributes\":{\"title\":\"mail_host\",\"value\":\"smtp.mailtrap.io\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(30, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 11, NULL, NULL, '{\"attributes\":{\"title\":\"mail_port\",\"value\":\"2525\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(31, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 12, NULL, NULL, '{\"attributes\":{\"title\":\"mail_address\",\"value\":\"admin@gmail.com\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(32, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 13, NULL, NULL, '{\"attributes\":{\"title\":\"mail_name\",\"value\":\"Laravel admin blog\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(33, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 14, NULL, NULL, '{\"attributes\":{\"title\":\"mail_username\",\"value\":\"d9f98a444876e4\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(34, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 15, NULL, NULL, '{\"attributes\":{\"title\":\"mail_password\",\"value\":\"ad457b5e0ad2cd\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(35, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 16, NULL, NULL, '{\"attributes\":{\"title\":\"mail_encryption\",\"value\":\"tls\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(36, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 17, NULL, NULL, '{\"attributes\":{\"title\":\"signature\",\"value\":\"laravel admin blog\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(37, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 18, NULL, NULL, '{\"attributes\":{\"title\":\"recaptcha_site_key\",\"value\":\"6Lcf3yAhAAAAACWKvubI45IoCx8bXgLpcNAHENQV\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(38, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 19, NULL, NULL, '{\"attributes\":{\"title\":\"recaptcha_secret_key\",\"value\":\"6Lcf3yAhAAAAABaGgYpPwBSKVSXcfXvamu-G07Y9\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(39, 'Settings', 'created', 'App\\Models\\Backend\\Setting', 'created', 20, NULL, NULL, '{\"attributes\":{\"title\":\"recaptcha_status\",\"value\":\"0\"}}', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flag_icons`
--

CREATE TABLE `flag_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flag_icons`
--

INSERT INTO `flag_icons` (`id`, `icon_class`, `title`, `created_at`, `updated_at`) VALUES
(1, 'flag-icon flag-icon-ad', 'ad', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(2, 'flag-icon flag-icon-ae', 'ae', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(3, 'flag-icon flag-icon-af', 'af', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(4, 'flag-icon flag-icon-ag', 'ag', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(5, 'flag-icon flag-icon-ai', 'ai', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(6, 'flag-icon flag-icon-al', 'al', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(7, 'flag-icon flag-icon-am', 'am', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(8, 'flag-icon flag-icon-ao', 'ao', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(9, 'flag-icon flag-icon-aq', 'aq', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(10, 'flag-icon flag-icon-ar', 'ar', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(11, 'flag-icon flag-icon-as', 'as', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(12, 'flag-icon flag-icon-at', 'at', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(13, 'flag-icon flag-icon-au', 'au', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(14, 'flag-icon flag-icon-aw', 'aw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(15, 'flag-icon flag-icon-ax', 'ax', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(16, 'flag-icon flag-icon-az', 'az', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(17, 'flag-icon flag-icon-ba', 'ba', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(18, 'flag-icon flag-icon-bb', 'bb', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(19, 'flag-icon flag-icon-bd', 'bd', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(20, 'flag-icon flag-icon-be', 'be', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(21, 'flag-icon flag-icon-bf', 'bf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(22, 'flag-icon flag-icon-bg', 'bg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(23, 'flag-icon flag-icon-bh', 'bh', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(24, 'flag-icon flag-icon-bi', 'bi', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(25, 'flag-icon flag-icon-bj', 'bj', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(26, 'flag-icon flag-icon-bl', 'bl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(27, 'flag-icon flag-icon-bm', 'bm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(28, 'flag-icon flag-icon-bn', 'bn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(29, 'flag-icon flag-icon-bo', 'bo', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(30, 'flag-icon flag-icon-bq', 'bq', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(31, 'flag-icon flag-icon-br', 'br', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(32, 'flag-icon flag-icon-bs', 'bs', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(33, 'flag-icon flag-icon-bt', 'bt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(34, 'flag-icon flag-icon-bv', 'bv', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(35, 'flag-icon flag-icon-bw', 'bw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(36, 'flag-icon flag-icon-by', 'by', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(37, 'flag-icon flag-icon-bz', 'bz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(38, 'flag-icon flag-icon-ca', 'ca', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(39, 'flag-icon flag-icon-cc', 'cc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(40, 'flag-icon flag-icon-cd', 'cd', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(41, 'flag-icon flag-icon-cf', 'cf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(42, 'flag-icon flag-icon-cg', 'cg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(43, 'flag-icon flag-icon-ch', 'ch', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(44, 'flag-icon flag-icon-ci', 'ci', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(45, 'flag-icon flag-icon-ck', 'ck', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(46, 'flag-icon flag-icon-cl', 'cl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(47, 'flag-icon flag-icon-cm', 'cm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(48, 'flag-icon flag-icon-cn', 'cn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(49, 'flag-icon flag-icon-co', 'co', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(50, 'flag-icon flag-icon-cr', 'cr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(51, 'flag-icon flag-icon-cu', 'cu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(52, 'flag-icon flag-icon-cv', 'cv', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(53, 'flag-icon flag-icon-cw', 'cw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(54, 'flag-icon flag-icon-cx', 'cx', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(55, 'flag-icon flag-icon-cy', 'cy', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(56, 'flag-icon flag-icon-cz', 'cz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(57, 'flag-icon flag-icon-de', 'de', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(58, 'flag-icon flag-icon-dj', 'dj', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(59, 'flag-icon flag-icon-dk', 'dk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(60, 'flag-icon flag-icon-dm', 'dm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(61, 'flag-icon flag-icon-do', 'do', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(62, 'flag-icon flag-icon-dz', 'dz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(63, 'flag-icon flag-icon-ec', 'ec', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(64, 'flag-icon flag-icon-ee', 'ee', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(65, 'flag-icon flag-icon-eg', 'eg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(66, 'flag-icon flag-icon-eh', 'eh', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(67, 'flag-icon flag-icon-er', 'er', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(68, 'flag-icon flag-icon-es', 'es', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(69, 'flag-icon flag-icon-et', 'et', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(70, 'flag-icon flag-icon-fi', 'fi', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(71, 'flag-icon flag-icon-fj', 'fj', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(72, 'flag-icon flag-icon-fk', 'fk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(73, 'flag-icon flag-icon-fm', 'fm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(74, 'flag-icon flag-icon-fo', 'fo', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(75, 'flag-icon flag-icon-fr', 'fr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(76, 'flag-icon flag-icon-ga', 'ga', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(77, 'flag-icon flag-icon-gb', 'gb', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(78, 'flag-icon flag-icon-gd', 'gd', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(79, 'flag-icon flag-icon-ge', 'ge', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(80, 'flag-icon flag-icon-gf', 'gf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(81, 'flag-icon flag-icon-gg', 'gg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(82, 'flag-icon flag-icon-gh', 'gh', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(83, 'flag-icon flag-icon-gi', 'gi', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(84, 'flag-icon flag-icon-gl', 'gl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(85, 'flag-icon flag-icon-gm', 'gm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(86, 'flag-icon flag-icon-gn', 'gn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(87, 'flag-icon flag-icon-gp', 'gp', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(88, 'flag-icon flag-icon-gq', 'gq', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(89, 'flag-icon flag-icon-gr', 'gr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(90, 'flag-icon flag-icon-gs', 'gs', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(91, 'flag-icon flag-icon-gt', 'gt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(92, 'flag-icon flag-icon-gu', 'gu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(93, 'flag-icon flag-icon-gw', 'gw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(94, 'flag-icon flag-icon-gy', 'gy', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(95, 'flag-icon flag-icon-hk', 'hk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(96, 'flag-icon flag-icon-hm', 'hm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(97, 'flag-icon flag-icon-hn', 'hn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(98, 'flag-icon flag-icon-hr', 'hr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(99, 'flag-icon flag-icon-ht', 'ht', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(100, 'flag-icon flag-icon-hu', 'hu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(101, 'flag-icon flag-icon-id', 'id', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(102, 'flag-icon flag-icon-ie', 'ie', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(103, 'flag-icon flag-icon-il', 'il', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(104, 'flag-icon flag-icon-im', 'im', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(105, 'flag-icon flag-icon-in', 'in', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(106, 'flag-icon flag-icon-io', 'io', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(107, 'flag-icon flag-icon-iq', 'iq', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(108, 'flag-icon flag-icon-ir', 'ir', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(109, 'flag-icon flag-icon-is', 'is', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(110, 'flag-icon flag-icon-it', 'it', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(111, 'flag-icon flag-icon-je', 'je', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(112, 'flag-icon flag-icon-jm', 'jm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(113, 'flag-icon flag-icon-jo', 'jo', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(114, 'flag-icon flag-icon-jp', 'jp', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(115, 'flag-icon flag-icon-ke', 'ke', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(116, 'flag-icon flag-icon-kg', 'kg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(117, 'flag-icon flag-icon-kh', 'kh', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(118, 'flag-icon flag-icon-ki', 'ki', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(119, 'flag-icon flag-icon-km', 'km', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(120, 'flag-icon flag-icon-kn', 'kn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(121, 'flag-icon flag-icon-kp', 'kp', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(122, 'flag-icon flag-icon-kr', 'kr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(123, 'flag-icon flag-icon-kw', 'kw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(124, 'flag-icon flag-icon-ky', 'ky', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(125, 'flag-icon flag-icon-kz', 'kz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(126, 'flag-icon flag-icon-la', 'la', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(127, 'flag-icon flag-icon-lb', 'lb', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(128, 'flag-icon flag-icon-lc', 'lc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(129, 'flag-icon flag-icon-li', 'li', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(130, 'flag-icon flag-icon-lk', 'lk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(131, 'flag-icon flag-icon-lr', 'lr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(132, 'flag-icon flag-icon-ls', 'ls', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(133, 'flag-icon flag-icon-lt', 'lt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(134, 'flag-icon flag-icon-lu', 'lu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(135, 'flag-icon flag-icon-lv', 'lv', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(136, 'flag-icon flag-icon-ly', 'ly', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(137, 'flag-icon flag-icon-ma', 'ma', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(138, 'flag-icon flag-icon-mc', 'mc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(139, 'flag-icon flag-icon-md', 'md', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(140, 'flag-icon flag-icon-me', 'me', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(141, 'flag-icon flag-icon-mf', 'mf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(142, 'flag-icon flag-icon-mg', 'mg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(143, 'flag-icon flag-icon-mh', 'mh', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(144, 'flag-icon flag-icon-mk', 'mk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(145, 'flag-icon flag-icon-ml', 'ml', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(146, 'flag-icon flag-icon-mm', 'mm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(147, 'flag-icon flag-icon-mn', 'mn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(148, 'flag-icon flag-icon-mo', 'mo', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(149, 'flag-icon flag-icon-mp', 'mp', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(150, 'flag-icon flag-icon-mq', 'mq', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(151, 'flag-icon flag-icon-mr', 'mr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(152, 'flag-icon flag-icon-ms', 'ms', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(153, 'flag-icon flag-icon-mt', 'mt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(154, 'flag-icon flag-icon-mu', 'mu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(155, 'flag-icon flag-icon-mv', 'mv', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(156, 'flag-icon flag-icon-mw', 'mw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(157, 'flag-icon flag-icon-mx', 'mx', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(158, 'flag-icon flag-icon-my', 'my', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(159, 'flag-icon flag-icon-mz', 'mz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(160, 'flag-icon flag-icon-na', 'na', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(161, 'flag-icon flag-icon-nc', 'nc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(162, 'flag-icon flag-icon-ne', 'ne', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(163, 'flag-icon flag-icon-nf', 'nf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(164, 'flag-icon flag-icon-ng', 'ng', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(165, 'flag-icon flag-icon-ni', 'ni', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(166, 'flag-icon flag-icon-nl', 'nl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(167, 'flag-icon flag-icon-no', 'no', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(168, 'flag-icon flag-icon-np', 'np', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(169, 'flag-icon flag-icon-nr', 'nr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(170, 'flag-icon flag-icon-nu', 'nu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(171, 'flag-icon flag-icon-nz', 'nz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(172, 'flag-icon flag-icon-om', 'om', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(173, 'flag-icon flag-icon-pa', 'pa', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(174, 'flag-icon flag-icon-pe', 'pe', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(175, 'flag-icon flag-icon-pf', 'pf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(176, 'flag-icon flag-icon-pg', 'pg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(177, 'flag-icon flag-icon-ph', 'ph', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(178, 'flag-icon flag-icon-pk', 'pk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(179, 'flag-icon flag-icon-pl', 'pl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(180, 'flag-icon flag-icon-pm', 'pm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(181, 'flag-icon flag-icon-pn', 'pn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(182, 'flag-icon flag-icon-pr', 'pr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(183, 'flag-icon flag-icon-ps', 'ps', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(184, 'flag-icon flag-icon-pt', 'pt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(185, 'flag-icon flag-icon-pw', 'pw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(186, 'flag-icon flag-icon-py', 'py', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(187, 'flag-icon flag-icon-qa', 'qa', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(188, 'flag-icon flag-icon-re', 're', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(189, 'flag-icon flag-icon-ro', 'ro', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(190, 'flag-icon flag-icon-rs', 'rs', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(191, 'flag-icon flag-icon-ru', 'ru', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(192, 'flag-icon flag-icon-rw', 'rw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(193, 'flag-icon flag-icon-sa', 'sa', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(194, 'flag-icon flag-icon-sb', 'sb', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(195, 'flag-icon flag-icon-sc', 'sc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(196, 'flag-icon flag-icon-sd', 'sd', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(197, 'flag-icon flag-icon-se', 'se', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(198, 'flag-icon flag-icon-sg', 'sg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(199, 'flag-icon flag-icon-sh', 'sh', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(200, 'flag-icon flag-icon-si', 'si', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(201, 'flag-icon flag-icon-sj', 'sj', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(202, 'flag-icon flag-icon-sk', 'sk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(203, 'flag-icon flag-icon-sl', 'sl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(204, 'flag-icon flag-icon-sm', 'sm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(205, 'flag-icon flag-icon-sn', 'sn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(206, 'flag-icon flag-icon-so', 'so', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(207, 'flag-icon flag-icon-sr', 'sr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(208, 'flag-icon flag-icon-ss', 'ss', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(209, 'flag-icon flag-icon-st', 'st', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(210, 'flag-icon flag-icon-sv', 'sv', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(211, 'flag-icon flag-icon-sx', 'sx', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(212, 'flag-icon flag-icon-sy', 'sy', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(213, 'flag-icon flag-icon-sz', 'sz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(214, 'flag-icon flag-icon-tc', 'tc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(215, 'flag-icon flag-icon-td', 'td', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(216, 'flag-icon flag-icon-tf', 'tf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(217, 'flag-icon flag-icon-tg', 'tg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(218, 'flag-icon flag-icon-th', 'th', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(219, 'flag-icon flag-icon-tj', 'tj', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(220, 'flag-icon flag-icon-tk', 'tk', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(221, 'flag-icon flag-icon-tl', 'tl', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(222, 'flag-icon flag-icon-tm', 'tm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(223, 'flag-icon flag-icon-tn', 'tn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(224, 'flag-icon flag-icon-to', 'to', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(225, 'flag-icon flag-icon-tr', 'tr', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(226, 'flag-icon flag-icon-tt', 'tt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(227, 'flag-icon flag-icon-tv', 'tv', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(228, 'flag-icon flag-icon-tw', 'tw', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(229, 'flag-icon flag-icon-tz', 'tz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(230, 'flag-icon flag-icon-ua', 'ua', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(231, 'flag-icon flag-icon-ug', 'ug', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(232, 'flag-icon flag-icon-um', 'um', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(233, 'flag-icon flag-icon-us', 'us', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(234, 'flag-icon flag-icon-uy', 'uy', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(235, 'flag-icon flag-icon-uz', 'uz', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(236, 'flag-icon flag-icon-va', 'va', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(237, 'flag-icon flag-icon-vc', 'vc', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(238, 'flag-icon flag-icon-ve', 've', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(239, 'flag-icon flag-icon-vg', 'vg', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(240, 'flag-icon flag-icon-vi', 'vi', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(241, 'flag-icon flag-icon-vn', 'vn', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(242, 'flag-icon flag-icon-vu', 'vu', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(243, 'flag-icon flag-icon-wf', 'wf', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(244, 'flag-icon flag-icon-ws', 'ws', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(245, 'flag-icon flag-icon-ye', 'ye', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(246, 'flag-icon flag-icon-yt', 'yt', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(247, 'flag-icon flag-icon-za', 'za', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(248, 'flag-icon flag-icon-zm', 'zm', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(249, 'flag-icon flag-icon-zw', 'zw', '2022-09-05 10:36:56', '2022-09-05 10:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1= status.1,0= status.0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon_class`, `text_direction`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'flag-icon flag-icon-us', 'LTR', 1, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(2, 'Bangla', 'bn', 'flag-icon flag-icon-bd', 'LTR', 1, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(3, 'Arabic', 'ar', 'flag-icon flag-icon-ae', 'RTL', 1, '2022-09-05 10:36:56', '2022-09-05 10:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `language_configs`
--

CREATE TABLE `language_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_configs`
--

INSERT INTO `language_configs` (`id`, `language_id`, `name`, `script`, `native`, `regional`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', 'Latn', 'English', 'en_GB', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(2, 2, 'Bangla', 'Latn', 'Bengali', 'bn_BN', '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(3, 3, 'Arabic', 'Latn', 'Arabian', 'ar_AR', '2022-09-05 10:36:56', '2022-09-05 10:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `login_activities`
--

CREATE TABLE `login_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_07_18_172715_create_uploads_table', 1),
(5, '2022_07_20_190927_create_roles_table', 1),
(6, '2022_07_20_191517_create_permissions_table', 1),
(7, '2022_07_22_173145_create_flag_icons_table', 1),
(8, '2022_07_22_173146_create_languages_table', 1),
(9, '2022_07_22_173203_create_language_configs_table', 1),
(10, '2022_07_25_120431_create_activity_log_table', 1),
(11, '2022_07_25_120432_add_event_column_to_activity_log_table', 1),
(12, '2022_07_25_120433_add_batch_uuid_column_to_activity_log_table', 1),
(13, '2022_07_28_135114_create_settings_table', 1),
(14, '2022_10_12_000000_create_users_table', 1),
(15, '2022_10_26_152954_create_todos_table', 1),
(16, '2022_10_27_134943_create_login_activities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `attribute`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 'role', '{\"read\":\"role_read\",\"create\":\"role_create\",\"update\":\"role_update\",\"delete\":\"role_delete\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(2, 'users', '{\"read\":\"user_read\",\"create\":\"user_create\",\"update\":\"user_update\",\"delete\":\"user_delete\",\"permissions\":\"user_permissions\",\"ban_or_unban\":\"user_ban_unban\",\"status_update\":\"user_status_update\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(3, 'todo', '{\"read\":\"todo_read\",\"create\":\"todo_create\",\"update\":\"todo_update\",\"delete\":\"todo_delete\",\"status\":\"todo_status_update\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(4, 'activity_logs', '{\"read\":\"activity_logs_read\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(5, 'login_activity', '{\"read\":\"login_activity_read\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(6, 'backup', '{\"read\":\"backup_read\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(7, 'language', '{\"read\":\"language_read\",\"create\":\"language_create\",\"update\":\"language_update\",\"phrase\":\"language_phrase\",\"delete\":\"language_delete\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(8, 'general_settings', '{\"read\":\"general_settings_read\",\"update\":\"general_settings_update\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(9, 'mail_settings', '{\"read\":\"mail_settings_read\",\"update\":\"mail_settings_update\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(10, 'recaptcha', '{\"read\":\"recaptcha_settings_read\",\"update\":\"recaptcha_settings_update\"}', '2022-09-05 10:36:55', '2022-09-05 10:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1= Active,0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `permissions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '[\"role_read\",\"role_create\",\"role_update\",\"role_delete\",\"user_read\",\"user_create\",\"user_update\",\"user_delete\",\"user_permissions\",\"user_ban_unban\",\"user_status_update\",\"todo_read\",\"todo_create\",\"todo_update\",\"todo_delete\",\"todo_status_update\",\"language_read\",\"language_create\",\"language_update\",\"language_delete\",\"language_phrase\",\"activity_logs_read\",\"login_activity_read\",\"backup_read\",\"general_settings_read\",\"general_settings_update\",\"mail_settings_read\",\"mail_settings_update\",\"recaptcha_settings_read\",\"recaptcha_settings_update\"]', 1, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(2, 'User', 'user', '[\"role_read\",\"user_read\",\"todo_read\",\"language_read\",\"activity_logs_read\",\"login_activity_read\"]', 1, '2022-09-05 10:36:55', '2022-09-05 10:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 'name', 'laravel blog admin', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(2, 'phone', '01820000000', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(3, 'email', 'admin@gmail.com', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(4, 'logo', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(5, 'favicon', NULL, '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(6, 'copyright', 'Copyright © 2022 Laravel blog admin. All rights reserved.', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(7, 'default_language', 'en', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(8, 'mail_driver', 'smtp', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(9, 'sendmail_path', '/usr/sbin/sendmail -bs -i', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(10, 'mail_host', 'smtp.mailtrap.io', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(11, 'mail_port', '2525', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(12, 'mail_address', 'admin@gmail.com', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(13, 'mail_name', 'Laravel admin blog', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(14, 'mail_username', 'd9f98a444876e4', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(15, 'mail_password', 'ad457b5e0ad2cd', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(16, 'mail_encryption', 'tls', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(17, 'signature', 'laravel admin blog', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(18, 'recaptcha_site_key', '6Lcf3yAhAAAAACWKvubI45IoCx8bXgLpcNAHENQV', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(19, 'recaptcha_secret_key', '6Lcf3yAhAAAAABaGgYpPwBSKVSXcfXvamu-G07Y9', '2022-09-05 10:36:57', '2022-09-05 10:36:57'),
(20, 'recaptcha_status', '0', '2022-09-05 10:36:57', '2022-09-05 10:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `todo_file` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'pending = 1, processing = 2,complete = 3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `user_id`, `date`, `todo_file`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Todo List 1', 1, '1/8/2022', NULL, 'Todo list 1', 1, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(2, 'Todo List 2', 1, '1/8/2022', NULL, 'Todo list 2', 2, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(3, 'Todo List 3', 2, '1/8/2022', NULL, 'Todo list 3', 2, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(4, 'Todo List 4', 1, '1/8/2022', NULL, 'Todo list 4', 3, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(5, 'Todo List 5', 2, '1/8/2022', NULL, 'Todo list 5', 3, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(6, 'Todo List 6', 1, '1/8/2022', NULL, 'Todo list 6', 3, '2022-09-05 10:36:56', '2022-09-05 10:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` bigint(20) UNSIGNED DEFAULT NULL,
  `cover_avatar` bigint(20) UNSIGNED DEFAULT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_ban` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1= banuser.1,0= banuser.0',
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1= status.1,0= status.0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified` bigint(20) UNSIGNED DEFAULT NULL,
  `forgot_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `date_of_birth`, `gender`, `designations`, `address`, `about`, `avatar`, `cover_avatar`, `permissions`, `role_id`, `is_ban`, `status`, `email_verified_at`, `email_verified`, `forgot_token`, `verify_token`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', '01820030000', '05-09-2022', '1', 'Admin', NULL, NULL, NULL, NULL, '[\"role_read\",\"role_create\",\"role_update\",\"role_delete\",\"user_read\",\"user_create\",\"user_update\",\"user_delete\",\"user_permissions\",\"user_ban_unban\",\"user_status_update\",\"todo_read\",\"todo_create\",\"todo_update\",\"todo_delete\",\"todo_status_update\",\"language_read\",\"language_create\",\"language_update\",\"language_delete\",\"language_phrase\",\"activity_logs_read\",\"login_activity_read\",\"backup_read\",\"general_settings_read\",\"general_settings_update\",\"mail_settings_read\",\"mail_settings_update\",\"recaptcha_settings_read\",\"recaptcha_settings_update\"]', 1, 0, 1, NULL, NULL, NULL, NULL, '$2y$10$7fPawm8L1O9eRcHempdqwu81AEBUHnPEMfPjyLeVAZmhPuyJFHbMy', NULL, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(2, 'User', 'user@example.com', '01820000000', '05-09-2022', '1', 'User', NULL, NULL, NULL, NULL, '[\"role_read\",\"user_read\",\"todo_read\",\"language_read\",\"activity_logs_read\",\"login_activity_read\"]', 2, 0, 1, NULL, NULL, NULL, NULL, '$2y$10$f1jrsWrf21dX2SC7co9tu.AMLx7PVTINzHdSZsJ9fAfKubp4lHk4q', NULL, '2022-09-05 10:36:55', '2022-09-05 10:36:55'),
(3, 'User 2', 'user2@example.com', '01820000000', '05-09-2022', '1', 'User 2', NULL, NULL, NULL, NULL, '[\"role_read\",\"user_read\",\"todo_read\",\"language_read\",\"activity_logs_read\",\"login_activity_read\"]', 2, 0, 1, NULL, NULL, NULL, NULL, '$2y$10$fTgQANMZkrFWU4dE3C2fyej1gwSgcydrN1/7Vm0aaB9pYc26DXpU6', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(4, 'User 3', 'user3@example.com', '01820000000', '05-09-2022', '1', 'User 3', NULL, NULL, NULL, NULL, '[\"role_read\",\"user_read\",\"todo_read\",\"language_read\",\"activity_logs_read\",\"login_activity_read\"]', 2, 0, 1, NULL, NULL, NULL, NULL, '$2y$10$Sjb1HgYhrkHac2TsB64JlOizqniBE9jovYFH9RAmkhxHnXFZ9FrRi', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56'),
(5, 'User 4', 'user4@example.com', '01820000000', '05-09-2022', '1', 'User 4', NULL, NULL, NULL, NULL, '[\"role_read\",\"user_read\",\"todo_read\",\"language_read\",\"activity_logs_read\",\"login_activity_read\"]', 2, 0, 1, NULL, NULL, NULL, NULL, '$2y$10$SwGJseSvqpTSX.9P8G66ke/N2NkO/QLYkvwZQ68RFdAbJyZMQP6mS', NULL, '2022-09-05 10:36:56', '2022-09-05 10:36:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flag_icons`
--
ALTER TABLE `flag_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_configs`
--
ALTER TABLE `language_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_configs_language_id_foreign` (`language_id`);

--
-- Indexes for table `login_activities`
--
ALTER TABLE `login_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todos_user_id_foreign` (`user_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flag_icons`
--
ALTER TABLE `flag_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language_configs`
--
ALTER TABLE `language_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_activities`
--
ALTER TABLE `login_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `language_configs`
--
ALTER TABLE `language_configs`
  ADD CONSTRAINT `language_configs_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login_activities`
--
ALTER TABLE `login_activities`
  ADD CONSTRAINT `login_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
