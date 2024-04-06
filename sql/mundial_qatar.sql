-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-11-2022 a las 22:23:23
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundial_qatar`
--
CREATE DATABASE IF NOT EXISTS `mundial_qatar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mundial_qatar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `grupo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_pais_1` int(4) NOT NULL,
  `id_pais_2` int(4) NOT NULL,
  `resultado_1` int(2) DEFAULT NULL,
  `resultado_2` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pais_1_partido_fk` (`id_pais_1`),
  KEY `pais_2_partido_fk` (`id_pais_2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `puntos` int(4) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas`
--

DROP TABLE IF EXISTS `apuestas`;
CREATE TABLE IF NOT EXISTS `apuestas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_partido` int(4) NOT NULL,
  `id_persona` int(4) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `apuesta_1` int(2) NOT NULL,
  `apuesta_2` int(2) NOT NULL,
  `puntuacion` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apuesta_persona_fk` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD CONSTRAINT `apuesta_partido_fk` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `apuesta_persona_fk` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`);

--  
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `pais_1_partido_fk` FOREIGN KEY (`id_pais_1`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `pais_2_partido_fk` FOREIGN KEY (`id_pais_2`) REFERENCES `paises` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
