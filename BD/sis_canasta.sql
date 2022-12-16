-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 18:55:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_canasta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Bebidas Gaseosas', 'gaseosas', 1),
(2, 'Frutas', 'Frutas Frescas', 1),
(4, 'Verduras', 'verduras frescas', 1),
(5, 'Carnes', 'Todo Tipo de Carnes', 1),
(7, 'Fiambres y Embutidos', 'Jamon, Tocino, Salchichas, etc', 1),
(8, 'comidas', 'comidas salchichas', 0),
(9, 'Panaderia y Reposteria', 'panes', 1),
(10, 'Abarrotes', 'Aceite, Arroz, Cereales etc', 1),
(11, 'Bebidas Lacteos', 'yogurts,leches,quesos', 1),
(12, 'Refrigerados y Congelados', 'Helados', 1),
(13, 'Postres', '', 1),
(14, 'Bebidas sin Gas', 'aguas, jugos y otros', 1),
(15, 'Bebidas Energizantes', 'maltas y otros', 1),
(16, 'Licores y Vinos', 'Todo tipo de licores ', 1),
(17, 'Tabacos', 'cigarros y coca', 1),
(18, 'Chocolates', '', 1),
(19, 'Galletas', '', 1),
(20, 'Golosinas', '', 1),
(21, 'Aseo Personal', 'champoos, cepillos,jabones afeitadoras, etc', 1),
(22, 'Utencilios de Limpieza', 'Detergentes,Esponjas,Escobas etc', 1),
(23, 'Utiles Escolares', 'lapices,gomas hojas etc', 1),
(24, 'Para Bebes', 'juguetes, pañales', 1),
(25, 'Para Masotas', 'comidas,juguetes,accesorios etc', 1),
(26, 'higiene', 'cepillos,colinos,', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `ruc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `ruc`, `nombre`, `email`, `telefono`, `estado`) VALUES
(1, '00000', 'S/N', '', '', 1),
(2, '12345', 'Angel Condori', 'angel@gmail.com', '924517898', 1),
(3, '22222222', 'Carla Mamani', 'Carla123@gmail.com', '921245789', 1),
(4, '99999', 'Juan Ramos Alanoca', 'JuanRamos@gmail.com', '92541456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_proveedor`, `total`, `estado`, `fecha`) VALUES
(4, 1, '1.00', 1, '2022-10-06 18:01:16'),
(5, 2, '6.00', 1, '2022-11-01 08:37:15'),
(6, 4, '6.00', 1, '2022-11-01 10:36:23'),
(7, 1, '60.00', 1, '2022-11-09 11:15:01'),
(8, 1, '36.00', 1, '2022-11-09 11:18:07'),
(9, 2, '48.00', 1, '2022-11-09 11:23:51'),
(10, 1, '2.00', 1, '2022-11-09 17:47:27'),
(20, 2, '60.00', 1, '2022-11-09 20:01:28'),
(25, 7, '30.00', 1, '2022-11-17 20:02:15'),
(26, 7, '50.00', 1, '2022-11-22 10:06:46'),
(27, 6, '6.00', 1, '2022-11-22 19:48:47'),
(28, 4, '10.00', 1, '2022-12-04 22:56:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `ruc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `razon` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `ruc`, `nombre`, `telefono`, `direccion`, `razon`) VALUES
(1, '71347267', 'Supermercado La Canasta', '925491523', 'Av. Ojos de Salado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `producto`, `id_producto`, `cantidad`, `precio`, `id_usuario`, `fecha`) VALUES
(1, 4, 'Manzana', 2, 2, '810.00', 1, '2022-10-06 18:01:16'),
(2, 5, 'Manzana', 2, 3, '2.00', 1, '2022-11-01 08:37:15'),
(3, 6, 'Manzana', 2, 3, '2.00', 1, '2022-11-01 10:36:23'),
(4, 7, 'sardina', 4, 5, '12.00', 1, '2022-11-09 11:15:01'),
(5, 8, 'coka quina 2 lts', 1, 3, '12.00', 1, '2022-11-09 11:18:07'),
(6, 9, 'coka quina 2 lts', 1, 4, '12.00', 1, '2022-11-09 11:23:51'),
(7, 10, 'Manzana', 2, 1, '2.00', 1, '2022-11-09 17:47:27'),
(8, 11, 'sardina', 4, 3, '12.00', 1, '2022-11-09 18:33:02'),
(9, 12, 'sardina', 4, 1, '12.00', 1, '2022-11-09 18:40:07'),
(10, 13, 'sardina', 4, 3, '12.00', 1, '2022-11-09 18:46:14'),
(11, 14, 'Manzana', 2, 1, '2.00', 1, '2022-11-09 18:56:35'),
(12, 15, 'Manzana', 2, 2, '2.00', 1, '2022-11-09 18:57:54'),
(13, 16, 'Manzana', 2, 1, '2.00', 1, '2022-11-09 19:38:03'),
(14, 17, 'Manzana', 2, 1, '2.00', 1, '2022-11-09 19:46:55'),
(15, 18, 'Manzana', 2, 1, '2.00', 1, '2022-11-09 19:49:08'),
(16, 19, 'Manzana', 2, 1, '2.00', 1, '2022-11-09 19:54:02'),
(17, 20, 'coka quina 2 lts', 1, 5, '12.00', 1, '2022-11-09 20:01:28'),
(18, 21, 'Manzana', 2, 2, '2.00', 1, '2022-11-13 16:41:36'),
(19, 22, 'Manzana', 2, 3, '2.00', 1, '2022-11-13 17:19:44'),
(20, 23, 'sardina', 4, 1, '12.00', 1, '2022-11-13 17:29:25'),
(21, 24, 'sardina', 4, 1, '12.00', 1, '2022-11-13 17:34:39'),
(22, 25, 'CocaCola2Bs', 3, 3, '10.00', 1, '2022-11-17 20:02:15'),
(23, 26, 'Pepsi de 2Lts', 9, 5, '10.00', 1, '2022-11-22 10:06:46'),
(24, 27, 'bacon picante', 12, 3, '2.00', 1, '2022-11-22 19:48:47'),
(25, 28, 'Galletas Maria', 11, 5, '2.00', 5, '2022-12-04 22:56:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_venta`, `producto`, `id_producto`, `cantidad`, `precio`, `id_usuario`, `fecha`) VALUES
(1, 1, 'Manzana', 2, 1, '810.00', 1, '2022-10-10 17:40:35'),
(2, 2, 'Manzana', 2, 1, '810.00', 2, '2022-10-16 11:14:13'),
(3, 3, 'PepsiCola', 9, 2, '23.00', 1, '2022-10-17 10:19:17'),
(4, 4, 'Manzana', 2, 2, '810.00', 1, '2022-10-24 12:40:58'),
(5, 5, 'Manzana', 2, 1, '810.00', 1, '2022-10-24 12:45:22'),
(6, 6, 'Manzana', 2, 2, '2.00', 1, '2022-10-27 12:03:45'),
(7, 7, 'CocaCola2Bs', 3, 2, '10.00', 1, '2022-10-30 20:45:47'),
(8, 7, 'Manzana', 2, 2, '2.00', 1, '2022-10-30 20:45:47'),
(9, 8, 'sardina', 4, 2, '12.00', 1, '2022-10-30 23:24:21'),
(10, 9, 'coka quina 2 lts', 1, 2, '12.00', 1, '2022-10-31 23:51:14'),
(11, 9, 'Manzana', 2, 4, '2.00', 1, '2022-10-31 23:51:14'),
(12, 10, 'sardina', 4, 2, '12.00', 1, '2022-11-05 22:10:01'),
(13, 11, 'sardina', 4, 4, '12.00', 1, '2022-11-05 22:39:21'),
(14, 21, 'sardina', 4, 1, '12.00', 1, '2022-11-06 08:43:48'),
(15, 25, 'Manzana', 2, 1, '2.00', 1, '2022-11-06 23:56:51'),
(16, 28, 'sardina', 4, 2, '12.00', 1, '2022-11-07 23:15:49'),
(17, 28, 'Manzana', 2, 1, '2.00', 1, '2022-11-07 23:15:49'),
(18, 29, 'Manzana', 2, 1, '2.00', 1, '2022-11-11 11:12:54'),
(19, 29, 'sardina', 4, 2, '12.00', 1, '2022-11-11 11:12:54'),
(20, 30, 'sardina', 4, 2, '12.00', 1, '2022-11-22 14:44:46'),
(21, 30, 'Pepsi de 2Lts', 9, 2, '10.00', 1, '2022-11-22 14:44:46'),
(22, 31, 'bacon picante', 12, 1, '2.00', 1, '2022-11-22 20:47:53'),
(23, 32, 'bacon picante', 12, 2, '2.00', 2, '2022-11-22 22:45:48'),
(24, 33, 'CocaCola2Bs', 3, 2, '10.00', 5, '2022-12-04 22:58:30'),
(25, 33, 'sardina', 4, 1, '12.00', 5, '2022-12-04 22:58:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `nombre`, `cantidad`, `precio`, `estado`) VALUES
(1, 1, '25803453', 'coka quina 2 lts', 10, '7.00', 0),
(2, 2, '12345', 'Manzana', 9, '2.00', 1),
(3, 1, '2141243', 'CocaCola2Bs', 3, '10.00', 1),
(4, 5, '55555', 'sardina', 37, '12.00', 1),
(5, 4, '089779', 'brocoli', 8, '12.00', 1),
(9, 1, '3535546', 'Pepsi de 2Lts', 3, '10.00', 1),
(11, 5, '474646', 'Galletas Maria', 17, '2.00', 1),
(12, 19, '4674646', 'bacon picante', 2, '2.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nit` varchar(10) NOT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `servicio`, `direccion`, `telefono`, `email`, `estado`) VALUES
(1, 'S/N', '000000', '', 'S/D', '', '', 1),
(2, 'La Cascada', '67866686', 'gaseosas', 'senkata', '23132342', '', 1),
(4, 'mabels', '35363', 'galletas', 'bolivia mar', '46557575', 'bolivia@gmail.com', 1),
(5, 'Leche Pil', '353603', 'Bebidas Lacteas', '', '73434545', '', 1),
(6, 'Delizia', '6366363', 'Compañía de Alimentos Ltda', 'Ave Abrojo 5100, El Alto', ' 22834757', '', 1),
(7, 'Coca Cola', '2223525', 'refrescos', 'refrescos', '76856464', 'cocacola@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `direccion`, `clave`, `telefono`, `rol`, `estado`) VALUES
(1, 'administrador', 'admin', 'bolivia mar', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '78898353', 'Administrador', 1),
(2, 'Tania Trujillo Mujica', 'vendedor', 'senkata', 'e8827f3c0bcc90509b7d6841d446b163a671cac807a5f1bf41218667546ce80b', '7254646', 'Vendedor', 1),
(5, 'nestor acho huayhua', 'nestor', '', '04a677ba6d9e405cc0e0ba1f1f6aeec50816b3433fbc8842ad7d72720f61cd58', '', 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_cliente`, `total`, `estado`, `fecha`) VALUES
(1, 4, '810.00', 1, '2022-10-10 17:40:35'),
(2, 1, '810.00', 1, '2022-10-16 11:14:13'),
(3, 2, '46.00', 1, '2022-10-17 10:19:17'),
(4, 2, '1.00', 1, '2022-10-24 12:40:58'),
(5, 4, '810.00', 1, '2022-10-24 12:45:22'),
(6, 1, '4.00', 1, '2022-10-27 12:03:45'),
(7, 1, '24.00', 1, '2022-10-30 20:45:47'),
(8, 5, '24.00', 1, '2022-10-30 23:24:21'),
(9, 1, '32.00', 1, '2022-10-31 23:51:14'),
(10, 2, '24.00', 1, '2022-11-05 22:10:01'),
(13, 1, '36.00', 1, '2022-11-06 08:30:46'),
(25, 2, '2.00', 1, '2022-11-06 23:56:51'),
(26, 5, '24.00', 1, '2022-11-07 19:56:00'),
(27, 5, '24.00', 1, '2022-11-07 19:56:17'),
(28, 5, '26.00', 1, '2022-11-07 23:15:49'),
(29, 1, '26.00', 1, '2022-11-11 11:12:54'),
(30, 3, '44.00', 1, '2022-11-22 14:44:46'),
(31, 5, '2.00', 1, '2022-11-22 20:47:53'),
(32, 4, '4.00', 1, '2022-11-22 22:45:48'),
(33, 2, '32.00', 1, '2022-12-04 22:58:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_categoria_2` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
