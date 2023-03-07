-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 07, 2023 alle 21:32
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonny`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `services_offered`
--

CREATE TABLE `services_offered` (
  `id` int(11) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `services_offered`
--

INSERT INTO `services_offered` (`id`, `Name`, `Time`) VALUES
(1, 'School bonus', 20),
(2, 'Theater bonus', 50),
(3, 'Water bonus', 30),
(4, 'Tv bonus', 40),
(5, 'Bike bonus', 10),
(6, 'Electric car bonus', 60),
(7, 'Illumination bonus', 80),
(8, 'Electricity bonus', 25),
(9, 'Pc bonus', 15),
(10, 'Job bonus', 40),
(11, 'University bonus', 15),
(12, 'Photovoltaic bonus', 35),
(13, 'Wind bonus', 65),
(14, 'Garden bonus', 45),
(15, 'Solar bonus', 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `services_provided`
--

CREATE TABLE `services_provided` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Typology` text COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `services_provided`
--

INSERT INTO `services_provided` (`id`, `Date`, `Typology`, `Quantity`) VALUES
(1, '2022-09-12', 'School bonus', 5),
(2, '2022-10-10', 'Theater bonus', 10),
(3, '2022-09-19', 'Water bonus', 3),
(4, '2023-01-01', 'Electric car bonus', 10),
(5, '2022-11-07', 'Tv bonus', 6),
(6, '2022-11-18', 'Bike bonus', 10),
(7, '2022-11-21', 'Pc bonus', 20),
(8, '2023-01-16', 'Bike bonus', 5),
(9, '2023-01-02', 'Photovoltaic bonus', 3),
(10, '2022-12-26', 'Wind bonus', 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `services_offered`
--
ALTER TABLE `services_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `services_provided`
--
ALTER TABLE `services_provided`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `services_offered`
--
ALTER TABLE `services_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `services_provided`
--
ALTER TABLE `services_provided`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
