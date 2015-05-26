/*
Navicat MySQL Data Transfer

Source Server         : localSql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thaipalliative_lte

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-26 14:07:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for all_hospital_zone
-- ----------------------------
DROP TABLE IF EXISTS `all_hospital_zone`;
CREATE TABLE `all_hospital_zone` (
  `provincecode` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `zone_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of all_hospital_zone
-- ----------------------------
INSERT INTO `all_hospital_zone` VALUES ('50', 'เชียงใหม่', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('51', 'ลำพูน', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('52', 'ลำปาง', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('54', 'แพร่', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('55', 'น่าน', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('56', 'พะเยา', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('57', 'เชียงราย', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('58', 'แม่ฮ่องสอน', '01', 'สาขาพื้นที่(เชียงใหม่)');
INSERT INTO `all_hospital_zone` VALUES ('53', 'อุตรดิตถ์', '02', 'สาขาพื้นที่(พิษณุโลก)');
INSERT INTO `all_hospital_zone` VALUES ('63', 'ตาก', '02', 'สาขาพื้นที่(พิษณุโลก)');
INSERT INTO `all_hospital_zone` VALUES ('64', 'สุโขทัย', '02', 'สาขาพื้นที่(พิษณุโลก)');
INSERT INTO `all_hospital_zone` VALUES ('65', 'พิษณุโลก', '02', 'สาขาพื้นที่(พิษณุโลก)');
INSERT INTO `all_hospital_zone` VALUES ('67', 'เพชรบูรณ์', '02', 'สาขาพื้นที่(พิษณุโลก)');
INSERT INTO `all_hospital_zone` VALUES ('18', 'ชัยนาท', '03', 'สาขาพื้นที่(นครสวรรค์)');
INSERT INTO `all_hospital_zone` VALUES ('60', 'นครสวรรค์', '03', 'สาขาพื้นที่(นครสวรรค์)');
INSERT INTO `all_hospital_zone` VALUES ('61', 'อุทัยธานี', '03', 'สาขาพื้นที่(นครสวรรค์)');
INSERT INTO `all_hospital_zone` VALUES ('62', 'กำแพงเพชร', '03', 'สาขาพื้นที่(นครสวรรค์)');
INSERT INTO `all_hospital_zone` VALUES ('66', 'พิจิตร', '03', 'สาขาพื้นที่(นครสวรรค์)');
INSERT INTO `all_hospital_zone` VALUES ('12', 'นนทบุรี', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('13', 'ปทุมธานี', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('14', 'พระนครศรีอยุธยา', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('15', 'อ่างทอง', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('16', 'ลพบุรี', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('17', 'สิงห์บุรี', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('19', 'สระบุรี', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('26', 'นครนายก', '04', 'สาขาพื้นที่(สระบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('70', 'ราชบุรี', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('71', 'กาญจนบุรี', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('72', 'สุพรรณบุรี', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('73', 'นครปฐม', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('74', 'สมุทรสาคร', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('75', 'สมุทรสงคราม', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('76', 'เพชรบุรี', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('77', 'ประจวบคีรีขันธ์', '05', 'สาขาพื้นที่(ราชบุรี)');
INSERT INTO `all_hospital_zone` VALUES ('11', 'สมุทรปราการ', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('20', 'ชลบุรี', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('21', 'ระยอง', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('22', 'จันทบุรี', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('23', 'ตราด', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('24', 'ฉะเชิงเทรา', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('25', 'ปราจีนบุรี', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('27', 'สระแก้ว', '06', 'สาขาพื้นที่(ระยอง)');
INSERT INTO `all_hospital_zone` VALUES ('40', 'ขอนแก่น', '07', 'สาขาพื้นที่(ขอนแก่น)');
INSERT INTO `all_hospital_zone` VALUES ('44', 'มหาสารคาม', '07', 'สาขาพื้นที่(ขอนแก่น)');
INSERT INTO `all_hospital_zone` VALUES ('45', 'ร้อยเอ็ด', '07', 'สาขาพื้นที่(ขอนแก่น)');
INSERT INTO `all_hospital_zone` VALUES ('46', 'กาฬสินธุ์', '07', 'สาขาพื้นที่(ขอนแก่น)');
INSERT INTO `all_hospital_zone` VALUES ('38', 'บึงกาฬ', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('39', 'หนองบัวลำภู', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('41', 'อุดรธานี', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('42', 'เลย', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('43', 'หนองคาย', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('47', 'สกลนคร', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('48', 'นครพนม', '08', 'สาขาพื้นที่(อุดรธานี)');
INSERT INTO `all_hospital_zone` VALUES ('30', 'นครราชสีมา', '09', 'สาขาพื้นที่(นครราชสีมา)');
INSERT INTO `all_hospital_zone` VALUES ('31', 'บุรีรัมย์', '09', 'สาขาพื้นที่(นครราชสีมา)');
INSERT INTO `all_hospital_zone` VALUES ('32', 'สุรินทร์', '09', 'สาขาพื้นที่(นครราชสีมา)');
INSERT INTO `all_hospital_zone` VALUES ('36', 'ชัยภูมิ', '09', 'สาขาพื้นที่(นครราชสีมา)');
INSERT INTO `all_hospital_zone` VALUES ('33', 'ศรีสะเกษ', '10', 'สาขาพื้นที่(อุบลราชธานี)');
INSERT INTO `all_hospital_zone` VALUES ('34', 'อุบลราชธานี', '10', 'สาขาพื้นที่(อุบลราชธานี)');
INSERT INTO `all_hospital_zone` VALUES ('35', 'ยโสธร', '10', 'สาขาพื้นที่(อุบลราชธานี)');
INSERT INTO `all_hospital_zone` VALUES ('37', 'อำนาจเจริญ', '10', 'สาขาพื้นที่(อุบลราชธานี)');
INSERT INTO `all_hospital_zone` VALUES ('49', 'มุกดาหาร', '10', 'สาขาพื้นที่(อุบลราชธานี)');
INSERT INTO `all_hospital_zone` VALUES ('80', 'นครศรีธรรมราช', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('81', 'กระบี่', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('82', 'พังงา', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('83', 'ภูเก็ต', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('84', 'สุราษฎร์ธานี', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('85', 'ระนอง', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('86', 'ชุมพร', '11', 'สาขาพื้นที่(สุราษฎร์ธานี)');
INSERT INTO `all_hospital_zone` VALUES ('90', 'สงขลา', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('91', 'สตูล', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('92', 'ตรัง', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('93', 'พัทลุง', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('94', 'ปัตตานี', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('95', 'ยะลา', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('96', 'นราธิวาส', '12', 'สาขาพื้นที่(สงขลา)');
INSERT INTO `all_hospital_zone` VALUES ('10', 'กรุงเทพมหานคร', '13', 'สาขาพื้นที่กรุงเทพมหานคร');
INSERT INTO `all_hospital_zone` VALUES ('10', 'กรุงเทพฯ', '13', 'สาขาพื้นที่กรุงเทพมหานคร');
