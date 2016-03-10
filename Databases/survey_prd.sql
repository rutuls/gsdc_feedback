-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2016 at 01:02 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey_prd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `engid` int(11) NOT NULL,
  `ename` varchar(11) NOT NULL,
  `dep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`engid`, `ename`, `dep`) VALUES
(112233, 'emp1', 'Migration'),
(334455, 'emp3', 'Verification'),
(445566, 'emp4', 'OCI'),
(556677, 'emp5', 'Migration'),
(667788, 'emp6', 'Scripting'),
(778899, 'emp7', 'Verification'),
(998877, 'emp8', 'OCI'),
(887766, 'emp9', 'Migration'),
(776655, 'emp10', 'Scripting'),
(665544, 'emp11', 'Verification'),
(554433, 'emp12', 'OCI'),
(443322, 'emp13', 'Migration'),
(332211, 'emp14', 'Scripting'),
(221199, 'emp15', 'Verification'),
(119988, 'emp16', 'OCI');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
