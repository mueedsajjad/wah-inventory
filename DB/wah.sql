-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 02:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
(3, 1, 'Gujranwala', NULL, NULL),
(4, 2, 'Peshawar', NULL, NULL);

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
(1, '10 Days', NULL, NULL),
(2, '20 Days', NULL, NULL),
(3, '1 Month', NULL, NULL),
(4, '3 Month', NULL, NULL),
(5, '1 Year', NULL, NULL),
(6, '2 Year', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `storeLocation` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_gate_pass`
--

INSERT INTO `inward_gate_pass` (`id`, `gatePassId`, `supplierId`, `transporter`, `vehicalNo`, `driver`, `driverPh`, `storeLocation`, `date`, `status`) VALUES
(1, 'GP001', 'SP001', 'Zeeshan Transporter\'s', 'LHR-8828', 'waseem', '03351234567', '3', '2020-10-03', 0),
(9, 'GP002', 'SP002', 'Zeeshan Transporter\'s', 'LHR-2345', 'zain', '03351234567', '4', '2020-03-13', 0),
(12, 'GP003', 'SP004', 'Zeeshan Transporter\'s', 'LHR-1234', 'waseem', '03351234567', '3', '2020-03-13', 1),
(13, 'GP004', 'SP003', 'Mueed Transporter\'s', 'LHR-8976', 'zain', '03351234567', '9', '2020-03-13', 0),
(14, 'GP005', 'SP002', 'Zeeshan Transporter\'s', 'LHR-1133', 'zain', '03351234567', '6', '2020-03-13', 0),
(15, 'GP006', 'SP003', 'Zeeshan Transporter', 'LHR-8828', 'waseem', '03351234567', '6', '2020-03-13', 1),
(16, 'GP007', 'SP002', 'Zeeshan Transporter', 'LHR-2343', 'ALi', '0335-1234567', '6', '2020-03-13', 0),
(17, 'GP008', 'SP002', 'Mueed Transporter\'s', 'LHR-8820', 'zain', '0335-12345678', '3', '2020-03-13', 0);

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
  `supplierId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_raw_material`
--

INSERT INTO `inward_raw_material` (`id`, `materialName`, `uom`, `qty`, `description`, `supplierId`, `gatePassId`, `date`) VALUES
(1, 'brassHead', 'kg', '3', 'Material Description', 'SP001', 'GP001', '2020-10-03'),
(4, 'Brass Head', 'kg', '56', 'Brass Material Description', 'SP002', 'GP002', '2020-03-13'),
(5, 'Primer', 'Ton', '3', 'Primer Material Description', 'SP002', 'GP002', '2020-03-13'),
(6, 'Brass Head', 'Ton', '3', 'Material Description', 'SP004', 'GP003', '2020-03-13'),
(7, 'OP Wad', 'kg', '44', 'Material Description test', 'SP004', 'GP003', '2020-03-13'),
(8, 'Closing Disc', 'Ton', '2', 'Material Description', 'SP003', 'GP004', '2020-03-13'),
(9, 'Tube', 'PCS', '3', 'Material Description Tube', 'SP003', 'GP004', '2020-03-13'),
(10, 'OP Wad', 'kg', '55', 'Material Description', 'SP002', 'GP005', '2020-03-13'),
(11, 'Brass Head', 'kg', '65', 'Material Description', 'SP002', 'GP005', '2020-03-13'),
(12, 'OP Wad', 'PCS', '3', 'Material Description', 'SP003', 'GP006', '2020-03-13'),
(13, 'Brass Head', 'kg', '44', 'Material Description', 'SP003', 'GP006', '2020-03-13'),
(14, 'Brass Head', 'kg', '99', 'Material Description', 'SP002', 'GP007', '2020-03-13'),
(15, 'OP Wad', 'Ton', '5', 'Material Description', 'SP002', 'GP007', '2020-03-13'),
(16, 'Brass Head', 'kg', '55', 'Material Description', 'SP002', 'GP008', '2020-03-13'),
(17, 'OP Wad', 'Ton', '3', 'Material Description', 'SP002', 'GP008', '2020-03-13');

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

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `description`, `category`, `uof`, `qty`, `storeLocation`, `status`, `rate`, `date`) VALUES
(2, 'Primer', 'Material Description Primer', 'Materials', 'kg', '90', 'Material Store', 'inactive', '340000', '2020-11-03'),
(3, 'Brass Head', 'Brass Head Material Description', 'Materials', 'kg', '78', 'Material Store', 'active', '340000', '2020-11-03'),
(5, 'Base Wad', 'Base Wad Material Description', 'Materials', 'kg', '67', 'Material Store', 'active', '340000', '2020-11-03'),
(6, 'Product 1', 'Product 1 Description', 'Products', 'PCS', '45', 'Magazine 2', 'inactive', '120000', '2020-11-03'),
(7, 'product 2', 'product 2 Description', 'Products', 'PCS', '99', 'Product Store', 'active', '340000', '2020-11-03'),
(9, 'product 3', 'product 3 Description', 'Products', 'PCS', '45', 'Product Store', 'inactive', '5646456', '2020-11-03'),
(10, 'Lead Shot', 'Lead Shot Description', 'Materials', 'kg', '66', 'Magazine 2', 'active', '340000', '2020-03-13');

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
(12, '2020_03_05_093655_create_supplier_table', 6),
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
(28, '2020_03_10_064311_create_inward_gate_pass_table', 14),
(30, '2020_03_10_105253_create_inward_raw_material_table', 15),
(31, '2020_03_10_105704_create_material_table', 16);

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
(1, 'App\\User', 1);

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
(1, 'Cash', NULL, NULL);

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
(10, 'Setting', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24');

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
(89, 's-123', '2020-03-08', '1583729778.admin_pic.png', 1, 123, 'MMLOGIX', 3, NULL, 1, NULL, NULL, NULL);

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
(27, 1233, 89, 'dd', 'ddd', 1, 22, 222, 222, NULL, NULL);

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
(9, 'HR', 'web', '2020-03-02 06:08:24', '2020-03-02 06:08:24');

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
(10, 1);

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
(1, 'Punjab', NULL, NULL),
(2, 'KPK', NULL, NULL);

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
(3, 'Tools', NULL, NULL),
(4, 'Magazine 1', NULL, NULL),
(5, 'Magazine 2', NULL, NULL),
(6, 'Components', NULL, NULL),
(9, 'Warehouse 1', NULL, NULL),
(10, 'Warehouse 2', NULL, NULL);

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
(1, 'SP001', 'PKR', 'MM Logix', '03331234567', '+924237800153', '20 Days', 'mmlogixs@gmail.com', 'Active', '21345678', 'KPK', 'Peshawar', '35465678', '547654', 'Cash', 'Mezaan Bank', 'Allama Iqbal Town', '120012001200', '2020-12-03 01:25:47', '2020-12-03 05:08:59'),
(2, 'SP002', 'PKR', 'CDOXS\r\n', '03345118176', '+924234734343', '1 Month', 'cdoxs@gmail.com', 'Inactive', '21345678', 'KPK', 'Peshawar', '35465678', '547654', 'Cash', 'Mezaan Bank', 'Allama Iqbal Town', '120012001200', '2020-12-03 01:28:02', NULL),
(3, 'SP003', 'PKR', 'NET SOle', '03345118176', '+924234734343', '10 Days', 'netsole@gmail.com', 'Active', '21345678', 'Punjab', 'Gujranwala', '35465678', '547654', 'Cash', 'Mezaan Bank', 'Allama Iqbal Town', '120012001200', '2020-12-03 02:09:09', '2020-03-13 07:53:22'),
(4, 'SP004', 'PKR', 'Systems', '03345118176', '+924234734343', '10 Days', 'systems@gmail.com', 'Active', '21345678', 'Punjab', 'Lahore', '35465678', '547654', 'Cash', 'Mezaan Bank', 'Allama Iqbal Town', '120012001200', '2020-12-03 02:12:40', NULL),
(6, 'SP005', 'PKR', 'Cybus Solutions', '03341234567', '+924234734343', '10 Days', 'CybusSolutions@gmail.com', 'Active', '21345678', 'Punjab', 'Lahore', '35465678', '547654', 'Cash', 'Mezaan Bank', 'Allama Iqbal Town', '120012001200', '2020-03-13 07:52:41', NULL);

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
(5, 'PCS', NULL, NULL),
(8, 'kg', NULL, NULL),
(9, 'Ton', NULL, NULL),
(10, 'Pound', NULL, NULL);

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
(1, 'Shoaib Arshad', NULL, 'shoaibarshad@gmail.com', NULL, '$2y$10$uC6Z9mrZ6kHpp9drh2oMOuq8K7z2yrhG.hz7Uvh3Wk.BF3uXOmD2a', NULL, '2020-03-02 06:08:24', '2020-03-02 06:08:24');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `credit_term`
--
ALTER TABLE `credit_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credit_term`
--
ALTER TABLE `credit_term`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inward_gate_pass`
--
ALTER TABLE `inward_gate_pass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inward_raw_material`
--
ALTER TABLE `inward_raw_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchasetype`
--
ALTER TABLE `purchasetype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
