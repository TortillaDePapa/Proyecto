-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2022 a las 14:20:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `NombreCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCliente` int(11) NOT NULL,
  `NumeroPuerta` int(11) DEFAULT NULL,
  `Calle` varchar(30) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `IDCompra` int(11) NOT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `IDEnvio` int(11) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `IDCompra` int(11) DEFAULT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `IDPersona` int(11) NOT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Apellido` varchar(30) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Gmail` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDProducto` int(11) NOT NULL,
  `CodigoBarra` int(11) DEFAULT NULL,
  `Imagen` varchar(80) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `FechaVencimiento` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `NombreCategoria` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IDProveedor` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Gmail` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selecciona`
--

CREATE TABLE `selecciona` (
  `IDCliente` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministra`
--

CREATE TABLE `suministra` (
  `IDProveedor` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoclientes`
--

CREATE TABLE `telefonoclientes` (
  `IDCliente` int(11) NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoproveedores`
--

CREATE TABLE `telefonoproveedores` (
  `IDProveedor` int(11) NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`NombreCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`IDCompra`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDProducto` (`IDProducto`);



--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`IDEnvio`),
  ADD KEY `IDCompra` (`IDCompra`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`IDPersona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDProducto`),
  ADD UNIQUE KEY `CodigoBarra` (`CodigoBarra`),
  ADD KEY `NombreCategoria` (`NombreCategoria`),

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IDProveedor`);

--
-- Indices de la tabla `selecciona`
--
ALTER TABLE `selecciona`
  ADD PRIMARY KEY (`IDCliente`,`IDProducto`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `suministra`
--
ALTER TABLE `suministra`
  ADD PRIMARY KEY (`IDProveedor`,`IDProducto`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `telefonoclientes`
--
ALTER TABLE `telefonoclientes`
  ADD PRIMARY KEY (`IDCliente`,`Numero`);

--
-- Indices de la tabla `telefonoproveedores`
--
ALTER TABLE `telefonoproveedores`
  ADD PRIMARY KEY (`IDProveedor`,`Numero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `IDCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `IDEnvio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `IDPersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IDProveedor` int(11) NOT NULL AUTO_INCREMENT;

--


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `personas` (`IDPersona`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `selecciona` (`IDCliente`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `selecciona` (`IDProducto`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`IDCompra`) REFERENCES `compras` (`IDCompra`),
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`IDUsuario`),
  ADD CONSTRAINT `envios_ibfk_3` FOREIGN KEY (`IDCliente`) REFERENCES `compras` (`IDCliente`),
  ADD CONSTRAINT `envios_ibfk_4` FOREIGN KEY (`IDProducto`) REFERENCES `compras` (`IDProducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`NombreCategoria`) REFERENCES `categorias` (`NombreCategoria`),

--
-- Filtros para la tabla `selecciona`
--
ALTER TABLE `selecciona`
  ADD CONSTRAINT `selecciona_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `clientes` (`IDCliente`),
  ADD CONSTRAINT `selecciona_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `productos` (`IDProducto`);

--
-- Filtros para la tabla `suministra`
--
ALTER TABLE `suministra`
  ADD CONSTRAINT `suministra_ibfk_1` FOREIGN KEY (`IDProveedor`) REFERENCES `proveedores` (`IDProveedor`),
  ADD CONSTRAINT `suministra_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `productos` (`IDProducto`);

--
-- Filtros para la tabla `telefonoclientes`
--
ALTER TABLE `telefonoclientes`
  ADD CONSTRAINT `telefonoclientes_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `clientes` (`IDCliente`);

--
-- Filtros para la tabla `telefonoproveedores`
--
ALTER TABLE `telefonoproveedores`
  ADD CONSTRAINT `telefonoproveedores_ibfk_1` FOREIGN KEY (`IDProveedor`) REFERENCES `proveedores` (`IDProveedor`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `personas` (`IDPersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
