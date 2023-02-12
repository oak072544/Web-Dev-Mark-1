-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 06:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `d_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_age` int(10) NOT NULL,
  `d_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `skill_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `d_name`, `d_age`, `d_address`, `d_tel`, `skill_id`) VALUES
('1001', 'Nima', 41, 'Sukumvit', '0811112322', 1),
('1002', 'Jakapong', 45, 'Bangkae', '0865543212', 2),
('1003', 'Piya', 56, 'Rama4', '0863461932', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_career` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `p_name`, `p_age`, `p_gender`, `p_career`) VALUES
('58001', 'Sayan', 45, 'Male', 'Engineer'),
('58002', 'Yanee', 34, 'Female', 'Teacher'),
('58003', 'Somsak', 21, 'Male', 'Student'),
('58004', 'Pimonpa', 9, 'Female', 'Student'),
('58005', 'Vatinee', 52, 'Female', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `patient_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `symptom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`patient_id`, `doctor_id`, `datetime`, `symptom`, `method`) VALUES
('58001', '1002', '2020-10-12 09:32:38', 'ไข้เลือดออก', 'ฉีดยา,ดูอาการ'),
('58002', '10003', '2020-10-13 13:46:38', 'ไข้หวัดใหญ่', 'ฉีดยา'),
('58003', '1002', '2020-11-04 08:35:41', 'ผื่นคัน', 'ให้ยา'),
('58004', '1001', '2021-03-17 10:09:41', 'แขนหัก', 'เข้าเฝือก'),
('58005', '1003', '2021-10-11 14:52:14', 'ไข้', 'ให้ยา');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill`) VALUES
(1, 'ศัลยกรรมกระดูก'),
(2, 'อายุรกรรม'),
(3, 'หัวใจ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
