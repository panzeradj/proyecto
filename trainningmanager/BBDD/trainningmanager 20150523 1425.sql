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
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `poblacion` varchar(100) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `c_p` varchar(11) NOT NULL,
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
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(50) NOT NULL,
  `activo` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `domiciliado` tinyint(1) NOT NULL DEFAULT '0',
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`,`poblacion`,`provincia`,`c_p`,`dni`,`telefono`,`telefono2`,`email`,`genero`,`fecha_nacimiento`,`fecha_alta`,`fecha_baja`,`objetivos`,`comentarios`,`patologias`,`medicacion`,`nombre`,`apellido`,`activo`,`domiciliado`,`direccion`) VALUES 
 (1,' ',' ',' ','00000000A',' ',' ',' ','Hombre','0000-00-00','2015-05-20 09:56:13','0000-00-00 00:00:00',' ',' ',' ',' ','TPV','TPV',0,0,' '),
 (21,'Soria','Soria','43003','1658N','666666666','','o0skiii@hotmail.com','Hombre','1994-05-17','2015-05-17 09:12:13','0000-00-00 00:00:00','','','','Soria','Oscar','Romero',1,0,'Soria'),
 (22,'soria','soria','42001','16813058n','695184457','','asd@as.es','Hombre','1992-10-30','2015-05-21 09:58:24','0000-00-00 00:00:00','','','','','pepito','floro',0,0,'plaza mayor'),
 (25,'Soria','Soria','42001','72892902Z','626888700','','adriansoria91@gmail.com','Hombre','1991-03-02','2015-05-18 13:55:45','0000-00-00 00:00:00','','','','','Adrian','Carnicero Aparicio',1,0,'C/ retogenes, 7 2ºC'),
 (32,'soria','soria','42003','16813058N','695184457','','roberto-velez@outlook.com','Hombre','1992-10-30','2015-05-20 22:01:00','0000-00-00 00:00:00','saltar mas ','','','','Roberto ','Vélez Gamboa',1,0,'plaza mayor sn'),
 (35,'','','','16813058N','','','','Hombre','1992-10-30','2015-05-20 21:45:35','0000-00-00 00:00:00','','','','','Roberto ','Vélez Gamboa',1,0,'');
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
  PRIMARY KEY (`id_contrato`),
  KEY `FK_contratos_1` (`cliente`),
  KEY `FK_contratos_2` (`tarifa`),
  CONSTRAINT `FK_contratos_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `FK_contratos_2` FOREIGN KEY (`tarifa`) REFERENCES `tarifas` (`id_tarifa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contratos`
--

/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` (`id_contrato`,`cliente`,`tarifa`,`fecha_inicio`,`fecha_fin`) VALUES 
 (1,1,1,'2015-05-02 22:20:24','0000-00-00 00:00:00'),
 (7,22,21,'2015-05-17 09:59:18','0000-00-00 00:00:00'),
 (8,25,21,'2015-05-18 13:55:45','0000-00-00 00:00:00'),
 (9,32,21,'2015-05-01 09:56:40','0000-00-00 00:00:00'),
 (10,35,21,'2015-05-20 21:45:50','0000-00-00 00:00:00'),
 (11,21,21,'2015-05-01 22:20:24','0000-00-00 00:00:00');
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
INSERT INTO `correo` (`correo`,`pass`,`servidor`,`puerto`) VALUES 
 ('gestionweb@acwellness.es','gestionweb','smtp.1and1.es','25');
/*!40000 ALTER TABLE `correo` ENABLE KEYS */;


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
INSERT INTO `entrenadores` (`id_entrenador`,`nombre`,`apellidos`,`email`) VALUES 
 ('adriancarnicero','Adrian','Carnicero','adrian@acwellness.es');
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
  `cliente` int(10) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(10) unsigned NOT NULL,
  `valor` float NOT NULL,
  `descuento` double NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `FK_facturas_1` (`cliente`),
  CONSTRAINT `FK_facturas_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturas`
--

/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`id_factura`,`cliente`,`fecha`,`estado`,`valor`,`descuento`) VALUES 
 (41,1,'2015-05-20 12:16:23',1,180,0),
 (42,1,'2015-05-20 12:20:26',1,90,10),
 (46,21,'2015-05-21 11:15:34',1,98,0),
 (47,22,'2015-05-21 11:15:35',0,30,0),
 (48,25,'2015-05-21 11:15:35',0,34,0);
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
-- Definition of table `lineas_factura`
--

DROP TABLE IF EXISTS `lineas_factura`;
CREATE TABLE `lineas_factura` (
  `factura` int(10) unsigned NOT NULL,
  `producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`factura`,`producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineas_factura`
--

/*!40000 ALTER TABLE `lineas_factura` DISABLE KEYS */;
INSERT INTO `lineas_factura` (`factura`,`producto`,`cantidad`) VALUES 
 (41,200000,4),
 (42,200000,2),
 (46,792,1),
 (46,793,1),
 (46,802,1),
 (46,803,1),
 (46,804,1),
 (46,806,1),
 (47,791,1),
 (47,794,1),
 (48,801,1),
 (48,805,1);
/*!40000 ALTER TABLE `lineas_factura` ENABLE KEYS */;


--
-- Definition of table `log_notificaciones`
--

DROP TABLE IF EXISTS `log_notificaciones`;
CREATE TABLE `log_notificaciones` (
  `id_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `log_notificaciones`
--

/*!40000 ALTER TABLE `log_notificaciones` DISABLE KEYS */;
INSERT INTO `log_notificaciones` (`id_log`,`fecha`) VALUES 
 (1,'2015-05-17');
/*!40000 ALTER TABLE `log_notificaciones` ENABLE KEYS */;


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
-- Definition of table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(999) NOT NULL,
  `mensaje` varchar(999) NOT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificaciones`
--

/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` (`id_notificacion`,`nombre`,`mensaje`) VALUES 
 (1,'birthday','Muchísimas felicidades campeón');
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;


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
 (1,'2015-04-01 20:55:10',0),
 (21,'2015-05-01 20:55:10',10),
 (21,'2015-05-11 20:55:32',15),
 (21,'2015-05-18 10:19:43',0),
 (21,'2015-05-18 10:19:53',15),
 (21,'2015-05-18 11:37:13',17),
 (21,'2015-05-20 22:18:48',18),
 (21,'2015-05-20 22:19:01',17),
 (22,'2015-05-19 10:46:00',20);
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
  `off` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_producto`),
  KEY `FK_productos_1` (`proveedor`),
  CONSTRAINT `FK_productos_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedores` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=200006 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id_producto`,`nombre`,`descripcion`,`proveedor`,`valor_sin_iva`,`off`) VALUES 
 (200000,'Bono 3 sesiones','3 sesiones',18,45,0),
 (200001,'Bono 12 sesiones','12 sesiones',18,160,0),
 (200002,'Producto de prueba','Probando productos',18,2,1),
 (200003,'Producto de prueba','Probando productos',18,22,1),
 (200004,'Producto de prueba','Probando productos',18,22,0),
 (200005,'toalla','Azul',18,20,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Definition of table `productos_libres`
--

DROP TABLE IF EXISTS `productos_libres`;
CREATE TABLE `productos_libres` (
  `id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=600007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos_libres`
--

/*!40000 ALTER TABLE `productos_libres` DISABLE KEYS */;
INSERT INTO `productos_libres` (`id_producto`,`descripcion`,`valor`) VALUES 
 (600001,'Otro',200),
 (600002,'Algo',100),
 (600003,'Otro',15),
 (600004,'Otro',15),
 (600005,'otro',15),
 (600006,'otro',150);
/*!40000 ALTER TABLE `productos_libres` ENABLE KEYS */;


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
  `off` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedores`
--

/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`id_proveedor`,`nombre`,`nif`,`empresa`,`telefono`,`cp`,`correo`,`direccion`,`off`) VALUES 
 (18,'Yo','12345678A','La mia','666666666','42002','a@a.com','C/ del pez',0);
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
  PRIMARY KEY (`id_reserva`),
  KEY `FK_reservas_1` (`cliente`),
  CONSTRAINT `FK_reservas_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=807 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservas`
