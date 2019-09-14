-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2019 a las 15:27:33
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historicodivisas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_divisas`
--

CREATE TABLE `log_divisas` (
  `id` int(11) NOT NULL,
  `epoch` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `usd_transferencia` float NOT NULL,
  `usd_transfer_cucuta` float NOT NULL,
  `usd_efectivo` float NOT NULL,
  `usd_efectivo_real` float NOT NULL,
  `usd_efectivo_cucuta` float NOT NULL,
  `usd_promedio` float NOT NULL,
  `usd_promedio_real` float NOT NULL,
  `usd_cencoex` float NOT NULL,
  `usd_sicad1` float NOT NULL,
  `usd_sicad2` float NOT NULL,
  `usd_bitcoin_ref` float NOT NULL,
  `usd_localbitcoin_ref` float NOT NULL,
  `usd_dolartoday` float NOT NULL,
  `eur_transferencia` float NOT NULL,
  `eur_transfer_cucuta` float NOT NULL,
  `eur_efectivo` float NOT NULL,
  `eur_efectivo_real` float NOT NULL,
  `eur_efectivo_cucuta` float NOT NULL,
  `eur_promedio` float NOT NULL,
  `eur_promedio_real` float NOT NULL,
  `eur_cencoex` float NOT NULL,
  `eur_sicad1` float NOT NULL,
  `eur_sicad2` float NOT NULL,
  `eur_dolartoday` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log_divisas`
--
ALTER TABLE `log_divisas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log_divisas`
--
ALTER TABLE `log_divisas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
