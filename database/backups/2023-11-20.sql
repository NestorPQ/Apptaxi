CREATE DATABASE  IF NOT EXISTS `taxi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `taxi`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: taxi
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `alquileres`
--

DROP TABLE IF EXISTS `alquileres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alquileres` (
  `idalquiler` int NOT NULL AUTO_INCREMENT,
  `idformapago` int NOT NULL,
  `idvehiculo` int NOT NULL,
  `idusuario` int NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `precioalquiler` decimal(5,2) DEFAULT NULL,
  `kilometrajeini` int NOT NULL,
  `kilometrajefin` int DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idalquiler`),
  KEY `fk_idformapago_al` (`idformapago`),
  KEY `fk_idvehiculo_al` (`idvehiculo`),
  KEY `fk_idusuario_al` (`idusuario`),
  CONSTRAINT `fk_idformapago_al` FOREIGN KEY (`idformapago`) REFERENCES `formapagos` (`idformapago`),
  CONSTRAINT `fk_idusuario_al` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  CONSTRAINT `fk_idvehiculo_al` FOREIGN KEY (`idvehiculo`) REFERENCES `vehiculos` (`idvehiculo`),
  CONSTRAINT `chk_fechafin_al` CHECK ((`fechafin` >= `fechainicio`)),
  CONSTRAINT `chk_kilometrajefin` CHECK ((`kilometrajefin` > `kilometrajeini`))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquileres`
--

LOCK TABLES `alquileres` WRITE;
/*!40000 ALTER TABLE `alquileres` DISABLE KEYS */;
INSERT INTO `alquileres` VALUES (1,3,2,1,'vehículo devuelto tarde','2023-05-09','2023-11-16',50.00,100,100000,'2023-11-15 21:19:39',NULL,NULL),(2,3,3,11,'Vehiculo devuelto','2023-11-19','2023-11-30',250.00,1000,10000,'2023-11-18 21:09:56',NULL,NULL);
/*!40000 ALTER TABLE `alquileres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formapagos`
--

DROP TABLE IF EXISTS `formapagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formapagos` (
  `idformapago` int NOT NULL AUTO_INCREMENT,
  `formapago` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idformapago`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapagos`
--

LOCK TABLES `formapagos` WRITE;
/*!40000 ALTER TABLE `formapagos` DISABLE KEYS */;
INSERT INTO `formapagos` VALUES (1,'Yape','2023-11-15 21:19:17',NULL,NULL),(2,'Plin','2023-11-15 21:19:17',NULL,NULL),(3,'Transferencia','2023-11-15 21:19:17',NULL,NULL),(4,'Efectivo','2023-11-15 21:19:17',NULL,NULL),(5,'NuevaPago','2023-11-17 09:30:53',NULL,NULL);
/*!40000 ALTER TABLE `formapagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marcas` (
  `idmarca` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Toyota','2023-11-15 21:18:33',NULL,NULL),(2,'Hyundai','2023-11-15 21:18:33',NULL,NULL),(3,'Kia','2023-11-15 21:18:33',NULL,NULL),(4,'Chevrolet','2023-11-15 21:18:33',NULL,NULL),(5,'Nissan','2023-11-15 21:18:33',NULL,NULL),(6,'Suzuki','2023-11-15 21:18:33',NULL,NULL),(7,'Volkswagen','2023-11-15 21:18:33',NULL,NULL),(8,'Changan','2023-11-17 07:11:45',NULL,NULL),(9,'Subaru','2023-11-18 00:37:04',NULL,NULL);
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `avatar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` char(9) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `claveacceso` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `clavegenerada` char(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nivelacceso` char(4) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'USER',
  `estado` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_email_user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'','FK','Kiara','Kiara20@gmail.com','946989937','$2y$10$VTyMzUz8X3FOPkvR0/1rge8fDJe2TnBMcNRA/XWe7b2A9bTjITIdC',NULL,'ADMI','1','2023-11-15 21:19:00',NULL,NULL),(2,NULL,'Pomachahua','Nestor','1208003@senati.pe','987654321','$2y$10$taIHPpDe7e99IOzRMlaHAOXHd8GZzoQYtozDO4jBvLyVW8esnhezy',NULL,'ADMI','1','2023-11-15 22:13:16',NULL,NULL),(3,NULL,'Lopez Jimenez','Manuel','kamay51156@marksia.com','987567245','$2y$10$cvtJXZ5bh.dB9ivPwF5gSOE.kRDDTthBhZvWyZsodUdEJOSrtceQO',NULL,'USER','1','2023-11-15 22:17:52',NULL,NULL),(5,NULL,'De las nieves','María','kamay5346@marksia.com','987543267','$2y$10$l2P8PIpdI58vSyk52pLuKu6lG43bpMfzYfom8nlTMKU3rw4vRt7L.',NULL,'USER','1','2023-11-15 22:23:07',NULL,NULL),(6,NULL,'Ortiz','Beto','kamay16241656@marksia.com','987678976','$2y$10$mvswPtOX1VM6wBGBTVBZYexqjHLAzEeAznwC1ONXHAE0mTwtGcX4.',NULL,'USER','1','2023-11-15 22:24:51',NULL,NULL),(7,NULL,'Cahuama','Rosa','kaagsdga156@marksia.com','395637546','$2y$10$cAQVSj6clrlvpf2dKqTuzO9gQArICFlYmnXFiJ/8C6wSPFHalYPXa',NULL,'USER','1','2023-11-15 22:28:32',NULL,NULL),(8,NULL,'Bolaños','Roberto','kamay51156@ktm.com','956773542','$2y$10$xdiOCjq7ASYjjnZbN3XmM.PpYJSvbLGa96eOm.57dSafn4Rg9MN7O',NULL,'USER','1','2023-11-15 22:29:23',NULL,NULL),(9,NULL,'Quiroz','Antony','markantony21@senati.pe','946752345','$2y$10$T2NGfMDvyuH08ZIMDjHesum3npgfGBlHV.JkE0RWweApuITJase2u',NULL,'USER','1','2023-11-15 22:31:28',NULL,NULL),(10,NULL,'Mendieta','Juana','juanitaperz@gmail.com','923627834','$2y$10$AMKtI56CmXiqddqAPR0a/OLlCQ57NdSeJX3dPZ5DOdNa7IUGbIJMW',NULL,'USER','1','2023-11-15 22:33:03',NULL,NULL),(11,NULL,'Martinez Napa','Ruben','rube18@hotmail.com','965462934','$2y$10$q2VMUck73SCUItOf4ZEacuXoE.Q3lKQETSkCXs/nMABdNX9TYB1/u',NULL,'USER','1','2023-11-15 22:34:56',NULL,'2023-11-20 09:59:55');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculos` (
  `idvehiculo` int NOT NULL AUTO_INCREMENT,
  `idmarca` int NOT NULL,
  `tipo` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `placa` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `costo_alquiler` decimal(5,2) NOT NULL,
  `tipocombustible` char(9) COLLATE utf8mb4_general_ci NOT NULL,
  `año` char(4) COLLATE utf8mb4_general_ci NOT NULL,
  `fotografia` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  `kilometraje` int DEFAULT '1000',
  PRIMARY KEY (`idvehiculo`),
  UNIQUE KEY `uk_placa_veh` (`placa`),
  KEY `fk_idmarca_veh` (`idmarca`),
  CONSTRAINT `fk_idmarca_veh` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,1,'Minivan Toyota Avanza','ABD-123','Rojo',150.00,'Gasolina','1999',NULL,'2023-11-15 21:18:37',NULL,NULL,1000),(2,2,'Hatchback','158-9YA','Negro',50.00,'Gas','2002','ad.jpg','2023-11-15 21:18:37',NULL,NULL,1000),(3,3,'Picanto','153-ABC','Plomo',250.00,'Gasolina','2007','abc.jpg','2023-11-15 21:18:37',NULL,NULL,1000),(4,1,'pickup','7896-FG','blanco',20.00,'gasolina','1995',NULL,'2023-11-16 10:37:16',NULL,NULL,1000),(15,1,'camioneta','5HJK-53','rojo',100.00,'gasol','2010',NULL,'2023-11-17 14:12:16',NULL,NULL,1000),(17,4,'camioneta','5gJK-53','rojo',100.00,'gasol','2010',NULL,'2023-11-17 14:24:29',NULL,NULL,1000),(19,6,'sedan urban','2345-JK','Plateado',40.00,'diesel','2010',NULL,'2023-11-17 14:41:16',NULL,NULL,1000),(21,4,'Frontier','2355-JK','Blanco',50.00,'Diesel','2000',NULL,'2023-11-18 11:39:11',NULL,NULL,1000),(22,4,'Captiva','ABD-987','Plateado',100.00,'Nuclear','2011',NULL,'2023-11-19 12:40:01',NULL,NULL,1000);
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vs_vehiculos_marcas`
--

