-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2011 at 05:39 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ID`, `Year`, `Class`, `Section`, `ClassID`) VALUES
(1, 2011, 'UKG', 'B', '300-B'),
(2, 2012, 'one', 'A', '000-0001'),
(4, 2011, 'oneB', 'B', '000-0004'),
(5, 2011, 'two', 'B', '002-1000'),
(6, 2011, 'Six', 'B', '000-0000'),
(7, 2012, 'Two', 'B', '002-B'),
(8, 2011, 'one', 'C', ''),
(9, 2011, 'Nursary', '', '100-000'),
(10, 2012, 'UKG', 'No Sec', '300-000'),
(12, 2012, 'One', 'Z', '001-000'),
(13, 2012, 'Two', 'No Se', '002-000'),
(14, 2012, 'Three', 'No Se', '003-000'),
(15, 2012, 'Five', 'No Sec', '005-000');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID`, `ClassID`, `ExamType`, `Year`) VALUES
(1, '000-0000', 'first term', 2011),
(2, '002-0000', 'first term', 2011),
(3, '001-0002', '2nd term', 2011),
(4, '001-0000', 'final term', 2012),
(5, '000-0001', 'final', 2011),
(6, '', 'second5', 2011),
(7, '000-0001', 'second', 2011);

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

INSERT INTO `marks_2011` (`MID`, `SID`, `ClassID`, `Subject`, `Obt_Theory`, `Obt_Practical`, `Obt_Total`, `ExamType`, `Year`) VALUES
(74, '99', '000-0000', 'EPH', 50, 20, 70, 'first term', 2011),
(81, '68', '000-0000', 'Science', 1, 1, 1, 'first term', 2011),
(78, '101', '000-0000', 'EPH', 12, 12, 24, 'first term', 2011),
(80, '68', '000-0000', 'EPH', 1, 1, 1, 'first term', 2011),
(48, '66', '000-0000', 'EPH', 47, 22, 69, 'first term', 2011),
(49, '66', '000-0000', 'Science', 45, 22, 67, 'first term', 2011),
(85, '456', '000-0000', 'Science', 4, 5, 11, 'first term', 2011),
(84, '456', '000-0000', 'EPH', 1, 4, 5, 'first term', 2011),
(83, '105', '000-0000', 'Science', 45, 20, 65, 'first term', 2011),
(82, '105', '000-0000', 'EPH', 50, 20, 70, 'first term', 2011),
(79, '101', '000-0000', 'Science', 15, 15, 30, 'first term', 2011),
(75, '99', '000-0000', 'Science', 45, 20, 65, 'first term', 2011),
(71, '58', '000-0000', 'Science', 30, 10, 40, 'first term', 2011),
(70, '58', '000-0000', 'EPH', 40, 22, 62, 'first term', 2011),
(86, '113', '000-0000', 'EPH', 0, 0, 0, 'first term', 2011),
(87, '113', '000-0000', 'Science', 0, 0, 0, 'first term', 2011);

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

INSERT INTO `student` (`ID`, `FirstName`, `LastName`, `ClassID`, `Roll`, `SID`, `DOB`, `Gender`, `Address`, `Phone`, `Mobile`, `Email`, `Year`) VALUES
(1, 'fdsf', 'fsdad', '', 0, '', '0000-00-00', 'radio', 'dfsdf', 344, 44, 'dfs@sfd.cd', 0),
(2, 'dsfsf', 'fdsf', '', 0, '', '0000-00-00', 'male', 'fsd', 111, 111, 'fds@sd.cd', 0),
(3, 'aaa', 'aaa', '', 0, '', '0000-00-00', 'male', 'aaa', 12, 1, 'wasd@sdf.cd', 0),
(4, 'dfds', 'fdf', '', 0, '', '0000-00-00', 'male', 'fd', 12, 12, 'sd@ad.cxsd', 0),
(5, 'fre', 'erer', '', 0, '', '0000-00-00', 'male', 'fds', 11, 23, 'dsa@f.cd', 0),
(6, 'erre', 'er', '000-0000', 0, '113', '0000-00-00', 'male', 'er', 23, 231, 'sad@sa.cd', 2011),
(7, 'fsda', 'fdsa', '000-0000', 0, '112', '0000-00-00', 'male', 'dfd', 3213, 23, 'dsa@ad.cs', 2011),
(8, 'fsd', 'fds', '000-0000', 0, '111', '0000-00-00', 'male', 'fds', 43, 34, 'fsd@ad.cs', 2011),
(9, 'fd', 'dfs', '', 0, '', '0000-00-00', 'male', 'dsf', 23, 31, 'sdd@sfd.cds', 0),
(12, 'Kunsang', 'Lhamo', '002-0000', 1, '1-5-6', '1986-05-08', 'Female', 'Boudha', 1, 9823659, 'k_lhamo@gmail.com', 2012),
(11, 'Raj', 'Shrestha', '002-0000', 1, '1-2-6', '1985-05-05', 'Male', 'Jorpati', 9803256, 98415655, 'raj@gmail.com', 2012),
(13, 'raju', 'kattel', '002-0000', 6, '2012-002-0000-6', '1986-05-05', 'Female', 'ktl', 333, 3332, 'sgdsg@gdhf', 2012);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `ClassID`, `Subject`, `Theory`, `Practical`, `Total`, `ExamType`, `Year`) VALUES
(1, '000-0000', 'EPH', 80, 20, 100, 'first term', 2011),
(3, '000-0001', 'Science', 80, 20, 100, 'final term', 2012),
(4, '001-0000', 'math', 803, 20, 100, 'final term', 2012),
(5, '000-0000', 'Science', 80, 20, 100, 'first term', 2011);