--

/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id_reserva`,`cliente`,`hora`,`dia`,`semana`,`mes`,`anyo`,`pagada`,`cancelada`,`cuando`) VALUES 
 (787,21,6,17,'domingo',5,2015,0,1,'2015-05-17 09:21:44'),
 (788,21,6,17,'domingo',5,2015,0,1,'2015-05-17 09:22:07'),
 (789,21,6,17,'domingo',5,2015,0,1,'2015-05-17 09:22:39'),
 (790,21,6,17,'domingo',5,2015,0,1,'2015-05-17 09:27:10'),
 (791,22,6,17,'domingo',5,2015,1,0,'2015-05-17 12:22:10'),
 (792,21,8,17,'domingo',5,2015,1,0,'2015-05-17 12:58:52'),
 (793,21,6,18,'lunes',5,2015,1,0,'2015-05-18 10:13:40'),
 (794,22,7,18,'lunes',5,2015,1,0,'2015-05-18 11:35:02'),
 (801,25,6,24,'domingo',5,2015,1,0,'2015-05-20 17:26:07'),
 (802,21,6,22,'viernes',5,2015,1,0,'2015-05-20 17:28:27'),
 (803,21,6,22,'viernes',5,2015,1,0,'2015-05-20 17:28:27'),
 (804,21,6,20,'miercoles',5,2015,1,0,'2015-05-20 17:39:38'),
 (805,25,6,20,'miercoles',5,2015,1,0,'2015-05-20 17:39:38'),
 (806,21,8,22,'viernes',5,2015,1,0,'2015-05-20 17:41:46');
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
  PRIMARY KEY (`ID`),
  KEY `FK_reservasmultiples_1` (`cliente`),
  CONSTRAINT `FK_reservasmultiples_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasmultiples`
--

/*!40000 ALTER TABLE `reservasmultiples` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservasmultiples` ENABLE KEYS */;


--
-- Definition of table `tarifas`
--

DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE `tarifas` (
  `id_tarifa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarifas`
--

/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;
INSERT INTO `tarifas` (`id_tarifa`,`nombre`,`descripcion`,`activa`) VALUES 
 (1,'Tarifa tpv','Tarifa sin valor',0),
 (21,'2 d/s','2 dias a la semana',1),
 (22,'1 d/s','1 día por semana',0);
/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
