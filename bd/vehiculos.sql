-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 23:31:51
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vehiculos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slides`
--

CREATE TABLE `slides` (
  `id_slides` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `ruta_foto` varchar(250) COLLATE utf8_bin NOT NULL,
  `estado` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `slides`
--

INSERT INTO `slides` (`id_slides`, `descripcion`, `ruta_foto`, `estado`) VALUES
(1, 'mazda 1', 'slider/mazda1.jpg', 'A'),
(2, 'Mazda 2', 'slider/mazda2.jpg', 'A'),
(3, 'mazda 3', 'slider/mazda3.jpg\r\n', 'A'),
(4, 'mazda 4', 'slider/mazda4.jpg\r\n', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(250) COLLATE utf8_bin NOT NULL,
  `identificacion` varchar(250) COLLATE utf8_bin NOT NULL,
  `perfil` varchar(1) COLLATE utf8_bin NOT NULL,
  `password` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `identificacion`, `perfil`, `password`) VALUES
(2, 'DANNY ANDRADE LASSO', '1085312146', '1', '123'),
(3, 'Usuario 1', '1234', '2', '123'),
(5, 'usuario 3', '12345', '2', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(250) COLLATE utf8_bin NOT NULL,
  `modelo` varchar(250) COLLATE utf8_bin NOT NULL,
  `color` varchar(250) COLLATE utf8_bin NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `ruta_foto` varchar(250) COLLATE utf8_bin NOT NULL,
  `estado` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `marca`, `modelo`, `color`, `precio`, `ruta_foto`, `estado`) VALUES
(1, 'Mazda 2', '2019', 'Rojo', '50000000', 'vehiculos/mazda2.jpg', 'A'),
(2, 'Mazda CX 9', '2019', 'Rojo', '108000000', 'vehiculos/cx-9.jpg', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `slides`
--
ALTER TABLE `slides`
  ADD UNIQUE KEY `id_slides` (`id_slides`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD UNIQUE KEY `id_vehiculo` (`id_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `slides`
--
ALTER TABLE `slides`
  MODIFY `id_slides` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
