-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2017 at 03:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fcis`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raw_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orig_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_ext` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_size` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_image` int(1) DEFAULT NULL,
  `image_width` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_height` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_type` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_size_str` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `file_name`, `file_type`, `file_path`, `full_path`, `raw_name`, `orig_name`, `client_name`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `image_type`, `image_size_str`) VALUES
(7, '9fb6464aac0982b99d9a4dfae679646e.png', 'image/png', '/Applications/XAMPP/xamppfiles/htdocs/clp/fcis/uploads/patients/', '/Applications/XAMPP/xamppfiles/htdocs/clp/fcis/uploads/patients/9fb6464aac0982b99d9a4dfae679646e.png', '9fb6464aac0982b99d9a4dfae679646e', '7.png', '7.png', '.png', '46.28', 1, '1366', '629', 'png', 'width=\"1366\" height=\"629\"');

-- --------------------------------------------------------

--
-- Table structure for table `assets_patients`
--

CREATE TABLE `assets_patients` (
  `id` int(11) NOT NULL,
  `assets_id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `assets_from` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_date` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `upload_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assets_patients`
--

INSERT INTO `assets_patients` (`id`, `assets_id`, `patients_id`, `assets_from`, `upload_date`, `upload_by`) VALUES
(2, 7, 15, NULL, '1505682422', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `fap_polyposis` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fap_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fap_malignant` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fap_extracolonic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fap_extracolonic_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `hnpcc_criteria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hnpcc_clinical` text COLLATE utf8_unicode_ci NOT NULL,
  `hnpcc_clinical_detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pjsjps_clinical` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pjsjps_type` int(1) NOT NULL,
  `pjsjps_type_detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `patient_id`, `fap_polyposis`, `fap_type`, `fap_malignant`, `fap_extracolonic`, `fap_extracolonic_detail`, `hnpcc_criteria`, `hnpcc_clinical`, `hnpcc_clinical_detail`, `pjsjps_clinical`, `pjsjps_type`, `pjsjps_type_detail`) VALUES
