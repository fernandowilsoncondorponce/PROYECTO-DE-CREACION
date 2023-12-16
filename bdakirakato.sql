-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 11:23:39
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdakirakato`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `nomAlumno` varchar(50) DEFAULT NULL,
  `apeAlumno` varchar(50) DEFAULT NULL,
  `secAlumno` varchar(50) DEFAULT NULL,
  `gradAlumno` varchar(50) DEFAULT NULL,
  `dniAlumno` varchar(20) DEFAULT NULL,
  `generoAlum` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `nomAlumno`, `apeAlumno`, `secAlumno`, `gradAlumno`, `dniAlumno`, `generoAlum`) VALUES
(1, 'RHOY SMITH', 'CARDENAS ROJAS', 'A', '1ER', '74331018', 'M'),
(2, 'GABRIELA RUBI', 'CARRANZA PEÑA', 'A', '1ER', '74512142', 'F'),
(3, 'YENIFER', 'CASTRO LOPEZ', 'A', '1ER', '76484929', 'F'),
(4, 'JONATHAN LEONARDO', 'CHAVEZ ALEJANDROS', 'A', '1ER', '78828617', 'M'),
(5, 'MERCEDES YAMILE RACHEL', 'CHAVEZ HARO', 'A', '1ER', '74346634', 'F'),
(6, 'YAMIR MIGUEL', 'CONDOR CASTELLANOS', 'A', '1ER', '74519946', 'M'),
(7, 'CARLITA EDITH', 'DAVILA ARISTA', 'A', '1ER', '62461325', 'F'),
(8, 'JUAN DAVID', 'ESPINOZA MARIN', 'A', '1ER', '74511417', 'M'),
(9, 'MISAEL ABRAHAM JORDAN', 'ESPINOZA PUCHOC', 'A', '1ER', '76099635', 'M'),
(10, 'ERICK LEONEL', 'GARCIA COLORADO', 'A', '1ER', '62433330', 'M'),
(11, 'SEBASTIAN FREDI', 'LOARTE LLATA', 'A', '1ER', '74508497', 'M'),
(12, 'GENESIS MARYORI', 'LOPEZ MORAN', 'A', '1ER', '74328296', 'F'),
(13, 'MELANY ROUSS', 'MALPARTIDA LUNA', 'A', '1ER', '74510278', 'F'),
(14, 'VALERIA DE GUADALUPE', 'MAURICIO ALANIA', 'A', '1ER', '74516256', 'F'),
(15, 'ISRAEL GEDEÓN', 'MEZA CONDOR', 'A', '1ER', '78286950', 'M'),
(16, 'ARIANA SAORI', 'MIRANDA DUEÑAS', 'A', '1ER', '75636693', 'F'),
(17, 'JESUS LIONEL', 'MORENO CANICELA', 'A', '1ER', '62607920', 'M'),
(18, 'KENMERLYN TAYDI', 'PACASI BOCANEGRA', 'A', '1ER', '62117643', 'F'),
(19, 'DAYRO DAYVIS', 'PACCHIONI CHARRI', 'A', '1ER', '75027456', 'M'),
(20, 'CARLA MAGDYEL', 'PARIONA PALOMINO', 'A', '1ER', '78651199', 'F'),
(21, 'XIOMARA ESTRELLA', 'PARIONA ROQUE', 'A', '1ER', '62548001', 'F'),
(22, 'LUIS ANGEL', 'PAUCAR PATILLA', 'A', '1ER', '61997821', 'M'),
(23, 'JOHN LENNY', 'QUINTO PEREZ', 'A', '1ER', '74521109', 'M'),
(24, 'ERICK', 'QUISPE LOPEZ', 'A', '1ER', '62643373', 'M'),
(25, 'BRIDGETH ISABOTH', 'RAMOS RIVERA', 'A', '1ER', '62399869', 'F'),
(26, 'ANDRE ALEXANDER', 'REYES ESPINOZA', 'A', '1ER', '74197848', 'M'),
(27, 'JHON NELSON', 'RODRIGUEZ ILIZARBE', 'A', '1ER', '61751240', 'M'),
(28, 'KAORY YAMILETH', 'RUIZ ALTAMIRANO', 'A', '1ER', '77007066', 'F'),
(29, 'XIOMARA MARILYN', 'SINCHE PAUCAR', 'A', '1ER', '75632660', 'F'),
(30, 'ROSA MASSIEL', 'SOLIS CUBA', 'A', '1ER', '74520672', 'F'),
(31, 'HAILEY DREAMS', 'TAFUR VILLAVERDE', 'A', '1ER', '77606863', 'F'),
(32, 'FABIANA IBET', 'VASQUEZ MARREROS', 'A', '1ER', '75035834', 'F'),
(33, 'JIMENA', 'VIDALON CARBAJAL', 'A', '1ER', '61692886', 'F'),
(34, 'MIA BRIANA', 'VILLANUEVA MENESES', 'A', '1ER', '76711498', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idProfesor` int(11) NOT NULL,
  `nomProf` varchar(50) DEFAULT NULL,
  `apellProf` varchar(50) DEFAULT NULL,
  `curProf` varchar(50) DEFAULT NULL,
  `dniProf` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idProfesor`, `nomProf`, `apellProf`, `curProf`, `dniProf`) VALUES
(1, 'ELIZABETH ', 'TORRES GARAY  ', 'CIENCIA SOCIALES', '0'),
(2, 'EDDY ANGELA   ', 'OLIVARES SALINAS', 'EDUCACION PARA EL TRABAJO ', '0'),
(3, 'VICTORIANO', 'CALDERON ZANABRIA', 'EDUCACIÓN FISICA  ', '0'),
(4, 'ANITA M.', 'GONZALES RIQUEZ', 'COMUNICACIÓN', '0'),
(5, 'JEAN STEVE ', 'EFFIO LEON', ' INGLES  ', '0'),
(6, 'GLORIA', 'PACHAS MESÍAS', ' CIENCIA Y TECNOLOGIA   ', '0'),
(7, ' MANELA ', 'TOLENTINO LIBERATO', 'EDUCACION RELIGIOSA   ', '0'),
(8, 'NATIVIDAD', '', 'COMPETENCIAS TRANSVERSALES', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registnotasbimest`
--

