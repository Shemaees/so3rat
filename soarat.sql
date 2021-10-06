-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 03:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soarat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'shemaees', 'mahmoudshemaees@gmail.com', '$2y$10$cnXGE88ax0GRIuE7fqBX9eA0msALaYAxed7ME6SOIfsvDzZMGfznG', 0, NULL, NULL, '2021-09-15 21:03:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_communications`
--

CREATE TABLE `doctor_communications` (
  `id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `day` enum('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday') DEFAULT NULL,
  `start_at` time DEFAULT NULL,
  `end_at` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_profiles`
--

CREATE TABLE `doctor_profiles` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `doctor_type` enum('Trainee','Trainer','Follow up of patients') DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `qualification` longtext DEFAULT NULL,
  `intrests` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `medical_license_number` int(11) DEFAULT NULL,
  `communication_types` text DEFAULT NULL,
  `communication_way` enum('Private','Group','Both') DEFAULT NULL,
  `accept_promotions` enum('Yes','No') DEFAULT NULL,
  `Follow-up fee` float DEFAULT NULL,
  `training_fee` float DEFAULT NULL,
  `classification_certificate` longtext DEFAULT NULL,
  `bank_statements_certificate` longtext DEFAULT NULL,
  `university_qualification` longtext DEFAULT NULL,
  `experience_certificate` longtext DEFAULT NULL,
  `specialty_certificate` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_06_213129_create_admins_table', 1),
(6, '2021_09_05_212008_create_time_slots_table', 2),
(7, '2021_10_06_014652_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `patient_profiles`
--

CREATE TABLE `patient_profiles` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `length` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `qualification` longtext DEFAULT NULL,
  `history` longtext DEFAULT NULL,
  `usual_medicines` text DEFAULT NULL,
  `allergenic_foods` text DEFAULT NULL,
  `about_wieght` text DEFAULT NULL,
  `meals_number` int(11) DEFAULT NULL,
  `meals_order` varchar(255) DEFAULT NULL,
  `average_sleeping_hours` int(11) DEFAULT NULL,
  `cups_of_water_daily` int(11) DEFAULT NULL,
  `sport_activities` enum('1.2','1.375','1.55','1.725') DEFAULT NULL,
  `favorite_meals` varchar(255) DEFAULT NULL,
  `unfavorite_meals` varchar(255) DEFAULT NULL,
  `carbohydrates` enum('Favorite','Unfavorite') DEFAULT NULL,
  `vegetables` enum('Favorite','Unfavorite') DEFAULT NULL,
  `fruits` enum('Favorite','Unfavorite') DEFAULT NULL,
  `dairy_products` enum('Favorite','Unfavorite') DEFAULT NULL,
  `meat` enum('Favorite','Unfavorite') DEFAULT NULL,
  `fats` enum('Favorite','Unfavorite') DEFAULT NULL,
  `health_goal` varchar(255) DEFAULT NULL,
  `motivation` varchar(255) DEFAULT NULL,
  `confidence` varchar(255) DEFAULT NULL,
  `nutritionists_number_worked_with_before` int(11) DEFAULT NULL,
  `lost_weight_without_planning_or_knowing_reasons` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'test', '56b4fca13407a818c1a614e37e97cb509cdb180e24dbe6c825381ce79053b1d3', '[\"*\"]', '2021-09-25 18:47:39', '2021-09-15 19:05:43', '2021-09-25 18:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `from` time NOT NULL,
  `to` time DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `day`, `from`, `to`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2023-10-06', '03:27:18', '04:18:27', -1, NULL, '2021-09-17 15:15:52', '2021-09-25 17:18:33'),
(2, '2023-07-19', '04:46:37', '05:37:46', -1, NULL, '2021-09-17 15:15:52', '2021-09-25 17:20:23'),
(3, '2021-10-14', '01:05:46', '02:46:05', -1, NULL, '2021-09-17 15:15:52', '2021-09-25 17:05:06'),
(4, '2022-12-22', '17:18:10', '18:10:18', 0, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(5, '2023-12-22', '05:15:37', '06:37:15', 1, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(6, '2022-01-15', '14:02:08', '15:08:02', -1, NULL, '2021-09-17 15:15:52', '2021-09-25 17:09:41'),
(7, '2026-03-24', '22:06:08', '23:08:06', 0, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(8, '2024-09-01', '18:04:47', '19:47:04', 0, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(9, '2026-06-30', '04:41:47', '05:47:41', 1, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(10, '2022-11-16', '20:29:32', '21:32:29', -1, NULL, '2021-09-17 15:15:52', '2021-09-25 17:20:23'),
(11, '2026-09-13', '03:17:46', '04:46:17', 0, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(12, '2025-08-12', '23:15:08', '00:08:15', 1, NULL, '2021-09-17 15:15:52', '2021-09-17 15:15:52'),
(13, '2026-03-13', '09:00:45', '10:45:00', 1, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(14, '2025-12-24', '23:52:03', '00:03:52', 1, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(15, '2024-05-19', '20:34:34', '21:34:34', 1, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(16, '2025-09-20', '00:35:56', '01:56:35', 1, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(17, '2025-06-13', '19:24:28', '20:28:24', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(18, '2026-03-30', '03:14:33', '04:33:14', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(19, '2025-01-28', '05:45:14', '06:14:45', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(20, '2023-03-02', '20:22:58', '21:58:22', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(21, '2023-09-28', '18:34:37', '19:37:34', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(22, '2025-05-10', '18:54:57', '19:57:54', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(23, '2022-02-23', '19:06:55', '20:55:06', -1, NULL, '2021-09-17 15:15:53', '2021-09-25 17:09:42'),
(24, '2024-07-22', '00:05:14', '01:14:05', 0, NULL, '2021-09-17 15:15:53', '2021-09-17 15:15:53'),
(25, '2023-02-06', '16:29:47', '17:47:29', -1, NULL, '2021-09-17 15:15:53', '2021-09-25 17:18:33'),
(26, '2021-12-31', '23:42:29', '00:29:42', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(27, '2025-01-05', '10:52:08', '11:08:52', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(28, '2022-01-03', '04:57:24', '05:24:57', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:09:41'),
(29, '2024-11-03', '10:01:20', '11:20:01', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(30, '2023-05-14', '20:36:54', '21:54:36', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(31, '2021-12-01', '01:08:24', '02:24:08', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:05:07'),
(32, '2024-01-17', '21:46:31', '22:31:46', 1, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(33, '2023-03-23', '06:15:30', '07:30:15', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:18:33'),
(34, '2025-12-02', '02:39:30', '03:30:39', 1, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(35, '2025-09-02', '04:35:52', '05:52:35', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(36, '2021-12-23', '20:22:50', '21:50:22', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:05:07'),
(37, '2023-12-16', '14:10:46', '15:46:10', 1, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(38, '2022-04-20', '07:07:21', '08:21:07', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:10:30'),
(39, '2022-06-14', '22:57:45', '23:45:57', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:11:03'),
(40, '2022-06-18', '13:18:21', '14:21:18', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(41, '2023-12-31', '19:42:47', '20:47:42', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(42, '2026-07-25', '23:08:19', '00:19:08', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(43, '2024-02-17', '04:02:41', '05:41:02', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(44, '2021-09-22', '20:46:49', '21:49:46', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(45, '2023-04-10', '05:50:59', '06:59:50', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:18:32'),
(46, '2023-01-07', '13:26:32', '14:32:26', -1, NULL, '2021-09-17 15:15:54', '2021-09-25 17:18:32'),
(47, '2024-04-27', '03:48:38', '04:38:48', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(48, '2024-03-26', '00:22:01', '01:01:22', 0, NULL, '2021-09-17 15:15:54', '2021-09-17 15:15:54'),
(49, '2024-12-06', '11:52:47', '12:47:52', 1, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(50, '2026-04-04', '06:46:29', '07:29:46', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(51, '2024-06-27', '19:30:31', '20:31:30', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(52, '2024-03-31', '16:17:46', '17:46:17', 1, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(53, '2025-07-20', '09:35:09', '10:09:35', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(54, '2023-10-17', '22:31:48', '23:48:31', -1, NULL, '2021-09-17 15:15:55', '2021-09-25 17:20:24'),
(55, '2023-12-21', '03:06:09', '04:09:06', -1, NULL, '2021-09-17 15:15:55', '2021-09-25 17:20:24'),
(56, '2021-11-20', '01:21:37', '02:37:21', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(57, '2022-07-11', '14:16:50', '15:50:16', -1, NULL, '2021-09-17 15:15:55', '2021-09-25 17:11:03'),
(58, '2026-08-20', '11:57:52', '12:52:57', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(59, '2022-04-25', '23:51:10', '00:10:51', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(60, '2025-10-03', '04:49:14', '05:14:49', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(61, '2023-03-28', '13:20:17', '14:17:20', -1, NULL, '2021-09-17 15:15:55', '2021-09-25 17:20:23'),
(62, '2024-03-15', '15:09:21', '16:21:09', 1, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(63, '2022-01-07', '23:05:28', '00:28:05', -1, NULL, '2021-09-17 15:15:55', '2021-09-25 17:05:07'),
(64, '2024-09-05', '03:44:58', '04:58:44', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(65, '2024-01-03', '09:35:54', '10:54:35', 1, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(66, '2022-11-03', '21:11:05', '22:05:11', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(67, '2023-04-09', '01:15:17', '02:17:15', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(68, '2025-07-16', '04:00:19', '05:19:00', 1, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(69, '2026-06-24', '07:28:14', '08:14:28', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(70, '2022-06-24', '09:54:27', '10:27:54', -1, NULL, '2021-09-17 15:15:55', '2021-09-25 17:18:32'),
(71, '2025-12-11', '03:55:51', '04:51:55', 1, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(72, '2025-06-01', '23:25:38', '00:38:25', 0, NULL, '2021-09-17 15:15:55', '2021-09-17 15:15:55'),
(73, '2023-06-25', '04:29:45', '05:45:29', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:20:23'),
(74, '2025-01-21', '20:59:02', '21:02:59', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(75, '2024-01-31', '03:47:55', '04:55:47', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(76, '2022-06-04', '00:41:38', '01:38:41', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:10:30'),
(77, '2026-01-26', '20:22:36', '21:36:22', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(78, '2022-09-17', '22:29:18', '23:18:29', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:18:32'),
(79, '2024-02-27', '22:39:32', '23:32:39', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(80, '2025-03-13', '12:59:05', '13:05:59', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(81, '2025-02-17', '03:22:25', '04:25:22', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(82, '2023-03-14', '22:34:59', '23:59:34', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(83, '2026-02-28', '01:03:52', '02:52:03', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(84, '2022-10-23', '23:36:30', '00:30:36', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(85, '2025-12-06', '11:09:45', '12:45:09', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(86, '2026-08-19', '05:39:26', '06:26:39', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(87, '2021-11-12', '16:10:29', '17:29:10', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:05:07'),
(88, '2022-06-16', '16:53:25', '17:25:53', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:09:42'),
(89, '2022-12-02', '16:59:00', '17:00:59', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:18:32'),
(90, '2024-07-13', '22:46:02', '23:02:46', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(91, '2026-04-15', '02:32:24', '03:24:32', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(92, '2026-05-28', '13:11:22', '14:22:11', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(93, '2022-01-31', '09:23:46', '10:46:23', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(94, '2021-11-05', '15:08:06', '16:06:08', -1, NULL, '2021-09-17 15:15:56', '2021-09-25 17:09:41'),
(95, '2021-09-24', '19:07:16', '20:16:07', 1, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(96, '2026-08-21', '22:11:30', '23:30:11', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(97, '2026-06-19', '07:30:52', '08:52:30', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(98, '2026-06-06', '03:34:57', '04:57:34', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(99, '2025-05-17', '11:41:51', '12:51:41', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(100, '2022-06-28', '09:06:57', '10:57:06', 0, NULL, '2021-09-17 15:15:56', '2021-09-17 15:15:56'),
(102, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 15:01:30', '2021-09-25 15:01:30'),
(103, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 15:01:30', '2021-09-25 15:01:30'),
(104, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 15:01:30', '2021-09-25 15:01:30'),
(105, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 15:01:30', '2021-09-25 15:01:30'),
(106, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 15:01:30', '2021-09-25 15:01:30'),
(107, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:36:20', '2021-09-25 16:36:20'),
(108, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:36:20', '2021-09-25 16:36:20'),
(109, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:36:20', '2021-09-25 16:36:20'),
(110, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:36:20', '2021-09-25 16:36:20'),
(111, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:36:21', '2021-09-25 16:36:21'),
(112, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:09', '2021-09-25 16:37:09'),
(113, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:10', '2021-09-25 16:37:10'),
(114, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:10', '2021-09-25 16:37:10'),
(115, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:10', '2021-09-25 16:37:10'),
(116, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:10', '2021-09-25 16:37:10'),
(117, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:27', '2021-09-25 16:37:27'),
(118, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:27', '2021-09-25 16:37:27'),
(119, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:27', '2021-09-25 16:37:27'),
(120, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:27', '2021-09-25 16:37:27'),
(121, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:37:27', '2021-09-25 16:37:27'),
(122, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:38:30', '2021-09-25 16:38:30'),
(123, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:38:30', '2021-09-25 16:38:30'),
(124, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:38:30', '2021-09-25 16:38:30'),
(125, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:38:30', '2021-09-25 16:38:30'),
(126, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 16:38:31', '2021-09-25 16:38:31'),
(127, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:08:01', '2021-09-25 17:08:01'),
(128, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:08:01', '2021-09-25 17:08:01'),
(129, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:08:02', '2021-09-25 17:08:02'),
(130, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:08:02', '2021-09-25 17:08:02'),
(131, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:08:02', '2021-09-25 17:08:02'),
(132, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:09:00', '2021-09-25 17:09:00'),
(133, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:09:01', '2021-09-25 17:09:01'),
(134, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:09:01', '2021-09-25 17:09:01'),
(135, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:09:01', '2021-09-25 17:09:01'),
(136, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:09:01', '2021-09-25 17:09:01'),
(137, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:10:30', '2021-09-25 17:10:30'),
(138, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:10:30', '2021-09-25 17:10:30'),
(139, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:10:30', '2021-09-25 17:10:30'),
(140, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:11:03', '2021-09-25 17:11:03'),
(141, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:11:03', '2021-09-25 17:11:03'),
(142, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:11:03', '2021-09-25 17:11:03'),
(143, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:12:30', '2021-09-25 17:12:30'),
(144, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:12:30', '2021-09-25 17:12:30'),
(145, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:12:30', '2021-09-25 17:12:30'),
(146, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:12:30', '2021-09-25 17:12:30'),
(147, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:12:31', '2021-09-25 17:12:31'),
(148, '2021-11-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:18:32', '2021-09-25 17:18:32'),
(149, '2021-12-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:18:32', '2021-09-25 17:18:32'),
(150, '2022-01-24', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:18:32', '2021-09-25 17:18:32'),
(151, '2021-11-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:10', '2021-09-25 17:20:10'),
(152, '2021-12-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:10', '2021-09-25 17:20:10'),
(153, '2022-01-24', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(154, '2022-03-06', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(155, '2022-04-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(156, '2022-05-26', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(157, '2022-07-05', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(158, '2022-08-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(159, '2022-09-24', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(160, '2022-11-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:11', '2021-09-25 17:20:11'),
(161, '2022-12-14', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:12', '2021-09-25 17:20:12'),
(162, '2021-10-27', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:22', '2021-09-25 17:20:22'),
(163, '2021-11-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:22', '2021-09-25 17:20:22'),
(164, '2021-12-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:22', '2021-09-25 17:20:22'),
(165, '2022-01-31', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:22', '2021-09-25 17:20:22'),
(166, '2022-03-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:22', '2021-09-25 17:20:22'),
(167, '2022-04-05', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:22', '2021-09-25 17:20:22'),
(168, '2022-06-08', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:20:23', '2021-09-25 17:20:23'),
(169, '2021-10-27', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:22', '2021-09-25 17:21:22'),
(170, '2021-11-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:22', '2021-09-25 17:21:22'),
(171, '2021-12-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:22', '2021-09-25 17:21:22'),
(172, '2022-01-31', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:22', '2021-09-25 17:21:22'),
(173, '2022-03-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:22', '2021-09-25 17:21:22'),
(174, '2022-04-05', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:22', '2021-09-25 17:21:22'),
(175, '2022-05-07', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(176, '2022-06-08', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(177, '2022-07-10', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(178, '2022-08-11', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(179, '2022-09-12', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(180, '2022-10-14', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(181, '2022-11-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:23', '2021-09-25 17:21:23'),
(182, '2021-10-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:30', '2021-09-25 17:21:30'),
(183, '2021-11-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:31', '2021-09-25 17:21:31'),
(184, '2022-01-02', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:31', '2021-09-25 17:21:31'),
(185, '2022-02-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:31', '2021-09-25 17:21:31'),
(186, '2022-03-09', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:31', '2021-09-25 17:21:31'),
(187, '2021-10-27', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:37', '2021-09-25 17:21:37'),
(188, '2021-11-28', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(189, '2021-12-30', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(190, '2022-01-31', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(191, '2022-03-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(192, '2022-04-05', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(193, '2022-05-07', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(194, '2022-06-08', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(195, '2022-07-10', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(196, '2022-08-11', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:38', '2021-09-25 17:21:38'),
(197, '2022-09-12', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:39', '2021-09-25 17:21:39'),
(198, '2022-10-14', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:39', '2021-09-25 17:21:39'),
(199, '2022-11-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:39', '2021-09-25 17:21:39'),
(200, '2021-11-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(201, '2021-12-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(202, '2022-01-24', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(203, '2022-03-06', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(204, '2022-04-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(205, '2022-05-26', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(206, '2022-07-05', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:43', '2021-09-25 17:21:43'),
(207, '2022-08-15', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:44', '2021-09-25 17:21:44'),
(208, '2022-09-24', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:44', '2021-09-25 17:21:44'),
(209, '2022-11-04', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:44', '2021-09-25 17:21:44'),
(210, '2022-12-14', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:44', '2021-09-25 17:21:44'),
(211, '2021-12-31', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:59', '2021-09-25 17:21:59'),
(212, '2022-04-08', '10:00:00', '11:00:00', -1, NULL, '2021-09-25 17:21:59', '2021-09-25 17:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` enum('Doctor','Patient') DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email_verified_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `status` enum('Active','Blocked','Wating for admin confirm') DEFAULT 'Wating for admin confirm',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `doctor_communications`
--
ALTER TABLE `doctor_communications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_profiles`
--
ALTER TABLE `doctor_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
