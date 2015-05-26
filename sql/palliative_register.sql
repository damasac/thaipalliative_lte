-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 11:25 AM
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
  `ptid` bigint(20) NOT NULL,
  `ptid_key` bigint(20) NOT NULL,
  `hospcode` varchar(15) NOT NULL COMMENT 'Hospital Code',
  `pid` varchar(15) NOT NULL COMMENT 'PID',
  `hn` varchar(15) NOT NULL COMMENT 'HN',
  `createdate` datetime NOT NULL,
  `ssn` varchar(20) NOT NULL COMMENT 'เลขที่บัตรประจำตัวประชาชน',
  `birth` date NOT NULL COMMENT 'วันเกิด',
  `age` varchar(3) NOT NULL COMMENT 'อายุ',
  `prename` varchar(20) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `sex` varchar(1) NOT NULL COMMENT 'เพศ',
  `nation` varchar(3) NOT NULL COMMENT 'สัญชาติ',
  `nationx` varchar(80) NOT NULL,
  `race` varchar(3) NOT NULL COMMENT 'เชื้อชาติ',
  `racex` varchar(80) NOT NULL,
  `religion` varchar(1) NOT NULL COMMENT 'ศาสนา',
  `religionx` varchar(80) NOT NULL,
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
  `mstatus` varchar(1) NOT NULL COMMENT 'สถานภาพ',
  `mstatusx` varchar(80) NOT NULL,
  `privilege` varchar(5) NOT NULL COMMENT 'สิทธิ์การรักษา',
  `privilegex` varchar(80) NOT NULL,
  `occupa` varchar(4) NOT NULL COMMENT 'อาชีพ',
  `occupax` varchar(80) NOT NULL,
  `congenital_disease` text NOT NULL COMMENT 'โรคประจำตัว',
  `congenital_disease2` int(5) NOT NULL,
  `congenital_disease3` int(5) NOT NULL,
  `congenital_disease4` int(5) NOT NULL,
  `congenital_disease5` int(5) NOT NULL,
  `congenital_diseasex` varchar(80) NOT NULL,
  `history` varchar(150) NOT NULL COMMENT 'ประวัติการรักษาด้วยแพทย์ทางเลือก',
  `historyx` varchar(80) NOT NULL,
  `update_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา'
) ENGINE=InnoDB AUTO_INCREMENT=100000001 DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

--
-- Dumping data for table `palliative_register`
--

INSERT INTO `palliative_register` (`ptid`, `ptid_key`, `hospcode`, `pid`, `hn`, `createdate`, `ssn`, `birth`, `age`, `prename`, `name`, `lname`, `sex`, `nation`, `nationx`, `race`, `racex`, `religion`, `religionx`, `house`, `moo`, `village`, `lane`, `road`, `tambon`, `ampur`, `changwat`, `zipcode`, `tel`, `mstatus`, `mstatusx`, `privilege`, `privilegex`, `occupa`, `occupax`, `congenital_disease`, `congenital_disease2`, `congenital_disease3`, `congenital_disease4`, `congenital_disease5`, `congenital_diseasex`, `history`, `historyx`, `update_by`, `create_by`, `update_time`) VALUES
(1, 1, '13777', '00001', 'A10000', '0000-00-00 00:00:00', '435435', '1990-05-26', '12', 'นาย', 'สุขดี', 'สีแดง', '1', '1', '111', '1', '222', '1', '333', '', '', '', '', '', 1, 1, 1, '', 'ghj', 'h', '', 'hj', '', 'hj', '', 'hjhj', 0, 0, 0, 0, '444', 'hj', '555', 0, 11, '0000-00-00 00:00:00'),
(2, 0, '234543', '5435', '345435', '0000-00-00 00:00:00', '445511', '0000-00-00', '12', '5435', '4354', '35', '1', '1', '', '11', '', '1', '', 'jkljl', 'uj', 'hjm', 'jm', 'jhm', 1, 1, 1, 'mjm', 'jhmjm', 'm', '', 'hj', '', 'hj', '', 'mjhmjhm', 0, 0, 0, 0, '', 'jhmjhm', '', 77, 1, '2015-05-11 00:00:00'),
(3, 1, '91001', '00005', '', '0000-00-00 00:00:00', '435435', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00 00:00:00'),
(4, 1, '91002', '00003', '', '0000-00-00 00:00:00', '435435', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00 00:00:00'),
(5, 5, '13777', '00002', 'A10001', '0000-00-00 00:00:00', '121312', '0000-00-00', '', 'นาง', 'อ่อนจันทร์', 'คงเจริญ', '2', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00 00:00:00'),
(8, 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00 00:00:00'),
(9, 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '', '', '', '', '111', '', '222', '', '333', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '444', '', '555', 0, 0, '0000-00-00 00:00:00'),
(100000000, 100000000, '13777', '00003', 'A10002', '0000-00-00 00:00:00', '', '0000-00-00', '', 'นางสาว', 'ฤหทัย', 'จึงอมร', '2', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `palliative_register`
--
ALTER TABLE `palliative_register`
  ADD PRIMARY KEY (`ptid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `palliative_register`
--
ALTER TABLE `palliative_register`
  MODIFY `ptid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100000001;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
