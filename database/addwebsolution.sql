-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 12:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addwebsolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Email` varchar(75) NOT NULL,
  `Admin_Mobile` varchar(25) DEFAULT NULL,
  `Admin_Password` varchar(100) NOT NULL,
  `Admin_Type` enum('Admin','Restarunt') NOT NULL DEFAULT 'Admin',
  `Admin_Address` varchar(200) DEFAULT NULL,
  `Admin_Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `Admin_Last_Login` timestamp NULL DEFAULT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Admin_Code_Reset_Password` varchar(20) NOT NULL DEFAULT '',
  `Admin_Exp_CRP` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Email`, `Admin_Mobile`, `Admin_Password`, `Admin_Type`, `Admin_Address`, `Admin_Status`, `Admin_Last_Login`, `Created_Date`, `Admin_Code_Reset_Password`, `Admin_Exp_CRP`) VALUES
(1, 'Admin', 'admin@admin.com', '1234567890', '$2y$13$btJ3HSPlAqHkPDsh5iRzdO0cbELSPyAKTgDk19bSdZ7uDxh7lYWPC', 'Admin', NULL, 'Active', NULL, '2021-06-26 07:52:36', '', '2021-06-26 13:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shortlink`
--

CREATE TABLE `tbl_shortlink` (
  `id` bigint(21) NOT NULL,
  `oringnal_link` text NOT NULL,
  `code` varchar(8) NOT NULL,
  `insertdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shortlink`
--

INSERT INTO `tbl_shortlink` (`id`, `oringnal_link`, `code`, `insertdate`) VALUES
(1, 'https://addwebsolution.com/', 'FB20817p', '2021-06-27 10:10:00'),
(2, 'https://mail.google.com/', 'IH7v9B1W', '2021-06-27 10:10:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `tbl_shortlink`
--
ALTER TABLE `tbl_shortlink`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shortlink`
--
ALTER TABLE `tbl_shortlink`
  MODIFY `id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