(1, 1, '>100<1,000', 'Attenuated FAP(AFAP) or Attenuated adenomatous polyposis coli (AAPC)', 'Turcot syndrome (FAP Turcot หรือ Crail syndrome Adenomatous polyposis Celebellar medulloblastoma)', 'duodenal_polyps', 'a:6:{s:19:\"endoscopic_datetime\";s:10:\"08/20/2017\";s:17:\"endoscopic_detail\";s:4:\"test\";s:17:\"sergical_datetime\";s:10:\"08/21/2017\";s:15:\"sergical_detail\";s:4:\"test\";s:22:\"pharmacologic_datetime\";s:10:\"08/22/2017\";s:20:\"pharmacologic_detail\";s:4:\"test\";}', 'Amsterdam I', 'Lynch II syndromes', 'Ureter', 'intestinal obstruction', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'special', 'Special'),
(2, 'admin', 'Administrator'),
(3, 'editor', 'Editor'),
(4, 'member', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `endoscope` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apc` int(1) NOT NULL,
  `apc_exon` int(3) NOT NULL,
  `apc_intron` int(3) NOT NULL,
  `apc_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apc_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apc_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apc_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh` int(1) NOT NULL,
  `mutyh_exon` int(3) NOT NULL,
  `mutyh_intron` int(3) NOT NULL,
  `mutyh_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `negative` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `msi_h` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_h_methylation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_l` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_l_methylation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_s` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_s_methylation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ihc` text COLLATE utf8_unicode_ci NOT NULL,
  `gene` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `germline` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `germline_exon` int(3) NOT NULL,
  `germline_intron` int(3) NOT NULL,
  `germline_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `germline_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `germline_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `germline_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `somatic` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `somatic_exon` int(3) NOT NULL,
  `somatic_intron` int(3) NOT NULL,
  `somatic_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `somatic_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `somatic_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `somatic_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stk11_exon` int(3) NOT NULL,
  `stk11_intron` int(3) NOT NULL,
  `stk11_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stk11_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stk11_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stk11_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `patient_id`, `endoscope`, `apc`, `apc_exon`, `apc_intron`, `apc_codon`, `apc_amino_acid`, `apc_type_mutation`, `apc_effect_mutation`, `mutyh`, `mutyh_exon`, `mutyh_intron`, `mutyh_codon`, `mutyh_amino_acid`, `mutyh_type_mutation`, `mutyh_effect_mutation`, `negative`, `msi_h`, `msi_h_methylation`, `msi_l`, `msi_l_methylation`, `msi_s`, `msi_s_methylation`, `ihc`, `gene`, `germline`, `germline_exon`, `germline_intron`, `germline_codon`, `germline_amino_acid`, `germline_type_mutation`, `germline_effect_mutation`, `somatic`, `somatic_exon`, `somatic_intron`, `somatic_codon`, `somatic_amino_acid`, `somatic_type_mutation`, `somatic_effect_mutation`, `stk11_exon`, `stk11_intron`, `stk11_codon`, `stk11_amino_acid`, `stk11_type_mutation`, `stk11_effect_mutation`) VALUES
(1, 15, 'POLYP', 1, 11, 10, 'ASAS', 'ASDW', 'insertion', 'missense', 0, 0, 0, '', '', '', '', '1', 'D2S123', '', 'BAT26', '', 'D17S250', '', 'a:2:{i:0;s:4:\"PMS2\";i:1;s:4:\"MSH6\";}', 'MUTATION', 'PMS2', 7, 7, 'test', 'test', 'Indel', 'splice mutation', 'BRAF', 5, 8, '', '', '', '', 3, 4, 'test', 'test', 'duplication', 'Nonsense');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้บันทึก',
  `types` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทผู้ป่วย',
  `times` int(6) NOT NULL COMMENT 'ครั้งที่',
  `groups` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'กลุ่มผู้ป่วย',
  `hn` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผู้ป่วย',
  `id_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขบัตรประชาชน',
  `title` varchar(6) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `age` int(3) NOT NULL COMMENT 'อายุ',
  `relationship` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ความสัมพันธ์กับผู้ป่วย',
  `relationship_by` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผู้ป่วย',
  `address` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลที่อยู่',
  `address_current` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลที่อยู่ปัจจุบัน',
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'โทรศัพท์',
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'มือถือ',
  `history` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลประวัติ',
  `activity` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลการตรวจสอบ',
  `filtered` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลการคัดกรอง',
  `protect` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'การป้องกัน',
  `treatment_planning` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'แนวทางการรักษา',
  `insurance` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลสิทธิประกันสังคม',
  `created` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่บันทึก',
  `updated` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่อัพเดท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `types`, `times`, `groups`, `hn`, `id_card`, `title`, `firstname`, `lastname`, `age`, `relationship`, `relationship_by`, `address`, `address_current`, `phone`, `mobile`, `history`, `activity`, `filtered`, `protect`, `treatment_planning`, `insurance`, `created`, `updated`) VALUES
