-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 04:20:07
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_merca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `ID_CAMIONES` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NUMERO_SERIE` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NUMERO_PLACAS` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOMBRE_CAMION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MODELO` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TIPO_CAMION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTATUS_CAMIONES` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_CONDUCTORES` int(11) DEFAULT NULL,
  `ID_SUCURSALES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `ID_CONDUCTORES` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO_LICENCIA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ID_ESTATUS_CONDUCTORES` int(11) NOT NULL,
  `ID_SUCURSALES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_sucursal`, `nombre`, `telefono`, `fecha_registro`) VALUES
(1, 1, 'DEPARTAMENTO DE SISTEMAS', '111', '2019-09-29 17:36:24'),
(2, 2, 'NICOLAS', '9622706509', '2019-11-24 02:33:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_camiones`
--

CREATE TABLE `estatus_camiones` (
  `ID_ESTATUS_CAMIONES` int(11) NOT NULL,
  `DESCRIPCION` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estatus_camiones`
--

INSERT INTO `estatus_camiones` (`ID_ESTATUS_CAMIONES`, `DESCRIPCION`, `ESTATUS`) VALUES
(1, 'TALLER', 1),
(2, 'LIBRE', 1),
(3, 'CARGADO', 1),
(4, 'RUTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_conductores`
--

CREATE TABLE `estatus_conductores` (
  `ID_ESTATUS_CONDUCTORES` int(11) NOT NULL,
  `DESCRIPCION` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estatus_conductores`
--

INSERT INTO `estatus_conductores` (`ID_ESTATUS_CONDUCTORES`, `DESCRIPCION`, `ESTATUS`) VALUES
(1, 'INACTIVO', 1),
(2, 'ACTIVO', 1),
(3, 'ENFERMO', 1),
(4, 'VACACIONES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `ID_CONDUCTORES` int(11) DEFAULT NULL,
  `ID_CAMIONES` int(11) DEFAULT NULL,
  `nombre_taller` text COLLATE utf8_spanish_ci NOT NULL,
  `kilometraje` float NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_mecanico` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refacciones`
--

CREATE TABLE `refacciones` (
  `ID_REFACCIONES` int(11) NOT NULL,
  `CODIGO` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOMBRE` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `fecha_registro`) VALUES
(1, 'ADMINISTRADOR', '2019-09-29 17:34:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES
(1, 'Casa matriz', '962 625 0767', 'TAPACHULA', 'Calle 14a. Poniente Num. 4 Colonia Centro', '2019-09-29 17:33:10'),
(2, '5 de febrero', '962 626 5520', 'TAPACHULA', '8a. Norte Y Esquina 37 Poniente S/N Colonia 5 De Febrero', '2019-09-29 17:33:10'),
(3, 'Laureles', '962 626 4600', 'TAPACHULA', 'Central Oriente Y Prolongación 1 S/N Fraccionamiento Guadalupe', '2019-09-29 17:33:10'),
(4, '1ro de mayo', '962 625 7861', 'TAPACHULA', '11a. Sur Num.113. Colonia Calcáneo Beltran', '2019-09-29 17:33:10'),
(5, 'Casa del herrero', '962 625 4796', 'TAPACHULA', '4a. Sur Y 14 Poniente S/N Colonia Centro', '2019-09-29 17:33:10'),
(6, 'Raymundo enriquez', '962 120 2459', 'TAPACHULA', 'Carretera a Ejido Raymundo Enríquez S/N Sin Colonia', '2019-09-29 17:33:10'),
(7, 'El hueyate', '962 642 0020', 'Huixtla', 'Avenida Abasolo Norte Num. 53-B Colonia Centro', '2019-09-29 17:33:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `usuario` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_empleado`, `id_rol`, `usuario`, `password`, `foto`, `estado`, `ultimo_login`, `fecha_registro`) VALUES
(2, 1, 1, 'admin', '123', NULL, 1, '2019-11-27 20:02:07', '2019-11-28 02:02:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ID_VIAJE` int(11) NOT NULL,
  `ID_CAMIONES` int(11) DEFAULT NULL,
  `TIPO_VIAJE` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD_PEDIDOS` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MONTO_TOTAL` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_SALIDA` date DEFAULT NULL,
  `ESTATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`ID_CAMIONES`),
  ADD KEY `ID_CONDUCTORES` (`ID_CONDUCTORES`),
  ADD KEY `ID_SUCURSALES` (`ID_SUCURSALES`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`ID_CONDUCTORES`),
  ADD KEY `ID_ESTATUS_CONDUCTORES` (`ID_ESTATUS_CONDUCTORES`),
  ADD KEY `ID_SUCURSALES` (`ID_SUCURSALES`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `estatus_camiones`
--
ALTER TABLE `estatus_camiones`
  ADD PRIMARY KEY (`ID_ESTATUS_CAMIONES`);

--
-- Indices de la tabla `estatus_conductores`
--
ALTER TABLE `estatus_conductores`
  ADD PRIMARY KEY (`ID_ESTATUS_CONDUCTORES`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `ID_CONDUCTORES` (`ID_CONDUCTORES`),
  ADD KEY `ID_CAMIONES` (`ID_CAMIONES`);

--
-- Indices de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD PRIMARY KEY (`ID_REFACCIONES`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID_VIAJE`),
  ADD KEY `ID_CAMIONES` (`ID_CAMIONES`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camiones`
--
ALTER TABLE `camiones`
  MODIFY `ID_CAMIONES` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `ID_CONDUCTORES` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estatus_camiones`
--
ALTER TABLE `estatus_camiones`
  MODIFY `ID_ESTATUS_CAMIONES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estatus_conductores`
--
ALTER TABLE `estatus_conductores`
  MODIFY `ID_ESTATUS_CONDUCTORES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  MODIFY `ID_REFACCIONES` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `ID_VIAJE` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD CONSTRAINT `camiones_ibfk_1` FOREIGN KEY (`ID_CONDUCTORES`) REFERENCES `conductores` (`ID_CONDUCTORES`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `camiones_ibfk_2` FOREIGN KEY (`ID_SUCURSALES`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`ID_ESTATUS_CONDUCTORES`) REFERENCES `estatus_conductores` (`ID_ESTATUS_CONDUCTORES`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conductores_ibfk_2` FOREIGN KEY (`ID_SUCURSALES`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`ID_CONDUCTORES`) REFERENCES `conductores` (`ID_CONDUCTORES`),
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`ID_CAMIONES`) REFERENCES `camiones` (`ID_CAMIONES`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`ID_CAMIONES`) REFERENCES `camiones` (`ID_CAMIONES`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
