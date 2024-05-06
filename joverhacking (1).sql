-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 06:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joverhacking`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `username`, `ip_address`, `timestamp`) VALUES
(58, 'paws', '::1', '2024-04-30 03:23:35'),
(59, 'paws', '::1', '2024-04-30 03:23:40'),
(60, 'jack', '::1', '2024-04-30 03:38:14'),
(61, 'jaken', '::1', '2024-04-30 04:18:13'),
(62, 'paws', '::1', '2024-04-30 04:26:54'),
(63, 'paws', '::1', '2024-04-30 04:27:31'),
(64, 'paws', '::1', '2024-04-30 05:09:57'),
(65, 'paws', '::1', '2024-04-30 05:46:14'),
(66, 'paws', '::1', '2024-05-01 08:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'paws', '', '$2y$10$RnZN6iBN0p5k6pU6eZyh4e8AfthC./E.pIPYUNtIPa9zQ9Qd0zCEq'),
(2, 'pawsin', '', '$2y$10$FUZHszId6fPvZ.0ZXBMX2eMTBNywHDmATxzsY7gdsyMMfE4hLhNBS'),
(3, 'clark', '', '$2y$10$02TsVQKO0BqbufFMZWYPz.KR/XdW328Zv5WPlxRLGPKRrJ8KeJLzu'),
(4, 'mark', '', '$2y$10$/M74.HawVRtWwP7mk925ZebAc5aZc.l4CdFvb1fX6mwIyzic3hlbe'),
(5, 'admin', '', '$2y$10$Oo0g1sQScosDDkb/kg9jRuRVE7CvGzi.pPZI/nE5Yg42dYyhQM2li'),
(6, 'mark', '', '$2y$10$TqaGV9wiLdTBXXnHmUqPTuRFDZV/ax4tfPluAsscC63OdghLTQOHa'),
(7, 'markus', '', '$2y$10$uAXzW0UGRqWUiZk/SJJ7de6S2ksu.O0ovfJ.f0YwNb1UKc1stkI2m'),
(8, 'cousin', '', '$2y$10$W6NdlyeE7eD20QcNnj7ve.Bg73e2leRSsaJUlPqYY/04PVSb9qFW6'),
(10, 'kol', '', '$2y$10$I6Afww9A4uvShrFAhnDIc.YGMTVQJ.rxcoy/RQA91/7eG3Qoqox6W'),
(11, 'mike', '', '$2y$10$xYD4sw3a250RIpDfNobaN.NlPk1UfNMcz402JGSAKLtcQ2x7Qn2f6'),
(12, 'liken', '', '$2y$10$tSfN8XOis5bsWROLJ6hKEOVWJTQBh7HsU/ogg6C4rG9/jBcl2d/7q'),
(14, 'liken', '', '$2y$10$6Ag53ZpnV9NwZXI/.i2zQ.uuWbz2BbyeAT4uRt1/UPPVivrldc726'),
(16, 'jack', '', '$2y$10$VDyoJCW3vp.okF3rYLmKXO3ffTsA6iTB7VgiWxUyyyVhX6ur12APK'),
(18, 'jacob', '', '$2y$10$XikjXR48NMd3WTc40AvKIuIq6Tt8Bpa4PtqN9x4mdR1DrsReJOAx.'),
(20, 'jaken', '', '$2y$10$RHJqkof7RnzjQM6.k7oXNOdqmedmlcs.xdrm0WwBMpN1vr9qz86mu'),
(21, 'ken', '', '$2y$10$vO.YNEqWoxXbQ8HqvKAxQ.mzssTFCt7Wo3ex/ZperOYaFb0VZCqtC'),
(22, 'joan', '', '$2y$10$.sAXlT.3VTv3I8kut9MHXurjDCqzOzE8pltFS2YzyOJC9XHyiXSQS'),
(23, 'kent', '', '$2y$10$MJvY3Fjl3CwOvpBPfZezy.eQTZfakxrKfkPXXPNXlpEB6xhn06ZvK'),
(24, 'greg', '', '$2y$10$wNggwlz7cGPEXLnYyMKjseCuPDpQ72hXJIleW6cwFxodxR9sEtjHS'),
(25, 'sherwin', '', '$2y$10$3e8hT4c7Y8VFq90v1yhOJOxE814eeNLyAGTCjzeCrhKFLOIWeDGJa'),
(26, 'pawing123123', 'yermedz@gmail.com', '$2y$10$iT73JiqIMxuY0HCyivkXye.m6mh6ODyZKodTGgXmRJCBSK0npLhry'),
(27, 'laxus', '', '$2y$10$bdGHvIGpZyu7qEyBkgc/4eJpTRimnIuxtrhx/286ZEn3wrP342enK'),
(28, 'jelal', '', '$2y$10$FAANO0XXxEvW9Xrm899swex6pGjRAGPqizdkQAifndXyVGaGcSUUq'),
(29, 'paws123132', '', '$2y$10$6N7m2FsMyezmClX64B9m5O2kt1G6Cnn184yr925j7fXgOYgzMd6Du'),
(30, 'paws', '', '$2y$10$8wXZ1OTch54RqJH7bGYQ7ecEKGBMK8Mu8COE/AzYhjyilVB/1gkBC'),
(31, 'paws', '', '$2y$10$NSM9pNU1oHQRL6oQALcK5OPxUNxQVz5F3o.lto9.p9Gfi4d8nWG0.'),
(32, 'paws', '', '$2y$10$j/62WtXGf9OOvrOpWTA5I./IJqZaN8h2/XY3cmcd6blo7bm1MbrNe'),
(33, 'paws', '', '$2y$10$/TTB11CzNlAAStL6JzLj0ucfbPVJsyRPD4NImsIBwPn7zwE.fp2Ui'),
(34, 'paws', '', '$2y$10$mStbRGN.zDTg3RxZibKU9OeqghVuQ9iyUUfAlh0XUuw7.eHjZoJSG'),
(35, 'paws', '', '$2y$10$I/ktwKkIc209gjWdyM6speYXWeH0IIOvn0A4tnSGWXEvqZSu9NvgK'),
(36, 'paws', '', '$2y$10$.ixjbieiz5BCVunazYvOz.whSPDz/OCd5/Q.RWcAN3vnvUOu0wuSq'),
(37, 'paws', '', '$2y$10$fE9wWkJquhTuogMQtH7Bj.4ds7h3lD497r9FFr1iJHSxZYJis7Izq'),
(38, 'paws', '', '$2y$10$MRHqcM59vT5c1qfodclfjeuwbuWi/jx4DQXG1aKKyRfmoensV6Tca'),
(39, 'paws', '', '$2y$10$ZtY1U5chDnFp3dmxjcoic.OcjwJcVJSroIRTh9hN.Jh9UE1ghX2ce'),
(40, 'paws', '', '$2y$10$6SlpmvTCYU.5BzM8ZETP3eM45vj/Pqh9cZR94R5uOC5ZjLlb/v1mq'),
(41, 'paws', '', '$2y$10$DdLBHC9i5b5QxfkpIDzm3.RHR7lDmmGSOkTGR/Gl5WYgI6Zdp0fQa'),
(42, 'paws', '', '$2y$10$LSuIlLJ643HM3JcnAZmv9ec5CKqw5Fiv0APZMm6a.hA.9wHtsEfbK'),
(43, 'paws', '', '$2y$10$qWs12qq/UXxa8u2QXY3n7.AjEEwsbYU8wcj0tALEt8BcUrywygF1a'),
(44, 'paws', '', '$2y$10$tKvWxvYf7g0/h2xeg77LBOxdhgyr3LpRq8717ZurWBMxCwKkirH76'),
(45, 'paws', '', '$2y$10$64C/gJdBwYc6o3fyF8Qf9uDj8k4xO7R3uA0dEd6IejbPBBeLZI7XW'),
(46, 'paws', '', '$2y$10$A.owAVUyYW0cQ0JZhdG0.Obq/E/HnOC58/.2nYs2k5/mdO1ZDHbFu'),
(47, 'paws', '', '$2y$10$EDyQViSR3f95UoWcmisR7OrBOv.IQp7pEWwcbC5lyE90.m1v5gjQ.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
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
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
