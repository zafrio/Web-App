-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 12:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zarona`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventattend`
--

CREATE TABLE `eventattend` (
  `id` int(11) NOT NULL,
  `eventid` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventcomment`
--

CREATE TABLE `eventcomment` (
  `event_commentid` int(11) NOT NULL,
  `eventid` varchar(256) NOT NULL,
  `eventcomment` varchar(256) NOT NULL,
  `user_comment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `id` int(11) NOT NULL,
  `eventname` varchar(256) NOT NULL,
  `eventdetails` text NOT NULL,
  `eventvenue` varchar(256) NOT NULL,
  `eventtype` varchar(256) NOT NULL,
  `eventimage` varchar(256) NOT NULL,
  `eventdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `account` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `fullname`, `email`, `gender`, `account`) VALUES
(1, 'nabilf', '81dc9bdb52d04dc20036dbd8313ed055', 'nabil', 'nabil', 'male', 'attendee'),
(2, 'nabilfa', '81dc9bdb52d04dc20036dbd8313ed055', 'nabilll', 'farhan', 'male', 'organizer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventattend`
--
ALTER TABLE `eventattend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventcomment`
--
ALTER TABLE `eventcomment`
  ADD PRIMARY KEY (`event_commentid`);

--
-- Indexes for table `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventattend`
--
ALTER TABLE `eventattend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventcomment`
--
ALTER TABLE `eventcomment`
  MODIFY `event_commentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
