-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 02:55 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thaipalliative_lte`
--

-- --------------------------------------------------------

--
-- Table structure for table `palliative_treatment`
--

CREATE TABLE IF NOT EXISTS `palliative_treatment` (
  `ptid` bigint(20) NOT NULL COMMENT 'ID',
  `hospcode` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hospital Code',
  `pid` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'PID',
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
  `f2diseaseotherx` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f2historydate1` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick1` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate2` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick2` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate3` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick3` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate4` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick4` date DEFAULT NULL COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate5` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick5` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate6` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick6` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate7` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick7` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate8` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick8` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2historydate9` date DEFAULT NULL COMMENT 'วันที่ประวัติการเจ็บป่วย',
  `f2historysick9` text COLLATE utf8_unicode_ci COMMENT 'ประวัติการเจ็บป่วย',
  `f2datelabbun` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labbun` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'BUN',
  `f2labresult1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2datelabcr` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labcr` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Cr',
  `f2labresult2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2datelabalb` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labalb` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Alb',
  `f2labresult3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2datelabca` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labca` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ca',
  `f2labresult4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2datelabhct` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labhct` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hct',
  `f2labresult5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2datelabinr` date DEFAULT NULL COMMENT 'วันที่ผลการตรวจ',
  `f2labinr` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'INR',
  `f2labresult6` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผลการตรวจ',
  `f2systematic` float DEFAULT NULL COMMENT 'PPS',
  `f2fatigue` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1. Fatigue',
  `f2rash` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '17. Rash',
  `f2sleep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '2. Sleep problems',
  `f2ulcer` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '18. Ulcer/fistula',
  `f2cachexia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '3. Cachexia',
  `f2lymphedema` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '4. Lymphedema',
  `f2headaches` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '19. Headaches',
  `f2seizure` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '20. Seizure',
  `f2anorexia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '5. Anorexia',
  `f2limb` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '21. Limb weakness',
  `f2oral` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '6. Oral symptoms',
  `f2drowsiness` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '22. Drowsiness',
  `f2weightloss` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '7. Weight loss',
  `f2cognitive` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '23. Cognitive impairment',
  `f2dyspha` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '8. Dysphagia',
  `f2delirium` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '24. Delirium',
  `f2nausea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '9. Nausea',
  `f2vomitting` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '10. Vomitting',
  `f2dyspnea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '25. Dyspnea',
  `f2constipation` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '11. Constipation',
  `f2cough` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '26. Cough',
  `f2diarrhea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '12. Diarrhea',
  `f2pain` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '27. Pain',
  `f2ostomy` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '13. Ostomy',
  `f2urinary` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '14. Urinary prob',
  `f2gynae` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '15. Gynae prob',
  `f2catheter` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '16. Catheter',
  `f2problemeco` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปัญหาด้านเศรษฐกิจ',
  `f2hope` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hope (false hope)',
  `f2problemmind` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปัญหาด้านจิตใจ',
  `f2fear` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fear',
  `f2problemsocial` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปัญหาด้านสังคม',
  `f2unbusiness` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Unfinished business',
  `f2connectness` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Connectness',
  `f2control` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Control helplessness',
  `f2padisease` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้โรค',
  `f2famdisease` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้โรค',
  `f2religious` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Religious',
  `f2padiag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้พยากรณ์โรค',
  `f2famdiag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรับรู้พยากรณ์โรค',
  `f2patarget` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เป้าหมายการรักษา',
  `f2famtarget` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เป้าหมายการรักษา',
  `f2genogram` text COLLATE utf8_unicode_ci COMMENT 'แผงผังครอบครัว (Genogram)',
  `f2datelendo2` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendo2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เครื่องผลิจออกซิเจน',
  `f2o2no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่นเครื่องผลิตออกซิเจน',
  `f2datelendsyringe` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendsyringe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'syringe driver',
  `f2syringeno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendbed` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendbed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เตียง',
  `f2bedno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendairbed` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendairbed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่นอนลม',
  `f2airbedno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendspray` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendspray` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เครื่องพ่นยา',
  `f2sprayno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendo2tank` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendo2tank` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ออกซิเจน tank',
  `f2o2tankno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendvacuum` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendvacuum` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เครื่องดูดเสมหะ',
  `f2vacuumno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendmonkey` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendmonkey` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Monkey bar',
  `f2monkeyno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f2datelendcart` date DEFAULT NULL COMMENT 'วันที่ยืมอุปกรณ์การแพทย์',
  `f2lendcart` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รถเข็น',
  `f2cartno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `create_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `update_time` datetime NOT NULL COMMENT 'แก้ไขเวลา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `palliative_treatment`
--
ALTER TABLE `palliative_treatment`
  ADD PRIMARY KEY (`ptid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
