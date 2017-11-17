-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 17. 11 2017 kl. 22:26:49
-- Serverversion: 5.7.14
-- PHP-version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_dating`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `chatroom`
--

CREATE TABLE `chatroom` (
  `id` int(11) NOT NULL,
  `profile_ID` int(11) NOT NULL,
  `message_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `chatroom`
--

INSERT INTO `chatroom` (`id`, `profile_ID`, `message_ID`) VALUES
(147, 7, 16),
(148, 7, 17),
(149, 7, 18),
(150, 7, 19),
(151, 7, 20),
(152, 7, 21),
(153, 7, 22),
(154, 7, 23),
(155, 7, 24),
(156, 7, 25),
(157, 7, 26),
(158, 7, 27),
(159, 7, 28),
(160, 7, 29),
(161, 7, 30),
(162, 7, 31),
(163, 7, 32),
(164, 7, 33),
(165, 7, 16),
(166, 7, 17),
(167, 7, 18),
(168, 7, 19),
(169, 7, 20),
(170, 7, 21),
(171, 7, 22),
(172, 7, 23),
(173, 7, 24),
(174, 7, 25),
(175, 7, 26),
(176, 7, 27),
(177, 7, 28),
(178, 7, 29),
(179, 7, 30),
(180, 7, 31),
(181, 7, 32),
(182, 7, 33);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `from_ID` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `to_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `comment`
--

INSERT INTO `comment` (`id`, `from_ID`, `message`, `to_ID`) VALUES
(15, '2', 'hey', 1),
(11, '1', ':)', 2);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `follower`
--

CREATE TABLE `follower` (
  `from_ID` int(11) NOT NULL,
  `to_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `follower`
--

INSERT INTO `follower` (`from_ID`, `to_ID`) VALUES
(3, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gift`
--

CREATE TABLE `gift` (
  `from_ID` int(11) NOT NULL,
  `to_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `gift`
--

INSERT INTO `gift` (`from_ID`, `to_ID`, `name`, `picture_name`) VALUES
(1, 2, 'super squerl', 'gift.jpg'),
(1, 1, 'super squerl', 'gift.jpg'),
(2, 1, 'super squerl', 'gift.jpg'),
(2, 1, 'super squerl', 'gift.jpg'),
(2, 1, 'super squerl', 'gift.jpg'),
(2, 2, 'super squerl', 'gift.jpg'),
(3, 3, 'super squerl', 'gift.jpg'),
(3, 1, 'super squerl', 'gift.jpg'),
(3, 1, 'super squerl', 'gift.jpg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `private_message`
--

CREATE TABLE `private_message` (
  `senders_ID` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `reciver_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `profiles`
--

CREATE TABLE `profiles` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(150) NOT NULL,
  `nemisis` varchar(255) DEFAULT NULL,
  `description` text,
  `super_power` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `profiles`
--

INSERT INTO `profiles` (`email`, `username`, `password`, `age`, `nemisis`, `description`, `super_power`, `id`) VALUES
('batman@supermail.com', 'batman', 'stupitclown', 25, 'Stuptd clowns', 'no description', 'money', 1),
('man@super.com', 'Superman', 'password', 2, 'batman probably', 'im only here to steal memes', 'Super human n stuff', 2),
('wonder@supermail.com', 'Wonder woman', 'wwftw', 25, 'none', 'no description', 'super human', 3),
('none', 'martin', 'etewetw', 23, 'semicolons', 'btw this site is sponsored by all sorts of caffeine', 'Admin', 7);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_ID` (`profile_ID`),
  ADD KEY `message_ID` (`message_ID`);

--
-- Indeks for tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_ID` (`from_ID`),
  ADD KEY `to_ID` (`to_ID`);

--
-- Indeks for tabel `follower`
--
ALTER TABLE `follower`
  ADD KEY `from_ID` (`from_ID`),
  ADD KEY `to_ID` (`to_ID`);

--
-- Indeks for tabel `gift`
--
ALTER TABLE `gift`
  ADD KEY `from_ID` (`from_ID`),
  ADD KEY `to_ID` (`to_ID`);

--
-- Indeks for tabel `private_message`
--
ALTER TABLE `private_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senders_ID` (`senders_ID`);

--
-- Indeks for tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- Tilføj AUTO_INCREMENT i tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Tilføj AUTO_INCREMENT i tabel `private_message`
--
ALTER TABLE `private_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Tilføj AUTO_INCREMENT i tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
