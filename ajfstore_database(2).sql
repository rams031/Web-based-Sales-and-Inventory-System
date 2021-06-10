-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2021 at 06:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajfstore_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branchid` int(11) NOT NULL,
  `branchtype` varchar(100) NOT NULL,
  `branchname` varchar(256) NOT NULL,
  `branchlocation` varchar(256) NOT NULL,
  `branchaddress` varchar(255) NOT NULL,
  `branchdescription` varchar(256) NOT NULL,
  `datestarted` date NOT NULL,
  `branchtinnumber` varchar(256) DEFAULT NULL,
  `branchregistrationnumber` varchar(256) DEFAULT NULL,
  `branchemail` varchar(255) DEFAULT NULL,
  `branchcontact` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchid`, `branchtype`, `branchname`, `branchlocation`, `branchaddress`, `branchdescription`, `datestarted`, `branchtinnumber`, `branchregistrationnumber`, `branchemail`, `branchcontact`) VALUES
(9, 'main', 'mang totoy branch', 'caloocan city', 'dffgjdfgnidjfgb', 'gdhfghfjghjghj', '2021-04-24', '', '', 'fgdsfg@gmail.com', 23423422),
(10, 'branch', 'aling puring', 'caloocan city', 'dfgihd8fgh89duh9', 'dfghfghfvbnbn', '2021-04-24', '444', '', 'fsgdfhghfghfhg@gmail.com', 2345345),
(11, 'branch', 'dfghdfh', 'dghfgh', 'dsfgdfgdfg', 'dfgdfg', '2021-05-02', '', '', 'dfgdfgdfg@gmail.com', 34234),
(12, 'main', 'test inc', 'test', 'test', 'test', '2021-05-21', '', '', '', 2123123),
(13, 'branch', 'ajf', 'cal', 'test', 'test', '2021-06-08', '23', '', 'test@gmail.com', 213);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `userpassword` varchar(256) NOT NULL,
  `datecreated` int(11) NOT NULL,
  `contacts` int(20) NOT NULL,
  `usertype` varchar(256) NOT NULL,
  `branchid` int(10) DEFAULT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userid`, `username`, `userpassword`, `datecreated`, `contacts`, `usertype`, `branchid`, `firstname`, `lastname`, `gender`) VALUES
(23, 'admin', '123', 20210424, 345345345, 'admin', 9, 'test', 'admin', 'male'),
(24, 'sales', '123', 20210424, 356546723, 'sales', 10, 'test', 'sales', 'male'),
(25, 'salestest', '123', 20210501, 43534534, 'sales', 10, 'james', 'jordan', 'male'),
(26, 'admintest', '123', 20210501, 3453456, 'admin', 9, 'samar', 'danao', 'male'),
(27, 'sales', '123', 20210501, 356546723, 'sales', 10, 'test', 'sales', 'male'),
(28, 'ghelods', '345345', 20210507, 34234234, 'admin', 9, 'yeah', 'dghgg', 'male'),
(29, 'admin2', '123', 20210521, 23423, 'admin', 9, 'pat', 'test', 'male'),
(30, 'admin123', '123', 20210522, 345345, 'admin', 12, 'radd', 'gopez', 'male'),
(31, 'balendo', '123', 20210608, 12312, 'sales', 13, 'test', 'test', 'male'),
(32, 'kenneth', '123', 20210608, 123, 'sales', 13, 'test', 'test', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
