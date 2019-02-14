-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 08:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `categoryId`) VALUES
(21, 'Sports', 'NA', 0),
(22, 'International', 'N/A', 0),
(23, 'National', 'NAI', 0),
(26, 'articel', 'Blogs', 0),
(27, 'Football', '', 21),
(28, 'Cricket', 'N/A', 21),
(29, 'Baminton', 'Nai', 21),
(30, 'Football League ', '', 27),
(31, 'National football', '', 27),
(32, 'Test', 'Null', 28),
(33, 'ODI', 'Null', 28),
(34, 'T20', 'Null', 28),
(36, 'BPL', 'Bangladesh Premiar League', 34),
(37, 'PSL', 'Pakistani Super League', 34),
(38, 'IPL', 'Indian Premiar League', 34),
(40, 'social', '', 26),
(42, 'political', '', 26),
(44, 'business', 'NULL', 26);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `tag`, `dateTime`, `userId`, `categoryId`, `count`) VALUES
(71, 'Manchester United Ole Gunnar Solskjaer says club are looking to win trophies', 'Manchester United ', '2019-01-29 18:45:10', 1, 30, 0),
(73, 'Pakistan captain Sarfraz Ahmed has been banned for four matches after admitting making a racist remark to South Africa all-rounder Andile Phehlukwayo.', 'Pakistan captain', '2019-01-29 21:31:53', 1, 28, 0),
(74, 'Stirling named Irish T20 skipper for Oman and Afghanistan series', 'Irish T20 skipper', '2019-01-29 21:33:28', 1, 34, 0),
(75, 'Virat Kohli A giant stride towards cricketing greatness', 'Virat Kohli ', '2019-01-29 21:35:02', 1, 28, 0),
(76, 'England in West Indies Trevor Bayliss says tourists must be tougher', 'England in West Indies', '2019-01-29 21:37:02', 1, 28, 0),
(77, 'Murder not suicide', 'PBI findings', '2019-02-02 18:40:57', 1, 23, 0),
(78, 'Who is this Hercules', 'Third rape suspect found dead with note hanging around neck', '2019-02-02 18:43:49', 1, 23, 0),
(79, 'Home minister meets Hefajat chief Shafi', 'Unb, Ctg', '2019-02-02 18:45:10', 1, 23, 0),
(81, 'Legal battle begins', 'BB sues Rizal Bank in US court to recover $66m from the Philippines bank; Rizal terms lawsuit \'political stunt\'', '2019-02-02 18:53:59', 1, 44, 0),
(82, 'SSC student murdered', 'Munshiganj', '2019-02-02 18:55:32', 1, 23, 0),
(83, 'Prime Bank brings digital savings account', 'Prime Bank', '2019-02-02 18:57:02', 1, 44, 0),
(84, 'Dynamites found wanting', 'Need win today to have chance of qualifying for playoffs', '2019-02-02 18:59:44', 1, 36, 0),
(85, 'SA prevail by 6 runs', 'South Africa', '2019-02-02 19:03:18', 1, 28, 0),
(86, 'Two Indian pilots die in Mirage crash', 'Mirage crash', '2019-02-02 19:05:43', 1, 22, 0),
(87, 'US suspends INF treaty', 'Reuters, Washington', '2019-02-02 19:07:12', 1, 22, 0),
(88, 'WINGS annual picnic held on 25th January at Sonargaon in Naraingonj.', 'WINGS picnic 2019', '2019-02-10 10:49:09', 6, 23, 0),
(89, 'Liverpool returned to the top of the Premier League with a composed display at Anfield that sent Bournemouth to an eighth successive away defeat.', 'Liverpool returned to the top', '2019-02-11 01:46:09', 6, 27, 0),
(90, 'PSG forward out of Manchester United Champions League tie with broken metatarsal', 'Neymar will be out for 10 weeks', '2019-02-11 01:49:08', 6, 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pagecomments`
--

CREATE TABLE `pagecomments` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagecomments`
--

INSERT INTO `pagecomments` (`id`, `pageId`, `userId`, `dateTime`, `comment`) VALUES
(1, 71, 1, '2019-02-03 22:53:12', 'ssssssssssssssss'),
(2, 71, 1, '2019-02-03 23:00:58', 'ggggggggggggggggggggggggg'),
(3, 73, 1, '2019-02-03 23:07:29', 'Shorforaz akta bhudai...'),
(4, 73, 1, '2019-02-03 23:25:26', 'Shorforaz akta bhudai...'),
(5, 73, 1, '2019-02-03 23:25:38', 'Shorforaz akta bhudai...'),
(8, 73, 1, '2019-02-04 00:07:12', 'à¦¶à¦°à¦«à¦°à¦¾à¦œ à¦–à§‡à¦²à¦¾ à¦ªà¦¾à¦°à§‡ à¦¨à¦¾ à¥¤ à¦¶à¦°à¦«à¦°à¦¾à¦œ à¦à¦•à¦Ÿà¦¾ à¦¬à¦¿à§Ÿà¦¾à¦¦à¦ª...'),
(9, 73, 1, '2019-02-04 00:07:42', 'à¦¶à¦°à¦«à¦°à¦¾à¦œ à¦–à§‡à¦²à¦¾ à¦ªà¦¾à¦°à§‡ à¦¨à¦¾ à¥¤ à¦¶à¦°à¦«à¦°à¦¾à¦œ à¦à¦•à¦Ÿà¦¾ à¦¬à¦¿à§Ÿà¦¾à¦¦à¦ª...'),
(11, 73, 1, '2019-02-04 00:13:14', 'later apologised'),
(13, 73, 1, '2019-02-04 00:27:44', 'He was charged under a part of the section of the code relating to \"conduct (whether through the use of language, gestures or otherwise) which is likely to offend, insult, humiliate, intimidate, threaten, disparage or vilify any reasonable person... on the basis of their race, religion, culture, colour, descent, national or ethnic origin\".'),
(14, 74, 1, '2019-02-04 00:29:13', 'Wilson will miss the tour after being diagnosed with a condition which impacts his vision, although he is expected to make a full recovery.'),
(15, 74, 1, '2019-02-04 00:29:48', 'Tui aktu beshi bujhos shala...!'),
(16, 85, 1, '2019-02-04 00:42:57', 'Hosts South Africa won the first of three T20Is against Pakistan by six runs despite the best effort from Shoaib Malik, whose 31-ball 49 eventually went in vain at Cape Town last night.'),
(17, 87, 1, '2019-02-08 01:22:12', 'ssssssssss'),
(18, 78, 3, '2019-02-08 02:10:18', 'lklklk'),
(19, 87, 3, '2019-02-08 15:17:27', 'withdrawal'),
(20, 87, 3, '2019-02-08 15:38:41', 'sssssssssssssssss'),
(21, 73, 3, '2019-02-09 02:02:31', 'Back-up keeper Mohammad Rizwan, who has taken the gloves in Johannesburg, will remain with the squad for the T20 leg of the tour.'),
(22, 71, 3, '2019-02-09 12:56:34', 'Logic is everything in programming. How easy you can think that much efficiant your software will be....'),
(23, 71, 3, '2019-02-09 12:56:41', 'Logic is everything in programming. How easy you can think that much efficiant your software will be....'),
(24, 73, 1, '2019-02-10 03:03:56', 'à¦¶à¦°à¦«à¦°à¦¾à¦œ à¦–à§‡à¦²à¦¾ à¦ªà¦¾à¦°à§‡ à¦¨à¦¾ à¥¤ à¦¶à¦°à¦«à¦°à¦¾à¦œ à¦à¦•à¦Ÿà¦¾ à¦¬à¦¿à§Ÿà¦¾à¦¦à¦ª...'),
(25, 88, 3, '2019-02-10 11:28:24', 'WINGS is a very nice organization.'),
(26, 88, 3, '2019-02-10 11:30:42', 'WINGS is a very nice organization.'),
(27, 88, 1, '2019-02-10 11:35:14', 'Thank you very much for appreciation...');

-- --------------------------------------------------------

--
-- Table structure for table `pagefile`
--

CREATE TABLE `pagefile` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagefile`
--

INSERT INTO `pagefile` (`id`, `pageId`, `title`, `dateTime`, `file`) VALUES
(2, 73, 'PAK captain', '2019-02-10 02:30:52', 'Top 25 interview questions and answers (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pageimage`
--

CREATE TABLE `pageimage` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageimage`
--

INSERT INTO `pageimage` (`id`, `pageId`, `title`, `dateTime`, `image`) VALUES
(1, 71, 'Neymar', '2019-02-09 21:28:03', 'Neymar vs ausria.jpg'),
(2, 84, 'Dhaka Dynamites', '2019-02-09 21:33:34', 'cricket_logo.jpg'),
(3, 76, 'ENG VS WI', '2019-02-09 21:44:47', 'Windies-696x456.jpg'),
(5, 74, 'IRE vs AFG', '2019-02-09 21:45:38', 'afg vs ire.jpg'),
(6, 75, 'Virat', '2019-02-09 21:46:02', 'top-image53-866x487.jpg'),
(7, 73, 'PAK captain', '2019-02-09 21:46:35', 'GettyImages-1094519978.jpg'),
(8, 85, 'SA vs PAK', '2019-02-09 21:47:05', 'PAKISTAN-CRICKET-640x426.jpg'),
(9, 76, 'ENG VS WI', '2019-02-09 22:42:35', '6acbce31a708de2cefad34d230d0ed57.jpg'),
(13, 87, 'USA', '2019-02-10 02:49:21', 'lead_720_405.jpg'),
(14, 78, 'Tahmid Nishat', '2019-02-10 02:50:49', '14364771_124018413.jpg'),
(15, 88, 'WINGS annual picnic 2019', '2019-02-10 10:50:25', '50713246_237506080507597_8572370254523531264_n.jpg'),
(16, 88, 'WINGS annual picnic 2019', '2019-02-10 14:36:32', '50778343_568541330278978_7318526810986119168_n.jpg'),
(17, 88, 'WINGS annual picnic 2019', '2019-02-10 14:37:21', '50910900_234384690830381_1384990372999987200_n.jpg'),
(18, 88, 'WINGS annual picnic 2019', '2019-02-10 14:37:33', '50959506_2230349673893950_7162733069961527296_n.jpg'),
(19, 88, 'WINGS annual picnic 2019', '2019-02-10 14:37:47', '51141405_299664510739156_8825949427236601856_n.jpg'),
(20, 90, 'Neymar will be out for 10 weeks', '2019-02-11 01:51:05', 'Screenshot_101.png'),
(21, 89, 'Liverpool returned to the top', '2019-02-11 01:51:43', 'Screenshot_100.png');

-- --------------------------------------------------------

--
-- Table structure for table `pagelikes`
--

CREATE TABLE `pagelikes` (
  `userId` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagelikes`
--

INSERT INTO `pagelikes` (`userId`, `pageId`, `dateTime`) VALUES
(1, 71, '2019-02-09 02:41:33'),
(1, 73, '2019-02-09 12:43:37'),
(1, 74, '2019-02-09 02:26:52'),
(1, 75, '2019-02-09 02:41:27'),
(1, 76, '2019-02-09 02:26:56'),
(1, 83, '2019-02-09 19:25:13'),
(1, 85, '2019-02-09 02:39:17'),
(1, 87, '2019-02-09 02:58:13'),
(3, 71, '2019-02-09 17:46:33'),
(3, 73, '2019-02-09 12:52:49'),
(3, 74, '2019-02-09 02:22:17'),
(3, 75, '2019-02-09 02:22:30'),
(3, 76, '2019-02-09 02:22:27'),
(3, 81, '2019-02-09 19:23:16'),
(3, 83, '2019-02-09 19:23:11'),
(3, 85, '2019-02-09 02:26:20'),
(3, 86, '2019-02-09 12:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `cpassword` varchar(500) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `cpassword`, `type`, `creatDate`) VALUES
(1, 'Tahmid Nishat', 'tahmid.ni7@gmail.com', '01822597379', '*473715A3AE531179A9E472A80AC5012CCFEFBBB4', '', 2, '2019-02-08 01:44:58'),
(3, 'MR. User', 'user@system.com', '01683302276', '*A4B6157319038724E3560894F7F932C8886EBFCF', '', 1, '2019-02-08 01:51:13'),
(6, 'MR. Admin', 'admin@system.com', '01822597379', '*77A9373C05212AF11FBDEB4BE80E4C91211E0038', '', 2, '2019-02-08 17:34:55'),
(7, 'Tahmid', 'tahmidone@ymail.com', '01683302276', '*4C951E13CC5E761093F241590580096A2276ECAC', '', 1, '2019-02-08 18:03:39'),
(8, 'Ms User', 'msuser@gmail.com', '01845001048', '*84DBFE9955E990D387CA742D7A290C6A31C81F05', '*84DBFE9955E990D387CA742D7A290C6A31C81F05', 1, '2019-02-13 01:41:19'),
(10, 'Ms User', 'mssuser@gmail.com', '01845001048', '*E861B2490B46F67BB6639FA24D78E41847C6D3D5', '*E861B2490B46F67BB6639FA24D78E41847C6D3D5', 1, '2019-02-13 01:43:27'),
(12, 'Mr Tahmid', 'tahmid@gmail.com', '01683302276', '*A4B6157319038724E3560894F7F932C8886EBFCF', '*A4B6157319038724E3560894F7F932C8886EBFCF', 1, '2019-02-13 01:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `pagecomments`
--
ALTER TABLE `pagecomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagefile`
--
ALTER TABLE `pagefile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageimage`
--
ALTER TABLE `pageimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagelikes`
--
ALTER TABLE `pagelikes`
  ADD PRIMARY KEY (`userId`,`pageId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `pagecomments`
--
ALTER TABLE `pagecomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pagefile`
--
ALTER TABLE `pagefile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pageimage`
--
ALTER TABLE `pageimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
