-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2014 at 11:13 AM
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
  `is_approved` int(1) NOT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `due_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `material_id` (`material_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_added` date NOT NULL,
  `quantity` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `picture` varchar(4) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sp_thesis`
--

CREATE TABLE IF NOT EXISTS `sp_thesis` (
  `material_id` int(5) NOT NULL,
  `adviser` varchar(128) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` int(1) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `referred_by` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `picture` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `reserved_material_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `magazine` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sp_thesis`
--
ALTER TABLE `sp_thesis`
  ADD CONSTRAINT `sp_thesis_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
