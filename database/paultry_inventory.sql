-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 04:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paultry_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus_types`
--

CREATE TABLE `bonus_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_types`
--

INSERT INTO `bonus_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Festival Bonus', 'Eid or yearly festival bonus with a percentage of salary.', '2022-12-06 12:39:43', '2022-12-06 12:39:43'),
(2, 'sales bonus', 'this is sales bonus', '2023-02-13 12:05:20', '2023-02-13 12:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `chickens`
--

CREATE TABLE `chickens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `house_id` bigint(20) UNSIGNED NOT NULL,
  `flock_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `first_doc` int(11) DEFAULT NULL,
  `sum_of_doc` int(11) DEFAULT NULL,
  `hatchery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bird_in_case` int(11) DEFAULT NULL,
  `vaccine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `density` double(8,2) DEFAULT NULL,
  `catching_start` date DEFAULT NULL,
  `catching_end` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chickens`
--

INSERT INTO `chickens` (`id`, `farm_id`, `house_id`, `flock_id`, `date`, `first_doc`, `sum_of_doc`, `hatchery`, `bird_in_case`, `vaccine`, `density`, `catching_start`, `catching_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 2, '2022-12-13', 12000, 12000, 'Oasis Hatchery', 1200, 'on,on', 120.00, '2022-12-30', '2023-01-07', 1, '2022-12-13 02:03:53', '2022-12-13 02:03:53'),
(2, 1, 2, 2, '2022-12-01', 12000, 11383, 'Hamid Hatchery', 100, 'ND + IB(Live),Transmune IBD,Vectormune ND', 130.00, '2023-01-01', '2023-01-06', 1, '2022-12-13 02:13:36', '2023-03-03 09:59:11'),
(3, 4, 11, 2, '2022-12-15', 1200, 1200, 'Hamid Hatchery', 120, 'ND + IB(Live),NDS Yellow,Transmune IBD,Vectormune ND', 120.00, '2023-01-15', '2022-12-20', 1, '2022-12-15 11:47:58', '2022-12-15 11:47:58'),
(5, 1, 1, 2, '2023-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-30 13:26:44', '2023-01-30 13:26:44'),
(6, 1, 3, 2, '2023-03-08', 1000, 1000, 'Hamid', 10, 'ND + IB(Live)', 100.00, '2023-04-08', '2023-04-20', 1, '2023-03-08 06:57:54', '2023-03-08 06:58:07'),
(7, 1, 4, 2, '2023-03-08', 1000, 1000, 'hamid', 100, 'ND + IB(Live)', 10.00, '2023-04-08', '2023-04-20', 1, '2023-03-08 07:17:52', '2023-03-08 07:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `daily_chickens`
--

CREATE TABLE `daily_chickens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chicken_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `feed_consumption` double(8,2) DEFAULT NULL,
  `cfc` double DEFAULT NULL,
  `avg_feed_consumption` double(8,3) DEFAULT 0.000,
  `fcr` double(8,3) DEFAULT NULL,
  `fc` double DEFAULT NULL,
  `weight1` double(8,2) DEFAULT NULL,
  `weight2` double(8,2) DEFAULT NULL,
  `weight3` double(8,2) DEFAULT NULL,
  `weight4` double(8,2) DEFAULT NULL,
  `weight_avg` double(8,3) DEFAULT 0.000,
  `weight_gain` double(8,3) DEFAULT 0.000,
  `mortality` int(11) DEFAULT NULL,
  `rejection` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_chickens`
--

INSERT INTO `daily_chickens` (`id`, `chicken_id`, `date`, `feed_consumption`, `cfc`, `avg_feed_consumption`, `fcr`, `fc`, `weight1`, `weight2`, `weight3`, `weight4`, `weight_avg`, `weight_gain`, `mortality`, `rejection`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-12-02', 190.00, NULL, 0.013, -0.030, NULL, 12.00, 10.00, 10.00, 16.00, 1.000, 0.300, 55, 21, 1, NULL, '2023-01-07 10:00:47'),
(2, 1, '2022-12-16', 200.00, NULL, 0.000, 0.310, NULL, 8.00, 7.00, 5.00, 4.00, 0.500, 0.170, 3, 5, 1, NULL, NULL),
(3, 2, '2022-12-03', 140.00, NULL, 0.017, -0.080, NULL, 18.00, 18.00, 18.00, 18.00, 1.500, 0.270, 11, 9, 1, NULL, '2023-01-07 10:02:18'),
(4, 2, '2022-12-04', 210.00, NULL, 0.021, 0.500, NULL, 20.00, 20.00, 18.00, 22.00, 1.660, 0.510, 2, 4, 1, NULL, NULL),
(5, 2, '2022-12-05', 20.00, NULL, 0.035, -0.003, NULL, 12.00, 11.00, 10.00, 15.00, 1.000, 1.200, 20, 500, 1, '2022-12-19 08:34:43', '2023-02-25 08:33:44'),
(6, 1, '2022-12-20', 50.00, NULL, 0.000, -0.010, NULL, 2.00, 2.00, 2.00, 2.00, 0.170, 0.000, 2, 2, 1, '2022-12-19 08:39:20', '2022-12-19 08:39:20'),
(7, 3, '2023-01-08', 13.00, NULL, 0.000, 0.010, NULL, 12.00, 12.00, 12.00, 12.00, 1.000, 0.000, 200, 400, 1, '2023-01-07 13:09:03', '2023-01-07 13:09:03'),
(8, 1, '2023-03-08', 2.00, NULL, 0.000, 0.000, NULL, 14.00, 10.00, 10.00, 10.00, 0.917, 0.000, 20, 10, 1, '2023-03-07 22:58:56', '2023-03-07 22:58:56'),
(9, 6, '2023-03-08', 0.00, NULL, 0.000, 0.000, 0, 0.50, 0.50, 0.51, 0.51, 0.042, 0.000, 2, 3, 1, '2023-03-08 07:00:48', '2023-03-08 07:00:48'),
(14, 7, '2023-03-08', 0.00, 0, 0.000, 0.000, 0, 0.50, 0.50, 0.50, 0.50, 0.042, 0.000, 6, 5, 1, '2023-03-08 07:29:01', '2023-03-15 04:30:28'),
(16, 7, '2023-03-09', 13.74, 0, 0.000, 0.000, 0, 0.67, 0.67, 0.67, 0.67, 0.056, 0.000, 5, 5, 1, '2023-03-08 07:30:57', '2023-03-15 04:31:06'),
(17, 7, '2023-03-10', 16.98, 0.017151515151515, 0.017, 0.239, 1.0947775628627, 0.86, 0.86, 0.86, 0.86, 0.072, 0.016, 5, 5, 1, '2023-03-08 07:32:23', '2023-03-15 04:32:18'),
(22, 7, '2023-03-11', 19.32, 0.048223648222176, 0.020, 0.542, 1.1716191631292, 1.07, 1.07, 1.07, 1.07, 0.089, 0.017, 5, 5, 1, '2023-03-08 07:44:19', '2023-03-08 07:44:19'),
(23, 7, '2023-03-12', 21.62, 0.07006203206056, 0.022, 0.642, 1.0828950663661, 1.31, 1.31, 1.31, 1.31, 0.109, 0.020, 5, 5, 1, '2023-03-08 08:07:44', '2023-03-15 04:17:07'),
(24, 3, '2023-03-11', 4.20, 0.007, 0.007, 0.045, -0.0082758620689655, 1.00, 2.00, 2.00, 2.40, 0.154, -0.846, 5, 5, 1, '2023-03-10 15:22:44', '2023-03-10 15:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `responsibility`, `created_at`, `updated_at`) VALUES
(1, 'Farm Manager', 'Manage Farm', NULL, NULL),
(2, 'Swiper', 'Clean the farm outside area for dead leafs', '2023-01-29 09:35:51', '2023-01-29 09:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `salary` double(8,2) DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `farm_id`, `name`, `phone`, `address`, `designation_id`, `salary`, `nid`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Arif Bipu', '01231231231', 'Khilkhet, Dhaka', 1, 15000.00, '3315123475', NULL, 1, '2022-12-07 04:25:41', '2022-12-07 04:25:41'),
(2, 4, 'Rifat', NULL, '433/1, Bornomala Road, North Ibrahimpur, Kafrul, Dhaka 1206', 1, 60000.00, '3315123475', '2img(1).png', 1, '2022-12-11 00:03:14', '2022-12-11 00:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `house_id` bigint(20) UNSIGNED NOT NULL,
  `flock_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `expense_type_id` bigint(20) UNSIGNED NOT NULL,
  `expense_sector_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `paid_from` int(11) DEFAULT NULL,
  `approver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `farm_id`, `house_id`, `flock_id`, `date`, `expense_type_id`, `expense_sector_id`, `amount`, `paid_from`, `approver`, `reference`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2022-12-18', 1, 1, 200.00, 1, 'Head Office', 'Testing expense', '2022-12-18 00:00:32', '2023-03-03 07:14:09'),
(2, 1, 2, 2, '2022-12-20', 1, 1, 800.00, 1, 'Head Office', 'Testing expense', '2022-12-18 01:13:10', '2022-12-18 01:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `expense_sectors`
--

CREATE TABLE `expense_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_sectors`
--

INSERT INTO `expense_sectors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Utility Bill', '2022-12-06 12:42:54', '2022-12-06 12:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Direct Expense', '2022-12-06 12:45:35', '2022-12-06 12:45:35'),
(2, 'bipu rahat expense', '2023-02-13 12:05:58', '2023-02-13 12:05:58');

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
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Batajore', 'Gazipur', '01139918449', '2022-12-04 00:46:13', '2023-01-05 03:59:14'),
(2, 'Narangi 1', '433/1, Bornomala Road, North Ibrahimpur, Kafrul, Dhaka 1206\r\nunit-5B', '01686520282', '2022-12-04 00:48:02', '2022-12-04 00:48:02'),
(3, 'Sagordighi', 'Tangail', '001122', '2022-12-04 00:48:25', '2023-01-05 03:59:26'),
(4, 'Farm 4', '12 residential college, Universiti Malaya', '01139918449', '2022-12-12 23:34:29', '2022-12-12 23:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `farm_medicines`
--

CREATE TABLE `farm_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farm_medicines`
--

INSERT INTO `farm_medicines` (`id`, `medicine_id`, `farm_id`, `date`, `amount`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-22', 2.00, 200.00, '2022-12-20 02:07:49', '2022-12-20 02:07:49'),
(2, 1, 1, '2022-12-21', 6.00, 300.00, '2022-12-20 02:08:11', '2023-03-05 11:50:48'),
(3, 2, 1, '2022-12-20', 11.00, 1200.00, '2022-12-20 02:08:52', '2022-12-20 02:08:52'),
(4, 1, 1, '2022-12-21', 1.00, 0.00, '2022-12-20 02:48:08', '2022-12-20 02:48:08'),
(5, 1, 1, '2022-12-15', -2.00, 0.00, '2022-12-20 02:48:43', '2022-12-20 02:48:43'),
(6, 2, 1, '2023-01-26', -2.00, 21.00, '2023-01-22 13:18:55', '2023-01-22 13:18:55'),
(7, 3, 4, '2023-03-11', 2.00, 5000.00, '2023-03-10 15:32:35', '2023-03-10 15:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `farm_id`, `date`, `amount`, `brand`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-18', 175.00, 'Model Brand', 5000.00, '2022-12-17 12:19:44', '2023-03-03 10:44:57'),
(2, 1, '2022-12-21', 110.00, 'Model Brand', 1200.00, '2022-12-17 12:20:00', '2022-12-17 12:20:00'),
(3, 2, '2022-12-19', 200.00, 'Model Brand', 200.00, '2022-12-17 12:20:20', '2022-12-17 12:20:20'),
(4, 3, '2022-12-23', 12350.00, 'Model Brand', 500.00, '2022-12-17 12:20:35', '2022-12-17 12:20:35'),
(5, 2, '2022-12-28', 30.00, NULL, NULL, '2022-12-17 12:23:17', '2022-12-17 12:23:17'),
(6, 1, '2022-12-21', 5.00, NULL, 500.00, '2022-12-20 09:17:58', '2022-12-20 09:17:58'),
(7, 4, '2023-02-25', 10.00, 'demo', 50.00, '2023-02-24 12:06:30', '2023-02-24 12:06:30'),
(8, 4, '2023-02-26', 30.00, NULL, 0.00, '2023-02-24 12:07:08', '2023-03-03 10:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `flocks`
--

CREATE TABLE `flocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `farm_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flocks`
--

INSERT INTO `flocks` (`id`, `name`, `farm_id`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flock 38', 1, '2022-12-12', '2023-01-15', 0, '2022-12-12 01:46:51', '2023-01-31 02:19:03'),
(2, 'Flock 39', 1, '2022-12-15', '2023-01-20', 1, '2022-12-12 01:51:42', '2023-01-31 02:19:03'),
(4, 'Flock 1 naringi', 2, '2023-01-26', '2023-01-28', 1, '2023-01-31 02:19:03', '2023-02-25 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `farm_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'House 1', 1, 1, '2022-12-04 01:21:50', '2022-12-04 01:21:50'),
(2, 'House 2', 1, 1, '2022-12-12 23:34:42', '2022-12-12 23:34:42'),
(3, 'House 3', 1, 1, '2022-12-12 23:34:50', '2022-12-12 23:34:50'),
(4, 'House 4', 1, 1, '2022-12-12 23:34:56', '2022-12-12 23:34:56'),
(5, 'House 5', 1, 1, '2022-12-12 23:35:04', '2022-12-12 23:35:04'),
(6, 'House 6', 1, 1, '2022-12-12 23:35:13', '2022-12-12 23:35:13'),
(7, 'House 1', 2, 1, '2022-12-12 23:35:18', '2022-12-12 23:35:18'),
(8, 'House 2', 2, 1, '2022-12-12 23:35:24', '2022-12-12 23:35:24'),
(9, 'House 3', 2, 1, '2022-12-12 23:59:41', '2022-12-12 23:59:41'),
(10, 'House 4', 2, 1, '2022-12-12 23:59:48', '2022-12-12 23:59:48'),
(11, 'House 5', 2, 1, '2022-12-15 11:47:16', '2022-12-15 11:47:16'),
(12, 'House 6', 2, 1, '2023-01-17 01:27:31', '2023-01-17 01:27:31'),
(13, 'House 1', 3, 1, '2023-01-17 01:27:39', '2023-01-17 01:27:39'),
(14, 'House 2', 3, 1, '2023-01-17 01:30:18', '2023-01-17 01:30:18'),
(15, 'House 3', 3, 1, '2023-01-17 01:30:26', '2023-01-17 01:30:26'),
(16, 'House 4', 3, 1, '2023-01-17 01:30:32', '2023-01-17 01:30:32'),
(17, 'House 5', 3, 1, '2023-01-17 01:30:40', '2023-01-17 01:30:40'),
(18, 'House 6', 3, 1, '2023-01-17 01:30:47', '2023-01-17 01:30:47'),
(19, 'House 1', 4, 1, '2023-01-17 01:30:57', '2023-01-17 01:30:57'),
(20, 'House 2', 4, 1, '2023-01-17 01:31:10', '2023-01-17 01:31:10'),
(21, 'House 3', 4, 1, '2023-01-17 01:31:17', '2023-01-17 01:31:17'),
(22, 'House 4', 4, 1, '2023-01-17 01:31:25', '2023-01-17 01:31:25'),
(23, 'House 5', 4, 1, '2023-01-17 01:31:30', '2023-01-17 01:31:30'),
(24, 'House 6', 4, 1, '2023-01-17 01:31:37', '2023-01-17 01:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `duration` double(8,1) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `from`, `to`, `duration`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-11', '2022-12-13', 3.0, 'testing leave request', '2022-12-11 00:24:31', '2022-12-11 00:24:31'),
(2, 1, '2023-01-07', '2023-01-08', 2.0, 'aafsdf', '2023-01-06 14:46:39', '2023-01-06 14:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `usages`, `created_at`, `updated_at`) VALUES
(1, 'V12 RT', 'for cold and breezy weather', '2022-12-20 00:39:54', '2022-12-20 00:39:54'),
(2, 'WGS 30 ML', 'Food consumption', '2022-12-20 02:08:31', '2022-12-20 02:08:31'),
(3, 'New Medicine', 'Testing', '2023-03-10 15:32:16', '2023-03-10 15:32:16');

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
(5, '2022_12_04_063716_create_farms_table', 2),
(6, '2022_12_04_071219_create_houses_table', 3),
(7, '2022_12_06_182702_create_expense_types_table', 4),
(8, '2022_12_06_182823_create_expense_sectors_table', 4),
(9, '2022_12_06_182913_create_bonus_types_table', 4),
(10, '2022_12_07_101059_create_designations_table', 5),
(11, '2022_12_07_101060_create_employees_table', 5),
(12, '2022_12_11_061710_create_leaves_table', 6),
(13, '2022_12_12_073508_create_flocks_table', 7),
(14, '2022_12_12_101419_create_chickens_table', 8),
(15, '2022_12_13_091105_create_daily_chickens_table', 9),
(16, '2022_12_17_175914_create_feeds_table', 10),
(17, '2022_12_17_193125_create_expenses_table', 11),
(18, '2022_12_18_064647_create_pettycashes_table', 12),
(19, '2022_12_18_070043_create_total_cashes_table', 13),
(20, '2022_12_18_081727_create_total_feeds_table', 14),
(22, '2022_12_20_062851_create_medicines_table', 15),
(23, '2022_12_20_075309_create_farm_medicines_table', 16),
(25, '2022_12_20_190937_create_sales_table', 17),
(27, '2023_01_17_191624_create_standards_table', 18);

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
-- Table structure for table `pettycashes`
--

CREATE TABLE `pettycashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pettycashes`
--

INSERT INTO `pettycashes` (`id`, `date`, `farm_id`, `amount`, `created_at`, `updated_at`) VALUES
(7, '2022-12-18', 1, 1000.00, '2022-12-18 01:10:11', '2022-12-18 01:10:11'),
(8, '2022-12-19', 1, 3500.00, '2022-12-18 01:10:22', '2023-03-07 12:13:39'),
(9, '2022-12-18', 4, 10000.00, '2022-12-18 01:11:25', '2022-12-18 01:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flock_id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `house_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `total_birds` int(11) DEFAULT NULL,
  `total_weight` double(8,2) DEFAULT NULL,
  `avg_weight` double(8,2) DEFAULT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `avg_price` double(8,2) DEFAULT NULL,
  `per_kg_price` double(8,2) DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catching_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `flock_id`, `farm_id`, `house_id`, `date`, `total_birds`, `total_weight`, `avg_weight`, `total_price`, `avg_price`, `per_kg_price`, `customer`, `car_no`, `catching_slip`, `payment_method`, `branch`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '2022-12-22', 167, 190.00, 1.14, 17000.00, 101.80, 89.47, 'Rifat', 'enst1221', 'ayt1313nff', 'Cash', 'cash', 1, '2022-12-20 13:46:26', '2022-12-20 13:46:26'),
(2, 2, 1, 2, '2022-12-22', 350, 700.00, 2.00, 75000.00, 214.29, 107.14, 'Rifat', 'enst1221', 'ayt1313nff', 'Cash', 'cash', 1, '2022-12-20 23:46:53', '2022-12-20 23:46:53'),
(4, 2, 1, 2, '2023-01-22', 100, 112.00, 1.12, 11200.00, 112.00, 100.00, 'Rifat', '13awdad', 'adasad', 'Cach', '-', 1, '2023-01-22 01:57:36', '2023-01-22 01:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `weight` double(8,3) DEFAULT NULL,
  `daily_gain` double(8,3) DEFAULT NULL,
  `fcr` double(8,3) DEFAULT NULL,
  `dfc` double(8,3) DEFAULT NULL,
  `cfc` double(8,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `age`, `weight`, `daily_gain`, `fcr`, `dfc`, `cfc`, `created_at`, `updated_at`) VALUES
(1, 0, 42.000, 0.000, 0.000, 0.000, 0.000, NULL, NULL),
(2, 1, 56.000, 14.000, 0.232, 13.000, 13.000, NULL, NULL),
(3, 2, 72.000, 16.000, 0.417, 17.000, 30.000, NULL, NULL),
(4, 3, 89.000, 17.000, 0.573, 21.000, 51.000, NULL, NULL),
(5, 4, 109.000, 20.000, 0.679, 23.000, 74.000, NULL, NULL),
(6, 5, 131.000, 22.000, 0.773, 27.000, 101.000, NULL, NULL),
(7, 6, 157.000, 26.000, 0.841, 31.000, 132.000, NULL, NULL),
(8, 7, 185.000, 28.000, 0.902, 35.000, 167.000, NULL, NULL),
(9, 8, 215.000, 30.000, 0.958, 39.000, 206.000, NULL, NULL),
(10, 9, 247.000, 32.000, 1.012, 44.000, 250.000, NULL, NULL),
(11, 10, 283.000, 36.000, 1.053, 48.000, 258.000, NULL, NULL),
(12, 11, 321.000, 38.000, 1.097, 54.000, 352.000, NULL, NULL),
(13, 12, 364.000, 43.000, 1.126, 58.000, 410.000, NULL, NULL),
(14, 13, 412.000, 48.000, 1.150, 64.000, 474.000, NULL, NULL),
(15, 14, 465.000, 53.000, 1.165, 68.000, 542.000, NULL, NULL),
(16, 15, 524.000, 59.000, 1.177, 75.000, 617.000, NULL, NULL),
(17, 16, 586.000, 62.000, 1.191, 81.000, 698.000, NULL, NULL),
(18, 17, 651.000, 65.000, 1.206, 87.000, 785.000, NULL, NULL),
(19, 18, 719.000, 68.000, 1.221, 93.000, 878.000, NULL, NULL),
(20, 19, 790.000, 71.000, 1.235, 98.000, 976.000, NULL, NULL),
(21, 20, 865.000, 75.000, 1.250, 105.000, 1081.000, NULL, NULL),
(22, 21, 943.000, 78.000, 1.264, 111.000, 1192.000, NULL, NULL),
(23, 22, 1020.000, 80.000, 1.284, 117.000, 1309.000, NULL, NULL),
(24, 23, 1099.000, 81.000, 1.303, 123.000, 1432.000, NULL, NULL),
(25, 24, 1182.000, 82.000, 1.321, 130.000, 1562.000, NULL, NULL),
(26, 25, 1269.000, 83.000, 1.337, 134.000, 1696.000, NULL, NULL),
(27, 26, 1354.000, 84.000, 1.356, 141.000, 1837.000, NULL, NULL),
(28, 27, 1446.000, 85.000, 1.373, 148.000, 1985.000, NULL, NULL),
(29, 28, 1524.000, 86.000, 1.402, 152.000, 2137.000, NULL, NULL),
(30, 29, 1613.000, 89.000, 1.423, 158.000, 2295.000, NULL, NULL),
(31, 30, 1705.000, 92.000, 1.442, 163.000, 2498.000, NULL, NULL),
(32, 31, 1799.000, 94.000, 1.460, 169.000, 2627.000, NULL, NULL),
(33, 32, 1895.000, 96.000, 1.478, 174.000, 2801.000, NULL, NULL),
(34, 33, 1993.000, 98.000, 1.496, 180.000, 2981.000, NULL, NULL),
(35, 34, 2092.000, 99.000, 1.512, 182.000, 3163.000, NULL, NULL),
(36, 35, 2191.000, 99.000, 1.530, 189.000, 3352.000, NULL, NULL),
(37, 36, 2289.000, 98.000, 1.549, 193.000, 3545.000, NULL, NULL),
(38, 37, 2386.000, 97.000, 1.568, 197.000, 3742.000, NULL, NULL),
(39, 38, 2482.000, 96.000, 1.589, 201.000, 3943.000, NULL, NULL),
(40, 39, 2577.000, 95.000, 1.610, 205.000, 4148.000, NULL, NULL),
(41, 40, 2671.000, 94.000, 1.631, 209.000, 4357.000, NULL, NULL),
(42, 41, 2764.000, 93.000, 1.653, 213.000, 4570.000, NULL, NULL),
(43, 42, 2857.000, 93.000, 1.675, 216.000, 4786.000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `total_cashes`
--

CREATE TABLE `total_cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_cashes`
--

INSERT INTO `total_cashes` (`id`, `farm_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 3620.00, NULL, '2023-03-07 12:13:39'),
(2, 2, 0.00, NULL, NULL),
(3, 3, 0.00, NULL, NULL),
(4, 4, 10000.00, NULL, '2022-12-18 01:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `total_feeds`
--

CREATE TABLE `total_feeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_feeds`
--

INSERT INTO `total_feeds` (`id`, `farm_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 206.67, NULL, '2023-03-15 04:32:18'),
(2, 2, 118.00, NULL, '2023-03-07 22:58:56'),
(3, 3, 110.00, NULL, NULL),
(4, 4, 105.80, NULL, '2023-03-10 15:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `farm_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `farm_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'evocation', 'evocationit@gmail.com', '01686520282', 1, 0, NULL, '$2y$10$o3lXnsxrd1vQ0sIGr./FVeN6x5VEAjwfHus8gRK9w8noBoZ0OOocu', '44pbwi1jYLd0RRStYITxDgfAnQ7Wc8ACu6E97PkI1OT6kC0sXBF6wQprwcWD', '2022-12-03 09:29:15', '2023-01-28 13:26:56'),
(4, 'sumaya', 'sumaya@gmail.com', '01711157899', 2, 4, NULL, '$2y$10$6VtbV.Ziej47MPFeLRkqTO2tSdnW0VGRKuRw/UBH1kWYXQM0qRpHe', 'EgPtm31jv9utjeGTZVVvCt8CMjME01lEsUJZvSaK7p3Sag497TEcMQAR5JOz', '2022-12-30 08:34:41', '2023-03-10 11:23:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonus_types`
--
ALTER TABLE `bonus_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chickens`
--
ALTER TABLE `chickens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chickens_farm_id_foreign` (`farm_id`),
  ADD KEY `chickens_house_id_foreign` (`house_id`),
  ADD KEY `chickens_flock_id_foreign` (`flock_id`);

--
-- Indexes for table `daily_chickens`
--
ALTER TABLE `daily_chickens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_chickens_chicken_id_foreign` (`chicken_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`),
  ADD KEY `employees_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_farm_id_foreign` (`farm_id`),
  ADD KEY `expenses_house_id_foreign` (`house_id`),
  ADD KEY `expenses_flock_id_foreign` (`flock_id`),
  ADD KEY `expenses_expense_type_id_foreign` (`expense_type_id`),
  ADD KEY `expenses_expense_sector_id_foreign` (`expense_sector_id`);

--
-- Indexes for table `expense_sectors`
--
ALTER TABLE `expense_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_medicines`
--
ALTER TABLE `farm_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_medicines_medicine_id_foreign` (`medicine_id`),
  ADD KEY `farm_medicines_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feeds_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `flocks`
--
ALTER TABLE `flocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmId` (`farm_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pettycashes`
--
ALTER TABLE `pettycashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pettycashes_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_farm_id_foreign` (`farm_id`),
  ADD KEY `sales_house_id_foreign` (`house_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_cashes`
--
ALTER TABLE `total_cashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_cashes_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `total_feeds`
--
ALTER TABLE `total_feeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_feeds_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus_types`
--
ALTER TABLE `bonus_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chickens`
--
ALTER TABLE `chickens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daily_chickens`
--
ALTER TABLE `daily_chickens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_sectors`
--
ALTER TABLE `expense_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farm_medicines`
--
ALTER TABLE `farm_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flocks`
--
ALTER TABLE `flocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pettycashes`
--
ALTER TABLE `pettycashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `total_cashes`
--
ALTER TABLE `total_cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `total_feeds`
--
ALTER TABLE `total_feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chickens`
--
ALTER TABLE `chickens`
  ADD CONSTRAINT `chickens_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`),
  ADD CONSTRAINT `chickens_flock_id_foreign` FOREIGN KEY (`flock_id`) REFERENCES `flocks` (`id`),
  ADD CONSTRAINT `chickens_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `daily_chickens`
--
ALTER TABLE `daily_chickens`
  ADD CONSTRAINT `daily_chickens_chicken_id_foreign` FOREIGN KEY (`chicken_id`) REFERENCES `chickens` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`),
  ADD CONSTRAINT `employees_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_sector_id_foreign` FOREIGN KEY (`expense_sector_id`) REFERENCES `expense_sectors` (`id`),
  ADD CONSTRAINT `expenses_expense_type_id_foreign` FOREIGN KEY (`expense_type_id`) REFERENCES `expense_types` (`id`),
  ADD CONSTRAINT `expenses_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`),
  ADD CONSTRAINT `expenses_flock_id_foreign` FOREIGN KEY (`flock_id`) REFERENCES `flocks` (`id`),
  ADD CONSTRAINT `expenses_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `farm_medicines`
--
ALTER TABLE `farm_medicines`
  ADD CONSTRAINT `farm_medicines_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`),
  ADD CONSTRAINT `farm_medicines_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`);

--
-- Constraints for table `feeds`
--
ALTER TABLE `feeds`
  ADD CONSTRAINT `feeds_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `flocks`
--
ALTER TABLE `flocks`
  ADD CONSTRAINT `farmId` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `pettycashes`
--
ALTER TABLE `pettycashes`
  ADD CONSTRAINT `pettycashes_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`),
  ADD CONSTRAINT `sales_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`flock_id`) REFERENCES `flocks` (`id`);

--
-- Constraints for table `total_cashes`
--
ALTER TABLE `total_cashes`
  ADD CONSTRAINT `total_cashes_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);

--
-- Constraints for table `total_feeds`
--
ALTER TABLE `total_feeds`
  ADD CONSTRAINT `total_feeds_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
