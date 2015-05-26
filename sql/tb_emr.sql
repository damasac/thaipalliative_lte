/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-26 13:46:22
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
INSERT INTO `tb_emr` VALUES ('2', '1', 'ลงทะเบียนผู้ป่วย', 'palliative_register', '1', '1', '2015-05-25 20:55:51', '1', '13777', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('3', '1', 'ลงทะเบียนผู้ป่วย', 'palliative_register', '1', '2', '2015-05-25 20:55:51', '1', '13777', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('4', '2', 'การให้การรักษา', 'palliative_treatment', '1', '1', '2015-05-25 20:55:51', '1', '91001', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('5', '3', 'การติดตามผลการรักษา', 'palliative_followup', '1', '1', '2015-05-25 20:55:51', '1', '91001', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('6', '2', 'การให้การรักษา', 'palliative_treatment', '1', '2', '2015-05-25 20:55:51', '1', '13777', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('7', '3', 'การติดตามผลการรักษา', 'palliative_followup', '1', '2', '2015-05-25 20:55:51', '1', '91001', '2015-05-25 20:56:11', '1');
