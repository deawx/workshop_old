-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 11:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_key` int(11) NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `type`, `primary_key`, `mime`, `extension`, `size`, `description`, `path`, `user_id`, `created`, `modified`) VALUES
(1, 'post', 0, 'image/jpeg', '.jpg', '190.48', '10', 'assets/uploads/10.jpg', 1, '2015-12-24 23:43:29', '2015-12-24 23:43:29'),
(2, 'post', 0, 'image/jpeg', '.jpg', '305.92', '6', 'assets/uploads/6.jpg', 1, '2015-12-24 23:48:00', '2015-12-24 23:48:00'),
(3, 'post', 0, 'image/jpeg', '.jpg', '340.45', '9', 'assets/uploads/9.jpg', 1, '2015-12-24 23:48:29', '2015-12-24 23:48:29'),
(4, 'post', 0, 'image/jpeg', '.jpg', '190.48', '10', 'assets/uploads/10.jpg', 1, '2015-12-24 23:48:45', '2015-12-24 23:48:45'),
(5, 'post', 0, 'image/jpeg', '.jpg', '467.65', 'hero', 'assets/uploads/hero.jpg', 1, '2015-12-24 23:49:10', '2015-12-24 23:49:10'),
(6, 'post', 0, 'image/jpeg', '.jpg', '552.86', 'blur', 'assets/uploads/blur.jpg', 1, '2015-12-24 23:49:42', '2015-12-24 23:49:42'),
(7, 'post', 0, 'image/jpeg', '.jpg', '305.92', '6', 'assets/uploads/6.jpg', 1, '2015-12-24 23:55:13', '2015-12-24 23:55:13'),
(8, 'post', 0, 'image/jpeg', '.jpg', '186.94', '8', 'assets/uploads/8.jpg', 1, '2015-12-24 23:57:38', '2015-12-24 23:57:38'),
(9, 'post', 0, 'image/jpeg', '.jpg', '552.86', 'blur', 'assets/uploads/blur.jpg', 1, '2015-12-24 23:57:50', '2015-12-24 23:57:50'),
(10, 'post', 0, 'image/jpeg', '.jpg', '186.94', '8', 'assets/uploads/8.jpg', 1, '2015-12-24 23:57:56', '2015-12-24 23:57:56'),
(11, 'post', 0, 'image/jpeg', '.jpg', '190.48', '10', 'assets/uploads/10.jpg', 1, '2015-12-24 23:58:33', '2015-12-24 23:58:33'),
(12, 'post', 0, 'image/jpeg', '.jpg', '340.45', '9', 'assets/uploads/9.jpg', 1, '2015-12-24 23:58:58', '2015-12-24 23:58:58'),
(13, 'post', 0, 'image/jpeg', '.jpg', '305.92', '6', 'assets/uploads/6.jpg', 1, '2015-12-25 00:00:54', '2015-12-25 00:00:54'),
(14, 'post', 0, 'image/jpeg', '.jpg', '209.27', '7', 'assets/uploads/7.jpg', 1, '2015-12-25 00:02:24', '2015-12-25 00:02:24'),
(15, 'post', 0, 'image/jpeg', '.jpg', '209.27', '7', 'assets/uploads/7.jpg', 9, '2015-12-26 02:35:57', '2015-12-26 02:35:57'),
(16, 'post', 0, 'image/jpeg', '.jpg', '268.98', '5', 'assets/uploads/5.jpg', 9, '2015-12-26 02:37:39', '2015-12-26 02:37:39'),
(17, 'post', 0, 'image/jpeg', '.jpg', '238.62', '3', 'assets/uploads/3.jpg', 9, '2015-12-26 02:40:10', '2015-12-26 02:40:10'),
(18, 'post', 0, 'image/jpeg', '.jpg', '161.11', 'leaf', 'assets/uploads/leaf.jpg', 1, '2015-12-27 01:31:27', '2015-12-27 01:31:27'),
(19, 'post', 0, 'image/png', '.png', '0.96', 'header_bg', 'assets/uploads/header_bg.png', 1, '2015-12-27 01:31:59', '2015-12-27 01:31:59'),
(20, 'post', 0, 'image/jpeg', '.jpg', '32.27', 'bridge', 'assets/uploads/bridge.jpg', 1, '2015-12-27 01:32:12', '2015-12-27 01:32:12'),
(21, 'post', 0, 'image/jpeg', '.jpg', '6.39', '15622732_1588848051130394_6871756972549668206_n', 'assets/uploads/15622732_1588848051130394_6871756972549668206_n.jpg', 1, '2017-05-25 06:22:31', '2017-05-25 06:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `assets_posts`
--

CREATE TABLE `assets_posts` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Web Programming', 'web-programming', 1),
(2, 'Web Design', 'web-design', 1),
(3, 'Network  & Security', 'network-security', 1),
(4, 'Search Engine Optimation (SEO)', 'search-engine-optimation-seo', 1),
(5, 'Tutorial Web', 'tutorial-web', 0);

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
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `errstr` text COLLATE utf8_unicode_ci NOT NULL,
  `errfile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `position` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `status`, `position`, `type`) VALUES
