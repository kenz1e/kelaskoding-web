-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.9 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table kelaskoding.tadmin
CREATE TABLE IF NOT EXISTS `tadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  `realname` varchar(150) NOT NULL DEFAULT '0',
  `lastlogin` datetime NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tadmin: ~0 rows (approximately)
DELETE FROM `tadmin`;
/*!40000 ALTER TABLE `tadmin` DISABLE KEYS */;
INSERT INTO `tadmin` (`id`, `email`, `password`, `realname`, `lastlogin`, `avatar`) VALUES
	(1, 'hendro.steven@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hendro Steven', '2017-08-28 08:32:07', 'avatar3.png');
/*!40000 ALTER TABLE `tadmin` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tblog
CREATE TABLE IF NOT EXISTS `tblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_content` text,
  `full_content` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tblog: 3 rows
DELETE FROM `tblog`;
/*!40000 ALTER TABLE `tblog` DISABLE KEYS */;
INSERT INTO `tblog` (`id`, `post_date`, `title`, `short_content`, `full_content`, `thumbnail`, `status`) VALUES
	(1, '2017-08-30 11:05:54', 'Belajar pemrograman sambil membuat aplikasi nyata', 'Kami percaya belajar pemrograman dengan langsung membuat aplikasi yang nyata langkah demi langkah adalah cara yang efektif untuk belajar.', 'Kami percaya belajar pemrograman dengan langsung membuat aplikasi yang nyata langkah demi langkah adalah cara yang efektif untuk belajar. Membuat aplikasi web atau aplikasi mobile menggunakan teknologi dan framework terkini dengan kasus-kasus nyata dari berbagai startup didunia, mari bergabung dengan lebih dari 100 siswa belajar pemrograman dan mendapatkan inspirasi membangun startup sendiri.', 'https://www.eduonix.com/blog/wp-content/uploads/2015/04/15-Most-Popular-Programming-Languages-You-Must-Learn-in-2015.png', 1),
	(2, '2017-08-30 11:05:54', 'Belajar pemrograman sambil membuat aplikasi nyata', 'Kami percaya belajar pemrograman dengan langsung membuat aplikasi yang nyata langkah demi langkah adalah cara yang efektif untuk belajar.', 'Kami percaya belajar pemrograman dengan langsung membuat aplikasi yang nyata langkah demi langkah adalah cara yang efektif untuk belajar. Membuat aplikasi web atau aplikasi mobile menggunakan teknologi dan framework terkini dengan kasus-kasus nyata dari berbagai startup didunia, mari bergabung dengan lebih dari 100 siswa belajar pemrograman dan mendapatkan inspirasi membangun startup sendiri.', 'https://www.eduonix.com/blog/wp-content/uploads/2015/04/15-Most-Popular-Programming-Languages-You-Must-Learn-in-2015.png', 1),
	(3, '2017-08-30 11:05:54', 'Belajar pemrograman sambil membuat aplikasi nyata', 'Kami percaya belajar pemrograman dengan langsung membuat aplikasi yang nyata langkah demi langkah adalah cara yang efektif untuk belajar.', 'Kami percaya belajar pemrograman dengan langsung membuat aplikasi yang nyata langkah demi langkah adalah cara yang efektif untuk belajar. Membuat aplikasi web atau aplikasi mobile menggunakan teknologi dan framework terkini dengan kasus-kasus nyata dari berbagai startup didunia, mari bergabung dengan lebih dari 100 siswa belajar pemrograman dan mendapatkan inspirasi membangun startup sendiri.', 'https://www.eduonix.com/blog/wp-content/uploads/2015/04/15-Most-Popular-Programming-Languages-You-Must-Learn-in-2015.png', 1);
/*!40000 ALTER TABLE `tblog` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tcomment
CREATE TABLE IF NOT EXISTS `tcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `comments` text,
  `comments_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0=not approved, 1=approved',
  PRIMARY KEY (`id`),
  KEY `FK__tmember` (`member_id`),
  KEY `FK_tcomment_tcourse` (`course_id`),
  CONSTRAINT `FK__tmember` FOREIGN KEY (`member_id`) REFERENCES `tmember` (`id`),
  CONSTRAINT `FK_tcomment_tcourse` FOREIGN KEY (`course_id`) REFERENCES `tcourse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tcomment: ~4 rows (approximately)
