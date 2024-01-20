-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 07:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kml_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kml_file`
--

CREATE TABLE `kml_file` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kml_file`
--

INSERT INTO `kml_file` (`id`, `name`, `description`, `location`, `created_at`, `updated_at`) VALUES
(2, 'sdasd', 'sdfsdf', '../kml_files/eado06ivn5index.kml', '2024-01-20 05:50:28', '2024-01-20 04:50:28'),
(3, 'asdasdas', 'fsdfsdfsdf', '../kml_files/6m92s8k2l6index.kml', '2024-01-20 05:55:42', '2024-01-20 04:55:42'),
(4, 'ghfghfghfgh', 'agergerg', '../kml_files/pglm33bmhpindex.kml', '2024-01-20 05:55:50', '2024-01-20 04:55:50'),
(5, 'hehe', 'dsdfsdf', '../kml_files/tw9af0cx46index.kml', '2024-01-20 06:17:47', '2024-01-20 05:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `created_at`, `updated_at`) VALUES
(1, 'awgwefasdf', 'Aurora Barangay I (Pob.) Baler (Capital) Aurora', 13.156451, 123.733032, NULL, '2024-01-20 03:33:29', '2024-01-20 02:33:29'),
(2, 'fghdfghdfgh', 'Region Cagayan Abbeg Alcala Cagayan', 13.133535, 123.713539, NULL, '2024-01-20 03:36:21', '2024-01-20 02:36:21'),
(3, 'gadfgasdfasdf', 'Region I (Ilocos Region) Bagbagotot Banayoyo Ilocos Sur', 13.115305, 123.750816, NULL, '2024-01-20 03:37:23', '2024-01-20 02:37:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kml_file`
--
ALTER TABLE `kml_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kml_file`
--
ALTER TABLE `kml_file`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
