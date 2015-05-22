/*
Navicat MySQL Data Transfer

Source Server         : localSql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-22 17:41:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for formchoice
-- ----------------------------
DROP TABLE IF EXISTS `formchoice`;
CREATE TABLE `formchoice` (
  `choiceid` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) DEFAULT NULL,
  `fieldid` int(11) DEFAULT NULL,
  `choicevalue` varchar(255) DEFAULT NULL,
  `choicelabel` varchar(255) DEFAULT NULL,
  `choiceetc` int(11) DEFAULT NULL,
  `margin` tinyint(255) DEFAULT '2',
  `objlen` tinyint(255) DEFAULT '10',
  PRIMARY KEY (`choiceid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of formchoice
-- ----------------------------

-- ----------------------------
-- Table structure for formconnect
-- ----------------------------
DROP TABLE IF EXISTS `formconnect`;
CREATE TABLE `formconnect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `formid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of formconnect
-- ----------------------------

-- ----------------------------
-- Table structure for formfield
-- ----------------------------
DROP TABLE IF EXISTS `formfield`;
CREATE TABLE `formfield` (
  `fieldid` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) DEFAULT NULL,
  `fieldname` varchar(255) DEFAULT NULL,
  `fieldvalue` varchar(255) DEFAULT NULL,
  `fieldhelp` varchar(255) DEFAULT NULL,
  `fieldtype` varchar(255) DEFAULT NULL,
  `valueprovince` varchar(100) DEFAULT NULL,
  `valueamphur` varchar(100) DEFAULT NULL,
  `valuetumbon` varchar(100) DEFAULT NULL,
  `haveTumbon` tinyint(11) DEFAULT NULL,
  `horder` tinyint(4) DEFAULT NULL,
  `forder` int(11) DEFAULT NULL,
  `margin` tinyint(4) NOT NULL DEFAULT '0',
  `objlen` tinyint(4) NOT NULL DEFAULT '12',
  PRIMARY KEY (`fieldid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of formfield
-- ----------------------------
INSERT INTO `formfield` VALUES ('21', '4', 'คำถามไม่ระบุหัวข้อ', 'value1', '', 'textarea', null, null, null, '0', null, '1', '0', '12');

-- ----------------------------
-- Table structure for formmain
-- ----------------------------
DROP TABLE IF EXISTS `formmain`;
CREATE TABLE `formmain` (
  `formid` int(11) NOT NULL AUTO_INCREMENT,
  `databaseid` int(11) DEFAULT NULL,
  `formname` varchar(255) DEFAULT NULL,
  `formdesc` varchar(255) DEFAULT NULL,
  `tablename` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `status_share` int(11) DEFAULT NULL,
  `public_add` int(11) DEFAULT NULL,
  `public_view` int(11) DEFAULT NULL,
  `public_edit` int(11) DEFAULT NULL,
  `public_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`formid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of formmain
-- ----------------------------
INSERT INTO `formmain` VALUES ('4', '1', 'ฟอร์มไม่มีชื่อ', 'คำอธิบายฟอร์ม', 'tbdata_1', '0', '2015-05-22', null, null, null, null, null);
