-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 03:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

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
-- Table structure for table `advance`
--

CREATE TABLE `advance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `installment` int(11) DEFAULT NULL,
  `advanceAmount` int(11) DEFAULT NULL,
  `recieveAmount` int(11) DEFAULT NULL,
  `remainingAmount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `dutyTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workingTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `userId`, `date`, `inTime`, `outTime`, `status`, `dutyTime`, `workingTime`, `overTime`, `checkIn`) VALUES
(17, 10, '2020-04-01', NULL, NULL, 0, NULL, NULL, NULL, 'N/A'),
(18, 13, '2020-04-01', '09:15:00', '18:37:00', 1, '09:00', '09:22', '00:22', 'Late'),
(20, 12, '2020-04-01', '09:00:00', '19:41:00', 1, '09:00', '10:41', '01:41', 'Timely'),
(21, 17, '2020-04-01', '09:28:00', '18:34:00', 1, '09:00', '09:06', '00:06', 'Late'),
(23, 15, '2020-04-01', '09:10:00', '19:07:00', 1, '09:00', '09:57', '00:57', 'Late'),
(30, 11, '2020-04-01', '08:59:00', '18:27:00', 1, '09:00', '09:28', '00:28', 'Timely');

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
(1, 1, 'Lahore', NULL, NULL),
(2, 1, 'Gujranwala', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `component_name`, `component_id`, `created_at`, `updated_at`) VALUES
(12, 'Brass Head', 'C-BH-13', NULL, NULL),
(13, 'Primer', 'C-PR-27', NULL, NULL),
(14, 'Tube', 'C-TE-39', NULL, NULL),
(15, 'Base Wad', 'C-BW-59', NULL, NULL),
(16, 'OP Wad', 'C-OW-08', NULL, NULL),
(17, 'Closing Disk', 'C-CD-20', NULL, NULL),
(18, 'Lead Shots', 'C-LS-36', NULL, NULL),
(19, 'Obtrature', 'C-OE-49', NULL, NULL),
(20, 'Propellant', 'C-PT-04', NULL, NULL);

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
  `inspectionStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectionReason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectionQty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_order`
--

INSERT INTO `component_order` (`id`, `manufacturing_order`, `component_name`, `quantity`, `total_cost`, `status`, `production_deadline`, `created_date`, `type`, `inspectionStatus`, `inspectionDate`, `rejectionReason`, `rejectionQty`, `created_at`, `updated_at`) VALUES
(1, 'CO-1', 'Brass Head', 50, 10000, 5, '2020-03-24', '2020-03-24', 'Component', 'good', '2020-04-08', 'das', '12', NULL, NULL),
(2, 'CO-2', 'Brass Head', 100, 2000, 5, '2020-03-24', '2020-03-24', 'Component', 'good', '2020-04-08', 'fasdf', '5', NULL, NULL),
(3, 'CO-3', 'Tube', 1000, 100000, 5, '2020-03-25', '2020-03-25', 'Component', 'bad', '2020-04-08', 'good', '0', NULL, NULL),
(4, 'CO-4', 'Tube', 200, 40000, 4, '2020-04-11', '2020-04-03', 'Component', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'CO-5', 'Tube', 4566, 123456, 4, '2020-04-17', '2020-04-08', 'Component', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'CO-6', 'Tube', 12, 1233, 5, '2020-04-24', '2020-04-08', 'Component', 'excellent', '2020-04-08', '12 fit', '0', NULL, NULL);

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
(1, 'Monthly', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstn_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `name`, `m_number`, `p_number`, `credit_term`, `email_id`, `customer_status`, `gstn_number`, `state`, `city`, `tax_reference_no`, `vat_number`, `payment_terms`, `registration_date`) VALUES
(1, 'CS001', 'Kaleem Shoukat', '03351441256', '+921231234567', '1', 'kaleem@gmail.com', 'active', '2134567', '1', '1', '2134567', '2134567', '1', '2020-04-10'),
(2, 'CS002', 'Mueed', '03351441234', '+921231234567', '1', 'mueed@gmail.com', 'active', '2134567', '1', '1', '2134567', '2134567', '2', '2020-04-10'),
(4, 'CS003', 'Zain ul Abidin', '03351441244', '+921231234567', '1', 'zain@gmail.com', 'active', '2134567', '1', '1', '2134567', '2134567', '2', '2020-04-10');

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
(1, 'Production', NULL, NULL),
(2, 'Gate', NULL, NULL),
(3, 'Store', NULL, NULL),
(4, 'Purchase', NULL, NULL),
(5, 'Quality', NULL, NULL),
(6, 'Role Management', NULL, NULL),
(7, 'Setting', NULL, NULL),
(8, 'HR', NULL, NULL),
(9, 'Manager', NULL, NULL),
(10, 'Assistant Manager', NULL, NULL),
(12, 'QC', NULL, NULL);

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
(1, '09:00:00', '18:00:00', 6, NULL, NULL);

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
  `salary` int(255) DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `department_id`, `designation_id`, `mobile`, `gender_id`, `state_id`, `city_id`, `address`, `upload`, `salary`, `createdDate`, `joinDate`, `designation`, `created_at`, `updated_at`) VALUES
(9, 10, 2, 12, '67885433', 1, 1, 1, 'dd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 11, 1, 13, '6754322', 1, 1, 1, 'ttttt', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 12, 3, 14, '45533', 1, 1, 1, 'sssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 13, 4, 15, '244433', 1, 1, 1, 'sssssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 14, 5, 16, '4553333', 1, 1, 1, 'jjkks', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 15, 8, 8, '4554333', 1, 1, 1, 'ddssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 16, 9, 5, '24443222', 1, 1, 1, 'sssdfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 17, 10, 3, '35673333', 1, 1, 1, 'sssssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 18, 12, 17, '971-55-9798540', 1, 1, 1, 'Islampura lahore', '1586170780.city.png', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inward_gate_pass`
--

CREATE TABLE `inward_gate_pass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverCNIC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicalNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverPh` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendorType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorPh` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_gate_pass`
--