DELETE FROM `tcomment`;
/*!40000 ALTER TABLE `tcomment` DISABLE KEYS */;
INSERT INTO `tcomment` (`id`, `member_id`, `course_id`, `comments`, `comments_date`, `status`) VALUES
	(1, 7, 4, 'Lorem ipsum dolor sit amet, menandri accusamus et eum, ius delenit inermis id, reque perpetua ex his. Utinam vocibus suavitate no pri, eos ex quas mutat. Soluta veritus ad sea, ex usu volumus accusam. Et cum habeo accusam mediocritatem, ex errem latine vituperatoribus pro, elitr aliquip corpora eam et. Quis postea dolores usu ex, ei mea possit sapientem forensibus, vidit probo soluta cu vim.', '2017-08-28 15:12:08', 1),
	(2, 6, 4, 'Lorem ipsum dolor sit amet, menandri accusamus et eum, ius delenit inermis id, reque perpetua ex his. Utinam vocibus suavitate no pri, eos ex quas mutat. Soluta veritus ad sea, ex usu volumus accusam. Et cum habeo accusam mediocritatem, ex errem latine vituperatoribus pro, elitr aliquip corpora eam et. Quis postea dolores usu ex, ei mea possit sapientem forensibus, vidit probo soluta cu vim.', '2017-08-28 15:12:45', 1),
	(4, 6, 9, 'Test diskusi', '2017-08-29 22:52:23', 1),
	(5, 6, 9, 'Ok ini juga percobaan yaa', '2017-08-29 22:52:48', 1);
/*!40000 ALTER TABLE `tcomment` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tcomment_reply
CREATE TABLE IF NOT EXISTS `tcomment_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `comment_reply` text,
  `reply_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tcomment_reply_tcomment` (`comment_id`),
  CONSTRAINT `FK_tcomment_reply_tcomment` FOREIGN KEY (`comment_id`) REFERENCES `tcomment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tcomment_reply: ~0 rows (approximately)
DELETE FROM `tcomment_reply`;
/*!40000 ALTER TABLE `tcomment_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcomment_reply` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tcontact_us
CREATE TABLE IF NOT EXISTS `tcontact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pesan` text,
  `status` tinyint(4) DEFAULT NULL COMMENT '0=new , 1=replyed',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tcontact_us: 1 rows
DELETE FROM `tcontact_us`;
/*!40000 ALTER TABLE `tcontact_us` DISABLE KEYS */;
INSERT INTO `tcontact_us` (`id`, `name`, `email`, `pesan`, `status`) VALUES
	(1, NULL, 'hendro.steven@gmail.com', 'Perbanyak lagi video gratisnya gan', 0);