DROP TABLE IF EXISTS `vs_vehiculos_marcas`;
/*!50001 DROP VIEW IF EXISTS `vs_vehiculos_marcas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_vehiculos_marcas` AS SELECT 
 1 AS `idvehiculo`,
 1 AS `idmarca`,
 1 AS `marca`,
 1 AS `tipo`,
 1 AS `placa`,
 1 AS `color`,
 1 AS `costo_alquiler`,
 1 AS `tipocombustible`,
 1 AS `año`,
 1 AS `fotografia`,
 1 AS `create_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'taxi'
--

--
-- Dumping routines for database 'taxi'
--
/*!50003 DROP PROCEDURE IF EXISTS `CambiarClaveAcceso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambiarClaveAcceso`(IN correoUsuario VARCHAR(255), IN nuevaClave VARCHAR(255))
BEGIN
    UPDATE usuarios
    SET claveacceso = nuevaClave
    WHERE email = correoUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `generarClave` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `generarClave`(IN correoUsuario VARCHAR(255), IN _clavegenerada VARCHAR(6))
BEGIN
    UPDATE usuarios
    SET clavegenerada = _clavegenerada
    WHERE email = correoUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ObtenerCantidadAlquileresPorMes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCantidadAlquileresPorMes`()
BEGIN
    SELECT 
        CASE 
            WHEN MONTH(fechainicio) = 1 THEN 'Enero'
            WHEN MONTH(fechainicio) = 2 THEN 'Febrero'
            WHEN MONTH(fechainicio) = 3 THEN 'Marzo'
            WHEN MONTH(fechainicio) = 4 THEN 'Abril'
            WHEN MONTH(fechainicio) = 5 THEN 'Mayo'
            WHEN MONTH(fechainicio) = 6 THEN 'Junio'
            WHEN MONTH(fechainicio) = 7 THEN 'Julio'
            WHEN MONTH(fechainicio) = 8 THEN 'Agosto'
            WHEN MONTH(fechainicio) = 9 THEN 'Septiembre'
            WHEN MONTH(fechainicio) = 10 THEN 'Octubre'
            WHEN MONTH(fechainicio) = 11 THEN 'Noviembre'
            WHEN MONTH(fechainicio) = 12 THEN 'Diciembre'
        END AS nombre_mes,
        COUNT(*) AS cantidad_alquileres
    FROM alquileres
    GROUP BY MONTH(fechainicio)
    ORDER BY fechainicio DESC
    LIMIT 6;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ObtenerCantidadVehiculosPorMarca` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCantidadVehiculosPorMarca`()
BEGIN
    SELECT m.marca, COUNT(v.idvehiculo) AS cantidad_vehiculos
    FROM marcas m
    LEFT JOIN vehiculos v ON m.idmarca = v.idmarca
    WHERE v.inactive_at IS NULL
    GROUP BY m.marca;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ResetearClaveGenerada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ResetearClaveGenerada`(IN correoUsuario VARCHAR(255))
BEGIN
    UPDATE usuarios
    SET clavegenerada = NULL
    WHERE email = correoUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_alquileres_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_alquileres_listar`()
BEGIN
	SELECT 
    ALQ.idalquiler,
    VEH.tipo,
	PAG.formapago,
    VEH.placa,
    USU.apellidos,
    USU.nombres,
    USU.email,
    ALQ.descripcion,
    ALQ.fechainicio,
    ALQ.fechafin,
    ALQ.precioalquiler
    FROM alquileres ALQ
    INNER JOIN formapagos PAG ON PAG.idformapago = ALQ.idformapago
    INNER JOIN vehiculos VEH ON VEH.idvehiculo = ALQ.idvehiculo
    INNER JOIN usuarios USU ON USU.idusuario = ALQ.idusuario
    WHERE ALQ.inactive_at IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_alquileres_registrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_alquileres_registrar`(
	IN _idformapago 		INT,
    IN _idvehiculo			INT,
    IN _idusuario			INT,   
    IN _fechainicio			DATE,
    IN _fechafin 			DATE,
    IN _precio_alquiler		DECIMAL(5,2),
    IN _kilometrajeini		INT
)
BEGIN
	INSERT INTO alquileres 
		(idformapago, idvehiculo, idusuario, fechainicio, fechafin, precioalquiler, kilometrajeini)
	VALUES
		(_idformapago, _idvehiculo, _idusuario, _fechainicio, _fechafin, _precio_alquiler, _kilometrajeini);
	
    SELECT @@last_insert_id 'idalquiler';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_alquiler_devolucion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_alquiler_devolucion`(
	IN p_idalquiler INT,
    IN p_descripcion VARCHAR(255),
    IN p_kilometrajefin INT
 )
BEGIN 
	UPDATE alquileres
    SET 
		inactive_at = NOW(),
		descripcion = p_descripcion,
        kilometrajefin = p_kilometrajefin
    WHERE idalquiler = p_idalquiler;
    select "vehiculo devuelto correctamente" as mensaje;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_buscar_email` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_buscar_email`(IN _email VARCHAR(50))
BEGIN
    SELECT 
    idusuario,
    apellidos, 
    nombres,
    email,
    telefono,
    clavegenerada
    FROM usuarios
    WHERE email = _email OR telefono = _email;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_filtrar_vehiculos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_filtrar_vehiculos`(IN _idvehiculo INT)
BEGIN
	SELECT 
		VEH.idvehiculo,
        MAR.idmarca,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idvehiculo
        WHERE idvehiculo = _idvehiculo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_formapagos_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_formapagos_listar`()
BEGIN
	SELECT idformapago, formapago FROM formapagos
	WHERE inactive_at IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_formapagos_registrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_formapagos_registrar`(
	IN _formapago 	VARCHAR(30)
)
BEGIN
	INSERT INTO formapagos (formapago) VALUES (_formapago);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_marcas_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_marcas_listar`()
BEGIN
	SELECT idmarca, marca FROM marcas
	WHERE inactive_at IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_marcas_registrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_marcas_registrar`(
	IN _marca 	VARCHAR(50)
)
BEGIN
	INSERT INTO marcas (marca) VALUES (_marca);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_total_información` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_total_información`()
BEGIN
	declare total_usuarios int;
    declare total_vehiculos int;
    declare total_formas_pago int;
    declare total_marcas int;
    declare total_alquileres int;

	select count(*) into total_usuarios from usuarios where inactive_at is null;
    select count(*) into total_vehiculos from vehiculos where inactive_at is null;
    select count(*) into total_marcas from marcas where inactive_at is null;
    select count(*) into total_formas_pago from formapagos where inactive_at is null;
    select count(*) into total_alquileres from alquileres where inactive_at is null;
    
    select total_usuarios, total_vehiculos, total_formas_pago, total_marcas, total_alquileres;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_usuarios_actualizar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_actualizar`(
	IN _idusuario			INT,
    IN _claveacceso			VARCHAR(100)
)
BEGIN
	UPDATE usuarios SET 
		claveacceso = _claveacceso,
        update_at = NOW()
    WHERE idusuario = _idusuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_usuarios_clavegenerada_registrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_clavegenerada_registrar`(
	IN _idusuario				INT,
    IN _email					VARCHAR(50),
    IN _clavegenerada			CHAR(6)
)
BEGIN
	UPDATE usuarios
    SET 
		clavegenerada =  _clavegenerada,
        estado = '0'
    WHERE idusuario = _idusuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_usuarios_clavegenerada_validar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_clavegenerada_validar`(
	IN _idusuario INT, 
    IN _clavegenerada CHAR(6)
)
BEGIN
    -- Verificar si el estado es '0' y si la clave generada coincide
    IF EXISTS (
		SELECT 1 FROM usuarios 
        WHERE idusuario = _idusuario 
        AND estado = '0' 
        AND clavegenerada = _clavegenerada
        ) 
        THEN
        -- Actualizar el estado a '1' sin cambiar la clavegenerada
        UPDATE usuarios
			SET estado = '1'
        WHERE idusuario = _idusuario;
			SELECT 'PERMITIDO' AS 'status';
    ELSE
        SELECT 'DENEGADO' AS 'status';
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_usuarios_estado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_estado`()
begin 
	select 
		nombres,
        apellidos,
        telefono,
        email,
        nivelacceso,
        case when inactive_at is null then 'ACTIVO'
        else 'INACTIVO' 
        end as 'user_estado'
	from taxi.usuarios;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_usuarios_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_listar`()
BEGIN 
	select 
	idusuario,
    avatar,
    apellidos,
    nombres,
    email,
    telefono,
    nivelacceso
 from usuarios
 where inactive_at is null;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_usuarios_login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_login`(IN _email VARCHAR(50))
BEGIN
	SELECT
		idusuario,
        USU.apellidos,
        USU.nombres,
        USU.email,
        USU.claveacceso,
        USU.nivelacceso
        FROM usuarios USU
        WHERE 	email = _email AND
		inactive_at IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_vehiculos_buscar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_vehiculos_buscar`(IN _idvehiculo INT)
BEGIN
	SELECT
		VEH.idvehiculo,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
        WHERE VEH.idvehiculo = _idvehiculo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_vehiculos_eliminar_logico` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_vehiculos_eliminar_logico`(
    IN _idvehiculo INT
)
BEGIN
	UPDATE vehiculos SET inactive_at = NOW() WHERE idvehiculo = _idvehiculo;
	SELECT 'registro del vehiculo eliminado' AS mensaje;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_vehiculos_filtrar_marcas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_vehiculos_filtrar_marcas`(IN _idmarca INT)
BEGIN
	IF _idmarca = -1 THEN
		SELECT * FROM vs_vehiculos_marcas ORDER BY create_at;
	ELSE
		SELECT * FROM vs_vehiculos_marcas WHERE idmarca = _idmarca ORDER BY create_at;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_vehiculos_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_vehiculos_listar`()
BEGIN
	SELECT
		VEH.idvehiculo,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia,
        VEH.kilometraje
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
        WHERE VEH.inactive_at IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_vehiculos_listar_catalogo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_vehiculos_listar_catalogo`()
BEGIN
	SELECT
		VEH.idvehiculo,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
        WHERE VEH.inactive_at IS NULL
        limit 8;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spu_vehiculos_registrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_vehiculos_registrar`(
	IN 	_idmarca			INT,
    IN 	_tipo				VARCHAR(40),
    IN 	_placa				VARCHAR(7),
    IN 	_color				VARCHAR(30),
    IN _costo_alquiler		DECIMAL(5,2),
    IN _tipocombustible		CHAR(9),
    IN _año					CHAR(4),
    IN _fotografia			VARCHAR(100)
)
BEGIN
	INSERT INTO vehiculos
		(idmarca, tipo, placa, color, costo_alquiler, tipocombustible, año, fotografia)
        VALUES
        (_idmarca, _tipo, _placa, _color, _costo_alquiler, _tipocombustible, _año, NULLIF(_fotografia, ''));
        
        SELECT @@last_insert_id 'idvehiculo';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_formapagos_eliminar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_formapagos_eliminar`(IN id_forma_pago INT)
BEGIN
    UPDATE formapagos
    SET inactive_at = NOW()
    WHERE idformapago = id_forma_pago;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_marcas_eliminar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_marcas_eliminar`(
	in marca_id INT
)
BEGIN 
	UPDATE marcas
		SET inactive_at = NOW()
        WHERE idmarca = marca_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrar_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_usuario`(
    IN pApellidos VARCHAR(50),
    IN pNombres VARCHAR(50),
    IN pEmail VARCHAR(50),
    IN pTelefono CHAR(9),
    IN pClaveAcceso VARCHAR(100)
)
BEGIN
    INSERT INTO usuarios (
        apellidos,
        nombres,
        email,
        telefono,
        claveacceso
    )
    VALUES (
		pApellidos,
        pNombres,
        pEmail,
        pTelefono,
        pClaveAcceso
    );
    SELECT 'true' AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vs_vehiculos_marcas`
--

/*!50001 DROP VIEW IF EXISTS `vs_vehiculos_marcas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_vehiculos_marcas` AS select `veh`.`idvehiculo` AS `idvehiculo`,`veh`.`idmarca` AS `idmarca`,`mar`.`marca` AS `marca`,`veh`.`tipo` AS `tipo`,`veh`.`placa` AS `placa`,`veh`.`color` AS `color`,`veh`.`costo_alquiler` AS `costo_alquiler`,`veh`.`tipocombustible` AS `tipocombustible`,`veh`.`año` AS `año`,`veh`.`fotografia` AS `fotografia`,`veh`.`create_at` AS `create_at` from (`vehiculos` `veh` join `marcas` `mar` on((`mar`.`idmarca` = `veh`.`idmarca`))) where (`veh`.`inactive_at` is null) */;
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

-- Dump completed on 2023-11-20 10:57:37
