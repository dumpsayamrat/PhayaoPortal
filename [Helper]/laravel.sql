-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2015 at 10:54 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '1234', '2015-04-11 12:23:16', '2015-04-11 12:23:16'),
(2, 'dumpz', '$2y$10$WxArbhthHaMihTT94nrC8Opy8Zi.rNhhWpz2EjR9shENahxbf28pS', '2015-04-11 22:47:43', '2015-04-11 22:47:43'),
(3, 'dumpz', '$2y$10$H78n.eqV8z.DQrPb7YrzIeg3qMXI8aLOAP/eBxiHQwdFApbAUcIC2', '2015-04-11 22:47:44', '2015-04-11 22:47:44'),
(7, 'admin', '$2y$10$37/zGwDYtl6S26MjT1g1FOdCa5QWqAJQdlWftdhr609P/gpsxeKIi', '2015-06-05 04:13:33', '2015-06-05 04:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descript` text COLLATE utf8_unicode_ci NOT NULL,
  `where` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `repeat` tinyint(1) NOT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `descript`, `where`, `contact`, `start`, `finish`, `img`, `type`, `repeat`, `day`) VALUES
(3, 'ประเพณีเวียนเทียนกลางน้ำ', 'จังหวัดพะเยาจัดกิจกรรมเวียนเทียนกลางน้ำหนึ่งเดียวในโลกที่กว๊านพะเยา1ปีมีเพียง3ครั้งเฉพาะวันสำคัญทางพระพุทธศาสนาคือวันมาฆบูชาวันวิสาขบูชาและวันอาสาฬหบูชา', 'กว๊านพะเยา', 'ททท.สำนักงานเชียงราย โทร. 053-717433, 053-744674-5 .', '2015-07-01 06:55:00', '2015-08-20 20:10:00', 'vmr9zps5ptvfxtw25n5o0qdmltf71trnel.jpg', 2, 1, 'วันศุกร์'),
(4, 'งานเทศกาลลิ้นจี่และของดีเมืองพะเยา', 'ในงานจะได้ชมขบวนแห่ลิ้นจี่ โดยเป็นขบวนรถตกแต่งด้วยลิ้นจี่และของดีจากอำเภอต่าง ๆ การประกวดธิดาลิ้นจี่ การประกวดผลผลิตลิ้นจี่ การประกอบอาหารคาวหวานจากลิ้นจี่ การจัดกระเช้าลิ้นจี่ นิทรรศการการเกษตร การจำหน่ายผลผลิตลิ้นจี่ของเกษตรกรชาวสวนลิ้นจี่กว่า 100 ราย...', 'บริเวณสนามข้างสถานีขนส่งผู้โดยสารจังหวัดพะเยา', 'ททท.สำนักงานเชียงราย โทร. 053-717433, 053-744674-5 .', '2015-07-06 20:10:00', '2015-07-30 20:10:00', 'ubqmhtt92e6okefdkg0ghlwem5eliddmtc.jpg', 2, 0, NULL),
(5, 'ดาวรุ่งลูกทุ่ง ม.พะเยา', 'กองกิจการนิสิต จัดการประกวด “ดาวรุ่งลูกทุ่ง ม.พะเยา” ครั้งที่ 4 “สืบสานลูกทุ่งไทยถวายพระพรชัย ทรงพระเจริญ”...', 'มหาวิทยาลัยพะเยา', 'มหาวิทยาลัยพะเยา โทร. 054-466-666', '2015-07-08 20:09:00', '2015-07-10 20:10:00', 'mkzdvk42oerzibbqywarbmfv9yilwipioa.jpg', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gov`
--

CREATE TABLE IF NOT EXISTS `gov` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ministry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `where` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gov`
--

INSERT INTO `gov` (`id`, `name`, `ministry`, `where`, `contact`, `link`, `frequency`, `created_at`, `updated_at`) VALUES
(2, 'หน่วยงาน ทดสอบ1', 'กระทรวง ทดสอบ', 'ที่ไหน ทดสอบ', 'ติดต่อ ทดสอบ', 'จุดเชื่อมโยง ทดสอบ1111', 3, '2015-06-25 08:39:45', '2015-07-12 16:55:36'),
(3, 'หน่วยงาน ทดสอบ 2', 'กระทรวง ทดสอบ', 'หน่วยงาน ทดสอบ 2', 'หน่วยงาน ทดสอบ 2', 'หน่วยงาน ทดสอบ 2', 0, '2015-07-10 20:06:20', '2015-07-10 20:06:20'),
(4, 'หน่วยงาน ทดสอบ 3', 'กระทรวง ทดสอบ 2 2', 'หน่วยงาน ทดสอบ 2สถาน', 'หน่วยงาน ทดสอบ 2ติดต่อ', 'หน่วยงาน ทดสอบ 2เชื่อม', 0, '2015-07-10 20:06:48', '2015-07-10 20:06:48'),
(5, 'หน่วยงาน ทดสอบ 4', 'กระทรวง ทดสอบ 33', 'หน่วยงาน ทดสอบ 4สถาน', 'หน่วยงาน ทดสอบ 4ติดต่อ', 'หน่วยงาน ทดสอบ 4เชื่อม', 0, '2015-07-10 20:13:12', '2015-07-10 20:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descript` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_categories_id` int(10) unsigned NOT NULL,
  `frequency` int(255) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gov_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `link`, `descript`, `img`, `middle_categories_id`, `frequency`, `created_at`, `updated_at`, `gov_id`) VALUES
(3, 'ติดต่อมหาวิทยาลัยพะเยา', 'http://up.ac.th', 'เว็บสำหรับติดต่อมหาวิทยาลัยพะเยา', 'qwhqnxcabpxjizqtj6diywazroart2ym6w.png', 1, 0, '2015-06-25 07:55:50', '2015-06-25 01:00:41', NULL),
(5, 'มหาวิทยาลัยพะเยา', 'http://up.ac.th/V7/', 'เว็บไซค์หลักของมหาวิทยาลัยพะเยา', 'jydobojfigekiqmvfnvlpqpjcbkfbvrtax.png', 4, 3, '2015-06-25 07:49:38', '2015-07-13 08:22:59', NULL),
(6, 'เกี่ยวกับมหาวิทยาลัยพะเยา', 'http://up.ac.th/V7/About%20university.aspx', 'ข้อมุลทั่วไปของมหาวิทยาลัยพะเยา1', 'psyu2rhy1oodsunkgeuk0lhqfr9ja3tl0z.png', 4, 0, '2015-06-25 07:49:38', '2015-06-25 01:07:54', NULL),
(7, 'หลักสูตรการศึกษา ', 'http://up.ac.th/V7/up_course.aspx', 'หลักสูตรที่เปิดสอน', 'r2nkceeclk4hhyb3zqri2sqnqqc9x9eeyp.png', 4, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(8, 'วิทยาเขตเชียงราย', 'http://www.crc.up.ac.th/', 'มหาวิทยาลัยพะเยาวิทยาเขตเชียงราย', 'k4po4tsentx6gvba9stlnxnjxbcik2ryko.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(9, 'วิทยาลัยการศึกษา', 'http://www.cce.up.ac.th/', 'เว็บไซค์ วิทยาลัยการศึกษา', 'ylixdxillb87w3vkt1qwfbr2re55asdsyo.png', 5, 1, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(10, 'วิทยาลัยพลังงานและสิ่งแวดล้อม', 'http://www.seen.up.ac.th/', 'เว็บไซค์ วิทยาลัยพลังงานและสิ่งแวดล้อม', 'ctibzg58qjdfzgyze6ir6zoohssxhenkdt.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(11, 'วิทยาลัยการจัดการ กรุงเทพมหานคร', 'http://www.cmbkk.up.ac.th/', 'เว็บไซค์ วิทยาลัยการจัดการ กรุงเทพมหานคร', 'xqo897i6ihhgyzanytgq2emhoxtqwjhd1v.png', 5, 2, '2015-06-25 07:49:38', '2015-06-26 16:25:11', NULL),
(12, 'คณะเทคโนโลยีสารสนเทศและการสื่อสาร', 'http://www.ict.up.ac.th/', 'เว็บไซต์ คณะเทคโนโลยีสารสนเทศและการสื่อสาร', 'lqwhpokcudjhnxwry1sw5kigdqj00vgqga.png', 5, 1, '2015-06-25 07:49:38', '2015-07-11 01:14:43', NULL),
(13, 'คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ', 'http://www.agri.up.ac.th/', 'เว็บไซค์ คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ', 'k7tvr7wd2cbvo3tbgjahi3to6bynpn3xan.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(14, 'คณะพยาบาลศาสตร์', 'http://www.nurse.up.ac.th/', 'คณะพยาบาลศาสตร์', '0nussb1srnzaoxxubwx7z1o7e6y3ikq8p9.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(15, 'คณะเภสัชศาสตร์', 'http://www.pharmacy.up.ac.th/', 'เว็บไซค์ คณะเภสัชศาสตร์อ', 'rjq0idsitbbk0dyjzbkvzbq1qrmxv6llsq.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(16, 'คณะวิทยาศาสตร์', 'http://www.science.up.ac.th/', 'เว็บไซค์ คณะวิทยาศาสตร์', 'ooe5eo16l8bcdxpr0bp6vcwr04njn1k7gj.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(17, 'คณะวิศวกรรมศาสตร์', 'http://www.eng.up.ac.th/', 'เว็บไซค์ คณะวิศวกรรมศาสตร์', 'gozjtplqbvgqljie6i4ejxd5f0eveco03k.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(18, 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์', 'http://www.safa.up.ac.th/', 'เว็บไซค์ คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์', 'uimmvihe1gd4imtjda7bpcxiuzkondscxj.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(19, 'คณะทันตแพทยศาสตร์', 'http://www.dentistry.up.ac.th/', 'เว็บไซต์ คณะทันตแพทยศาสตร์', 'pnlkku90qtyqu1pupkyfldwqzyqo4kusaq.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(20, 'คณะนิติศาสตร์', 'http://www.law.up.ac.th/', 'เว็บไซค์ คณะนิติศาสตร์', 'nmwoit8luvnox7cvhg3irwqiav1ojongar.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(21, 'คณะแพทยศาสตร์', 'http://www.medicine.up.ac.th/', 'เว็บไซค์ คณะแพทยศาสตร์', 'jhoccja95bj5qekqykyifrjosycnjqls1y.png', 5, 1, '2015-06-25 07:49:38', '2015-06-28 16:04:49', NULL),
(22, 'คณะรัฐศาสตร์และสังคมศาสตร์', 'http://www.spss.up.ac.th/', 'เว็บไซค์ คณะรัฐศาสตร์และสังคมศาสตร์', 'dk6ldegaspbc66rcxa2awuxzahnulpqirz.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(23, 'คณะวิทยาการจัดการและสารสนเทศศาสตร์', 'http://www.mis.up.ac.th/', 'เว็บไซต์ คณะวิทยาการจัดการและสารสนเทศศาสตร์', 'oap9knerh9jdjeacd8etj9gu0zvyvl6xhm.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(24, 'คณะวิทยาศาสตร์การแพทย์', 'http://www.medsci.up.ac.th/', 'เว็บไซต์ คณะวิทยาศาสตร์การแพทย์', 'xa22omtkc3y7qyz0dqyhrhbbfm5svwnms6.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(25, 'คณะศิลปศาสตร์', 'http://www.libarts.up.ac.th/', 'เว็บไซต์ คณะศิลปศาสตร์', 'jcxwyzoi6k3qvse4ejs1slgfdoimccvjzp.png', 5, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(26, 'คณะสหเวชศาสตร์', 'http://www.ahs.up.ac.th/', 'เว็บไซต์ คณะสหเวชศาสตร์', 'd694feaaqajppyct9knx0rcqmh2k4e8ng2.png', 5, 4, '2015-06-25 07:49:38', '2015-07-06 21:07:05', NULL),
(27, 'ติดต่อ/แผนที่ มหาวิทยาลัยพะเยา', 'http://up.ac.th/V7/map.aspx', 'เว็บไซต์ ติดต่อมหาวิทยาลัยพะเยา/แผนที่ภายนอกและภายในมหาวิทยาลัยพะเยา', 'ltwpw2rj3wu96jqazoarqjuanyvexmjyov.png', 1, 1, '2015-06-25 07:49:38', '2015-07-12 17:07:39', NULL),
(29, 'ข่าวการรับสมัครศึกษาต่อ', 'http://admission.up.ac.th/main2/#middle', 'เว็บไซต์ ข่าวการรับสมัครศึกษาต่อ', '9h2kthanqwvviikcgplzeoymjfeh8by7o2.png', 7, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(30, 'ปฏิทิน การรับสมัคร', 'http://admission.up.ac.th/main2/contentshow.aspx?ItemID=7438', 'เว็บไซค์ ปฏิทินการรับสมัครสอบคัดเลือกบุคคลเพื่อเข้าศึกษาในมหาวิทยาลัยพะเยาระดับปริญญาตรี ระบบรับตรง', 'ghae61m96ui9pnp5nuol9eevvlkumu1cex.png', 7, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(31, 'ติดต่อสอบถามสมัครศึกษาต่อ', 'http://admission.up.ac.th/main2/#content2', 'ติดต่อสอบถามสมัครศึกษาต่อ', 'wkj8e2202q2zjwsiwi7le3xbsz0s3o3vhq.png', 7, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(32, 'หลักสูตรที่เปิดรับ', 'http://up.ac.th/V7/up_course.aspx', 'เว็บไซค์ หลักสูตรที่เปิดรับสมัครเข้าศึกษา', 'uct2xbnhjxlbybtnnon0cw4jvcstxm4140.png', 7, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(33, 'สมัครเข้าศึกษาระดับปริญญาตรี ', 'http://reg4.up.ac.th/admission/apply1/NewAccount', 'เว็บไซค์ สมัครเข้าศึกษาระดับปริญญาตรี ', 'nkw8f8yquqq48a2jm3jj7mwmwl2vfvwtla.png', 8, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(34, 'สมัครเข้าศึกษาระดับบัณฑิตศึกษา', 'http://intra.up.ac.th/adm/Main/STUDENT/RegisterSelectProject.aspx', 'เว็บไซค์ รับสมัครเข้าศึกษาต่อระดับปริญญาโท/ปริญญาเอก', 'llkhg5c3jfrmnnw6xwaskree8mjcfbezys.png', 8, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(35, 'สำหรับอาจารย์แนะแนว', 'http://intra.up.ac.th/adm/Main/DefaultPage/Login.aspx', 'เว็บไซค์ สำหรับอาจารย์แนะแนว', 'cwdrpkbw8uzf3uln367rqwekawawz8rpe3.png', 8, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(36, 'จองหอพัก', 'http://reg.up.ac.th/dormitory', 'เว็บไซค์ จองหอพัก', 'afifyunicdrzxvhydshmt9e62khnrmxinl.png', 9, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(37, 'UP Dorm', 'http://updorm.com/', 'เว็บไซต์ หอพัก UP Dorm', 'ppx3vi1sfuqsiectqvnfaoinoutfbhvviy.png', 9, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(38, 'สิ่งอำนวยความสะดวก', 'http://www.up.ac.th/tour/default.aspx?p=map', 'สิ่งอำนวยความสะดวก ในมหาวิทยาลัยพะเยา', 'i8vvxhdpixejchu4kv5xelf7lyt8ax2gta.png', 9, 1, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(39, 'กองการเจ้าหน้าที่', 'http://www.personnel.up.ac.th/Main/', 'เว็บไซต์ กองการเจ้าหน้าที่มหาวิทยาลัยพะเยา', 'pjxnuqls91k81ivpcjnexdgc7c8qdfdera.png', 10, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(40, 'ข่าวรับสมัครงาน', 'http://www.personnel.up.ac.th/main/News_Apply.aspx', 'เว็บไซต์ ข่าวรับสมัครงาน', 'deg6fh5pvzvcidgiwdxt8rbmdaypnor0bu.png', 10, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(41, 'ข้อบังคับ/ระเบียบ/ประกาศ', 'http://www.personnel.up.ac.th/Main/Process_Rule.aspx', 'เว็บไซต์ ข้อบังคับ/ระเบียบ/ประกาศ', '4io4leic0qmpfvighw1on5rayvv3fezdnp.png', 10, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(42, 'งานเงินเดือนและค่าตอบแทน', 'http://www.personnel.up.ac.th/Main/Download_Salary.aspx', 'เว็บไซต์ งานเงินเดือนและค่าตอบแทน', 'crh3pyetwl1vwrqolwsw0rffk8aohzbcpg.png', 10, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(43, 'แบบฟอร์มสมัครงาน', 'http://www.personnel.up.ac.th/Main/Download_Staff.aspx', 'เว็บไซต์รวม แบบฟอร์มสมัครงาน', 'igvngw7knroskrmgtd4ci9iuvrfjmplu74.png', 11, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(44, 'ตรวจสอบผลการคัดเลือกเข้าศึกษา', 'http://intra.up.ac.th/adm/Main/Result/CheckStatusAllForStudent.aspx', 'เว็บไซต์ ตรวจสอบผลการคัดเลือกเพื่อเข้าศึกษาต่อในมหาวิทยาลัยพะเยา', 'fxbdowypzq63zoyheaxgbnq7jbphnk2kje.png', 7, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(45, 'แผนที่ท่องเที่ยวจังหวัดพะเยา', 'http://phayao.go.th/phayaoplace/', 'ระบบ google เพื่อสนับสนุนแผนที่ท่องเที่ยวจังหวัดพะเยา', 'h1m7h1wkwgnkvkixo3xhdcwr5ls1ucrhyn.png', 12, 1, '2015-06-25 07:49:38', '2015-07-13 07:41:37', NULL),
(46, 'คู่มือท่องเที่ยวพะเยา', 'http://thai.tourismthailand.org/%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%88%E0%B8%B1%E0%B8%87%E0%B8%AB%E0%B8%A7%E0%B8%B1%E0%B8%94/%E0%B8%9E%E0%B8%B0%E0%B9%80%E0%B8%A2%E0%B8%B2', 'คู่มือท่องเที่ยวจังหวัดพะเยา', 'okrod1jnko4w2xkovyj4a1ajiccz3c0twr.png', 12, 2, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(47, 'ไปด้วยกัน.คอม', 'http://www.paiduaykan.com/province/north/phayao/phayao.html', 'เว็บไซต์ Paiduaykan.com', 'okxyz6hwxgnsvde1zkgydwtjklh7gji6mg.png', 12, 0, '2015-06-25 07:49:38', '2015-06-25 07:50:59', NULL),
(48, 'ชิลไปไหน', 'http://www.chillpainai.com/index.php?text_search=%E0%B8%9E%E0%B8%B0%E0%B9%80%E0%B8%A2%E0%B8%B2&cat=%E0%B8%84%E0%B9%89%E0%B8%99%E0%B8%AB%E0%B8%B2&h_arti_id=', 'เว็บไซต์ Chillpainai.com', '2vpypujfb10xv7myvsmapayzkctnbf5znj.png', 12, 1, '2015-06-25 07:49:38', '2015-07-13 07:42:57', NULL),
(49, 'ไปไหนดี', 'http://www.painaidii.com/business/search-review/lang/th/?keyword=&address=%E0%B8%9E%E0%B8%B0%E0%B9%80%E0%B8%A2%E0%B8%B2', 'เว็บไซต์ Painaidii.com', 'ommr4nhijzilmuplhde9rmbj0trfo2orrn.png', 12, 1, '2015-06-25 07:49:38', '2015-07-13 07:41:18', NULL),
(50, 'ไทยทัวร์', 'http://place.thai-tour.com/phayao', 'เว็บไซต์ thai-tour.com', 'ws9jsbxcvf5dz28kp8nfwajbizgaku3itb.png', 12, 1, '2015-06-25 07:49:38', '2015-07-09 22:58:03', NULL),
(51, 'กิน..ดื่ม..เที่ยว...', 'http://search.edtguide.com/?q=%E0%B8%9E%E0%B8%B0%E0%B9%80%E0%B8%A2%E0%B8%B2&cx=partner-pub-0398916667200592%3A5550257446&cof=FORID%3A10&ie=UTF-8&siteurl=search.edtguide.com&siteurl=search.edtguide.com&ref=&ss=', 'เว็บไซต์ กิน..ดื่ม..เที่ยว...', 'ffyb4rth3h6dcpg3gmhdyurym7kkqvuylq.png', 12, 5, '2015-06-25 07:49:38', '2015-07-13 07:41:14', NULL),
(52, 'ทดสอบ กองทัพ 1', 'https://www.facebook.com/', 'ทดสอบ กองทัพ 1 ', NULL, 66, 7, '2015-07-10 03:30:31', '2015-07-13 21:35:35', 2),
(53, 'ทดสอบ กองทัพ 2', 'https://www.facebook.com/', 'ทดสอบ กองทัพ 2', NULL, 66, 9, '2015-07-10 03:31:00', '2015-07-13 07:35:19', 2),
(54, 'ศูนย์บรรณสารและสื่อการศึกษา', 'http://www.clm.up.ac.th/', 'ศูนย์บรรณสารและสื่อการศึกษา มหาวิทยาลัยพะเยา ', NULL, 4, 0, '2015-07-13 23:48:13', '2015-07-13 23:48:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `majorcategories`
--

CREATE TABLE IF NOT EXISTS `majorcategories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_categories_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `majorcategories`
--

INSERT INTO `majorcategories` (`id`, `name`, `user_categories_id`) VALUES
(1, 'ทั่วไป', 10),
(2, 'บุคคลภายนอก', 10),
(6, 'ยังไม่กำหนด', 6),
(7, 'ผู้สนใจเข้าศึกษา', 10),
(8, 'ท่องเที่ยว', 8),
(14, 'หมวดหมู่', 9);

-- --------------------------------------------------------

--
-- Table structure for table `middlecategories`
--

CREATE TABLE IF NOT EXISTS `middlecategories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major_categories_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `middlecategories`
--

INSERT INTO `middlecategories` (`id`, `name`, `major_categories_id`) VALUES
(1, 'ติดต่อมหาวิทยาลัย', 1),
(3, 'ยังไม่กำหนด', 6),
(4, 'ข้อมูลมหาวิทยาลัย', 1),
(5, 'ข้อมูลวิทยาลัย/คณะ/วิทยาเขต', 1),
(7, 'การรับสมัครศึกษาต่อ', 7),
(8, 'ช่องทางการรับสมัคร', 7),
(9, 'ชีวิตและความเป็นอยู่', 7),
(10, 'การรับสมัครงาน', 2),
(11, 'เอกสารสมัครงาน', 2),
(12, 'ท่องเที่ยว', 8),
(53, 'เลือกตั้ง', 14),
(54, 'ภัยธรรมชาติและเหตุฉุกเฉิน', 14),
(55, 'ความมั่นคง และกฎหมาย', 14),
(56, 'จัดหางาน และการจ้างงาน สวัสดิการแรงงาน', 14),
(57, 'ภาษี การเงิน  และธุรกิจ', 14),
(58, 'ที่ดิน และที่อยู่อาศัย', 14),
(59, 'สุขภาพ และการสาธารณสุข', 14),
(60, 'ขนส่ง การเดินทาง และคมนาคม', 14),
(61, 'การศึกษา และการเรียนรู้', 14),
(62, 'กีฬา วัฒนธรรม และการท่องเที่ยว', 14),
(63, 'สาธารณูปโภค และสวัสดิการภาครัฐ', 14),
(64, 'สิ่งแวดล้อม สังคม และชุมชน', 14),
(65, 'เกษตร ปศุสัตว์ และการประมง', 14),
(66, 'กองทัพ', 14),
(67, 'ผู้พิการ', 14),
(68, 'ทรัพย์สินรัฐและการประมูล', 14),
(69, 'หมวดอื่นๆ', 14);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_31_052026_something', 1),
('2015_04_03_162102_create_test_table', 1),
('2015_04_10_073342_create_usercategories_table', 1),
('2015_04_10_073436_create_majorcategories_table', 1),
('2015_04_10_073509_create_middlecategories_table', 1),
('2015_04_10_073525_create_links_table', 1),
('2015_04_10_073545_create_events_table', 1),
('2015_04_10_073809_create_admin_table', 1),
('2015_06_09_055649_create_posts_table', 2),
('2015_06_25_090853_create_gov_table', 3),
('2015_07_02_180626_create_recommend_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`) VALUES
(1, 'product1'),
(2, 'product222222'),
(3, 'product3'),
(4, 'product4'),
(5, 'product5'),
(6, 'SayamratK'),
(7, 'SayamratK'),
(8, 'SayamratK'),
(9, 'SayamratK'),
(10, ''),
(11, '11111111111'),
(12, 'SayamratK11'),
(13, 'SayamratK22222'),
(14, 'SayamratK333333333'),
(15, 'SayamratK555555555'),
(16, 'SayamratK555555555'),
(17, 'qqwerfas'),
(18, 'qqwerfas111111'),
(19, 'SayamratKSayameatK'),
(20, 'love'),
(21, 'loveasasdasd'),
(22, ''),
(23, 'porfdasd'),
(24, 'love'),
(25, 'lovelove'),
(26, 'lovelovelove'),
(27, 'uc add'),
(28, 'mjc add'),
(29, 'mdc add'),
(30, 'test'),
(31, 'ฟหก'),
(32, 'sgsg'),
(33, 'hj,'),
(34, 'r'),
(35, 'rt'),
(36, 'afsd'),
(37, ';''pl'),
(38, 'qweqwe'),
(39, 'qweqwefsdf'),
(40, 'zxZ'),
(41, 'wer'),
(42, 'er'),
(43, '545'),
(44, '5'),
(45, ''),
(46, ''),
(47, ''),
(48, 'u'),
(49, ''),
(50, ''),
(51, 'l;mkl;m;l'),
(52, '56132'),
(53, 'asd'),
(54, 'ssd'),
(55, '8541'),
(56, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE IF NOT EXISTS `recommend` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descript` text COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`id`, `name`, `link`, `descript`, `frequency`, `created_at`, `updated_at`) VALUES
(3, 'ฉันรักเมืองไทย ตอนที่ 9.2 ... ตะลอนเมืองเหนือ ( พะเยา )', 'http://pantip.com/topic/30675601', '[Pantip] ตะลอนเมืองเหนือ ( พะเยา )', 1, '2015-07-02 16:12:32', '2015-07-13 07:39:01'),
(4, 'เที่ยว พะเยา เชียงราย พม่า เชียงใหม่', 'http://pantip.com/topic/31558211', '[Pantip] เที่ยว พะเยา เชียงราย พม่า เชียงใหม่', 2, '2015-07-02 16:27:22', '2015-07-11 00:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `usercategories`
--

CREATE TABLE IF NOT EXISTS `usercategories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usercategories`
--

INSERT INTO `usercategories` (`id`, `name`) VALUES
(6, 'ยังไม่กำหนด'),
(8, 'ท่องเที่ยว'),
(9, 'หน่วยงานราชการ'),
(10, 'มหาวิทยาลัยพะเยา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gov`
--
ALTER TABLE `gov`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
 ADD PRIMARY KEY (`id`), ADD KEY `links_middle_categories_id_foreign` (`middle_categories_id`), ADD KEY `links_gov_id_foreign` (`gov_id`);

--
-- Indexes for table `majorcategories`
--
ALTER TABLE `majorcategories`
 ADD PRIMARY KEY (`id`), ADD KEY `majorcategories_user_categories_id_foreign` (`user_categories_id`);

--
-- Indexes for table `middlecategories`
--
ALTER TABLE `middlecategories`
 ADD PRIMARY KEY (`id`), ADD KEY `middlecategories_major_categories_id_foreign` (`major_categories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercategories`
--
ALTER TABLE `usercategories`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gov`
--
ALTER TABLE `gov`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `majorcategories`
--
ALTER TABLE `majorcategories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `middlecategories`
--
ALTER TABLE `middlecategories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usercategories`
--
ALTER TABLE `usercategories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
ADD CONSTRAINT `links_gov_id_foreign` FOREIGN KEY (`gov_id`) REFERENCES `gov` (`id`),
ADD CONSTRAINT `links_middle_categories_id_foreign` FOREIGN KEY (`middle_categories_id`) REFERENCES `middlecategories` (`id`);

--
-- Constraints for table `majorcategories`
--
ALTER TABLE `majorcategories`
ADD CONSTRAINT `majorcategories_user_categories_id_foreign` FOREIGN KEY (`user_categories_id`) REFERENCES `usercategories` (`id`);

--
-- Constraints for table `middlecategories`
--
ALTER TABLE `middlecategories`
ADD CONSTRAINT `middlecategories_major_categories_id_foreign` FOREIGN KEY (`major_categories_id`) REFERENCES `majorcategories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