/*!40000 ALTER TABLE `tcontact_us` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tcourse
CREATE TABLE IF NOT EXISTS `tcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `types` tinyint(1) DEFAULT NULL COMMENT '0=free, 1=berbayar',
  `price` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0=unpublished, 1=published',
  `thumbnail` varchar(255) DEFAULT NULL,
  `intro_video` text,
  `overview` text,
  `duration` varchar(100) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tcourse: ~5 rows (approximately)
DELETE FROM `tcourse`;
/*!40000 ALTER TABLE `tcourse` DISABLE KEYS */;
INSERT INTO `tcourse` (`id`, `name`, `types`, `price`, `status`, `thumbnail`, `intro_video`, `overview`, `duration`, `keyword`) VALUES
	(4, 'Membangun RestoBook Application dengan Springboot, bootstrap dan Ionic', 1, 350000, 1, '1503840889828_buildapp.jpg', '<iframe src="https://www.youtube.com/embed/QzqcCWQskXo" frameborder="0" allowfullscreen></iframe>', '<p>\r\n\r\nIn this project, I will walk you through steps of how to create a very simple online education web application, a "newbies version" of Code4Startup. What you will learn:\r\n\r\n<br></p><p>\r\n\r\n</p><ul><li>Ruby on Rails with practical code and design Understand</li><li>how MVC Model works in Rails. Work with Wistia Video APIs. Design your web app with Material Design.</li><li>How to embed Twitter Widget into your website to get more social engagements. Get Google Map API into</li><li>your website. Go Live with Heroku to share your work with this world.</li></ul>\r\n\r\n<br><p></p>', '28 Jam', 'Springboot,Bootstrap,Ionic, PostgreSQL'),
	(5, 'Membangun InvoiceWeb Application dengan Springboot dan Angular 4', 1, 500000, 1, '1503842006670_preview.__large_preview.png', '<iframe src="https://www.youtube.com/embed/lD7nDF-VFi0" frameborder="0" allowfullscreen></iframe>', '<p>\r\n\r\nIn this project, I will walk you through steps of how to create a very simple online education web application, a "newbies version" of Code4Startup. What you will learn:\r\n\r\n<br></p><p>\r\n\r\n</p><ul><li>Ruby on Rails with practical code and design Understand</li><li>how MVC Model works in Rails. Work with Wistia Video APIs. Design your web app with Material Design.</li><li>How to embed Twitter Widget into your website to get more social engagements. Get Google Map API into</li><li>your website. Go Live with Heroku to share your work with this world.</li></ul>\r\n\r\n<br><p></p>', '22 Jam', 'Springboot,Angular 4,PostgreSQL,Heroku'),
	(6, 'Membangun LaudryBox Application dengan Nodejs, Ionic dan MongoDB', 1, 400000, 1, '1503842531744_materia-material-design-ui-kit-642x321.png', '<iframe src="https://www.youtube.com/embed/q5WnZKI1dwQ" frameborder="0" allowfullscreen></iframe>', '<p>\r\n\r\n</p><p>In this project, I will walk you through steps of how to create a very simple online education web application, a "newbies version" of Code4Startup. What you will learn:</p><ul><li>Ruby on Rails with practical code and design Understand</li><li>how MVC Model works in Rails. Work with Wistia Video APIs. Design your web app with Material Design.</li><li>How to embed Twitter Widget into your website to get more social engagements. Get Google Map API into</li><li>your website. Go Live with Heroku to share your work with this world.</li></ul>\r\n\r\n<br><p></p>', '25 Jam', 'NodeJs,Ionic, MongoDB,Heroku'),
	(7, 'Learn Angular 2/4 From Scratch', 0, 0, 1, '1503882125932_upandRunningWithAngular4-804x402.png', '<iframe  src="https://www.youtube.com/embed/RdbYj8N-h1A" frameborder="0" allowfullscreen></iframe>', '<p>\r\n\r\n</p><p>In this project, I will walk you through steps of how to create a very simple online education web application, a "newbies version" of Code4Startup. What you will learn: <br></p><p></p><ul><li>Ruby on Rails with practical code and design Understand</li><li>how MVC Model works in Rails. Work with Wistia Video APIs. Design your web app with Material Design.</li><li>How to embed Twitter Widget into your website to get more social engagements. Get Google Map API into</li><li>your website. Go Live with Heroku to share your work with this world.</li></ul>\r\n\r\n<br><p></p>', '1 jam', 'Angular 4, Typescript'),
	(8, 'Membangun Aplikasi Cuaca dengan Ionic 3 ', 0, 0, 1, '1503883574703_article-170417220711.png', '<iframe src="https://www.youtube.com/embed/qs2n_poLarc" frameborder="0" allowfullscreen></iframe>', '<p>\r\n\r\n</p><p>In this project, I will walk you through steps of how to create a very simple online education web application, a "newbies version" of Code4Startup. What you will learn: <br></p><p></p><ul><li>Ruby on Rails with practical code and design Understand</li><li>how MVC Model works in Rails. Work with Wistia Video APIs. Design your web app with Material Design.</li><li>How to embed Twitter Widget into your website to get more social engagements. Get Google Map API into</li><li>your website. Go Live with Heroku to share your work with this world.</li></ul>\r\n\r\n<br><p></p>', '45 Menit', 'Ionic 3, Angular, Typescript, Http'),
	(9, 'Belajar Springboot + Spring data JPA + Bootstrap dalam 1 jam', 0, 0, 1, '1503883996623_maxresdefault.jpg', '<iframe src="https://www.youtube.com/embed/mG6zPc-L85w" frameborder="0" allowfullscreen></iframe>', '<p>\r\n\r\n</p><p>In this project, I will walk you through steps of how to create a very simple online education web application, a "newbies version" of Code4Startup. What you will learn: <br></p><p></p><ul><li>Ruby on Rails with practical code and design Understand</li><li>how MVC Model works in Rails. Work with Wistia Video APIs. Design your web app with Material Design.</li><li>How to embed Twitter Widget into your website to get more social engagements. Get Google Map API into</li><li>your website. Go Live with Heroku to share your work with this world.</li></ul>\r\n\r\n<br><p></p>', '50 menit', 'Springboot, JPA, bootstrap');
