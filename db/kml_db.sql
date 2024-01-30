-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 07:50 AM
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
  `company` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `selector_name` varchar(50) NOT NULL,
  `imsi` varchar(100) NOT NULL,
  `imei` varchar(100) NOT NULL,
  `lac_cid` varchar(100) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kml_file`
--

INSERT INTO `kml_file` (`id`, `name`, `company`, `address`, `position`, `dir`, `unit`, `selector_name`, `imsi`, `imei`, `lac_cid`, `remarks`, `date`, `time`, `created_at`, `updated_at`) VALUES
(10, 'poiont 1', 'dsfasdf', '', '', '../kml_files/5_6145352096037211692.kml', '', '', '', '', '', '', NULL, '00:00:00', '2024-01-20 13:53:06', '2024-01-20 12:53:06'),
(11, 'pointg 3', 'jhglhk', '', '', '../kml_files/index.kml', '', '', '', '', '', '', NULL, '00:00:00', '2024-01-20 14:55:14', '2024-01-20 13:55:14'),
(12, 'adsf', 'wefasdf', '', '', '../kml_files/user-map.php', '', '', '', '', '', '', NULL, '00:00:00', '2024-01-25 08:23:46', '2024-01-25 07:23:46'),
(13, 'awef', 'sdga', 'Region VIII (Eastern Visayas)  Maslog Eastern Samar', 'asfwef', '../kml_files/rzks9qehznindex.kml', 'af', 'wefaqwf', 'sdfawe', 'fawefa', 'sdfaf', 'sdfasdfasd', '2024-01-19', '02:26:00', '2024-01-30 04:26:32', '2024-01-30 03:26:32');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 0, '2024-01-29 15:37:17', '2024-01-29 14:42:58');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kml_file`
--
ALTER TABLE `kml_file`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
