/*
Navicat MySQL Data Transfer

Source Server         : localSql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-26 22:17:26
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of puser
-- ----------------------------
INSERT INTO `puser` VALUES ('1', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin@admin.com', 'fadmin', 'ladmin', '1', '13777', '7', '400101', '4001', '40', '2015-05-22 15:17:01');
INSERT INTO `puser` VALUES ('3', 'adminarea', 'f345eb82329e50c5f4c1d1dc8629deb42bd4f559', 'skaball69@gmail.com', 'cascap', 'kku', '2', '00049', '2', '400101', '4001', '63', '2015-05-26 14:39:13');
INSERT INTO `puser` VALUES ('4', 'adminprovince', 'ad59e9efd14df6207814f5e1a5e6a76c768511f5', 'adminprovince@province.com', 'cascap', 'kku', '3', '13777', '7', '400101', '4001', '40', '2015-05-26 14:39:36');
INSERT INTO `puser` VALUES ('5', 'adminsite', '4564b73eea95ce3be7687d7dc305a2e95b3101c8', 'adminsite@adminsite.com', 'cascap', 'kku', '4', '13777', '7', '400101', '4001', '40', '2015-05-26 14:40:20');
INSERT INTO `puser` VALUES ('6', 'usersite', '7e10d42536a53807c5389e37c6a7c3de1849eba6', 'user@cascap.in.th', 'user', 'cascap', '5', '13777', '7', '400101', '4001', '40', '2015-05-26 14:54:45');
