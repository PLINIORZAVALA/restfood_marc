-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2024 a las 19:00:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `codCar` int(11) NOT NULL,
  `codProd` int(11) NOT NULL,
  `cantCar` int(11) NOT NULL,
  `codCli` int(11) NOT NULL,
  `regCar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codCateg` int(11) NOT NULL,
  `nomCateg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codCateg`, `nomCateg`) VALUES
(1, 'Desayuno'),
(2, 'Almuerzo'),
(3, 'Cena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codCli` int(11) NOT NULL,
  `nomCli` varchar(100) DEFAULT NULL,
  `appCli` varchar(100) DEFAULT NULL,
  `apmCli` varchar(100) DEFAULT NULL,
  `emaCli` varchar(100) DEFAULT NULL,
  `celCli` int(9) DEFAULT NULL,
  `sexCli` char(1) NOT NULL COMMENT 'M maculino; F femenino',
  `dirCli` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pasCli` varchar(100) DEFAULT NULL,
  `estCli` tinyint(1) NOT NULL COMMENT '1 activo; 2 desactivo',
  `imgCli` varchar(255) NOT NULL,
  `regCli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codCli`, `nomCli`, `appCli`, `apmCli`, `emaCli`, `celCli`, `sexCli`, `dirCli`, `pasCli`, `estCli`, `imgCli`, `regCli`) VALUES
(13, 'janneth', 'llicahua', 'huanaco', '211180@unamba.edu.pe', 940787637, 'F', 'pueblo joven', 'pKehlaKYmJdr', 1, 'assets/uploads/2023/05/perfil.png', '2024-03-11 06:13:06'),
(14, 'cinthia', 'bazan', 'hurtado', 'cinthia@gmail.com', 992657345, 'F', 'av.las intimpas', 'pKehlaKYmJc=', 1, 'assets/uploads/2024/03/14_foto.jpg', '2024-03-13 13:21:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `codDetPedi` int(11) NOT NULL,
  `codPedi` int(11) NOT NULL,
  `codProd` int(11) NOT NULL,
  `precioProd` double NOT NULL,
  `cantProd` int(11) NOT NULL,
  `totalProd` double NOT NULL,
  `item` int(11) NOT NULL,
  `regDetPedi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`codDetPedi`, `codPedi`, `codProd`, `precioProd`, `cantProd`, `totalProd`, `item`, `regDetPedi`) VALUES
