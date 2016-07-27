-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2015 a las 08:27:56
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `solicitudes`
--
CREATE DATABASE IF NOT EXISTS `solicitudes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `solicitudes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `cod_empleado` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(1000) NOT NULL,
  `profesion` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  UNIQUE KEY `cod_empleado_2` (`cod_empleado`),
  KEY `cod_empleado` (`cod_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`cod_empleado`, `nombre`, `apellido`, `edad`, `direccion`, `profesion`, `area`, `cargo`, `correo`, `login`, `pass`) VALUES
(12456712, 'Ana Mar&iacute;a', 'Sanchez', 39, 'prebo II calle libertad nro 15', 'lic en comercio exterior', 'Ventas', 'supervisor', 'ana.sanchez@gmail.com', 'asanchez', '1'),
(14321856, 'Jose', 'Navas', 36, 'urb base calle 14 nro 24', 'lic administracion', 'Pre-ventas', 'coordinador venezuela', 'jose.navas@gmail.com', 'jnavas', '14321856'),
(15280380, 'Victor', 'Perez', 34, 'Maracay', 'Tecnico', 'Preventa', 'Vendedor', 'vperez@sofoscorp.com', 'v.perez', '15280380'),
(15636565, 'Galicia', 'Hedez', 29, 'barrio sucre calle jose feliz ribas casa nro 23', 'lic mercadeo', 'ventas', 'promotor', 'galiciahedez@gmail.com', 'ghedez', '15636565'),
(18656796, 'Carlos', 'herrera', 25, 'urb las lomas edif danago piso 12', 'lic comercio exterior', 'ventas', 'supervisor', 'carlos.herrera19@gmail.com', 'cherrera', '18656796'),
(19949054, 'Luz', 'Bauer', 24, 'barrio la paz calle simon bolivar nro 19', 'Contador publico', 'ventas', 'analista', 'bauer24@gmail.com', 'lbauer@gmail.com', '19949054'),
(21565453, 'Yesica', 'Colmanarez', 22, 'urb corinsa calle 18 nro 29-b', 'T.S.U finanzas', 'Pre-ventas', 'analista de preventas', 'yesicacol@gmail.com', 'ycolmenarez', '21565453'),
(23123245, 'Karla', 'Milano', 19, 'Urb Santa eudovigues calle sol nro 23', 'estudiante', 'Ventas', 'Pasante Inces', 'karla.milano@gmail.com', 'kmilano', '23123245');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `cod_empleado` int(11) NOT NULL,
  `nivel` varchar(200) NOT NULL,
  UNIQUE KEY `cod_empleado_2` (`cod_empleado`),
  KEY `cod_empleado` (`cod_empleado`),
  KEY `cod_empleado_3` (`cod_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`cod_empleado`, `nivel`) VALUES
(12456712, '1'),
(14321856, '1'),
(15280380, '2'),
(15636565, '2'),
(18656796, '1'),
(19949054, '3'),
(21565453, '3'),
(23123245, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospecto`
--

CREATE TABLE IF NOT EXISTS `prospecto` (
  `cliente` varchar(100) NOT NULL,
  `actividade` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `grupo` varchar(100) NOT NULL,
  `pagina` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prospecto`
--

INSERT INTO `prospecto` (`cliente`, `actividade`, `sector`, `direccion`, `grupo`, `pagina`, `telefono`) VALUES
('LOCATEL', 'COMERCIO FARMACEUTICO', 'RETAIL', 'Avenida Este, Centro Comercial Parque Caracas. Caracas', '', 'http://www.locatel.com.ve/', '0501-5622835');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `nrosolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `fsolicitud` date NOT NULL,
  `factividad` date NOT NULL,
  `vendedor` varchar(200) NOT NULL,
  `actividad` varchar(100) NOT NULL,
  `ejecutivo` varchar(100) NOT NULL,
  `apoyo` varchar(30) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `fpreventa` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `asignar` varchar(30) NOT NULL,
  `fasignacion` date NOT NULL,
  `desc` varchar(500) NOT NULL,
  PRIMARY KEY (`nrosolicitud`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nrosolicitud`, `fsolicitud`, `factividad`, `vendedor`, `actividad`, `ejecutivo`, `apoyo`, `pais`, `cliente`, `tipo`, `fpreventa`, `status`, `asignar`, `fasignacion`, `desc`) VALUES
