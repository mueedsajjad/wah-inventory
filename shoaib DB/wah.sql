-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 01:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wah`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `inTime` time DEFAULT NULL,
  `outTime` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `userId`, `date`, `inTime`, `outTime`, `status`, `created_at`, `updated_at`) VALUES
(8, 7, '2020-03-12', '09:59:54', '13:01:44', 1, NULL, NULL),
(9, 1, '2020-03-12', '04:06:45', '14:04:15', 1, NULL, NULL),
(10, 1, '2020-03-13', '04:00:45', '14:04:15', 1, NULL, NULL),
(11, 7, '2020-03-13', '04:45:54', '13:01:44', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Products', NULL, NULL),
(3, 'Materials', NULL, NULL),
(4, 'Components', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lahore', NULL, NULL),
(3, 1, 'GJ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `component_order`
--

CREATE TABLE `component_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `production_deadline` date DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `component_store`
--

CREATE TABLE `component_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bach_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `QC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_store`
--

INSERT INTO `component_store` (`id`, `bach_id`, `component_name`, `quantity`, `QC`, `QA`, `created_at`, `updated_at`) VALUES
(1, 'Bach-001', 'Brass Head', 2000, 'Good', 'Good', '2020-03-16 12:15:36', NULL),
(2, 'Bach-001', 'Tube', 2000, 'Good', 'Good', '2020-03-16 12:15:36', NULL),
(3, 'Bach-001', 'Lead Shots', 2000, 'Good', 'Good', '2020-03-16 12:18:19', NULL),
(4, 'Bach-001', 'Chamber', 2000, 'Good', 'Good', '2020-03-16 12:18:19', NULL),
(5, 'Bach-001', 'Opi-wad', 2000, 'Good', 'Good', '2020-03-16 12:18:19', NULL),
(6, 'Bach-001', 'Closing Disk', 2000, 'Good', 'Good', '2020-03-16 12:18:19', NULL),
(8, 'Bach-001', 'Base-wade', 2000, 'Good', 'Good', '2020-03-16 12:18:19', NULL),
(15, 'Bach-001', 'Primer', 2000, 'Good', 'Good', '2020-03-16 12:18:19', NULL),
(17, 'Bach-001', 'Obtrature', 2000, 'Good', 'Good', '2020-03-16 12:36:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit_term`
--

CREATE TABLE `credit_term` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_term`
--

INSERT INTO `credit_term` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '10 Days', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(3, 'Accounts', NULL, NULL),
(4, 'Purchase', NULL, NULL),
(5, 'Sale', NULL, NULL),
(7, 'HR', NULL, NULL),
(8, 'Production', NULL, NULL),
(9, 'Gate', NULL, NULL),
(10, 'Store', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `duty_schedule`
--

CREATE TABLE `duty_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `duty_schedule`
--

