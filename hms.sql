-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 09:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bedtype`
--

CREATE TABLE `bedtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bed_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bedtype`
--

INSERT INTO `bedtype` (`id`, `bed_type`, `created_at`, `updated_at`) VALUES
(1, 'Full', '2022-11-07 03:44:03', '2022-11-07 03:44:03'),
(2, 'Double', '2022-11-07 03:44:10', '2022-11-07 03:44:10'),
(3, 'Four Poster', '2022-11-07 03:44:20', '2022-11-07 03:44:20'),
(4, 'Murphy', '2022-11-07 03:44:37', '2022-11-07 03:44:37'),
(5, 'Twin', '2022-11-07 03:44:45', '2022-11-07 03:44:45'),
(7, 'King', '2022-11-07 03:45:08', '2022-11-07 03:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `business_source`
--

CREATE TABLE `business_source` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_commission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_source`
--

INSERT INTO `business_source` (`id`, `source`, `apply_commission`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Front desk Staff', 'Yes', '2022-09-15 23:11:58', '2022-11-04 03:29:56', NULL),
(4, 'Manager Friend', 'No', '2022-09-15 23:12:14', '2022-11-04 03:29:06', NULL),
(5, 'Sagarmatha Hotels Travels and Tours', 'Yes', '2022-09-15 23:13:01', '2022-11-04 03:27:12', NULL),
(6, 'KC Travels Agency', 'No', '2022-09-17 17:33:21', '2022-11-04 03:27:33', NULL);

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
-- Table structure for table `found_item`
--

CREATE TABLE `found_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `found_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `found_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reported_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `found_item`
--

INSERT INTO `found_item` (`id`, `item_name`, `room_number`, `found_date`, `description`, `found_by`, `reported_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Laptop Charger', '101', '2022-11-09', '<p>found</p>', 'Shyam', 'Manager', '2022-11-10 05:42:03', '2022-11-10 05:42:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontservice`
--

CREATE TABLE `frontservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontservice`
--

INSERT INTO `frontservice` (`id`, `service`, `created_at`, `updated_at`) VALUES
(1, 'Reservation', '2022-11-08 00:30:22', '2022-11-08 00:30:22'),
(2, 'Reception', '2022-11-08 00:30:32', '2022-11-08 00:30:32'),
(3, 'Registration', '2022-11-08 00:30:41', '2022-11-08 00:30:41'),
(5, 'Night Auditor', '2022-11-08 00:31:06', '2022-11-08 00:31:32'),
(6, 'Telephone Operator', '2022-11-08 00:31:17', '2022-11-08 00:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `front_offices`
--

CREATE TABLE `front_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_offices`
--

INSERT INTO `front_offices` (`id`, `room_number`, `service`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '105', 'Night Auditor', '<p>night auditor</p>', '2022-11-10 05:43:37', '2022-11-10 05:43:37', NULL),
(2, '104', 'Reception', '<p>For the food order</p>', '2022-11-10 05:44:58', '2022-11-10 05:44:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lost_complain`
--

CREATE TABLE `lost_complain` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_received` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lost_complain`
--

INSERT INTO `lost_complain` (`id`, `item_name`, `room_number`, `date`, `description`, `complain_received`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Mobile', '106', '2022-11-06', '<p>lost mobile</p>', 'Hari', '2022-11-10 05:43:08', '2022-11-10 05:43:08', NULL);

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
(4, '2022_09_14_053702_create_rooms_table', 1),
(5, '2022_09_15_073819_create_front_offices_table', 1),
(6, '2022_09_15_094911_create_lost_complain_table', 1),
(7, '2022_09_16_053853_create_found_item_table', 1),
(8, '2022_09_16_071743_create_wakeupcall_table', 1),
(9, '2022_09_16_084651_create_business_source_table', 1),
(10, '2022_10_11_083521_create_reservation_table', 1),
(11, '2022_10_20_082545_create_permission_tables', 1),
(12, '2022_10_20_083035_create_users_table', 1),
(13, '2022_11_07_071854_create_roomtype_tables', 2),
(14, '2022_11_07_091046_create_bedtype_table', 3),
(15, '2022_11_07_100211_create_roomstatus_table', 4),
(16, '2022_11_08_055316_create_frontservice_table', 5),
(17, '2022_11_10_071842_create_rooms_table', 6),
(18, '2022_11_10_074417_create_reservation_table', 7),
(19, '2022_11_10_080610_create_reservation_table', 8),
(20, '2022_11_10_104043_create_rooms_table', 9),
(21, '2022_11_10_110410_create_reservation_table', 10);

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

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(2, 'user-create', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(3, 'user-edit', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(4, 'user-delete', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(5, 'role-list', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(6, 'role-create', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(7, 'role-edit', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(8, 'role-delete', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(9, 'permission-list', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(10, 'permission-create', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(11, 'permission-edit', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(12, 'permission-delete', 'web', '2022-10-20 04:52:35', '2022-10-20 04:52:35'),
(23, 'room1-list', 'web', '2022-10-21 02:00:54', '2022-10-21 02:00:54'),
(24, 'room1-create', 'web', '2022-10-21 02:01:44', '2022-10-21 02:01:44'),
(25, 'room1-edit', 'web', '2022-10-21 02:01:55', '2022-10-21 02:01:55'),
(26, 'room1-delete', 'web', '2022-10-21 02:02:06', '2022-10-21 02:02:06'),
(27, 'booking-list', 'web', '2022-10-21 02:20:07', '2022-10-21 02:20:07'),
(28, 'booking-create', 'web', '2022-10-21 02:20:16', '2022-10-21 02:20:16'),
(29, 'booking-show', 'web', '2022-10-21 02:20:25', '2022-10-21 02:20:25'),
(30, 'booking-edit', 'web', '2022-10-21 02:20:36', '2022-10-21 02:20:36'),
(31, 'booking-delete', 'web', '2022-10-21 02:20:46', '2022-10-21 02:20:46'),
(32, 'frontoffice-list', 'web', '2022-10-21 02:41:29', '2022-10-21 02:41:29'),
(33, 'frontoffice-create', 'web', '2022-10-21 02:41:38', '2022-10-21 02:41:38'),
(34, 'frontoffice-edit', 'web', '2022-10-21 02:41:48', '2022-10-21 02:41:48'),
(35, 'frontoffice-massDestroy', 'web', '2022-10-21 02:42:14', '2022-10-21 02:42:14'),
(36, 'frontoffice-delete', 'web', '2022-10-21 02:42:26', '2022-10-21 02:42:26'),
(37, 'lostcomplain-list', 'web', '2022-10-21 03:12:56', '2022-10-21 03:12:56'),
(38, 'lostcomplain-create', 'web', '2022-10-21 03:13:05', '2022-10-21 03:13:05'),
(39, 'lostcomplain-edit', 'web', '2022-10-21 03:13:30', '2022-10-21 03:13:30'),
(40, 'lostcomplain-massDestroy', 'web', '2022-10-21 03:13:56', '2022-10-21 03:13:56'),
(41, 'lostcomplain-delete', 'web', '2022-10-21 03:14:14', '2022-10-21 03:14:14'),
(42, 'founditems-list', 'web', '2022-10-21 03:21:04', '2022-10-21 03:21:04'),
(43, 'founditems-create', 'web', '2022-10-21 03:21:14', '2022-10-21 03:21:14'),
(44, 'founditems-edit', 'web', '2022-10-21 03:21:25', '2022-10-21 03:21:25'),
(45, 'founditems-delete', 'web', '2022-10-21 03:21:35', '2022-10-21 03:21:35'),
(46, 'founditems-massDestroy', 'web', '2022-10-21 03:21:46', '2022-10-21 03:21:46'),
(47, 'wakeupcall-list', 'web', '2022-10-21 03:25:55', '2022-10-21 03:25:55'),
(48, 'wakeupcall-create', 'web', '2022-10-21 03:26:04', '2022-10-21 03:26:04'),
(49, 'wakeupcall-edit', 'web', '2022-10-21 03:42:07', '2022-10-21 03:42:07'),
(50, 'wakeupcall-delete', 'web', '2022-10-21 03:42:28', '2022-10-21 03:42:28'),
(51, 'wakeupcall-massDestroy', 'web', '2022-10-21 03:42:46', '2022-10-21 03:42:46'),
(52, 'business_source-list', 'web', '2022-10-21 03:52:14', '2022-10-21 03:52:14'),
(53, 'business_source-create', 'web', '2022-10-21 03:52:25', '2022-10-21 03:52:25'),
(54, 'business_source-edit', 'web', '2022-10-21 03:52:38', '2022-10-21 03:52:38'),
(55, 'business_source-delete', 'web', '2022-10-21 03:52:50', '2022-10-21 03:52:50'),
(56, 'business_source-massDestroy', 'web', '2022-10-21 03:53:17', '2022-10-21 03:53:17');

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
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_request_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_plan_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_type`, `room_id`, `room_type`, `room_number`, `first_name`, `middle_name`, `last_name`, `address`, `contact`, `email`, `passport_no`, `country`, `request_type`, `special_request_rate`, `room_plan`, `room_plan_rate`, `payment_mode`, `total_rate`, `arrival_date`, `arrival_time`, `departure_date`, `departure_time`, `created_at`, `updated_at`) VALUES
(2, 'Guaranted', 5, 'Double', '101', 'Hari', NULL, 'Khadka', 'Sinamagal', '9813456123', 'aadarsha888@gmail.com', NULL, 'Nepal', 'Travel Agencies', '1200', 'Continental Plan', '1200', 'Debit Card', '18400', '11/11/2022', '16:59', '11/14/2022', '16:59', '2022-11-10 05:30:15', '2022-11-10 05:30:15'),
(3, 'Guaranted', 6, 'Triple', '104', 'Shyam', NULL, 'Poudel', 'Sarlahi', '9812345678', 'shyam123@gmail.com', NULL, 'Nepal', 'Direct Guest', '13000', 'Modified American Plan', '15000', 'Cash in hand', '73000', '11/14/2022', '17:00', '11/16/2022', '17:00', '2022-11-10 05:31:10', '2022-11-10 05:31:10');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-10-20 04:54:14', '2022-10-20 04:54:14'),
(2, 'user', 'web', '2022-10-20 04:56:03', '2022-10-21 01:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(32, 2),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(42, 2),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(47, 2),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(52, 2),
(53, 1),
(54, 1),
(55, 1),
(56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_type`, `bed_type`, `room_rate`, `room_status`, `created_at`, `updated_at`) VALUES
(1, '100', 'Single', 'Full', '12000', 'Vacant Clean', '2022-11-10 04:58:02', '2022-11-10 04:58:02'),
(3, '102', 'Single', 'Four Poster', '28900', 'Vacant Clean', '2022-11-10 05:10:54', '2022-11-10 05:10:54'),
(4, '103', 'Quad', 'Four Poster', '23000', 'Vacant Clean', '2022-11-10 05:11:13', '2022-11-10 05:11:13'),
(5, '101', 'Double', 'Double', '16000', 'Vacant Clean', '2022-11-10 05:26:50', '2022-11-10 05:26:50'),
(6, '104', 'Triple', 'Four Poster', '15000', 'Vacant Clean', '2022-11-10 05:27:38', '2022-11-10 05:27:38'),
(7, '105', 'Twin', 'Murphy', '25000', 'Vacant Clean', '2022-11-10 05:28:12', '2022-11-10 05:28:12'),
(8, '106', 'Cabana', 'King', '25000', 'Occupied', '2022-11-10 05:28:38', '2022-11-10 05:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`id`, `room_status`, `created_at`, `updated_at`) VALUES
(1, 'Occupied', '2022-11-07 04:27:26', '2022-11-07 04:37:39'),
(2, 'Vacant Dirty', '2022-11-07 04:28:24', '2022-11-07 04:28:24'),
(3, 'Vacant Clean', '2022-11-07 04:28:38', '2022-11-07 04:28:38'),
(4, 'Reserved', '2022-11-07 04:28:46', '2022-11-07 04:28:46'),
(5, 'Out of Order', '2022-11-07 04:28:56', '2022-11-07 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `room_type`, `created_at`, `updated_at`) VALUES
(1, 'Single', '2022-11-07 02:39:58', '2022-11-07 02:39:58'),
(2, 'Double', '2022-11-07 02:40:09', '2022-11-07 02:40:09'),
(3, 'Triple', '2022-11-07 02:40:22', '2022-11-07 02:40:22'),
(4, 'Quad', '2022-11-07 02:41:07', '2022-11-07 02:41:07'),
(5, 'Twin', '2022-11-07 02:41:14', '2022-11-07 02:41:14'),
(6, 'Cabana', '2022-11-07 02:41:23', '2022-11-07 02:41:23'),
(7, 'Suite', '2022-11-07 02:41:29', '2022-11-09 06:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$90KxqssNs3uZzO7F4ax4Q.scZfrE6MCnc2C8Ka2yN2Pz4d2sWSV8q', NULL, '2022-10-20 04:54:15', '2022-10-20 04:54:15'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$GJmznz0dmbpycWkfpyhNP.qbsOeZQ8C/0Ys52WYRE4IYy.Lc7/eiS', NULL, '2022-10-20 04:56:25', '2022-10-20 04:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `wakeupcall`
--

CREATE TABLE `wakeupcall` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wakeupcall`
--

INSERT INTO `wakeupcall` (`id`, `room_number`, `date`, `time`, `remark`, `guest`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '4', '2022-09-15', '06:44', 'I want to have freeze in my room', 'Shyam', '2022-09-15 20:26:17', '2022-10-17 17:11:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bedtype`
--
ALTER TABLE `bedtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_source`
--
ALTER TABLE `business_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `found_item`
--
ALTER TABLE `found_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontservice`
--
ALTER TABLE `frontservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_offices`
--
ALTER TABLE `front_offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_offices_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `lost_complain`
--
ALTER TABLE `lost_complain`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_room_id_foreign` (`room_id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wakeupcall`
--
ALTER TABLE `wakeupcall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bedtype`
--
ALTER TABLE `bedtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_source`
--
ALTER TABLE `business_source`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `found_item`
--
ALTER TABLE `found_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frontservice`
--
ALTER TABLE `frontservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `front_offices`
--
ALTER TABLE `front_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lost_complain`
--
ALTER TABLE `lost_complain`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wakeupcall`
--
ALTER TABLE `wakeupcall`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

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
