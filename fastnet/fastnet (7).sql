-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 15:48:28
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fastnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `contrato_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `con_direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ip_cliente_id` int(11) DEFAULT NULL,
  `plan_id` int(11) NOT NULL,
  `instalacion_tipo_id` int(11) NOT NULL,
  `con_fecha_inicio` datetime NOT NULL,
  `router_id` int(11) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`contrato_id`, `cliente_id`, `con_direccion`, `ip_cliente_id`, `plan_id`, `instalacion_tipo_id`, `con_fecha_inicio`, `router_id`, `zona_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Satipo. Urb Santa Leonor', 1, 1, 1, '2019-11-05 00:00:00', 1, 1, '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'Av lima', 1, 1, 1, '2019-11-13 14:00:00', 1, 1, '2019-11-13 00:00:00', '2019-11-13 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_tipo`
--

CREATE TABLE `doc_tipo` (
  `doc_id` int(11) NOT NULL,
  `doc_nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doc_tipo`
--

INSERT INTO `doc_tipo` (`doc_id`, `doc_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DNI', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(2, 'PASAPORTE 2', '2019-11-12 14:07:04', '2019-11-12 14:07:51', '2019-11-12 14:07:51'),
(3, 'RUC', '2019-11-12 14:07:39', '2019-11-12 14:07:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion_tipo`
--

CREATE TABLE `instalacion_tipo` (
  `instalacion_tipo_id` int(11) NOT NULL,
  `instalacion_nombre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instalacion_tipo`
--

INSERT INTO `instalacion_tipo` (`instalacion_tipo_id`, `instalacion_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GPON', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(2, 'ANTENA', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ips_cliente`
--

CREATE TABLE `ips_cliente` (
  `ip_cliente_id` int(11) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `asignada` tinyint(1) NOT NULL,
  `servidor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ips_cliente`
--

INSERT INTO `ips_cliente` (`ip_cliente_id`, `ip_address`, `asignada`, `servidor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '99.50.50.2', 1, 1, '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(2, '192.168.10.1', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(3, '192.168.10.2', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(4, '192.168.10.3', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(5, '192.168.10.4', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(6, '192.168.10.5', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(7, '192.168.10.6', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(8, '192.168.10.7', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(9, '192.168.10.8', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(10, '192.168.10.9', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00'),
(11, '192.168.10.10', 0, 11, '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `persona_id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `doc_tipo_id` int(11) NOT NULL,
  `doc_num` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `referencia` text COLLATE utf8_spanish_ci NOT NULL,
  `movil` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` tinyint(1) NOT NULL,
  `usuario` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`persona_id`, `nombre`, `doc_tipo_id`, `doc_num`, `ciudad`, `direccion`, `referencia`, `movil`, `cliente`, `usuario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JULIAN', 1, '71118137', 'PICHANAKI', 'Jr. 1 de MAYO', 'la kachina', '959587458', 1, 1, '2019-11-05 00:00:00', '2019-11-12 20:35:56', '0000-00-00 00:00:00'),
(2, 'dANNY', 1, '74745589', 'Satipo', 'jR. jUNIN', 'Grass Choke', '985632569', 1, 1, '2019-11-05 00:00:00', '2019-11-12 20:17:39', '0000-00-00 00:00:00'),
(3, 'Flores Meza James', 1, '71118137', '', 'Av lima', 'frente al cole', '931932916', 1, 1, '2019-11-12 15:32:10', '2019-11-12 20:36:12', '0000-00-00 00:00:00'),
(4, 'Huaringa Vilches Danny', 1, '76541238', '', 'Av lon andes', 'frente a la disco', '987456321', 1, 0, '2019-11-12 15:57:31', '2019-11-12 19:03:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `plan_id` int(11) NOT NULL,
  `plan_nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `subida` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `bajada` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(3,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`plan_id`, `plan_nombre`, `subida`, `bajada`, `precio`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basico', '1MB', '4MB', '50', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routers`
--

CREATE TABLE `routers` (
  `router_id` int(11) NOT NULL,
  `router_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `router_ip` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `router_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `router_pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `routers`
--

INSERT INTO `routers` (`router_id`, `router_nombre`, `router_ip`, `router_user`, `router_pass`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TPLINK', '192.123.12.1', 'admin', 'admin', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `servicio_id` int(11) NOT NULL,
  `servicio_nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(3,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `servicio_nombre`, `precio`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INSTALACION', '150', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(2, 'AVERIA', '0', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(3, 'BAJA', '0', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servidores`
--

CREATE TABLE `servidores` (
  `servidor_id` int(11) NOT NULL,
  `servidor_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rango_inicial` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `rango_final` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servidores`
--

INSERT INTO `servidores` (`servidor_id`, `servidor_nombre`, `rango_inicial`, `rango_final`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Server 1', '172.168.4.1', '172.168.4.254', '2019-11-13 00:00:00', '2019-11-13 00:00:00', '0000-00-00 00:00:00'),
(2, 'asd', '234', '234', '2019-11-13 18:18:42', '2019-11-13 18:18:42', '0000-00-00 00:00:00'),
(3, '', '196.168', '255', '2019-11-13 18:30:44', '2019-11-13 18:30:44', '0000-00-00 00:00:00'),
(4, '', '196.168', '255', '2019-11-13 18:31:09', '2019-11-13 18:31:09', '0000-00-00 00:00:00'),
(5, '', '100.145', '353.145', '2019-11-13 18:31:33', '2019-11-13 18:31:33', '0000-00-00 00:00:00'),
(6, 'Server 4', '99.45.173.1', '99.45.173.243', '2019-11-13 18:38:40', '2019-11-13 18:38:40', '0000-00-00 00:00:00'),
(9, 'Server 6', '1.1.1.5', '1.1.1.10', '2019-11-13 18:59:20', '2019-11-13 18:59:20', '0000-00-00 00:00:00'),
(10, 'Server 7', '2.2.2.1', '2.2.2.10', '2019-11-13 19:00:53', '2019-11-13 19:00:53', '0000-00-00 00:00:00'),
(11, 'danyy', '192.168.10.1', '192.168.10.10', '2019-11-14 14:52:18', '2019-11-14 14:52:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `ticket_ciudad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ticket_direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ticket_referencia` text COLLATE utf8_spanish_ci NOT NULL,
  `ticket_movil` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `ticket_fecha_inicio` datetime NOT NULL,
  `ticket_motivo` text COLLATE utf8_spanish_ci NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `ticket_nota_tec` text COLLATE utf8_spanish_ci NOT NULL,
  `ticket_estado_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_estados`
--

CREATE TABLE `ticket_estados` (
  `ticket_estado_id` int(11) NOT NULL,
  `ticket_estado_nombre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ticket_estados`
--

INSERT INTO `ticket_estados` (`ticket_estado_id`, `ticket_estado_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Inicio', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(4, 'Error', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(5, 'Resuelto', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `user` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `pass` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario_tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `persona_id`, `user`, `pass`, `usuario_tipo`, `created_at`, `updated_at`) VALUES
(8, 2, 'danny', '$2y$10$hPzKY3Xv0xlk0VQJM2epT.aR0kmG005kjI5v9a6GOsKzkzyRBCweW', '', '2019-11-12 20:17:40', '2019-11-12 20:17:40'),
(9, 1, 'julian', '$2y$10$cr2ZMS6qghsJ4NWLu9gTeeC5QYewvOiHKdBM4H9zsyD77hcmSveLq', '', '2019-11-12 20:35:56', '2019-11-12 20:35:56'),
(10, 3, 'admin', '$2y$10$7jxwioGkUc5KmwC2s1rTYOOo8oiJnJvqUoJih025O7fhyLzhVYHk6', '', '2019-11-12 20:36:12', '2019-11-12 20:36:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `zona_id` int(11) NOT NULL,
  `zona_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `zona_caja` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`zona_id`, `zona_nombre`, `zona_caja`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mercado 1', 'P-0005', '2019-11-05 00:00:00', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`contrato_id`),
  ADD KEY `cliente_id` (`cliente_id`,`ip_cliente_id`,`plan_id`,`instalacion_tipo_id`,`router_id`,`zona_id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `router_id` (`router_id`),
  ADD KEY `zona_id` (`zona_id`),
  ADD KEY `instalacion_id` (`instalacion_tipo_id`),
  ADD KEY `ip_cliente_id` (`ip_cliente_id`);

--
-- Indices de la tabla `doc_tipo`
--
ALTER TABLE `doc_tipo`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indices de la tabla `instalacion_tipo`
--
ALTER TABLE `instalacion_tipo`
  ADD PRIMARY KEY (`instalacion_tipo_id`);

--
-- Indices de la tabla `ips_cliente`
--
ALTER TABLE `ips_cliente`
  ADD PRIMARY KEY (`ip_cliente_id`),
  ADD KEY `servidor_id` (`servidor_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`persona_id`),
  ADD KEY `doc_tipo_id` (`doc_tipo_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indices de la tabla `routers`
--
ALTER TABLE `routers`
  ADD PRIMARY KEY (`router_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`servicio_id`);

--
-- Indices de la tabla `servidores`
--
ALTER TABLE `servidores`
  ADD PRIMARY KEY (`servidor_id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `contrato_id` (`contrato_id`,`servicio_id`,`ticket_estado_id`),
  ADD KEY `tecnico_id` (`tecnico_id`),
  ADD KEY `servicio_id` (`servicio_id`),
  ADD KEY `ticket_estado_id` (`ticket_estado_id`);

--
-- Indices de la tabla `ticket_estados`
--
ALTER TABLE `ticket_estados`
  ADD PRIMARY KEY (`ticket_estado_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`zona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `contrato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doc_tipo`
--
ALTER TABLE `doc_tipo`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instalacion_tipo`
--
ALTER TABLE `instalacion_tipo`
  MODIFY `instalacion_tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ips_cliente`
--
ALTER TABLE `ips_cliente`
  MODIFY `ip_cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `persona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `routers`
--
ALTER TABLE `routers`
  MODIFY `router_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servidores`
--
ALTER TABLE `servidores`
  MODIFY `servidor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ticket_estados`
--
ALTER TABLE `ticket_estados`
  MODIFY `ticket_estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `zona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `personas` (`persona_id`),
  ADD CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`plan_id`),
  ADD CONSTRAINT `contratos_ibfk_5` FOREIGN KEY (`instalacion_tipo_id`) REFERENCES `instalacion_tipo` (`instalacion_tipo_id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`doc_tipo_id`) REFERENCES `doc_tipo` (`doc_id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`contrato_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`servicio_id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`tecnico_id`) REFERENCES `personas` (`persona_id`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`ticket_estado_id`) REFERENCES `ticket_estados` (`ticket_estado_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`persona_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
