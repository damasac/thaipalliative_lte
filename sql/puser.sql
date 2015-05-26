/*
Navicat MySQL Data Transfer

Source Server         : localSql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-26 15:04:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for puser
-- ----------------------------
DROP TABLE IF EXISTS `puser`;
CREATE TABLE `puser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hcode` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `amphur` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of puser
-- ----------------------------
INSERT INTO `puser` VALUES ('1', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin@admin.com', 'fadmin', 'ladmin', '1', '13777', '7', '400101', '4001', '40', '2015-05-22 15:17:01');
INSERT INTO `puser` VALUES ('2', 'adminball', 'c702838dacdcc5a6e43d4580e22e6205de3170af', 'skaball69@gmail.com', 'ภานุพงศ์', 'ศรีศุภเดชะ', '1', '91111', '07', '400101', '4001', '40', '2015-05-26 08:43:57');
INSERT INTO `puser` VALUES ('4', 'adminvut', 'c702838dacdcc5a6e43d4580e22e6205de3170af', 'kongvut@gmail.com', 'คงวุติ', 'แสงกล้า', '1', '91112', '07', '400101', '4001', '40', '2015-05-26 10:00:39');
INSERT INTO `puser` VALUES ('5', 'admincascap', '9a294c1469cf39fe07dcd350a4eb3f523896064d', 'cascap@gmail.com', 'CASCAP', 'KKU', '2', '13777', '07', '400101', '4001', '40', '2015-05-26 10:03:38');
