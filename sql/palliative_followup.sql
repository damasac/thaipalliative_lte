/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-26 13:46:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for palliative_followup
-- ----------------------------
DROP TABLE IF EXISTS `palliative_followup`;
CREATE TABLE `palliative_followup` (
  `ptid` bigint(20) NOT NULL COMMENT 'ID',
  `hospcode` varchar(15) NOT NULL COMMENT 'Hospital Code',
  `pid` varchar(15) NOT NULL COMMENT 'PID',
  `hn` varchar(15) NOT NULL COMMENT 'HN',
  `f3value1` int(11) DEFAULT NULL COMMENT 'กิจกรรมการดูแล',
  `f3value2` int(11) DEFAULT NULL COMMENT 'การพูดคุยเรื่องสถานที่ดูแล',
  `f3value3` int(11) DEFAULT NULL COMMENT 'การพูดคุยเรื่องสถานที่เสียชีวิต',
  `f3value4` int(11) DEFAULT NULL COMMENT 'การพูดคุยเรื่องการปฏิเสธเครื่องพยุงชีพ',
  `f3value4_2` int(11) DEFAULT NULL COMMENT 'Livings will',
  `f3value5` int(11) DEFAULT NULL COMMENT 'ได้รับการพยุงชีพ (ใส่ ETT) ก่อนปรึกษา',
  `f3value6` int(11) DEFAULT NULL COMMENT 'การถอดถอนเครื่องพยุงชีพ',
  `f3datedeath` date DEFAULT NULL COMMENT 'วันที่เสียชีวิต',
  `f3deathlocation` int(11) DEFAULT NULL COMMENT 'สถานที่เสียชีวิต',
  `f3deathreason` varchar(255) DEFAULT NULL COMMENT 'ลักษณะการเสียชีวิต',
  `f3problemlist` text COMMENT 'Problem list',
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา',
  `update_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `create_time` datetime NOT NULL COMMENT 'สร้างเวลา',
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  PRIMARY KEY (`ptid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

-- ----------------------------
-- Records of palliative_followup
-- ----------------------------
