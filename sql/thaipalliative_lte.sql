/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-25 21:23:09
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of formfield
-- ----------------------------
INSERT INTO `formfield` VALUES ('21', '4', 'คำถามไม่ระบุหัวข้อ', 'value1', '', 'textarea', null, null, null, '0', null, '1', '0', '12');
INSERT INTO `formfield` VALUES ('22', '4', 'คำถามไม่ระบุหัวข้อ', 'value2', '', 'text', null, null, null, '0', null, '2', '0', '12');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of formmain
-- ----------------------------
INSERT INTO `formmain` VALUES ('4', '1', 'ฟอร์มไม่มีชื่อ', 'คำอธิบายฟอร์ม', 'tbdata_1', '1', '2015-05-22', null, null, null, null, null);
INSERT INTO `formmain` VALUES ('10', '7', 'ฟอร์มไม่มีชื่อ', 'คำอธิบายฟอร์ม', 'tbdata_7', '1', '2015-05-25', null, null, null, null, null);
INSERT INTO `formmain` VALUES ('6', '5', 'ฟอร์มไม่มีชื่อ', 'คำอธิบายฟอร์ม', 'tbdata_5', '1', '2015-05-23', null, null, null, null, null);
INSERT INTO `formmain` VALUES ('7', '6', 'ฟอร์มไม่มีชื่อ', 'คำอธิบายฟอร์ม', 'tbdata_6', '0', '2015-05-23', null, null, null, null, null);

