-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 02:16 PM
-- Server version: 5.7.12-0ubuntu1.1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ieor_leaves_history`
--

CREATE TABLE `ieor_leaves_history` (
  `ldap_id` int(15) NOT NULL,
  `leave_history` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ieor_leaves_status`
--

CREATE TABLE `ieor_leaves_status` (
  `ldap_id` int(15) NOT NULL,
  `leave_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ieor_leave_balances`
--

CREATE TABLE `ieor_leave_balances` (
  `ldap_id` int(15) NOT NULL,
  `leave_balances` varchar(200) NOT NULL,
  `approval_from` varchar(500) NOT NULL COMMENT 'List of people whose approval are required for leave.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ieor_userinfo`
--

CREATE TABLE `ieor_userinfo` (
  `ldap_id` int(15) NOT NULL,
  `uid` varchar(35) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL COMMENT 'Account Status: A for Active, N for Not activated, D for Deactivated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ieor_userinfo`
--

INSERT INTO `ieor_userinfo` (`ldap_id`, `uid`, `account_type`, `status`) VALUES
(154190002, 'v.arun', 'rs', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ieor_leaves_history`
--
ALTER TABLE `ieor_leaves_history`
  ADD PRIMARY KEY (`ldap_id`);

--
-- Indexes for table `ieor_leaves_status`
--
ALTER TABLE `ieor_leaves_status`
  ADD PRIMARY KEY (`ldap_id`);

--
-- Indexes for table `ieor_leave_balances`
--
ALTER TABLE `ieor_leave_balances`
  ADD PRIMARY KEY (`ldap_id`);

--
-- Indexes for table `ieor_userinfo`
--
ALTER TABLE `ieor_userinfo`
  ADD PRIMARY KEY (`ldap_id`),
  ADD UNIQUE KEY `uid` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