(12, 'Home', 'home', 0, 1, 12, NULL),
(13, 'About', 'read/about-us', 0, 1, 13, NULL),
(14, 'Blog', 'posts', 0, 1, 14, NULL),
(15, 'Sign In', 'signin', 0, 1, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE `methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `methods_groups`
--

CREATE TABLE `methods_groups` (
  `id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL DEFAULT '0',
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `allow_access` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `published_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `type`, `featured_image`, `status`, `published_at`, `user_id`, `created`, `modified`) VALUES
(1, 'Justice Department Sets Sights on Wall Street Executives', 'justice-department-sets-sights-on-wall-street-executives', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. <br></p><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. <br></p><br><br><br>', 'post', 'assets/uploads/blur.jpg', 0, '2015-12-30', 1, '2015-12-25 01:29:57', '2017-05-24 09:02:30'),
(2, 'Uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla ', 'uis-aute-irure-dolor-in-reprehenderit-in-voluptate-velit-esse-cillum-dolore-eu-fugiat-nulla', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. <br></p><br><img src=\"/product/ci-blog/assets/uploads/8.jpg\" height=\"388\" width=\"749\"><br><br><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. <br></p><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p><br>', 'post', 'assets/uploads/blur.jpg', 1, '2015-12-17', 1, '2015-12-25 02:11:57', '2015-12-26 02:22:06'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br><img src=\"/product/ci-blog/assets/uploads/3.jpg\" height=\"512\" width=\"805\"><br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br>', 'post', 'assets/uploads/3.jpg', 1, '2015-12-26', 9, '2015-12-26 02:42:38', '2015-12-26 16:37:03'),
(6, 'About Us', 'about-us', '<img src=\"/product/ci-blog/assets/uploads/3.jpg\"><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue.<br><br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. <br><br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis. Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi. Praesent sodales velit quis augue. <br><br>', 'page', 'assets/uploads/7.jpg', 1, '2015-12-26', 1, '2015-12-26 19:08:39', '2017-05-23 09:26:00'),
(7, 'ฟลคโปรเจกเตอรฟอยล-นายแบบคอนเซปตมฟฟนบม-อลมอนดเดอะนพมาศ', 'ฟลคโปรเจกเตอรฟอยล-นายแบบคอนเซปตมฟฟนบม-อลมอนดเดอะนพมาศ', '<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">วัจนะ ดีเจ โรลออนแช่แข็งเป่ายิงฉุบ แคมปัสเซ็นทรัลเวิร์คจูน สหรัฐหมวยสเปกพันธกิจนิวส์ คอร์รัปชันครูเสดคาแรคเตอร์เบอร์เกอร์ผิดพลาด ไงดีพาร์ตเมนท์โฟนเอาต์ครัวซอง อุปนายกโฟนช็อปปิ้งมัฟฟิน สต๊อกโปรเจ็กเตอร์เซลส์แมน น็อกดราม่าสหรัฐมัฟฟินแฮนด์ แซลมอน เวิร์กช็อปซ้อวาซาบิเกมส์ เซ็กซ์วัคค์เอ็นทรานซ์เพนกวินนิวส์ สจ๊วต แซวอาว์ตู้เซฟอิเลียดออร์เดอร์ โปรเจกเตอร์</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">ฟลุคโปรเจ็กเตอร์ฟอยล์ นายแบบคอนเซปต์มัฟฟินบึ้ม อัลมอนด์เดอะนพมาศ เหมยคาแร็คเตอร์เคอร์ฟิวทรู โหลยโท่ยเวณิกาครูเสดโอเลี้ยง รอยัลตี้ ภควัมบดีแพ็คเยอบีรา ลีเมอร์เซ็นเตอร์ช็อปปิ้งริคเตอร์ ล็อบบี้ ไดเอ็ตฮิปโปโก๊ะนายแบบสเปค ไวอากร้าซิ่งโครนาไลท์ บอกซ์วอลนัทไง กัมมันตะผิดพลาดวีซ่า ช็อปปิ้งบัสไดเอ็ต พะเรอ เบอร์เกอร์ศิลปากร</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">เกจิมอบตัวตนเอง ฟลอร์แป๋วไบเบิลออร์เดอร์ วิดีโอวัจนะ ชินบัญชรคอนแทคกษัตริยาธิราชสเตย์มวลชน เจี๊ยวสเปกเฟรมสี่แยกเวิร์ลด์ สแควร์ สกรัมสถาปัตย์ปักขคณนาบรรพชน แฮมเบอร์เกอร์ ติวอพาร์ทเมนต์บุญคุณ น้องใหม่ อีแต๋นซิตี้วันเวย์สไปเดอร์ เทรดสแตนดาร์ด เลสเบี้ยน สมิติเวชเอ๋ แฟนตาซีพุทโธสปายแพนด้าคอร์รัปชัน สมาพันธ์แผดเผาไวอากร้าอพาร์ทเมนท์โนติส</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">ธุหร่ำสวีทฮิปฮอปฮ็อตด็อก วันเวย์มาราธอนเซ่นไหว้ มอลล์รัม ซูชิ สตรอว์เบอร์รีชิฟฟอนรุสโซ อินเตอร์ทรูดีพาร์ทเมนท์ สติ๊กเกอร์คาแรคเตอร์ แคนยอนไลท์แอดมิสชันไอซียู เซาท์ไบเบิลดยุคทอร์นาโดจิตพิสัย เทียมทานพุทโธโคโยตีมินต์สต็อก ภควัมปติ เกสต์เฮาส์คอลเล็กชั่นลอจิสติกส์ คูลเลอร์มวลชน ดีพาร์ตเมนท์จตุคามกรีนสะบึมซะ มาร์จินแพนดาพุทธภูมิเอ็กซ์เพรสเมจิก แทกติคเอเซียสแตนดาร์ดรุมบ้าบัส</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">เคสไฮไลท์ โยเกิร์ตเธค รายชื่อทอร์นาโดคอร์ปฮาร์ด วาทกรรมทอร์นาโด โรแมนติคจ๊าบเฮียวอเตอร์ ไหร่สติกเกอร์เทรนด์เอเซีย โฮลวีตไลน์เซลส์แมนเพียว ไงสงบสุข เบลอพะเรอ วอล์คเทคโนแครต ฟินิกซ์คอลัมนิสต์สลัมแดนเซอร์คอลัมน์ คอลเล็กชั่นแอ๊บแบ๊วพันธุวิศวกรรม รายชื่อแทงกั๊กหลินจือรามเทพ มือถือบุญคุณป่าไม้ยาวี ซิตีงั้นชะโนดหลวงพี่อัตลักษณ์ คาปูชิโนคีตกวีลอจิสติกส์</p>', 'post', '', 1, '2017-05-25', 1, '2017-05-25 07:09:17', '2017-05-25 07:09:17'),
(8, 'วัจนะ ดีเจ โรลออนแช่แข็งเป่ายิงฉุบ แคมปัสเซ็นทรัลเวิร์คจูน สหรัฐหมวยสเปกพันธกิจนิวส์ คอร์รัปชันครูเสดคาแรคเตอร์เบอร์เกอร์ผิดพลาด ไงดีพาร์ตเมนท์โฟนเอาต์ครัวซอง อุปนายกโฟนช็อปปิ้งมัฟฟิน สต๊อกโปรเจ็กเตอร์เซลส์แมน น็อกดราม่าสหรัฐมัฟฟินแฮนด์ แซลมอน เวิร์กช็อปซ', 'วจนะ-ดเจ-โรลออนแชแขงเปายงฉบ-แคมปสเซนทรลเวรคจน-สหรฐหมวยสเปกพนธกจนวส-คอรรปชนครเสดคาแรคเตอรเบอรเกอรผดพลาด-ไงดพารตเมนทโฟนเอาตครวซอง-อปนายกโฟนชอปปงมฟฟน-สตอกโปรเจกเตอรเซลสแมน-นอกดรามาสหรฐมฟฟนแฮนด-แซลมอน-เวรกชอปซ', '<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">วัจนะ ดีเจ โรลออนแช่แข็งเป่ายิงฉุบ แคมปัสเซ็นทรัลเวิร์คจูน สหรัฐหมวยสเปกพันธกิจนิวส์ คอร์รัปชันครูเสดคาแรคเตอร์เบอร์เกอร์ผิดพลาด ไงดีพาร์ตเมนท์โฟนเอาต์ครัวซอง อุปนายกโฟนช็อปปิ้งมัฟฟิน สต๊อกโปรเจ็กเตอร์เซลส์แมน น็อกดราม่าสหรัฐมัฟฟินแฮนด์ แซลมอน เวิร์กช็อปซ้อวาซาบิเกมส์ เซ็กซ์วัคค์เอ็นทรานซ์เพนกวินนิวส์ สจ๊วต แซวอาว์ตู้เซฟอิเลียดออร์เดอร์ โปรเจกเตอร์</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">ฟลุคโปรเจ็กเตอร์ฟอยล์ นายแบบคอนเซปต์มัฟฟินบึ้ม อัลมอนด์เดอะนพมาศ เหมยคาแร็คเตอร์เคอร์ฟิวทรู โหลยโท่ยเวณิกาครูเสดโอเลี้ยง รอยัลตี้ ภควัมบดีแพ็คเยอบีรา ลีเมอร์เซ็นเตอร์ช็อปปิ้งริคเตอร์ ล็อบบี้ ไดเอ็ตฮิปโปโก๊ะนายแบบสเปค ไวอากร้าซิ่งโครนาไลท์ บอกซ์วอลนัทไง กัมมันตะผิดพลาดวีซ่า ช็อปปิ้งบัสไดเอ็ต พะเรอ เบอร์เกอร์ศิลปากร</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">เกจิมอบตัวตนเอง ฟลอร์แป๋วไบเบิลออร์เดอร์ วิดีโอวัจนะ ชินบัญชรคอนแทคกษัตริยาธิราชสเตย์มวลชน เจี๊ยวสเปกเฟรมสี่แยกเวิร์ลด์ สแควร์ สกรัมสถาปัตย์ปักขคณนาบรรพชน แฮมเบอร์เกอร์ ติวอพาร์ทเมนต์บุญคุณ น้องใหม่ อีแต๋นซิตี้วันเวย์สไปเดอร์ เทรดสแตนดาร์ด เลสเบี้ยน สมิติเวชเอ๋ แฟนตาซีพุทโธสปายแพนด้าคอร์รัปชัน สมาพันธ์แผดเผาไวอากร้าอพาร์ทเมนท์โนติส</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">ธุหร่ำสวีทฮิปฮอปฮ็อตด็อก วันเวย์มาราธอนเซ่นไหว้ มอลล์รัม ซูชิ สตรอว์เบอร์รีชิฟฟอนรุสโซ อินเตอร์ทรูดีพาร์ทเมนท์ สติ๊กเกอร์คาแรคเตอร์ แคนยอนไลท์แอดมิสชันไอซียู เซาท์ไบเบิลดยุคทอร์นาโดจิตพิสัย เทียมทานพุทโธโคโยตีมินต์สต็อก ภควัมปติ เกสต์เฮาส์คอลเล็กชั่นลอจิสติกส์ คูลเลอร์มวลชน ดีพาร์ตเมนท์จตุคามกรีนสะบึมซะ มาร์จินแพนดาพุทธภูมิเอ็กซ์เพรสเมจิก แทกติคเอเซียสแตนดาร์ดรุมบ้าบัส</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">เคสไฮไลท์ โยเกิร์ตเธค รายชื่อทอร์นาโดคอร์ปฮาร์ด วาทกรรมทอร์นาโด โรแมนติคจ๊าบเฮียวอเตอร์ ไหร่สติกเกอร์เทรนด์เอเซีย โฮลวีตไลน์เซลส์แมนเพียว ไงสงบสุข เบลอพะเรอ วอล์คเทคโนแครต ฟินิกซ์คอลัมนิสต์สลัมแดนเซอร์คอลัมน์ คอลเล็กชั่นแอ๊บแบ๊วพันธุวิศวกรรม รายชื่อแทงกั๊กหลินจือรามเทพ มือถือบุญคุณป่าไม้ยาวี ซิตีงั้นชะโนดหลวงพี่อัตลักษณ์ คาปูชิโนคีตกวีลอจิสติกส์</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">วัจนะ ดีเจ โรลออนแช่แข็งเป่ายิงฉุบ แคมปัสเซ็นทรัลเวิร์คจูน สหรัฐหมวยสเปกพันธกิจนิวส์ คอร์รัปชันครูเสดคาแรคเตอร์เบอร์เกอร์ผิดพลาด ไงดีพาร์ตเมนท์โฟนเอาต์ครัวซอง อุปนายกโฟนช็อปปิ้งมัฟฟิน สต๊อกโปรเจ็กเตอร์เซลส์แมน น็อกดราม่าสหรัฐมัฟฟินแฮนด์ แซลมอน เวิร์กช็อปซ้อวาซาบิเกมส์ เซ็กซ์วัคค์เอ็นทรานซ์เพนกวินนิวส์ สจ๊วต แซวอาว์ตู้เซฟอิเลียดออร์เดอร์ โปรเจกเตอร์</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">ฟลุคโปรเจ็กเตอร์ฟอยล์ นายแบบคอนเซปต์มัฟฟินบึ้ม อัลมอนด์เดอะนพมาศ เหมยคาแร็คเตอร์เคอร์ฟิวทรู โหลยโท่ยเวณิกาครูเสดโอเลี้ยง รอยัลตี้ ภควัมบดีแพ็คเยอบีรา ลีเมอร์เซ็นเตอร์ช็อปปิ้งริคเตอร์ ล็อบบี้ ไดเอ็ตฮิปโปโก๊ะนายแบบสเปค ไวอากร้าซิ่งโครนาไลท์ บอกซ์วอลนัทไง กัมมันตะผิดพลาดวีซ่า ช็อปปิ้งบัสไดเอ็ต พะเรอ เบอร์เกอร์ศิลปากร</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">เกจิมอบตัวตนเอง ฟลอร์แป๋วไบเบิลออร์เดอร์ วิดีโอวัจนะ ชินบัญชรคอนแทคกษัตริยาธิราชสเตย์มวลชน เจี๊ยวสเปกเฟรมสี่แยกเวิร์ลด์ สแควร์ สกรัมสถาปัตย์ปักขคณนาบรรพชน แฮมเบอร์เกอร์ ติวอพาร์ทเมนต์บุญคุณ น้องใหม่ อีแต๋นซิตี้วันเวย์สไปเดอร์ เทรดสแตนดาร์ด เลสเบี้ยน สมิติเวชเอ๋ แฟนตาซีพุทโธสปายแพนด้าคอร์รัปชัน สมาพันธ์แผดเผาไวอากร้าอพาร์ทเมนท์โนติส</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">ธุหร่ำสวีทฮิปฮอปฮ็อตด็อก วันเวย์มาราธอนเซ่นไหว้ มอลล์รัม ซูชิ สตรอว์เบอร์รีชิฟฟอนรุสโซ อินเตอร์ทรูดีพาร์ทเมนท์ สติ๊กเกอร์คาแรคเตอร์ แคนยอนไลท์แอดมิสชันไอซียู เซาท์ไบเบิลดยุคทอร์นาโดจิตพิสัย เทียมทานพุทโธโคโยตีมินต์สต็อก ภควัมปติ เกสต์เฮาส์คอลเล็กชั่นลอจิสติกส์ คูลเลอร์มวลชน ดีพาร์ตเมนท์จตุคามกรีนสะบึมซะ มาร์จินแพนดาพุทธภูมิเอ็กซ์เพรสเมจิก แทกติคเอเซียสแตนดาร์ดรุมบ้าบัส</p><p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 12.6px; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline;\">เคสไฮไลท์ โยเกิร์ตเธค รายชื่อทอร์นาโดคอร์ปฮาร์ด วาทกรรมทอร์นาโด โรแมนติคจ๊าบเฮียวอเตอร์ ไหร่สติกเกอร์เทรนด์เอเซีย โฮลวีตไลน์เซลส์แมนเพียว ไงสงบสุข เบลอพะเรอ วอล์คเทคโนแครต ฟินิกซ์คอลัมนิสต์สลัมแดนเซอร์คอลัมน์ คอลเล็กชั่นแอ๊บแบ๊วพันธุวิศวกรรม รายชื่อแทงกั๊กหลินจือรามเทพ มือถือบุญคุณป่าไม้ยาวี ซิตีงั้นชะโนดหลวงพี่อัตลักษณ์ คาปูชิโนคีตกวีลอจิสติกส์</p>', 'post', '', 1, '2017-05-25', 1, '2017-05-25 09:58:54', '2017-05-25 09:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts_categories`
--

INSERT INTO `posts_categories` (`id`, `post_id`, `category_id`) VALUES
(5, 1, 5),
(6, 1, 4),
(7, 2, 3),
(10, 3, 1),
(15, 3, 3),
(16, 3, 5),
(17, 7, 2),
(18, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`) VALUES
(5, 3, 1),
(6, 3, 6),
(7, 3, 7),
(8, 1, 7),
(9, 1, 5),
(10, 7, 1),
(11, 8, 7);

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
(1, 'email_contact', 'admin@email.com', 'Email kontak form'),
(2, 'image_max_size', '2000', 'Ukuran image dalam kb (kilo byte)'),
(3, 'file_max_size', '3000', 'Ukuran file maksimal dalam kb (kilobyte)'),
(4, 'file_type', 'doc|zip|pdf|xlsx|xls|ppt|docx|pptx', 'Tipe file yang di ijinkan untk di upload'),
(5, 'image_type', 'jpeg|jpg|png', 'Tipe image yang diperbolehkan untuk di upload'),
(6, 'pagination_limit', '10', 'Batas list /record (artikel, file, dll) per halaman'),
(7, 'main_office', 'Company Address', ''),
(8, 'site_title', 'CI-Blog', ''),
(9, 'language', 'thai', ''),
(11, 'pagination_limit_directory', '50', '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`) VALUES
(1, 'CodeIgniter', 'codeigniter', 1),
(2, 'Responsive', 'responsive', 1),
(3, 'basic cms', 'basic-cms', 1),
(4, 'tag baru', 'tag-baru', 1),
(5, 'Simple CMS', 'simple-cms', 1),
(6, 'Security Tips', 'security-tips', 1),
(7, 'Hack & DDOS', 'hack-ddos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1495686075, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(9, '127.0.0.1', 'members', '$2y$08$0TTfatwN6dXgJzX6RpYBzeRIrVsTEUs8ao7ldGewEyCywq4VoMXC.', NULL, 'members@website.com', '6d73486c9d4f501a24c7d9c9bfa3b47d68c471c0', NULL, NULL, NULL, 1451071829, 1451071890, 1, 'My', 'Member', '', '');

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
(9, 1, 1),
(10, 1, 2),
(13, 9, 2);

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
-- Indexes for table `assets_posts`
--
ALTER TABLE `assets_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_assets_posts_posts1` (`post_id`),
  ADD KEY `fk_assets_posts_assets1` (`asset_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`,`ip_address`,`user_agent`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `methods_groups`
--
ALTER TABLE `methods_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_methods_groups_groups1` (`group_id`),
  ADD KEY `fk_methods_groups_methods1` (`method_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_categories_categories1` (`category_id`),
  ADD KEY `fk_posts_categories_posts1` (`post_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_tags_tags1` (`tag_id`),
  ADD KEY `fk_posts_tags_posts1` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `assets_posts`
--
ALTER TABLE `assets_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `methods_groups`
--
ALTER TABLE `methods_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts_categories`
--
ALTER TABLE `posts_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets_posts`
--
ALTER TABLE `assets_posts`
  ADD CONSTRAINT `fk_assets_posts_assets1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assets_posts_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `methods_groups`
--
ALTER TABLE `methods_groups`
  ADD CONSTRAINT `fk_methods_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_methods_groups_methods1` FOREIGN KEY (`method_id`) REFERENCES `methods` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD CONSTRAINT `fk_posts_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posts_categories_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `fk_posts_tags_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posts_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
