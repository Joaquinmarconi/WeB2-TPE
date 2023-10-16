-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2023 a las 22:43:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina_musica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `Album_ID` int(11) NOT NULL,
  `Nombre_Album` text NOT NULL,
  `Año` int(11) NOT NULL,
  `Banda_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`Album_ID`, `Nombre_Album`, `Año`, `Banda_ID`) VALUES
(1, 'New Levels New Devils', 2018, 1),
(2, 'Remember That You Will Die', 2022, 1),
(3, 'Meteora', 2003, 2),
(4, 'New Sunrise', 2017, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banda`
--

CREATE TABLE `banda` (
  `Banda_ID` int(11) NOT NULL,
  `Nombre_banda` varchar(15) NOT NULL,
  `Fecha_fundación` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`Banda_ID`, `Nombre_banda`, `Fecha_fundación`) VALUES
(1, 'Polpyhia', '2013-09-01'),
(2, 'Linkin Park', '2013-09-18'),
(3, 'FALILV', '2014-09-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_ID` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `contraseña` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Album_ID`);

--
-- Indices de la tabla `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`Banda_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
