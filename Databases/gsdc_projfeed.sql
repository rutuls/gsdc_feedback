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
-- Database: `gsdc_projfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aid` int(6) NOT NULL,
  `ansd` varchar(100) NOT NULL,
  `ansv` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aid`, `ansd`, `ansv`) VALUES
(1, 'strongly agree', 5),
(2, 'agree', 4),
(3, 'neither agree or disagree', 3),
(4, 'disagree', 2),
(5, 'strongly disagree', 1),
(6, 'na', 0);

-- --------------------------------------------------------

--
-- Table structure for table `basicd`
--

CREATE TABLE `basicd` (
  `engid` int(9) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `dep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basicd`
--

INSERT INTO `basicd` (`engid`, `ename`, `dep`) VALUES
(123459, 'narayan', 'expert'),
(123458, 'raghvendra', 'expert'),
(123457, 'rajkumar', 'expert'),
(123456, 'rutul', 'programmer'),
(1234567, 'satish', 'programmer'),
(1234568, 'shraddha', 'intern'),
(1234578, 'gaurav', 'expert'),
(1234598, 'arvind', 'programmer'),
(12345876, 'manu', 'manager'),
(987654, 'rutul', 'programmer'),
(123457, 'kartika', 'expert'),
(123457, 'kartika', 'expert'),
(123458, 'raghu', 'expert'),
(123457, 'kartika', 'expert'),
(123458, 'raghu', 'expert');

-- --------------------------------------------------------

--
-- Table structure for table `enginfo`
--

CREATE TABLE `enginfo` (
  `engid` int(10) NOT NULL,
  `qid` int(6) NOT NULL,
  `aid` int(6) NOT NULL,
  `ansdesc` varchar(30) NOT NULL,
  `rating` int(6) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enginfo`
--

