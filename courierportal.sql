-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 03:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courierportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_books`
--

CREATE TABLE `address_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Sender','Receiver') COLLATE utf8mb4_unicode_ci DEFAULT 'Receiver',
  `address1` text COLLATE utf8mb4_unicode_ci,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `address3` text COLLATE utf8mb4_unicode_ci,
  `postalcode` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_books`
--

INSERT INTO `address_books` (`id`, `name`, `email`, `phone_number`, `company`, `country_id`, `state`, `city`, `type`, `address1`, `address2`, `address3`, `postalcode`, `created_by`, `created_at`, `updated_at`) VALUES
(36, 'Leona Horton Horton', NULL, NULL, NULL, 1, NULL, 'ahmedabad', 'Receiver', '2674 Shelley St', NULL, NULL, '382350', 1, '2019-07-02 05:09:20', '2019-07-02 05:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `agent_prices`
--

CREATE TABLE `agent_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `zones_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `agent_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_wallet_logs`
--

CREATE TABLE `agent_wallet_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('add','reduce') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'add',
  `changed_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `current_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booked_by` int(11) NOT NULL,
  `mail_notify` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 = yes, 0 = No',
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci DEFAULT 'unpaid',
  `handling_price` decimal(10,2) DEFAULT NULL,
  `current_status` int(11) DEFAULT NULL,
  `package_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_instruction` text COLLATE utf8mb4_unicode_ci,
  `actual_weight` decimal(10,2) DEFAULT NULL,
  `volumetric_weight` decimal(10,2) NOT NULL,
  `upx_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `agent_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `final_insure_amt` decimal(10,2) DEFAULT NULL,
  `final_upx_price` decimal(10,2) DEFAULT NULL,
  `final_agent_price` decimal(10,2) DEFAULT NULL,
  `price_per_kg_upx` decimal(10,2) DEFAULT '0.00',
  `price_per_kg_agent` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booked_by`, `mail_notify`, `payment_status`, `handling_price`, `current_status`, `package_type`, `tracking_number`, `booking_instruction`, `actual_weight`, `volumetric_weight`, `upx_price`, `agent_price`, `final_insure_amt`, `final_upx_price`, `final_agent_price`, `price_per_kg_upx`, `price_per_kg_agent`, `created_at`, `updated_at`) VALUES