/*!40000 ALTER TABLE `tcourse` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tcourse_item
CREATE TABLE IF NOT EXISTS `tcourse_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `item_video` text,
  PRIMARY KEY (`id`),
  KEY `FK_tcourse_item_tcourse` (`course_id`),
  CONSTRAINT `FK_tcourse_item_tcourse` FOREIGN KEY (`course_id`) REFERENCES `tcourse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tcourse_item: ~12 rows (approximately)
DELETE FROM `tcourse_item`;
/*!40000 ALTER TABLE `tcourse_item` DISABLE KEYS */;
INSERT INTO `tcourse_item` (`id`, `course_id`, `name`, `duration`, `item_video`) VALUES
	(17, 4, '1. Setup Project', '15 menit', '<iframe src="https://www.youtube.com/embed/FXJPA3IqANg" frameborder="0" allowfullscreen></iframe>'),
	(18, 4, '2. Seting Database', '20 Menit', '<iframe src="https://www.youtube.com/embed/rPMt8GhZkA0" frameborder="0" allowfullscreen></iframe>'),
	(19, 4, '3. Membuat Model data', '10 menit', '<iframe src="https://www.youtube.com/embed/QzqcCWQskXo" frameborder="0" allowfullscreen></iframe>'),
	(20, 4, '4. Membuat Repository', '15 Menit', '<iframe src="https://www.youtube.com/embed/QzqcCWQskXo" frameborder="0" allowfullscreen></iframe>'),
	(21, 4, '5. Membuat Service', '10 menit', '<iframe src="https://www.youtube.com/embed/QzqcCWQskXo" frameborder="0" allowfullscreen></iframe>'),
	(22, 4, '6. Membuat Controller', '10 menit', '<iframe src="https://www.youtube.com/embed/QzqcCWQskXo" frameborder="0" allowfullscreen></iframe>'),
	(23, 4, '7. Testing endpoint dengan Postman', '15 menit', '<iframe src="https://www.youtube.com/embed/QzqcCWQskXo" frameborder="0" allowfullscreen></iframe>'),
	(24, 5, '1. Setup Project', '10 menit', '<iframe src="https://www.youtube.com/embed/lD7nDF-VFi0" frameborder="0" allowfullscreen></iframe>'),
	(25, 5, '2. Database Configuration', '10 menit', '<iframe src="https://www.youtube.com/embed/lD7nDF-VFi0" frameborder="0" allowfullscreen></iframe>'),
	(26, 6, '1. Project Steup', '10 menit', '<iframe src="https://www.youtube.com/embed/q5WnZKI1dwQ" frameborder="0" allowfullscreen></iframe>'),
	(27, 6, '2. Database Design', '20 menit', '<iframe src="https://www.youtube.com/embed/q5WnZKI1dwQ" frameborder="0" allowfullscreen></iframe>'),
	(28, 7, '1. Introduction', '10 Menit', '<iframe src="https://www.youtube.com/embed/RdbYj8N-h1A" frameborder="0" allowfullscreen style="position:absolute;width:100%;height:100%;left:0"></iframe>'),
	(29, 9, '1. Setup project ', '10 menit', '<iframe src="https://www.youtube.com/embed/mG6zPc-L85w" frameborder="0" allowfullscreen></iframe>');
