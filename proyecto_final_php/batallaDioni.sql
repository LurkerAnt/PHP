-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2020 at 01:22 AM
-- Server version: 8.0.20-0ubuntu0.20.04.1
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
-- Database: `batallaDioni`
--
CREATE DATABASE IF NOT EXISTS `batallaDioni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `batallaDioni`;

-- --------------------------------------------------------

--
-- Table structure for table `personajes`
--

DROP TABLE IF EXISTS `personajes`;
CREATE TABLE IF NOT EXISTS `personajes` (
  `id_personaje` int NOT NULL AUTO_INCREMENT,
  `nombre_personaje` varchar(50) NOT NULL,
  `clase_personaje` varchar(100) NOT NULL,
  `poder_personaje` int NOT NULL,
  `vida_personaje` int NOT NULL,
  PRIMARY KEY (`id_personaje`),
  UNIQUE KEY `id_personaje` (`id_personaje`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personajes`
--

INSERT INTO `personajes` (`id_personaje`, `nombre_personaje`, `clase_personaje`, `poder_personaje`, `vida_personaje`) VALUES
(1, 'Borceguil', 'Barbaro', 18, 15),
(2, 'JOVEN MANUEL', 'POKEMON', 1, 2),
(3, 'Mochito', 'Gatazo', 18, 15),
(4, 'Mortito', 'Gatete', 18, 14),
(5, 'Triyo', 'Lider', 1, 10),
(6, 'Mago', 'Gnomo', 13, 15),
(7, 'Bárbara', 'Patata', 15, 12),
(8, 'Nombre', 'Clase', 18, 6),
(9, 'pepe', 'Clase', 15, 18),
(10, 'Nombre', 'Clase', 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `puntuaciones`
--

DROP TABLE IF EXISTS `puntuaciones`;
CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `id_puntuacion` int NOT NULL AUTO_INCREMENT,
  `nombre_personaje` varchar(50) NOT NULL,
  `clase_personaje` varchar(100) NOT NULL,
  `puntos_personaje` int NOT NULL,
  PRIMARY KEY (`id_puntuacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `puntuaciones`
--

INSERT INTO `puntuaciones` (`id_puntuacion`, `nombre_personaje`, `clase_personaje`, `puntos_personaje`) VALUES
(1, 'Mochito', 'Gatazo', 11),
(2, 'Mortito', 'Gatete', 21);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
