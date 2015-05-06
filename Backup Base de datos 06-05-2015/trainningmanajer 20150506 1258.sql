-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema trainningmanager
--

CREATE DATABASE IF NOT EXISTS trainningmanager;
USE trainningmanager;

--
-- Definition of table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
CREATE TABLE `cajas` (
  `fecha_apertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `importe` float NOT NULL,
  PRIMARY KEY (`fecha_apertura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cajas`
--

/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;


--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`,`dni`,`telefono`,`telefono2`,`email`,`genero`,`fecha_nacimiento`,`fecha_alta`,`fecha_baja`,`domiciliado`,`objetivos`,`comentarios`,`patologias`,`medicacion`,`nombre`,`activo`) VALUES 
 (0000000014,'666666666','000000000','111111111','nose@asd.es','H','2014-12-31','2015-04-21 12:23:30','0000-00-00 00:00:00',1,'','','','','fernando alonso','1'),
 (0000000015,'5555555','55555','222222','asd','H','2012-12-01','2015-04-11 19:47:14','0000-00-00 00:00:00',0,'s','s','','','matias','0'),
 (0000000016,'','654654654','','algo@algo.algo','M','1991-08-25','2015-04-20 16:19:02','0000-00-00 00:00:00',0,'','','','','Elisa Tarancon','1'),
 (0000000017,'','666555444','','some@thi.n','H','1996-12-31','2015-04-27 12:05:07','0000-00-00 00:00:00',0,'','',' ','','ALguien Apellida Algo','1'),
 (0000000018,' ','975975975',' ','al@g.o','M','1976-12-31','2015-04-27 00:00:00','0000-00-00 00:00:00',1,' ',' ',' ',' ','Nadie Nadie Nadie','1');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Definition of table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE `contratos` (
  `id_contrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` int(10) unsigned NOT NULL,
  `tarifa` int(10) unsigned NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contratos`
--

/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` (`id_contrato`,`cliente`,`tarifa`,`fecha_inicio`,`fecha_fin`) VALUES 
 (1,14,1,'2015-04-20 13:45:35','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;


--
-- Definition of table `correo`
--

DROP TABLE IF EXISTS `correo`;
CREATE TABLE `correo` (
  `correo` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `servidor` varchar(45) NOT NULL,
  `puerto` varchar(45) NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `correo`
--

/*!40000 ALTER TABLE `correo` DISABLE KEYS */;
/*!40000 ALTER TABLE `correo` ENABLE KEYS */;


--
-- Definition of table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
CREATE TABLE `direcciones` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calle` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `piso` varchar(45) NOT NULL,
  `letra` varchar(45) NOT NULL,
  `poblacion` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `cp` varchar(5) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direcciones`
--

/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;


--
-- Definition of table `entrenadores`
--

DROP TABLE IF EXISTS `entrenadores`;
CREATE TABLE `entrenadores` (
  `id_entrenador` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrenadores`
--

/*!40000 ALTER TABLE `entrenadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrenadores` ENABLE KEYS */;


--
-- Definition of table `externas`
--

DROP TABLE IF EXISTS `externas`;
CREATE TABLE `externas` (
  `cod_externas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `local` varchar(45) NOT NULL,
  `cod_cliente` int(10) unsigned NOT NULL,
  `horas` int(10) unsigned NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_externas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `externas`
--

/*!40000 ALTER TABLE `externas` DISABLE KEYS */;
/*!40000 ALTER TABLE `externas` ENABLE KEYS */;


--
-- Definition of table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `id_factura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(45) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(10) unsigned NOT NULL,
  `valor` float NOT NULL,
  `descuento` double NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturas`
--

/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`id_factura`,`cliente`,`fecha`,`estado`,`valor`,`descuento`) VALUES 
 (1,'14','2015-05-04 12:25:15',0,18,0);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;


--
-- Definition of table `iva`
--

DROP TABLE IF EXISTS `iva`;
CREATE TABLE `iva` (
  `iva` double NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iva`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iva`
--

/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
INSERT INTO `iva` (`iva`) VALUES 
 (21);
/*!40000 ALTER TABLE `iva` ENABLE KEYS */;


--
-- Definition of table `lineas_caja`
--

DROP TABLE IF EXISTS `lineas_caja`;
CREATE TABLE `lineas_caja` (
  `num_linea` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_factura` varchar(45) NOT NULL,
  `medio` int(10) unsigned NOT NULL,
  `valor` float NOT NULL,
  `comentario` varchar(45) NOT NULL,
  PRIMARY KEY (`num_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineas_caja`
--

/*!40000 ALTER TABLE `lineas_caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `lineas_caja` ENABLE KEYS */;


--
-- Definition of table `lineas_factura`
--

DROP TABLE IF EXISTS `lineas_factura`;
CREATE TABLE `lineas_factura` (
  `factura` int(10) unsigned NOT NULL,
  `producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`factura`,`producto`),
  CONSTRAINT `FK_lineas_factura_1` FOREIGN KEY (`factura`) REFERENCES `facturas` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineas_factura`
--

/*!40000 ALTER TABLE `lineas_factura` DISABLE KEYS */;
INSERT INTO `lineas_factura` (`factura`,`producto`,`cantidad`) VALUES 
 (1,215,1),
 (1,216,1);
/*!40000 ALTER TABLE `lineas_factura` ENABLE KEYS */;


--
-- Definition of table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `entrenador` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  PRIMARY KEY (`entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`entrenador`,`pass`) VALUES 
 ('adriancarnicero','e491ecb8613adf4e966a11c9c7f3e396');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


--
-- Definition of table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notificacion` varchar(45) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensajes`
--

/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;


--
-- Definition of table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `mes` int(11) NOT NULL,
  `anyo` int(11) NOT NULL,
  PRIMARY KEY (`mes`,`anyo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagos`
--

/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` (`mes`,`anyo`) VALUES 
 (4,2015),
 (5,2015);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;


--
-- Definition of table `precios_tarifas`
--

DROP TABLE IF EXISTS `precios_tarifas`;
CREATE TABLE `precios_tarifas` (
  `tarifa` int(10) unsigned NOT NULL,
  `fecha_inicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor_sin_iva` double NOT NULL,
  PRIMARY KEY (`tarifa`,`fecha_inicial`),
  CONSTRAINT `precios_tarifas_ibfk_1` FOREIGN KEY (`tarifa`) REFERENCES `tarifas` (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precios_tarifas`
--

/*!40000 ALTER TABLE `precios_tarifas` DISABLE KEYS */;
INSERT INTO `precios_tarifas` (`tarifa`,`fecha_inicial`,`valor_sin_iva`) VALUES 
 (1,'2015-04-01 10:03:11',9),
 (1,'2015-04-21 09:14:24',9),
 (1,'2015-04-21 10:01:59',8.5),
 (4,'2015-04-21 09:14:35',10),
 (4,'2015-05-04 12:35:04',25),
 (4,'2015-05-04 12:36:38',43),
 (4,'2015-05-04 12:39:11',33),
 (4,'2015-05-04 12:39:34',12),
 (4,'2015-05-04 12:51:17',11),
 (5,'2015-04-21 09:46:13',12);
/*!40000 ALTER TABLE `precios_tarifas` ENABLE KEYS */;


--
-- Definition of table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `proveedor` int(10) unsigned NOT NULL,
  `valor_sin_iva` float NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Definition of table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `cp` varchar(45) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedores`
--

/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;


--
-- Definition of table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
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
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservas`
--

/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id_reserva`,`cliente`,`hora`,`dia`,`semana`,`mes`,`anyo`,`pagada`,`cancelada`,`cuando`) VALUES 
 (163,14,2,13,'lunes',4,2015,0,1,'2015-04-11 13:20:41'),
 (164,14,2,20,'lunes',4,2015,0,1,'2015-04-11 13:20:41'),
 (165,14,2,27,'lunes',4,2015,0,1,'2015-04-11 13:20:41'),
 (166,14,2,4,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (167,14,2,11,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (168,14,2,18,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (169,14,2,25,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (170,14,2,1,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (171,14,2,8,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (172,14,2,15,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (173,14,2,22,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (174,14,2,29,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (175,14,2,6,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (176,14,2,13,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (177,14,2,20,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (178,14,2,27,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (179,14,2,3,'lunes',8,2015,0,1,'2015-04-11 13:20:42'),
 (180,14,2,10,'lunes',8,2015,0,1,'2015-04-11 13:20:42'),
 (181,14,2,17,'lunes',8,2015,0,1,'2015-04-11 13:20:42'),
 (182,14,2,24,'lunes',8,2015,0,1,'2015-04-11 13:20:42'),
 (183,14,2,31,'lunes',8,2015,0,1,'2015-04-11 13:20:42'),
 (184,14,2,7,'lunes',9,2015,0,1,'2015-04-11 13:20:42'),
 (185,14,2,14,'lunes',9,2015,0,1,'2015-04-11 13:20:42'),
 (186,14,2,21,'lunes',9,2015,0,1,'2015-04-11 13:20:42'),
 (187,14,2,28,'lunes',9,2015,0,1,'2015-04-11 13:20:42'),
 (188,14,2,5,'lunes',10,2015,0,1,'2015-04-11 13:20:42'),
 (189,14,1,13,'lunes',4,2015,0,1,'2015-04-11 13:20:42'),
 (190,14,1,20,'lunes',4,2015,0,1,'2015-04-11 13:20:42'),
 (191,14,1,27,'lunes',4,2015,0,1,'2015-04-11 13:20:42'),
 (192,14,1,4,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (193,14,1,11,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (194,14,1,18,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (195,14,1,25,'lunes',5,2015,0,1,'2015-04-11 13:20:42'),
 (196,14,1,1,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (197,14,1,8,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (198,14,1,15,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (199,14,1,22,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (200,14,1,29,'lunes',6,2015,0,1,'2015-04-11 13:20:42'),
 (201,14,1,6,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (202,14,1,13,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (203,14,1,20,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (204,14,1,27,'lunes',7,2015,0,1,'2015-04-11 13:20:42'),
 (205,14,1,3,'lunes',8,2015,0,1,'2015-04-11 13:20:42'),
 (206,14,1,10,'lunes',8,2015,0,1,'2015-04-11 13:20:43'),
 (207,14,1,17,'lunes',8,2015,0,1,'2015-04-11 13:20:43'),
 (208,14,1,24,'lunes',8,2015,0,1,'2015-04-11 13:20:43'),
 (209,14,1,31,'lunes',8,2015,0,1,'2015-04-11 13:20:43'),
 (210,14,1,7,'lunes',9,2015,0,1,'2015-04-11 13:20:43'),
 (211,14,1,14,'lunes',9,2015,0,1,'2015-04-11 13:20:43'),
 (212,14,1,21,'lunes',9,2015,0,1,'2015-04-11 13:20:43'),
 (213,14,1,28,'lunes',9,2015,0,1,'2015-04-11 13:20:43'),
 (214,14,1,5,'lunes',10,2015,0,1,'2015-04-11 13:20:43'),
 (215,14,2,11,'sabado',4,2015,1,0,'2015-04-11 18:43:24'),
 (216,14,4,11,'sabado',4,2015,1,0,'2015-04-11 18:43:24');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;


--
-- Definition of table `reservasmultiples`
--

DROP TABLE IF EXISTS `reservasmultiples`;
CREATE TABLE `reservasmultiples` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasmultiples`
--

/*!40000 ALTER TABLE `reservasmultiples` DISABLE KEYS */;
INSERT INTO `reservasmultiples` (`dia_inicio`,`mes_inicio`,`anyo_inicio`,`cliente`,`cancelada`,`ID`,`diaSemana`,`hora`,`cuando`,`anyo_fin`,`mes_fin`,`dia_fin`) VALUES 
 (11,4,2015,1,1,3,'lunes',2,'2015-04-11 17:57:26',2015,10,6),
 (11,4,2015,1,1,4,'lunes',1,'2015-04-11 17:57:30',2015,10,6);
/*!40000 ALTER TABLE `reservasmultiples` ENABLE KEYS */;


--
-- Definition of table `tarifas`
--

DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE `tarifas` (
  `id_tarifa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarifas`
--

/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;
INSERT INTO `tarifas` (`id_tarifa`,`nombre`,`descripcion`) VALUES 
 (1,'Tarifa 1/s','Una reserva individual por semana'),
 (4,'Tarifa 2/s','Dos reservas individuales por semana'),
 (5,'Tarifa 3/s','Tres entrenos individuales por semana');
/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
