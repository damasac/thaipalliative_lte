/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50533
 Source Host           : localhost
 Source Database       : thaipalliative_lte

 Target Server Type    : MySQL
 Target Server Version : 50533
 File Encoding         : cp874

 Date: 05/25/2015 17:52:38 PM
*/

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tb_emr`
-- ----------------------------
DROP TABLE IF EXISTS `tb_emr`;
CREATE TABLE `tb_emr` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `formid` bigint(20) NOT NULL,
  `formname` varchar(80) NOT NULL,
  `tbname` varchar(50) NOT NULL,
  `dataid` bigint(20) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `dadd` datetime NOT NULL,
  `pidadd` bigint(20) NOT NULL,
  `hcode` varchar(5) NOT NULL,
  `dupdate` datetime NOT NULL,
  `pidupdate` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

