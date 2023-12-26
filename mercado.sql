-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 21:11:28
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `articulo_id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`articulo_id`, `titulo`, `precio`, `estado`) VALUES
(1, 'microondas', '100.00', 1),
(2, 'heladera', '200.00', 1),
(3, 'tablet', '100.00', 1),
(4, 'impresora', '300.00', 1),
(5, 'neumatico', '500.00', 1),
(6, 'auriculares', '200.00', 1),
(7, 'pistones', '50.00', 1),
(8, 'teclados', '250.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_x_rubros`
--

CREATE TABLE `articulos_x_rubros` (
  `articulos_x_rubro_id` int(11) NOT NULL,
  `rubro_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos_x_rubros`
--

INSERT INTO `articulos_x_rubros` (`articulos_x_rubro_id`, `rubro_id`, `articulo_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4),
(5, 5, 5),
(6, 5, 7),
(7, 4, 6),
(8, 6, 8),
(9, 3, 8),
(10, 1, 1),
(11, 1, 2),
(12, 1, 3),
(13, 1, 4),
(14, 1, 5),
(15, 1, 6),
(16, 1, 7),
(17, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` bigint(20) NOT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `usuario_id`, `fecha`, `estado`) VALUES
(1, 1, '2023-12-15 00:09:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_items`
--

CREATE TABLE `pedidos_items` (
  `pedidos_item_id` int(11) NOT NULL,
  `pedido_id` bigint(20) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_items`
--

INSERT INTO `pedidos_items` (`pedidos_item_id`, `pedido_id`, `articulo_id`, `descripcion`, `importe`, `cant`) VALUES
(1, 1, 4, 'impresora', '300.00', 1),
(2, 1, 1, 'microondas', '100.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` tinyint(4) NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol`) VALUES
(1, 'administradores'),
(2, 'clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `rubro_id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`rubro_id`, `nombre`, `estado`, `orden`) VALUES
(1, 'ofertas', 1, 1),
(2, 'electrodomesticos', 1, 2),
(3, 'informatica', 1, 3),
(4, 'equipos de audio', 1, 4),
(5, 'para tu auto', 1, 5),
(6, 'celuares y telefonia', 1, 6),
(7, 'camara y filmadoras', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` bigint(20) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `ult_login` timestamp NULL DEFAULT NULL,
  `rol_id` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `password`, `ult_login`, `rol_id`, `estado`) VALUES
(1, 'admin', 'admin', NULL, 1, 1),
(2, 'cliente', 'cliente', NULL, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`articulo_id`);

--
-- Indices de la tabla `articulos_x_rubros`
--
ALTER TABLE `articulos_x_rubros`
  ADD PRIMARY KEY (`articulos_x_rubro_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Indices de la tabla `pedidos_items`
--
ALTER TABLE `pedidos_items`
  ADD PRIMARY KEY (`pedidos_item_id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`rubro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `articulo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `articulos_x_rubros`
--
ALTER TABLE `articulos_x_rubros`
  MODIFY `articulos_x_rubro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos_items`
--
ALTER TABLE `pedidos_items`
  MODIFY `pedidos_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `rubro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