/*!40000 ALTER TABLE `tcourse_item` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tmember
CREATE TABLE IF NOT EXISTS `tmember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(150) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `serialid` varchar(150) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tmember: ~2 rows (approximately)
DELETE FROM `tmember`;
/*!40000 ALTER TABLE `tmember` DISABLE KEYS */;
INSERT INTO `tmember` (`id`, `email`, `password`, `fullname`, `status`, `lastlogin`, `serialid`, `phone`) VALUES
	(6, 'hendro.steven@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hendro Steven', 1, '2017-08-30 13:46:37', '1503807168085', '081328339692'),
	(7, 'salatigacode@gmail.com', '01cfcd4f6b8770febfb40cb906715822', 'Salatiga', 1, '2017-08-28 22:29:21', '1503813415303', '081328339692'),
	(10, 'hendro.tampake@dmsum.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Alex Komarudin', 1, '2017-08-30 14:32:40', '1504074730766', '081328339692');
/*!40000 ALTER TABLE `tmember` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.tmember_course
CREATE TABLE IF NOT EXISTS `tmember_course` (
  `id` varchar(150) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enroll_date` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tmember_course_tmember` (`member_id`),
  KEY `FK_tmember_course_tcourse` (`course_id`),
  CONSTRAINT `FK_tmember_course_tcourse` FOREIGN KEY (`course_id`) REFERENCES `tcourse` (`id`),
  CONSTRAINT `FK_tmember_course_tmember` FOREIGN KEY (`member_id`) REFERENCES `tmember` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.tmember_course: ~17 rows (approximately)
DELETE FROM `tmember_course`;
/*!40000 ALTER TABLE `tmember_course` DISABLE KEYS */;
INSERT INTO `tmember_course` (`id`, `member_id`, `course_id`, `enroll_date`, `price`, `status`, `payment_type`) VALUES
	('1503996227571', 6, 9, '2017-08-29 16:43:47', 0, 'Success', 'Gratis'),
	('1503996241962', 6, 6, '2017-08-29 16:44:01', 400000, 'Waiting for Payment', ''),
	('1503997024580', 6, 6, '2017-08-29 16:57:04', 400000, 'Waiting for Payment', ''),
	('1503997058085', 6, 6, '2017-08-29 16:57:38', 400000, 'Waiting for Payment', ''),
	('1503998053895', 6, 6, '2017-08-29 17:14:13', 400000, 'Waiting for Payment', ''),
	('1503998062649', 6, 6, '2017-08-29 17:14:22', 400000, 'Waiting for Payment', ''),
	('1503998099788', 6, 6, '2017-08-29 17:14:59', 400000, 'Waiting for Payment', ''),
	('1503998109710', 6, 6, '2017-08-29 17:15:09', 400000, 'Waiting for Payment', ''),
	('1503998115473', 6, 6, '2017-08-29 17:15:15', 400000, 'Waiting for Payment', ''),
	('1503998161613', 6, 6, '2017-08-29 17:16:01', 400000, 'Waiting for Payment', ''),
	('1503998187283', 6, 6, '2017-08-29 17:16:27', 400000, 'Waiting for Payment', ''),
	('1503998736743', 6, 6, '2017-08-29 17:25:36', 400000, 'Waiting for Payment', ''),
	('1503998745308', 6, 6, '2017-08-29 17:25:45', 400000, 'Waiting for Payment', ''),
	('1503998769846', 6, 6, '2017-08-29 17:26:09', 400000, 'Waiting for Payment', ''),
	('1503998770958', 6, 6, '2017-08-29 17:26:10', 400000, 'Waiting for Payment', ''),
	('1503998776596', 6, 6, '2017-08-29 17:26:16', 400000, 'Waiting for Payment', ''),
	('1503998780409', 6, 6, '2017-08-29 17:26:20', 400000, 'Waiting for Payment', ''),
	('1504020873038', 6, 5, '2017-08-29 23:34:33', 500000, 'Waiting for Payment', ''),
	('2014040745', 6, 4, '2017-08-29 01:41:22', 350000, 'Waiting for Payment', '');
/*!40000 ALTER TABLE `tmember_course` ENABLE KEYS */;

-- Dumping structure for table kelaskoding.treset
CREATE TABLE IF NOT EXISTS `treset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `done_date` datetime DEFAULT NULL,
  `serialid` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_treset_tmember` (`member_id`),
  CONSTRAINT `FK_treset_tmember` FOREIGN KEY (`member_id`) REFERENCES `tmember` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kelaskoding.treset: ~0 rows (approximately)
DELETE FROM `treset`;
/*!40000 ALTER TABLE `treset` DISABLE KEYS */;
/*!40000 ALTER TABLE `treset` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
