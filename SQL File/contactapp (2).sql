-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 04:13 AM
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
-- Database: `contactapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `idContacts` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `contactPhone` varchar(11) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactAddress` varchar(255) NOT NULL,
  `contactGender` varchar(30) NOT NULL,
  `contactGroup` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`idContacts`, `fullname`, `contactPhone`, `contactEmail`, `contactAddress`, `contactGender`, `contactGroup`, `created_at`) VALUES
(2, 'Glory Ilabija', '08142424242', 'glory@gmail.com', 'Lagos State', 'Female', 1, '2023-08-03 21:46:21'),
(3, 'Patience IL', '08108333333', 'patience@gmail.com', 'kogi State', 'Female', 7, '2023-08-04 13:56:15'),
(4, 'smith emmanuel', '08177777777', 'smith@gmail.com', 'Ogun state', 'Male', 8, '2023-08-04 16:37:54'),
(5, 'Samuel Israel', '00900000000', 'samuel@gmail.com', 'Edo State', 'Male', 7, '2023-08-04 18:02:58'),
(6, 'caleb omata ilabija', '08100000000', 'calebilabija@gmail.com', '1, Alhaji Sekoni Street, Alaguntan , Iyana - Ipaja Lagos State', 'Male', 1, '2023-08-05 03:29:40'),
(8, 'Dammy Adams', '09055554444', 'Dammy@gmail.com', 'Ilorin', 'Male', 9, '2023-08-05 03:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `idGroups` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`idGroups`, `name`) VALUES
(8, 'Business'),
(1, 'Family'),
(9, 'Friends'),
(7, 'Work');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idContacts`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroups`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContacts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroups` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
