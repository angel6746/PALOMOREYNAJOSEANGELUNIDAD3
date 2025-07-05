-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2025 a las 04:10:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saberhaceru3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` enum('admin','usuario') NOT NULL,
  `token_recover` varchar(255) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `tipo`, `token_recover`, `token_expira`) VALUES
(1, 'Jose Angel Palomo Reyna', 'jose@jose.com', '$2y$10$tBaV/cTA8rrqXqe24tzOKendpw93Ktqf5.QKuF6Ia4xSaVXnwQPNu', 'usuario', NULL, NULL),
(2, 'Adahir Eduardo Palomo Reyna', 'eduardo@eduardo.com', '$2y$10$i3rWbfRHY7EiNb7Apbta4uv2D3nHFawbqFMqp.aZotarviwSLSePS', 'admin', NULL, NULL),
(3, 'Maria Fernanda Chavez Coronel', 'fer@fer.com', '$2y$10$mGZhJdjyLTa64hr8LMk8Ze1rm0EM6Zj3.K.XLp4FMqnLO5hFJ00z6', 'usuario', NULL, NULL),
(4, 'Gabriel Alejando Reyes Morales', 'gabriel@gabriel.com', '$2y$10$ZEXNJvjrxYjgn/Y2awxk2ulWOxeWpqee0SNILmRXf6H7Csvw4Z2Yq', 'usuario', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
