-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 09:22 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--
CREATE TABLE `bdl_test`.`admin_message` ( `ID` INT NOT NULL AUTO_INCREMENT , `MobileNumber` VARCHAR(20) NOT NULL , `Name` VARCHAR(100) NOT NULL, `Message` TEXT NOT NULL ) ENGINE = InnoDB
CREATE TABLE `donation` (
  `member_id` int(11) DEFAULT NULL,
  `donation_id` int(11) NOT NULL,
  `date_of_donation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`member_id`, `donation_id`, `date_of_donation`) VALUES
(2, 1, '2016-12-23'),
(2, 2, '2016-11-22');
-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `Area` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `bloodgroup` varchar(500) NOT NULL,
  `regestrationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastdate_of_donation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `profile_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `Area`, `city`, `address`, `bloodgroup`, `regestrationdate`, `lastdate_of_donation`, `profile_status`) VALUES
(1, 'Abdul Moeed', 'Airline Society', 'Lahore', '', 'AB+', '2016-12-01 04:43:30', '0000-00-00 00:00:00', 1),
(2, 'Sara', 'sector', 'Islamabad', '', 'O+', '2016-12-01 06:33:38', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_text` varchar(700) NOT NULL,
  `city` varchar(100) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `mobileNumber` varchar(500) NOT NULL,
  `password` text NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `mobileNumber`, `password`, `isAdmin`) VALUES
(1, NULL, '03137313412', 'Abdul', 1),
(2, NULL, '090078601', 'sara', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
