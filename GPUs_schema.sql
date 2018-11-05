CREATE DATABASE  IF NOT EXISTS `GPUs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `GPUs`;
-- MySQL dump 10.13  Distrib 8.0.13, for Linux (x86_64)
--
-- Host: localhost    Database: GPUs
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Marca`
--

DROP TABLE IF EXISTS `Marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Marca` (
  `idMarca` int(10) unsigned NOT NULL,
  `nombre_marca` varchar(45) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marca`
--

LOCK TABLES `Marca` WRITE;
/*!40000 ALTER TABLE `Marca` DISABLE KEYS */;
INSERT INTO `Marca` VALUES (1,'Nvidia'),(2,'AMD');
/*!40000 ALTER TABLE `Marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tarjetas_de_Video`
--

DROP TABLE IF EXISTS `Tarjetas_de_Video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Tarjetas_de_Video` (
  `id_Tarjetas_de_Video` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(45) NOT NULL,
  `Procesador_grafico` varchar(15) NOT NULL,
  `Numero_ventiladores` tinyint(4) NOT NULL,
  `Cores` int(11) NOT NULL,
  `Tipo_memoria` varchar(10) NOT NULL,
  `Marca_idMarca` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Tarjetas_de_Video`,`Marca_idMarca`),
  KEY `fk_Tarjetas_de_Video_Marca_idx` (`Marca_idMarca`),
  CONSTRAINT `fk_Tarjetas_de_Video_Marca` FOREIGN KEY (`Marca_idMarca`) REFERENCES `Marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tarjetas_de_Video`
--

LOCK TABLES `Tarjetas_de_Video` WRITE;
/*!40000 ALTER TABLE `Tarjetas_de_Video` DISABLE KEYS */;
INSERT INTO `Tarjetas_de_Video` VALUES (1,'GeForce GTX 1080 Ti','GP102',1,3584,'GDDR5X',1),(2,'GTX 1060','GP105',1,1280,'GDDR5',1),(3,'Radeon RX 580','Polaris 20',2,2304,'GDDR5',2),(4,'RTX 2080 Ti','TU102',2,4352,'GDDR6',1),(5,'Radeon RX 570','Polaris 20',2,2048,'GDDR5',2),(6,'Radeon RX 590','Polaris 30',2,2304,'GDDR5',2),(7,'Radeon RX Vega 64','Vega 10',1,4096,'HBM2',2),(8,'RTX 2060','TU116',2,1536,'GDDR6',1),(9,'RTX 2070','TU106',2,2304,'GDDR6',1),(10,'RTX 2080','TU104',2,2944,'GDDR6',1),(11,'GTX 1070','GP104',1,1920,'GDDR5',1),(12,'GTX 1080','GP104',1,2560,'GDDR5X',1);
/*!40000 ALTER TABLE `Tarjetas_de_Video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `idusuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'vaguito@dummy.net','CA2768C06D203D9D381F0D520822680F');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-04 22:49:18
