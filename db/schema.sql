-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2024 at 01:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
DROP DATABASE IF EXISTS galileoDb;

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
  `endDate` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(1000) NOT NULL,
  `consImg` varchar(30) NOT NULL
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

DROP TABLE IF EXISTS `REVIEW`;
CREATE TABLE `REVIEW` (
  `reviewID` varchar(36) NOT NULL DEFAULT uuid(),
  `starFK` varchar(36) NOT NULL,
  `userFK` varchar(36) NOT NULL,
  `vote` int(11) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `revDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `STAR`
--

INSERT INTO `STAR` (`starID`, `consFK`, `starName`, `dLY`, `price`) VALUES
('11bfa3bc-c1a5-11ee-ad7c-e86f3893ce31', 'e92891a7-bfd1-11ee-9ccc-e86f3893ce31', '[value-3]', 12, 23),
('97a31a97-c009-11ee-9ccc-e86f3893ce31', 'e92891a7-bfd1-11ee-9ccc-e86f3893ce31', 'friday99@outlook.it', 12, 1245),
('c995bc01-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '1', 12, 13),
('f011fe0b-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '2', 12, 13),
('f0137c52-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '11', 12, 13),
('f0150fbb-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '12', 12, 13),
('f015df2b-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '13', 12, 13),
('f0168919-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '14', 12, 13),
('f017bae0-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '15', 12, 13),
('f018732c-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '16', 12, 13),
('f0195a1c-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '17', 12, 13),
('f01a5018-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '18', 12, 13),
('f01af44f-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '19', 12, 13),
('f01ba88a-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '20', 12, 13),
('f01ca53d-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '21', 12, 13),
('f01d494e-c19e-11ee-ad7c-e86f3893ce31', 'e928a723-bfd1-11ee-9ccc-e86f3893ce31', '22', 12, 13);

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
  `life` int(10) NOT NULL
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
  `lastName` varchar(50) NOT NULL,
  `img` varchar(150) DEFAULT 'userImg.png' NOT NULL,
  `createDate` datetime DEFAULT curdate() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`userID`, `role`, `email`, `pwd`, `firstName`, `lastName`, `img`, `createDate`) VALUES
('000bb777-c1c7-11ee-ad7c-e86f3893ce31', 0, 'eogcn@xnmfdtgvph.tws', '$2y$10$RvFZxRD2pUCaNMXE6jHX7O707ZqNUM5YgC1uYbL6XaEKOOmsMEOvG', 'Dmxodypbv', 'Wgkurwjlt', 'userImg.png', '2024-02-03 00:00:00'),
('05d205e8-c1c8-11ee-ad7c-e86f3893ce31', 0, 'pmcue@vzfhjtuqlb.mes', '$2y$10$pgJdz.NMl5sZiPKClWm2hu.QAf5ejFxlTODH4fX8gru66ycfcnWXu', 'Ukydzqfrt', 'Agbphslaf', 'userImg.png', '2024-02-03 00:00:00'),
('08144321-bfbd-11ee-9ccc-e86f3893ce31', 0, 'fra.matao@outlook.it', '$2y$10$rUYLL1JMLJ3Z3QM4CMjh2OBuxD12h4PzW/2SP8d0XAfhM6dlyjLKS', 'Arun', 'Mathiyalakan', '', '2024-01-30 00:00:00'),
('086bbe4c-c1c7-11ee-ad7c-e86f3893ce31', 0, 'trsop@jhwyutsgxe.qho', '$2y$10$EZFWpblgQI9pRWKlfV84Me2io9ZaSt4Lscx9/rgu6f6.i9MNymipm', 'Sgadhrocv', 'Sjuvclxfy', 'userImg.png', '2024-02-03 00:00:00'),
('0f87cc40-bfc6-11ee-9ccc-e86f3893ce31', 0, 'el', '$2y$10$qLvD66jmMY5DNOaum0ITR.E3YIACUWe.kqVnWBpbfpGyYEEgYt7gu', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('1012b5e6-c1c7-11ee-ad7c-e86f3893ce31', 0, 'aywxt@fusmcyxjaw.ywl', '$2y$10$yZNSY9ehPLmDYOa8DbXgluoDqemAmd5bXhkTLEt1YquNfXjPjN7Jm', 'Idmpnyfzt', 'Eugtzawnm', 'userImg.png', '2024-02-03 00:00:00'),
('110107d1-be51-11ee-a276-e86f3893ce31', 0, 'aaaaaassaaaaaaaaaaaaaaa@asdassssssssssssssd.com', 'aalaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafabeto', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('180f005e-c1d2-11ee-ad7c-e86f3893ce31', 0, 'leo@outlook.it', '$2y$10$BvEBAhkMi6u6ck0su85f/.3gzRraTXPrPgEUlGScDAFgofI0KUmb.', 'asd', 'asd', 'userImg.png', '2024-02-03 00:00:00'),
('19c1aff9-be3d-11ee-a276-e86f3893ce31', 0, 'asdsdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('1ad467be-c1d1-11ee-ad7c-e86f3893ce31', 0, 'fra.matano@outlook.com', '$2y$10$ump26/BWvKfDoHla3Jwtw.yhEFUu7m0B7cxAlIrlxARy6ZB7xxwna', 'asd', 'asd', 'userImg.png', '2024-02-03 00:00:00'),
('1aeb5a0c-c1d7-11ee-ad7c-e86f3893ce31', 0, 'p@p.com', '$2y$10$sRI0XVAwsIoD2m5G.Kg0GeXeaLbnMr6zAuyh5bFJfv4BOkWKqekAm', 'asd', 'asd', 'userImg.png', '2024-02-04 00:00:00'),
('210b9b1c-c1c8-11ee-ad7c-e86f3893ce31', 0, 'qjwiy@aybktuqdih.pcd', '$2y$10$XTchbG6H3DD1ZjOZml9YTO3Q1A2QmpruzI7JPeNk00skVVDQL7B3S', 'Lowdqtuvi', 'Pjvrmpynq', 'userImg.png', '2024-02-03 00:00:00'),
('23f52085-c1c7-11ee-ad7c-e86f3893ce31', 0, 'gmodf@ykpqdrawvm.qvx', '$2y$10$I8IfZXoTOjsY39opMbeRZ.zbAB/vT/Bj78TuWrlFAyqNPKJxpcLii', 'Hycpumoaj', 'Wyidzmbcg', 'userImg.png', '2024-02-03 00:00:00'),
('27923b12-c1d8-11ee-ad7c-e86f3893ce31', 0, 'f@r.m', '$2y$10$qhe98kAo5dkhp6joQdVNs.eGpTmEyJehYfXxb3IiQaLopssJwwjh.', 'asd', 'asd', 'userImg.png', '2024-02-04 00:00:00'),
('2a738046-bfbd-11ee-9ccc-e86f3893ce31', 0, 'fra.matan@outlook.it', '$2y$10$hvvnFX9uGxoNUwKstrxSMOvSBQf5oUas1SkkoP.Vq94t5GNoVAXP2', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-30 00:00:00'),
('2aa0239a-c1c7-11ee-ad7c-e86f3893ce31', 0, 'duqxc@hqlxbprstw.fpa', '$2y$10$mnSCpiaSJjvTIT61eKPl2O5Kua0xYWAO0iGhA6oAKtyIjBdFNWrEu', 'Cuxtdcnja', 'Uzboaptdf', 'userImg.png', '2024-02-03 00:00:00'),
('2b9d44c3-c1c7-11ee-ad7c-e86f3893ce31', 0, 'ntwvy@glhwayrcqm.wnf', '$2y$10$NgmhgvIEiU2wVv4GnCio6eiaC0Fw1zDc2B9/6jrmyGo71zrNWrsZq', 'Wzplayecr', 'Pqkoanmrf', 'userImg.png', '2024-02-03 00:00:00'),
('2be5cb04-c1c7-11ee-ad7c-e86f3893ce31', 0, 'ainsf@vbiomqekpl.crv', '$2y$10$E4fXyKqW9w/E3bV36HNm1Ol8TbPzH.ynZujuDPiagi2GTTDoqLeX2', 'Yxvokmhgi', 'Dytldiukp', 'userImg.png', '2024-02-03 00:00:00'),
('2c22622a-c1c7-11ee-ad7c-e86f3893ce31', 0, 'bpiuf@dmptswkhqn.pjx', '$2y$10$cxvziUaLxJnkyMarcnxN.OkWxjGzdLkRqTaq/MxQnMITJzayO6TGK', 'Fzkpjxrws', 'Yfzkymcau', 'userImg.png', '2024-02-03 00:00:00'),
('2c624c76-c1c7-11ee-ad7c-e86f3893ce31', 0, 'ykthg@vegkauyrfj.zho', '$2y$10$ORgFj4cTysR9isqoc8OiEe6PI9MtzxYYJJJ0csqlq2cz5NhKuPxl.', 'Gcdwtgxiy', 'Hvowedlzi', 'userImg.png', '2024-02-03 00:00:00'),
('2d252162-be52-11ee-a276-e86f3893ce31', 0, 'fra.matano@outlook.it', 'francescoFrancescoFrancesco', 'fra', 'matano', 'sissa.jpg', '2024-01-29 00:00:00'),
('2d801cc7-c1c8-11ee-ad7c-e86f3893ce31', 0, 'cnidt@cozjbpteau.rhu', '$2y$10$uIbs1V81e5aWos54IbpGqebTX.Xd/Cl4Vqkj5wxLQ8wKQ/hCuj/S6', 'Mqruchiem', 'Orqhdvapz', 'userImg.png', '2024-02-03 00:00:00'),
('2ec9cf6e-be44-11ee-a276-e86f3893ce31', 0, '(\'email\')', '(\'pwd\')', '(\'firstName\')', '(\'lastName\')', '(\'img\')', '2024-01-29 00:00:00'),
('2f71ab4d-be51-11ee-a276-e86f3893ce31', 0, 's@asdassssssssssssssd.com', 'w', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('35257097-c1c7-11ee-ad7c-e86f3893ce31', 0, 'mdvcn@reaosqvtbk.mtk', '$2y$10$1iPX6XVbm7p74N74ikPoWOaU7/oqrAXDoEMFUVZII59XWQNT.vnn2', 'Jpmvdkwfi', 'Irlaxqnsf', 'userImg.png', '2024-02-03 00:00:00'),
('387cfd7b-be36-11ee-a276-e86f3893ce31', 0, 'asd', 'asdsdads', 'ASDASDA', 'AAAAAAAAA', 'asdasdasdsad', '2024-01-29 00:00:00'),
('3f386ac4-c1c6-11ee-ad7c-e86f3893ce31', 0, 'ekhxl@nwgxyhptej.mwz', '$2y$10$qACFx39pAAB1mAm6wBADLeKdT81c.2W51JNISp35i0EoWCILOXXma', 'Zkicrfpgw', 'Eamopsjdr', 'userImg.png', '2024-02-03 00:00:00'),
('3f8a3bf5-c1c6-11ee-ad7c-e86f3893ce31', 0, 'xhgrk@wgkcmnrzqi.sub', '$2y$10$Z9o.chyuFGA0gZNqfQdtC.ri.8py5YqPFyJfpRazVv4l3fmCVrrQ2', 'Cqmxktazh', 'Ijolqpgum', 'userImg.png', '2024-02-03 00:00:00'),
('3fcd6aff-c1c6-11ee-ad7c-e86f3893ce31', 0, 'zekdo@ptfnvoghar.jek', '$2y$10$AT8WnttUsUoZV71ERPKlLOCoNT7ktCc8DB0azZFuvyj0uCQuJGFAq', 'Ridjmtbzc', 'Wjekznyvl', 'userImg.png', '2024-02-03 00:00:00'),
('401097d5-c1c6-11ee-ad7c-e86f3893ce31', 0, 'buahg@gsfovkmrhc.fzw', '$2y$10$pNLTsxXFg7YqGn0tcuwupuQzJmcJMEF5FERRknhNtr0QZTBahHw3m', 'Wvutrscxi', 'Vqrzdewbo', 'userImg.png', '2024-02-03 00:00:00'),
('405a9be3-bfc5-11ee-9ccc-e86f3893ce31', 0, 'email', '$2y$10$U8PZLPBP.eilBmAATNmdde5Q0XlvlsM/xmq4Yrsms46HTdho5p9OG', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('40bdf87d-c068-11ee-ad7c-e86f3893ce31', 0, 'porav@o.it', '$2y$10$dneAVXTzAlA2TeCaZDXW2uDjrE3BKrsRJexQBPaYnsiOCySuetmYC', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00'),
('46515c52-c1c7-11ee-ad7c-e86f3893ce31', 0, 'nfdem@aubnzmowhg.teb', '$2y$10$3ZGKq9tW.MjQE.Eo7TqkEOkG2MBUyEWvh2DnF3N/hQuAAl47X7uDS', 'Uqmncoile', 'Chfjblawm', 'userImg.png', '2024-02-03 00:00:00'),
('4ea2e66c-be43-11ee-a276-e86f3893ce31', 0, 'asdsdasdasdadasdasda@sdasdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('50a2c551-c1c7-11ee-ad7c-e86f3893ce31', 0, 'vjspk@veskwdhxjf.kdw', '$2y$10$9rpXI8/PrGzwSrkFi4ApfuOFBvMBWh0YEeN59Ni8WYPsyjCiEelA.', 'Amfneviqj', 'Evuwtfrzb', 'userImg.png', '2024-02-03 00:00:00'),
('5b4b5b23-bfbd-11ee-9ccc-e86f3893ce31', 0, 'fra.man@outlook.it', '$2y$10$pCRrT4IMhTzSEu2WEMru7eHoQrrcy8nowij9tetFF2ujC5MPxPbHm', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-30 00:00:00'),
('60176070-be43-11ee-a276-e86f3893ce31', 0, 'asdsdasdasdadasdasda@sasdasdasddasdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('6ab630cd-bfc5-11ee-9ccc-e86f3893ce31', 0, 'emil', '$2y$10$E8VsNKfL0V4k6edk4HIDaOXmwoN2P1HZdrL1LeUPreGvByKUg9r8G', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('6c3b1af2-c1c7-11ee-ad7c-e86f3893ce31', 0, 'jcqzd@tlzwacjsev.nvt', '$2y$10$vBAUjnSo83qq4K3R3SJU/e0wA3407BrZGCyQk5kA.xEUDSzT0F4xy', 'Wbkdcrfau', 'Keslicrny', 'userImg.png', '2024-02-03 00:00:00'),
('6cda07c1-c1c7-11ee-ad7c-e86f3893ce31', 0, 'cydxi@fpsycitzjx.ian', '$2y$10$MZeNMdz68Usy42tAQwS7wOq80NHIcEmnku8n91sJIidH6kWyVDjd.', 'Fzjphdbie', 'Eubviorel', 'userImg.png', '2024-02-03 00:00:00'),
('6cded1d8-c1cb-11ee-ad7c-e86f3893ce31', 0, 'feffo@mail.com', '$2y$10$ylOYM5532yuiHzI6TK6Tjump7LxlKGF/pbSUeKaeDCfxqmYABg1Zq', 'asd', 'asd', 'userImg.png', '2024-02-03 00:00:00'),
('6cf4780a-c1c7-11ee-ad7c-e86f3893ce31', 0, 'iqeuc@nglbzdektw.ohv', '$2y$10$CCf085OxUmObWr9/cJd1buUH9xdEcCiecBzb2uQ31UNMNLLI/VIG.', 'Oivnjehwt', 'Vushfoyte', 'userImg.png', '2024-02-03 00:00:00'),
('6d0f2038-c1c7-11ee-ad7c-e86f3893ce31', 0, 'hnjtv@twmhqjuepi.xdt', '$2y$10$KU6btasCnSCeYzPlYcJlze8eo1odEelMggXoZjpdUpXfY8d21pnBi', 'Hyisfrhpw', 'Sfpegruxm', 'userImg.png', '2024-02-03 00:00:00'),
('6d28e986-c1c7-11ee-ad7c-e86f3893ce31', 0, 'rsfce@wetkcazlbi.eqj', '$2y$10$ZASII0kVERzfcTQ.Yn9kIuV2O33ePHPhor1H74wKt/j0tQIe4e02u', 'Xxkqzupmd', 'Mhotjupnx', 'userImg.png', '2024-02-03 00:00:00'),
('6d4397ff-c1c7-11ee-ad7c-e86f3893ce31', 0, 'hjltb@wncpmuhrog.ztk', '$2y$10$.C1hzkJl6.NF6p9scxaX8OPmquIehqCGytWwigwHiBvIRMPMPANkq', 'Afctvyauw', 'Iuzmoihnp', 'userImg.png', '2024-02-03 00:00:00'),
('6d71d3ff-c1c7-11ee-ad7c-e86f3893ce31', 0, 'bvkdu@yqvohbatng.yrk', '$2y$10$xF4.JSwGNz55PU2fUnRrbeRhAxiRUwMnPfS1zIgv7728VWIz3wN/K', 'Gkvwqzcst', 'Clithymqx', 'userImg.png', '2024-02-03 00:00:00'),
('6d8ef572-c1c7-11ee-ad7c-e86f3893ce31', 0, 'snewx@ptisckbfgu.zhu', '$2y$10$qgw7qJLcBneAPmNe3vjPDu6KjjVIL4eiwZIH0rjgUAZn0.hPH6GzO', 'Prlqgczxw', 'Glsfwyrbj', 'userImg.png', '2024-02-03 00:00:00'),
('6da66c1c-c1c7-11ee-ad7c-e86f3893ce31', 0, 'kpjsm@nezqfvhopt.bwy', '$2y$10$eECMq0ZqV3HpdG1EKFgqROOvltgtkvjBlsceyd41hkq9EQVRikNBG', 'Aeptdwyxr', 'Kgnhcfwju', 'userImg.png', '2024-02-03 00:00:00'),
('6dbe3d5f-c1c7-11ee-ad7c-e86f3893ce31', 0, 'jlirg@nrypebawmc.myu', '$2y$10$IBoJa8BJPeEzWIf/BDut9uU6dpplQg3dhU0oqLDG78Q/pQqYotS6m', 'Cwcufsean', 'Rrhkgtfpa', 'userImg.png', '2024-02-03 00:00:00'),
('71d8d3c6-c1c8-11ee-ad7c-e86f3893ce31', 0, 'vzikw@gtjrbzymwx.ntf', '$2y$10$5rCrMXdikEDQQC4j00cPxeia30kMINlCUA7a/pj49OvrOGCUY056O', 'Abkjamxlp', 'Aetuorkjh', 'userImg.png', '2024-02-03 00:00:00'),
('7861133d-c1c8-11ee-ad7c-e86f3893ce31', 0, 'nemga@fymxltisev.tnm', '$2y$10$D08t2j/xhp7PXq3Uw5m6P.aQpXJulMaQkkpFy2jU/5CeyxNOaqjVa', 'Ljsdmwxir', 'Vvrhuxsbw', 'userImg.png', '2024-02-03 00:00:00'),
('808747fc-c1d6-11ee-ad7c-e86f3893ce31', 0, 'asd@asd.com', '$2y$10$IFPMEaTc13WxqlUOK06sz.Zo92I9tH82W/.HCxd110q9Bk/OdRHXy', 'asd', 'asd', 'userImg.png', '2024-02-04 00:00:00'),
('80ecbb43-be43-11ee-a276-e86f3893ce31', 0, 'asdsadasdasdasdasdasdasdasdasdasd', 'asdddddddddddddddddddddddsdasdasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd.png', '2024-01-29 00:00:00'),
('89752eb8-bfc5-11ee-9ccc-e86f3893ce31', 0, 'eml', '$2y$10$EXy4LZnSy.A3m4Gv1/6tqe/zbyllALeFLdQXVFWtq8TF6.f/N9oVK', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('8b70ee11-c1c7-11ee-ad7c-e86f3893ce31', 0, 'ufbra@vgnxcjtemk.zlk', '$2y$10$k8xe.ds.6iM6jkc435mFfulULFpxumAxl9CiG/zjVflRK4kuEWkBy', 'Cbgualmzt', 'Jcbewrizk', 'userImg.png', '2024-02-03 00:00:00'),
('8c0aae1b-c066-11ee-ad7c-e86f3893ce31', 0, 'friday99@outlook.it', '$2y$10$8iDWuC1Ilj.U0SxJWIaXzODfVywzreY/VuYhy6sGZD64xrciUAx6C', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00'),
('91f9a78b-c1c7-11ee-ad7c-e86f3893ce31', 0, 'sfjtl@tnipsgvubj.fjw', '$2y$10$NclJbLHCPhJT4ogrUyJ.s.AEDx8bNIw4INRftZ18/h8JZMGbuqAMm', 'Cmuvpjhli', 'Vqbezlmko', 'userImg.png', '2024-02-03 00:00:00'),
('98c2de53-c1c7-11ee-ad7c-e86f3893ce31', 0, 'irwam@kmyhatczqi.kzd', '$2y$10$z16qH0VvDoJbwYgIMXMZxOSQOhNyKodZAOsgq0ZJbvrCjgxWE2Ekq', 'Scmqdizwj', 'Jwzlketag', 'userImg.png', '2024-02-03 00:00:00'),
('98d523a1-be87-11ee-a276-e86f3893ce31', 0, 'frasss.matano@outlook.it', 'francescoFrancescoFrancesco', 'fra', 'matano', 'sissa.jpg', '2024-01-30 00:00:00'),
('9b2bb951-c1c8-11ee-ad7c-e86f3893ce31', 0, 'kwtuz@lrgjeuiwdp.apu', '$2y$10$U53B5RrGmUwcFnI8n/5Nde2BVYxDVxK64NyQM4XONNANwwJsKEr/G', 'Iuvpkdgba', 'Zdjuftpok', 'userImg.png', '2024-02-03 00:00:00'),
('9de4d0dc-bfd4-11ee-9ccc-e86f3893ce31', 0, 'friday9@outlook.it', '$2y$10$99mAyOmgQSdtg5z7oI1rLuDtzcR5.rzl5zs69la3vGFD8gbzxiF5u', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00'),
('a45edd7e-c1c7-11ee-ad7c-e86f3893ce31', 0, 'ixchd@ovzmhrwtla.jlg', '$2y$10$pz4p.rLTOXBbyjgUpQd02etPN8AVPF4Ln4ouuop4tjs2FN1dIilea', 'Vgrtndjkz', 'Ohjqkozxb', 'userImg.png', '2024-02-03 00:00:00'),
('a8967536-c1d6-11ee-ad7c-e86f3893ce31', 0, 'p@email.com', '$2y$10$MCVJ.CzX1fmcT6yynu7dWeBovgGxsiKCXxvOR7nqZ9tHN9aEcHCsy', 'asd', 'asd', 'userImg.png', '2024-02-04 00:00:00'),
('aa4f90bf-bfc6-11ee-9ccc-e86f3893ce31', 0, 'l', '$2y$10$VudGc5A5LwBVEhrHea8rKOeMidGkO9N9rIP6.X9xGynfeqIWJFC5u', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-31 00:00:00'),
('ab065991-c1c7-11ee-ad7c-e86f3893ce31', 0, 'gwcvm@mlxpavezbw.cbp', '$2y$10$oixUV1yAcRxGMyT2WiF/P.E24Yy3uIvX8HWQ6vr7T1mhkdFNV./HC', 'Xgrzthpbq', 'Fhikvfzlx', 'userImg.png', '2024-02-03 00:00:00'),
('ae04e393-c1c6-11ee-ad7c-e86f3893ce31', 0, 'lqvtj@caysginejb.neb', '$2y$10$HlfdSpkWJMDpkHrG.QLSA.HE5guj/WDJwhNxeUpVRaUDAU5NDRCAi', 'Zaoxvymci', 'Ntkcahbxu', 'userImg.png', '2024-02-03 00:00:00'),
('b10f6a5a-c1c7-11ee-ad7c-e86f3893ce31', 0, 'mezsr@mhjtficgwe.bsx', '$2y$10$yIgXFIaEWbF0Kbymgb7cq.rgCUFy5hOwGr5YDUxypzriULI6S/Iyq', 'Flrdyuxpk', 'Vnjrygmzk', 'userImg.png', '2024-02-03 00:00:00'),
('b2b3f062-bfbd-11ee-9ccc-e86f3893ce31', 0, 'fra.n@outlook.it', '$2y$10$WX81t1OWBUcZgL6pKyGMeeDUcR2vtfKe8G2L/nejEHvDSe.CO4T4K', 'firstName', 'lastName', 'https://ui-avatars.com/api/?name=firstName+lastName&background=random', '2024-01-30 00:00:00'),
('ba4399e2-be45-11ee-a276-e86f3893ce31', 0, 'asdasdasdasd@asdasd.com', 'aalfabeto', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('cd1f738a-c1c6-11ee-ad7c-e86f3893ce31', 0, 'srjwg@eucwatyshx.zjg', '$2y$10$.wze7LrS1YrWognxlnA6leLQKiwuBr4Ch97ox7wo/El2M6EtYuwHy', 'Ashbjracy', 'Lgmseycao', 'userImg.png', '2024-02-03 00:00:00'),
('ce972b59-be50-11ee-a276-e86f3893ce31', 0, 'aaaaaaaaaaaaaaaaaaaaa@asdassssssssssssssd.com', 'aalaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafabeto', 'sadasd', 'asd', 'asdasd', '2024-01-29 00:00:00'),
('d45ba96f-c1c7-11ee-ad7c-e86f3893ce31', 0, 'lvagi@wzgynhfrjl.wgk', '$2y$10$GpVr2BcHYsyXM5BT8cjcA.b9qzyU8TAOdF5NnvPYmlkFV3L/fSSwC', 'Quntjwqis', 'Wqbkotjsm', 'userImg.png', '2024-02-03 00:00:00'),
('d5e912ef-c1c6-11ee-ad7c-e86f3893ce31', 0, 'paiky@xtrghzfcov.lrd', '$2y$10$0Sknd05NC2qapASHDWorCO9dKIRHc0z3Z6JXxHFXGBb.zCN8Nhv4S', 'Ojetcqymn', 'Uaxgwvzfk', 'userImg.png', '2024-02-03 00:00:00'),
('e292492a-c1c7-11ee-ad7c-e86f3893ce31', 0, 'rivwm@bqzlcxkumt.gfq', '$2y$10$WKh7M0GpDIIbjUxqC1Ega.yzKfzqG7NdLuTQRwuE8oPoZBp3fv13y', 'Cnsmahdzj', 'Nbqxphogc', 'userImg.png', '2024-02-03 00:00:00'),
('f500b461-c1c6-11ee-ad7c-e86f3893ce31', 0, 'kpfsc@qewtbnxicp.goe', '$2y$10$P.53OZ7B/VRiXja9KDIUm..cYnfrzxpXitaQ/2i60lyKwoA5xQsEi', 'Uhmbfenlt', 'Ohdizqcjw', 'userImg.png', '2024-02-03 00:00:00'),
('fb50b75b-c1c7-11ee-ad7c-e86f3893ce31', 0, 'lzrhq@idncqmlkho.lau', '$2y$10$H8Ubb.ZMjRRfM5s4yC7rIu/Y8HvzPcQT9qxsYwO4y4CqihxJOE/Lm', 'Kljroznfe', 'Crxmqfphb', 'userImg.png', '2024-02-03 00:00:00'),
('fdf513f6-c066-11ee-ad7c-e86f3893ce31', 0, 'friday99@ouok.it', '$2y$10$7FzWZLrumSCzxqSTSAJV6eaHqryEMy5V/2M1FjsQ.bGQ.amEedsn.', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random', '2024-01-31 00:00:00');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;