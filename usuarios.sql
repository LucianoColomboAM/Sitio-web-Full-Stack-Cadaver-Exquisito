-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2022 a las 08:14:09
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL,
  `usuario_nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario_clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario_email` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario_freg` datetime NOT NULL,
  `usuario_ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_texto` varchar(1050) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_clave`, `usuario_email`, `usuario_freg`, `usuario_ruta`, `usuario_texto`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'ejemplo2@mail.com', '2022-02-24 22:41:44', 'perfil.png', 'Lejos de la ciudad, en un pueblo rodeado de lagos, hubo una persona capaz de sortear obstáculos inimaginables, de ser el sobrevivientes de incontables adversidades que nos llevaron a repetirlas por noches y noches de emociones y festejos. Si bien en las historias con el tiempo se deterioran, y se modifican los detalles, aquí entre todos vamos a contar una pequeña parte de esas acciones que hicieron de este pequeño pueblo el hogar y el comienzo de una de las mas memorables aventuras.Lejos de la ciudad, en un pueblo rodeado de lagos, hubo una persona capaz de sortear obstáculos inimaginables, de ser el sobrevivientes de incontables adversidades que nos llevaron a repetirlas por noches y noches de emociones y festejos. Si bien en las historias con el tiempo se deterioran, y se modifican los detalles, aquí entre todos vamos a contar una pequeña parte de esas acciones que hicieron de este pequeño pueblo el hogar y el comienzo de una de las mas memorables aventuras.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
