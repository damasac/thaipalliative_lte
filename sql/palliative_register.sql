-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2015 at 12:33 PM
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
-- Table structure for table `palliative_register`
--

CREATE TABLE IF NOT EXISTS `palliative_register` (
  `mr_id` bigint(20) NOT NULL COMMENT 'ID',
  `hospcode` varchar(15) NOT NULL COMMENT 'Hospital Code',
  `pid` varchar(15) NOT NULL COMMENT 'PID',
  `hn` varchar(15) NOT NULL COMMENT 'HN',
  `ssn` varchar(20) NOT NULL COMMENT 'เลขที่บัตรประจำตัวประชาชน',
  `birth` varchar(8) NOT NULL COMMENT 'วันเกิด',
  `age` varchar(3) NOT NULL COMMENT 'อายุ',
  `prename` varchar(20) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `sex` varchar(1) NOT NULL COMMENT 'เพศ',
  `race` varchar(3) NOT NULL COMMENT 'เชื้อชาติ',
  `nation` varchar(3) NOT NULL COMMENT 'สัญชาติ',
  `religion` varchar(1) NOT NULL COMMENT 'ศาสนา',
  `house` varchar(75) NOT NULL COMMENT 'บ้านเลขที่',
  `moo` varchar(10) NOT NULL COMMENT 'หมู่',
  `village` varchar(100) NOT NULL COMMENT 'หมู่บ้าน',
  `lane` varchar(100) NOT NULL COMMENT 'ซอย',
  `road` varchar(100) NOT NULL COMMENT 'ถนน',
  `tambon` int(5) NOT NULL COMMENT 'ตำบล',
  `ampur` int(5) NOT NULL COMMENT 'อำเภอ',
  `changwat` int(5) NOT NULL COMMENT 'จังหวัด',
  `zipcode` varchar(8) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `tel` varchar(100) NOT NULL COMMENT 'เบอร์โทร',
  `privilege` varchar(5) NOT NULL COMMENT 'สิทธิ์การรักษา',
  `mstatus` varchar(1) NOT NULL COMMENT 'สถานภาพ',
  `occupa` varchar(4) NOT NULL COMMENT 'อาชีพ',
  `congenital_disease` text NOT NULL COMMENT 'โรคประจำตัว',
  `history` varchar(150) NOT NULL COMMENT 'ประวัติการรักษาด้วยแพทย์ทางเลือก',
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา',
  `update_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `create_time` datetime NOT NULL COMMENT 'สร้างเวลา',
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย'
) ENGINE=InnoDB AUTO_INCREMENT=1234 DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

--
-- Dumping data for table `palliative_register`
--

INSERT INTO `palliative_register` (`mr_id`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, `age`, `prename`, `name`, `lname`, `sex`, `race`, `nation`, `religion`, `house`, `moo`, `village`, `lane`, `road`, `tambon`, `ampur`, `changwat`, `zipcode`, `tel`, `privilege`, `mstatus`, `occupa`, `congenital_disease`, `history`, `update_time`, `update_by`, `create_time`, `create_by`) VALUES
(1232, '234543', '5435', '345435', '435435', '435', '12', '5435', '4354', '35', '1', '11', '1', '1', 'fgfd', 'dfg', 'dfg', 'dfg', 'dfg', 1, 1, 1, 'hgj', 'ghj', 'hj', 'h', 'hj', 'hjhj', 'hj', '2015-05-06 00:00:00', 0, '2015-05-26 00:00:00', 11),
(1233, '234543', '5435', '345435', '435435', '435', '12', '5435', '4354', '35', '1', '11', '1', '1', 'jkljl', 'uj', 'hjm', 'jm', 'jhm', 1, 1, 1, 'mjm', 'jhmjm', 'hj', 'm', 'hj', 'mjhmjhm', 'jhmjhm', '2015-05-11 00:00:00', 77, '2015-05-28 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `palliative_register`
--
ALTER TABLE `palliative_register`
  ADD PRIMARY KEY (`mr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `palliative_register`
--
ALTER TABLE `palliative_register`
  MODIFY `mr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=1234;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
