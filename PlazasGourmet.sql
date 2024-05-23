CREATE DATABASE  IF NOT EXISTS `plazasgourmet` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `plazasgourmet`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: plazasgourmet
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(45) NOT NULL,
  `num_personas` int(5) NOT NULL,
  `codigo_reserva` varchar(45) NOT NULL,
  `id_restaurante` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_restaurante` (`id_restaurante`),
  CONSTRAINT `id_restaurante` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (16,'2024-05-19','23:27',6,'AmoCwEIi',13),(17,'2024-05-31','02:34',5,'uwAqW1qQ',13),(18,'2024-06-01','05:38',2,'jFTTyaG8',17);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurante`
--

DROP TABLE IF EXISTS `restaurante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurante` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `correo` varchar(75) NOT NULL,
  `contrasenya` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `tipo_cocina` varchar(45) NOT NULL,
  `mesas_totales` int(5) NOT NULL,
  `mesas_disponibles` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurante`
--

LOCK TABLES `restaurante` WRITE;
/*!40000 ALTER TABLE `restaurante` DISABLE KEYS */;
INSERT INTO `restaurante` VALUES (3,'restaurante1@example.com','contrasena1','La Parrilla','Calle Principal 123','Asador',30,20),(4,'restaurante2@example.com','contrasena2','La Trattoria','Avenida Central 456','Italianaa',25,20),(5,'restaurante3@example.com','contrasena3','Sushi Houseee','Calle de los Sabores 789','Japonesa',20,10),(6,'restaurante4@example.com','contrasena4','El Rinconcito','Plaza Mayor 101','Mexicana',35,25),(7,'restaurante5@example.com','contrasena5','Burger Barn','Avenida de los Hamburguesas 222','Fast Food',40,30),(8,'restaurante6@example.com','contrasena6','Pizzería Bella','Calle Italia 333','Pizza',28,18),(9,'restaurante7@example.com','contrasena7','Thai Spice','Calle del Sabor Exótico 444','Tailandesa',22,12),(10,'restaurante8@example.com','contrasena8','La Cantina','Calle de las Margaritas 555','Mexicana',30,20),(11,'restaurante9@example.com','contrasena9','Café Paris','Rue de la Croissant 666','Francesa',18,8),(12,'restaurante10@example.com','contrasena10','Seafood Cove','Avenida del Mar 777','Mariscos',25,15),(13,'restaurante11@example.com','contrasena11','El Fogón Argentino','Calle Buenos Aires 888','Argentina',35,27),(14,'restaurante12@example.com','contrasena12','The Green Garden','Green Street 999','Vegetariana',20,10),(15,'restaurante13@example.com','contrasena13','Ristorante Romano','Via della Pizza 111','Italiana',30,20),(16,'restaurante14@example.com','contrasena14','Sabor a Mar','Paseo del Puerto 222','Pescados',25,15),(17,'restaurante15@example.com','contrasena15','BBQ King','Avenida del Humo 333','Barbacoa',40,30),(18,'restaurante16@example.com','contrasena16','Café Vienna','Wiener Strasse 444','Cafetería',18,8),(19,'restaurante17@example.com','contrasena17','Wok Express','Calle del Wok 555','China',22,12),(20,'restaurante18@example.com','contrasena18','Taco Time','Avenida de los Tacos 666','Mexicana',30,20),(21,'restaurante19@example.com','contrasena19','Sushi Fusion','Rue du Sushi 777','Japonesa',28,18),(22,'restaurante20@example.com','contrasena20','La Cocina Criolla','Calle Criolla 888','Criolla',35,25);
/*!40000 ALTER TABLE `restaurante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-24  0:02:44
