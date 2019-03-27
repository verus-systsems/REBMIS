-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 07:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assessmentmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `sector_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `sector_name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Bumbogo', 1, '2019-02-23 15:10:18', '2019-02-23 15:10:18'),
(2, 'Gatsata', 1, '2019-02-23 15:10:36', '2019-02-23 15:10:36'),
(3, 'Jali', 1, '2019-02-23 15:10:55', '2019-02-23 15:10:55'),
(4, 'Gikomero', 1, '2019-02-23 15:11:06', '2019-02-23 15:11:06'),
(5, 'Gisozi', 1, '2019-02-23 15:11:18', '2019-02-23 15:11:18'),
(6, 'Jabana', 1, '2019-02-23 15:11:30', '2019-02-23 15:11:30'),
(7, 'Kinyinya', 1, '2019-02-23 15:11:44', '2019-02-23 15:11:44'),
(8, 'Ndera', 1, '2019-02-23 15:11:58', '2019-02-23 15:11:58'),
(9, 'Nduba', 1, '2019-02-23 15:12:11', '2019-02-23 15:12:11'),
(10, 'Rusororo', 1, '2019-02-23 15:12:25', '2019-02-23 15:12:25'),
(11, 'Rutunga', 1, '2019-02-23 15:12:45', '2019-02-23 15:12:45'),
(12, 'Kacyiru', 1, '2019-02-23 15:13:08', '2019-02-23 15:13:08'),
(13, 'Kimihurura', 1, '2019-02-23 15:13:21', '2019-02-23 15:13:21'),
(14, 'Kimironko', 1, '2019-02-23 15:13:34', '2019-02-23 15:13:34'),
(15, 'Remera', 1, '2019-02-23 15:13:46', '2019-02-23 15:13:46'),
(16, 'Gahanga', 2, '2019-02-23 15:16:14', '2019-02-23 15:16:14'),
(17, 'Gatenga', 2, '2019-02-23 15:16:27', '2019-02-23 15:16:27'),
(18, 'Gikondo', 2, '2019-02-23 15:16:39', '2019-02-23 15:16:39'),
(19, 'Kagarama', 2, '2019-02-23 15:16:52', '2019-02-23 15:16:52'),
(20, 'Kanombe', 2, '2019-02-23 15:17:07', '2019-02-23 15:17:07'),
(21, 'Kicukiro', 2, '2019-02-23 15:17:31', '2019-02-23 15:17:31'),
(22, 'Kigarama', 2, '2019-02-23 15:17:48', '2019-02-23 15:17:48'),
(23, 'Masaka', 2, '2019-02-23 15:18:06', '2019-02-23 15:18:06'),
(24, 'Niboye', 2, '2019-02-23 15:18:22', '2019-02-23 15:18:22'),
(25, 'Nyarugunga', 2, '2019-02-23 15:18:36', '2019-02-23 15:18:36'),
(26, 'Gitega', 3, '2019-02-23 15:19:14', '2019-02-23 15:19:14'),
(27, 'Kanyinya', 3, '2019-02-23 15:19:32', '2019-02-23 15:19:32'),
(28, 'Kigali', 3, '2019-02-23 15:19:42', '2019-02-23 15:19:42'),
(29, 'Kimisagara', 3, '2019-02-23 15:19:57', '2019-02-23 15:19:57'),
(30, 'Mageragere', 3, '2019-02-23 15:20:10', '2019-02-23 15:20:10'),
(31, 'Muhima', 3, '2019-02-23 15:20:30', '2019-02-23 15:20:30'),
(32, 'Nyakabanda', 3, '2019-02-23 15:20:43', '2019-02-23 15:20:43'),
(33, 'Nyamirambo', 3, '2019-02-23 15:21:00', '2019-02-23 15:21:00'),
(34, 'Nyarugenge', 3, '2019-02-23 15:21:12', '2019-02-23 15:21:12'),
(35, 'Rwezamenyo', 3, '2019-02-23 15:21:43', '2019-02-23 15:21:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectors_district_id_index` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