INSERT INTO `enginfo` (`engid`, `qid`, `aid`, `ansdesc`, `rating`, `id`) VALUES
(123456, 2, 1, 'strongly agree', 5, 3),
(123456, 3, 2, 'agree', 4, 3),
(123456, 4, 3, 'neither agree or disagree', 3, 3),
(123456, 5, 4, 'disagree', 2, 3),
(123456, 6, 6, 'na', 0, 3),
(123456, 7, 5, 'strongly disagree', 1, 3),
(123456, 8, 5, 'strongly disagree', 1, 3),
(987654, 2, 5, 'strongly disagree', 1, 30),
(987654, 3, 4, 'disagree', 2, 30),
(987654, 4, 3, 'neither agree or disagree', 3, 30),
(987654, 5, 6, 'na', 0, 30),
(987654, 6, 2, 'agree', 4, 30),
(987654, 7, 1, 'strongly agree', 5, 30),
(987654, 8, 1, 'strongly agree', 5, 30),
(234567, 2, 3, 'neither agree or disagree', 3, 0),
(234567, 3, 2, 'agree', 4, 0),
(234567, 4, 1, 'strongly agree', 5, 0),
(234567, 5, 4, 'disagree', 2, 0),
(234567, 6, 5, 'strongly disagree', 1, 0),
(234567, 7, 5, 'strongly disagree', 1, 0),
(234567, 8, 3, 'neither agree or disagree', 3, 0),
(654321, 2, 5, 'strongly disagree', 1, 18),
(654321, 3, 4, 'disagree', 2, 18),
(654321, 4, 3, 'neither agree or disagree', 3, 18),
(654321, 5, 6, 'na', 0, 18),
(654321, 6, 3, 'neither agree or disagree', 3, 18),
(654321, 7, 1, 'strongly agree', 5, 18),
(654321, 8, 2, 'agree', 4, 18),
(765432, 2, 2, 'agree', 4, 21),
(765432, 3, 3, 'neither agree or disagree', 3, 21),
(765432, 4, 4, 'disagree', 2, 21),
(765432, 5, 6, 'na', 0, 21),
(765432, 6, 1, 'strongly agree', 5, 21),
(765432, 7, 3, 'neither agree or disagree', 3, 21),
(765432, 8, 3, 'neither agree or disagree', 3, 21),
(898989, 2, 4, 'disagree', 2, 27),
(898989, 3, 5, 'strongly disagree', 1, 27),
(898989, 4, 1, 'strongly agree', 5, 27),
(898989, 5, 2, 'agree', 4, 27),
(898989, 6, 3, 'neither agree or disagree', 3, 27),
(898989, 7, 4, 'disagree', 2, 27),
(898989, 8, 5, 'strongly disagree', 1, 27),
(878787, 2, 4, 'disagree', 2, 25),
(878787, 3, 3, 'neither agree or disagree', 3, 25),
(878787, 4, 1, 'strongly agree', 5, 25),
(878787, 5, 2, 'agree', 4, 25),
(878787, 6, 3, 'neither agree or disagree', 3, 25),
(878787, 7, 4, 'disagree', 2, 25),
(878787, 8, 3, 'neither agree or disagree', 3, 25),
(545454, 2, 4, 'disagree', 2, 14),
(545454, 3, 4, 'disagree', 2, 14),
(545454, 4, 4, 'disagree', 2, 14),
(545454, 5, 3, 'neither agree or disagree', 3, 14),
(545454, 6, 1, 'strongly agree', 5, 14),
(545454, 7, 3, 'neither agree or disagree', 3, 14),
(545454, 8, 4, 'disagree', 2, 14),
(232323, 2, 3, 'neither agree or disagree', 3, 7),
(232323, 3, 3, 'neither agree or disagree', 3, 7),
(232323, 4, 5, 'strongly disagree', 1, 7),
(232323, 5, 1, 'strongly agree', 5, 7),
(232323, 6, 2, 'agree', 4, 7),
(232323, 7, 4, 'disagree', 2, 7),
(232323, 8, 3, 'neither agree or disagree', 3, 7),
(464646, 2, 3, 'neither agree or disagree', 3, 13),
(464646, 3, 3, 'neither agree or disagree', 3, 13),
(464646, 4, 5, 'strongly disagree', 1, 13),
(464646, 5, 1, 'strongly agree', 5, 13),
(464646, 6, 6, 'na', 0, 13),
(464646, 7, 4, 'disagree', 2, 13),
(464646, 8, 3, 'neither agree or disagree', 3, 13),
(929283, 2, 1, 'strongly agree', 5, 28),
(929283, 3, 2, 'agree', 4, 28),
(929283, 4, 4, 'disagree', 2, 28),
(929283, 5, 5, 'strongly disagree', 1, 28),
(929283, 6, 2, 'agree', 4, 28),
(929283, 7, 4, 'disagree', 2, 28),
(929283, 8, 5, 'strongly disagree', 1, 28),
(978978, 2, 3, 'neither agree or disagree', 3, 29),
(978978, 3, 4, 'disagree', 2, 29),
(978978, 4, 1, 'strongly agree', 5, 29),
(978978, 5, 6, 'na', 0, 29),
(978978, 6, 5, 'strongly disagree', 1, 29),
(978978, 7, 1, 'strongly agree', 5, 29),
(978978, 8, 5, 'strongly disagree', 1, 29),
(565656, 2, 2, 'agree', 4, 17),
(565656, 3, 4, 'disagree', 2, 17),
(565656, 4, 3, 'neither agree or disagree', 3, 17),
(565656, 5, 6, 'na', 0, 17),
(565656, 6, 5, 'strongly disagree', 1, 17),
(565656, 7, 1, 'strongly agree', 5, 17),
(565656, 8, 1, 'strongly agree', 5, 17),
(334455, 2, 3, 'neither agree or disagree', 3, 10),
(334455, 3, 4, 'disagree', 2, 10),
(334455, 4, 5, 'strongly disagree', 1, 10),
(334455, 5, 6, 'na', 0, 10),
(334455, 6, 1, 'strongly agree', 5, 10),
(334455, 7, 3, 'neither agree or disagree', 3, 10),
(334455, 8, 4, 'disagree', 2, 10),
(445566, 2, 4, 'disagree', 2, 12),
(445566, 3, 5, 'strongly disagree', 1, 12),
(445566, 4, 1, 'strongly agree', 5, 12),
(445566, 5, 1, 'strongly agree', 5, 12),
(445566, 6, 2, 'agree', 4, 12),
(445566, 7, 4, 'disagree', 2, 12),
(445566, 8, 5, 'strongly disagree', 1, 12),
(556677, 2, 5, 'strongly disagree', 1, 16),
(556677, 3, 1, 'strongly agree', 5, 16),
(556677, 4, 2, 'agree', 4, 16),
(556677, 5, 2, 'agree', 4, 16),
(556677, 6, 3, 'neither agree or disagree', 3, 16),
(556677, 7, 5, 'strongly disagree', 1, 16),
(556677, 8, 1, 'strongly agree', 5, 16),
(667788, 2, 1, 'strongly agree', 5, 20),
(667788, 3, 2, 'agree', 4, 20),
(667788, 4, 3, 'neither agree or disagree', 3, 20),
(667788, 5, 3, 'neither agree or disagree', 3, 20),
(667788, 6, 4, 'disagree', 2, 20),
(667788, 7, 1, 'strongly agree', 5, 20),
(667788, 8, 2, 'agree', 4, 20),
(778899, 2, 2, 'agree', 4, 23),
(778899, 3, 3, 'neither agree or disagree', 3, 23),
(778899, 4, 4, 'disagree', 2, 23),
(778899, 5, 4, 'disagree', 2, 23),
(778899, 6, 5, 'strongly disagree', 1, 23),
(778899, 7, 2, 'agree', 4, 23),
(778899, 8, 3, 'neither agree or disagree', 3, 23),
(998877, 2, 3, 'neither agree or disagree', 3, 33),
(998877, 3, 4, 'disagree', 2, 33),
(998877, 4, 5, 'strongly disagree', 1, 33),
(998877, 5, 5, 'strongly disagree', 1, 33),
(998877, 6, 6, 'na', 0, 33),
(998877, 7, 3, 'neither agree or disagree', 3, 33),
(998877, 8, 4, 'disagree', 2, 33),
(887766, 2, 4, 'disagree', 2, 26),
(887766, 3, 5, 'strongly disagree', 1, 26),
(887766, 4, 1, 'strongly agree', 5, 26),
(887766, 5, 6, 'na', 0, 26),
(887766, 6, 1, 'strongly agree', 5, 26),
(887766, 7, 4, 'disagree', 2, 26),
(887766, 8, 5, 'strongly disagree', 1, 26),
(776655, 2, 5, 'strongly disagree', 1, 22),
(776655, 3, 1, 'strongly agree', 5, 22),
(776655, 4, 2, 'agree', 4, 22),
(776655, 5, 1, 'strongly agree', 5, 22),
(776655, 6, 2, 'agree', 4, 22),
(776655, 7, 5, 'strongly disagree', 1, 22),
(776655, 8, 1, 'strongly agree', 5, 22),
(665544, 2, 1, 'strongly agree', 5, 19),
(665544, 3, 2, 'agree', 4, 19),
(665544, 4, 3, 'neither agree or disagree', 3, 19),
(665544, 5, 2, 'agree', 4, 19),
(665544, 6, 3, 'neither agree or disagree', 3, 19),
(665544, 7, 1, 'strongly agree', 5, 19),
(665544, 8, 2, 'agree', 4, 19),
(554433, 2, 2, 'agree', 4, 15),
(554433, 3, 3, 'neither agree or disagree', 3, 15),
(554433, 4, 4, 'disagree', 2, 15),
(554433, 5, 3, 'neither agree or disagree', 3, 15),
(554433, 6, 4, 'disagree', 2, 15),
(554433, 7, 2, 'agree', 4, 15),
(554433, 8, 3, 'neither agree or disagree', 3, 15),
(443322, 2, 3, 'neither agree or disagree', 3, 11),
(443322, 3, 4, 'disagree', 2, 11),
(443322, 4, 5, 'strongly disagree', 1, 11),
(443322, 5, 4, 'disagree', 2, 11),
(443322, 6, 5, 'strongly disagree', 1, 11),
(443322, 7, 3, 'neither agree or disagree', 3, 11),
(443322, 8, 4, 'disagree', 2, 11),
(332211, 2, 4, 'disagree', 2, 9),
(332211, 3, 5, 'strongly disagree', 1, 9),
(332211, 4, 1, 'strongly agree', 5, 9),
(332211, 5, 5, 'strongly disagree', 1, 9),
(332211, 6, 6, 'na', 0, 9),
(332211, 7, 4, 'disagree', 2, 9),
(332211, 8, 5, 'strongly disagree', 1, 9),
(221199, 2, 5, 'strongly disagree', 1, 6),
(221199, 3, 1, 'strongly agree', 5, 6),
(221199, 4, 2, 'agree', 4, 6),
(221199, 5, 6, 'na', 0, 6),
(221199, 6, 1, 'strongly agree', 5, 6),
(221199, 7, 5, 'strongly disagree', 1, 6),
(221199, 8, 1, 'strongly agree', 5, 6),
(119988, 2, 1, 'strongly agree', 5, 2),
(119988, 3, 2, 'agree', 4, 2),
(119988, 4, 3, 'neither agree or disagree', 3, 2),
(119988, 5, 1, 'strongly agree', 5, 2),
(119988, 6, 2, 'agree', 4, 2),
(119988, 7, 1, 'strongly agree', 5, 2),
(119988, 8, 2, 'agree', 4, 2),
(2585852, 2, 2, 'agree', 4, 35),
(2585852, 3, 2, 'agree', 4, 35),
(2585852, 4, 1, 'strongly agree', 5, 35),
(2585852, 5, 1, 'strongly agree', 5, 35),
(2585852, 6, 3, 'neither agree or disagree', 3, 35),
(2585852, 7, 1, 'strongly agree', 5, 35),
(2585852, 8, 4, 'disagree', 2, 35),
(12385748, 2, 2, 'agree', 4, 37),
(12385748, 3, 2, 'agree', 4, 37),
(12385748, 4, 2, 'agree', 4, 37),
(12385748, 5, 2, 'agree', 4, 37),
(12385748, 6, 3, 'neither agree or disagree', 3, 37),
(12385748, 7, 3, 'neither agree or disagree', 3, 37),
(12385748, 8, 3, 'neither agree or disagree', 3, 37),
(789234, 2, 2, 'agree', 4, 24),
(789234, 3, 1, 'strongly agree', 5, 24),
(789234, 4, 4, 'disagree', 2, 24),
(789234, 5, 3, 'neither agree or disagree', 3, 24),
(789234, 6, 6, 'na', 0, 24),
(789234, 7, 4, 'disagree', 2, 24),
(789234, 8, 1, 'strongly agree', 5, 24),
(996633, 2, 3, 'neither agree or disagree', 3, 32),
(996633, 3, 5, 'strongly disagree', 1, 32),
(996633, 4, 5, 'strongly disagree', 1, 32),
(996633, 5, 1, 'strongly agree', 5, 32),
(996633, 6, 3, 'neither agree or disagree', 3, 32),
(996633, 7, 3, 'neither agree or disagree', 3, 32),
(996633, 8, 1, 'strongly agree', 5, 32),
(999999, 2, 3, 'neither agree or disagree', 3, 34),
(999999, 3, 5, 'strongly disagree', 1, 34),
(999999, 4, 1, 'strongly agree', 5, 34),
(999999, 5, 5, 'strongly disagree', 1, 34),
(999999, 6, 2, 'agree', 4, 34),
(999999, 7, 1, 'strongly agree', 5, 34),
(999999, 8, 2, 'agree', 4, 34),
(12365989, 2, 1, 'strongly agree', 5, 36),
(12365989, 3, 3, 'neither agree or disagree', 3, 36),
(12365989, 4, 4, 'disagree', 2, 36),
(12365989, 5, 4, 'disagree', 2, 36),
(12365989, 6, 4, 'disagree', 2, 36),
(12365989, 7, 3, 'neither agree or disagree', 3, 36),
(12365989, 8, 3, 'neither agree or disagree', 3, 36),
(987987, 2, 3, 'neither agree or disagree', 3, 31),
(987987, 3, 1, 'strongly agree', 5, 31),
(987987, 4, 1, 'strongly agree', 5, 31),
(987987, 5, 6, 'na', 0, 31),
(987987, 6, 4, 'disagree', 2, 31),
(987987, 7, 2, 'agree', 4, 31),
(987987, 8, 2, 'agree', 4, 31),
(290920, 2, 3, 'neither agree or disagree', 3, 8),
(290920, 3, 3, 'neither agree or disagree', 3, 8),
(290920, 4, 3, 'neither agree or disagree', 3, 8),
(290920, 5, 4, 'disagree', 2, 8),
(290920, 6, 2, 'agree', 4, 8),
(290920, 7, 4, 'disagree', 2, 8),
(290920, 8, 3, 'neither agree or disagree', 3, 8),
(112233, 2, 4, 'disagree', 2, 44),
(112233, 3, 2, 'agree', 4, 44),
(112233, 4, 3, 'neither agree or disagree', 3, 44),
(112233, 5, 4, 'disagree', 2, 44),
(112233, 6, 1, 'strongly agree', 5, 44),
(112233, 7, 2, 'agree', 4, 44),
(112233, 8, 5, 'strongly disagree', 1, 44),
(112233, 2, 2, 'agree', 4, 45),
(112233, 3, 2, 'agree', 4, 45),
(112233, 4, 1, 'strongly agree', 5, 45),
(112233, 5, 1, 'strongly agree', 5, 45),
(112233, 6, 1, 'strongly agree', 5, 45),
(112233, 7, 4, 'disagree', 2, 45),
(112233, 8, 3, 'neither agree or disagree', 3, 45),
(112233, 2, 5, 'strongly disagree', 1, 46),
(112233, 3, 5, 'strongly disagree', 1, 46),
(112233, 4, 5, 'strongly disagree', 1, 46),
(112233, 5, 5, 'strongly disagree', 1, 46),
(112233, 6, 4, 'disagree', 2, 46),
(112233, 7, 4, 'disagree', 2, 46),
(112233, 8, 4, 'disagree', 2, 46),
(303030, 2, 2, 'agree', 4, 0),
(303030, 3, 1, 'strongly agree', 5, 0),
(303030, 4, 1, 'strongly agree', 5, 0),
(303030, 5, 4, 'disagree', 2, 0),
(303030, 6, 4, 'disagree', 2, 0),
(303030, 7, 5, 'strongly disagree', 1, 0),
(303030, 8, 2, 'agree', 4, 0),
(303030, 2, 1, 'strongly agree', 5, 54),
(303030, 3, 2, 'agree', 4, 54),
(303030, 4, 1, 'strongly agree', 5, 54),
(303030, 5, 6, 'na', 0, 54),
(303030, 6, 2, 'agree', 4, 54),
(303030, 7, 2, 'agree', 4, 54),
(303030, 8, 5, 'strongly disagree', 1, 54),
(404040, 2, 3, 'neither agree or disagree', 3, 55),
(404040, 3, 4, 'disagree', 2, 55),
(404040, 4, 1, 'strongly agree', 5, 55),
(404040, 5, 3, 'neither agree or disagree', 3, 55),
(404040, 6, 3, 'neither agree or disagree', 3, 55),
(404040, 7, 3, 'neither agree or disagree', 3, 55),
(404040, 8, 3, 'neither agree or disagree', 3, 55),
(909090, 2, 3, 'neither agree or disagree', 3, 56),
(909090, 3, 5, 'strongly disagree', 1, 56),
(909090, 4, 2, 'agree', 4, 56),
(909090, 5, 1, 'strongly agree', 5, 56),
(909090, 6, 2, 'agree', 4, 56),
(909090, 7, 4, 'disagree', 2, 56),
(909090, 8, 4, 'disagree', 2, 56),
(909090, 2, 1, 'strongly agree', 5, 57),
(909090, 3, 2, 'agree', 4, 57),
(909090, 4, 1, 'strongly agree', 5, 57),
(909090, 5, 1, 'strongly agree', 5, 57),
(909090, 6, 1, 'strongly agree', 5, 57),
(909090, 7, 1, 'strongly agree', 5, 57),
(909090, 8, 1, 'strongly agree', 5, 57);