INSERT INTO `inward_gate_pass` (`id`, `purchase_order_id`, `requisition_id`, `gatePassId`, `driverId`, `driverName`, `driverCNIC`, `vehicalNo`, `driverPh`, `vendorType`, `vendorId`, `vendorName`, `vendorAddress`, `vendorPh`, `date`, `status`) VALUES
(1, NULL, NULL, 'GP001', 'DR001', 'Zain', NULL, 'LHR-1235', '03351441255', 'Registered Vendor', '', 'MM Logix', 'Lahore Pak', '03351441259', '2020-03-25', 1),
(2, NULL, NULL, 'GP002', 'DR002', 'kaleem', NULL, 'LHR-1234', '03351441255', 'Registered Vendor', '', 'MM Logix', 'Lahore Pak', '03351441259', '2020-03-25', 1),
(3, NULL, NULL, 'GP003', 'DR003', 'Mueed', NULL, 'LHR-8824', '03351441255', 'Registered Vendor', '', 'MM Logix', 'Lahore Pak', '03351441259', '2020-03-30', 1),
(4, NULL, NULL, 'GP004', 'DR004', 'Asjid', NULL, 'LHR-8824', '03351441255', 'Registered Vendor', '', 'MM Logix', 'Lahore Pak', '03351441259', '2020-03-30', 1),
(5, NULL, NULL, 'GP005', 'DR005', 'Waseem', NULL, 'LHR-8826', '03351441255', 'Registered Vendor', 'VND005', 'MM Logix', 'Lahore Pak', '03351441234', '2020-03-30', 1),
(6, NULL, NULL, 'GP006', 'DR006', 'Waseem', NULL, 'LHR-8824', '03351441255', 'Non Registered Vendor', 'VND006', 'kaleem', 'lahore', '03351441255', '2020-04-01', 1),
(7, NULL, NULL, 'GP007', 'DR007', 'mome', NULL, 'momo9898', '090078601', 'Registered Vendor', 'VND007', 'fazi', 'lhr', '04066777', '2020-04-03', 1),
(8, 'PO-3491', 'PR-1588', 'GP008', 'DR008', 'Waseem', NULL, 'LHE-08-23233', '03075340664', 'Registered Vendor', 'SP001', 'Vendor One', 'Lahore', '42342', '2020-04-06', 1),
(9, 'PO-3491', 'PR-1588', 'GP008', 'DR008', 'Waseem', NULL, 'LHE-08-23233', '03075340664', 'Registered Vendor', 'SP001', 'Vendor One', 'Lahore', '42342', '2020-04-06', 1),
(10, 'PO-2594', 'PR-2811', 'GP009', 'DR009', 'dakspld', NULL, '19283791', '23423', 'Registered Vendor', 'SP001', 'Vendor One', 'Lahore', '42342', '2020-04-07', 1),
(11, 'PO-4542', 'PR-8913', 'GP0010', 'DR0010', 'Waseemmmm', '3520252278225', 'fas123', '21312', 'Registered Vendor', 'SP001', 'Vendor One', 'Lahore', '42342', '2020-04-07', 1),
(12, NULL, NULL, 'GP0011', 'DR0011', 'Idrees', '352019870763', 'ler-0901', '03014541249', NULL, NULL, NULL, NULL, NULL, '2020-04-08', 0),
(14, NULL, 'FI-3148', 'GP0012', 'DR0012', 'khalil', '6237328434', 'LER-0981', '03018939439', NULL, NULL, NULL, NULL, NULL, '2020-04-08', 1),
(15, 'PO-5644', 'PR-8908', 'GP0013', 'DR0013', 'wasim', '23923929', 'LER-9091', '029392392', 'Registered Vendor', 'SP001', 'Vendor One', 'Lahore', '42342', '2020-04-08', 1),
(16, 'PO-502', 'PR-8564', 'GP0014', 'DR0014', 'Hanzi', '35201789012345', 'ler-9801', '03040001111', 'Registered Vendor', 'SP001', 'Vendor One', 'Lahore', '42342', '2020-04-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inward_goods_receipt`
--

CREATE TABLE `inward_goods_receipt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grnDate` date NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchasedFrom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalCost` double(8,2) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseOrderNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalQuantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_goods_receipt`
--

INSERT INTO `inward_goods_receipt` (`id`, `grn`, `grnDate`, `document`, `purchasedFrom`, `gatePassId`, `totalCost`, `name`, `purchaseOrderNo`, `materialName`, `uom`, `description`, `totalQuantity`) VALUES
(5, 'GRN001', '2020-03-27', NULL, 'ppra', 'GP001', 400000.00, 'CDOXS', 'PO006', 'Soft Plastic', 'KG', 'Material Description', '100000'),
(6, 'GRN002', '2020-03-30', NULL, 'ppra', 'GP001', 400000.00, 'CDOXS', 'PO008', 'Plastic', 'KG', 'Material Description', '99300'),
(7, 'GRN003', '2020-03-30', NULL, 'ppra', 'GP004', 400000.00, 'CDOXS', 'PO009', 'Brass Head', 'KG', 'Component Description', '876'),
(8, 'GRN004', '2020-03-30', NULL, 'ppra', 'GP005', 400000.00, 'MM Logix', 'PO009', 'OP Wad', 'KG', 'Component Description', '7660'),
(9, 'GRN005', '2020-04-01', NULL, 'ppra', 'GP006', 400000.00, 'kaleem', 'PO009', 'Brass Head', 'KG', 'Description', '7666'),
(10, 'GRN006', '2020-04-01', NULL, 'ppra', 'GP005', 400000.00, 'MM Logix', 'PO0010', 'Brass Head', 'KG', 'Material Description', '788'),
(11, 'GRN007', '2020-04-06', NULL, 'ppra', 'GP008', 100000.00, 'Vendor One', 'PO-3491', 'C-BH-13', 'PCS', 'i need a tube for making something', '781'),
(12, 'GRN008', '2020-04-08', NULL, 'ppra', 'GP0013', 2000.00, 'Vendor One', 'PO-5644', 'C-BH-13', 'PCS', 'ncie', '98'),
(13, 'GRN009', '2020-04-08', NULL, NULL, 'GP0012', NULL, NULL, NULL, 'Tube', '2', '100 received', '98'),
(14, 'GRN0010', '2020-04-09', NULL, 'ppra', 'GP0014', 400.00, 'Vendor One', 'PO-502', 'C-TE-39', 'PCS', '20 received', '20');

-- --------------------------------------------------------

--
-- Table structure for table `inward_raw_material`
--

CREATE TABLE `inward_raw_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itemType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gatePassId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeLocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `inspectionDate` date DEFAULT NULL,
  `inspectionStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectionReason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectedQty` int(11) DEFAULT NULL,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_raw_material`
--

INSERT INTO `inward_raw_material` (`id`, `itemType`, `materialName`, `uom`, `qty`, `order_qty`, `description`, `gatePassId`, `storeLocation`, `date`, `status`, `inspectionDate`, `inspectionStatus`, `rejectionReason`, `rejectedQty`, `purchase_order_id`, `requisition_id`) VALUES
(1, 'Material', 'Soft Plastic', 'KG', '100000', NULL, 'Material Description', 'GP001', 'Magazine 1', '2020-03-25', 6, '2020-03-25', 'excellent', NULL, NULL, NULL, NULL),
(2, 'Material', 'Plastic', 'KG', '100000', NULL, 'Material Description', 'GP001', 'Magazine 2', '2020-03-25', 6, '2020-03-30', 'bad', 'Low Quality', 700, NULL, NULL),
(3, 'Material', 'Soft Plastic', 'KG', '100000', NULL, 'Material Description', 'GP002', 'Magazine 2', '2020-03-25', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Material', 'OP Wad', 'KG', '687', NULL, 'Material Description', 'GP003', 'Magazine 2', '2020-03-30', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Component', 'Brass Head', 'KG', '876', NULL, 'Component Description', 'GP004', 'Components', '2020-03-30', 6, '2020-03-30', 'excellent', NULL, NULL, NULL, NULL),
(6, 'Material', 'Brass Head', 'KG', '788', NULL, 'Material Description', 'GP005', 'Magazine 2', '2020-03-30', 6, '2020-04-01', 'excellent', NULL, NULL, NULL, NULL),
(7, 'Component', 'OP Wad', 'KG', '7667', NULL, 'Component Description', 'GP005', 'Components', '2020-03-30', 6, '2020-03-30', 'bad', 'Low Quality', 7, NULL, NULL),
(8, 'Material', 'Brass Head', 'KG', '7676', NULL, 'Description', 'GP006', 'Magazine 2', '2020-04-01', 6, '2020-04-01', 'bad', 'Bad Quality', 10, NULL, NULL),
(9, 'Component', 'OP Wad', 'KG', '878', NULL, 'Description', 'GP006', NULL, '2020-04-01', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Material', 'Tube', 'KG', '5600', NULL, 'aagaee', 'GP007', 'Magazine 2', '2020-04-03', 3, '2020-04-03', 'bad', 'kharab piece', 90, NULL, NULL),
(11, 'Material', 'C-BH-13', 'PCS', '786', 876, 'i need a tube for making something', 'GP008', NULL, '2020-04-06', 2, NULL, NULL, NULL, NULL, 'PO-3491', 'PR-1588'),
(12, 'Material', 'C-BH-13', 'PCS', '786', 876, 'i need a tube for making something', 'GP008', 'Magazine 2', '2020-04-06', 5, '2020-04-06', 'excellent', 'good quality', 5, 'PO-3491', 'PR-1588'),
(13, 'Material', 'C-BH-13', 'PCS', '3500', 40000, 'dkoskmaodias', 'GP009', NULL, '2020-04-07', 3, '2020-04-07', 'excellent', 'reamarkssss', 4, 'PO-2594', 'PR-2811'),
(14, 'Material', 'C-BH-13', 'PCS', '4000', 4000, 'received', 'GP0010', NULL, '2020-04-07', 3, '2020-04-07', 'good', 'gooogooo', 0, 'PO-4542', 'PR-8913'),
(15, 'Component', 'Brass Head', '2', '100', NULL, 'nice inward from gate', 'GP0011', NULL, '2020-04-08', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Component', 'Tube', '2', '100', NULL, '100 received', 'GP0012', 'Components', '2020-04-08', 6, '2020-04-08', 'excellent', '2', 2, NULL, 'FI-3148'),
(18, 'Material', 'C-BH-13', 'PCS', '100', 100, 'ncie', 'GP0013', 'Magazine 2', '2020-04-08', 6, '2020-04-08', 'excellent', '2 bad', 2, 'PO-5644', 'PR-8908'),
(19, 'Material', 'C-TE-39', 'PCS', '20', 20, '20 received', 'GP0014', 'Magazine 2', '2020-04-09', 6, '2020-04-09', 'excellent', 'all best', 0, 'PO-502', 'PR-8564');

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

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_name`, `created_at`, `updated_at`) VALUES
(1, 'Sick', NULL, NULL);

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
(37, '2020_03_19_045422_create_store_magazine_2_table', 1),
(38, '2020_03_19_101312_create_vehicle_management_table', 1),
(39, '2020_03_19_103240_create_production_component_table', 1),
(40, '2020_03_19_103316_create_production_component_detail_table', 1),
(41, '2020_03_19_112924_create_component_table', 1),
(42, '2020_03_19_130558_create_production_component_store_table', 1),
(43, '2020_03_20_053810_create_store_stock_table', 1),
(44, '2020_03_20_124906_create_store_requisition_issued_table', 1),
(47, '2020_04_04_074923_create_purchase_requisitions_table', 2),
(49, '2020_04_04_102549_create_purchase_requisitions_detail_table', 3),
(50, '2020_04_04_120806_create_purchase_order_approval_table', 4),
(51, '2020_04_04_121630_create_purchase_order_approval_detail_table', 5),
(52, '2020_04_04_174345_create_ppra_order_table', 6),
(53, '2020_04_04_125706_create_setting_product_table', 7),
(54, '2020_04_04_125726_create_setting_material_table', 7),
(56, '2020_04_04_160714_create_sale_order_table', 8),
(57, '2020_04_07_164157_create_sale_order_products_table', 8),
(58, '2020_04_07_151906_create_salary_table', 9),
(59, '2020_04_08_080603_create_advance_table', 9),
(60, '2020_04_10_061512_create_customers_table', 10);

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
(3, 'App\\User', 9),
(3, 'App\\User', 17),
(5, 'App\\User', 2),
(5, 'App\\User', 3),
(5, 'App\\User', 4),
(5, 'App\\User', 5),
(5, 'App\\User', 6),
(5, 'App\\User', 7),
(5, 'App\\User', 8),
(5, 'App\\User', 16),
(8, 'App\\User', 15),
(12, 'App\\User', 10),
(13, 'App\\User', 11),
(14, 'App\\User', 12),
(15, 'App\\User', 13),
(16, 'App\\User', 14),
(17, 'App\\User', 18);

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

--
-- Dumping data for table `payment_term`
--

INSERT INTO `payment_term` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', NULL, NULL),
(2, 'Cheque', NULL, NULL);

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
(1, 'Dashboard', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(2, 'Production', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(3, 'Gate', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(4, 'Supplier', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(5, 'Sale', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(6, 'Purchase', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(7, 'Store', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(8, 'Quality', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(9, 'HR', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(10, 'Setting', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(11, 'Accept Leave Request', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(12, 'Apply for Attendance', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(13, 'Production Process', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(14, 'Product Transfer', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(15, 'Assign Stores', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(16, 'Purchase Requisition', 'web', '2020-04-04 02:12:56', '2020-04-04 02:12:56'),
(17, 'Approve Order', 'web', '2020-04-04 07:56:43', '2020-04-04 07:56:43'),
(18, 'Approve Requisition', 'web', '2020-04-06 05:00:58', '2020-04-06 05:00:58'),
(19, 'Tendor', 'web', '2020-04-09 11:54:55', '2020-04-09 11:54:55'),
(20, 'Tender', 'web', '2020-04-09 11:59:21', '2020-04-09 11:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `ppra_order`
--

CREATE TABLE `ppra_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) NOT NULL,
  `requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppra_order`
--

INSERT INTO `ppra_order` (`id`, `po_id`, `requisition_id`, `purchase_order_id`, `commercial_offer`, `technical_offer`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'PR-8244', 'PO-8934', 'This is commercial offers', 'This is technial offers', '1', 0, NULL, NULL),
(2, 11, 'PR-956', 'PO-4337', 'kdfmasodmoaksdmas', 'mkoaslmdopasmdpoas', '1', 0, NULL, NULL),
(3, 13, 'PR-1588', 'PO-3491', 'Add commercial offer', 'Add technical offer', '1', 0, NULL, NULL),
(4, 15, 'PR-2811', 'PO-2594', 'msaokdmoaskdm', 'okdmaspodmapos', '1', 0, NULL, NULL),
(5, 20, 'PR-2811', 'PO-7855', 'dasda', 'dsadas', '1', 0, NULL, NULL),
(6, 23, 'PR-8908', 'PO-5644', 'commercial', 'technical', '1', 0, NULL, NULL),
(7, 24, 'PR-8564', 'PO-502', 'commercial', 'technical', '1', 0, NULL, NULL),
(8, 26, 'PR-7089', 'PO-1298', 'commercial', 'technical', '1', 0, NULL, NULL),
(9, 28, 'PR-2634', 'PO-4233', 'commercial', 'technical', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_component`
--

CREATE TABLE `production_component` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturing_no` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_component`
--

INSERT INTO `production_component` (`id`, `component_requisition_id`, `gate_type`, `manufacturing_no`, `issue_date`, `create_date`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, '2020-03-24', '2020-03-24', NULL, NULL),
(2, NULL, NULL, 3, '2020-03-25', '2020-03-25', NULL, NULL),
(3, NULL, NULL, 2, '2020-03-25', '2020-03-25', NULL, NULL),
(4, NULL, NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(5, NULL, NULL, NULL, '2020-04-07', '2020-04-06', NULL, NULL),
(6, NULL, NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(7, 'MR-9828', 'outward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(8, 'CR-7517', 'outward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(9, 'CR-3550', 'inward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(10, 'CR-6229', 'inward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(11, 'CR-7520', 'outward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(12, 'CR-6265', 'inward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(13, 'CR-7846', 'outward', NULL, '2020-04-08', '2020-04-08', NULL, NULL),
(14, 'CR-9824', NULL, NULL, '2020-04-08', '2020-04-08', NULL, NULL),
(15, 'CR-6792', 'outward', NULL, '2020-04-08', '2020-04-08', NULL, NULL),
(16, 'CR-2975', 'outward', NULL, '2020-04-08', '2020-04-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_component_detail`
--

CREATE TABLE `production_component_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_component_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_component_detail`
--

INSERT INTO `production_component_detail` (`id`, `component_requisition_id`, `gate_type`, `component_name`, `quantity`, `description`, `production_component_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Brass Head', 100, 'Component Description', 1, 2, NULL, NULL),
(2, NULL, NULL, 'Primer', 100, 'Component Description', 1, 2, NULL, NULL),
(3, NULL, NULL, 'Tube', 100, 'Component Description', 1, 2, NULL, NULL),
(4, NULL, NULL, 'Base Wad', 100, 'Component Description', 1, 2, NULL, NULL),
(5, NULL, NULL, 'OP Wad', 100, 'Component Description', 1, 2, NULL, NULL),
(6, NULL, NULL, 'Closing Disk', 100, 'Component Description', 1, 2, NULL, NULL),
(7, NULL, NULL, 'Lead Shots', 100, 'Component Description', 1, 2, NULL, NULL),
(8, NULL, NULL, 'Obtrature', 100, 'Component Description', 1, 2, NULL, NULL),
(9, NULL, NULL, 'Propellant', 100, 'Component Description', 1, 2, NULL, NULL),
(10, NULL, NULL, 'Brass Head', 100, 'Component Description', 2, 2, NULL, NULL),
(11, NULL, NULL, 'Primer', 100, 'Component Description', 2, 2, NULL, NULL),
(12, NULL, NULL, 'Tube', 100, 'Component Description', 2, 2, NULL, NULL),
(13, NULL, NULL, 'Base Wad', 100, 'Component Description', 2, 2, NULL, NULL),
(14, NULL, NULL, 'OP Wad', 100, 'Component Description', 2, 2, NULL, NULL),
(15, NULL, NULL, 'Closing Disk', 100, 'Component Description', 2, 2, NULL, NULL),
(16, NULL, NULL, 'Lead Shots', 100, 'Component Description', 2, 2, NULL, NULL),
(17, NULL, NULL, 'Obtrature', 100, 'Component Description', 2, 2, NULL, NULL),
(18, NULL, NULL, 'Propellant', 100, 'Component Description', 2, 2, NULL, NULL),
(19, NULL, NULL, 'Brass Head', 100, 'Component Description', 3, 0, NULL, NULL),
(20, NULL, NULL, 'Primer', 100, 'Component Description', 3, 1, NULL, NULL),
(21, NULL, NULL, 'Tube', 100, 'Component Description', 3, 2, NULL, NULL),
(22, NULL, NULL, 'Base Wad', 100, 'Component Description', 3, 1, NULL, NULL),
(23, NULL, NULL, 'Brass Head', 4000, 'Make this to me for search this result for', 6, 1, NULL, NULL),
(24, NULL, NULL, 'Primer', 133, 'fasfadsadas', 6, 2, NULL, NULL),
(25, 'MR-9828', NULL, 'Obtrature', 1122, 'dasdasdas', 7, 0, NULL, NULL),
(26, 'CR-7517', 'inward', 'Brass Head', 1000, 'zcvzxcdsfsdfsd', 8, 0, NULL, NULL),
(27, 'CR-3550', 'inward', 'OP Wad', 133111, 'dsadasd', 9, 0, NULL, NULL),
(28, 'CR-6229', 'inward', 'Brass Head', 34, 'vbfgdgdf', 10, 0, NULL, NULL),
(29, 'CR-7520', 'outward', 'Obtrature', 133, 'fdsfsdf', 11, 4, NULL, NULL),
(30, 'CR-6265', 'inward', 'Brass Head', 4000, 'rewrwerw', 12, 5, NULL, NULL),
(31, 'CR-7846', 'outward', 'Tube', 100, 'nice', 13, 4, NULL, NULL),
(32, 'CR-9824', NULL, 'Tube', 100, 'nice 120 description', 14, 0, NULL, NULL),
(33, 'CR-6792', 'outward', 'Tube', 100, 'nice 100', 15, 4, NULL, NULL),
(34, 'CR-2975', 'outward', 'Tube', 100, '100 done', 16, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_component_store`
--

CREATE TABLE `production_component_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_component_store`
--

INSERT INTO `production_component_store` (`id`, `name`, `type`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Brass Head', 'Component', 4000, '2020-03-24 05:30:03', '2020-03-24 05:30:03'),
(2, 'Primer', 'Component', 133, '2020-03-24 05:30:03', '2020-03-24 05:30:03'),
(3, 'Tube', 'Component', 100, '2020-03-24 05:30:03', '2020-03-24 05:30:03'),
(4, 'Base Wad', 'Component', 0, '2020-03-24 05:30:04', '2020-03-24 05:30:04'),
(5, 'OP Wad', 'Component', 0, '2020-03-24 05:30:04', '2020-03-24 05:30:04'),
(6, 'Closing Disk', 'Component', 0, '2020-03-24 05:30:04', '2020-03-24 05:30:04'),
(7, 'Lead Shots', 'Component', 0, '2020-03-24 05:30:04', '2020-03-24 05:30:04'),
(8, 'Obtrature', 'Component', 0, '2020-03-24 05:30:04', '2020-03-24 05:30:04'),
(10, 'Propellant', 'Component', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_material`
--

CREATE TABLE `production_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturing_no` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_material`
--

INSERT INTO `production_material` (`id`, `material_requisition_id`, `gate_type`, `manufacturing_no`, `issue_date`, `create_date`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 2, '2020-03-24', '2020-03-24', NULL, NULL),
(2, NULL, NULL, 2, '2020-03-25', '2020-03-25', NULL, NULL),
(3, NULL, NULL, NULL, '2020-04-05', '2020-04-05', NULL, NULL),
(4, NULL, NULL, NULL, '2020-04-05', '2020-04-05', NULL, NULL),
(5, NULL, NULL, NULL, '2020-04-05', '2020-04-05', NULL, NULL),
(6, NULL, NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(7, 'MR-7512', NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(8, 'MR-3536', NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(9, 'MR-5259', NULL, NULL, '2020-04-07', '2020-04-06', NULL, NULL),
(10, 'MR-6896', NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(11, 'MR-9329', NULL, NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(12, 'MR-4788', 'outward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(13, 'MR-8642', 'inward', NULL, '2020-04-06', '2020-04-06', NULL, NULL),
(14, 'MR-1422', 'outward', NULL, '2020-04-06', '2020-04-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_material_detail`
--

CREATE TABLE `production_material_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UOM` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_material_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_material_detail`
--

INSERT INTO `production_material_detail` (`id`, `material_requisition_id`, `gate_type`, `material_name`, `UOM`, `quantity`, `description`, `production_material_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Plastic', 1, 100, 'Material Description', 1, 0, NULL, NULL),
(2, NULL, NULL, 'Soft Plastic', 1, 100, 'Material Description', 1, 2, NULL, NULL),
(3, NULL, NULL, 'Soft Plastic', 1, 100, 'Component Description', 2, 0, NULL, NULL),
(4, NULL, NULL, 'Plastic', 1, 100, 'Component Description', 2, 0, NULL, NULL),
(5, NULL, NULL, 'Soft Plastic', 1, 100, 'Component Description', 2, 0, NULL, NULL),
(6, NULL, NULL, 'Soft Plastic', 1, 100, 'Component Description', 2, 1, NULL, NULL),
(7, NULL, NULL, 'Tube', 1, 4000, 'i need', 3, 0, NULL, NULL),
(8, NULL, NULL, 'Brass Head', 4, 500, 'mome need', 4, 2, NULL, NULL),
(9, NULL, NULL, 'Tube', 6, 4000, 'i need this shit', 5, 0, NULL, NULL),
(10, NULL, NULL, 'Brass Head', 2, 133, 'i need this shit', 5, 0, NULL, NULL),
(11, NULL, NULL, 'Tube', 1, 4000, 'dsdsds', 6, 0, NULL, NULL),
(12, 'MR-3536', NULL, 'Tube', 1, 34, 'dasd', 8, 0, NULL, NULL),
(13, 'MR-5259', NULL, 'Tube', 1, 133, 'eerrtt', 9, 2, NULL, NULL),
(14, 'MR-6896', NULL, 'Tube', 1, 4000, 'description this is material description', 10, 1, NULL, NULL),
(15, 'MR-6896', NULL, 'Brass Head', 2, 10000, 'brass head', 10, 1, NULL, NULL),
(16, 'MR-9329', NULL, 'tube', 2, 99, 'i need', 11, 3, NULL, NULL),
(17, 'MR-9329', 'outward', 'Brass Head', 2, 999, 'we need', 11, 1, NULL, NULL),
(18, 'MR-4788', 'outward', 'Tube', 1, 4000, 'dsadas', 12, 4, NULL, NULL),
(19, 'MR-8642', 'inward', 'Tube', 1, 4000, 'need', 13, 1, NULL, NULL),
(20, 'MR-8642', 'inward', 'Brass Head', 2, 199, 'Need also thos', 13, 1, NULL, NULL),
(21, 'MR-1422', 'outward', 'Tube', 1, 45, 'fsmaodmas', 14, 4, NULL, NULL);

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
  `stage_status` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectionReason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectionQty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_order`
--

INSERT INTO `production_order` (`id`, `manufacturing_order`, `product`, `quantity`, `total_cost`, `status`, `production_deadline`, `created_date`, `stage_status`, `type`, `inspectionStatus`, `inspectionDate`, `rejectionReason`, `rejectionQty`, `created_at`, `updated_at`) VALUES
(1, 'MO-1', 'Kartoos', 100, 10000, 4, '2020-03-24', '2020-03-24', 3, 'Product', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'MO-2', 'Kartoos', 2000, 20000, 0, '2020-03-25', '2020-03-25', 0, 'Product', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'MO-3', 'Kartoos', 100, 100000, 4, '2020-03-25', '2020-03-25', 3, 'Product', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'MO-4', 'Kartoos', 12345, 123456, 0, '2020-04-10', '2020-04-08', 0, 'Product', NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_approval`
--

CREATE TABLE `purchase_order_approval` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `purchase_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(255) DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_approval`
--

INSERT INTO `purchase_order_approval` (`id`, `purchase_order_id`, `requisition_id`, `issue_date`, `purchase_type`, `upload`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 'PO-9128', 'PR-6129', '2020-04-04', 'direct-purchase', NULL, NULL, 3, NULL, NULL),
(10, 'PO-8934', 'PR-8244', '2020-04-04', 'ppra', NULL, 1, 3, NULL, NULL),
(11, 'PO-4337', 'PR-956', '2020-04-05', 'ppra', NULL, 1, 3, NULL, NULL),
(12, 'PO-8174', 'PR-1588', '2020-04-06', 'ppra', NULL, NULL, 1, NULL, NULL),
(13, 'PO-3491', 'PR-1588', '2020-04-06', 'ppra', NULL, 1, 3, NULL, NULL),
(14, 'PO-4559', 'PR-1588', '2020-04-06', 'ppra', NULL, NULL, 2, NULL, NULL),
(19, 'PO-321', 'PR-2811', '2020-04-07', 'ppra', NULL, NULL, 1, NULL, NULL),
(20, 'PO-7855', 'PR-2811', '2020-04-07', 'ppra', NULL, 1, 1, NULL, NULL),
(21, 'PO-3208', 'PR-8244', '2020-04-07', 'direct-purchase', NULL, NULL, 2, NULL, NULL),
(22, 'PO-4542', 'PR-8913', '2020-04-07', 'direct-purchase', NULL, 1, 3, NULL, NULL),
(23, 'PO-5644', 'PR-8908', '2020-04-08', 'ppra', NULL, 1, 3, NULL, NULL),
(24, 'PO-502', 'PR-8564', '2020-04-09', 'ppra', NULL, 1, 3, NULL, NULL),
(25, 'PO-2536', 'PR-7089', '2020-04-09', 'ppra', NULL, NULL, 4, NULL, NULL),
(26, 'PO-1298', 'PR-7089', '2020-04-09', 'ppra', NULL, 1, 1, NULL, NULL),
(27, 'PO-3492', 'PR-2634', '2020-04-09', 'ppra', NULL, NULL, 4, NULL, NULL),
(28, 'PO-4233', 'PR-2634', '2020-04-09', 'ppra', NULL, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_approval_detail`
--

CREATE TABLE `purchase_order_approval_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) NOT NULL,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_approval_detail`
--

INSERT INTO `purchase_order_approval_detail` (`id`, `po_id`, `purchase_order_id`, `material_name`, `uom`, `description`, `quantity`, `unit_price`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'PO-9128', 'C-OW-08', 'PCS', 'i need this', '5600', '122', '89009', 0, NULL, NULL),
(2, 9, 'PO-9128', 'C-OE-49', 'Liters', 'i also want this', '40000', '1222', '678822', 0, NULL, NULL),
(3, 10, 'PO-8934', 'C-LS-36', 'KG', 'sdasdasd', '3455', '15', '160000', 0, NULL, NULL),
(4, 10, 'PO-8934', 'C-PR-27', 'TON', 'dsadasdas', '1233', '4', '24000', 0, NULL, NULL),
(5, 11, 'PO-4337', 'C-TE-39', 'KG', 'i need a tube for making something', '5000', '40', '400000', 0, NULL, NULL),
(6, 11, 'PO-4337', 'C-PR-27', 'TON', 'i need in just two ton', '2', '10', '1211122', 0, NULL, NULL),
(7, 11, 'PO-4337', 'C-OE-49', 'PCS', 'i need this this this obstrature', '4000', '5', '200000', 0, NULL, NULL),
(8, 12, 'PO-8174', 'C-BH-13', 'PCS', 'i need this', '876', '20', '100000', 0, NULL, NULL),
(9, 13, 'PO-3491', 'C-BH-13', 'PCS', 'i need this', '876', '20', '100000', 0, NULL, NULL),
(10, 14, 'PO-4559', 'C-BH-13', 'PCS', 'i need this', '876', '34', '1233', 0, NULL, NULL),
(15, 19, 'PO-321', 'C-BH-13', 'PCS', 'dkoasmodas', '40000', '213', '12312', 0, NULL, NULL),
(16, 20, 'PO-7855', 'C-BH-13', 'PCS', 'dkoasmodas', '40000', '122', '12345', 0, NULL, NULL),
(17, 21, 'PO-3208', 'C-LS-36', 'KG', 'sdasdasd', '3455', '2131', '23123', 0, NULL, NULL),
(18, 21, 'PO-3208', 'C-PR-27', 'TON', 'dsadasdas', '1233', '1231', '2312312', 0, NULL, NULL),
(19, 22, 'PO-4542', 'C-BH-13', 'PCS', 'i need this shit', '4000', 'i122', '122222', 0, NULL, NULL),
(20, 23, 'PO-5644', 'C-BH-13', 'PCS', 'give', '100', '20', '2000', 0, NULL, NULL),
(21, 24, 'PO-502', 'C-TE-39', 'PCS', 'ncie', '20', '20', '400', 0, NULL, NULL),
(22, 25, 'PO-2536', 'C-TE-39', 'PCS', '10 request', '10', '2', '20', 1, NULL, NULL),
(23, 26, 'PO-1298', 'C-TE-39', 'PCS', '10 request', '10', '2', '20', 0, NULL, NULL),
(24, 27, 'PO-3492', 'C-BH-13', 'PCS', 'nice', '20', '20', '400', 1, NULL, NULL),
(25, 28, 'PO-4233', 'C-BH-13', 'PCS', 'nice', '20', '20', '400', 0, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requisitions`
--

CREATE TABLE `purchase_requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_requisitions`
--

INSERT INTO `purchase_requisitions` (`id`, `requisition_id`, `issue_date`, `status`, `created_at`, `updated_at`) VALUES
(5, 'PR-8244', '2020-04-04', 3, NULL, NULL),
(6, 'PR-6129', '2020-04-04', 0, NULL, NULL),
(7, 'PR-956', '2020-04-05', 0, NULL, NULL),
(8, 'PR-4936', '2020-04-06', 0, NULL, NULL),
(9, 'PR-9497', '2020-04-06', 0, NULL, NULL),
(10, 'PR-2335', '2020-04-06', 0, NULL, NULL),
(11, 'PR-1588', '2020-04-06', 0, NULL, NULL),
(12, 'PR-2811', '2020-04-07', 2, NULL, NULL),
(13, 'PR-4077', '2020-04-07', 0, NULL, NULL),
(14, 'PR-8913', '2020-04-07', 2, NULL, NULL),
(15, 'PR-8908', '2020-04-08', 2, NULL, NULL),
(16, 'PR-8564', '2020-04-09', 2, NULL, NULL),
(17, 'PR-7089', '2020-04-09', 2, NULL, NULL),
(18, 'PR-2634', '2020-04-09', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requisitions_detail`
--

CREATE TABLE `purchase_requisitions_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `req_id` int(255) NOT NULL,
  `requisition_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_requisitions_detail`
--

INSERT INTO `purchase_requisitions_detail` (`id`, `req_id`, `requisition_id`, `material_name`, `uom`, `description`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(15, 5, 'PR-8244', 'C-LS-36', 'KG', 'sdasdasd', '3455', 0, NULL, NULL),
(16, 5, 'PR-8244', 'C-PR-27', 'TON', 'dsadasdas', '1233', 0, NULL, NULL),
(17, 6, 'PR-6129', 'C-OW-08', 'PCS', 'i need this', '5600', 0, NULL, NULL),
(18, 6, 'PR-6129', 'C-OE-49', 'Liters', 'i also want this', '40000', 0, NULL, NULL),
(19, 7, 'PR-956', 'C-TE-39', 'KG', 'i need a tube for making something', '5000', 0, NULL, NULL),
(20, 7, 'PR-956', 'C-PR-27', 'TON', 'i need in just two ton', '2', 0, NULL, NULL),
(21, 7, 'PR-956', 'C-OE-49', 'PCS', 'i need this this this obstrature', '4000', 0, NULL, NULL),
(22, 8, 'PR-4936', 'C-BH-13', 'PCS', 'mome request for checking this', '786', 0, NULL, NULL),
(23, 9, 'PR-9497', 'C-PT-04', 'PCS', 'i need this', '7866', 0, NULL, NULL),
(24, 10, 'PR-2335', 'C-BH-13', 'PCS', 'i need this', '876', 0, NULL, NULL),
(25, 11, 'PR-1588', 'C-BH-13', 'PCS', 'i need this', '876', 0, NULL, NULL),
(26, 12, 'PR-2811', 'C-BH-13', 'PCS', 'dkoasmodas', '40000', 0, NULL, NULL),
(27, 13, 'PR-4077', 'C-BH-13', 'PCS', 'i need this shit', '4000', 0, NULL, NULL),
(28, 14, 'PR-8913', 'C-BH-13', 'PCS', 'i need this shit', '4000', 0, NULL, NULL),
(29, 15, 'PR-8908', 'C-BH-13', 'PCS', 'give', '100', 0, NULL, NULL),
(30, 16, 'PR-8564', 'C-TE-39', 'PCS', 'ncie', '20', 0, NULL, NULL),
(31, 17, 'PR-7089', 'C-TE-39', 'PCS', '10 request', '10', 0, NULL, NULL),
(32, 18, 'PR-2634', 'C-BH-13', 'PCS', 'nice', '20', 0, NULL, NULL);

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
(1, 'GM', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(2, 'Admin', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(3, 'Assistant Manager', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(4, 'Officers', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(5, 'Manager', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(6, 'writer', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(7, 'Accountant', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(8, 'HR', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(9, 'Inspection Manager', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(10, 'Inspection Manager', 'web', '2020-03-24 05:30:01', '2020-03-24 05:30:01'),
(11, 'Technical Officer', 'web', '2020-03-24 05:30:02', '2020-03-24 05:30:02'),
(12, 'Gate Employee', 'web', '2020-03-25 02:59:14', '2020-03-25 02:59:14'),
(13, 'Production Employee', 'web', '2020-03-25 02:59:31', '2020-03-25 02:59:31'),
(14, 'Store Employee', 'web', '2020-03-25 03:01:00', '2020-03-25 03:01:00'),
(15, 'Purchase Employee', 'web', '2020-03-25 03:01:27', '2020-03-25 03:01:27'),
(16, 'Quality Employee', 'web', '2020-03-25 03:02:08', '2020-03-25 03:02:08'),
(17, 'QC', 'web', '2020-04-06 05:56:37', '2020-04-06 05:56:37');

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
(1, 5),
(2, 1),
(2, 5),
(2, 13),
(3, 1),
(3, 5),
(3, 12),
(4, 1),
(4, 5),
(4, 15),
(5, 1),
(5, 5),
(6, 1),
(6, 5),
(6, 15),
(7, 1),
(7, 5),
(7, 14),
(8, 1),
(8, 5),
(8, 16),
(9, 1),
(9, 5),
(9, 8),
(10, 1),
(11, 1),
(11, 5),
(11, 8),
(12, 5),
(12, 8),
(13, 1),
(13, 5),
(13, 13),
(14, 1),
(14, 5),
(14, 13),
(15, 1),
(15, 5),
(15, 14),
(16, 1),
(16, 3),
(16, 5),
(17, 1),
(17, 5),
(18, 3),
(19, 1),
(19, 13),
(19, 15),
(20, 1),
(20, 15);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `salaryDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `so_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_order`
--

INSERT INTO `sale_order` (`id`, `so_number`, `date`, `delivery_date`, `customer_id`, `status`) VALUES
(1, 'SO001', '2020-04-08', '2020-04-09', 'CS001', 0),
(2, 'SO002', '2021-04-08', '2020-04-09', 'CS002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_products`
--

CREATE TABLE `sale_order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `so_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_order_products`
--

INSERT INTO `sale_order_products` (`id`, `so_number`, `product_code`, `uom`, `qty`, `description`) VALUES
(1, 'SO001', 'P0001', 2, 100, 'Product Description'),
(2, 'SO001', 'P0001', 2, 100, 'Product Description'),
(3, 'SO002', 'P0001', 2, 8797, 'Product Description'),
(4, 'SO002', 'P0002', 2, 77789, 'Product Description');

-- --------------------------------------------------------

--
-- Table structure for table `setting_material`
--

CREATE TABLE `setting_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_product`
--

CREATE TABLE `setting_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_product`
--

INSERT INTO `setting_product` (`id`, `product_name`, `product_code`, `created_at`, `updated_at`) VALUES
(1, 'Kartoos', 'P0001', NULL, NULL),
(2, 'Red Kartoos', 'P0002', NULL, NULL);

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
-- Table structure for table `store_components`
--

CREATE TABLE `store_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_components`
--

INSERT INTO `store_components` (`id`, `manufacturing_order`, `name`, `quantity`, `total_cost`, `stored_date`, `status`) VALUES
(1, 'CO-1', 'Brass Head', 50, 10000, '2020-03-25', 0),
(2, 'CO-3', 'Tube', 1000, 100000, '2020-03-25', 0),
(3, 'Imported', 'Brass Head', 876, NULL, '2020-03-30', 0),
(4, 'Imported', 'OP Wad', 7660, NULL, '2020-03-30', 0),
(5, 'CO-4', 'Tube', 200, 40000, '2020-04-03', 0),
(6, 'Imported', 'OP Wad', 7660, NULL, '2020-04-08', 0),
(7, 'CO-6', 'Tube', 12, 1233, '2020-04-08', 0),
(8, 'Imported', 'Tube', 98, NULL, '2020-04-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_finished_goods_1`
--

CREATE TABLE `store_finished_goods_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturing_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_finished_goods_1`
--

INSERT INTO `store_finished_goods_1` (`id`, `manufacturing_order`, `name`, `quantity`, `total_cost`, `stored_date`, `status`) VALUES
(1, 'MO-1', 'Kartoos', 100, 10000, '2020-04-07', 0),
(2, 'MO-1', 'Kartoos', 100, 10000, '2020-04-08', 0),
(3, 'MO-3', 'Kartoos', 100, 100000, '2020-04-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_finished_goods_2`
--

CREATE TABLE `store_finished_goods_2` (
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
-- Table structure for table `store_magazine_1`
--

CREATE TABLE `store_magazine_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_magazine_1`
--

INSERT INTO `store_magazine_1` (`id`, `materialName`, `uom`, `quantity`, `stored_date`, `status`) VALUES
(1, 'Soft Plastic', 'KG', 100000, '2020-03-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_magazine_2`
--

CREATE TABLE `store_magazine_2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `stored_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_magazine_2`
--

INSERT INTO `store_magazine_2` (`id`, `materialName`, `uom`, `quantity`, `stored_date`, `status`) VALUES
(1, 'Plastic', 'KG', 99300, '2020-03-30', 0),
(2, 'Brass Head', 'KG', 7666, '2020-04-01', 0),
(3, 'Brass Head', 'KG', 7666, '2020-04-01', 0),
(4, 'Brass Head', 'KG', 788, '2020-04-01', 0),
(5, 'Brass Head', 'KG', 788, '2020-04-08', 0),
(6, 'Brass Head', 'KG', 788, '2020-04-08', 0),
(7, 'C-BH-13', 'PCS', 98, '2020-04-08', 0),
(8, 'C-TE-39', 'PCS', 20, '2020-04-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_requisition_issued`
--

CREATE TABLE `store_requisition_issued` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `issued_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_requisition_issued`
--

INSERT INTO `store_requisition_issued` (`id`, `transaction_id`, `store_location`, `name`, `quantity`, `issued_date`) VALUES
(1, 'TNC001', 'Components', 'Tube', 100, '2020-03-25'),
(2, 'TNC002', 'Magazine 1', 'Soft Plastic', 100, '2020-03-27'),
(3, 'TNC003', 'Magazine 2', 'Brass Head', 500, '2020-04-05'),
(4, 'TNC004', 'Magazine 2', 'Brass Head', 4000, '2020-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `store_stock`
--

CREATE TABLE `store_stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_stock`
--

INSERT INTO `store_stock` (`id`, `name`, `quantity`, `store_location`, `date_updated`) VALUES
(1, 'Brass Head', 926, 'Components', '2020-03-30'),
(2, 'Tube', 1210, 'Components', '2020-04-08'),
(3, 'Propellant', 99900, 'Magazine 1', '2020-03-27'),
(5, 'OP Wad', 15320, 'Components', '2020-04-08'),
(6, 'Primer', 4742, 'Magazine 2', '2020-04-08'),
(7, 'Kartoos', 300, 'Finished Goods 1', '2020-04-08'),
(8, 'C-BH-13', 98, 'Components', '2020-04-08'),
(9, 'C-TE-39', 20, 'Components', '2020-04-09');

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
(1, 'SP001', 'PKR', 'Vendor One', '03075340662', '42342', 'Monthly', 'vendor@gmail.com', 'Active', '12122123', 'Punjab', 'Lahore', '3332222', '112321321', 'Good', 'MCB', 'Islmapura', '888-212121-21212312', '2020-04-04 04:43:53', NULL);

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
(2, 'PCS', NULL, NULL),
(4, 'TON', NULL, NULL),
(6, 'Liters', NULL, NULL);

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
(1, 'Shoaib Arshad', NULL, 'shoaibarshad@gmail.com', NULL, '$2y$10$CeV5XThutGNT4M0V.mcJhOSP/Fw8AjeNcIlkmMyeAeZqDsDkqd0fa', NULL, '2020-03-24 05:30:03', '2020-03-24 05:30:03'),
(10, 'kaleem', NULL, 'kaleem@gmail.com', NULL, '$2y$10$K0RNVmBP3kUfRaoZbmWnH.t8cZZvDy5gJUefZNynnA/DHqOMsoikq', NULL, '2020-03-25 05:20:49', '2020-03-25 05:20:49'),
(11, 'Moueed', NULL, 'moueed@gmail.com', NULL, '$2y$10$Fic2g6qGkRKewMGI96TBGesLtSsgX0lGlrsLX0b2kI44GNFnuqFea', NULL, '2020-03-25 05:22:46', '2020-03-25 05:22:46'),
(12, 'fezan', NULL, 'fezan@gmail.com', NULL, '$2y$10$GhGMlQYKAe33S9v114JfpuNBau1/W1GhQuLvreGoI0iRNmc5NhnIC', NULL, '2020-03-25 05:23:45', '2020-03-25 05:23:45'),
(13, 'Tamoor', NULL, 'tamoor@gmail.com', NULL, '$2y$10$LqPVlEGAzTvdFKQshxy2leldnp6xLIWS5lo2u.IEcKbpjDWcQvLX.', NULL, '2020-03-25 05:24:47', '2020-03-25 05:24:47'),
(14, 'muzamil', NULL, 'muzamil@gmail.com', NULL, '$2y$10$dkz3JOANGn6jCoWXJFab0egHiXCr4Ozmcdt90eAgqMqbYTR/cYRdW', NULL, '2020-03-25 05:26:09', '2020-03-25 05:26:09'),
(15, 'Numair', NULL, 'numair@gmail.com', NULL, '$2y$10$v2XJ2WATnaY7ePHilclRneOjnllZ9uSg./N6bbbcoxSRjag7M8WSe', NULL, '2020-03-25 05:27:04', '2020-03-25 05:27:04'),
(16, 'Feraz', NULL, 'feraz@gmail.com', NULL, '$2y$10$n1xQCtIA3Lhr/ah9RsTjmeseO7rYp2NNLAkgpYu04CZsUFnNyhyiO', NULL, '2020-03-25 05:28:05', '2020-03-25 05:28:05'),
(17, 'nabeel', NULL, 'nabeel@gmail.com', NULL, '$2y$10$9IWkX83AgcGo/2K5JgEyk.3/KauCUNAkURxPU8qb3IGeDulr7o/fC', NULL, '2020-03-25 05:28:54', '2020-03-25 05:28:54'),
(18, 'QC', NULL, 'qc@gmail.com', NULL, '$2y$10$9mhKJcN8C9hkR7GU.S0MqO5T.781I9DDBmGdeyBBtWk5mCmn0EBrW', NULL, '2020-04-06 05:59:40', '2020-04-06 05:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_management`
--

CREATE TABLE `vehicle_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_meter_reading` int(11) NOT NULL,
  `in_meter_reading` int(11) DEFAULT NULL,
  `out_time` datetime NOT NULL,
  `in_time` datetime DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_management`
--

INSERT INTO `vehicle_management` (`id`, `record_id`, `vehicle_no`, `vehicle_name`, `staff_id`, `staff_name`, `from`, `to`, `out_meter_reading`, `in_meter_reading`, `out_time`, `in_time`, `distance`, `status`) VALUES
(1, 'V001', 'LEH-8825', 'Truck', 'SI001', 'Khalid', 'Factory', 'Zain Customer', 8789000, 8789100, '2020-03-27 18:05:53', '2020-03-30 10:09:27', 100, 1),
(2, 'V002', 'LEH-8829', 'Pic Up', 'SI003', 'Rizwan', 'Factory', 'Ali Customer', 123456, NULL, '2020-03-30 15:03:33', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance`
--
ALTER TABLE `advance`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `ppra_order`
--
ALTER TABLE `ppra_order`
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
-- Indexes for table `production_component_store`
--
ALTER TABLE `production_component_store`
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
-- Indexes for table `purchase_order_approval`
--
ALTER TABLE `purchase_order_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_approval_detail`
--
ALTER TABLE `purchase_order_approval_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_requisitions`
--
ALTER TABLE `purchase_requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_requisitions_detail`
--
ALTER TABLE `purchase_requisitions_detail`
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
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_products`
--
ALTER TABLE `sale_order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_material`
--
ALTER TABLE `setting_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_product`
--
ALTER TABLE `setting_product`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `store_components`
--
ALTER TABLE `store_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_finished_goods_1`
--
ALTER TABLE `store_finished_goods_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_finished_goods_2`
--
ALTER TABLE `store_finished_goods_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_magazine_1`
--
ALTER TABLE `store_magazine_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_magazine_2`
--
ALTER TABLE `store_magazine_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_requisition_issued`
--
ALTER TABLE `store_requisition_issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_stock`
--
ALTER TABLE `store_stock`
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
-- Indexes for table `vehicle_management`
--
ALTER TABLE `vehicle_management`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance`
--
ALTER TABLE `advance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `duty_schedule`
--
ALTER TABLE `duty_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inward_gate_pass`
--
ALTER TABLE `inward_gate_pass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inward_goods_receipt`
--
ALTER TABLE `inward_goods_receipt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inward_raw_material`
--
ALTER TABLE `inward_raw_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ppra_order`
--
ALTER TABLE `ppra_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `production_component`
--
ALTER TABLE `production_component`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `production_component_detail`
--
ALTER TABLE `production_component_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `production_component_store`
--
ALTER TABLE `production_component_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `production_material`
--
ALTER TABLE `production_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `production_material_detail`
--
ALTER TABLE `production_material_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_approval`
--
ALTER TABLE `purchase_order_approval`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase_order_approval_detail`
--
ALTER TABLE `purchase_order_approval_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_requisitions`
--
ALTER TABLE `purchase_requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase_requisitions_detail`
--
ALTER TABLE `purchase_requisitions_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale_order_products`
--
ALTER TABLE `sale_order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting_material`
--
ALTER TABLE `setting_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_product`
--
ALTER TABLE `setting_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store_components`
--
ALTER TABLE `store_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_finished_goods_1`
--
ALTER TABLE `store_finished_goods_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_finished_goods_2`
--
ALTER TABLE `store_finished_goods_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_magazine_1`
--
ALTER TABLE `store_magazine_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_magazine_2`
--
ALTER TABLE `store_magazine_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_requisition_issued`
--
ALTER TABLE `store_requisition_issued`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_stock`
--
ALTER TABLE `store_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vehicle_management`
--
ALTER TABLE `vehicle_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
