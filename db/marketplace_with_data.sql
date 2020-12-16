-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Dez 2020 um 17:27
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `marketplace`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comment`
--

CREATE TABLE `comment` (
  `id` int(5) NOT NULL,
  `text` text NOT NULL,
  `userid` int(5) NOT NULL,
  `offerid` int(5) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offer`
--

CREATE TABLE `offer` (
  `id` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `userid` int(5) NOT NULL,
  `price` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `offer`
--

INSERT INTO `offer` (`id`, `title`, `descr`, `userid`, `price`) VALUES
(1, 'Lederhose', 'Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose Lederhose ', 1, '999'),
(2, 'Weißwürste', 'Blabla Lorem Ipsum Bavaria Impsum wiesn saugrattler bixen pritschn\r\nBlabla Lorem Ipsum Bavaria Impsum wiesn saugrattler bixen pritschn\r\nBlabla Lorem Ipsum Bavaria Impsum wiesn saugrattler bixen pritschn\r\nBlabla Lorem Ipsum Bavaria Impsum wiesn saugrattler bixen pritschn\r\nBlabla Lorem Ipsum Bavaria Impsum wiesn saugrattler bixen pritschn', 1, '121');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
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
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `username`, `password`, `email`, `ip`, `regDate`) VALUES
(1, 'Thomas', 'Schwaab', 'tschwaab', '1811d2606ceb8a3511844d2dd6fe045e', 'thomas@schwaab.bayern', '127.0.0.1', '2020-11-26 13:42:18'),
(2, 'Peter', 'Spasti', 'Pspasti', '3da6216a1d260d0aeb8f852412cbb7d5', 'pspasti@papapa.com', '127.0.0.1', '2020-12-03 06:57:05'),
(3, 'MAul', '#phil', 'pmaul', '1811d2606ceb8a3511844d2dd6fe045e', 'gegafd@ewrer.de', '127.0.0.1', '2020-12-03 06:59:56'),
(4, 'jawohl', 'püter', 'jputer', '1811d2606ceb8a3511844d2dd6fe045e', 'pspssssasti@papapa.com', '127.0.0.1', '2020-12-03 07:03:13');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