(123, '2015-06-01', '2015-06-02', 'qwqdqwd', 'qwdqwd', 'Carlos', '', 'Argentina', 'dqwdqwd', 'qwdqwd', '2015-06-30', 'Iniciada', 'qwdqwdqd', '2015-06-27', 'Sistema totalmente operativo y sin mayor novedad'),
(124, '2015-06-01', '2015-06-02', 'tyjtdt', 'x ssdvsdvdsd', 'JOse', '', 'Argentina', 'SAAS', 'Remoto', '2015-06-03', 'Iniciada', '', '0000-00-00', ''),
(126, '2015-06-02', '0000-00-00', 'tyjtugkhuktdt', 'x ssrthhdvdsd', 'Josettth', '', 'Ecuador', 'Makro', 'Presencial', '0000-00-00', 'No procesado', '', '0000-00-00', ''),
(127, '2015-06-04', '0000-00-00', 'juan perez', 'ykyk', 'Carlox', '', 'Venezuela', 'SAAS', 'Remoto', '0000-00-00', 'Pendiente', '', '0000-00-00', ''),
(128, '2015-06-06', '0000-00-00', 'juan perez', 'czccadc', 'Pedro', '', 'Colombia', 'Farmatodo', 'Presencial', '0000-00-00', '', '', '0000-00-00', ''),
(129, '2015-06-02', '0000-00-00', 'Maria', 'Todo bien', 'Carlos', '', 'Venezuela', 'NestlÃ©', 'Remoto', '0000-00-00', '', '', '0000-00-00', ''),
(135, '2015-06-03', '0000-00-00', 'juan perez', 'Todo bien', 'Carlox', '', 'Venezuela', 'SAAS', 'Remoto', '0000-00-00', '', '', '0000-00-00', ''),
(136, '2015-06-12', '0000-00-00', 'Ana', 'czccadc', 'Ramon', '', 'Venezuela', 'Makro', 'Presencial', '0000-00-00', 'Stand-By', '', '0000-00-00', ''),
(137, '2015-06-06', '2015-06-06', 'juan perez', 'vasfbvadvda', 'Carlos', '', 'Venezuela', 'Farmatodo', 'Presencial', '0000-00-00', '', '', '0000-00-00', ''),
(138, '2015-06-01', '2015-06-04', 'Pedro', 'Todo bien', 'Carlos', '', 'Venezuela', 'SAAS', 'Presencial', '0000-00-00', 'Iniciado', '', '0000-00-00', ''),
(139, '2015-06-10', '2015-06-11', 'maria weffer', 'Conferencia', 'Garcie marie', '', 'Colombia', 'SAAS', 'Remoto', '2015-06-12', 'No procesado', '', '2015-06-24', ''),
(140, '2015-06-09', '2015-06-10', 'Maria', 'conferecnia', 'garcial marchena', '', 'Venezuela', 'SAAS', 'Presencial', '0000-00-00', 'Iniciado', '', '0000-00-00', ''),
(141, '2015-06-10', '2015-06-12', 'maria perez', 'Conferencia', 'karla marino', '', 'Venezuela', 'SAAS', 'Presencial', '0000-00-00', 'Stand-By', '', '0000-00-00', ''),
(142, '0000-00-00', '2015-06-03', 'Jose Navas', 'Conferencia', 'Jose Navas', '', 'Colombia', 'Farmatodo', 'Remoto', '0000-00-00', 'Iniciado', '', '0000-00-00', 'Conferencia via web'),
(143, '0000-00-00', '2015-06-25', 'ana maria sanchez', 'simulacion', 'Jose Navas', 'Carlos herrera', 'Colombia', 'Farmatodo', 'Presencial', '2015-06-12', 'Pendiente', '', '2015-06-02', 'simulacion simple'),
(144, '0000-00-00', '2015-06-12', 'Jose Navas', 'conferencia', 'ana maria sanchez', 'Jose Navas', 'Venezuela', 'Farmatodo', 'Presencial', '2015-06-26', 'Pendiente', '', '2015-06-19', 'conferencia presencial'),
(145, '0000-00-00', '2015-06-24', 'Jose Navas', 'presentacion', 'ana maria sanchez', '', 'Venezuela', 'SAAS', 'Remoto', '0000-00-00', 'Iniciado', '', '0000-00-00', 'presentaciÃ³n web'),
(146, '0000-00-00', '2015-06-20', 'Jose Navas', 'presentacion', 'ana maria sanchez', '', 'Venezuela', 'SAAS', 'Presencial', '0000-00-00', 'Iniciado', '', '2015-06-26', 'presentacion web');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
