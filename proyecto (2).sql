-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2022 a las 04:29:03
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

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`NombreCategoria`) VALUES
('Bebidas'),
('Carne'),
('Congelados'),
('Electrodomesticos'),
('Fruteria'),
('Hogar y Bazar'),
('Jugeteria'),
('Limpieza'),
('Mascotas'),
('Pastas'),
('Perfumeria'),
('Ropa'),
('Verduleria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCliente` int(11) NOT NULL,
  `NumeroPuerta` int(11) DEFAULT NULL,
  `Calle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCliente`, `NumeroPuerta`, `Calle`) VALUES
(4, 1740, 'Invencion ocampo'),
(5, 1734, 'invencion ocampo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `IDCompra` int(11) NOT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`IDCompra`, `IDCliente`, `IDProducto`, `Fecha`, `Total`) VALUES
(14, 4, 17, '2022-11-13 00:11:02', 220),
(15, 4, 17, '2022-11-13 00:11:23', 330),
(16, 4, 17, '2022-11-13 00:11:49', 220);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `IDEnvio` int(11) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `IDCompra` int(11) DEFAULT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL,
  `Estados` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`IDEnvio`, `Direccion`, `IDCompra`, `IDUsuario`, `IDCliente`, `IDProducto`, `Estados`) VALUES
(6, 'Invencion ocampo1740', 14, 5, 4, 17, 1),
(7, 'Invencion ocampo1740', 14, 5, 4, 17, 1),
(8, 'Invencion ocampo1740', 14, 5, 4, 17, 1);

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

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`IDPersona`, `Usuario`, `Contraseña`, `Apellido`, `Estado`, `Nombre`, `Gmail`) VALUES
(4, 'pato', '259823af837e251e560ca1158a4e77c7', 'muñoz', 1, 'pato', 'muñoz@gmail.com'),
(5, 'benjamin|', '5e0c258c24eb837a139d590f60e5f2ab', 'poloni', 1, 'benjamin', 'benja@gmail.com');

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

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDProducto`, `CodigoBarra`, `Imagen`, `Stock`, `Nombre`, `Precio`, `FechaVencimiento`, `Estado`, `NombreCategoria`, `Descripcion`) VALUES
(17, 525, 'fideoscololo.jpg', 10, 'Fideos nido', 55, 12, 1, 'Pastas', 'Fideos nido cololo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IDProveedor` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Gmail` varchar(40) DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`IDProveedor`, `Nombre`, `Gmail`, `Estado`) VALUES
(5, 'Facundo', 'Facu@gmail.com', 1),
(6, 'Lucas', 'lucas@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selecciona`
--

CREATE TABLE `selecciona` (
  `IDCliente` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `CantidadProducto` tinyint(4) NOT NULL,
  `MetodoDePago` varchar(30) NOT NULL,
  `MetodoEnvio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `selecciona`
--

INSERT INTO `selecciona` (`IDCliente`, `IDProducto`, `CantidadProducto`, `MetodoDePago`, `MetodoEnvio`) VALUES
(4, 17, 4, 'tarjeta', 'Envio'),
(4, 17, 6, 'tarjeta', 'Envio'),
(4, 17, 4, 'tarjeta', 'Envio');

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

--
-- Volcado de datos para la tabla `telefonoclientes`
--

INSERT INTO `telefonoclientes` (`IDCliente`, `Numero`) VALUES
(4, 98584855),
(5, 91413684);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoproveedores`
--

CREATE TABLE `telefonoproveedores` (
  `IDProveedor` int(11) NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefonoproveedores`
--

INSERT INTO `telefonoproveedores` (`IDProveedor`, `Numero`) VALUES
(5, 99624847),
(6, 99624847);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUsuario`) VALUES
(5);

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
  ADD KEY `NombreCategoria` (`NombreCategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IDProveedor`);

--
-- Indices de la tabla `selecciona`
--
ALTER TABLE `selecciona`
  ADD KEY `IDProducto` (`IDProducto`),
  ADD KEY `IDCliente` (`IDCliente`);

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
  MODIFY `IDCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `IDEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `IDPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IDProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`NombreCategoria`) REFERENCES `categorias` (`NombreCategoria`);

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