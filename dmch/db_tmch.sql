-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2015 at 08:30 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tmch`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE IF NOT EXISTS `child` (
  `id` int(5) NOT NULL,
  `mother_id` int(5) NOT NULL,
  `pregnant_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `organize_id` int(5) NOT NULL,
  `picture` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `blood` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `round` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `anomaly` text COLLATE utf8_unicode_ci NOT NULL,
  `health` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `mother_id`, `pregnant_id`, `staff_id`, `organize_id`, `picture`, `name`, `surname`, `card`, `birthdate`, `blood`, `religion`, `gender`, `weight`, `height`, `round`, `anomaly`, `health`) VALUES
(1, 2, 1, 1, 1, 'child20151214181456.jpg', 'david', 'de gea', '0000000000999', '30/12/2015', 'O', 'buddha', 'ชาย', '5000', '40', '10', 'none', 'none'),
(3, 3, 2, 1, 1, '', 'radamel', 'falcao', '', '30/12/2015', 'A', '', 'หญิง', '30', '60', '20', '', ''),
(4, 2, 3, 2, 2, '', 'jose', 'murinho', '', '21/04/2016', 'B', '', 'หญิง', '10', '20', '10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `child_physical`
--

CREATE TABLE IF NOT EXISTS `child_physical` (
  `id` int(5) NOT NULL,
  `child_id` int(5) NOT NULL,
  `month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `height` int(3) NOT NULL,
  `round` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `child_physical`
--

INSERT INTO `child_physical` (`id`, `child_id`, `month`, `weight`, `height`, `round`) VALUES
(1, 1, '1', '5', 40, '15'),
(2, 1, '2', '6', 41, '16'),
(3, 1, '3', '7', 41, '16'),
(4, 1, '4', '8', 45, '16'),
(5, 1, '5', '8', 46, '16'),
(6, 1, '6', '9', 47, '16'),
(7, 1, '7', '9', 50, '16');

-- --------------------------------------------------------

--
-- Table structure for table `child_vaccination`
--

CREATE TABLE IF NOT EXISTS `child_vaccination` (
  `id` int(5) NOT NULL,
  `child_id` int(5) NOT NULL,
  `v1_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v2_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v2_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v3_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v3_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v3_3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v4_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v4_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v5_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v5_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v6_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v6_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v6_3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v7_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l7` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `child_vaccination`
--

INSERT INTO `child_vaccination` (`id`, `child_id`, `v1_1`, `l1`, `v2_1`, `v2_2`, `l2`, `v3_1`, `v3_2`, `v3_3`, `l3`, `v4_1`, `v4_2`, `l4`, `v5_1`, `v5_2`, `l5`, `v6_1`, `v6_2`, `v6_3`, `l6`, `v7_1`, `l7`) VALUES
(1, 1, '24/12/2015', 'วชิระพยาบาลภูเก็ต', '22/12/2015', '', 'วชิระภูเก็ต กระทรวงการบิน', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 3, '09/01/2016', 'วชิระพยาบาลภูเก็ต', '22/12/2015', '', 'วชิระภูเก็ต กระทรวงการบิน', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 4, '01/02/2016', 'วชิระพยาบาลภูเก็ต', '', '', '', '09/01/2016', '', '', 'วชิระพยาบาลภูเก็ต', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE IF NOT EXISTS `mother` (
  `id` int(5) NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contraception` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patient` text COLLATE utf8_unicode_ci NOT NULL,
  `surgery` text COLLATE utf8_unicode_ci NOT NULL,
  `medical` text COLLATE utf8_unicode_ci NOT NULL,
  `ft_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ft_surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ft_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ft_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `ft_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sc_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sc_surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sc_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sc_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `sc_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stat` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`id`, `date`, `email`, `picture`, `name`, `surname`, `birthdate`, `weight`, `height`, `card`, `occupation`, `religion`, `address`, `phone`, `contraception`, `patient`, `surgery`, `medical`, `ft_name`, `ft_surname`, `ft_email`, `ft_card`, `ft_phone`, `sc_name`, `sc_surname`, `sc_email`, `sc_card`, `sc_phone`, `stat`) VALUES
(1, '13/12/2015', '', '', 'kwinnette', 'pawetrowe', '', '', '', '0000000000002', 'none', 'buddha', '', '0000000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(2, '13/12/2015', 'test@test.com', 'mother20151213222808.jpg', 'justin', 'bieber', '12/31/2015', '80', '199', '0000000000000', 'singer', 'christ', 'address', '0000000000', 'condom', 'none', 'none', 'none', '', '', '', '', '', 'test', 'test', 'email@email.com', '0000000000000', '0000000000', 0),
(3, '14/12/2015', 'luise@email.com', 'mother20151214223943.jpg', 'luise', 'vangal', '', '', '', '1111111111111', 'football player', 'christ', '', '0000000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mother_pregnant`
--

CREATE TABLE IF NOT EXISTS `mother_pregnant` (
  `id` int(5) NOT NULL,
  `mother_id` int(5) NOT NULL,
  `due_no` int(2) NOT NULL,
  `due_date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(3) NOT NULL,
  `cesarean` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mother_pregnant`
--

INSERT INTO `mother_pregnant` (`id`, `mother_id`, `due_no`, `due_date`, `weight`, `cesarean`) VALUES
(1, 2, 1, '31/12/2015', 70, 0),
(2, 3, 1, '30/12/2015', 90, 0),
(3, 2, 2, '04/03/2016', 95, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mother_pregnant_care`
--

CREATE TABLE IF NOT EXISTS `mother_pregnant_care` (
  `id` int(5) NOT NULL,
  `mother_id` int(5) NOT NULL,
  `pregnant_id` int(5) NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(3) NOT NULL,
  `urine` text COLLATE utf8_unicode_ci NOT NULL,
  `pressure` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `uterine` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `present` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sound` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `flex` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `term` int(3) NOT NULL,
  `physical` text COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mother_pregnant_care`
--

INSERT INTO `mother_pregnant_care` (`id`, `mother_id`, `pregnant_id`, `date`, `weight`, `urine`, `pressure`, `uterine`, `present`, `sound`, `flex`, `term`, `physical`, `diagnosis`) VALUES
(1, 2, 1, '14/12/2015', 80, '160', '160', '30', 'ไม่ทราบ', 'ปกติ', 'ดิ้น', 10, 'ok', 'ok'),
(2, 2, 1, '16/12/2015', 10, 'ok', '160', '50', 'ไม่ทราบ', 'ปกติ', 'ดิ้น', 3, 'ok', 'ok'),
(3, 2, 1, '17/12/2015', 100, 'ok', '150', '50', 'ไม่ทราบ', 'ปกติ', 'ดิ้น', 20, 'ok', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `organize`
--

CREATE TABLE IF NOT EXISTS `organize` (
  `id` int(5) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organize`
--

INSERT INTO `organize` (`id`, `category`, `name`, `address`, `province`, `zip`, `phone`) VALUES
(1, 'โรงพยาบาลของรัฐ', 'วชิระพยาบาลภูเก็ต', '', 'ภูเก็ต', '83000', '0000000000'),
(2, 'โรงพยาบาลของรัฐ', 'วชิระภูเก็ต กระทรวงการบิน', '', 'ภูเก็ต', '83000', '0000000009');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(5) NOT NULL,
  `organize_id` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `organize_id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1, 1, 'wayne', 'rooney', 'rooney@email.com', 'password', 1),
(2, 2, 'michael', 'smalling', 'mike@email.com', 'password', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_physical`
--
ALTER TABLE `child_physical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_vaccination`
--
ALTER TABLE `child_vaccination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother_pregnant`
--
ALTER TABLE `mother_pregnant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother_pregnant_care`
--
ALTER TABLE `mother_pregnant_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organize`
--
ALTER TABLE `organize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `child_physical`
--
ALTER TABLE `child_physical`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `child_vaccination`
--
ALTER TABLE `child_vaccination`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mother_pregnant`
--
ALTER TABLE `mother_pregnant`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mother_pregnant_care`
--
ALTER TABLE `mother_pregnant_care`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organize`
--
ALTER TABLE `organize`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
