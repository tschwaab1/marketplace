-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(5) NOT NULL,
  `text` text NOT NULL,
  `userid` int(5) NOT NULL,
  `offerid` int(5) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `userid`, `offerid`, `timestamp`) VALUES
(1, 'Super geil! 100% trusted, Top Qualitaet!', 1, 1, 1608473499),
(2, 'Super guenstig, gerne wieder! Beste Schweinshaxn!', 1, 2, 1608473534),
(3, 'Beste Wurst meines Lebens <3 ', 2, 1, 1608473600),
(4, 'Alles fake! In wirklichkeit ist das Schweinebraten! KEINE Schweinshaxe!!! VORSICHT SCAM!', 2, 2, 1608473642),
(5, '!!!!!!111111111 SCAM 11111 !!!!!!', 2, 2, 1608473661);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `userid` int(5) NOT NULL,
  `price` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `title`, `descr`, `userid`, `price`) VALUES
(1, 'Wurst Oktoberfest 2019', 'Frische Wurst vom Okotberfest 2019 mit original Obatzter. Wirklich 100% echt, 100% Serioes.\r\nWir verkaufen nur 100% frische Ware von 2019.\r\n\r\nLieferung via UPS Worldwide nur 133,7 Euro\r\nLieferung innerhalb Deutschland, Oesterreich, Schweiz und Suedtirols 13,37 Euro', 1, '1000'),
(2, 'Schweinshaxn frisch!', 'Hier bekommen sie original bayrische Schweinshaxn zum Sonderpreis von 1337 Euro. Inklusive Kartoffelknoedel und Blaukraut. \r\n\r\nLieferung Weltweit inklusive!\r\n\r\nJetzt bestellen!', 1, '1337');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `username`, `password`, `email`, `ip`, `regDate`) VALUES
(1, 'Market', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@marketplace.place', '::1', '0000-00-00 00:00:00'),
(2, 'user', 'name', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@marketplace.user', '::1', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
