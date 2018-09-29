-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-09-29 15:24:12
-- 服务器版本： 5.6.37-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_szvone_cn`
--

-- --------------------------------------------------------

--
-- 表的结构 `clerk`
--

CREATE TABLE IF NOT EXISTS `clerk` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `password` text NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `clerk`
--

INSERT INTO `clerk` (`id`, `userName`, `password`, `permission`) VALUES
(1, 'root', '123456', '1'),
(2, 'yellow', '123456', '0');

-- --------------------------------------------------------

--
-- 表的结构 `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `password` text NOT NULL,
  `registerName` text NOT NULL,
  `email` text NOT NULL,
  `workPlace` text NOT NULL,
  `workWeb` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- 表的结构 `fl`
--

CREATE TABLE IF NOT EXISTS `fl` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- 表的结构 `pl`
--

CREATE TABLE IF NOT EXISTS `pl` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `web` text NOT NULL,
  `nr` text NOT NULL,
  `date` text NOT NULL,
  `ip` text NOT NULL,
  `wzid` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL,
  `key` text NOT NULL,
  `vlaue` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `setting`
--

INSERT INTO `setting` (`id`, `key`, `vlaue`) VALUES
(1, 'qq', '7876632'),
(2, 'github', 'https://github.com/szvone'),
(3, 'about', '<p>vone @2017</p>\n<p>爱生活，爱编程</p>\n'),
(4, 'foot', '@2017 Powered by vone!'),
(5, 'title', 'vone个人博客'),
(6, 'login', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `wz`
--

CREATE TABLE IF NOT EXISTS `wz` (
  `id` int(11) NOT NULL,
  `bt` text NOT NULL,
  `fl` text NOT NULL,
  `zy` text NOT NULL,
  `nr` text NOT NULL,
  `date` text NOT NULL,
  `zz` text NOT NULL,
  `hot` int(11) NOT NULL,
  `keyworld` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=gbk;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fl`
--
ALTER TABLE `fl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pl`
--
ALTER TABLE `pl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wz`
--
ALTER TABLE `wz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clerk`
--
ALTER TABLE `clerk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fl`
--
ALTER TABLE `fl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pl`
--
ALTER TABLE `pl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wz`
--
ALTER TABLE `wz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
