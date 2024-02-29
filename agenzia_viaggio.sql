-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 20, 2024 alle 09:23
-- Versione del server: 8.0.26
-- Versione PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Struttura della tabella `agenzia_viaggio`
--
DROP DATABASE IF EXISTS arnoldi;
CREATE DATABASE arnoldi;
USE arnoldi;
CREATE TABLE `agenzia_viaggio` (
  `codice` varchar(7) NOT NULL,
  `luogo` varchar(40) NOT NULL,
  `adulti_mp` double NOT NULL,
  `adulti_pc` double NOT NULL,
  `bambini_mp` double NOT NULL,
  `bambini_pc` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `agenzia_viaggio`
--

INSERT INTO `agenzia_viaggio` (`codice`, `luogo`, `adulti_mp`, `adulti_pc`, `bambini_mp`, `bambini_pc`) VALUES
('RI00001', 'Rimini', 80, 120, 50, 60),
('TE00012', 'Teramo', 50, 80, 31.5, 45.72),
('SSL0041', 'Santa Maria di Leuca', 91.6, 110.5, 45.8, 80.12),
('ALA5500', 'Alassio', 70.5, 90.3, 50, 71.12),
('COU0001', 'Courmayeur', 140.5, 210.2, 80.7, 145.5),
('SPTERME', 'San Pellegrino Terme', 70, 100, 35, 50);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `agenzia_viaggio`
--
ALTER TABLE `agenzia_viaggio`
  ADD PRIMARY KEY (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
