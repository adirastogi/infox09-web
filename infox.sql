-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2009 at 04:59 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infox`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`) VALUES
(1, 'admin', 'CZ7892');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `eventname` varchar(255) NOT NULL,
  `eventid` int(5) NOT NULL,
  `eventtype` enum('Technical','Cultural','Literary','Others') NOT NULL,
  `eventday` int(5) NOT NULL,
  PRIMARY KEY (`eventid`),
  UNIQUE KEY `eventid` (`eventid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventname`, `eventid`, `eventtype`, `eventday`) VALUES
('Java Programming', 125, 'Technical', 1),
('Turnquote', 456, 'Literary', 2),
('Footloose', 789, 'Cultural', 3),
('Mobile Mania', 258, 'Others', 2),
('C programming', 159, 'Technical', 1),
('Linux Challenge', 7588, 'Technical', 2),
('English Debate', 178, 'Literary', 1),
('Street Play', 548, 'Cultural', 3),
('Football', 741, 'Others', 2),
('Robo Challenge', 555, 'Technical', 3),
('General Quiz', 777, 'Literary', 3),
('Fashion Parade', 7, 'Cultural', 1),
('Rock Show', 666, 'Cultural', 2),
('Cricket Mania', 111, 'Others', 1),
('Chess', 333, 'Others', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('planned','declined','pending') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `title`, `contents`, `author_name`, `author_email`, `created_at`, `status`) VALUES
(1, 'Welcome', 'Hi, this is an initial feedback to see that everything works ok. Feel free to delete it after the tutorial is complete.', 'The tutorial creators', NULL, '2008-11-23 23:24:03', 'pending'),
(2, 'Great site!', 'I am very happy with your site', 'Linda', 'me@linda.com', '2008-10-27 17:49:39', 'pending'),
(3, 'I have done it', 'yippee, I have successfully created the comments section. ', 'Aditya', 'addy1injoy', '2009-09-28 14:39:14', 'pending'),
(4, 'hello', 'go to hell', 'aditya', NULL, '2009-09-29 11:33:18', 'pending'),
(5, 'hello', 'sjfksjdfklsjlfjl', 'fjsdfjksdfskjkj', 'sdklfskldfsfjklj', '2009-10-02 04:32:16', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `userevent`
--

CREATE TABLE IF NOT EXISTS `userevent` (
  `username` varchar(11) NOT NULL,
  `eventid` int(5) DEFAULT NULL,
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userevent`
--

INSERT INTO `userevent` (`username`, `eventid`) VALUES
('aditya', 258),
('tushar', 456),
('aditya', 456),
('pankaj', 125),
('tushar', 789),
('tushar', 125),
('malooit', 125),
('malooit', 7588),
('malooit', 548),
('malooit', 456),
('malooit', 258),
('malooit', 741),
('rajan007', 125),
('rajan007', 159),
('rajan007', 548),
('rajan007', 258),
('akash007', 125),
('akash007', 7588),
('akash007', 789),
('akash007', 178),
('akash007', 258),
('guddu007', 7588),
('guddu007', 159),
('charlie', 741),
('charlie', 456),
('charlie', 789),
('charlie', 7588),
('charlie', 125),
('guddu007', 548),
('guddu007', 456),
('guddu007', 258),
('aditya', 548),
('aditya', 555),
('aditya', 125),
('aditya', 741);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `college` text,
  `emailid` varchar(255) NOT NULL,
  `phoneno` int(15) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_3` (`username`),
  UNIQUE KEY `username_4` (`username`),
  KEY `username_2` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`, `college`, `emailid`, `phoneno`) VALUES
('aditya', '4433f9afcca23bf3abd30d6c4e578517', 'aditya rastogi', 'sjksfjsldjflskjfsjdkfsfs', 'sfsdfsdfsdfsdfsfsf', 966633233),
('ankit', '912ec803b2ce49e4a541068d495ab570', 'ankit arora', 'asfafasdfasd', 'afsdagsg', 54465455),
('tushar', '68bbb7e1d70dcb2b4aa076f6521df657', 'gfjgfjgfhjjjj', 'gfhjgjfgjgfjgfjg', 'gfjgfjgfjgfjfjfj', 2147483647),
('gaurav', '29be54a52396750258d886abc5417fda', 'gaurav paliwal', 'USIT', 'gaurav.paliwal1989@gmail.com', 2147483647),
('sidhharth', 'b8c1a3069167247e3503f0daba6c5723', 'sidhharth srivastava', 'USIT', 'akssps01@gmail.com', 2147483647),
('abhayjit', '52e6437a9bfe91e1770f7fe8f3075b13', 'abhayjit', 'USIT', 'abhay@gmail.com', 2147483647),
('asdad', 'd5e59871f86c1a374d6a1873708a8ee6', 'asdasdasd', 'sfsadfasdf', 'asdfasdfasdfasdf', 0),
('adi', '73a90acaae2b1ccc0e969709665bc62f', 'vdfsdfsd', 'sdfsdfsdfsfs', 'sfsfsfs', 0),
('prateek', 'cc3460fbdf75c9693566146e53f5c922', 'prateek', 'USIT', 'fdfhsdjksdjfhfjf', 2147483647),
('gdfgdfsgdg', '55542542b9318fb4a7fd6f7dd8f1a506', NULL, NULL, 'dfgdgdfgdg', NULL),
('pankaj', 'fcd31d30ef9861f9ffa19b1a8f99a817', 'pankaj', 'IIT', 'fshdjsdhk@jfkjdglfg.gdfg.gdf', 0),
('opopert', '23ed78978333589365894092e2daa38a', 'fsdfsdfs', 'ghjghjghjghj', 'sdfsdfasd@fdfffs.gff', NULL),
('dabas1', 'c44a471bd78cc6c2fea32b9fe028d30a', 'dabas', 'USIT', 'dabas@yahoo.co.in', 2147483647),
('malooit', '07c66ef3efc0718f2e9ea1d1efad5a9e', 'Anurag Maloo', 'USIT', 'anu.maloo@gmail.com', 2147483647),
('rajan007', '00dbfbf253332827769bc8cfa915cba6', 'rajan', 'USIT', 'rajan.rovks@gmail.com', 2147483647),
('akash007', 'c1c949f39d8a519b0b974232e35e00b8', 'Akash Mittal', 'USIT', 'akash@gmail.com', 2147483647),
('asdasads', '32d9265c2e3703d89c0ba1fdc256ac38', 'sdfsdfsdf', 'sdfsdfsdfs', 'sdfs@dgfdf.bb', 1231312),
('aditya007', '4433f9afcca23bf3abd30d6c4e578517', 'aditya007', 'fdf', 'aditya007@gmail.com', 45555123),
('aditya001', '11dd2ae35e0a2ba3d28db4e685abcbe1', 'hello', 'fjkjkjj', 'hello@jkjk.vv', 54646546),
('charlie', '4485e1ae494f37df851434ef02af136c', 'guddu', 'USIT', 'charlie@gmail.com', 789456),
('guddu007', 'bf779e0933a882808585d19455cd7937', 'guddu', 'kaminey', 'kaminey@infox.com', 995845623);
