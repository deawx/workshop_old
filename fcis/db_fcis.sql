-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2017 at 02:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
  `image_size_str` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_date` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets_patients`
--

CREATE TABLE `assets_patients` (
  `id` int(11) NOT NULL,
  `assets_id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `assets_from` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `fap` text COLLATE utf8_unicode_ci NOT NULL,
  `hnpcc` text COLLATE utf8_unicode_ci NOT NULL,
  `pjsjps` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `apc_exon` int(3) NOT NULL,
  `apc_intron` int(3) NOT NULL,
  `apc_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apc_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apc_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apc_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_exon` int(3) NOT NULL,
  `mutyh_intron` int(3) NOT NULL,
  `mutyh_codon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_amino_acid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_type_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mutyh_effect_mutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `negative` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `msi_h` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_l` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_s` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `msi_methylation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ihc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `labs` (`id`, `patient_id`, `endoscope`, `apc_exon`, `apc_intron`, `apc_codon`, `apc_amino_acid`, `apc_type_mutation`, `apc_effect_mutation`, `mutyh_exon`, `mutyh_intron`, `mutyh_codon`, `mutyh_amino_acid`, `mutyh_type_mutation`, `mutyh_effect_mutation`, `negative`, `msi_h`, `msi_l`, `msi_s`, `msi_methylation`, `ihc`, `gene`, `germline`, `germline_exon`, `germline_intron`, `germline_codon`, `germline_amino_acid`, `germline_type_mutation`, `germline_effect_mutation`, `somatic`, `somatic_exon`, `somatic_intron`, `somatic_codon`, `somatic_amino_acid`, `somatic_type_mutation`, `somatic_effect_mutation`, `stk11_exon`, `stk11_intron`, `stk11_codon`, `stk11_amino_acid`, `stk11_type_mutation`, `stk11_effect_mutation`) VALUES
(2, 1, 'normal', 1, 2, 'test', 'test', 'test', 'test', 3, 2, 'test', 'test', 'test', 'test', 'negative', 'BAT25', 'BAT26', '', '', '', '', '', 0, 0, '', '', '', '', '', 0, 0, '', '', '', '', 4, 3, 'test', 'test', 'insertion-large (>1exon)', 'silence'),
(5, 6, 'none', 4, 5, '123', '123', '123', '123', 5, 4, '123', '123', '123', '123', 'none', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '');

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
  `user_id` int(11) NOT NULL,
  `types` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `times` int(6) NOT NULL,
  `groups` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `history` text COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `updated` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `types`, `times`, `groups`, `hn`, `id_card`, `title`, `firstname`, `lastname`, `age`, `address`, `telephone`, `mobile`, `history`, `created`, `updated`) VALUES
(1, 0, 'กลุ่ม CRC of PSU', 0, 'HNPCC', '', '1000000000000', 'นาย', 'first1', 'last1', 0, '', '', '', '', '0', '1497270803'),
(2, 0, 'คนไข้ออกหน่วย', 0, 'FAP', '', '2000000000000', 'นาย', 'first2', 'last2', 0, '', '', '', '', '0', '1497233271'),
(3, 0, 'กลุ่ม CRC of PSU', 0, 'HNPCC', '', '3000000000000', 'นาง', 'first3', 'last3', 0, '', '', '', '', '0', '1497754880'),
(4, 0, 'คนไข้ CRC ส่งต่อ', 0, 'FAP', '', '4000000000000', 'นาง', 'first4', 'last4', 0, '', '', '', '', '0', '1497630670'),
(5, 0, 'คนไข้ CRC ส่งต่อ', 0, 'PJS/JPS', '', '5000000000000', 'นางสาว', 'first5', 'last5', 0, '', '', '', '', '0', '1497271056'),
(6, 0, '', 0, '', '', '1231231231231', 'นาง', 'test1', 'test', 0, '', '', '', '', '0', '1497165573'),
(7, 0, '', 0, '', '', '1212121212121', 'นาย', 'ะำหะ', 'ะำหะ', 0, '', '', '', '', '0', '1497184832'),
(8, 0, '', 0, '', '', '1212121212120', 'นาย', 'test1', 'test1', 0, '', '', '', '', '0', '1497185784'),
(9, 0, 'กลุ่ม CRC of PSU', 0, 'HNPCC', '', '1000000000000', 'นาย', 'first1', 'last1', 0, '', '', '', '', '0', '1497270803'),
(10, 0, 'คนไข้ออกหน่วย', 0, 'FAP', '', '2000000000000', 'นาย', 'first2', 'last2', 0, '', '', '', '', '0', '1497233271'),
(11, 0, 'กลุ่ม CRC of PSU', 0, 'HNPCC', '', '3000000000000', 'นาง', 'first3', 'last3', 0, '', '', '', '', '0', '1497754880'),
(12, 0, 'คนไข้ CRC ส่งต่อ', 0, 'FAP', '', '4000000000000', 'นาง', 'first4', 'last4', 0, '', '', '', '', '0', '1497630670'),
(13, 0, 'คนไข้ CRC ส่งต่อ', 0, 'PJS/JPS', '', '5000000000000', 'นางสาว', 'first5', 'last5', 0, '', '', '', '', '0', '1497271056'),
(14, 0, '', 0, '', '', '1231231231231', 'นาง', 'test1', 'test', 0, '', '', '', '', '0', '1497165573'),
(15, 0, '', 0, '', '', '1212121212121', 'นาย', 'ะำหะ', 'ะำหะ', 0, '', '', '', '', '0', '1497184832'),
(16, 0, '', 0, '', '', '1212121212120', 'นาย', 'test1', 'test1', 0, '', '', '', '', '0', '1497185784');

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
  `blood_ml` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `blood_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fresh_tissue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fresh_tissue_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ffpe_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fcc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ihc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, '::1', 'special', '$2y$08$6PwzsRJmKgjTWuabxlyDCuQf.IvqLbkFNUBz57h.oncNIo1cIAaF.', NULL, 'special@email.com', NULL, NULL, NULL, 'Rq2em73n.znxBR8nb2.jse', 1496754920, 1500899178, 1, 'Cristiano', 'Ronaldo', 'SPECIAL', '0000000000'),
(2, '::1', 'admin', '$2y$08$uHhUqYzF9fSYhCRQBP8gRu8t0xGsD.JyP8fot8uFrzb8ddVU21xLG', NULL, 'admin@email.com', '8c56e53216f8e5288687c98a0f2aa8657dff6445', NULL, NULL, 'OcrjhG6DOUwD6dvHT1hfbe', 1496756561, 1500880563, 1, 'Zinedine', 'Zedane', 'ADMIN', '0000000000'),
(3, '::1', 'editor', '$2y$08$LVvHxFHDq9CmPzET1qzFfuPsoV7ZGwEOFvoWrTcPHPi7lDwo82yoK', NULL, 'editor@email.com', 'c959066d4bd6854f4602860b9fcdf7b3ae867f90', NULL, NULL, NULL, 1496756963, 1496756963, 1, 'Mario', 'Balotelli', 'EDITOR', '2222222222'),
(4, '::1', 'member', '$2y$08$BodKuh8mpB8w0XQS1aDMGeIxBbNXL62.XOPTJ8/QV1a1VBtczLEcC', NULL, 'member@email.com', NULL, NULL, NULL, NULL, 1496755255, 1496755255, 1, 'Lionel', 'Messi', 'MEMBER', '1111111111');

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
(8, 13, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assets_patients`
--
ALTER TABLE `assets_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
