-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 02:53 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fanballc_fb88`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(4) NOT NULL,
  `logo` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `logo`, `text`, `url`) VALUES
(3, '20160726145303.jpg', '@abba3210', 'http://test'),
(4, '20160727135951.jpg', '@fakefake0002', 'http://fb.com'),
(5, '20160727140011.jpg', '0x0-888-xx00', ''),
(6, '20160727140224.jpg', 'email@email.com', 'http://xxx@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(4) NOT NULL,
  `admin_id` int(4) NOT NULL,
  `event_id` int(4) DEFAULT NULL,
  `user_product_id` int(5) NOT NULL,
  `user_bank_id` int(4) NOT NULL,
  `account_deposit` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `credit` int(10) NOT NULL,
  `method` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(4) NOT NULL,
  `promotion_id` int(4) NOT NULL,
  `picture` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `startdate` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `enddate` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `minimum` int(10) NOT NULL,
  `maximum` int(10) NOT NULL,
  `limits` int(5) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `promotion_id`, `picture`, `title`, `detail`, `startdate`, `enddate`, `minimum`, `maximum`, `limits`, `status`) VALUES
(13, 5, '20160905145504.jpg', 'สมัครสมาชิกใหม่ รับโบนัส 10%', '<h1>โปรโมชั่น สมัครสมาชิกใหม่ รับโบนัส 10%</h1>\r\n<ul class="right">ข้อกำหนดและเงื่อนไขกติกาและข้อตกลงการเข้าร่วมโปรโมชั่น</ul>\r\n<ul class="right">\r\n<ol>\r\n<li>ท่านต้องสมัครสมาชิกกับทางเรา ผ่านหน้าเว็บด้วยตัวท่านเอง</li>\r\n<li>ชื่อ-สกุลที่ใช้ลงทะเบียนสมัครสมาชิก จะต้องตรงกับชื่อบัญชีที่จะใช้สำหรับถอนเงินของท่าน</li>\r\n<li>ขั้นต่ำการสมัครสมาชิกครั้งแรกคือ 1,000 บาท และ ครั้งต่อไปไม่มีขั้นต่ำในการ ฝาก-ถอน</li>\r\n<li>สมัครสมาชิกสมัครใหม่ ต้องไม่มีข้อมูลซ้ำกับ ฐานข้อมูลเดิมของ fanball เช่น ชื่อ นามสกุล , ที่อยู่, อีเมล์, เบอร์โทรศัพท์, บัญชีธนาคารและ IP Address</li>\r\n<li>สมาชิกจะต้องมียอด Turn Over ฟุตบอลออนไลน์ ขั้นต่ำ 5 เท่าขึ้นไป Turn Over คาสิโนออนไลน์ ขั้นต่ำ 10 เท่าขึ้นไปจึงทำการถอนโบนัสได้ ( เอายอดเงินฝากและโบนัสรวมกัน )</li>\r\n<li>หากไม่มีรายการเล่นเกิน3-6เท่า(ยอดเทรินโอเวอร์) ของยอดฝากที่ได้รับโปรโมชั่นนี้ ย้อนหลังจากวันที่แจ้งถอน1อาทิตย์ ทางทีมงานขอตัดส่วนของเงินโปรโมชั่นออกถือว่าท่านไม่ได้สิทธิในโปรโมชั่นนี้</li>\r\n<li>หากทางเราตรวจสอบพบว่าสมาชิกทำผิดกฎหรือกระทำใดเพื่อต้องการเงินโบนัสโดยมิชอบ ทางเราขออนุญาติถอนเงินโบนัสออกโดยไม่ต้องแจ้งล่วงหน้า</li>\r\n<li>ขอสงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขต่าง ๆ โดยไม่ต้องแจ้งให้ทราบล่วงหน้า คำตัดสินของ fanball ถือเป็นการสิ้นสุดทุกกรณี</li>\r\n<li>fanball ถือว่าลูกค้าทุกท่านรับทราบข้อกำหนดนี้ และตกลงยอมรับข้อกำหนดตามกติกา และเงื่อนไขของการได้รับรางวัลแล้วทุกประการ</li>\r\n<li>โปรโมชั่นนี้รับสมาชิกใหม่เฉพาะวัน จันทร์-ศุกร์เท่านั้น</li>\r\n</ol>\r\n</ul>', '01/09/2016', '31/12/2016', 0, 0, 0, 0),
(14, 6, '20160905152605.jpg', 'ลูกค้าสมาชิกเก่า รับโบนัสพิเศษ ยอดแรกของวัน 5%', '<h1>โปรโมชั่นลูกค้าสมาชิกเก่า รับโบนัสพิเศษ ยอดแรกของวัน 5%</h1>\r\n<ul class="right">ข้อกำหนดและเงื่อนไขกติกาและข้อตกลงการเข้าร่วมโปรโมชั่น\r\n<ol>\r\n<li>ท่านต้องสมัครเป็นสมาชิกกับทาง fanball เท่านั้น</li>\r\n<li>ขั้นต่ำของการฝากเงินยอดแรกของวันคือ 1000 บาท เพื่อเข้าร่วมโปรโมชั่นนี้</li>\r\n<li>เวลาที่สามารถรับโบนัสได้ในแต่ละวัน คือ ฝาก ตั้งแต่ 9 โมงเช้าวันนี้ ถึง 9 โมงของวัดถัดไป</li>\r\n<li>สมาชิกจะต้องมียอด Turn Over ฟุตบอลออนไลน์ ขั้นต่ำ 3 เท่าขึ้นไป Turn Over คาสิโนออนไลน์ ขั้นต่ำ 6 เท่าขึ้นไปจึงทำการถอนโบนัสได้ ( เอายอดเงินฝากและโบนัสรวมกัน )</li>\r\n<li>รับโบนัสเพิ่ม ทุกวัน จันทร์ - ศุกร์ (5 วัน) โดยเพิ่มให้ทันที ที่ฝากเงินเข้ามายอดแรกของวัน</li>\r\n<li>หากไม่มีรายการเล่นเกิน3-6เท่า(ยอดเทรินโอเวอร์) ของยอดฝากที่ได้รับโปรโมชั่นนี้ ย้อนหลังจากวันที่แจ้งถอน1อาทิตย์ ทางทีมงานขอตัดส่วนของเงินโปรโมชั่นออกถือว่าท่านไม่ได้สิทธิในโปรโมชั่นนี้</li>\r\n<li>หากทางเราตรวจสอบพบว่าสมาชิกทำผิดกฎหรือกระทำใดเพื่อต้องการเงินโบนัสโดยมิชอบ ทางเราขออนุญาติถอนเงินโบนัสออกโดยไม่ต้องแจ้งล่วงหน้า</li>\r\n<li>ขอสงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขต่าง ๆ โดยไม่ต้องแจ้งให้ทราบล่วงหน้า คำตัดสินของ fanball ถือเป็นการสิ้นสุดทุกกรณี</li>\r\n<li>fanball ถือว่าลูกค้าทุกท่านรับทราบข้อกำหนดนี้ และตกลงยอมรับข้อกำหนดตามกติกา และเงื่อนไขของการได้รับรางวัลแล้วทุกประการ</li>\r\n</ol>\r\n</ul>', '01/09/2016', '31/12/2016', 0, 0, 0, 0),
(15, 7, '20160905152812.jpg', 'โปรโมชั่นเพื่อนแนะนำเพื่อนรับทันที 200 บาท ต่อ เพื่อน 1 คน', '<h1>โปรโมชั่นเพื่อนแนะนำเพื่อนรับทันที 200 บาท ต่อ เพื่อน 1 คน</h1>\r\n<ul class="right">\r\n<ul class="right">ข้อกำหนดและเงื่อนไขกติกาและข้อตกลงการเข้าร่วมโปรโมชั่น</ul>\r\n</ul>\r\n<p>เพื่อนแนะนำเพื่อนมาสมัครกับเรา fanball รับทันที่ 200 บาท ต่อ เพื่อน 1 คน เพียงให้คนสมัครแจ้ง user ของบุคคลที่แนะนำเข้ามา</p>\r\n<ul class="right">\r\n<ol>\r\n<li>ท่านสมาชิก 1 ท่าน แนะนำสมาชิกใหม่ได้ไม่จำกัดจำนวนคน</li>\r\n<li>เพื่อนของท่านสมาชิกจะต้องทำการเปิดบัญชีในครั้งแรก ไม่ต่ำกว่า 1,000 บาท ท่านสมาชิกถึงจะรับโปรโมชั่นนี้</li>\r\n<li>โบนัส ที่แนะนำ จะรับได้ในวันถัดไป</li>\r\n<li>โบนัส จะเติมเข้าเป็นเครดิต user ผู้แนะนำเท่านั้น</li>\r\n<li>เพือนที่แนะนำเข้ามา ต้องเล่นอย่างน้อย Turnover 1 เท่าของที่สมัครมา</li>\r\n<li>เพื่อนที่แนะนำเข้ามา ต้องไม่มีข้อมูลซ้ำกับ ฐานข้อมูลเดิมของ fanball เช่น ชื่อ นามสกุล , ที่อยู่, อีเมล์, เบอร์โทรศัพท์, บัญชีธนาคารและ IP Adress</li>\r\n<li>หากทางเราตรวจสอบพบว่าสมาชิกทำผิดกฎหรือกระทำใดเพื่อต้องการเงินโบนัสโดยมิชอบ ทางเราขออนุญาติถอนเงินโบนัสออกโดยไม่ต้องแจ้งล่วงหน้า</li>\r\n<li>fanball ถือว่าลูกค้าทุกท่านรับทราบข้อกำหนดนี้ และตกลงยอมรับข้อกำหนดตามกติกา และเงื่อนไขของการได้รับรางวัลแล้วทุกประการ&nbsp;</li>\r\n</ol>\r\n</ul>', '01/09/2016', '31/12/2016', 0, 0, 0, 0),
(16, 8, '20160905153114.jpg', 'แลกทิปๆ /แลกเงินเครดิตฟรีทุกเดือนไม่จำกัด', '<h1>โปรโมชั่นแลกทิปๆ /แลกเงินเครดิตฟรีทุกเดือนไม่จำกัด</h1>\r\n<p>&nbsp;</p>\r\n<ul class="right">\r\n<ul class="right">ข้อกำหนดและเงื่อนไขกติกาและข้อตกลงการเข้าร่วมโปรโมชั่น\r\n<ol>\r\n<li>ท่านสมาชิกต้องแจ้งชื่อรหัส และเว็บที่ท่านเล่น ในหน้าเว็บบอร์ดเพื่อยืนยันการรับสิทธิ์ เช่น ชื่อรหัส 23375 เล่น sbo ขอรับสิทธิ์ เป็นต้น</li>\r\n<li>เว็บที่ร่วมโปรโมชั่น ( sbo ibc 3m winning )</li>\r\n<li>ทาง fanball คิดให้เฉพาะ Sport Betting ให้เท่านั้น ไม่รวมการเล่น คาสิโน</li>\r\n<li>เริ่มสะสมแต้ม ประจำเดือน ตั้งแต่วันที่ 1 สิงหาคม 2559 จนถึง วันสิ้นเดือน 31 กรกฎาคม&nbsp;60</li>\r\n<li>แต้มจะเกิดขึ้นจากยอดเล่นทั้งบวก ลบ และ เสมอ เอาเฉพาะยอดเล่นอย่างเดียว มาเป็นแต้มสะสม</li>\r\n<li>สมาชิกสามารถติดต่อขอรับรางวัลในวันที่ 5 ของเดือนถัดไป</li>\r\n<li>จะต้องไม่มีฐานข้อมูลซ้ำกับ user ที่ทาง fanball มีอยู่แล้ว เช่น ชื่อ นามสกุล , ที่อยู่, อีเมล์, เบอร์โทรศัพท์, บัญชีธนาคารและ IP Address</li>\r\n<li>fanball ถือว่าลูกค้าทุกท่านรับทราบข้อกำหนดนี้ และตกลงยอมรับข้อกำหนดตามกติกา และเงื่อนไขของการได้รับรางวัลแล้วทุกประการ</li>\r\n</ol>\r\n</ul>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>แต้ม &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; แลก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เงินรางวัล</strong> <br />100,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;100 <br />1,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1,000 <br />2,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2,000 <br />3,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3,000 <br />4,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 4,000 <br />5,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 5,000 <br />6,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6,000 <br />7,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 7,000 <br />8,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 8,000 <br />9,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9,000 <br />10,000,000&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 10,000</p>', '01/09/2016', '30/09/2016', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_group`
--

CREATE TABLE `event_group` (
  `id` int(4) NOT NULL,
  `event_id` int(4) NOT NULL,
  `group_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_product`
--

CREATE TABLE `event_product` (
  `id` int(4) NOT NULL,
  `event_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_betting`
--

CREATE TABLE `game_betting` (
  `id` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `match_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `bet` enum('home','away','over','under') NOT NULL,
  `point` int(5) NOT NULL,
  `status` enum('complete','process','problem') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_betting`
--

INSERT INTO `game_betting` (`id`, `time`, `match_id`, `user_id`, `bet`, `point`, `status`) VALUES
(1, 1484795107, 36, 171, 'home', 50, 'complete'),
(2, 1484795187, 36, 171, 'over', 50, 'complete'),
(3, 1484795827, 36, 171, 'over', 50, 'complete'),
(4, 1484795920, 36, 171, 'over', 10, 'complete'),
(5, 1484795937, 36, 171, 'under', 10, 'complete'),
(6, 1484812915, 37, 171, 'home', 20, 'complete'),
(7, 1484812920, 37, 171, 'away', 10, 'complete'),
(8, 1484812939, 37, 172, 'home', 20, 'complete'),
(9, 1484812942, 37, 172, 'away', 20, 'complete'),
(10, 1484812946, 37, 172, 'under', 20, 'complete'),
(11, 1484884525, 42, 172, 'home', 100, 'complete'),
(12, 1484884535, 47, 172, 'home', 100, 'complete'),
(13, 1484884539, 38, 172, 'home', 100, 'complete'),
(14, 1484884542, 44, 172, 'home', 100, 'complete'),
(15, 1484884549, 42, 172, 'over', 100, 'complete'),
(16, 1484884552, 47, 172, 'over', 100, 'complete'),
(17, 1484894614, 42, 172, 'home', 10, 'complete'),
(18, 1484970574, 49, 172, 'home', 200, 'problem'),
(19, 1484970577, 49, 172, 'away', 200, 'process'),
(20, 1484970580, 49, 172, 'over', 200, 'process'),
(21, 1484970583, 49, 172, 'under', 200, 'process'),
(22, 1484970942, 49, 172, 'over', 500, 'process'),
(23, 1485136320, 57, 172, 'home', 10, 'process'),
(24, 1485136326, 57, 172, 'away', 10, 'process'),
(25, 1485136329, 57, 172, 'over', 500, 'process'),
(26, 1485136336, 57, 172, 'over', 500, 'process'),
(27, 1485136783, 57, 171, 'home', 100, 'process'),
(28, 1485136787, 57, 171, 'away', 100, 'process'),
(29, 1485136799, 57, 171, 'over', 300, 'process');

-- --------------------------------------------------------

--
-- Table structure for table `game_pay`
--

CREATE TABLE `game_pay` (
  `id` int(5) NOT NULL,
  `point` int(10) NOT NULL,
  `type` enum('admin','betting') NOT NULL,
  `user_id` int(5) NOT NULL,
  `betting_id` int(5) DEFAULT NULL,
  `time` int(10) NOT NULL,
  `admin_id` int(4) NOT NULL,
  `remark` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_pay`
--

INSERT INTO `game_pay` (`id`, `point`, `type`, `user_id`, `betting_id`, `time`, `admin_id`, `remark`) VALUES
(3, 500, 'admin', 171, NULL, 1484634280, 3, ''),
(58, 195, 'betting', 171, 9, 1484635729, 3, ''),
(59, 195, 'betting', 171, 13, 1484635729, 3, ''),
(60, 195, 'betting', 171, 8, 1484635729, 3, ''),
(62, 195, 'betting', 171, 7, 1484635729, 3, ''),
(63, 195, 'betting', 171, 11, 1484635729, 3, ''),
(64, 195, 'betting', 171, 4, 1484635729, 3, ''),
(65, 195, 'betting', 171, 5, 1484635729, 3, ''),
(66, 195, 'betting', 171, 2, 1484635729, 3, ''),
(67, 195, 'betting', 171, 3, 1484635729, 3, ''),
(75, 195, 'betting', 171, 12, 1484636061, 3, ''),
(82, 195, 'betting', 171, 1, 1484636061, 3, ''),
(83, 400, 'betting', 171, 10, 1484636197, 3, ''),
(84, 400, 'betting', 171, 14, 1484636197, 3, ''),
(85, 390, 'betting', 171, 15, 1484636855, 3, ''),
(86, 390, 'betting', 171, 16, 1484636855, 3, ''),
(87, 390, 'betting', 171, 17, 1484636855, 3, ''),
(88, 390, 'betting', 171, 18, 1484637977, 3, ''),
(89, 390, 'betting', 171, 19, 1484637977, 3, ''),
(90, 200, 'admin', 172, NULL, 1484791407, 3, ''),
(92, 0, 'betting', 171, 6, 1484884347, 3, ''),
(93, 0, 'betting', 171, 7, 1484884348, 3, ''),
(94, 0, 'betting', 172, 8, 1484884348, 3, ''),
(95, 0, 'betting', 172, 9, 1484884348, 3, ''),
(96, 0, 'betting', 172, 10, 1484884348, 3, ''),
(97, 0, 'betting', 171, 1, 1484884348, 3, ''),
(98, 0, 'betting', 171, 2, 1484884348, 3, ''),
(99, 0, 'betting', 171, 3, 1484884348, 3, ''),
(100, 0, 'betting', 171, 4, 1484884349, 3, ''),
(101, 0, 'betting', 171, 5, 1484884349, 3, ''),
(102, 500, 'admin', 172, NULL, 1484884424, 3, ''),
(103, 195, 'betting', 172, 12, 1484963048, 3, ''),
(104, 195, 'betting', 172, 16, 1484963048, 3, ''),
(105, 195, 'betting', 172, 14, 1484963048, 3, ''),
(106, 195, 'betting', 172, 11, 1484963048, 3, ''),
(107, 195, 'betting', 172, 15, 1484963048, 3, ''),
(108, 195, 'betting', 172, 17, 1484963048, 3, ''),
(109, 195, 'betting', 172, 13, 1484963048, 3, ''),
(114, 5000, 'admin', 172, NULL, 1485136287, 3, NULL),
(115, 500, 'admin', 171, NULL, 1485136292, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(4) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id` int(5) NOT NULL,
  `time` int(10) NOT NULL,
  `home` varchar(30) NOT NULL,
  `away` varchar(30) NOT NULL,
  `team` enum('home','away') NOT NULL,
  `hdp` float(4,2) NOT NULL,
  `hdp_home` float(4,2) NOT NULL,
  `hdp_away` float(4,2) NOT NULL,
  `ou` float(4,2) NOT NULL,
  `ou_over` float(4,2) NOT NULL,
  `ou_under` float(4,2) NOT NULL,
  `score_home` int(2) DEFAULT NULL,
  `score_away` int(2) DEFAULT NULL,
  `score_time` int(10) DEFAULT NULL,
  `status` enum('complete','process','problem') NOT NULL,
  `win_team` float(4,2) NOT NULL,
  `win_ou` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id`, `time`, `home`, `away`, `team`, `hdp`, `hdp_home`, `hdp_away`, `ou`, `ou_over`, `ou_under`, `score_home`, `score_away`, `score_time`, `status`, `win_team`, `win_ou`) VALUES
(1, 1483922100, 'แมนยู', 'เร้ดดิ้ง', 'home', 1.75, 0.95, -0.95, 3.00, 0.95, -0.95, 1, 1, 1483929885, 'complete', 0.00, 0.00),
(6, 1484397000, 'ท็อตแน่ม ฮ็อทสเปอร์', 'เวสต์บรอมวิช', 'home', 1.50, 0.95, -0.95, 3.00, 0.95, -0.95, 2, 0, 1484362304, 'complete', 0.00, 0.00),
(7, 1484406000, 'สวอนซี ซิตี้', 'อาร์เซน่อล', 'away', 1.00, -0.95, 0.95, 3.00, 0.95, -0.95, 1, 1, 1484362309, 'complete', 0.00, 0.00),
(8, 1484406000, 'เวสต์แฮมยูไนเต็ด', 'คริสตัลพาเลซ', 'home', 0.25, 0.95, 0.95, 2.50, 0.95, -0.95, 0, 0, 1484362314, 'complete', 0.00, 0.00),
(11, 1484406000, 'ซันเดอร์แลนด์', 'สโต๊ค ซิตี้', 'away', 0.25, 0.95, -0.95, 2.50, 0.95, 0.95, 2, 0, 1484365797, 'complete', 0.00, 0.00),
(12, 1484406000, 'ฮัลล์ ซิตี้', 'บอร์ดมัธ', 'away', 0.75, 0.95, -0.95, 2.50, 0.95, -0.95, 0, 1, 1484369859, 'complete', 0.00, 0.00),
(13, 1484595900, 'โตริโน่', 'เอซี มิลาน', 'home', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, 0, 0, 1484703428, 'complete', 0.00, 0.00),
(14, 1484595900, 'มาลาก้า', 'เรอัล โซเซียดาด', 'home', 0.25, 0.95, -0.95, 2.00, 0.95, -0.95, 0, 0, 1484703424, 'complete', 0.00, 0.00),
(15, 1484596800, 'บราก้า', 'ทอนเดล่า', 'home', 1.25, 0.95, -0.95, 3.00, 0.95, -0.95, 0, 0, 1484703422, 'complete', 0.00, 0.00),
(16, 1484668740, 'ออสมันริสปอร์', 'เบซิคตัส', 'home', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, 2, 0, 1484636136, 'complete', 0.00, 0.00),
(18, 1484768700, 'พลีมัธ', 'ลิเวอร์พูล', 'away', 1.75, 0.95, -0.95, 3.50, 0.95, -0.95, 0, 1, 1484790015, 'complete', 0.00, 0.00),
(19, 1484768700, 'นิวคาสเซิ่ล ยูไนเต็ด', 'เบอร์มิงแฮม', 'home', 1.00, 0.95, -0.95, 3.00, 0.95, -0.95, 3, 1, 1484789977, 'complete', 0.00, 0.00),
(20, 1484768700, 'เซาแธมป์ตัน', 'นอริช ซิตี้', 'home', 1.00, 0.95, -0.95, 3.00, 0.95, -0.95, 1, 0, 1484789964, 'complete', 0.00, 0.00),
(21, 1484766000, 'น็องต์', 'ก็อง', 'home', 0.50, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 0, 1484790020, 'complete', 0.00, 0.00),
(22, 1484763300, 'อัลคอลคอน', 'อลาเบส', 'home', 0.00, 0.95, -0.95, 2.50, 0.95, -0.95, 0, 2, 1484790025, 'complete', 0.00, 0.00),
(23, 1484770500, 'เรอัล มาดริด', 'เซลต้า บีโก้', 'home', 2.25, 0.95, -0.95, 3.50, 0.95, -0.95, 1, 2, 1484789958, 'complete', 0.00, 0.00),
(24, 1484744400, 'เจียนนิน่า', 'พานิโอนิออส', 'home', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 0, 1484790048, 'complete', 0.00, 0.00),
(25, 1484744400, 'อโตรมิตอส', 'เคอร์คีย์ร่า', 'home', 1.00, 0.95, -0.95, 3.00, 0.95, -0.95, 1, 4, 1484790054, 'complete', 0.00, 0.00),
(26, 1484748900, 'เวเรีย เอฟซี', 'ลาริซ่า', 'home', 0.00, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 1, 1484790059, 'complete', 0.00, 0.00),
(27, 1484752500, 'พาไนโทลิกอส', 'เออีเค เอเธนส์', 'away', 0.50, 0.95, -0.95, 3.00, 0.95, -0.95, 3, 2, 1484790070, 'complete', 0.00, 0.00),
(28, 1484849700, 'แอตติโก้ มาดริด', 'เออิบาร์', 'home', 1.50, 0.95, -0.95, 3.00, 0.95, -0.95, 3, 0, 1484876170, 'complete', 0.00, 0.00),
(29, 1483560900, 'เรอัล โซเซียดาด', 'บาร์เซโลน่า', 'away', 1.25, 0.95, -0.95, 3.00, 0.95, -0.95, 0, 1, 1484876258, 'complete', 0.00, 0.00),
(30, 1484856000, 'เอเอส โรม่า', 'ซามพ์โดเรีย', 'home', 1.25, 0.95, -0.95, 3.00, 0.95, -0.95, 4, 0, 1484876269, 'complete', 0.00, 0.00),
(31, 1484838900, 'พีเอโอเค ซาโลนิก้า', 'เลวาเดียกอส', 'home', 2.00, 0.95, -0.95, 3.50, 0.95, -0.95, 3, 0, 1484876278, 'complete', 0.00, 0.00),
(32, 1484847000, 'พานาธิไนกอส', 'พลาทานิแอส', 'home', 1.25, 0.95, -0.95, 2.50, 0.95, -0.95, 2, 1, 1484876285, 'complete', 0.00, 0.00),
(33, 1484863200, 'อุรุกวัย U20', 'เวเนซูเอล่า U20', 'home', 1.00, 0.95, -0.95, 3.00, 0.95, -0.95, 0, 0, 1484876297, 'complete', 0.00, 0.00),
(34, 1484871300, 'อาร์เจนตินา U20', 'เปรู U20', 'home', 1.50, 0.95, -0.95, 3.50, 0.95, -0.95, 2, 0, 1484962644, 'complete', 0.00, 0.00),
(35, 1484829000, 'ไซปรัส U19', 'เดนมาร์ค U19', 'home', 1.50, 0.95, -0.95, 3.50, 0.95, -0.95, 0, 6, 1484876304, 'complete', 0.00, 0.00),
(36, 1484812800, 'พม่า WN', 'ยูเครน W26', 'away', 1.50, 0.95, -0.95, 2.50, 0.95, -0.95, 0, 4, 1484876325, 'complete', 0.00, 0.00),
(37, 1484825700, 'จีน W', 'ไทย W30', 'home', 3.50, 0.95, -0.95, 5.00, 0.95, -0.95, 2, 0, 1484878366, 'complete', 0.00, 0.00),
(38, 1484940600, 'ไฟร์บวร์ก', 'บาเยิร์น มิวนิค', 'away', 1.75, 0.95, -0.95, 3.00, 0.95, -0.95, 1, 2, 1484962670, 'complete', 0.00, 0.00),
(39, 1484941500, 'ลาส พัลมาส', 'ลา คอรุนญ่า', 'home', 0.50, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 1, 1484962682, 'complete', 0.00, 0.00),
(40, 1484941500, 'บาสเตีย', 'นีซ', 'away', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 1, 1484962691, 'complete', 0.00, 0.00),
(41, 1484941500, 'ไบรท์ตัน', 'เชฟฟิลด์ เว้นส์เดย์', 'home', 0.50, 0.95, -0.95, 2.50, 0.95, -0.95, 2, 1, 1484962698, 'complete', 0.00, 0.00),
(42, 1484938800, 'เอฟซี ทเวนเต้', 'เฮราเคิ่ลส์ ฮัลมีโร่', 'home', 0.75, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 0, 1484962739, 'complete', 0.00, 0.00),
(43, 1484944200, 'ปากอส เดอ เฟอร์ไรร่า', 'โมไรเรนเซ่', 'home', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, 0, 2, 1484962704, 'complete', 0.00, 0.00),
(44, 1484940600, 'KAA เก้นท์', 'ชาเลอร์รัว', 'home', 1.00, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 0, 1484962720, 'complete', 0.00, 0.00),
(45, 1484941500, 'พอร์ทเวล', 'บิวรี่', 'home', 0.00, 0.95, -0.95, 2.00, 0.95, -0.95, 2, 2, 1484962726, 'complete', 0.00, 0.00),
(46, 1484941500, 'ลินคอล์น ซิตี้', 'โดเวอร์ แอทเลติก', 'home', 0.50, 0.95, -0.95, 2.50, 0.95, -0.95, 2, 0, 1484962733, 'complete', 0.00, 0.00),
(47, 1484938800, 'อฌักซิโอ้', 'โอร์แลงส์', 'home', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, 1, 0, 1484962714, 'complete', 0.00, 0.00),
(49, 1484971260, 'เจ้าบ้านทดสอบ', 'เยือนทดสอบ', 'home', 1.25, 0.95, -0.95, 2.75, 0.95, -0.95, 2, 2, 1484983440, 'complete', -1.25, -0.75),
(50, 1485201600, 'ชาเวซ', 'นาซิอองนาล', 'home', 0.75, 0.95, -0.95, 2.50, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(51, 1485190800, 'อลันยาสปอร์', 'เบซิคตัส', 'away', 1.25, 0.95, -0.95, 2.50, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(52, 1485192600, 'เจียนนิน่า', 'พีเอโอเค ซาโลนิก้า', 'away', 1.25, 0.95, -0.95, 3.00, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(53, 1485200700, 'จิลลิ่งแฮม', 'วิมเบิลตัน', 'home', 0.00, 0.95, -0.95, 3.00, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(54, 1485200700, 'แบรสต์', 'เรด สตาร์ 93', 'home', 1.00, 0.95, -0.95, 2.50, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(55, 1485199800, 'เปรูจา', 'เชเซน่า', 'home', 0.25, 0.95, -0.95, 2.50, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(56, 1485198000, 'อาแจกซ์(เยาวชน)', 'อัลเมเร่ ซิตี้', 'home', 0.50, 0.95, -0.95, 2.50, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00),
(57, 1485136800, 'เจ้าบ้านทดสอบ', 'เยือนทดสอบ', 'home', 1.75, 0.95, -0.95, 3.00, 0.95, -0.95, NULL, NULL, NULL, 'process', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `odds`
--

CREATE TABLE `odds` (
  `id` int(4) NOT NULL,
  `hdp` varchar(5) NOT NULL,
  `match_id` int(4) NOT NULL,
  `ou` varchar(5) NOT NULL,
  `team` enum('home','away') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odds`
--

INSERT INTO `odds` (`id`, `hdp`, `match_id`, `ou`, `team`) VALUES
(1, '0.50', 10, '4', 'home'),
(2, '5', 0, '10', 'away');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `logo` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `logo`, `name`, `detail`, `picture`, `category`, `status`) VALUES
(22, 'logo_20160826134302.jpg', 'SBOBET', 'เว็บไซด์พนันฟุตบอลยอดนิยมที่สุดในประเทศไทย', '20160826134302.jpg', 'sportbook', 1),
(23, 'logo_20160826141824.jpg', 'HOLIDAY PALACE CASINO', 'ศูนย์รวมคาสิโน', '20160826141824.jpg', 'casino', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_url`
--

CREATE TABLE `product_url` (
  `id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_url`
--

INSERT INTO `product_url` (`id`, `product_id`, `url`, `caption`) VALUES
(28, 22, 'http://www.beer777.com', 'อัพเดทล่าสุด'),
(29, 22, 'http://www.pic5678.com', 'อัพเดทล่าสุด');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(4) NOT NULL,
  `sort` int(2) NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(18) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `sort`, `name`, `detail`, `picture`) VALUES
(5, 1, 'โปรโมชั่น สมัครสมาชิกใหม่', '<p>สมัครวันนี้ เล่นฟรีตลอดไป</p>', '20160701104710.jpg'),
(6, 2, 'โปรโมชั่น ฝากเพิ่มทุกวัน', 'ฝากทุกวัน เงินเข้าทุกวัน', '20160702110022.jpg'),
(7, 3, 'โปรโมชั่น เพื่อนแนะนำเพื่อน', '<p>เพื่อนแนะนำเพื่อน</p>', '20160905152749.jpg'),
(8, 4, 'โปรโมชั่น แลกทิปแลกเครดิต', '<p>&nbsp;แลก</p>', '20160905153058.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('02bdf165b0be2a4a864bc71d8efc4c32a6aa72b5', '49.228.78.104', 1472107950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130373935303b),
('116007abb9bbfc3d4c85a916c9c6ac755ee3b0cb', '110.77.205.203', 1472113735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323131333530313b69647c733a313a2231223b706963747572657c733a393a2261646d696e2e6a7067223b757365726e616d657c733a353a2261646d696e223b66756c6c6e616d657c733a35383a22e0b884e0b8a3e0b8b4e0b8aae0b980e0b895e0b8b5e0b8a2e0b982e0b899e0b98820e0b982e0b8a3e0b899e0b8b1e0b8a5e0b982e0b894e0b989223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b70686f6e657c733a31303a2231313131313131313131223b637265617465647c733a31393a2231302f30362f323031362031303a30303a3030223b757064617465647c733a31393a2232332f30382f323031362030383a35323a3337223b6c6f676765647c733a31393a2232352f30382f323031362031313a34373a3438223b7374617475737c733a313a2231223b726f6c657c733a313a2231223b67726f75707c613a303a7b7d6c6f67696e7c623a313b61646d696e7c623a313b6e6f74696669636174696f6e7c733a383a227769746864726177223b5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d),
('16c4f07ad6a52072d8320d5001901f7c179b9a9d', '66.249.88.28', 1472100487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130303438373b),
('1bf39cf418fe7f41b0b9951d88ca582f7e63e24a', '110.77.205.203', 1472100691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130303639303b69647c733a313a2231223b706963747572657c733a393a2261646d696e2e6a7067223b757365726e616d657c733a353a2261646d696e223b66756c6c6e616d657c733a35383a22e0b884e0b8a3e0b8b4e0b8aae0b980e0b895e0b8b5e0b8a2e0b982e0b899e0b98820e0b982e0b8a3e0b899e0b8b1e0b8a5e0b982e0b894e0b989223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b70686f6e657c733a31303a2231313131313131313131223b637265617465647c733a31393a2231302f30362f323031362031303a30303a3030223b757064617465647c733a31393a2232332f30382f323031362030383a35323a3337223b6c6f676765647c733a31393a2232332f30382f323031362031303a31373a3131223b7374617475737c733a313a2231223b726f6c657c733a313a2231223b67726f75707c613a303a7b7d6c6f67696e7c623a313b61646d696e7c623a313b6e6f74696669636174696f6e7c733a383a227769746864726177223b5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226e6577223b7d),
('8d90a6a801d08887706976ef8f5dfd019ac4770b', '66.249.91.70', 1472100522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130303532323b),
('923d1b9cf16f0c06dcfbcef50af911c04e8cac12', '66.249.69.143', 1472102644, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130323634343b),
('93b7c6e39291d3872dd5a8aa3e1ee302ed4e4335', '110.77.205.203', 1472113011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323131323938393b69647c733a313a2231223b706963747572657c733a393a2261646d696e2e6a7067223b757365726e616d657c733a353a2261646d696e223b66756c6c6e616d657c733a35383a22e0b884e0b8a3e0b8b4e0b8aae0b980e0b895e0b8b5e0b8a2e0b982e0b899e0b98820e0b982e0b8a3e0b899e0b8b1e0b8a5e0b982e0b894e0b989223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b70686f6e657c733a31303a2231313131313131313131223b637265617465647c733a31393a2231302f30362f323031362031303a30303a3030223b757064617465647c733a31393a2232332f30382f323031362030383a35323a3337223b6c6f676765647c733a31393a2232352f30382f323031362031313a34373a3438223b7374617475737c733a313a2231223b726f6c657c733a313a2231223b67726f75707c613a303a7b7d6c6f67696e7c623a313b61646d696e7c623a313b6e6f74696669636174696f6e7c733a383a227769746864726177223b5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226e6577223b7d),
('9464f5e121da041c8ade82299bee1ed16cb0c0ee', '110.77.205.203', 1472100479, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130303138343b6c616e67756167657c733a373a22656e676c697368223b69647c733a313a2231223b706963747572657c733a393a2261646d696e2e6a7067223b757365726e616d657c733a353a2261646d696e223b66756c6c6e616d657c733a35383a22e0b884e0b8a3e0b8b4e0b8aae0b980e0b895e0b8b5e0b8a2e0b982e0b899e0b98820e0b982e0b8a3e0b899e0b8b1e0b8a5e0b982e0b894e0b989223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b70686f6e657c733a31303a2231313131313131313131223b637265617465647c733a31393a2231302f30362f323031362031303a30303a3030223b757064617465647c733a31393a2232332f30382f323031362030383a35323a3337223b6c6f676765647c733a31393a2232352f30382f323031362031313a34373a3238223b7374617475737c733a313a2231223b726f6c657c733a313a2231223b67726f75707c613a303a7b7d6c6f67696e7c623a313b61646d696e7c623a313b6e6f74696669636174696f6e7c733a383a227769746864726177223b5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226e6577223b7d),
('d46e52c28af3e90f6cf87a9cfbe5a77e6e16b44c', '110.77.205.203', 1472100484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130303336383b69647c733a313a2231223b706963747572657c733a393a2261646d696e2e6a7067223b757365726e616d657c733a353a2261646d696e223b66756c6c6e616d657c733a35383a22e0b884e0b8a3e0b8b4e0b8aae0b980e0b895e0b8b5e0b8a2e0b982e0b899e0b98820e0b982e0b8a3e0b899e0b8b1e0b8a5e0b982e0b894e0b989223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b70686f6e657c733a31303a2231313131313131313131223b637265617465647c733a31393a2231302f30362f323031362031303a30303a3030223b757064617465647c733a31393a2232332f30382f323031362030383a35323a3337223b6c6f676765647c733a31393a2232332f30382f323031362031303a31373a3131223b7374617475737c733a313a2231223b726f6c657c733a313a2231223b67726f75707c613a303a7b7d6c6f67696e7c623a313b61646d696e7c623a313b6e6f74696669636174696f6e7c733a383a227769746864726177223b5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226e6577223b7d),
('ddd8dbd657446c63090933755b532e658b17735b', '110.77.205.203', 1472100601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130303531343b6c616e67756167657c733a373a22656e676c697368223b69647c733a313a2231223b706963747572657c733a393a2261646d696e2e6a7067223b757365726e616d657c733a353a2261646d696e223b66756c6c6e616d657c733a35383a22e0b884e0b8a3e0b8b4e0b8aae0b980e0b895e0b8b5e0b8a2e0b982e0b899e0b98820e0b982e0b8a3e0b899e0b8b1e0b8a5e0b982e0b894e0b989223b656d61696c7c733a31353a2261646d696e40656d61696c2e636f6d223b70686f6e657c733a31303a2231313131313131313131223b637265617465647c733a31393a2231302f30362f323031362031303a30303a3030223b757064617465647c733a31393a2232332f30382f323031362030383a35323a3337223b6c6f676765647c733a31393a2232352f30382f323031362031313a34373a3238223b7374617475737c733a313a2231223b726f6c657c733a313a2231223b67726f75707c613a303a7b7d6c6f67696e7c623a313b61646d696e7c623a313b6e6f74696669636174696f6e7c733a383a227769746864726177223b5f5f63695f766172737c613a313a7b733a31323a226e6f74696669636174696f6e223b733a333a226e6577223b7d),
('f8f2d68ccb10aaa8d2fe48279d96f9377de0f42f', '107.167.113.42', 1472106596, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323130363539363b);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` tinytext NOT NULL,
  `sort` tinyint(2) NOT NULL,
  `created` varchar(19) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name`, `url`, `sort`, `created`) VALUES
(1, 'slide1', 'https://scontent-sit4-1.xx.fbcdn.net/t31.0-8/15304077_1864840627136498_4380983328537916434_o.jpg', 2, '01/12/2016 15:56:45'),
(2, 'slide2', 'https://scontent.fbkk10-1.fna.fbcdn.net/v/t31.0-8/15540971_1297305120344684_8373846746064159033_o.jpg?oh=5d18b55e08260ab10a34f6ce176e6105&oe=58EAEABF', 1, '15/12/2016 09:07:46'),
(3, 'slide3', 'https://scontent-sit4-1.xx.fbcdn.net/t31.0-8/15326090_1864846570469237_3290316529984728851_o.jpg', 3, '01/12/2016 15:57:47'),
(4, 'slide4', 'https://scontent-sit4-1.xx.fbcdn.net/t31.0-8/15259557_1864855287135032_6599659006157153440_o.jpg', 4, '01/12/2016 15:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `hash` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `security_question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `security_answer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `created_ip` int(10) UNSIGNED DEFAULT NULL,
  `updated` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `logged` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `logged_ip` int(10) UNSIGNED DEFAULT NULL,
  `status` int(1) NOT NULL,
  `online` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  `point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `hash`, `security_question`, `security_answer`, `username`, `password`, `fullname`, `picture`, `email`, `phone`, `created`, `created_ip`, `updated`, `logged`, `logged_ip`, `status`, `online`, `role`, `point`) VALUES
(1, 'superadm', '', '', 'admin', '$2y$12$3ba.caceCccqKtcQilaaRep5Nsnu3f9o57Rr1n0NQQ.q0e8dT1djm', 'คริสเตียโน่ โรนัลโด้', 'admin.jpg', 'admin@email.com', '1111111111', '10/06/2016 10:00:00', NULL, '23/08/2016 08:52:37', '13/12/2016 21:14:44', 3076116293, 1, 1, 1, 0),
(2, 'password', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'jojo', '$2y$12$zfz8VcqsHyyOI5dff6w92uQqgbQX4NlKqf4oD8jyeuQzG2goNInDi', 'เนย์มาร์ จูเนียร์', '18062016160920.jpg', 'neymar@email.com', '0000000000', '10/06/2016 10:00:00', NULL, '24/09/2016 11:17:21', '21/12/2016 08:33:45', 0, 1, 0, 1, 0),
(3, 'password', '', '', 'kang', '$2y$12$0KOHYZ8pevSOn39N6tSoLOG.8sGJABNGqMiCsa72kEQk8vYR3rF66', 'ลิโอเนล เมสซี่', '20160621162126.jpg', 'messi@email.com', '0000000000', '21/06/2016 16:21:26', NULL, '20/08/2016 11:33:26', '23/01/2017 09:00:17', 0, 1, 1, 1, 0),
(4, 'password', '', '', 'user3', '$2y$12$mfjr9fLQZ8..bpGBcmjVhuqGmT7et9MecrtK8v18llfWKJvZZunAW', 'แกเร็ธ เบลล์', '20160621162533.jpg', 'bale@email.com', '0000000000', '21/06/2016 16:25:33', NULL, '21/06/2016 16:57:17', '05/09/2016 11:40:25', 1999273866, 1, 0, 0, 0),
(5, 'password', '', '', 'user4', '$2y$12$punWnga0tk0H9u7a0m35.O7oRhiwegxS6QDDVvfX0rENJWFyhTbXi', 'ฟิลิปเป้ คูติณโญ่', '20160621162814.jpg', 'coutinho@email.com', '1111111111', '21/06/2016 16:28:15', NULL, '21/06/2016 17:00:13', '08/09/2016 12:33:07', 1999263367, 1, 0, 0, 0),
(8, '45674567', '', '', 'taksin', '$2y$12$qT7JXe6YXj.DIC61JvR3KeE0nRUgo7svE7zF5.2QgWyeSfGPO9y4O', 'taksin', '20160826133759.jpg', 'taksin168@gmail.com', '0899999999', '26/08/2016 13:37:59', 3076114783, '26/08/2016 13:37:59', '26/08/2016 13:48:15', 3076114783, 1, 0, 0, 0),
(9, 'aa123456', '', '', 'sunnuy26', '$2y$12$oQqOhwP0TJCIUUFaTO4tq.Z6xSZFihLKfMi/74fSwMmsfkEej4KuW', 'sunnuy26', '20160903015203.jpg', 'sunnuy26@hotmail.com', '0805399995', '03/09/2016 01:52:03', 3076116007, '03/09/2016 02:04:32', '03/09/2016 01:52:03', NULL, 1, 0, 0, 0),
(10, '12345678', '', '', 'sunnuy', '$2y$12$/YoyBb/8k7Qgu91XB7tOUeBTZ505MIAK2peEialAtS2wMVDbgDdeu', 'pongin', '20160903020910.jpg', 'mamyboss55@hotmail.com', '0815414123', '03/09/2016 02:09:10', 3076116007, '03/09/2016 02:09:10', '03/09/2016 23:25:54', 3031898691, 1, 1, 0, 0),
(11, '79447944', '', '', 'fire7944', '$2y$12$bnLVg3Xw7SGTwhlqv.Z3oOMr3ehz8ATjwYildEHKzaiOJiPbmIHlm', 'nopporn noowingse', '20160904211758.jpg', 'noppanunlasalla@gmail.com', '0817518536', '04/09/2016 21:17:58', 2875472369, '04/09/2016 21:17:58', '11/12/2016 08:47:11', 837083941, 1, 1, 0, 0),
(12, '17791779', '', '', 'ningbeer', '$2y$12$L8OvUc8NP/oAWI59GoHLueARBIklmgMZ64g.bk7Hb1shgPme8xSNO', 'อัมรินทร์ วงศ์เอกพันธ์', '20160905012248.jpg', 'beer2329@hotmail.com', '0898976497', '05/09/2016 01:22:48', 3068700467, '05/09/2016 01:22:48', '14/12/2016 08:46:06', 3068704981, 1, 1, 0, 0),
(13, '10891089', '', '', '51089', '$2y$12$MD5Notz9x.6yuZL4nyRqluqrfSRqISI6JcuaUFOaHT7I5wJRR4xsy', 'ชัยชนะ ลีลาวัฒนชัย', '20160905112955.jpg', 'beer2329_bu@hotmail.com', '0846713367', '05/09/2016 11:29:55', 3031920477, '05/09/2016 11:29:55', '11/12/2016 10:41:15', 248447016, 1, 1, 0, 0),
(14, '09977975', '', '', 'ลิงคัง', '$2y$12$YxfzxJhJukKDY9/KfUYI/.wHXNpSVyVhh6vRdThqyqfMl1HUqJ8iO', 'วิไลพร  กนกลัดดา', '20160905115021.jpg', 'wk_hades@msn.com', '0840108011', '05/09/2016 11:50:21', 1999273866, '05/09/2016 11:50:21', '08/09/2016 12:09:29', 1999263367, 1, 0, 0, 0),
(15, '30113011', '', '', '53011', '$2y$12$aX.0.m6gdc5qdawq2QO4HuPz0H1wRP4gOjmaenHGKH3aFUpqOU17S', 'กร สิงห์ธีร์', '20160905133613.jpg', 'korn@hotmail.com', '0949968210', '05/09/2016 13:36:13', 456591331, '05/09/2016 13:36:13', '15/12/2016 18:24:03', 3068680470, 1, 1, 0, 0),
(16, '30043004', '', '', '53004', '$2y$12$HocS0MU8RI9yUUx8muY8weIKt6ZMnJfPJqk6S4MTN00c0DHXeF1wG', 'นครินทรฺ รุ่มรวย', '20160905182434.jpg', 'big414@hotmail.com', '0948324151', '05/09/2016 18:24:34', 837105322, '05/09/2016 18:24:34', '11/12/2016 11:11:51', 3076086677, 1, 1, 0, 0),
(18, '12345678', '', '', 'kwankao', '$2y$12$WPD7CwithAB.MbrT0tvhieIO9hw.7eS2iy5lTcqvpO4vxKIZFAOKS', 'ภัชรพร', '20160906144311.jpg', 'platy_4@hotmail.com', '0897397455', '06/09/2016 14:43:11', 3031899024, '06/09/2016 14:43:11', '04/11/2016 09:41:44', 248456791, 1, 0, 0, 0),
(19, '12345678', '', '', 'fon', '$2y$12$nXe5AiHmtMhvsi8fYJ5Y7OTL4fPs.7szazViZfrLufzrQ3L/oX5dG', 'รุ่งนภา', '20160906144319.jpg', 'fonn.220@hotmail.com', '0836533332', '06/09/2016 14:43:19', 837102809, '06/09/2016 14:43:19', '21/09/2016 11:30:18', 3068688316, 1, 1, 0, 0),
(20, '02486002', '', '', 'leonadon', '$2y$12$cwNW2cTy6oCU/dRg0pri0ubUv6jP9hBfjcx8MB2NY8keEu1plZtqi', 'SP1WIN', '20160906150555.jpg', 'leonadonn@gmail.com', '0852088886', '06/09/2016 15:05:55', 1999262897, '10/09/2016 10:55:59', '19/10/2016 14:26:04', 2680223062, 1, 1, 1, 0),
(21, 'tae51826', '', '', '51826', '$2y$12$TdBmtwKMhQwhM90nINemtO3lX8hwRyLNh/..ZqmvvIr0G9ZXH7N4S', 'คงคุณ สมศรี', '20160906150949.jpg', 'ningbeer2329@hotmail.com', '0991780158', '06/09/2016 15:09:49', 2098827651, '06/09/2016 15:09:49', '11/12/2016 11:05:18', 3076012835, 1, 1, 0, 0),
(22, '42360917', '', '', 'aska004', '$2y$12$fTZ5ykOaDmwu0NHKD5VtjeOPVZqoa5gugaXMHQnKOef.K2z0.UBLC', 'ณัฐพงศ์ พระบาง', '20160906155611.jpg', 'mamos.mamoo@gmail.com', '0884040943', '06/09/2016 15:56:11', 16884669, '06/09/2016 15:56:11', '10/12/2016 18:12:25', 3754877505, 1, 1, 0, 0),
(23, 'qwe12345', '', '', 'withoon', '$2y$12$wESwqM6ygQC0vCCkq5Z0feZz6yu41q79ud9bifbKSpLbO0YxraZAi', 'วิฑูร แสงอรุณ', '20160906155731.jpg', 'wsn-ud@hotmail.com', '0953259870', '06/09/2016 15:57:31', 3742912804, '06/09/2016 15:57:31', '06/09/2016 15:57:53', 3742912804, 1, 1, 0, 0),
(24, 'eq111111', '', '', '51600', '$2y$12$FbqoTVLn1539j/TfMMj6F.z0Y.pYQS7xfjcfx5phigSUhBKRFV.pC', 'ธัญชนก บุษวงค์', '20160906161109.jpg', 'eqsang111@hotmail.co.th', '0881820042', '06/09/2016 16:11:09', 456607460, '06/09/2016 16:11:09', '21/09/2016 11:02:46', 3742902782, 1, 1, 0, 0),
(25, '17062528', '', '', 'kjta388268', '$2y$12$m12/knzSbt4ysXvq9A0uJefB2y.dySQCESUKbZZxDj1zIbov/5qjO', 'ณัฐยศ วรสารพิทักษ์', '20160906161516.jpg', 'worasanpitak@hotmail.com', '0805297078', '06/09/2016 16:15:16', 19852308, '06/09/2016 16:15:16', '01/11/2016 18:23:09', 19841901, 1, 1, 0, 0),
(26, 'ss123456', '', '', 'bkj3353095', '$2y$12$EpuQrlr9n8/NPCDhxug.d.qBpGAho/JSJTuDbHNLlo2Y8bu.sW7RK', 'ศุภชัย นันดา', '20160906165300.jpg', 'supachainanda@gmail.com', '0801880766', '06/09/2016 16:53:00', 837118988, '17/09/2016 16:37:41', '12/11/2016 18:36:39', 3068672132, 1, 1, 0, 0),
(27, '25151972', '', '', 'zbz3351467', '$2y$12$eBOQChHrH0UwE2An18/z6.Cr8qP59tjcpGkSOE69ZfM3GdkYOV5Q6', 'อัครเดช สิริวรรณเจริญ', '20160906170634.jpg', 'badboy2515@hotmail.com', '0875888878', '06/09/2016 17:06:34', 837090198, '06/09/2016 17:06:34', '11/12/2016 12:09:32', 3068688854, 1, 0, 0, 0),
(28, '44405563', '', '', 'themust', '$2y$12$bJyAwDToPjrIarY7mv0cxezOowJ0dBviK1tdsVIgSsu6tPXgL8.CS', 'สรวิทย์ เทพรัตน์', '20160906172303.jpg', 'themust14tc@gmail.com', '0630637319', '06/09/2016 17:23:03', 2001495376, '06/09/2016 17:23:03', '18/09/2016 11:43:21', 2001495248, 1, 1, 0, 0),
(29, '12345678', '', '', 'manit.chartchana', '$2y$12$gtE8H5D5bvnTU.osK1x.UOJhTbRrdnfjMoPBaCnmLPre.7R.Dh/.S', 'มานิต ชาติชนะ', '20160906200518.jpg', 'manit.chartchana@gmail.com', '0852397760', '06/09/2016 20:05:18', 1701637192, '06/09/2016 20:05:18', '14/12/2016 19:11:43', 1701634157, 1, 0, 0, 0),
(30, '11111111', '', '', 'mana', '$2y$12$4h4l3UfkqAvgBYP1sZZBqePTmSf7/S/Hw9.vvouJcZfQyMopoYLHS', 'มานะ คำคลัง', '20160906212353.jpg', 'mana_01@hotmail.co.th', '0826635563', '06/09/2016 21:23:53', 456612362, '06/09/2016 21:23:53', '04/12/2016 08:58:02', 3742906798, 1, 0, 0, 0),
(31, '22222222', '', '', 'แนน', '$2y$12$0ORC2p6YssQTIbyxPSwNnuVLfJercTDqUArpo6RHKCMCSxockO2Ka', 'ธัญพิชชา คำคลัง', '20160906221025.jpg', 'kumklang_01@hotmail.com', '0962179405', '06/09/2016 22:10:25', 837657707, '06/09/2016 22:10:25', '11/12/2016 12:26:21', 456596568, 1, 0, 0, 0),
(32, 'ja2519ja', '', '', 'ณัฐพงศ์ ปีติเปรมชัย', '$2y$12$x2VcF.46NFv3MdLMmfzeWeDSqfRQJGA0rxYNzNKKsDuEKAjiyn7YC', 'ณัฐพงศ์ ปีติเปรมชัย', '20160907022013.jpg', 'ja2519ja@hotmail.com', '0894494998', '07/09/2016 02:20:13', 1919765100, '07/09/2016 02:20:13', '11/12/2016 17:19:16', 1856590451, 1, 1, 0, 0),
(33, '15042530', '', '', 'โอ๊ด', '$2y$12$yNOtExZO325/DFq1xw8uk.Rs0meVFRrq6ReXFvT.JM7XlMC0XBKoq', 'วัชรินทร์ คชินทรโรจน์', '20160907104427.jpg', 'watcharin_2530@hotmail.com', '0874692683', '07/09/2016 10:44:27', 1899320732, '07/09/2016 10:44:27', '14/12/2016 09:12:21', 3056951569, 1, 1, 0, 0),
(34, '25301987', '', '', 'zbz3353499', '$2y$12$4iRRueRYyyKWJgHvXFfCVO5j0ft.J13cSMX33L6R6HH9J3V3Oze5m', 'วรวัฒน์  บัวช้าง', '20160907112037.jpg', 'oat_sfc@msn.com', '0941377223', '07/09/2016 11:20:37', 837669564, '07/09/2016 11:20:37', '07/09/2016 11:20:37', NULL, 1, 0, 0, 0),
(35, '25301987', '', '', 'zbz3353497', '$2y$12$kdG1tc7ww0hpvFsW1MLHg.FmV8/UcS/CxNjl4I7n5yXZBSQbohFTa', 'วรวัฒน์  บัวช้าง', '20160907120400.jpg', 'Oat_25301987@hotmail.com', '0941377223', '07/09/2016 12:04:00', 837669564, '07/09/2016 12:04:00', '11/12/2016 12:13:59', 3742922777, 1, 0, 0, 0),
(36, '12345678', '', '', 'puiuru', '$2y$12$ak6.ehRVfkVlFm5AcGi0Xe/DTIJtpmzOIQESEkQZWYT4b5.whIPP.', 'วอนบิน', '20160907123229.jpg', 'puipoko2218@gmail.com', '0869272195', '07/09/2016 12:32:29', 3754949047, '07/09/2016 12:32:29', '29/10/2016 16:35:50', 825272454, 1, 1, 0, 0),
(37, 'tos12345', '', '', 'kjta353512', '$2y$12$O5B.WjV2C68J.emN5XmRuO77K0LRYBxPG.YY.d8A2wOqX6P6Ltqry', 'Sorramit Srijoom ', '20160907130124.jpg', 'sorramit@gmail.com', '0830869279', '07/09/2016 13:01:24', 456632666, '07/09/2016 13:01:24', '10/09/2016 11:21:22', 3068693573, 1, 1, 0, 0),
(38, '54241112', '', '', 'kitirak', '$2y$12$FoTFfrTxdDWHg.zTx4wB/.XLQmblD/EVdAqXzSmMNiJf6qtZxnrGW', 'Kitirak soodwoon', '20160907132834.jpg', 'kitiraks@hotmail.com', '0817190969', '07/09/2016 13:28:34', 1991079603, '07/09/2016 13:28:34', '11/12/2016 06:48:53', 18124793, 1, 1, 0, 0),
(39, 'zooyork1', '', '', 'athiwat_w@hotmail.com', '$2y$12$ql6PIKdijEZ2BOmerigASu4hm6gKYzfmVG5CqAlsXBAciBgCF93Ue', 'อธิวัฒน์ วัฒนวิถี', '20160907133631.jpg', 'athiwat_w@hotmail.com', '0639689678', '07/09/2016 13:36:31', 456624873, '07/09/2016 13:36:31', '07/09/2016 13:36:31', NULL, 1, 0, 0, 0),
(40, 'thekop89', '', '', 'thekop99', '$2y$12$iwtUTiZbXHBxgaGZy0.Eb.R/qrKc3ew9xW1TvYclBsqbrI4xb0G12', 'วันเฉลิม สติใหม่', '20160907142228.jpg', 'job.thekop@hotmail.com', '0956340959', '07/09/2016 14:22:28', 3059598908, '07/09/2016 14:22:28', '15/10/2016 14:34:40', 973761998, 1, 1, 0, 0),
(41, 'kanan120', '', '', '7933', '$2y$12$EdeV6rf/SvcpOoowDWZil.sly0E61JViYLnv1UONkaAZ6LEwXLXBe', 'วาญุชา', '20160907143215.jpg', 'wayucha.san@hotmil.com', '0830608654', '07/09/2016 14:32:15', 3742917835, '07/09/2016 14:32:15', '14/12/2016 17:06:37', 3742902577, 1, 1, 0, 0),
(42, 'qwer1942', '', '', 'tarop1985', '$2y$12$3zTvTuMaF1WmPu0.GuVQZuvt37XAn9RiYF8WhXULhQvvshs5FxVAm', 'ไมตรี ศรีเอี่ยมกูล', '20160907162503.jpg', 'tarop1942@gmail.com', '0967845700', '07/09/2016 16:25:03', 2098827952, '07/09/2016 16:25:03', '07/09/2016 16:25:24', 2098827953, 1, 1, 0, 0),
(43, '12345678', '', '', 'puchong.a', '$2y$12$xOwuVzw6J1NfTjo4brxEdu7BIKen1D1RJUMCC0BfIKQ5bmZkcs8km', 'ภุชงศ์ กุมานนท์', '20160907173041.jpg', 'puchong.a@hotmail.com', '0891889281', '07/09/2016 17:30:41', 2875392895, '07/09/2016 17:30:41', '14/12/2016 19:53:11', 2875392632, 1, 0, 0, 0),
(44, '123456zz', '', '', 'testfb88', '$2y$12$Y6R/i4VAYztWixS5fe17F.o28NGT8dzDWzsP6cGlik0u/cYqQHXna', 'testfb88', '20160907200531.jpg', 'fanball88.manus@gmail.com', '0123456780', '07/09/2016 20:05:31', 248456622, '07/09/2016 20:05:31', '07/09/2016 20:05:31', NULL, 1, 0, 0, 0),
(45, '123456zz', '', '', 'testfb8801', '$2y$12$DcAW.tH4gdwzU8dJuLaKfe9JylhFDMx3a5DGbclr8/0M3NDp9/E1S', 'testfb8801', '20160907201115.jpg', 'testfb8801@gmail.com', '1234567890', '07/09/2016 20:11:15', 248456622, '07/09/2016 20:11:15', '07/09/2016 20:11:15', NULL, 1, 0, 0, 0),
(46, '12345678', '', '', 'test888', '$2y$12$juVF3RRKTrPdLUBY9xkLaua2D9QICDoVc1q6gXUCBLHoOLR07O1F6', 'test888', '20160907201415.jpg', 'test888@gmail.com', '0123456789', '07/09/2016 20:14:15', 248456622, '07/09/2016 20:14:15', '07/09/2016 20:14:33', 248456622, 1, 0, 0, 0),
(47, 'aa100100', '', '', 'fanball8881', '$2y$12$72dAq28i7BxrUVOi2nfuE.AsjT7vZeMUZ6S3zJZCiHyr7mh1obU9i', 'fanball8881', '20160907201845.jpg', 'test8881@gmail.com', '0123456789', '07/09/2016 20:18:45', 248456622, '07/09/2016 20:18:45', '07/09/2016 20:18:45', NULL, 1, 0, 0, 0),
(48, 'aa100100', '', '', 'abc123', '$2y$12$ThHnvrk4O6FLxOmk4cGpDOcMTCQ/AVKYuqPKp.qyFWcP0A1G9X1rC', 'abcdef', '20160907202251.jpg', 'abc@hotmail.com', '0812345678', '07/09/2016 20:22:51', 248456622, '07/09/2016 20:22:51', '07/09/2016 20:23:11', 248456622, 1, 0, 0, 0),
(49, 'aa100100', '', '', 'abcd1234', '$2y$12$gUpiswj8robRimneg6GaHeNfHXiGcviJf83RzxT.1L5VC6IK6g1ey', 'abcdefg', '20160907202519.jpg', 'abcdefg@hotmail.com', '0812345678', '07/09/2016 20:25:19', 248456622, '07/09/2016 20:25:19', '10/09/2016 10:37:35', 1850599136, 1, 0, 0, 0),
(50, 'a035707a', '', '', 'traderrice', '$2y$12$x/0KrZiSbg3P8iNQTL0u0efih0Z7yxipzynOo3c7sm/AqOhiYqmfO', 'จักรี  กิ่งมาลา', '20160907212639.jpg', 'jkingmala@gmail.com', '0857795172', '07/09/2016 21:26:39', 825357815, '07/09/2016 21:26:39', '02/10/2016 07:25:41', 825354691, 1, 1, 0, 0),
(51, 'chanthit', '', '', 'asisza', '$2y$12$jOT67V4toGdlm6iUwp/Bje46O/kCqo64GaKtctb3U5aQCI6X32t5e', 'หนุ่ม', '20160907220147.jpg', 'scoundrel_online@hotmail.com', '0988892942', '07/09/2016 22:01:47', 3754706470, '07/09/2016 22:01:47', '07/09/2016 22:01:47', NULL, 1, 0, 0, 0),
(52, 'neymar11', '', '', 'neymar111', '$2y$12$Yv9dyA1Ooo2.NdDL1CR/rOYsC18qrSnK5KAVP2.Xxdd7EO6Gt6KZC', 'อภิชาติ ประวงษ์', '20160907225700.jpg', 'neymar111@hotmail.com', '0875412947', '07/09/2016 22:57:00', 1856505506, '07/09/2016 22:57:00', '09/11/2016 18:54:51', 3400565873, 1, 0, 0, 0),
(53, '21441660', '', '', 'golf2144', '$2y$12$b..xfXDXS/kMULWCX5ZOwe/C6ER0.xhpHWTYnMp4oV7o.VjyFcUUG', 'อุเทน  ช้างทอง', '20160908071315.jpg', 'lumpongza2144@gmail.com', '0947355832', '08/09/2016 07:13:15', 3754948577, '08/09/2016 07:13:15', '08/09/2016 07:14:01', 3754948577, 1, 0, 0, 0),
(54, 'pawit555', '', '', 'witnaja', '$2y$12$0CgSh6i1sWDuhbZADjtqAu6pFw/1EaJnjkwa3PybN1cOR1R7zEnTy', 'ประวิตร สมบูรณ์', '20160908094922.jpg', 'pawitsomboon1234@gmail.com', '0940982236', '08/09/2016 09:49:22', 3742906534, '08/09/2016 09:49:22', '08/09/2016 09:49:53', 3742906534, 1, 1, 0, 0),
(55, 'aa159159', '', '', '53288', '$2y$12$HZ.9v/Y5t5x/YgaV812M8e/XVrLyNyWLJEdQcxRBfd7G/6Mt2NpIC', 'ธันวา ภาษีทวีเกียรติ ', '20160908101301.jpg', 'tanwa_58@hotmail.com', '0803877217', '08/09/2016 10:13:01', 3031899024, '08/09/2016 10:13:01', '15/12/2016 20:27:00', 3031898737, 1, 1, 0, 0),
(56, 'p3353256', '', '', 'pongpatcrazy', '$2y$12$aPMrzSAjkCnGozVTkyOLDOUnA3MZWDLXwoi6SCv0xFv26R4tf.NB6', 'pongpat donpradis', '20160908110635.jpg', 'pongpadsoda@hotmail.com', '0854655608', '08/09/2016 11:06:35', 3068677206, '08/09/2016 11:06:35', '04/12/2016 12:51:44', 1850653607, 1, 1, 0, 0),
(57, '29022519', '', '', 'torres', '$2y$12$1E5mL77nTz032igZmVTCFeHxeTGzXaiINCY8vk79rAmSggG0unp.O', 'รัตนพล      จันทรุสอน', '20160908112609.jpg', 'owenliverpool@outlook.co.th', '0895820102', '08/09/2016 11:26:09', 973742850, '08/09/2016 11:26:09', '10/12/2016 10:22:27', 973742850, 1, 1, 0, 0),
(58, 'jack8437', '', '', 'zbz3350688', '$2y$12$iOpN0OF2FjTU22MSF07ZduodKNUxH9xLRm6CffukwyH9QPB.nUdcG', 'เเจ็ค', '20160908123122.jpg', 'ku_jack@hotmail.com', '0815817536', '08/09/2016 12:31:22', 2875453501, '08/09/2016 12:31:22', '14/12/2016 11:54:20', 462542111, 1, 1, 0, 0),
(59, 'aa349114', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟ้า', 'manutded', '$2y$12$isTpBzmVZeMdoN1s1LAlxuUQz7jjCEm1SdJhmg64Sk874SeYXJz3e', 'manutded', '20160908145617.jpg', 'manutded@gmail.com', '0888888888', '08/09/2016 14:56:17', 1999263367, '08/09/2016 15:05:26', '17/09/2016 08:44:59', 1850650592, 1, 1, 0, 0),
(60, '13055016', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', '7455', '$2y$12$ZBKBuQZtzfBIhtKcQ0rOeOjMvjIlXTD5fo519v.a6RdsZNomF8ARe', 'ทวีศักดิ์', '20160908150232.jpg', 'taweesak2030@gmail.com', '0909876678', '08/09/2016 15:02:32', 2098828716, '08/09/2016 15:02:32', '12/12/2016 03:50:29', 3742919117, 1, 1, 0, 0),
(61, '01608282', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'phetai', '$2y$12$APZ0t6Rem0iPNOQxpAa/oesHv6fJS7DVuHG4.SDiDqzoSZ8g9s//.', 'เพทาย ศรีไตรรัตน์', '20160908150604.jpg', 'phetais@hotmail.com', '0888355332', '08/09/2016 15:06:04', 3068679899, '08/09/2016 15:06:04', '15/12/2016 23:11:36', 973669551, 1, 1, 0, 0),
(62, 'tom23092', 'ชื่อประเทศที่ชื่นชอบมากที่สุด', 'สเปน', 'rontachai', '$2y$12$f266ln88Hdqo7gSJ0DhI/.vohAhuhBTBeORRET3v/W/RW5w12gI.y', 'รณธชัย  อัดโดดดร', '20160908154235.jpg', 'tom--it@hotmail.com', '0883107464', '08/09/2016 15:42:35', 3742908592, '08/09/2016 15:42:35', '08/09/2016 15:43:03', 3742908592, 1, 1, 0, 0),
(63, 'bb123456', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', 'zbz3351449', '$2y$12$TzDHzUR3UOQS6coQ.cV3ve7GgrXnSm6HDKpl33NtF4lzLNeipbnpe', 'อุดร  ศรีกระแจะ', '20160908154438.jpg', 'Grabbikeudorn@mail.com', '0986654482', '08/09/2016 15:44:38', 3068705646, '08/09/2016 15:44:38', '11/12/2016 20:13:50', 3742899860, 1, 1, 0, 0),
(64, '12312312', 'สถานที่ท่องเที่ยวที่ชื่นชอบมากที่สุด', 'ภูเก็ต', 'tanet123', '$2y$12$ep.8WpSi4W6YOYijOQCYx.b8v2KzV7ieBIdaB7TBva6vMAGYzx2PS', 'ธเนศ ลาโหยด', '20160908163822.jpg', 'tanet123@gmail.com', '0847487585', '08/09/2016 16:38:22', 1935112610, '08/09/2016 16:38:22', '11/12/2016 15:31:33', 1935115322, 1, 0, 0, 0),
(65, 'joke2718', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'jokery2718', '$2y$12$x5mFEEEhs.bmYDD05q.IJuNZ69QQTQGfo5wzOb1CetIVGtiIzcWD.', 'คฑายุทธ์  วิบูลย์ธนภัณฑ์', '20160908200726.jpg', 'jokecherry@hotmail.com', '0949616635', '08/09/2016 20:07:26', 462498554, '08/09/2016 20:07:26', '11/12/2016 11:51:50', 462498781, 1, 1, 0, 0),
(66, 'taey5548', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'sahchai061905', '$2y$12$ixDywO5kSL3vaQynVBjxue2tOKdnb0snCjZuRPoX7Yujh3c5tJ052', 'สหชัย สุวรรณภูมิ', '20160909002314.jpg', 'taeysmilez03@gmail.com', '0615915486', '09/09/2016 00:23:14', 3068680263, '09/09/2016 00:23:14', '09/09/2016 00:23:34', 3068680263, 1, 1, 0, 0),
(67, '12345678', 'สถานที่ท่องเที่ยวที่ชื่นชอบมากที่สุด', 'หนองบัวระเหว', 'david.chartchana', '$2y$12$2O0X2REEoz0XqkPoVrrUPOGvG3piLqB6Su6./3Ju7AdHfltxU5E1e', 'เดวิตท์ ชาติชนะ', '20160909055040.jpg', 'david.chartchana@gmail.com', '0811674170', '09/09/2016 05:50:40', 2875256919, '09/09/2016 05:50:40', '11/12/2016 03:05:16', 2088419941, 1, 0, 0, 0),
(68, 'surakitn', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'pewnarok', '$2y$12$l0WyuU3c0B6BaWPW5/yPmelRlvXE.0F.xQMFzN4lhbAKf70BbT5Ce', 'สุรกิจ นามรัตน์', '20160909100107.jpg', 'pewnarok@hotmail.com', '0899223107', '09/09/2016 10:01:07', 2056988373, '09/09/2016 10:01:07', '14/12/2016 14:53:41', 2056990076, 1, 1, 0, 0),
(69, '13042523', 'กีฬาที่ชื่นชอบมากที่สุด', 'เปตอง', 'kaka41', '$2y$12$GGutnojgInZB4HESfBuXSe2q4wjpLotN9yOqFw/zBnaujVv4JZ73O', 'สงกรานต์  จันทรุสอน', '20160909103659.jpg', 'songkran.navy41@gmail.com', '0943017480', '09/09/2016 10:36:59', 1850590985, '09/09/2016 10:36:59', '14/12/2016 16:17:01', 19868631, 1, 1, 0, 0),
(70, 'forevers', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'framelaw3', '$2y$12$Bc1FNq5OQH6j4qb//lVh.eFFygsbMxk75B13yLEJwZipz9X9D2eYe', 'เจษฎาพร โพธิ์กิ่ง', '20160909111036.jpg', 'framezajing@gmail.com', '0894387270', '09/09/2016 11:10:36', 2875447325, '09/09/2016 11:10:36', '09/09/2016 11:10:56', 2875447325, 1, 0, 0, 0),
(71, '21112521', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'taonavy40', '$2y$12$Nn0tzeKchK1KEJho30tCF.Obes0HtJCGhGg4EgbIVBSrL03G9Dn3K', 'สมชาย  โพธิ์เกษม', '20160909111756.jpg', 'taonavy40@hotmail.com', '0860034125', '09/09/2016 11:17:56', 1991037379, '09/09/2016 11:17:56', '09/09/2016 11:18:18', 1991037379, 1, 1, 0, 0),
(72, 'jamejame', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', '51905', '$2y$12$odPjKb.wgI.B2ZVRJQ1U7uSkXjz.xiG0WptLK15iEzxEnz2bexbX6', 'กฤตนันท์ โชติเล็กธนา', '20160909112750.jpg', 'kitti2329@hotmail.com', '0949136836', '09/09/2016 11:27:50', 2098842681, '09/09/2016 11:27:50', '14/12/2016 10:57:38', 2098842902, 1, 1, 0, 0),
(73, '49999994', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'poopringam', '$2y$12$VuBFbKqythxr1NSHjMX/nOtNsOg3Rv2TkI4Ao2NAMO1t90lTN2fsW', 'ประวิท อินทะวงศ์', '20160909150117.jpg', 'sompong02@gmail.com', '0899428833', '09/09/2016 15:01:17', 17082239, '09/09/2016 15:01:17', '14/12/2016 14:01:33', 17083684, 1, 1, 0, 0),
(74, '25281985', 'ชื่อประเทศที่ชื่นชอบมากที่สุด', 'ไทย', 'zbz3353061', '$2y$12$yfdo9D9pUq2ok2/4Lk0Sxu/BLeHHws6e4E5zzIwVAZhtWbos7v2Zq', 'นันลิกา ฉายแก้วมณี', '20160909162432.jpg', 'Pal25281985@gmail.com', '0875396888', '09/09/2016 16:24:32', 3742921842, '09/09/2016 16:24:32', '11/12/2016 12:16:58', 456589458, 1, 0, 0, 0),
(75, '25201977', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'ชลบุรี', 'zbz3353599', '$2y$12$aeF088.S5XgYswWUxrJZIOIF3Mb/5TrfmN5bToYp20o5a2baWrpa2', 'ประหยัด สิริวรรณเจริญ', '20160909164405.jpg', 'yenyen25201977@gmail.com', '0828032244', '09/09/2016 16:44:05', 837214077, '09/09/2016 16:44:05', '11/12/2016 11:28:00', 3068687025, 1, 0, 0, 0),
(76, '99999999', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'jeudrum', '$2y$12$M/SOJD1Zb5zKnNJM5s7pMesJycdi2Ewv.Def5DNnK3VBaFDlLmoUC', 'ศุภมงคล หิรัญศรีสุข', '20160909173517.jpg', 'jeudrum21@gmail.com', '0837743111', '09/09/2016 17:35:17', 3742917601, '09/09/2016 17:35:17', '11/12/2016 17:25:43', 2098831887, 1, 1, 0, 0),
(77, '19381938', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', '51938', '$2y$12$ZhYhEnji1kzNdCvYwWdlpOCHCdLgZZdin/zOtAC/vT6bp0unc1NRS', 'รัตนา ประทุมสูตร', '20160909211203.jpg', 'na0101@hotmail.com', '0804356693', '09/09/2016 21:12:03', 3031905297, '09/09/2016 21:12:03', '14/12/2016 18:13:02', 3076034315, 1, 1, 0, 0),
(78, 't9653290', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'sonteen', '$2y$12$ZBfrV9lf1GEjQu6U6jWvFeqDduhpMlHPL5AmyKIPQfrUGguikX2wy', 'อนุสนธิ์ หัสดินทร ณ อยุธยา', '20160909230828.jpg', 'sonteennaa@hotmail.com', '0865207795', '09/09/2016 23:08:28', 2875239414, '09/09/2016 23:08:28', '11/12/2016 08:24:16', 3742907542, 1, 1, 0, 0),
(79, 'Aa123456', 'กีฬาที่ชื่นชอบมากที่สุด', 'swim', 'zxc123', '$2y$12$76OztH4k52z8Dx8WEHkvB.OjclqQmDQn93PdJ7h.asyTrYgPXv2UC', 'hana', '20160909235413.jpg', 'hana@hotmail.com', '0812345678', '09/09/2016 23:54:13', 248456622, '09/09/2016 23:56:46', '09/09/2016 23:54:13', NULL, 1, 0, 0, 0),
(80, 'st252025', 'กีฬาที่ชื่นชอบมากที่สุด', 'soccer', 'billty', '$2y$12$HwH9jzryrnonIusZfMIkEecLkT0UQyfg80eYAkCIFobzB2C..bNFm', 'bill', '20160909235847.jpg', 'bill123456@hotmail.com', '0810000000', '09/09/2016 23:58:47', 1728963662, '09/09/2016 23:58:47', '18/09/2016 17:42:16', 1728963662, 1, 1, 0, 0),
(81, 'aa100100', 'กีฬาที่ชื่นชอบมากที่สุด', 'swim', 'abc.123', '$2y$12$Cyk/Yx6KzjnYl.E.V0d8JusIo0Ywl319I9ILvejVbi38jdy5N/7Cm', 'abcdef', '20160910000027.jpg', 'abcdef@hotmail.com', '0812345678', '10/09/2016 00:00:27', 248456622, '10/09/2016 00:00:27', '10/09/2016 00:01:27', 248456622, 1, 0, 0, 0),
(82, 'aa100100', 'กีฬาที่ชื่นชอบมากที่สุด', 'swim', 'abcd.1234', '$2y$12$HeLcl9sdPpxUnKrMRVL2VeVnICUQ.9cBPuaHpK7txOn8BjpuicaS2', 'abcd', '20160910000632.jpg', 'abcd@hotmail.com', '0812345678', '10/09/2016 00:06:32', 248456622, '10/09/2016 00:06:32', '10/09/2016 00:06:59', 248456622, 1, 0, 0, 0),
(83, 'aa100100', 'กีฬาที่ชื่นชอบมากที่สุด', 'abcdef', 'testfb123', '$2y$12$9dHkQeea6bZic5UPrK7jNevg8rCGKL6TcdWOn1NKREJK88y/1/n.W', 'testfb123', '20160910001028.jpg', 'testfb123@gmail.com', '0123456789', '10/09/2016 00:10:28', 248456622, '10/09/2016 00:10:28', '10/09/2016 00:11:41', 248456622, 1, 1, 0, 0),
(84, '24101983', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'แมนยู', 'kobchai', '$2y$12$/.n5uxRkSa8z8EyBKGc0FOsrPmHgJlb/MDPTkXW5eV5aikmeaLQzm', 'กอบชัย คชินทรโรจน์', '20160910032420.jpg', 'k.kobchai@hotmail.co.th', '0972371876', '10/09/2016 03:24:20', 3742919597, '24/09/2016 09:39:06', '11/12/2016 15:33:03', 456607253, 1, 1, 0, 0),
(85, '55555555', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'pongpipat555', '$2y$12$NinoB3n1FAmw/FW6AbxBae3Z1yYNuTadam0BcRsFqb5Mw2Z3t465m', 'พงศ์พิพัฒน์ ปัณ', '20160910040748.jpg', 'pongpipat555@hotmail.com', '0820935557', '10/09/2016 04:07:48', 456641856, '10/09/2016 04:07:48', '14/12/2016 02:59:22', 456598729, 1, 0, 0, 0),
(86, '87654321', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', '50488', '$2y$12$QeM/x0QMR/xscZQJCWKxQOe30kmi6cq.Qrq6xsG.9HAFDhdnTaAsq', 'sun', '20160910053109.jpg', 'sun_9338@hotmail.com', '0853213996', '10/09/2016 05:31:09', 19819328, '10/09/2016 05:31:09', '13/12/2016 23:48:21', 3754702230, 1, 1, 0, 0),
(87, '22446688', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'tappae', '$2y$12$evrm6Q8lBcs9OZn6RuuoxupNzOltbWcZQKJ2.kg1GTZvbfx1DUjNu', 'ภูวดล ดีพิจารณ์', '20160910064911.jpg', 'hata_erang@hotmail.com', '0851888917', '10/09/2016 06:49:11', 3754949208, '10/09/2016 06:49:11', '11/12/2016 05:40:37', 19799632, 1, 1, 0, 0),
(88, 'city8679', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'city8679', '$2y$12$AGbxYW88vcnDmAuIaf65x.ONnxnWgs3a23ZZfsal3JkGsokWSwBD2', 'sarawut', '20160910081945.jpg', 'chanseatee.5t@gmail.com', '0899138559', '10/09/2016 08:19:45', 2875258024, '10/09/2016 08:19:45', '17/09/2016 10:26:55', 837217658, 1, 1, 0, 0),
(89, 'aa123654', 'กีฬาที่ชื่นชอบมากที่สุด', 'ิฟสส', 'tekhunpia', '$2y$12$UgSukSSs1kl5zUmbdXDPWOFhueZ0EFRq/XObbdFOBbFLWKM80moyK', 'pogba', '20160910082637.jpg', 'dddddddddddddddddd@gmail.com', '7894561236', '10/09/2016 08:26:37', 1850599136, '10/09/2016 08:26:37', '18/10/2016 08:43:54', 2680223062, 1, 1, 0, 0),
(90, '08956748', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'runway2516@hotmail.com', '$2y$12$ZWsjqdgxoGTPZWtYiawSFuM/rN0o59kAUB1zx4BZ7s8UjC2S/QF.m', 'นายนิรันดร์  ทองอ่อน', '20160910090847.jpg', 'runway7408@gmail.com', '0895674866', '10/09/2016 09:08:47', 1991064388, '24/09/2016 13:38:14', '11/12/2016 06:21:22', 2875280279, 1, 1, 0, 0),
(91, 'lcit1176', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', 'jbar2001', '$2y$12$qPDCt4d8bVLGKl1RnexqYeKATyYf0v0zqxSiWepY0J7Gqy4afkfei', 'สมเกียรติ สิริวรรณเจริญ', '20160910095604.jpg', 'ssomkiat1176@gmail.com', '0909190030', '10/09/2016 09:56:04', 1935113552, '10/09/2016 09:56:04', '03/12/2016 19:24:37', 3056889168, 1, 1, 0, 0),
(92, '12345678', 'กีฬาที่ชื่นชอบมากที่สุด', 'ุฟุตบอล', 'natosky', '$2y$12$U954PLO8nonpkIlejGx34OGjryXaffdcoi4ZmXW/cThAYnpyJFCru', 'ชโณทัย สุกุมาลย์', '20160910102130.jpg', 'Cha_notai010922@hotmail.com', '0942865609', '10/09/2016 10:21:30', 2001498551, '10/09/2016 10:21:30', '11/12/2016 15:44:10', 19794719, 1, 0, 0, 0),
(93, 'aa999999', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'zbz3350710', '$2y$12$SE7cphAMxDQg0STrd2S9aOdVMXdKyhKILFPUHV4Q5L7wme4XmR0Ou', 'Akradech', '20160910105254.jpg', 'stocktac@gmail.com', '0890270759', '10/09/2016 10:52:54', 2088418931, '10/09/2016 10:52:54', '11/12/2016 12:08:15', 3068694962, 1, 1, 0, 0),
(94, 'ok123456', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', '50151', '$2y$12$A0sy8PkciJxbfmSSM6.TqOHGEdRLbCq1lZVJUNJFcTEsdDqNyUUnS', '50151', '20160910110903.jpg', 'N_sooksabai@hotmail.com', '0992918222', '10/09/2016 11:09:03', 19819328, '10/09/2016 11:12:00', '11/12/2016 09:26:06', 3031951936, 1, 1, 0, 0),
(95, 'asdasd33', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'leonadon55', '$2y$12$FmJDhR02wL6sER8m5zWkU./QJ/daFMuSEJbZMPSsg6ijRf47KpwnW', 'สมรัก คำรัก', '20160910111847.jpg', 'asdasd33@gmail.com', '1231231233', '10/09/2016 11:18:47', 3076114554, '10/09/2016 11:48:50', '10/09/2016 12:28:30', 3076114554, 1, 0, 0, 0),
(96, 'tree9562', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'ducky', '$2y$12$lRoZ7FMS3WRJoRzsRHdcYOFTHrp6pvV/0A2SR0fpvNRdIJSTaIb8C', 'มนตรี สิงห์แก้ว ', '20160910112754.jpg', 'montree9562@hotmail.com', '0890921823', '10/09/2016 11:27:54', 3068706128, '10/09/2016 11:27:54', '10/12/2016 16:27:21', 3068687205, 1, 1, 0, 0),
(97, 'aa100@10', 'กีฬาที่ชื่นชอบมากที่สุด', 'yes', 'kang@test', '$2y$12$O2Y0Pidl1GRmlP.tuFKHxe4sxSecjF69InL6aFhWzKCQgHVha0uaK', 'คัง นะจ๊ะ', '20160910114043.jpg', 'Kang@xn--12c7dlxl5a4l.com', '0840784567', '10/09/2016 11:40:43', 1850599136, '10/09/2016 11:40:43', '10/09/2016 11:41:11', 1850599136, 1, 1, 0, 0),
(98, 'nongmuk1', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'หมีดำ', '$2y$12$/gYJwUjf7KQ4imL.lG11heJX64jZlSS6KOVp9glt63OHwOWFy0pjC', 'ปิติ ชัยพฤกษ์', '20160910114653.jpg', 'dadmukmay@hotmail.com', '0859496399', '10/09/2016 11:46:53', 2875244389, '10/09/2016 11:46:53', '11/12/2016 11:02:47', 2875244184, 1, 1, 0, 0),
(99, '48117115', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'vespa007', '$2y$12$CpH38mV8UTTPrMOY919DKOjq/gJgYe7LL9it.SSfpW77blZSRU2EG', 'titipong', '20160910115057.jpg', 'angryvespa@gmail.com', '0874094709', '10/09/2016 11:50:57', 19841379, '10/09/2016 11:50:57', '10/09/2016 12:00:25', 19841379, 1, 1, 0, 0),
(100, 'big25121', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'biggun', '$2y$12$7760lb5MWKiSOFGyfML3tOudxbi.EhyvwKzNIhBLP3fb9jG8eysNe', 'สิรภพ วังทอง', '20160910124015.jpg', 'wangthong_11@hotmail.com', '0956393436', '10/09/2016 12:40:15', 456640923, '10/09/2016 12:40:15', '11/12/2016 07:00:40', 825277890, 1, 1, 0, 0),
(101, 'nn888888', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'zbz3353319', '$2y$12$aWDFcBHJuOi5smw0vVKcYenSGmOYDLROwqZ7k9InsjyGqbQvRn526', 'ฐิติกรณ์ กาศคำสุข', '20160910134134.jpg', 'thitikoro@hotmail.com', '0851538389', '10/09/2016 13:41:34', 3076110954, '01/10/2016 17:35:37', '10/12/2016 23:42:20', 3031944618, 1, 0, 0, 0),
(102, 't1158181', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'k.rnon', '$2y$12$k19QDluPW6r59sv06WYewu.Bq.ucQOmbBo1X1/sJUJz14r8jT5I8y', 'นาย อานนท์ แสงเจริญ', '20160910153818.jpg', 'k.tung10@hotmail.com', '0868113531', '10/09/2016 15:38:18', 2869294562, '10/09/2016 15:38:18', '17/09/2016 17:42:13', 2869293933, 1, 1, 0, 0),
(103, 'jackbig1', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'jackbig', '$2y$12$MeBWTSamUaLCyuWioG98nOlseSFKNDGXYPanx/NzxGUIfzT2MsK5u', 'Apichit', '20160910163602.jpg', 'jackbig88@hotmail.com', '0896980863', '10/09/2016 16:36:02', 19836542, '10/09/2016 16:36:02', '10/12/2016 13:11:48', 19802646, 1, 1, 0, 0),
(104, '12345678', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', 'taebuzz', '$2y$12$u7nMxwxzHpQiW3Wn046/7.n90d8rn5f6nruIWHcM/xzC5ypWuueZq', 'นัทธี กวยมงคล', '20160910164128.jpg', 'will_you_love_me@hotmail.com', '0945985202', '10/09/2016 16:41:28', 825356194, '10/09/2016 16:41:28', '10/09/2016 16:41:39', 825356194, 1, 1, 0, 0),
(105, 'mj151720', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'josefchok@gmail.com', '$2y$12$Aqe.DpFtrQx/WemnjA5Zke/B.PJhpu8PbHkmEZaPMhZj8G9L6sThu', 'โชคชัย สังฆทิพย์', '20160910171621.jpg', 'josefchok@gmail.com', '0835450153', '10/09/2016 17:16:21', 19817326, '10/09/2016 17:16:21', '11/12/2016 11:13:52', 19811787, 1, 1, 0, 0),
(106, '22062522', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'nunoom4200', '$2y$12$D1.t8E6Ij9IfE4aJz34H1epOjValeWhDZ9soBMqG4jNEZrk3SpGJG', 'ณัฐภาส ศรีพิพัฒนะกุล', '20160910172407.jpg', 'mommam_sa@yahoo.com', '0979187717', '10/09/2016 17:24:07', 3031912682, '10/09/2016 17:24:07', '11/12/2016 14:03:11', 3068711318, 1, 1, 0, 0),
(107, '12345678', 'กีฬาที่ชื่นชอบมากที่สุด', 'fotball', 'nnnnn', '$2y$12$/64lTGhZ8vDQNdUgAIFjXuilr05UzslOdDDhyakl.Da9PLq3fhBlK', 'nnnnn', '20160910211307.jpg', 'mkc.tas@hotmail.com', '0859678007', '10/09/2016 21:13:07', 3742909172, '10/09/2016 21:13:07', '11/12/2016 08:13:58', 3068676169, 1, 1, 0, 0),
(108, '17062528', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', '8268', '$2y$12$/IYPi7vDyf8hcQEnRxP38OQ0149MXKP8vM64cqO.GQlSSQCn6mCO6', 'ณัฐยศ วรสารพิทักษ์', '20160913090420.jpg', 'ch1039@pttplc.com', '0805297078', '13/09/2016 09:04:20', 19899555, '13/09/2016 09:04:20', '13/09/2016 09:04:52', 19899555, 1, 1, 0, 0),
(109, '12345678', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', '51491', '$2y$12$ha3S6PMdVE0sSJr1wbcinOoYXbo7qDCVqGmJwU5p6x5jwaM4cBQWi', 'ศิริศักดิ์ ใบงาม', '20160913091243.jpg', 'R0946961455@gmail.com', '0946961455', '13/09/2016 09:12:43', 19825225, '01/10/2016 08:59:15', '10/12/2016 12:03:50', 1029319742, 1, 1, 0, 0),
(110, 'mhee1111', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'mhee.su', '$2y$12$YP7DsNfwFOIzd94fyfUKz.JKlKAVBLHOUwRmCzTsMdiBiaf0d8fBG', 'สุภชัย เนตรประสพสุข', '20160914030531.jpg', 'mhee.su@gmail.com', '0813093399', '14/09/2016 03:05:31', 837050623, '14/09/2016 03:05:31', '14/12/2016 17:57:00', 837050655, 1, 0, 0, 0),
(111, 'aa1234aa', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', '1234', '51395', '$2y$12$SFlN5F46HSDs.1UUelE/J.Nr9VI05T6EaBKaul0N2T4DdS7sTFLQa', 'พีระ ธัญญศรีสังข์', '20160914102729.jpg', 'CODOCUMENT@TRANSAIRCARGO.COM', '0837866885', '14/09/2016 10:27:29', 979465397, '14/09/2016 10:27:29', '15/12/2016 16:17:27', 979465397, 1, 1, 0, 0),
(112, 'ken13519', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'liverpool', 'sorchamic', '$2y$12$RNmxBrNMyrRMAwhTE8euk.HcCPKIOKfThQP5na3DRwsJONsMZTyZS', 'Ken', '20160916155140.jpg', 'sorchamic@gmail.com', '0935825721', '16/09/2016 15:51:40', 1697870572, '04/11/2016 16:01:46', '04/11/2016 16:02:31', 18146481, 1, 1, 0, 0),
(113, 'bird7932', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'zbz3353663', '$2y$12$ut0Bgg/bMDciULlUQw4HHencsCdABlvv8MjcCskU5/7XMsfS7.6J2', 'สุรพงษ์  ประไพ', '20160916203848.jpg', 'pentoajung@gmail.com', '0843471179', '16/09/2016 20:38:48', 3068684035, '16/09/2016 20:38:48', '03/12/2016 09:02:58', 3068685518, 1, 0, 0, 0),
(114, '19406972', 'กีฬาที่ชื่นชอบมากที่สุด', 'basketball', 'yamoonteen', '$2y$12$8/fQ7Euo4uDqIclMmt4EHuRkGGi4AXFdmkTvdENHyK5Az2ikp4fte', 'เชาวลิต แรมจะบก', '20160916212654.jpg', 'Yam_Oonteen@hotmail.com', '0610985315', '16/09/2016 21:26:54', 1701590831, '16/09/2016 21:26:54', '16/09/2016 21:27:08', 1701590831, 1, 1, 0, 0),
(115, 'su252825', 'กีฬาที่ชื่นชอบมากที่สุด', 'มวย', 'por30', '$2y$12$1kp2.5QLOYplRdeonVbSC.sHj8BCoXYIf9mvrcb6XmJBfHZekndaK', 'surasit', '20160917112546.jpg', 'r-ooney-10@hotmail.com', '0811407885', '17/09/2016 11:25:46', 3068698921, '17/09/2016 11:25:46', '26/11/2016 12:39:42', 837217456, 1, 1, 0, 0),
(116, '05053501', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'hilow', '$2y$12$CAnOtk2Wt2bxSn7owc5CTuC/Z7ZHDLfTHqcmNbhkO76BreQRfo3Ea', 'ภูมินทร์', '20160917130457.jpg', 'hi_lowzaa@hotmail.com', '0823931321', '17/09/2016 13:04:57', 19884336, '17/09/2016 13:04:57', '16/12/2016 09:32:04', 19915323, 1, 1, 0, 0),
(117, 'aa123123', 'กีฬาที่ชื่นชอบมากที่สุด', 'ิบอล', 'test', '$2y$12$iY3uU.m.rBOyDZw2jFvFqucYej55CYlJ9xsz9/Rl7FElZcQi4HKiS', 'ทดสอบ', '20160917230157.jpg', 'aa@gmail.com', '0899999999', '17/09/2016 23:01:57', 2869280302, '17/09/2016 23:01:57', '17/09/2016 23:02:19', 2869280302, 1, 1, 0, 0),
(118, 'anusorn1', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'aekarmy', '$2y$12$F.XKVHI4bL16mZm1rQ4xueJWbQNIyND6UtOL2c1hlEN5IDC5ZRh/m', 'อนุสรณ์', '20160920144927.jpg', 'aekarmyman@gmail.com', '0884792825', '20/09/2016 14:49:27', 973839422, '20/09/2016 14:49:27', '10/10/2016 23:41:00', 973839375, 1, 1, 0, 0),
(119, 'dee17529', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'ford1108', '$2y$12$.RcmW10rfGNROFlwrvwSKuvnp48ZTiWSbDM9vHiO7T2PGaMflUTHG', 'sarawut', '20160920172625.jpg', 'chansetaee.5t@gmail.com', '0899138559', '20/09/2016 17:26:25', 2875257925, '20/09/2016 17:26:25', '11/12/2016 17:21:38', 3068684264, 1, 1, 0, 0),
(120, 'aa555555', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'zbz3351780', '$2y$12$WBFN7pPF4q7xXyGzuklZRuVII0zsttrzQwCj5PY5WG1ZVCX6HryMe', 'ประยุทธ สุกใส', '20160920185608.jpg', 'EXPDMENT@TRANSAIRCARGO.COM', '0867576702', '20/09/2016 18:56:08', 979465397, '20/09/2016 18:56:08', '11/12/2016 12:36:20', 456592395, 1, 1, 0, 0),
(121, '25582618', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'panupat', '$2y$12$Ako8T4BAxThGm1jpAJ/RquTmPsGHlKbGCVO4bXCvhlwqUXABwko4i', 'ภานุพัฒน์   หัสดัม', '20160921103238.jpg', 'www.panupat97@gmail.com', '0930164120', '21/09/2016 10:32:38', 3068666581, '21/09/2016 10:32:38', '21/09/2016 10:39:41', 3068666581, 1, 1, 0, 0),
(122, 'pp258425', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'ton258425', '$2y$12$PCmMPVE1Lh.UBrfMneV4n.NAt1UfCb.pGg6dAKXjC69D5LLAL4JRy', 'พรชัย พิมพกรรณ์', '20160921105725.jpg', 'tonjungnung@hotmail.com', '0960163804', '21/09/2016 10:57:25', 837674608, '21/09/2016 10:57:25', '21/09/2016 13:23:29', 19892603, 1, 1, 0, 0),
(123, '27270808', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'ariyaphong', '$2y$12$yyYcQBf7kniIuYoDA2SYjuc0yVK51EO3a5.YqlKdkpMlyil.rQwIi', 'อริยพงษ์  เสนามงคล', '20160922102449.jpg', 'ariyaphong@hotmail.com', '0909727250', '22/09/2016 10:24:49', 3407162110, '22/09/2016 10:24:49', '22/09/2016 10:25:00', 3407162110, 1, 1, 0, 0),
(124, 'aa654321', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'manunited', 'nuth07', '$2y$12$b7s5Bq86iKVgyewLpFcKc.3jkGHYyD9j9dj5Tr4p5Mqpf6bKCiEMS', 'ณัฐพล  สอนสิงห์', '20160922121137.jpg', 'nuthapolss@gmail.com', '0619946874', '22/09/2016 12:11:37', 973773044, '22/09/2016 12:11:37', '22/09/2016 12:11:51', 973773044, 1, 1, 0, 0),
(125, '16857632', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'kun41', '$2y$12$RaOFgpSBaA6elKauutJuE.IY4whLfc4KycQyh7Ln3xhJ5DznGngj2', 'วิรัตน์  กันภัย', '20160922130453.jpg', 'kunphai-41@outlook.co.th', '0896014051', '22/09/2016 13:04:53', 1850594834, '22/09/2016 13:04:53', '30/09/2016 13:12:45', 2001500241, 1, 0, 0, 0),
(126, 'city8679', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', '51744', '$2y$12$g0R97i6I53hZ.zdFS2tziOif/PimPXpKunF6iR8MoLLIb79drkBkK', 'Kitsana set', '20160923090419.jpg', 'sarawutta@pd.co.th', '0866263243', '23/09/2016 09:04:19', 837102597, '23/09/2016 09:04:19', '04/12/2016 11:54:45', 3068709999, 1, 1, 0, 0),
(127, '24251509', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'ลิเวอร์พูล', 'kjta50861', '$2y$12$Wac5Su5YmDP4RywI0UjwMOazDAJue5MSe.f3HmgtcQXe8Rhid/ObO', 'ชุมพร  ปิ่นโพธิ์', '20160923131406.jpg', 'k_kerg0924@hotmail.co.th', '0989589468', '23/09/2016 13:14:06', 2263625765, '23/09/2016 13:14:06', '18/11/2016 13:55:29', 837210594, 1, 1, 0, 0),
(128, '25172517', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'zbz3351622', '$2y$12$zOKJATdZ.pRx.3Ao7dUs8.e7mbueapbyoyu3PjuF1D4w8GVIg79Du', 'Danai Rutaipech', '20160924091419.jpg', 'yodanai2517@gmail.com', '0945675560', '24/09/2016 09:14:19', 2875239173, '09/10/2016 08:27:25', '09/10/2016 08:28:16', 2875239087, 1, 0, 0, 0),
(129, '44405563', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'liverpool', 'themust14tc', '$2y$12$.Vl23/.5ZeXf9mtjf1WkWuTugBiTTpkLiQnT5JuoTfhkCLUU9Rk.2', 'สรวิทย์ เทพรัตน์', '20160924120004.jpg', 'themust14tc@hotmail.com', '0630637319', '24/09/2016 12:00:04', 2001495253, '24/09/2016 12:01:07', '12/12/2016 13:50:10', 456596266, 1, 1, 0, 0),
(130, 'nidambe1', 'ชื่อประเทศที่ชื่นชอบมากที่สุด', 'italy', 'zbz3351076', '$2y$12$NKFI5YtneHuWbAcvwl6Yz.4ebjohD1FD6huuSVL5ouSf2BDLd5sa2', 'Paiboon', '20160924125223.jpg', 'p_rattanap@hotmail.com', '0816971998', '24/09/2016 12:52:23', 3068681800, '24/09/2016 12:52:23', '11/12/2016 08:57:16', 19917587, 1, 1, 0, 0),
(131, '28122012', 'สถานที่ท่องเที่ยวที่ชื่นชอบมากที่สุด', 'เกาะช้าง', 'jimmy', '$2y$12$gjBvRRANQaTC0IjpDFDfDON5Yb5wcuS3Br70KusrNJ5laAUeJIPGC', 'ปฏิพัทธ์', '20160924125355.jpg', 'patipat41301413@hotmail.com', '0894088890', '24/09/2016 12:53:55', 462522292, '24/09/2016 12:53:55', '24/09/2016 12:54:44', 462522292, 1, 0, 0, 0),
(132, 'dee17529', 'กีฬาที่ชื่นชอบมากที่สุด', 'bas', '53027', '$2y$12$MpfMXQV009KdJZZ1HANFeOlbEwgohnybv67d9sLuu2Yq9sP8v2pRq', 'Sirinvadee', '20160924142042.jpg', 'sirinvadee@gmail.com', '0623658335', '24/09/2016 14:20:42', 3068692162, '24/09/2016 14:20:42', '11/12/2016 17:32:13', 2875257973, 1, 1, 0, 0),
(133, 'aa123456', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'zbz3351997', '$2y$12$.qzsh58UQtUYdCHQx3jq7eK6w86HnYXugGK7uIFwpA.lVSmmOsugW', 'วรวุฒิ กลิ่นสุคนธ์', '20160929113446.jpg', 'nikon_thailand_d80@hotmail.com', '0830399249', '29/09/2016 11:34:46', 2007030274, '29/09/2016 11:34:46', '29/09/2016 11:35:08', 2007030274, 1, 1, 0, 0),
(134, '38009007', 'ชื่อประเทศที่ชื่นชอบมากที่สุด', 'ไทย', 'huana', '$2y$12$uO8pyNDPFRWyYZtlASAT7OVKMeo4Nm3hfw3RfFqeNdaJNivV7l.CC', 'Huana Kanapatiwat', '20160930052023.jpg', 'e20yhw@hotmail.com', '0808809837', '30/09/2016 05:20:23', 3068668280, '30/09/2016 05:20:23', '30/09/2016 05:20:49', 3068668280, 1, 1, 0, 0),
(135, '08908933', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'beckmom', '$2y$12$2W4uPpmNwdHOR9QAuactiebu5eVLqeUZTurHjjOjKM52dbGKwiaqi', 'กิตตินัฐ', '20160930142417.jpg', 'Mom_man_u@hotmail.com', '0890893309', '30/09/2016 14:24:17', 2869211552, '30/09/2016 14:24:17', '08/12/2016 10:46:38', 462522810, 1, 1, 0, 0),
(136, '48123013', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'ลิเวอร์พูล', 'volcom', '$2y$12$M8oa488SUK/KN02w7pII.OQPLvowvUVDFvhB4kP3UpSyzBhmsw4VS', 'ธีรยุทธ วุฒิสังข์', '20161001130540.jpg', 'bboyboem@hotmail.com', '0969266526', '01/10/2016 13:05:40', 3742924252, '01/10/2016 13:05:40', '09/12/2016 09:37:48', 456590769, 1, 1, 0, 0),
(137, '33334444', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'pairoj333', '$2y$12$Apn4K1hwd6WCbXFaB3KUN.RjJWFOHNTtxw9xaMxVeF4zZp0pTKq8.', 'ไพโรจน์', '20161008022535.jpg', 'pairoj333@hotmail.com', '0895002611', '08/10/2016 02:25:35', 3532546132, '08/10/2016 02:25:35', '13/12/2016 22:23:29', 1612600312, 1, 0, 0, 0),
(138, '19283746', 'กีฬาที่ชื่นชอบมากที่สุด', 'snooker', 'zbz3350872', '$2y$12$jn.S.ANfG16aQtcfy8tYWOrWX/ob5ndsjdh/22jTTZUAgl0FHRflS', 'ธนนชัย พึ่งเจียก', '20161015011010.jpg', 'oicelove2009@gmail.com', '0934764689', '15/10/2016 01:10:10', 1697875119, '15/10/2016 01:10:10', '15/10/2016 01:10:30', 1697875119, 1, 1, 0, 0),
(139, '95719571', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'wt9571', '$2y$12$1z15g19w4G1YCe/5iMRH0uu2IhSlTsitXxECjNAc.BtntDfmhudBa', 'วุฒิภัทร โตสกุล', '20161022143806.jpg', 'wt9571@hotmail.com', '0805931211', '22/10/2016 14:38:06', 2261045339, '22/10/2016 14:38:06', '11/12/2016 15:18:08', 2261045339, 1, 0, 0, 0),
(140, 'teelorlo', 'ชื่อนักกีฬาที่ชื่นชอบมากที่สุด', 'pigpig', 'teelor', '$2y$12$qIobA4KhEihxiNIU5fvwJ.1TMtSF7/EfwV..ANC3V1qyr5Mq0CyNa', 'กันตพิชญ์ โพธิ์สินสมวงศ์', '20161026204427.jpg', 'member-ro@hotmail.com', '0816964929', '26/10/2016 20:44:27', 2869403857, '26/10/2016 20:44:27', '26/10/2016 20:44:40', 2869403857, 1, 1, 0, 0),
(141, 'vvgg5544', 'กีฬาที่ชื่นชอบมากที่สุด', 'แท่งบอล', 'vegus', '$2y$12$g76Ju.R1LwPAQu0brM7nLOaqOh1K8gkMnN1AMnE8cF2UYOzCl3hWO', 'ธงชัย รุ่งเรืองสินงาม', '20161101180727.jpg', 'thongchai677@hotmail.com', '0850705463', '01/11/2016 18:07:27', 19909551, '01/11/2016 18:07:27', '01/11/2016 18:08:18', 19909551, 1, 1, 0, 0),
(142, '31143114', 'กีฬาที่ชื่นชอบมากที่สุด', 'วอลเล่ย์บอล', 'saktak', '$2y$12$WKV8dXq970vyLjeMi/NkcuZpmH/GFJYNTawDIqjZ4G6GKmq7rgRwG', 'อดิศักดิ์  คงบุญ', '20161102100346.jpg', 's.f.o123@hotmail.com', '0956428177', '02/11/2016 10:03:46', 1991236944, '02/11/2016 10:03:46', '26/11/2016 08:51:53', 3742919133, 1, 1, 0, 0),
(143, 'mongkol5', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'mongkol', '$2y$12$c4/KJibABFui4MJS6YZoeuy17ohpQIfJdhEIpSb0PI3eHdl.hX9Ya', 'มงคล หงษ์มัง', '20161104093848.jpg', 'mongkolbicycle@gmail.com', '0615455964', '04/11/2016 09:38:48', 3068668267, '04/11/2016 09:38:48', '04/11/2016 09:39:14', 3068668267, 1, 1, 0, 0),
(144, '12345678', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', '53730', '$2y$12$lMEFxHsdN01ZtYgTJOZ4qOw9SGytPQvuNVtwI8ENAVtke2/J06L0a', 'บอย', '20161105014319.jpg', 'boy_zazas@hotmail.com', '0890613905', '05/11/2016 01:43:19', 973735441, '05/11/2016 01:43:19', '28/11/2016 14:33:03', 3742899680, 1, 1, 0, 0),
(145, 'aaaa6689', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'ลิเวอร์พูล', 'archawa9', '$2y$12$oG7yMv77rTkaghpSLcptCePT6AeNUR.bUeOnGN9l11sLIuCr2fFnS', 'หว่อง', '20161105100504.jpg', 'pee_wong@hotmail.com', '0838856689', '05/11/2016 10:05:04', 456639032, '05/11/2016 10:05:04', '05/11/2016 10:05:46', 456639032, 1, 1, 0, 0),
(146, 'job14022', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'jobzaa', '$2y$12$UFYVcQCoBj2D2Hlle5rTBuM1isWaVkGtgipOUc1lZ6Cn1jMGSwM7G', 'นาย เมทนี วิบูลย์ธนภัณฑ์', '20161105140814.jpg', 'jobbov05@hotmail.con', '0944280344', '05/11/2016 14:08:14', 973746920, '05/11/2016 14:08:14', '10/12/2016 21:57:11', 462498781, 1, 1, 0, 0),
(147, '07423200', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'แมนยูไนเต็ด', '0637988291', '$2y$12$nGrjDlsje.Z1LjtlxW3LyeG1WOmfg4HygkrHMxBlvqNpi9eLRtWv2', 'นายปิยะวัฒน์   สุนทรปัญญาวุธ', '20161106101202.jpg', 'piyawutjungz@gmail.com', '0637988291', '06/11/2016 10:12:02', 3742900276, '06/11/2016 10:12:02', '06/11/2016 10:12:55', 3742900276, 1, 1, 0, 0),
(148, 'suriya09', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'suriyacheer', '$2y$12$uSQRdTvbKwHqNK1dj99luOnCjUmorhydp1sVWvU8MwYWundI2oJFm', 'สุริยะ คำชื่น', '20161109194826.jpg', 'suriyacheer@hotmail.com', '0860132697', '09/11/2016 19:48:26', 3076102183, '09/11/2016 19:48:26', '09/11/2016 19:48:57', 3076102183, 1, 1, 0, 0),
(149, '12345678', 'กีฬาที่ชื่นชอบมากที่สุด', 'เวลล์ชนะ3-1', 'zdb3353655', '$2y$12$MgrbE8b4PvhQH23bnFy33uej0N9iEIXX7VT2qybOgnso7xK8vljgq', 'ธงชัย สุขรัตน์', '20161110121325.jpg', 'tongchaisukrut@gmail.com', '0872374717', '10/11/2016 12:13:25', 3068702490, '10/11/2016 12:13:25', '17/11/2016 21:49:42', 837106928, 1, 1, 0, 0),
(150, 'tt123456', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'toppay11', '$2y$12$wVUMahoUWZHKEhtwrKbVtegLjy1McVS/pKw4uV2UXdabGT3pKxd3.', 'yutthakan', '20161111111709.jpg', 'toppay1@hotmail.com', '0971981378', '11/11/2016 11:17:09', 2098771774, '11/11/2016 11:17:09', '11/11/2016 11:18:42', 2098771774, 1, 1, 0, 0),
(151, 'kk444444', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', '53488', '$2y$12$ZjgLIITmKo.tYTqJixTXK.TLQK1jLOXiUuoJsom/yHwInBjTm099i', 'วิวัฒน์ วงษ์ยอด', '20161112114905.jpg', 'pk.wongyod@gmail.com', '0819234360', '12/11/2016 11:49:05', 3742911825, '12/11/2016 11:49:05', '11/12/2016 09:30:53', 3742905038, 1, 1, 0, 0),
(152, 'noom2519', 'กีฬาที่ชื่นชอบมากที่สุด', 'noom1203', 'saktanong', '$2y$12$nYH09ZOYTPiF2C5CZuHVjOnOZnAbaTAcTMXkpy4g/2PLy4c3.3o/O', 'ศักดิ์ทนง  คำบัว', '20161112153940.jpg', 'kumbuasaktanong@gmail.com', '0953951915', '12/11/2016 15:39:40', 3754824822, '12/11/2016 15:39:40', '14/12/2016 11:54:16', 3742897016, 1, 1, 0, 0),
(153, 'ka07mon9', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'domonzaa', '$2y$12$5JYXOMa8R5pls2.oh/gEeeHhViBtXMzQbSrP.eVuQbYz46slE7ZaO', 'นายกมล มุนตะทุม', '20161116142524.jpg', 'domonzaa2@gmail.com', '0879522633', '16/11/2016 14:25:24', 2263627780, '16/11/2016 14:25:24', '28/11/2016 14:34:06', 3068660102, 1, 1, 0, 0),
(154, 'perawit1', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'perawitdump', '$2y$12$kilS7yTn2QL4k9o/CoZYZOaSuwRVZAKRw70gBMVu/agWUCOvMoUH.', 'พีรวิชญ์', '20161118143149.jpg', 'perawitdump@hotmail.com', '0990956677', '18/11/2016 14:31:49', 19795238, '18/11/2016 14:31:49', '18/11/2016 14:32:25', 19795238, 1, 1, 0, 0),
(155, 'natanon1', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'chai04', '$2y$12$WEjToFh/u9soATNnXkHX9.HE.aYLiuvbPEoEni5lg5.JDeGt7Y26m', 'วิชัย บุญประเสริฐ', '20161119001114.jpg', 'wichaiball15@hotmail.com', '0813769169', '19/11/2016 00:11:14', 2088270304, '19/11/2016 00:11:14', '11/12/2016 15:28:26', 2261045470, 1, 0, 0, 0),
(156, '31083108', 'ชื่อนักกีฬาที่ชื่นชอบมากที่สุด', 'ฟาวเลอร์', '3350445', '$2y$12$SriS.8UJ4qC59zrjFTPGee/J4Ris.E75nOK/WPeOYhoethRsoxsGy', 'chaipoj', '20161119133819.jpg', 'ko_siam@hotmail.com', '0818554489', '19/11/2016 13:38:19', 2001496610, '20/11/2016 06:04:34', '20/11/2016 06:05:18', 1701606080, 1, 1, 0, 0),
(157, '25252536', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', 'bawnu', '$2y$12$0R5EUN62HaftYU7BQd361eKoonxT9RFflTLR3Xg5ZhXRMZWrD1FWy', 'อนุพล หนูน้ำคำ', '20161120224602.jpg', 'banknu@gmail.com', '0980465071', '20/11/2016 22:46:02', 837118167, '20/11/2016 22:46:02', '20/11/2016 22:46:46', 837118167, 1, 1, 0, 0),
(158, '87654321', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'toto7777', '$2y$12$CuPp/Vnk2QseWM52s3RHtuTwR0RVZBp41cttr5oNv1PipDKUnjzze', 'นันธวัช โลหะ', '20161123215158.jpg', 'toto7777@gmail.com', '0800556722', '23/11/2016 21:51:58', 837135866, '23/11/2016 21:51:58', '14/12/2016 21:08:53', 837140350, 1, 0, 0, 0),
(159, 'fb881518', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'bungte', '$2y$12$ygd0JnwsHUpPtEsc8zJst.zqLOMhUvwNtLFWclWcSReHoIQrvCiqi', 'ฐาณัติ เอกดำรงค์', '20161124155408.jpg', 'tharnutek@gmail.com', '0911026499', '24/11/2016 15:54:08', 837050702, '24/11/2016 15:54:08', '14/12/2016 14:28:54', 837050570, 1, 1, 0, 0),
(160, '99920909', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'notewarunyou', '$2y$12$8vDHbpQ1RzTmgJxVyB.3meMHSP9dIvSA.61.6eKejLTvUWQ0JqP/a', 'วรัญญู  มงคลกิจธนากร', '20161124173553.jpg', 'notewarunyou@gmail.com', '0881395851', '24/11/2016 17:35:53', 19850037, '24/11/2016 17:35:53', '24/11/2016 17:36:16', 19850037, 1, 1, 0, 0),
(161, '29102551', 'ชื่อประเทศที่ชื่นชอบมากที่สุด', 'ไทย', 'sem40', '$2y$12$mhgHU2GZAZba4QEa5w.84O9mr0ZXEI1ph7ZnMXAwHZReOfir6tFbK', 'สุขเกษม บรรเลงกิจ', '20161126085544.jpg', '1234@gmail.com', '0895211183', '26/11/2016 08:55:44', 3754909616, '26/11/2016 08:55:44', '14/12/2016 10:25:41', 1850594969, 1, 1, 0, 0),
(162, 'sarunrat', 'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด', 'manu', 'aticuzx', '$2y$12$UdEXPrHmC3vQD2itcvJNLOxQnixg0s0Zn8RWTPh2zoYAeiLSsgrmm', 'sarunrat sriprasert', '20161126110400.jpg', 'zel2ty_art@hotmail.com', '0852605831', '26/11/2016 11:04:00', 2088393912, '26/11/2016 11:04:00', '14/12/2016 11:45:07', 2875431937, 1, 1, 0, 0),
(163, 'b1122334', 'กีฬาที่ชื่นชอบมากที่สุด', 'บาส', 'bank112233', '$2y$12$vh01tAN9KK1UBlRKQaAAAuTEXFBB.aZcSwWdCMmfGixvDq5LzVcIu', 'อภิชาติ เจี่ยดำรง', '20161129103631.jpg', 'bankpanut99@gmail.com', '0997932927', '29/11/2016 10:36:31', 3754849592, '29/11/2016 10:36:31', '29/11/2016 18:23:26', 3754849592, 1, 1, 0, 0),
(164, 'gun08241', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'gungun', '$2y$12$Nmyu6xSBYaAAGE.rnNU.P.0cFrj9qC2A6HNC6a0K5pSKRgHgsQF3e', 'pongphan promsalee', '20161129183410.jpg', 'gunpongphan@gmsil.com', '0824111554', '29/11/2016 18:34:10', 3068668405, '29/11/2016 18:34:10', '29/11/2016 18:37:07', 3068668405, 1, 1, 0, 0),
(165, '74723789', 'กีฬาที่ชื่นชอบมากที่สุด', 'สนุ๊กเกอร์', 'bknzaa', '$2y$12$4IOSZUfilT0bgAs.ZbJ4wefRbW77c2vYL6eX2otoSnAsppW8u0zN.', 'สาคร อาษาไทย', '20161201045225.jpg', 'paramee9876@gmail.com', '0988838039', '01/12/2016 04:52:25', 3068717260, '01/12/2016 04:52:25', '01/12/2016 04:52:53', 3068717260, 1, 0, 0, 0),
(166, '31083108', 'ชื่อนักกีฬาที่ชื่นชอบมากที่สุด', 'ฟาวเลอร์', 'zbz3350445', '$2y$12$MBcdixw69Z50Dnpa9KXlyuh1PWGnRGawg.xGI5wDQievKSCS2mSUa', 'ชัยพจน์', '20161202114236.jpg', 'kokotaro8@gmail.com', '0818554489', '02/12/2016 11:42:36', 2001496647, '02/12/2016 11:42:36', '02/12/2016 11:43:14', 2001496647, 1, 1, 0, 0),
(167, 'sssss555', 'กีฬาที่ชื่นชอบมากที่สุด', 'football', 'parmpower', '$2y$12$yWrg1BcLQ8MngIfYWmLpNOwnDV150k6mIvUiABkKz48MN9C1KSWrq', 'Jhetniphet', '20161203154344.jpg', 'parmcup@hotmail.com', '0871750217', '03/12/2016 15:43:44', 456613562, '03/12/2016 15:43:44', '11/12/2016 12:28:14', 3742920998, 1, 1, 0, 0);
INSERT INTO `user` (`id`, `hash`, `security_question`, `security_answer`, `username`, `password`, `fullname`, `picture`, `email`, `phone`, `created`, `created_ip`, `updated`, `logged`, `logged_ip`, `status`, `online`, `role`, `point`) VALUES
(168, 'aa159159', 'กีฬาที่ชื่นชอบมากที่สุด', 'บอล', '53387', '$2y$12$ahIwHD2jafrre.27rkGCc.sXEzD3wR0Yw1gm2MtqFB35yBTkF2Mn2', 'โชติศักย์ เทพี', '20161208225327.jpg', 'sowti@gmail.com', '0910011100', '08/12/2016 22:53:27', 3076114754, '08/12/2016 22:53:27', '15/12/2016 06:15:30', 837653448, 1, 1, 0, 0),
(169, 'aamm2499', 'สถานที่ท่องเที่ยวที่ชื่นชอบมากที่สุด', 'ระยอง', '53742', '$2y$12$URi0kYyYbdiabDeaECLdk.RK2FoQISI7/Np1Fm.BERPOKrYSBybS6', 'เกวลินต์', '20161209090313.jpg', 'kawalin.2499@hotmail.com', '0981046591', '09/12/2016 09:03:13', 17497360, '09/12/2016 09:03:13', '09/12/2016 09:03:37', 17497360, 1, 1, 0, 0),
(170, '08677777', 'กีฬาที่ชื่นชอบมากที่สุด', 'ฟุตบอล', 'oooaofooo', '$2y$12$3ePwAzdciTr9zVVks8WIXO4GJYlgTLAcIUm9qRMF3EJlVsZLK0Q3G', 'oooaofooo', '20161212190546.jpg', 'zaaofa@hotmail.com', '0868604811', '12/12/2016 19:05:46', 3754879218, '12/12/2016 19:05:46', '12/12/2016 20:18:51', 3754879218, 1, 1, 0, 0),
(171, 'password', 'กีฬาที่ชื่นชอบมากที่สุด', 'สีดำ', 'mapraw', '$2y$12$SKWBJC6719so9TOu63IAEOYfzS4Ufr8QihFKfBEkaK7EDL7Qw1ShK', 'มะพร้าว', '20161222140447.jpg', 'mapraw@gmail.com', '0888888888', '22/12/2016 14:04:47', 0, '22/12/2016 14:05:38', '23/01/2017 08:59:34', 0, 1, 0, 0, 0),
(172, 'password', 'กีฬาที่ชื่นชอบมากที่สุด', 'สีดำ', 'somporn', '$2y$12$ihnDmM1oCF6K5rZvFKEwLuhqhEEBUKnFeCHqeDKE0f5smeOOJ9.se', 'somporn', '20170118144843.jpg', 'maimeekairuk_100_221@hotmail.com', '0876533359', '18/01/2017 14:48:43', 0, '18/01/2017 14:48:43', '23/01/2017 08:51:50', 0, 1, 0, 0, 4075);

-- --------------------------------------------------------

--
-- Table structure for table `user_bank`
--

CREATE TABLE `user_bank` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `account_bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `locked` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_bank`
--

INSERT INTO `user_bank` (`id`, `user_id`, `account_bank`, `account_name`, `account_number`, `status`, `locked`) VALUES
(1, 2, 'ธนาคารกรุงเทพ', 'บัญชีกรุงเทพ', '0000000000', 1, 0),
(2, 2, 'ธนาคารกรุงไทย', 'บัญชีกรุงไทย', '1111111111', 1, 0),
(4, 2, 'ธนาคารออมสิน', 'บัญชีออมสิน', '2222222222', 1, 0),
(5, 2, 'ธนาคารไทยพาณิชย์', 'บัญชีไทยพาณิชย์', '3333333333', 1, 0),
(6, 3, 'ธนาคารทหารไทย', 'บัญชีกรุงไทย', '0000000000', 0, 0),
(7, 4, 'ธนาคารกสิกรไทย', 'บัญชีกสิกร', '0000000000', 0, 0),
(8, 5, 'ธนาคารกรุงศรีอยุธยา', 'บัญชีกรุงศรีอยุธยา', '1111111111', 0, 0),
(9, 6, 'ธนาคารไทยพาณิชย์', 'บัญชีไทยพาณิชย์', '2222222222', 0, 0),
(10, 7, 'ธนาคารออมสิน', 'บัญชีออมสิน', '5555555555', 0, 0),
(11, 1, 'ธนาคารกรุงไทย', 'คริสเตียโน่ โรนัลโด้', '9999999999', 1, 0),
(12, 0, 'ธนาคารกสิกรไทย', 'taksin', '9820005362', 0, 0),
(13, 8, 'ธนาคารกสิกรไทย', 'taksin', '402999999', 0, 0),
(14, 9, 'ธนาคารกสิกรไทย', 'sunnuy26', '0123456789', 0, 0),
(15, 10, 'ธนาคารกสิกรไทย', 'pongin', '0123456789', 0, 0),
(16, 11, 'ธนาคารกสิกรไทย', 'nopporn noowongse', '3642268806', 0, 0),
(17, 12, 'ธนาคารกสิกรไทย', 'อัมรินทร์ วงศ์เอกพันธ์', '9082049379', 0, 0),
(18, 13, 'ธนาคารกสิกรไทย', 'ชัยชนะ ลีลาวัฒนชัย', '1002897756', 0, 0),
(19, 14, 'ธนาคารกสิกรไทย', 'วิไลพร  กนกลัดดา', '0128175253', 0, 0),
(20, 15, 'ธนาคารกสิกรไทย', 'กร สิงห์ธีร์', '7632190225', 0, 0),
(21, 16, 'ธนาคารไทยพาณิชย์', 'นครินทร์ รุ่มรวย', '0344200948', 0, 0),
(22, 17, 'ธนาคารกรุงเทพ', '1241231', '2312412423', 0, 0),
(23, 18, 'ธนาคารกสิกรไทย', 'ภัชรพร', '2632450715', 0, 0),
(24, 19, 'ธนาคารกสิกรไทย', 'รุ่งนภา', '6522036860', 0, 0),
(25, 20, 'ธนาคารกรุงเทพ', 'ลีโอ นาดล', '1234567890', 0, 0),
(26, 21, 'ธนาคารกสิกรไทย', 'คงคุณ สมศรี', '9042130742', 0, 0),
(27, 22, 'ธนาคารไทยพาณิชย์', 'ณัฐพงศ์ พระบาง', '1512148803', 0, 0),
(28, 23, 'ธนาคารทหารไทย', 'วิฑูร แสงอรุณ', '6122468827', 0, 0),
(29, 24, 'ธนาคารกรุงเทพ', 'ธัญชนก  บุษวงค์', '8650103537', 0, 0),
(30, 25, 'ธนาคารกสิกรไทย', 'ณัฐยศ วรสารพิทักษ์', '4882016566', 0, 0),
(31, 26, 'ธนาคารกรุงเทพ', 'ศุภชัย นันดา', '9400682291', 0, 0),
(32, 27, 'ธนาคารกสิกรไทย', 'อัครเดช สิริวรรณเจริญ', '6992225686', 0, 0),
(33, 28, 'ธนาคารไทยพาณิชย์', 'สรวิทย์ เทพรัตน์', '1732389475', 0, 0),
(34, 29, 'ธนาคารกสิกรไทย', 'มานิต ชาติชนะ', '0148470928', 0, 0),
(35, 30, 'ธนาคารกรุงไทย', 'มานะ คำคลัง', '5100661070', 0, 0),
(36, 31, 'ธนาคารกรุงไทย', 'ธัญพิชชา คำคลัง', '5100454067', 0, 0),
(37, 32, 'ธนาคารกสิกรไทย', 'ณัฐพงศ์ ปีติเปรมชัย', '0192941881', 0, 0),
(38, 33, 'ธนาคารกรุงเทพ', 'วัชรินทร์ คชินทรโรจน์', '3350519298', 0, 0),
(39, 34, 'ธนาคารกสิกรไทย', 'วรวัฒน์ บัวช้าง', '2752885543', 0, 0),
(40, 35, 'ธนาคารกสิกรไทย', 'วรวัฒน์ บัวช้าง', '2752885543', 0, 0),
(41, 36, 'ธนาคารกสิกรไทย', 'เอกชัย', '1234567890', 0, 0),
(42, 37, 'ธนาคารกรุงเทพ', 'ศรมิษฐ์ ศรีจูม', '4794666240', 0, 0),
(43, 38, 'ธนาคารกรุงเทพ', 'Kitirak soodwoon', '4857027181', 0, 0),
(44, 39, 'ธนาคารไทยพาณิชย์', 'อธิวัฒน์ วัฒนวิถี', '3214332938', 0, 0),
(45, 40, 'ธนาคารกสิกรไทย', 'วันเฉลิม สติใหม่', '9592053958', 0, 0),
(46, 41, 'ธนาคารกรุงเทพ', 'วาญุชา สง่างาม', '3910966716', 0, 0),
(47, 42, 'ธนาคารกสิกรไทย', 'ไมตรี ศรีเอี่ยมกูล', '6912217831', 0, 0),
(48, 43, 'ธนาคารกสิกรไทย', 'ภุชงศ์', '0152206666', 0, 0),
(49, 44, 'ธนาคารกรุงเทพ', 'testfb88', '1234567890', 0, 0),
(50, 45, 'ธนาคารกรุงเทพ', 'testfb8801', '1234567890', 0, 0),
(51, 46, 'ธนาคารกรุงเทพ', 'test888', '0123456789', 0, 0),
(52, 47, 'ธนาคารกรุงเทพ', 'fanball8881', '0123456789', 0, 0),
(53, 48, 'ธนาคารไทยพาณิชย์', 'abcdef', '1234567890', 0, 0),
(54, 49, 'ธนาคารไทยพาณิชย์', 'abcdefg', '0123456789', 0, 0),
(55, 50, 'ธนาคารไทยพาณิชย์', 'จักรี  กิ่งมาลา', '4063969899', 0, 0),
(56, 51, 'ธนาคารกสิกรไทย', 'เกียรติ รัตนวิเศษรัตน์', '7512753110', 0, 0),
(57, 52, 'ธนาคารกรุงเทพ', 'อภิชาติ ประวงษ์', '3834322186', 0, 0),
(58, 53, 'ธนาคารไทยพาณิชย์', 'auten  changtong', '5692447985', 0, 0),
(59, 54, 'ธนาคารกสิกรไทย', 'ประวิตร สมบูรณ์', '5862342099', 0, 0),
(60, 55, 'ธนาคารกสิกรไทย', 'ธันวา ภาษีทวีเกียรติ ', '6522311233', 0, 0),
(61, 56, 'ธนาคารกรุงเทพ', 'pongpat donpradis', '7030350487', 0, 0),
(62, 57, 'ธนาคารกรุงไทย', 'รัตนพล   จันทรุสอน', '3013088826', 0, 0),
(63, 58, 'ธนาคารกรุงไทย', 'วศิน ด้วงสังข์', '9819285674', 0, 0),
(64, 59, 'ธนาคารกรุงเทพ', 'manutded', '8888888888888', 0, 0),
(65, 60, 'ธนาคารกรุงเทพ', 'ทวีศักดิ์', '2090666013', 0, 0),
(66, 61, 'ธนาคารกสิกรไทย', 'นายเพทาย ศรีไตรรัตน์', '5172001086', 0, 0),
(67, 62, 'ธนาคารกรุงไทย', 'รณธชัย  อัดโดดดร', '9839134760', 0, 0),
(68, 63, 'ธนาคารกสิกรไทย', 'อุดร', '0041453656', 0, 0),
(69, 64, 'ธนาคารกรุงไทย', 'ธเนศ ลาโหยด', '6860222670', 0, 0),
(70, 65, 'ธนาคารกสิกรไทย', 'คฑายุทธ์', '7602456077', 0, 0),
(71, 66, 'ธนาคารกรุงเทพ', 'สหชัย สุวรรณภูมิ', '0367249653', 0, 0),
(72, 66, 'ธนาคารกรุงเทพ', 'สหชัย สุวรรณภูมิ', '0367249653', 0, 0),
(73, 67, 'ธนาคารกสิกรไทย', 'เดวิตท์', '2222310922', 0, 0),
(74, 68, 'ธนาคารกรุงเทพ', 'สุรกิจ นามรัตน์', '0590802310', 0, 0),
(75, 69, 'ธนาคารกรุงเทพ', 'สงกรานต์  จันทรุสอน', '7010071608', 0, 0),
(76, 70, 'ธนาคารไทยพาณิชย์', 'เจษฎาพร โพธิ์กิ่ง', '4055478448', 0, 0),
(77, 71, 'ธนาคารกรุงเทพ', 'สมชาย  โพธิ์เกษม', '3414025761', 0, 0),
(78, 72, 'ธนาคารกรุงเทพ', 'กฤตนันท์ โชติเล็กธนา', '0550616437', 0, 0),
(79, 73, 'ธนาคารไทยพาณิชย์', 'ประวิท อินทะวงศ์', '8292240749', 0, 0),
(80, 74, 'ธนาคารกสิกรไทย', 'นันลิกา ฉายแก้วมณี', '6992225813', 0, 0),
(81, 75, 'ธนาคารกสิกรไทย', 'ประหยัด สิริวรรณเจริญ', '0828032244', 1, 0),
(82, 75, 'ธนาคารกสิกรไทย', 'ประหยัด สิริวรรณเจริญ', '0111878153', 0, 0),
(83, 76, 'ธนาคารกรุงเทพ', 'ศุภมงคล หิรัญศรีสุข', '0477037600', 0, 0),
(84, 77, 'ธนาคารกสิกรไทย', 'รัตนา ประทุมสูตร', '6292155431', 0, 0),
(85, 78, 'ธนาคารไทยพาณิชย์', 'Tiger', '1112511545', 0, 0),
(86, 79, 'ธนาคารไทยพาณิชย์', 'hana', '0123456789', 0, 0),
(87, 80, 'ธนาคารกรุงเทพ', 'bill', '0123456789', 0, 0),
(88, 81, 'ธนาคารไทยพาณิชย์', 'abcdef', '0123456789', 0, 0),
(89, 82, 'ธนาคารไทยพาณิชย์', 'abcd', '0123456789', 0, 0),
(90, 83, 'ธนาคารกรุงเทพ', 'testfb123', '0123456789', 0, 0),
(91, 84, 'ธนาคารกสิกรไทย', 'กอบชัย คชินทรโรจน์', '0108981245', 0, 0),
(92, 85, 'ธนาคารกสิกรไทย', 'พงศ์พิพัฒน์ ปัณ', '5732277449', 0, 0),
(93, 86, 'ธนาคารกสิกรไทย', 'สัญชัย', '0322874413', 0, 0),
(94, 87, 'ธนาคารกสิกรไทย', 'ภูวดล ดีพิจารณ์', '4432238305', 0, 0),
(95, 88, 'ธนาคารไทยพาณิชย์', 'sarawut', '3162619971', 0, 0),
(96, 89, 'ธนาคารกรุงเทพ', '1236547895', '1236547895', 0, 0),
(97, 90, 'ธนาคารกรุงไทย', 'นิรันดร์  ทองอ่อน', '6000066694', 0, 0),
(98, 91, 'ธนาคารกรุงไทย', 'สมเกียรติ สิริวรรณเจริญ', '4640111185', 0, 0),
(99, 92, 'ธนาคารกรุงไทย', 'นายชโณทัย สุกุมาลย์', '4420230282', 0, 0),
(100, 93, 'ธนาคารกรุงเทพ', 'รุจิพัชญ์', '2050120332', 0, 0),
(101, 94, 'ธนาคารกสิกรไทย', 'นพคุณ', '7022262399', 0, 0),
(102, 95, 'ธนาคารกรุงเทพ', 'สมรัก คำรัก', '1231231233', 0, 0),
(103, 96, 'ธนาคารกสิกรไทย', 'มนตรี สิงห์แก้ว ', '5262130195 ', 0, 0),
(104, 97, 'ธนาคารกสิกรไทย', 'คังสายแจ๊ะ', '00000000000', 0, 0),
(105, 98, 'ธนาคารกรุงเทพ', 'ปิติ ชัยพฤกษ์', '1700613373', 0, 0),
(106, 99, 'ธนาคารกสิกรไทย', 'titipong', '6272039729', 0, 0),
(107, 100, 'ธนาคารกสิกรไทย', 'สิรภพ วังทอง', '1962931606', 0, 0),
(108, 101, 'ธนาคารไทยพาณิชย์', 'ฐิติกรณ์ กาศคำสุข', '5964237359', 0, 0),
(109, 102, 'ธนาคารไทยพาณิชย์', 'นายอานนท์ แสงเจริญ', '9482046317', 0, 0),
(110, 103, 'ธนาคารไทยพาณิชย์', 'อภิชิต', '1702143029', 0, 0),
(111, 104, 'ธนาคารกรุงไทย', 'นัทธี กวยมงคล', '1820096386', 0, 0),
(112, 105, 'ธนาคารกสิกรไทย', 'โชคชัย สังฆทิพย์', '7702054677', 0, 0),
(113, 106, 'ธนาคารกรุงเทพ', 'ณัฐภาส ศรีพิพัฒนะกุล', '0760426361', 0, 0),
(114, 107, 'ธนาคารกรุงเทพ', 'mongkolchai', '0920230729', 0, 0),
(115, 108, 'ธนาคารกสิกรไทย', 'ณัฐยศ วรสารพิทักษ์', '4882016566', 0, 0),
(116, 109, 'ธนาคารกสิกรไทย', 'ศิริศักดิ์ ใบงาม', '4042277512', 0, 0),
(117, 110, 'ธนาคารกสิกรไทย', 'สุภชัย เนตรประสพสุข', '0162713000', 0, 0),
(118, 111, 'ธนาคารกรุงเทพ', 'พีระ ธัญญศรีสังข์', '0837866885', 0, 0),
(119, 112, 'ธนาคารกรุงเทพ', 'สาFi=', '9090120610', 0, 0),
(120, 113, 'ธนาคารกสิกรไทย', 'สุรพงษ์  ประไพ', '0043204122', 0, 0),
(121, 114, 'ธนาคารกรุงเทพ', 'เชาวลิต แรมจะบก', '1940697269', 0, 0),
(122, 115, 'ธนาคารกรุงเทพ', 'สุรสิทธิ์', '3764140996', 0, 0),
(123, 116, 'ธนาคารกสิกรไทย', 'ภูมินทร์ ธรรมขันธ์', '5542019435', 0, 0),
(124, 117, 'ธนาคารกสิกรไทย', 'สามารถ', '0888888888', 0, 0),
(125, 118, 'ธนาคารไทยพาณิชย์', 'อนุสรณ์ ประจวบเขต', '2812312116', 0, 0),
(126, 119, 'ธนาคารไทยพาณิชย์', 'sarawut', '3162619971', 0, 0),
(127, 120, 'ธนาคารกรุงเทพ', 'ประยุทธ สุกใส', '2050340351', 0, 0),
(128, 121, 'ธนาคารกสิกรไทย', 'นายภานุพัฒน์  หัสดัม', '8632660236', 0, 0),
(129, 122, 'ธนาคารกสิกรไทย', 'พรชัย พิมพกรรณ์', '7682116867', 0, 0),
(130, 123, 'ธนาคารกสิกรไทย', 'อริยพงษ์  เสนามงคล', '7302539264', 0, 0),
(131, 124, 'ธนาคารไทยพาณิชย์', 'ณัฐพล สอนสิงห์', '0015069926', 0, 0),
(132, 125, 'ธนาคารกรุงไทย', 'ิวิรัตน์  กันภัย', '2300227584', 0, 0),
(133, 126, 'ธนาคารไทยพาณิชย์', 'Kitsana set', '3102836821', 0, 0),
(134, 127, 'ธนาคารกรุงไทย', 'ชุมพร  ปิ่นโพธิ์', '4180268698', 0, 0),
(135, 128, 'ธนาคารกรุงเทพ', 'ดนัย ฤทัยเพชร', '2050420617', 0, 0),
(136, 129, 'ธนาคารไทยพาณิชย์', 'สรวิทย์ เทพรัตน์', '1732389475', 0, 0),
(137, 130, 'ธนาคารไทยพาณิชย์', 'Paiboon', '3130100566573', 0, 0),
(138, 131, 'ธนาคารไทยพาณิชย์', 'ปฏิพัทธ์', '1542177814', 0, 0),
(139, 132, 'ธนาคารไทยพาณิชย์', 'Sirinvadee tung', '3293758934', 0, 0),
(140, 133, 'ธนาคารกสิกรไทย', 'วรวุฒิ กลิ่นสุคนธ์', '7522266560', 0, 0),
(141, 134, 'ธนาคารไทยพาณิชย์', 'หัวหน้า คณะปฎิวัติ', '1602826078', 0, 0),
(142, 135, 'ธนาคารกรุงเทพ', 'นายกิตตินัฐ พวงชะบา', '3910945918', 0, 0),
(143, 136, 'ธนาคารไทยพาณิชย์', 'ธีรยุทธ วุฒิสังข์', '0602887222', 0, 0),
(144, 137, 'ธนาคารกรุงไทย', 'ไพโรจน์', '4081816689', 0, 0),
(145, 138, 'ธนาคารกรุงเทพ', 'AOA', '7350091620', 0, 0),
(146, 139, 'ธนาคารกสิกรไทย', 'วุฒิภัทร โตสกุล', '0000000000', 0, 0),
(147, 140, 'ธนาคารกสิกรไทย', 'กุลนิภา โพธิ์สินสมวงศ์', '7702020446', 0, 0),
(148, 141, 'ธนาคารกรุงเทพ', 'ธงชัย รุ่งเรืองสินงาม', '2654528310', 0, 0),
(149, 142, 'ธนาคารกรุงไทย', 'อดิศักดิ์  คงบุญ', '6031823551', 0, 0),
(150, 143, 'ธนาคารกสิกรไทย', 'มงคล หงษ์มัง', '7122408889', 0, 0),
(151, 144, 'ธนาคารกสิกรไทย', 'สัญญา', '1702936612', 0, 0),
(152, 145, 'ธนาคารกรุงไทย', 'อาชว์  ว่องเจริญ', '1521152101', 0, 0),
(153, 146, 'ธนาคารกสิกรไทย', 'นาย เมทนี วิบูลย์ธนภัณฑ์', '7542246493', 0, 0),
(154, 147, 'ธนาคารกสิกรไทย', 'นายปิยะวัฒน์    สุนทรปัญญาวุธ', '0618650051', 0, 0),
(155, 148, 'ธนาคารกสิกรไทย', 'สุริยะ คำชื่น', '0822683940', 0, 0),
(156, 149, 'ธนาคารไทยพาณิชย์', 'ธงชัย สุขรัตน์', '1452343911', 0, 0),
(157, 150, 'ธนาคารกรุงศรีอยุธยา', 'นาย ยุทธการ สิงห์อุด', '6411088223', 0, 0),
(158, 151, 'ธนาคารไทยพาณิชย์', 'วิวัฒน์ วงษ์ยอด', '0264052166', 0, 0),
(159, 152, 'ธนาคารไทยพาณิชย์', 'ศักดิ์ทนง  คำบัว', '3782061168', 0, 0),
(160, 153, 'ธนาคารกรุงไทย', 'นายกมล  มุนตะทุม', '9816645440', 0, 0),
(161, 154, 'ธนาคารกรุงเทพ', 'พีรวิชญ์', '1080658709', 0, 0),
(162, 155, 'ธนาคารกรุงเทพ', 'วิชัย', '1390830824', 0, 0),
(163, 156, 'ธนาคารกสิกรไทย', 'ชัยพจน์ กุลพรจิรพัฒน์', '1122606771', 0, 0),
(164, 157, 'ธนาคารไทยพาณิชย์', 'สมพร ชูเพ็ง', '9572131365', 0, 0),
(165, 158, 'ธนาคารกสิกรไทย', 'นันธวัช โลหะ', '7672057080', 0, 0),
(166, 159, 'ธนาคารกสิกรไทย', 'ฐาณัติ เอกดำรงค์', '7652536063', 0, 0),
(167, 160, 'ธนาคารกสิกรไทย', 'วรัญญู  มงคลกิจธนากร', '0113149760', 0, 0),
(168, 161, 'ธนาคารทหารไทย', 'สุขเกษม บรรเลงกิจ', '3022645646', 0, 0),
(169, 162, 'ธนาคารกสิกรไทย', 'ศรัณย์รัตน์ ศรีประเสริฐ', '7772280836', 0, 0),
(170, 163, 'ธนาคารไทยพาณิชย์', 'อภิชาติ เจี่ยดำรง', '6402587044', 0, 0),
(171, 164, 'ธนาคารกสิกรไทย', 'พงษ์พันธ์ พรหมสาลี', '5172176870', 0, 0),
(172, 165, 'ธนาคารกสิกรไทย', 'สาคร อาษาไทย', '0191740513', 0, 0),
(173, 166, 'ธนาคารกสิกรไทย', 'ชัยพจน์ กุลพรจิรพัฒน์', '1122606771', 0, 0),
(174, 167, 'ธนาคารกรุงไทย', 'Jhetniphet', '3490101367', 0, 0),
(175, 168, 'ธนาคารกสิกรไทย', 'โชติศักย์ เทพี', '6522367581', 0, 0),
(176, 169, 'ธนาคารกรุงไทย', 'เกวลินต์ พาวงศ์', '4400202046', 0, 0),
(177, 170, 'ธนาคารกรุงเทพ', 'นายอภิรักษ์ อ่อนตา', '3154220143', 0, 0),
(178, 171, 'ธนาคารกรุงเทพ', 'มะพร้าว', '1959900', 0, 0),
(179, 172, 'ธนาคารกรุงเทพ', 'ไทยเลย', '19595959547', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `group_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(6, 2, 1),
(7, 2, 2),
(8, 3, 3),
(13, 7, 3),
(16, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `product_username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `product_password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `usercode` int(5) NOT NULL,
  `created` varchar(19) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webboard_category`
--

CREATE TABLE `webboard_category` (
  `id` int(5) NOT NULL,
  `sort` int(2) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `webboard_category`
--

INSERT INTO `webboard_category` (`id`, `sort`, `name`, `count`) VALUES
(1, 1, 'แฟนบอล สนทนาทั่วไป', 1),
(2, 5, 'แฟนบอล สอบถามปัญหา', 0),
(3, 2, 'แฟนบอล ข่าวสารสาระ', 0),
(4, 6, 'แฟนบอล แจ้งเหตุ/ข้อผิดพลาด', 4),
(5, 4, 'แฟนบอล เกมส์ทายผล', 17),
(6, 3, 'แฟนบอล โปรโมชั่น', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webboard_comment`
--

CREATE TABLE `webboard_comment` (
  `id` int(5) NOT NULL,
  `webboard_topic_id` int(5) NOT NULL,
  `user_id` int(4) NOT NULL,
  `ip_address` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(4) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `edited` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `modified` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `webboard_comment`
--

INSERT INTO `webboard_comment` (`id`, `webboard_topic_id`, `user_id`, `ip_address`, `sort`, `comment`, `edited`, `datetime`, `modified`, `status`) VALUES
(23, 3, 2, '', 1, '<p> :oOo:</p>', '', '01/08/2016 15:25:05', '', 0),
(25, 9, 1, '', 1, '<p> :o-A: :o-A: :o-A:</p>', '', '18/08/2016 10:49:53', '', 0),
(26, 10, 2, '3076115323', 1, '<p>04:00	เอกวาดอร์ 	vs	 บราซิล	(0.25)	ทายบอลเดี่ยว</p>\n\n<p> :o-e:</p>', '', '01/09/2016 16:13:09', '', 0),
(27, 10, 3, '3076115323', 2, '<p>23:30	ตุรกี ยู-21 	vs	 ไซปรัส ยู-21	(0.75)</p>\n\n<p> :o-e:</p>', '', '01/09/2016 16:13:57', '', 0),
(28, 10, 4, '3076115323', 3, '<p>23:00	เอสโตเนีย ยู-21 	vs	 จอร์เจีย ยู-21	(0.25)</p>\n\n<p> :o-e:</p>', '', '01/09/2016 16:14:30', '', 0),
(29, 10, 5, '3076115323', 4, '<p>23:30	ตุรกี ยู-21 	vs	 ไซปรัส ยู-21	(0.75)</p>\n\n<p> :o-e:</p>', '', '01/09/2016 16:15:04', '', 0),
(30, 10, 6, '3076115323', 5, '<p>00:00	หมู่เกาะแฟโร ยู-21 	vs	 รัสเซีย ยู-21	(1.5)</p>\n\n<p> :o-e:</p>', '', '01/09/2016 16:15:42', '', 0),
(32, 21, 12, '3068665041', 1, '<p>51779 sbo ลิเวอร์พูลชนะ 1-0</p>', '', '05/09/2016 11:27:31', '', 0),
(33, 5, 20, '1999262897', 1, '<p>รับทราบครับ&nbsp; :o-v: :o-v:</p>', '', '06/09/2016 15:35:17', '', 0),
(34, 22, 23, '3742912804', 1, '<p>7898 sbo ขอโปรเล่นเกมทายผลคับ</p>', '', '06/09/2016 16:04:32', '', 0),
(35, 22, 22, '16884669', 2, '<p>50173 3m ขอรับโปรเล่นเกมส์ทายผลครับ</p>', '', '06/09/2016 16:06:42', '', 0),
(36, 21, 24, '456607460', 2, '<p>51600 ibc ลิเวอร์พูลชนะ 2-1</p>', '', '06/09/2016 16:19:03', '', 0),
(37, 21, 22, '16884669', 3, '<p>50173 3m ตอบ เสมอ 1-1</p>', '', '06/09/2016 16:26:22', '', 0),
(38, 21, 26, '837118988', 4, '<p>ลิเวอร์พลูชนะ3-1 :o-A:</p>', '', '06/09/2016 17:05:22', '', 0),
(39, 21, 28, '2001495376', 5, '<p>50468 SBO ลิเวอร์พูลชนะ 4-1</p>', '', '06/09/2016 17:25:42', '', 0),
(40, 21, 29, '1701637192', 6, '<p>9040 เวบไอบีซี<br />\nเสมอ 0-0</p>', '', '06/09/2016 20:08:01', '', 0),
(41, 21, 30, '456612362', 7, '<p>51671 sbo ตอบลิเวอร์พลูชนะ2-1ครับ</p>', '', '06/09/2016 21:28:37', '', 0),
(42, 21, 31, '837657707', 8, '<p>53581 sbo ตอบลิเวอร์พลูชนะ3-1ครับ</p>', '', '06/09/2016 22:13:05', '', 0),
(43, 22, 32, '1919765100', 3, '<p>53250 sbo ขอรับโปรเล่นเกมทายผลฟุตบอล ครับ</p>', '', '07/09/2016 02:41:56', '', 0),
(44, 21, 36, '3754949047', 9, '<p>69008 sbo ตอบ ลิเวอร์พูลชนะ 2-0</p>', '', '07/09/2016 12:34:58', '', 0),
(45, 21, 21, '2098829035', 10, '<p>51826 sbo ตอบ ลิเวอร์พูลชนะ 2-0 คับ</p>', '', '07/09/2016 13:12:59', '', 0),
(46, 21, 41, '3742917835', 11, '<p>7933 3m เลสเตอร์ชนะ 2-1</p>', '', '07/09/2016 14:33:40', '', 0),
(47, 21, 40, '3059598908', 12, '<p>เล่น sbobet รหัสสี่ตัวท้าย 50656 ลิเวอร์พูล ชนะ 3-1 ครับ</p>', '', '07/09/2016 14:33:46', '', 0),
(48, 21, 32, '19851710', 13, '<p>53250 sbo ทาย ลิเวอร์พูล เสมอ 1-1</p>', '', '07/09/2016 17:29:59', '', 0),
(49, 21, 43, '2875392895', 14, '<p>ยูส 9595<br />\nWeb ibc<br />\nลิเวอร์พูล เสมอ 1-1</p>', '', '07/09/2016 17:32:29', '', 0),
(50, 21, 50, '825357815', 15, '<p>ลิเวอร์พูล 1-1เลสเตอร์ ซิตี้</p>', '', '07/09/2016 21:43:53', '', 0),
(51, 21, 52, '1856505506', 16, '<p>9551 เล่นเวบไอบีซี<br />\nเสมอ 2:2</p>', '', '07/09/2016 22:58:39', '', 0),
(52, 21, 54, '3742906534', 17, '<p>ลิเวอร์พูล ชนะ 3-1</p>', '', '08/09/2016 09:52:33', '', 0),
(53, 21, 11, '3068689184', 18, '<p>50565 IBC เสมอ 1-1</p>', '', '08/09/2016 10:00:36', '', 0),
(54, 21, 38, '1991079681', 19, '<p>9188ibcตอบเสมอ 2-2</p>', '', '08/09/2016 10:09:47', '', 0),
(55, 21, 55, '3031899024', 20, '<p>53288 sbo  ลิเวอร์พูล 2-0เลสเตอร์ ซิตี้</p>', '', '08/09/2016 10:20:17', '', 0),
(56, 21, 33, '16826632', 21, '<p>50524 ibc ลิเวอร์พูล1-1เลสเตอร์</p>', '', '08/09/2016 11:24:59', '', 0),
(57, 21, 57, '973742850', 22, '<p>50966 SBQ ตอบ ลิเวอร์พูลชนะ&nbsp; 2-0 :o<3:</p>', '', '08/09/2016 11:34:36', '', 0),
(58, 21, 58, '2875453501', 23, '<p>50688 sbo ตอบ เลสเตอร์ชนะ 3-1</p>', '', '08/09/2016 12:34:49', '', 0),
(59, 21, 59, '1999263367', 24, '<p>เป็ดแพ้ 8-0 ครับ&nbsp; :o-A:</p>', '', '08/09/2016 15:00:59', '', 0),
(60, 21, 60, '2098828697', 25, '<p>7455 ibc เสมอ 1:1</p>', '', '08/09/2016 15:07:08', '', 0),
(61, 21, 61, '3068679899', 26, '<p>50412 3m ลิเวอร์พูล 2-1 เลสเตอร์</p>', '', '08/09/2016 15:12:45', '', 0),
(62, 21, 63, '3068705646', 27, '<p>51449 sbo ตอบ ลิเวอร์พูลเสมอเลสเตอร์ 2-2 ค้บ</p>', '', '08/09/2016 15:56:55', '', 0),
(63, 21, 64, '1935112610', 28, '<p>9034<br />\nเวบไอบีซี<br />\nลิเวอร์ ชนะ 1-0</p>', '', '08/09/2016 16:42:25', '', 0),
(64, 21, 15, '3068696339', 29, '<p>53011 sbo เสมอ 1-1</p>', '', '08/09/2016 16:45:13', '', 0),
(65, 21, 13, '3031920477', 30, '<p>51089 sbo ลิเวอร์พูลชนะ 2-1</p>', '', '08/09/2016 17:39:56', '', 0),
(66, 21, 67, '2875256919', 31, '<p>รหัส 9606 ไอบีซี<br />\nลิเวอร์พูล ชนะ 2-1</p>', '', '09/09/2016 05:52:52', '', 0),
(67, 21, 69, '1850590985', 32, '<p>50427  sbo  ตอบ ลิเวอร์พูล 0 - 1 เลสเตอร์ ซิติี้</p>', '', '09/09/2016 10:58:11', '', 0),
(68, 21, 72, '2098842681', 33, '<p>51905 sbo ตอบ ลิเวอร์พูลชนะ 3-0 ครับ</p>', '', '09/09/2016 11:29:10', '', 0),
(69, 21, 73, '17082239', 34, '<p>50611 ibc ลิเวอร์พูลชนะ 3-2</p>', '', '09/09/2016 15:03:15', '', 0),
(70, 21, 37, '456625931', 35, '<p>353512  IBC liverpool 1-1</p>', '', '09/09/2016 15:44:59', '', 0),
(71, 21, 75, '837214077', 36, '<p>sbqbet 53599 ตอบ ลิเวอร์พูล ชนะ&nbsp; 2-1 ครับ</p>', '', '09/09/2016 16:49:21', '', 0),
(72, 21, 76, '3742917601', 37, '<p>9015 m8bet ตอบ เลสเตอชนะ2-1</p>', '', '09/09/2016 17:37:34', '', 0),
(73, 21, 77, '3031905297', 38, '<p>51938 sbo เลสเตอร์ชนะ 1-0</p>', '', '09/09/2016 21:13:24', '', 0),
(74, 22, 78, '2875239414', 4, '<p>ลงชื่อรับโปรตรงนี้รึ ถ้าตรงนี้ 9483 sbo,ibc รับโปรทุกโปรครับ</p>', '', '09/09/2016 23:22:09', '', 0),
(76, 21, 83, '248456622', 39, '<p> :o-):<br />\nSBO เลสเตอร์ชนะ 99-0<br />\nSBO เลสเตอร์ชนะ 999-0<br />\nSBO เลสเตอร์ชนะ 9999-0<br />\nSBO เลสเตอร์ชนะ 99999-0</p>\n\n', '', '10/09/2016 00:43:05', '', 0),
(77, 21, 84, '3742919597', 40, '<p>9415 ibc เสมอกัน 2-2</p>', '', '10/09/2016 03:27:26', '', 0),
(78, 21, 85, '456641856', 41, '<p>9150 web sbo<br />\nLiverpool 3-1</p>', '', '10/09/2016 04:08:58', '', 0),
(79, 21, 87, '3754949208', 42, '<p>51190 ibc ตอบว่า ลิเวอรพูลชนะ 3-1</p>', '', '10/09/2016 07:38:09', '', 0),
(80, 24, 59, '1850599136', 2, '<p> :o-A: :o-A: :o-A: :o-A:</p>', '', '10/09/2016 08:29:07', '', 0),
(81, 21, 89, '1850599136', 43, '<p>เลสเตอร์ 3- ลิเวอ1 คับ</p>', '', '10/09/2016 08:29:43', '', 0),
(82, 21, 90, '1991064388', 44, '<p>69005 sbo ตอบ ลิเวอร์พูลชนะ4-2</p>', '', '10/09/2016 09:10:59', '', 0),
(83, 21, 91, '1935113552', 45, '<p>50461 sbo ตอบ ลิเวอร์พูลชนะ 3-0 คับ</p>', '', '10/09/2016 10:05:07', '', 0),
(84, 21, 92, '2001498551', 46, '<p>เล่น ibc 50615 ตอบ ลิเวอร์พูล ชนะ 2-1 ครับ</p>', '', '10/09/2016 10:31:09', '', 0),
(85, 21, 92, '2001498551', 47, '<p>ibc 50615 ตอบ ลิเวอร์พูลชนะ 2-1 คับ</p>', '', '10/09/2016 10:33:23', '', 0),
(88, 21, 35, '837668497', 48, '<p>sbqbet 53497 ตอบ ลิเวอร์พูล ชนะ 2-0 :o-o:</p>', '', '10/09/2016 10:55:59', '', 0),
(89, 21, 93, '2088418931', 49, '<p>Sbo 50710 ตอบว่าเสมอกัน 1-1</p>', '', '10/09/2016 11:03:19', '', 0),
(90, 21, 16, '3031905569', 50, '<p>53004 sbo ทายว่า ลิเวอร์พูลชนะ 3-1 ครับ&nbsp; <br />\n :o-v:</p>', '', '10/09/2016 11:05:05', '', 0),
(91, 21, 96, '3068693573', 51, '<p>IBC 9562 ตอบ ลิเวอร์พูล แพ้ เลสเตอร์ 1:2</p>', '', '10/09/2016 11:33:41', '', 0),
(93, 21, 95, '3076114554', 52, '<p>ยัดสูงเลยคับ</p>', '<p>เป็ดตูดบานชัวร์ เชื่อผม ผมเซียนผมเรียนมา&nbsp; :o-v: :o-v:</p>__10/09/2016 11:59:07&nbsp;183.89.200.122<br><p>สูงแน่คู่นี้</p>__10/09/2016 12:03:48&nbsp;183.89.200.122<br>', '10/09/2016 11:50:51', '10/09/2016 12:03:48', 0),
(94, 21, 98, '2875244389', 53, '<p>50040 sbo ตอบว่า ลิวอร์พูล 3 - 2 เลสเตอร์</p>', '', '10/09/2016 11:51:50', '', 0),
(95, 21, 100, '456640923', 54, '<p>50775 sob  ตอบ&nbsp; ลิเวอร์ชนะ 2 - 1</p>', '', '10/09/2016 12:48:22', '', 0),
(96, 21, 86, '19890852', 55, '<p>50488 sbo ตอบ ลิเวอร์พูลชนะ2-1</p>', '', '10/09/2016 12:52:56', '', 0),
(97, 21, 74, '3742913158', 56, '<p>sbobet 53061 ตอบ ลิเวอร์พูล ชนะ 3-1</p>', '', '10/09/2016 12:56:52', '', 0),
(98, 21, 56, '2046913505', 57, '<p>3256 sbo เสมอ 2-2</p>', '', '10/09/2016 13:05:05', '', 0),
(99, 21, 101, '3076110954', 58, '<p>3319  sbobet  ตอบ ลิเวอร์พลู 5 - 1 เลสเตอร์</p>', '', '10/09/2016 13:51:14', '', 0),
(100, 21, 78, '456630887', 59, '<p>9483 sbo ตอบ ลิเวอร์เสมอ เลสเตอร์ 2-2</p>', '', '10/09/2016 14:04:37', '', 0),
(101, 21, 102, '2869294562', 60, '<p>50208 sbo  ลิเวอร์พูลชนะ 4-2</p>', '', '10/09/2016 15:50:27', '', 0),
(102, 21, 27, '3068666436', 61, '<p>sbqbet 51467  ตอบ ลิเวอร์พูล ชนะ 1-0</p>', '', '10/09/2016 16:12:18', '', 0),
(103, 21, 103, '19836542', 62, '<p>8160 ibc ตอบ Liverpool ชนะ 3-0</p>', '', '10/09/2016 16:37:36', '', 0),
(104, 21, 104, '825356194', 63, '<p>79001 sbo ตอบ ลิเวอร์พูลชนะ 1-0 คับ</p>', '', '10/09/2016 16:42:48', '', 0),
(105, 21, 20, '3076114554', 64, '<p>หมดเวลาทายผล เวลา 18.00น. วันที่10 กันยายน 2559 ไม่มีต่อเวลานะครับ รีบๆนะครับท่านใดที่ยังไม่ตอบ</p>', '', '10/09/2016 17:02:34', '', 0),
(106, 21, 105, '19817326', 65, '<p>7433 sbo ลิเวอร์พูล ชนะ 1-0</p>', '', '10/09/2016 17:22:47', '', 0),
(107, 21, 106, '3031912682', 66, '<p>9129 sbo ลิเวอร์พูลชนะ 1 ต่อ 0</p>', '', '10/09/2016 17:27:48', '', 0),
(108, 21, 94, '19834474', 67, '<p>Sbo. 50151. ตอบ. เสมอ. 2-2</p>', '', '10/09/2016 17:30:15', '', 0),
(109, 21, 94, '19800102', 68, '<p>50151 sbo. ตอบ. เสมอ 2-2</p>', '', '10/09/2016 17:39:24', '', 0),
(110, 21, 107, '3742909172', 69, '<p>Ibc 53105  ตอบ เสมอ1-1 เพิ่งสมัครได้ครัลไปเว็บเดิมfanball888<br />\nOrg มา</p>', '', '10/09/2016 21:17:42', '', 0),
(111, 21, 1, '19908760', 70, '<p>ยินดีกับท่านสมาชิกเพียงหนึ่งเดียวของเรา ที่โครตเก่ง มหาเฮง รับรางวัลไปเต็มๆ 20000 บาทจากการทายผลว่า<br />\n50468 SBO ลิเวอร์พูลชนะ 4-1<br />\n :o-v: :o-v: :o-v:<br />\nทางทีมงาน fanball88 จะขอตรวจสอบคุณสมบัติ และมอบเงินรางวัลให้กับท่านสมาชิกที่แสนจะโชคดี รับเงินไปแบบมีคนอิจฉา 20000บาทในเว็บที่ท่านเล่นในเย็นวันพรุ่งนี้ครับ หากท่านสมาชิกคุณสมบัติไม่ครบก็จะเปิดโอกาสให้ทายกันอีกในวันพรุ่งนี้นะครับ&nbsp; หวังว่าท่านสมาชิกทุกท่านจะอ่านแล้วเข้าใจกติกาเพื่อประโยชน์ของท่านสมาชิกเองนะครับ&nbsp; เราแจกกันต่อเนื่องทุกอาทิตย์ครับ&nbsp; :o->: :o->: เฮงๆๆ</p>', '', '11/09/2016 01:36:59', '', 1),
(112, 21, 28, '2001495485', 71, '<p>ถูกด้วยแฮะ ไม่ต้องหารใคร&nbsp; แฟนหงส์ก็งี้&nbsp; อิ่มมมม&nbsp; :o-p:</p>', '', '11/09/2016 10:14:40', '', 0),
(113, 21, 28, '2001495485', 72, '<p>50468 ได้รับเครดิต ฟรี 20,000- เรียบร้อยแล้วจ้า</p>\n\n<p>ขอบคุณแฟนบอลครับ :o->:</p>', '', '11/09/2016 15:02:58', '', 0),
(114, 22, 98, '1731412051', 5, '<p>50040 sbo ขอรับโปรแกรมด้วยคับ</p>', '', '12/09/2016 15:25:44', '', 0),
(115, 27, 109, '19825225', 1, '<p>Sbq1491เอฟเวอตันเสมอ1~1</p>', '', '13/09/2016 09:18:51', '', 0),
(116, 27, 38, '1991081442', 2, '<p>9188ibc เอฟเวอร์ตันชนะ3-0</p>', '', '13/09/2016 09:39:35', '', 0),
(117, 27, 107, '456628895', 3, '<p>53105 ibc ตอบเอฟเวอรตัน ชนะ 3-1</p>', '', '13/09/2016 10:28:16', '', 0),
(118, 27, 60, '3742901150', 4, '<p>7455 ibc เอฟเวอรตันชนะ 4:1</p>', '', '13/09/2016 11:24:14', '', 0),
(119, 27, 72, '2098843039', 5, '<p>51905 sbo เอฟเวอรตันชนะ 2-0</p>', '', '13/09/2016 11:49:56', '', 0),
(120, 27, 50, '1029348622', 6, '<p>เอฟเวอร์ตัน ชนะ 2 - 1 :^-^:</p>', '', '13/09/2016 14:53:42', '', 0),
(121, 27, 73, '17080459', 7, '<p>50611 ibc  เอฟเวอร์ตัน แพ้ มิดเดิ้ลสโบร์&nbsp; 1-2</p>', '', '13/09/2016 15:54:07', '', 0),
(122, 27, 29, '1701635495', 8, '<p>9040 เวบไอบีซี<br />\nเสมอ 0-0</p>', '', '13/09/2016 20:07:04', '', 0),
(123, 27, 12, '3068662802', 9, '<p>51779 sbo เอฟเวอร์ตันชนะ 2-1 ครับ</p>', '', '13/09/2016 21:55:18', '', 0),
(124, 27, 110, '837050623', 10, '<p>9371 sbo เสมอ 1:1</p>', '', '14/09/2016 03:06:36', '', 0),
(125, 27, 111, '979465397', 11, '<p>\n51395 sbo เอฟเวอร์ตัน แพ้1-2 มิดเดิ้ลสโบร์ส<br /></p>', '', '14/09/2016 10:59:55', '', 0),
(126, 27, 111, '979465397', 12, '<p>51395 sbo เอฟเวอร์ตัน แพ้ 1-2</p>', '', '14/09/2016 11:13:44', '', 0),
(127, 27, 21, '3031904217', 13, '<p>51826 sbo เอฟเวอร์ตันชนะ 1-0 <br />\n :o-p: :o-p: :o-p:</p>', '', '14/09/2016 11:47:44', '', 0),
(128, 27, 57, '973742850', 14, '<p>50966 SBO &nbsp; ตอบเสมอ0-0</p>', '', '14/09/2016 12:09:45', '', 0),
(129, 27, 100, '3031937368', 15, '<p>50775 sbo เอฟเวอร์ต้นชนะ 2 - 1</p>', '', '14/09/2016 16:07:44', '', 0),
(130, 27, 55, '2869426124', 16, '<p>53288 sbo จบ เอฟเวอร์ตันชนะ 2-0</p>', '', '14/09/2016 18:01:32', '', 0),
(131, 27, 16, '3031928393', 17, '<p>53004 sbo เอฟเวอร์ตันชนะ 3-1</p>', '', '14/09/2016 18:32:25', '', 0),
(132, 27, 43, '2875393001', 18, '<p>9595<br />\nWeb ibc<br />\nเสมอ 2-2</p>', '', '14/09/2016 18:40:17', '', 0),
(133, 27, 52, '1856563213', 19, '<p>9551 เล่นเวบไอบีซี<br />\nเอฟ ชนะ 1-0</p>', '', '14/09/2016 20:23:48', '', 0),
(134, 27, 41, '3742909479', 20, '<p>7933 3m มิสเดิลโบร์ล ชนะ 3-1</p>', '', '14/09/2016 21:07:01', '', 0),
(135, 27, 28, '2001495373', 21, '<p>ทำไมไม่ขึ้นหว่า.....</p>\n\n<p>50468 เอฟเวอร์ตัน 4-2 มิดเดิ้ลสโบร์</p>', '', '15/09/2016 11:46:39', '', 0),
(136, 27, 22, '1806838841', 22, '<p>50173 3m ตอบ เอฟเวอร์ตันชนะ 3:0</p>', '', '15/09/2016 14:11:54', '', 0),
(137, 27, 32, '19890933', 23, '<p>53250 sbo ทาย มิดเดิ้ลสโบร์ส ชนะ 1-0</p>', '', '15/09/2016 16:22:36', '', 0),
(138, 27, 11, '2875472369', 24, '<p>50565 IBC เอฟเวอตันชนะ 2-0 ครับ</p>\n\n<p>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  javascript:void(0);</p>', '', '15/09/2016 19:29:03', '', 0),
(139, 27, 13, '3031903344', 25, '<p>51089 sbo เอฟเวอร์ตัน ชนะ 3-0 ครับ</p>', '', '15/09/2016 19:51:17', '', 0),
(140, 27, 101, '3076111905', 26, '<p>sbo 3319 เอฟเวอร์ตันชนะ 4-2</p>', '', '15/09/2016 22:14:53', '', 0),
(141, 27, 67, '2875256869', 27, '<p>9606<br />\nIBC<br />\nEVERTON 2:0</p>', '', '16/09/2016 04:15:54', '', 0),
(142, 27, 15, '837118795', 28, '<p>53011 sbo เสมอ 1-1</p>', '', '16/09/2016 12:34:46', '', 0),
(143, 27, 77, '3031902743', 29, '<p>51938 sbo เอฟเวอร์ตันชนะ3-2<br />\n :^-^: :^-^: :^-^:</p>', '', '16/09/2016 14:43:17', '', 0),
(144, 27, 58, '2875453501', 30, '<p>50688 sbo ตอบ เอฟเวอตัน ชนะ 3-0  :o-p:</p>', '', '16/09/2016 15:24:39', '', 0),
(145, 27, 112, '1697870572', 31, '<p>53342 3m เอฟเวอร์ตันชนะ 3-0</p>', '', '16/09/2016 15:53:41', '', 0),
(146, 27, 61, '973838170', 32, '<p>50412 เวป 3M เสมอ 0-0 สุดมันส์พะยะค่ะ</p>', '', '16/09/2016 16:09:40', '', 0),
(147, 27, 113, '3068684035', 33, '<p>เอฟเวอร์ตัน ชนะ&nbsp; มิดเดิ้ลสโบร 2-1</p>', '', '16/09/2016 20:44:28', '', 0),
(148, 27, 114, '1701590831', 34, '<p>เล่น IBCBET 8169  เสมอ 0-0 ครับ</p>', '', '16/09/2016 21:33:03', '', 0),
(149, 27, 98, '2088288270', 35, '<p>50040 sbo ตอบว่า เอฟเวอร์ตัน ชนะ 4-1</p>', '', '16/09/2016 23:08:17', '', 0),
(150, 27, 69, '3754752370', 36, '<p>50427 sbo ตอบ&nbsp; มิดเดิ้ลสโบห์ ชนะ 1-0</p>', '', '17/09/2016 02:51:29', '', 0),
(151, 27, 85, '3742902463', 37, '<p>9150<br />\nเล่นเวบเอสบีโอ<br />\nตอบ เอฟ ชนะ 2-1</p>', '', '17/09/2016 06:00:22', '', 0),
(152, 27, 106, '3031917840', 38, '<p>9129  เอฟเวอร์ตันชนะ 3 ต่อ 1</p>', '', '17/09/2016 06:39:46', '', 0),
(153, 27, 106, '3031917840', 39, '<p>ขอโทษครับ 9129 เวป sbo ครับ</p>', '', '17/09/2016 06:41:05', '', 0),
(154, 27, 92, '3754884013', 40, '<p>50615 ibc เอฟเวอรตันชนะ 1-0</p>', '', '17/09/2016 07:18:05', '', 0),
(155, 27, 87, '3754948302', 41, '<p>51190 ไอบีซี ตอบว่า เอฟเวอตันชนะ 4 - 1</p>', '', '17/09/2016 07:34:25', '', 0),
(156, 27, 84, '3742895077', 42, '<p>9415 ibc เสมอกัน 2-2</p>', '', '17/09/2016 07:56:39', '', 0),
(157, 27, 90, '462532661', 43, '<p>69005 sbo ตอบ เอฟเวอร์ตันชนะ2-1</p>', '', '17/09/2016 08:02:16', '', 0),
(158, 27, 96, '3068685336', 44, '<p>IBC 9562 ตอบ เอฟเวอร์ตัน ชนะ 2:0 ครับ</p>', '', '17/09/2016 08:53:39', '', 0),
(159, 27, 93, '979465397', 45, '<p>sbo 50710 ตอบว่า เอฟเวอร์ตัน ชนะ 2-0</p>', '', '17/09/2016 10:11:06', '', 0),
(160, 27, 63, '979465397', 46, '<p>sbo 51449  ตอบว่า เอฟเวอร์ตันชนะ 4-0</p>', '', '17/09/2016 10:12:57', '', 0),
(161, 27, 75, '837163314', 47, '<p>53599 &nbsp; sbq  ตอบ&nbsp; เอฟเวอร์ตัน&nbsp; ชนะ 2-1 :oOo:</p>', '', '17/09/2016 12:20:11', '', 0),
(162, 27, 35, '837663240', 48, '<p>53497 SBQ  ตอบ&nbsp; เอฟเวอร์ตัน ชนะ 2-0</p>', '', '17/09/2016 12:43:17', '', 0),
(163, 27, 116, '19884336', 49, '<p>9527 sbo ตอบ มิดเดิ้ลสโบร์ส ชนะ 2-1</p>', '', '17/09/2016 13:08:26', '', 0),
(164, 27, 78, '2875238960', 50, '<p>9483sbo ตอบ เอฟเวอตันแพ้ มิดเดิลสโบร์ 2-3</p>', '', '17/09/2016 13:09:00', '', 0),
(165, 27, 30, '456608117', 51, '<p>51671 sbo ตอบ เอฟเวอร์ตันชนะ2-0ครับ</p>', '', '17/09/2016 13:13:20', '', 0),
(166, 27, 105, '19916667', 52, '<p>7433 sbo โบโร่ชนะ 2-0</p>', '', '17/09/2016 13:35:56', '', 0),
(167, 27, 86, '19810787', 53, '<p>50488 sbo เอฟเวอร์ตัน ชนะ 2-1</p>', '', '17/09/2016 14:08:06', '', 0),
(168, 27, 64, '1935112522', 54, '<p>9034<br />\nIBC<br />\nเอฟเวอร์ตัน ชนะ 3-1</p>', '', '17/09/2016 14:47:45', '', 0),
(169, 27, 27, '3068690481', 55, '<p>51467 sbq ตอบ&nbsp; เอฟเวอร์ตัน ชนะ 2-0</p>', '', '17/09/2016 15:09:17', '', 0),
(170, 27, 26, '3068675900', 56, '<p>เอฟเวอร์ตันชนะ 3-0</p>', '', '17/09/2016 16:34:36', '', 0),
(171, 27, 74, '456625437', 57, '<p>53061 sbo ตอบ เอฟเวอร์ตัน&nbsp; ชนะ&nbsp; 3-1</p>', '', '17/09/2016 17:08:07', '', 0),
(172, 27, 76, '456626961', 58, '<p>Bkj3379015 ทาย<br />\nEverton ชนะ 3-1</p>', '', '17/09/2016 17:08:29', '', 0),
(173, 27, 36, '3390911708', 59, '<p>69008 sbo ตอบเสมอ 2-2</p>', '', '17/09/2016 17:22:09', '', 0),
(174, 27, 102, '2869293933', 60, '<p>50208 sbo ตอบ เสมอ 00</p>', '', '17/09/2016 17:46:09', '', 0),
(175, 27, 94, '19876346', 61, '<p>Sbo. 50151 ตอบ เอฟเวอร์ตัน ชนะ 3-1</p>', '', '17/09/2016 17:46:43', '', 0),
(176, 27, 56, '1850596767', 62, '<p>3256 sbo เสมอ 2-2</p>', '', '17/09/2016 17:59:30', '', 0),
(177, 27, 1, '3076115902', 63, '<p>ยินดีกับท่านสมาชิกที่ทายผลการแข่งขันระหว่าง เอฟเวอร์ตัน VS มิดเดิ้ลสโบร์ส ว่า เอฟเวอตันจะชนะไปด้วยสกอร์3&#8212;1 เป็นผลให้มีผู้โชคดีรับเงินรางวัลไปทั้งสิ้น 7ท่าน ดังนี้ <br />\n53105 ibc ตอบเอฟเวอรตัน ชนะ 3-1<br />\n53004 sbo เอฟเวอร์ตันชนะ 3-1<br />\n9129sbo เอฟเวอร์ตันชนะ 3 ต่อ 1<br />\n9034IBCเอฟเวอร์ตัน ชนะ 3-1<br />\n53061 sbo ตอบ เอฟเวอร์ตัน&nbsp; ชนะ&nbsp; 3-1<br />\nBkj3379015 ทายEverton ชนะ 3-1<br />\nSbo. 50151 ตอบ เอฟเวอร์ตัน ชนะ 3-1<br />\n ขอแสดงความยินดีกับท่านสมาชิกทั้ง7ท่าน โดยจะแบ่งเงินรางวัล ไปท่านละ 2857 บาท โดยทางทีมงานจะขอตรวจสอบคุณสมบัติ และจะมอบเงินรางวัลในเว็บของท่านในเย็นวันอาทิตย์ นะครับ ขอให้โชคดีกันอย่างนี้อีกในวันเสาร์หน้าครับ เฮงๆๆ เราแจกกันอย่างต่อเนื่องครับ</p>\n\n', '', '18/09/2016 01:34:01', '', 1),
(178, 28, 58, '2875453501', 1, '<p>50688 sbo ตอบ อาร์เซน่อลชนะ 3-1</p>', '', '21/09/2016 10:20:03', '', 0),
(179, 28, 41, '825293396', 2, '<p>7933 3m อาเซนอลชนะ 2-0</p>', '', '21/09/2016 10:49:16', '', 0),
(180, 28, 24, '3742902782', 3, '<p>1600 ibc อาเชน่อล ชนะ 3-2</p>', '', '21/09/2016 11:08:10', '', 0),
(181, 28, 12, '3068666252', 4, '<p>51779 sbo อาร์เซน่อลชนะ 1-0</p>', '', '21/09/2016 11:42:29', '', 0),
(182, 28, 113, '3068682593', 5, '<p> เล่น sbobet  3663 &nbsp; อาเซน่อล ชนะ 3-1 ครับ</p>', '', '21/09/2016 12:43:00', '', 0),
(183, 28, 122, '19892603', 6, '<p>อาเซน่อล เสมอ เซลซี 4 - 4</p>', '', '21/09/2016 13:32:38', '', 0),
(184, 28, 111, '461545553', 7, '<p>51395 sbo อาเซน่อล ชนะ 3-0</p>', '', '21/09/2016 14:20:09', '', 0),
(185, 28, 55, '2869426987', 8, '<p>53288 sbo เสอม 2-2</p>', '', '21/09/2016 17:34:00', '', 0),
(186, 28, 29, '1856563434', 9, '<p>9040<br />\nไอบีซี<br />\nเสมอ 1-1</p>', '', '21/09/2016 20:03:09', '', 0),
(187, 28, 52, '1856563338', 10, '<p>ยูส 9551<br />\nibc<br />\nตอบ เสมอ 2-2</p>', '', '21/09/2016 21:12:59', '', 0),
(188, 28, 110, '837050431', 11, '<p>9371 sbo<br />\nArsenal ชนะ 1-0</p>', '', '21/09/2016 22:11:01', '', 0),
(189, 28, 15, '837105072', 12, '<p>53011 sbo เสมอกัน 1-1</p>', '', '21/09/2016 23:04:40', '', 0),
(190, 28, 73, '1950017964', 13, '<p>50611 ibc อาเซนอล เสมอ เชลชี&nbsp; 1-1</p>', '', '22/09/2016 09:29:49', '', 0),
(191, 28, 33, '16828410', 14, '<p>50524 ibc เสมอ1-1</p>', '', '22/09/2016 10:10:04', '', 0),
(192, 28, 40, '1778439165', 15, '<p>50656 sbo ตอบ เสมอ 1-1</p>', '', '22/09/2016 10:25:30', '', 0),
(193, 28, 123, '3407162110', 16, '<p>50115  sbo  เซลซี ชนะ 0 - 2</p>', '', '22/09/2016 10:27:41', '', 0),
(194, 28, 125, '1850594834', 17, '<p>50599 sbo เสมอ 3-3</p>', '', '22/09/2016 13:10:09', '', 0),
(195, 28, 43, '2875410505', 18, '<p>9595 ibc<br />\nArsenal 0-1 Chelsea</p>', '', '22/09/2016 16:15:20', '', 0),
(196, 28, 60, '2098828966', 19, '<p>7455 IBC  เสมอกัน&nbsp; 1:1</p>', '', '22/09/2016 16:42:01', '', 0),
(197, 28, 11, '2875472369', 20, '<p>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   50565 IBC เชลซี ชนะ 3-2</p>', '', '23/09/2016 08:13:34', '', 0),
(198, 28, 69, '2680222013', 21, '<p>50427 sbo ตอบ อาร์เซน่อล 0 - 1 เชลซี</p>', '', '23/09/2016 10:22:55', '', 0),
(199, 28, 98, '1731412051', 22, '<p>50040 sbo ตอบว่า อาร์เซน่อล ชนะ&nbsp; 4-1</p>', '', '23/09/2016 10:25:24', '', 0),
(200, 28, 72, '2098843039', 23, '<p>51905 sbo เสมอ 0-0<br />\n :o-O: :o-O: :o-O:</p>', '', '23/09/2016 12:05:57', '', 0),
(201, 28, 50, '1029345683', 24, '<p>เสมอ 1-1 คับฟันธง</p>', '', '23/09/2016 12:22:08', '', 0),
(202, 28, 63, '3068675345', 25, '<p>Sbo 51449 ตอบค้บ อาร์เชน่อล แพั เชลชี 1-2 ค้บ</p>', '', '23/09/2016 16:14:05', '', 0),
(203, 28, 32, '19827636', 26, '<p>53250 sbo ทาย อาเซน่อล ชนะ 2-1</p>', '', '23/09/2016 17:20:00', '', 0),
(204, 28, 16, '3076017876', 27, '<p>53004 sbo เชลชี ชนะ 1-0</p>', '', '23/09/2016 19:29:58', '', 0),
(205, 28, 38, '1991078596', 28, '<p>9188ibc ตอบ เสมอ0-0</p>', '', '23/09/2016 19:54:03', '', 0),
(206, 28, 21, '3076014775', 29, '<p>51826 sbo ตอบ อาร์เซน่อลชนะ2-0</p>', '', '23/09/2016 20:15:56', '', 0),
(207, 28, 57, '973742850', 30, '<p>50966  sbo &nbsp; ตอบเสมอ 0-0</p>', '', '24/09/2016 01:39:39', '', 0),
(208, 28, 67, '2875256932', 31, '<p>9606<br />\nIBC<br />\nอาร์เซ ชนะ 2-1</p>', '', '24/09/2016 02:06:32', '', 0),
(209, 28, 61, '973838170', 32, '<p>50412 WEB 3M เสมอ 3-3 มันส์สุดๆๆๆๆๆๆ</p>', '', '24/09/2016 03:43:19', '', 0),
(210, 28, 25, '19874633', 33, '<p>8268ibc อาเซน่อลชนะ2-1</p>', '', '24/09/2016 05:50:14', '', 0),
(211, 28, 106, '3076012588', 34, '<p>9129 sbo เชลซี ชนะ 2 ต่อ 1 ครับ</p>', '', '24/09/2016 06:11:19', '', 0),
(212, 28, 119, '2875257867', 35, '<p>50721 sbo 0-0</p>', '', '24/09/2016 06:26:51', '', 0),
(213, 28, 92, '19866442', 36, '<p>50615 ibc ตอบ อาเซน่อล เสมอ เซลซี 2 : 2</p>', '', '24/09/2016 08:33:38', '', 0),
(214, 28, 115, '3068677440', 37, '<p>ยุส 9214 เวบ ibc ตอบ อาร์เซน่อล ชนะ 2-0</p>', '', '24/09/2016 08:52:56', '', 0),
(215, 28, 75, '3068686821', 38, '<p>53599 sbq &nbsp; ตอบ อาร์เซน่อล ชนะ 2-1</p>', '', '24/09/2016 08:58:57', '', 0),
(216, 28, 128, '2875239173', 39, '<p>1622 sbo อาร์เซน่อล เสมอ เชลซี สกอร์ 2-2 ประตู</p>', '', '24/09/2016 09:21:52', '', 0),
(217, 28, 96, '3068671502', 40, '<p>IBC 9562 ตอบ อาเซน่อล แพ้ เชลซี 1:3</p>', '', '24/09/2016 09:39:09', '', 0),
(218, 28, 84, '456598748', 41, '<p>9415 ibc  เสมอกัน 2-2</p>', '', '24/09/2016 09:42:17', '', 0),
(219, 28, 35, '837672421', 42, '<p>53497 sbq ตอบ&nbsp; อาร์เซน่อล เสมอ 1-1</p>', '', '24/09/2016 10:10:36', '', 0),
(220, 28, 76, '3742894241', 43, '<p>Bkj3353515 m8<br />\nตอบ อาเซน่อล เสมอ เชลซี1-1</p>', '', '24/09/2016 10:13:01', '', 0),
(221, 28, 56, '2046913505', 44, '<p>3256 Sbo เชลชี ชนะ 1-0</p>', '', '24/09/2016 10:45:35', '', 0),
(222, 28, 126, '837215865', 45, '<p>51744 sbo chelsae win 2-0</p>', '', '24/09/2016 11:03:57', '', 0),
(223, 28, 93, '2875272714', 46, '<p>50710 sbo ตอบว่า เสมอกัน 1-1</p>', '', '24/09/2016 11:47:57', '', 0),
(224, 28, 105, '19795190', 47, '<p>7433 sbo เสมอ 0-0</p>', '', '24/09/2016 12:01:35', '', 0),
(225, 28, 30, '456626022', 48, '<p>51671 sbo ตอบ เสมอ 1-1ครับ</p>', '', '24/09/2016 12:02:15', '', 0),
(226, 28, 129, '2001495253', 49, '<p>ทำไมมันไม่ขึ้นฟระ <br />\n50468 SBO  ตอบ เสมอ&nbsp; 3-3</p>', '', '24/09/2016 12:06:37', '', 0),
(227, 28, 87, '3754949245', 50, '<p>51190.&nbsp; Ibc. ,อาเซนอลชนะ 3-2 เชลซี</p>', '', '24/09/2016 12:13:37', '', 0),
(228, 28, 65, '19792364', 51, '<p>9324 IBC อาร์เซน่อล เสมอ 1 - 1  ครับ</p>', '', '24/09/2016 12:14:43', '', 0),
(229, 28, 77, '2098842681', 52, '<p>51938 sbo เชลชีชนะ 2-1</p>', '', '24/09/2016 12:46:07', '', 0),
(230, 28, 116, '19868667', 53, '<p>9527 sbo ตอบ เชลซี ชนะ 3-1</p>', '', '24/09/2016 12:48:18', '', 0),
(231, 28, 131, '462522292', 54, '<p>8100 Sbo อาร์เซนอล ชนะ 1-0</p>', '', '24/09/2016 13:01:42', '', 0),
(232, 28, 130, '3068681800', 55, '<p>51076 sbo :arsenal 2:chesea4</p>', '', '24/09/2016 13:03:28', '', 0),
(233, 28, 13, '3031903429', 56, '<p>51089 sbo อาร์เซน่อลชนะ 2-1 ครับ</p>', '', '24/09/2016 13:41:04', '', 0),
(234, 28, 90, '3390911708', 57, '<p>69005 sbo ตอบ เสมอ3-3</p>', '', '24/09/2016 13:41:05', '', 0),
(235, 28, 85, '3742892737', 58, '<p>9150 sbo ปืน ชนะ 3-1</p>', '', '24/09/2016 14:04:58', '', 0),
(236, 28, 132, '3068692162', 59, '<p>53027 <br />\nSbobet<br />\nอาร์เซน่อล 2-1 เชลซี</p>', '', '24/09/2016 14:22:30', '', 0),
(237, 28, 107, '456650293', 60, '<p>53105 ibc ตอบเสมอ2-2</p>', '', '24/09/2016 14:29:39', '', 0),
(238, 28, 27, '837090236', 61, '<p>51467 sbq ตอบ อาร์เซน่อล ชนะ 1-0</p>', '', '24/09/2016 15:03:48', '', 0),
(239, 28, 94, '19907845', 62, '<p>Sbo. 50151 ตอบ เสมอ 2-2</p>', '', '24/09/2016 15:28:19', '', 0),
(240, 28, 101, '3031929831', 63, '<p>53319 sbo อาร์เซนอล 5-3 เชลซี</p>', '', '24/09/2016 16:05:56', '', 0),
(241, 28, 91, '2875287326', 64, '<p>50461 sbo  อาร์เซนอล แพ้ 0-3 เชลซี</p>', '', '24/09/2016 16:33:21', '', 0),
(242, 28, 74, '3742918076', 65, '<p>53061 SBO ตอบ อาร์เซน่อล ชนะ 2-0</p>', '', '24/09/2016 16:50:02', '', 0),
(243, 28, 86, '19849451', 66, '<p>50488 sbo เสมอ 1-1</p>', '', '24/09/2016 17:11:03', '', 0),
(244, 28, 78, '3742894093', 67, '<p>9483 sbo เสมอ 3-3</p>', '', '24/09/2016 17:44:32', '', 0),
(245, 28, 1, '3076116006', 68, '<p>ยินดีกับผู้โชคดีที่ เก่งมหาเฮง อีกแล้ว ทายถูกว่า อาร์เซน่อลจะเปิดบ้านถล่มเชลซี ไปอย่างท่วมถ้น 3&#8212;0 มีผลให้ท่านผูโชคดีเพียง1ท่านคือ <br />\n51395 sbo อาเซน่อล ชนะ 3-0 <br />\nรับรางวัลไปท่านเดียวเต็มๆ 20000 บาทครับ ทางทีมงานจะตรวจสอบคุณสมบัติและมอบเงินรางวัลให้ท่านสมาชิกที่โชคดีในค้ำวันนี้ ขอให้ร่วมสมชิกรวมสนุกและโชคดีกันอย่างนี้อีกในเสาร์หน้าครับ เฮงๆๆๆ</p>', '', '25/09/2016 15:27:10', '', 1),
(246, 30, 15, '837162791', 1, '<p>53011 sbo เสมอ 1-1</p>', '', '27/09/2016 15:57:48', '', 0),
(247, 30, 67, '30617302', 2, '<p>9606 ibc เสมอ 1-1</p>', '', '28/09/2016 10:55:06', '', 0),
(248, 30, 55, '248455484', 3, '<p>53288sbo  เชลซี ชนะ 2-0</p>', '', '28/09/2016 12:40:04', '', 0),
(249, 30, 64, '3731513051', 4, '<p>9034<br />\nเสมอ 2:2<br />\nไอบีซี</p>', '', '28/09/2016 12:44:30', '', 0),
(250, 30, 77, '456647838', 5, '<p>51938 sbo ฮัลล์ ซิตี้ ชนะ 1-0</p>', '', '28/09/2016 12:56:49', '', 0),
(251, 30, 85, '236994848', 6, '<p>9150<br />\nSBO<br />\nCHELSEA WIN 1-0</p>', '', '28/09/2016 15:05:12', '', 0),
(252, 30, 16, '3076017876', 7, '<p>53004 sbo ฮัลล์ซิตี้ ชนะ 2-1 ครับ</p>\n\n', '', '28/09/2016 19:16:14', '', 0),
(253, 30, 41, '456608025', 8, '<p>7933 3m เชลซีชนะ 3-1</p>', '', '29/09/2016 09:14:49', '', 0),
(254, 30, 33, '3056951576', 9, '<p>50524 ibc เชลซีชนะ2-0</p>', '', '29/09/2016 09:16:12', '', 0),
(255, 30, 58, '19811204', 10, '<p>50688 sbo ตอบ เซลซีชนะ 4-0</p>', '', '29/09/2016 09:20:57', '', 0),
(256, 30, 25, '19828055', 11, '<p>8268 ibcเซลซีชนะ4-0</p>', '', '29/09/2016 09:21:13', '', 0),
(257, 30, 111, '3742911282', 12, '<p>51395  sbo  ฮัลล์ ชนะ 2-1</p>', '', '29/09/2016 10:17:00', '', 0),
(258, 30, 72, '1991160411', 13, '<p>51905 sbo เชลชีชนะ 1-0<br />\n :o-]: :o-]: :o-]:</p>', '', '29/09/2016 10:47:50', '', 0),
(259, 30, 133, '2007030274', 14, '<p> 51997 sbo เชลซี ชนะ 2-1</p>', '', '29/09/2016 11:41:43', '', 0),
(260, 30, 113, '3068671741', 15, '<p>3663  <br />\nSbobet<br />\n เชลชี ชนะ&nbsp; 2-1 ครับ</p>', '', '29/09/2016 12:49:58', '', 0),
(261, 30, 50, '1029345683', 16, '<p>Hull city 0-3 Chelsea</p>', '', '29/09/2016 14:02:09', '', 0),
(262, 30, 63, '3068675345', 17, '<p>Sbo 51449 ตอบ เชลชี ชนะ 4-2 ค้บ</p>', '', '29/09/2016 17:47:11', '', 0),
(263, 30, 110, '2105549634', 18, '<p>9371<br />\nเอสบีโอ<br />\nเชลซี ชนะ 2-0</p>', '', '29/09/2016 18:10:03', '', 0),
(264, 30, 43, '1028140462', 19, '<p>9595 ibc<br />\nตอบ เชลซี 3-0</p>', '', '29/09/2016 19:28:27', '', 0),
(265, 30, 12, '3068699352', 20, '<p>51779 sbo เชลชีชนะ2-0คับ</p>', '', '29/09/2016 20:13:38', '', 0),
(266, 30, 60, '1856562502', 21, '<p>7455 IBC เซลซีชนะ 3:0</p>', '', '30/09/2016 06:36:16', '', 0),
(267, 30, 92, '19792052', 22, '<p>50615 ibc เชลซีชนะ 2-0</p>', '', '30/09/2016 07:39:46', '', 0),
(268, 30, 56, '2046913505', 23, '<p>3256 sbo เสมอ 0-0</p>', '', '30/09/2016 08:52:56', '', 0),
(269, 30, 40, '3059598908', 24, '<p>50656 sbo เชลซีชนะ3-0</p>', '', '30/09/2016 09:54:34', '', 0),
(270, 30, 98, '1731412051', 25, '<p>50040 sbo ตอบว่า เชลซีชนะ 2-0</p>', '', '30/09/2016 11:36:30', '', 0),
(271, 30, 135, '2869211552', 26, '<p>53653.&nbsp; 3m  เชลซีชนะ 3-0</p>', '', '30/09/2016 14:29:47', '', 0),
(272, 30, 29, '2041168389', 27, '<p>9040<br />\nไอบีซี<br />\nเชลซี ชนะ 2-1</p>', '', '30/09/2016 15:23:55', '', 0),
(273, 30, 21, '3031928628', 28, '<p>51826 sbo เชลชีชนะ2-1</p>', '', '30/09/2016 16:18:42', '', 0),
(274, 30, 32, '2875376766', 29, '<p>53250 sbo ทาย เชลซี ชนะ 4-0</p>', '', '30/09/2016 16:53:30', '', 0),
(275, 30, 13, '3031927555', 30, '<p>51089 sbo ตอบ เชลชี ชนะ 3-1 คับ</p>', '', '30/09/2016 17:01:43', '', 0),
(276, 30, 11, '837083611', 31, '<p>50565 IBC ฮัลส์ซิตี้ ชนะ 1-0</p>', '', '30/09/2016 20:07:58', '', 0),
(277, 30, 52, '2038522943', 32, '<p>9551 เล่นเวบไอบีซี<br />\nเชลซี ชนะ 3-1</p>', '', '30/09/2016 20:58:57', '', 0),
(278, 30, 61, '973838170', 33, '<p>50412  3M  เชลซี ชนะ 3-1</p>', '', '01/10/2016 02:39:01', '', 0),
(279, 30, 69, '3754752273', 34, '<p>50427 sbo ตอบ เชลซี ชนะ 3-0</p>', '', '01/10/2016 07:34:28', '', 0),
(280, 30, 87, '3754949063', 35, '<p>51190 ibc ตอบว่า ฮัลแพ้ 1-4 เซลซี</p>', '', '01/10/2016 07:42:19', '', 0),
(281, 30, 106, '825259353', 36, '<p>9129 sbo เชลซีชนะ 2 ต่อ 0</p>', '', '01/10/2016 07:52:44', '', 0),
(282, 30, 84, '3742913044', 37, '<p>9415 ibc เชลชี ชนะ 2-1</p>', '', '01/10/2016 08:59:23', '', 0),
(283, 30, 109, '19794891', 38, '<p>51491sbq เชลซีชนะ 3~0</p>', '', '01/10/2016 09:02:36', '', 0),
(284, 30, 30, '456647018', 39, '<p>51671sbo ตอบ เชลชีชนะ2-1ครับ</p>', '', '01/10/2016 09:09:14', '', 0),
(285, 30, 132, '3068681087', 40, '<p>53027  maxbet hull 2-4 chelsea</p>', '', '01/10/2016 09:12:55', '', 0),
(286, 30, 35, '3742921300', 41, '<p>53497 SBQ ตอบ เชลซี ชนะ&nbsp; 3-1</p>', '', '01/10/2016 09:24:34', '', 0),
(287, 30, 96, '3068693729', 42, '<p>IBC 9562 ตอบ เชลซี ชนะ 3:1</p>', '', '01/10/2016 09:36:50', '', 0),
(288, 30, 100, '3031907497', 43, '<p>50775 sbo ตอบ เชลซีชนะ 2 - 1</p>', '', '01/10/2016 09:52:24', '', 0),
(289, 30, 126, '837118255', 44, '<p>51744 sbo 0-0</p>', '', '01/10/2016 09:53:58', '', 0),
(290, 30, 27, '3068672856', 45, '<p>51467 SBQ ตอบ&nbsp; เชลซี&nbsp; ชนะ&nbsp; 2-0</p>', '', '01/10/2016 11:03:07', '', 0),
(291, 30, 74, '456609940', 46, '<p>53061 SBO ตอบ เชลซี&nbsp; ชนะ&nbsp; 2-1</p>', '', '01/10/2016 11:05:29', '', 0),
(292, 30, 116, '19818355', 47, '<p>9527 sbo ตอบ เชลซี ชนะ 3-0</p>', '', '01/10/2016 11:10:22', '', 0),
(293, 30, 75, '837102940', 48, '<p>53599 SBQ ตอบ เชลซี ชนะ 3-0</p>', '', '01/10/2016 11:17:15', '', 0),
(294, 30, 120, '3068699435', 49, '<p>Sbo  3351780  เชลชี ชนะ ฮ้ลส์ 3-1</p>', '', '01/10/2016 11:22:58', '', 0),
(295, 30, 93, '2875272832', 50, '<p>50710 sbo ตอบว่า&nbsp; เชลชี ชนะ 2-0</p>', '', '01/10/2016 11:37:35', '', 0),
(296, 30, 130, '19884839', 51, '<p>51076 sbo ฮัล แพ้ 0-4</p>', '', '01/10/2016 11:44:54', '', 0),
(297, 30, 86, '19844532', 52, '<p>50488 sbo ตอบ เชลซี ชนะ 3-1</p>', '', '01/10/2016 11:48:08', '', 0),
(298, 30, 115, '1990998286', 53, '<p>9214 ibc ตอบ เซลซีชนะ 2-0</p>', '', '01/10/2016 12:46:59', '', 0),
(299, 30, 90, '3390911708', 54, '<p>69005 sbo ตอบ เชลชีชนะ2-1</p>', '', '01/10/2016 13:01:24', '', 0),
(300, 30, 107, '2001500118', 55, '<p>53105 ibc เชลซี ชนะ 3-0</p>', '', '01/10/2016 13:08:21', '', 0),
(301, 30, 136, '3742924252', 56, '<p>0171  ibc  ตอบ เชลซี ชนะ&nbsp; 3-1</p>', '', '01/10/2016 13:10:30', '', 0),
(302, 30, 57, '973742850', 57, '<p>50966 sbo ตอบ เสมอ 0-0</p>', '', '01/10/2016 13:11:42', '', 0),
(303, 30, 78, '456648945', 58, '<p>9483sbo เสมอ 2-2</p>', '', '01/10/2016 13:31:50', '', 0),
(304, 30, 119, '2875257940', 59, '<p>50721  sbo เฃลซี ชนะ 2-1</p>', '', '01/10/2016 13:35:48', '', 0),
(305, 30, 76, '462498307', 60, '<p>Bkj3379015 m8 ตอบ Hull 1 chelsea 4</p>', '', '01/10/2016 13:39:18', '', 0),
(306, 30, 38, '19792040', 61, '<p>9188ibcตอบเชลซีชนะ2-1</p>', '', '01/10/2016 14:51:00', '', 0),
(307, 30, 73, '19827002', 62, '<p>50611 ibc เชลชี 3-1</p>', '', '01/10/2016 14:58:21', '', 0),
(308, 30, 65, '462498310', 63, '<p> 9324 ibc ฮัลล์ แพ้ 2-3 ครับ</p>', '', '01/10/2016 16:35:56', '', 0),
(309, 30, 94, '19795118', 64, '<p>Sbo 50151. ตอบ เชลซี ชนะ 3-1</p>', '', '01/10/2016 16:37:02', '', 0),
(310, 30, 105, '19853218', 65, '<p>7433 sbo เชลซี ชนะ 3-1</p>', '', '01/10/2016 17:30:13', '', 0),
(311, 30, 101, '3076111678', 66, '<p>sbo 53319 hull 2-5 chelsea</p>', '', '01/10/2016 17:41:54', '', 0),
(312, 30, 91, '1935113640', 67, '<p>50461sbo ตอบ เซลซีชนะ 4-1</p>', '', '01/10/2016 18:00:23', '', 0),
(313, 30, 1, '3076115627', 68, '<p>ยินดีกับท่านสมาชิกที่ทายถูกครับ ว่า เชลซีจะบุกมาชนะฮัลล์ไปด้วยสกอร์ 0&#8212;-2 ในวันนี้ เป็นผลให้แบ่งรางวัลกันไปอย่างทั่วถึง 10ท่าน ท่านละ 2,000 บาทครับ โดยมีรายชื่อดังนี้<br />\n53288sbo เชลซี ชนะ 2-0<br />\n50524 ibc เชลซีชนะ2-0<br />\n9371เอสบีโอ เชลซี ชนะ 2-0<br />\n51779 sbo เชลชีชนะ2-0คับ<br />\n50615 ibc เชลซีชนะ 2-0<br />\n50040 sbo ตอบว่า เชลซีชนะ 2-0<br />\n9129 sbo เชลซีชนะ 2 ต่อ 0<br />\n51467 SBQ ตอบ&nbsp; เชลซี&nbsp; ชนะ&nbsp; 2-0<br />\n50710 sbo ตอบว่า&nbsp; เชลชี ชนะ 2-0<br />\n9214 ibc ตอบ เซลซีชนะ 2-0<br />\nโดยทางทีมงานจะขอตรวจสอบคุณสมบัติ และมอบเงินรางวัลให้ท่านสมาชิกในเว็บที่ท่านเล่นในเย็นวันอาทิตย์ครับขอให้โชคดีกันอย่างนี้ทุกเสาร์ เราแจกกันตลอดครับ โชคดี เฮงๆๆๆ</p>\n\n', '', '01/10/2016 23:37:27', '', 1),
(314, 31, 12, '3068695019', 1, '<p>51779 sbo เยอรมันชนะ 2-0</p>', '', '05/10/2016 17:55:36', '', 0),
(315, 31, 13, '3031894671', 2, '<p>51089 sbo เยอรมัน ชยะ 3-0<br />\n :o-/: :o-/: :o-/:</p>', '', '05/10/2016 20:53:31', '', 0),
(316, 31, 72, '2098827349', 3, '<p>51905 sbo เยอรมันชนะ 2-1ครับ<br />\n :o-]: :o-]: :o-]:</p>', '', '06/10/2016 11:04:46', '', 0),
(317, 31, 11, '837083268', 4, '<p>50565 IBC เยอรมัน ชนะ 3-1</p>', '', '06/10/2016 20:26:04', '', 0),
(318, 31, 16, '2098842681', 5, '<p>53004 sbo เยอรมันชนะ 1-0</p>', '', '07/10/2016 12:14:44', '', 0),
(319, 31, 98, '1731412051', 6, '<p>50040 sbo ตอบว่า เยอรมัน ชนะ 2-0</p>', '', '07/10/2016 14:46:59', '', 0),
(320, 31, 111, '979465397', 7, '<p>51395 SBO เยอรมัน ชนะ 3-0</p>', '', '07/10/2016 15:13:08', '', 0),
(321, 31, 67, '1789612132', 8, '<p>9606 ibc<br />\nตอบ เยอรมัน ชนะ 1-0</p>', '', '07/10/2016 16:02:08', '', 0),
(322, 31, 64, '3533710618', 9, '<p>รหัส 9034<br />\nเวบ ไอบีซี<br />\nเยอรมัน ชนะ 2:0</p>', '', '07/10/2016 16:21:17', '', 0),
(323, 31, 21, '3076016584', 10, '<p>51826 sbo เยอรมันชนะ 3-1 คับ<br />\n :^-^: :^-^:</p>', '', '07/10/2016 16:58:13', '', 0),
(324, 31, 43, '1701235290', 11, '<p>9595<br />\nIBC<br />\nGERMANY WIN 3:0</p>', '', '07/10/2016 19:04:28', '', 0),
(325, 31, 106, '3068680285', 12, '<p>9129 sbo เยอรมันเสมอ 1 ต่อ 1</p>', '', '07/10/2016 20:09:02', '', 0),
(326, 31, 77, '3076018910', 13, '<p>51938 sbo ตอบ เยอรมันชนะ 4-1</p>', '', '07/10/2016 21:00:17', '', 0),
(327, 31, 137, '3532546132', 14, '<p>9633<br />\nIBC<br />\nตอบ เยอรมัน 4-0 เชก</p>', '', '08/10/2016 02:29:38', '', 0),
(328, 31, 87, '3754948832', 15, '<p>51190 ibc ตอบว่า เยอรมันชนะ 4 - 0 เช็ค</p>', '', '08/10/2016 08:28:38', '', 0),
(329, 31, 92, '19811823', 16, '<p>50615 ibc เช็ก&nbsp; ชนะ&nbsp; 2-1</p>', '', '08/10/2016 09:00:29', '', 0),
(330, 31, 96, '3068671116', 17, '<p>IBC 9562 ตอบ เยอรมัน ชนะ เช็ก 3:0</p>', '', '08/10/2016 09:05:05', '', 0),
(331, 31, 90, '3390911708', 18, '<p>69005 sbo เยอรมัน ชนะ 2-0</p>', '', '08/10/2016 09:10:20', '', 0),
(332, 31, 30, '3742920648', 19, '<p>51671 sbo ตอบ เยอรมันชนะ 4-1ครับ</p>', '', '08/10/2016 09:36:03', '', 0),
(333, 31, 132, '3068688497', 20, '<p>53027 maxbet germany win 2-0</p>', '', '08/10/2016 09:37:03', '', 0),
(334, 31, 32, '973761474', 21, '<p>53250 sbo ทาย เยอรมัน ชนะ 2-0</p>', '', '08/10/2016 09:38:33', '', 0),
(335, 31, 76, '18146129', 22, '<p>Bkj3379015 m8 เสมอกัน0-0</p>', '', '08/10/2016 10:02:09', '', 0),
(336, 31, 100, '3031939017', 23, '<p>50775 sbo เยอรมันชนะ 1 - 0</p>', '', '08/10/2016 10:42:52', '', 0),
(337, 31, 126, '837218329', 24, '<p>51744<br />\nSbobet<br />\nเยอรมัน ชนะ 5-0</p>', '', '08/10/2016 10:48:40', '', 0),
(338, 31, 93, '979465397', 25, '<p>50710 sbo ตอบว่า เยอรมันชนะเชก 5-0</p>', '', '08/10/2016 10:49:02', '', 0),
(339, 31, 119, '2875257937', 26, '<p>50721  sbo germany 2-1</p>', '', '08/10/2016 11:02:35', '', 0),
(340, 31, 85, '1790449002', 27, '<p>9150 sbo germany 2-1</p>', '', '08/10/2016 11:21:57', '', 0),
(341, 31, 27, '3068696303', 28, '<p>51467 SBQ ตอบ&nbsp; เยอรมัน&nbsp; ชนะ&nbsp; 2-0</p>', '', '08/10/2016 12:10:38', '', 0),
(342, 31, 41, '456611950', 29, '<p>7933 3m เยรมันชนะ 3-0</p>', '', '08/10/2016 12:35:11', '', 0),
(343, 31, 78, '2875239184', 30, '<p>9483sbo ตอบ เยอรมันแพ้ เช็ก 1-2</p>', '', '08/10/2016 13:10:04', '', 0),
(344, 31, 75, '3068663403', 31, '<p>53599  SBQ ตอบ&nbsp;  เยอรมัน ชนะ 2-1</p>', '', '08/10/2016 13:10:10', '', 0),
(345, 31, 15, '3068687824', 32, '<p>53011 sbo เยอรมันชนะ 4-0 ครับ</p>', '', '08/10/2016 13:14:42', '', 0),
(346, 31, 73, '1950018002', 33, '<p>50611 ibc เยอรมัน ชนะ 4-1</p>', '', '08/10/2016 13:42:12', '', 0),
(347, 31, 35, '3742912075', 34, '<p>53497 sbq ตอบ เยอรมัน ชนะ 3-1</p>', '', '08/10/2016 13:50:51', '', 0),
(348, 31, 120, '979465397', 35, '<p>51780 sbo ตอบว่า เยอรมัน ชนะ 4-0</p>', '', '08/10/2016 15:05:55', '', 0),
(349, 31, 84, '3742919917', 36, '<p>9415 ibc เยอรมัน&nbsp; 3-1 เช็ก</p>', '', '08/10/2016 15:21:48', '', 0),
(350, 31, 74, '3742895343', 37, '<p>53061 sbo ตอบ&nbsp; เยอรมัน ชนะ&nbsp;   3-1</p>', '', '08/10/2016 15:26:01', '', 0),
(351, 31, 105, '19851355', 38, '<p>7433 sbo เสมอกัน 0-0</p>', '', '08/10/2016 15:36:57', '', 0),
(352, 31, 69, '3754752828', 39, '<p>50427 sbo ตอบ เช็ก ชนะ 1 - 0</p>', '', '08/10/2016 16:39:48', '', 0),
(353, 31, 63, '3068669904', 40, '<p>Sbo 51449 ตอบ เยอรม้น ชนะ 4-2 ค้บ</p>', '', '08/10/2016 16:49:35', '', 0),
(354, 31, 60, '456630947', 41, '<p>7455  ibc เยอรมันชนะ&nbsp; 3:1</p>', '', '08/10/2016 17:54:11', '', 0),
(355, 31, 1, '3076115618', 42, '<p>ยินดีกับท่านสมาชิก ที่โชคดี ที่ทายถูกว่าเยอรมันจะชนะเช็กซ์ไปด้วยสกอร์ 3&#8212;0 อย่างสนุก มีผู้โชคดี5ท่าน แบ่งเงินรางวัลกันไปท่านละ 4000 บาท ดังนี้ครับ<br />\n51089 sbo เยอรมัน ชยะ 3-0<br />\n51395 SBO เยอรมัน ชนะ 3-0<br />\n9595 IBC GERMANY WIN 3:0<br />\nIBC 9562 ตอบ เยอรมัน ชนะ เช็ก 3:0<br />\n7933 3m เยรมันชนะ 3-0<br />\nทางทีมงานแฟนบอล จะขอตรวจสอบคุณสมบัติและมอบเงินรางวัลให้แก่ท่านผู้โชคดีในเย็นวันอาทิตย์ ในเว็บของท่านผู้โชคดีครับ&nbsp; ขอให้โชคดีกันอย่างนี้อีกในวันเสาร์หน้า ครับ เรายังแจกกันอย่างต่อเนื่องครับ เฮงๆๆ</p>\n\n', '', '09/10/2016 04:00:28', '', 1),
(356, 33, 12, '3068679187', 1, '<p>51779 sbo คริสตัล พาเลซ ชนะ 1-0 ครับ</p>', '', '11/10/2016 11:21:58', '', 0),
(357, 33, 137, '2947614211', 2, '<p>9633<br />\nMaxbet<br />\nเวสต์แฮม ชนะ 1-0</p>', '', '11/10/2016 14:05:01', '', 0),
(358, 33, 52, '3403017872', 3, '<p>9551 ไอบีซี พาเลซ ชนะ 1:0</p>', '', '11/10/2016 14:30:14', '', 0),
(359, 33, 110, '1728416900', 4, '<p>9371 SBO<br />\nPalace แพ้ 1-2</p>', '', '11/10/2016 15:23:06', '', 0),
(360, 33, 29, '2580561949', 5, '<p>9040 เวบไอบีซี<br />\nตอบ เสมอ 0:0</p>', '', '11/10/2016 17:01:03', '', 0),
(361, 33, 13, '3076086169', 6, '<p>51089 sbo พาเลซ ชนะ2-0<br />\n :o-): :o-): :o-):</p>', '', '11/10/2016 18:56:32', '', 0),
(362, 33, 11, '837083728', 7, '<p>50565 IBC พาเลส ชนะ 2-1</p>', '', '11/10/2016 20:23:43', '', 0),
(363, 33, 64, '1995695843', 8, '<p>9034 ไอบีซี<br />\nพาเลซ ชนะ 2:1</p>', '', '11/10/2016 21:00:49', '', 0),
(364, 33, 111, '979465397', 9, '<p>51395 SBO คริสตัล พาเลซ 3-1</p>', '', '12/10/2016 08:21:55', '', 0),
(365, 33, 72, '2098842962', 10, '<p>51905 sbo คริสตัล พาเลซ ชนะ2-1</p>\n\n<p> :o<3: :o<3: :o<3: :o<3: :o<3:</p>', '', '12/10/2016 10:41:03', '', 0),
(366, 33, 43, '3533965580', 11, '<p>9595 IBC เสมอ 1:1</p>', '', '12/10/2016 12:21:48', '', 0),
(367, 33, 16, '3076045597', 12, '<p>53004 sbo ตอบ เวสแฮมป์ ชนะ1-0</p>', '', '12/10/2016 16:52:06', '', 0),
(368, 33, 33, '3056951620', 13, '<p>50524 ibc เสมอ1-1</p>', '', '13/10/2016 09:06:43', '', 0),
(369, 33, 21, '3076014149', 14, '<p>51826 sbo เวสแฮมป์ชนะ 2-1ครับ</p>', '', '13/10/2016 10:38:30', '', 0),
(370, 33, 98, '1731412051', 15, '<p>50040 sbo ตอบว่า คริสตัล พาเลซ&nbsp; ชนะ 4-1</p>', '', '13/10/2016 12:19:42', '', 0),
(371, 33, 77, '3076018712', 16, '<p>51938 sbo เสมอกัน 2-2</p>', '', '13/10/2016 17:45:35', '', 0),
(372, 33, 67, '2875256956', 17, '<p>9606 ไอบีซี เสมอ 2-2</p>', '', '14/10/2016 03:44:56', '', 0),
(373, 33, 55, '3076114678', 18, '<p>53288 sbo จบ 2-2 ครับ :t-t: :t-t:</p>', '', '14/10/2016 12:40:33', '', 0),
(374, 33, 15, '3068682502', 19, '<p>53011 sbo เสมอ 1-1</p>', '', '14/10/2016 13:36:09', '', 0),
(375, 33, 101, '3031929462', 20, '<p>53319 sbo พาเลช 4-3 เวสต์แฮม</p>', '', '14/10/2016 14:00:58', '', 0),
(376, 33, 85, '456593313', 21, '<p>9150 sbo<br />\nตอบ คริสตัล พาเลซ ชนะ 3-1</p>', '', '14/10/2016 17:31:12', '', 0),
(377, 33, 41, '2098855551', 22, '<p>7933 3m เวสเฮมชนะ 2-0</p>', '', '15/10/2016 00:06:33', '', 0),
(378, 33, 138, '1697875119', 23, '<p> sbobet 0872 เวสแฮมป์ ชนะ 3-1 ครับ</p>', '', '15/10/2016 01:18:10', '', 0),
(379, 22, 138, '1697875119', 6, '<p> </p>\n\n<p>0872 sbo ขอโปรเล่นเกมทายผลคับ</p>', '', '15/10/2016 01:23:38', '', 0),
(380, 33, 87, '837211296', 24, '<p>51190 ibc พาเลซแพ้ 1- 3 เวสแฮม</p>', '', '15/10/2016 06:19:15', '', 0),
(381, 33, 63, '3068701790', 25, '<p>Sbo 51449 ตอบ คริสต้ลพาเลช ชนะ เวสต์แฮม&nbsp; 4-2 ค้บ</p>', '', '15/10/2016 07:56:41', '', 0),
(382, 33, 96, '3068700696', 26, '<p>IBC 9562 ตอบ คริสตัล พาเลช เสมอ เวสแฮม 0:0</p>', '', '15/10/2016 08:16:56', '', 0),
(383, 33, 84, '3742904438', 27, '<p>9415 ibc คริสตัล พาเลส&nbsp; 1-3 เวสแฮม</p>', '', '15/10/2016 08:43:11', '', 0),
(384, 33, 92, '19893119', 28, '<p>50615 IBC พาเลส ชนะ 2-1</p>', '', '15/10/2016 09:15:07', '', 0),
(385, 33, 120, '456592111', 29, '<p>Sbo 51780 ตอบ คริสต้ล ชนะ เวสต์แฮม 3-1</p>', '', '15/10/2016 09:35:01', '', 0),
(386, 33, 69, '3754752553', 30, '<p>50427 sbo ตอบ พาเลซ ชนะ 2- 0</p>', '', '15/10/2016 09:52:39', '', 0),
(387, 33, 106, '3754788256', 31, '<p>9129 sbo คริสตันพาเลชชนะ 2 ต่อ 0 ครับ</p>', '', '15/10/2016 10:06:05', '', 0),
(388, 33, 57, '973742850', 32, '<p>50966 sbo ตอบ 0-0</p>', '', '15/10/2016 10:24:50', '', 0),
(389, 33, 35, '456612589', 33, '<p>53497 sbq ตอบ คริสตัน พาเลช ชนะ&nbsp; 1-0</p>', '', '15/10/2016 11:40:51', '', 0),
(390, 33, 27, '837089662', 34, '<p>51467 sbq  ตอบ&nbsp; คริสตัน พาเลช ชนะ&nbsp; 2-1</p>', '', '15/10/2016 11:53:12', '', 0),
(391, 33, 93, '979465397', 35, '<p>50710 sbo ตอบว่า พาเลช ชนะ เวสตแฮม 1-0</p>', '', '15/10/2016 12:12:04', '', 0),
(392, 33, 32, '462498706', 36, '<p>53250 sbo ทาย คริสตัล พาเลซ ชนะ 2-0</p>', '', '15/10/2016 12:40:45', '', 0),
(393, 33, 22, '3754886433', 37, '<p>50173 sob ตอบ คริสตัน พาเลซ เสมอ 2-2</p>', '', '15/10/2016 12:44:05', '', 0),
(394, 33, 116, '19811517', 38, '<p>9527 sbo ตอบ เสมอ 2-2</p>', '', '15/10/2016 12:52:40', '', 0),
(395, 33, 74, '3742913035', 39, '<p>53061 sbo ตอบ&nbsp;  คลิสตัน พาเลช&nbsp; ชนะ&nbsp; 2-0</p>', '', '15/10/2016 13:53:33', '', 0),
(396, 33, 105, '19898752', 40, '<p>7433 sbo เวสต์แฮม ชนะ 3-0</p>', '', '15/10/2016 13:53:41', '', 0),
(397, 33, 75, '3068694627', 41, '<p>53599 sbq ตอบ คริสตัน พาเลช&nbsp; เสมอ 1-1</p>', '', '15/10/2016 13:58:17', '', 0),
(398, 33, 135, '462522876', 42, '<p>53653.&nbsp; 3m.&nbsp; คริสตัล พาเลส ชนะ. 2-0</p>', '', '15/10/2016 14:06:49', '', 0),
(399, 33, 129, '2001495148', 43, '<p>50468 sbo คริสตัล พาเลซ ชนะ3-1</p>', '', '15/10/2016 14:09:46', '', 0),
(400, 33, 30, '456624060', 44, '<p>51671 sbo ตอบ เสมอ2-2ครับ</p>', '', '15/10/2016 14:29:07', '', 0),
(401, 33, 90, '456634267', 45, '<p>69005 sbo เสมอ 1-1</p>', '', '15/10/2016 14:32:15', '', 0),
(402, 33, 40, '973761998', 46, '<p>เล่น sbobet 50656 พาเลซ ชนะ 3-1</p>', '', '15/10/2016 14:36:05', '', 0),
(403, 33, 40, '973761998', 47, '<p>sbobet 50656 พาเลซ ชนะ 3-1 ครับ</p>', '', '15/10/2016 14:37:44', '', 0),
(404, 33, 86, '19826652', 48, '<p>50488. Sbo. ตอบ. 2-2</p>', '', '15/10/2016 16:28:13', '', 0),
(405, 33, 94, '248482760', 49, '<p>Sbo. 50151. ตอบ คริสตัน&nbsp; เสมอ 2-2</p>', '', '15/10/2016 16:33:02', '', 0),
(406, 33, 38, '19901362', 50, '<p>9188ibc เสมอ2-2</p>', '', '15/10/2016 17:06:55', '', 0),
(407, 33, 61, '3068661866', 51, '<p>50412 เวป3M เสมอ ดุเดือด 1-1</p>', '', '15/10/2016 17:23:28', '', 0),
(408, 33, 126, '837208449', 52, '<p>51744 maxbet weatham win 3-2</p>', '', '15/10/2016 17:26:56', '', 0),
(409, 33, 76, '2098831651', 53, '<p>Bkj3379015 m8 ตอบ พาเลซ แพ้ 1-3</p>', '', '15/10/2016 17:45:34', '', 0),
(410, 33, 107, '3031916017', 54, '<p>53105 ibc เสมอ 1-1 ครับ</p>', '', '15/10/2016 18:43:14', '', 0),
(412, 33, 1, '3076114975', 55, '<p>ยินดีกับท่านสมาชิก2ท่านที่ทายถูกว่า พาเลซจะดวงกุด แพ้ เวสแฮมไปด้วยสกอร์&nbsp; 0—1 ในเกมส์พีเมียร์ลีก คู่ดึกวันเสาร์ที่15 ตุลาคมนี้ครับ รับเงินไปไม่น้อยท่านละ10000 บาทโดยมีรายชือดังนี้ <br />\n9633 Maxbet เวสต์แฮม ชนะ 1-0<br />\n53004 sbo ตอบ เวสแฮมป์ ชนะ1-0<br />\nทางทีมงานจะขอตรวจสอบคุณสมบัติและจะมอบเงินรางวัลไปในเว็บที่ท่านเล่นในเย็นวันอาทิตย์นี้นะครับ หวังเป็นอย่างยิ่งว่า วันเสาร์หน้าจะมีสมาชิกได้รับรางวัลเยอะๆโชคดีอย่างวันนี้อีกนะครับ เราแจกกันอย่างต่อเนื่องครับ อย่าลืมชวนเพื่อนมาเล่นกับfanball8888ของเราครับเราแจกจริง แจกต่อเนื่องกันไปเลย เฮงๆๆ</p>', '', '16/10/2016 01:46:07', '', 1),
(413, 36, 52, '837671274', 1, '<p>9551<br />\nไอบีซี<br />\nลิเวอร์พูล ชนะ 4:1</p>', '', '18/10/2016 14:40:15', '', 0),
(414, 36, 29, '2098792559', 2, '<p>9040 ไอบีซี<br />\nหงส์ 2-1</p>', '', '18/10/2016 19:48:43', '', 0),
(415, 36, 12, '837120365', 3, '<p>51779 sbo ลิเวอร์พูลชนะ 2-0</p>', '', '18/10/2016 21:08:24', '', 0),
(416, 36, 110, '837051007', 4, '<p>9371 เวบเอสบีโอ<br />\nตอบ ลิเวอร์พูล ชนะ 1-0</p>', '', '19/10/2016 01:27:44', '', 0),
(417, 36, 137, '1612600312', 5, '<p>9633<br />\nMaxbet<br />\nLiverpool 3-1</p>', '', '19/10/2016 01:51:27', '', 0),
(418, 36, 33, '1991114034', 6, '<p>50524 ibc ลิเวอร์พูลชนะ1-0</p>', '', '19/10/2016 07:11:10', '', 0),
(419, 36, 60, '2098827904', 7, '<p>7455 IBC ลิเวอร์พูลชนะ 3-0</p>', '', '19/10/2016 10:28:14', '', 0),
(420, 37, 129, '2001495049', 1, '<p>50468  sbo ขอรับสิทธิ์</p>', '', '19/10/2016 13:42:55', '', 0),
(421, 36, 129, '2001495049', 8, '<p>50468 SBO ลิเวอร์พูลชนะ 4-0</p>', '', '19/10/2016 13:44:33', '', 0),
(422, 36, 111, '979465397', 9, '<p>51395 SBO ลิเวอร์พูล ชนะ 3-0</p>', '', '19/10/2016 14:46:19', '', 0),
(423, 36, 15, '837162719', 10, '<p>53011 sbo ลิเวอร์พูลชนะ 1-0</p>', '', '19/10/2016 18:17:10', '', 0),
(424, 36, 13, '3031920449', 11, '<p>51089 sbo Liverpool win 2-1</p>', '', '19/10/2016 20:25:19', '', 0),
(425, 36, 22, '3754847533', 12, '<p>50173 3m ตอบ ลิเวอร์พูล ชนะ 2:0</p>', '', '20/10/2016 01:58:10', '', 0),
(426, 37, 22, '3754847533', 2, '<p>50173 3m ขอรับสิทธิ์</p>', '', '20/10/2016 01:59:12', '', 0),
(427, 37, 111, '979465397', 3, '<p>51395 SBO ขอรับสิทธิ์</p>', '', '20/10/2016 10:50:00', '', 0),
(428, 36, 98, '1731412051', 13, '<p>50040 sbo ตอบ ลิเวอร์พูล ชนะ 4-0</p>', '', '20/10/2016 11:04:47', '', 0),
(429, 36, 72, '2098827312', 14, '<p>51905 sbo ลิเวอร์พูล ชนะ 3-0</p>', '', '20/10/2016 12:30:10', '', 0),
(430, 37, 73, '17080991', 4, '<p>50611 ibc ขอรับสิทธิ์คับ</p>', '', '20/10/2016 13:43:35', '', 0),
(431, 37, 11, '837084048', 5, '<p>50565 IBC ครับ ขอด้วยครับ</p>', '', '20/10/2016 15:37:06', '', 0),
(432, 36, 11, '837084048', 15, '<p>&nbsp;  &nbsp;  &nbsp;  &nbsp;   50565 IBC <br />\n&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  LIVERPOOL WIN 2-1</p>', '', '20/10/2016 15:44:11', '', 0),
(433, 36, 21, '3076085934', 16, '<p>51826 sbo ตอบ ลิเวอร์พูล ชนะ 4-0</p>', '', '20/10/2016 18:49:03', '', 0),
(434, 37, 67, '2875256861', 6, '<p>9606 เวบไอบีซี ขอรับโปร</p>', '', '21/10/2016 01:58:10', '', 0),
(435, 36, 67, '2875256861', 17, '<p>9606 เวบไอบีซี ลิเวอร์ ชนะ 2-0</p>', '', '21/10/2016 01:59:17', '', 0),
(436, 37, 92, '19836154', 7, '<p>50615 ibc ขอรับสิทธิ์คับ</p>', '', '21/10/2016 10:53:51', '', 0),
(437, 36, 92, '19836154', 18, '<p>เล่น ibc 50615 ลิเวอร์พูล ชนะ 2-1 ครับ</p>', '', '21/10/2016 11:01:51', '', 0),
(438, 36, 55, '3031898227', 19, '<p>53288 SBO ลิเวอร์พูล ชนะ 2-1 :o-O: :o-O: :o-O:</p>', '', '21/10/2016 12:56:11', '', 0),
(439, 36, 64, '1935112688', 20, '<p>9034<br />\nIBC<br />\nLIVERPOOL 3:0</p>', '', '21/10/2016 16:37:54', '', 0),
(440, 37, 64, '1935112688', 8, '<p>9034 ibc ขอรับโปร</p>', '', '21/10/2016 16:39:44', '', 0),
(441, 36, 16, '3031919906', 21, '<p>53004 sbo ลิเวอร์พูลชนะ 3-1ครับ<br />\n :o-]: :o-]: :o-]:</p>', '', '21/10/2016 20:11:20', '', 0),
(442, 36, 77, '3076085861', 22, '<p>51938 sbo ลิเวอร์พูล ชนะ 4-1</p>', '', '21/10/2016 23:49:12', '', 0),
(443, 36, 43, '2875414417', 23, '<p>9595<br />\nibc<br />\nลิเวอร์พูล ชนะ 4-0</p>', '', '22/10/2016 00:12:11', '', 0),
(444, 37, 43, '2875414417', 9, '<p>9595 ibc<br />\nรับโปรโมชั่น</p>', '', '22/10/2016 00:13:10', '', 0),
(445, 37, 87, '3754754463', 10, '<p>51190 ibc ขอรับสิทคับ</p>', '', '22/10/2016 08:14:40', '', 0),
(446, 36, 87, '3754754463', 24, '<p>51190 ibc ลิเวอรพูล ชนะ 3-1</p>', '', '22/10/2016 08:25:56', '', 0),
(447, 37, 69, '19892779', 11, '<p>50427sboขอรับโปร</p>', '', '22/10/2016 09:17:41', '', 0),
(448, 36, 69, '19892779', 25, '<p>50427 sbo ตอบ ลิเวอร์พูล ชนะ 3-1</p>', '', '22/10/2016 09:19:53', '', 0),
(449, 37, 41, '825293212', 12, '<p>7933 3m ขอรับสิทธิ์</p>', '', '22/10/2016 09:57:29', '', 0),
(450, 36, 41, '825293212', 26, '<p>7933 3m ลิเวอร์พูลชนะ 3-0</p>', '', '22/10/2016 09:58:25', '', 0),
(451, 36, 27, '837089375', 27, '<p>51467 sbq  ตอบ&nbsp; ลิเวอร์พูล&nbsp; ชนะ 2-0</p>', '', '22/10/2016 10:15:03', '', 0),
(452, 36, 35, '456612886', 28, '<p>53497 sbq ตอบ ลิเวอร์พูล ชนะ 2-1</p>', '', '22/10/2016 10:48:51', '', 0),
(453, 36, 73, '3754876657', 29, '<p>50611 ibc ลิเวอร์พูล ชนะ 4-1</p>', '', '22/10/2016 10:57:45', '', 0),
(454, 36, 94, '19909506', 30, '<p>Sbo. 50151.ลิเวอร์พลู. ชนะ. 3-1</p>', '', '22/10/2016 11:26:34', '', 0),
(455, 36, 30, '3742914455', 31, '<p>51671 sbo ตอบ ลิเวอร์พูลชนะ3-1ครับ</p>', '', '22/10/2016 11:37:54', '', 0),
(456, 36, 57, '973742850', 32, '<p>50966 sbo ตอบ ลิเวอร์พูลชนะ 4-1</p>', '', '22/10/2016 12:34:27', '', 0),
(457, 36, 65, '3743140169', 33, '<p>9324 ibc ทายว่า ลิเวอร์พูล ชนะ 4 -2 ครับ</p>\n\n', '', '22/10/2016 12:36:23', '', 0);
INSERT INTO `webboard_comment` (`id`, `webboard_topic_id`, `user_id`, `ip_address`, `sort`, `comment`, `edited`, `datetime`, `modified`, `status`) VALUES
(458, 36, 106, '3754703036', 34, '<p>9129 sbo ลิเวอร์พูลชนะ 4 ต่อ 2</p>', '', '22/10/2016 12:46:28', '', 0),
(459, 36, 74, '3742900232', 35, '<p>53061 sbo  ตอบ ลิเวอร์พูล ชนะ&nbsp; 3-1</p>', '', '22/10/2016 13:38:09', '', 0),
(460, 36, 32, '19828726', 36, '<p>53250 sbo ทาย ลิเวอร์พูล ชนะ 2-0</p>', '', '22/10/2016 13:41:23', '', 0),
(461, 36, 107, '3031940906', 37, '<p>53105 ibc ลิเวอร์ ชนะ 2-0</p>', '', '22/10/2016 13:43:37', '', 0),
(462, 36, 96, '2875477832', 38, '<p>IBC 9562 ตอบ ลิเวอร์พูล ชนะ 4:0</p>', '', '22/10/2016 13:45:40', '', 0),
(463, 36, 85, '456607074', 39, '<p>9150 เอสบีโอ<br />\nตอบ ลิเวอร์ 5:0</p>', '', '22/10/2016 14:18:12', '', 0),
(464, 37, 85, '456607074', 13, '<p>9150 ขอรับสิทธิ โปรโมชั่น<br />\nเอสบีโอ</p>', '', '22/10/2016 14:19:36', '', 0),
(465, 37, 58, '2875453501', 14, '<p>50688 sbo ขอรับโปรครับ</p>', '', '22/10/2016 14:29:43', '', 0),
(466, 36, 58, '2875453501', 40, '<p>50688 sbo ตอบ ลิเวอร์พูลชนะ 5-1</p>', '', '22/10/2016 14:30:53', '', 0),
(467, 37, 84, '3742896062', 15, '<p>9415 ibc ขอรับสิทธ์</p>\n\n', '', '22/10/2016 14:37:53', '', 0),
(468, 36, 75, '3068699432', 41, '<p>53599 sbq ตอบ ลิเวอร์พูล ชนะ 3-0</p>', '', '22/10/2016 14:38:37', '', 0),
(469, 36, 139, '2261045339', 42, '<p>9571 IBC ลิเวอร์พูล ชนะ 5-1</p>', '', '22/10/2016 14:39:32', '', 0),
(470, 36, 84, '3742896062', 43, '<p>9415 ibc ลิเวอร์พูล เสมอ 2-2</p>', '', '22/10/2016 14:39:36', '', 0),
(471, 37, 139, '2261045339', 16, '<p>9571 IBC ขอรับโปรโมชั่น</p>', '', '22/10/2016 14:40:48', '', 0),
(472, 36, 76, '456626690', 44, '<p>Bkj3379015 m8 ตอบ liverpool 3-0</p>', '', '22/10/2016 15:03:30', '', 0),
(473, 36, 105, '19874120', 45, '<p>7433 sbo ลิเวอร์พูลชนะ 2-0</p>', '', '22/10/2016 15:16:30', '', 0),
(474, 36, 90, '3742917483', 46, '<p>69005 sbo ตอบ ลิเวอรพูล ชนะ 2-1</p>', '', '22/10/2016 15:47:23', '', 0),
(475, 36, 86, '19882431', 47, '<p>50488 sbo. ตอบ ลิเวอร์พูล3-1</p>\n\n', '', '22/10/2016 17:21:22', '', 0),
(476, 37, 91, '2875556005', 17, '<p>50461 sbo ขอรับสิทธิ์</p>', '', '22/10/2016 17:31:45', '', 0),
(477, 37, 116, '19892329', 18, '<p>9527 sbo ขอรับโปรโมชั่นคับ</p>', '', '22/10/2016 17:32:13', '', 0),
(478, 36, 78, '2875239079', 48, '<p>9483sbo ลิเวอร์ ชนะ 4-0</p>', '', '22/10/2016 17:33:34', '', 0),
(479, 36, 116, '19892329', 49, '<p>9527 sbo ตอบ ลิเวอร์พูล ชนะ 2-0</p>', '', '22/10/2016 17:34:12', '', 0),
(480, 37, 103, '19844084', 19, '<p>8169 ibc ขอรับโปรครับ</p>', '', '22/10/2016 17:34:47', '', 0),
(481, 36, 38, '19868393', 50, '<p>9188ibcลิเวอร์พูล ชนะ5-0</p>', '', '22/10/2016 17:35:41', '', 0),
(482, 37, 103, '19844084', 20, '<p>ขอแก้ไขเป็น8160 ibc ขอรับโปรครับ</p>', '', '22/10/2016 17:37:03', '', 0),
(483, 36, 103, '19844084', 51, '<p>8160 ibc ตอบ ลิเวอร์พูล ชนะ 1-0</p>', '', '22/10/2016 17:39:15', '', 0),
(484, 37, 38, '16968639', 21, '<p>9188ibcขอรับโปรคับ</p>', '', '22/10/2016 17:44:39', '', 0),
(485, 36, 91, '2875556005', 52, '<p>50461 SBO ลิเวอร์พูล ชนะ 6-0</p>', '', '22/10/2016 17:48:50', '', 0),
(486, 36, 101, '3031930340', 53, '<p>53319 sbo ลิเวอร์พลู ชนะ 6-1</p>', '', '22/10/2016 23:06:01', '', 0),
(487, 37, 86, '19800334', 22, '<p>50488 sbo  ขอรับโปรครับ</p>', '', '23/10/2016 00:21:17', '', 0),
(488, 36, 1, '248457026', 54, '<p>ยินดีกับท่านสมาชิกที่ทายถูกว่า ลิเวอร์พูลจะชนะเวสบรอมวิช ไปด้วยกอร์ 2&#8212;1 อย่างสนุก โดยมีผู้โชคดีรับรางวัลทั้งสิ้น7ท่านดังนี้<br />\n9040 ไอบีซี หงส์ 2-1<br />\n51089 sbo Liverpool win 2-1<br />\n50565 IBC  LIVERPOOL WIN 2-1<br />\nล่น ibc 50615 ลิเวอร์พูล ชนะ 2-1 ครับ<br />\n53288 SBO ลิเวอร์พูล ชนะ 2-1<br />\n53497 sbq ตอบ ลิเวอร์พูล ชนะ 2-1<br />\n69005 sbo ตอบ ลิเวอรพูล ชนะ 2-1<br />\nโดยแบ่งเงินรางวัลกันไปท่านละ 2857 บาท โดยทางทีมงานขอตรวจสอบคุณสมบัติ และจะมอบเงินรางวัลเข้าไปในเว็บที่ท่านเล่นในเย็นวันอาทิตย์นี้ครับ ขอให้โชคดีกันอีกในเสาร์หน้า และเฮงๆๆ <br />\nปล.สมาชิกท่านแรก (9040) กรุณาใส่คำตอบให้ชัดเจนด้วยในครั้งหน้าครับ ในกรณีนี้เข้าใจได้ว่าบ้านลิเวอร์พลู แต่เพื่อความสะดวงและชัดเจนกรุณาใส่แพ้ชนะมาให้ชัดเจนครับ ขอบคุณครับ</p>', '', '23/10/2016 04:12:01', '', 1),
(489, 37, 90, '2875280180', 23, '<p>69005 sbo ขอรับโปรคับ</p>', '', '23/10/2016 06:54:33', '', 0),
(490, 37, 93, '2875272715', 24, '<p>50710 sbo ขอรับสิทธิ์โปรครับ</p>', '', '23/10/2016 10:36:37', '', 0),
(491, 37, 33, '3056951608', 25, '<p>50524 ibc ขอรับสิทธิ์</p>', '', '23/10/2016 15:24:25', '', 0),
(492, 37, 98, '2875243807', 26, '<p>50040 sbo ขอรับสิทธิ</p>', '', '25/10/2016 18:42:35', '', 0),
(493, 37, 29, '2098826592', 27, '<p>9040 เวบไอบีซี<br />\nขอรับโปรโมชั่น</p>', '', '25/10/2016 19:52:28', '', 0),
(494, 38, 137, '1612600312', 1, '<p>9633 ไอบีซี<br />\nลิเวอร์พูล ชนะ 3-2</p>', '', '26/10/2016 04:14:20', '', 0),
(495, 37, 137, '1612600312', 28, '<p>9633 ไอบีซี รับโปรด้วยครับ</p>', '', '26/10/2016 04:17:43', '', 0),
(496, 38, 22, '1991114521', 2, '<p>50173 3m ตอบ ลิเวอร์พูล ชนะ 2:0</p>', '', '26/10/2016 11:14:57', '', 0),
(497, 38, 92, '19833095', 3, '<p>เล่น ibc 50615 ลิเวอร์พูล ชนะ 3-1 ครับ)</p>', '', '26/10/2016 12:20:42', '', 0),
(498, 37, 110, '837050972', 29, '<p>9371 เล่นเวบ sbo และ ibc<br />\nขอรับโปร</p>', '', '26/10/2016 18:09:30', '', 0),
(499, 38, 110, '837050972', 4, '<p>9371 เอสบีโอ<br />\nหงส์แดง ชนะ 2-1</p>', '', '26/10/2016 18:11:29', '', 0),
(500, 38, 29, '3742916994', 5, '<p>9040<br />\nIBC<br />\nลิเวอร์ ชนะ 1:0</p>', '', '26/10/2016 19:12:45', '', 0),
(501, 37, 52, '837144158', 30, '<p>9551 web ibc<br />\nขอรับโปรโมชั่น จ้า</p>', '', '26/10/2016 21:11:56', '', 0),
(502, 38, 52, '837144158', 6, '<p>9551 web ibc เสมอกัน 1-1</p>', '', '26/10/2016 21:14:22', '', 0),
(503, 38, 11, '837083616', 7, '<p>50565 IBC คริสตัลพาเลส ชนะ 2-1 คนับ</p>', '', '26/10/2016 22:54:58', '', 0),
(504, 38, 12, '3068694161', 8, '<p>51779 sbo ลิเวอร์พูลชนะ 1-0</p>', '', '27/10/2016 00:42:38', '', 0),
(505, 38, 55, '3076114560', 9, '<p>53288 sbo คริสตัลพาเลส ชนะ 2-0</p>', '', '27/10/2016 11:40:13', '', 0),
(506, 38, 111, '979465397', 10, '<p>51395 SBO คริสตัลพาเลส ชนะ 3-1</p>', '', '27/10/2016 12:22:14', '', 0),
(507, 38, 16, '3031903215', 11, '<p>53004 sbo คริสตัล พาเลซ ชนะ 1-0<br />\n :o-v: :o-v: :o-v:</p>', '', '27/10/2016 14:08:09', '', 0),
(508, 37, 16, '3031903215', 31, '<p>53004 sbo ขอรับสิทธิ์</p>', '', '27/10/2016 14:09:15', '', 0),
(509, 38, 13, '3031902615', 12, '<p>51089 sbo liverpool win 2-0</p>', '', '27/10/2016 15:49:42', '', 0),
(510, 37, 67, '2875256860', 32, '<p>9606 เสมอ 2:2 เล่นเวบไอบีซี</p>', '', '28/10/2016 01:18:49', '', 0),
(511, 38, 67, '2875256860', 13, '<p>9606 เสมอ 2:2 เล่นเวบไอบีซี</p>', '', '28/10/2016 04:03:38', '', 0),
(512, 38, 116, '3754948861', 14, '<p>9527 sbo ตอบ ลิเวอร์พูล ชนะ 3-0</p>', '', '28/10/2016 08:21:09', '', 0),
(513, 38, 21, '3031927000', 15, '<p>51826 sbo ลิเวอร์พูลชนะ 2-1 ครับ</p>', '', '28/10/2016 11:08:09', '', 0),
(514, 37, 21, '3031927000', 33, '<p>51826 sbo ขอรับสิทธิ์</p>', '', '28/10/2016 11:09:05', '', 0),
(515, 38, 15, '3068687012', 16, '<p>53011 sbo เสมอ 1-1</p>', '', '28/10/2016 12:28:02', '', 0),
(516, 38, 64, '1935112462', 17, '<p>9034 ibc เสมอ 0-0</p>', '', '28/10/2016 16:30:37', '', 0),
(517, 38, 72, '3076019961', 18, '<p>51905 sbo ลิเวอร์พูลชนะ 3-1 ครับ</p>', '', '28/10/2016 18:06:38', '', 0),
(518, 38, 77, '3076016923', 19, '<p>51938 sbo เสมอกันไป 2-2</p>', '', '28/10/2016 23:01:14', '', 0),
(519, 38, 43, '2875414335', 20, '<p>9595 IBC LIVERPOOL WIN 2:0</p>', '', '29/10/2016 00:24:58', '', 0),
(520, 38, 41, '3754827735', 21, '<p>7933 3m ลิเวอร์พูลชนะ 3-0</p>', '', '29/10/2016 01:54:58', '', 0),
(521, 38, 60, '1856562471', 22, '<p>7455 ibc<br />\nคริสตัล พาเลซ 0 :2  ลิเวอร์พูล</p>', '', '29/10/2016 05:07:50', '', 0),
(522, 38, 33, '1991051873', 23, '<p>50524 ibc เสมอ1-1</p>', '', '29/10/2016 05:32:20', '', 0),
(523, 38, 96, '3068660801', 24, '<p>IBC 9562 ตอบ ลิเวอร์พูล ชนะ 2:0</p>', '', '29/10/2016 06:48:42', '', 0),
(524, 38, 107, '3031940471', 25, '<p>53105 ibc ตอบ ลิเวอร์ ชนะ 2-1</p>', '', '29/10/2016 07:15:06', '', 0),
(525, 38, 58, '19876495', 26, '<p>50688 sbo ตอบ ลิเวอร์พูล ชนะ 3-0</p>', '', '29/10/2016 07:40:39', '', 0),
(526, 38, 87, '3754756061', 27, '<p>51190 ibc ตอบว่า พาเลส 1 - 3 ลิเวอรพูล</p>', '', '29/10/2016 07:53:45', '', 0),
(527, 38, 38, '2098882115', 28, '<p>9188ibcตอบ เสมอ2-2</p>', '', '29/10/2016 07:57:26', '', 0),
(528, 38, 101, '3076111304', 29, '<p>53319 sbo คริสตัล พาเลช 3-3 ลิเวอร์พลู</p>', '', '29/10/2016 08:27:24', '', 0),
(529, 38, 65, '462498603', 30, '<p>9324 ibc ลิเวอร์พูล ชนะ 4-1 ครับ</p>', '', '29/10/2016 09:19:36', '', 0),
(530, 38, 100, '3031937232', 31, '<p>50775 sbo ลิเวอร์พูลชนะ 2 - 1</p>', '', '29/10/2016 09:50:43', '', 0),
(531, 38, 90, '3390911708', 32, '<p>69005 sbo ตอบ เสมอ 1-1</p>', '', '29/10/2016 10:09:12', '', 0),
(532, 38, 76, '2098803309', 33, '<p>Bkj3379015 m8ตอบ พาเลซ 2 ลิเวอ 3</p>', '', '29/10/2016 10:19:27', '', 0),
(533, 37, 61, '973838170', 34, '<p>50412  web 3m+ibc ขอรับสิทธิจ้า</p>', '', '29/10/2016 10:24:35', '', 0),
(534, 38, 61, '973838170', 34, '<p>50412 เวป 3M+IBC  ลิเวอร์ชนะ 1-0</p>', '', '29/10/2016 10:26:49', '', 0),
(535, 38, 129, '2001495187', 35, '<p>50468 SBO &nbsp; Crystal Palace 1-3 Liverpool</p>', '', '29/10/2016 10:27:20', '', 0),
(536, 38, 73, '2869193421', 36, '<p>50611 ibc ลิเวอร์พูล ชนะ 4-2</p>', '', '29/10/2016 11:00:13', '', 0),
(537, 38, 98, '2875244125', 37, '<p>50040 sbo ตอบว่า เสมอ 2-2</p>', '', '29/10/2016 11:03:17', '', 0),
(538, 38, 32, '1856590451', 38, '<p>53250 sbo ทาย ลิเวอร์พูล ชนะ 2-0</p>', '', '29/10/2016 11:26:24', '', 0),
(539, 38, 75, '3068690135', 39, '<p>53599  sbq ตอบ ลิเวอร์พูล ชนะ 2-1</p>', '', '29/10/2016 11:44:55', '', 0),
(540, 38, 94, '19800576', 40, '<p>Sbo. 50151. ตอบ. เสมอ. 2-2</p>', '', '29/10/2016 11:54:28', '', 0),
(541, 37, 63, '3068678087', 35, '<p>Sbo51449 ขอร้บส ทค้บ</p>', '', '29/10/2016 12:06:05', '', 0),
(542, 38, 35, '3742903054', 41, '<p>53497 sbq ตอบ ลิเวอร์พูล ชนะ 2-0</p>', '', '29/10/2016 12:08:28', '', 0),
(543, 38, 115, '837102601', 42, '<p>9214 ibc ตอบ เสมอ 0-0</p>', '', '29/10/2016 12:12:59', '', 0),
(544, 38, 63, '3068678087', 43, '<p>Sbo51449  เสมอก้น&nbsp; 2-2  ค้บ</p>', '', '29/10/2016 12:16:00', '', 0),
(545, 38, 120, '456600823', 44, '<p>sbo51780 เสมอ&nbsp; 1-1</p>', '', '29/10/2016 12:17:30', '', 0),
(546, 38, 27, '2875286704', 45, '<p>51467 sbq ตอบ ลิเวอร์พูล ชนะ 1-0</p>', '', '29/10/2016 12:42:04', '', 0),
(547, 38, 74, '456600776', 46, '<p>53061 sbo ตอบ&nbsp; ลิเวอร์พูล&nbsp; ชนะ&nbsp; 3-1</p>', '', '29/10/2016 13:00:01', '', 0),
(548, 38, 57, '973742850', 47, '<p>50966 sbo ตอบ ลิเวอร์พูล ชนะ 4-1</p>', '', '29/10/2016 13:38:42', '', 0),
(549, 38, 85, '456643388', 48, '<p>9150 sbo<br />\nลิเวอร์ ชนะ 3-1</p>', '', '29/10/2016 13:45:08', '', 0),
(550, 38, 105, '19917597', 49, '<p>7433 sbo ลิเวอร์พูล ชนะ 4-0</p>', '', '29/10/2016 14:26:58', '', 0),
(551, 38, 139, '2261045339', 50, '<p>9571 พาเลซ ชนะ 1-0<br />\nไอบีซี</p>', '', '29/10/2016 14:36:15', '', 0),
(552, 38, 93, '979465397', 51, '<p>50710 sbo ตอบว่า&nbsp; ลิเวอร์ ชนะ 2-0</p>', '', '29/10/2016 15:08:29', '', 0),
(553, 38, 86, '19820292', 52, '<p>50488 sbo. ตอบ. ลิเวอร์พูล ชนะ 2-1</p>', '', '29/10/2016 15:10:16', '', 0),
(554, 38, 78, '2875239065', 53, '<p>9483sbo ลิเวอร์ชนะ 4-2</p>', '', '29/10/2016 15:11:12', '', 0),
(555, 38, 30, '3742897369', 54, '<p>51671 sbo ตอบ ลิเวอร์พูลชนะ2-1ครับ</p>', '', '29/10/2016 15:16:21', '', 0),
(556, 38, 31, '3742911496', 55, '<p>53581 sbo ตอบ ลิเวอร์พลูชนะ3-1ครับ</p>', '', '29/10/2016 15:27:36', '', 0),
(557, 38, 119, '2875257894', 56, '<p>50721 sbo palace win 1-0</p>', '', '29/10/2016 16:10:13', '', 0),
(558, 38, 132, '3068687085', 57, '<p>53027 sbobet ลิเวอร์พูลชนะ 2-1</p>', '', '29/10/2016 16:13:38', '', 0),
(559, 38, 36, '825272454', 58, '<p>69008 sbo ตอบ คริสตัลพาเลซ ชนะ 2-1</p>', '', '29/10/2016 16:38:29', '', 0),
(560, 38, 106, '3068684798', 59, '<p>9129 sbo ลิเวอร์พูล ชนะ 2 ต่อ 0</p>', '', '29/10/2016 16:53:42', '', 0),
(561, 38, 84, '3742918315', 60, '<p>9415 ibc เสมอกัน 1-1</p>', '', '29/10/2016 17:00:24', '', 0),
(562, 38, 103, '19907864', 61, '<p>8160 ibc ตอบ ลิเวอร์พูลชนะ 3-0</p>', '', '29/10/2016 17:18:34', '', 0),
(563, 38, 91, '2875555996', 62, '<p>50461 sbo คริสตัล พาเลซ 1:5 ลิเวอร์พูล</p>', '', '29/10/2016 18:00:44', '', 0),
(564, 37, 106, '3068684798', 36, '<p>9129 sbo รับสิทธิ์</p>', '', '30/10/2016 07:18:50', '', 0),
(565, 38, 1, '19792701', 63, '<p>ยินดีกับสองสมาชิกที่แสนเก่ง มหาเฮงที่ทายผลว่า ลิเวอร์พูลจะบุกไปชนะคริสตัล พาเลซไปด้วยสกอ์&nbsp; 2&#8212;4 อย่างสนุกสุดมันส์รับเงินไปเป็นกอบเป็นกำท่านละ 10000 บาท ดังมีรายชื่อดังนี้<br />\n50611 ibc ลิเวอร์พูล ชนะ 4-2<br />\n9483sbo ลิเวอร์ชนะ 4-2<br />\nโดยทางทีมงานแฟนบอลจะตรวจสอบคุณสมบัติและจะมอบเงินเรางวัลไปในเว็บที่ท่านเล่นในเย้นวันนี้นะครับ ขอให้โชคดีกับเกมส์ในวันเสาร์หน้าครับ เฮงๆๆ</p>', '', '30/10/2016 10:04:20', '', 1),
(566, 37, 106, '3068684798', 37, '<p>9129 sbo รับสิทธิ์ครับ</p>', '', '01/11/2016 10:52:42', '', 0),
(567, 37, 136, '3754932687', 38, '<p>50171 ibc ขอรับโปรครับ</p>', '', '01/11/2016 10:54:18', '', 0),
(568, 37, 63, '3068684875', 39, '<p>Sbo 51449  ขอร้บสิทธิ์ค้บ</p>', '', '01/11/2016 11:54:26', '', 0),
(569, 37, 101, '3031944741', 40, '<p>53319  sbo  ขอรับสิทธิ</p>', '', '02/11/2016 07:05:32', '', 0),
(570, 39, 12, '3068687901', 1, '<p>51779 sbo เชลซีชนะ1-0ครับ</p>', '', '02/11/2016 08:53:03', '', 0),
(571, 39, 33, '3056951556', 2, '<p>50524 ibc เสมอ1-1</p>', '', '02/11/2016 09:30:42', '', 0),
(572, 39, 111, '979465397', 3, '<p>51395 SBO เชลซี ชนะ 3-1</p>', '', '02/11/2016 10:04:57', '', 0),
(573, 37, 142, '1991236944', 41, '<p>50230 sbo  ขอรับโปร ครับ</p>', '', '02/11/2016 10:07:52', '', 0),
(574, 39, 73, '16949407', 4, '<p>50611 ibc เชลชี ชนะ 2-1</p>', '', '02/11/2016 11:13:38', '', 0),
(575, 39, 72, '2098843039', 5, '<p>51905 sbo เชลซีชนะ 2-0</p>', '', '02/11/2016 15:13:12', '', 0),
(576, 39, 137, '1612600312', 6, '<p>9633 เชลซี ชนะ 3:2 ไอบีซี</p>', '', '02/11/2016 18:01:35', '', 0),
(577, 39, 110, '2455251246', 7, '<p>9371 sbo<br />\nChelsea win 2-1</p>', '', '02/11/2016 18:12:28', '', 0),
(578, 39, 77, '3742908566', 8, '<p>51938 sbo เชลซี ชนะ 3-2</p>', '', '02/11/2016 19:39:10', '', 0),
(579, 39, 52, '1856563283', 9, '<p>9551 ibc เสมอ 1-1</p>', '', '02/11/2016 21:12:40', '', 0),
(580, 39, 29, '837144028', 10, '<p>9040<br />\nเชลซี ชนะ 1-0<br />\nเวบไอบีซี</p>', '', '02/11/2016 21:25:05', '', 0),
(581, 39, 55, '248456791', 11, '<p>53288 sbo เอฟเวอร์ตัน ชนะ 2-0 :o-A: :o-A:</p>', '', '03/11/2016 09:38:52', '', 0),
(582, 39, 68, '973726159', 12, '<p>9813 เชลซีชนะ 2-1 sbo</p>', '', '03/11/2016 10:43:28', '', 0),
(583, 39, 96, '3068702446', 13, '<p>IBC 9562 ตอบ เชลซี เสมอ เอฟเวอร์ตัน 2:2</p>', '', '03/11/2016 10:47:19', '', 0),
(584, 39, 107, '3031940464', 14, '<p>53105 ibc เชลซี ชนะ 2-1</p>', '', '03/11/2016 10:54:08', '', 0),
(585, 39, 142, '3056931558', 15, '<p>50230 sbo  เชลซี ชนะ 3 ต่อ 1</p>', '', '03/11/2016 11:09:50', '', 0),
(586, 39, 26, '3068683273', 16, '<p>Bkj3353095<br />\nเชลซีชนะ 2-1</p>', '', '03/11/2016 16:14:22', '', 0),
(587, 39, 15, '3068680814', 17, '<p>53011 sbo เสมอ 1-1</p>\n\n', '', '03/11/2016 17:52:47', '', 0),
(588, 39, 135, '2869210316', 18, '<p>เชลซี 2- 1เอฟเวอรตัน<br />\nเว็บ 3m &nbsp;  53653</p>', '', '03/11/2016 20:11:50', '', 0),
(589, 39, 16, '3031894714', 19, '<p>53004 sbo เชลชีชนะ 2-1<br />\n :^-^: :^-^: :^-^:</p>\n\n', '', '03/11/2016 21:43:12', '', 0),
(590, 39, 85, '456609511', 20, '<p>9150 sbo Chelsea win 3-1</p>', '', '04/11/2016 04:22:32', '', 0),
(591, 39, 58, '19858194', 21, '<p>50688 sbo ตอบ เชลซี ชนะ 2-0</p>', '', '04/11/2016 09:18:42', '', 0),
(592, 37, 143, '3068668267', 42, '<p>50297 sbo ขอรับสิทธิ์แลกแต้ม</p>', '', '04/11/2016 09:44:34', '', 0),
(593, 39, 38, '1701660097', 22, '<p>9188ibcตอบ เสมอ0-0</p>', '', '04/11/2016 13:16:35', '', 0),
(594, 39, 98, '1731412051', 23, '<p>50040 sbo ตอบว่า เชลซี ชนะ 2-0 &nbsp; :o-):</p>', '', '04/11/2016 13:24:42', '', 0),
(595, 37, 112, '18146481', 43, '<p>53342 3m &amp; sbq ขอรับสิทธิ์</p>', '', '04/11/2016 16:04:23', '', 0),
(596, 39, 112, '18146481', 24, '<p>53342 3m ตอบ เชลซีชนะ 3 -2</p>', '', '04/11/2016 16:05:48', '', 0),
(597, 39, 60, '3742908646', 25, '<p>7455 ibc  เชลชีชนะ 3:1</p>', '', '04/11/2016 16:29:41', '', 0),
(598, 39, 64, '1935112649', 26, '<p>9034<br />\nibc Chelsea ชนะ 4-1</p>', '', '04/11/2016 16:47:29', '', 0),
(599, 39, 120, '3400561422', 27, '<p>51780 sbo เชลซี เสมอ 0-0</p>', '', '04/11/2016 19:44:30', '', 0),
(600, 39, 92, '19891911', 28, '<p>เล่น ibc 50615เชลซี ชนะ 2-0 ครับ)</p>', '', '04/11/2016 22:01:44', '', 0),
(601, 39, 13, '3031927629', 29, '<p>51089 sbo เชลซีชนะ 3-0</p>', '', '04/11/2016 22:50:59', '', 0),
(602, 39, 43, '3400563477', 30, '<p>9595 เชลซี ชนะ 2-0<br />\nเล่น ไอบีซี</p>', '', '05/11/2016 00:04:45', '', 0),
(603, 39, 76, '462498610', 31, '<p>Bkj3379015 m8 ตอบ เชลซีชนะ4-0</p>', '', '05/11/2016 02:35:00', '', 0),
(604, 39, 57, '973742850', 32, '<p>50966 sbo ตอบ เสมอ 0-0</p>', '', '05/11/2016 04:51:53', '', 0),
(605, 39, 67, '2875256835', 33, '<p>9606 เสมอ 2-2 ไอบีซี</p>', '', '05/11/2016 05:26:31', '', 0),
(606, 39, 132, '2875257897', 34, '<p>53027 sbo เชลซี ชนะ 1-0</p>', '', '05/11/2016 06:49:41', '', 0),
(607, 39, 61, '973838170', 35, '<p>50412  ibc/3m เชลซี ชนะ เอฟเวอร์ตัน 4-1</p>', '', '05/11/2016 07:50:25', '', 0),
(608, 39, 100, '825347480', 36, '<p>50775 sbo ตอบเชลซีชนะ 2 - 1</p>', '', '05/11/2016 08:02:52', '', 0),
(609, 39, 94, '19850892', 37, '<p>Sbo. 50151. ตอบ เชลซี. ชนะ. 3-1</p>', '', '05/11/2016 08:19:53', '', 0),
(610, 39, 31, '3742896984', 38, '<p>53581sbo ตอบ เชลชีชนะ1-0ครับ</p>', '', '05/11/2016 09:20:24', '', 0),
(611, 39, 113, '837107159', 39, '<p>53663  sbobet  เชลชี ชนะ 3-1</p>', '', '05/11/2016 09:21:03', '', 0),
(612, 39, 91, '2875513867', 40, '<p>50461 sbo เชลซี ชนะ 5-3</p>', '', '05/11/2016 09:22:15', '', 0),
(613, 39, 30, '3742919630', 41, '<p>51671 sbo ตอบ เชลชีชนะ2-0ครับ</p>', '', '05/11/2016 09:22:23', '', 0),
(614, 39, 11, '837215742', 42, '<p>50565 IBC เชลซี ชนะ 2-0</p>', '', '05/11/2016 09:38:28', '', 0),
(615, 39, 69, '19859587', 43, '<p>50427 sbo ตอบ เชลชี ชนะ 3-0</p>', '', '05/11/2016 09:40:30', '', 0),
(616, 39, 116, '19833741', 44, '<p>9527sbo ตอบ เชลซีชนะ2-1</p>', '', '05/11/2016 10:03:12', '', 0),
(617, 39, 78, '2875238972', 45, '<p>9483 sbo ตอบ เชลซี แพ้ 2-3</p>', '', '05/11/2016 10:23:50', '', 0),
(618, 39, 106, '3068684798', 46, '<p>9129 sbo เชลซีชนะ 1 ต่อ 0</p>', '', '05/11/2016 10:28:48', '', 0),
(619, 39, 65, '2098826560', 47, '<p>9324 ibc เชลซี ชนะ 4-2 ครับ</p>', '', '05/11/2016 11:08:07', '', 0),
(620, 39, 84, '3742919889', 48, '<p>9415 ibc เสมอกัน 2-2</p>', '', '05/11/2016 11:08:17', '', 0),
(621, 39, 21, '3076018647', 49, '<p>51826 sbo ตอบ เชลชีชนะ 3-1</p>', '', '05/11/2016 11:22:55', '', 0),
(622, 39, 93, '2875272907', 50, '<p>50710 sbo ตอบว่าเชลชีชนะเอฟ3-1</p>', '', '05/11/2016 11:30:23', '', 0),
(623, 39, 127, '2263627117', 51, '<p>50861 ibc<br />\nเชลซีชนะ 2 : 0</p>', '', '05/11/2016 11:33:38', '', 0),
(624, 39, 41, '2869210316', 52, '<p>7933 3m เชลซีชนะ 2-0</p>', '', '05/11/2016 12:02:44', '', 0),
(625, 39, 22, '825295327', 53, '<p>50173 3m ตอบ เชลซีชนะ 2:0</p>', '', '05/11/2016 12:08:46', '', 0),
(626, 39, 90, '3390911708', 54, '<p>69005 sbo ตอบเชลชีชนะ 3-1</p>', '', '05/11/2016 12:24:22', '', 0),
(627, 39, 56, '1850596654', 55, '<p>53256 sbo เสมอ 1-1</p>', '', '05/11/2016 12:43:28', '', 0),
(628, 39, 103, '2577080407', 56, '<p>8160 ibc ตอบ เชลซี ชนะ 4-0</p>', '', '05/11/2016 12:49:08', '', 0),
(629, 39, 105, '19828551', 57, '<p>7433 sbo เสมอ 0-0</p>', '', '05/11/2016 13:22:01', '', 0),
(630, 39, 146, '973746920', 58, '<p> Sbo 9810 เสมอ1-1</p>', '', '05/11/2016 14:12:10', '', 0),
(631, 39, 144, '3742893360', 59, '<p>53730. Sbo. ตอบ เชลซี. ชนะ 2-0</p>', '', '05/11/2016 14:28:24', '', 0),
(632, 39, 115, '3068679361', 60, '<p>9214 ibc ตอบ เซลซี ชนะ 4-0</p>', '', '05/11/2016 14:34:13', '', 0),
(633, 39, 130, '19875520', 61, '<p>เชลซีชนะ5-0</p>', '', '05/11/2016 14:37:58', '', 0),
(634, 39, 130, '19875520', 62, '<p>3351076 sbo เชลซีชนะ 5-0</p>', '', '05/11/2016 14:40:55', '', 0),
(635, 39, 119, '3068667368', 63, '<p>50721 sbo everton win 1-0</p>', '', '05/11/2016 14:43:27', '', 0),
(636, 39, 87, '3754949467', 64, '<p>51190 ibc ตอบว่า เซลซี 3-0 เอฟเวอตัน</p>', '', '05/11/2016 14:50:07', '', 0),
(637, 39, 139, '2261045339', 65, '<p>9571<br />\nIBC<br />\nเชลซี ชนะ 3:0</p>', '', '05/11/2016 14:51:38', '', 0),
(638, 39, 27, '3068679589', 66, '<p>51467  sbq ตอบ&nbsp; เชลซี ชนะ&nbsp; 2-1</p>', '', '05/11/2016 14:59:34', '', 0),
(639, 39, 63, '3742900428', 67, '<p>Sbo51449 เชลชีชนะ4-1ค้บ</p>', '', '05/11/2016 16:54:35', '', 0),
(640, 39, 75, '3068686134', 68, '<p>53599  sbq ตอบ เชลซี ชนะ 2-0</p>\n\n', '', '05/11/2016 16:54:56', '', 0),
(641, 39, 74, '456605733', 69, '<p>53061 sbo ตอบ เชลซี ชนะ 3-1</p>', '', '05/11/2016 16:59:04', '', 0),
(642, 39, 35, '456600054', 70, '<p>53497 sbq ตอบ เชลซี ชนะ 1-0</p>', '', '05/11/2016 17:02:05', '', 0),
(643, 39, 32, '19890312', 71, '<p>53250 sbo ทาย เชลซี ชนะ 2-0</p>', '', '05/11/2016 17:44:33', '', 0),
(644, 39, 101, '3056988463', 72, '<p>Sbo 53319 เชลซี5-1เอฟเวอร์ตัน</p>', '', '06/11/2016 00:11:37', '', 0),
(645, 39, 1, '3076115655', 73, '<p>ยินดีกับท่านสมาชิกที่แสนเก่ง มหาเฮง ทายถูกว่าเชลซีจะบดขยี้เอฟเวอร์ตันไปอย่างขาดลอย ด้วยสกอร์เชลซีชนะ5&#8212;0 อย่างสนุก เป็นผลให้ได้รับเงินรางวัลไปเต็มๆ 20000 บาท ท่านเดียวไปเลย (ไม่คิดว่าจะมีคนถูก กะจะทำทายผลต่อวันอาทิตย์แล้วนะนี่) แต่ยังมีผู้ที่มองการไกลอย่างท่านสมาชิก ท่านนี้<br />\n 3351076 sbo เชลซีชนะ 5-0 <br />\nรับเงินรางวัลไปใช้อย่างสบายใจกันไป โดยที่ทีมงานขอตรวจสอบคุณสมบัติและมอบเงินให้ท่านในเว็บที่ท่านเล่นในเย็นวันอาทิตย์นี้ครับ ขอให้โชคดีจงเป็นของท่านสมาชิกท่านอื่นๆบ้าง ทายกันมาในเสาร์หน้าครับ เฮงๆๆ เราแจกกันอย่างต่อเนื่องครับ</p>', '', '06/11/2016 03:05:35', '', 1),
(646, 37, 130, '2875480498', 44, '<p>51076 sbo ขอรับสิทธิ์</p>', '', '06/11/2016 14:47:54', '', 0),
(647, 40, 137, '1612600312', 1, '<p>9633 ไอบีซี เวลส์ แพ้ 0-1</p>', '', '09/11/2016 03:13:20', '', 0),
(648, 40, 110, '837050669', 2, '<p>9371<br />\nSBO<br />\nเวลส์ ชนะ 2-1</p>', '', '09/11/2016 04:05:41', '', 0),
(649, 40, 12, '3068688784', 3, '<p>51779 sbo เวลส์ชนะ 1-0</p>', '', '09/11/2016 09:20:37', '', 0),
(650, 40, 33, '18121424', 4, '<p>50524 เสมอ1-1 ibc</p>', '', '09/11/2016 09:42:29', '', 0),
(651, 40, 146, '462498307', 5, '<p>Sbo9810 เวลล์ชนะ 2-0</p>', '', '09/11/2016 13:17:15', '', 0),
(652, 40, 58, '462542174', 6, '<p>50688 sbo ตอบ เวล ชนะ 2-1</p>', '', '09/11/2016 13:25:06', '', 0),
(653, 40, 113, '3068676150', 7, '<p>53663 sbobet  เวลล์ ชนะ 3-2</p>', '', '09/11/2016 15:05:29', '', 0),
(654, 40, 52, '3400565873', 8, '<p>9551 เสมอ 1-1 ไอบีซี</p>', '', '09/11/2016 18:56:03', '', 0),
(655, 40, 38, '16968301', 9, '<p>เวลล์ชนะ1-0</p>', '', '09/11/2016 21:19:19', '', 0),
(656, 40, 29, '837143579', 10, '<p>9040 ibc เวลส์ ชนะ 1:0</p>', '', '09/11/2016 21:28:18', '', 0),
(657, 40, 21, '3076087623', 11, '<p>51826 sbo เวลส์ ชนะ 2-0 ครับ</p>', '', '09/11/2016 22:04:57', '', 0),
(658, 40, 130, '2869235030', 12, '<p>51076 sbo เสมอ 2-2</p>', '', '10/11/2016 07:12:37', '', 0),
(659, 40, 92, '19802666', 13, '<p>ibc 50615 เวลส์ เสมอ&nbsp; 2-2 ครับ</p>', '', '10/11/2016 07:35:59', '', 0),
(660, 40, 55, '248456541', 14, '<p>53288 sbobet เวลล์ ชนะ 3-0  :o-O: :o-O: :o-O:</p>', '', '10/11/2016 08:48:48', '', 0),
(661, 40, 72, '2098843027', 15, '<p>51905 sbo เวลส์ชนะ 2-1 <br />\n :o-o: :o-o: :o-o:</p>', '', '10/11/2016 12:23:05', '', 0),
(662, 40, 73, '17081798', 16, '<p>50611 ibc เวลล์ 1-2 เซอร์เบีย</p>', '', '10/11/2016 13:37:42', '', 0),
(663, 40, 111, '979465397', 17, '<p>51395 SBO เวลส์ ชนะ 3-1</p>', '', '10/11/2016 14:19:44', '', 0),
(664, 40, 15, '837106111', 18, '<p>53011 sbo เสมอ 1-1</p>', '', '10/11/2016 17:32:39', '', 0),
(665, 40, 13, '3031920136', 19, '<p>51089 sbo เซอร์เบีย ชนะ 2-1</p>', '', '10/11/2016 20:21:34', '', 0),
(666, 40, 43, '2875414355', 20, '<p>9595<br />\nไอบีซี<br />\nเวลส์ ชนะ 2-0</p>', '', '11/11/2016 00:34:29', '', 0),
(667, 37, 63, '3742904846', 45, '<p>Sbo51449 ขอร้บสิทธิ่ค้บ</p>', '', '11/11/2016 05:51:15', '', 0),
(668, 40, 11, '837162655', 21, '<p>50565 IBC เซอร์เบียร์ ชนะ 2-0</p>', '', '11/11/2016 06:34:05', '', 0),
(669, 40, 135, '2869392586', 22, '<p>เวลส์ชนะ 3-0<br />\nเว็บ 3m &nbsp; 53653</p>', '', '11/11/2016 08:34:47', '', 0),
(670, 40, 16, '3076014696', 23, '<p>53004 sbo เซอร์เบียชนะ 1-0 คับ<br />\n :o->: :o->: :o->:</p>', '', '11/11/2016 11:14:32', '', 0),
(671, 37, 12, '3068681486', 46, '<p>51779 sbo ขอรับโปร</p>', '', '11/11/2016 13:57:12', '', 0),
(672, 40, 60, '3742915469', 24, '<p>7455 ibc เชอรเบีย ชนะ 3:1</p>', '', '11/11/2016 15:28:59', '', 0),
(673, 40, 64, '1935115268', 25, '<p>9034 ไอบีซี เสมอ 0-0</p>', '', '11/11/2016 16:53:34', '', 0),
(674, 40, 77, '19884830', 26, '<p>51938 sbo 0-0</p>', '', '11/11/2016 19:37:16', '', 0),
(675, 40, 67, '2875256844', 27, '<p>9606 เสมอ 2:2 ไอบีซี</p>', '', '11/11/2016 22:04:26', '', 0),
(676, 40, 30, '3056942794', 28, '<p>51671 sbo ตอบ เวลส์ชนะ2-1ครับ</p>', '', '11/11/2016 22:44:14', '', 0),
(677, 40, 31, '3056942794', 29, '<p>53581sbo ตอบ เสมอ1-1ครับ</p>', '', '11/11/2016 22:47:46', '', 0),
(678, 40, 76, '462498720', 30, '<p>Bkj3379015 m8 เวลส์ชนะ4-1</p>', '', '12/11/2016 00:27:01', '', 0),
(679, 40, 85, '456613555', 31, '<p>9150 sbo Serbia win 2-1</p>', '', '12/11/2016 01:56:06', '', 0),
(680, 40, 87, '3754948986', 32, '<p>51190 ibc ตอบว่า เวลส์ 3-1 เซอรเบียร</p>', '', '12/11/2016 05:42:24', '', 0),
(681, 40, 74, '3742898697', 33, '<p>53061 sbo ตอบ เวลส์ ชนะ 2-1</p>', '', '12/11/2016 05:50:12', '', 0),
(682, 40, 69, '3754718441', 34, '<p>50427 sbo ตอบ เวลส์ 1 - 3 เซอร์เบีย</p>', '', '12/11/2016 08:04:46', '', 0),
(683, 40, 84, '3742906569', 35, '<p>9415 ibc เสมอกัน 0-0</p>', '', '12/11/2016 08:43:50', '', 0),
(684, 40, 90, '462532786', 36, '<p>69005 sbo เสมอ2-2</p>', '', '12/11/2016 09:21:45', '', 0),
(685, 40, 93, '979465397', 37, '<p>50710 sbo ตอบว่า เซอรเบีย ชนะ เวลส์ 3-0</p>', '', '12/11/2016 09:44:51', '', 0),
(686, 40, 98, '2875244274', 38, '<p>50040 sbo ตอบว่า เสมอ 3-3</p>', '', '12/11/2016 11:04:05', '', 0),
(687, 40, 63, '3742920836', 39, '<p>Sbo51449 เวลส์ชนะ3-1</p>', '', '12/11/2016 11:16:10', '', 0),
(688, 40, 120, '3742920836', 40, '<p>Sbo51780 เวล(ส์ชนะ3-0</p>', '', '12/11/2016 11:19:04', '', 0),
(689, 40, 151, '3742911825', 41, '<p>sbo 3488 ทาย เสมอ 0 0</p>', '', '12/11/2016 12:01:12', '', 0),
(690, 40, 27, '837073460', 42, '<p>51467 sbq ตอบ เวลส์ ชนะ&nbsp; 2-0</p>', '', '12/11/2016 12:30:46', '', 0),
(691, 40, 75, '3068706064', 43, '<p>53599 sbq  ตอบ เวลส์ ชนะ 1-0</p>', '', '12/11/2016 12:40:10', '', 0),
(692, 40, 35, '3742906244', 44, '<p>53497 sbq ตอบ เวลส์ ชนะ 3-1</p>', '', '12/11/2016 13:14:49', '', 0),
(693, 40, 78, '2875239235', 45, '<p>9483 sbo ตอบ เสมอ กัน 2-2</p>', '', '12/11/2016 13:45:10', '', 0),
(694, 40, 144, '3742892135', 46, '<p>53730.sbo เวลส์แพ้ 2-3</p>', '', '12/11/2016 13:51:01', '', 0),
(695, 40, 32, '19851796', 47, '<p>53250 sbo ทาย เวลส์ ชนะ 2-0</p>', '', '12/11/2016 13:58:06', '', 0),
(696, 40, 127, '2263626863', 48, '<p>Ibc <br />\n50861 เวลส์ ชนะ 1 : 0</p>', '', '12/11/2016 14:06:23', '', 0),
(697, 40, 115, '837103075', 49, '<p>9214 ibc ตอบ เสมอ 0-0</p>', '', '12/11/2016 14:08:01', '', 0),
(698, 37, 127, '2263626863', 47, '<p>50861<br />\nIBC ขอรับสิทธิ์</p>', '', '12/11/2016 14:10:43', '', 0),
(699, 40, 142, '456611889', 50, '<p>50230 sbo  เวล แพ้ เซอเบีย&nbsp; 1 ต่อ 2</p>', '', '12/11/2016 14:41:51', '', 0),
(700, 40, 86, '19804046', 51, '<p>50488 sbo  เวลส์&nbsp; ชนะ&nbsp; 3-2</p>', '', '12/11/2016 14:49:45', '', 0),
(701, 40, 106, '837214399', 52, '<p>9129 sbo เสมอกัน 2 ต่อ 2</p>', '', '12/11/2016 14:57:22', '', 0),
(702, 40, 61, '973838170', 53, '<p>50412 Web 3M เสมออย่างเงียบเหงา เวลส์ 1-1 เซอร์เบีย</p>', '', '12/11/2016 15:18:07', '', 0),
(703, 40, 94, '19792220', 54, '<p>Sbo 50151 ตอบ เวลส์ ชนะ 3-1</p>', '', '12/11/2016 15:25:46', '', 0),
(704, 40, 139, '2261045339', 55, '<p>9571<br />\nเซอร์เบีย ชนะ 2-0<br />\nไอบีซี</p>', '', '12/11/2016 15:32:30', '', 0),
(705, 40, 152, '3754824822', 56, '<p>51930  SBO เวลล์&nbsp; 1 - 1 เซอร์เบีย</p>', '', '12/11/2016 15:44:01', '', 0),
(706, 37, 152, '3754824822', 48, '<p>51930 SBO ขอรับสิทธิ์</p>\n\n', '', '12/11/2016 15:46:00', '', 0),
(707, 40, 113, '3068676150', 57, '<p>3663<br />\nSbobet<br />\nเวลล์ เสมอ กับ เซอร์เบียร์&nbsp;  2-2</p>', '', '12/11/2016 16:13:41', '', 0),
(708, 40, 129, '2001495241', 58, '<p>50468 SBO เวลล์&nbsp; 1 - 0 เซอร์เบีย</p>', '', '12/11/2016 16:37:26', '', 0),
(709, 40, 116, '19810390', 59, '<p>9527 sbo ตอบ เสมอ 1-1</p>', '', '12/11/2016 17:15:28', '', 0),
(710, 40, 105, '19793970', 60, '<p>7433 sbo เสมอกัน 0-0</p>', '', '12/11/2016 17:19:59', '', 0),
(711, 40, 103, '19800885', 61, '<p>8160 ibc ตอบ เซอเบีย ชนะ 3-0</p>\n\n', '', '12/11/2016 17:23:49', '', 0),
(712, 40, 107, '2001489435', 62, '<p>53105 ibc ตอบ เสมอ 1-1</p>', '', '12/11/2016 17:40:36', '', 0),
(713, 40, 56, '2046913505', 63, '<p>3256 sbo เวลส์ ชนะ 2-0</p>', '', '12/11/2016 17:42:56', '', 0),
(714, 40, 26, '3068672132', 64, '<p>เวลล์ชนะ3-1 <br />\n3M 53095</p>', '', '12/11/2016 18:40:26', '', 0),
(715, 40, 101, '1990986318', 65, '<p>53319 sbo. เวลส์3-3เซอร์เบีย</p>', '', '13/11/2016 01:30:05', '', 0),
(716, 40, 1, '248456666', 66, '<p>ยินดีกับท่านสมาชิกผู้โชคดีทายถูกทั้ง8 ท่าน ที่ทายว่า ผลการแข่งขัน ระหว่าง ทีมชาติเวลส์ จะเสมอกับทีมชาติเซอร์เบีย ไปด้วยสกอร์ 1&#8212;1 แบ่งเงินรางวัลกันไปท่านละ2500 บาท ดังรายชื่อต่อไปนี้<br />\n50524 เสมอ1-1 ibc<br />\n9551 เสมอ 1-1 ไอบีซี<br />\n53011 sbo เสมอ 1-1<br />\n53581sbo ตอบ เสมอ1-1ครับ<br />\n50412 Web 3M เสมออย่างเงียบเหงา เวลส์ 1-1 เซอร์เบีย<br />\n51930 SBO เวลล์&nbsp; 1 - 1 เซอร์เบีย<br />\n9527 sbo ตอบ เสมอ 1-1<br />\n53105 ibc ตอบ เสมอ 1-1<br />\nโดยทางทีมงานขอตรวจสอบคุณสมบัติตามกติกา และจะมอบเงินรางวัลให้กับท่านสมาชิกผู้โชคดีในเว็บของท่านในเย็นวันอาทิตย์นี้ครับ ขอให้โชคดีมีเงินใช้กันอย่างนี้อีกในวันเสาร์หน้าครับ เฮงๆๆๆ เราแจกกันต่อเนื่องครับ แนะนำเพื่อนเข้ามาเล่นกับเราซิครับ&nbsp; โชคดีรอท่านอยู่ทุกเสาร์ครับ</p>\n\n', '', '13/11/2016 04:50:28', '', 1),
(717, 41, 12, '837103485', 1, '<p>51779 sbo สเปอร์ ชนะ1-0</p>', '', '15/11/2016 15:17:42', '', 0),
(718, 41, 110, '837050658', 2, '<p>9371 Spurs win 2-1 SBO</p>', '', '15/11/2016 17:13:18', '', 0),
(719, 41, 107, '2001489435', 3, '<p>54105 ibc ตอบ เสปอ ชนะ 3-0</p>', '', '15/11/2016 19:50:47', '', 0),
(720, 41, 29, '837148120', 4, '<p>9040 ไอบีซี สเปอร์ ชนะ 1-0</p>', '', '15/11/2016 21:58:57', '', 0),
(721, 41, 137, '1612600312', 5, '<p>9633<br />\nสเปอร์ส ชนะ 3-0<br />\nเวบไอบีซี</p>', '', '16/11/2016 03:06:30', '', 0),
(722, 41, 58, '462542174', 6, '<p>50688 sbo ตอบ สเปอร์ชนะ 2-0</p>', '', '16/11/2016 12:28:39', '', 0),
(723, 41, 38, '1991079725', 7, '<p>9188ibcตอบเสมอ1-1</p>', '', '16/11/2016 12:46:53', '', 0),
(724, 41, 15, '3068670961', 8, '<p>53011 sbo เสมอ 1-1</p>', '', '16/11/2016 13:10:11', '', 0),
(725, 41, 73, '17082585', 9, '<p>50611 ibc ตอบ สเปอร์ แพ้ 1-2 เวสต์แฮม</p>', '', '16/11/2016 13:36:03', '', 0),
(726, 41, 13, '3076012786', 10, '<p>51089 sbo สเปอร์ชนะ 2-0</p>', '', '16/11/2016 13:59:14', '', 0),
(727, 41, 92, '19859967', 11, '<p>ibc  50615 สเปอร์ ชนะ 2-0 ครับ</p>', '', '16/11/2016 15:45:38', '', 0),
(728, 41, 33, '1990994476', 12, '<p>50524 ibc เสมอ1-1</p>', '', '16/11/2016 16:32:54', '', 0),
(729, 41, 22, '18116495', 13, '<p>50173 3m ตอบ สเปอร์ส ชนะ 3:2</p>', '', '16/11/2016 16:58:49', '', 0),
(730, 37, 152, '825258878', 49, '<p>51930 sbo ขอรับสิทธิ์</p>', '', '16/11/2016 17:38:51', '', 0),
(731, 41, 152, '825258878', 14, '<p>51930 sbo สเปอร์เสมอเวสแฮม 2ต่อ2</p>', '', '16/11/2016 17:42:38', '', 0),
(732, 41, 11, '837214999', 15, '<p>50565 IBC สเปอร์ ชนะ 3-1 คนับ</p>', '', '17/11/2016 12:23:35', '', 0),
(733, 41, 55, '3031898399', 16, '<p>53288 sbo  เวสแฮม ชนะ 2-0</p>', '', '17/11/2016 12:24:02', '', 0),
(734, 41, 16, '3031927142', 17, '<p>53004 sbo สเปอร์ชนะ 2-1</p>', '', '17/11/2016 21:29:02', '', 0),
(735, 41, 149, '837106928', 18, '<p>53655 sbo สเปอร์ เสมอ เวสต์แฮม 2-2</p>', '', '17/11/2016 21:53:01', '', 0),
(736, 41, 149, '837106928', 19, '<p>53655 sbo สเปอร์ เสมอ เวสต์แฮม 2-2</p>', '', '17/11/2016 21:54:32', '', 0),
(737, 41, 85, '3742893416', 20, '<p>9150<br />\nsbo<br />\nสเปอร์ส ชนะ 3-2</p>', '', '18/11/2016 05:57:57', '', 0),
(738, 41, 130, '3068703299', 21, '<p>51076 sbo<br />\nสเปอรแพ้ 3-4</p>', '', '18/11/2016 09:47:15', '', 0),
(739, 41, 21, '248472020', 22, '<p>51826 sbo สเปอร์ชนะ 3-0</p>', '', '18/11/2016 11:02:55', '', 0),
(740, 41, 32, '19898519', 23, '<p>53250 sbo ทาย สเปอร์ ชนะ 2-0</p>', '', '18/11/2016 11:43:10', '', 0),
(741, 41, 60, '2098828428', 24, '<p>7455 ibc  สเปอร์&nbsp;   3:1 &nbsp;  เวสต์แฮมป์</p>', '', '18/11/2016 13:49:34', '', 0),
(742, 41, 127, '837210594', 25, '<p>IBC 50861<br />\nสเปอร์ชนะ 1 : 0</p>', '', '18/11/2016 13:57:25', '', 0),
(743, 41, 135, '3068669026', 26, '<p>53653.&nbsp; 3m.&nbsp; เสมอกัน 1-1.</p>', '', '18/11/2016 15:51:18', '', 0),
(744, 41, 64, '1935115445', 27, '<p>9034 เสมอ 1-1 ไอบีซี</p>', '', '18/11/2016 16:15:46', '', 0),
(745, 41, 120, '3400560440', 28, '<p>51780 sbo เสมอ 0-0</p>', '', '18/11/2016 19:38:28', '', 0),
(746, 41, 93, '3068670497', 29, '<p>50710 sbo ตอบว่า สเปอร์ ชนะ เวสตแฮม 4-1</p>', '', '18/11/2016 19:49:42', '', 0),
(747, 41, 107, '2001489601', 30, '<p>53105 ตอบ เสปอ ชนะ 4-1</p>', '', '18/11/2016 20:58:32', '', 0),
(748, 41, 72, '3076005969', 31, '<p>51905 sbo สเปอร์ ชนะ3-1<br />\n :o<3: :o<3: :o<3:</p>', '', '18/11/2016 21:37:05', '', 0),
(749, 41, 41, '825292527', 32, '<p>7933 3m เวสเฮมชนะ 1-0</p>', '', '18/11/2016 23:01:13', '', 0),
(750, 41, 43, '2875413873', 33, '<p>9595 สเปอร์ ชนะ2-0<br />\nไอบีซี</p>', '', '19/11/2016 00:14:52', '', 0),
(751, 37, 151, '3742923699', 50, '<p>sbo 53488 ยืนยันรับสิทธิ์ครับ</p>', '', '19/11/2016 00:56:45', '', 0),
(752, 41, 57, '973742850', 34, '<p>50966 sbo ตอบ เสมอ 0-0</p>', '', '19/11/2016 01:04:38', '', 0),
(753, 41, 151, '3742923699', 35, '<p>sbo 53488 `สเปอร์ ชนะ 4-0</p>', '', '19/11/2016 01:15:21', '', 0),
(754, 41, 76, '3742912522', 36, '<p>Bkj3379015 m8 ตอบ สเปอ ชนะ3-1</p>', '', '19/11/2016 02:47:56', '', 0),
(755, 41, 67, '2875256833', 37, '<p>9606 ไอบีซี<br />\nเสมอ 2-2</p>', '', '19/11/2016 04:47:44', '', 0),
(756, 41, 106, '3068673630', 38, '<p>9129 สเปอร์ชนะ 1 ต่อ 0 sbo</p>', '', '19/11/2016 08:39:51', '', 0),
(757, 41, 78, '2875238970', 39, '<p>9483 sbo ตอบ เสปอร์ชนะ 2-1</p>', '', '19/11/2016 09:10:00', '', 0),
(758, 41, 63, '3742899482', 40, '<p>Sbo51449 ตอบ สเปอร์ชเนะ 5-0. ค้บ</p>', '', '19/11/2016 09:14:42', '', 0),
(759, 41, 87, '3754949404', 41, '<p>51190 ibc  สเปอร์ 3-1 เวสแฮม</p>', '', '19/11/2016 09:24:11', '', 0),
(760, 41, 115, '3068667835', 42, '<p>9214 ibc ตอบ สเปอร์ ชนะ 3-0</p>', '', '19/11/2016 09:35:23', '', 0),
(761, 41, 31, '3742921066', 43, '<p>53581 sbo ตอบ สเปอร์ชนะ2-1ครับ</p>', '', '19/11/2016 09:39:13', '', 0),
(762, 41, 30, '3742902544', 44, '<p>51671 sbo ตอบ สเปอร์ชนะ2-0ครับ</p>', '', '19/11/2016 09:42:12', '', 0),
(763, 41, 98, '2088288400', 45, '<p>50040 sbo ตอบว่า สเปอร์ ชนะ 3-1</p>', '', '19/11/2016 10:30:05', '', 0),
(764, 41, 84, '456606853', 46, '<p>9415 ibc เสมอกัน 2-2</p>', '', '19/11/2016 10:31:48', '', 0),
(765, 41, 69, '3754845400', 47, '<p>50427 sbo ตอบ เวสแฮม ชนะ 1-0</p>', '', '19/11/2016 10:34:45', '', 0),
(766, 41, 77, '3076012631', 48, '<p>51938 sbo สเปอร์ชนะ 3-2<br />\n :o-): :o-): :o-): :o-): :o-):</p>', '', '19/11/2016 11:07:11', '', 0),
(767, 41, 65, '1701636006', 49, '<p>9324 ibc &nbsp; สเปอร์ ชนะ 4-2 ครับ</p>', '', '19/11/2016 11:22:39', '', 0),
(768, 41, 113, '3754750774', 50, '<p>3663  sbobet  สเปอร์ ชนะ 3-1</p>', '', '19/11/2016 11:23:27', '', 0),
(769, 41, 136, '3742923057', 51, '<p>50171 ibc ตอบ เสมอกัน 2-2 ครับ</p>', '', '19/11/2016 11:34:48', '', 0),
(770, 41, 61, '973669551', 52, '<p>50412 web 3M  สะเปอร์ส 2-2 เวสแฮม <br />\n :o-A:</p>', '', '19/11/2016 11:41:38', '', 0),
(771, 41, 100, '3754732586', 53, '<p>50775  sbo  ตอบ&nbsp; สเปอร์ชนะ 3  -&nbsp; 1</p>', '', '19/11/2016 11:49:48', '', 0),
(772, 41, 144, '456649268', 54, '<p>53730.sbo ตอบ สเปอร์ชนะ 3-1</p>', '', '19/11/2016 11:59:00', '', 0),
(773, 41, 146, '462498513', 55, '<p>9810 sbo สเปอร์ ชนะ3-1</p>', '', '19/11/2016 12:28:19', '', 0),
(774, 41, 105, '19818807', 56, '<p>7433 sbo เสมอ 0-0</p>', '', '19/11/2016 13:04:31', '', 0),
(775, 41, 90, '3390911708', 57, '<p>69005 sboตอบ เสมอ1-1</p>', '', '19/11/2016 13:07:03', '', 0),
(776, 41, 155, '2261045470', 58, '<p>9195 sbo ตอบ สเปอร์ ชนะ 2 - 0  หมายเหตุ ส่งแล้วข้อความไม่ขึ้นขอส่งใหม่</p>', '', '19/11/2016 13:18:21', '', 0),
(777, 41, 94, '19827162', 59, '<p>Sbo 50151 ตอบ สเปอร์ ชนะ. 3-1</p>', '', '19/11/2016 13:35:09', '', 0),
(778, 41, 156, '2001496610', 60, '<p>50445 sbo สเปอร์ชนะ 3-2</p>', '', '19/11/2016 13:40:52', '', 0),
(779, 41, 139, '2261045339', 61, '<p>9571<br />\nIBC<br />\nสเปอร์ส ชนะ 3:1</p>', '', '19/11/2016 14:12:55', '', 0),
(780, 41, 129, '2001495493', 62, '<p>50468 SBO  Tottenham Hotspur &nbsp; 3 - 3 West Ham United</p>', '', '19/11/2016 15:33:13', '', 0),
(781, 41, 27, '3068702208', 63, '<p>51467 sbq ตอบ&nbsp; สเปอร์&nbsp; ชนะ 2-1</p>', '', '19/11/2016 16:25:57', '', 0),
(782, 41, 75, '3068667103', 64, '<p>53599 sbq  ตอบ สเปอร์ ชนะ 3—1</p>', '', '19/11/2016 16:41:47', '', 0),
(783, 41, 74, '456613026', 65, '<p>53061  sbo ตอบ สเปอร์ ชนะ 2-0</p>', '', '19/11/2016 16:44:06', '', 0),
(784, 41, 35, '3742896723', 66, '<p>53497 sbq ตอบ สเปอร์ ชนะ 1-0</p>', '', '19/11/2016 16:47:03', '', 0),
(785, 41, 101, '3031929526', 67, '<p>53319 sbo  สเปอร์ 5-2เวสต์แฮม</p>', '', '19/11/2016 23:04:06', '', 0),
(786, 41, 1, '3076114859', 68, '<p>ยินดีกับท่านสมาชิกที่ทายผลการแข่งขันฟุตบอลพีเมียร์ลีกคู่ดึกวันเสาร์ ที่19 พ.ย. 2559 ระหว่าง สเปอร์ VS เวสแฮมป์ ว่าสเปอร์จะชนะไปด้วยสกอร์3-2  อย่างสุดมันส์ เป็นผลให้มีท่านสมาชิกทายถูก 4ท่าน ดังต่อไปนี้<br />\n50173 3m ตอบ สเปอร์ส ชนะ 3:2<br />\n9150sboสเปอร์ส ชนะ 3-2<br />\n51938 sbo สเปอร์ชนะ 3-2<br />\n50445 sbo สเปอร์ชนะ 3-2<br />\nแบ่งเงินกันไปคนละ 5000 บาท โดยทางทีมงานขอตรวจสอบคุณสมบัติและจะมอบเงินรางวัลเข้าไปในเว็บที่ท่านสมาชิกเล่นอยู่ในเย็นวันอาทิตย์นี้ครับ ขอให้สนุกโชคดีไปกับเราทุกเสาร์ครับ แจกจริง มันส์จริงครับ เฮงๆๆๆ</p>', '', '20/11/2016 02:52:29', '', 1),
(787, 41, 156, '1701606080', 69, '<p> :o-v: :o-v: :o-v:</p>', '', '20/11/2016 06:09:09', '', 0),
(788, 37, 157, '837118167', 51, '<p>ดีมาก</p>', '', '20/11/2016 22:54:20', '', 0),
(789, 37, 157, '837118167', 52, '<p>ดีมาก</p>', '', '20/11/2016 22:58:22', '', 0),
(790, 37, 157, '837118167', 53, '<p>50468 sbo ขอรับสิทธิ์</p>\n\n', '', '20/11/2016 23:03:23', '', 0),
(791, 37, 157, '837118167', 54, '<p>50173 3m ขอรับสิทธิ์</p>', '', '20/11/2016 23:04:16', '', 0),
(792, 37, 157, '837118167', 55, '<p>50611 ibc ขอรับสิทธิ์คับ</p>', '', '20/11/2016 23:07:10', '', 0),
(793, 37, 157, '837118167', 56, '<p>50565 IBC ครับ ขอด้วยครับ</p>', '', '20/11/2016 23:08:13', '', 0),
(794, 37, 157, '837118167', 57, '<p>9606 เวบไอบีซี ขอรับโปร</p>', '', '20/11/2016 23:08:52', '', 0),
(795, 42, 29, '1856563354', 1, '<p>9040 ibc<br />\nเชลซี ชนะ 1-0</p>', '', '23/11/2016 21:47:55', '', 0),
(796, 42, 158, '837135866', 2, '<p>9797<br />\nไอบีซี<br />\nเสมอ 1-1</p>', '', '23/11/2016 21:54:11', '', 0),
(797, 37, 158, '837135866', 58, '<p>9797 ไอบีซี<br />\nขอรับโปรโมขั่น</p>', '', '23/11/2016 21:55:13', '', 0),
(798, 42, 12, '3068680065', 3, '<p>51779 sbo เชลชีชนะ 1-0</p>', '', '23/11/2016 23:11:32', '', 0),
(799, 42, 137, '1612600312', 4, '<p>9633<br />\nIBC<br />\nCHELSEA WIN 3:0</p>', '', '23/11/2016 23:29:52', '', 0),
(800, 42, 110, '837050829', 5, '<p>9371 เวบ เอสบีโอ เชลซี ชนะ 2:1</p>', '', '24/11/2016 01:07:37', '', 0),
(801, 42, 13, '248472128', 6, '<p>51089 sbo เชลชีชนะ 2-0</p>', '', '24/11/2016 10:22:52', '', 0),
(802, 42, 15, '3068705673', 7, '<p>53011 sbo เสมอ 1-1</p>', '', '24/11/2016 11:38:16', '', 0),
(803, 42, 33, '1991112802', 8, '<p>50524 ibc เสมอ1-1</p>', '', '24/11/2016 15:06:35', '', 0),
(804, 42, 73, '17083570', 9, '<p>50611 ibc  เสมอ 2-2</p>', '', '24/11/2016 15:59:48', '', 0),
(805, 42, 58, '462542174', 10, '<p>50688 sbo ตอบ เซลซี ชนะ 3-1</p>', '', '24/11/2016 16:27:59', '', 0),
(806, 42, 152, '456596421', 11, '<p>51930 sbo เชลชีเสมอ 0-0</p>', '', '24/11/2016 16:41:32', '', 0),
(807, 37, 160, '19850037', 59, '<p>ยืนยันการรับสิทธิ์โปรโมชั่นแลกทิปแลกเงินเครดิต</p>', '', '24/11/2016 17:37:19', '', 0),
(808, 42, 55, '3076115270', 12, '<p>53288 sbo จบ 3-3เสมอครับ :o-A: :o-A: :o-A:</p>', '', '24/11/2016 17:37:45', '', 0),
(809, 37, 160, '19850037', 60, '<p>53745 maxbet ขอรับสิทธิครับ</p>\n\n', '', '24/11/2016 17:38:36', '', 0),
(810, 42, 61, '973669551', 13, '<p>50412 เวป 3M เชลซี 3-0 เสปอร์ส</p>', '', '24/11/2016 23:50:29', '', 0),
(811, 42, 11, '3068704009', 14, '<p>50565 IBC เชลซี ชนะ 3-0 ครับ</p>', '', '25/11/2016 06:32:22', '', 0),
(812, 42, 136, '3742901578', 15, '<p>50171  ibc ตอบ สเปอร์ ชนะ 2-1</p>', '', '25/11/2016 10:42:21', '', 0),
(813, 42, 30, '3742919053', 16, '<p>51671 sbo ตอบ เชลชีชนะ3-1 ครับ</p>', '', '25/11/2016 11:39:10', '', 0),
(814, 42, 31, '3742918058', 17, '<p>53581 sbo ตอบ เชลชีชนะ 4-3ครับ</p>', '', '25/11/2016 11:43:34', '', 0),
(815, 42, 22, '16955466', 18, '<p>50173 3m ตอบ เชลซี ชนะ 4:1</p>', '', '25/11/2016 11:48:58', '', 0),
(816, 42, 16, '3031920249', 19, '<p>53004 sbo เสมอ 2-2</p>', '', '25/11/2016 12:58:41', '', 0),
(817, 42, 21, '248458756', 20, '<p>51826 sbo เชลชีชนะ 2-1 ครับ<br />\n :o<3: :o<3: :o<3: :o<3:</p>', '', '25/11/2016 13:19:37', '', 0),
(818, 42, 98, '1731412051', 21, '<p>50040 sbo ตอบว่า เชลซี ชนะ 3-0</p>', '', '25/11/2016 15:22:50', '', 0),
(819, 42, 64, '1935112540', 22, '<p>9034 ibc<br />\nเชลซี ชนะ 4:1</p>', '', '25/11/2016 16:45:01', '', 0),
(820, 42, 135, '2869207822', 23, '<p>เชลซี 3-1 สเปอร. <br />\n53653. 3m.</p>', '', '25/11/2016 18:18:05', '', 0),
(821, 42, 72, '3076118114', 24, '<p>51905 sbo เชลชี ชนะ3-0</p>', '', '25/11/2016 18:19:38', '', 0),
(822, 37, 72, '3076118114', 61, '<p>51905 sbo ขอรับสิทธิ์</p>', '', '25/11/2016 19:40:08', '', 0),
(823, 42, 113, '3754750504', 25, '<p>3663<br />\nsbobet<br />\nเชลชี ชนะ 3-1</p>', '', '25/11/2016 21:27:40', '', 0),
(824, 42, 67, '2875256880', 26, '<p>9606 เสมอ 2-2 ไอบีซี</p>', '', '25/11/2016 22:10:05', '', 0),
(825, 42, 151, '3742896105', 27, '<p>sbo 53488 เชลซี ชนะ 4-0</p>', '', '26/11/2016 01:13:31', '', 0),
(826, 42, 57, '973742850', 28, '<p>50966 sbo ตอบ เสมอ0-0</p>', '', '26/11/2016 04:49:54', '', 0),
(827, 42, 85, '3742914453', 29, '<p>9150 sbo<br />\nChelsea win 3-2</p>', '', '26/11/2016 05:28:30', '', 0),
(828, 42, 60, '456610410', 30, '<p>7455 ibc เชลซีชนะ&nbsp; 3;1</p>', '', '26/11/2016 06:31:32', '', 0),
(829, 42, 38, '19816666', 31, '<p>9188ibcเชลซีชนะ2-0</p>', '', '26/11/2016 06:38:39', '', 0),
(830, 42, 90, '2875280244', 32, '<p>69005 sbo ตอบ เชลชี ชนะ 4-1</p>', '', '26/11/2016 06:40:39', '', 0),
(831, 42, 96, '3068686974', 33, '<p>IBC 9562 ตอบ เชลซี ชนะ 3:2</p>', '', '26/11/2016 08:00:34', '', 0),
(832, 42, 87, '825277993', 34, '<p>51190 ibc ตอบ เซลซี ชนะ 3-0</p>', '', '26/11/2016 08:07:45', '', 0),
(833, 42, 130, '19800141', 35, '<p> 51076 sbo<br />\nChesea win 6-0</p>', '', '26/11/2016 08:30:25', '', 0),
(834, 42, 93, '3068694177', 36, '<p>50710  sbo ตอบว่า เชลชีชนะสเปอร์ 2-0</p>', '', '26/11/2016 08:57:55', '', 0),
(835, 37, 161, '3754909616', 62, '<p>53744sboขอรับโปร</p>', '', '26/11/2016 09:03:32', '', 0),
(836, 42, 161, '3754909616', 37, '<p>53744 sbo ตอบ เชลซี ชนะ 4 - 1</p>', '', '26/11/2016 09:07:54', '', 0),
(837, 42, 69, '19827174', 38, '<p>50427 sbo ตอบ เชลซี ชนะ 3- 1</p>', '', '26/11/2016 09:10:15', '', 0),
(838, 42, 63, '3742899039', 39, '<p>Sbo51449. ตอบเชลชี ชนะ 4-2</p>', '', '26/11/2016 09:42:00', '', 0),
(839, 42, 94, '19827775', 40, '<p>Sbo 50151 ตอบ เชลซี ชนะ 3-1</p>', '', '26/11/2016 09:45:31', '', 0),
(840, 42, 142, '3742919133', 41, '<p>50230 sbo ตอบ เชลซีแพ้&nbsp; 1:2</p>', '', '26/11/2016 09:51:21', '', 0),
(841, 42, 100, '3031907230', 42, '<p>50775 sbo  ตอบ เชลซีชนะ&nbsp; 2 - 0</p>', '', '26/11/2016 10:00:46', '', 0),
(842, 42, 32, '19851637', 43, '<p>53250 sbo ทาย เชลชี ชนะ 2-0</p>', '', '26/11/2016 10:28:56', '', 0),
(843, 42, 41, '825293076', 44, '<p>7933 3m เชลซีชนะ 2-0</p>', '', '26/11/2016 10:32:41', '', 0),
(844, 42, 103, '19899646', 45, '<p>8160 ibc ตอบ สเปอร์ ชนะ 2-0</p>', '', '26/11/2016 10:44:19', '', 0),
(845, 42, 86, '19819768', 46, '<p>50488. Sbo. ตอบ. เชลซี ชนะ 2-1</p>', '', '26/11/2016 11:03:33', '', 0),
(846, 42, 162, '2088393912', 47, '<p>ibcbet 51355 ตอบ เชลซีชนะ 3-0</p>', '', '26/11/2016 11:06:06', '', 0),
(847, 42, 84, '456646366', 48, '<p>9415 ibc เสมอกัน 0-0</p>', '', '26/11/2016 11:08:55', '', 0),
(848, 42, 92, '2001498173', 49, '<p>50615  ibc เชลชีชนะ 2-0</p>', '', '26/11/2016 11:32:29', '', 0),
(849, 42, 115, '837217456', 50, '<p>9214 ibc ตอบ เสมอ 0-0</p>', '', '26/11/2016 12:42:00', '', 0),
(850, 42, 27, '3068659696', 51, '<p>51467 sbq ตอบ&nbsp; เชลซี ชนะ&nbsp; 2-1</p>', '', '26/11/2016 13:41:39', '', 0),
(851, 42, 77, '3031926740', 52, '<p>51938 sbo เชลชี ชนะ3-1</p>', '', '26/11/2016 13:50:32', '', 0),
(852, 42, 106, '825264208', 53, '<p>9129 sbo  สเปอร์ชนะ 2 ต่อ 1</p>', '', '26/11/2016 13:55:29', '', 0),
(853, 42, 74, '3742921936', 54, '<p>53061 sbo ตอบ เชลซี ชนะ 2-0</p>', '', '26/11/2016 14:17:48', '', 0),
(854, 42, 35, '456628023', 55, '<p>53497 sbq ตอบ เชลซี ชนะ 3-1</p>', '', '26/11/2016 14:20:22', '', 0),
(855, 42, 75, '3068663484', 56, '<p>53599 sbq  ตอบ เชลซี ชนะ&nbsp; 1-0</p>', '', '26/11/2016 14:22:58', '', 0),
(856, 42, 139, '2261045339', 57, '<p>9571<br />\nไอบีซี<br />\nเชลซี ชนะ 3-1</p>', '', '26/11/2016 14:35:06', '', 0),
(857, 42, 65, '2098792728', 58, '<p>9324 ibc ตอบ สเปอร์ เสมอ 2-2 ครับ</p>', '', '26/11/2016 15:35:52', '', 0),
(858, 42, 91, '2875555947', 59, '<p>50461 ตอบเชลชี แพ้ สเปอร์ 3-4</p>', '', '26/11/2016 16:10:33', '', 0),
(859, 42, 105, '19882827', 60, '<p>7433 sbo สเปอร์ชนะ 1-0</p>', '', '26/11/2016 16:21:57', '', 0),
(860, 42, 43, '2875420370', 61, '<p>9595 ibc เชลซี ชนะ 2:0</p>', '', '26/11/2016 16:31:44', '', 0),
(861, 42, 76, '2098831518', 62, '<p>Bkj3379015 m8 spurs win 3-1</p>', '', '26/11/2016 16:38:57', '', 0),
(862, 42, 119, '3068662790', 63, '<p>50721  sbo  0-0</p>', '', '26/11/2016 17:31:08', '', 0),
(863, 42, 132, '3068667661', 64, '<p>53027 sbo chelsea2-1spur</p>', '', '26/11/2016 17:35:15', '', 0),
(864, 42, 101, '3076111004', 65, '<p>53319 sbo  เชลซี 5-2 สเปอร์</p>', '', '26/11/2016 20:34:10', '', 0),
(866, 42, 1, '248456693', 66, '<p>จบไปอย่างสนุกสุดมันส์ด้วยชัยชนะของเชลซีเจ้าบ้าน ที่เบียดชนะสเปอร์ไปด้วยสกอร์ 2—1 อย่างสนุก มีผลให้มีท่านสมาชิกทายผลถูก 5ท่าน แบ่งเงินรางวัลกันไป ท่านละ4000 บาทด้วยกัน ดังมีรายชื่อดังต่อไปนี้<br />\n9371 เวบ เอสบีโอ เชลซี ชนะ 2:1<br />\n51826 sbo เชลชีชนะ 2-1 ครับ<br />\n50488. Sbo. ตอบ. เชลซี ชนะ 2-1<br />\n51467 sbq ตอบ&nbsp; เชลซี ชนะ&nbsp; 2-1<br />\n53027 sbo chelsea2-1spur<br />\nโดยทางทีมงานขอตรวจสอบคุณสมบัติ และจะมอบเงินรางวัลไปในเว้บที่ท่านเล่นในเย็นวันอาทิตย์ ครับ ขอให้มาร่วมลุ้นโชครับเงินรางวัลกันง่ายๆแบบนี้อีกในเสารืหน้าครับ เราแจกกันทุกเสาร์ครับ เฮงๆๆ</p>', '', '27/11/2016 03:05:05', '', 1),
(867, 37, 144, '3742899680', 63, '<p>53730.sbo ขอรับโปรโมชั่น</p>', '', '28/11/2016 14:36:42', '', 0),
(868, 43, 58, '462542111', 1, '<p>50688 sbo ตอบ อาร์เซน่อล ชนะ 3-1</p>', '', '30/11/2016 08:36:01', '', 0),
(869, 43, 41, '825292539', 2, '<p>7933 3m อาเซนอลชนะ 3-0</p>', '', '30/11/2016 08:36:54', '', 0),
(870, 43, 12, '837121747', 3, '<p>51779 sbo อาร์เซน่อลชนะ 1-0</p>', '', '30/11/2016 09:58:20', '', 0),
(871, 43, 61, '973669551', 4, '<p>50412 web 3m เสมอ 1 -1</p>', '', '30/11/2016 11:01:16', '', 0),
(872, 43, 33, '2098761598', 5, '<p>50524 ibc เสมอ1-1</p>', '', '30/11/2016 11:02:34', '', 0),
(873, 43, 72, '3031733685', 6, '<p>51905 sbo อาร์เซน่อล ชนะ 2-0</p>', '', '30/11/2016 13:41:03', '', 0),
(874, 43, 85, '3742900940', 7, '<p>9150 เอสบีโอ<br />\nอาร์เซ ชนะ 3-2</p>', '', '30/11/2016 17:13:51', '', 0),
(875, 43, 137, '1612600312', 8, '<p>9633 ibc อาร์เซน่อล ชนะ 3:0</p>', '', '30/11/2016 17:33:51', '', 0),
(876, 43, 77, '2098842681', 9, '<p>51938 sbo เวสแฮมป์ ชนะ 2-1</p>', '', '30/11/2016 18:11:40', '', 0),
(877, 43, 110, '837050472', 10, '<p>9371 sbo Arsenal win 2-1</p>', '', '30/11/2016 18:29:11', '', 0),
(878, 43, 152, '3754756410', 11, '<p>51930 SBO อาร์เซนอล&nbsp; ชนะ 1 - 0</p>', '', '30/11/2016 23:40:28', '', 0),
(879, 43, 16, '3031903201', 12, '<p>53004 sbo  เวสแฮมป์ ชนะ 1-0<br />\n :o-o: :o-o: :o-o:</p>', '', '01/12/2016 09:33:28', '', 0),
(880, 43, 158, '3742897373', 13, '<p>9797 เสมอ 1-1 ไอบีซี</p>', '', '01/12/2016 15:36:44', '', 0),
(881, 43, 55, '3031899121', 14, '<p>53288 sbo  อาร์เซน่อล ชนะ 3-1</p>', '', '01/12/2016 19:12:03', '', 0),
(882, 43, 43, '2875414426', 15, '<p>9595<br />\nไอบีซี<br />\nอาร์เซ ชนะ 2-0</p>', '', '02/12/2016 00:46:55', '', 0),
(883, 43, 87, '19881011', 16, '<p>51190 ibc ตอบว่า เสมอกัน 2-2<br />\n เวสแฮม 2- 2อาเซน่อล</p>', '', '02/12/2016 09:01:29', '', 0),
(884, 43, 166, '2001496647', 17, '<p>zbz3350445 เวสต์แฮม 3 : 3 อาร์เซน่อล</p>', '', '02/12/2016 11:44:46', '', 0),
(885, 43, 135, '3068675457', 18, '<p>อาเซนอล ชนะ 1-0</p>', '', '02/12/2016 12:51:30', '', 0),
(886, 43, 67, '2875256879', 19, '<p>9606 ibc เสมอ 2-2</p>', '', '02/12/2016 12:57:21', '', 0),
(887, 43, 29, '837136032', 20, '<p>9040 ไอบีซี<br />\nอาร์เซน่อล ชนะ 1:0</p>', '', '02/12/2016 14:24:38', '', 0),
(888, 43, 111, '979465397', 21, '<p>51395 SBO เวสเฮมป์ ชนะ 2-1</p>', '', '02/12/2016 16:06:43', '', 0),
(889, 43, 64, '1935115401', 22, '<p>9034<br />\nIBC<br />\nอาร์เซ ชนะ 4-1</p>', '', '02/12/2016 16:42:50', '', 0),
(890, 43, 38, '1991081521', 23, '<p>9188 ibc Arsenal win 4-1</p>', '', '02/12/2016 18:09:35', '', 0),
(891, 43, 15, '837213355', 24, '<p>53011 sbo เสมอ 1-1</p>', '', '02/12/2016 19:26:34', '', 0),
(892, 43, 21, '3031922103', 25, '<p>51826 sbo เสมอ 2-2</p>', '', '02/12/2016 20:08:19', '', 0),
(893, 43, 11, '837083426', 26, '<p>50565 IBC เวสต์แฮม ชนะ 2-1</p>', '', '02/12/2016 21:38:16', '', 0),
(894, 43, 151, '3742912995', 27, '<p>sbo 53488 ทาย เสมอ 0 0</p>', '', '02/12/2016 22:57:17', '', 0),
(895, 43, 57, '973742850', 28, '<p>50966 sbo ตอบ เสมอ 0-0</p>', '', '03/12/2016 01:46:32', '', 0),
(896, 43, 60, '3742913250', 29, '<p>7455  ibc อาเชนอล ชนะ 3:1</p>', '', '03/12/2016 05:45:22', '', 0),
(897, 43, 96, '3068702519', 30, '<p>IBC 9562 ตอบ อาเซน่อล ชนะ 2:0</p>', '', '03/12/2016 06:10:46', '', 0),
(898, 43, 119, '2875257942', 31, '<p>50721 sbo น่อล ชนะ 2-1</p>', '', '03/12/2016 07:17:16', '', 0),
(899, 43, 93, '1935142864', 32, '<p>50710 sbo ตอบว่า เวสตแฮม แพ้ อาร์เช่นอล 1-2</p>', '', '03/12/2016 08:09:49', '', 0),
(900, 43, 30, '456599453', 33, '<p>51671 sbo ตอบ อาร์เซน่อลชนะ2-1ครับ</p>', '', '03/12/2016 08:16:33', '', 0),
(901, 43, 31, '456609386', 34, '<p>53581 sbo ตอบ เสมอ0-0 ครับ</p>', '', '03/12/2016 08:22:27', '', 0),
(902, 43, 92, '19868606', 35, '<p>ibc  50615 อาร์เซน่อล ชนะ 2-1</p>', '', '03/12/2016 08:25:50', '', 0),
(903, 43, 129, '2001495115', 36, '<p>50468 SBO เวสแฮมป์ 1 - 4 อาร์เซน่อล</p>', '', '03/12/2016 08:36:55', '', 0),
(904, 43, 107, '2001489599', 37, '<p>53105 ibc อาเซน่อล ชนะ 3-0</p>', '', '03/12/2016 08:44:11', '', 0);
INSERT INTO `webboard_comment` (`id`, `webboard_topic_id`, `user_id`, `ip_address`, `sort`, `comment`, `edited`, `datetime`, `modified`, `status`) VALUES
(905, 43, 113, '3068685518', 38, '<p>3663<br />\nSbobet<br />\nเวสแฮมป์ ชนะ 1-0</p>', '', '03/12/2016 09:05:00', '', 0),
(906, 43, 130, '19891508', 39, '<p>51076 sbo <br />\nอารเซนอล เสมอ เวสแฮม 2-2</p>', '', '03/12/2016 09:54:57', '', 0),
(907, 43, 94, '19844046', 40, '<p>Sbo 50151 ตอบ เสมอ 2-2</p>', '', '03/12/2016 10:04:50', '', 0),
(908, 43, 84, '456648710', 41, '<p>9415 ibc เวสแฮม ชนะ 3-1</p>', '', '03/12/2016 11:01:53', '', 0),
(909, 43, 76, '2098803554', 42, '<p>Bkj3379015 m8westham2arsenal4</p>', '', '03/12/2016 11:17:49', '', 0),
(910, 43, 116, '3754948839', 43, '<p>9527sbo ตอบ อาเซน่อล ชนะ3-1</p>', '', '03/12/2016 11:20:25', '', 0),
(911, 43, 120, '1935142864', 44, '<p>51780sboตอบว่าอาร์เช่ยอลชนะ2-0</p>', '', '03/12/2016 11:29:43', '', 0),
(912, 43, 75, '3068687310', 45, '<p>53599 sbq อาร์เซน่อล ชนะ 2-1</p>', '', '03/12/2016 11:56:59', '', 0),
(913, 43, 98, '2088288290', 46, '<p>50040 sbo ตอบว่า เสมอ 2-2</p>', '', '03/12/2016 11:58:57', '', 0),
(914, 43, 100, '825272543', 47, '<p>50775 sbo  ตอบ อาร์เซนอลชนะ 3 - 2</p>', '', '03/12/2016 12:13:38', '', 0),
(915, 43, 27, '3068670608', 48, '<p>51467 sbq ตอบ อาร์เซน่อล ชนะ 1-0</p>', '', '03/12/2016 12:15:06', '', 0),
(916, 43, 78, '3742902471', 49, '<p>9483sbo ตอบ อาเซน่อลชนะ 3-2</p>', '', '03/12/2016 12:17:05', '', 0),
(917, 43, 106, '825265352', 50, '<p>9129 sbo เสมอกัน 0 ต่อ 0</p>', '', '03/12/2016 12:33:46', '', 0),
(918, 43, 90, '1024704390', 51, '<p>69005 sbo ตอบ เสมอ 1-1</p>', '', '03/12/2016 12:37:23', '', 0),
(919, 43, 126, '837213881', 52, '<p>51744 sbo เสมอ 0-0</p>', '', '03/12/2016 12:56:30', '', 0),
(920, 43, 155, '2261045470', 53, '<p>9195 SBO ตอบ เวสต์แฮม 1 - 2  อาร์เซน่อล</p>', '', '03/12/2016 12:57:45', '', 0),
(921, 43, 35, '456607767', 54, '<p>53497 sbq ตอบ อาร์เซน่อล ชนะ 2-0</p>', '', '03/12/2016 13:02:53', '', 0),
(922, 43, 13, '248449627', 55, '<p>51089 sbo อาเซน่อล ชนะ 2-1 ครับ</p>', '', '03/12/2016 13:16:48', '', 0),
(923, 43, 65, '2098790890', 56, '<p>9324 ibc อาร์เซน่อล แพ้ 2-3 ครับ</p>', '', '03/12/2016 13:21:34', '', 0),
(924, 43, 32, '1856590451', 57, '<p>53250 sbo ทาย อาร์เซน่อล ชนะ 2-0</p>', '', '03/12/2016 13:26:34', '', 0),
(925, 43, 103, '462521294', 58, '<p>8160 ibc ตอบ เสมอ 0-0</p>', '', '03/12/2016 13:31:47', '', 0),
(926, 43, 74, '3742919003', 59, '<p>53061 sbo ตอบ อาร์เซน่อล ชนะ&nbsp; 3-1</p>', '', '03/12/2016 13:33:39', '', 0),
(927, 43, 139, '2261045339', 60, '<p>9571 ibc<br />\nปืนใหญ่ ชนะ 3:1</p>', '', '03/12/2016 14:28:02', '', 0),
(928, 43, 161, '19859366', 61, '<p>53744 sbo ตอบ เวสแฮม ชนะ 1-0</p>', '', '03/12/2016 14:38:46', '', 0),
(929, 43, 105, '19810768', 62, '<p>7433 sbo เสมอ 0-0</p>', '', '03/12/2016 15:31:04', '', 0),
(930, 43, 167, '456613562', 63, '<p>Sbo9615 ตอบอาเชนอลชนะ2-1</p>\n\n', '', '03/12/2016 15:46:47', '', 0),
(931, 43, 91, '1935113428', 64, '<p>50461 Sbo อาเซน่อล ชนะ 4-0</p>', '', '03/12/2016 16:44:39', '', 0),
(932, 43, 86, '19819840', 65, '<p>50488. Sbo. ตอบ อาร์เซน่อลชนะ3-1</p>', '', '03/12/2016 16:45:00', '', 0),
(933, 43, 56, '2046913505', 66, '<p>3256 sbo เสมอ 2-2 ครับ</p>', '', '03/12/2016 17:26:38', '', 0),
(934, 43, 136, '3742902446', 67, '<p>50171 ibc ตอบ เสมอกัน 0-0</p>', '', '03/12/2016 18:00:22', '', 0),
(935, 43, 63, '456608242', 68, '<p>Sbo51449. อาเชนอลชนะ4_0</p>', '', '03/12/2016 18:01:14', '', 0),
(936, 43, 101, '3076110726', 69, '<p>53319 sbo เวสต์แฮม 3-4 อาร์เซนอล</p>', '', '03/12/2016 18:36:39', '', 0),
(937, 43, 1, '248456025', 70, '<p>สรุปปื่นใหญ่อาเซน่อลถล่มขุนข้อน เวสแฮมป์ไปเละถึง 5&#8212;1 ทำให้ไม่มีสมชิกท่านใดทายถูก ขอจัดกระทู้ทายผลต่อในวันอาทิตย์เลยนะครับ ไปทายกันเลยครับ เฮงๆๆ</p>', '', '04/12/2016 02:42:51', '', 1),
(938, 44, 76, '456610320', 1, '<p>Bkj3379015 m8 everton0man u 3</p>', '', '04/12/2016 02:58:04', '', 0),
(939, 44, 60, '3742896572', 2, '<p>7455 ibc แมนยูชนะ 4:1</p>', '', '04/12/2016 03:23:06', '', 0),
(940, 44, 67, '2875256868', 3, '<p>9606 เสมอ 1-1 ไอบีซี</p>', '', '04/12/2016 05:01:14', '', 0),
(941, 44, 111, '825359271', 4, '<p>51395 sbo เอฟเวอร์ตัน ชนะ 2-1</p>', '', '04/12/2016 06:37:54', '', 0),
(942, 44, 33, '1991074415', 5, '<p>50524 ibc แมนยูชนะ2-1</p>', '', '04/12/2016 06:39:04', '', 0),
(943, 44, 85, '3742904168', 6, '<p>9150 sbo<br />\nMan U ชนะ 1-0</p>', '', '04/12/2016 06:54:36', '', 0),
(944, 44, 41, '3742899377', 7, '<p>7933 3m เอฟเวอรตันชนะ 2-0</p>', '', '04/12/2016 07:06:54', '', 0),
(945, 44, 38, '1991081351', 8, '<p>9188ibc แมนยู ชนะ2-0</p>', '', '04/12/2016 07:54:06', '', 0),
(946, 44, 11, '837083496', 9, '<p>50565 IBC แมนเชสเตอร์ยูไนเต็ด ชนะ 3-1</p>', '', '04/12/2016 08:08:38', '', 0),
(947, 44, 12, '837105441', 10, '<p>51779 sbo แมนยูชนะ 1-0</p>', '', '04/12/2016 08:10:05', '', 0),
(948, 44, 87, '3754732319', 11, '<p>51190 ibc เอฟเวอรตัน 2-2 แมนยู</p>', '', '04/12/2016 08:12:10', '', 0),
(949, 44, 100, '3031938143', 12, '<p>50775. Sbo.&nbsp; ตอบ.&nbsp; เสมอ&nbsp;  1  - 1</p>', '', '04/12/2016 08:27:07', '', 0),
(950, 44, 96, '462522165', 13, '<p>IBC 9562 ตอบ แมนยู ชนะ 3:2</p>', '', '04/12/2016 08:44:31', '', 0),
(951, 44, 16, '3076016717', 14, '<p>53004 sbo เอฟเวอร์ตันชนะ 1-0</p>', '', '04/12/2016 08:48:14', '', 0),
(952, 44, 72, '3031921725', 15, '<p>51905 sbo เสมอ 2-2 ครับ</p>', '', '04/12/2016 08:53:01', '', 0),
(953, 44, 94, '19906958', 16, '<p>Sbo 50151 ตอบ เสมอ 2-2</p>', '', '04/12/2016 08:58:07', '', 0),
(954, 44, 30, '3742906798', 17, '<p>51671 sbo ตอบ แมนฯยูชนะ2-1ครับ</p>', '', '04/12/2016 09:00:50', '', 0),
(955, 44, 21, '3031922103', 18, '<p>51826 sbo แมนยูชนะ 2-0</p>', '', '04/12/2016 09:06:00', '', 0),
(956, 44, 31, '456607210', 19, '<p>53581 sbo ตอบ เสมอ1-1ครับ</p>', '', '04/12/2016 09:15:58', '', 0),
(957, 44, 13, '248449627', 20, '<p>51905 sbo แมนยูชนะ 2-1<br />\n :o-v: :o-v: :o-v:</p>', '', '04/12/2016 09:16:01', '', 0),
(958, 44, 129, '2001495115', 21, '<p>50468 SBO เอฟเวอรตัน 3-2 แมนยู</p>', '', '04/12/2016 11:01:43', '', 0),
(959, 44, 93, '1935142794', 22, '<p>50710  sbo ตอบว่า เอฟแพ้แมนยู 0-1</p>', '', '04/12/2016 11:05:27', '', 0),
(960, 44, 161, '825240658', 23, '<p>53744sbo ตอบ แมนฯยู ชนะ 2 - 0</p>', '', '04/12/2016 11:05:52', '', 0),
(961, 44, 65, '462498781', 24, '<p>9324 ibc ตอบ เอฟเวอรตัน 4-2 แมนยู</p>', '', '04/12/2016 11:06:18', '', 0),
(962, 44, 107, '2001489599', 25, '<p>53105 ibc ตอบ แมนยู ชนะ 2-1</p>', '', '04/12/2016 11:09:22', '', 0),
(963, 44, 120, '1935142794', 26, '<p>51780 sbo ตอบว่า แมนยู ชนะ เอฟ 2-0</p>', '', '04/12/2016 11:09:58', '', 0),
(964, 44, 98, '2875244115', 27, '<p>50040 sbo ตอบ แมนยู ชนะ 3-1 &nbsp;  &nbsp;  &nbsp; :o-A:</p>', '', '04/12/2016 11:52:36', '', 0),
(965, 44, 126, '3068709999', 28, '<p>51744 sbo เอฟ ชนะ 1-0</p>', '', '04/12/2016 11:55:55', '', 0),
(966, 44, 105, '19820521', 29, '<p>7433 sbo เสมอ 0-0</p>', '', '04/12/2016 12:16:57', '', 0),
(967, 44, 22, '3754830266', 30, '<p>50173 3m ตอบ แมนฯ ยูฯ ชนะ 2:1</p>\n\n', '', '04/12/2016 12:19:59', '', 0),
(968, 44, 78, '456607336', 31, '<p>9483 sbo แมนยูชนะ 3-0</p>', '', '04/12/2016 12:31:35', '', 0),
(969, 44, 56, '1850653607', 32, '<p>3256 sbo แมนยูฯ ชนะ 4-1 ครับ</p>', '', '04/12/2016 13:00:03', '', 0),
(970, 44, 167, '456631840', 33, '<p>Sbo9615 ตอบแมนยูชนะ3-2</p>', '', '04/12/2016 13:01:32', '', 0),
(971, 44, 15, '3068703024', 34, '<p>53011 sbo เสมอ 1-1</p>', '', '04/12/2016 13:05:40', '', 0),
(972, 44, 132, '837217618', 35, '<p>53027 sbo 0-0</p>', '', '04/12/2016 13:25:24', '', 0),
(973, 44, 77, '3392138492', 36, '<p>51938 sbo เอฟเวอร์ตันชนะ 2-1</p>', '', '04/12/2016 14:02:03', '', 0),
(974, 44, 58, '462542111', 37, '<p>50688 sbo ตอบ เเมนยูเสมอเอฟเวอตัน&nbsp; 2-2</p>', '', '04/12/2016 14:08:34', '', 0),
(975, 44, 155, '2261045470', 38, '<p>9195 sbo เอฟเวอร์ตัน 0 - 2 แมนยู</p>', '', '04/12/2016 14:36:27', '', 0),
(976, 44, 106, '837217318', 39, '<p>9129 sbo แมนยูชนะ 1 ต่อ 0 ครับ</p>', '', '04/12/2016 14:36:30', '', 0),
(977, 44, 90, '2875280195', 40, '<p>69005 sbo ตอนเสมอ 1-1</p>', '', '04/12/2016 15:38:28', '', 0),
(978, 44, 139, '2261045339', 41, '<p>9571<br />\nIBC<br />\nแมนยู ชนะ 2-1</p>', '', '04/12/2016 15:42:57', '', 0),
(979, 44, 86, '19890664', 42, '<p>50488 sbo เสมอ 0-0</p>', '', '04/12/2016 15:49:19', '', 0),
(980, 44, 64, '1935112469', 43, '<p>9034 เอฟ ชนะ 1-0<br />\nไอบีซี</p>', '', '04/12/2016 15:54:21', '', 0),
(981, 44, 158, '837135906', 44, '<p>9797 เสมอ 0:0 เล่นไอบีซี</p>', '', '04/12/2016 15:59:40', '', 0),
(982, 44, 35, '456591504', 45, '<p>53497 sbq ตอบ แมนยู ชนะ 2-1</p>', '', '04/12/2016 16:08:25', '', 0),
(983, 44, 74, '456594945', 46, '<p>53061 sbo ตอบ&nbsp; แมนยู ชนะ&nbsp;  1-0</p>', '', '04/12/2016 16:10:54', '', 0),
(984, 44, 75, '3068717964', 47, '<p>53599 sbq ตอบ แมนยู ชนะ 2-0</p>', '', '04/12/2016 16:22:06', '', 0),
(985, 44, 43, '2875410927', 48, '<p>9595<br />\nไอบีซี<br />\nเอฟเวอร์ตัน ชนะ 2-1</p>', '', '04/12/2016 16:23:55', '', 0),
(986, 44, 27, '3068678297', 49, '<p>51467 sbq ตอบ&nbsp; แมนยู ชนะ 3-1</p>', '', '04/12/2016 16:57:31', '', 0),
(987, 44, 55, '3031898863', 50, '<p>53288 sbo จบ 2-2 ครับ :o-A: :o-A:</p>', '', '04/12/2016 17:11:27', '', 0),
(988, 44, 119, '837213517', 51, '<p>50721 sbo 1-1</p>', '', '04/12/2016 17:37:39', '', 0),
(989, 44, 151, '456644039', 52, '<p>Sbo 53488 ทาย เสมอ 0 0</p>', '', '04/12/2016 17:39:08', '', 0),
(990, 44, 63, '3742923040', 53, '<p>Sbo 51449  ตอบ แมนยูฯ ชนะ4-1</p>', '', '04/12/2016 17:42:19', '', 0),
(991, 44, 130, '19833910', 54, '<p>แมนยูชนะ 5-0 ,51076 sbo</p>', '', '04/12/2016 19:49:48', '', 0),
(992, 44, 1, '3076115428', 55, '<p>ยินดีกับท่านสมาชิกที่ทายผลรอบพิเศษวันอาทิตย์ ที่4ธันวาคม 59 ว่าเอฟเวอร์ตันจะเปิดบ้านเสมอผีแดงแมนยูฯไปอย่างสนุก 1&#8212;1 ชนิด&nbsp;  ลุ้นกันเหงือตกเลยทีเดียว มีผลให้สมาชิกทั้ง6ท่านที่ทายถูกรับเงินรางวัลไปท่านละ3333 บาทดังรายชื่อต่อไปนี้<br />\n9606 เสมอ 1-1 ไอบีซี<br />\n50775. Sbo.&nbsp; ตอบ.&nbsp; เสมอ&nbsp; 1 – 1<br />\n53581 sbo ตอบ เสมอ1-1ครับ<br />\n53011 sbo เสมอ 1-1<br />\n69005 sbo ตอนเสมอ 1-1<br />\n50721 sbo 1-1<br />\nโดยทางทีมงานจะตรวจสอบคุณสมบัติและมอบเงินรางวัลในเว็บของท่านในเย็นวันจันทร์นี้ ขอให้ท่านโชคดีอีกในรอบวันเสาร์หน้า รอลุ้นกันใหม่ เฮงๆๆ ครับ</p>', '', '05/12/2016 01:15:50', '', 1),
(993, 37, 75, '3068718029', 64, '<p>53599 sbq รับโปรโมชั่น</p>', '', '06/12/2016 11:44:45', '', 0),
(994, 45, 110, '1701582896', 1, '<p>9371 sbo แมนซิตี้ ชนะ 2-1</p>', '', '07/12/2016 20:39:24', '', 0),
(995, 45, 21, '3076116637', 2, '<p>51826 sbo  แมนซิตี้ ชนะ 2-0</p>', '', '07/12/2016 21:01:25', '', 0),
(996, 45, 29, '973818568', 3, '<p>9040<br />\nไอบีซี<br />\nแมนซิตี้ ชนะ 1-0</p>', '', '07/12/2016 21:02:05', '', 0),
(997, 45, 12, '3068704500', 4, '<p>51779 sbo แมนซิตี้ชนะ 1-0</p>', '', '07/12/2016 21:38:35', '', 0),
(998, 45, 137, '837135981', 5, '<p>9633 ibc<br />\nแมนซิตี้ ชนะ 3-0</p>', '', '07/12/2016 21:47:02', '', 0),
(999, 45, 158, '837144172', 6, '<p>9797<br />\nเสมอ 1-1<br />\nIBC</p>', '', '07/12/2016 23:37:49', '', 0),
(1000, 45, 16, '3076086677', 7, '<p>53004 sbo เลสเตอร์ชนะ 1-0</p>', '', '08/12/2016 09:02:09', '', 0),
(1001, 45, 87, '825274038', 8, '<p>51190  ibc เลสเตอร 1-3 แมนซิตี้</p>', '', '08/12/2016 09:40:55', '', 0),
(1002, 45, 61, '3068687586', 9, '<p>50412 web 3m จิ้งจอกสยามคืนฟอร์มโหด เลสเตอร์ 2-0 เรือใบ แมนซิตี้ ร์</p>', '', '08/12/2016 09:56:54', '', 0),
(1003, 45, 135, '462522810', 10, '<p>แมนซิตี้ ชนะ. 2-0<br />\n3m 53653</p>', '', '08/12/2016 10:50:00', '', 0),
(1004, 45, 55, '3076114754', 11, '<p>53288 sbo  แมนซิตี้ ชนะ. 3-1</p>', '', '08/12/2016 17:16:17', '', 0),
(1005, 45, 58, '462542111', 12, '<p>50688 ตอบ เสมอกัน 2-2</p>', '', '08/12/2016 19:54:10', '', 0),
(1006, 45, 168, '837669198', 13, '<p>53387 sbq แมนตี้ ชนะ 4-1</p>', '', '08/12/2016 22:58:37', '', 0),
(1007, 45, 13, '248447016', 14, '<p>51089 sbo แมนซิตี้ ชนะ2-1 ครับ</p>', '', '08/12/2016 23:08:41', '', 0),
(1008, 45, 151, '3742906631', 15, '<p>Sbo 53488 เสมอ 0 0</p>', '', '09/12/2016 01:04:48', '', 0),
(1009, 45, 85, '3742914903', 16, '<p>9150<br />\nเอสบีโอ<br />\nแมนซิตี้ ชนะ 3:2</p>', '', '09/12/2016 03:49:10', '', 0),
(1010, 45, 67, '2088419415', 17, '<p>9606 เสมอ 2-2<br />\nไอบีซี</p>', '', '09/12/2016 05:43:42', '', 0),
(1011, 45, 169, '17497360', 18, '<p>เลสเตอร์ ชนะ 2-1</p>', '', '09/12/2016 09:07:14', '', 0),
(1012, 45, 169, '17497360', 19, '<p>53742 sbo <br />\nเลสเตอร์ ชนะ 2-1</p>', '', '09/12/2016 09:09:46', '', 0),
(1013, 45, 41, '3742906289', 20, '<p>7933 3m แมนซิตี้ชนะ 3-1</p>', '', '09/12/2016 09:42:17', '', 0),
(1014, 45, 136, '456590769', 21, '<p>50171 ibc ตอบ แมนซิตี้ ชนะ 5-1</p>', '', '09/12/2016 09:45:54', '', 0),
(1015, 45, 111, '979465397', 22, '<p>51395 SBO เลสเตอร์ 1- 4แมนซิตี้</p>', '', '09/12/2016 10:20:13', '', 0),
(1016, 45, 100, '3031937155', 23, '<p>50775 sbo ตอบ เลสเตอร์ชนะ 2 - 1</p>', '', '09/12/2016 10:55:10', '', 0),
(1017, 45, 15, '837220263', 24, '<p>53011 sbo เสมอ 1-1</p>', '', '09/12/2016 12:04:06', '', 0),
(1018, 45, 64, '1935115429', 25, '<p>9034 แมนซิ ชนะ 4-1<br />\nIBC</p>', '', '09/12/2016 16:26:13', '', 0),
(1019, 45, 120, '3742893645', 26, '<p>51780 sbo แมนซิตี้ ชนะ 1- 0</p>', '', '09/12/2016 18:41:07', '', 0),
(1020, 45, 38, '18124564', 27, '<p>9188ibcตอบ เสมอ 0-0</p>', '', '09/12/2016 21:01:29', '', 0),
(1021, 45, 77, '2261007725', 28, '<p>51938 sbo เลสเตอร์ชนะ 2-1</p>', '', '09/12/2016 21:56:34', '', 0),
(1022, 45, 11, '837083270', 29, '<p>50565 IBC &nbsp; เสมอกัน 2-2</p>', '', '09/12/2016 22:47:45', '', 0),
(1023, 45, 43, '2875393198', 30, '<p>9595 Man City win 2-0<br />\nIBC</p>', '', '09/12/2016 23:48:00', '', 0),
(1024, 45, 76, '462498479', 31, '<p>Bkj3379015 m8 lester3mancity 1</p>', '', '10/12/2016 02:55:59', '', 0),
(1025, 45, 33, '17466979', 32, '<p>50524 ibc เสมอ1-1</p>', '', '10/12/2016 04:08:47', '', 0),
(1026, 45, 31, '456632462', 33, '<p>53581 sbo ตอบ แมนชิตี้ชนะ3-1ครับ</p>', '', '10/12/2016 05:08:02', '', 0),
(1027, 45, 90, '2875280374', 34, '<p>69005 sbo ตอบ เสมอ 2-2</p>', '', '10/12/2016 07:44:44', '', 0),
(1028, 45, 152, '825266134', 35, '<p>51930 sbo  mancity 3 - 2</p>', '', '10/12/2016 07:51:36', '', 0),
(1029, 45, 93, '1935142880', 36, '<p>50710 sbo ตอบว่า แมนชิตี้ ชนะ 2-0</p>', '', '10/12/2016 07:53:19', '', 0),
(1030, 45, 106, '3068685990', 37, '<p>9129 sbo แมนซิตี้ชนะ 4  ต่อ 1</p>', '', '10/12/2016 08:59:36', '', 0),
(1031, 45, 94, '19868649', 38, '<p>Sbo 50151 ตอบ เสมอ 2-2</p>', '', '10/12/2016 09:06:26', '', 0),
(1032, 45, 129, '456599233', 39, '<p>50468 SBO เลสเตอร 3-2 แมนซิตี้</p>', '', '10/12/2016 09:53:11', '', 0),
(1033, 45, 98, '2875244278', 40, '<p>50040 sbo ตอบว่า&nbsp; เสมอ 2-2</p>', '', '10/12/2016 10:13:21', '', 0),
(1034, 45, 57, '973742850', 41, '<p>50966sbo ตอบ เสมอ 0-0</p>', '', '10/12/2016 10:23:36', '', 0),
(1035, 45, 78, '3742898275', 42, '<p>9483sbo แมนซิ ชนะ 4-3</p>', '', '10/12/2016 10:39:48', '', 0),
(1036, 45, 65, '3743140169', 43, '<p>9324 sbo แมนฯซิตี้ ชนะ 3-1 ครับ</p>', '', '10/12/2016 11:06:13', '', 0),
(1037, 45, 130, '19808654', 44, '<p>51076 sbo<br />\nเสมอ 2-2</p>', '', '10/12/2016 11:09:12', '', 0),
(1038, 45, 63, '3742912940', 45, '<p>51449sbo แมนชิตีัชนะ5_1</p>', '', '10/12/2016 11:42:12', '', 0),
(1039, 45, 161, '3754717300', 46, '<p>เสมอ 0-0</p>', '', '10/12/2016 11:50:06', '', 0),
(1040, 45, 162, '2088402929', 47, '<p>51355 ibc <br />\nเลสเตอร์ 1-1แมนซิ</p>', '', '10/12/2016 11:55:27', '', 0),
(1041, 45, 72, '3031923655', 48, '<p>51905 sbo แมนซิตี้ชนะ3-1 ครับ</p>', '', '10/12/2016 12:02:34', '', 0),
(1042, 45, 109, '1029319742', 49, '<p>51491 sbq Man city win 1-0</p>', '', '10/12/2016 12:10:50', '', 0),
(1043, 45, 32, '1856590451', 50, '<p>53250 sbo ทาย แมนซิติ้ ชนะ 2-0</p>', '', '10/12/2016 12:18:36', '', 0),
(1044, 45, 92, '19794719', 51, '<p>เล่นibc รหัสสี่ตัวท้าย 50615 แมนฯซิตี้ เสมอ 3-3 ครับ</p>', '', '10/12/2016 12:28:23', '', 0),
(1045, 45, 86, '19875016', 52, '<p>50488. Sbo. ตอบ เลสเตอร์ ชนะ 2-1</p>', '', '10/12/2016 12:50:18', '', 0),
(1046, 45, 167, '3742894742', 53, '<p>Sbo9615mancity win 1-0</p>', '', '10/12/2016 13:04:44', '', 0),
(1047, 45, 105, '19828318', 54, '<p>7433 sbo เสมอ 0-0</p>', '', '10/12/2016 13:12:25', '', 0),
(1048, 45, 103, '19802646', 55, '<p>8160 ibc ตอบ Man City ชนะ4-0</p>', '', '10/12/2016 13:14:23', '', 0),
(1049, 45, 69, '3754773345', 56, '<p>50427 sbo ตอบ เลสเตอร์ ซิตี้ ชนะ 1-0</p>', '', '10/12/2016 13:36:05', '', 0),
(1050, 45, 161, '19890569', 57, '<p>ขอแก้ไข 53744 sbo ตอบ เสมอ 0-0</p>', '', '10/12/2016 14:07:33', '', 0),
(1051, 45, 84, '3742901051', 58, '<p>9415 ibc เสมอกัน 2-2</p>', '', '10/12/2016 14:32:50', '', 0),
(1052, 45, 139, '2261045339', 59, '<p>9571<br />\nแมนซิตี้ ชนะ 3-1<br />\nไอบีซี</p>', '', '10/12/2016 14:43:24', '', 0),
(1053, 45, 155, '2261045470', 60, '<p>9195 sbo เลสเตอร์ 1-1 แมนซิตี้</p>', '', '10/12/2016 14:44:06', '', 0),
(1054, 45, 27, '3068682604', 61, '<p>51467  sbq  ตอบ&nbsp; แมนซิตี้&nbsp; ชนะ&nbsp; 3-1</p>', '', '10/12/2016 16:28:05', '', 0),
(1055, 45, 96, '3068687205', 62, '<p>IBC 9562 ตอบ แมนซิตี้ ชนะ เลสเตอร์ 4:0</p>', '', '10/12/2016 16:30:51', '', 0),
(1056, 45, 119, '3068710719', 63, '<p>50721 sbo man city win 3-1</p>', '', '10/12/2016 17:00:32', '', 0),
(1057, 45, 74, '3742894005', 64, '<p>53061 sbo ตอบ แมนซิตี้&nbsp; ชนะ&nbsp; 2-0</p>', '', '10/12/2016 17:16:43', '', 0),
(1058, 45, 75, '3068662204', 65, '<p>53599 sbq ตอบ แมนซิตี้ ชนะ 2-1</p>', '', '10/12/2016 17:21:04', '', 0),
(1059, 45, 132, '3068668547', 66, '<p>53027 sbo เลสเตอร์เสมอ 1-1</p>', '', '10/12/2016 17:26:44', '', 0),
(1060, 45, 35, '3742899115', 67, '<p>53497 sbq ตอบ แมนซิตี้&nbsp; ชนะ&nbsp; 1-0</p>', '', '10/12/2016 17:33:22', '', 0),
(1061, 45, 107, '2001489631', 68, '<p>53105 ibc ตอบ แมนซิตี้ ชนะ 2-1</p>', '', '10/12/2016 17:44:55', '', 0),
(1062, 45, 22, '3754877505', 69, '<p>50173 3m ตอบ แมนฯ ซิตี้ ชนะ 2:0</p>', '', '10/12/2016 18:13:46', '', 0),
(1063, 45, 101, '3031944618', 70, '<p>53319 sbo  Leicester City	2 - 4 &nbsp;  Manchester City</p>', '', '10/12/2016 23:54:39', '', 0),
(1064, 45, 1, '3076116293', 71, '<p>ผลพลิกล็อกเกินคาด ด้วยชัยชนะของเจ้าบ้านเลสเตอร์ฯ&nbsp; เอาชนะแมนซิตี้ไปด้วยสกอร์ 4&#8212;2  ทำให้ไม่มีสมาชิกท่านใดทายถูก ไม่ให้เสียเวลาจัดนัดพิเศษวันอาทิตย์กันต่อไปเลย ตามไปทายในกระทู้วันอาทิตย์ครับ เฮงๆๆ</p>', '', '11/12/2016 02:30:26', '', 1),
(1065, 46, 168, '248455713', 1, '<p>53387 sbq ลิเวอร์พูลชนะ 3-0</p>', '', '11/12/2016 02:55:22', '', 0),
(1066, 46, 67, '2088419941', 2, '<p>9606 ไอบีซี ลิเวอร์พูล ชนะ 2-1</p>', '', '11/12/2016 03:05:47', '', 0),
(1067, 46, 61, '973669551', 3, '<p>50412 web 3M ลิเวอร์พูล 1-1 เวสแฮม</p>', '', '11/12/2016 03:50:11', '', 0),
(1068, 46, 85, '3742912462', 4, '<p>9150 ลิเวอร์ ชนะ 5-1 เอสบีโอ</p>', '', '11/12/2016 05:24:41', '', 0),
(1069, 46, 87, '19799632', 5, '<p>51190 ibc ตอบว่า ลิเวอรพูล 4 -1 เวสแฮม</p>', '', '11/12/2016 05:42:02', '', 0),
(1070, 46, 33, '17475843', 6, '<p>50524 ibc เสมอ1-1</p>', '', '11/12/2016 05:50:09', '', 0),
(1071, 46, 12, '3068697291', 7, '<p>51779 sbo ลิเวอร์พูลชนะ 1-0</p>', '', '11/12/2016 05:54:54', '', 0),
(1072, 46, 90, '2875280279', 8, '<p>69005 sbo ตอบ ลิเวอร์พูลชนะ 3-1</p>', '', '11/12/2016 06:22:45', '', 0),
(1073, 46, 58, '462542111', 9, '<p>50688 sbo ตอบ ลิเวอร์ชนะ 3-0  javascript:void(0);</p>', '', '11/12/2016 06:41:11', '', 0),
(1074, 46, 38, '18124793', 10, '<p>9188ibc ลิเวอร์พูลชนะ 4-0</p>', '', '11/12/2016 06:53:24', '', 0),
(1075, 46, 100, '825277890', 11, '<p>50775 sbo.&nbsp; ตอบ ลิเวอร์พูลชนะ 2 - 1</p>', '', '11/12/2016 07:14:17', '', 0),
(1076, 46, 41, '456630732', 12, '<p>7933 3m ลิเวอร์พูลชนะ 3-0</p>', '', '11/12/2016 07:24:23', '', 0),
(1077, 46, 107, '3068676169', 13, '<p>53105 ibc ตอบ ลิเวอร ขนะ 3-0</p>', '', '11/12/2016 08:16:43', '', 0),
(1078, 46, 111, '456630947', 14, '<p>51395 sbo ลิเวอร์พูล ชนะ 4-0</p>', '', '11/12/2016 08:44:53', '', 0),
(1079, 46, 11, '837083941', 15, '<p>50565 IBC ลิเวอร์พูล ชนะ 2-1</p>', '', '11/12/2016 08:49:15', '', 0),
(1080, 46, 130, '19917587', 16, '<p>51076 sbo<br />\nWestham win 4-2</p>', '', '11/12/2016 08:59:42', '', 0),
(1081, 46, 69, '3754773345', 17, '<p>50427  sbo &nbsp; ตอบ ลิเวอร์พูล ชนะ 2 - 0</p>', '', '11/12/2016 09:03:24', '', 0),
(1082, 46, 161, '3754773345', 18, '<p>53744 sbo ตอบ ลิเวอร์พูล ชนะ 3-0</p>', '', '11/12/2016 09:05:19', '', 0),
(1083, 46, 129, '3742898895', 19, '<p>50468 SBO &nbsp; ลิเวอรพูล 3 - 0 เวสแฮม</p>', '', '11/12/2016 09:08:00', '', 0),
(1084, 46, 94, '3031951936', 20, '<p>Sbo 50151 ตอบ ลิเวอร์พูล ชนะ 4-1</p>', '', '11/12/2016 09:28:30', '', 0),
(1085, 46, 151, '3742905038', 21, '<p>Sbo 53488 ทาย ลืเวอร์พูล ชนะ 5 0</p>', '', '11/12/2016 09:48:43', '', 0),
(1086, 46, 78, '3742907542', 22, '<p>9483 sbo เวสแฮมชนะ 2-1</p>', '', '11/12/2016 09:58:32', '', 0),
(1087, 46, 13, '248447016', 23, '<p>51089 sbo ลิเวอร์พูลชนะ 2-0 ครับ</p>', '', '11/12/2016 10:42:05', '', 0),
(1088, 46, 60, '3742913499', 24, '<p>7455 ibc ลิเวอร์ชนะ 5:2</p>', '', '11/12/2016 10:52:34', '', 0),
(1089, 46, 21, '3076012835', 25, '<p>51826 sbo ลิเวอร์พูลชนะ 2-1<br />\n :o->: :o->: :o->:</p>', '', '11/12/2016 11:05:50', '', 0),
(1090, 46, 98, '2875244184', 26, '<p>50040 sbo ตอบว่า ลิเวอร์พูล ชนะ 5-1</p>', '', '11/12/2016 11:15:52', '', 0),
(1091, 46, 105, '19811787', 27, '<p>7433 sbo ลิเวอร์พูล ชนะ 3-0</p>', '', '11/12/2016 11:17:40', '', 0),
(1092, 46, 16, '3076086677', 28, '<p>53004 sbo ลิเวอร์พูล ชนะ 4-1</p>', '', '11/12/2016 11:18:00', '', 0),
(1093, 46, 75, '3068687025', 29, '<p>53599 sbq &nbsp;   ตอบ ลิเวอร์พูล ชนะ&nbsp; 3-1</p>', '', '11/12/2016 11:30:10', '', 0),
(1094, 46, 65, '462498781', 30, '<p>9324 sbo ลิเวอร์พูล ชนะ&nbsp; 4 - 2</p>', '', '11/12/2016 11:55:48', '', 0),
(1095, 46, 27, '3068688854', 31, '<p>51467 sbq ตอบ&nbsp; ลิเวอร์พูล&nbsp; ชนะ&nbsp; 2-0</p>', '', '11/12/2016 12:10:43', '', 0),
(1096, 46, 93, '3068694962', 32, '<p>50710 sbo  ตอบว่า ลิเวอร์ชนะ2-0</p>', '', '11/12/2016 12:13:47', '', 0),
(1097, 46, 35, '3742922777', 33, '<p>53497 sbq ตอบ ลิเวอร์พูล ชนะ 2-1</p>', '', '11/12/2016 12:15:34', '', 0),
(1098, 46, 74, '456589458', 34, '<p>53061 sbo ตอบ ลิเวอร์พูล ชนะ&nbsp; 1-0</p>', '', '11/12/2016 12:18:43', '', 0),
(1099, 46, 15, '3068685722', 35, '<p>53011 sbo เสมอ1-1</p>', '', '11/12/2016 12:23:24', '', 0),
(1100, 46, 31, '456596568', 36, '<p>53581 sbo ตอบ ลิเวอร์พูลชนะ3-1ครับ</p>', '', '11/12/2016 12:28:10', '', 0),
(1101, 46, 167, '3742920998', 37, '<p>Sbo9615ตอบลิเวอพุลชนะ3-1</p>', '', '11/12/2016 12:29:55', '', 0),
(1102, 46, 120, '456592395', 38, '<p>51780 sbo ลิเวอร์พลู ชนะ 3 - 1</p>', '', '11/12/2016 12:48:28', '', 0),
(1103, 46, 77, '2261007725', 39, '<p>51938 sbo ลิเวอร์พูลชนะ 3-1</p>', '', '11/12/2016 13:09:29', '', 0),
(1104, 46, 106, '3068711318', 40, '<p>9129 sbo ลิเวอร์พูล ชนะ 2 ต่อ 1</p>', '', '11/12/2016 14:04:10', '', 0),
(1105, 46, 76, '462498700', 41, '<p>Bkj3379015 m8 liverpool2westham2</p>', '', '11/12/2016 14:53:35', '', 0),
(1106, 46, 86, '19875016', 42, '<p>50488 sbo. ตอบ ลิเวอ์พูลชนะ3-1</p>', '', '11/12/2016 15:01:55', '', 0),
(1107, 46, 139, '2261045339', 43, '<p>9571 ลิเวอร์พูล ชนะ 1:0 ibc</p>', '', '11/12/2016 15:18:56', '', 0),
(1108, 46, 158, '837135805', 44, '<p>9797 Liverpool ชนะ 2-0<br />\nibc</p>', '', '11/12/2016 15:27:41', '', 0),
(1109, 46, 72, '3031923655', 45, '<p>51905 sbo ลิเวอร์พูลชนะ 3-0</p>', '', '11/12/2016 15:31:51', '', 0),
(1110, 46, 64, '1935115322', 46, '<p>9034<br />\nไอบีซี<br />\nลิเวอร์พูล ชนะ 3-1</p>', '', '11/12/2016 15:32:14', '', 0),
(1111, 46, 155, '2261045470', 47, '<p>9195 SBO ลิเวอร์พูล 4 - 1  เวสต์แฮม</p>', '', '11/12/2016 15:34:10', '', 0),
(1112, 46, 84, '456607253', 48, '<p>9415 ibc ลิเวอร์พูล ชนะ 4-1</p>', '', '11/12/2016 15:34:33', '', 0),
(1113, 46, 137, '837139812', 49, '<p>9633<br />\nลิเวอร์พูล ชนะ 4-0 เล่น ไอบีซี</p>', '', '11/12/2016 15:39:24', '', 0),
(1114, 46, 92, '19794719', 50, '<p>ibc  รหัสสี่ตัวท้าย 50615 ลิเวอร์พูลชนะ 2-0<br />\n ครับ</p>', '', '11/12/2016 15:48:52', '', 0),
(1115, 46, 29, '837135805', 51, '<p>9040 ลิเวอร์พูล ชนะ 3:0 ไอบีซี</p>', '', '11/12/2016 15:49:54', '', 0),
(1116, 46, 43, '2875420250', 52, '<p>9595 ลิเวอร์ ชนะ 4-1 ไอบีซี</p>\n\n', '', '11/12/2016 16:43:20', '', 0),
(1117, 46, 55, '3076115805', 53, '<p>53288 sbo จบ 2-2 ครับ :o-e: :o-e:</p>', '', '11/12/2016 16:47:23', '', 0),
(1118, 46, 32, '1856590451', 54, '<p>53250 sbo ทาย ลิเวอร์พูล ชนะ 2-0</p>', '', '11/12/2016 17:21:29', '', 0),
(1119, 46, 119, '3068684264', 55, '<p>50721 sbo liverpool win 2-0</p>', '', '11/12/2016 17:27:03', '', 0),
(1120, 46, 132, '2875257973', 56, '<p>53027 sbo 0-0</p>', '', '11/12/2016 17:34:13', '', 0),
(1121, 46, 63, '3742899860', 57, '<p>51449 sbo ตอบลิเวอร์พูลชนะ4-0</p>', '', '11/12/2016 20:18:43', '', 0),
(1122, 46, 1, '3076116293', 58, '<p>ยินดีกับท่านสมาชิกที่ทายถูกว่าลิเวอร์พูล จะจบด้วยการเสมอแบ่งแต้มกับเวสแฮมป์ไปด้วยสกอร์2&#8212;2 อย่างสนุก โดยมีรายชื่อดังต่อไปนี้</p>\n\n<p>Bkj3379015 m8 liverpool2westham2<br />\n53288 sbo จบ 2-2 ครับ </p>\n\n<p>โดยแบ่งเงินกันไปถึงท่านละ10000 บาท โดยทางทีมงานขอตรวจสอบคุณสมบัติและมอบเงินเข้าไปในเว็บที่ท่านเล่นในเย็นวันจันทร์นี้ครับ ขอให้ร่วมลุ้นสนุกรับโชคดีๆ กันอย่างนี้อีกในวันเสาร์หน้าครับ เฮงๆๆๆ</p>\n\n', '', '12/12/2016 01:30:07', '', 1),
(1123, 37, 77, '2875248831', 65, '<p>51938 sbo ขอรับโปรโมชั่น</p>', '', '13/12/2016 14:46:20', '', 0),
(1124, 47, 137, '1612600312', 1, '<p>9633 เสมอ 0-0 ไอบีซี</p>', '', '13/12/2016 22:24:49', '', 0),
(1125, 47, 85, '456598729', 2, '<p>9150 เอสบีโอ<br />\nเวสบรอม ชนะ 1-0 ครับ</p>', '', '14/12/2016 03:00:41', '', 0),
(1126, 47, 12, '3068704981', 3, '<p>51779 sbo แมนยูชนะ 1-0</p>', '', '14/12/2016 08:46:53', '', 0),
(1127, 47, 33, '3056951569', 4, '<p>50524 ibc แมนยูชนะ2-0</p>', '', '14/12/2016 09:13:13', '', 0),
(1128, 47, 161, '1850594969', 5, '<p>53744 sbo ตอบ แมนยู ชนะ 4 -0</p>', '', '14/12/2016 10:34:48', '', 0),
(1129, 47, 72, '2098842902', 6, '<p>51905 sbo แมนยู ชนะ 2 -0</p>', '', '14/12/2016 10:59:11', '', 0),
(1130, 47, 162, '2875431937', 7, '<p>51355 ibc <br />\nเวสบรอม 0-2 แมนยู</p>', '', '14/12/2016 11:46:14', '', 0),
(1131, 47, 58, '462542111', 8, '<p>50688 sbo ตอบ เเมนยูชนะ 3-0</p>', '', '14/12/2016 11:55:27', '', 0),
(1132, 47, 152, '3742897016', 9, '<p>51930 sbo แมนยู ชนะ 3-0</p>', '', '14/12/2016 11:56:40', '', 0),
(1133, 47, 159, '837050905', 10, '<p>53743 sbo เวสบรอม 1-2 แมนยู</p>', '', '14/12/2016 12:06:48', '', 0),
(1134, 47, 68, '2056990076', 11, '<p>99813 sbo เวสบอม 0-1แมนยู</p>', '', '14/12/2016 14:55:17', '', 0),
(1135, 47, 69, '19868631', 12, '<p>50427 sbo ตอบ เวสบรอม 2 - 1 แมนฯยู</p>', '', '14/12/2016 16:19:58', '', 0),
(1136, 47, 41, '3742902577', 13, '<p>7933 3m แมนยูชนะ 3-1</p>', '', '14/12/2016 17:07:18', '', 0),
(1137, 47, 110, '837050655', 14, '<p>9371 sbo<br />\nManU ชนะ 2-1</p>', '', '14/12/2016 17:58:25', '', 0),
(1138, 47, 77, '3076034315', 15, '<p>51938 sbo เสมอ 2-2</p>', '', '14/12/2016 18:13:34', '', 0),
(1139, 47, 29, '1701634157', 16, '<p>9040 แมนยู ชนะ 1-0 ไอบีซี</p>', '', '14/12/2016 19:14:09', '', 0),
(1140, 47, 43, '2875392632', 17, '<p>9595 ไอบีซี<br />\nเวสบรอม 0 - 2 แมนยู</p>', '', '14/12/2016 19:55:11', '', 0),
(1141, 47, 158, '837140350', 18, '<p>9797 เสมอ 2-2 ibc</p>', '', '14/12/2016 21:10:02', '', 0),
(1142, 47, 168, '837653448', 19, '<p>53387sbo จบ 2-2 ครับ</p>', '', '15/12/2016 06:17:14', '', 0),
(1143, 47, 15, '3068680470', 20, '<p>53011 sbo เสมอ 1-1</p>', '', '15/12/2016 18:26:39', '', 0),
(1144, 47, 55, '3031898737', 21, '<p>53288 sbo เวสบรอม 0 - 4 แมนยู</p>', '', '15/12/2016 20:27:55', '', 0),
(1145, 47, 61, '973669551', 22, '<p>50412  web 3m  เวสบรอม 1-1 แมนยู&nbsp; :o-):</p>', '', '15/12/2016 23:13:06', '', 0),
(1146, 47, 116, '19915323', 23, '<p>9527 sbo แมนยูชนะ3-1</p>', '', '16/12/2016 09:33:40', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `webboard_topic`
--

CREATE TABLE `webboard_topic` (
  `id` int(5) NOT NULL,
  `user_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `ip_address` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(5) NOT NULL,
  `comments` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `edt_by` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `edt_datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `edt_ip_address` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `webboard_topic`
--

INSERT INTO `webboard_topic` (`id`, `user_id`, `category_id`, `ip_address`, `title`, `content`, `datetime`, `views`, `comments`, `status`, `edt_by`, `edt_datetime`, `edt_ip_address`) VALUES
(5, 1, 4, '1999262705', 'กฎ ระเบียบ การใช้งานเว็บบอร์ด', '<div class="_l53"><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTzMuKfWiMp5MZbtRDukZcXpq7kgxmzv0poYhUJ4rjkLguCRcKv" alt="ผลการค้นหารูปภาพสำหรับ rules icon" /></div>\r\n<h2 class="_l53">&nbsp;</h2>\r\n<h2 class="_l53"><strong>กฎกติกา ในการร่วมแสดงความคิดเห็น / โพสข้อความทั่วไป</strong></h2>\r\n<p>1) ห้าม โพสข้อความหรือเนื้อหา ที่เป็นการวิพากษ์วิจารณ์ หรือ พาดพิงสถาบันพระมหากษัตริย์ และ ราชวงศ์ เป็นอันขาด<br /><br />2) ห้าม โพสข้อความหรือเนื้อหา ที่ส่อไปในทางลามก อนาจาร เกินกว่าบรรทัดฐานของสังคม<br /><br />3) ห้าม โพสข้อความหรือเนื้อหา ที่ส่อไปในทางหยาบคาย ก้าวร้าว โดยมีเจตนาก่อให้เกิดการทะเลาะวิวาท หรือ มีเจตนาทำให้สังคมเข้าใจผิดต่อตัวบุคคล และ สถาบันใดๆ<br /><br />4) ห้าม โพสข้อความหรือเนื้อหา โจมตี หรือวิพากษ์วิจารณ์ศาสนา และ คำสอนของศาสนาใดๆทุกศาสนา<br /><br /><em><strong>อนึ่ง</strong></em> ข้อห้ามในกฎ กติกา ที่กล่าวไว้ข้างต้น ทีมงานขอสงวนสิทธิ์ในการใช้ดุลยพินิจที่จะลบข้อความดังกล่าว (หรือลบทั้งกระทู้) ออกไปโดยอาจไม่แสดงเหตุผลให้ทราบล่วงหน้า</p>\r\n<h2><strong>มารยาททั่วไป</strong></h2>\r\n<p>1) ใช้ข้อความที่สุภาพ อันแสดงถึงกิริยามารยาทของสังคมไทย ในการแสดงความคิดเห็นใดๆ<br /><br />2) ตั้งกระทู้ หรือ โพสข้อความ ให้ตรงกับหมวดหมู่ที่กำหนดไว้ ขอสงวนสิทธิ์ในการย้ายกระทู้ไปยังหมวดหมู่ที่ถูกต้อง โดยไม่แจ้งให้ทราบล่วงหน้า<br /><br />3) อย่าใช้เว็บไซต์นี้เป็นเครื่องมือในการใส่ร้ายป้ายสีผู้อื่น ข้อความสาธารณะควรมีการระบุที่มาที่ไปอย่างชัดเจน<br /><br />4) ตั้งชื่อกระทู้ให้ "สื่อถึงเรื่องราวภายใน" อย่างชัดเจน เพื่อความสะดวกของผู้ใช้งานทุกท่านในการตอบ/แสดงความคิดเห็น</p>', '02/09/2016 14:14:38', 224, 1, 4, '2', '01/12/2016 09:58:13', '2680221235'),
(21, 1, 5, '1999263367', 'เกมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่ 10/9/16', '<p>&nbsp;<img src="../../assets/images/game1.jpg" width="100%" height="100%" /></p>\n<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่10/9/16</h4>\n<h4>&nbsp;</h4>\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 10&nbsp;กันยายน&nbsp;2559</strong></u></h4>\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีก&nbsp;วันเสาร์ที่ 10&nbsp;กันยายน&nbsp;2559 คู่ระหว่าง ลิเวอร์พูล&nbsp;VS เลสเตอร์&nbsp;จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 ลิเวอร์พูล&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่10 กันยายน&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '08/09/2016 12:40:03', 1236, 72, 2, '0', '0', '0'),
(22, 2, 4, '1999262897', 'แจ้งข่าวสารถึงสมาชิก', '<h1><img src="http://smilekrub.com/images/etc/smilekrub-register.gif" /></h1>\r\n<h1>สวัสดีครับ jojo&nbsp;มารายงานตัว</h1>\r\n<p>jojo เป็นผู้ช่วยเหลือในการดูแลการใช้งานเว็บบอร์ดโดยทั่วๆ ไปครับ</p>\r\n<p>ไม่มีสิทธิในการเล่นเกมส์ทายผล/ตอบคำถาม เพื่อชิงรางวัลใดๆ</p>\r\n<p>---------------------------</p>\r\n<ol>\r\n<li><span style="text-decoration: underline;">ขอแจ้งให้ทราบว่า หลังจากนี้ ท่านที่สมัครสมาชิกจะได้รับการอนุมัติให้เข้าสู่ระบบได้ทันที</span></li>\r\n<li><span style="text-decoration: underline;">ขอแจ้งให้ทราบว่า สมาชิกทุกท่านที่ได้เข้าสู่ระบบแล้วต้องไปที่หน้าโปรไฟล์ของท่านเพื่อตั้งค่า คำถามกันลืมรหัสผ่าน ครับ</span></li>\r\n<li><span style="text-decoration: underline;">ขอแจ้งให้ทราบว่า เกมส์ทายผลฟุตบอลจะถูกนำมาใช้ในเว็บบอร์ดนี้ แทนที่เว็บบอร์ดเดิมครับ</span></li>\r\n<li><span style="text-decoration: underline;">ขอแจ้งให้ทราบว่า เว็บบอร์ดนี้มีการเก็บหมายเลขไอพีแอดเดรสของท่าน เพื่อป้องกันผู้ไม่ประสงค์ดี/อื่นๆ</span></li>\r\n<li><u>ขอแจ้งให้ทราบว่า สมาชิกที่ตั้งหัวข้อสนทนาในเว็บบอร์ด จะต้องรอการอนุมัติเพื่อให้สามารถคอมเม้นต์ได้ครับ</u></li>\r\n</ol>', '06/09/2016 16:14:22', 88, 6, 1, '0', '0', '0'),
(24, 2, 4, '1999263367', 'แจ้งข่าวสาร เรื่องการสมัครสมาชิกและเข้าสู่ระบบ', '<p><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKVWjqG2sP8TihatNGbmkqFDrIIWWXbk8VjOVMZROXRGoex1kzfQ" alt="Image result for login" /></p>\r\n<h2>สวัสดีครับ jojo มาแจ้งข่าวสาร</h2>\r\n<p>เนื่องจากมีรายงานความผิดพลาดของระบบเข้ามา</p>\r\n<p><strong><em>เราจึงเร่งรีบแก้ไขและขอเรียนชี้แจงให้ท่านทราบว่า</em></strong></p>\r\n<ol>\r\n<li>ขอแนะนำให้ท่าน สมัครสมาชิกด้วยชื่อผู้ใช้/รหัสผ่านเป็นภาษาอังกฤษหรือตัวเลขตัวพิมพ์เล็กเท่านั้น</li>\r\n<li>ขอแนะนำให้ท่าน งดเว้นการใช้ตัวอักขระนอกเหนือจาก a-z หรือ ตัวเลข 0-9 เพื่อความสะดวกในการจดจำครับ</li>\r\n<li>ขอแนะนำให้ท่าน อ่านคำอธิบายของแต่ละช่องกรอกข้อมูลในหน้าสมัครสมาชิกโดยละเอียดก่อนทำการครับ</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>ขอบพระคุณทุกท่านครับ</p>\r\n<p>หากพบปัญหาการใช้งานใดๆ ท่านสามารถแจ้งในไลน์@</p>\r\n<p>หรือติดต่อทางโทรศัพท์โดยตรงได้เลยครับ</p>', '08/09/2016 09:27:05', 123, 1, 1, '0', '0', '0'),
(27, 1, 5, '3076115939', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่17/9/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่17/9/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 17 กันยายน&nbsp;2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีก&nbsp;วันเสาร์ที่ 17 กันยายน&nbsp;2559 คู่ระหว่าง เอฟเวอร์ตัน VS มิดเดิ้ลสโบร์ส</strong><strong>&nbsp;จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 เอฟเวอร์ตัน&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่17&nbsp;กันยายน&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '13/09/2016 00:48:23', 763, 63, 2, '0', '0', '0'),
(28, 1, 5, '2001495812', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่24/9/16', '<p>&nbsp;<img src="../../assets/images/slide2.jpg" width="100%" height="100%" /></p>\r\n<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่24/9/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 24&nbsp;กันยายน&nbsp;2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีก&nbsp;วันเสาร์ที่ 24&nbsp;กันยายน&nbsp;2559 คู่ระหว่าง อาร์เซน่อล&nbsp;VS เชลซี</strong><strong>&nbsp;จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 อาร์เซน่อล&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่&nbsp;24 กันยายน&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '20/09/2016 23:50:23', 833, 68, 2, '0', '0', '0'),
(29, 2, 4, '1999263431', 'แจ้งข่าวสาร เรื่องการลืมรหัสผ่านของสมาชิก', '<p><img src="http://cdn3.megarush.net/wp-content/uploads/2012/11/forgot-password-php.jpg" /></p>\r\n<h2>สวัสดีครับ jojo มาแจ้งข่าวสาร</h2>\r\n<p>เนื่องจากมีการลืมรหัสผ่านของสมาชิกบางท่าน</p>\r\n<p><strong><em>เราจึงขออธิบายขั้นตอนและวิธีการใช้งานโดยคร่าว ให้เข้าใจได้ง่ายดังนี้ครับ</em></strong></p>\r\n<ol>\r\n<li>ท่านจะต้อง จดจำคำถามกันลืมรหัสผ่านและคำตอบด้วยตัวของท่านเอง</li>\r\n<li>ท่านจะต้อง เข้าไปยังหน้า "ลืมรหัสผ่าน" เมนูทางเข้าอยู่ที่หัวมุมบนด้านขวาของหน้าเว็บไซต์</li>\r\n<li>ท่านจะต้อง กรอกข้อมูลคำถามกันลืมรหัสผ่านและคำตอบที่ถูกต้อง พร้อมด้วยชื่อล็อกอินและเบอร์โทรศัพท์</li>\r\n<li>ท่านจะต้อง กรอกข้อมูลที่ตรงกับข้อมูลที่ท่านได้บันทึกเอาไว้ในเว็บไซต์เท่านั้น</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>หลังจากนั้นท่านสามารถกรอกรหัสผ่านใหม่ เพื่อใช้เป็นรหัสล็อกอินบนเว็บไซต์ได้ทันทีครับ</p>\r\n<p>&nbsp;</p>', '24/09/2016 11:08:31', 55, 0, 5, '2', '25/11/2016 14:48:03', '2680222860'),
(30, 1, 5, '3076116006', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่01/10/16', '\r\n<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่01/10/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 1&nbsp;ตุลาคม 2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีก&nbsp;วันเสาร์ที่ 1 ตุลาคม&nbsp;2559 คู่ระหว่าง ฮัลล์&nbsp;VS เชลซี</strong><strong>&nbsp;จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 ฮัลล์&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 1ตุลาคม&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '27/09/2016 02:23:56', 687, 68, 2, '0', '0', '0'),
(31, 1, 5, '248456366', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่08/10/16', '<p>&nbsp;<img src="../../assets/images/slide2.jpg" width="100%" height="100%" /></p><h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่08/10/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 8&nbsp;ตุลาคม 2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลโลก2018 รอบคุดเลือก&nbsp;วันเสาร์ที่ 8&nbsp;ตุลาคม&nbsp;2559 คู่ระหว่าง เยอรมัน Vs สาธารณรัฐเช็ก</strong><strong>&nbsp;จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 เยอรมัน&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 8ตุลาคม&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '05/10/2016 17:36:14', 452, 42, 2, '0', '0', '0'),
(33, 1, 5, '973787634', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่15/10/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่15/10/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 15&nbsp;ตุลาคม 2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 15&nbsp;ตุลาคม&nbsp;2559 คู่ระหว่าง คริสตัล พาเลซ&nbsp;Vs เวสแฮมป์</strong><strong>&nbsp;จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 พาเลซ&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 15ตุลาคม&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '11/10/2016 01:13:53', 453, 55, 2, '0', '0', '0'),
(36, 1, 5, '3076114975', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่22/10/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่22/10/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 22&nbsp;ตุลาคม 2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 22&nbsp;ตุลาคม&nbsp;2559 คู่ระหว่าง&nbsp;</strong>ลิเวอร์พูล V เวสต์บรอมวิช&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 ลิเวอร์พูล&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 22&nbsp;ตุลาคม&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '18/10/2016 01:40:14', 594, 54, 2, '0', '0', '0'),
(37, 1, 6, '2680223062', 'ยืนยันการรับสิทธิ์โปรโมชั่นแลกทิปแลกเงินเครดิต', '<h1>โปรโมชั่นแลกทิปๆ /แลกเงินเครดิตฟรีทุกเดือนไม่จำกัด</h1>\r\n<p>&nbsp;</p>\r\n<ul class="right">\r\n<ul class="right">ข้อกำหนดและเงื่อนไขกติกาและข้อตกลงการเข้าร่วมโปรโมชั่น\r\n<ol>\r\n<li>ท่านสมาชิกต้องแจ้งชื่อรหัส และเว็บที่ท่านเล่น ในหน้าเว็บบอร์ดเพื่อยืนยันการรับสิทธิ์ เช่น ชื่อรหัส 23375 เล่น sbo ขอรับสิทธิ์ เป็นต้น</li>\r\n<li>เว็บที่ร่วมโปรโมชั่น ( sbo ibc 3m winning )</li>\r\n<li>ทาง fanball คิดให้เฉพาะ Sport Betting ให้เท่านั้น ไม่รวมการเล่น คาสิโน</li>\r\n<li>เริ่มสะสมแต้ม ประจำเดือน ตั้งแต่วันที่ 1 สิงหาคม 2559 จนถึง วันสิ้นเดือน 31 กรกฎาคม&nbsp;60</li>\r\n<li>แต้มจะเกิดขึ้นจากยอดเล่นทั้งบวก ลบ และ เสมอ เอาเฉพาะยอดเล่นอย่างเดียว มาเป็นแต้มสะสม</li>\r\n<li>สมาชิกสามารถติดต่อขอรับรางวัลในวันที่ 5 ของเดือนถัดไป</li>\r\n<li>จะต้องไม่มีฐานข้อมูลซ้ำกับ user ที่ทาง fanball มีอยู่แล้ว เช่น ชื่อ นามสกุล , ที่อยู่, อีเมล์, เบอร์โทรศัพท์, บัญชีธนาคารและ IP Address</li>\r\n<li>fanball ถือว่าลูกค้าทุกท่านรับทราบข้อกำหนดนี้ และตกลงยอมรับข้อกำหนดตามกติกา และเงื่อนไขของการได้รับรางวัลแล้วทุกประการ</li>\r\n</ol>\r\n</ul>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>แต้ม &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; แลก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เงินรางวัล</strong> <br />100,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;100 <br />1,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1,000 <br />2,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2,000 <br />3,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3,000 <br />4,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 4,000 <br />5,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 5,000 <br />6,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6,000 <br />7,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 7,000 <br />8,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 8,000 <br />9,000,000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9,000 <br />10,000,000&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 10,000</p>', '18/10/2016 14:13:21', 683, 65, 1, '0', '0', '0'),
(38, 1, 5, '248457026', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่29/10/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่29/10/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 29 ตุลาคม 2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 29 ตุลาคม&nbsp;2559 คู่ระหว่าง คริสตัล พาเลซ VS&nbsp;</strong>ลิเวอร์พูล &nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 ลิเวอร์พูล&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 29 ตุลาคม&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '26/10/2016 01:01:27', 783, 63, 2, '0', '0', '0'),
(39, 1, 5, '3076115655', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่5/11/16', '<p>&nbsp;<img src="../../assets/images/slide2.jpg" width="100%" height="100%" /></p><h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่5/11/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 5 พฤษจิกายน&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 5 พฤษจิกายน 2559 คู่ระหว่าง เชลซี&nbsp;VS&nbsp;เอฟเวอร์ตัน&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 เชลซี&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่&nbsp;</strong><strong>5 พฤษจิกายน</strong><strong> 2559 ไม่มีต่อเวลานะครับ</strong></h4>', '02/11/2016 04:39:52', 910, 73, 2, '0', '0', '0'),
(40, 2, 5, '1850595436', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่12/11/16', '<h4><img src="https://scontent.fbkk10-1.fna.fbcdn.net/t31.0-8/14940108_1852414788379082_4646834321442273167_o.jpg" width="100%" height="100%" /></h4>\r\n<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่12/11/16</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 12&nbsp;พฤษจิกายน&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลโลกรอบคัดเลือก&nbsp;วันเสาร์ที่12 พฤษจิกายน 2559 คู่ระหว่างทีมชาติเวลส์&nbsp;VS เซอร์เบีย&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 เวลส์&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่&nbsp;12</strong><strong>&nbsp;พฤษจิกายน</strong><strong> 2559 ไม่มีต่อเวลานะครับ</strong></h4>', '09/11/2016 00:34:00', 696, 66, 2, '0', '0', '0'),
(41, 1, 5, '3076114707', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่19/11/16', '<h4><img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-9/15036356_1856356417984919_3834728916879940279_n.jpg?oh=c378f99a458948795e0d598754c65bc4&amp;oe=58D0D6FE" alt="" width="100%" height="100%" /></h4>\r\n<h4>&nbsp;</h4>\r\n<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่19/11/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 19&nbsp;พฤษจิกายน&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 19 พฤษจิกายน 2559 คู่ระหว่าง สเปอร์&nbsp;VS เวสต์แฮมป์&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 สเปอร์&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่&nbsp;19</strong><strong>&nbsp;พฤษจิกายน</strong><strong> 2559 ไม่มีต่อเวลานะครับ</strong></h4>', '15/11/2016 12:11:55', 825, 69, 2, '3', '17/11/2016 09:04:09', '1850584035'),
(42, 1, 5, '248456693', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่26/11/16', '<h4><img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-9/15202664_1799086330360254_4751004128576199097_n.jpg?oh=2e66915f7c83630c1f297ca71245ad8d&amp;oe=58CB42DE" alt="" width="100%" height="100%" /></h4>\r\n<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่26/11/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 26&nbsp;พฤษจิกายน&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 26&nbsp;พฤษจิกายน 2559 คู่ระหว่าง เชลซี&nbsp;</strong><strong>VS </strong><strong>สเปอร์ &nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 สเปอร์&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่&nbsp;26</strong><strong>&nbsp;พฤษจิกายน</strong><strong> 2559 ไม่มีต่อเวลานะครับ</strong></h4>', '23/11/2016 20:15:56', 665, 66, 2, '2', '24/11/2016 14:43:28', '1850595561'),
(43, 1, 5, '3076116143', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่3/12/16', '<h4><img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-9/15241987_1863993813887846_1629460806834108625_n.jpg?oh=7b76b3b55597657a25a3381214a30494&amp;oe=58CA0FF6" alt="" width="1117" height="425" /><br /><br />เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่3/12/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 3 ธันวาคม&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 3 ธันวาคม&nbsp;2559 คู่ระหว่าง เวสแฮมป์&nbsp;</strong><strong>VS อาร์เซน่อล</strong><strong>&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234&nbsp;อาร์เซน่อล ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 3 ธันวาคม</strong><strong>&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '30/11/2016 04:22:54', 752, 70, 2, '3', '30/11/2016 09:09:37', '2680221237'),
(44, 1, 5, '248456025', 'เกมมส์ชิงรางวัลรอบพิเศษ ให้มากถึง 20,000 บาท  ทายก่อนมีสิทธิก่อน อาทิตย์ที่4/12/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท &nbsp;ทายก่อนมีสิทธิก่อน อาทิตย์ที่4/12/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเอาทิตย์ที่4 ธันวาคม&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วัน อาทิตย์ที่ 4 ธันวาคม&nbsp;2559 คู่ระหว่าง เอฟเวอร์ตัน&nbsp;</strong><strong>VS แมนฯยูไนเต็ต</strong><strong>&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 แมนยู&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 21.00น. วันที่ 4ธันวาคม</strong><strong>&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '04/12/2016 02:47:43', 554, 55, 2, '', '', ''),
(45, 1, 5, '3076115428', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่10/12/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่10/12/16</h4>\r\n<h4><img src="https://scontent.fbkk10-1.fna.fbcdn.net/t31.0-8/15370132_1288165444591985_4072994519128051436_o.jpg" alt="" width="1150" height="299" /></h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด<br />สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 10 ธันวาคม&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 10&nbsp;ธันวาคม&nbsp;2559 คู่ระหว่าง เลสเตอร์ฯ&nbsp;</strong><strong>VS แมนฯซิตี้</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย<br />เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 แมนฯซิตี้&nbsp;ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่ 10 ธันวาคม</strong><strong>&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '07/12/2016 17:09:24', 594, 71, 2, '3', '08/12/2016 09:06:49', '1850595355'),
(46, 1, 5, '3076116293', 'เกมมส์ชิงรางวัลนัเพิเศษ วันอาทิตย์ ให้มากถึง 20,000 บาท  ทายก่อนมีสิทธิก่อน อาทิตย์ที่11/12/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท &nbsp;ทายก่อนมีสิทธิก่อน อาทิตย์ที่11/12/16</h4>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเอาทิตย์ที่11 ธันวาคม&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วัน อาทิตย์ที่ 11&nbsp;ธันวาคม&nbsp;2559 คู่ระหว่าง ลิเวอร์พูล &nbsp;</strong><strong>VS เวสแฮมป์</strong><strong>&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 ลิเวอร์พูลชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 21.00น. วันที่ 11 ธันวาคม</strong><strong>&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '11/12/2016 02:33:13', 508, 58, 2, '', '', '');
INSERT INTO `webboard_topic` (`id`, `user_id`, `category_id`, `ip_address`, `title`, `content`, `datetime`, `views`, `comments`, `status`, `edt_by`, `edt_datetime`, `edt_ip_address`) VALUES
(47, 1, 5, '3076116293', 'เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่17/12/16', '<h4>เกมมส์ชิงรางวัล ให้มากถึง 20,000 บาท ทายไม่ถูกจัดให้อีกวันถัดไป ทายก่อนมีสิทธิก่อน เสาร์ที่17/12/16</h4>\r\n<h4>&nbsp;<img src="https://scontent.fbkk5-1.fna.fbcdn.net/v/t1.0-9/15442185_1297305120344684_8373846746064159033_n.jpg?oh=bacf40aeb476c8d88ee2e0b7daf7cd60&amp;oe=58F63C70" alt="" width="1150" height="299" /></h4>\r\n<h4><strong>หากทายถูกหลายท่านเราจะหารแบ่งตามส่วน ได้สูงสุดท่านละ1,000บาท20รางวัล มาก่อนมีสิทธิก่อน แจกสมาชิกทุกเดือนเกือบ 100,000บาท เลยทีเดียว เพียงแค่ท่านร่วมสนุกและปฏิบัติตามกติกา ของเรา</strong><br /><br /></h4>\r\n<h4><u><strong>กติกาการเล่นเกมส์</strong></u></h4>\r\n<h4><br /><strong>1. ลงชื่อรับสิทธ์การเล่นเกมส์ในบอร์ดให้เรียบร้อย</strong><br /><br /><strong>2.ตอบก่อนมีสิทธิก่อน ท่านสมาชิกสามารถตอบได้1ยูสเซอร์ 1ไอพี เท่านั้น</strong><br /><br /><strong>3.ต้องมียอดเทิร์นโอเวอร์ ย้อนหลัง1 สัปดาห์ เสาร์-ศุกร์ เกิน 5,000 บาทขึ้นไป</strong><br /><br /><strong>4.หากมีเกมส์ใหญ่กลางสัปดาห์ อาจมีการจัดแจกรางวัลตอบคำถามเพิ่ม แต่ท่านต้องมียอดได้เสียย้อนหลัง 1วันเกิน500บาทขึ้นไป</strong><br /><br /><strong>5.การคิดยอดเทิร์นโอเวอร์ หรือยอดได้เสีย ยึดตามเวลาของเว็บเดิมพันที่ท่านเล่น</strong><br /><br /><strong>6.ผลการตัดสิน ยึดสกอร์ หรือผลจากเว็บ sbobet เป็นมาตรฐาน</strong><br /><br /><strong>7. ผลการตัดสินของทางเว็บถือเป็นผลชี้ขาด</strong><br /><br /><strong>8.แจ้งรายชื่อผู้รับรางวัลในเช้าวันอาทิตย์ และจะตรวจสอบคุณสมบัติและแจกรางวัลเป็นยอดเครดิตในเว็บของท่านในเย็นวันอาทิตย์</strong><br /><br /><strong>9.ทางเว็บขอสงวนสิทธิในการเปลี่ยนแปลง แก้ไข ยกเลิกเกมส์โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</strong><br /><br /><strong>***10. หากไม่มีผู้ถูกรางวัลรางวัลเราจะจัดอีกครึ่งให้ในวันทัดไปที่มีบอลใหญ่ครับ หากท่านไม่เข้าใจกติกาในข้อใด สอบถามทีมงานได้ทันที 085-2088886-7 ขอให้ทุกท่านโชคดี เรายังมีรางวัลแจกให้ท่านอีกมากมายครับ</strong><br /><br /></h4>\r\n<h4><u><strong>คำถามประจำวันเสาร์ที่ 17&nbsp;ธันวาคม&nbsp;</strong></u><u><strong>2559</strong></u></h4>\r\n<h4><br /><br /><br /><strong>ฟุตบอลพรีเมียร์ลีค&nbsp;วันเสาร์ที่ 17 ธันวาคม 2559 คู่ระหว่าง เวสบรอมวิชฯ&nbsp;</strong><strong>VS แมนฯยูไนเต็ด</strong><strong>&nbsp;&nbsp;</strong>&nbsp;&nbsp;<strong>จบ 90 นาทีสกอร์จะเป็นเช่นไร?</strong><br /><br /><br /><strong>ใครทายก่อนถือว่าได้ก่อน 20ท่านแรกแจกไปเลยท่านละ1000 บาท ถูกน้อยหารน้อย เช่น ถูก5คน รับไปท่านละ4000บาท เอาไปเลย เราแจกจริงและต้องการให้ของขวัญท่านสมาชิก ขอให้ท่านโชคดีและสนุกไปกับการแข่งขัน</strong><br /><br /><br /><strong>ตัวอย่างการตอบคำถาม (เล่น sbobet รหัสสี่ตัวท้าย 1234 แมนยูฯ ชนะ 2-1 ครับ)</strong><br /><br /><br /><strong>หมดเวลาทายผล เวลา 18.00น. วันที่&nbsp;17 ธันวาคม&nbsp;</strong><strong>&nbsp;2559 ไม่มีต่อเวลานะครับ</strong></h4>', '13/12/2016 21:19:18', 151, 23, 1, '3', '14/12/2016 09:03:59', '2869423796');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(4) NOT NULL,
  `admin_id` int(4) NOT NULL,
  `user_product_id` int(4) NOT NULL,
  `user_bank_id` int(4) NOT NULL,
  `amount` int(10) NOT NULL,
  `datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_group`
--
ALTER TABLE `event_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_product`
--
ALTER TABLE `event_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_betting`
--
ALTER TABLE `game_betting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_pay`
--
ALTER TABLE `game_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odds`
--
ALTER TABLE `odds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_url`
--
ALTER TABLE `product_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_bank`
--
ALTER TABLE `user_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webboard_category`
--
ALTER TABLE `webboard_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webboard_comment`
--
ALTER TABLE `webboard_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webboard_topic`
--
ALTER TABLE `webboard_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `event_group`
--
ALTER TABLE `event_group`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_product`
--
ALTER TABLE `event_product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `game_betting`
--
ALTER TABLE `game_betting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `game_pay`
--
ALTER TABLE `game_pay`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `odds`
--
ALTER TABLE `odds`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_url`
--
ALTER TABLE `product_url`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `user_bank`
--
ALTER TABLE `user_bank`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webboard_category`
--
ALTER TABLE `webboard_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `webboard_comment`
--
ALTER TABLE `webboard_comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1147;
--
-- AUTO_INCREMENT for table `webboard_topic`
--
ALTER TABLE `webboard_topic`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
