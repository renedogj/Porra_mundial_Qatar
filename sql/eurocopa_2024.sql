-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-06-2024 a las 20:41:05
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
  `ganador` int(11) DEFAULT NULL,
  `puntuacion` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apuesta_persona_fk` (`id_persona`),
  KEY `apuesta_partido_fk` (`id_partido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas_clasificacion`
--

DROP TABLE IF EXISTS `apuestas_clasificacion`;
CREATE TABLE IF NOT EXISTS `apuestas_clasificacion` (
  `id_persona` int(4) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `puesto_1` int(4) DEFAULT NULL,
  `puesto_2` int(4) DEFAULT NULL,
  `puesto_3` int(4) DEFAULT NULL,
  `puesto_4` int(4) DEFAULT NULL,
  `puntuacion` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `puesto_1_apuestas_clasificacion_fk` (`puesto_1`),
  KEY `puesto_2_apuestas_clasificacion_fk` (`puesto_2`),
  KEY `puesto_3_apuestas_clasificacion_fk` (`puesto_3`),
  KEY `puesto_4_apuestas_clasificacion_fk` (`puesto_4`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `abreviatura` varchar(3) NOT NULL,
  `grupo` varchar(1) NOT NULL,
  `partidos_jugados` int(3) NOT NULL DEFAULT '0',
  `ganados` int(3) NOT NULL DEFAULT '0',
  `perdidos` int(3) NOT NULL DEFAULT '0',
  `empates` int(3) NOT NULL DEFAULT '0',
  `goles_a_favor` int(3) NOT NULL DEFAULT '0',
  `goles_en_contra` int(3) NOT NULL DEFAULT '0',
  `puntos` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `abreviatura`, `grupo`, `partidos_jugados`, `ganados`, `perdidos`, `empates`, `goles_a_favor`, `goles_en_contra`, `puntos`) VALUES
(1, 'Alemania', 'GER', 'A', 0, 0, 0, 0, 0, 0, 0),
(2, 'Escocia', 'SCO', 'A', 0, 0, 0, 0, 0, 0, 0),
(3, 'Hungria', 'HUN', 'A', 0, 0, 0, 0, 0, 0, 0),
(4, 'Suiza', 'SUI', 'A', 0, 0, 0, 0, 0, 0, 0),
(5, 'España', 'ESP', 'B', 0, 0, 0, 0, 0, 0, 0),
(6, 'Croacia', 'CRO', 'B', 0, 0, 0, 0, 0, 0, 0),
(7, 'Italia', 'ITA', 'B', 0, 0, 0, 0, 0, 0, 0),
(8, 'Albania', 'ALB', 'B', 0, 0, 0, 0, 0, 0, 0),
(9, 'Eslovenia', 'SVN', 'C', 0, 0, 0, 0, 0, 0, 0),
(10, 'Dinamarca', 'DEN', 'C', 0, 0, 0, 0, 0, 0, 0),
(11, 'Serbia', 'SRB', 'C', 0, 0, 0, 0, 0, 0, 0),
(12, 'Inglaterra', 'ENG', 'C', 0, 0, 0, 0, 0, 0, 0),
(13, 'Polonia', 'POL', 'D', 0, 0, 0, 0, 0, 0, 0),
(14, 'Países Bajos', 'NED', 'D', 0, 0, 0, 0, 0, 0, 0),
(15, 'Austria', 'AUT', 'D', 0, 0, 0, 0, 0, 0, 0),
(16, 'Francia', 'FRA', 'D', 0, 0, 0, 0, 0, 0, 0),
(17, 'Bélgica', 'BEL', 'E', 0, 0, 0, 0, 0, 0, 0),
(18, 'Eslovaquia', 'SVK', 'E', 0, 0, 0, 0, 0, 0, 0),
(19, 'Rumania', 'ROU', 'E', 0, 0, 0, 0, 0, 0, 0),
(20, 'Ucrania', 'UKR', 'E', 0, 0, 0, 0, 0, 0, 0),
(21, 'Turquia', 'TUR', 'F', 0, 0, 0, 0, 0, 0, 0),
(22, 'Georgia', 'GEO', 'F', 0, 0, 0, 0, 0, 0, 0),
(23, 'Portugal', 'POR', 'F', 0, 0, 0, 0, 0, 0, 0),
(24, 'Republica Checa', 'CZE', 'F', 0, 0, 0, 0, 0, 0, 0);

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
  `ganador` int(11) DEFAULT NULL,
  `faseGrupos` bigint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pais_1_partido_fk` (`id_pais_1`),
  KEY `pais_2_partido_fk` (`id_pais_2`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `fecha`, `id_pais_1`, `id_pais_2`, `resultado_1`, `resultado_2`, `ganador`, `faseGrupos`) VALUES