CREATE TABLE `registnotasbimest` (
  `idRegNotas` int(11) NOT NULL,
  `fActReg` date DEFAULT curdate(),
  `hActReg` time DEFAULT curtime(),
  `CompetReg` varchar(30) DEFAULT NULL,
  `notaReg` varchar(10) DEFAULT NULL,
  `conclDescReg` varchar(100) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `idAlumno` int(11) DEFAULT NULL,
  `bimesReg` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registnotasbimest`
--

INSERT INTO `registnotasbimest` (`idRegNotas`, `fActReg`, `hActReg`, `CompetReg`, `notaReg`, `conclDescReg`, `idProfesor`, `idAlumno`, `bimesReg`) VALUES
(1, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 1, 'I'),
(2, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 2, 'I'),
(3, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 3, 'I'),
(4, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 4, 'I'),
(5, '2023-05-20', '17:20:59', 'Competencia1', 'C', '', 1, 5, 'I'),
(6, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 6, 'I'),
(7, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 7, 'I'),
(8, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 8, 'I'),
(9, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 9, 'I'),
(10, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 10, 'I'),
(11, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 11, 'I'),
(12, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 12, 'I'),
(13, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 13, 'I'),
(14, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 14, 'I'),
(15, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 15, 'I'),
(16, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 16, 'I'),
(17, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 17, 'I'),
(18, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 18, 'I'),
(19, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 19, 'I'),
(20, '2023-05-20', '17:20:59', 'Competencia1', 'C', '', 1, 20, 'I'),
(21, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 21, 'I'),
(22, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 22, 'I'),
(23, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 23, 'I'),
(24, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 24, 'I'),
(25, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 25, 'I'),
(26, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 26, 'I'),
(27, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 27, 'I'),
(28, '2023-05-20', '17:20:59', 'Competencia1', 'C', '', 1, 28, 'I'),
(29, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 29, 'I'),
(30, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 30, 'I'),
(31, '2023-05-20', '17:20:59', 'Competencia1', 'B', '', 1, 31, 'I'),
(32, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 32, 'I'),
(33, '2023-05-20', '17:20:59', 'Competencia1', 'C', '', 1, 33, 'I'),
(34, '2023-05-20', '17:20:59', 'Competencia1', 'A', '', 1, 34, 'I'),
(35, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 1, 'I'),
(36, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 2, 'I'),
(37, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 3, 'I'),
(38, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 4, 'I'),
(39, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 5, 'I'),
(40, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 6, 'I'),
(41, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 7, 'I'),
(42, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 8, 'I'),
(43, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 9, 'I'),
(44, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 10, 'I'),
(45, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 11, 'I'),
(46, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 12, 'I'),
(47, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 13, 'I'),
(48, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 14, 'I'),
(49, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 15, 'I'),
(50, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 16, 'I'),
(51, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 17, 'I'),
(52, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 18, 'I'),
(53, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 19, 'I'),
(54, '2023-05-20', '17:20:59', 'Competencia2', 'C', '', 1, 20, 'I'),
(55, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 21, 'I'),
(56, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 22, 'I'),
(57, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 23, 'I'),
(58, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 24, 'I'),
(59, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 25, 'I'),
(60, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 26, 'I'),
(61, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 27, 'I'),
(62, '2023-05-20', '17:20:59', 'Competencia2', 'C', '', 1, 28, 'I'),
(63, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 29, 'I'),
(64, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 30, 'I'),
(65, '2023-05-20', '17:20:59', 'Competencia2', 'B', '', 1, 31, 'I'),
(66, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 32, 'I'),
(67, '2023-05-20', '17:20:59', 'Competencia2', 'C', '', 1, 33, 'I'),
(68, '2023-05-20', '17:20:59', 'Competencia2', 'A', '', 1, 34, 'I'),
(69, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 1, 'I'),
(70, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 2, 'I'),
(71, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 3, 'I'),
(72, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 4, 'I'),
(73, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 5, 'I'),
(74, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 6, 'I'),
(75, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 7, 'I'),
(76, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 8, 'I'),
(77, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 9, 'I'),
(78, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 10, 'I'),
(79, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 11, 'I'),
(80, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 12, 'I'),
(81, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 13, 'I'),
(82, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 14, 'I'),
(83, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 15, 'I'),
(84, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 16, 'I'),
(85, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 17, 'I'),
(86, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 18, 'I'),
(87, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 19, 'I'),
(88, '2023-05-20', '17:20:59', 'Competencia3', 'C', '', 1, 20, 'I'),
(89, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 21, 'I'),
(90, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 22, 'I'),
(91, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 23, 'I'),
(92, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 24, 'I'),
(93, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 25, 'I'),
(94, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 26, 'I'),
(95, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 27, 'I'),
(96, '2023-05-20', '17:20:59', 'Competencia3', 'C', '', 1, 28, 'I'),
(97, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 29, 'I'),
(98, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 30, 'I'),
(99, '2023-05-20', '17:20:59', 'Competencia3', 'B', '', 1, 31, 'I'),
(100, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 32, 'I'),
(101, '2023-05-20', '17:20:59', 'Competencia3', 'C', '', 1, 33, 'I'),
(102, '2023-05-20', '17:20:59', 'Competencia3', 'A', '', 1, 34, 'I'),
(103, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 1, 'I'),
(104, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 2, 'I'),
(105, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 3, 'I'),
(106, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 4, 'I'),
(107, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 5, 'I'),
(108, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 6, 'I'),
(109, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 7, 'I'),
(110, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 8, 'I'),
(111, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 9, 'I'),
(112, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 10, 'I'),
(113, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 11, 'I'),
(114, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 12, 'I'),
(115, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 13, 'I'),
(116, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 14, 'I'),
(117, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 15, 'I'),
(118, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 16, 'I'),
(119, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 17, 'I'),
(120, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 18, 'I'),
(121, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 19, 'I'),
(122, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 20, 'I'),
(123, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 21, 'I'),
(124, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 22, 'I'),
(125, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 23, 'I'),
(126, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 24, 'I'),
(127, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 25, 'I'),
(128, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 26, 'I'),
(129, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 27, 'I'),
(130, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 28, 'I'),
(131, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 29, 'I'),
(132, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 30, 'I'),
(133, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 31, 'I'),
(134, '2023-05-20', '18:21:12', 'Competencia1', 'A', '', 2, 32, 'I'),
(135, '2023-05-20', '18:21:12', 'Competencia1', 'C', 'No se cuenta con evidencia suficiente para determinar nivel de logro.', 2, 33, 'I'),
(136, '2023-05-20', '18:21:12', 'Competencia1', 'B', '', 2, 34, 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtutores`
--

CREATE TABLE `tbtutores` (
  `idTutor` int(11) NOT NULL,
  `TGrado` varchar(10) DEFAULT NULL,
  `TSeccion` varchar(10) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbtutores`
--

INSERT INTO `tbtutores` (`idTutor`, `TGrado`, `TSeccion`, `idProfesor`) VALUES
(1, '1ER', 'D', 1),
(2, '2DO', 'D', 2),
(3, '1ER', 'B', 6),
(4, '1ER', 'C', 6),
(5, '1ER', 'A', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `registnotasbimest`
--
ALTER TABLE `registnotasbimest`
  ADD PRIMARY KEY (`idRegNotas`),
  ADD KEY `idProfesor` (`idProfesor`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `tbtutores`
--
ALTER TABLE `tbtutores`
  ADD PRIMARY KEY (`idTutor`),
  ADD KEY `idProfesor` (`idProfesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `registnotasbimest`
--
ALTER TABLE `registnotasbimest`
  MODIFY `idRegNotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `tbtutores`
--
ALTER TABLE `tbtutores`
  MODIFY `idTutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registnotasbimest`
--
ALTER TABLE `registnotasbimest`
  ADD CONSTRAINT `registnotasbimest_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`idProfesor`),
  ADD CONSTRAINT `registnotasbimest_ibfk_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`);

--
-- Filtros para la tabla `tbtutores`
--
ALTER TABLE `tbtutores`
  ADD CONSTRAINT `tbtutores_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`idProfesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