(15, 2, 'คนไข้ออกหน่วย', 6, 'FAP', '10000', '1000000000000', 'นาย', 'name', 'surname', 50, 'ผู้ป่วย', '', 'a:8:{s:6:\"number\";s:3:\"000\";s:3:\"soi\";s:1:\"0\";s:6:\"street\";s:1:\"0\";s:3:\"moo\";s:1:\"0\";s:6:\"tambon\";s:1:\"0\";s:6:\"amphur\";s:1:\"0\";s:8:\"province\";s:1:\"0\";s:3:\"zip\";s:5:\"00000\";}', 'a:8:{s:6:\"number\";s:3:\"000\";s:3:\"soi\";s:1:\"0\";s:6:\"street\";s:1:\"0\";s:3:\"moo\";s:1:\"0\";s:6:\"tambon\";s:1:\"0\";s:6:\"amphur\";s:1:\"0\";s:8:\"province\";s:1:\"0\";s:3:\"zip\";s:5:\"00000\";}', '0000000000', '0000000000', 'history', 'a:3:{i:1;s:1:\"1\";i:6;s:1:\"3\";i:7;s:1:\"3\";}', 'a:3:{s:7:\"educate\";s:18:\"บรรยาย\";s:10:\"assessment\";s:27:\"มากที่สุด\";s:9:\"endoscope\";s:6:\"NORMAL\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1505488022', '1506140478'),
(16, 2, 'กลุ่ม CRC of PSU', 0, 'PJS/JPS', '10011', '2000000000000', 'นาย', 'สงกราน', 'น้ำขึ้นน้ำลง', 45, 'ปู่/ตาของผู้ป่วย', '10000', 'a:8:{s:6:\"number\";s:2:\"10\";s:3:\"soi\";s:2:\"10\";s:6:\"street\";s:2:\"10\";s:3:\"moo\";s:2:\"10\";s:6:\"tambon\";s:2:\"10\";s:6:\"amphur\";s:2:\"10\";s:8:\"province\";s:2:\"10\";s:3:\"zip\";s:5:\"10000\";}', 'a:8:{s:6:\"number\";s:2:\"10\";s:3:\"soi\";s:2:\"10\";s:6:\"street\";s:2:\"10\";s:3:\"moo\";s:2:\"10\";s:6:\"tambon\";s:2:\"10\";s:6:\"amphur\";s:2:\"10\";s:8:\"province\";s:2:\"10\";s:3:\"zip\";s:5:\"10000\";}', '0000000000', '0000000000', '', 'N;', 'a:3:{s:7:\"educate\";s:0:\"\";s:10:\"assessment\";s:0:\"\";s:9:\"endoscope\";s:0:\"\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1505486684', '1506343168'),
(17, 2, 'คนไข้ CRC ส่งต่อ', 0, 'PJS/JPS', '10012', '3000000000000', 'นาง', 'ทับทิม', 'มันทุกเม็ด', 45, 'ย่า/ยายของผู้ป่วย', '10000', 'a:8:{s:6:\"number\";s:1:\"5\";s:3:\"soi\";s:1:\"5\";s:6:\"street\";s:1:\"5\";s:3:\"moo\";s:1:\"5\";s:6:\"tambon\";s:1:\"5\";s:6:\"amphur\";s:1:\"5\";s:8:\"province\";s:1:\"5\";s:3:\"zip\";s:5:\"55555\";}', 'a:8:{s:6:\"number\";s:1:\"5\";s:3:\"soi\";s:1:\"5\";s:6:\"street\";s:1:\"5\";s:3:\"moo\";s:1:\"5\";s:6:\"tambon\";s:1:\"5\";s:6:\"amphur\";s:1:\"5\";s:8:\"province\";s:1:\"5\";s:3:\"zip\";s:5:\"55555\";}', '0000000000', '0000000000', '', 'N;', 'a:3:{s:7:\"educate\";s:0:\"\";s:10:\"assessment\";s:0:\"\";s:9:\"endoscope\";s:0:\"\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1505639244', '1506343186'),
(18, 2, 'คนไข้ CRC ส่งต่อ', 0, 'HNPCC', '10014', '4000000000000', 'นางสาว', 'เอมี่', 'มาเลเรีย', 38, 'แม่ของผู้ป่วย', '10000', 'a:8:{s:6:\"number\";s:1:\"9\";s:3:\"soi\";s:1:\"9\";s:6:\"street\";s:1:\"9\";s:3:\"moo\";s:1:\"9\";s:6:\"tambon\";s:1:\"9\";s:6:\"amphur\";s:1:\"9\";s:8:\"province\";s:1:\"9\";s:3:\"zip\";s:5:\"99999\";}', 'a:8:{s:6:\"number\";s:1:\"9\";s:3:\"soi\";s:1:\"9\";s:6:\"street\";s:1:\"9\";s:3:\"moo\";s:1:\"9\";s:6:\"tambon\";s:1:\"9\";s:6:\"amphur\";s:1:\"9\";s:8:\"province\";s:1:\"9\";s:3:\"zip\";s:5:\"99999\";}', '9999999999', '9999999999', 'ประวัติ', 'N;', 'a:3:{s:7:\"educate\";s:0:\"\";s:10:\"assessment\";s:0:\"\";s:9:\"endoscope\";s:0:\"\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1506139384', '1506343201'),
(19, 2, 'คนไข้ออกหน่วย', 8, 'FAP', '10015', '5000000000000', 'นาง', 'ลำไย', 'ไหดำดำ', 60, 'คู่สมรสของผู้ป่วย', '10000', 'a:8:{s:6:\"number\";s:1:\"8\";s:3:\"soi\";s:1:\"8\";s:6:\"street\";s:1:\"8\";s:3:\"moo\";s:1:\"8\";s:6:\"tambon\";s:1:\"8\";s:6:\"amphur\";s:1:\"8\";s:8:\"province\";s:1:\"8\";s:3:\"zip\";s:5:\"88888\";}', 'a:8:{s:6:\"number\";s:1:\"8\";s:3:\"soi\";s:1:\"8\";s:6:\"street\";s:1:\"8\";s:3:\"moo\";s:1:\"8\";s:6:\"tambon\";s:1:\"8\";s:6:\"amphur\";s:1:\"8\";s:8:\"province\";s:1:\"8\";s:3:\"zip\";s:5:\"88888\";}', '8888888888', '8888888888', '', 'N;', 'a:3:{s:7:\"educate\";s:0:\"\";s:10:\"assessment\";s:0:\"\";s:9:\"endoscope\";s:0:\"\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1506171254', '1506343225'),
(20, 2, 'คนไข้ออกหน่วย', 9, 'PJS/JPS', '10019', '9000000000000', 'นาย', 'สิริยากร', 'พิฆเนศ', 19, 'พ่อของผู้ป่วย', '10000', 'a:8:{s:6:\"number\";s:1:\"9\";s:3:\"soi\";s:1:\"9\";s:6:\"street\";s:1:\"9\";s:3:\"moo\";s:1:\"9\";s:6:\"tambon\";s:1:\"9\";s:6:\"amphur\";s:1:\"9\";s:8:\"province\";s:1:\"9\";s:3:\"zip\";s:5:\"99999\";}', 'a:8:{s:6:\"number\";s:1:\"9\";s:3:\"soi\";s:1:\"9\";s:6:\"street\";s:1:\"9\";s:3:\"moo\";s:1:\"9\";s:6:\"tambon\";s:1:\"9\";s:6:\"amphur\";s:1:\"9\";s:8:\"province\";s:1:\"9\";s:3:\"zip\";s:5:\"99999\";}', '9999999999', '9999999999', '', 'N;', 'a:3:{s:7:\"educate\";s:0:\"\";s:10:\"assessment\";s:0:\"\";s:9:\"endoscope\";s:0:\"\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1506238394', '1506343243'),
(21, 2, 'กลุ่ม CRC of PSU', 0, 'HNPCC', '10091', '9100000000000', 'นาง', 'เจนี่', 'เทียนพรรษา', 50, 'บุตร/ธิดาของผู้ป่วย', '10000', 'a:8:{s:6:\"number\";s:2:\"91\";s:3:\"soi\";s:2:\"91\";s:6:\"street\";s:2:\"91\";s:3:\"moo\";s:2:\"91\";s:6:\"tambon\";s:3:\"919\";s:6:\"amphur\";s:2:\"19\";s:8:\"province\";s:2:\"91\";s:3:\"zip\";s:6:\"911111\";}', 'a:8:{s:6:\"number\";s:2:\"91\";s:3:\"soi\";s:2:\"91\";s:6:\"street\";s:2:\"91\";s:3:\"moo\";s:2:\"91\";s:6:\"tambon\";s:3:\"919\";s:6:\"amphur\";s:2:\"19\";s:8:\"province\";s:2:\"91\";s:3:\"zip\";s:6:\"911111\";}', '911111111', '9111111111', '', 'N;', 'a:3:{s:7:\"educate\";s:0:\"\";s:10:\"assessment\";s:0:\"\";s:9:\"endoscope\";s:0:\"\";}', '', '', 'a:6:{s:4:\"life\";s:0:\"\";s:4:\"cost\";s:0:\"\";s:8:\"service1\";s:0:\"\";s:8:\"service2\";s:0:\"\";s:4:\"fare\";s:0:\"\";s:3:\"etc\";s:0:\"\";}', '1506240207', '1506343274');

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `institution` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sample_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood` int(1) NOT NULL,
  `blood_ml` int(6) NOT NULL,
  `blood_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fresh_tissue` int(1) NOT NULL,
  `fresh_tissue_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fresh_tissue_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ffpe` int(1) NOT NULL,
  `ffpe_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fcc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fcc_group` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ihc` int(1) NOT NULL,
  `lab` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `process` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`id`, `patient_id`, `institution`, `department`, `sample_name`, `blood`, `blood_ml`, `blood_code`, `fresh_tissue`, `fresh_tissue_group`, `fresh_tissue_code`, `ffpe`, `ffpe_code`, `fcc`, `fcc_group`, `ihc`, `lab`, `process`, `status`, `remark`) VALUES