(1, '2024-06-14 21:00:00', 1, 2, NULL, NULL, NULL, 1),
(2, '2024-06-15 15:00:00', 3, 4, NULL, NULL, NULL, 1),
(3, '2024-06-15 18:00:00', 5, 6, NULL, NULL, NULL, 1),
(4, '2024-06-15 21:00:00', 7, 8, NULL, NULL, NULL, 1),
(5, '2024-06-16 15:00:00', 13, 14, NULL, NULL, NULL, 1),
(6, '2024-06-16 18:00:00', 9, 10, NULL, NULL, NULL, 1),
(7, '2024-06-16 21:00:00', 11, 12, NULL, NULL, NULL, 1),
(8, '2024-06-17 15:00:00', 19, 20, NULL, NULL, NULL, 1),
(9, '2024-06-17 18:00:00', 17, 18, NULL, NULL, NULL, 1),
(10, '2024-06-17 21:00:00', 15, 16, NULL, NULL, NULL, 1),
(11, '2024-06-18 18:00:00', 21, 22, NULL, NULL, NULL, 1),
(12, '2024-06-18 21:00:00', 23, 24, NULL, NULL, NULL, 1),
(13, '2024-06-19 15:00:00', 6, 8, NULL, NULL, NULL, 1),
(14, '2024-06-19 18:00:00', 1, 3, NULL, NULL, NULL, 1),
(15, '2024-06-19 21:00:00', 2, 4, NULL, NULL, NULL, 1),
(16, '2024-06-20 15:00:00', 9, 11, NULL, NULL, NULL, 1),
(17, '2024-06-20 18:00:00', 10, 12, NULL, NULL, NULL, 1),
(18, '2024-06-20 21:00:00', 5, 7, NULL, NULL, NULL, 1),
(19, '2024-06-20 21:00:00', 1, 2, NULL, NULL, NULL, 1),
(20, '2024-06-21 15:00:00', 18, 20, NULL, NULL, NULL, 1),
(21, '2024-06-21 18:00:00', 13, 15, NULL, NULL, NULL, 1),
(22, '2024-06-21 21:00:00', 14, 16, NULL, NULL, NULL, 1),
(23, '2024-06-22 15:00:00', 22, 24, NULL, NULL, NULL, 1),
(24, '2024-06-22 18:00:00', 21, 23, NULL, NULL, NULL, 1),
(25, '2024-06-22 21:00:00', 17, 19, NULL, NULL, NULL, 1),
(26, '2024-06-23 15:00:00', 4, 1, NULL, NULL, NULL, 1),
(27, '2024-06-23 18:00:00', 2, 3, NULL, NULL, NULL, 1),
(28, '2024-06-24 21:00:00', 8, 5, NULL, NULL, NULL, 1),
(29, '2024-06-24 21:00:00', 6, 7, NULL, NULL, NULL, 1),
(30, '2024-06-25 18:00:00', 14, 15, NULL, NULL, NULL, 1),
(31, '2024-06-25 18:00:00', 16, 13, NULL, NULL, NULL, 1),
(32, '2024-06-25 21:00:00', 12, 9, NULL, NULL, NULL, 1),
(33, '2024-06-25 21:00:00', 10, 11, NULL, NULL, NULL, 1),
(34, '2024-06-26 18:00:00', 18, 19, NULL, NULL, NULL, 1),
(35, '2024-06-26 18:00:00', 20, 17, NULL, NULL, NULL, 1),
(36, '2024-06-26 21:00:00', 22, 23, NULL, NULL, NULL, 1),
(37, '2024-06-26 21:00:00', 24, 21, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `puntuacion` int(4) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL,
  `telefono` bigint(9) NOT NULL,
  `email_verificado` tinyint(1) NOT NULL DEFAULT '0',
  `politica_privacidad` int(11) NOT NULL DEFAULT '0',
  `fecha_recu_pwd` bigint(20) DEFAULT NULL,
  `token_verificacion` varchar(32) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_inicio_sesion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_token` varchar(64) NOT NULL,
  `pagado` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_email` (`email`),
  UNIQUE KEY `user_token` (`user_token`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

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
-- Filtros para la tabla `apuestas_clasificacion`
--
ALTER TABLE `apuestas_clasificacion`
  ADD CONSTRAINT `apuesta_clasificacion_persona_fk` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `puesto_1_apuestas_clasificacion_fk` FOREIGN KEY (`puesto_1`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `puesto_2_apuestas_clasificacion_fk` FOREIGN KEY (`puesto_2`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `puesto_3_apuestas_clasificacion_fk` FOREIGN KEY (`puesto_3`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `puesto_4_apuestas_clasificacion_fk` FOREIGN KEY (`puesto_4`) REFERENCES `paises` (`id`);

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
