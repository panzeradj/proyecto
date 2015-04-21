-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2015 a las 15:33:18
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `trainningmanager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

DROP TABLE IF EXISTS `cajas`;
CREATE TABLE IF NOT EXISTS `cajas` (
  `fecha_apertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `importe` float NOT NULL,
  PRIMARY KEY (`fecha_apertura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `telefono2` varchar(9) NOT NULL,
  `email` varchar(45) NOT NULL,
  `genero` varchar(6) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `domiciliado` tinyint(1) NOT NULL DEFAULT '0',
  `objetivos` varchar(45) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `patologias` varchar(300) NOT NULL,
  `medicacion` varchar(300) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `activo` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cliente`,`dni`,`fecha_nacimiento`,`nombre`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `dni`, `telefono`, `telefono2`, `email`, `genero`, `fecha_nacimiento`, `fecha_alta`, `fecha_baja`, `domiciliado`, `objetivos`, `comentarios`, `patologias`, `medicacion`, `nombre`, `activo`) VALUES
(0000000014, '666666666', '000000000', '111111111', 'nose@asd.es', 'H', '2014-12-31', '2015-04-21 10:23:30', '0000-00-00 00:00:00', 1, '', '', '', '', 'fernando alonso', '1'),
(0000000015, '5555555', '55555', '222222', 'asd', 'H', '2012-12-01', '2015-04-11 17:47:14', '0000-00-00 00:00:00', 0, 's', 's', '', '', 'matias', '0'),
(0000000016, '', '654654654', '', 'algo@algo.algo', 'M', '1991-08-25', '2015-04-20 14:19:02', '0000-00-00 00:00:00', 0, '', '', '', '', 'Elisa Tarancon', '1'),
(0000000017, '', '666555444', '', 'some@thi.n', 'H', '1996-12-31', '2015-04-20 14:26:06', '0000-00-00 00:00:00', 0, '', '', '', '', 'ALguien Apellida Algo', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE IF NOT EXISTS `contratos` (
  `id_contrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` int(10) unsigned NOT NULL,
  `tarifa` int(10) unsigned NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `cliente`, `tarifa`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 14, 1, '2015-04-20 11:45:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
CREATE TABLE IF NOT EXISTS `direcciones` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calle` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `piso` varchar(45) NOT NULL,
  `letra` varchar(45) NOT NULL,
  `poblacion` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `cp` varchar(5) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

DROP TABLE IF EXISTS `entrenadores`;
CREATE TABLE IF NOT EXISTS `entrenadores` (
  `id_entrenador` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `externas`
--

DROP TABLE IF EXISTS `externas`;
CREATE TABLE IF NOT EXISTS `externas` (
  `cod_externas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `local` varchar(45) NOT NULL,
  `cod_cliente` int(10) unsigned NOT NULL,
  `horas` int(10) unsigned NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_externas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(45) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(10) unsigned NOT NULL,
  `valor` float NOT NULL,
  `descuento` double NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

DROP TABLE IF EXISTS `iva`;
CREATE TABLE IF NOT EXISTS `iva` (
  `iva` double NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iva`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`iva`) VALUES
(21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_caja`
--

DROP TABLE IF EXISTS `lineas_caja`;
CREATE TABLE IF NOT EXISTS `lineas_caja` (
  `num_linea` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_factura` varchar(45) NOT NULL,
  `medio` int(10) unsigned NOT NULL,
  `valor` float NOT NULL,
  `comentario` varchar(45) NOT NULL,
  PRIMARY KEY (`num_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_factura`
--

DROP TABLE IF EXISTS `lineas_factura`;
CREATE TABLE IF NOT EXISTS `lineas_factura` (
  `factura` int(10) unsigned NOT NULL,
  `producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`factura`,`producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `entrenador` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  PRIMARY KEY (`entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `mes` int(11) NOT NULL,
  `anyo` int(11) NOT NULL,
  PRIMARY KEY (`mes`,`anyo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_tarifas`
--

DROP TABLE IF EXISTS `precios_tarifas`;
CREATE TABLE IF NOT EXISTS `precios_tarifas` (
  `tarifa` int(10) unsigned NOT NULL,
  `fecha_inicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor_sin_iva` double NOT NULL,
  PRIMARY KEY (`tarifa`,`fecha_inicial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios_tarifas`
--

INSERT INTO `precios_tarifas` (`tarifa`, `fecha_inicial`, `valor_sin_iva`) VALUES
(1, '2015-04-21 07:14:24', 9),
(1, '2015-04-21 08:01:59', 8.5),
(1, '2015-04-21 08:03:11', 9),
(4, '2015-04-21 07:14:35', 10),
(5, '2015-04-21 07:46:13', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `proveedor` int(10) unsigned NOT NULL,
  `valor_sin_iva` float NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reserva` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` int(10) unsigned NOT NULL,
  `hora` int(10) unsigned NOT NULL,
  `dia` int(10) unsigned NOT NULL,
  `semana` varchar(15) NOT NULL,
  `mes` int(10) unsigned NOT NULL,
  `anyo` int(10) unsigned NOT NULL,
  `pagada` tinyint(1) NOT NULL,
  `cancelada` int(10) unsigned NOT NULL DEFAULT '0',
  `cuando` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `cliente`, `hora`, `dia`, `semana`, `mes`, `anyo`, `pagada`, `cancelada`, `cuando`) VALUES
(163, 1, 2, 13, 'lunes', 4, 2015, 0, 1, '2015-04-11 11:20:41'),
(164, 1, 2, 20, 'lunes', 4, 2015, 0, 1, '2015-04-11 11:20:41'),
(165, 1, 2, 27, 'lunes', 4, 2015, 0, 1, '2015-04-11 11:20:41'),
(166, 1, 2, 4, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(167, 1, 2, 11, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(168, 1, 2, 18, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(169, 1, 2, 25, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(170, 1, 2, 1, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(171, 1, 2, 8, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(172, 1, 2, 15, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(173, 1, 2, 22, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(174, 1, 2, 29, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(175, 1, 2, 6, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(176, 1, 2, 13, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(177, 1, 2, 20, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(178, 1, 2, 27, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(179, 1, 2, 3, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:42'),
(180, 1, 2, 10, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:42'),
(181, 1, 2, 17, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:42'),
(182, 1, 2, 24, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:42'),
(183, 1, 2, 31, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:42'),
(184, 1, 2, 7, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:42'),
(185, 1, 2, 14, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:42'),
(186, 1, 2, 21, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:42'),
(187, 1, 2, 28, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:42'),
(188, 1, 2, 5, 'lunes', 10, 2015, 0, 1, '2015-04-11 11:20:42'),
(189, 1, 1, 13, 'lunes', 4, 2015, 0, 1, '2015-04-11 11:20:42'),
(190, 1, 1, 20, 'lunes', 4, 2015, 0, 1, '2015-04-11 11:20:42'),
(191, 1, 1, 27, 'lunes', 4, 2015, 0, 1, '2015-04-11 11:20:42'),
(192, 1, 1, 4, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(193, 1, 1, 11, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(194, 1, 1, 18, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(195, 1, 1, 25, 'lunes', 5, 2015, 0, 1, '2015-04-11 11:20:42'),
(196, 1, 1, 1, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(197, 1, 1, 8, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(198, 1, 1, 15, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(199, 1, 1, 22, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(200, 1, 1, 29, 'lunes', 6, 2015, 0, 1, '2015-04-11 11:20:42'),
(201, 1, 1, 6, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(202, 1, 1, 13, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(203, 1, 1, 20, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(204, 1, 1, 27, 'lunes', 7, 2015, 0, 1, '2015-04-11 11:20:42'),
(205, 1, 1, 3, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:42'),
(206, 1, 1, 10, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:43'),
(207, 1, 1, 17, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:43'),
(208, 1, 1, 24, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:43'),
(209, 1, 1, 31, 'lunes', 8, 2015, 0, 1, '2015-04-11 11:20:43'),
(210, 1, 1, 7, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:43'),
(211, 1, 1, 14, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:43'),
(212, 1, 1, 21, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:43'),
(213, 1, 1, 28, 'lunes', 9, 2015, 0, 1, '2015-04-11 11:20:43'),
(214, 1, 1, 5, 'lunes', 10, 2015, 0, 1, '2015-04-11 11:20:43'),
(215, 1, 2, 11, 'sabado', 4, 2015, 0, 0, '2015-04-11 16:43:24'),
(216, 1, 4, 11, 'sabado', 4, 2015, 0, 0, '2015-04-11 16:43:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservasmultiples`
--

DROP TABLE IF EXISTS `reservasmultiples`;
CREATE TABLE IF NOT EXISTS `reservasmultiples` (
  `dia_inicio` int(10) unsigned NOT NULL,
  `mes_inicio` int(10) unsigned NOT NULL,
  `anyo_inicio` int(10) unsigned NOT NULL,
  `cliente` int(10) unsigned NOT NULL,
  `cancelada` int(10) unsigned NOT NULL DEFAULT '0',
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diaSemana` varchar(45) NOT NULL,
  `hora` int(10) unsigned NOT NULL,
  `cuando` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anyo_fin` int(10) unsigned NOT NULL,
  `mes_fin` int(10) unsigned NOT NULL,
  `dia_fin` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `reservasmultiples`
--

INSERT INTO `reservasmultiples` (`dia_inicio`, `mes_inicio`, `anyo_inicio`, `cliente`, `cancelada`, `ID`, `diaSemana`, `hora`, `cuando`, `anyo_fin`, `mes_fin`, `dia_fin`) VALUES
(11, 4, 2015, 1, 1, 3, 'lunes', 2, '2015-04-11 15:57:26', 2015, 10, 6),
(11, 4, 2015, 1, 1, 4, 'lunes', 1, '2015-04-11 15:57:30', 2015, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE IF NOT EXISTS `tarifas` (
  `id_tarifa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tarifa`, `nombre`, `descripcion`) VALUES
(1, 'Tarifa 1/s', 'Una reserva individual por semana'),
(4, 'Tarifa 2/s', 'Dos reservas individuales por semana'),
(5, 'Tarifa 3/s', 'Tres entrenos individuales por semana');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_factura`
--
ALTER TABLE `lineas_factura`
  ADD CONSTRAINT `FK_lineas_factura_1` FOREIGN KEY (`factura`) REFERENCES `facturas` (`id_factura`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_login_1` FOREIGN KEY (`entrenador`) REFERENCES `entrenadores` (`id_entrenador`);

--
-- Filtros para la tabla `precios_tarifas`
--
ALTER TABLE `precios_tarifas`
  ADD CONSTRAINT `precios_tarifas_ibfk_1` FOREIGN KEY (`tarifa`) REFERENCES `tarifas` (`id_tarifa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
