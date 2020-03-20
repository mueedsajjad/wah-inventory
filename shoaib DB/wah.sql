-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 01:32 PM
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
(1, 1, 'Lahore', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `component_name`, `created_at`, `updated_at`) VALUES
(2, 'Brass Head', NULL, NULL),
(3, 'Primer', NULL, NULL),
(4, 'Tube', NULL, NULL),
(5, 'Base Wad', NULL, NULL),
(6, 'OP Wad', NULL, NULL),
(7, 'Closing Disk', NULL, NULL),
(8, 'Lead Shots', NULL, NULL),
(9, 'Obtrature', NULL, NULL),
(10, 'Propellant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `manufacturing_order`, `name`, `quantity`, `total_cost`, `stored_date`, `status`) VALUES
(1, 'CO-1', 'Tube', 500, 500000, '2020-03-18', 0),
(2, 'CO-2', 'Base Wade', 500, 500000, '2020-03-18', 0),
(3, 'CO-3', 'Chamber', 500, 50000, '2020-03-18', 0);

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
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_order`
--

INSERT INTO `component_order` (`id`, `manufacturing_order`, `component_name`, `quantity`, `total_cost`, `status`, `production_deadline`, `created_date`, `type`, `created_at`, `updated_at`) VALUES
(2, 'CO-1', 'Tube', 500, 500000, 5, '2020-03-18', '2020-03-18', 'Component', NULL, NULL),
(3, 'CO-2', 'Base Wade', 500, 500000, 5, '2020-03-18', '2020-03-18', 'Component', NULL, NULL),
(4, 'CO-3', 'Chamber', 500, 50000, 5, '2020-03-18', '2020-03-18', 'Component', NULL, NULL),
(5, 'CO-4', 'Brass Head', 500, 50000, 1, '2020-03-18', '2020-03-18', 'Component', NULL, NULL),
(6, 'CO-4', 'Tube', 100, 1000, 0, '2020-03-18', '2020-03-18', 'Component', NULL, NULL);

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
(1, 'Store', NULL, NULL),
(2, 'Production', NULL, NULL);

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
(1, 2, 1, 3, '0324 43433343', 1, 1, 1, 'street 1, A Block Johir Town', '1584536232.Screenshot (1).png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finished_goods_1`
--

CREATE TABLE `finished_goods_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finished_goods_2`
--

CREATE TABLE `finished_goods_2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inward_gate_pass`
--

CREATE TABLE `inward_gate_pass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transporter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicalNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverPh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_gate_pass`
--

INSERT INTO `inward_gate_pass` (`id`, `gatePassId`, `type`, `name`, `transporter`, `vehicalNo`, `driver`, `driverPh`, `date`, `status`) VALUES
(1, 'GP001', 'supplier', 'CDOXS', 'Fezan Tr', 'LHR-1234', 'Fezan', '0998844444', '2020-03-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inward_goods_receipt`
--

CREATE TABLE `inward_goods_receipt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grnDate` date NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchasedFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalCost` double(8,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseOrderNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalQuantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_goods_receipt`
--

INSERT INTO `inward_goods_receipt` (`id`, `grn`, `grnDate`, `document`, `purchasedFrom`, `gatePassId`, `totalCost`, `name`, `purchaseOrderNo`, `materialName`, `uom`, `description`, `totalQuantity`) VALUES
(1, 'GRN001', '2020-03-18', NULL, 'ppra', 'GP001', 5000.00, 'CDOXS', 'PN-001', 'Plastic', 'KG', 'Material Description Material Description', '12');

-- --------------------------------------------------------

--
-- Table structure for table `inward_raw_material`
--

CREATE TABLE `inward_raw_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeLocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `inspectionDate` date DEFAULT NULL,
  `inspectionStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectionReason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectedQty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_raw_material`
--

INSERT INTO `inward_raw_material` (`id`, `materialName`, `uom`, `qty`, `description`, `gatePassId`, `storeLocation`, `date`, `status`, `inspectionDate`, `inspectionStatus`, `rejectionReason`, `rejectedQty`) VALUES
(1, 'Plastic', 'KG', '20', 'Material Description Material Description', 'GP001', 'Magazine 1', '2020-03-18', 6, '2020-03-18', 'bad', 'ijuluoi', 8),
(2, 'Plastic Soft', 'KG', '20', 'Material Description Material Description', 'GP001', NULL, '2020-03-18', 1, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `magazine_1`
--

CREATE TABLE `magazine_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `magazine_1`
--

INSERT INTO `magazine_1` (`id`, `materialName`, `uom`, `quantity`, `stored_date`, `status`) VALUES
(1, 'Plastic', 'KG', 12, '2020-03-18', 0);

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
(3, '2020_03_02_104348_create_permission_tables', 1),
(4, '2020_03_02_133802_create_purchaseType_table', 1),
(5, '2020_03_03_045745_create_store_table', 1),
(6, '2020_03_03_045819_create_operation_table', 1),
(7, '2020_03_03_045838_create_category_table', 1),
(8, '2020_03_03_045856_create_unit_table', 1),
(9, '2020_03_05_093655_create_supplier_table', 1),
(10, '2020_03_05_100309_create_credit_term_table', 1),
(11, '2020_03_05_100501_create_state_table', 1),
(12, '2020_03_05_100513_create_city_table', 1),
(13, '2020_03_05_100658_create_payment_term_table', 1),
(14, '2020_03_06_050139_create_purchase_order_table', 1),
(15, '2020_03_06_104506_create_purchase_order_item_table', 1),
(16, '2020_03_09_100810_create_employees_table', 1),
(17, '2020_03_09_110300_create_departments_table', 1),
(18, '2020_03_10_064311_create_inward_gate_pass_table', 1),
(19, '2020_03_10_095347_create_attendance_table', 1),
(20, '2020_03_10_105253_create_inward_raw_material_table', 1),
(21, '2020_03_10_105704_create_material_table', 1),
(22, '2020_03_11_112459_create_duty_Schedule_table', 1),
(23, '2020_03_13_145249_create_leave_type_table', 1),
(24, '2020_03_13_161852_create_leave_table', 1),
(25, '2020_03_16_115827_create_component_store_table', 1),
(26, '2020_03_16_161212_create_production_order_table', 1),
(27, '2020_03_16_161255_create_production_order_detail_table', 1),
(28, '2020_03_16_161307_create_production_order_stage_table', 1),
(29, '2020_03_17_094534_create_inward_goods_receipt_table', 1),
(30, '2020_03_17_113049_create_component_order_table', 1),
(31, '2020_03_18_073408_create_finished_goods_1_table', 1),
(32, '2020_03_18_074910_create_finished_goods_2_table', 1),
(33, '2020_03_18_095131_create_components_table', 1),
(34, '2020_03_18_104413_create_production_material_table', 1),
(35, '2020_03_18_104435_create_production_material_detail_table', 1),
(36, '2020_03_18_112840_create_magazine_1_table', 1),
(37, '2020_03_19_103240_create_production_component_table', 2),
(38, '2020_03_19_103316_create_production_component_detail_table', 2),
(39, '2020_03_19_112924_create_component_table', 3);

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
(3, 'App\\User', 2);

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
(1, 'Dashboard', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(2, 'Production', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(3, 'Gate', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(4, 'Supplier', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(5, 'Sale', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(6, 'Purchase', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(7, 'Store', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(8, 'Quality', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(9, 'HR', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(10, 'Setting', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(11, 'Accept Leave Request', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(12, 'Apply for Attendance', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(13, 'Production Process', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(14, 'Product Transfer', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(15, 'Assign Stores', 'web', '2020-03-18 07:51:14', '2020-03-18 07:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `production_component`
--

CREATE TABLE `production_component` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_no` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_component`
--

INSERT INTO `production_component` (`id`, `manufacturing_no`, `issue_date`, `create_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '2020-03-19', '2020-03-19', 0, NULL, NULL),
(2, 4, '2020-03-19', '2020-03-19', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_component_detail`
--

CREATE TABLE `production_component_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_component_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_component_detail`
--

INSERT INTO `production_component_detail` (`id`, `component_name`, `quantity`, `description`, `production_component_id`, `created_at`, `updated_at`) VALUES
(1, 'Brass Head', 20, 'Component Description Component Description', 2, NULL, NULL),
(2, 'Primer', 20, 'Component Description Component Description', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_material`
--

CREATE TABLE `production_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_no` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_material`
--

INSERT INTO `production_material` (`id`, `manufacturing_no`, `issue_date`, `create_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, '2020-03-18', '2020-03-18', 0, NULL, NULL),
(2, 4, '2020-03-19', '2020-03-19', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_material_detail`
--

CREATE TABLE `production_material_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UOM` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_material_detail`
--

INSERT INTO `production_material_detail` (`id`, `material_name`, `UOM`, `quantity`, `description`, `production_material_id`, `created_at`, `updated_at`) VALUES
(1, 'Plastic', 1, 20, 'Material Description Material Description', 1, NULL, NULL),
(2, 'Plastic Soft', 1, 20, 'Material Description Material Description', 1, NULL, NULL);

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
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_order`
--

INSERT INTO `production_order` (`id`, `manufacturing_order`, `product`, `quantity`, `total_cost`, `status`, `production_deadline`, `created_date`, `type`, `created_at`, `updated_at`) VALUES
(3, 'MO-1', 'Kartoos', 500, 10000000, 1, '2020-03-18', '2020-03-18', 'Product', NULL, NULL),
(4, 'MO-6', 'Kartoos', 100, 10000, 0, '2020-03-19', '2020-03-19', 'Product', NULL, NULL);

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
(1, 's-123', '2020-03-18', '1584540008.Screenshot (1).png', 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(2, 's-123', '2020-03-18', NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL);

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
(1, 1233, 1, 'dd', 'ddd', 1, 22, 222, 222, NULL, NULL),
(2, 1233, 2, 'Opi wade', 'ddd', 1, 22, 222, 222, NULL, NULL);

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
(1, 'GM', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(2, 'Admin', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(3, 'Assistant Manager', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(4, 'Officers', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(5, 'Manager', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(6, 'writer', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(7, 'Accountant', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(8, 'HR', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(9, 'Inspection Manager', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(10, 'Inspection Manager', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13'),
(11, 'Technical Officer', 'web', '2020-03-18 07:51:13', '2020-03-18 07:51:13');

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
(13, 1),
(14, 1),
(15, 1);

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
(1, 'Magazine 1', NULL, NULL),
(2, 'Magazine 2', NULL, NULL),
(3, 'Finished Goods 1', NULL, NULL),
(4, 'Finished Goods 2', NULL, NULL),
(5, 'Components', NULL, NULL),
(6, 'Tools', NULL, NULL);

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
(1, 'KG', NULL, NULL),
(2, 'PCS', NULL, NULL);

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
(1, 'Shoaib Arshad', NULL, 'shoaibarshad@gmail.com', NULL, '$2y$10$QeTDNiCE3PG4KEjHpcGj9.zrDoN6EdiGjAV56ggd3OsLi2tX.drwO', NULL, '2020-03-18 07:51:14', '2020-03-18 07:51:14'),
(2, 'Muzamil', NULL, 'muzamil@gmail.com', NULL, '$2y$10$UKGcnoaeNFkWiSvvRLDI5O.Sy3.u9hkVrrJ0z4d1Jl0sowHyjUV/G', NULL, '2020-03-18 07:57:12', '2020-03-18 07:57:12');

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
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
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
-- Indexes for table `finished_goods_1`
--
ALTER TABLE `finished_goods_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finished_goods_2`
--
ALTER TABLE `finished_goods_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_gate_pass`
--
ALTER TABLE `inward_gate_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_goods_receipt`
--
ALTER TABLE `inward_goods_receipt`
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
-- Indexes for table `magazine_1`
--
ALTER TABLE `magazine_1`
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
-- Indexes for table `production_component`
--
ALTER TABLE `production_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_component_detail`
--
ALTER TABLE `production_component_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_material`
--
ALTER TABLE `production_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_material_detail`
--
ALTER TABLE `production_material_detail`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `component_order`
--
ALTER TABLE `component_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `component_store`
--
ALTER TABLE `component_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_term`
--
ALTER TABLE `credit_term`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `duty_schedule`
--
ALTER TABLE `duty_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `finished_goods_1`
--
ALTER TABLE `finished_goods_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finished_goods_2`
--
ALTER TABLE `finished_goods_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inward_gate_pass`
--
ALTER TABLE `inward_gate_pass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inward_goods_receipt`
--
ALTER TABLE `inward_goods_receipt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inward_raw_material`
--
ALTER TABLE `inward_raw_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `magazine_1`
--
ALTER TABLE `magazine_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `production_component`
--
ALTER TABLE `production_component`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_component_detail`
--
ALTER TABLE `production_component_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_material`
--
ALTER TABLE `production_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_material_detail`
--
ALTER TABLE `production_material_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_order`
--
ALTER TABLE `production_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
