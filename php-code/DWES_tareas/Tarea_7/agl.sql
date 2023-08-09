-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2018 a las 00:36:20
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `cod` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`cod`, `descripcion`) VALUES
('ASIR', 'Administración de Sistemas informáticos y en red'),
('DAM', 'Desarrollo de Aplicaciones Multiplataforma'),
('DAW', 'Desarrollo de Aplicaciones Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listamatricula`
--

CREATE TABLE `listamatricula` (
  `contador` int(11) NOT NULL,
  `modulo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `contador` int(11) NOT NULL,
  `alumno` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `nacimiento` date NOT NULL,
  `DNI` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fichero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `cod` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `horas` smallint(3) NOT NULL,
  `curso` tinyint(1) NOT NULL,
  `plazas` tinyint(2) NOT NULL,
  `ciclo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`cod`, `nombre`, `horas`, `curso`, `plazas`, `ciclo`) VALUES
('AD', 'Acceso a datos', 195, 2, 30, 'DAM'),
('ASGBD', 'Administración de sistemas gestores de b. datos', 75, 2, 30, 'ASIR'),
('ASO', 'Administración de sistemas operativos', 135, 2, 30, 'ASIR'),
('BDM', 'Bases de datos', 200, 1, 30, 'DAM'),
('BDW', 'Bases de datos', 200, 1, 30, 'DAW'),
('DAW', 'Despliegue de aplicaciones web', 75, 2, 30, 'DAW'),
('DI', 'Desarrollo de Interfaces', 95, 2, 30, 'DAM'),
('DIW', 'Diseño de interfaces web', 95, 2, 30, 'DAW'),
('DWEC', 'Desarrollo web en entorno cliente', 170, 2, 30, 'DAW'),
('DWES', 'Desarrollo web en entorno servidor', 170, 2, 30, 'DAW'),
('EDM', 'Entornos de desarrollo', 70, 1, 30, 'DAM'),
('EDW', 'Entornos de desarrollo', 70, 1, 30, 'DAW'),
('EIEASIR', 'Empresa e iniciativa emprendedora', 60, 2, 30, 'ASIR'),
('EIEM', 'Empresa e iniciativa emprendedora', 60, 2, 30, 'DAM'),
('EIEW', 'Empresa e iniciativa emprendedora', 60, 2, 30, 'DAW'),
('FCTASIR', 'Formación en centros de trabajo', 410, 2, 30, 'ASIR'),
('FCTM', 'Formación en centros de trabajo', 420, 2, 30, 'DAM'),
('FCTW', 'Formación en centros de trabajo', 420, 2, 30, 'DAW'),
('FH', 'Fundamentos de hardware', 110, 1, 30, 'ASIR'),
('FOLASIR', 'Formación y orientación laboral', 90, 1, 30, 'ASIR'),
('FOLM', 'Formación y orientación laboral', 90, 1, 30, 'DAM'),
('FOLW', 'Formación y orientación laboral', 90, 1, 30, 'DAW'),
('GS', 'Gestión de bases de datos', 230, 1, 30, 'ASIR'),
('IAWASIR', 'Implantación de aplicaciones web', 170, 2, 30, 'ASIR'),
('ISO', 'Implantación de sistemas operativos', 230, 1, 30, 'ASIR'),
('LMM', 'Lenguajes de marcas y sistemas de gestión de infor', 130, 1, 30, 'DAM'),
('LMSGI', 'Lenguajes de marcas y sistemas de gestión de infor', 140, 1, 30, 'ASIR'),
('LMW', 'Lenguajes de marcas y sistemas de gestión de infor', 130, 1, 30, 'DAW'),
('PA', 'Planificación y administración de redes', 150, 1, 30, 'ASIR'),
('PASIR', 'Proyecto', 55, 2, 30, 'ASIR'),
('PM', 'Proyecto ', 55, 2, 30, 'DAM'),
('PMDM', 'Programación multimedia y dispositivos móviles', 155, 2, 30, 'DAM'),
('PP', 'Programación de servicios y procesos', 155, 2, 30, 'DAM'),
('PRGM', 'Programación', 260, 1, 30, 'DAM'),
('PRGW', 'Programación', 260, 1, 30, 'DAW'),
('PW', 'Proyecto ', 55, 2, 30, 'DAW'),
('SAD', 'Seguridad y alta disponibilidad', 60, 2, 30, 'ASIR'),
('SGE', 'Sistemas de gestión empresarial', 55, 2, 30, 'DAM'),
('SIM', 'Sistemas informáticos', 230, 1, 30, 'DAM'),
('SIR', 'Servicios de red e Internet', 170, 2, 30, 'ASIR'),
('SIW', 'Sistemas informáticos', 230, 1, 30, 'DAW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `listamatricula`
--
ALTER TABLE `listamatricula`
  ADD PRIMARY KEY (`contador`,`modulo`),
  ADD KEY `modulo` (`modulo`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`contador`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `ciclo` (`ciclo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `contador` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `listamatricula`
--
ALTER TABLE `listamatricula`
  ADD CONSTRAINT `listamatricula_ibfk_1` FOREIGN KEY (`contador`) REFERENCES `matricula` (`contador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listamatricula_ibfk_2` FOREIGN KEY (`modulo`) REFERENCES `modulo` (`cod`);

--
-- Filtros para la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`ciclo`) REFERENCES `ciclo` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
