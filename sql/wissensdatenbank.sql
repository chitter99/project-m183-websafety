-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Mai 2018 um 07:45
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wissensdatenbank`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `speicherOrt` varchar(50) NOT NULL,
  `isHub` varchar(1) DEFAULT NULL,
  `eventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `attachment`
--

INSERT INTO `attachment` (`id`, `name`, `speicherOrt`, `isHub`, `eventId`) VALUES
(1, 'pic02test.jpg', 'localhost', NULL, 0),
(2, 'pic02test.jpg', 'localhost', '1', 0),
(3, 'pic07.jpg', 'localhost', '1', 0),
(4, 'pic06test.jpg', 'localhost', '1', 0),
(5, 'pic04test.jpg', 'localhost', '1', 0),
(6, 'pic01test.jpg', 'localhost', '1', 0),
(7, 'pic03test.jpg', 'localhost', '1', 0),
(8, 'pic01.jpg', 'localhost', '1', 0),
(9, 'pic03.jpg', 'localhost', '1', 0),
(10, 'Logo_Test.png', 'localhost', '1', 0),
(11, 'pic01.jpg', 'localhost', '1', 0),
(12, 'rom.jpg', '', '1', 0),
(13, 'pic06.jpg', 'localhost', '1', 0),
(14, 'Denis_Rykart_BW648.jpg', 'hierundda', '1', 0),
(15, 'Denis_Rykart_BW648.jpg', 'hierundda', '1', 3),
(16, 'Denis_Rykart_BW648.jpg', 'hierundda', '1', 11),
(17, 'Denis_Rykart_BW648.jpg', 'hierundda', '1', 12),
(18, 'Denis_Rykart_BW648.jpg', 'hierundda', '1', 13),
(19, 'Denis_Rykart_BW648.jpg', 'hierundda', '1', 14),
(20, 'sjam.gif', 'hierundda', '1', 24),
(21, 'earth.gif', 'hierundda', '1', 25),
(22, 'pic01.jpg', 'hierundda', '1', 26),
(23, '', 'hierundda', '1', 26),
(24, 'pic13.jpg', 'hierundda', '1', 26),
(25, 'pic02.jpg', 'hierundda', '1', 27),
(26, 'pic05test.jpg', 'hierundda', '1', 28),
(27, 'earth.gif', 'hierundda', '1', 29),
(28, 'pic05.jpg', 'hierundda', '1', 30),
(29, 'pic01test.jpg', 'hierundda', '1', 31),
(30, 'pic02.jpg', 'hierundda', '1', 32),
(31, 'pic06.jpg', 'hierundda', '1', 33),
(32, 'pic07.jpg', 'hierundda', '1', 34),
(33, '1522821710_Upload.jpg', 'hierundda', '1', 35),
(34, '1522821710_Upload.jpg', 'hierundda', '1', 36),
(35, '23be651b-fb08-4fb6-8f5d-6', 'hierundda', '1', 37),
(36, '23be651b-fb08-4fb6-8f5d-6', 'hierundda', '1', 38);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `eventTitel` varchar(50) NOT NULL,
  `beschreibung` text NOT NULL,
  `start` datetime NOT NULL,
  `ende` datetime DEFAULT NULL,
  `ort` varchar(255) NOT NULL,
  `youtubeVideoId` varchar(255) NULL,
  `userId` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `event`
--

INSERT INTO `event` (`id`, `eventTitel`, `beschreibung`, `start`, `ende`, `ort`, `youtubeVideoId`, `userId`, `enable`) VALUES
(30, 'Claudia', 'Claudia ist cool.Claudia', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bahnhofstrasse, 8001 Zürich', NULL,15, 0),
(31, 'erster', 'Das ist ein Test von Erster.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bahnhofstrasse, 8001 Zürich', NULL, 16, 0),
(32, 'zweiter', 'Das ist ein Test von Zweiter.', '2018-04-15 03:34:00', '2018-04-18 23:34:00', 'Bahnhofstrasse, 8001 Zürich', NULL, 17, 1),
(33, 'dritter', 'Das ist ein Test von Dritter.', '2018-04-26 03:24:00', '3432-03-04 04:24:00', 'Bahnhofstrasse, 8001 Zürich ', NULL, 18, 1),
(34, 'Claudia 2', 'Claudia 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bahnhofstrasse, 8001 Zürich', NULL, 15, 0),
(35, 'Claudia 3', 'Claudia 3', '2018-04-06 23:21:00', '0000-00-00 00:00:00', 'Bahnhofstrasse, 8001 Zürich', NULL, 15, 1),
(37, 'Mein Event ist voellig cool', 'fhslhfalsfhalskdfjhjksd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bahnhofstrasse, 8001 Zürich', NULL, 16, 0),
(38, 'Claudia 4', 'hfkladhfaklshfk dhsfhkh', '0000-00-00 00:00:00', '3454-04-05 04:34:00', 'Bahnhofstrasse, 8001 Zürich', NULL, 15, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favoriteevent`
--

CREATE TABLE `favoriteevent` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `favoriteevent`
--

INSERT INTO `favoriteevent` (`id`, `userId`, `eventId`) VALUES
(43, 0, 32),
(44, 15, 32);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `keytable`
--

CREATE TABLE `keytable` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `key` varchar(50) NOT NULL,
  `enableTo` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `keytable`
--

INSERT INTO `keytable` (`id`, `fk_user`, `key`, `enableTo`) VALUES
(23, 15, '7209aa29e9dab494bb7135324768374a', '2018-05-04 11:57:02.036017');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `vorname` varchar(25) NOT NULL,
  `nachname` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `vorname`, `nachname`, `email`, `passwort`) VALUES
(14, 'test', 'test', 'test@test3', '$2y$10$DLkvumBe4bpxmtGqUNyLbu8Ef2zxJRgvISAWaL.fngjk7Q49Sv7S6'),
(15, 'Claudia', 'Carv', 'claudia.carvalho@hotmail.de', '$2y$10$RBt2t2UH.WtAKogsC/Qfn.xurWUlDt0mXVRq5k8d.A9zPQLdBckaq'),
(16, 'erster', 'erster', 'erster@1', '$2y$10$fCIrfofgjQJKMtCQxpkhBOKPWllqESXibA1CuFlbCt2.5D7t15Gt.'),
(17, 'zweiter', 'z', 'claudia.carvalho.paula@gmail.com', '$2y$10$kECX5U7Eg.q0h7Q6SB6uOOnFJO82NA2Nh5JEnSjJ1KoDfVRI0/CLm'),
(18, 'dritter', 'd', 'dritter@3', '$2y$10$FkMSbuSoV/LaqELuNsCBeuKaBmEpjdygVsLvngGjo7fwfVazy2mOG');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `favoriteevent`
--
ALTER TABLE `favoriteevent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`,`eventId`);

--
-- Indizes für die Tabelle `keytable`
--
ALTER TABLE `keytable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_user` (`fk_user`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT für Tabelle `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `favoriteevent`
--
ALTER TABLE `favoriteevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT für Tabelle `keytable`
--
ALTER TABLE `keytable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
