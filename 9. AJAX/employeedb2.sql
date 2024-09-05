-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 10:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `departmentid` int(5) NOT NULL,
  `department` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`departmentid`, `department`) VALUES
(1, 'College of Engineering'),
(2, 'College of Agriculture'),
(3, 'College of Teacher Education'),
(4, 'College of Administration, Business, Hospitality and Accountancy'),
(5, 'College of Arts & Sciences'),
(6, 'College of Industrial Technology'),
(7, 'College of Allied Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `employeeid` int(11) NOT NULL,
  `firstname` varchar(75) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `departmentid` int(5) NOT NULL,
  `programid` int(5) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblprogram`
--

CREATE TABLE `tblprogram` (
  `programid` int(4) NOT NULL,
  `departmentid` int(5) NOT NULL,
  `program` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprogram`
--

INSERT INTO `tblprogram` (`programid`, `departmentid`, `program`) VALUES
(1, 1, 'Civil Engineering'),
(2, 1, 'Computer Engineering'),
(3, 1, 'Electrical Engineering'),
(4, 1, 'Electronics Engineering'),
(5, 1, 'Industrial Engineering'),
(6, 1, 'Mechanical Engineering'),
(7, 2, 'Agriculture (Animal Science)'),
(8, 2, 'Agriculture (Crop Science)'),
(9, 2, 'Agriculture (Organic Agriculture)'),
(10, 2, 'Environmental Science'),
(11, 2, 'Forestry'),
(12, 3, 'Elementary Education'),
(13, 3, 'Culture & Arts Education'),
(14, 3, 'Exercise & Sports Sciences'),
(15, 3, 'Secondary Education (English)'),
(16, 3, 'Secondary Education (Filipino)'),
(17, 3, 'Secondary Education (Mathematics)'),
(18, 3, 'Secondary Education (Social Studies)'),
(19, 3, 'Secondary Education (Sciences)'),
(20, 3, 'BTLED (Home Economics)'),
(21, 3, 'BTLED (Information & Communications Technology)'),
(22, 3, 'BTLED (Industrial Arts)'),
(23, 4, 'Public Administration'),
(24, 4, 'Accountancy'),
(25, 4, 'Business Administration (Financial Management)'),
(26, 4, 'Business Administration (Marketing Management)'),
(27, 4, 'Business Administration (Human Resource Management)'),
(28, 4, 'Hospitality Management'),
(29, 5, 'Communication'),
(30, 5, 'History'),
(31, 5, 'Psychology'),
(32, 5, 'Biology'),
(33, 5, 'Mathematics'),
(34, 6, 'Information Technology'),
(35, 6, 'Industrial Technology (Automotive)'),
(36, 6, 'Industrial Technology (Computer)'),
(37, 6, 'Industrial Technology (Electrical)'),
(38, 6, 'Industrial Technology (Electronics)'),
(39, 6, 'Industrial Technology (Food Technology)'),
(40, 6, 'Industrial Technology (Garment Technology)'),
(41, 6, 'Industrial Technology (Industrial Design)'),
(42, 6, 'Industrial Technology (Mechanical)'),
(43, 7, 'Midwifery'),
(44, 7, 'Nursing'),
(45, 7, 'Radiologic Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`employeeid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `programid` (`programid`);

--
-- Indexes for table `tblprogram`
--
ALTER TABLE `tblprogram`
  ADD PRIMARY KEY (`programid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `departmentid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `employeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `tblprogram`
--
ALTER TABLE `tblprogram`
  MODIFY `programid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `tblemployees_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `tbldepartment` (`departmentid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblemployees_ibfk_2` FOREIGN KEY (`programid`) REFERENCES `tblprogram` (`programid`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprogram`
--
ALTER TABLE `tblprogram`
  ADD CONSTRAINT `tblprogram_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `tbldepartment` (`departmentid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
