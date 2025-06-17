-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2025 a las 20:47:17
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
-- Base de datos: `db_sistema_rol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(120) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `ubicacion`, `area`) VALUES
(2, 'DTIC', 'Edificio Central', 'Informatica'),
(4, 'Administracion', 'Campus Sur', 'Rectorado'),
(5, 'Contaduria', 'Sucursal Norte', 'Secretaria'),
(6, 'Aseo', 'Edificio Central', 'Baños'),
(7, 'Humanidades', 'Edificio Central', 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ci_empleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ci_empleado`, `nombre`, `apellido`, `telefono`, `direccion`, `correo`, `id_departamento`) VALUES
(555455454, 'Huevos', 'w', '21515511010', 'g', 'da@sd.cm', 4),
(2147483647, 'La', 'Bestia', '5151564541', 'Guasmo', 'asnasc@jsnn.com', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `hora25` decimal(10,2) NOT NULL,
  `hora50` decimal(10,2) NOT NULL,
  `hora100` decimal(10,2) NOT NULL,
  `bono` decimal(10,2) NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  `total_ingreso` decimal(10,2) NOT NULL,
  `iess` decimal(10,2) NOT NULL,
  `multas` decimal(10,2) NOT NULL,
  `atrasos` decimal(10,2) NOT NULL,
  `alimentacion` decimal(10,2) NOT NULL,
  `anticipos` decimal(10,2) NOT NULL,
  `otros` decimal(10,2) NOT NULL,
  `total_egreso` decimal(10,2) NOT NULL,
  `total_pagar` decimal(10,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ci_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `mes`, `hora25`, `hora50`, `hora100`, `bono`, `sueldo`, `total_ingreso`, `iess`, `multas`, `atrasos`, `alimentacion`, `anticipos`, `otros`, `total_egreso`, `total_pagar`, `fecha_registro`, `ci_empleado`) VALUES
(19, 'Enero', 11.28, 27.08, 18.05, 0.50, 1444.00, 1501.41, 136.46, 4.00, 4.00, 4.00, 4.00, 4.00, 156.46, 1344.95, '2025-05-18 05:00:00', 555455454),
(20, 'Julio', 227.23, 311.63, 363.56, 3.50, 4155.00, 5064.41, 392.65, 4.00, 4.00, 4.00, 4.00, 4.00, 412.65, 4651.76, '2025-05-16 05:00:00', 2147483647),
(21, 'Enero', 1098.63, 1779.75, 1757.81, 1.00, 1500.00, 6138.20, 141.75, 8.00, 7.00, 7.00, 7.00, 7.00, 177.75, 5960.45, '2025-05-31 05:00:00', 1756185243),
(23, 'Enero', 9.38, 22.50, 15.00, 1.00, 1200.00, 1248.88, 113.40, 1.00, 2.00, 1.00, 2.00, 1.00, 120.40, 1128.48, '2025-05-17 05:00:00', 1756185243),
(24, 'Enero', 12.11, 29.06, 19.38, 0.50, 1550.00, 1611.55, 146.48, 1.00, 2.00, 1.00, 2.00, 1.00, 153.47, 1458.08, '2025-05-16 05:00:00', 1756185243);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ci_empleado`),
  ADD KEY `fk_departamento_empleado` (`id_departamento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `fk_empleado_rol` (`ci_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_departamento_empleado` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `fk_empleado_rol` FOREIGN KEY (`ci_empleado`) REFERENCES `empleado` (`ci_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
