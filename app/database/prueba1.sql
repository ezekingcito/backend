-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-02-2024 a las 22:57:06
-- Versión del servidor: 11.2.3-MariaDB
-- Versión de PHP: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_articulo`
--

CREATE TABLE `t_articulo` (
  `id_articulo` int(11) NOT NULL,
  `articulo` varchar(100) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_articulo`
--

INSERT INTO `t_articulo` (`id_articulo`, `articulo`, `precio`, `descripcion`) VALUES
(1, 'PC ESCRITORIO', '20000', 'RYZEN 9 7800H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_auto`
--

CREATE TABLE `t_auto` (
  `id_auto` int(11) NOT NULL,
  `marca` varchar(200) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_auto`
--

INSERT INTO `t_auto` (`id_auto`, `marca`, `modelo`, `color`) VALUES
(4, 'Mazda', '2018', 'negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_moto`
--

CREATE TABLE `t_moto` (
  `id_moto` int(11) NOT NULL,
  `marca` varchar(200) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_moto`
--

INSERT INTO `t_moto` (`id_moto`, `marca`, `modelo`, `color`) VALUES
(4, 'Vento', '2024', 'blanca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `nombre`, `apellido`, `email`) VALUES
(1, 'Alejandro', 'Mendoza Ortega', 'eamendoza_02@gmail.com'),
(4, 'Joaquin', 'Iglesias', 'ehemplo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_articulo`
--
ALTER TABLE `t_articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `t_auto`
--
ALTER TABLE `t_auto`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indices de la tabla `t_moto`
--
ALTER TABLE `t_moto`
  ADD PRIMARY KEY (`id_moto`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_articulo`
--
ALTER TABLE `t_articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_auto`
--
ALTER TABLE `t_auto`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_moto`
--
ALTER TABLE `t_moto`
  MODIFY `id_moto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
