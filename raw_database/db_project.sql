-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2014 at 05:56 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACCOUNT`
--

CREATE TABLE IF NOT EXISTS `ACCOUNT` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `provider` varchar(20) NOT NULL,
  `auth_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `APP`
--

CREATE TABLE IF NOT EXISTS `APP` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_access` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CONTENT`
--

CREATE TABLE IF NOT EXISTS `CONTENT` (
`id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_modified` datetime NOT NULL,
  `shared_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DEVICE`
--

CREATE TABLE IF NOT EXISTS `DEVICE` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `FILE`
--

CREATE TABLE IF NOT EXISTS `FILE` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FOLDER`
--

CREATE TABLE IF NOT EXISTS `FOLDER` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HOMEFOLDER`
--

CREATE TABLE IF NOT EXISTS `HOMEFOLDER` (
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PREFERENCE`
--

CREATE TABLE IF NOT EXISTS `PREFERENCE` (
  `uid` int(11) NOT NULL,
  `alerts` tinyint(1) NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SESSION`
--

CREATE TABLE IF NOT EXISTS `SESSION` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `ip_address` int(11) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `os` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SUBSCRIPTION`
--

CREATE TABLE IF NOT EXISTS `SUBSCRIPTION` (
  `uid` int(11) NOT NULL,
  `started_at` date NOT NULL,
  `space` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `duration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hash_password` char(40) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `VERSION`
--

CREATE TABLE IF NOT EXISTS `VERSION` (
`id` int(11) NOT NULL,
  `fileid` int(11) NOT NULL,
  `hash` varchar(230) NOT NULL,
  `location` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
 ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `APP`
--
ALTER TABLE `APP`
 ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `CONTENT`
--
ALTER TABLE `CONTENT`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DEVICE`
--
ALTER TABLE `DEVICE`
 ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `FILE`
--
ALTER TABLE `FILE`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FOLDER`
--
ALTER TABLE `FOLDER`
 ADD KEY `cid` (`cid`), ADD KEY `id` (`id`);

--
-- Indexes for table `HOMEFOLDER`
--
ALTER TABLE `HOMEFOLDER`
 ADD KEY `uid` (`uid`), ADD KEY `cid` (`cid`), ADD KEY `cid_2` (`cid`);

--
-- Indexes for table `PREFERENCE`
--
ALTER TABLE `PREFERENCE`
 ADD KEY `uid` (`uid`);

--
-- Indexes for table `SESSION`
--
ALTER TABLE `SESSION`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `SUBSCRIPTION`
--
ALTER TABLE `SUBSCRIPTION`
 ADD KEY `uid` (`uid`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `VERSION`
--
ALTER TABLE `VERSION`
 ADD PRIMARY KEY (`id`), ADD KEY `fileid` (`fileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `APP`
--
ALTER TABLE `APP`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `CONTENT`
--
ALTER TABLE `CONTENT`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DEVICE`
--
ALTER TABLE `DEVICE`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `VERSION`
--
ALTER TABLE `VERSION`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
ADD CONSTRAINT `ACCOUNT_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `APP`
--
ALTER TABLE `APP`
ADD CONSTRAINT `APP_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `DEVICE`
--
ALTER TABLE `DEVICE`
ADD CONSTRAINT `DEVICE_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `FILE`
--
ALTER TABLE `FILE`
ADD CONSTRAINT `FILE_ibfk_1` FOREIGN KEY (`id`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `FOLDER`
--
ALTER TABLE `FOLDER`
ADD CONSTRAINT `FOLDER_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FOLDER_ibfk_2` FOREIGN KEY (`id`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `HOMEFOLDER`
--
ALTER TABLE `HOMEFOLDER`
ADD CONSTRAINT `HOMEFOLDER_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `HOMEFOLDER_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `CONTENT` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `PREFERENCE`
--
ALTER TABLE `PREFERENCE`
ADD CONSTRAINT `PREFERENCE_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `SESSION`
--
ALTER TABLE `SESSION`
ADD CONSTRAINT `SESSION_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `SUBSCRIPTION`
--
ALTER TABLE `SUBSCRIPTION`
ADD CONSTRAINT `SUBSCRIPTION_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `USER` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `VERSION`
--
ALTER TABLE `VERSION`
ADD CONSTRAINT `VERSION_ibfk_1` FOREIGN KEY (`fileid`) REFERENCES `FILE` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
