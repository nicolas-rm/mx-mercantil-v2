-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 06:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



-- CREAR LA BASE DE DATOS CON EL NOMBRE saur_mercantil y elegir utf8_spanish_ci



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- -----------------------------------------------------------------------------

-- Table structure for table `sucursales`

CREATE TABLE  IF NOT EXISTS `sucursales` (
  `id` int(11) NOT NULL,

  `nombre` text COLLATE utf8_spanish_ci,
  `telefono` text COLLATE utf8_spanish_ci,
  `ciudad` text COLLATE utf8_spanish_ci,
  `direccion` text COLLATE utf8_spanish_ci,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (1, 'Casa matriz', '962 625 0767', 'TAPACHULA', 'Calle 14a. Poniente Num. 4 Colonia Centro', '2019-09-29 17:33:10'); 
  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (2, '5 de febrero', '962 626 5520', 'TAPACHULA', '8a. Norte Y Esquina 37 Poniente S/N Colonia 5 De Febrero', '2019-09-29 17:33:10');
  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (3, 'Laureles', '962 626 4600', 'TAPACHULA', 'Central Oriente Y Prolongación 1 S/N Fraccionamiento Guadalupe', '2019-09-29 17:33:10');
  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (4, '1ro de mayo', '962 625 7861', 'TAPACHULA', '11a. Sur Num.113. Colonia Calcáneo Beltran', '2019-09-29 17:33:10');
  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (5, 'Casa del herrero', '962 625 4796', 'TAPACHULA', '4a. Sur Y 14 Poniente S/N Colonia Centro', '2019-09-29 17:33:10');  
  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (6, 'Raymundo enriquez', '962 120 2459', 'TAPACHULA', 'Carretera a Ejido Raymundo Enríquez S/N Sin Colonia', '2019-09-29 17:33:10');  
  INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES (7, 'El hueyate', '962 642 0020', 'Huixtla', 'Avenida Abasolo Norte Num. 53-B Colonia Centro', '2019-09-29 17:33:10'); 
 
-- -----------------------------------------------------------------------------
 -- Table structure for table `empleados`

CREATE TABLE  IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL,
  `id_sucursal` int COLLATE utf8_spanish_ci,

  `nombre` text COLLATE utf8_spanish_ci,
  `telefono` text COLLATE utf8_spanish_ci,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `empleados`
   ADD FOREIGN KEY (id_sucursal) REFERENCES sucursales (id) ON DELETE CASCADE ON UPDATE CASCADE;

   INSERT INTO `empleados` (`id`, `id_sucursal`, `nombre`, `telefono`, `fecha_registro`) VALUES (1, 1, 'DEPARTAMENTO DE SISTEMAS', '111', '2019-09-29 17:36:24');

-- -----------------------------------------------------------------------------

-- Table structure for table `roles`

CREATE TABLE  IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  INSERT INTO `roles` (`id`, `nombre`, `fecha_registro`) VALUES (1, 'ADMINISTRADOR', '2019-09-29 17:34:58');

-- -----------------------------------------------------------------------------

-- Table structure for table `usuarios`

CREATE TABLE  IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `id_empleado` int COLLATE utf8_spanish_ci,
  `id_rol` int COLLATE utf8_spanish_ci,

  `usuario` text COLLATE utf8_spanish_ci,
  `password` text COLLATE utf8_spanish_ci,
  `foto` text COLLATE utf8_spanish_ci,
  `estado` int(11),
  `ultimo_login` datetime,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `usuarios`
   ADD FOREIGN KEY (id_empleado) REFERENCES empleados (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `usuarios`
  ADD FOREIGN KEY (id_rol) REFERENCES roles (id) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `usuarios` (`id`, `id_empleado`, `id_rol`, `usuario`, `password`, `foto`, `estado`, `ultimo_login`, `fecha_registro`) VALUES
                       (1, 1, 1, 'sistemas', 'sistemas123', 'vistas/img/usuarios/sistemas/304.png', 1, '2019-09-29 00:00:00', '2019-09-29 17:37:53');

 -- -----------------------------------------------------------------------------


   -- -----------------------------------------------------------------------------
 
 
--
-- Base de datos: `bd_merca`
--

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `ID_CONDUCTORES` (`ID_CONDUCTORES`),
  ADD KEY `ID_CAMIONES` (`ID_CAMIONES`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`ID_CONDUCTORES`) REFERENCES `conductores` (`ID_CONDUCTORES`),
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`ID_CAMIONES`) REFERENCES `camiones` (`ID_CAMIONES`);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
