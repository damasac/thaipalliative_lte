-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 03:49 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thaipalliative_lte`
--

-- --------------------------------------------------------

--
-- Table structure for table `palliative_followup`
--

CREATE TABLE IF NOT EXISTS `palliative_followup` (
  `ptid` bigint(20) NOT NULL COMMENT 'ID',
  `hospcode` varchar(15) NOT NULL COMMENT 'Hospital Code',
  `pid` varchar(15) NOT NULL COMMENT 'PID',
  `f3value1` int(11) DEFAULT NULL COMMENT 'กิจกรรมการดูแล',
  `f3value1_1` int(11) NOT NULL COMMENT 'กิจกรรมการดูแล',
  `f3value2` int(11) DEFAULT NULL COMMENT 'การพูดคุยเรื่องสถานที่ดูแล',
  `f3value3` int(11) DEFAULT NULL COMMENT 'การพูดคุยเรื่องสถานที่เสียชีวิต',
  `f3value4` int(11) DEFAULT NULL COMMENT 'การพูดคุยเรื่องการปฏิเสธเครื่องพยุงชีพ',
  `f3value4_2` int(11) DEFAULT NULL COMMENT 'Livings will',
  `f3value5` int(11) DEFAULT NULL COMMENT 'ได้รับการพยุงชีพ (ใส่ ETT) ก่อนปรึกษา',
  `f3value6` int(11) DEFAULT NULL COMMENT 'การถอดถอนเครื่องพยุงชีพ',
  `f3value6_2` int(11) NOT NULL COMMENT 'การถอดถอนเครื่องพยุงชีพ',
  `f3value6_3` int(11) NOT NULL COMMENT 'การถอดถอนเครื่องพยุงชีพ',
  `f3value6_4` int(11) NOT NULL COMMENT 'การถอดถอนเครื่องพยุงชีพ',
  `f3value6_5` int(11) NOT NULL COMMENT 'การถอดถอนเครื่องพยุงชีพ',
  `f3datedeath` date DEFAULT NULL COMMENT 'วันที่เสียชีวิต',
  `f3deathlocation` int(11) DEFAULT NULL COMMENT 'สถานที่เสียชีวิต',
  `f3deathreason` int(11) DEFAULT NULL COMMENT 'ลักษณะการเสียชีวิต',
  `f3problemlist` text COMMENT 'Problem list',
  `update_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `palliative_followup`
--
ALTER TABLE `palliative_followup`
  ADD PRIMARY KEY (`ptid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
