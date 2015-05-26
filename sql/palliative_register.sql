/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50533
 Source Host           : localhost
 Source Database       : thaipalliative_lte

 Target Server Type    : MySQL
 Target Server Version : 50533
 File Encoding         : utf-8

 Date: 05/26/2015 15:52:52 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `palliative_register`
-- ----------------------------
DROP TABLE IF EXISTS `palliative_register`;
CREATE TABLE `palliative_register` (
  `ptid` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `privilege` varchar(5) NOT NULL COMMENT 'สิทธิ์การรักษา',
  `mstatus` varchar(1) NOT NULL COMMENT 'สถานภาพ',
  `occupa` varchar(4) NOT NULL COMMENT 'อาชีพ',
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
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา',
  PRIMARY KEY (`ptid`)
) ENGINE=InnoDB AUTO_INCREMENT=100000001 DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

-- ----------------------------
--  Records of `palliative_register`
-- ----------------------------
INSERT INTO `palliative_register` VALUES ('1', '1', '13777', '00001', 'A10000', '0000-00-00 00:00:00', '435435', '1990-05-26', '12', 'นาย', 'สุขดี', 'สีแดง', '1', '1', '111', '1', '222', '1', '333', '', '', '', '', '', '1', '1', '1', '', 'ghj', 'hj', 'h', 'hj', 'hjhj', '0', '0', '0', '0', '444', 'hj', '555', '0', '11', '0000-00-00 00:00:00'), ('2', '0', '234543', '5435', '345435', '0000-00-00 00:00:00', '445511', '0000-00-00', '12', '5435', '4354', '35', '1', '1', '', '11', '', '1', '', 'jkljl', 'uj', 'hjm', 'jm', 'jhm', '1', '1', '1', 'mjm', 'jhmjm', 'hj', 'm', 'hj', 'mjhmjhm', '0', '0', '0', '0', '', 'jhmjhm', '', '77', '1', '2015-05-11 00:00:00'), ('3', '1', '91001', '00005', '', '0000-00-00 00:00:00', '435435', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '', '0', '0', '0000-00-00 00:00:00'), ('4', '1', '91002', '00003', '', '0000-00-00 00:00:00', '435435', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '', '0', '0', '0000-00-00 00:00:00'), ('5', '5', '13777', '00002', 'A10001', '0000-00-00 00:00:00', '121312', '0000-00-00', '', 'นาง', 'อ่อนจันทร์', 'คงเจริญ', '2', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '', '0', '0', '0000-00-00 00:00:00'), ('8', '0', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '', '0', '0', '0000-00-00 00:00:00'), ('9', '0', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '', '', '', '', '111', '', '222', '', '333', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '0', '0', '0', '0', '444', '', '555', '0', '0', '0000-00-00 00:00:00'), ('100000000', '100000000', '13777', '00003', 'A10002', '0000-00-00 00:00:00', '', '0000-00-00', '', 'นางสาว', 'ฤหทัย', 'จึงอมร', '2', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '', '0', '0', '0000-00-00 00:00:00');