(110, 103, 1, 11, 2, 22, 0, '2024-04-01 17:19:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codPedi` int(11) NOT NULL,
  `codCli` int(11) DEFAULT NULL,
  `totalPrecio` decimal(10,2) DEFAULT NULL,
  `envio` int(11) NOT NULL,
  `estado` char(10) DEFAULT NULL COMMENT '1 en sin confirmar; 2 en proceso; 3 entregado',
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `regPedi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codPedi`, `codCli`, `totalPrecio`, `envio`, `estado`, `latitud`, `longitud`, `regPedi`) VALUES
(103, 14, 32.00, 10, '2', -13.5266304, -71.9552512, '2024-04-01 17:19:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProd` int(11) NOT NULL,
  `codCateg` int(11) DEFAULT NULL,
  `nomProd` varchar(100) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stok` int(100) DEFAULT NULL,
  `stok_min` char(100) DEFAULT NULL,
  `imagen1` varchar(255) DEFAULT NULL,
  `imagen2` varchar(255) DEFAULT NULL,
  `imagen3` varchar(255) DEFAULT NULL,
  `estProd` tinyint(1) DEFAULT NULL COMMENT '1 agotado; 2 disponible',
  `envio` double DEFAULT NULL,
  `regProd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProd`, `codCateg`, `nomProd`, `descripcion`, `precio`, `stok`, `stok_min`, `imagen1`, `imagen2`, `imagen3`, `estProd`, `envio`, `regProd`) VALUES
(1, 3, 'Arroz con pollo', 'Es un un menu clasico', 11.00, 5, '2', 'assets/uploads/2024/04/1_imagen1.jpg', 'assets/uploads/2024/03/1_imagen2.jpg', 'assets/uploads/2024/03/1_imagen3.jpg', 1, NULL, '2023-08-09'),
(15, 2, 'Estofado de pollo', 'Muy agradable', 8.00, 5, '1', 'assets/uploads/2024/04/15_imagen1.jpg', 'assets/uploads/2023/08/15_imagen2.png', NULL, 1, NULL, '2023-08-09'),
(27, 2, 'aji de gallina', 'agradable', 8.00, 5, '1', 'assets/uploads/2024/04/27_imagen1.jpg', 'assets/uploads/2023/08/27_imagen2.jpg', 'assets/uploads/2023/08/27_imagen3.png', 1, NULL, '2023-08-09'),
(34, 2, 'Caldo de gallina', 'comida natural', 6.00, 12, '1', 'assets/uploads/2024/04/34_imagen1.png', 'assets/uploads/2023/08/34_imagen2.jpg', 'assets/uploads/2023/08/34_imagen3.jpg', 1, NULL, '2023-08-10'),
(35, 3, 'Broster', 'es un menu clasico', 10.00, 2, '1', 'assets/uploads/2024/04/35_imagen1.jpg', 'assets/uploads/2023/08/35_imagen2.jpg', 'assets/uploads/2023/08/35_imagen3.jpg', 1, NULL, '2023-08-10'),
(37, 1, 'Desayuno', 'cafe con leche', 5.00, 12, '2', 'assets/uploads/2024/04/37_imagen1.jpg', 'assets/uploads/2023/08/37_imagen2.png', 'assets/uploads/2023/08/37_imagen3.jpg', 1, NULL, '2023-08-11'),
(39, 1, 'Ceviche', 'Es un un menu clasico', 6.00, 10, '5', 'assets/uploads/2024/04/39_imagen1.png', 'assets/uploads/2023/10/39_imagen2.jpg', 'assets/uploads/2023/10/39_imagen3.jpg', 1, NULL, '2023-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsu` int(11) NOT NULL,
  `nomUsu` varchar(100) DEFAULT NULL,
  `appUsu` varchar(100) DEFAULT NULL,
  `apmUsu` varchar(100) DEFAULT NULL,
  `docUsu` char(15) DEFAULT NULL,
  `emaUsu` varchar(100) DEFAULT NULL,
  `celUsu` char(9) DEFAULT NULL,
  `sexUsu` char(1) DEFAULT NULL COMMENT 'Femenino F; Masculino M',
  `pasUsu` varchar(50) DEFAULT NULL,
  `priUsu` tinyint(2) DEFAULT NULL COMMENT '1 master: 2 Normal',
  `estUsu` tinyint(1) DEFAULT NULL COMMENT '0 inactivo; 1 Activo',
  `imgUsu` varchar(150) DEFAULT NULL,
  `regUsu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsu`, `nomUsu`, `appUsu`, `apmUsu`, `docUsu`, `emaUsu`, `celUsu`, `sexUsu`, `pasUsu`, `priUsu`, `estUsu`, `imgUsu`, `regUsu`) VALUES
