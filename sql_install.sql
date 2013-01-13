-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2013 at 01:36 AM
-- Server version: 5.5.14
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joke_kfacebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `facebook_logphoto`
--

CREATE TABLE IF NOT EXISTS `facebook_logphoto` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fb_user` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `like` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `original_link` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_logstatus`
--

CREATE TABLE IF NOT EXISTS `facebook_logstatus` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `message` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `story` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `from_name` text CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `from_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `type` varchar(20) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `created_time` varchar(20) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `application` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_photo`
--

CREATE TABLE IF NOT EXISTS `facebook_photo` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fb_user` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `like` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `original_link` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_status`
--

CREATE TABLE IF NOT EXISTS `facebook_status` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `message` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `story` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `from_name` text CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `from_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `type` varchar(20) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `created_time` varchar(20) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `application` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
