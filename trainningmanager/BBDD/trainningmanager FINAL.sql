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
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `telefono2` varchar(9) NOT NULL,
  `email` varchar(45) NOT NULL,
  `genero` varchar(6) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `objetivos` varchar(45) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `patologias` varchar(300) NOT NULL,
  `medicacion` varchar(300) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `activo` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`,`dni`,`telefono`,`telefono2`,`email`,`genero`,`fecha_nacimiento`,`fecha_alta`,`fecha_baja`,`objetivos`,`comentarios`,`patologias`,`medicacion`,`nombre`,`activo`) VALUES 
 (1,'16813058N','695184457','','asd@as.es','Hombre','2002-12-31','2015-05-07 21:21:51','0000-00-00 00:00:00','','','','','fernando alonso',1);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contratos`
--

/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturas`
--

/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;


--
-- Definition of table `iva`
--

DROP TABLE IF EXISTS `iva`;
CREATE TABLE `iva` (
  `iva` double NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iva`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iva`
--

/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `lineas_factura` ENABLE KEYS */;


--
-- Definition of table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `entrenador` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  PRIMARY KEY (`entrenador`),
  CONSTRAINT `FK_login_1` FOREIGN KEY (`entrenador`) REFERENCES `entrenadores` (`id_entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


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
  `semana` varchar(25) NOT NULL,
  `mes` int(10) unsigned NOT NULL,
  `anyo` int(10) unsigned NOT NULL,
  `pagada` tinyint(1) NOT NULL,
  `cancelada` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservas`
--

/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id_reserva`,`cliente`,`hora`,`dia`,`semana`,`mes`,`anyo`,`pagada`,`cancelada`) VALUES 
 (1,1,1,7,'jueves',5,2015,0,2),
 (2,1,1,7,'jueves',5,2015,0,0),
 (3,1,1,7,'jueves',5,2015,0,0),
 (4,1,1,7,'jueves',5,2015,0,0),
 (5,1,6,8,'viernes',5,2015,0,0),
 (6,1,6,8,'viernes',5,2015,0,0),
 (7,1,1,8,'viernes',5,2015,0,0),
 (8,1,2,7,'jueves',5,2015,0,0),
 (9,1,2,7,'jueves',5,2015,0,0),
 (10,1,3,10,'domingo',5,2015,0,0),
 (11,1,3,10,'domingo',5,2015,0,0),
 (12,1,3,10,'domingo',5,2015,0,0),
 (13,1,13,8,'viernes',5,2015,0,0),
 (14,1,13,8,'viernes',5,2015,0,0),
 (15,1,1,11,'lunes',5,2015,0,0),
 (16,1,1,18,'lunes',5,2015,0,0),
 (17,1,1,25,'lunes',5,2015,0,0),
 (18,1,1,1,'lunes',6,2015,0,0),
 (19,1,1,8,'lunes',6,2015,0,0),
 (20,1,1,15,'lunes',6,2015,0,0),
 (21,1,1,22,'lunes',6,2015,0,0),
 (22,1,1,29,'lunes',6,2015,0,0),
 (23,1,1,6,'lunes',7,2015,0,0),
 (24,1,1,13,'lunes',7,2015,0,0),
 (25,1,1,20,'lunes',7,2015,0,0),
 (26,1,1,27,'lunes',7,2015,0,0),
 (27,1,1,3,'lunes',8,2015,0,0),
 (28,1,1,10,'lunes',8,2015,0,0),
 (29,1,1,17,'lunes',8,2015,0,0),
 (30,1,1,24,'lunes',8,2015,0,0),
 (31,1,1,31,'lunes',8,2015,0,0),
 (32,1,1,7,'lunes',9,2015,0,0),
 (33,1,1,14,'lunes',9,2015,0,0),
 (34,1,1,21,'lunes',9,2015,0,0),
 (35,1,1,28,'lunes',9,2015,0,0),
 (36,1,1,5,'lunes',10,2015,0,0),
 (37,1,1,12,'lunes',10,2015,0,0),
 (38,1,1,19,'lunes',10,2015,0,0),
 (39,1,1,26,'lunes',10,2015,0,0),
 (40,1,1,2,'lunes',11,2015,0,0),
 (41,1,5,11,'lunes',5,2015,0,0),
 (42,1,5,18,'lunes',5,2015,0,0),
 (43,1,5,25,'lunes',5,2015,0,0),
 (44,1,5,1,'lunes',6,2015,0,0),
 (45,1,5,8,'lunes',6,2015,0,0),
 (46,1,5,15,'lunes',6,2015,0,0),
 (47,1,5,22,'lunes',6,2015,0,0),
 (48,1,5,29,'lunes',6,2015,0,0),
 (49,1,5,6,'lunes',7,2015,0,0),
 (50,1,5,13,'lunes',7,2015,0,0),
 (51,1,5,20,'lunes',7,2015,0,0),
 (52,1,5,27,'lunes',7,2015,0,0),
 (53,1,5,3,'lunes',8,2015,0,0),
 (54,1,5,10,'lunes',8,2015,0,0),
 (55,1,5,17,'lunes',8,2015,0,0),
 (56,1,5,24,'lunes',8,2015,0,0),
 (57,1,5,31,'lunes',8,2015,0,0),
 (58,1,5,7,'lunes',9,2015,0,0),
 (59,1,5,14,'lunes',9,2015,0,0),
 (60,1,5,21,'lunes',9,2015,0,0),
 (61,1,5,28,'lunes',9,2015,0,0),
 (62,1,5,5,'lunes',10,2015,0,0),
 (63,1,5,12,'lunes',10,2015,0,0),
 (64,1,5,19,'lunes',10,2015,0,0),
 (65,1,5,26,'lunes',10,2015,0,0),
 (66,1,5,2,'lunes',11,2015,0,0),
 (67,1,5,11,'lunes',5,2015,0,0),
 (68,1,5,18,'lunes',5,2015,0,0),
 (69,1,5,25,'lunes',5,2015,0,0),
 (70,1,5,1,'lunes',6,2015,0,0),
 (71,1,5,8,'lunes',6,2015,0,0),
 (72,1,5,15,'lunes',6,2015,0,0),
 (73,1,5,22,'lunes',6,2015,0,0),
 (74,1,5,29,'lunes',6,2015,0,0),
 (75,1,5,6,'lunes',7,2015,0,0),
 (76,1,5,13,'lunes',7,2015,0,0),
 (77,1,5,20,'lunes',7,2015,0,0),
 (78,1,5,27,'lunes',7,2015,0,0),
 (79,1,5,3,'lunes',8,2015,0,0),
 (80,1,5,10,'lunes',8,2015,0,0),
 (81,1,5,17,'lunes',8,2015,0,0),
 (82,1,5,24,'lunes',8,2015,0,0),
 (83,1,5,31,'lunes',8,2015,0,0),
 (84,1,5,7,'lunes',9,2015,0,0),
 (85,1,5,14,'lunes',9,2015,0,0),
 (86,1,5,21,'lunes',9,2015,0,0),
 (87,1,5,28,'lunes',9,2015,0,0),
 (88,1,5,5,'lunes',10,2015,0,0),
 (89,1,5,12,'lunes',10,2015,0,0),
 (90,1,5,19,'lunes',10,2015,0,0),
 (91,1,5,26,'lunes',10,2015,0,0),
 (92,1,5,2,'lunes',11,2015,0,0),
 (93,1,7,11,'lunes',5,2015,0,0),
 (94,1,7,18,'lunes',5,2015,0,0),
 (95,1,7,25,'lunes',5,2015,0,0),
 (96,1,7,1,'lunes',6,2015,0,0),
 (97,1,7,8,'lunes',6,2015,0,0),
 (98,1,7,15,'lunes',6,2015,0,0),
 (99,1,7,22,'lunes',6,2015,0,0),
 (100,1,7,29,'lunes',6,2015,0,0),
 (101,1,7,6,'lunes',7,2015,0,0),
 (102,1,7,13,'lunes',7,2015,0,0),
 (103,1,7,20,'lunes',7,2015,0,0),
 (104,1,7,27,'lunes',7,2015,0,0),
 (105,1,7,3,'lunes',8,2015,0,0),
 (106,1,7,10,'lunes',8,2015,0,0),
 (107,1,7,17,'lunes',8,2015,0,0),
 (108,1,7,24,'lunes',8,2015,0,0),
 (109,1,7,31,'lunes',8,2015,0,0),
 (110,1,7,7,'lunes',9,2015,0,0),
 (111,1,7,14,'lunes',9,2015,0,0),
 (112,1,7,21,'lunes',9,2015,0,0),
 (113,1,7,28,'lunes',9,2015,0,0),
 (114,1,7,5,'lunes',10,2015,0,0),
 (115,1,7,12,'lunes',10,2015,0,0),
 (116,1,7,19,'lunes',10,2015,0,0),
 (117,1,7,26,'lunes',10,2015,0,0),
 (118,1,7,2,'lunes',11,2015,0,0),
 (119,1,7,11,'lunes',5,2015,0,0),
 (120,1,7,18,'lunes',5,2015,0,0),
 (121,1,7,25,'lunes',5,2015,0,0),
 (122,1,7,1,'lunes',6,2015,0,0),
 (123,1,7,8,'lunes',6,2015,0,0),
 (124,1,7,15,'lunes',6,2015,0,0),
 (125,1,7,22,'lunes',6,2015,0,0),
 (126,1,7,29,'lunes',6,2015,0,0),
 (127,1,7,6,'lunes',7,2015,0,0),
 (128,1,7,13,'lunes',7,2015,0,0),
 (129,1,7,20,'lunes',7,2015,0,0),
 (130,1,7,27,'lunes',7,2015,0,0),
 (131,1,7,3,'lunes',8,2015,0,0),
 (132,1,7,10,'lunes',8,2015,0,0),
 (133,1,7,17,'lunes',8,2015,0,0),
 (134,1,7,24,'lunes',8,2015,0,0),
 (135,1,7,31,'lunes',8,2015,0,0),
 (136,1,7,7,'lunes',9,2015,0,0),
 (137,1,7,14,'lunes',9,2015,0,0),
 (138,1,7,21,'lunes',9,2015,0,0),
 (139,1,7,28,'lunes',9,2015,0,0),
 (140,1,7,5,'lunes',10,2015,0,0),
 (141,1,7,12,'lunes',10,2015,0,0),
 (142,1,7,19,'lunes',10,2015,0,0),
 (143,1,7,26,'lunes',10,2015,0,0),
 (144,1,7,2,'lunes',11,2015,0,0),
 (145,1,7,11,'lunes',5,2015,0,0),
 (146,1,7,18,'lunes',5,2015,0,0),
 (147,1,7,25,'lunes',5,2015,0,0),
 (148,1,7,1,'lunes',6,2015,0,0),
 (149,1,7,8,'lunes',6,2015,0,0),
 (150,1,7,15,'lunes',6,2015,0,0),
 (151,1,7,22,'lunes',6,2015,0,0),
 (152,1,7,29,'lunes',6,2015,0,0),
 (153,1,7,6,'lunes',7,2015,0,0),
 (154,1,7,13,'lunes',7,2015,0,0),
 (155,1,7,20,'lunes',7,2015,0,0),
 (156,1,7,27,'lunes',7,2015,0,0),
 (157,1,7,3,'lunes',8,2015,0,0),
 (158,1,7,10,'lunes',8,2015,0,0),
 (159,1,7,17,'lunes',8,2015,0,0),
 (160,1,7,24,'lunes',8,2015,0,0),
 (161,1,7,31,'lunes',8,2015,0,0),
 (162,1,7,7,'lunes',9,2015,0,0),
 (163,1,7,14,'lunes',9,2015,0,0),
 (164,1,7,21,'lunes',9,2015,0,0),
 (165,1,7,28,'lunes',9,2015,0,0),
 (166,1,7,5,'lunes',10,2015,0,0),
 (167,1,7,12,'lunes',10,2015,0,0),
 (168,1,7,19,'lunes',10,2015,0,0),
 (169,1,7,26,'lunes',10,2015,0,0),
 (170,1,7,2,'lunes',11,2015,0,0),
 (171,1,7,11,'lunes',5,2015,0,0),
 (172,1,7,18,'lunes',5,2015,0,0),
 (173,1,7,25,'lunes',5,2015,0,0),
 (174,1,7,1,'lunes',6,2015,0,0),
 (175,1,7,8,'lunes',6,2015,0,0),
 (176,1,7,15,'lunes',6,2015,0,0),
 (177,1,7,22,'lunes',6,2015,0,0),
 (178,1,7,29,'lunes',6,2015,0,0),
 (179,1,7,6,'lunes',7,2015,0,0),
 (180,1,7,13,'lunes',7,2015,0,0),
 (181,1,7,20,'lunes',7,2015,0,0),
 (182,1,7,27,'lunes',7,2015,0,0),
 (183,1,7,3,'lunes',8,2015,0,0),
 (184,1,7,10,'lunes',8,2015,0,0),
 (185,1,7,17,'lunes',8,2015,0,0),
 (186,1,7,24,'lunes',8,2015,0,0),
 (187,1,7,31,'lunes',8,2015,0,0),
 (188,1,7,7,'lunes',9,2015,0,0),
 (189,1,7,14,'lunes',9,2015,0,0),
 (190,1,7,21,'lunes',9,2015,0,0),
 (191,1,7,28,'lunes',9,2015,0,0),
 (192,1,7,5,'lunes',10,2015,0,0),
 (193,1,7,12,'lunes',10,2015,0,0),
 (194,1,7,19,'lunes',10,2015,0,0),
 (195,1,7,26,'lunes',10,2015,0,0),
 (196,1,7,2,'lunes',11,2015,0,0),
 (197,1,7,11,'lunes',5,2015,0,0),
 (198,1,7,18,'lunes',5,2015,0,0),
 (199,1,7,25,'lunes',5,2015,0,0),
 (200,1,7,1,'lunes',6,2015,0,0),
 (201,1,7,8,'lunes',6,2015,0,0),
 (202,1,7,15,'lunes',6,2015,0,0),
 (203,1,7,22,'lunes',6,2015,0,0),
 (204,1,7,29,'lunes',6,2015,0,0),
 (205,1,7,6,'lunes',7,2015,0,0),
 (206,1,7,13,'lunes',7,2015,0,0),
 (207,1,7,20,'lunes',7,2015,0,0),
 (208,1,7,27,'lunes',7,2015,0,0),
 (209,1,7,3,'lunes',8,2015,0,0),
 (210,1,7,10,'lunes',8,2015,0,0),
 (211,1,7,17,'lunes',8,2015,0,0),
 (212,1,7,24,'lunes',8,2015,0,0),
 (213,1,7,31,'lunes',8,2015,0,0),
 (214,1,7,7,'lunes',9,2015,0,0),
 (215,1,7,14,'lunes',9,2015,0,0),
 (216,1,7,21,'lunes',9,2015,0,0),
 (217,1,7,28,'lunes',9,2015,0,0),
 (218,1,7,5,'lunes',10,2015,0,0),
 (219,1,7,12,'lunes',10,2015,0,0),
 (220,1,7,19,'lunes',10,2015,0,0),
 (221,1,7,26,'lunes',10,2015,0,0),
 (222,1,7,2,'lunes',11,2015,0,0),
 (223,1,7,11,'lunes',5,2015,0,0),
 (224,1,7,18,'lunes',5,2015,0,0),
 (225,1,7,25,'lunes',5,2015,0,0),
 (226,1,7,1,'lunes',6,2015,0,0),
 (227,1,7,8,'lunes',6,2015,0,0),
 (228,1,7,15,'lunes',6,2015,0,0),
 (229,1,7,22,'lunes',6,2015,0,0),
 (230,1,7,29,'lunes',6,2015,0,0),
 (231,1,7,6,'lunes',7,2015,0,0),
 (232,1,7,13,'lunes',7,2015,0,0),
 (233,1,7,20,'lunes',7,2015,0,0),
 (234,1,7,27,'lunes',7,2015,0,0),
 (235,1,7,3,'lunes',8,2015,0,0),
 (236,1,7,10,'lunes',8,2015,0,0),
 (237,1,7,17,'lunes',8,2015,0,0),
 (238,1,7,24,'lunes',8,2015,0,0),
 (239,1,7,31,'lunes',8,2015,0,0),
 (240,1,7,7,'lunes',9,2015,0,0),
 (241,1,7,14,'lunes',9,2015,0,0),
 (242,1,7,21,'lunes',9,2015,0,0),
 (243,1,7,28,'lunes',9,2015,0,0),
 (244,1,7,5,'lunes',10,2015,0,0),
 (245,1,7,12,'lunes',10,2015,0,0),
 (246,1,7,19,'lunes',10,2015,0,0),
 (247,1,7,26,'lunes',10,2015,0,0),
 (248,1,7,2,'lunes',11,2015,0,0),
 (249,1,16,11,'lunes',5,2015,0,0),
 (250,1,16,18,'lunes',5,2015,0,0),
 (251,1,16,25,'lunes',5,2015,0,0),
 (252,1,16,1,'lunes',6,2015,0,0),
 (253,1,16,8,'lunes',6,2015,0,0),
 (254,1,16,15,'lunes',6,2015,0,0),
 (255,1,16,22,'lunes',6,2015,0,0),
 (256,1,16,29,'lunes',6,2015,0,0),
 (257,1,16,6,'lunes',7,2015,0,0),
 (258,1,16,13,'lunes',7,2015,0,0),
 (259,1,16,20,'lunes',7,2015,0,0),
 (260,1,16,27,'lunes',7,2015,0,0),
 (261,1,16,3,'lunes',8,2015,0,0),
 (262,1,16,10,'lunes',8,2015,0,0),
 (263,1,16,17,'lunes',8,2015,0,0),
 (264,1,16,24,'lunes',8,2015,0,0),
 (265,1,16,31,'lunes',8,2015,0,0),
 (266,1,16,7,'lunes',9,2015,0,0),
 (267,1,16,14,'lunes',9,2015,0,0),
 (268,1,16,21,'lunes',9,2015,0,0),
 (269,1,16,28,'lunes',9,2015,0,0),
 (270,1,16,5,'lunes',10,2015,0,0),
 (271,1,16,12,'lunes',10,2015,0,0),
 (272,1,16,19,'lunes',10,2015,0,0),
 (273,1,16,26,'lunes',10,2015,0,0),
 (274,1,16,2,'lunes',11,2015,0,0),
 (275,1,16,11,'lunes',5,2015,0,0),
 (276,1,16,18,'lunes',5,2015,0,0),
 (277,1,16,25,'lunes',5,2015,0,0),
 (278,1,16,1,'lunes',6,2015,0,0),
 (279,1,16,8,'lunes',6,2015,0,0),
 (280,1,16,15,'lunes',6,2015,0,0),
 (281,1,16,22,'lunes',6,2015,0,0),
 (282,1,16,29,'lunes',6,2015,0,0),
 (283,1,16,6,'lunes',7,2015,0,0),
 (284,1,16,13,'lunes',7,2015,0,0),
 (285,1,16,20,'lunes',7,2015,0,0),
 (286,1,16,27,'lunes',7,2015,0,0),
 (287,1,16,3,'lunes',8,2015,0,0),
 (288,1,16,10,'lunes',8,2015,0,0),
 (289,1,16,17,'lunes',8,2015,0,0),
 (290,1,16,24,'lunes',8,2015,0,0),
 (291,1,16,31,'lunes',8,2015,0,0),
 (292,1,16,7,'lunes',9,2015,0,0),
 (293,1,16,14,'lunes',9,2015,0,0),
 (294,1,16,21,'lunes',9,2015,0,0),
 (295,1,16,28,'lunes',9,2015,0,0),
 (296,1,16,5,'lunes',10,2015,0,0),
 (297,1,16,12,'lunes',10,2015,0,0),
 (298,1,16,19,'lunes',10,2015,0,0),
 (299,1,16,26,'lunes',10,2015,0,0),
 (300,1,16,2,'lunes',11,2015,0,0),
 (301,1,16,11,'lunes',5,2015,0,0),
 (302,1,16,18,'lunes',5,2015,0,0),
 (303,1,16,25,'lunes',5,2015,0,0),
 (304,1,16,1,'lunes',6,2015,0,0),
 (305,1,16,8,'lunes',6,2015,0,0),
 (306,1,16,15,'lunes',6,2015,0,0),
 (307,1,16,22,'lunes',6,2015,0,0),
 (308,1,16,29,'lunes',6,2015,0,0),
 (309,1,16,6,'lunes',7,2015,0,0),
 (310,1,16,13,'lunes',7,2015,0,0),
 (311,1,16,20,'lunes',7,2015,0,0),
 (312,1,16,27,'lunes',7,2015,0,0),
 (313,1,16,3,'lunes',8,2015,0,0),
 (314,1,16,10,'lunes',8,2015,0,0),
 (315,1,16,17,'lunes',8,2015,0,0),
 (316,1,16,24,'lunes',8,2015,0,0),
 (317,1,16,31,'lunes',8,2015,0,0),
 (318,1,16,7,'lunes',9,2015,0,0),
 (319,1,16,14,'lunes',9,2015,0,0),
 (320,1,16,21,'lunes',9,2015,0,0),
 (321,1,16,28,'lunes',9,2015,0,0),
 (322,1,16,5,'lunes',10,2015,0,0),
 (323,1,16,12,'lunes',10,2015,0,0),
 (324,1,16,19,'lunes',10,2015,0,0),
 (325,1,16,26,'lunes',10,2015,0,0),
 (326,1,16,2,'lunes',11,2015,0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasmultiples`
--

/*!40000 ALTER TABLE `reservasmultiples` DISABLE KEYS */;
INSERT INTO `reservasmultiples` (`dia_inicio`,`mes_inicio`,`anyo_inicio`,`cliente`,`cancelada`,`ID`,`diaSemana`,`hora`,`cuando`,`anyo_fin`,`mes_fin`,`dia_fin`) VALUES 
 (15,4,2015,1,1,9,'martes',1,'2015-04-15 22:28:55',2015,10,14),
 (15,4,2015,1,1,10,'martes',1,'2015-04-15 22:30:43',2015,10,14),
 (19,4,2015,1,0,11,'jueves',3,'2015-04-19 10:04:18',2015,10,16),
 (19,4,2015,1,0,12,'martes',4,'2015-04-19 10:04:19',2015,10,14),
 (19,4,2015,1,0,13,'martes',2,'2015-04-19 10:04:20',2015,10,14),
 (7,5,2015,1,0,14,'lunes',1,'2015-05-07 21:19:21',2015,11,4),
 (7,5,2015,1,0,15,'lunes',5,'2015-05-07 21:19:37',2015,11,4),
 (7,5,2015,1,0,16,'lunes',5,'2015-05-07 21:19:38',2015,11,4),
 (7,5,2015,1,0,17,'lunes',7,'2015-05-07 21:19:44',2015,11,4),
 (7,5,2015,1,0,18,'lunes',7,'2015-05-07 21:19:44',2015,11,4),
 (7,5,2015,1,0,19,'lunes',7,'2015-05-07 21:19:45',2015,11,4),
 (7,5,2015,1,0,20,'lunes',7,'2015-05-07 21:19:46',2015,11,4),
 (7,5,2015,1,0,21,'lunes',7,'2015-05-07 21:19:47',2015,11,4),
 (7,5,2015,1,0,22,'lunes',7,'2015-05-07 21:19:49',2015,11,4),
 (7,5,2015,1,0,23,'lunes',16,'2015-05-07 21:20:04',2015,11,4),
 (7,5,2015,1,0,24,'lunes',16,'2015-05-07 21:20:05',2015,11,4),
 (7,5,2015,1,0,25,'lunes',16,'2015-05-07 21:20:06',2015,11,4);
/*!40000 ALTER TABLE `reservasmultiples` ENABLE KEYS */;


--
-- Definition of table `tarifas`
--

DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE `tarifas` (
  `id_tarifa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `valor_sin_iva` float NOT NULL,
  `fecha_inicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `obsoleta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarifas`
--

/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
