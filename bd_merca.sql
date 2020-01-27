-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 02:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_merca`
--

-- --------------------------------------------------------

--
-- Table structure for table `camiones`
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

--
-- Dumping data for table `camiones`
--

 
-- --------------------------------------------------------

--
-- Table structure for table `conductores`
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

--
-- Dumping data for table `conductores`
--

 

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `id_sucursal`, `nombre`, `telefono`, `fecha_registro`) VALUES
(1, 1, 'DEPARTAMENTO DE SISTEMAS', '111', '2019-09-29 17:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `estatus_conductores`
--

CREATE TABLE `estatus_conductores` (
  `ID_ESTATUS_CONDUCTORES` int(11) NOT NULL,
  `DESCRIPCION` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estatus_conductores`
--

INSERT INTO `estatus_conductores` (`ID_ESTATUS_CONDUCTORES`, `DESCRIPCION`, `ESTATUS`) VALUES
(1, 'INACTIVO', 1),
(2, 'ACTIVO', 1),
(3, 'ENFERMO', 1),
(4, 'VACACIONES', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(7) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `mantenimiento`
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
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mantenimiento`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `fecha_registro`) VALUES
(1, 'ADMINISTRADOR', '2019-09-29 17:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sucursales` (`id`, `nombre`, `telefono`, `ciudad`, `direccion`, `fecha_registro`) VALUES
(1, 'Casa matriz', '962 625 0767', 'TAPACHULA', 'Calle 14a. Poniente Num. 4 Colonia Centro', '2019-09-29 17:33:10');

--
-- Dumping data for table `sucursales`
--
 
--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_empleado`, `id_rol`, `usuario`, `password`, `foto`, `estado`, `ultimo_login`, `fecha_registro`) VALUES
(1, 1, 1, 'admin', '1234', 'vistas/img/usuarios/admin/111.jpg', 1, '2019-12-24 16:19:15', '2019-12-24 22:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `viaje`
--

CREATE TABLE `viaje` (
  `ID_VIAJE` int(11) NOT NULL,
  `ID_CAMIONES` int(11) DEFAULT NULL,
  `TIPO_VIAJE` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD_PEDIDOS` int(100) DEFAULT NULL,
  `MONTO_TOTAL` int(100) DEFAULT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_SALIDA` date DEFAULT NULL,
  `ESTATUS` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `viaje`
--
 
--
-- Indexes for dumped tables
--

--
-- Indexes for table `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`ID_CAMIONES`),
  ADD KEY `ID_CONDUCTORES` (`ID_CONDUCTORES`),
  ADD KEY `ID_SUCURSALES` (`ID_SUCURSALES`);

--
-- Indexes for table `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`ID_CONDUCTORES`),
  ADD KEY `ID_ESTATUS_CONDUCTORES` (`ID_ESTATUS_CONDUCTORES`),
  ADD KEY `ID_SUCURSALES` (`ID_SUCURSALES`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indexes for table `estatus_conductores`
--
ALTER TABLE `estatus_conductores`
  ADD PRIMARY KEY (`ID_ESTATUS_CONDUCTORES`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `ID_CONDUCTORES` (`ID_CONDUCTORES`),
  ADD KEY `ID_CAMIONES` (`ID_CAMIONES`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indexes for table `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID_VIAJE`),
  ADD KEY `ID_CAMIONES` (`ID_CAMIONES`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camiones`
--
ALTER TABLE `camiones`
  MODIFY `ID_CAMIONES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `conductores`
--
ALTER TABLE `conductores`
  MODIFY `ID_CONDUCTORES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estatus_conductores`
--
ALTER TABLE `estatus_conductores`
  MODIFY `ID_ESTATUS_CONDUCTORES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `viaje`
--
ALTER TABLE `viaje`
  MODIFY `ID_VIAJE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camiones`
--
ALTER TABLE `camiones`
  ADD CONSTRAINT `camiones_ibfk_1` FOREIGN KEY (`ID_CONDUCTORES`) REFERENCES `conductores` (`ID_CONDUCTORES`)  ,
  ADD CONSTRAINT `camiones_ibfk_2` FOREIGN KEY (`ID_SUCURSALES`) REFERENCES `sucursales` (`id`) ;

--
-- Constraints for table `conductores`
--
ALTER TABLE `conductores`
  ADD CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`ID_ESTATUS_CONDUCTORES`) REFERENCES `estatus_conductores` (`ID_ESTATUS_CONDUCTORES`)  ,
  ADD CONSTRAINT `conductores_ibfk_2` FOREIGN KEY (`ID_SUCURSALES`) REFERENCES `sucursales` (`id`);

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`) ;

--
-- Constraints for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`) ,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`ID_CONDUCTORES`) REFERENCES `conductores` (`ID_CONDUCTORES`),
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`ID_CAMIONES`) REFERENCES `camiones` (`ID_CAMIONES`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ;

--
-- Constraints for table `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`ID_CAMIONES`) REFERENCES `camiones` (`ID_CAMIONES`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
