-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2023 a las 00:13:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matricula`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesByCicloAndMallaId` (IN `num_ciclo` INT, `codigo_malla` VARCHAR(10))   SELECT c.nombre_curso,c.creditos,c.mallaId FROM curso c 
    WHERE  c.ciclo = num_ciclo AND c.mallaId = codigo_malla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesByMallaId` (IN `codigoMalla` VARCHAR(10))   SELECT c.nombre_curso,c.mallaId FROM curso c 
    WHERE c.mallaId = codigoMalla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginProcedure` (IN `codeUser` VARCHAR(50), IN `passUser` VARCHAR(50))   SELECT alumno.fullName FROM alumno WHERE codeUser = codigo_alumno and passUser = password$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `codigo_alumno` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `mallaId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codigo_alumno`, `password`, `fullName`, `mallaId`) VALUES
('0163684707', 'pZSY9M', 'Jerrine Leafe', 'ISIS'),
('0358975158', 'k1XRpkWzg', 'Kathrine Whillock', 'ISW'),
('1840902868', 'PJYrXlk8F', 'Tani Spivie', 'ISW'),
('5494629759', 'gRTems', 'Kev Pyner', 'ISW'),
('8535667539', 'RJcacDMhz', 'Dell Sidsaff', 'ISIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `codigo_curso` varchar(8) NOT NULL,
  `creditos` int(11) NOT NULL,
  `nombre_curso` varchar(16) NOT NULL,
  `mallaId` varchar(7) NOT NULL,
  `ciclo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`codigo_curso`, `creditos`, `nombre_curso`, `mallaId`, `ciclo`) VALUES
('DES-10', 3, 'Historia', 'ISIS', 1),
('ENG-08', 4, 'Educación Geo', 'ISIS', 1),
('MATH-01', 3, 'Matematicas', 'ISIS', 1),
('PE-07', 3, 'Educación Física', 'ISW', 4),
('SCI-03', 4, 'Arte', 'ISIS', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_malla`
--

CREATE TABLE `detalle_malla` (
  `codigo_alumno` varchar(10) NOT NULL,
  `nombre_apellido` varchar(17) NOT NULL,
  `mallaId` varchar(7) NOT NULL,
  `nombreCurso` varchar(16) NOT NULL,
  `ciclo` varchar(4) NOT NULL,
  `codigo_curso` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_malla`
--

INSERT INTO `detalle_malla` (`codigo_alumno`, `nombre_apellido`, `mallaId`, `nombreCurso`, `ciclo`, `codigo_curso`) VALUES
('8535667539', 'Dell Sidsaff', 'ISIS', 'Matematicas', '2023', 'MATH-01'),
('5494629759', 'Kev Pyner', 'ISW', 'Educación Física', '2023', 'PE-07'),
('8535667539', 'Dell Sidsaff', 'ISIS', 'Historia', '2023', 'DES-10'),
('8535667539', 'Dell Sidsaff', 'ISIS', 'Educación Geo', '2023', 'ENG-08'),
('8535667539', 'Dell Sidsaff', 'ISIS', 'Arte', '2023', 'SCI-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `codigo_alumno` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`codigo_alumno`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo_curso`);

--
-- Indices de la tabla `detalle_malla`
--
ALTER TABLE `detalle_malla`
  ADD KEY `codigo_alumno` (`codigo_alumno`),
  ADD KEY `codigo_curso` (`codigo_curso`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`codigo_alumno`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_malla`
--
ALTER TABLE `detalle_malla`
  ADD CONSTRAINT `detalle_malla_ibfk_1` FOREIGN KEY (`codigo_alumno`) REFERENCES `alumno` (`codigo_alumno`),
  ADD CONSTRAINT `detalle_malla_ibfk_2` FOREIGN KEY (`codigo_curso`) REFERENCES `curso` (`codigo_curso`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_loginID` FOREIGN KEY (`codigo_alumno`) REFERENCES `alumno` (`codigo_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
