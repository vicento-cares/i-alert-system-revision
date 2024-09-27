-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 04:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ialert`
--

-- --------------------------------------------------------

--
-- Table structure for table `ialert_process`
--

CREATE TABLE `ialert_process` (
  `id` int(10) UNSIGNED NOT NULL,
  `process` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `falp_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ialert_process`
--

INSERT INTO `ialert_process` (`id`, `process`, `section`, `falp_group`) VALUES
(1, 'Cutting and Crimping', '', 'First Process'),
(2, 'SAM', '', 'First Process'),
(3, 'JAM', '', 'First Process'),
(4, 'UV', '', 'First Process'),
(5, 'Battery Crimping', '', 'First Process'),
(6, 'NSC/NSE', '', 'First Process'),
(7, 'Manual Crimping', '', 'Secondary Process'),
(8, 'Mid-stripping', '', 'Secondary Process'),
(9, 'Joint Crimping', '', 'Secondary Process'),
(10, 'Joint Taping', '', 'Secondary Process'),
(11, 'Casting', '', 'Secondary Process'),
(12, 'Shieldwire Taping', '', 'Secondary Process'),
(13, 'Quick-stripping', '', 'Secondary Process'),
(14, 'Welding Process', '', 'Secondary Process'),
(15, 'Water Press Pad', '', 'Secondary Process'),
(16, 'Heatshrink', '', 'Secondary Process'),
(17, 'Twisting', '', 'Secondary Process'),
(18, 'Gomusen Insertion', '', 'Secondary Process'),
(19, 'Point Marking', '', 'Secondary Process'),
(20, 'Loopings', '', 'Secondary Process'),
(21, 'LA Molding', '', 'Secondary Process'),
(22, 'Servo', '', 'Secondary Process'),
(23, 'Silicon Injection', '', 'Secondary Process'),
(24, 'Dip-Soldering', '', 'Secondary Process'),
(25, 'N/A', '', 'Secondary Process'),
(26, 'Wire Setting', '', 'Final Process'),
(27, 'Sub-Assembly', '', 'Final Process'),
(28, 'Bukumi', '', 'Final Process'),
(29, 'Shiage', '', 'Final Process'),
(30, 'Lay-out', '', 'Final Process'),
(31, 'Grommet Insertion', '', 'Final Process'),
(32, 'Dimension', '', 'Final Process'),
(33, 'ECT', '', 'Final Process'),
(34, 'Clamp Checking', '', 'Final Process'),
(35, 'Fuse Image', '', 'Final Process'),
(36, 'Grease Injection', '', 'Final Process'),
(37, 'ITDD', '', 'Final Process'),
(38, 'Appearance', '', 'Final Process'),
(39, 'Assurance', '', 'Final Process'),
(40, 'Option Taping', '', 'Final Process'),
(41, 'Repair', '', 'Final Process'),
(42, 'Re-Assy', '', 'Final Process'),
(43, 'QC Verification', '', 'Final Process'),
(44, 'QC-Tsumesen', '', 'Final Process'),
(45, 'Tsumesen Insertion', '', 'Final Process'),
(46, 'Dock Audit', '', 'Final Process'),
(47, 'Finished Goods', '', 'Final Process'),
(48, 'Warehouse', '', 'Other Group'),
(49, 'Fabrication', '', 'Other Group'),
(50, 'Equipment', '', 'Other Group'),
(51, 'IT', '', 'Other Group'),
(52, 'AME', '', 'Other Group'),
(53, 'ME', '', 'Other Group'),
(54, 'FGI', '', 'Other Group'),
(55, 'QC', '', 'Other Group');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ialert_process`
--
ALTER TABLE `ialert_process`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `process` (`process`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ialert_process`
--
ALTER TABLE `ialert_process`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