(1, 15, '', '', '', 1, 15, 'RR565', 1, 'NORMAL', 'RE655', 1, 'FF855', '1', 'HNPCC', 1, '', '', '', 'หมายเหตุ'),
(2, 0, 'ชื่อหน่วยงาน', 'แผนก', 'ชื่อตัวอย่าง', 1, 5, 'EE225', 0, '', '', 0, '', '1', 'FAP', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('26156ef9c132ae5d4a3b619b97f5bc40ae262667', '::1', 1506010949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363031303933343b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353035373338363238223b),
('54bce3dc513952f1b992efbeaf8f026c88e8e1dc', '::1', 1505738638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530353733383632333b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353035373237343030223b),
('5652bb86324f4786f513117e968ed871da3beac0', '::1', 1505731356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530353733313332353b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353035373038343638223b),
('8218bc231241115adc949ead7818d21e48393fb1', '::1', 1506151629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363135313631363b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036303536323439223b),
('96b13570a4cd11472427eb833a78a41d00b6d39a', '::1', 1505709110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530353730383832393b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353035363635303332223b),
('9bd147bb4df5435de5d57a04d796ea2376953850', '::1', 1506250975, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363235303835383b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036313731313932223b),
('a3d87bef18bb852997cad965313106491d051c4f', '::1', 1506324440, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363332343434303b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036323539323537223b),
('b29e12de83d03a83cd6989fd35151ce9a2d8bdf6', '::1', 1506171263, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363137313138373b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036313335383136223b),
('bd220ad4293a6cbbe7f0dc30720dd2d9db79249a', '::1', 1506346152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363334363131333b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036333136313935223b),
('e9925358d7972c77c667233875f0faee0a649021', '::1', 1506097559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363039373333323b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036303130393435223b),
('ea9aef517d2e52122b8334743322f616dba987c9', '::1', 1506267294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363236373233373b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353036323338333230223b),
('eed70cbee5678a50f36b81af66da84d496be1a9f', '::1', 1506238206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363233383230353b6d6573736167657c733a3132363a223c64697620636c6173733d22616c65727420616c6572742d64616e676572206e6f2d6d617267696e22207374796c653d226d617267696e2d626f74746f6d3a3135707821696d706f7274616e743b223e596f7520617265206e6f7420616c6c6f77656420746f2061636365737320746869732070616765213c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('f4272c88c952da21d2aba54a94b3767e1d972c68', '::1', 1505683350, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530353638333232313b6964656e746974797c733a31353a2261646d696e40656d61696c2e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353035363438353239223b);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `description`) VALUES
(2, 'image_max_size', '2000', 'Ukuran image dalam kb (kilo byte)'),
(3, 'file_max_size', '3000', 'Ukuran file maksimal dalam kb (kilobyte)'),
(4, 'file_type', 'doc|zip|pdf|xlsx|xls|ppt|docx|pptx', 'Tipe file yang di ijinkan untk di upload'),
(5, 'image_type', 'jpeg|jpg|png', 'Tipe image yang diperbolehkan untuk di upload'),
(7, 'main_office', 'Company Address', ''),
(8, 'site_title', 'CI-Blog', ''),
(9, 'language', 'thai', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '::1', 'special', '$2y$08$6PwzsRJmKgjTWuabxlyDCuQf.IvqLbkFNUBz57h.oncNIo1cIAaF.', NULL, 'special@email.com', NULL, NULL, NULL, 'Rq2em73n.znxBR8nb2.jse', 1496754920, 1502955048, 1, 'Cristiano', 'Ronaldo', 'SPECIAL', '0000000000'),
(2, '::1', 'admin', '$2y$08$uHhUqYzF9fSYhCRQBP8gRu8t0xGsD.JyP8fot8uFrzb8ddVU21xLG', NULL, 'admin@email.com', '8c56e53216f8e5288687c98a0f2aa8657dff6445', NULL, NULL, 'OcrjhG6DOUwD6dvHT1hfbe', 1496756561, 1506333824, 1, 'Zinedine', 'Zedane', 'ADMIN', '0000000000'),
(3, '::1', 'editor', '$2y$08$LVvHxFHDq9CmPzET1qzFfuPsoV7ZGwEOFvoWrTcPHPi7lDwo82yoK', NULL, 'editor@email.com', 'c959066d4bd6854f4602860b9fcdf7b3ae867f90', NULL, NULL, NULL, 1496756963, 1496756963, 1, 'Mario', 'Balotelli', 'EDITOR', '2222222222'),
(4, '::1', 'member', '$2y$08$BodKuh8mpB8w0XQS1aDMGeIxBbNXL62.XOPTJ8/QV1a1VBtczLEcC', NULL, 'member@email.com', NULL, NULL, NULL, NULL, 1496755255, 1496755255, 1, 'Lionel', 'Messi', 'MEMBER', '1111111111'),
(5, '::1', 'test2', '$2y$08$6sP89zcYR5n9wFEyJ4GvN.bZ6R4z9OIR0lxT/R4F1cgv2NebWhq6K', NULL, 'test2@email.com', '9d76a1cd334942c30b0483dcfa1897a9fdb8b600', NULL, NULL, NULL, 1505457609, 1505457609, 2, 'name2', 'surname2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 12, 2),
(6, 12, 0),
(7, 13, 3),
(8, 13, 0),
(11, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `timestamp` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `user_id`, `timestamp`, `message`, `type`) VALUES
(1, 2, 1505669441, 'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น', 'sample'),
(2, 2, 1505670290, 'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น', 'sample'),
(3, 2, 1505670567, 'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น', 'sample'),
(4, 2, 1505671258, 'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น', 'sample'),
(5, 2, 1505671270, 'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น', 'sample'),
(6, 2, 1505708468, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(7, 2, 1505727400, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(8, 2, 1505738628, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(9, 2, 1506010945, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(10, 2, 1506056249, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(11, 2, 1506085989, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(12, 2, 1506135816, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(13, 2, 1506139384, 'เพิ่มข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(14, 2, 1506139412, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(15, 2, 1506139445, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(16, 2, 1506139781, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(17, 2, 1506139792, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(18, 2, 1506139849, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(19, 2, 1506139859, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(20, 2, 1506140478, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(21, 2, 1506147840, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(22, 2, 1506147852, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(23, 2, 1506147859, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(24, 2, 1506147994, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(25, 2, 1506148002, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(26, 2, 1506171192, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(27, 2, 1506171254, 'เพิ่มข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(28, 2, 1506238320, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(29, 2, 1506238394, 'เพิ่มข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(30, 2, 1506240207, 'เพิ่มข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(31, 2, 1506259257, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(32, 2, 1506316195, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(33, 2, 1506333824, 'ล็อกอินเข้าสู่ระบบเสร็จสิ้น', 'login'),
(34, 2, 1506343168, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(35, 2, 1506343186, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(36, 2, 1506343201, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(37, 2, 1506343225, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(38, 2, 1506343243, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient'),
(39, 2, 1506343274, 'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_patients`
--
ALTER TABLE `assets_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `assets_patients`
--
ALTER TABLE `assets_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
