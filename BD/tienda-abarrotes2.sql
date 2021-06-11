-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tienda_pedidos
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `dni` int NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `num_celular` int NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'marco','1234','usuario','marcos ','linares',76341526,'jr. ayacucgo 153',956823142),(2,'dani','12345','usuario','daniela','lopez',22422565,'jr. san martin 1453',955256310),(3,'admin','admin','admin','moises','jara',75204302,'jr. hjorge chavez',960032558);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `idcliente_clientes` int NOT NULL,
  `idproducto_productos` int NOT NULL,
  `fecha_pedido` date NOT NULL,
  `cantidad_producto` int NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_pedido_productos_idx` (`idproducto_productos`),
  KEY `fk_pedido_clientes_idx` (`idcliente_clientes`),
  CONSTRAINT `fk_pedido_clientes` FOREIGN KEY (`idcliente_clientes`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `fk_pedido_productos` FOREIGN KEY (`idproducto_productos`) REFERENCES `productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (4,1,13,'2021-05-07',4,19.16),(5,1,12,'2021-05-07',1,19.60),(6,2,1,'2021-05-08',2,40.20),(8,2,20,'2021-05-08',4,5.16),(9,2,19,'2021-05-08',3,24.87),(10,2,6,'2021-05-08',4,34.40);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_tipo_productos` int NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `img` text,
  PRIMARY KEY (`id_producto`),
  KEY `fk_productos_tproducto_idx` (`id_tipo_productos`),
  CONSTRAINT `fk_productos_tproducto` FOREIGN KEY (`id_tipo_productos`) REFERENCES `tipoproducto` (`id_Tproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,'Arroz Extra FARAON Bolsa 5kg',20.10,'faraon5k.jpg'),(2,1,'Arroz Extra BELL\'S Bolsa 5Kg',15.90,'faraon5k.jpg'),(3,1,'Arroz Extra COSTEÑO Bolsa 750g',3.59,'faraon5k.jpg'),(4,1,'Arroz Integral COSTEÑO Bolsa 750g',4.30,'faraon5k.jpg'),(5,2,'Aceite Vegetal PRIMOR Premium 1L',9.19,'faraon5k.jpg'),(6,2,'Aceite de Girasol SAO Botella 1L',8.60,'faraon5k.jpg'),(7,2,'Aceite Vegetal BELL\'S Botella 900ml',5.69,'faraon5k.jpg'),(8,2,'Aceite de Maíz FLORIDA Botella 1L',11.90,'faraon5k.jpg'),(9,3,'Azúcar Rubia BELL\'S Bolsa 1Kg',3.00,'faraon5k.jpg'),(10,3,'Azúcar Rubia CASA GRANDE Bolsa 1Kg',3.30,'faraon5k.jpg'),(11,3,'Azúcar Rubia COSTEÑO Bolsa 1Kg',3.80,'faraon5k.jpg'),(12,3,'Edulcorante BELL\'S Caja 100und',19.60,'faraon5k.jpg'),(13,4,'Trozos de Atún PRIMOR  Lata ',4.79,NULL),(14,4,'Filete de Atún FLORIDA en Aceite de Girasol ',5.49,NULL),(15,4,'Piña en Trozos BELL\'S Lata 567g',5.50,NULL),(16,4,'Aceituna Verde con Rocoto HUERTO MEJÍA',6.90,NULL),(17,5,'Spaghetti DON VITTORIO Bolsa 1Kg',3.89,NULL),(18,5,'Salsa Roja DON VITTORIO Doypack 400g',3.99,NULL),(19,5,'Crema Huancaína ALACENA Doypack 400g',8.29,NULL),(20,5,'Fideos Munición MOLITALIA Bolsa 250g',1.29,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoproducto` (
  `id_Tproducto` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Tproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (1,'arroz'),(2,'aceite'),(3,'azucar y endulzante'),(4,'conservas'),(5,'fideos y pastas'),(6,'menestras'),(7,'galletas y golosinas'),(8,'chocolateria'),(9,'snacks y piqueos'),(10,'salsas y  condimentos');
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_clientetotalcompra`
--

DROP TABLE IF EXISTS `vw_clientetotalcompra`;
/*!50001 DROP VIEW IF EXISTS `vw_clientetotalcompra`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_clientetotalcompra` AS SELECT 
 1 AS `Cliente`,
 1 AS `dni`,
 1 AS `fecha_pedido`,
 1 AS `total compra`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_clientetotalcompra`
--

/*!50001 DROP VIEW IF EXISTS `vw_clientetotalcompra`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_clientetotalcompra` AS select concat(`c`.`nombres`,' ',`c`.`apellidos`) AS `Cliente`,`c`.`dni` AS `dni`,`p`.`fecha_pedido` AS `fecha_pedido`,sum(`p`.`precio_total`) AS `total compra` from (((`clientes` `c` join `pedido` `p` on((`c`.`id_cliente` = `p`.`idcliente_clientes`))) join `productos` `pro` on((`p`.`idproducto_productos` = `pro`.`id_producto`))) join `tipoproducto` `tp` on((`pro`.`id_tipo_productos` = `tp`.`id_Tproducto`))) where (`c`.`id_cliente` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-02 23:32:42
