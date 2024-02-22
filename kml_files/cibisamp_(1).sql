-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 07:25 AM
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
-- Database: `cibisamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `childprofiles`
--

CREATE TABLE `childprofiles` (
  `ChildID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `GuardianName` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `RegistrationDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `childratings`
--

CREATE TABLE `childratings` (
  `RatingID` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `FamilyIncome` decimal(10,2) DEFAULT NULL,
  `NumDependentChildren` int(11) DEFAULT NULL,
  `FamilyInvolvement` decimal(3,2) DEFAULT NULL,
  `EducationalAttainment` decimal(3,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_account`
--

CREATE TABLE `child_account` (
  `UserID` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'child',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_account`
--

INSERT INTO `child_account` (`UserID`, `child_id`, `first_name`, `last_name`, `username`, `password`, `email`, `phoneNumber`, `address`, `role`, `created_at`, `updated_at`) VALUES
(11, 157, 'poip', 'iojjlkjsdklfj', 'asd', '7815696ecbf1c96e6894b779456d330e', 'fs@asdasd.com', '09123456789', 'asdasdfsdfasdf', 'child-account', '2023-11-23 20:31:07', '2023-11-23 12:31:07'),
(12, 158, 'Paul', 'Clement', '123', '202cb962ac59075b964b07152d234b70', '123@123.com', '09123456789', 'Daraga', 'child-account', '2023-11-23 20:31:52', '2023-11-23 12:31:52'),
(13, 160, 'Lacey', 'Lenon', 'lacey', '964d72e72d053d501f2949969849b96c', '', '', 'Legazpi ', 'child-account', '2023-11-24 10:48:26', '2023-11-24 02:48:26'),
(14, 169, 'Tirso', 'Tariman Jr', 'tirso ', '964d72e72d053d501f2949969849b96c', '', '', 'Bacacay', 'child-account', '2023-11-24 10:54:32', '2023-11-24 02:54:32'),
(15, 170, 'Pablo', 'Jobs', 'pablo', '202cb962ac59075b964b07152d234b70', '', '09788755311', 'Daraga', 'child-account', '2023-11-24 16:43:03', '2023-11-24 08:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `child_attendance`
--

CREATE TABLE `child_attendance` (
  `id` int(50) NOT NULL,
  `child_id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `record` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attendance_status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_family_information`
--

CREATE TABLE `child_family_information` (
  `id` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_absent` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `is_mother_guardian` int(1) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `fathger_absent` varchar(50) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `is_father_guardian` int(1) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `guardian_occupation` varchar(50) NOT NULL,
  `guardian_relationship` varchar(50) NOT NULL,
  `child_lives_with` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_family_information`
--

INSERT INTO `child_family_information` (`id`, `child_id`, `mother_name`, `mother_absent`, `mother_occupation`, `is_mother_guardian`, `father_name`, `fathger_absent`, `father_occupation`, `is_father_guardian`, `guardian_name`, `guardian_occupation`, `guardian_relationship`, `child_lives_with`, `created_at`, `updated_at`) VALUES
(44, 157, 'dfsad', 'fasdf', 'sdg', 0, 'fsdfsdf', 'gfg', 'dfga', 0, 'fsd', 'fsd', 'asd', 'sdf', '2023-11-22 18:25:57', '2023-11-22 10:25:57'),
(45, 158, 'Lucy', 'working', 'housewife', 0, 'Hank', 'deceased', 'police', 0, 'Helen Reyes', 'Business Owner ', 'Nephew', 'Orosite Michael', '2023-11-23 15:58:41', '2023-11-23 07:58:41'),
(46, 160, 'Maria', 'deceased', 'Nurse', 0, 'Jose', 'deceased ', 'Army', 0, 'Michael Vito', 'Comedian', 'Godfather', 'None', '2023-11-23 22:05:54', '2023-11-23 14:05:54'),
(47, 162, 'asdf', 'sdfa', 'sdgas', 0, 'wefasdf', 'awefas', 'df', 0, 'dfa', 'dfas', 'asdf', 'sadfasdf', '2023-11-24 04:01:50', '2023-11-23 20:04:02'),
(48, 163, 'sdf', 'gfd', 'gadf', 0, 'sadfasdf', 'fsdf', 'asd', 0, 'sdfsadfasf', 'xc', 'vsad', 'fasdf', '2023-11-24 04:05:11', '2023-11-23 20:05:11'),
(49, 167, 'dzsfzsfz', 'dxfxdxf', 'fdxfxd', 0, 'fdxfxdf', 'fdfdzf', 'fxdfx', 0, 'fdxfxfx', 'gxgxgx', 'gcgxgxg', 'vcxgfgd', '2023-11-24 10:42:14', '2023-11-24 02:42:14'),
(50, 168, 'dsadas', 'dasas', 'dasd', 0, 'adsda', 'sadas', 'dsf', 0, 'dasda', 'dasd', 'dasda', 'sdasd', '2023-11-24 10:44:05', '2023-11-24 02:44:05'),
(51, 169, 'lucy Tariman', 'Deceased', 'Nurse', 0, 'Tirso Tariman', 'Missing', 'Army', 0, 'Russel Bargquin', 'Delivery Rider', 'Godfather', 'None', '2023-11-24 10:53:17', '2023-11-24 02:53:18'),
(52, 170, 'Lucy Ann', 'Deceased', 'Nurse', 0, 'Escabor Hank', 'Deceased', 'Army', 0, 'Tony Stank', 'Business Owner', 'Godfather', 'None', '2023-11-24 16:35:05', '2023-11-24 08:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `child_house_hold_information`
--

CREATE TABLE `child_house_hold_information` (
  `id` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `income` int(20) NOT NULL,
  `family_involvement` varchar(50) NOT NULL,
  `beds` int(20) NOT NULL,
  `no_of_persons` int(20) NOT NULL,
  `walls` varchar(50) NOT NULL,
  `roof` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `house_condition` varchar(50) NOT NULL,
  `ownership_status` varchar(50) NOT NULL,
  `cooking_facility` varchar(50) NOT NULL,
  `water_source` varchar(50) NOT NULL,
  `electricity` varchar(50) NOT NULL,
  `sanitary_facility` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_house_hold_information`
--

INSERT INTO `child_house_hold_information` (`id`, `child_id`, `address`, `income`, `family_involvement`, `beds`, `no_of_persons`, `walls`, `roof`, `floor`, `house_condition`, `ownership_status`, `cooking_facility`, `water_source`, `electricity`, `sanitary_facility`, `created_at`, `updated_at`) VALUES
(66, 157, 'asdasdfsdfasdf', 12000, '', 12, 12, 'dfsjmfjl', 'kjfio', 'jofij', 'oi;fj', ';ifjo;', 'f', 'sda', 'sdfasd', 'fsdfasdf', '2023-11-22 18:25:47', '2023-11-22 10:25:47'),
(67, 158, 'Daraga', 16000, 'UNICEF', 2, 6, 'concrete', 'hollow blocks', 'granite', 'good', 'rent', 'kitchen', 'water pump', 'Aleco', 'N/A', '2023-11-23 15:46:03', '2023-11-23 07:46:43'),
(68, 160, 'Legazpi ', 12000, '', 2, 6, 'Wood', 'hollow blocks', 'tiles', 'good', 'rent', 'kitchen', 'water pump', 'Aleco', 'None', '2023-11-23 22:04:41', '2023-11-23 14:04:41'),
(69, 0, '', 12000, '', 0, 0, '', '', '', '', '', '', '', '', '', '2023-11-24 00:01:50', '2023-11-23 16:01:50'),
(70, 161, 'sdfsd', 12000, '', 1, 12, 'asdf', 'lk', 'hiuhih', 'iudhpi', 'uhd', 'sbk', 'bdklb', 'dub', 'uidb;', '2023-11-24 03:39:50', '2023-11-23 19:39:50'),
(71, 162, 'sdfasdfasdf', 24000, 'TUPAD', 12, 12, 'asdf', ',bk.j', 'hkdhl', 'gdiugiufasdf', 'dfgd', 'sfgasd', 'fasdf', 'wefas', 'dfasdfasdf', '2023-11-24 04:00:54', '2023-11-23 20:03:25'),
(72, 163, '12', 24000, 'UNICEF', 12, 12, '12', 'sdf', 'nf', 'nf;oi', 'hf;ou', 'h;fuo', 'hfasdf', 'asdf', 'sdfasdf', '2023-11-24 04:04:47', '2023-11-23 20:04:47'),
(73, 167, 'asdasd', 17000, 'UNICEF', -2, 23, 'sdsd', 'sad', 'asda', 'dsa', 'd', 'asd', 'ads', 'ads', 'das', '2023-11-24 10:41:17', '2023-11-24 02:41:17'),
(74, 168, 'dsdfs', 13000, '', 4, 5, 'aada', 'zszsd', 'dsadas', 'zsd', 'dsfda', 'sddsa', 'fsdf', 'dasd', 'sdaa', '2023-11-24 10:43:48', '2023-11-24 02:43:48'),
(75, 169, 'Bacacay', 12000, '', 2, 4, 'wood', 'concrete', 'tiles', 'good', 'rent', 'kitchen', 'water pump', 'aleco', 'covid center', '2023-11-24 10:51:57', '2023-11-24 02:51:57'),
(76, 170, 'Daraga', 12000, 'TUPAD', 3, 2, 'wood', 'Sim', 'concrete', 'Fair', 'Owned', 'Kitchen Facility', 'Water Pump ', 'aleco', 'Health Care Center', '2023-11-24 16:31:51', '2023-11-24 08:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE `child_info` (
  `id` int(20) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `ad_consent` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `height` int(10) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `eye_color` varchar(25) DEFAULT NULL,
  `hair_color` varchar(25) DEFAULT NULL,
  `pastimes` varchar(100) DEFAULT NULL,
  `talent_hobbies` varchar(100) DEFAULT NULL,
  `chores` varchar(100) DEFAULT NULL,
  `child_sleeps_on` varchar(100) DEFAULT NULL,
  `language_spoken` varchar(100) DEFAULT NULL,
  `has_account` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_info`
--

INSERT INTO `child_info` (`id`, `first_name`, `last_name`, `middle_name`, `gender`, `ad_consent`, `dob`, `height`, `weight`, `eye_color`, `hair_color`, `pastimes`, `talent_hobbies`, `chores`, `child_sleeps_on`, `language_spoken`, `has_account`, `created_at`, `updated_at`) VALUES
(157, 'poip', 'iojjlkjsdklfj', 'klj', 'male', 'yes', '2019-11-23', 163, 80, 'sd', 'lkj', 'lkj', 'iojdio', 'hjdoh', 'dh', 'hdi', 1, '2023-11-22 18:25:34', '2023-11-23 21:47:56'),
(158, 'Paul', 'Clement', 'Mata', 'male', 'yes', '2000-07-11', 168, 65, 'brown', 'black', 'videogames', 'dance', 'cleaning', 'bed', 'bikol', 1, '2023-11-23 15:44:06', '2023-11-23 12:31:52'),
(159, 'heart', 'Gonzales', 'Sasa', 'female', 'yes', '2008-12-24', 89, 30, 'brown', 'black', 'reading books', 'poetry ', 'laundry', 'sleeping mat', 'bikol ', 0, '2023-11-23 17:14:18', '2023-11-23 09:14:18'),
(160, 'Lacey', 'Lenon', 'Moresse', 'female', 'yes', '2006-07-24', 142, 30, 'brown', 'black', 'watching teleserye', 'acting', 'laundry', 'Mat', 'Bikol', 1, '2023-11-23 22:03:17', '2023-11-24 02:48:26'),
(161, 'sdlkfk;sdfj;o', 'ijoijf', 'oijfo', 'male', 'yes', '2023-11-14', 12, 2, 'aasda', 'lkdkl', 'dmlk', 'mdl', 'dm;lnuofh', 'oh', 'bf', 0, '2023-11-24 03:39:33', '2023-11-23 19:39:33'),
(162, 'john', 'john', 'ghdfgh', 'male', 'yes', '2023-11-30', 12, 11, 'sdasd', 'sdfasdfm', 'n', 'ifiu;', 'fiu', 'g;fsdf', 'cvzxvxzcv', 0, '2023-11-24 04:00:22', '2023-11-23 23:27:29'),
(163, 'sdkjf;lkasjdfoihfoi', 'hoifh', 'oifh', 'male', 'yes', '2023-11-24', 12, 12, 'sdfsdknf;lnsl;fn', 'lno;', 'uhfuo;', 'fu', 'f;iu', 'f', 'sadfasdf', 0, '2023-11-24 04:04:34', '2023-11-23 20:04:34'),
(164, 'sadasdio', 'jodj', 'ojdo', 'male', 'yes', '2023-11-24', 12, 12, 'saddm', 'k\'dm', 'od', 'iond;o', 'dno', 'dsda', 'sadfasdf', 0, '2023-11-24 07:21:24', '2023-11-23 23:21:44'),
(165, 'sadasdio', 'jodj', 'ojdo', 'male', 'yes', '2023-11-30', 12, 12, 'saddm', 'k\'dm', 'od', 'iond;o', 'dno', 'dsda', 'sadfasdf', 0, '2023-11-24 07:22:02', '2023-11-23 23:22:02'),
(166, 'Ron', 'Ron', 'jdoi', 'male', 'yes', '2023-12-30', 20, 20, 'asd', 'dnm', 'kndiu', 'dniup', 'dnsdf', 'fsdfsdf', 'fd', 0, '2023-11-24 07:24:18', '2023-11-23 23:25:37'),
(167, 'werwe', 'ggfhfd', 'sdf', 'male', 'yes', '2023-11-25', 2323, 34324, 'wer', 'erw', 'wer', 'erw', 'rew', 'erw', 'rew', 0, '2023-11-24 10:40:40', '2023-11-24 02:40:40'),
(168, 'waear', 'fdsfs', 'fsdfsf', 'male', 'yes', '2023-01-12', 44, 34, 'esfs', 'esfes', 'fdsfsd', 'dsfsfs', 'fdsfs', 'fdfsd', 'fdsfds', 0, '2023-11-24 10:43:25', '2023-11-24 02:43:25'),
(169, 'Tirso', 'Tariman Jr', 'Roy', 'male', 'yes', '2019-06-21', 120, 10, 'brown', 'black', 'hide and seek', 'singing', 'cleaning', 'bed', 'bikol', 1, '2023-11-24 10:50:58', '2023-11-24 02:54:32'),
(170, 'Pablo', 'Jobs', 'Smith', 'male', 'yes', '2009-07-22', 120, 50, 'brown', 'black', 'hide and seek', 'singing', 'cleaning dishes', 'Bed', 'bikol', 1, '2023-11-24 16:23:41', '2023-11-24 08:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `child_program`
--

CREATE TABLE `child_program` (
  `id` int(50) NOT NULL,
  `child_id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `is_enrolled` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_program`
--

INSERT INTO `child_program` (`id`, `child_id`, `program_id`, `is_enrolled`, `created_at`, `updated_at`) VALUES
(46, 11, 10, 1, '2023-11-29 15:45:28', '2023-11-29 07:45:28'),
(47, 11, 14, 1, '2023-11-29 15:55:37', '2023-11-29 07:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `child_school_info`
--

CREATE TABLE `child_school_info` (
  `id` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `attends_school` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_type` varchar(100) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `school_transportation` varchar(50) NOT NULL,
  `time_school_travel` varchar(50) NOT NULL,
  `recent_grade_level` varchar(50) NOT NULL,
  `current_grade_level` varchar(50) NOT NULL,
  `favorite_school_subject` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_school_info`
--

INSERT INTO `child_school_info` (`id`, `child_id`, `attends_school`, `school_name`, `school_type`, `academic_year`, `school_transportation`, `time_school_travel`, `recent_grade_level`, `current_grade_level`, `favorite_school_subject`, `created_at`, `updated_at`) VALUES
(49, 157, 'asdfsdf', '', '', '', '', '', 'senior high', '', '', '2023-11-22 18:25:50', '2023-11-23 20:16:01'),
(50, 158, '', 'STI', 'private', '2023', 'Motorcycle', '1pm', 'senior high', '4th year', 'Math', '2023-11-23 15:52:57', '2023-11-23 19:44:26'),
(51, 160, 'no money', '', '', '', '', '', '', '', '', '2023-11-23 22:04:50', '2023-11-23 14:04:50'),
(52, 162, '', 'sdfasdf', 'private', '2018', '12', '12', 'sdfasdf', 'college', '12', '2023-11-24 04:01:42', '2023-11-23 20:03:56'),
(53, 163, '', 'sdf', 'private', '2020', '.asn', '1', '21', 'senior high', 'nl;kf', '2023-11-24 04:05:04', '2023-11-23 20:05:04'),
(54, 168, 'dsfsad', '', '', '', '', '', '', '', '', '2023-11-24 10:43:53', '2023-11-24 02:43:53'),
(55, 169, 'no money', '', '', '', '', '', '', '', '', '2023-11-24 10:52:08', '2023-11-24 02:52:08'),
(56, 170, 'No money', '', '', '', '', '', '', '', '', '2023-11-24 16:33:15', '2023-11-24 08:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `educationalhistory`
--

CREATE TABLE `educationalhistory` (
  `EducationalHistoryID` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `SchoolName` varchar(255) DEFAULT NULL,
  `GradeLevel` varchar(50) DEFAULT NULL,
  `EnrollmentDate` date DEFAULT NULL,
  `GraduationDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `MedicalHistoryID` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `MedicalCondition` varchar(255) DEFAULT NULL,
  `Medications` varchar(255) DEFAULT NULL,
  `Allergies` varchar(255) DEFAULT NULL,
  `LastCheckupDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(20) NOT NULL,
  `program_id` int(20) DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `notification_name` varchar(100) NOT NULL,
  `notification_body` varchar(255) NOT NULL,
  `notif_type` varchar(50) DEFAULT NULL,
  `is_opened` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `program_id`, `user_id`, `notification_name`, `notification_body`, `notif_type`, `is_opened`, `created_at`, `updated_at`) VALUES
(1, 10, 11, 'has enrolled to this program', 'has successfully enrolled to this program at 2023-11-29 15:45:28', NULL, 1, '2023-11-29 15:45:28', '2023-11-29 08:47:56'),
(2, 14, 11, 'has successfully enrolled a program', 'has successfully enrolled to this program at 2023-11-29 15:55:37', 'enroll', 1, '2023-11-29 15:55:38', '2023-11-29 08:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(50) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `program_description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `program_description`, `created_at`, `updated_at`) VALUES
(10, 'Health Family', 'Is for all children whether they are registered or sponsored for health. The children must have medical history to provide them with care and service and must be 4 – 18 years old to attend this.', '2023-11-22 23:46:16', '2023-11-22 15:46:16'),
(11, 'Health Promotion ', 'The CIBI will conduct and have a program based on their financial medical expense that the children must attend to', '2023-11-23 00:41:12', '2023-11-22 16:41:12'),
(12, 'Social Accountability', 'The CIBI will conduct and have a program disadvantaged backgrounds involves empowering them to understand their rights, advocate for themselves given by the head on CIBI on what to attend by the children who are 8 – 18 years old ', '2023-11-23 16:26:26', '2023-11-23 08:26:26'),
(13, 'Adolescent Health', 'The CIBI will conduct and have a program given by the head of CIBI on what to attend by the children who are in teen years', '2023-11-23 22:11:04', '2023-11-23 14:11:04'),
(14, 'Nutrition Program', 'The CIBI will conduct and have a program given by the head on CIBI on what to attend by the children who are 8 – 18 years old ', '2023-11-23 22:12:17', '2023-11-23 14:12:17'),
(15, 'Education ', 'This program is for sponsored children who are in school. The CIBI will conduct and have a program given by the head on CIBI on what to attend by the children who are in elementary, junior high and senior high.', '2023-11-23 22:14:56', '2023-11-23 14:14:56'),
(16, 'Basic Computer Skills Training', 'The CIBI will conduct and have a program given by the head on CIBI on what to attend by the children that needs to learn computer skills in workshop \r\n', '2023-11-23 22:16:15', '2023-11-23 14:18:38'),
(17, 'Tutoring Program/Academic Reinforcement ', 'The CIBI will conduct and have a program given by the head on CIBI on what to attend by the children who wants to learn a subject.', '2023-11-23 22:20:13', '2023-11-23 14:20:13'),
(18, 'Aflatoun', 'This is for children who are needed in financial assistance ', '2023-11-23 22:23:44', '2023-11-23 14:23:44'),
(19, 'Scholarship', 'The CIBI will conduct and have a program given by the head on CIBI for sponsor who are in higher school such as senior high or college that wants to apply in scholarship program', '2023-11-23 22:25:01', '2023-11-23 14:25:01'),
(20, 'ECCD(Early Childhood Care and Development) ', 'The CIBI will conduct and have a program given by the head on CIBI for parents and children to health screens workshops for parents and activities for children to have a health relationships and home visits', '2023-11-23 22:30:13', '2023-11-23 14:30:53'),
(21, 'Life Skills ', 'This program is for sponsored children who are in school. Given by the program on what skills should he/she need to learn in order to use it when he/she graduate from the CIBI.', '2023-11-23 22:33:01', '2023-11-23 14:33:01'),
(22, 'WeLearn', 'The CIBI will conduct and have a program given by the head on CIBI on what to attend by the children who wants to learn a skill.', '2023-11-23 22:41:09', '2023-11-23 14:41:09'),
(23, 'Jobs Ready', 'This program is for sponsored children who are in school. Given by the CIBI on what job’s would he/she apply when graduated in CIBI.', '2023-11-23 22:43:44', '2023-11-23 14:43:44'),
(24, 'Career Readiness Program ', 'The CIBI will conduct and have a program given by the head on CIBI for graduated from CIBI children who are 18 yrs old', '2023-11-23 22:44:31', '2023-11-23 14:44:31'),
(25, 'Post-Secondary Scholarship ', 'This is for children who are in college in needs to apply secondary scholarship ', '2023-11-23 22:45:28', '2023-11-23 14:45:28'),
(26, 'Universal Values Others/Family Aid ', 'This is for all children whether they are registered or sponsored for charities and there is no age limit. ', '2023-11-23 22:46:30', '2023-11-23 14:46:30'),
(27, 'Birthday Gift ', 'The CIBI will conduct a program who have birthdays from January to december', '2023-11-23 22:47:22', '2023-11-23 14:47:22'),
(28, 'Christmas Gift ', 'All registered and sponsored children will be given gifts in every Christmas', '2023-11-23 22:48:10', '2023-11-23 14:48:10'),
(29, 'Economic Assistance ', 'All registered and sponsored children will be given assistance in their needs.', '2023-11-23 22:48:51', '2023-11-23 14:48:51'),
(31, 'Feeding Program', '', '2023-11-24 12:15:11', '2023-11-24 04:15:11'),
(32, 'Tuli Program', 'Free Tuli for all boys', '2023-11-24 16:18:03', '2023-11-24 08:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `program_tags`
--

CREATE TABLE `program_tags` (
  `id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_tags`
--

INSERT INTO `program_tags` (`id`, `program_id`, `tag_name`) VALUES
(29, 11, 'health'),
(30, 11, 'medical expense'),
(63, 20, 'receiving benefits'),
(64, 20, '4-12 years old'),
(65, 20, 'elementary'),
(66, 20, 'pre-school'),
(67, 20, 'kindergarten'),
(73, 23, 'receiving benefits'),
(74, 23, 'senior high'),
(75, 23, 'college'),
(76, 23, '17-18 years old'),
(77, 24, 'Receiving Benefits'),
(78, 24, '18 years old'),
(79, 25, 'receiving benefits'),
(80, 25, 'senior high'),
(81, 25, 'college'),
(93, 10, 'health'),
(94, 10, '4-18'),
(95, 13, 'health'),
(96, 13, '13-18'),
(97, 12, 'health'),
(98, 12, '8-18'),
(103, 15, '3-18'),
(105, 17, '6-18'),
(106, 18, '12000'),
(107, 19, 'senior high'),
(108, 19, 'college'),
(109, 28, 'all'),
(110, 29, 'all'),
(111, 27, 'all'),
(112, 26, 'all'),
(113, 22, '6-18'),
(114, 14, 'health'),
(115, 14, '4-18'),
(116, 14, 'underweight'),
(117, 21, 'college'),
(118, 21, 'senior high'),
(119, 16, 'education'),
(120, 16, '6-18'),
(124, 31, 'health'),
(125, 31, '4-18 years old'),
(126, 31, 'elementary'),
(127, 30, 'Gender'),
(128, 30, 'Male'),
(129, 30, '6-18 years old'),
(130, 32, 'Male'),
(131, 32, '8-18 years olds');

-- --------------------------------------------------------

--
-- Table structure for table `registered_siblings`
--

CREATE TABLE `registered_siblings` (
  `id` int(20) NOT NULL,
  `child_id` int(20) NOT NULL,
  `sibling_first_name` varchar(50) NOT NULL,
  `sibling_last_name` varchar(50) NOT NULL,
  `sibling_dob` date NOT NULL,
  `sibling_gender` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_siblings`
--

INSERT INTO `registered_siblings` (`id`, `child_id`, `sibling_first_name`, `sibling_last_name`, `sibling_dob`, `sibling_gender`, `created_at`, `updated_at`) VALUES
(39, 157, 'asdf', 'dfdf', '2023-11-08', 'male', '2023-11-22 18:26:21', '2023-11-22 10:26:21'),
(40, 157, 'sd', 's', '2023-11-30', 'male', '2023-11-22 18:26:21', '2023-11-22 10:26:21'),
(41, 157, 'dxcvxc', 'df', '2023-11-18', 'male', '2023-11-22 18:26:21', '2023-11-22 10:26:21'),
(42, 157, 'vxcv', 'vxc', '2023-11-24', 'male', '2023-11-22 18:26:21', '2023-11-22 10:26:21'),
(43, 158, 'Danica', 'Gomez', '2008-07-22', 'female', '2023-11-23 16:01:45', '2023-11-23 08:01:45'),
(44, 160, '', '', '0000-00-00', 'male', '2023-11-23 22:06:09', '2023-11-23 14:06:09'),
(49, 162, '', '', '0000-00-00', 'male', '2023-11-24 04:04:12', '2023-11-23 20:04:12'),
(50, 163, '', '', '0000-00-00', 'male', '2023-11-24 04:05:13', '2023-11-23 20:05:13'),
(51, 167, 'rtdtdr', 'gcfgcfgcfg', '2023-11-07', 'female', '2023-11-24 10:42:28', '2023-11-24 02:42:28'),
(52, 168, 'dsadas', 'dsada', '2023-11-07', 'female', '2023-11-24 10:44:14', '2023-11-24 02:44:14'),
(53, 169, 'Rose Mary', 'Anne', '2022-07-13', 'female', '2023-11-24 10:53:48', '2023-11-24 02:53:48'),
(54, 170, 'Danica', 'Olvega', '2004-04-26', 'female', '2023-11-24 16:37:47', '2023-11-24 08:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `schedule_id` int(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `schedule_limit` int(50) NOT NULL,
  `isSet` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `schedule_id`, `date_from`, `date_to`, `schedule_limit`, `isSet`, `created_at`, `updated_at`) VALUES
(8, 10, '2023-11-01', '2023-11-30', 6, 1, '2023-11-23 02:56:44', '2023-11-23 17:03:10'),
(10, 16, '2023-11-23', '2023-11-25', 100, 1, '2023-11-23 22:50:39', '2023-11-23 14:50:39'),
(12, 29, '2023-11-01', '2023-11-18', 20, 1, '2023-11-23 22:59:40', '2023-11-23 14:59:40'),
(13, 26, '2023-11-23', '2023-11-25', 20, 1, '2023-11-23 23:00:13', '2023-11-23 15:00:13'),
(14, 14, '2023-11-01', '2023-11-30', 2, 1, '2023-11-24 01:30:25', '2023-11-23 17:30:25'),
(15, 10, '2023-11-01', '2023-11-30', 3, 1, '2023-11-24 01:31:57', '2023-11-24 06:56:34'),
(16, 21, '2023-11-01', '2023-11-30', 2, 1, '2023-11-24 03:45:17', '2023-11-23 19:45:17'),
(18, 30, '2023-11-01', '2023-11-30', 0, 1, '2023-11-24 12:46:57', '2023-11-24 04:46:57'),
(19, 32, '2023-11-23', '2023-11-28', 3, 1, '2023-11-24 16:41:30', '2023-11-24 08:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_of_events`
--

CREATE TABLE `schedule_of_events` (
  `id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `program_description` varchar(50) NOT NULL,
  `no_of_days` int(5) NOT NULL,
  `date` date NOT NULL,
  `event_time` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_of_events`
--

INSERT INTO `schedule_of_events` (`id`, `program_id`, `program_description`, `no_of_days`, `date`, `event_time`, `created_at`, `updated_at`) VALUES
(7, 10, 'Blood Pressure Monitoring', 2, '2023-11-01', '08:00:00', '2023-11-22 16:48:11', '2023-11-22 15:48:11'),
(8, 11, 'Bunot Ngipin Program', 2, '2023-11-03', '13:00:00', '2023-11-22 17:41:42', '2023-11-22 16:41:42'),
(9, 16, 'Learn how photoshoot and create an art using tools', 3, '2023-11-23', '07:00:00', '2023-11-23 15:54:01', '2023-11-23 14:54:01'),
(10, 14, 'Pizza Party crash enjoy your food with your favori', 3, '2023-11-23', '08:00:00', '2023-11-23 15:55:43', '2023-11-23 14:55:43'),
(11, 17, 'English language tutorial', 2, '2023-11-27', '10:00:00', '2023-11-23 15:57:11', '2023-11-23 14:57:11'),
(13, 29, 'sdffasfasfasfasf', 3, '2023-11-30', '18:23:00', '2023-11-29 09:23:36', '2023-11-29 08:23:36'),
(14, 16, 'adsdasdasd', 1, '2023-11-29', '07:00:00', '2023-11-29 10:27:23', '2023-11-29 09:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_siblings`
--

CREATE TABLE `unregistered_siblings` (
  `id` int(20) NOT NULL,
  `child_id` int(20) NOT NULL,
  `unreg_first_name` varchar(100) NOT NULL,
  `unreg_last_name` varchar(100) NOT NULL,
  `unreg_dob` date NOT NULL,
  `unreg_gender` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unregistered_siblings`
--

INSERT INTO `unregistered_siblings` (`id`, `child_id`, `unreg_first_name`, `unreg_last_name`, `unreg_dob`, `unreg_gender`, `created_at`, `updated_at`) VALUES
(82, 157, 'fg', 'dafs', '2023-11-10', 'male', '2023-11-22 18:26:08', '2023-11-22 10:26:08'),
(83, 157, 'dfasdg', 'dfas', '2023-12-07', 'male', '2023-11-22 18:26:08', '2023-11-22 10:26:08'),
(84, 157, 'sdasdf', 'dfg', '2023-11-28', 'male', '2023-11-22 18:26:08', '2023-11-22 10:26:08'),
(85, 157, 'sdf', 'sdfasdf', '2023-11-16', 'male', '2023-11-22 18:26:08', '2023-11-22 10:26:08'),
(86, 158, 'Hannah', 'Mulan', '2021-06-30', 'male', '2023-11-23 16:01:14', '2023-11-23 08:01:14'),
(87, 160, '', '', '0000-00-00', 'male', '2023-11-23 22:06:05', '2023-11-23 14:06:05'),
(92, 162, '', '', '0000-00-00', 'male', '2023-11-24 04:04:06', '2023-11-23 20:04:06'),
(93, 163, '', '', '0000-00-00', 'male', '2023-11-24 04:05:12', '2023-11-23 20:05:12'),
(94, 167, '', '', '0000-00-00', 'male', '2023-11-24 10:42:16', '2023-11-24 02:42:16'),
(95, 168, '', '', '0000-00-00', 'male', '2023-11-24 10:44:07', '2023-11-24 02:44:07'),
(96, 169, '', '', '0000-00-00', 'male', '2023-11-24 10:53:20', '2023-11-24 02:53:20'),
(98, 170, '', '', '0000-00-00', 'male', '2023-11-24 16:36:41', '2023-11-24 08:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_management` int(1) NOT NULL,
  `child_profile` int(1) NOT NULL,
  `scheduler` int(1) NOT NULL,
  `reports` int(1) NOT NULL,
  `utilities` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `first_name`, `last_name`, `username`, `password`, `email`, `phoneNumber`, `address`, `role`, `user_management`, `child_profile`, `scheduler`, `reports`, `utilities`, `created_at`, `updated_at`) VALUES
(1, 'john', 'doe', 'john', '7815696ecbf1c96e6894b779456d330e', 'jhondoe@gmail.com', '09989898', '', 'Admin', 0, 0, 0, 0, 0, NULL, '2023-11-28 13:29:59'),
(2, 'qwerty', 'zxc', 'asda', 'd41d8cd98f00b204e9800998ecf8427e', 'sdf@gasd.com', '09123456798', 'fgaw', 'sub-admin', 0, 0, 0, 0, 0, '2023-11-15 08:14:14', '2023-11-15 00:58:51'),
(3, 'John', 'Lyod Cruz', 'jeje', 'd41d8cd98f00b204e9800998ecf8427e', 'sadasd@klgdsf.com', '093214567987', 'fdgsdf', 'sub-admin', 1, 1, 1, 1, 1, '2023-11-15 08:14:44', '2023-11-24 03:00:06'),
(5, 'Jojo ', 'st', 'asd', '7815696ecbf1c96e6894b779456d330e', '123@123.com', '09123456789', 'asd', 'sub-admin', 1, 0, 0, 0, 0, '2023-11-23 20:34:24', '2023-11-23 12:34:24'),
(6, 'russ', 'russ', 'russ', '202cb962ac59075b964b07152d234b70', '123@123.com', '09123456789', 'asdasd', 'sub-admin', 1, 0, 0, 0, 0, '2023-11-23 20:37:35', '2023-11-23 12:37:35'),
(7, 'Ely Joshua', 'Salvidar', 'ej', '202cb962ac59075b964b07152d234b70', 'darknightzer056@gmail.com', '09878756563', 'Legazpi', 'sub-admin', 1, 0, 0, 0, 0, '2023-11-24 10:58:57', '2023-11-24 02:58:57'),
(8, 'Den Cris', 'Martos', 'den', '202cb962ac59075b964b07152d234b70', 'fs@asdasd.com', '', '', 'sub-admin', 1, 0, 0, 0, 0, '2023-11-24 16:21:09', '2023-11-24 08:21:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `childprofiles`
--
ALTER TABLE `childprofiles`
  ADD PRIMARY KEY (`ChildID`);

--
-- Indexes for table `childratings`
--
ALTER TABLE `childratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `FK_ChildRatings_Child` (`ChildID`);

--
-- Indexes for table `child_account`
--
ALTER TABLE `child_account`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `child_attendance`
--
ALTER TABLE `child_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_family_information`
--
ALTER TABLE `child_family_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_house_hold_information`
--
ALTER TABLE `child_house_hold_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_info`
--
ALTER TABLE `child_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_program`
--
ALTER TABLE `child_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_school_info`
--
ALTER TABLE `child_school_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationalhistory`
--
ALTER TABLE `educationalhistory`
  ADD PRIMARY KEY (`EducationalHistoryID`),
  ADD KEY `FK_EducationalHistory_Child` (`ChildID`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`MedicalHistoryID`),
  ADD KEY `FK_MedicalHistory_Child` (`ChildID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_tags`
--
ALTER TABLE `program_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ok1` (`program_id`);

--
-- Indexes for table `registered_siblings`
--
ALTER TABLE `registered_siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_of_events`
--
ALTER TABLE `schedule_of_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk1` (`program_id`);

--
-- Indexes for table `unregistered_siblings`
--
ALTER TABLE `unregistered_siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `childprofiles`
--
ALTER TABLE `childprofiles`
  MODIFY `ChildID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228123;

--
-- AUTO_INCREMENT for table `childratings`
--
ALTER TABLE `childratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child_account`
--
ALTER TABLE `child_account`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `child_attendance`
--
ALTER TABLE `child_attendance`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_family_information`
--
ALTER TABLE `child_family_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `child_house_hold_information`
--
ALTER TABLE `child_house_hold_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `child_info`
--
ALTER TABLE `child_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `child_program`
--
ALTER TABLE `child_program`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `child_school_info`
--
ALTER TABLE `child_school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `educationalhistory`
--
ALTER TABLE `educationalhistory`
  MODIFY `EducationalHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `MedicalHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `program_tags`
--
ALTER TABLE `program_tags`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `registered_siblings`
--
ALTER TABLE `registered_siblings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `schedule_of_events`
--
ALTER TABLE `schedule_of_events`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unregistered_siblings`
--
ALTER TABLE `unregistered_siblings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule_of_events`
--
ALTER TABLE `schedule_of_events`
  ADD CONSTRAINT `pk1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
