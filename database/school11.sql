-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2011 at 12:45 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `Section` varchar(7) NOT NULL,
  `ClassID` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ID`, `Year`, `Class`, `Section`, `ClassID`) VALUES
(16, 2011, 'Five', 'A', '005-A'),
(24, 2012, 'Five', 'C', '005-C'),
(17, 2011, 'Five', 'B', '005-B'),
(18, 2011, 'Six', 'A', '006-A'),
(19, 2011, 'Six', 'B', '006-B'),
(20, 2011, 'Six', 'C', '006-C'),
(21, 2011, 'Seven', 'No Sec', '007-000'),
(22, 2012, 'Five', 'A', '005-A'),
(23, 2012, 'Five', 'B', '005-B'),
(25, 2012, 'Six', 'A', '006-A'),
(26, 2012, 'Six', 'B', '006-B'),
(27, 2012, 'Seven', 'No Sec', '007-000'),
(28, 2013, 'Five', 'A', '005-A'),
(29, 2013, 'Five', 'B', '005-B'),
(30, 2013, 'Six', 'No Sec', '006-000'),
(31, 2013, 'Seven', 'A', '007-A'),
(32, 2013, 'Seven', 'B', '007-B');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassID` varchar(30) NOT NULL,
  `ExamType` varchar(30) NOT NULL,
  `Year` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID`, `ClassID`, `ExamType`, `Year`) VALUES
(13, '007-000', 'First Term', 2011),
(8, '005-A', 'First Term', 2011),
(9, '005-B', 'First Term', 2011),
(10, '006-A', 'First Term', 2011),
(11, '006-C', 'First Term', 2011),
(12, '006-B', 'First Term', 2011),
(14, '005-A', 'First Term', 2012),
(15, '005-B', 'First Term', 2012),
(16, '005-C', 'First Term', 2012),
(17, '006-A', 'First Term', 2012),
(18, '006-B', 'First Term', 2012),
(19, '007-000', 'First Term', 2012),
(20, '005-A', 'First Term', 2013),
(21, '005-B', 'First Term', 2013),
(22, '006-000', 'First Term', 2013),
(23, '007-A', 'First Term', 2013),
(24, '007-B', 'First Term', 2013),
(25, '005-A', 'Final Term', 2011),
(26, '005-B', 'Final Term', 2011),
(27, '006-A', 'Final Term', 2011),
(28, '006-B', 'Final Term', 2011),
(29, '006-C', 'Final Term', 2011),
(30, '007-000', 'Final Term', 2011),
(31, '005-A', 'Final Term', 2012),
(32, '005-B', 'Final Term', 2012),
(33, '005-C', 'Final Term', 2012),
(34, '006-A', 'Final Term', 2012),
(35, '006-B', 'Final Term', 2012),
(36, '007-000', 'Final Term', 2012),
(37, '005-A', 'Final Term', 2013),
(38, '005-B', 'Final Term', 2013),
(39, '006-000', 'Final Term', 2013),
(40, '007-A', 'Final Term', 2013),
(41, '007-B', 'Final Term', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Pass_Word` varchar(30) NOT NULL,
  `Level` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Username`, `Pass_Word`, `Level`) VALUES
(3, '5', '5', 5),
(9, '6', '6', 6),
(4, '3', '3', 3),
(5, '4', '4', 4),
(8, '2', '2', 2),
(7, '1', '1', 1),
(10, 'kunsang', 'kunsang', 1),
(11, 'ruby', 'ruby', 1),
(12, 'dd', 'dd', 3),
(13, '101', '101', 5),
(14, '106', '106', 5),
(15, '105', '105', 5);

-- --------------------------------------------------------

--
-- Table structure for table `marks_2011`
--

CREATE TABLE IF NOT EXISTS `marks_2011` (
  `MID` int(11) NOT NULL AUTO_INCREMENT,
  `SID` varchar(30) NOT NULL,
  `ClassID` varchar(30) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Obt_Theory` double NOT NULL,
  `Obt_Practical` double NOT NULL,
  `Obt_Total` double NOT NULL,
  `ExamType` varchar(30) NOT NULL,
  `Year` int(11) NOT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `marks_2011`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ClassID` varchar(30) NOT NULL,
  `Roll` int(11) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Year` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `student`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassID` varchar(30) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Theory` int(11) NOT NULL,
  `Practical` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `ExamType` varchar(30) NOT NULL,
  `Year` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `ClassID`, `Subject`, `Theory`, `Practical`, `Total`, `ExamType`, `Year`) VALUES
(8, '005-A', 'Science', 30, 20, 50, 'First Term', 2011);