INSERT INTO `duty_schedule` (`id`, `in_time`, `out_time`, `day`, `created_at`, `updated_at`) VALUES
(2, '09:00:00', '18:00:00', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `department_id`, `designation_id`, `mobile`, `gender_id`, `state_id`, `city_id`, `address`, `upload`, `created_at`, `updated_at`) VALUES
(2, 7, 4, 4, '0324 43433343555', 1, 1, 1, 'street 1, A Block Johir Town', '1583828076.Screenshot (1).png', NULL, NULL),
(3, 8, 4, 4, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584126685.admin_pic.png', NULL, NULL),
(4, 9, 5, 5, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584128242.admin_pic.png', NULL, NULL),
(5, 10, 4, 4, '23156213200', 1, 1, 1, 'lahore', '1584106524.clinic-rounded-icon-vector-7367756.jpg', NULL, NULL),
(6, 11, 3, 1, '23156213200', 1, 1, 1, 'lahore', '1584106975.ultrasound.png', NULL, NULL),
(7, 12, 10, 10, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584371575.admin_pic.png', NULL, NULL),
(8, 13, 10, 5, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584371754.admin_pic.png', NULL, NULL),
(9, 14, 10, 4, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584371821.admin_pic.png', NULL, NULL),
(10, 15, 8, 11, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584421773.admin_pic.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inward_gate_pass`
--

CREATE TABLE `inward_gate_pass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transporter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicalNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverPh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_gate_pass`
--

INSERT INTO `inward_gate_pass` (`id`, `gatePassId`, `supplierId`, `transporter`, `vehicalNo`, `driver`, `driverPh`, `storeLocation`, `date`, `status`) VALUES
(1, 'GP001', 'SP001', 'mueed', 'LHR-8877', 'mueed', '03351234567', '4', '2020-03-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inward_raw_material`
--

CREATE TABLE `inward_raw_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `user_id`, `department_id`, `leave_date`, `leave_type_id`, `reason`, `status`, `days`, `created_at`, `updated_at`) VALUES
(2, 7, 4, '2020-03-14', 1, 'Due to sick', 1, 3, NULL, NULL),
(3, 8, 4, '2020-03-14', 3, 'work......', 0, 1, NULL, NULL),
(4, 8, 4, '2020-03-14', 4, 'Due to sick', 0, 1, NULL, NULL),
(5, 8, 4, '2020-03-14', 1, 'Due to sick', 0, 1, NULL, NULL),
(6, 10, 4, '2020-03-13', 1, 'abc', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_name`, `created_at`, `updated_at`) VALUES
(1, 'Sick', NULL, NULL),
(3, 'Urgent Work', NULL, NULL),
(4, 'Temp_leave', NULL, NULL),
(5, 'abc', NULL, NULL),
(6, 'Urgent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
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
(3, '2020_03_02_104348_create_permission_tables', 2),
(4, '2020_03_02_133552_create_department_table', 3),
(5, '2020_03_02_133802_create_purchaseType_table', 3),
(6, '2020_03_03_044614_create_units_of_measure_table', 4),
(7, '2020_03_03_044647_create_categories_table', 4),
(8, '2020_03_03_045745_create_store_table', 5),
(9, '2020_03_03_045819_create_operation_table', 5),
(10, '2020_03_03_045838_create_category_table', 5),
(11, '2020_03_03_045856_create_unit_table', 5),
(13, '2020_03_05_100309_create_credit_term_table', 7),
(14, '2020_03_05_100501_create_state_table', 7),
(15, '2020_03_05_100513_create_city_table', 7),
(16, '2020_03_05_100658_create_payment_term_table', 7),
(18, '2020_03_05_135803_create_purchase_order_item_table', 8),
(19, '2020_03_05_131910_create_purchase_table', 9),
(20, '2020_03_06_050003_create_purchase_order_item_table', 10),
(21, '2020_03_06_050139_create_purchase_order_table', 11),
(22, '2020_03_06_081010_create_purchase_order_item_table', 12),
(23, '2020_03_06_104506_create_purchase_order_item_table', 13),
(24, '2020_03_09_100810_create_employees_table', 14),
(25, '2020_03_09_110300_create_departments_table', 15),
(30, '2020_03_11_112459_create_duty_Schedule_table', 17),
(31, '2020_03_10_095347_create_attendance_table', 18),
(32, '2020_03_13_145249_create_leave_type_table', 19),
(34, '2020_03_13_161852_create_leave_table', 20),
(35, '2020_03_10_064311_create_inward_gate_pass_table', 21),
(37, '2020_03_10_105704_create_material_table', 21),
(38, '2020_03_05_093655_create_supplier_table', 22),
(39, '2020_03_10_105253_create_inward_raw_material_table', 23),
(41, '2020_03_16_161255_create_production_order_detail_table', 25),
(42, '2020_03_16_161307_create_production_order_stage_table', 25),
(45, '2020_03_16_115827_create_component_store_table', 26),
(46, '2020_03_16_161212_create_production_order_table', 27),
(49, '2020_03_17_070634_create_transfer_request_store_table', 28),
(50, '2020_03_17_113049_create_component_order_table', 29);

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
(1, 'App\\User', 1),
(1, 'App\\User', 11),
(4, 'App\\User', 2),
(4, 'App\\User', 3),
(4, 'App\\User', 4),
(4, 'App\\User', 5),
(4, 'App\\User', 7),
(4, 'App\\User', 8),
(4, 'App\\User', 10),
(4, 'App\\User', 14),
(5, 'App\\User', 6),
(5, 'App\\User', 9),
(5, 'App\\User', 13),
(10, 'App\\User', 12),
(11, 'App\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Stage 1', NULL, NULL),
(4, 'Stage 2', NULL, NULL),
(5, 'Stage 3', NULL, NULL);

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
-- Table structure for table `payment_term`
--

CREATE TABLE `payment_term` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_term`
--

INSERT INTO `payment_term` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '10 Days', NULL, NULL);

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
(1, 'Dashboard', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(2, 'Production', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(3, 'Gate', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(4, 'Supplier', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(5, 'Sale', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(6, 'Purchase', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(7, 'Store', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(8, 'Quality', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(9, 'HR', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(10, 'Setting', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(11, 'Accept Leave Request', 'web', '2020-03-13 14:29:41', '2020-03-13 14:29:41'),
(12, 'Apply for Attendance', 'web', '2020-03-13 17:07:42', '2020-03-13 17:07:42'),
(13, 'Production Process', 'web', '2020-03-17 00:10:25', '2020-03-17 00:10:25'),
(14, 'Product Transfer', 'web', '2020-03-17 02:20:24', '2020-03-17 02:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `production_order`
--

CREATE TABLE `production_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `production_deadline` date DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_order`
--

INSERT INTO `production_order` (`id`, `manufacturing_order`, `product`, `quantity`, `total_cost`, `status`, `production_deadline`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'MO-1', '12 Gauge Bullet', 1000, 500000, 4, '2020-03-31', '2020-03-16', NULL, NULL),
(2, 'MO-2', '12 Gauge Bullet', 500, 100000, 2, '2020-03-30', '2020-03-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_order_detail`
--

CREATE TABLE `production_order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_order_id` int(11) DEFAULT NULL,
  `items_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_order_stage`
--

CREATE TABLE `production_order_stage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_order_id` int(11) DEFAULT NULL,
  `stage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasetype`
--

CREATE TABLE `purchasetype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_term` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `purchase_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `approve_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `po_number`, `po_date`, `upload`, `credit_term`, `supplier_id`, `supplier_name`, `status`, `purchase_by`, `user_id`, `approve_by`, `created_at`, `updated_at`) VALUES
(88, 's-123', '2020-03-10', '1583729244.admin_pic.png', 1, 123, 'MMLOGIX', 3, NULL, 1, NULL, NULL, NULL),
(89, 's-123', '2020-03-08', '1583729778.admin_pic.png', 1, 123, 'MMLOGIX', 3, NULL, 1, NULL, NULL, NULL),
(90, 's-123', '2020-03-12', '1584024908.Screenshot (1).png', 1, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_item`
--

CREATE TABLE `purchase_order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_item`
--

INSERT INTO `purchase_order_item` (`id`, `po_number`, `purchase_id`, `p_name`, `p_d`, `unit_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(26, 1233, 88, 'dd', 'ddd', 1, 22, 222, 222, NULL, NULL),
(27, 1233, 89, 'dd', 'ddd', 1, 22, 222, 222, NULL, NULL),
(28, 1233, 90, 'dd', 'ddd', 1, 22, 222, 222, NULL, NULL);

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
(1, 'GM', 'web', '2020-03-02 06:08:23', '2020-03-02 06:08:23'),
(2, 'Admin', 'web', '2020-03-02 06:08:23', '2020-03-02 06:08:23'),
(3, 'Assistant Manager', 'web', '2020-03-02 06:08:23', '2020-03-02 06:08:23'),
(4, 'Officers', 'web', '2020-03-02 06:08:23', '2020-03-02 06:08:23'),
(5, 'Manager', 'web', '2020-03-02 06:08:23', '2020-03-02 06:08:23'),
(6, 'Manager', 'web', '2020-03-02 06:08:23', '2020-03-02 06:08:23'),
(7, 'writer', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(8, 'Accountant', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(9, 'HR', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(10, 'Inspection Manager', 'web', '2020-03-16 09:18:05', '2020-03-16 09:18:05'),
(11, 'Technical Officer', 'web', '2020-03-17 00:08:12', '2020-03-17 00:08:12');

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
(1, 4),
(1, 5),
(2, 1),
(2, 11),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 4),
(9, 5),
(10, 1),
(11, 5),
(12, 4),
(13, 11),
(14, 11);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Punjab', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Magazine 1', NULL, NULL),
(7, 'Magazine 2', NULL, NULL),
(8, 'Finished Goods 1', NULL, NULL),
(9, 'Finished Goods 2', NULL, NULL),
(10, 'Components', NULL, NULL),
(11, 'Tools', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_excise_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_tin_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_id`, `currency`, `name`, `m_number`, `p_number`, `credit_term`, `email`, `status`, `gstn_number`, `state`, `city`, `tax_excise_no`, `vat_tin_no`, `payment_terms`, `bank_name`, `bank_branch`, `account_num`, `created_at`, `updated_at`) VALUES
(1, 'SP001', 'PKR', 'MM logixs', '03351441257', '+092345678943', '10 Days', 'dummyrest@gmail.com', 'Active', '54654654', 'Punjab', 'Lahore', '675456546', '4564654', '10 Days', 'Mazan Bank', 'address', '003400330033', '2020-03-13 08:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_request_store`
--

CREATE TABLE `transfer_request_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_request_store`
--

INSERT INTO `transfer_request_store` (`id`, `store_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'PCS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` bigint(20) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `manager_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shoaib Arshad', NULL, 'shoaibarshad@gmail.com', NULL, '$2y$10$uC6Z9mrZ6kHpp9drh2oMOuq8K7z2yrhG.hz7Uvh3Wk.BF3uXOmD2a', NULL, '2020-03-02 06:08:24', '2020-03-02 06:08:24'),
(7, 'Kaleem Rana', NULL, 'kaleem@gmail.com', NULL, '$2y$10$eSvhuZIWsxRi437C9V7zae6hrH/TSC59V3it9yjtpZPZqexcTvOEi', NULL, '2020-03-09 08:34:33', '2020-03-09 08:34:33'),
(8, 'Fezan', NULL, 'fezan@gmail.com', NULL, '$2y$10$RHjX6LEcx56GCnF26jutteaS7oKWtxKwXyKrc7r0hUqXviiJE1LQK', NULL, '2020-03-13 14:11:25', '2020-03-13 14:11:25'),
(9, 'Moueed Sajjad', NULL, 'mueedsajjad@gmail.com', NULL, '$2y$10$pWd5KViXRDf68XO81LCMRuPRwsj.A1E4hD9rcOu9tjnVaUmG7u/aK', NULL, '2020-03-13 14:37:22', '2020-03-13 14:37:22'),
(10, 'abc', NULL, 'dummyrest@gmail.com', NULL, '$2y$10$uiC8t.Ndi5OMr5J0.5UiieXvVp5SbmVtfRov/AvsNKV3y8x9SFoLC', NULL, '2020-03-13 08:35:24', '2020-03-13 08:35:24'),
(11, 'Tahir', NULL, 'dummyrestt@gmail.com', NULL, '$2y$10$pdF7QXSvSB1bhuIr7hBSEOEITP4NcgaOMfQVh7cwPxsh5lsOUtSaa', NULL, '2020-03-13 08:42:55', '2020-03-13 08:42:55'),
(12, 'Faraz', NULL, 'faraz@gmail.com', NULL, '$2y$10$HakMFTjd/3nWpKBrDzR0v.YIT3pO3Qriept8cA7jpBoaaqrq4tIT.', NULL, '2020-03-16 10:12:55', '2020-03-16 10:12:55'),
(13, 'Bilal', NULL, 'bilal@gmail.com', NULL, '$2y$10$LApLuz83eokbMj8dIxVKAuoOXJv7tfrmvTUHf2KyR/jdr5gqeWTUy', NULL, '2020-03-16 10:15:53', '2020-03-16 10:15:53'),
(14, 'Muzamil', 13, 'muzamil@gmail.com', NULL, '$2y$10$xC0MVZg4Kjsiv2LKyRBeEOXk/hIUDeK6R/Mtt3MHH9/8pDntxTCjG', NULL, '2020-03-16 10:17:01', '2020-03-16 10:17:01'),
(15, 'Numair Techincal', NULL, 'numair.work@gmail.com', NULL, '$2y$10$fSwvyqQ9ECMjCI4matVFPeAs.JQy54xUN/IGUTv47vV159GKwHXrq', NULL, '2020-03-17 00:09:33', '2020-03-17 00:09:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_order`
--
ALTER TABLE `component_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_store`
--
ALTER TABLE `component_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_term`
--
ALTER TABLE `credit_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty_schedule`
--
ALTER TABLE `duty_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_gate_pass`
--
ALTER TABLE `inward_gate_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_raw_material`
--
ALTER TABLE `inward_raw_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
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
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_term`
--
ALTER TABLE `payment_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_order`
--
ALTER TABLE `production_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_order_detail`
--
ALTER TABLE `production_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_order_stage`
--
ALTER TABLE `production_order_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasetype`
--
ALTER TABLE `purchasetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_request_store`
--
ALTER TABLE `transfer_request_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `component_order`
--
ALTER TABLE `component_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `component_store`
--
ALTER TABLE `component_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `credit_term`
--
ALTER TABLE `credit_term`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `duty_schedule`
--
ALTER TABLE `duty_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inward_gate_pass`
--
ALTER TABLE `inward_gate_pass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inward_raw_material`
--
ALTER TABLE `inward_raw_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `production_order`
--
ALTER TABLE `production_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_order_detail`
--
ALTER TABLE `production_order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_order_stage`
--
ALTER TABLE `production_order_stage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasetype`
--
ALTER TABLE `purchasetype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfer_request_store`
--
ALTER TABLE `transfer_request_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
