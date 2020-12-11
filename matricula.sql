-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-11-2020 a las 15:48:00
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `matricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edades`
--

CREATE TABLE IF NOT EXISTS `edades` (
  `idedad` int(11) NOT NULL AUTO_INCREMENT,
  `edad` int(11) NOT NULL,
  PRIMARY KEY (`idedad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `edades`
--

INSERT INTO `edades` (`idedad`, `edad`) VALUES
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 8),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` char(100) DEFAULT NULL,
  `apellidos` char(50) DEFAULT NULL,
  `codigoestudiante` varchar(10) DEFAULT '1',
  `edad` int(11) DEFAULT NULL,
  `institucionproviene` varchar(100) DEFAULT NULL,
  `poseefacebook` varchar(2) DEFAULT NULL,
  `nombrecuentaFB` varchar(200) DEFAULT NULL,
  `nombrerecomienda` char(200) DEFAULT NULL,
  `telefonoEstudiante` varchar(10) DEFAULT NULL,
  `vivecon` int(11) DEFAULT NULL,
  `direccion` varchar(299) DEFAULT NULL,
  `matriculaestado_idestado` int(11) NOT NULL,
  `grados_IdGrado` int(11) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `religion` varchar(25) NOT NULL,
  PRIMARY KEY (`IdEstudiante`,`matriculaestado_idestado`),
  KEY `fk_estudiante_matriculaestado1` (`matriculaestado_idestado`),
  KEY `fk_estudiante_grados1` (`grados_IdGrado`),
  KEY `vivecon` (`vivecon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`IdEstudiante`, `nombres`, `apellidos`, `codigoestudiante`, `edad`, `institucionproviene`, `poseefacebook`, `nombrecuentaFB`, `nombrerecomienda`, `telefonoEstudiante`, `vivecon`, `direccion`, `matriculaestado_idestado`, `grados_IdGrado`, `fechaNacimiento`, `religion`) VALUES
(1, 'Marlon', 'Tejada', '1', 16, '', '2', 'marlontejada@facebook.com', '', '', 1, 'col reparto apopa', 2, 13, '0000-00-00', ''),
(2, 'Melisa', 'Tobar', '1', 10, '', '2', '', '', '', 1, 'col santa elena pasaje 4, casa 25', 1, 9, '0000-00-00', ''),
(3, 'andrea', 'gomez', '1', 7, '', '2', '', '', '', 1, 'col reparto apopa', 1, 1, '0000-00-00', ''),
(4, '', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '0000-00-00', ''),
(5, '', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '0000-00-00', ''),
(6, 'maria', 'martinez', '1', 7, '', '2', '', '', '', 1, 'b', 1, 1, '0000-00-00', ''),
(7, '', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '0000-00-00', ''),
(8, '', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '0000-00-00', ''),
(9, '', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '0000-00-00', ''),
(10, 'Ernesto', 'Laguardia', '1', 4, '', '1', '', '', '', 1, 'a', 1, 1, '0000-00-00', ''),
(11, 'Laura', 'pastore', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '0000-00-00', ''),
(12, 'Marcela', 'Gandara', '1', 5, 'ninguna', '1', '', 'nadie', '', 1, 'ninguna', 1, 1, '0000-00-00', 'ninguna'),
(13, 'Elena Maria1', 'Mendez Arraiza1', '11', 10, 'ninguna1', '1', 'no tiene1', 'Nadie en especial1', '13445681', 1, 'col los naranjos, pasaje 3, casa 33.1', 2, 9, '0000-00-00', 'Cristiana'),
(14, 'a', 's', '1', 4, '', '1', '', 'as', '', 1, 's', 1, 1, '0000-00-00', 'as'),
(16, 'ada', 'mendoza', '1', 20, 'ninguna', '2', '', 'Nadie en especial', '78987675', 3, 'col los naranjos, pasaje 3, casa 33.', 1, 13, '0000-00-00', 'Cristiana'),
(18, 'b', 'b', '1', 4, 'j', '1', 'juancho@facedbook.com', 'la mama del niño de quinto grado, daniel ortega', '9', 7, 'nj', 1, 1, '0000-00-00', 'j');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
  `IdGrado` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdGrado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`IdGrado`, `grado`) VALUES
(1, 'Parvularia 4'),
(2, 'Parvularia 5'),
(3, 'Parvularia 6'),
(4, 'Primer grado'),
(5, 'Segundo grado A'),
(6, 'Segundo grado B'),
(7, 'Tercero grado'),
(8, 'Cuarto grado'),
(9, 'Quinto grado'),
(10, 'Sexto grado'),
(11, 'Septimo grado'),
(12, 'Octavo Grado'),
(13, 'Noveno grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE IF NOT EXISTS `maestros` (
  `IdMaestro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(100) DEFAULT NULL,
  `apellido` char(100) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `tipomaestro_IdTipo` int(11) NOT NULL,
  `grados_IdGrado` int(11) NOT NULL,
  PRIMARY KEY (`IdMaestro`,`tipomaestro_IdTipo`,`grados_IdGrado`),
  KEY `fk_maestros_tipomaestro1` (`tipomaestro_IdTipo`),
  KEY `fk_maestros_grados1` (`grados_IdGrado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`IdMaestro`, `nombre`, `apellido`, `codigo`, `edad`, `telefono`, `correo`, `tipomaestro_IdTipo`, `grados_IdGrado`) VALUES
(1, 'Alex Antonio', 'Pineda Lopéz', 'M192', 30, '06494054', 'nosetiene@gmail.com', 2, 12),
(2, 'Miranda', 'Gonzalez', 'M256', 36, '68945324', 'miranda@yahoo.es', 2, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculaestado`
--

CREATE TABLE IF NOT EXISTS `matriculaestado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreestado` varchar(45) NOT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `matriculaestado`
--

INSERT INTO `matriculaestado` (`idestado`, `nombreestado`) VALUES
(1, 'Nuevo'),
(2, 'Aceptado'),
(3, 'Rechazado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE IF NOT EXISTS `padres` (
  `IdPadre` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(200) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `trabajo` varchar(100) DEFAULT NULL,
  `razonestudio` char(200) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdPadre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`IdPadre`, `nombre`, `correo`, `dui`, `trabajo`, `razonestudio`, `telefono`, `direccion`) VALUES
(1, 'Maria', 'notiene@gmail.com', NULL, '', 'por ninguna en especial', '45436754', 'col reparto apopa'),
(2, 'Aurelio', 'notiene@gmail.com', '5565656', 'en oficina central', 'por ninguna en especial', '676454', 'col reparto apopa'),
(3, 'MArio', 'notiene@gmail.com', NULL, 'en el parque', 'ninguna', '45676567', 'no tiene'),
(4, 'maria', 'notiene@gmail.com', '8494859485', 'en la casa', 'ninguna', '144565', 'no tiene'),
(5, 'Edgardo', 'notiene@gmail.com', NULL, 'En el hogar', 'por ninguna en especial', '45343421', 'ninguna'),
(6, 'Luz', 'notiene@gmail.com', NULL, 'En la escuela', 'por ninguna en especial', '54678909', 'ninguna'),
(7, 'Juan Marcos Mendez', 'notiene@gmail.com', NULL, 'En el campo', 'por la calidad de educacion del colegio', '56789098', 'col los naranjos, pasaje 3, casa 33.'),
(8, 'Maria Elena', 'notiene@gmail.com', NULL, 'Ama de casa', 'por la calidad de educacion del colegio', '45326789', 'col los naranjos, pasaje 3, casa 33.'),
(9, 'Armando del cairoz', 'armando@gmail.com', '122345', 'en ningun lugar', 'as', '2', 's'),
(10, 'aa', 'nosecual@hotmail.com', '0192233', 'en la casa de la par', 'as', '34', 's'),
(11, 'adal', 'notiene1@gmail.com', '22334', '76765434', 'por ninguna en especial', '8788', NULL),
(12, 'ada', NULL, NULL, '78765568', 'por ninguna en especial', 'en la casa', NULL),
(13, 'a|6|', NULL, NULL, '7', 'ninguna', 'j', NULL),
(14, 'j', NULL, NULL, '67', 'ninguna', 'j', NULL),
(15, 'ana', NULL, NULL, '7', 'ninguna', 'aaks', NULL),
(16, 'as', NULL, NULL, '67', 'ninguna', 'asa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres_has_estudiante`
--

CREATE TABLE IF NOT EXISTS `padres_has_estudiante` (
  `padres_IdPadre` int(11) NOT NULL,
  `estudiante_IdEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`padres_IdPadre`,`estudiante_IdEstudiante`),
  KEY `fk_padres_has_estudiante_estudiante1` (`estudiante_IdEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `padres_has_estudiante`
--

INSERT INTO `padres_has_estudiante` (`padres_IdPadre`, `estudiante_IdEstudiante`) VALUES
(5, 12),
(6, 12),
(7, 13),
(8, 13),
(9, 14),
(10, 14),
(11, 16),
(12, 16),
(15, 18),
(16, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsableestudiante`
--

CREATE TABLE IF NOT EXISTS `responsableestudiante` (
  `idresponsable_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_responsable` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_responsable` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email_responsable` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idresponsable_estudiante`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idEstudiante_2` (`idEstudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `responsableestudiante`
--

INSERT INTO `responsableestudiante` (`idresponsable_estudiante`, `nombre_responsable`, `telefono_responsable`, `email_responsable`, `idEstudiante`) VALUES
(1, 'Luis antonio palacios', '76548909', 'no@tiene.com', 1),
(2, 'Maria antonieta de las nieves', '65463456', 'no@tiene.com', 2),
(3, 'adal', '78768787', 'notiene@gmail.com', 16),
(4, 'ana', '34', 'arraiza@gmail.com', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
  `idtelefono` int(11) NOT NULL,
  `numtel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtelefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idtelefono`, `numtel`) VALUES
(1, '11223344');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomaestro`
--

CREATE TABLE IF NOT EXISTS `tipomaestro` (
  `IdTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipomaestro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipomaestro`
--

INSERT INTO `tipomaestro` (`IdTipo`, `tipomaestro`) VALUES
(1, 'Parvularia'),
(2, 'Primaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(1, 'marlon', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vive_con`
--

CREATE TABLE IF NOT EXISTS `vive_con` (
  `idvive_con` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_vive` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idvive_con`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `vive_con`
--

INSERT INTO `vive_con` (`idvive_con`, `descripcion_vive`) VALUES
(1, 'Con ambos padres'),
(2, 'Solo con Papá'),
(3, 'Solo con Mamá'),
(6, 'Abuela materna'),
(7, 'tia paterna');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`matriculaestado_idestado`) REFERENCES `matriculaestado` (`idestado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`grados_IdGrado`) REFERENCES `grados` (`IdGrado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`vivecon`) REFERENCES `vive_con` (`idvive_con`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `fk_maestros_grados1` FOREIGN KEY (`grados_IdGrado`) REFERENCES `grados` (`IdGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_maestros_tipomaestro1` FOREIGN KEY (`tipomaestro_IdTipo`) REFERENCES `tipomaestro` (`IdTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `padres_has_estudiante`
--
ALTER TABLE `padres_has_estudiante`
  ADD CONSTRAINT `fk_padres_has_estudiante_estudiante1` FOREIGN KEY (`estudiante_IdEstudiante`) REFERENCES `estudiante` (`IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_padres_has_estudiante_padres` FOREIGN KEY (`padres_IdPadre`) REFERENCES `padres` (`IdPadre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `responsableestudiante`
--
ALTER TABLE `responsableestudiante`
  ADD CONSTRAINT `responsableestudiante_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`IdEstudiante`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
