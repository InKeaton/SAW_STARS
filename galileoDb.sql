-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2024 at 03:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galileoDb`
--
CREATE DATABASE IF NOT EXISTS `galileoDb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `galileoDb`;

-- --------------------------------------------------------

--
-- Table structure for table `CONSTELLATION`
--

DROP TABLE IF EXISTS `CONSTELLATION`;
CREATE TABLE `CONSTELLATION` (
  `consID` varchar(36) NOT NULL DEFAULT uuid(),
  `consName` varchar(36) NOT NULL,
  `startDate` date NOT NULL DEFAULT current_timestamp(),
  `endDate` date NOT NULL DEFAULT current_timestamp() CHECK (`endDate` >= `startDate`),
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `REVIEW`
--

DROP TABLE IF EXISTS `REVIEW`;
CREATE TABLE `REVIEW` (
  `reviewID` varchar(36) NOT NULL DEFAULT uuid(),
  `starFK` varchar(36) NOT NULL,
  `userFK` varchar(36) NOT NULL,
  `vote` int(11) NOT NULL CHECK (`vote` >= 0 and `vote` <= 5),
  `note` varchar(1000) NOT NULL,
  `revDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `REVIEW`
--
DROP TRIGGER IF EXISTS `INSERTREVIEW`;
DELIMITER $$
CREATE TRIGGER `INSERTREVIEW` BEFORE INSERT ON `REVIEW` FOR EACH ROW BEGIN
	IF((SELECT COUNT(*) FROM SUB AS S WHERE S.userFK = NEW.userFK AND S.starFK = NEW.starFK) < 1) THEN
       SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'User not sub to this star, inert fail'; 	
    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `STAR`
--

DROP TABLE IF EXISTS `STAR`;
CREATE TABLE `STAR` (
  `starID` varchar(36) NOT NULL DEFAULT uuid(),
  `consFK` varchar(36) NOT NULL,
  `starName` varchar(50) NOT NULL,
  `dLY` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SUB`
--

DROP TABLE IF EXISTS `SUB`;
CREATE TABLE `SUB` (
  `subID` varchar(36) NOT NULL DEFAULT uuid(),
  `userFK` varchar(36) NOT NULL,
  `starFK` varchar(36) NOT NULL,
  `startDate` date DEFAULT current_timestamp(),
  `life` int(10) NOT NULL CHECK (`life` > 0 AND `life` <= 12)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
CREATE TABLE `USER` (
  `userID` varchar(36) NOT NULL DEFAULT uuid(),
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
  `createDate` datetime NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CONSTELLATION`
--
ALTER TABLE `CONSTELLATION`
  ADD PRIMARY KEY (`consID`),
  ADD UNIQUE KEY `consName` (`consName`);

--
-- Indexes for table `REVIEW`
--
ALTER TABLE `REVIEW`
  ADD PRIMARY KEY (`reviewID`),
  ADD UNIQUE KEY `starFK` (`starFK`,`userFK`),
  ADD KEY `userFK` (`userFK`);

--
-- Indexes for table `STAR`
--
ALTER TABLE `STAR`
  ADD PRIMARY KEY (`starID`),
  ADD UNIQUE KEY `starName` (`starName`),
  ADD KEY `consFK` (`consFK`);

--
-- Indexes for table `SUB`
--
ALTER TABLE `SUB`
  ADD PRIMARY KEY (`subID`),
  ADD UNIQUE KEY `subUKFK` (`starFK`,`userFK`),
  ADD KEY `userFK` (`userFK`),
  ADD KEY `starFK` (`starFK`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `REVIEW`
--
ALTER TABLE `REVIEW`
  ADD CONSTRAINT `REVIEW_ibfk_1` FOREIGN KEY (`starFK`) REFERENCES `STAR` (`starID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REVIEW_ibfk_2` FOREIGN KEY (`userFK`) REFERENCES `USER` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `STAR`
--
ALTER TABLE `STAR`
  ADD CONSTRAINT `STAR_ibfk_1` FOREIGN KEY (`consFK`) REFERENCES `CONSTELLATION` (`consID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SUB`
--
ALTER TABLE `SUB`
  ADD CONSTRAINT `SUB_ibfk_1` FOREIGN KEY (`userFK`) REFERENCES `USER` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SUB_ibfk_2` FOREIGN KEY (`starFK`) REFERENCES `STAR` (`starID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
