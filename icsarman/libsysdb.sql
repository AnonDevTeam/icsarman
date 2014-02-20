-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2014 at 05:51 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `libsysdb`
--
CREATE DATABASE IF NOT EXISTS `libsysdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `libsysdb`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `material_id` int(5) NOT NULL,
  `course_code` varchar(16) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_material`
--

CREATE TABLE IF NOT EXISTS `borrowed_material` (
  `transaction_id` int(5) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `material_id` int(5) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `due_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `material_id` (`material_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE IF NOT EXISTS `magazine` (
  `material_id` int(5) NOT NULL,
  `volume_number` varchar(32) NOT NULL,
  `month` int(2) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `material_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `year` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date_added` date NOT NULL,
  `quantity` int(2) NOT NULL,
  `quantity_onshelf` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `picture` varchar(4) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_tag`
--

CREATE TABLE IF NOT EXISTS `material_tag` (
  `auxil_id` int(5) NOT NULL AUTO_INCREMENT,
  `material_id` int(5) NOT NULL,
  `tag` varchar(15) NOT NULL,
  PRIMARY KEY (`auxil_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `material_id` int(5) NOT NULL,
  `type` varchar(128) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserved_material`
--

CREATE TABLE IF NOT EXISTS `reserved_material` (
  `transaction_id` int(5) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `material_id` int(5) NOT NULL,
  `date_reserved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `id` (`id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `sp_thesis`
--

CREATE TABLE IF NOT EXISTS `sp_thesis` (
  `material_id` int(5) NOT NULL,
  `adviser` varchar(128) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggest_material`
--

CREATE TABLE IF NOT EXISTS `suggest_material` (
  `auxil_id` int(5) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  `date_published` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date_suggested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`auxil_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `middleinitial` varchar(2) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `school` varchar(128) DEFAULT NULL,
  `studentnumber` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `referred_by` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `picture` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `username`, `password`, `firstname`, `middleinitial`, `lastname`, `email`, `school`, `studentnumber`, `birthday`, `status`, `type`, `referred_by`, `address`, `picture`) VALUES
(1, 'theresa', 'password', 'Theresa', 'S', 'Nicdao', 'mtsnicdao@gmail.com', 'UPLB', '2011-56717', '1994-10-29', 'active', 'student', NULL, 'Hermosa, Bataan', ''),
(2, 'marian', 'password', 'Marian', 'M', 'Alvarez', 'mma@gmail.com', 'UPLB', '2011-56789', '1995-01-13', 'active', 'student', NULL, 'Olongapo City', ''),
(3, 'nelo', 'password', 'Raphael Nelo', 'S', 'Aguila', 'raphaelnelo.aguila@gmail.com', 'UPLB', '2011-53035', '1994-10-26', 'pending', 'student', NULL, 'Camarines Norte', ''),
(4, 'clare', 'password', 'Clare Kathleen', 'L', 'Sumo', 'cklsumo@gmail.com', 'UPLB', '2011-57947', '1995-12-03', 'suspended', 'student', NULL, 'Mindoro', ''),
(5, 'eim', 'password', 'Eimereen', 'J', 'Alido', 'eimalido@gmail.com', 'UPLB', '2011-57031', '1995-07-13', 'deleted', 'student', NULL, 'Mindoro', '');

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `title`, `author`, `year`, `type`, `date_added`, `quantity`, `quantity_onshelf`, `status`, `picture`) VALUES
(1, 'The Latext Companion', 'Goossens, Mittelbatch', 1991, 'book', '2013-01-01', 1, 2, 'onshelf', ''),
(2, 'Pascal 2nd Ed.', 'Dale,N. & Weems, C.', 1993, 'book', '2013-01-08', 5, 5, 'onshelf', ''),
(3, 'The C Primer', 'Hancock, L.', 1998, 'book', '2013-03-13', 3, 3, 'onshelf', ''),
(4, 'Computer Organization', 'Hamacher, C. et al', 1990, 'book', '2013-02-14', 4, 4, 'onshelf', ''),
(5, 'Algorithms', 'Sedgewick,  R', 1992, 'book', '2013-02-14', 2, 2, 'onshelf', ''),
(6, 'Using Java', 'Newman, A/ et al', 2000, 'book', '2013-03-03', 4, 4, 'onshelf', ''),
(7, 'Discrete Mathematics', 'Johnsonbaugh, R', 2001, 'book', '2013-03-14', 1, 1, 'onshelf', ''),
(8, 'C++ Unleashed', 'Jess Liberty', 2003, 'book', '2013-03-25', 3, 3, 'onshelf', ''),
(9, 'Database Design', 'Wiederhold, G', 2005, 'book', '2013-03-27', 8, 8, 'onshelf', ''),
(10, 'Guide To Expert Systems', 'Edmunds, RA', 2008, 'book', '2013-04-13', 7, 7, 'onshelf', ''),
(11, 'Roundabout Simulation', 'Marriet, V.', 2000, 'other', '2013-03-12', 3, 3, 'onshelf', ''),
(12, 'Leapfrog Visualisation', 'Wallaby, A.', 2001, 'other', '2013-04-12', 9, 0, 'onshelf', ''),
(13, 'Game Concept and Design', 'Brown, B.', 2002, 'other', '2013-05-23', 2, 2, 'onshelf', ''),
(14, 'Robot Modelling Fundamentals', 'Frathos, P.', 2010, 'other', '2013-04-25', 9, 0, 'onshelf', ''),
(15, 'Digital Image Processing Video Compilation', 'Marriet, V.', 2011, 'other', '2013-07-07', 8, 0, 'onshelf', ''),
(16, 'Network and Rerouting', 'Valerie, G.', 2001, 'other', '2013-09-12', 2, 0, 'onshelf', ''),
(17, 'Data Structures 101', 'Brown, B.', 1990, 'other', '2013-01-09', 4, 0, 'onshelf', ''),
(18, 'RBG vs. HCI', 'Hale, C. & Williams, H.', 1993, 'other', '2013-09-09', 10, 0, 'onshelf', ''),
(19, 'Handling Big Data', 'Hughes, V. & Victor, D.', 2011, 'other', '2013-04-02', 3, 0, 'onshelf', ''),
(20, 'Digital Image Processing Smoke Detection', 'Lauren, F., Zimmerman, N.', 2000, 'other', '2013-04-12', 2, 0, 'onshelf', ''),
(21, 'D-Zone', 'James, A.', 2009, 'magazine', '2013-09-13', 1, 0, 'onshelf', ''),
(22, 'Pixelated', 'Puckerman, N.', 2008, 'magazine', '2013-02-19', 3, 0, 'onshelf', ''),
(23, 'Software vs Hardware', 'Fabray, Q.', 0, 'magazine', '2013-05-10', 5, 0, 'onshelf', ''),
(24, 'OS Nation', 'Hudson F. & Morrison, M.', 2004, 'magazine', '2013-08-10', 3, 0, 'onshelf', ''),
(25, 'Frontline CLI', 'Daemon, B.', 2003, 'magazine', '2013-11-02', 4, 0, 'onshelf', ''),
(26, 'Byte Me', 'Giga, B.', 2012, 'magazine', '2013-09-09', 1, 0, 'onshelf', ''),
(27, 'My Personal Computer', 'Blake, G.', 2003, 'magazine', '2013-07-01', 2, 0, 'onshelf', ''),
(28, 'Robot World', 'Johnson, J.', 1999, 'magazine', '2013-02-28', 4, 0, 'onshelf', ''),
(29, 'Malloc Monthly', 'Turon, G.', 1992, 'magazine', '2013-06-01', 15, 0, 'onshelf', ''),
(30, 'Behind the Screens', 'Black, M.', 1990, 'magazine', '2013-10-13', 8, 0, 'onshelf', ''),
(31, 'Simulation of the Blood Circulation Inside', 'Manalo, J R G', 1982, 'sp_thesis', '2013-04-13', 1, 0, 'onshelf', ''),
(32, 'SLIM + V 1.0', 'San Mateo, JE S', 1989, 'sp_thesis', '2013-04-18', 1, 0, 'onshelf', ''),
(33, 'PLAYMATE: A Graphical User Interface I', 'Deriquito, C R', 1991, 'sp_thesis', '2013-03-31', 1, 0, 'onshelf', ''),
(34, 'Computation for Discrete', 'Chang, AK F', 1997, 'sp_thesis', '2013-04-01', 1, 0, 'onshelf', ''),
(35, 'Math Gyver An Educational Game Program', 'Obmasca, A I', 2003, 'sp_thesis', '2013-04-05', 1, 0, 'onshelf', '');

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`material_id`, `course_code`, `publisher`) VALUES
(1, 'CMSC 1', 'ABC Publishing Corp'),
(2, 'CMSC 11', 'BCD Publishing'),
(3, 'CMSC 21', 'DC Comics'),
(4, 'CMSC 100', 'Marvel Publishing'),
(5, 'CMSC 123', 'SnK Publishing'),
(6, 'CMSC 22', 'Marvel Publishing'),
(7, 'CMSC 22', 'Marvel Publishing'),
(8, 'CMSC 22', 'Marvel Publishing'),
(9, 'CMSC 127', 'DC Comics'),
(10, 'CMSC 170', 'BCD Publishing');

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`material_id`, `volume_number`, `month`) VALUES
(21, '14', 3),
(22, '1', 9),
(23, '8', 12),
(24, '6', 8),
(25, '9', 1),
(26, '3', 6),
(27, '4', 10),
(28, '5', 2),
(29, '1', 4),
(30, '2', 5);

--
-- Dumping data for table `sp_thesis`
--

INSERT INTO `sp_thesis` (`material_id`, `adviser`, `type`) VALUES
(31, 'Pabico', 'sp'),
(32, 'Jacildo', 'sp'),
(33, 'Hermocilla', 'thesis'),
(34, 'Khan', 'thesis'),
(35, 'Mercado', 'sp');

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`material_id`, `type`) VALUES
(11, 'VCD'),
(12, 'VCD'),
(13, 'CD'),
(14, 'CD'),
(15, 'Betamax'),
(16, 'CD'),
(17, 'CD'),
(18, 'CD'),
(19, 'CD'),
(20, 'CD');

--
-- Dumping data for table `reserved_material`
--

INSERT INTO `reserved_material` (`transaction_id`, `id`, `material_id`, `date_reserved`) VALUES
(1, 2, 1, '2014-02-18 16:00:00'),
(2, 2, 2, '2014-02-18 16:00:00'),
(3, 2, 1, '2014-02-12 16:00:00'),
(4, 2, 3, '2014-02-26 16:00:00'),
(5, 1, 1, '2014-02-12 06:46:32'),
(6, 2, 1, '2014-02-12 16:00:00'),
(7, 2, 1, '2014-02-11 16:00:00');

--
-- Dumping data for table `suggest_material`
--

INSERT INTO `suggest_material` (`auxil_id`, `id`, `title`, `author`, `publisher`, `date_published`, `type`, `date_suggested`, `status`) VALUES
(1, 1, 'The Great Book 1', 'Clare Kathleen Sumo', 'The Printing Corp.', 2013, 'book', '2014-01-28 06:29:09', 'pending'),
(2, 2, 'The Great Book Again', 'Raphael Nelo Aguila', 'My Publishing Inc.', 2014, 'magazine', '2014-01-28 06:29:09', 'pending');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowed_material`
--
ALTER TABLE `borrowed_material`
  ADD CONSTRAINT `borrowed_material_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowed_material_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `magazine`
--
ALTER TABLE `magazine`
  ADD CONSTRAINT `magazine_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material_tag`
--
ALTER TABLE `material_tag`
  ADD CONSTRAINT `material_tag_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other`
--
ALTER TABLE `other`
  ADD CONSTRAINT `other_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserved_material`
--
ALTER TABLE `reserved_material`
  ADD CONSTRAINT `reserved_material_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserved_material_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sp_thesis`
--
ALTER TABLE `sp_thesis`
  ADD CONSTRAINT `sp_thesis_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suggest_material`
--
ALTER TABLE `suggest_material`
  ADD CONSTRAINT `suggest_material_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