-- --------------------------------------------------------

--
-- Table structure for table `feedt`
--

CREATE TABLE `feedt` (
  `id` int(9) NOT NULL,
  `engid` int(9) NOT NULL,
  `commt` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedt`
--

INSERT INTO `feedt` (`id`, `engid`, `commt`, `date`, `time`) VALUES
(2, 119988, 'it was a great experience', '2016-01-27', '00:00:00'),
(3, 123456, 'Average', '2015-12-01', '00:00:00'),
(4, 123458, 'Good', '2015-12-07', '00:00:00'),
(5, 123459, 'best survey form', '2015-12-09', '00:00:00'),
(6, 221199, 'supporting team', '2016-01-27', '00:00:00'),
(7, 232323, 'gsdc team is good', '2015-12-09', '00:00:00'),
(8, 290920, 'fchgjj', '2016-02-24', '09:52:04'),
(9, 332211, 'nice team', '2016-01-27', '00:00:00'),
(10, 334455, 'again want to work with this team', '2016-01-27', '00:00:00'),
(11, 443322, 'again want to work with this team', '2016-01-27', '00:00:00'),
(12, 445566, 'nice team', '2016-01-27', '00:00:00'),
(13, 464646, 'i got best services from gsdc team', '2015-12-09', '00:00:00'),
(14, 545454, '', '2015-12-09', '00:00:00'),
(15, 554433, 'enjoyed working with gsdc team', '2016-01-27', '00:00:00'),
(16, 556677, 'supporting team', '2016-01-27', '00:00:00'),
(17, 565656, 'Outstanding', '2015-12-03', '00:00:00'),
(18, 654321, '', '2015-12-09', '00:00:00'),
(19, 665544, 'it was a great experience', '2016-01-27', '00:00:00'),
(20, 667788, 'it was a great experience', '2016-01-27', '00:00:00'),
(21, 765432, '', '2015-12-09', '00:00:00'),
(22, 776655, 'supporting team', '2016-01-27', '00:00:00'),
(23, 778899, 'enjoyed working with gsdc team', '2016-01-27', '00:00:00'),
(24, 789234, 'It was great work done by GSDC', '2016-01-29', '00:00:00'),
(25, 878787, 'It was a good experience', '2015-12-09', '00:00:00'),
(26, 887766, 'nice team', '2016-01-27', '00:00:00'),
(27, 898989, 'Good experience', '2015-12-09', '00:00:00'),
(28, 929283, 'Good', '2015-12-09', '00:00:00'),
(29, 978978, 'nice', '2015-12-09', '00:00:00'),
(30, 987654, 'better', '2015-12-31', '00:00:00'),
(31, 987987, 'my feedback', '2016-02-23', '02:33:09'),
(32, 996633, '', '2016-01-29', '11:00:55'),
(33, 998877, 'again want to work with this team', '2016-01-27', '00:00:00'),
(34, 999999, 'Awesome', '2016-01-30', '04:41:48'),
(35, 2585852, '', '2016-01-27', '00:00:00'),
(36, 12365989, 'gsdc is good', '2016-02-02', '03:13:59'),
(37, 12385748, 'GSDC is great', '2016-01-27', '00:00:00'),
(44, 112233, 'Average', '2016-02-27', '09:12:06'),
(45, 112233, 'Very Good..Improved', '2016-02-27', '09:16:12'),
(46, 112233, 'Very Poor', '2016-02-27', '11:47:50'),
(47, 987987, 'rhel123', '2016-02-29', '09:03:00'),
(48, 987987, 'survey. gsdc', '2016-02-29', '09:11:11'),
(49, 808080, '', '2016-02-29', '09:17:27'),
(50, 808080, 'rockstar gsdc', '2016-02-29', '09:19:55'),
(51, 2020202, 'great achievement', '2016-02-29', '09:25:33'),
(52, 303030, 'sky height', '2016-02-29', '09:33:24'),
(53, 303030, 'sky is the limit', '2016-02-29', '09:35:09'),
(54, 303030, 'no problem can be solved by stress', '2016-02-29', '09:36:55'),
(55, 404040, 'wish you all the best', '2016-02-29', '09:40:31'),
(56, 909090, '', '2016-02-29', '09:42:44'),
(57, 909090, 'Great work..Improved', '2016-02-29', '09:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `status`) VALUES
(0, 'aarons', 'NetapP@123', 'Aaron.Sims@netapp.com', 'Approve'),
(4444, 'admin1', 'netapp123', 'admin1@gmail.com', 'Approve'),
(5555, 'admin2', 'netapp123', 'admin2@gmail.com', 'Approve'),
(6666, 'admin3', 'netapp123', 'admin3@gmail.com', 'Approve'),
(7777, 'admin4', 'netapp123', 'admin4@gmail.com', ''),
(8888, 'admin5', 'netapp123', 'admin5@gmail.com', ''),
(9999, 'admin6', 'netapp123', 'admin6@gmail.com', ''),
(9999, 'admin7', 'netapp123', 'admin7@gmail.com', ''),
(9888, 'admin8', 'netapp123', 'admin8@gmail.com', ''),
(0, 'amyp', 'NetApp_123', 'Amy.Peterson@netapp.com', 'Approve'),
(0, 'gsdc1', 'netapp123', 'gsdc1@netapp.com', 'Disapprove'),
(0, 'jshourea', 'Netapp@12', 'John.Shoureas@netapp.com', 'Approve'),
(0, 'manud', 'Netapp@123', 'Manu.Dhir@netapp.com', 'Approve'),
(0, 'michaelm', 'netapp_123', 'Michael.Mcardle@netapp.com', 'Approve'),
(1111, 'narayan', 'netapp123', 'narayan@gmail.com', 'Approve'),
(0, 'randyh', 'NetApp123', 'Randy.Hulse@netapp.com', 'Approve'),
(2222, 'rutul', 'netapp123', 'rutul@yahoo.com', 'Approve'),
(0, 'shra', 'netapp123', 'shraddha.pali@gmail.com', 'Disapprove'),
(3333, 'shraddha', 'netapp123', 'shraddha@gmail.com', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `masteradmin`
--

CREATE TABLE `masteradmin` (
  `uname` varchar(50) NOT NULL,
  `passname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masteradmin`
--

INSERT INTO `masteradmin` (`uname`, `passname`) VALUES
('mshra', '12345'),
('mrutul', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(6) NOT NULL,
  `qued` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `qued`) VALUES
(2, 'The work was delivered on time, as promised to my customer'),
(3, 'The quality of work met my expectations'),
(4, 'The GSDC engineer(s) had the requisite technical knowledge for this project'),
(5, 'The GSDC engineer(s) was able to handle the customer''s technical queries'),
(6, 'The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager'),
(7, 'I found it easy to engage the GSDC for this project'),
(8, 'I''m satisfied with the GSDC''s speed in responding to my request'),
(9, 'Any other feedback or suggestions for improvement');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedt`
--
ALTER TABLE `feedt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedt`
--
ALTER TABLE `feedt`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
