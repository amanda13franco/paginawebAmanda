-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2019 a las 06:46:44
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gelatinas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g_clientes`
--

CREATE TABLE `g_clientes` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidop` varchar(30) DEFAULT NULL,
  `apelliom` varchar(30) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `g_clientes`
--

INSERT INTO `g_clientes` (`id_cliente`, `nombre`, `apellidop`, `apelliom`, `telefono`, `direccion`) VALUES
(13, 'Jorge', 'Jacobo', 'Francisco', 43534543, 'Calle Tirteo'),
(14, 'Amanda', 'Franco', 'Uribe', 5455656, 'Embajada de Yugoslavia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g_gelas`
--

CREATE TABLE `g_gelas` (
  `id_gelatina` int(10) NOT NULL,
  `sabor` varchar(30) DEFAULT NULL,
  `molde` varchar(30) DEFAULT NULL,
  `litros` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `extra` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `g_gelas`
--

INSERT INTO `g_gelas` (`id_gelatina`, `sabor`, `molde`, `litros`, `tipo`, `extra`) VALUES
(1, 'fresa', 'corazon', 4, 'Leche', 'Con fruta natural'),
(3, 'uva', 'circular', 4, 'Agua', 'Con bombones'),
(4, 'limon', 'rectangular', 5, 'Yogurt', 'Con lechera extra.'),
(5, 'cereza', 'circular', 8, 'Leche', 'Con cerezas extras'),
(6, 'mora', 'flor', 2, 'Agua', 'Con figuritas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g_pedidos`
--

CREATE TABLE `g_pedidos` (
  `id_pedido` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `id_gelatina` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `monto` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `g_pedidos`
--

INSERT INTO `g_pedidos` (`id_pedido`, `id_cliente`, `id_gelatina`, `fecha`, `monto`) VALUES
(2, 14, 1, '2019-02-27', 150);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `g_clientes`
--
ALTER TABLE `g_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `g_gelas`
--
ALTER TABLE `g_gelas`
  ADD PRIMARY KEY (`id_gelatina`);

--
-- Indices de la tabla `g_pedidos`
--
ALTER TABLE `g_pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `g_clientes`
--
ALTER TABLE `g_clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `g_gelas`
--
ALTER TABLE `g_gelas`
  MODIFY `id_gelatina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `g_pedidos`
--
ALTER TABLE `g_pedidos`
  MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
