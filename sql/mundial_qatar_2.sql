-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-11-2022 a las 13:50:43
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
  `puntuacion` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `apuesta_persona_fk` (`id_persona`),
  KEY `apuesta_partido_fk` (`id_partido`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas_clasificacion`
--

DROP TABLE IF EXISTS `apuestas_clasificacion`;
CREATE TABLE IF NOT EXISTS `apuestas_clasificacion` (
  `id_persona` int(4) NOT NULL,
  `puesto_1` int(4) DEFAULT NULL,
  `puesto_2` int(4) DEFAULT NULL,
  `puesto_3` int(4) DEFAULT NULL,
  `puesto_4` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `puesto_1_apuestas_clasificacion_fk` (`puesto_1`),
  KEY `puesto_2_apuestas_clasificacion_fk` (`puesto_2`),
  KEY `puesto_3_apuestas_clasificacion_fk` (`puesto_3`),
  KEY `puesto_4_apuestas_clasificacion_fk` (`puesto_4`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas_grupo`
--

DROP TABLE IF EXISTS `apuestas_grupo`;
CREATE TABLE IF NOT EXISTS `apuestas_grupo` (
  `id` int(4) NOT NULL,
  `id_persona` int(4) NOT NULL,
  `grupo` varchar(1) NOT NULL,
  `posicion_1` int(4) NOT NULL,
  `posicion_2` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posicion_1_apuesta_grupo_fk` (`posicion_1`),
  KEY `posicion_2_apuesta_grupo_fk` (`posicion_2`),
  KEY `apuesta_grupos_persona_fk` (`id_persona`)
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `abreviatura`, `grupo`, `partidos_jugados`, `ganados`, `perdidos`, `empates`, `goles_a_favor`, `goles_en_contra`, `puntos`) VALUES
(1, 'Qatar', 'QAT', 'A', 0, 0, 0, 0, 0, 0, 0),
(2, 'Ecuador', 'ECU', 'A', 0, 0, 0, 0, 0, 0, 0),
(3, 'Senegal', 'SEN', 'A', 0, 0, 0, 0, 0, 0, 0),
(4, 'Países Bajos', 'NED', 'A', 0, 0, 0, 0, 0, 0, 0),
(5, 'Inglaterra', 'ENG', 'B', 0, 0, 0, 0, 0, 0, 0),
(6, 'Irán', 'IRN', 'B', 0, 0, 0, 0, 0, 0, 0),
(7, 'Estados Unidos', 'USA', 'B', 0, 0, 0, 0, 0, 0, 0),
(8, 'Gales', 'WAL', 'B', 0, 0, 0, 0, 0, 0, 0),
(9, 'Argentina', 'ARG', 'C', 0, 0, 0, 0, 0, 0, 0),
(10, 'Arabia Saudí', 'KSA', 'C', 0, 0, 0, 0, 0, 0, 0),
(11, 'México', 'MEX', 'C', 0, 0, 0, 0, 0, 0, 0),
(12, 'Polonia', 'POL', 'C', 0, 0, 0, 0, 0, 0, 0),
(13, 'Francia', 'FRA', 'D', 0, 0, 0, 0, 0, 0, 0),
(14, 'Australia', 'AUS', 'D', 0, 0, 0, 0, 0, 0, 0),
(15, 'Dinamarca', 'DEN', 'D', 0, 0, 0, 0, 0, 0, 0),
(16, 'Túnez', 'TUN', 'D', 0, 0, 0, 0, 0, 0, 0),
(17, 'España', 'ESP', 'E', 0, 0, 0, 0, 0, 0, 0),
(18, 'Costa Rica', 'CRC', 'E', 0, 0, 0, 0, 0, 0, 0),
(19, 'Alemania', 'GER', 'E', 0, 0, 0, 0, 0, 0, 0),
(20, 'Japón', 'JPN', 'E', 0, 0, 0, 0, 0, 0, 0),
(21, 'Bélgica', 'BEL', 'F', 0, 0, 0, 0, 0, 0, 0),
(22, 'Canadá', 'CAN', 'F', 0, 0, 0, 0, 0, 0, 0),
(23, 'Marruecos', 'MAR', 'F', 0, 0, 0, 0, 0, 0, 0),
(24, 'Croacia', 'CRO', 'F', 0, 0, 0, 0, 0, 0, 0),
(25, 'Brasil', 'BRA', 'G', 0, 0, 0, 0, 0, 0, 0),
(26, 'Serbia', 'SRB', 'G', 0, 0, 0, 0, 0, 0, 0),
(27, 'Suiza', 'SUI', 'G', 0, 0, 0, 0, 0, 0, 0),
(28, 'Camerún', 'CMR', 'G', 0, 0, 0, 0, 0, 0, 0),
(29, 'Portugal', 'POR', 'H', 0, 0, 0, 0, 0, 0, 0),
(30, 'Ghana', 'GHA', 'H', 0, 0, 0, 0, 0, 0, 0),
(31, 'Uruguay', 'URU', 'H', 0, 0, 0, 0, 0, 0, 0),
(32, 'República de Corea', 'KOR', 'H', 0, 0, 0, 0, 0, 0, 0);

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
  `faseGrupos` bigint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pais_1_partido_fk` (`id_pais_1`),
  KEY `pais_2_partido_fk` (`id_pais_2`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `fecha`, `id_pais_1`, `id_pais_2`, `resultado_1`, `resultado_2`, `faseGrupos`) VALUES
(1, '2022-11-20 17:00:00', 1, 2, NULL, NULL, 1),
(2, '2022-11-21 14:00:00', 5, 6, NULL, NULL, 1),
(3, '2022-11-21 17:00:00', 3, 4, NULL, NULL, 1),
(4, '2022-11-21 20:00:00', 7, 8, NULL, NULL, 1),
(5, '2022-11-22 11:00:00', 9, 10, NULL, NULL, 1),
(6, '2022-11-22 14:00:00', 15, 16, NULL, NULL, 1),
(7, '2022-11-22 17:00:00', 11, 12, NULL, NULL, 1),
(8, '2022-11-22 20:00:00', 13, 14, NULL, NULL, 1),
(9, '2022-11-23 11:00:00', 23, 24, NULL, NULL, 1),
(10, '2022-11-23 14:00:00', 19, 20, NULL, NULL, 1),
(11, '2022-11-23 17:00:00', 17, 18, NULL, NULL, 1),
(12, '2022-11-23 20:00:00', 21, 22, NULL, NULL, 1),
(13, '2022-11-24 11:00:00', 27, 28, NULL, NULL, 1),
(14, '2022-11-24 14:00:00', 31, 32, NULL, NULL, 1),
(15, '2022-11-24 17:00:00', 29, 30, NULL, NULL, 1),
(16, '2022-11-24 20:00:00', 25, 26, NULL, NULL, 1),
(17, '2022-11-25 11:00:00', 8, 6, NULL, NULL, 1),
(18, '2022-11-25 14:00:00', 1, 3, NULL, NULL, 1),
(19, '2022-11-25 17:00:00', 4, 2, NULL, NULL, 1),
(20, '2022-11-25 20:00:00', 5, 7, NULL, NULL, 1),
(21, '2022-11-26 11:00:00', 16, 14, NULL, NULL, 1),
(22, '2022-11-26 14:00:00', 12, 10, NULL, NULL, 1),
(23, '2022-11-26 17:00:00', 13, 15, NULL, NULL, 1),
(24, '2022-11-26 20:00:00', 9, 11, NULL, NULL, 1),
(25, '2022-11-27 11:00:00', 20, 18, NULL, NULL, 1),
(26, '2022-11-27 14:00:00', 21, 23, NULL, NULL, 1),
(27, '2022-11-27 17:00:00', 24, 22, NULL, NULL, 1),
(28, '2022-11-27 20:00:00', 17, 19, NULL, NULL, 1),
(29, '2022-11-28 11:00:00', 28, 26, NULL, NULL, 1),
(30, '2022-11-28 14:00:00', 32, 30, NULL, NULL, 1),
(31, '2022-11-28 17:00:00', 25, 27, NULL, NULL, 1),
(32, '2022-11-28 20:00:00', 29, 31, NULL, NULL, 1),
(33, '2022-11-29 16:00:00', 4, 1, NULL, NULL, 1),
(34, '2022-11-29 16:00:00', 2, 3, NULL, NULL, 1),
(35, '2022-11-29 20:00:00', 8, 5, NULL, NULL, 1),
(36, '2022-11-29 20:00:00', 6, 7, NULL, NULL, 1),
(37, '2022-11-30 16:00:00', 14, 15, NULL, NULL, 1),
(38, '2022-11-30 16:00:00', 16, 13, NULL, NULL, 1),
(39, '2022-11-30 20:00:00', 12, 9, NULL, NULL, 1),
(40, '2022-11-30 20:00:00', 10, 11, NULL, NULL, 1),
(41, '2022-12-01 16:00:00', 24, 21, NULL, NULL, 1),
(42, '2022-12-01 16:00:00', 22, 23, NULL, NULL, 1),
(43, '2022-12-01 20:00:00', 20, 17, NULL, NULL, 1),
(44, '2022-12-01 20:00:00', 19, 18, NULL, NULL, 1),
(45, '2022-12-02 16:00:00', 30, 31, NULL, NULL, 1),
(46, '2022-12-02 16:00:00', 32, 29, NULL, NULL, 1),
(47, '2022-12-02 20:00:00', 26, 27, NULL, NULL, 1),
(48, '2022-12-02 20:00:00', 28, 25, NULL, NULL, 1);

--
-- Disparadores `partidos`
--
DROP TRIGGER IF EXISTS `actualizar_apuestas`;
DELIMITER $$
CREATE TRIGGER `actualizar_apuestas` AFTER UPDATE ON `partidos` FOR EACH ROW BEGIN
	DECLARE finished int DEFAULT FALSE;
	DECLARE c_id_apuesta int;
	DECLARE c_id_persona int;
	DECLARE c_apuesta_1 int;
	DECLARE c_apuesta_2 int;
	DECLARE c_puntuacion int;
	DECLARE c_ganador int;
	DECLARE ganador_es int;
	DECLARE ganador_apuesta int;
	DECLARE cursor_apuestas CURSOR FOR 
		SELECT id,id_persona,apuesta_1,apuesta_2,puntuacion
		FROM apuestas
		WHERE id_partido = OLD.id;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

	IF (NEW.resultado_1 = NEW.resultado_2) THEN 
		SET @ganador_es := 0;
	ELSEIF (NEW.resultado_1 > NEW.resultado_2) THEN
		SET @ganador_es := 1;
	ELSE
		SET @ganador_es := 2;
	END IF;

	OPEN cursor_apuestas;
	SET @finished := 0;
	cursor_loop: LOOP
		FETCH cursor_apuestas INTO c_id_apuesta, c_id_persona, c_apuesta_1, c_apuesta_2, c_puntuacion;
		IF (finished = 1) THEN
			LEAVE cursor_loop;
		END IF;

		SET @c_puntuacion := 0;

		IF (c_apuesta_1 = c_apuesta_2) THEN 
			SET @ganador_apuesta := 0;
		ELSEIF (c_apuesta_1 > c_apuesta_2) THEN
			SET @ganador_apuesta := 1;
		ELSE
			SET @ganador_apuesta := 2;
		END IF;

		IF (c_apuesta_2 = NEW.resultado_2) THEN
			SET @c_puntuacion := @c_puntuacion + 1;
		END IF;
		IF (c_apuesta_1 = NEW.resultado_1) THEN
			SET @c_puntuacion := @c_puntuacion + 1;
		END IF;

		IF (@ganador_es = @ganador_apuesta) THEN
			SET @c_puntuacion := @c_puntuacion + 1;
		END IF;
		
		UPDATE apuestas SET puntuacion = @c_puntuacion 
		where id_partido = OLD.id and id = c_id_apuesta;
		UPDATE personas SET puntuacion = puntuacion + @c_puntuacion 
		where id = c_id_persona;
	END LOOP cursor_loop;
	CLOSE cursor_apuestas;
END
$$
DELIMITER ;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

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
-- Filtros para la tabla `apuestas_grupo`
--
ALTER TABLE `apuestas_grupo`
  ADD CONSTRAINT `apuesta_grupos_persona_fk` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `posicion_1_apuesta_grupo_fk` FOREIGN KEY (`posicion_1`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `posicion_2_apuesta_grupo_fk` FOREIGN KEY (`posicion_2`) REFERENCES `paises` (`id`);

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
