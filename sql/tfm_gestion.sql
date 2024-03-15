-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-03-2024 a las 18:29:06
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
-- Base de datos: `tfm_gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flags`
--

DROP TABLE IF EXISTS `flags`;
CREATE TABLE IF NOT EXISTS `flags` (
  `id` int(4) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `max_puntos` int(2) NOT NULL,
  `num_pistas` int(2) NOT NULL DEFAULT '0',
  `dificultad` int(2) NOT NULL,
  `instrucciones` varchar(500) DEFAULT NULL,
  `resuelto` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flags`
--

INSERT INTO `flags` (`id`, `flag`, `max_puntos`, `num_pistas`, `dificultad`, `instrucciones`, `resuelto`) VALUES
(11, '1532e76dbe9d43d0dea98c331ca5ae8a65c5e8e8b99d3e2a42ae989356f6242a', 10, 2, 1, 'Encuentra la contraseña del usuario Javier y encríptala en SHA256', 0),
(12, 'flag', 10, 0, 1, NULL, 0),
(13, 'flag', 10, 0, 1, NULL, 0),
(21, 'flag', 10, 0, 2, NULL, 0),
(22, 'flag', 10, 0, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

DROP TABLE IF EXISTS `pistas`;
CREATE TABLE IF NOT EXISTS `pistas` (
  `id_flag` int(4) NOT NULL,
  `num_pista` int(2) NOT NULL,
  `pista` varchar(500) NOT NULL,
  PRIMARY KEY (`id_flag`,`num_pista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`id_flag`, `num_pista`, `pista`) VALUES
(11, 1, 'Pista 1 12'),
(11, 2, 'Pista 2 12'),
(12, 1, 'sfDHGDAFHG'),
(12, 2, 'asfdvsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Puntuacion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `Password`, `Puntuacion`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_flags`
--

DROP TABLE IF EXISTS `usuarios_flags`;
CREATE TABLE IF NOT EXISTS `usuarios_flags` (
  `id_usuario` int(11) NOT NULL,
  `id_flag` int(4) NOT NULL,
  `num_pistas` int(2) NOT NULL,
  `puntuacion` int(2) DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_flag`),
  KEY `fk_flags` (`id_flag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_flags`
--

INSERT INTO `usuarios_flags` (`id_usuario`, `id_flag`, `num_pistas`, `puntuacion`) VALUES
(1, 11, 0, 0),
(1, 12, 0, 0),
(1, 13, 0, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD CONSTRAINT `fk_pistas` FOREIGN KEY (`id_flag`) REFERENCES `flags` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios_flags`
--
ALTER TABLE `usuarios_flags`
  ADD CONSTRAINT `fk_flags` FOREIGN KEY (`id_flag`) REFERENCES `flags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
