-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: ferreteria_la_campana
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auditoria_usuarios`
--

DROP TABLE IF EXISTS `auditoria_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria_usuarios` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `operacion` varchar(30) NOT NULL,
  `rama` varchar(50) NOT NULL,
  `detalles_operacion` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `CI_RIF` (`number`),
  KEY `CI_RIF_2` (`number`),
  CONSTRAINT `auditoria_usuarios_ibfk_1` FOREIGN KEY (`number`) REFERENCES `users` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria_usuarios`
--

LOCK TABLES `auditoria_usuarios` WRITE;
/*!40000 ALTER TABLE `auditoria_usuarios` DISABLE KEYS */;
INSERT INTO `auditoria_usuarios` VALUES (1,123456789,'REGISTRO','PRODUCTOS','Registro del producto código: TAD22, Nombre: Taladro Mayor Marca deWalt','2018-11-23 02:08:36'),(2,123456789,'ACTUALIZACIÓN','PRODUCTOS','Actualización del producto código: TAD22, Nombre:Taladro Mayor Marca deWalt','2018-11-23 02:09:56'),(3,123456789,'BORRADO','PRODUCTOS','Borrado del producto código: TAD20, Nombre:Taladro Mayor Marca','2018-11-23 02:10:26'),(4,123456789,'REGISTRO','CATEGORÍAS','Registro de la categoría  bajo el código TAD','2018-11-23 02:10:59'),(5,123456789,'ACTUALIZACION','CATEGORÍAS','Actualización de la categoría bajo el código TAD','2018-11-23 02:11:16'),(6,123456789,'BORRADO','CATEGORÍAS','Borrado de la categoría bajo el código 28','2018-11-23 02:11:32'),(7,123456789,'REGISTRO','ESTADO DE PEDIDO','Registro de un tipo de estado de pedidos con el nombre de POR RECIBIR','2018-11-23 02:12:12'),(8,123456789,'ACTUALIZACION','ESTADO DE PEDIDO','Actualizacion de un tipo de estado de pedidos con el id: 5 y la descripción: POR DESPACHAR','2018-11-23 02:12:24'),(9,123456789,'BORRADO','ESTADO DE PEDIDO','Borrado de un tipo de estado de pedidos con el id: 5','2018-11-23 02:13:53'),(10,123456789,'REGISTRO','PEDIDO','Registro de un pedido con el id: 11','2018-11-23 02:15:59'),(11,123456789,'REGISTRO','REQUISICION','Registro de una nueva requisición: 4 ','2018-11-23 02:16:56'),(12,123456789,'REGISTRO','ORDEN DE COMPRA','Registro de una orden de compra con el id: 5','2018-11-23 02:17:45'),(13,123456789,'REGISTRO','RECEPCION','Registro de una nueva recepción: 4 ','2018-11-23 02:22:32'),(14,123456789,'RESPALDO','BASE DE DATOS','Respaldo de Base de Datos bajo el archivo backup/laburra_23-11-2018_022807.sql','2018-11-23 02:28:08');
/*!40000 ALTER TABLE `auditoria_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `descripcion_categoria` varchar(60) NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`code`),
  UNIQUE KEY `id` (`id`),
  KEY `DESCRIPCION_CATEGORIAS` (`descripcion_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'ASF','ASFALTOS','1'),(2,'BAT','BATERIAS','1'),(3,'BYL','BOMBILLOS Y LAMPARAS','1'),(4,'CAB','CABLES','1'),(5,'CAR','CARBONES','1'),(6,'CDL','CANALES DE LLUVIAS','1'),(7,'CON','CONEXIONES','1'),(8,'CYA','CINTAS Y ADHESIVOS','1'),(9,'EMP','EMPACADURAS','1'),(10,'GYB','GRIFERIAS Y BAJANTES','1'),(11,'HER','HERRAMIENTAS','1'),(12,'LYC','LLAVES Y CERRADURAS','1'),(13,'MAE','MATERIALES ELECTRICOS','1'),(14,'MAL','MALLAS','1'),(15,'MAN','MANGUERAS','1'),(16,'MDC','MATERIALES DE CONSTRUCCION','1'),(17,'OTR','OTROS','1'),(18,'PEV','PEGAMENTOS VARIOS','1'),(26,'PRU','PRUEBA DE CATEGORIA','2'),(27,'PRUE','PRUEBA CATEGORIA','2'),(19,'PYS','PINTURAS Y SOLVENTES','1'),(20,'ROD','RODAMIENTOS','1'),(28,'TAD','Taladro','2'),(21,'TER','TERMINALES','1'),(22,'TIS','TIRADORES SURTIDOS','1'),(23,'TRU','TRUPER','1'),(24,'TUB','TUBERIAS','1'),(25,'TYC','TORNILLOS Y CLAVOS','1');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_orden_compra`
--

DROP TABLE IF EXISTS `detalles_orden_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_orden_compra` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_orden` int(15) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_requisicion` (`id_orden`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_orden_compra`
--

LOCK TABLES `detalles_orden_compra` WRITE;
/*!40000 ALTER TABLE `detalles_orden_compra` DISABLE KEYS */;
INSERT INTO `detalles_orden_compra` VALUES (1,1,2,20),(2,1,3,10),(3,2,2,20),(4,2,3,10),(5,3,3,10),(6,3,2,20),(7,4,2,10),(8,5,2,40),(9,5,3,20);
/*!40000 ALTER TABLE `detalles_orden_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_pedido`
--

DROP TABLE IF EXISTS `detalles_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_pedido` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(15) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_PRODUCTO` (`id_producto`),
  KEY `ID_PEDIDO` (`id_pedido`),
  KEY `ID_PRODUCTO_2` (`id_producto`),
  CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  CONSTRAINT `detalles_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_pedido`
--

LOCK TABLES `detalles_pedido` WRITE;
/*!40000 ALTER TABLE `detalles_pedido` DISABLE KEYS */;
INSERT INTO `detalles_pedido` VALUES (17,1,1,3,195),(18,1,1,4,260),(19,1,1,2,130),(20,2,1,9,0),(21,2,1,7,0),(22,3,1,1,0),(23,4,2,14,910),(24,5,4,12,144),(25,6,14,6,0),(26,6,15,3,0),(27,7,2,3,195),(28,7,3,0,0),(29,7,3,0,0),(30,7,3,0,0),(31,8,2,1,65),(32,8,2,1,65),(33,9,2,2,130),(34,9,3,4,492),(35,9,4,9,108),(36,10,2,2,130),(37,10,3,4,492),(38,10,4,9,108),(39,11,2,2,130),(40,11,3,4,492),(41,11,4,9,108);
/*!40000 ALTER TABLE `detalles_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_recepcion`
--

DROP TABLE IF EXISTS `detalles_recepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_recepcion` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_recepcion` int(15) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_REQUISICION` (`id_recepcion`),
  KEY `ID_PRODUCTO` (`id_producto`),
  CONSTRAINT `detalles_recepcion_ibfk_1` FOREIGN KEY (`id_recepcion`) REFERENCES `recepcion` (`id`),
  CONSTRAINT `detalles_recepcion_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_recepcion`
--

LOCK TABLES `detalles_recepcion` WRITE;
/*!40000 ALTER TABLE `detalles_recepcion` DISABLE KEYS */;
INSERT INTO `detalles_recepcion` VALUES (1,1,2,20),(2,1,3,10),(3,2,3,10),(4,2,2,20),(5,3,2,10),(6,4,2,40),(7,4,3,20);
/*!40000 ALTER TABLE `detalles_recepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_requisicion`
--

DROP TABLE IF EXISTS `detalles_requisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_requisicion` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_requisicion` int(15) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_requisicion` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_MOVIMIENTO` (`id_requisicion`),
  KEY `ID_PRODUCTO` (`id_producto`),
  CONSTRAINT `detalles_requisicion_ibfk_1` FOREIGN KEY (`id_requisicion`) REFERENCES `requisicion` (`id`),
  CONSTRAINT `detalles_requisicion_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_requisicion`
--

LOCK TABLES `detalles_requisicion` WRITE;
/*!40000 ALTER TABLE `detalles_requisicion` DISABLE KEYS */;
INSERT INTO `detalles_requisicion` VALUES (1,1,2,20),(2,1,3,10),(3,2,3,10),(4,2,2,20),(5,3,2,10),(6,4,2,40),(7,4,3,20);
/*!40000 ALTER TABLE `detalles_requisicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_estado` varchar(200) NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'ANULADO','1'),(2,'ENTREGADO','1'),(3,'POR ENTREGAR','1'),(4,'POR PAGAR','1'),(5,'POR DESPACHAR','2');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_compra`
--

DROP TABLE IF EXISTS `orden_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compra`
--

LOCK TABLES `orden_compra` WRITE;
/*!40000 ALTER TABLE `orden_compra` DISABLE KEYS */;
INSERT INTO `orden_compra` VALUES (1,123456789,1,'2018-11-19 04:37:11'),(2,123456789,5,'2018-11-19 04:41:32'),(3,123456789,5,'2018-11-20 00:55:00'),(4,123456789,5,'2018-11-20 23:50:41'),(5,123456789,5,'2018-11-23 02:17:44');
/*!40000 ALTER TABLE `orden_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `CI_RIF` (`number`),
  KEY `ID_ESTADO` (`created_at`),
  KEY `number` (`number`),
  KEY `id_estado_2` (`id_estado`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`number`) REFERENCES `users` (`number`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,123456789,3,'2018-11-18 03:58:12'),(2,123456789,1,'2018-11-18 04:07:57'),(3,123456789,3,'2018-11-18 04:09:42'),(4,123456789,3,'2018-11-19 00:22:48'),(5,123456789,3,'2018-11-19 00:23:07'),(6,123456789,1,'2018-11-20 00:52:51'),(7,123456789,3,'2018-11-20 23:31:41'),(8,123456789,3,'2018-11-20 23:33:54'),(9,123456789,3,'2018-11-23 02:14:52'),(10,123456789,3,'2018-11-23 02:15:31'),(11,123456789,3,'2018-11-23 02:15:58');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `name` varchar(60) NOT NULL,
  `id_categoria` varchar(15) NOT NULL,
  `stock` int(15) NOT NULL,
  `unity` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`),
  UNIQUE KEY `id` (`id`),
  KEY `DESCRIPCCION_PRODUCTO` (`name`),
  KEY `ID_CATEGORIA` (`id_categoria`) USING BTREE,
  KEY `DESCRIPCION_PRODUCTO` (`name`),
  KEY `id_categoria_2` (`id_categoria`),
  KEY `id_categoria_3` (`id_categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'100029','CARRETILLA ALBAÑIL 85L R/AIRE NARANJA','ASF',50,'UND',12,'1','2018-11-15 01:59:24'),(2,'100W','BOMBILLO 110 - 100W HALOGENO SYLVANIA','ASF',33,'UND',65,'1','2018-11-15 01:59:24'),(3,'101029','BOMBILLO AHORRADOR E14 11WATS SEMILIC','ASF',88,'UND',123,'1','2018-11-15 01:59:24'),(4,'101050','BOMBILLO AHORRADOR ESPIRAL SEMILIC  15W','ASF',56,'UND',12,'1','2018-11-15 01:59:24'),(5,'11-001','LAMPARA PLAFON TRANSPARENTE 6\"','ASF',56,'UND',31,'1','2018-11-15 01:59:24'),(6,'1102','PULSADOR P/ EMPOTRAR TICINO','ASF',58,'UND',654,'1','2018-11-15 01:59:24'),(7,'110500G','BOMBILLO DE HALOGENO  500W G.E     110V','ASF',58,'UND',123,'1','2018-11-15 01:59:24'),(8,'110B','PROTECTOR A/A C/BORNER 110W NINJA 3AÑO G','ASF',56,'CAJA',50,'1','2018-11-15 01:59:24'),(9,'110C','PROTECTOR COMPUTADORA  110W NINJA 3AÑO G','ASF',56,'UND',13,'1','2018-11-15 01:59:24'),(10,'111969','CUCHARA LUXVEN 8\" PUNTA REDONDA','ASF',56,'UND',90,'1','2018-11-15 01:59:24'),(11,'113385','LLAVE P/TUBO 14\" T/RIDGID','BOM',56,'UND',489,'1','2018-11-15 01:59:24'),(12,'12-026','LAMPARA BAMBER 8\" TORNASOL','BOM',56,'UND',543,'1','2018-11-15 01:59:24'),(13,'125353','CHICURA VINKO DE ALTA CALIDAD 2 LB','BOM',56,'',0,'1','2018-11-15 01:59:24'),(14,'133412','PALA CUADRADA MANGO PLASTICO','BOM',56,'',0,'1','2018-11-15 01:59:24'),(15,'1382594','MARTILLO CARP. 25mm CASCABEL','BOM',56,'',0,'1','2018-11-15 01:59:24'),(16,'14-045','LAMPARA FLUORESCENTE CUADRADA 22 W','BOM',56,'',0,'1','2018-11-15 01:59:24'),(17,'14515','MULTITOMA 6 TOMA BRUFER','BOM',16,'',0,'1','2018-11-15 01:59:24'),(18,'16-150','CINCEL PUNTA BELLOTA 16-150','BOM',56,'',0,'1','2018-11-15 01:59:24'),(19,'17-047','ESCUADRA METALICA 8\"','BOM',56,'',0,'1','2018-11-15 01:59:24'),(20,'1X15EE','BREAKER P/ EMPOTRAR YAINO  1X15 AL 1X30','ASF',13,'',0,'1','2018-11-15 01:59:24'),(21,'1X15ES','BREAKER P/ EMPOTRAR SIEMEN 1X15','CAR',29,'',0,'1','2018-11-15 01:59:24'),(22,'1X15ET','BREAKER P/ EMPOTRAR TICINO 1X15 AL 1X30','CAR',24,'',0,'1','2018-11-15 01:59:24'),(23,'20103','ESCARDILLA 2KG. ECONOMICA','CAR',106,'',0,'1','2018-11-15 01:59:24'),(24,'2032','PILA 3V 2032 C/U','CAR',50,'',0,'1','2018-11-15 01:59:24'),(25,'209601','CERR CILINDRO FIJO BLUELOOCK','CAR',13,'',0,'1','2018-11-15 01:59:24'),(26,'209671','CERR P/VITRINA C/LLAVE','CAR',20,'',0,'1','2018-11-15 01:59:24'),(27,'2117','CERR T/POMO METAL C/LLAVE BLUELOCK','CAR',50,'',0,'1','2018-11-15 01:59:24'),(28,'2127','CERR T/POMO METAL S/LLAVE VENLOCK','CAR',6,'',0,'1','2018-11-15 01:59:24'),(29,'2201030MM','CANDADO DE LATON PLANOS 30mm CISA','CAR',23,'',0,'1','2018-11-15 01:59:24'),(30,'2201040MM','CANDADO DE LATON PLANOS 40mm CISA','ASF',73,'',0,'1','2018-11-15 01:59:24'),(31,'2201050MM','CANDADO DE LATON PLANOS 50mm CISA','EMP',1,'',0,'1','2018-11-15 01:59:24'),(32,'2201060MM','CANDADO DE LATON PLANOS 60mm CISA','EMP',1,'',0,'1','2018-11-15 01:59:24'),(33,'22011-52','CANDADO ARCO LARGO A/Z 50mm  CISA','EMP',21,'',0,'1','2018-11-15 01:59:24'),(34,'22WG','FLUORESCENTE 22W CIRCULAR G/ELECTRIC','EMP',59,'',0,'1','2018-11-15 01:59:24'),(35,'406001','Agrolucha','EMP',288,'UND',0,'1','2018-11-15 01:59:24'),(36,'5001','PISTOLA PARA PINTAR C/ENV PLAS D GRAVED','EMP',59,'',0,'1','2018-11-15 01:59:24'),(37,'637','EXTENSION ELECTRICA BLANCA    5MTS SEMIL','EMP',27,'',0,'1','2018-11-15 01:59:24'),(38,'668','EXTENSION ELECTRICA NEGRA     5MTS SEMIL','EMP',59,'',0,'1','2018-11-15 01:59:24'),(39,'71453','BOMBILLO TIPO VELA E-12 FERMETAL','EMP',12,'',0,'1','2018-11-15 01:59:24'),(40,'846','HEMBRILLA ELECTRICA 110V ESPAÑOLA','ASF',99,'',0,'1','2018-11-15 01:59:24'),(41,'BP4','BROCHA PRETUL 4\"','ASF',40,'',0,'1','2018-11-15 01:59:24'),(42,'CA2','CLAVOS DE ACERO 2\"','ASF',113,'',0,'1','2018-11-15 01:59:24'),(43,'CAB-01','Cable UTP Nivel 6','ASF',50,'Metro',0,'1','2018-11-15 01:59:24'),(44,'CAR-01','Carbon Negro','ASF',39,'UND',0,'1','2018-11-15 01:59:24'),(45,'CDL-01','Canal de Lluvia de 6\"','ASF',50,'UND',0,'1','2018-11-15 01:59:24'),(46,'CODPROD','Codigo Producto de Prueba','TUB',31,'UND',84,'1','2018-11-15 01:59:24'),(47,'CODPRODO','Codigo de producto de prueba','PYS',34,'UND',312,'1','2018-11-15 01:59:24'),(48,'CON-01','Conexion de tuberia Negra','ASF',36,'UND',0,'1','2018-11-15 01:59:24'),(49,'CYA','Cinta Metrica','ASF',50,'ROLLO',0,'1','2018-11-15 01:59:24'),(50,'GPAA','PILA AA  ALCALINA PAQ','ASF',4,'',0,'1','2018-11-15 01:59:24'),(51,'GPAAA','PILA AAA  ALCALINA PAQ','ASF',5,'',0,'1','2018-11-15 01:59:24'),(52,'IPAC1/4','ASFALTO IPA CEMENTO 1/4 GALON GOTA FIX','ASF',70,'',0,'1','2018-11-15 01:59:24'),(53,'IPACC','ASFALTO IPA CEMENTO DE CUÑETE','ASF',17,'',0,'1','2018-11-15 01:59:24'),(54,'IPACG','ASFALTO IPA CEMENTO DE GALON','ASF',16,'',0,'1','2018-11-15 01:59:24'),(55,'IPALC','ASFALTO IPA LIQUIDO DE CUÑETE','ASF',9,'',0,'1','2018-11-15 01:59:24'),(56,'IPALG','ASFALTO IPA LIQUIDO DE GALON','ASF',29,'',0,'1','2018-11-15 01:59:24'),(57,'IPAM3','MANTO 3.15 MILIMETRO IPA','ASF',26,'',0,'1','2018-11-15 01:59:24'),(58,'IPAMA','MANTO ALUMINIO ALUFLEX 10MTS','ASF',11,'',0,'1','2018-11-15 01:59:24'),(59,'IPAPC','ASFALTO IPA PLASTICO DE CUÑETE','ASF',11,'',0,'1','2018-11-15 01:59:24'),(60,'IPAPG','ASFALTO IPA PLASTICO DE GALON','ASF',11,'',0,'1','2018-11-15 01:59:24'),(61,'IPAPMC','ASFALTO IPA PRIMER DE CUÑETE','ASF',11,'',0,'1','2018-11-15 01:59:24'),(62,'IPAPMG','ASFALTO IPA PRIMER DE GALON','ASF',6,'',0,'1','2018-11-15 01:59:24'),(74,'KAS','Donardo Pineda','CAR',1000,'UND',10,'1','2018-11-20 01:21:43'),(63,'LOCO123','LOCOMOTORA','HER',4,'UND',100,'1','2018-11-15 01:59:24'),(64,'P12','PILA 12VOLTIO C/U','ASF',6,'',0,'1','2018-11-15 01:59:24'),(65,'P2025','PILA 2025 C/U','ASF',5,'',0,'1','2018-11-15 01:59:24'),(66,'P3V','PILA 3 VOLTIO','ASF',5,'',0,'1','2018-11-15 01:59:24'),(67,'P828','PILA 27A C/U','ASF',5,'',0,'1','2018-11-15 01:59:24'),(68,'POQ21','PODADORA ELECTRICA','HER',34,'UND',433,'1','2018-11-15 01:59:24'),(69,'PRUEB','PRUEBA DE CODIGO PRODUCTO','LYC',12,'UND',42,'1','2018-11-15 01:59:24'),(70,'SOL141','LENTES DE SOLDAR','HER',43,'UND',42,'1','2018-11-15 01:59:24'),(71,'SOL142','LENTES DE SOLDAR','HER',43,'UND',42,'1','2018-11-15 01:59:24'),(72,'SOL143','LENTES DE SOLDAR','HER',43,'UND',42,'1','2018-11-15 01:59:24'),(73,'T13/16','TORNILLO 13/16 MEDIANOS','ASF',464,'',0,'1','2018-11-15 01:59:24'),(75,'TAD20','Taladro Mayor Marca','HER',10,'UND',100,'2','2018-11-23 02:00:32'),(77,'TAD21','Taladro Mayor Marca Tucson','HER',10,'UND',100,'1','2018-11-23 02:06:10'),(78,'TAD22','Taladro Mayor Marca deWalt','HER',10,'UND',110,'1','2018-11-23 02:08:36');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepcion`
--

DROP TABLE IF EXISTS `recepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recepcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `CI_RIF` (`created_at`),
  KEY `CI_RIF_2` (`created_at`),
  KEY `number` (`number`),
  CONSTRAINT `recepcion_ibfk_1` FOREIGN KEY (`number`) REFERENCES `users` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepcion`
--

LOCK TABLES `recepcion` WRITE;
/*!40000 ALTER TABLE `recepcion` DISABLE KEYS */;
INSERT INTO `recepcion` VALUES (1,123456789,1,'2018-11-19 04:42:41'),(2,123456789,3,'2018-11-20 00:55:31'),(3,123456789,3,'2018-11-20 23:53:03'),(4,123456789,3,'2018-11-23 02:22:32');
/*!40000 ALTER TABLE `recepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion`
--

DROP TABLE IF EXISTS `requisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `observacion_requisicion` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `CI_RIF` (`created_at`),
  KEY `number` (`number`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `requisicion_ibfk_1` FOREIGN KEY (`number`) REFERENCES `users` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion`
--

LOCK TABLES `requisicion` WRITE;
/*!40000 ALTER TABLE `requisicion` DISABLE KEYS */;
INSERT INTO `requisicion` VALUES (1,123456789,5,NULL,'2018-11-19 04:36:43'),(2,123456789,5,NULL,'2018-11-20 00:54:35'),(3,123456789,5,NULL,'2018-11-20 23:49:44'),(4,123456789,5,NULL,'2018-11-23 02:16:56');
/*!40000 ALTER TABLE `requisicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuarios` (
  `id` varchar(15) NOT NULL,
  `descripcion_usuario` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuarios`
--

LOCK TABLES `tipo_usuarios` WRITE;
/*!40000 ALTER TABLE `tipo_usuarios` DISABLE KEYS */;
INSERT INTO `tipo_usuarios` VALUES ('ADM','ADMINISTRADOR'),('CLI','CLIENTE'),('TRA','TRABAJADOR');
/*!40000 ALTER TABLE `tipo_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `tipodoc` varchar(10) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1:activo; 2:desactivo; 3:eliminado;',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`number`),
  KEY `ID_USUARIOS` (`level`),
  KEY `ID_USUARIOS_2` (`level`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `tipo_usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('',0,'FERRETERIA LA CAMPANA, C.A.','$2y$10$lUHaC.RYdfM7CqpiEoSe1uy3hMgb4CQXhsZQ.gnJqp2Y18q/c6CHi','FERRETERIALACAMPANACA@HOTMAIL.COM','02432378756','AV 10 DE DICIEMBRE, MARACAY EDO ARAGUA','1970-01-01','TRA','1','2018-11-21 02:52:42','2018-10-16 00:15:35'),('V',1010101,'BinarioJulio','$2y$10$Zy6deXXFtP/lQySkRT0cPeU48CeC787Zy3IJTfDRxadfIPqAaolZ.','codigobinario@mail.com','04120101010','010101 BinarioLandia','1971-01-01','CLI','1','2018-11-21 02:28:03','2018-11-21 02:28:03'),('J-',13780965,'LUIS APONTE','$2y$10$PFxXNe9/qf9gahY.shN/c.jR1kPT9UNpbgYh6Q6LIaIqm430KGC5a','PROFESORLUISAPONTE@GMAIL.COM','04125678990','MARACAY','2017-11-21','CLI','1','2018-11-12 23:00:30','2018-10-16 00:15:35'),('V-',25074229,'KENY HIDALGO','$2y$10$PFxXNe9/qf9gahY.shN/c.jR1kPT9UNpbgYh6Q6LIaIqm430KGC5a','KENYTHEKAPH@GMAIL.COM','04243784404','MARGARITA - EDO NUEVA ESPARTA','1995-03-05','CLI','1','2018-11-12 23:00:34','2018-10-16 00:15:35'),('V-',123456789,'Jose Angel Padrón','$2y$10$PFxXNe9/qf9gahY.shN/c.jR1kPT9UNpbgYh6Q6LIaIqm430KGC5a','joseangelpadron@hotmail.com','04124672459','Maracay, Edo. Aragua','1993-03-02','CLI','1','2018-11-10 02:32:53','2018-11-10 00:38:21'),('V',987654321,'TremendoLoco','$2y$10$/MhGwJlz4pks7hVH2R6lAuSUNhFMjpAe8XGRZpwVGCuPOGbQyrg8i','tremendoloco@mail.com','04120228466','TremendoLocoLandia','1998-11-05','CLI','1','2018-11-21 02:26:31','2018-11-21 02:26:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-22 22:07:44
