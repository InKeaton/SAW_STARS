-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2024 at 03:21 PM
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

CREATE TABLE IF NOT EXISTS `CONSTELLATION` (
  `consID` varchar(36) NOT NULL DEFAULT uuid(),
  `consName` varchar(36) NOT NULL,
  `startDate` date NOT NULL DEFAULT current_timestamp(),
  `endDate` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(1000) NOT NULL,
  `consImg` varchar(30) NOT NULL,
  PRIMARY KEY (`consID`),
  UNIQUE KEY `consName` (`consName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CONSTELLATION`
--

INSERT INTO `CONSTELLATION` (`consID`, `consName`, `startDate`, `endDate`, `description`, `consImg`) VALUES
('e92891a7-bfd1-11ee-9ccc-e86f3893ce31', 'ccc', '2024-01-18', '2024-01-10', 'Arun', 'Mathiyalakan'),
('e928a723-bfd1-11ee-9ccc-e86f3893ce31', 'cccss', '2023-02-01', '2023-02-02', 'ccadadsasdasdasdadsadsadscccccccccccccccccccccccccccc', 'ccc'),
('e928a779-bfd1-11ee-9ccc-e86f3893ce31', 'asd', '2001-02-23', '2001-02-23', '123123', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `REVIEW`
--

CREATE TABLE IF NOT EXISTS `REVIEW` (
  `reviewID` varchar(36) NOT NULL DEFAULT uuid(),
  `starFK` varchar(36) NOT NULL,
  `userFK` varchar(36) NOT NULL,
  `vote` int(11) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `revDate` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`reviewID`),
  UNIQUE KEY `starFK` (`starFK`,`userFK`),
  KEY `userFK` (`userFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `STAR`
--

CREATE TABLE IF NOT EXISTS `STAR` (
  `starID` varchar(36) NOT NULL DEFAULT uuid(),
  `consFK` varchar(36) NOT NULL,
  `starName` varchar(50) NOT NULL,
  `dLY` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`starID`),
  UNIQUE KEY `starName` (`starName`),
  KEY `consFK` (`consFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `STAR`
--

INSERT INTO `STAR` (`starID`, `consFK`, `starName`, `dLY`, `price`) VALUES
('97a31a97-c009-11ee-9ccc-e86f3893ce31', 'e92891a7-bfd1-11ee-9ccc-e86f3893ce31', 'friday99@outlook.it', 12, 1245);

-- --------------------------------------------------------

--
-- Table structure for table `SUB`
--

CREATE TABLE IF NOT EXISTS `SUB` (
  `subID` varchar(36) NOT NULL DEFAULT uuid(),
  `userFK` varchar(36) NOT NULL,
  `subName` varchar(20) NOT NULL,
  `startDate` date DEFAULT current_timestamp(),
  `life` int(10) NOT NULL,
  PRIMARY KEY (`subID`),
  UNIQUE KEY `subName` (`subName`),
  KEY `userFK` (`userFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SUB`
--

INSERT INTO `SUB` (`subID`, `userFK`, `subName`, `startDate`, `life`) VALUES
('0c1a8378-c059-11ee-ad7c-e86f3893ce31', '08144321-bfbd-11ee-9ccc-e86f3893ce31', 'sad', '2024-02-13', 155),
('1c9d4c11-c058-11ee-ad7c-e86f3893ce31', '08144321-bfbd-11ee-9ccc-e86f3893ce31', 'fra.matao@outlook.it', '2024-01-31', 12),
('2d0a7b97-c05b-11ee-ad7c-e86f3893ce31', '08144321-bfbd-11ee-9ccc-e86f3893ce31', 'cc', '2024-01-11', 100),
('5a5c5182-c05c-11ee-ad7c-e86f3893ce31', '08144321-bfbd-11ee-9ccc-e86f3893ce31', 'ccs', '2024-01-31', 12),
('5b4d29f3-c058-11ee-ad7c-e86f3893ce31', '08144321-bfbd-11ee-9ccc-e86f3893ce31', 'fra.matao@sad.it', '2024-01-31', 12),
('e0757aac-c057-11ee-ad7c-e86f3893ce31', '08144321-bfbd-11ee-9ccc-e86f3893ce31', '', '2024-01-31', 12);

-- --------------------------------------------------------

--
-- Table structure for table `SUBSTAR`
--

CREATE TABLE IF NOT EXISTS `SUBSTAR` (
  `substarID` varchar(36) NOT NULL DEFAULT uuid(),
  `starFK` varchar(36) NOT NULL,
  `subFK` varchar(36) NOT NULL,
  PRIMARY KEY (`substarID`),
  UNIQUE KEY `starFK` (`starFK`,`subFK`),
  KEY `subFK` (`subFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SUBSTAR`
--

INSERT INTO `SUBSTAR` (`substarID`, `starFK`, `subFK`) VALUES
('a439ca16-c066-11ee-ad7c-e86f3893ce31', '97a31a97-c009-11ee-9ccc-e86f3893ce31', 'e0757aac-c057-11ee-ad7c-e86f3893ce31');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `userID` varchar(36) NOT NULL DEFAULT uuid(),
  `role` bit(1) DEFAULT b'0',
  `email` varchar(50) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `img` varchar(150) DEFAULT NULL,
  `createdDate` datetime DEFAULT curdate(),
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`userID`, `role`, `email`, `pwd`, `firstName`, `lastName`, `img`, `createdDate`) VALUES
('08144321-bfbd-11ee-9ccc-e86f3893ce31', b'0', 'fra.matao@outlook.it', '$2y$10$rUYLL1JMLJ3Z3QM4CMjh2OBuxD12h4PzW/2SP8d0XAfhM6dlyjLKS', 'Arun', 'Mathiyalakan', '', '2024-01-30 00:00:00'),
('0f87cc40-bfc6-11ee-9ccc-e86f3893ce31', b'0', 'el', '$2y$10$qLvD66jmMY5DNOaum0ITR.E3YIACUWe.kqVnWBpbfpGyYEEgYt7gu', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('110107d1-be51-11ee-a276-e86f3893ce31', b'0', 'aaaaaassaaaaaaaaaaaaaaa@asdassssssssssssssd.com', 'aalaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafabeto', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('19c1aff9-be3d-11ee-a276-e86f3893ce31', b'0', 'asdsdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('2a738046-bfbd-11ee-9ccc-e86f3893ce31', b'0', 'fra.matan@outlook.it', '$2y$10$hvvnFX9uGxoNUwKstrxSMOvSBQf5oUas1SkkoP.Vq94t5GNoVAXP2', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-30 00:00:00'),
('2d252162-be52-11ee-a276-e86f3893ce31', b'0', 'fra.matano@outlook.it', 'francescoFrancescoFrancesco', 'fra', 'matano', 'sissa.jpg', '2024-01-29 00:00:00'),
('2ec9cf6e-be44-11ee-a276-e86f3893ce31', b'0', '(\'email\')', '(\'pwd\')', '(\'firstName\')', '(\'lastName\')', '(\'img\')', '2024-01-29 00:00:00'),
('2f71ab4d-be51-11ee-a276-e86f3893ce31', b'0', 's@asdassssssssssssssd.com', 'w', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('387cfd7b-be36-11ee-a276-e86f3893ce31', b'0', 'asd', 'asdsdads', 'ASDASDA', 'AAAAAAAAA', 'asdasdasdsad', '2024-01-29 00:00:00'),
('405a9be3-bfc5-11ee-9ccc-e86f3893ce31', b'0', 'email', '$2y$10$U8PZLPBP.eilBmAATNmdde5Q0XlvlsM/xmq4Yrsms46HTdho5p9OG', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('40bdf87d-c068-11ee-ad7c-e86f3893ce31', b'0', 'porav@o.it', '$2y$10$dneAVXTzAlA2TeCaZDXW2uDjrE3BKrsRJexQBPaYnsiOCySuetmYC', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00'),
('4ea2e66c-be43-11ee-a276-e86f3893ce31', b'0', 'asdsdasdasdadasdasda@sdasdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('5b4b5b23-bfbd-11ee-9ccc-e86f3893ce31', b'0', 'fra.man@outlook.it', '$2y$10$pCRrT4IMhTzSEu2WEMru7eHoQrrcy8nowij9tetFF2ujC5MPxPbHm', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-30 00:00:00'),
('60176070-be43-11ee-a276-e86f3893ce31', b'0', 'asdsdasdasdadasdasda@sasdasdasddasdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('6ab630cd-bfc5-11ee-9ccc-e86f3893ce31', b'0', 'emil', '$2y$10$E8VsNKfL0V4k6edk4HIDaOXmwoN2P1HZdrL1LeUPreGvByKUg9r8G', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('80ecbb43-be43-11ee-a276-e86f3893ce31', b'0', 'asdsadasdasdasdasdasdasdasdasdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('89752eb8-bfc5-11ee-9ccc-e86f3893ce31', b'0', 'eml', '$2y$10$EXy4LZnSy.A3m4Gv1/6tqe/zbyllALeFLdQXVFWtq8TF6.f/N9oVK', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('8c0aae1b-c066-11ee-ad7c-e86f3893ce31', b'0', 'friday99@outlook.it', '$2y$10$8iDWuC1Ilj.U0SxJWIaXzODfVywzreY/VuYhy6sGZD64xrciUAx6C', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00'),
('98d523a1-be87-11ee-a276-e86f3893ce31', b'0', 'frasss.matano@outlook.it', 'francescoFrancescoFrancesco', 'fra', 'matano', 'sissa.jpg', '2024-01-30 00:00:00'),
('9de4d0dc-bfd4-11ee-9ccc-e86f3893ce31', b'0', 'friday9@outlook.it', '$2y$10$99mAyOmgQSdtg5z7oI1rLuDtzcR5.rzl5zs69la3vGFD8gbzxiF5u', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00'),
('aa4f90bf-bfc6-11ee-9ccc-e86f3893ce31', b'0', 'l', '$2y$10$VudGc5A5LwBVEhrHea8rKOeMidGkO9N9rIP6.X9xGynfeqIWJFC5u', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('b2b3f062-bfbd-11ee-9ccc-e86f3893ce31', b'0', 'fra.n@outlook.it', '$2y$10$WX81t1OWBUcZgL6pKyGMeeDUcR2vtfKe8G2L/nejEHvDSe.CO4T4K', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-30 00:00:00'),
('ba4399e2-be45-11ee-a276-e86f3893ce31', b'0', 'asdasdasdasd@asdasd.com', 'aalfabeto', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('ce972b59-be50-11ee-a276-e86f3893ce31', b'0', 'aaaaaaaaaaaaaaaaaaaaa@asdassssssssssssssd.com', 'aalaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafabeto', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('fdf513f6-c066-11ee-ad7c-e86f3893ce31', b'0', 'friday99@ouok.it', '$2y$10$7FzWZLrumSCzxqSTSAJV6eaHqryEMy5V/2M1FjsQ.bGQ.amEedsn.', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00');

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
  ADD CONSTRAINT `SUB_ibfk_1` FOREIGN KEY (`userFK`) REFERENCES `USER` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SUBSTAR`
--
ALTER TABLE `SUBSTAR`
  ADD CONSTRAINT `SUBSTAR_ibfk_1` FOREIGN KEY (`subFK`) REFERENCES `SUB` (`subID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SUBSTAR_ibfk_2` FOREIGN KEY (`starFK`) REFERENCES `STAR` (`starID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