-- ----------------------------
-- Table structure for palliative_followup
-- ----------------------------
DROP TABLE IF EXISTS `palliative_followup`;
CREATE TABLE `palliative_followup` (
  `mr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
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
  PRIMARY KEY (`mr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000000 DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

-- ----------------------------
-- Records of palliative_followup
-- ----------------------------

-- ----------------------------
-- Table structure for palliative_register
-- ----------------------------
DROP TABLE IF EXISTS `palliative_register`;
CREATE TABLE `palliative_register` (
  `ptid` bigint(20) NOT NULL AUTO_INCREMENT,
  `ptid_key` bigint(20) NOT NULL,
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
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  PRIMARY KEY (`ptid`)
) ENGINE=InnoDB AUTO_INCREMENT=100000001 DEFAULT CHARSET=utf8 COMMENT='ทะเบียนผู้ป่วย';

-- ----------------------------
-- Records of palliative_register
-- ----------------------------
INSERT INTO `palliative_register` VALUES ('1', '1', '13777', '00001', '345435', '435435', '435', '12', '5435', '4354', '35', '1', '11', '1', '1', 'fgfd', 'dfg', 'dfg', 'dfg', 'dfg', '1', '1', '1', 'hgj', 'ghj', 'hj', 'h', 'hj', 'hjhj', 'hj', '2015-05-06 00:00:00', '0', '2015-05-26 00:00:00', '11');
INSERT INTO `palliative_register` VALUES ('2', '0', '234543', '5435', '345435', '445511', '435', '12', '5435', '4354', '35', '1', '11', '1', '1', 'jkljl', 'uj', 'hjm', 'jm', 'jhm', '1', '1', '1', 'mjm', 'jhmjm', 'hj', 'm', 'hj', 'mjhmjhm', 'jhmjhm', '2015-05-11 00:00:00', '77', '2015-05-28 00:00:00', '1');
INSERT INTO `palliative_register` VALUES ('3', '1', '91001', '00005', '', '435435', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0');
INSERT INTO `palliative_register` VALUES ('4', '1', '91002', '00003', '', '435435', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0');
INSERT INTO `palliative_register` VALUES ('5', '5', '13777', '00002', '', '121312', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0');
INSERT INTO `palliative_register` VALUES ('100000000', '0', '13777', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for palliative_treatment
-- ----------------------------
DROP TABLE IF EXISTS `palliative_treatment`;
CREATE TABLE `palliative_treatment` (
  `mr_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `hospcode` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hospital Code',
  `pid` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'PID',
  `hn` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'HN',
  `mr_date` date NOT NULL COMMENT 'วันที่ลงทะเบียน',
  `f2datein` date DEFAULT NULL COMMENT 'วันที่เข้ารับการรักษาตัว',
  `f2dateconsult` date DEFAULT NULL COMMENT 'วันที่ปรึกษา',
  `f2wardconsult` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หอผู้ป่วยที่ปรึกษา',
  `f2dateout` date DEFAULT NULL COMMENT 'วันที่จำหน่ายออก',
  `f2datesent` date DEFAULT NULL COMMENT 'วันที่ส่งต่อ',
  `f2reason` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เหตุผล',
  `f2hospital` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'โรงพยาบาลที่ส่งต่อ',
  `f2tumbol` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ตำบล',
  `f2amphur` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อำเภอ',
  `f2province` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'จังหวัด',
  `f2med` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อายุ',
  `f2ortho` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ออร์โธฯ',
  `f2obgyn` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สูตินรีเวช',
  `f2ped` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'กุมารเวชกรรม',
  `f2er` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวชศาสตร์ฉุกเฉิน',
  `f2surgery` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ศัลย์',
  `f2ent` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'โสตฯ',
  `f2opd` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'OPD',
  `f2other` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ',
  `f2othertext` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆกรอก',
  `f2maindiag` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การวินิจฉัยหลัก',
  `f2cancer` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Cancer',
  `f2esrd` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ESRD',
  `f2frailty` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Frailty Dementia',
  `f2copd` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'End stage lung disease (COPD) ',
  `f2neuro` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Neurological disease',
  `f2heart` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'End stage heart disease',
  `f2diseaseother` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ',
  `f2historydate1` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate2` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate3` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate4` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate5` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate6` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate7` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate8` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historydate9` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick7` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick8` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historysick9` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2datelabbun` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2datelabcr` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2datelabalb` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2datelabca` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2datelabhct` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2datelabinr` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labbun` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'BUN',
  `f2labcr` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Cr',
  `f2labalb` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Alb',
  `f2labca` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ca',
  `f2labhct` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hct',
  `f2laninr` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'INR',
  `f2labresult1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2labresult2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2labresult3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2labresult4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2labresult5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2labresult6` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2systematic` float DEFAULT NULL COMMENT 'PPS',
  `f2fatigue` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1. Fatigue',
  `f2sleep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '2. Sleep problems',
  `f2cachexia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '3. Cachexia',
  `f2lymphedema` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '4. Lymphedema',
  `f2anorexia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '5. Anorexia',
  `f2oral` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '6. Oral symptoms',
  `f2weightloss` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '7. Weight loss',
  `f2dyspha` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '8. Dysphagia',
  `f2nausea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '9. Nausea',
  `f2vomitting` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '10. Vomitting',
  `f2constipation` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '11. Constipation',
  `f2diarrhea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '12. Diarrhea',
  `f2ostomy` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '13. Ostomy',
  `f2urinary` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '14. Urinary prob',
  `f2gynae` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '15. Gynae prob',
  `f2catheter` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '16. Catheter',
  `f2rash` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '17. Rash',
  `f2ulcer` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '18. Ulcer/fistula',
  `f2headaches` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '19. Headaches',
  `f2seizure` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '20. Seizure',
  `f2limb` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '21. Limb weakness',
  `f2drowsiness` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '22. Drowsiness',
  `f2cognitive` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '23. Cognitive impairment',
  `f2delirium` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '24. Delirium',
  `f2dyspnea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '25. Dyspnea',
  `f2cough` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '26. Cough',
  `f2pain` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '27. Pain',
  `f2problemeco` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปัญหาด้านเศรษฐกิจ',
  `f2problemmind` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปัญหาด้านจิตใจ',
  `f2problemsocial` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปัญหาด้านสังคม',
  `f2hope` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hope (false hope)',
  `f2fear` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fear',
  `f2unbusiness` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Unfinished business',
  `f2connectness` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Connectness',
  `f2control` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Control helplessness',
  `f2religious` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Religious',
  `f2padisease` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้โรค',
  `f2padiag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้พยากรณ์โรค',
  `f2patarget` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เป้าหมายการรักษา',
  `f2famdisease` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้โรค',
  `f2famdiag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้พยากรณ์โรค',
  `f2famtarget` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เป้าหมายการรักษา',
  `f2genogram` text COLLATE utf8_unicode_ci COMMENT 'แผงผังครอบครัว (Genogram)',
  `f2datelendo2` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendsyringe` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendbed` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendairbed` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendspray` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendo2tank` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendvacuum` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendmonkey` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2datelendcart` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendo2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เครื่องผลิจออกซิเจน',
  `f2lendsyringe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'syringe driver',
  `f2lendbed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เตียง',
  `f2lendairbed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่นอนลม',
  `f2lendspray` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เครื่องพ่นยา',
  `f2lendo2tank` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ออกซิเจน tank',
  `f2lendvacuum` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เครื่องดูดเสมหะ',
  `f2lendmonkey` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Monkey bar',
  `f2lendcart` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รถเข็น',
  `f2o2no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นเครื่องผลิตออกซิเจน',
  `f2syringeno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่น syringe',
  `f2bedno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นเตียง',
  `f2airbedno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นที่นอนลม',
  `f2sprayno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นเครื่องพ่นยา',
  `f2o2tankno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นออกซิเจน tank',
  `f2vacuumno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นเครื่องดูดเสมหะ',
  `f2monkeyno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่น Monkey bar',
  `f2cartno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นรถเข็น',
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา',
  `update_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `create_time` datetime NOT NULL COMMENT 'สร้างเวลา',
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  PRIMARY KEY (`mr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000000 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of palliative_treatment
-- ----------------------------

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
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of puser
-- ----------------------------
INSERT INTO `puser` VALUES ('1', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin@admin.com', 'fadmin', 'ladmin', '1', '2', '3', '2015-05-22 15:17:01');

-- ----------------------------
-- Table structure for tbdata_5
-- ----------------------------
DROP TABLE IF EXISTS `tbdata_5`;
CREATE TABLE `tbdata_5` (
  `id` int(11) NOT NULL,
  `rstat` int(11) DEFAULT NULL,
  `useradd` varchar(50) DEFAULT NULL,
  `dadd` varchar(50) DEFAULT NULL,
  `userupdate` varchar(50) DEFAULT NULL,
  `dupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbdata_5
-- ----------------------------

-- ----------------------------
-- Table structure for tbdata_6
-- ----------------------------
DROP TABLE IF EXISTS `tbdata_6`;
CREATE TABLE `tbdata_6` (
  `id` int(11) NOT NULL,
  `rstat` int(11) DEFAULT NULL,
  `useradd` varchar(50) DEFAULT NULL,
  `dadd` varchar(50) DEFAULT NULL,
  `userupdate` varchar(50) DEFAULT NULL,
  `dupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbdata_6
-- ----------------------------

-- ----------------------------
-- Table structure for tbdata_7
-- ----------------------------
DROP TABLE IF EXISTS `tbdata_7`;
CREATE TABLE `tbdata_7` (
  `id` int(11) NOT NULL,
  `rstat` int(11) DEFAULT NULL,
  `useradd` varchar(50) DEFAULT NULL,
  `dadd` varchar(50) DEFAULT NULL,
  `userupdate` varchar(50) DEFAULT NULL,
  `dupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbdata_7
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_emr
-- ----------------------------
INSERT INTO `tb_emr` VALUES ('2', '1', 'ลงทะเบียนผู้ป่วย', 'palliative_register', '1', '1', '2015-05-25 20:55:51', '1', '13777', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('3', '1', 'ลงทะเบียนผู้ป่วย', 'palliative_register', '1', '2', '2015-05-25 20:55:51', '1', '13777', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('4', '2', 'การให้การรักษา', 'palliative_treatment', '1', '1', '2015-05-25 20:55:51', '1', '91001', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('5', '3', 'การติดตามผลการรักษา', 'palliative_followup', '1', '1', '2015-05-25 20:55:51', '1', '91001', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('6', '2', 'การให้การรักษา', 'palliative_treatment', '1', '2', '2015-05-25 20:55:51', '1', '13777', '2015-05-25 20:56:11', '1');
INSERT INTO `tb_emr` VALUES ('7', '3', 'การติดตามผลการรักษา', 'palliative_followup', '1', '2', '2015-05-25 20:55:51', '1', '91001', '2015-05-25 20:56:11', '1');
