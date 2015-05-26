/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-27 05:16:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_emr
-- ----------------------------
DROP TABLE IF EXISTS `tb_emr`;
CREATE TABLE `tb_emr` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `formid` bigint(20) NOT NULL,
  `formname` varchar(80) CHARACTER SET utf8 NOT NULL,
  `tbname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dataid` bigint(20) NOT NULL,
  `ptid_key` bigint(20) NOT NULL,
  `dadd` datetime NOT NULL,
  `pidadd` bigint(20) NOT NULL,
  `hcode` varchar(5) CHARACTER SET utf8 NOT NULL,
  `dupdate` datetime DEFAULT NULL,
  `pidupdate` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100000000 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_emr
-- ----------------------------
