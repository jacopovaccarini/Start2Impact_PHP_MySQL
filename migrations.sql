-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 30, 2023 alle 16:12
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
-- Struttura della tabella `prestazioni_erogate`
--

CREATE TABLE `prestazioni_erogate` (
  `id` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Tipologia` text NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prestazioni_erogate`
--

INSERT INTO `prestazioni_erogate` (`id`, `Data`, `Tipologia`, `Quantita`) VALUES
(1, '2022-09-12', 'Bonus scuola', 5),
(2, '2022-10-10', 'Bonus teatro', 10),
(3, '2022-09-19', 'Bonus acqua', 3),
(4, '2023-01-01', 'Bonus auto elettrica', 10),
(5, '2022-11-07', 'Bonus tv', 6),
(6, '2022-11-18', 'Bonus bicicletta', 10),
(7, '2022-11-21', 'Bonus pc', 20),
(8, '2023-01-16', 'Bonus bicicletta', 5),
(9, '2023-01-02', 'Bonus fotovoltaico', 3),
(10, '2022-12-26', 'Bonus eolico', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `prestazioni_offerte`
--

CREATE TABLE `prestazioni_offerte` (
  `id` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prestazioni_offerte`
--

INSERT INTO `prestazioni_offerte` (`id`, `Nome`, `Tempo`) VALUES
(1, 'Bonus scuola', 20),
(2, 'Bonus teatro', 50),
(3, 'Bonus acqua', 30),
(4, 'Bonus tv', 40),
(5, 'Bonus bicicletta', 10),
(6, 'Bonus auto elettrica', 60),
(7, 'Bonus illuminazione', 80),
(8, 'Bonus elettricità', 25),
(9, 'Bonus pc', 15),
(10, 'Bonus lavoro', 40),
(11, 'Bonus università', 15),
(12, 'Bonus fotovoltaico', 35),
(13, 'Bonus eolico', 65),
(14, 'Bonus solare', 40),
(15, 'Bonus giardino', 45);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prestazioni_erogate`
--
ALTER TABLE `prestazioni_erogate`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prestazioni_offerte`
--
ALTER TABLE `prestazioni_offerte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prestazioni_erogate`
--
ALTER TABLE `prestazioni_erogate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `prestazioni_offerte`
--
ALTER TABLE `prestazioni_offerte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
