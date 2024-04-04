-- Opprett database hvis den ikke finnes
CREATE DATABASE IF NOT EXISTS kundeservice;

-- Brukerinformasjonstabell
CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  'Admin' INT(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`) VALUES
('Tony', '1234', 'anthony@example.com');

ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Tabell for saker
CREATE TABLE IF NOT EXISTS saker (
    `Sak_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Saksnummer` VARCHAR(20) UNIQUE NOT NULL,
    `Beskrivelse` TEXT,
    PRIMARY KEY (`Sak_ID`)
);

INSERT INTO `saker` (`Saksnummer`, `Beskrivelse`) VALUES
('12345', 'Description 1'),
('67890', 'Description 2');

COMMIT;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 09:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