(136, 1, '1', 'unpaid', '10.00', 3, 'Box', 'UPJ5MVV51I', 'No', '22.51', '0.79', '82.62', '82.62', '22.00', '114.62', '0.00', '3.67', '3.67', '2019-07-01 01:52:50', '2019-07-02 04:52:09'),
(137, 1, '1', 'paid', '10.00', 3, 'Iphone devices', 'UPH7NAXWGK', 'No', '16.63', '0.07', '61.03', '61.03', '3.00', '74.03', '0.00', '3.67', '3.67', '2019-07-01 03:20:33', '2019-07-02 04:52:09'),
(138, 1, '1', 'paid', '10.00', 4, 'Box', 'UP1DVUWSRD', 'No', '14.91', '2.32', '54.73', '54.73', '24.00', '88.73', '0.00', '3.67', '3.67', '2019-07-01 06:59:34', '2019-07-03 07:50:09'),
(139, 3, '1', 'paid', '10.00', 3, 'Box', 'UPI6PXBP83', 'No', '22.30', '2.43', '81.84', '0.00', '13.00', '104.84', '13.00', '3.67', '0.00', '2019-07-01 07:56:13', '2019-07-02 06:27:15'),
(140, 1, '1', 'paid', '10.00', 6, 'Box', 'UP7SJ6EZHY', 'No', '7.00', '2.00', '25.69', '25.69', '13.00', '48.69', '0.00', '3.67', '3.67', '2019-07-01 08:35:46', '2019-07-03 07:51:34'),
(141, 1, '0', 'paid', '10.00', 1, 'Box', 'UPZSRSNSZ9', 'No', '24.00', '1.00', '88.08', '88.08', '13.00', '111.08', '0.00', '3.67', '3.67', '2019-07-04 07:01:03', '2019-07-04 07:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `booking_addresses`
--

CREATE TABLE `booking_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) NOT NULL,
  `type` enum('sender','receiver','return') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `address3` text COLLATE utf8mb4_unicode_ci,
  `country_id` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_addresses`
--

INSERT INTO `booking_addresses` (`id`, `booking_id`, `type`, `name`, `lastname`, `email`, `address1`, `address2`, `address3`, `country_id`, `state`, `city`, `postalcode`, `phonenumber`, `company`, `created_at`, `updated_at`) VALUES
(278, 136, 'sender', 'Leona', 'Horton', 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', '2674 Shelley St', 1, 'Gujarat', 'ahmedabad', '382350', '7203957277', 'Whiz', '2019-07-01 01:52:50', '2019-07-01 01:52:50'),
(279, 136, 'receiver', 'Leona Horton Horton', NULL, 'toni.white56@mailinator.com', 'New naroda', NULL, NULL, 1, 'Brentwood', 'Ahmedabad', '78945612', NULL, NULL, '2019-07-01 01:52:50', '2019-07-01 01:52:50'),
(280, 137, 'sender', 'Leona', 'Horton', 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', '7155 Crosstimber Ct', 1, 'Gujarat', 'ahmedabad', '382350', '7203957277', '2674 Shelley St', '2019-07-01 03:20:33', '2019-07-01 03:20:33'),
(281, 137, 'receiver', 'Leona Horton Horton', NULL, 'toni.white56@mailinator.com', '7155 Crosstimber Ct', '7155 Crosstimber Ct', NULL, 1, 'Gujarat', 'ahmedabad', '382350', NULL, NULL, '2019-07-01 03:20:33', '2019-07-01 03:20:33'),
(282, 138, 'sender', 'Leona', 'Horton', 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', '2674 Shelley St', 1, 'Gujarat', 'ahmedabad', '382350', '7203957277', '2674 Shelley St', '2019-07-01 06:59:34', '2019-07-01 06:59:34'),
(283, 138, 'receiver', 'Brandy Oliver', NULL, 'brandy.oliver55@mailinator.com', 'New naroda', '2674 Shelley St', NULL, 1, 'Gujarat', 'Ahmedabad', '382350', NULL, NULL, '2019-07-01 06:59:34', '2019-07-01 06:59:34'),
(284, 139, 'sender', 'Leona', 'Horton', 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', '2674 Shelley St', 1, 'Gujarat', 'ahmedabad', '382350', '7203957277', '2674 Shelley St', '2019-07-01 07:56:13', '2019-07-01 07:56:13'),
(285, 139, 'receiver', 'Leona Horton Horton', NULL, 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', NULL, 1, 'Brentwood', 'Ahmedabad', '78945612', NULL, NULL, '2019-07-01 07:56:13', '2019-07-01 07:56:13'),
(286, 140, 'sender', 'Leona', 'Horton', 'erica.griffin46@mailinator.com', 'CA 94513', '2674 Shelley St', '2674 Shelley St', 1, 'Gujarat', 'ahmedabad', '382350', '7203957277', '2674 Shelley St', '2019-07-01 08:35:46', '2019-07-01 08:35:46'),
(287, 140, 'receiver', 'Leona Horton Horton', NULL, 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', NULL, 1, 'Gujarat', 'ahmedabad', '382350', '8763860785', NULL, '2019-07-01 08:35:46', '2019-07-01 08:35:46'),
(288, 141, 'sender', 'Leona', 'Horton', 'erica.griffin46@mailinator.com', '2674 Shelley St', '2674 Shelley St', '7155 Crosstimber Ct', 1, 'Gujarat', 'ahmedabad', '382350', '7203957277', '2674 Shelley St', '2019-07-04 07:01:03', '2019-07-04 07:01:03'),
(289, 141, 'receiver', 'Leona Horton Horton', NULL, 'toni.white56@mailinator.com', '2674 Shelley St', '7155 Crosstimber Ct', NULL, 1, NULL, 'ahmedabad', '382350', NULL, NULL, '2019-07-04 07:01:03', '2019-07-04 07:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `booking_dimensions`
--

CREATE TABLE `booking_dimensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) NOT NULL,
  `lenth` decimal(5,2) NOT NULL DEFAULT '0.00',
  `width` decimal(5,2) NOT NULL DEFAULT '0.00',
  `height` decimal(5,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(5,2) NOT NULL DEFAULT '0.00',
  `insure_amt` decimal(5,2) DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `total_on_dimension` decimal(5,2) DEFAULT '0.00',
  `total_on_weight` decimal(5,2) DEFAULT '0.00',
  `box_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_dimensions`
--

INSERT INTO `booking_dimensions` (`id`, `booking_id`, `lenth`, `width`, `height`, `weight`, `insure_amt`, `description`, `total_on_dimension`, `total_on_weight`, `box_number`, `created_at`, `updated_at`) VALUES
(165, 136, '12.00', '21.00', '12.00', '21.01', '1.00', 'Box -1 Iphone devices in it.', '0.00', '0.00', NULL, '2019-07-01 01:52:50', '2019-07-01 01:52:50'),
(166, 136, '12.00', '12.00', '12.00', '1.50', '21.00', 'Box-2 Cell', '0.00', '0.00', NULL, '2019-07-01 01:52:50', '2019-07-01 01:52:50'),
(167, 137, '12.00', '12.00', '1.00', '2.20', '1.00', 'Box -1', '0.00', '0.00', 'BOXD5J373R', '2019-07-01 03:20:33', '2019-07-01 03:20:33'),
(168, 137, '21.00', '12.00', '1.00', '12.20', '1.00', 'Box -2', '0.00', '0.00', 'BOXYG02SYR', '2019-07-01 03:20:33', '2019-07-01 03:20:33'),
(169, 137, '1.00', '2.00', '2.00', '2.23', '1.00', 'Box -3', '0.00', '0.00', 'BOX1WTY03J', '2019-07-01 03:20:33', '2019-07-01 03:20:33'),
(170, 138, '12.00', '12.00', '12.00', '12.01', '12.00', 'Box 1 description', '0.00', '0.00', 'BOX7UYSOTN', '2019-07-01 06:59:34', '2019-07-01 06:59:34'),
(171, 138, '23.00', '23.00', '23.00', '2.90', '12.00', 'Box 2 description', '0.00', '0.00', 'BOXLQGI379', '2019-07-01 06:59:34', '2019-07-01 06:59:34'),
(172, 139, '12.00', '21.00', '21.00', '21.20', '1.00', 'Box-1', '0.00', '0.00', 'BOXWLJCERO', '2019-07-01 07:56:13', '2019-07-01 07:56:13'),
(173, 139, '21.00', '21.00', '21.00', '1.10', '12.00', 'Box-2', '0.00', '0.00', 'BOXMLK80XW', '2019-07-01 07:56:13', '2019-07-01 07:56:13'),
(174, 140, '12.00', '21.00', '21.00', '5.30', '1.00', 'Box 1', '0.00', '0.00', 'BOX6KXS2BW', '2019-07-01 08:35:46', '2019-07-01 08:35:46'),
(175, 140, '12.00', '12.00', '21.00', '1.01', '12.00', 'no', '0.00', '0.00', 'BOX6RDBJOY', '2019-07-01 08:35:46', '2019-07-01 08:35:46'),
(176, 141, '12.00', '12.00', '12.00', '12.01', '12.00', 'no', '0.00', '0.00', 'BOXTK0YYN4', '2019-07-04 07:01:03', '2019-07-04 07:01:03'),
(177, 141, '12.00', '21.00', '21.00', '12.21', '1.00', 'no', '0.00', '0.00', 'BOXWBST05N', '2019-07-04 07:01:03', '2019-07-04 07:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status_logs`
--

CREATE TABLE `booking_status_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_status_logs`
--

INSERT INTO `booking_status_logs` (`id`, `booking_id`, `status`, `created_at`, `updated_at`) VALUES
(272, 136, 'shipped', '2019-07-01 01:52:50', '2019-07-01 01:52:50'),
(273, 137, 'shipped', '2019-07-01 03:20:33', '2019-07-01 03:20:33'),
(274, 138, 'shipped', '2019-07-01 06:59:34', '2019-07-01 06:59:34'),
(275, 139, 'shipped', '2019-07-01 07:56:13', '2019-07-01 07:56:13'),
(276, 140, 'shipped', '2019-07-01 08:35:46', '2019-07-01 08:35:46'),
(277, 139, 'Collected', '2019-07-02 02:25:01', '2019-07-02 02:25:01'),
(278, 138, 'Collected', '2019-07-02 04:50:03', '2019-07-02 04:50:03'),
(279, 137, 'Out for delivery', '2019-07-02 04:50:08', '2019-07-02 04:50:08'),
(280, 136, 'Collected', '2019-07-02 04:51:59', '2019-07-02 04:51:59'),
(281, 137, 'Collected', '2019-07-02 04:51:59', '2019-07-02 04:51:59'),
(282, 138, 'Collected', '2019-07-02 04:51:59', '2019-07-02 04:51:59'),
(283, 139, 'Collected', '2019-07-02 04:51:59', '2019-07-02 04:51:59'),
(284, 140, 'Collected', '2019-07-02 04:51:59', '2019-07-02 04:51:59'),
(285, 136, 'Out for delivery', '2019-07-02 04:52:09', '2019-07-02 04:52:09'),
(286, 137, 'Out for delivery', '2019-07-02 04:52:09', '2019-07-02 04:52:09'),
(287, 138, 'Out for delivery', '2019-07-02 04:52:09', '2019-07-02 04:52:09'),
(288, 139, 'Out for delivery', '2019-07-02 04:52:09', '2019-07-02 04:52:09'),
(289, 140, 'Out for delivery', '2019-07-02 04:52:09', '2019-07-02 04:52:09'),
(290, 138, 'In transit', '2019-07-03 07:50:13', '2019-07-03 07:50:13'),
(291, 140, 'Delivered', '2019-07-03 07:51:38', '2019-07-03 07:51:38'),
(292, 141, 'shipped', '2019-07-04 07:01:03', '2019-07-04 07:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'dilip', 'dilip@mailinator.com', 'No', '2019-07-03 18:30:00', '2019-07-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(5, 'default', '{\"displayName\":\"App\\\\Jobs\\\\StoreSenderReceiverAddress\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\StoreSenderReceiverAddress\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\StoreSenderReceiverAddress\\\":9:{s:8:\\\"\\u0000*\\u0000input\\\";a:45:{s:14:\\\"booking_status\\\";s:1:\\\"1\\\";s:8:\\\"coutry_s\\\";s:1:\\\"1\\\";s:12:\\\"first_name_s\\\";s:5:\\\"Leona\\\";s:11:\\\"last_name_s\\\";s:6:\\\"Horton\\\";s:7:\\\"email_s\\\";s:30:\\\"erica.griffin46@mailinator.com\\\";s:9:\\\"company_s\\\";s:15:\\\"2674 Shelley St\\\";s:7:\\\"phone_s\\\";s:10:\\\"7203957277\\\";s:10:\\\"address1_s\\\";s:15:\\\"2674 Shelley St\\\";s:10:\\\"address2_s\\\";s:15:\\\"2674 Shelley St\\\";s:10:\\\"address3_s\\\";s:19:\\\"7155 Crosstimber Ct\\\";s:13:\\\"postal_code_s\\\";s:6:\\\"382350\\\";s:7:\\\"state_s\\\";s:7:\\\"Gujarat\\\";s:6:\\\"city_s\\\";s:9:\\\"ahmedabad\\\";s:9:\\\"country_r\\\";s:1:\\\"1\\\";s:11:\\\"full_name_r\\\";s:19:\\\"Leona Horton Horton\\\";s:7:\\\"email_r\\\";s:27:\\\"toni.white56@mailinator.com\\\";s:9:\\\"company_r\\\";N;s:7:\\\"phone_r\\\";N;s:10:\\\"address1_r\\\";s:15:\\\"2674 Shelley St\\\";s:10:\\\"address2_r\\\";s:19:\\\"7155 Crosstimber Ct\\\";s:10:\\\"address3_r\\\";N;s:13:\\\"postal_code_r\\\";s:6:\\\"382350\\\";s:7:\\\"state_r\\\";N;s:6:\\\"city_r\\\";s:9:\\\"ahmedabad\\\";s:9:\\\"country_d\\\";s:1:\\\"1\\\";s:12:\\\"first_name_d\\\";N;s:11:\\\"last_name_d\\\";N;s:7:\\\"email_d\\\";N;s:9:\\\"company_d\\\";N;s:7:\\\"phone_d\\\";N;s:10:\\\"address1_d\\\";N;s:10:\\\"address2_d\\\";N;s:10:\\\"address3_d\\\";N;s:13:\\\"postal_code_d\\\";N;s:7:\\\"state_d\\\";N;s:6:\\\"city_d\\\";N;s:12:\\\"package_type\\\";s:3:\\\"Box\\\";s:19:\\\"booking_instruction\\\";s:2:\\\"No\\\";s:6:\\\"length\\\";a:2:{i:0;s:2:\\\"12\\\";i:1;s:2:\\\"12\\\";}s:5:\\\"width\\\";a:2:{i:0;s:2:\\\"12\\\";i:1;s:2:\\\"21\\\";}s:6:\\\"height\\\";a:2:{i:0;s:2:\\\"12\\\";i:1;s:2:\\\"21\\\";}s:2:\\\"kg\\\";a:2:{i:0;s:2:\\\"12\\\";i:1;s:2:\\\"12\\\";}s:4:\\\"gram\\\";a:2:{i:0;s:2:\\\"12\\\";i:1;s:3:\\\"210\\\";}s:9:\\\"insureamt\\\";a:2:{i:0;s:2:\\\"12\\\";i:1;s:1:\\\"1\\\";}s:11:\\\"description\\\";a:2:{i:0;s:2:\\\"no\\\";i:1;s:2:\\\"no\\\";}}s:9:\\\"\\u0000*\\u0000userid\\\";i:1;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1562243463, 1562243463);

-- --------------------------------------------------------

--
-- Table structure for table `log_statuses`
--

CREATE TABLE `log_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_statuses`
--

INSERT INTO `log_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shipped', '2019-06-09 23:36:07', '2019-06-09 23:36:07'),
(2, 'Collected', '2019-06-09 18:30:00', '2019-06-09 18:30:00'),
(3, 'Out for delivery', '2019-06-09 23:36:07', '2019-06-09 23:36:07'),
(4, 'In transit', '2019-06-09 23:36:07', '2019-06-09 23:36:07'),
(5, 'Delivering', '2019-06-09 23:36:07', '2019-06-09 23:36:07'),
(6, 'Delivered', '2019-06-09 23:36:07', '2019-06-09 23:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_29_070400_create_address_books_table', 2),
(4, '2019_05_29_111531_create_zones_table', 3),
(5, '2019_05_29_111631_create_zone_countries_table', 4),
(6, '2019_05_31_054151_create_weights_table', 5),
(7, '2019_05_31_110503_create_price_slabs_table', 6),
(11, '2019_06_04_123706_create_user_details_table', 7),
(12, '2019_06_06_074144_create_bookings_table', 7),
(13, '2019_06_06_085404_create_booking_dimensions_table', 8),
(14, '2019_06_06_090143_create_booking_addresses_table', 9),
(15, '2019_06_06_091130_create_booking_status_logs_table', 10),
(16, '2019_06_06_110306_create_agent_prices_table', 11),
(17, '2019_06_10_042451_create_log_statuses_table', 12),
(20, '2019_06_13_111320_create_settings_table', 13),
(23, '2019_06_17_072135_user_changes', 14),
(25, '2019_06_18_064256_create_payments_table', 15),
(26, '2019_06_18_065731_create_payment_bookings_table', 16),
(27, '2019_06_18_132130_create_agent_wallets_table', 17),
(28, '2019_06_20_092511_create_wallets_table', 18),
(29, '2019_06_24_071231_create_jobs_table', 19),
(30, '2019_07_04_054305_create_contact_uses_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dilip@mailinator.com', '$2y$10$q0oFXChf3obIdBzHU3WpFuNUB7P4WWucQ6E68uXf4K5bfYBt8iBXm', '2019-05-28 00:39:55'),
('alberto.jensen61@mailinator.com', '$2y$10$Dp3sMyRyHeZtSBVVu1ZguuvenxgbirfHpFNVSVl2fh5gqiwwcafmW', '2019-06-03 03:47:05'),
('ravi.patel@mailinator.com', '$2y$10$VAhl.zY0gkclUZ/g5viKmeznR8/FAEQleybZOXiinTVODnGWzQhUq', '2019-06-07 07:45:01'),
('jackie.hughes27@mailinator.com', '$2y$10$MSELhDhZNnkivMXxQSwqYu0mMDVOH1yMD2HqmHHshSiUQyaxXgIvm', '2019-06-27 04:41:01'),
('linda.white40@example.com', '$2y$10$ZK55MfOyF6THh2u2F5IeROx/IVCTchEug74Rx7pxJxWJVAbnBRvza', '2019-06-27 01:58:13'),
('ruby.watson41@mailinator.com', '$2y$10$4Jj/KbFdudVH5cIMPdxaJuxW/LAuJOKdR0daIdl/AX6UZexxAbw4q', '2019-06-28 01:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `wallet_amout` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stripe_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `final_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `transation_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_payment` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `admin_read_payment` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `agent_id`, `wallet_amout`, `stripe_amount`, `final_amount`, `transation_id`, `read_payment`, `admin_read_payment`, `created_at`, `updated_at`) VALUES
(1, 3, '13.00', '0.00', '13.00', '-', '0', '0', '2019-07-02 06:21:29', '2019-07-02 06:21:29'),
(2, 3, '13.00', '0.00', '13.00', '-', '0', '0', '2019-07-02 06:24:40', '2019-07-02 06:24:40'),
(3, 3, '13.00', '0.00', '13.00', '-', '0', '0', '2019-07-02 06:26:24', '2019-07-02 06:26:24'),
(4, 3, '0.00', '13.00', '13.00', 'tok_1ErkbkGAzjh57VAryXweAHKQ', '0', '0', '2019-07-02 06:27:15', '2019-07-02 06:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `payment_bookings`
--

CREATE TABLE `payment_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_bookings`
--

INSERT INTO `payment_bookings` (`id`, `payment_id`, `booking_id`, `created_at`, `updated_at`) VALUES
(1, 1, 139, '2019-07-02 06:21:29', '2019-07-02 06:21:29'),
(2, 2, 139, '2019-07-02 06:24:40', '2019-07-02 06:24:40'),
(3, 3, 139, '2019-07-02 06:26:24', '2019-07-02 06:26:24'),
(4, 4, 139, '2019-07-02 06:27:15', '2019-07-02 06:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `price_slabs`
--

CREATE TABLE `price_slabs` (
  `id` int(10) UNSIGNED NOT NULL,
  `zones_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `upx_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `agent_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_slabs`
--

INSERT INTO `price_slabs` (`id`, `zones_id`, `weight_id`, `upx_price`, `agent_price`, `created_at`, `updated_at`) VALUES
(55, 22, 38, '3.67', '0.00', '2019-06-12 00:05:11', '2019-06-13 07:52:25'),
(56, 22, 38, '12.00', '0.00', '2019-06-12 00:05:11', '2019-06-12 00:05:11'),
(57, 27, 38, '6.53', '0.00', '2019-06-12 00:45:51', '2019-06-12 00:45:51'),
(78, 26, 38, '6.78', '0.00', '2019-06-12 00:46:40', '2019-06-13 07:52:58'),
(103, 25, 38, '4.50', '0.00', '2019-06-12 00:47:21', '2019-06-13 07:52:52'),
(131, 24, 38, '4.67', '0.00', '2019-06-12 00:48:27', '2019-06-13 07:52:47'),
(194, 23, 38, '5.67', '0.00', '2019-06-12 00:49:44', '2019-06-13 07:52:38'),
(272, 34, 38, '3.50', '0.00', '2019-06-26 10:34:12', '2019-06-26 10:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'hangling_price', '10.00', '2019-06-12 18:30:00', '2019-06-26 09:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(2, 'dilip'),
(3, 'dilip');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `role` enum('admin','agent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'agent',
  `booking_limit` decimal(10,2) DEFAULT NULL,
  `wallet_amount` decimal(10,2) DEFAULT '0.00',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `image`, `logo_image`, `email`, `status`, `role`, `booking_limit`, `wallet_amount`, `token`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ruby1', 'White', '1561620150.png', NULL, 'ruby.watson41@mailinator.com', 'Active', 'admin', NULL, '0.00', '', '$2y$10$YgXPScRtNTgeB2o1H8yNkO/ha4/T8tL802s3OUQgk0EUaFp6nRZ0m', 'QByjHTaGGHYUBRR8J2UNQCmwpm2Kp8ATdcvezX5ECWBMD62NXksTwXrZOBpS', NULL, '2019-05-27 22:46:46', '2019-06-27 01:52:30'),
(2, 'Leona', 'Horton', NULL, NULL, 'erica.griffin46@mailinator.com', 'Active', 'agent', '1200.00', '0.00', '611214766', '', NULL, '2019-07-01 07:53:14', '2019-07-01 07:48:11', '2019-07-01 07:53:14'),
(3, 'Leona', 'Horton', NULL, NULL, 'erica.griffin465@mailinator.com', 'Active', 'agent', '100.00', '361.00', NULL, '$2y$10$Qdh.GKxeCma2nyIUhGklKOQwCTUnuImM/oNAmxDwVYU59Z4YjqYQi', 'wgKYuGhVKnRvm0JUewKMYQI0GEICbZ6GxvHM2YnH9gwzajvlCPKVw8KTIAMa', NULL, '2019-07-01 07:53:54', '2019-07-02 06:26:24'),
(4, 'Leona', 'Horton', NULL, NULL, 'dsas@mailinator.com', 'Active', 'agent', '1200.00', '0.00', '1703154689', '', NULL, '2019-07-01 08:03:55', '2019-07-01 08:03:03', '2019-07-01 08:03:55'),
(5, 'Leona', 'Horton', '1562046885.png', NULL, 'erica@mailinator.com', 'Active', 'agent', '1200.00', '0.00', '841903706', '', NULL, '2019-07-02 06:42:52', '2019-07-02 00:24:45', '2019-07-02 06:42:52'),
(6, 'Leona', 'Horton', NULL, NULL, 'erica.griffin4621@mailinator.com', 'Active', 'agent', '1200.00', '123.00', NULL, '$2y$10$tYgwW7pR5c6YG42gzY6Mk.iHgHyAMqfZy/7KBWph9bYpBqAJw.4u.', '4kx8MZo6MZZbEV7zO1eeVYuOhuurriiNcUK2FP7HyLqErR1cCOKVJrmEToAD', NULL, '2019-07-04 03:14:40', '2019-07-04 03:16:16'),
(7, 'Leona', 'Horton', NULL, NULL, 'erica.griffin4623@mailinator.com', 'Active', 'agent', '12.00', '0.00', NULL, '$2y$10$Qx8HaxJJJOh7psVtG9XCBuaVzJrV2soV7RTWBwS6O.IlCr0Jr25xC', '2lkXdBST36CqXJf2KpkaOLtDx4LoOpfuXYaT06Pt08jqYNVzweJwkbnSD12S', NULL, '2019-07-04 03:17:05', '2019-07-04 03:17:29'),
(8, 'Toni', 'White', NULL, NULL, 'toni.white56@mailinator.com', 'Active', 'agent', '1200.00', '0.00', NULL, '$2y$10$xuqvFOfQF32V7rfE3KND7eMcICvVUyOkZksNtfvJV63aAR/2D8j6q', '58USMItzdkF1xOGGWyhMEgQAAJqW9ZLKngG7bHi4NbDLGOok99TcrUuRqVmL', NULL, '2019-07-04 03:36:01', '2019-07-04 03:37:16'),
(9, 'Leona', 'Horton', NULL, NULL, 'erica.12121@mailinator.com', 'Active', 'agent', '1200.00', '0.00', '850427082', '', NULL, NULL, '2019-07-04 05:31:46', '2019-07-04 05:31:46'),
(11, 'Leona', 'Horton', NULL, NULL, 'sd21@mailinator.com', 'Active', 'agent', '1200.00', '0.00', '349834114', '', NULL, NULL, '2019-07-04 05:39:08', '2019-07-04 05:39:08'),
(12, 'Leona', 'Horton', NULL, NULL, 'ericadd@mailinator.com', 'Active', 'agent', '1200.00', '0.00', NULL, '$2y$10$PX7yld1KkwQjxqPoBFT3j.o1K4AfFUFPfolcmNzLw4zS413Is2Poe', NULL, NULL, '2019-07-04 05:48:26', '2019-07-04 06:03:53'),
(13, 'Leona', 'Horton', NULL, NULL, 'Noreniya@mailinator.com', 'Active', 'agent', '1200.00', '0.00', '1196531653', '', NULL, NULL, '2019-07-04 06:04:34', '2019-07-04 06:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `address3` text COLLATE utf8mb4_unicode_ci,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `company`, `phone`, `address1`, `address2`, `address3`, `postal_code`, `state`, `city`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Whiz', '7203957277', '1282 Second St', NULL, NULL, '382350', 'Gujarat', 'Ahmedabad', 1, '2019-06-06 04:22:12', '2019-06-27 03:23:00'),
(2, 2, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-01 07:48:12', '2019-07-01 07:48:12'),
(3, 3, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-01 07:53:54', '2019-07-01 08:16:36'),
(4, 4, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-01 08:03:03', '2019-07-01 08:03:03'),
(5, 5, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-02 00:24:45', '2019-07-02 00:24:45'),
(6, 6, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 03:14:40', '2019-07-04 03:14:40'),
(7, 7, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 03:17:05', '2019-07-04 03:17:05'),
(8, 8, NULL, NULL, '7155 Crosstimber Ct', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 03:36:01', '2019-07-04 03:36:01'),
(9, 9, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 05:31:46', '2019-07-04 05:31:46'),
(10, 11, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 05:39:08', '2019-07-04 05:39:08'),
(11, 12, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 05:48:26', '2019-07-04 05:48:26'),
(12, 13, NULL, NULL, '2674 Shelley St', NULL, NULL, '382350', 'Gujarat', 'ahmedabad', 1, '2019-07-04 06:04:34', '2019-07-04 06:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `type` enum('add','reduce') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'add',
  `amount` decimal(10,2) NOT NULL,
  `transation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `agent_id`, `type`, `amount`, `transation_token`, `current_amount`, `created_at`, `updated_at`) VALUES
(1, 3, 'add', '12.00', 'tok_1ErPVUGAzjh57VAr5Auc14mt', '12.00', '2019-07-01 07:55:25', '2019-07-01 07:55:25'),
(2, 3, 'reduce', '13.00', '-', '387.00', '2019-07-02 06:21:29', '2019-07-02 06:21:29'),
(3, 3, 'reduce', '13.00', '-', '374.00', '2019-07-02 06:24:40', '2019-07-02 06:24:40'),
(4, 3, 'reduce', '13.00', '-', '361.00', '2019-07-02 06:26:24', '2019-07-02 06:26:24'),
(5, 6, 'add', '123.00', 'tok_1EsQZzGAzjh57VArrqSvmIMQ', '123.00', '2019-07-04 03:16:16', '2019-07-04 03:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` int(11) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `weight`, `created_at`, `updated_at`) VALUES
(38, '1.00', '2019-06-12 00:03:13', '2019-06-12 00:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `created_at`, `updated_at`) VALUES
(22, 'Zone 6', '2019-06-12 00:02:47', '2019-06-12 00:43:16'),
(23, 'Zone 5', '2019-06-12 00:35:40', '2019-06-12 00:43:09'),
(24, 'Zone 4', '2019-06-12 00:39:46', '2019-06-12 00:43:04'),
(25, 'Zone 3', '2019-06-12 00:40:10', '2019-06-12 00:43:00'),
(26, 'Zone 2', '2019-06-12 00:41:27', '2019-06-12 00:42:40'),
(27, 'Zone 1', '2019-06-12 00:41:44', '2019-06-12 00:42:33'),
(34, 'Zone 7', '2019-06-26 10:33:05', '2019-06-26 10:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `zone_countries`
--

CREATE TABLE `zone_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zone_countries`
--

INSERT INTO `zone_countries` (`id`, `zone_id`, `country_id`, `created_at`, `updated_at`) VALUES
(73, 22, 1, '2019-06-12 00:02:47', '2019-06-12 00:02:47'),
(74, 22, 2, '2019-06-12 00:02:47', '2019-06-12 00:02:47'),
(75, 22, 3, '2019-06-12 00:02:47', '2019-06-12 00:02:47'),
(76, 22, 4, '2019-06-12 00:02:47', '2019-06-12 00:02:47'),
(77, 22, 5, '2019-06-12 00:02:47', '2019-06-12 00:02:47'),
(78, 23, 6, '2019-06-12 00:35:40', '2019-06-12 00:35:40'),
(79, 23, 7, '2019-06-12 00:35:40', '2019-06-12 00:35:40'),
(80, 23, 9, '2019-06-12 00:35:40', '2019-06-12 00:35:40'),
(82, 24, 13, '2019-06-12 00:39:46', '2019-06-12 00:39:46'),
(83, 24, 158, '2019-06-12 00:39:46', '2019-06-12 00:39:46'),
(84, 24, 167, '2019-06-12 00:39:46', '2019-06-12 00:39:46'),
(85, 25, 18, '2019-06-12 00:40:10', '2019-06-12 00:40:10'),
(87, 26, 47, '2019-06-12 00:41:27', '2019-06-12 00:41:27'),
(88, 26, 77, '2019-06-12 00:41:27', '2019-06-12 00:41:27'),
(89, 26, 78, '2019-06-12 00:41:27', '2019-06-12 00:41:27'),
(91, 27, 53, '2019-06-12 00:41:44', '2019-06-12 00:41:44'),
(92, 27, 59, '2019-06-12 00:41:44', '2019-06-12 00:41:44'),
(93, 27, 62, '2019-06-12 00:41:44', '2019-06-12 00:41:44'),
(109, 34, 99, '2019-06-26 10:33:05', '2019-06-26 10:33:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_books`
--
ALTER TABLE `address_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `id` (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `created_by_2` (`created_by`),
  ADD KEY `email` (`email`),
  ADD KEY `phone_number` (`phone_number`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `agent_prices`
--
ALTER TABLE `agent_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `weight_id` (`weight_id`),
  ADD KEY `zones_id` (`zones_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `agent_wallet_logs`
--
ALTER TABLE `agent_wallet_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booked_by` (`booked_by`),
  ADD KEY `id` (`id`),
  ADD KEY `mail_notify` (`mail_notify`),
  ADD KEY `payment_status` (`payment_status`);

--
-- Indexes for table `booking_addresses`
--
ALTER TABLE `booking_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `booking_dimensions`
--
ALTER TABLE `booking_dimensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `booking_status_logs`
--
ALTER TABLE `booking_status_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `log_statuses`
--
ALTER TABLE `log_statuses`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_bookings`
--
ALTER TABLE `payment_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `price_slabs`
--
ALTER TABLE `price_slabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_id` (`zones_id`),
  ADD KEY `weight_id` (`weight_id`),
  ADD KEY `upx_price` (`upx_price`),
  ADD KEY `agent_price` (`agent_price`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_ibfk_1` (`user_id`),
  ADD KEY `user_details_ibfk_2` (`country_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `zone_countries`
--
ALTER TABLE `zone_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_countries_ibfk_1` (`country_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_books`
--
ALTER TABLE `address_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `agent_prices`
--
ALTER TABLE `agent_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_wallet_logs`
--
ALTER TABLE `agent_wallet_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `booking_addresses`
--
ALTER TABLE `booking_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `booking_dimensions`
--
ALTER TABLE `booking_dimensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `booking_status_logs`
--
ALTER TABLE `booking_status_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_statuses`
--
ALTER TABLE `log_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_bookings`
--
ALTER TABLE `payment_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `price_slabs`
--
ALTER TABLE `price_slabs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `zone_countries`
--
ALTER TABLE `zone_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_books`
--
ALTER TABLE `address_books`
  ADD CONSTRAINT `address_books_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agent_prices`
--
ALTER TABLE `agent_prices`
  ADD CONSTRAINT `agent_prices_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agent_prices_ibfk_2` FOREIGN KEY (`weight_id`) REFERENCES `weights` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agent_prices_ibfk_3` FOREIGN KEY (`zones_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_addresses`
--
ALTER TABLE `booking_addresses`
  ADD CONSTRAINT `booking_addresses_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_addresses_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_dimensions`
--
ALTER TABLE `booking_dimensions`
  ADD CONSTRAINT `booking_dimensions_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_status_logs`
--
ALTER TABLE `booking_status_logs`
  ADD CONSTRAINT `booking_status_logs_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_bookings`
--
ALTER TABLE `payment_bookings`
  ADD CONSTRAINT `payment_bookings_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_bookings_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `price_slabs`
--
ALTER TABLE `price_slabs`
  ADD CONSTRAINT `price_slabs_ibfk_1` FOREIGN KEY (`weight_id`) REFERENCES `weights` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `price_slabs_ibfk_2` FOREIGN KEY (`zones_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_details_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `zone_countries`
--
ALTER TABLE `zone_countries`
  ADD CONSTRAINT `zone_countries_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `zone_countries_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
