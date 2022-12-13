-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 06:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farhanx`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `d_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `p_name`, `email`, `phone`, `d_name`, `created_at`) VALUES
(4, 'kevin Hill', 'gaildavidn510@gmail.com', '01521520881', 'DR. ZHANDU BUM', '0000-00-00 00:00:00'),
(6, 'KUPA SHAMSU', 'kupaaaaaaa@gmail.com', '45487845177', 'DR. TP DHOR', '0000-00-00 00:00:00'),
(8, 'HASHEM ALI', 'tahera@gmail.com', '48484848', 'DR. TAHER', '0000-00-00 00:00:00'),
(9, 'ZAHID HASAN', 'zahid@gmail.com', '854848484848945', 'DR. JHATT', '0000-00-00 00:00:00'),
(11, 'Arpon karmakar', 'as@gmail.com', '01741949180', 'DR. TP DHOR', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `id` int(10) UNSIGNED NOT NULL,
  `blood_type` varchar(25) DEFAULT NULL,
  `blood_status` varchar(255) DEFAULT NULL,
  `exp_date` varchar(25) DEFAULT NULL,
  `source_type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`id`, `blood_type`, `blood_status`, `exp_date`, `source_type`, `created_at`) VALUES
(3, 'B+', 'Fresh', '2022-11-26', 'Volunteer', '0000-00-00 00:00:00'),
(4, 'AB-', 'Fresh', '22-12-23', 'Volunteer', '0000-00-00 00:00:00'),
(5, 'O+', 'Fresh', '2022-11-25', 'Volunteer', '0000-00-00 00:00:00'),
(13, 'B-', 'Well Preserved', '2026-06-16', 'Volunteer', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cabin`
--

CREATE TABLE `cabin` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `room` varchar(10) NOT NULL,
  `n_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabin`
--

INSERT INTO `cabin` (`id`, `p_name`, `b_name`, `room`, `n_name`) VALUES
(3, 'Hatkata Kartik', 'Annex 1', '1009', 'Munni'),
(4, 'labib', 'Annex 3', '3023', 'Munni'),
(5, 'JHANDA', 'ANNEX 6', '60666', 'Arohi');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `batch` varchar(30) NOT NULL,
  `exp` date NOT NULL,
  `quantity` int(10) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `m_name`, `batch`, `exp`, `quantity`, `c_name`) VALUES
(1, 'NAPA', '#GF4356hfdh', '2022-11-16', 18, 'BEXIMCO'),
(2, 'LOSECTILE 20 MG', '#fh4443EX', '2022-11-23', 45, 'SK-F'),
(4, 'RUPA', '#fh4443EX', '2022-12-30', 45, 'SK-F'),
(9, 'SECLO', '#ferfhueryhfru', '2026-10-21', 45, 'NIPRO-JMI');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `pID` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `medicalDiagonosis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `pID`, `firstName`, `lastName`, `medicine`, `dosage`, `medicalDiagonosis`) VALUES
(1, 'P2201', 'kartik', 'gonesh', 'losectil', '0-1-0', 'Gastric');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `userName`, `email`, `password`, `phone`) VALUES
(1, 'Md Farhan', 'Chowdhury', 'farhanx', 'farhanchowdhury66@gmail.com', '4411', '01812001009'),
(2, 'ZAHID', 'HASAN', 'zahidx', 'zahid@gmail.com', '123', '015487487878'),
(3, 'Labib', 'fdsff', 'lebu', 'labib@gmail.com', '123', '5541515151'),
(5, 'abc', 'xyx', 'abc', 'x@gmail.com', '123', '4353534'),
(8, 'Sayed', 'Zobayer', 'sayed', 'sayed@gmail.com', '123', '01789898556');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cabin`
--
ALTER TABLE `cabin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
