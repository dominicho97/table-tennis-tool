-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 mei 2019 om 16:23
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ping-pong`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `booking_time` datetime DEFAULT NULL,
  `chalange` tinyint(1) DEFAULT NULL,
  `chalenged_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `bookings`
--

INSERT INTO `bookings` (`id`, `users_id`, `booking_time`, `chalange`, `chalenged_user`) VALUES
(204, 1, '2019-04-29 11:00:00', 0, 0),
(205, 1, '2019-04-29 11:05:00', 0, 0),
(206, 1, '2019-04-29 11:10:00', 1, 3),
(207, 1, '2019-04-30 15:30:00', 0, 0),
(208, 1, '2019-05-01 11:00:00', 0, 0),
(210, 5, '2019-05-01 11:05:00', 0, 0),
(211, 6, '2019-05-01 11:10:00', 1, 1),
(212, 6, '2019-05-01 12:30:00', 0, 0),
(216, 5, '2019-05-01 12:40:00', 0, 0),
(219, 5, '2019-05-03 11:00:00', 0, 0),
(221, 5, '2019-05-02 15:30:00', 1, 6),
(224, 4, '2019-05-02 15:00:00', 0, 0),
(225, 4, '2019-05-01 12:10:00', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(42) NOT NULL,
  `pauze_1` time NOT NULL,
  `pauze_2` time NOT NULL,
  `pauze_3` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `pauze_1`, `pauze_2`, `pauze_3`) VALUES
(1, 'lamar', '11:00:00', '12:30:00', '15:30:00'),
(2, 'idk', '10:30:00', '12:10:00', '15:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `password`, `room`) VALUES
(1, 'jimmy', 'jimmy@jimmy.com', 'jimmy', 1),
(2, 'me', 'me@me.com', 'me', 2),
(3, 'zip', 'zip@zipper.com', 'zipper', 1),
(4, 'cat', 'cat@cat.com', 'cat', 2),
(5, 'kyoma', 'kyoma@kyoma.com', 'kyoma', 1),
(6, 'zim', 'zim@babwe.com', 'babwe', 1),
(7, 'bill', 'bill@bob.com', 'bob', 2),
(8, 'ty', 'ty@ty.cqm', 'ty', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bookings_users_idx` (`users_id`);

--
-- Indexen voor tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT voor een tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