(51, 'janneth', 'llicahua', 'huanaco', '98765438', 'janneth@gmail.com', '954612347', 'F', 'qqqimKGSmo8=', 1, 1, 'assets/uploads/2024/03/51_foto.jpg', '2024-03-11 06:41:41'),
(52, 'janneth', 'llicahua', 'huanaco', '48759587', 'llicahua31@gmail.com', '986322544', 'F', 'p62llqaXmZY=', 1, 0, 'assets/uploads/noimagen', '2024-03-31 06:33:32'),
(53, 'Santiago', 'Limas', 'juro', '45632178', 'limas@gmail.com', '987852654', 'M', 'p6qklJ+TmJc=', 2, 1, 'assets/uploads/noimagen', '2024-03-31 06:36:30'),
(54, 'melisa', 'arone', 'kacha', '74856124', 'melisa@gmail.com', '987453217', 'F', 'qqmmlqOTk5M=', 1, 1, 'assets/uploads/noimagen', '2024-04-02 23:35:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_login`
--

CREATE TABLE `usuario_login` (
  `codUL` int(11) NOT NULL,
  `codUsu` int(11) NOT NULL,
  `regUL` datetime DEFAULT NULL,
  `claUL` varchar(15) NOT NULL,
  `estUL` tinyint(2) DEFAULT NULL COMMENT '1 activo; 0: finalizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario_login`
--

INSERT INTO `usuario_login` (`codUL`, `codUsu`, `regUL`, `claUL`, `estUL`) VALUES
(206, 51, '2024-03-11 16:16:18', 'nd5lfm4@2h6', 1),
(207, 51, '2024-03-14 14:29:26', '68mn0s7@eu6', 1),
(208, 51, '2024-03-14 14:46:31', 'rn567bgmbz2', 1),
(209, 51, '2024-03-14 14:52:00', 'mdm2se7d@5w', 1),
(210, 51, '2024-03-14 14:56:19', 'wgg@nabwiug', 1),
(211, 51, '2024-03-14 14:59:24', 'rsu4k0a4j9z', 1),
(212, 51, '2024-03-14 17:07:08', 'vnztv8m6l4g', 1),
(213, 51, '2024-03-18 12:50:48', 'im2eiicvfu1', 1),
(214, 51, '2024-03-31 06:28:44', 'jvrzi03jamt', 1),
(215, 51, '2024-04-01 01:48:45', 'w7@fn561@2n', 1),
(216, 51, '2024-04-01 12:11:24', '4junjf5hkhh', 1),
(217, 51, '2024-04-01 17:20:15', 'mbrs1ltw89a', 1),
(218, 51, '2024-04-02 23:34:21', '25t@zisldkz', 1),
(219, 51, '2024-04-03 07:40:04', 'ksuscmmgb6@', 1),
(220, 51, '2024-04-03 09:06:42', 'w3k35gn72c7', 1),
(221, 51, '2024-04-03 09:07:00', 'kak87k6mr2g', 1),
(222, 51, '2024-04-03 09:47:00', 'sidzgr6@ffz', 1),
(223, 51, '2024-04-03 10:01:35', '62067rnc8e1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`codCar`),
  ADD KEY `fk_carrito_producto` (`codProd`),
  ADD KEY `fk_carrito_cliente` (`codCli`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codCateg`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCli`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`codDetPedi`),
  ADD KEY `fk_detallePedido_pedido` (`codPedi`),
  ADD KEY `fk_detallePedido_producto` (`codProd`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codPedi`),
  ADD KEY `fk_pedido_cliente` (`codCli`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `categoria_codCateg_producto` (`codCateg`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsu`) USING BTREE;

--
-- Indices de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD PRIMARY KEY (`codUL`),
  ADD KEY `codUsu` (`codUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `codCar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `codDetPedi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codPedi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `codUL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_cliente` FOREIGN KEY (`codCli`) REFERENCES `cliente` (`codCli`),
  ADD CONSTRAINT `fk_carrito_producto` FOREIGN KEY (`codProd`) REFERENCES `producto` (`idProd`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_detallePedido_pedido` FOREIGN KEY (`codPedi`) REFERENCES `pedido` (`codPedi`),
  ADD CONSTRAINT `fk_detallePedido_producto` FOREIGN KEY (`codProd`) REFERENCES `producto` (`idProd`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`codCli`) REFERENCES `cliente` (`codCli`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `categoria_codCateg_producto` FOREIGN KEY (`codCateg`) REFERENCES `categoria` (`codCateg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD CONSTRAINT `usuario_login_ibfk_1` FOREIGN KEY (`codUsu`) REFERENCES `usuario` (`codUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
