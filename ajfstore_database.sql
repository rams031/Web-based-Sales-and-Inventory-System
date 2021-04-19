-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2021 at 06:13 AM
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
  `branchname` varchar(256) NOT NULL,
  `branchlocation` varchar(256) NOT NULL,
  `branchaddress` varchar(255) NOT NULL,
  `branchdescription` varchar(256) NOT NULL,
  `datestarted` date NOT NULL,
  `employeesize` int(3) NOT NULL,
  `branchtinnumber` varchar(256) DEFAULT NULL,
  `branchregistrationnumber` varchar(256) DEFAULT NULL,
  `branchemail` varchar(255) DEFAULT NULL,
  `branchcontact` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchid`, `branchname`, `branchlocation`, `branchaddress`, `branchdescription`, `datestarted`, `employeesize`, `branchtinnumber`, `branchregistrationnumber`, `branchemail`, `branchcontact`) VALUES
(1, 'mang totoy new branch', 'dfgdfgh', '34234', 'fsdg', '2021-04-17', 234234, 'dfgdfg', '1234234', 'sfgfsdg@gmail.com', 123123),
(3, 'dfsdf', 'dfgdfgdf', 'dfgdfgdfg', 'ghjghjgh', '2021-04-17', 3434, '', '', '', 2323),
(4, 'ghfgh', 'sdfgdfg', 'dfgdfg', 'fdgdfg', '2021-04-17', 234, '', '', '', 345345),
(5, 'dfgdfg', 'dfgdfgh', '34234', 'tanga', '2021-04-17', 234234, 'dfgdfg', '1234234', 'sfgfsdg@gmail.com', 123123),
(6, 'dfgdfg', 'dfgdfgh', '34234', 'asdfadsffgdfg', '2021-04-17', 234234, 'dfgdfg', '1234234', 'sfgfsdg@gmail.com', 123123),
(8, 'xcvxcv', 'dfgdfg', 'xcvxcv', 'dfgdfg', '2021-04-17', 23, '', '', '', 2342345);

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
(2, 'tyter', '234234', 20210410, 443534, 'sales', NULL, 'ren', 'hatdog', 'male'),
(6, 'sdfsdfsdf', 'sdfgsfg', 20210410, 234234, 'admin', NULL, 'sadfsdf', 'sdfgsg', 'female'),
(7, 'dfghgh', '7f4fe5fc9f6cd9600a88f746fb7b7178', 20210410, 3434, 'admin', NULL, 'gdhfgh', 'sdfgkhdiofug', 'female'),
(8, 'sdfsdf', '2c44aab4616f96633de3a6194e74576b', 20210410, 56456, 'admin', NULL, 'fghfghsdf', 'sdfsdf', 'male'),
(9, 'dghdfgh', '290c5e1b6391364d654a6296f85d5bf8', 20210410, 356456456, 'admin', NULL, 'dfgdfg', 'dfgdh', 'male'),
(10, 'Huleen', '0626143271f13d8c78d84dbba0aa1a91', 20210410, 23445, 'admin', NULL, 'Christopher', 'Johns', 'male'),
(11, 'fghfgh', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 20210410, 345345, 'admin', NULL, 'dfgfgh', 'fghfgh', 'male'),
(12, 'dfgdfg', '8d509c28896865f8640f328f30f15721', 20210410, 345345, 'admin', NULL, 'dfgdfg', 'dfgdfg', 'male'),
(13, '456456456', '633bd287609b5b5854509b614ef5bee0', 20210410, 12341234, 'admin', NULL, 'fghfgh', 'fghfgh', 'female'),
(14, '2345345345', '69d6142567f3384976a4919f2eb1b58f', 20210410, 456456, 'admin', NULL, 'fghfgh', '1231423', 'female'),
(15, '2345345345', '69d6142567f3384976a4919f2eb1b58f', 20210410, 456456, 'admin', NULL, 'fghfgh', '1231423', 'female'),
(16, '3453fgh', 'e0f3868715b755cb269e7236d295b3cc', 20210410, 435345345, 'sales', 1, 'sxfg', 'fdgdfg', 'male'),
(17, 'fghfgh', '7fbcbd05cb88db775cf3dc4cc160b255', 20210410, 43534534, 'admin', NULL, 'fghfgh', 'ghfgh', 'female'),
(18, 'sdfsdfdfdg', '0e68351a632b0114aa72dc8f8a3f2d73', 20210410, 356456456, 'admin', NULL, 'johjhsdfhg', 'uyklbcxfbv', 'female'),
(19, 'fgngbfgh', '7e7243ceff2c7a658c78461256b23e55', 20210410, 564674, 'admin', NULL, 'dfghdghfgh', 'fghfjh', 'female'),
(20, '345345dfg', '544209fe0dd0878b189fd51bea2f0e1d', 20210410, 54646754, 'admin', NULL, 'fdgdfgdfg', 'dfgdfgfd', 'female'),
(21, 'jenjen', '123', 20210417, 456567, 'admin', NULL, 'patrick', 'mahoney', 'female'),
(22, 'patpat', '123', 20210417, 234234, 'sales', 1, 'patpat', 'fgjhdfog', 'male');

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
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
