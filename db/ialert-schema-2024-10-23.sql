-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 09:47 AM
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
-- Table structure for table `ialert_account`
--

CREATE TABLE `ialert_account` (
  `id` int(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `esection` varchar(255) DEFAULT NULL,
  `car_maker` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `falp_group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ialert_audit`
--

CREATE TABLE `ialert_audit` (
  `id` int(20) NOT NULL,
  `batch` varchar(200) DEFAULT NULL,
  `date_audited` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `employee_num` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `groups` varchar(255) DEFAULT NULL,
  `car_maker` varchar(255) DEFAULT NULL,
  `car_model` varchar(255) DEFAULT NULL,
  `line_no` varchar(255) DEFAULT NULL,
  `process` varchar(255) DEFAULT NULL,
  `audit_findings` varchar(255) DEFAULT NULL,
  `audit_details` varchar(255) DEFAULT NULL,
  `audited_by` varchar(255) DEFAULT NULL,
  `problem_identification` varchar(255) DEFAULT NULL,
  `criticality_level` varchar(255) DEFAULT NULL,
  `audit_type` varchar(200) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `pd` varchar(255) DEFAULT NULL,
  `hr` varchar(255) DEFAULT NULL,
  `agency` varchar(255) DEFAULT NULL,
  `penalty` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `section_code` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `falp_group` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `date_sent` varchar(255) DEFAULT NULL,
  `edit_count` varchar(255) DEFAULT '2',
  `updated_by` varchar(100) DEFAULT NULL,
  `date_recieved` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ialert_audit_findings_categ`
--

CREATE TABLE `ialert_audit_findings_categ` (
  `id` int(20) NOT NULL,
  `audit_findings` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ialert_for_ir`
--

CREATE TABLE `ialert_for_ir` (
  `id` int(20) NOT NULL,
  `audit_findings` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ialert_history`
--

CREATE TABLE `ialert_history` (
  `id` int(20) NOT NULL,
  `audit_id` varchar(100) DEFAULT NULL,
  `date_audited` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `groups` varchar(100) DEFAULT NULL,
  `carmaker` varchar(100) DEFAULT NULL,
  `carmodel` varchar(100) DEFAULT NULL,
  `line_no` varchar(100) DEFAULT NULL,
  `process` varchar(100) DEFAULT NULL,
  `audit_findings` varchar(100) DEFAULT NULL,
  `audit_details` varchar(255) DEFAULT NULL,
  `audited_by` varchar(100) DEFAULT NULL,
  `problem_identification` varchar(255) DEFAULT NULL,
  `criticality_level` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `pd` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `hr` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `batch` varchar(100) DEFAULT NULL,
  `edit_count` varchar(100) DEFAULT '2',
  `position` varchar(100) DEFAULT NULL,
  `date_edited` varchar(100) DEFAULT NULL,
  `indicator_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ialert_lines`
--

CREATE TABLE `ialert_lines` (
  `id` int(20) NOT NULL,
  `line_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ialert_line_audit`
--

CREATE TABLE `ialert_line_audit` (
  `id` int(20) NOT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `groups` varchar(255) DEFAULT NULL,
  `date_audited` date DEFAULT NULL,
  `car_maker` varchar(255) DEFAULT NULL,
  `car_model` varchar(255) DEFAULT NULL,
  `line_no` varchar(255) DEFAULT NULL,
  `process` varchar(255) DEFAULT NULL,
  `audit_findings` varchar(255) DEFAULT NULL,
  `audit_details` varchar(255) DEFAULT NULL,
  `audited_by` varchar(255) DEFAULT NULL,
  `problem_identification` varchar(255) DEFAULT NULL,
  `criticality_level` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `audit_type` varchar(255) DEFAULT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `section_code` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `falp_group` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `ialert_section`
--

CREATE TABLE `ialert_section` (
  `id` int(11) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `falp_group` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `section_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ialert_account`
--
ALTER TABLE `ialert_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_audit`
--
ALTER TABLE `ialert_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_audit_findings_categ`
--
ALTER TABLE `ialert_audit_findings_categ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_for_ir`
--
ALTER TABLE `ialert_for_ir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_history`
--
ALTER TABLE `ialert_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_lines`
--
ALTER TABLE `ialert_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_line_audit`
--
ALTER TABLE `ialert_line_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ialert_process`
--
ALTER TABLE `ialert_process`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `process` (`process`);

--
-- Indexes for table `ialert_section`
--
ALTER TABLE `ialert_section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ialert_account`
--
ALTER TABLE `ialert_account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_audit`
--
ALTER TABLE `ialert_audit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_audit_findings_categ`
--
ALTER TABLE `ialert_audit_findings_categ`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_for_ir`
--
ALTER TABLE `ialert_for_ir`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_history`
--
ALTER TABLE `ialert_history`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_lines`
--
ALTER TABLE `ialert_lines`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_line_audit`
--
ALTER TABLE `ialert_line_audit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_process`
--
ALTER TABLE `ialert_process`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ialert_section`
--
ALTER TABLE `ialert_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
