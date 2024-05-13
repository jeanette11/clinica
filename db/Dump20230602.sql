-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_citas
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
-- Table structure for table `ins_area`
--

DROP TABLE IF EXISTS `ins_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_area` (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `area` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_area`
--

LOCK TABLES `ins_area` WRITE;
/*!40000 ALTER TABLE `ins_area` DISABLE KEYS */;
INSERT INTO `ins_area` VALUES (1,'Sistemas','Área de soporte al sistema ',NULL,NULL,NULL,NULL,'A'),(2,'Gerencia','Área encargada de toma de decisiones',NULL,NULL,NULL,NULL,'A'),(3,'Administración','Área encargada de la administración de la empresa',NULL,NULL,NULL,NULL,'A'),(4,'Contabilidad','Área encargada de la economía de la empresa',NULL,NULL,NULL,NULL,'A'),(5,'Marketing','Área encargada de la publicidad e imagen de la empresa',NULL,NULL,NULL,NULL,'A'),(6,'Fisioterapia','Área encargada para brindar fisioterapia a los pacientes',NULL,NULL,NULL,NULL,'A'),(7,'Evaluaciones','Evaluaciones Kinésicas',NULL,NULL,'2023-05-24 11:23:20',1,'A'),(8,'Enfermería','Área encargada de los primeros cuidados del paciente',NULL,NULL,NULL,NULL,'A');
/*!40000 ALTER TABLE `ins_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_consultorios`
--

DROP TABLE IF EXISTS `ins_consultorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_consultorios` (
  `id_consultorio` int NOT NULL AUTO_INCREMENT,
  `especialidad_id` int NOT NULL,
  `consultorio` varchar(50) NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_consultorio`),
  KEY `id_especialidad_idx` (`especialidad_id`),
  CONSTRAINT `id_especialidad` FOREIGN KEY (`especialidad_id`) REFERENCES `ins_especialidades` (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_consultorios`
--

LOCK TABLES `ins_consultorios` WRITE;
/*!40000 ALTER TABLE `ins_consultorios` DISABLE KEYS */;
INSERT INTO `ins_consultorios` VALUES (1,1,'Evaluaciones - 1','2023-04-05 09:44:00',1,'2023-05-26 09:24:47',1,'A'),(2,2,'Reevaluaciones 1','2023-04-05 10:29:31',1,'2023-05-26 09:18:27',1,'A'),(3,3,'Consultorio UTA -1','2023-04-05 10:56:18',1,'2023-04-05 11:31:04',1,'A'),(4,4,'Consultorio URI - 1','2023-04-05 11:30:57',1,NULL,NULL,'A'),(5,1,'Evaluaciones 2','2023-05-16 09:00:24',1,NULL,NULL,'A'),(6,3,'UTA 2','2023-05-22 13:49:36',1,NULL,NULL,'A');
/*!40000 ALTER TABLE `ins_consultorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_especialidades`
--

DROP TABLE IF EXISTS `ins_especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_especialidades` (
  `id_especialidad` int NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_especialidades`
--

LOCK TABLES `ins_especialidades` WRITE;
/*!40000 ALTER TABLE `ins_especialidades` DISABLE KEYS */;
INSERT INTO `ins_especialidades` VALUES (1,'Evaluaciones','Evaluaciones a pacientes','2023-04-04 00:00:00',1,'2023-04-04 16:08:39',1,'A'),(2,'Reevaluaciones3','Reevaluaciones a pacientes','2023-04-04 00:00:00',1,'2023-05-24 16:11:40',1,'A'),(3,'UTA','Unidad de Terapia Acuática','2023-04-05 11:06:31',1,NULL,NULL,'A'),(4,'URI','Unidad de Rehabilitación','2023-04-05 11:30:32',1,NULL,NULL,'A'),(5,'Nutrición','Seguimiento de la nutrición de los pacientes','2023-04-05 11:48:46',1,NULL,NULL,'A');
/*!40000 ALTER TABLE `ins_especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_his_anamnesis`
--

DROP TABLE IF EXISTS `ins_his_anamnesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_his_anamnesis` (
  `id_his_anam` int NOT NULL AUTO_INCREMENT,
  `his_id` int NOT NULL,
  `paciente_id` int NOT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `diagnostico` varchar(50) DEFAULT NULL,
  `motivo_consulta` varchar(200) DEFAULT NULL,
  `nro_embarazos` int DEFAULT NULL,
  `edad_madre_en_emb` int DEFAULT NULL,
  `hosp_nacimiento` varchar(20) DEFAULT NULL,
  `est_nutricional` varchar(50) DEFAULT NULL,
  `est_emocional` varchar(50) DEFAULT NULL,
  `ctrl_prenatal` enum('S','N') DEFAULT NULL,
  `compli_emb` enum('S','N') DEFAULT NULL,
  `especific` varchar(50) DEFAULT NULL,
  `trau_emb` enum('S','N') DEFAULT NULL,
  `especift` varchar(50) DEFAULT NULL,
  `nro_sem_ges` int DEFAULT NULL,
  `hras_trab_parto` int DEFAULT NULL,
  `parto` enum('Normal','Cesárea') NOT NULL DEFAULT 'Normal',
  `lactancia` enum('S','N') DEFAULT NULL,
  `alimentacion` varchar(10) DEFAULT NULL,
  `apgar` varchar(10) DEFAULT NULL,
  `patologicos` enum('S','N') DEFAULT NULL,
  `desc_pat` varchar(10) DEFAULT NULL,
  `alergicos` enum('S','N') DEFAULT NULL,
  `desc_aler` varchar(10) DEFAULT NULL,
  `traumaticos` enum('S','N') DEFAULT NULL,
  `desc_tra` varchar(10) DEFAULT NULL,
  `quirurgicos` enum('S','N') DEFAULT NULL,
  `desc_quir` varchar(10) DEFAULT NULL,
  `hospitalarios` enum('S','N') DEFAULT NULL,
  `desc_hosp` varchar(10) DEFAULT NULL,
  `farmacos` enum('S','N') DEFAULT NULL,
  `desc_far` varchar(10) DEFAULT NULL,
  `diabetes` enum('S','N') DEFAULT NULL,
  `cancer` enum('S','N') DEFAULT NULL,
  `hipertension` enum('S','N') DEFAULT NULL,
  `cardiovascular` enum('S','N') DEFAULT NULL,
  `asma` enum('S','N') DEFAULT NULL,
  `trombo_venosa` enum('S','N') DEFAULT NULL,
  `congenitos` enum('S','N') DEFAULT NULL,
  `Epilepsia` enum('S','N') DEFAULT NULL,
  `tuberculosis` enum('S','N') DEFAULT NULL,
  `tabaquismo` enum('S','N') DEFAULT NULL,
  `alcoholismo` enum('S','N') DEFAULT NULL,
  `otra_enfermedad` varchar(10) DEFAULT NULL,
  `ocup_padre` varchar(10) DEFAULT NULL,
  `ocup_madre` varchar(10) DEFAULT NULL,
  `ocup_tutor` varchar(10) DEFAULT NULL,
  `cuidador_niño` varchar(10) DEFAULT NULL,
  `tipo_vivienda` enum('Casa','Departamento','Habitación') DEFAULT NULL,
  `electricidad` enum('S','N') DEFAULT NULL,
  `alcantarillado` enum('S','N') DEFAULT NULL,
  `telefono` enum('S','N') DEFAULT NULL,
  `agua_potable` enum('S','N') DEFAULT NULL,
  `user_id_reg` int DEFAULT NULL,
  `f_reg` datetime DEFAULT NULL,
  `user_id_mod` int DEFAULT NULL,
  `f_mod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_his_anam`),
  KEY `his_id` (`his_id`),
  KEY `ins_his_anamnesis_ibfk_1_idx` (`paciente_id`),
  CONSTRAINT `ins_his_anamnesis_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `ins_paciente` (`id_paciente`),
  CONSTRAINT `ins_his_anamnesis_ibfk_2` FOREIGN KEY (`his_id`) REFERENCES `ins_historial` (`id_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_his_anamnesis`
--

LOCK TABLES `ins_his_anamnesis` WRITE;
/*!40000 ALTER TABLE `ins_his_anamnesis` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_his_anamnesis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_his_datos_pediatrico`
--

DROP TABLE IF EXISTS `ins_his_datos_pediatrico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_his_datos_pediatrico` (
  `id_his_dp` int NOT NULL AUTO_INCREMENT,
  `his_id` int NOT NULL,
  `paciente_id` int NOT NULL,
  `fecha_eva` date DEFAULT NULL,
  `edad_cronologica` varchar(20) DEFAULT NULL,
  `edad_motora` varchar(20) DEFAULT NULL,
  `referencia` enum('Facebook','Familiar','Profesional') DEFAULT NULL,
  `per_salud_id_reg` int DEFAULT NULL,
  `f_reg` datetime DEFAULT NULL,
  `per_salud_id_mod` int DEFAULT NULL,
  `f_mod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_his_dp`),
  KEY `his_id` (`his_id`),
  KEY `ins_his_datos_pediatrico_ibfk_1_idx` (`paciente_id`),
  CONSTRAINT `ins_his_datos_pediatrico_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `ins_paciente` (`id_paciente`),
  CONSTRAINT `ins_his_datos_pediatrico_ibfk_2` FOREIGN KEY (`his_id`) REFERENCES `ins_historial` (`id_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_his_datos_pediatrico`
--

LOCK TABLES `ins_his_datos_pediatrico` WRITE;
/*!40000 ALTER TABLE `ins_his_datos_pediatrico` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_his_datos_pediatrico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_historial`
--

DROP TABLE IF EXISTS `ins_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_historial` (
  `id_hist` int NOT NULL AUTO_INCREMENT,
  `tipo_his_id` int NOT NULL,
  `paciente_id` int NOT NULL,
  `doctor_id` int NOT NULL,
  `f_reg` date NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_hist`),
  KEY `tipo_his_id` (`tipo_his_id`),
  KEY `ins_historial_ibfk_2_idx` (`paciente_id`),
  CONSTRAINT `ins_historial_ibfk_2` FOREIGN KEY (`tipo_his_id`) REFERENCES `ins_tipo_historial` (`id_tipo_his`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_historial`
--

LOCK TABLES `ins_historial` WRITE;
/*!40000 ALTER TABLE `ins_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_horarios`
--

DROP TABLE IF EXISTS `ins_horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_horarios` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `consultorio_id` int NOT NULL,
  `user_id` int NOT NULL,
  `horario` varchar(30) NOT NULL,
  `dia` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `user_reg` int NOT NULL,
  `fecha_mod` datetime NOT NULL,
  `user_mod` int NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_horario`),
  KEY `consultorio_id` (`consultorio_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `ins_horarios_ibfk_1` FOREIGN KEY (`consultorio_id`) REFERENCES `ins_consultorios` (`id_consultorio`),
  CONSTRAINT `ins_horarios_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `ins_usuarios` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_horarios`
--

LOCK TABLES `ins_horarios` WRITE;
/*!40000 ALTER TABLE `ins_horarios` DISABLE KEYS */;
INSERT INTO `ins_horarios` VALUES (1,1,2,'Lunes Eva 8-10','Lunes','08:00:00','10:00:00','2023-04-25 12:03:04',1,'2023-05-09 10:59:31',1,'A'),(2,1,2,'Lunes Eva 10-12','Lunes','10:00:00','12:00:00','2023-04-25 15:55:46',1,'2023-05-09 10:59:52',1,'A'),(3,1,2,'Lunes Eva 14-16','Lunes','14:00:00','16:00:00','2023-04-25 15:56:43',1,'2023-05-09 11:01:00',1,'A'),(4,1,2,'Lunes Eva 16-18','Lunes','16:00:00','18:00:00','2023-04-25 15:57:07',1,'2023-05-09 11:01:17',1,'A'),(5,1,2,'Martes Eva 8-10','Martes','08:00:00','10:00:00','2023-04-25 15:57:42',1,'2023-05-09 09:31:46',1,'A'),(6,1,2,'Martes Eva 10-12','Martes','10:00:00','12:00:00','2023-04-25 15:58:19',1,'2023-05-09 09:32:02',1,'A'),(7,1,2,'Lunes Eva 12-14','Lunes','12:00:00','14:00:00','2023-05-05 11:01:21',1,'2023-05-09 11:00:46',1,'A'),(8,1,2,'Martes Eva 14-16','Martes','14:00:00','16:00:00','2023-05-09 09:32:31',1,'0000-00-00 00:00:00',0,'A'),(9,1,2,'Martes Eva 16-18','Martes','16:00:00','18:00:00','2023-05-09 09:33:15',1,'2023-05-12 16:18:58',1,'A'),(10,1,2,'Martes Eva 12-14','Martes','12:00:00','14:00:00','2023-05-12 16:18:45',1,'0000-00-00 00:00:00',0,'A'),(11,1,2,'Miércoles Eva 8-10','Miércoles','08:00:00','10:00:00','2023-05-12 16:19:37',1,'2023-05-16 11:14:24',1,'A'),(12,1,2,'Miércoles Eva 10-12','Miércoles','10:00:00','12:00:00','2023-05-12 16:20:01',1,'2023-05-16 11:14:49',1,'A'),(13,1,2,'Miércoles Eva 12-14','Miércoles','12:00:00','14:00:00','2023-05-12 16:20:26',1,'2023-05-16 11:15:27',1,'A'),(14,1,2,'Miércoles Eva 14-16','Miércoles','14:00:00','16:00:00','2023-05-12 16:21:20',1,'2023-05-16 11:15:47',1,'A'),(15,1,2,'Miércoles Eva 16-18','Miércoles','16:00:00','18:00:00','2023-05-12 16:21:53',1,'2023-05-16 11:18:33',1,'A'),(16,1,2,'Viernes Eva 8-10','Viernes','08:00:00','10:00:00','2023-05-12 16:22:26',1,'0000-00-00 00:00:00',0,'A'),(17,1,2,'Viernes Eva 10-12','Viernes','10:00:00','12:00:00','2023-05-12 16:22:48',1,'0000-00-00 00:00:00',0,'A'),(18,1,2,'Viernes Eva 12-14','Viernes','12:00:00','14:00:00','2023-05-12 16:23:08',1,'2023-05-12 16:24:15',1,'A'),(19,1,2,'Viernes Eva 14-16','Viernes','14:00:00','16:00:00','2023-05-12 16:23:51',1,'0000-00-00 00:00:00',0,'A'),(20,1,2,'Viernes Eva 16-18','Viernes','16:00:00','18:00:00','2023-05-12 16:24:39',1,'0000-00-00 00:00:00',0,'A'),(21,1,2,'Sábado Eva 8-10','Sábado','08:00:00','10:00:00','2023-05-12 16:25:06',1,'2023-05-16 11:19:31',1,'A'),(22,1,2,'Sábado Eva 10-12','Sábado','10:00:00','12:00:00','2023-05-12 16:25:25',1,'2023-05-16 11:19:46',1,'A'),(23,5,3,'Lunes Eva 8-10 B','Lunes','08:00:00','10:00:00','2023-05-16 09:20:06',1,'0000-00-00 00:00:00',0,'A'),(24,5,3,'Lunes Eva 10-12 B','Lunes','10:00:00','12:00:00','2023-05-16 09:20:41',1,'0000-00-00 00:00:00',0,'A'),(25,3,3,'Lun FM1','Lunes','08:00:00','10:00:00','2023-05-22 13:53:07',1,'0000-00-00 00:00:00',0,'A'),(26,5,2,'EV L 1','Lunes','08:00:00','09:00:00','2023-05-22 14:20:07',1,'0000-00-00 00:00:00',0,'A'),(34,1,2,'prueba','Lunes','18:00:00','20:00:00','2023-05-26 13:50:59',1,'0000-00-00 00:00:00',0,'A'),(35,1,2,'prueba2','Lunes','20:00:00','22:00:00','2023-05-26 13:52:31',1,'0000-00-00 00:00:00',0,'I'),(36,1,2,'prueba3','Lunes','18:00:00','20:00:00','2023-05-26 13:54:37',1,'2023-05-26 13:59:38',1,'A'),(37,1,2,'prueba4','Martes','18:00:00','20:00:00','2023-05-26 14:09:47',1,'0000-00-00 00:00:00',0,'A');
/*!40000 ALTER TABLE `ins_horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_paciente`
--

DROP TABLE IF EXISTS `ins_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_paciente` (
  `id_paciente` int NOT NULL AUTO_INCREMENT,
  `cod_paciente` varchar(20) DEFAULT NULL,
  `nombres` varchar(40) NOT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `tipo_documento` enum('Carnet','Pasaporte','Licencia') DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `lugar_nac` enum('Beni','Chuquisaca','Cochabamba','La Paz','Oruro','Pando','Potosi','Santa Cruz','Tarija','Extranjero') DEFAULT NULL,
  `genero` enum('F','M') NOT NULL DEFAULT 'M',
  `fecha_nac` date NOT NULL,
  `diagnostico` varchar(200) DEFAULT NULL,
  `desplazamiento` enum('Independiente','Dependiente','Silla de ruedas','Muletas') NOT NULL DEFAULT 'Independiente',
  `estado_asis` enum('Baja','Activo','Alta','Permiso') NOT NULL DEFAULT 'Activo',
  `direccion` varchar(200) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `contacto` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `logout` varchar(100) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT '0000-00-00 00:00:00',
  `user_reg` int NOT NULL DEFAULT '0',
  `fecha_mod` datetime DEFAULT '0000-00-00 00:00:00',
  `user_mod` int NOT NULL DEFAULT '0',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_paciente`
--

LOCK TABLES `ins_paciente` WRITE;
/*!40000 ALTER TABLE `ins_paciente` DISABLE KEYS */;
INSERT INTO `ins_paciente` VALUES (1,NULL,'Diana','Coronel','Condori','','','','La Paz','F','2019-06-30',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',0,'2023-05-09 09:27:41',1,'A'),(2,NULL,'Hasan','Condori','Condori','','','',NULL,'M','2020-01-21',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-03 16:09:11',1,'2023-05-12 16:12:24',1,'A'),(3,NULL,'Luciana','Vargas','Chavez','','','',NULL,'F','2019-11-12',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-03 16:21:34',1,'0000-00-00 00:00:00',0,'A'),(4,NULL,'Daniela','Fernandez','Aliaga','','','',NULL,'F','2021-06-12',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-03 16:26:15',1,'0000-00-00 00:00:00',0,'A'),(5,NULL,'Matias','Rojas','Perez','','','',NULL,'M','2019-02-25',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-03 16:30:38',1,'0000-00-00 00:00:00',0,'A'),(6,NULL,'Cinthia','Salazar','Guarachi','','','',NULL,'F','2020-02-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-03 16:45:49',1,'0000-00-00 00:00:00',0,'A'),(7,NULL,'Adrian','Cespedes','Aramayo','','','',NULL,'M','2020-02-01',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-03 16:50:23',1,'0000-00-00 00:00:00',0,'A'),(8,NULL,'Gisel','Mendoza','Sanchez','','','',NULL,'F','2019-05-28',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 09:32:50',1,'0000-00-00 00:00:00',0,'A'),(9,NULL,'Alondra','','','','','',NULL,'F','0000-00-00',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:03:40',1,'0000-00-00 00:00:00',0,'A'),(10,NULL,'Oscar','','','','','',NULL,'M','0000-00-00',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:08:43',1,'0000-00-00 00:00:00',0,'A'),(11,NULL,'David','','','','','',NULL,'M','0000-00-00',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:18:53',1,'0000-00-00 00:00:00',0,'A'),(12,NULL,'Yhoselin','','','','','',NULL,'F','0000-00-00',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:19:12',1,'0000-00-00 00:00:00',0,'A'),(13,NULL,'Ana','','','','','',NULL,'F','2019-05-23',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:21:17',1,'0000-00-00 00:00:00',0,'A'),(14,NULL,'Fernando','','','','','',NULL,'M','2019-05-23',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:22:47',1,'0000-00-00 00:00:00',0,'A'),(15,NULL,'Cinthia','','','','','',NULL,'F','0000-00-00',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 10:25:39',1,'0000-00-00 00:00:00',0,'A'),(16,NULL,'Samanta','Vargas','Condori','','','',NULL,'F','2018-05-21',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 13:35:59',1,'0000-00-00 00:00:00',0,'A'),(17,NULL,'Jorge','Quispe','Quispe','','','',NULL,'M','2020-01-24',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 13:54:23',1,'0000-00-00 00:00:00',0,'A'),(18,NULL,'Joan','Poma','Aramayo','','','',NULL,'M','2020-05-21',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 14:56:04',1,'2023-05-18 13:49:09',1,'A'),(19,NULL,'Alondra Caeli','Calamani','Mayta','7082525','Carnet','lp',NULL,'F','2017-12-25',NULL,'Independiente','Activo',NULL,NULL,'72525291',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 11:32:04',1,'2023-05-25 14:29:48',1,'A'),(20,NULL,'Monica','','','','','',NULL,'F','2018-04-23',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 11:34:30',1,'2023-05-22 08:34:35',1,'A'),(21,NULL,'Erika','','','','','',NULL,'F','2018-08-23',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 11:35:30',1,'2023-05-12 15:06:02',1,'A'),(22,NULL,'Rene','','','','','',NULL,'M','2019-08-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 12:11:47',1,'2023-05-09 09:28:11',1,'A'),(23,NULL,'Miley','Vargas','Quispe','','','',NULL,'F','2020-06-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-06 13:46:51',1,'2023-05-09 09:27:45',1,'A'),(24,NULL,'Osvaldo','Poma','Coaquira','','','',NULL,'M','2021-06-05',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-08 10:11:31',1,'2023-05-19 09:16:55',1,'A'),(25,NULL,'Adrian','','','','Carnet','',NULL,'M','2020-03-28',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-09 08:47:14',1,'2023-05-18 13:54:55',1,'A'),(26,NULL,'Nicol','Lopez','Marca','','','',NULL,'F','2017-06-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-09 09:03:02',1,'2023-05-09 09:28:03',1,'A'),(27,NULL,'Ademar','Choque','Choque','','Carnet','',NULL,'M','2010-05-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-12 15:04:55',1,'2023-05-12 16:55:50',1,'A'),(28,NULL,'Camila','Condori','Apaza','','Carnet','',NULL,'F','2010-03-10',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-12 15:11:59',1,'2023-05-12 16:38:27',1,'A'),(29,NULL,'Ivan','Gonzales','Vargas','','','',NULL,'M','2018-12-05',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-12 16:41:03',1,'2023-05-17 08:46:44',1,'A'),(30,NULL,'Angy','Camacho','Quispe','','','',NULL,'F','2020-06-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-17 10:35:55',1,'0000-00-00 00:00:00',0,'A'),(31,NULL,'Melina','Castro','Chavez','','','',NULL,'F','2018-08-25',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-17 15:26:10',1,'0000-00-00 00:00:00',0,'A'),(32,NULL,'Karina','Prado','Quispe','','','',NULL,'F','2018-12-25',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-18 16:29:13',1,'2023-05-22 10:02:00',1,'A'),(33,NULL,'Angel','Torrez','Quispe','','','',NULL,'M','2020-06-15',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-19 16:45:47',1,'2023-05-19 16:55:10',1,'A'),(34,NULL,'Nicol','Apaza','Villanueva','','','',NULL,'F','2019-06-12',NULL,'Independiente','Activo',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-22 08:50:26',1,'2023-05-25 14:27:11',1,'A'),(35,NULL,'Sebastian Valentin','Chura','Gutierrez','7082525','Carnet','lp',NULL,'M','2020-06-12',NULL,'Independiente','Activo',NULL,NULL,'4673690761',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-22 14:00:28',1,'2023-05-25 14:27:55',1,'A'),(36,NULL,'Esnayder Abdiel','Crispin','Quispe','7082525','Carnet','lp',NULL,'M','2023-05-22',NULL,'Independiente','Activo',NULL,NULL,'72525291',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-22 14:27:55',1,'2023-05-25 14:29:26',1,'A'),(37,NULL,'en esperara','','','','','',NULL,'F','0000-00-00',NULL,'Independiente','Activo',NULL,NULL,'325252',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-22 15:28:55',1,'0000-00-00 00:00:00',0,'A');
/*!40000 ALTER TABLE `ins_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_patologia`
--

DROP TABLE IF EXISTS `ins_patologia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_patologia` (
  `id_patologia` int NOT NULL AUTO_INCREMENT,
  `patologia` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_patologia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_patologia`
--

LOCK TABLES `ins_patologia` WRITE;
/*!40000 ALTER TABLE `ins_patologia` DISABLE KEYS */;
INSERT INTO `ins_patologia` VALUES (1,'Artritis','Descripción Artritis','2023-06-02 15:57:55',1,'2023-06-02 16:25:24',1,'A'),(2,'Artrosis','Descripción Artrosis','2023-06-02 16:01:12',1,NULL,NULL,'A'),(3,'Esguince','Descripción Esguince','2023-06-02 16:07:55',1,NULL,NULL,'A'),(4,'Autismo','Descripción Autismo','2023-06-02 16:22:52',1,NULL,NULL,'A'),(5,'Hemiplejia','Descripción Hemiplejia','2023-06-02 16:24:37',1,NULL,NULL,'A');
/*!40000 ALTER TABLE `ins_patologia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_perfil`
--

DROP TABLE IF EXISTS `ins_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `perfil` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_perfil`
--

LOCK TABLES `ins_perfil` WRITE;
/*!40000 ALTER TABLE `ins_perfil` DISABLE KEYS */;
INSERT INTO `ins_perfil` VALUES (1,'Informatico','Personal encargado sistemas y redes',NULL,NULL,NULL,NULL,'A'),(2,'Atención al cliente','Personal encargado de la atención al cliente',NULL,NULL,NULL,NULL,'A'),(3,'Fisioterapeuta','Especialista en fisioterapia',NULL,NULL,'2023-05-24 11:58:23',1,'A'),(4,'Diseñador grafico','Profesional encargado de crear los diseños','2023-05-24 14:18:30',1,'2023-05-24 14:21:27',1,'A'),(5,'Editor de videos','Profesional creador de videos','2023-05-24 14:20:50',1,NULL,NULL,'A'),(6,'Enfermeria','Descripción para este perfil de enfermería','2023-05-24 14:28:00',1,NULL,NULL,'A');
/*!40000 ALTER TABLE `ins_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_roles`
--

DROP TABLE IF EXISTS `ins_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_roles`
--

LOCK TABLES `ins_roles` WRITE;
/*!40000 ALTER TABLE `ins_roles` DISABLE KEYS */;
INSERT INTO `ins_roles` VALUES (1,'Director','Director general de la empresa',NULL,NULL,'2023-05-24 14:09:35',1,'A'),(2,'Jefe','Jefe encargado de área',NULL,NULL,NULL,NULL,'A'),(3,'Especialista','Profesional especializado en algún área',NULL,NULL,NULL,NULL,'I'),(17,'Supervisor','Supervisa un área específica',NULL,NULL,'2023-05-24 14:21:54',1,'A'),(18,'Auxiliar','Poner descripción para el auxiliar','2023-05-24 14:11:25',1,NULL,NULL,'A'),(19,'Pasante','Descripción para el pasante','2023-05-24 14:12:36',1,NULL,NULL,'A');
/*!40000 ALTER TABLE `ins_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_seg_enfermeria`
--

DROP TABLE IF EXISTS `ins_seg_enfermeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_seg_enfermeria` (
  `id_seg_enfermeria` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `his_id` int NOT NULL,
  `reserva_id` int NOT NULL,
  `observacion` varchar(20) DEFAULT '',
  `fecha` date NOT NULL,
  `peso` varchar(5) DEFAULT '',
  `talla` varchar(5) DEFAULT '',
  `pa` varchar(5) DEFAULT '',
  `fc` varchar(5) DEFAULT '',
  `fr` varchar(5) DEFAULT '',
  `procedimiento` varchar(5) DEFAULT '',
  `fecha_reg` date NOT NULL,
  `per_salud_id_reg` int NOT NULL,
  `f_reg` datetime NOT NULL,
  `per_salud_id_mod` int NOT NULL,
  `f_mod` datetime NOT NULL,
  PRIMARY KEY (`id_seg_enfermeria`),
  KEY `his_id` (`his_id`),
  KEY `ins_seg_enfermeria_ibfk_1_idx` (`paciente_id`),
  CONSTRAINT `ins_seg_enfermeria_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `ins_paciente` (`id_paciente`),
  CONSTRAINT `ins_seg_enfermeria_ibfk_2` FOREIGN KEY (`his_id`) REFERENCES `ins_historial` (`id_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_seg_enfermeria`
--

LOCK TABLES `ins_seg_enfermeria` WRITE;
/*!40000 ALTER TABLE `ins_seg_enfermeria` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_seg_enfermeria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_seg_fisio`
--

DROP TABLE IF EXISTS `ins_seg_fisio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_seg_fisio` (
  `id_seg_fisio` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `his_id` int NOT NULL,
  `reserva_id` int NOT NULL,
  `doctor_id` int NOT NULL,
  `sup_doctor_id` int DEFAULT NULL,
  `nro_sesion` int DEFAULT NULL,
  `evolucion` varchar(20) DEFAULT '',
  `observacion` varchar(20) DEFAULT '',
  `fecha_reg` date NOT NULL,
  `per_salud_id_reg` int NOT NULL,
  `f_reg` datetime NOT NULL,
  `per_salud_id_mod` int NOT NULL,
  `f_mod` datetime NOT NULL,
  PRIMARY KEY (`id_seg_fisio`),
  KEY `his_id` (`his_id`),
  KEY `ins_seg_fisio_ibfk_1_idx` (`paciente_id`),
  CONSTRAINT `ins_seg_fisio_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `ins_paciente` (`id_paciente`),
  CONSTRAINT `ins_seg_fisio_ibfk_2` FOREIGN KEY (`his_id`) REFERENCES `ins_historial` (`id_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_seg_fisio`
--

LOCK TABLES `ins_seg_fisio` WRITE;
/*!40000 ALTER TABLE `ins_seg_fisio` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_seg_fisio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_tarifa`
--

DROP TABLE IF EXISTS `ins_tarifa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_tarifa` (
  `id_tarifa` int NOT NULL AUTO_INCREMENT,
  `descripcion` enum('Evaluación','Re-evaluación','Sesiones terapéuticas','Planes') NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_tarifa`
--

LOCK TABLES `ins_tarifa` WRITE;
/*!40000 ALTER TABLE `ins_tarifa` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_tarifa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_tarifa_espe`
--

DROP TABLE IF EXISTS `ins_tarifa_espe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_tarifa_espe` (
  `id_tarifa_esp` int NOT NULL AUTO_INCREMENT,
  `tarifa_id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `porc_descuento` varchar(5) NOT NULL,
  `monto_descuento` int NOT NULL,
  `monto_total` int NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `user_id_reg` int DEFAULT NULL,
  `f_reg` datetime DEFAULT NULL,
  `user_id_mod` int DEFAULT NULL,
  `f_mod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarifa_esp`),
  KEY `tarifa_id` (`tarifa_id`),
  CONSTRAINT `ins_tarifa_espe_ibfk_1` FOREIGN KEY (`tarifa_id`) REFERENCES `ins_tarifa` (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_tarifa_espe`
--

LOCK TABLES `ins_tarifa_espe` WRITE;
/*!40000 ALTER TABLE `ins_tarifa_espe` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_tarifa_espe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_tarifa_eva`
--

DROP TABLE IF EXISTS `ins_tarifa_eva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_tarifa_eva` (
  `id_tarifa_eva` int NOT NULL AUTO_INCREMENT,
  `tarifa_id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `porc_descuento` varchar(5) NOT NULL,
  `monto_descuento` int NOT NULL,
  `monto_total` int NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `user_id_reg` int DEFAULT NULL,
  `f_reg` datetime DEFAULT NULL,
  `user_id_mod` int DEFAULT NULL,
  `f_mod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarifa_eva`),
  KEY `tarifa_id` (`tarifa_id`),
  CONSTRAINT `ins_tarifa_eva_ibfk_1` FOREIGN KEY (`tarifa_id`) REFERENCES `ins_tarifa` (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_tarifa_eva`
--

LOCK TABLES `ins_tarifa_eva` WRITE;
/*!40000 ALTER TABLE `ins_tarifa_eva` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_tarifa_eva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_tarifa_sesion`
--

DROP TABLE IF EXISTS `ins_tarifa_sesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_tarifa_sesion` (
  `id_tarifa_ses` int NOT NULL AUTO_INCREMENT,
  `tarifa_id` int NOT NULL,
  `plan` enum('PLAN TARIFA REGULAR','PLAN TARIFA AMIGA','PLAN TARIFA FIDELIDAD','PLAN TARIFA SOLIDARIA','NATACIÓN TERAPÉUTICA','SESIONES URI') NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `categoria` enum('Niños','Adultos') NOT NULL,
  `porc_descuento` varchar(5) DEFAULT NULL,
  `monto_descuento` int DEFAULT NULL,
  `monto_total` int NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `user_id_reg` int DEFAULT NULL,
  `f_reg` datetime DEFAULT NULL,
  `user_id_mod` int DEFAULT NULL,
  `f_mod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarifa_ses`),
  KEY `tarifa_id` (`tarifa_id`),
  CONSTRAINT `ins_tarifa_sesion_ibfk_1` FOREIGN KEY (`tarifa_id`) REFERENCES `ins_tarifa` (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_tarifa_sesion`
--

LOCK TABLES `ins_tarifa_sesion` WRITE;
/*!40000 ALTER TABLE `ins_tarifa_sesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_tarifa_sesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_tipo_historial`
--

DROP TABLE IF EXISTS `ins_tipo_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_tipo_historial` (
  `id_tipo_his` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_his`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_tipo_historial`
--

LOCK TABLES `ins_tipo_historial` WRITE;
/*!40000 ALTER TABLE `ins_tipo_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `ins_tipo_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_tutor`
--

DROP TABLE IF EXISTS `ins_tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_tutor` (
  `id_tutor` int NOT NULL AUTO_INCREMENT,
  `cod_tutor` varchar(20) DEFAULT NULL,
  `nombres` varchar(40) NOT NULL,
  `primer_apellido` varchar(30) DEFAULT NULL,
  `segundo_apellido` varchar(30) NOT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `tipo_documento` enum('Carnet','Pasaporte','Licencia') DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `lugar_nac` enum('Beni','Chuquisaca','Cochabamba','La Paz','Oruro','Pando','Potosi','Santa Cruz','Tarija','Extranjero') DEFAULT NULL,
  `genero` enum('F','M') NOT NULL DEFAULT 'M',
  `fecha_nacimiento` date DEFAULT '0000-00-00',
  `direccion` varchar(200) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `contacto` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `logout` varchar(100) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT '0000-00-00 00:00:00',
  `user_reg` int NOT NULL DEFAULT '0',
  `fecha_mod` datetime DEFAULT '0000-00-00 00:00:00',
  `user_mod` int NOT NULL DEFAULT '0',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_tutor`
--

LOCK TABLES `ins_tutor` WRITE;
/*!40000 ALTER TABLE `ins_tutor` DISABLE KEYS */;
INSERT INTO `ins_tutor` VALUES (1,NULL,'Sofia','Mendoza','Surco','','','',NULL,'F','0000-00-00',NULL,NULL,'12345678',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 14:03:05',1,'2023-05-09 09:27:41',1,'A'),(2,NULL,'Maria','Paco','Mendez','','','',NULL,'F','0000-00-00',NULL,NULL,'75841230',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 14:31:17',1,'2023-05-12 16:12:24',1,'A'),(3,NULL,'Luis','Poma','Vargas','','','',NULL,'M','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-04 14:56:04',1,'2023-05-18 13:49:09',1,'A'),(4,NULL,'Mariela','Sanjinez','Valdez','','Carnet','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 11:32:04',1,'2023-05-25 14:29:48',1,'A'),(5,NULL,'Jorge','Carrasco','Soto','','','',NULL,'M','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 11:34:30',1,'2023-05-22 08:34:35',1,'A'),(6,NULL,'Juana','Condori','Condori','','','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 11:35:30',1,'2023-05-12 15:06:02',1,'A'),(7,NULL,'Angel','Melendres','Sanchez','','','',NULL,'M','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-05 12:11:47',1,'2023-05-09 09:28:11',1,'A'),(8,NULL,'Ines','Quispe','Quispe','','','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-06 13:46:51',1,'2023-05-09 09:27:45',1,'A'),(9,NULL,'Ricardo','Poma','Sanchez','','','',NULL,'M','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-08 10:11:31',1,'2023-05-19 09:16:55',1,'A'),(10,NULL,'','','','','Carnet','',NULL,'M','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-09 08:47:14',1,'2023-05-18 13:54:55',1,'A'),(11,NULL,'Julia','Marca','Quispe','','','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-09 09:03:02',1,'2023-05-09 09:28:03',1,'A'),(12,NULL,'Javier','Choque','','','Carnet','',NULL,'M','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-12 15:04:55',1,'2023-05-12 16:55:50',1,'A'),(13,NULL,'Teresa','Apaza','Calle','','Carnet','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-12 15:11:59',1,'2023-05-12 16:38:27',1,'A'),(14,NULL,'Valeria','Vargas','Perez','','','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-12 16:41:03',1,'2023-05-17 08:46:44',1,'A'),(15,NULL,'Miriam','Villanueva','Quispe','','','',NULL,'F','0000-00-00',NULL,NULL,'78562312',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-22 08:50:26',1,'2023-05-25 14:27:11',1,'A'),(16,NULL,'','','','','','',NULL,'F','0000-00-00',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-22 15:28:55',1,'0000-00-00 00:00:00',0,'A');
/*!40000 ALTER TABLE `ins_tutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_usuarios`
--

DROP TABLE IF EXISTS `ins_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ins_usuarios` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `cod_user` varchar(20) DEFAULT NULL,
  `area_id` int NOT NULL,
  `rol_id` int NOT NULL,
  `perfil_id` int NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `lugar_nac` enum('Beni','Chuquisaca','Cochabamba','La Paz','Oruro','Pando','Potosi','Santa Cruz','Tarija','Extranjero') DEFAULT NULL,
  `genero` enum('F','M') NOT NULL DEFAULT 'M',
  `fecha_nac` date NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `contacto` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `logout` varchar(100) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `active` enum('s','n') NOT NULL DEFAULT 's',
  `visible` enum('s','n') NOT NULL DEFAULT 's',
  `fecha_reg` datetime DEFAULT '0000-00-00 00:00:00',
  `user_reg` int NOT NULL DEFAULT '0',
  `fecha_mod` datetime DEFAULT '0000-00-00 00:00:00',
  `user_mod` int NOT NULL DEFAULT '0',
  `codigo_sesion` varchar(100) DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_usuarios`
--

LOCK TABLES `ins_usuarios` WRITE;
/*!40000 ALTER TABLE `ins_usuarios` DISABLE KEYS */;
INSERT INTO `ins_usuarios` VALUES (1,'CMJ010588',1,2,1,'Jeanette','Condori','Mendoza','6953212','Carnet de identidad','','La Paz','F','1988-05-01','','70559042','','sistemas@torredeagua.com','','sistemas','e43b62c743c3833d1affbee247319781ac424a19','2023-06-02 15:16:55','0000-00-00 00:00:00',NULL,'s','s','0000-00-00 00:00:00',0,'2023-05-24 09:29:56',1,NULL,'A'),(2,'CSA311269',6,2,3,'Ana','Callisaya','Santos','123456','Carnet de identidad','','La Paz','M','1969-12-31','Cosmos 79','12345678','','','','','',NULL,NULL,NULL,'s','s','2023-04-24 14:02:59',1,'2023-04-24 14:09:15',1,NULL,'A'),(3,'VTL151292',6,17,3,'Liliam Raquel','Villalobos','Torrez','71503148','Carnet de identidad','','La Paz','F','1992-12-15','Zona Ballivian','71503148','','liliamtorredeagua@gmail.com','','liliamtorredeagua','68a22426772814c571f87f3b9f1aad1686809366',NULL,NULL,NULL,'n','s','2023-05-16 09:16:55',1,'2023-05-23 16:58:53',1,NULL,'A'),(4,'j311269',1,2,1,'jane','Salazar','','','Carnet de identidad','','Beni','F','1969-12-31','','','','','','','','',NULL,NULL,'n','s','2023-05-22 14:14:02',1,'2023-05-22 16:00:46',1,NULL,'I'),(5,'TCA150298',5,17,2,'Amanda','Tapia','Cespedes','1234566','Carnet de identidad','','La Paz','F','1998-02-15','','12345678','','atc@torredeagua.com','','atc','cb36a30eb40ad6f8c5c7edd28b1485e5a22a9629','2023-06-02 15:15:43','2023-06-02 15:16:29',NULL,'s','s','2023-05-23 13:54:34',1,'2023-06-02 15:14:28',1,NULL,'A'),(6,'GVJ161195',8,17,6,'Juan Miguel','Gutierrez','Villalba','69799278','Carnet de identidad','','La Paz','M','1995-11-16','','69799278','','migueltorredeagua@torredeagua.com','','migueltorredeagua','85205acea91fa8f443fe2a7909fd1aca49f2a203',NULL,NULL,NULL,'n','s','2023-05-23 14:09:28',1,'2023-05-24 14:35:29',1,NULL,'A'),(7,'LBM130795',6,17,3,'Maria Jose Gabriela','Loza','Balderrama','70139668','Carnet de identidad','','La Paz','F','1995-07-13','','70139668','','mariajosetorredeagua@gmail.com','','mariajosetorredeagua','bae504e4cca5884f25428e58a06e498b3b22d1a1',NULL,NULL,NULL,'n','s','2023-05-23 15:25:43',1,'0000-00-00 00:00:00',0,NULL,'A'),(8,'CSD281196',8,18,6,'Daniela Varinia','Chavez','Saavedra','69835459','Carnet de identidad','','La Paz','F','1996-11-28','','69835459','','variniatorredeagua@gmail.com','','variniatorredeagua','8126ef8ded7601065d212fe25671011f06b42760',NULL,NULL,NULL,'n','s','2023-05-24 14:29:45',1,'0000-00-00 00:00:00',0,NULL,'A'),(9,'VRA300395',6,19,3,'Ana Lucia','Velasco','Ruelas','69717116','Carnet de identidad','','La Paz','F','1995-03-30','','69717116','','luciatorredeagua@gmail.com','','luciatorredeagua','6c8c9b3897c7b9ef842adf988471565014271c18',NULL,NULL,NULL,'n','s','2023-05-24 14:34:47',1,'0000-00-00 00:00:00',0,NULL,'A');
/*!40000 ALTER TABLE `ins_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_agenda_eva`
--

DROP TABLE IF EXISTS `sys_agenda_eva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_agenda_eva` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `doctor_id` int NOT NULL,
  `horario_id` int NOT NULL,
  `consultorio_id` varchar(20) NOT NULL,
  `tarifa_id` int NOT NULL,
  `estado_pagos_id` int DEFAULT NULL,
  `asunto` enum('Evaluación','Reevaluación') NOT NULL,
  `diagnostico` varchar(100) DEFAULT '',
  `fecha_prog` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado_reserva` enum('Atendido','No atendido','Cancelado','Reagendado') NOT NULL DEFAULT 'No atendido',
  `metodo_reserva` enum('Whatsapp','Facebook','Personal') NOT NULL,
  `estado_pago` enum('PAGADO','PENDIENTE','CANCELADO') NOT NULL DEFAULT 'PENDIENTE',
  `fecha_reg` datetime NOT NULL,
  `user_reg` int NOT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `observaciones` varchar(1000) DEFAULT NULL,
  `impedimento` varchar(500) NOT NULL DEFAULT 'NO',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `dia` varchar(10) NOT NULL,
  `background` varchar(10) DEFAULT NULL,
  `textcolor` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_agenda_eva`
--

LOCK TABLES `sys_agenda_eva` WRITE;
/*!40000 ALTER TABLE `sys_agenda_eva` DISABLE KEYS */;
INSERT INTO `sys_agenda_eva` VALUES (1,1,2,12,'1',1,NULL,'Evaluación','Displasia','2023-05-03','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 00:00:00',1,'2023-05-09 09:27:41',1,'','NO','A','miércoles',NULL,NULL),(2,2,2,11,'1',1,NULL,'Evaluación','Displasia','2023-05-03','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 00:00:00',1,'2023-05-12 16:12:24',1,'','NO','A','miércoles','#669cd6','#000000'),(3,3,2,1,'1',3,NULL,'Evaluación','displasia','2023-05-04','14:00:00','16:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 16:21:34',1,NULL,NULL,'','','A','',NULL,NULL),(4,4,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-05','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 16:26:15',1,NULL,NULL,'','','A','',NULL,NULL),(5,5,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-04','16:00:00','18:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 16:30:38',1,NULL,NULL,'','','A','',NULL,NULL),(6,6,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-05','16:00:00','18:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 16:45:49',1,NULL,NULL,'','','A','',NULL,NULL),(7,7,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-06','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-03 16:50:23',1,NULL,NULL,'','','A','',NULL,NULL),(8,8,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-09','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 09:32:50',1,NULL,NULL,'','','A','',NULL,NULL),(9,9,2,1,'1',1,NULL,'Evaluación','','2023-05-10','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:03:40',1,NULL,NULL,'','','I','',NULL,NULL),(10,10,2,1,'1',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:08:43',1,NULL,NULL,'','','I','',NULL,NULL),(11,11,2,1,'1',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:18:53',1,NULL,NULL,'','','I','',NULL,NULL),(12,12,2,1,'1',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:19:12',1,NULL,NULL,'','','I','',NULL,NULL),(13,13,2,1,'1',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:21:17',1,NULL,NULL,'','','I','',NULL,NULL),(14,14,2,1,'1',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:22:47',1,NULL,NULL,'','','I','',NULL,NULL),(15,15,2,1,'1',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 10:25:39',1,NULL,NULL,'','','I','',NULL,NULL),(16,16,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-11','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 13:35:59',1,NULL,NULL,'','','A','',NULL,NULL),(17,17,2,1,'1',3,NULL,'Evaluación','displasia','2023-05-12','14:00:00','16:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 13:54:23',1,NULL,NULL,'','','A','',NULL,NULL),(18,18,2,6,'1',1,NULL,'Evaluación','displasia','2023-05-16','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-04 14:56:04',1,'2023-05-18 13:49:09',1,'','','A','martes','#7c9cd0','#000000'),(19,19,1,1,'1',1,NULL,'Evaluación','Displasia','2023-05-22','11:00:00','13:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-05 11:32:04',1,'2023-05-25 14:29:48',1,'','','A','lunes','#d185e0','#000000'),(20,20,2,1,'1',1,NULL,'Evaluación','','2023-05-08','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-05 11:34:30',1,'2023-05-22 08:34:35',1,'','','A','lunes','#e156ae','#000000'),(21,21,2,1,'1',1,NULL,'Evaluación','displasia','2023-05-15','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-05 11:35:30',1,'2023-05-12 15:06:02',1,'','','A','lunes',NULL,NULL),(22,22,2,12,'1',1,NULL,'Evaluación','','2023-05-10','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-05 12:11:47',1,'2023-05-09 09:28:11',1,'','','A','miércoles',NULL,NULL),(23,23,2,15,'1',1,NULL,'Evaluación','displasia','2023-05-03','16:00:00','18:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-06 13:46:51',1,'2023-05-09 09:27:45',1,'','','A','miércoles',NULL,NULL),(24,24,2,5,'1',1,NULL,'Evaluación','displasia','2023-05-09','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-08 10:11:31',1,'2023-05-19 09:16:55',1,'','','A','martes','#5687c8','#000000'),(25,25,2,15,'1',1,NULL,'Evaluación','displasia','2023-05-10','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-09 08:47:14',1,'2023-05-18 13:54:55',1,'','','A','miércoles','#72a2ee','#000000'),(26,26,2,9,'1',1,NULL,'Evaluación','pie plano','2023-05-09','16:00:00','18:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-09 09:03:02',1,'2023-05-09 09:28:03',1,'','','A','martes',NULL,NULL),(27,27,2,13,'1',1,NULL,'Evaluación','displasia','2023-05-03','12:00:00','14:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-12 15:04:55',1,'2023-05-12 16:55:50',1,'','','A','miércoles','#7eb2d3','#000000'),(28,28,2,14,'1',1,NULL,'Evaluación','displasia','2023-05-03','14:00:00','16:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-12 15:11:59',1,'2023-05-12 16:38:27',1,'','','A','miércoles','#56acbd','#000000'),(29,29,2,1,'1',1,NULL,'Evaluación','','2023-05-01','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-12 16:41:03',1,'2023-05-17 08:46:44',1,'','','A','lunes','#558ec3','#000000'),(30,30,2,11,'1',2,NULL,'Evaluación','Displasia','2023-05-17','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-17 10:35:56',1,NULL,NULL,'','','A','miércoles','#e698ec','#171717'),(31,31,2,12,'1',1,NULL,'Evaluación','Displasia','2023-05-17','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-17 15:26:10',1,NULL,NULL,'','','A','miércoles','#3788d8','#ffffff'),(32,32,1,1,'1',1,NULL,'Evaluación','displasia','2023-05-19','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-18 16:29:13',1,'2023-05-22 10:02:00',1,'','','A','viernes','#e26ad8','#0d0c0c'),(33,33,2,16,'1',1,NULL,'Evaluación','Displasia','2023-05-12','08:00:00','10:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-19 16:45:47',1,'2023-05-19 16:55:10',1,'','','A','viernes','#9f37d7','#ffffff'),(34,34,1,1,'1',1,NULL,'Evaluación','displasia de cadera','2023-05-23','10:00:00','12:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-22 08:50:26',1,'2023-05-25 14:27:11',1,'','','A','martes','#e246d5','#030303'),(35,35,1,1,'1',1,NULL,'Evaluación','Operación de corazon','2023-05-22','09:00:00','11:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-22 14:00:28',1,'2023-05-25 14:27:55',1,'','','A','lunes','#70d29a','#121212'),(36,36,1,1,'1',1,NULL,'Evaluación','Displasia','2023-05-22','09:00:00','11:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-22 14:27:55',1,'2023-05-25 14:29:26',1,'','','A','lunes','#3788d8','#ffffff'),(37,37,1,1,'',1,NULL,'Evaluación','','2023-05-02','00:00:00','00:00:00','No atendido','Whatsapp','PENDIENTE','2023-05-22 15:28:55',1,NULL,NULL,'','','I','martes','#3788d8','#ffffff');
/*!40000 ALTER TABLE `sys_agenda_eva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_estado_pagos`
--

DROP TABLE IF EXISTS `sys_estado_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_estado_pagos` (
  `id_estado_pagos` int NOT NULL AUTO_INCREMENT,
  `tarifa_id` int NOT NULL,
  `paciente_id` int NOT NULL,
  `descripcion` enum('Evaluación','Re-evaluación','Sesiones terapéuticas') NOT NULL,
  `monto_total` int NOT NULL,
  `saldo` int NOT NULL,
  `estado` enum('PAGADO','PENDIENTE','CANCELADO') NOT NULL DEFAULT 'PENDIENTE',
  `fecha_reg` date NOT NULL,
  `fecha_max_pago` date NOT NULL,
  `user_id_reg` int NOT NULL,
  `f_reg` datetime NOT NULL,
  `user_id_mod` int NOT NULL,
  `f_mod` datetime NOT NULL,
  PRIMARY KEY (`id_estado_pagos`),
  KEY `tarifa_id` (`tarifa_id`),
  CONSTRAINT `sys_estado_pagos_ibfk_1` FOREIGN KEY (`tarifa_id`) REFERENCES `ins_tarifa` (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_estado_pagos`
--

LOCK TABLES `sys_estado_pagos` WRITE;
/*!40000 ALTER TABLE `sys_estado_pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_estado_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_menus`
--

DROP TABLE IF EXISTS `sys_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_menus` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL DEFAULT '',
  `icono` varchar(200) NOT NULL DEFAULT '',
  `ruta` varchar(200) NOT NULL DEFAULT '',
  `modulo` varchar(100) NOT NULL DEFAULT '',
  `antecesor_id` int NOT NULL DEFAULT '0',
  `orden` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_menus`
--

LOCK TABLES `sys_menus` WRITE;
/*!40000 ALTER TABLE `sys_menus` DISABLE KEYS */;
INSERT INTO `sys_menus` VALUES (1,'Administración','fas fa-tools','?/administracion/principal','administracion',0,0),(2,'Usuarios','fas fa-users','?/usuarios/listar','usuarios',1,0),(3,'Areas','fas fa-sitemap','?/areas/listar','areas',1,0),(4,'Perfiles','fas fa-user','?/perfiles/listar','perfiles',1,0),(5,'Roles','fas fa-user-tag','?/roles/listar','roles',1,0),(6,'Horarios','fas fa-calendar-clock','?/horarios/listar','horarios',1,0),(7,'Inscripciones','fas fa-clipboard','?/inscripcion/listar','inscripcion',0,0),(8,'Agendar','fas fa-calendar-alt','?/agendar/listar','agendar',0,0),(9,'Historiales médicos','fas fa-book-medical','?/historial/listar','historial',0,0),(10,'Atención medica','fas fa-notes-medical','?/atencion/listar','atencion',0,0),(11,'Licencias','fas fa-file','?/licencias/listar','licencias',0,0),(12,'Pagos','fas fa-cash-register','?/pagos/listar','pagos',0,0),(13,'Reportes','fas fa-file-chart-line','?/reportes/listar','reportes',0,0),(14,'Evaluación','fas fa-calendar-check','?/evaluacion/listar','evaluacion',8,0),(15,'Reevaluación','fas fa-calendar-day','?/reevaluacion/listar','reevaluacion',8,0),(16,'Sesión UTA','fas fa-calendar-edit','?/sesionuta/listar','agendar',8,0),(17,'Kinésica adulto','fas fa-id-badge','?/historial/listarka','historial',9,0),(18,'Kinésica traumatológica','fas fa-bone-break','?/historial/listarkt','historial',9,0),(19,'Kinésica pediátrica','fas fa-baby-carriage','?/historial/listarkp','historial',9,0),(20,'Seguimiento enfermeria','fas fa-clipboard-medical','?/atencion/listase','atencion',10,0),(21,'Seguimiento UTA','fas fa-hot-tub','?/atencion/listaruta','atencion',10,0),(22,'Licencia médica','fas fa-file-check','?/licencias/listarlm','licencias',11,0),(23,'Licencia extraordinaria','fas fa-file-check','?/licencias/listarlme','licencias',11,0),(24,'Registra pago','fas fa-money-check-edit-alt','?/pago/listarpagos','pagos',12,0),(25,'Registra gasto','fas fa-money-check-edit','?/pago/listargastos','pagos',12,0),(26,'Tarifas','fas fa-tags','?/pago/listartarifas','pagos',12,0),(27,'Cerrar caja','fas','?/pago/cajachica','pagos',12,0),(28,'Seguimiento URI','fas fa-hot-tub','?/atencion/listaruri','atencion',10,0),(29,'Permisos','','?/permisos/listar','permisos',1,0),(30,'Sesión URI','','?/sesionuri/listar','agendar',8,0),(31,'Especialidades','fas fa-calendar-clock','?/especialidades/listar','especialidades',1,0),(32,'Consultorios','fas fa-calendar-clock','?/consultorios/listar','consultorios',1,0),(33,'Patologías','','?/patologias/listar','patologias',1,0);
/*!40000 ALTER TABLE `sys_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_pagos`
--

DROP TABLE IF EXISTS `sys_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_pagos` (
  `id_pago` int NOT NULL AUTO_INCREMENT,
  `estado_pagos_id` int NOT NULL,
  `paciente_id` int NOT NULL,
  `razon` enum('Inscripción','Sesiones','Evaluación','Multa por evaluación') NOT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `tipo_pago` enum('Efectivo','Deposito Bancario','Tigo Money') NOT NULL,
  `monto` int NOT NULL,
  `estado` enum('Anulado','Efectuado') NOT NULL DEFAULT 'Efectuado',
  `fecha_reg` date NOT NULL,
  `user_id_reg` int NOT NULL,
  `f_reg` datetime NOT NULL,
  `user_id_mod` int NOT NULL,
  `f_mod` datetime NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `estado_pagos_id` (`estado_pagos_id`),
  CONSTRAINT `sys_pagos_ibfk_1` FOREIGN KEY (`estado_pagos_id`) REFERENCES `sys_estado_pagos` (`id_estado_pagos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_pagos`
--

LOCK TABLES `sys_pagos` WRITE;
/*!40000 ALTER TABLE `sys_pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_per_salud`
--

DROP TABLE IF EXISTS `sys_per_salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_per_salud` (
  `id_per_salud` int NOT NULL AUTO_INCREMENT,
  `area_id` int NOT NULL,
  `rol_id` int NOT NULL,
  `perfil_id` int NOT NULL,
  `horario_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `token` varchar(250) NOT NULL DEFAULT '0',
  `fecha_reg` datetime DEFAULT NULL,
  `user_reg` int DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `user_mod` int DEFAULT NULL,
  `estado` enum('A','I') NOT NULL,
  `codigo_sesion` varchar(50) DEFAULT '',
  PRIMARY KEY (`id_per_salud`),
  KEY `area_id` (`area_id`),
  KEY `rol_id` (`rol_id`),
  KEY `perfil_id` (`perfil_id`),
  KEY `horario_id` (`horario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_per_salud`
--

LOCK TABLES `sys_per_salud` WRITE;
/*!40000 ALTER TABLE `sys_per_salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_per_salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_permisos`
--

DROP TABLE IF EXISTS `sys_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_permisos` (
  `id_permiso` int NOT NULL AUTO_INCREMENT,
  `area_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `archivos` text NOT NULL,
  PRIMARY KEY (`id_permiso`,`area_id`,`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_permisos`
--

LOCK TABLES `sys_permisos` WRITE;
/*!40000 ALTER TABLE `sys_permisos` DISABLE KEYS */;
INSERT INTO `sys_permisos` VALUES (19,1,19,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(20,1,20,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(21,1,21,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(22,1,22,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(23,1,23,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(24,1,24,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(1,1,1,'principal'),(2,1,2,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(3,1,3,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(4,1,4,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(5,1,5,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(6,1,6,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(7,1,7,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(8,1,8,'principal'),(30,1,30,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(9,1,9,'principal'),(10,1,10,'principal'),(12,1,12,'principal'),(13,1,13,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(14,1,14,'crear,eliminar,guardar,imprimir,listar,modificar,ver,api,horarios,horariosmod'),(15,1,15,'crear,eliminar,guardar,imprimir,listar,modificar,ver,api,horarios,horariosmod'),(16,1,16,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(17,1,17,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(18,1,18,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(25,1,25,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(26,1,26,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(27,1,27,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(31,1,31,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(11,1,11,'principal'),(28,1,28,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(29,1,29,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(32,1,32,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(33,1,33,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(69,5,33,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(68,5,32,'crear,eliminar,guardar,imprimir,listar,modificar,ver'),(66,5,1,'principal'),(67,5,31,'crear,eliminar,guardar,imprimir,listar,modificar,ver');
/*!40000 ALTER TABLE `sys_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_procesos`
--

DROP TABLE IF EXISTS `sys_procesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_procesos` (
  `id_proceso` int NOT NULL AUTO_INCREMENT,
  `fecha_proceso` date NOT NULL,
  `hora_proceso` time NOT NULL,
  `proceso` enum('c','r','u','d') NOT NULL,
  `nivel` enum('l','m','h') NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `detalle` text NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id_proceso`)
) ENGINE=MyISAM AUTO_INCREMENT=787 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_procesos`
--

LOCK TABLES `sys_procesos` WRITE;
/*!40000 ALTER TABLE `sys_procesos` DISABLE KEYS */;
INSERT INTO `sys_procesos` VALUES (1,'2023-01-27','14:27:30','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(2,'2023-01-27','14:29:23','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(3,'2023-01-27','14:29:39','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(4,'2023-01-27','14:33:48','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(5,'2023-01-27','16:28:58','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(6,'2023-01-28','08:35:06','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(7,'2023-02-03','15:22:44','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(8,'2023-02-03','15:34:12','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 2.',1),(9,'2023-02-03','15:41:23','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(10,'2023-02-03','15:41:44','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(11,'2023-02-03','15:42:46','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 1.',1),(12,'2023-02-03','16:10:33','u','h','?/roles/guardar','Se modificó el rol con identificador número 3.',1),(13,'2023-02-03','16:10:47','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(14,'2023-02-03','16:17:22','u','h','?/roles/guardar','Se modificó el rol con identificador número 3.',1),(15,'2023-02-03','16:18:58','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(16,'2023-02-03','16:19:52','u','h','?/roles/guardar','Se modificó el rol con identificador número 3.',1),(17,'2023-02-03','16:35:38','u','h','?/roles/guardar','Se modificó el rol con identificador número 3.',1),(18,'2023-02-03','16:44:39','u','h','?/roles/guardar','Se modificó el rol con identificador número 3.',1),(19,'2023-02-03','16:44:59','u','h','?/roles/guardar','Se modificó el rol con identificador número 3.',1),(20,'2023-02-03','17:14:22','c','h','?/roles/guardar','Se creó el rol con identificador número 6.',1),(21,'2023-02-03','17:24:49','c','h','?/roles/guardar','Se creó el rol con identificador número 7.',1),(22,'2023-02-03','17:28:26','u','h','?/roles/guardar','Se modificó el rol con identificador número 7.',1),(23,'2023-02-03','17:28:45','u','h','?/roles/guardar','Se modificó el rol con identificador número 7.',1),(24,'2023-02-08','09:32:06','c','h','?/roles/guardar','Se creó el rol con identificador número 8.',1),(25,'2023-02-08','09:39:00','c','h','?/roles/guardar','Se creó el rol con identificador número 9.',1),(26,'2023-02-08','09:47:07','c','h','?/roles/guardar','Se creó el rol con identificador número 10.',1),(27,'2023-02-08','09:54:07','u','h','?/roles/guardar','Se modificó el rol con identificador número 9.',1),(28,'2023-02-08','10:00:26','c','h','?/roles/guardar','Se creó el rol con identificador número 11.',1),(29,'2023-02-08','10:02:22','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 11.',1),(30,'2023-02-08','10:58:38','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 10.',1),(31,'2023-02-08','11:00:45','u','h','?/roles/guardar','Se modificó el rol con identificador número 8.',1),(32,'2023-02-08','11:02:23','c','h','?/roles/guardar','Se creó el rol con identificador número 12.',1),(33,'2023-02-08','11:02:48','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 12.',1),(34,'2023-02-08','11:11:02','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(35,'2023-02-08','11:19:09','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 7.',1),(36,'2023-02-08','11:36:38','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 9.',1),(37,'2023-02-08','11:36:50','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(38,'2023-02-08','11:37:37','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 8.',1),(39,'2023-02-08','11:39:38','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 1.',1),(40,'2023-02-08','11:46:10','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 12.',1),(41,'2023-02-08','11:51:28','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 11.',1),(42,'2023-02-08','11:53:35','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(43,'2023-02-08','11:53:44','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 10.',1),(44,'2023-02-08','11:57:52','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 9.',1),(45,'2023-02-08','12:03:16','c','h','?/roles/guardar','Se creó el rol con identificador número 13.',1),(46,'2023-02-08','12:05:46','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 13.',1),(47,'2023-02-08','13:56:41','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 8.',1),(48,'2023-02-08','14:00:12','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 6.',1),(49,'2023-02-08','14:01:18','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 7.',1),(50,'2023-02-08','14:02:29','c','h','?/roles/guardar','Se creó el rol con identificador número 14.',1),(51,'2023-02-08','14:06:25','u','h','?/roles/guardar','Se modificó el rol con identificador número 2.',1),(52,'2023-02-08','14:06:38','u','h','?/roles/guardar','Se modificó el rol con identificador número 14.',1),(53,'2023-02-08','14:07:26','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 14.',1),(54,'2023-02-08','14:09:43','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 14.',1),(55,'2023-02-08','14:10:07','u','h','?/roles/guardar','Se modificó el rol con identificador número 12.',1),(56,'2023-02-08','14:10:19','c','h','?/roles/guardar','Se creó el rol con identificador número 15.',1),(57,'2023-02-08','14:10:58','u','h','?/roles/guardar','Se modificó el rol con identificador número 11.',1),(58,'2023-02-08','14:11:20','u','h','?/roles/guardar','Se modificó el rol con identificador número 13.',1),(59,'2023-02-08','14:13:05','u','h','?/roles/guardar','Se modificó el rol con identificador número 11.',1),(60,'2023-02-08','15:02:58','c','h','?/roles/guardar','Se creó el rol con identificador número 16.',1),(61,'2023-02-08','15:49:54','c','h','?/areas/guardar','Se creó el rol con identificador número 1.',1),(62,'2023-02-08','15:54:12','c','h','?/areas/guardar','Se creó el rol con identificador número 2.',1),(63,'2023-02-08','15:58:06','d','h','?/areas/eliminar','Se eliminó (Desactivo) el rol con identificador número 2.',1),(64,'2023-02-08','15:59:41','u','h','?/areas/guardar','Se modificó el área con identificador número 2.',1),(65,'2023-02-08','16:01:00','u','h','?/areas/guardar','Se modificó el área con identificador número 2.',1),(66,'2023-02-08','16:55:14','c','h','?/perfiles/guardar','Se creó el rol con identificador número 11.',1),(67,'2023-02-08','16:58:28','u','h','?/perfiles/guardar','Se modificó el rol con identificador número 11.',1),(68,'2023-02-08','16:58:31','d','h','?/perfiles/eliminar','Se eliminó (Desactivo) el rol con identificador número 11.',1),(69,'2023-02-10','10:03:35','u','h','?/roles/guardar','Se modificó el rol con identificador número 15.',0),(70,'2023-02-10','10:03:48','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 16.',0),(71,'2023-02-11','08:45:33','c','h','?/areas/guardar','Se creó el rol con identificador número 3.',1),(72,'2023-02-11','08:50:40','c','h','?/areas/guardar','Se creó el rol con identificador número 4.',1),(73,'2023-02-11','08:58:19','c','h','?/areas/guardar','Se creó el rol con identificador número 5.',1),(74,'2023-02-11','09:56:18','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(75,'2023-02-11','10:01:39','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(76,'2023-02-11','10:24:20','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(77,'2023-02-11','11:46:41','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(78,'2023-02-14','11:34:25','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 5.',1),(79,'2023-02-14','11:39:45','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 5.',1),(80,'2023-02-14','11:39:53','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 5.',1),(81,'2023-02-14','11:42:28','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 1.',1),(82,'2023-02-14','16:29:34','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(83,'2023-02-14','17:13:16','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 7.',1),(84,'2023-02-14','17:15:23','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 7.',1),(85,'2023-02-14','17:18:23','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(86,'2023-02-14','17:20:33','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(87,'2023-02-14','17:23:13','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(88,'2023-02-14','17:24:29','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(89,'2023-02-14','17:24:37','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(90,'2023-02-14','17:27:18','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(91,'2023-02-14','17:30:55','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(92,'2023-02-15','15:43:04','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(93,'2023-02-15','15:51:17','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(94,'2023-02-16','10:18:39','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(95,'2023-02-16','10:18:49','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(96,'2023-02-16','10:27:48','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 7.',1),(97,'2023-02-16','15:12:25','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(98,'2023-02-16','15:35:20','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 8.',1),(99,'2023-02-16','15:37:10','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 7.',1),(100,'2023-02-16','15:39:45','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(101,'2023-02-16','16:18:18','u','h','?/areas/guardar','Se modificó el área con identificador número 2.',1),(102,'2023-02-16','16:28:36','u','h','?/areas/guardar','Se modificó el área con identificador número 2.',1),(103,'2023-02-16','16:36:19','c','h','?/areas/guardar','Se creó el rol con identificador número 6.',1),(104,'2023-02-17','08:15:20','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(105,'2023-02-17','08:15:35','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(106,'2023-02-17','08:18:42','u','h','?/areas/guardar','Se modificó el área con identificador número 2.',1),(107,'2023-02-17','08:18:47','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(108,'2023-02-17','08:20:40','u','h','?/areas/guardar','Se modificó el área con identificador número 1.',1),(109,'2023-02-17','16:03:14','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(110,'2023-02-17','16:03:44','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(111,'2023-02-17','16:04:19','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(112,'2023-02-17','16:11:28','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(113,'2023-02-17','16:17:01','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(114,'2023-02-17','16:20:33','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(115,'2023-02-17','16:22:56','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(116,'2023-02-17','16:23:12','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(117,'2023-02-17','16:35:19','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(118,'2023-02-17','16:38:57','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(119,'2023-02-17','16:40:53','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(120,'2023-02-17','16:41:41','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(121,'2023-02-17','16:42:08','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(122,'2023-02-17','16:44:16','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(123,'2023-02-17','17:09:02','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(124,'2023-02-17','17:11:06','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(125,'2023-02-17','17:12:17','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(126,'2023-02-17','17:15:57','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(127,'2023-02-17','17:21:16','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(128,'2023-02-17','17:24:42','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(129,'2023-02-17','17:26:04','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(130,'2023-02-17','17:42:28','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(131,'2023-02-17','17:44:31','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(132,'2023-02-17','17:46:50','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(133,'2023-02-17','17:46:55','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(134,'2023-02-17','17:55:39','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(135,'2023-02-17','17:57:59','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(136,'2023-02-17','17:59:08','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(137,'2023-02-22','08:14:36','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(138,'2023-02-22','08:16:19','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(139,'2023-02-22','10:58:04','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(140,'2023-02-23','08:15:51','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(141,'2023-02-23','08:16:07','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(142,'2023-02-24','08:06:34','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(143,'2023-02-24','08:06:42','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(144,'2023-02-24','08:55:26','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(145,'2023-02-24','09:06:42','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(146,'2023-02-25','08:04:59','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(147,'2023-02-25','08:05:47','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(148,'2023-02-25','10:52:12','u','h','?/areas/guardar','Se modificó el área con identificador número 2.',1),(149,'2023-02-25','10:52:49','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(150,'2023-02-27','08:11:36','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(151,'2023-02-27','09:13:51','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(152,'2023-02-27','09:22:58','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(153,'2023-02-27','09:23:18','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(154,'2023-02-27','09:33:47','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(155,'2023-02-27','09:33:58','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 1.',1),(156,'2023-02-27','10:00:38','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(157,'2023-02-28','08:08:23','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(158,'2023-02-28','08:10:16','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(159,'2023-03-01','08:17:42','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(160,'2023-03-01','08:17:49','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(161,'2023-03-01','10:22:46','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(162,'2023-03-01','10:23:21','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 2.',1),(163,'2023-03-01','10:24:46','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(164,'2023-03-01','11:08:53','d','h','?/areas/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(165,'2023-03-01','11:17:39','d','h','?/roles/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(166,'2023-03-01','11:20:47','d','h','?/areas/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(167,'2023-03-01','11:35:47','d','h','?/areas/eliminar','Se eliminó (Desactivo) el rol con identificador número 3.',1),(168,'2023-03-01','14:19:32','u','h','?/perfiles/guardar','Se modificó el rol con identificador número 1.',1),(169,'2023-03-02','08:10:46','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(170,'2023-03-02','08:11:39','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(171,'2023-03-02','09:57:30','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(172,'2023-03-02','09:57:35','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(173,'2023-03-02','09:58:37','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(174,'2023-03-02','09:58:41','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(175,'2023-03-03','16:20:13','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(176,'2023-03-03','16:27:27','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(177,'2023-03-04','09:50:24','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(178,'2023-03-23','08:28:52','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(179,'2023-03-23','09:20:05','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(180,'2023-03-23','09:28:04','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(181,'2023-03-23','09:42:03','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(182,'2023-03-23','09:49:25','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(183,'2023-03-23','09:50:36','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(184,'2023-03-23','09:51:51','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(185,'2023-03-23','09:54:08','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(186,'2023-03-23','10:23:48','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(187,'2023-03-23','10:23:53','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(188,'2023-03-23','15:22:36','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(189,'2023-03-23','15:22:42','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(190,'2023-03-23','15:28:42','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(191,'2023-03-23','15:29:01','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(192,'2023-03-23','17:49:23','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(193,'2023-03-24','08:18:47','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(194,'2023-03-24','08:37:57','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(195,'2023-03-27','08:14:00','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(196,'2023-03-27','09:17:02','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(197,'2023-03-27','10:48:10','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 2.',1),(198,'2023-03-28','08:14:43','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(199,'2023-03-28','08:14:51','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(200,'2023-03-28','17:43:21','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(201,'2023-03-28','17:43:26','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(202,'2023-03-29','08:22:36','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(203,'2023-03-29','08:24:41','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(204,'2023-03-31','10:13:36','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(205,'2023-03-31','10:13:42','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(206,'2023-04-01','08:13:06','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(207,'2023-04-01','08:19:06','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(208,'2023-04-03','08:09:39','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(209,'2023-04-03','08:10:54','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(210,'2023-04-04','09:03:49','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(211,'2023-04-04','09:03:55','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(212,'2023-04-04','09:52:30','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(213,'2023-04-04','11:23:14','u','h','?/areas/guardar','Se modificó el área con identificador número 3.',1),(214,'2023-04-04','11:33:22','u','h','?/areas/guardar','Se modificó el área con identificador número 3.',1),(215,'2023-04-04','11:40:27','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(216,'2023-04-04','11:41:11','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(217,'2023-04-04','12:00:11','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(218,'2023-04-04','12:01:59','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(219,'2023-04-04','12:02:28','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(220,'2023-04-04','12:03:18','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(221,'2023-04-04','15:21:07','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 1.',1),(222,'2023-04-04','15:34:21','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(223,'2023-04-04','15:51:58','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(224,'2023-04-04','15:52:26','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(225,'2023-04-04','16:07:27','d','h','?/especialidades/eliminar','Se eliminó (Desactivo) la especialidad con identificador número 1.',1),(226,'2023-04-04','16:08:10','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(227,'2023-04-04','16:08:39','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 1.',1),(228,'2023-04-05','09:07:39','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(229,'2023-04-05','09:07:53','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(230,'2023-04-05','09:44:00','c','h','?/consultorios/guardar','Se creó el consultorio con identificador número .',1),(231,'2023-04-05','10:29:31','c','h','?/consultorios/guardar','Se creó el consultorio con identificador número .',1),(232,'2023-04-05','10:56:18','c','h','?/consultorios/guardar','Se creó el consultorio con identificador número .',1),(233,'2023-04-05','11:03:23','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 3.',1),(234,'2023-04-05','11:06:31','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(235,'2023-04-05','11:09:36','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 3.',1),(236,'2023-04-05','11:09:50','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 3.',1),(237,'2023-04-05','11:10:02','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 2.',1),(238,'2023-04-05','11:10:41','d','h','?/consultorios/eliminar','Se eliminó (Desactivo) la especialidad con identificador número 3.',1),(239,'2023-04-05','11:20:04','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 2.',1),(240,'2023-04-05','11:21:15','d','h','?/consultorios/eliminar','Se eliminó (Desactivo) el consultorio con identificador número 3.',1),(241,'2023-04-05','11:22:06','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 3.',1),(242,'2023-04-05','11:22:24','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 3.',1),(243,'2023-04-05','11:30:32','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(244,'2023-04-05','11:30:57','c','h','?/consultorios/guardar','Se creó el consultorio con identificador número 4.',1),(245,'2023-04-05','11:31:04','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 3.',1),(246,'2023-04-05','11:48:46','c','h','?/especialidades/guardar','Se creó la especialidad con identificador número .',1),(247,'2023-04-05','12:03:58','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(248,'2023-04-06','08:27:40','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(249,'2023-04-10','08:16:56','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(250,'2023-04-10','09:58:25','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(251,'2023-04-10','09:58:35','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(252,'2023-04-10','11:39:38','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(253,'2023-04-10','11:42:58','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(254,'2023-04-10','11:47:05','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(255,'2023-04-10','11:47:25','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(256,'2023-04-10','11:48:25','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(257,'2023-04-10','11:55:49','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(258,'2023-04-10','11:57:05','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(259,'2023-04-10','11:57:27','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(260,'2023-04-10','11:57:48','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(261,'2023-04-10','11:58:13','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(262,'2023-04-10','11:58:42','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(263,'2023-04-11','08:17:39','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(264,'2023-04-11','11:25:36','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(265,'2023-04-11','11:25:58','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(266,'2023-04-11','11:26:17','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(267,'2023-04-11','11:27:33','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(268,'2023-04-11','11:31:31','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(269,'2023-04-11','11:38:17','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(270,'2023-04-11','11:38:26','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(271,'2023-04-11','11:38:52','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(272,'2023-04-11','11:39:08','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(273,'2023-04-11','11:47:36','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(274,'2023-04-11','11:49:24','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(275,'2023-04-11','11:56:57','u','h','?/horarios/guardar','Se modificó el horario con identificador número 9.',1),(276,'2023-04-11','11:58:38','u','h','?/horarios/guardar','Se modificó el horario con identificador número 12.',1),(277,'2023-04-11','11:58:57','u','h','?/horarios/guardar','Se modificó el horario con identificador número 13.',1),(278,'2023-04-11','11:59:13','u','h','?/horarios/guardar','Se modificó el horario con identificador número 14.',1),(279,'2023-04-11','11:59:25','u','h','?/horarios/guardar','Se modificó el horario con identificador número 14.',1),(280,'2023-04-11','14:47:15','u','h','?/horarios/guardar','Se modificó el horario con identificador número 15.',1),(281,'2023-04-11','15:25:06','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(282,'2023-04-11','17:04:06','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(283,'2023-04-12','08:15:58','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(284,'2023-04-12','11:06:07','u','h','?/horarios/guardar','Se modificó el horario con identificador número 2.',1),(285,'2023-04-12','11:07:33','u','h','?/horarios/guardar','Se modificó el horario con identificador número 2.',1),(286,'2023-04-12','11:08:13','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(287,'2023-04-12','11:11:28','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(288,'2023-04-12','11:11:49','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(289,'2023-04-12','11:12:19','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(290,'2023-04-12','11:12:32','u','h','?/horarios/guardar','Se modificó el horario con identificador número 2.',1),(291,'2023-04-12','11:15:11','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(292,'2023-04-12','11:18:23','d','h','?/horarios/eliminar','Se eliminó (Desactivo) el horario con identificador número .',1),(293,'2023-04-12','11:25:44','c','h','?/perfiles/guardar','Se creó el rol con identificador número 2.',1),(294,'2023-04-12','11:29:27','c','h','?/perfiles/guardar','Se creó el rol con identificador número 3.',1),(295,'2023-04-12','15:34:30','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(296,'2023-04-12','16:38:46','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(297,'2023-04-13','08:13:42','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(298,'2023-04-13','11:50:27','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(299,'2023-04-13','11:51:01','c','h','?/roles/guardar','Se creó el rol con identificador número 17.',1),(300,'2023-04-13','11:51:09','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 4.',1),(301,'2023-04-13','11:51:37','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(302,'2023-04-13','11:51:50','u','h','?/horarios/guardar','Se modificó el horario con identificador número 2.',1),(303,'2023-04-13','11:52:16','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(304,'2023-04-13','11:53:00','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(305,'2023-04-13','11:53:12','u','h','?/horarios/guardar','Se modificó el horario con identificador número 3.',1),(306,'2023-04-13','11:55:33','u','h','?/horarios/guardar','Se modificó el horario con identificador número 4.',1),(307,'2023-04-13','11:55:51','d','h','?/horarios/eliminar','Se eliminó (Desactivo) el horario con identificador número .',1),(308,'2023-04-14','09:03:37','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(309,'2023-04-15','16:18:10','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(310,'2023-04-17','08:41:45','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(311,'2023-04-18','08:11:58','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(312,'2023-04-19','08:18:48','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(313,'2023-04-20','08:19:10','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(314,'2023-04-21','09:20:10','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(315,'2023-04-24','08:03:27','r','h','?/sitio/autenticar','Se autentico los datos del usuario con identificador nro.1.',1),(316,'2023-04-24','13:32:23','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 1.',1),(317,'2023-04-24','13:41:14','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 1.',1),(318,'2023-04-24','14:02:59','c','m','?/usuarios/guardar','Se creó el usuario con identificador número .',1),(319,'2023-04-24','14:09:15','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 2.',1),(320,'2023-04-24','14:09:31','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(321,'2023-04-24','14:09:52','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 1.',1),(322,'2023-04-24','14:17:07','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(323,'2023-04-25','11:07:11','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(324,'2023-04-25','12:03:04','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(325,'2023-04-25','13:59:56','d','h','?/horarios/eliminar','Se eliminó (Desactivo) el horario con identificador número .',1),(326,'2023-04-25','15:46:21','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 1.',1),(327,'2023-04-25','15:55:22','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(328,'2023-04-25','15:55:46','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(329,'2023-04-25','15:55:55','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(330,'2023-04-25','15:56:43','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(331,'2023-04-25','15:57:07','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(332,'2023-04-25','15:57:42','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(333,'2023-04-25','15:58:19','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(334,'2023-04-26','08:07:57','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(335,'2023-04-27','08:08:10','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(336,'2023-04-27','16:35:11','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(337,'2023-05-02','08:08:52','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(338,'2023-05-02','17:04:30','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(339,'2023-05-03','08:03:55','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(340,'2023-05-03','15:19:24','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número .',1),(341,'2023-05-03','15:23:10','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 3.',1),(342,'2023-05-03','15:34:37','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 4.',1),(343,'2023-05-03','16:09:11','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 2.',1),(344,'2023-05-03','16:21:34','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 3.',1),(345,'2023-05-03','16:26:15','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 4.',1),(346,'2023-05-03','16:30:38','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 5.',1),(347,'2023-05-03','16:45:49','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 6.',1),(348,'2023-05-03','16:50:23','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 7.',1),(349,'2023-05-04','08:59:33','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(350,'2023-05-04','09:32:50','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 8.',1),(351,'2023-05-04','10:03:40','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 9.',1),(352,'2023-05-04','10:08:43','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 10.',1),(353,'2023-05-04','10:18:53','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 11.',1),(354,'2023-05-04','10:19:12','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 12.',1),(355,'2023-05-04','10:21:17','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 13.',1),(356,'2023-05-04','10:22:47','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 14.',1),(357,'2023-05-04','10:25:39','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 15.',1),(358,'2023-05-04','13:35:59','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 16.',1),(359,'2023-05-04','13:54:23','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 17.',1),(360,'2023-05-04','14:56:04','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 18.',1),(361,'2023-05-05','08:15:15','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(362,'2023-05-05','11:01:21','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(363,'2023-05-05','11:32:04','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 19.',1),(364,'2023-05-05','11:34:30','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 20.',1),(365,'2023-05-05','11:35:30','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 21.',1),(366,'2023-05-05','12:11:47','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 22.',1),(367,'2023-05-06','08:10:46','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(368,'2023-05-06','13:46:51','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 23.',1),(369,'2023-05-06','16:02:21','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(370,'2023-05-08','08:08:18','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(371,'2023-05-08','10:11:31','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 24.',1),(372,'2023-05-08','11:50:02','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(373,'2023-05-08','11:53:51','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 22.',1),(374,'2023-05-08','12:47:42','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(375,'2023-05-08','13:15:26','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 22.',1),(376,'2023-05-08','13:18:07','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 22.',1),(377,'2023-05-08','13:23:58','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 22.',1),(378,'2023-05-08','13:32:52','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 22.',1),(379,'2023-05-08','13:34:37','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(380,'2023-05-08','13:35:13','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(381,'2023-05-08','13:47:05','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(382,'2023-05-08','13:47:41','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(383,'2023-05-08','13:51:16','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 21.',1),(384,'2023-05-08','13:54:15','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 21.',1),(385,'2023-05-08','13:54:47','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 21.',1),(386,'2023-05-08','13:55:34','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(387,'2023-05-08','13:56:08','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(388,'2023-05-08','16:03:02','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(389,'2023-05-09','08:08:08','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(390,'2023-05-09','08:47:14','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 25.',1),(391,'2023-05-09','08:47:48','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(392,'2023-05-09','08:47:56','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(393,'2023-05-09','09:03:02','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 26.',1),(394,'2023-05-09','09:05:17','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(395,'2023-05-09','09:14:39','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(396,'2023-05-09','09:18:35','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(397,'2023-05-09','09:21:04','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(398,'2023-05-09','09:24:11','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(399,'2023-05-09','09:25:15','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(400,'2023-05-09','09:27:33','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 2.',1),(401,'2023-05-09','09:27:41','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 1.',1),(402,'2023-05-09','09:27:45','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 23.',1),(403,'2023-05-09','09:27:49','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 21.',1),(404,'2023-05-09','09:27:53','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(405,'2023-05-09','09:27:57','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(406,'2023-05-09','09:28:00','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(407,'2023-05-09','09:28:03','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 26.',1),(408,'2023-05-09','09:28:07','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(409,'2023-05-09','09:28:11','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 22.',1),(410,'2023-05-09','09:31:46','u','h','?/horarios/guardar','Se modificó el horario con identificador número 5.',1),(411,'2023-05-09','09:32:02','u','h','?/horarios/guardar','Se modificó el horario con identificador número 6.',1),(412,'2023-05-09','09:32:31','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(413,'2023-05-09','09:33:15','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(414,'2023-05-09','10:59:31','u','h','?/horarios/guardar','Se modificó el horario con identificador número 1.',1),(415,'2023-05-09','10:59:52','u','h','?/horarios/guardar','Se modificó el horario con identificador número 2.',1),(416,'2023-05-09','11:00:46','u','h','?/horarios/guardar','Se modificó el horario con identificador número 7.',1),(417,'2023-05-09','11:01:00','u','h','?/horarios/guardar','Se modificó el horario con identificador número 3.',1),(418,'2023-05-09','11:01:17','u','h','?/horarios/guardar','Se modificó el horario con identificador número 4.',1),(419,'2023-05-10','08:15:45','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(420,'2023-05-11','08:24:30','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(421,'2023-05-12','08:07:51','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(422,'2023-05-12','13:45:13','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(423,'2023-05-12','13:45:23','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(424,'2023-05-12','13:51:18','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(425,'2023-05-12','13:53:46','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(426,'2023-05-12','13:58:42','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(427,'2023-05-12','14:01:01','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(428,'2023-05-12','14:02:29','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(429,'2023-05-12','14:05:31','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(430,'2023-05-12','14:12:55','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(431,'2023-05-12','14:38:34','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(432,'2023-05-12','14:41:39','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(433,'2023-05-12','15:04:55','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 27.',1),(434,'2023-05-12','15:06:02','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 21.',1),(435,'2023-05-12','15:11:59','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 28.',1),(436,'2023-05-12','15:12:41','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 27.',1),(437,'2023-05-12','15:15:08','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 27.',1),(438,'2023-05-12','15:17:05','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(439,'2023-05-12','15:23:17','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 27.',1),(440,'2023-05-12','15:46:28','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(441,'2023-05-12','15:46:48','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(442,'2023-05-12','15:58:44','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(443,'2023-05-12','16:11:17','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 2.',1),(444,'2023-05-12','16:11:44','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 2.',1),(445,'2023-05-12','16:12:00','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(446,'2023-05-12','16:12:24','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 2.',1),(447,'2023-05-12','16:12:34','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 27.',1),(448,'2023-05-12','16:18:45','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(449,'2023-05-12','16:18:58','u','h','?/horarios/guardar','Se modificó el horario con identificador número 9.',1),(450,'2023-05-12','16:19:37','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(451,'2023-05-12','16:20:01','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(452,'2023-05-12','16:20:26','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(453,'2023-05-12','16:21:20','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(454,'2023-05-12','16:21:53','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(455,'2023-05-12','16:22:26','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(456,'2023-05-12','16:22:48','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(457,'2023-05-12','16:23:08','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(458,'2023-05-12','16:23:51','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(459,'2023-05-12','16:24:15','u','h','?/horarios/guardar','Se modificó el horario con identificador número 18.',1),(460,'2023-05-12','16:24:39','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(461,'2023-05-12','16:25:06','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(462,'2023-05-12','16:25:25','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(463,'2023-05-12','16:36:46','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 27.',1),(464,'2023-05-12','16:38:24','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(465,'2023-05-12','16:38:27','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 28.',1),(466,'2023-05-12','16:41:03','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 29.',1),(467,'2023-05-12','16:55:50','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 27.',1),(468,'2023-05-15','08:08:04','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(469,'2023-05-15','12:08:47','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(470,'2023-05-15','12:08:52','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(471,'2023-05-15','12:09:23','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 29.',1),(472,'2023-05-16','08:12:39','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(473,'2023-05-16','09:00:24','c','h','?/consultorios/guardar','Se creó el consultorio con identificador número 5.',1),(474,'2023-05-16','09:00:44','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 1.',1),(475,'2023-05-16','09:16:55','c','m','?/usuarios/guardar','Se creó el usuario con identificador número .',1),(476,'2023-05-16','09:20:06','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(477,'2023-05-16','09:20:41','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(478,'2023-05-16','09:58:47','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 29.',1),(479,'2023-05-16','10:43:06','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(480,'2023-05-16','11:12:02','u','h','?/horarios/guardar','Se modificó el horario con identificador número 15.',1),(481,'2023-05-16','11:14:24','u','h','?/horarios/guardar','Se modificó el horario con identificador número 11.',1),(482,'2023-05-16','11:14:49','u','h','?/horarios/guardar','Se modificó el horario con identificador número 12.',1),(483,'2023-05-16','11:15:27','u','h','?/horarios/guardar','Se modificó el horario con identificador número 13.',1),(484,'2023-05-16','11:15:47','u','h','?/horarios/guardar','Se modificó el horario con identificador número 14.',1),(485,'2023-05-16','11:18:33','u','h','?/horarios/guardar','Se modificó el horario con identificador número 15.',1),(486,'2023-05-16','11:19:31','u','h','?/horarios/guardar','Se modificó el horario con identificador número 21.',1),(487,'2023-05-16','11:19:46','u','h','?/horarios/guardar','Se modificó el horario con identificador número 22.',1),(488,'2023-05-16','14:54:06','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 18.',1),(489,'2023-05-16','14:54:43','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 18.',1),(490,'2023-05-16','16:31:38','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 29.',1),(491,'2023-05-16','16:52:29','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 29.',1),(492,'2023-05-16','16:54:16','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 29.',1),(493,'2023-05-17','08:13:48','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(494,'2023-05-17','08:46:44','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 29.',1),(495,'2023-05-17','10:35:56','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 30.',1),(496,'2023-05-17','15:26:10','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 31.',1),(497,'2023-05-17','17:00:46','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(498,'2023-05-18','08:27:51','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(499,'2023-05-18','11:51:52','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(500,'2023-05-18','12:09:56','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 16.',1),(501,'2023-05-18','13:49:09','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 18.',1),(502,'2023-05-18','13:53:30','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(503,'2023-05-18','13:53:48','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(504,'2023-05-18','13:54:55','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 25.',1),(505,'2023-05-18','15:51:34','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(506,'2023-05-18','16:29:13','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 32.',1),(507,'2023-05-18','16:30:15','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(508,'2023-05-18','16:38:56','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(509,'2023-05-19','08:11:03','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(510,'2023-05-19','08:55:44','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(511,'2023-05-19','08:55:55','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(512,'2023-05-19','09:16:55','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 24.',1),(513,'2023-05-19','11:45:46','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(514,'2023-05-19','11:46:19','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(515,'2023-05-19','11:48:49','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(516,'2023-05-19','11:51:24','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(517,'2023-05-19','13:30:10','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(518,'2023-05-19','16:45:47','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 33.',1),(519,'2023-05-19','16:51:16','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 33.',1),(520,'2023-05-19','16:52:59','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 33.',1),(521,'2023-05-19','16:54:17','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 33.',1),(522,'2023-05-19','16:55:10','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 33.',1),(523,'2023-05-19','16:56:12','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(524,'2023-05-22','08:22:32','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(525,'2023-05-22','08:30:33','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 9.',1),(526,'2023-05-22','08:30:41','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 13.',1),(527,'2023-05-22','08:30:47','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 15.',1),(528,'2023-05-22','08:30:55','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 14.',1),(529,'2023-05-22','08:31:03','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 11.',1),(530,'2023-05-22','08:31:07','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 12.',1),(531,'2023-05-22','08:31:10','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 10.',1),(532,'2023-05-22','08:33:50','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(533,'2023-05-22','08:34:35','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 20.',1),(534,'2023-05-22','08:39:35','u','h','?/areas/guardar','Se modificó el área con identificador número 6.',1),(535,'2023-05-22','08:40:39','u','h','?/perfiles/guardar','Se modificó el rol con identificador número 2.',1),(536,'2023-05-22','08:50:26','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 34.',1),(537,'2023-05-22','09:03:30','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(538,'2023-05-22','09:17:33','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(539,'2023-05-22','09:18:00','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(540,'2023-05-22','09:27:09','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(541,'2023-05-22','09:27:35','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(542,'2023-05-22','09:37:25','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(543,'2023-05-22','09:39:42','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(544,'2023-05-22','10:02:00','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 32.',1),(545,'2023-05-22','13:35:55','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(546,'2023-05-22','13:38:33','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(547,'2023-05-22','13:41:49','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(548,'2023-05-22','13:44:09','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(549,'2023-05-22','13:49:36','c','h','?/consultorios/guardar','Se creó el consultorio con identificador número 6.',1),(550,'2023-05-22','13:53:07','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(551,'2023-05-22','14:00:28','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 35.',1),(552,'2023-05-22','14:03:02','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 34.',1),(553,'2023-05-22','14:04:00','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 35.',1),(554,'2023-05-22','14:12:52','c','h','?/areas/guardar','Se creó el rol con identificador número 7.',1),(555,'2023-05-22','14:14:02','c','m','?/usuarios/guardar','Se creó el usuario con identificador número .',1),(556,'2023-05-22','14:17:26','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 4.',1),(557,'2023-05-22','14:20:07','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(558,'2023-05-22','14:20:52','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(559,'2023-05-22','14:21:16','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(560,'2023-05-22','14:21:33','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(561,'2023-05-22','14:22:22','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(562,'2023-05-22','14:23:00','c','h','?/horarios/guardar','Se creó el horario con identificador número .',1),(563,'2023-05-22','14:27:55','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 36.',1),(564,'2023-05-22','14:28:19','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 35.',1),(565,'2023-05-22','14:32:42','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 35.',1),(566,'2023-05-22','14:33:47','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(567,'2023-05-22','15:28:55','c','h','?/evaluacion/guardar','Se creó la reserva para la evaluación con identificador número 37.',1),(568,'2023-05-22','15:29:10','d','h','?/evaluacion/eliminar','Se eliminó (Desactivo) la reserva con identificador número 37.',1),(569,'2023-05-22','15:52:35','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(570,'2023-05-22','16:00:46','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 4.',1),(571,'2023-05-22','16:07:24','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(572,'2023-05-23','08:19:01','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(573,'2023-05-23','08:21:36','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 4.',1),(574,'2023-05-23','13:54:34','c','m','?/usuarios/guardar','Se creó el usuario con identificador número .',1),(575,'2023-05-23','14:09:28','c','m','?/usuarios/guardar','Se creó el usuario con identificador número .',1),(576,'2023-05-23','15:25:43','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 7.',1),(577,'2023-05-23','16:28:49','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 0.',1),(578,'2023-05-23','16:58:53','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 3.',1),(579,'2023-05-23','17:02:02','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(580,'2023-05-24','08:23:46','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(581,'2023-05-24','08:44:48','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(582,'2023-05-24','08:45:24','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(583,'2023-05-24','09:08:13','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(584,'2023-05-24','09:15:11','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(585,'2023-05-24','09:22:34','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(586,'2023-05-24','09:22:45','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(587,'2023-05-24','09:23:02','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(588,'2023-05-24','09:23:38','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(589,'2023-05-24','09:26:13','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(590,'2023-05-24','09:27:26','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(591,'2023-05-24','09:27:48','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(592,'2023-05-24','09:29:56','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 1.',1),(593,'2023-05-24','09:31:49','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 2.',1),(594,'2023-05-24','09:35:29','d','h','?/usuarios/eliminar','Se eliminó (Desactivo) el usuario con identificador número 2.',1),(595,'2023-05-24','10:41:15','c','h','?/areas/guardar','Se creó el rol con identificador número 8.',1),(596,'2023-05-24','11:00:30','u','h','?/areas/guardar','Se modificó el área con identificador número 7.',1),(597,'2023-05-24','11:22:26','u','h','?/areas/guardar','Se modificó el área con identificador número 7.',1),(598,'2023-05-24','11:23:11','u','h','?/areas/guardar','Se modificó el área con identificador número 7.',1),(599,'2023-05-24','11:23:20','u','h','?/areas/guardar','Se modificó el área con identificador número 7.',1),(600,'2023-05-24','11:46:33','u','h','?/perfiles/guardar','Se modificó el perfil con identificador número 3.',1),(601,'2023-05-24','11:47:18','u','h','?/perfiles/guardar','Se modificó el perfil con identificador número 3.',1),(602,'2023-05-24','11:58:23','u','h','?/perfiles/guardar','Se modificó el perfil con identificador número 3.',1),(603,'2023-05-24','13:34:40','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(604,'2023-05-24','13:34:49','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(605,'2023-05-24','13:35:44','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(606,'2023-05-24','13:36:11','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(607,'2023-05-24','14:00:27','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(608,'2023-05-24','14:09:35','u','h','?/roles/guardar','Se modificó el rol con identificador número 1.',1),(609,'2023-05-24','14:11:25','c','h','?/roles/guardar','Se creó el rol con identificador número 18.',1),(610,'2023-05-24','14:12:36','c','h','?/roles/guardar','Se creó el rol con identificador número 19.',1),(611,'2023-05-24','14:18:30','c','h','?/perfiles/guardar','Se creó el perfil con identificador número 4.',1),(612,'2023-05-24','14:20:50','c','h','?/perfiles/guardar','Se creó el perfil con identificador número 5.',1),(613,'2023-05-24','14:21:27','u','h','?/perfiles/guardar','Se modificó el perfil con identificador número 4.',1),(614,'2023-05-24','14:21:54','u','h','?/roles/guardar','Se modificó el rol con identificador número 17.',1),(615,'2023-05-24','14:28:00','c','h','?/perfiles/guardar','Se creó el perfil con identificador número 6.',1),(616,'2023-05-24','14:29:45','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 8.',1),(617,'2023-05-24','14:34:47','c','m','?/usuarios/guardar','Se creó el usuario con identificador número 9.',1),(618,'2023-05-24','14:35:29','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 6.',1),(619,'2023-05-24','16:04:39','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 2.',1),(620,'2023-05-24','16:06:17','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 2.',1),(621,'2023-05-24','16:11:40','u','h','?/especialidades/guardar','Se modificó la especialidad con identificador número 2.',1),(622,'2023-05-24','17:16:04','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(623,'2023-05-25','10:00:32','r','h','?/sitio/login','Se autenticó los datos del usuario con identificador número 1.',1),(624,'2023-05-25','10:07:09','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(625,'2023-05-25','10:11:37','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(626,'2023-05-25','10:11:47','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(627,'2023-05-25','10:28:26','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(628,'2023-05-25','10:28:34','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(629,'2023-05-25','10:28:50','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(630,'2023-05-25','11:01:20','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(631,'2023-05-25','11:01:27','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(632,'2023-05-25','14:27:11','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 34.',1),(633,'2023-05-25','14:27:51','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 35.',1),(634,'2023-05-25','14:27:55','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 35.',1),(635,'2023-05-25','14:29:26','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 36.',1),(636,'2023-05-25','14:29:48','u','h','?/evaluacion/guardar','Se modificó el registro de evaluación con identificador número 19.',1),(637,'2023-05-25','15:07:37','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(638,'2023-05-25','15:07:43','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(639,'2023-05-25','15:08:59','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(640,'2023-05-25','15:09:09','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(641,'2023-05-25','15:09:20','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(642,'2023-05-25','15:09:20','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(643,'2023-05-25','15:10:29','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(644,'2023-05-25','15:10:52','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(645,'2023-05-25','15:10:52','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(646,'2023-05-25','15:11:38','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(647,'2023-05-25','15:30:31','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(648,'2023-05-25','15:30:31','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(649,'2023-05-25','15:30:39','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(650,'2023-05-25','15:57:35','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(651,'2023-05-25','15:57:35','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(652,'2023-05-25','15:57:41','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(653,'2023-05-25','16:09:51','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(654,'2023-05-25','16:09:54','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(655,'2023-05-25','16:10:20','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(656,'2023-05-25','16:10:20','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(657,'2023-05-25','16:12:13','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(658,'2023-05-25','16:17:29','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(659,'2023-05-25','16:17:29','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(660,'2023-05-25','16:24:02','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(661,'2023-05-25','16:24:28','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(662,'2023-05-25','16:24:28','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(663,'2023-05-25','16:31:14','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(664,'2023-05-25','16:35:37','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(665,'2023-05-25','16:40:45','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(666,'2023-05-25','16:40:45','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(667,'2023-05-25','16:44:28','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(668,'2023-05-25','16:47:02','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(669,'2023-05-25','16:47:02','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(670,'2023-05-25','16:47:31','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(671,'2023-05-25','16:48:20','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(672,'2023-05-25','16:48:20','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(673,'2023-05-25','16:48:24','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(674,'2023-05-26','08:09:03','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(675,'2023-05-26','08:58:49','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 2.',1),(676,'2023-05-26','08:59:55','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 2.',1),(677,'2023-05-26','09:01:00','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 2.',1),(678,'2023-05-26','09:18:27','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 2.',1),(679,'2023-05-26','09:24:47','u','h','?/consultorios/guardar','Se modificó el consultorio con identificador número 1.',1),(680,'2023-05-26','11:46:07','c','h','?/horarios/guardar','Se creó el horario con identificador número 32.',1),(681,'2023-05-26','11:59:59','c','h','?/horarios/guardar','Se creó el horario con identificador número 33.',1),(682,'2023-05-26','13:50:59','c','h','?/horarios/guardar','Se creó el horario con identificador número 34.',1),(683,'2023-05-26','13:52:31','c','h','?/horarios/guardar','Se creó el horario con identificador número 35.',1),(684,'2023-05-26','13:54:37','c','h','?/horarios/guardar','Se creó el horario con identificador número 36.',1),(685,'2023-05-26','13:55:50','u','h','?/horarios/guardar','Se modificó el horario con identificador número 36.',1),(686,'2023-05-26','13:59:38','u','h','?/horarios/guardar','Se modificó el horario con identificador número 36.',1),(687,'2023-05-26','14:00:13','d','h','?/horarios/eliminar','Se eliminó (Desactivo) el horario con identificador número .',1),(688,'2023-05-26','14:09:47','c','h','?/horarios/guardar','Se creó el horario con identificador número 37.',1),(689,'2023-05-26','17:10:14','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(690,'2023-05-29','08:19:08','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(691,'2023-05-30','08:08:28','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(692,'2023-05-31','08:16:31','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(693,'2023-05-31','16:28:23','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(694,'2023-05-31','16:39:40','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(695,'2023-05-31','17:00:34','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(696,'2023-06-01','08:18:43','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(697,'2023-06-01','16:58:09','c','h','?/permisos/guardar','Se creó el permiso con id 0.',1),(698,'2023-06-01','16:59:08','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(699,'2023-06-02','08:26:39','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(700,'2023-06-02','12:48:11','u','h','?/permisos/guardar','Se modificó permisos para usuarios con id 34.',1),(701,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para áreas con id 35.',1),(702,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para perfiles con id 36.',1),(703,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para roles con id 37.',1),(704,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para horarios con id 38.',1),(705,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó los permisos para permiso con id 39.',1),(706,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para especialidades con id 40.',1),(707,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para consultorios con id 41.',1),(708,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para patologías con id 42.',1),(709,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para inscripciones con id 43.',1),(710,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó el permiso principal de agendamiento con id 44.',1),(711,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para evaluaciones con id 45.',1),(712,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para reevaluaciones con id 46.',1),(713,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permiso para agendamiento UTA con id 47.',1),(714,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos con agendamiento URI con id 48.',1),(715,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó el permiso de historial médico con id 49.',1),(716,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para historiales adultos con id 50.',1),(717,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permiso para historiales traumatológicos con id 51.',1),(718,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para historiales pediátricos con id 52.',1),(719,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó el permiso de seguimiento médico con id 53.',1),(720,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para seguimiento enfermería con id 54.',1),(721,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para seguimiento UTA con id 55.',1),(722,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para seguimiento URI con id 56.',1),(723,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó el permiso de licencias con id 57.',1),(724,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para licencias médicas con id 58.',1),(725,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para licencias externas con id 59.',1),(726,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó el permiso de módulo pagos con id 60.',1),(727,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para pagos con id 61.',1),(728,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para gastos con id 62.',1),(729,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para tarifas con id 63.',1),(730,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para caja con id 64.',1),(731,'2023-06-02','12:48:11','c','h','?/permisos/guardar','Se creó permisos para reportes con id 65.',1),(732,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para usuarios con id 34.',1),(733,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para áreas con id 35.',1),(734,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para perfiles con id 36.',1),(735,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para roles con id 37.',1),(736,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para horarios con id 38.',1),(737,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para permisos con id 39.',1),(738,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para especialidades con id 40.',1),(739,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para consultorios con id 41.',1),(740,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para patologÍas con id 42.',1),(741,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para inscripciones con id 43.',1),(742,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó el permiso principal de agendamiento con id 44.',1),(743,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para evaluaciones con id 45.',1),(744,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para reevaluaciones con id 46.',1),(745,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permiso para agendamiento UTA con id 47.',1),(746,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para agendamiento URI con id 48.',1),(747,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó el permiso historiales médicos con id 49.',1),(748,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permiso para historiales adultos con id 50.',1),(749,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para historiales traumatológicos con id 51.',1),(750,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para historiales pediátricos con id 52.',1),(751,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó el permiso seguimiento médico con id 53.',1),(752,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para seguimiento enfermería con id 54.',1),(753,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para seguimiento UTA con id 55.',1),(754,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para seguimiento URI con id 56.',1),(755,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó el permiso de licencias con id 57.',1),(756,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para licencias médicas con id 58.',1),(757,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para licencias externas con id 59.',1),(758,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó el permiso de módulo pagos con id 60.',1),(759,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos de pagos con id 61.',1),(760,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para gastos con id 62.',1),(761,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para tarifas con id 63.',1),(762,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para caja con id 64.',1),(763,'2023-06-02','12:51:37','u','h','?/permisos/guardar','Se modificó permisos para reportes con id 65.',1),(764,'2023-06-02','13:57:03','u','h','?/permisos/guardar','Se modificó permisos para áreas con id 35.',1),(765,'2023-06-02','14:49:58','u','h','?/permisos/guardar','Se modificó permisos para usuarios con id 34.',1),(766,'2023-06-02','15:07:03','c','h','?/permisos/guardar','Se creó el permiso para el módulo de administracion con id 66.',1),(767,'2023-06-02','15:07:03','c','h','?/permisos/guardar','Se creó permisos para especialidades con id 67.',1),(768,'2023-06-02','15:07:03','c','h','?/permisos/guardar','Se creó permisos para consultorios con id 68.',1),(769,'2023-06-02','15:07:03','c','h','?/permisos/guardar','Se creó permisos para patologías con id 69.',1),(770,'2023-06-02','15:10:42','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(771,'2023-06-02','15:12:40','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(772,'2023-06-02','15:14:28','u','m','?/usuarios/guardar','Se modificó el usuario con identificador número 5.',1),(773,'2023-06-02','15:15:10','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(774,'2023-06-02','15:15:43','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 5.',5),(775,'2023-06-02','15:16:29','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 5.',5),(776,'2023-06-02','15:16:36','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(777,'2023-06-02','15:16:49','u','h','?/sitio/login','Se modificó los datos de inicio de sesion para usuario con identificador 1.',0),(778,'2023-06-02','15:16:49','r','m','?/sitio/salir','Se finalizó la sesión del usuario con identificador número 1.',1),(779,'2023-06-02','15:16:55','r','h','?/sitio/autenticar','Se autenticó los datos del usuario con identificador número 1.',1),(780,'2023-06-02','15:57:55','c','h','?/patologias/guardar','Se creó el rol con identificador número 1.',1),(781,'2023-06-02','16:01:12','c','h','?/patologias/guardar','Se creó el rol con identificador número 2.',1),(782,'2023-06-02','16:05:15','u','h','?/patologias/guardar','Se modificó la patología con identificador número 1.',1),(783,'2023-06-02','16:07:55','c','h','?/patologias/guardar','Se creó el rol con identificador número 3.',1),(784,'2023-06-02','16:22:52','c','h','?/patologias/guardar','Se creó la patología con identificador número 4.',1),(785,'2023-06-02','16:24:37','c','h','?/patologias/guardar','Se creó la patología con identificador número 5.',1),(786,'2023-06-02','16:25:24','u','h','?/patologias/guardar','Se modificó la patología con identificador número 1.',1);
/*!40000 ALTER TABLE `sys_procesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_tutor_paciente`
--

DROP TABLE IF EXISTS `sys_tutor_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_tutor_paciente` (
  `tutor_id` int NOT NULL,
  `paciente_id` int NOT NULL,
  `parentesco` enum('Padre','Madre','Hermano','Hermana','Tutor') NOT NULL DEFAULT 'Padre',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`tutor_id`,`paciente_id`),
  KEY `paciente_id` (`paciente_id`),
  CONSTRAINT `sys_tutor_paciente_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `ins_tutor` (`id_tutor`),
  CONSTRAINT `sys_tutor_paciente_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `ins_paciente` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_tutor_paciente`
--

LOCK TABLES `sys_tutor_paciente` WRITE;
/*!40000 ALTER TABLE `sys_tutor_paciente` DISABLE KEYS */;
INSERT INTO `sys_tutor_paciente` VALUES (1,1,'Madre','A'),(2,2,'Madre','A'),(3,18,'Padre','A'),(4,19,'Padre','A'),(5,20,'Padre','A'),(6,21,'Padre','A'),(7,22,'Padre','A'),(8,23,'Madre','A'),(9,24,'Padre','A'),(10,25,'Padre','A'),(11,26,'Madre','A'),(12,27,'Padre','A'),(13,28,'Padre','A'),(14,29,'','A'),(15,34,'Madre','A'),(16,37,'Padre','A');
/*!40000 ALTER TABLE `sys_tutor_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_historial`
--

DROP TABLE IF EXISTS `sys_users_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_users_historial` (
  `id_user_historial` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `login_at_fecha` date NOT NULL,
  `login_at_hora` time NOT NULL,
  `logout_at_fecha` date NOT NULL,
  `logout_at_hora` time NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `direccion` text NOT NULL,
  PRIMARY KEY (`id_user_historial`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_historial`
--

LOCK TABLES `sys_users_historial` WRITE;
/*!40000 ALTER TABLE `sys_users_historial` DISABLE KEYS */;
INSERT INTO `sys_users_historial` VALUES (1,1,'2023-01-27','14:29:23','0000-00-00','00:00:00','2023-01-27 14:29:23','0000-00-00 00:00:00','?/sitio/autenticar'),(2,1,'2023-01-27','14:29:39','0000-00-00','00:00:00','2023-01-27 14:29:39','0000-00-00 00:00:00','?/sitio/autenticar'),(3,1,'2023-01-27','14:33:48','0000-00-00','00:00:00','2023-01-27 14:33:48','0000-00-00 00:00:00','?/sitio/autenticar'),(4,1,'2023-01-27','16:28:58','0000-00-00','00:00:00','2023-01-27 16:28:58','0000-00-00 00:00:00','?/sitio/autenticar'),(5,1,'2023-01-28','08:35:06','0000-00-00','00:00:00','2023-01-28 08:35:06','0000-00-00 00:00:00','?/sitio/autenticar'),(6,1,'0000-00-00','00:00:00','2023-02-16','10:18:39','0000-00-00 00:00:00','2023-02-16 10:18:39','?/sitio/salir'),(7,1,'2023-02-16','10:18:49','0000-00-00','00:00:00','2023-02-16 10:18:49','0000-00-00 00:00:00','?/sitio/autenticar'),(8,1,'0000-00-00','00:00:00','2023-02-17','08:15:20','0000-00-00 00:00:00','2023-02-17 08:15:20','?/sitio/salir'),(9,1,'2023-02-17','08:15:35','0000-00-00','00:00:00','2023-02-17 08:15:35','0000-00-00 00:00:00','?/sitio/autenticar'),(10,1,'0000-00-00','00:00:00','2023-02-22','08:14:36','0000-00-00 00:00:00','2023-02-22 08:14:36','?/sitio/salir'),(11,1,'2023-02-22','08:16:19','0000-00-00','00:00:00','2023-02-22 08:16:19','0000-00-00 00:00:00','?/sitio/autenticar'),(12,1,'0000-00-00','00:00:00','2023-02-23','08:15:51','0000-00-00 00:00:00','2023-02-23 08:15:51','?/sitio/salir'),(13,1,'2023-02-23','08:16:07','0000-00-00','00:00:00','2023-02-23 08:16:07','0000-00-00 00:00:00','?/sitio/autenticar'),(14,1,'0000-00-00','00:00:00','2023-02-24','08:06:34','0000-00-00 00:00:00','2023-02-24 08:06:34','?/sitio/salir'),(15,1,'2023-02-24','08:06:42','0000-00-00','00:00:00','2023-02-24 08:06:42','0000-00-00 00:00:00','?/sitio/autenticar'),(16,1,'0000-00-00','00:00:00','2023-02-25','08:04:59','0000-00-00 00:00:00','2023-02-25 08:04:59','?/sitio/salir'),(17,1,'2023-02-25','08:05:47','0000-00-00','00:00:00','2023-02-25 08:05:47','0000-00-00 00:00:00','?/sitio/autenticar'),(18,1,'0000-00-00','00:00:00','2023-02-27','08:11:36','0000-00-00 00:00:00','2023-02-27 08:11:36','?/sitio/salir'),(19,1,'2023-02-27','09:13:51','0000-00-00','00:00:00','2023-02-27 09:13:51','0000-00-00 00:00:00','?/sitio/autenticar'),(20,1,'0000-00-00','00:00:00','2023-02-27','09:22:58','0000-00-00 00:00:00','2023-02-27 09:22:58','?/sitio/salir'),(21,1,'2023-02-27','09:23:18','0000-00-00','00:00:00','2023-02-27 09:23:18','0000-00-00 00:00:00','?/sitio/autenticar'),(22,1,'0000-00-00','00:00:00','2023-02-28','08:08:23','0000-00-00 00:00:00','2023-02-28 08:08:23','?/sitio/salir'),(23,1,'2023-02-28','08:10:16','0000-00-00','00:00:00','2023-02-28 08:10:16','0000-00-00 00:00:00','?/sitio/autenticar'),(24,1,'0000-00-00','00:00:00','2023-03-01','08:17:42','0000-00-00 00:00:00','2023-03-01 08:17:42','?/sitio/salir'),(25,1,'2023-03-01','08:17:49','0000-00-00','00:00:00','2023-03-01 08:17:49','0000-00-00 00:00:00','?/sitio/autenticar'),(26,1,'0000-00-00','00:00:00','2023-03-02','08:10:46','0000-00-00 00:00:00','2023-03-02 08:10:46','?/sitio/salir'),(27,1,'2023-03-02','08:11:39','0000-00-00','00:00:00','2023-03-02 08:11:39','0000-00-00 00:00:00','?/sitio/autenticar'),(28,1,'0000-00-00','00:00:00','2023-03-02','09:57:30','0000-00-00 00:00:00','2023-03-02 09:57:30','?/sitio/salir'),(29,1,'2023-03-02','09:57:35','0000-00-00','00:00:00','2023-03-02 09:57:35','0000-00-00 00:00:00','?/sitio/autenticar'),(30,1,'0000-00-00','00:00:00','2023-03-02','09:58:37','0000-00-00 00:00:00','2023-03-02 09:58:37','?/sitio/salir'),(31,1,'2023-03-02','09:58:41','0000-00-00','00:00:00','2023-03-02 09:58:41','0000-00-00 00:00:00','?/sitio/autenticar'),(32,1,'0000-00-00','00:00:00','2023-03-03','16:20:13','0000-00-00 00:00:00','2023-03-03 16:20:13','?/sitio/salir'),(33,1,'2023-03-03','16:27:27','0000-00-00','00:00:00','2023-03-03 16:27:27','0000-00-00 00:00:00','?/sitio/autenticar'),(34,1,'0000-00-00','00:00:00','2023-03-04','09:50:24','0000-00-00 00:00:00','2023-03-04 09:50:24','?/sitio/salir'),(35,1,'2023-03-23','08:28:52','0000-00-00','00:00:00','2023-03-23 08:28:52','0000-00-00 00:00:00','?/sitio/autenticar'),(36,1,'0000-00-00','00:00:00','2023-03-23','09:20:05','0000-00-00 00:00:00','2023-03-23 09:20:05','?/sitio/salir'),(37,1,'2023-03-23','09:28:04','0000-00-00','00:00:00','2023-03-23 09:28:04','0000-00-00 00:00:00','?/sitio/autenticar'),(38,1,'2023-03-23','09:42:03','0000-00-00','00:00:00','2023-03-23 09:42:03','0000-00-00 00:00:00','?/sitio/autenticar'),(39,1,'2023-03-23','09:49:25','0000-00-00','00:00:00','2023-03-23 09:49:25','0000-00-00 00:00:00','?/sitio/autenticar'),(40,1,'2023-03-23','09:50:36','0000-00-00','00:00:00','2023-03-23 09:50:36','0000-00-00 00:00:00','?/sitio/autenticar'),(41,1,'2023-03-23','09:51:51','0000-00-00','00:00:00','2023-03-23 09:51:51','0000-00-00 00:00:00','?/sitio/autenticar'),(42,1,'2023-03-23','09:54:08','0000-00-00','00:00:00','2023-03-23 09:54:08','0000-00-00 00:00:00','?/sitio/autenticar'),(43,1,'0000-00-00','00:00:00','2023-03-23','10:23:48','0000-00-00 00:00:00','2023-03-23 10:23:48','?/sitio/salir'),(44,1,'2023-03-23','10:23:53','0000-00-00','00:00:00','2023-03-23 10:23:53','0000-00-00 00:00:00','?/sitio/autenticar'),(45,1,'0000-00-00','00:00:00','2023-03-23','15:22:36','0000-00-00 00:00:00','2023-03-23 15:22:36','?/sitio/salir'),(46,1,'2023-03-23','15:22:42','0000-00-00','00:00:00','2023-03-23 15:22:42','0000-00-00 00:00:00','?/sitio/autenticar'),(47,1,'0000-00-00','00:00:00','2023-03-23','15:28:42','0000-00-00 00:00:00','2023-03-23 15:28:42','?/sitio/salir'),(48,1,'2023-03-23','15:29:01','0000-00-00','00:00:00','2023-03-23 15:29:01','0000-00-00 00:00:00','?/sitio/autenticar'),(49,1,'2023-03-23','17:49:23','0000-00-00','00:00:00','2023-03-23 17:49:23','0000-00-00 00:00:00','?/sitio/autenticar'),(50,1,'0000-00-00','00:00:00','2023-03-24','08:18:47','0000-00-00 00:00:00','2023-03-24 08:18:47','?/sitio/salir'),(51,1,'2023-03-24','08:37:57','0000-00-00','00:00:00','2023-03-24 08:37:57','0000-00-00 00:00:00','?/sitio/autenticar'),(52,1,'0000-00-00','00:00:00','2023-03-27','08:14:00','0000-00-00 00:00:00','2023-03-27 08:14:00','?/sitio/salir'),(53,1,'2023-03-27','09:17:02','0000-00-00','00:00:00','2023-03-27 09:17:02','0000-00-00 00:00:00','?/sitio/autenticar'),(54,1,'0000-00-00','00:00:00','2023-03-28','08:14:43','0000-00-00 00:00:00','2023-03-28 08:14:43','?/sitio/salir'),(55,1,'2023-03-28','08:14:51','0000-00-00','00:00:00','2023-03-28 08:14:51','0000-00-00 00:00:00','?/sitio/autenticar'),(56,1,'0000-00-00','00:00:00','2023-03-28','17:43:21','0000-00-00 00:00:00','2023-03-28 17:43:21','?/sitio/salir'),(57,1,'2023-03-28','17:43:26','0000-00-00','00:00:00','2023-03-28 17:43:26','0000-00-00 00:00:00','?/sitio/autenticar'),(58,1,'0000-00-00','00:00:00','2023-03-29','08:22:36','0000-00-00 00:00:00','2023-03-29 08:22:36','?/sitio/salir'),(59,1,'2023-03-29','08:24:41','0000-00-00','00:00:00','2023-03-29 08:24:41','0000-00-00 00:00:00','?/sitio/autenticar'),(60,1,'0000-00-00','00:00:00','2023-03-31','10:13:36','0000-00-00 00:00:00','2023-03-31 10:13:36','?/sitio/salir'),(61,1,'2023-03-31','10:13:42','0000-00-00','00:00:00','2023-03-31 10:13:42','0000-00-00 00:00:00','?/sitio/autenticar'),(62,1,'0000-00-00','00:00:00','2023-04-01','08:13:06','0000-00-00 00:00:00','2023-04-01 08:13:06','?/sitio/salir'),(63,1,'2023-04-01','08:19:06','0000-00-00','00:00:00','2023-04-01 08:19:06','0000-00-00 00:00:00','?/sitio/autenticar'),(64,1,'0000-00-00','00:00:00','2023-04-03','08:09:39','0000-00-00 00:00:00','2023-04-03 08:09:39','?/sitio/salir'),(65,1,'2023-04-03','08:10:54','0000-00-00','00:00:00','2023-04-03 08:10:54','0000-00-00 00:00:00','?/sitio/autenticar'),(66,1,'0000-00-00','00:00:00','2023-04-04','09:03:49','0000-00-00 00:00:00','2023-04-04 09:03:49','?/sitio/salir'),(67,1,'2023-04-04','09:03:55','0000-00-00','00:00:00','2023-04-04 09:03:55','0000-00-00 00:00:00','?/sitio/autenticar'),(68,1,'0000-00-00','00:00:00','2023-04-05','09:07:39','0000-00-00 00:00:00','2023-04-05 09:07:39','?/sitio/salir'),(69,1,'2023-04-05','09:07:53','0000-00-00','00:00:00','2023-04-05 09:07:53','0000-00-00 00:00:00','?/sitio/autenticar'),(70,1,'0000-00-00','00:00:00','2023-04-05','12:03:58','0000-00-00 00:00:00','2023-04-05 12:03:58','?/sitio/salir'),(71,1,'2023-04-06','08:27:40','0000-00-00','00:00:00','2023-04-06 08:27:40','0000-00-00 00:00:00','?/sitio/autenticar'),(72,1,'2023-04-10','08:16:56','0000-00-00','00:00:00','2023-04-10 08:16:56','0000-00-00 00:00:00','?/sitio/autenticar'),(73,1,'0000-00-00','00:00:00','2023-04-10','09:58:25','0000-00-00 00:00:00','2023-04-10 09:58:25','?/sitio/salir'),(74,1,'2023-04-10','09:58:35','0000-00-00','00:00:00','2023-04-10 09:58:35','0000-00-00 00:00:00','?/sitio/autenticar'),(75,1,'2023-04-11','08:17:39','0000-00-00','00:00:00','2023-04-11 08:17:39','0000-00-00 00:00:00','?/sitio/autenticar'),(76,1,'0000-00-00','00:00:00','2023-04-11','17:04:06','0000-00-00 00:00:00','2023-04-11 17:04:06','?/sitio/salir'),(77,1,'2023-04-12','08:15:58','0000-00-00','00:00:00','2023-04-12 08:15:58','0000-00-00 00:00:00','?/sitio/autenticar'),(78,1,'2023-04-13','08:13:42','0000-00-00','00:00:00','2023-04-13 08:13:42','0000-00-00 00:00:00','?/sitio/autenticar'),(79,1,'2023-04-14','09:03:37','0000-00-00','00:00:00','2023-04-14 09:03:37','0000-00-00 00:00:00','?/sitio/autenticar'),(80,1,'2023-04-15','16:18:10','0000-00-00','00:00:00','2023-04-15 16:18:10','0000-00-00 00:00:00','?/sitio/autenticar'),(81,1,'2023-04-17','08:41:45','0000-00-00','00:00:00','2023-04-17 08:41:45','0000-00-00 00:00:00','?/sitio/autenticar'),(82,1,'2023-04-18','08:11:58','0000-00-00','00:00:00','2023-04-18 08:11:58','0000-00-00 00:00:00','?/sitio/autenticar'),(83,1,'2023-04-19','08:18:48','0000-00-00','00:00:00','2023-04-19 08:18:48','0000-00-00 00:00:00','?/sitio/autenticar'),(84,1,'2023-04-20','08:19:10','0000-00-00','00:00:00','2023-04-20 08:19:10','0000-00-00 00:00:00','?/sitio/autenticar'),(85,1,'2023-04-21','09:20:10','0000-00-00','00:00:00','2023-04-21 09:20:10','0000-00-00 00:00:00','?/sitio/autenticar'),(86,1,'2023-04-24','08:03:27','0000-00-00','00:00:00','2023-04-24 08:03:27','0000-00-00 00:00:00','?/sitio/autenticar'),(87,1,'0000-00-00','00:00:00','2023-04-24','14:17:07','0000-00-00 00:00:00','2023-04-24 14:17:07','?/sitio/salir'),(88,1,'2023-04-25','11:07:11','0000-00-00','00:00:00','2023-04-25 11:07:11','0000-00-00 00:00:00','?/sitio/autenticar'),(89,1,'2023-04-26','08:07:57','0000-00-00','00:00:00','2023-04-26 08:07:57','0000-00-00 00:00:00','?/sitio/autenticar'),(90,1,'2023-04-27','08:08:10','0000-00-00','00:00:00','2023-04-27 08:08:10','0000-00-00 00:00:00','?/sitio/autenticar'),(91,1,'0000-00-00','00:00:00','2023-04-27','16:35:11','0000-00-00 00:00:00','2023-04-27 16:35:11','?/sitio/salir'),(92,1,'2023-05-02','08:08:52','0000-00-00','00:00:00','2023-05-02 08:08:52','0000-00-00 00:00:00','?/sitio/autenticar'),(93,1,'0000-00-00','00:00:00','2023-05-02','17:04:30','0000-00-00 00:00:00','2023-05-02 17:04:30','?/sitio/salir'),(94,1,'2023-05-03','08:03:55','0000-00-00','00:00:00','2023-05-03 08:03:55','0000-00-00 00:00:00','?/sitio/autenticar'),(95,1,'2023-05-04','08:59:33','0000-00-00','00:00:00','2023-05-04 08:59:33','0000-00-00 00:00:00','?/sitio/autenticar'),(96,1,'2023-05-05','08:15:15','0000-00-00','00:00:00','2023-05-05 08:15:15','0000-00-00 00:00:00','?/sitio/autenticar'),(97,1,'2023-05-06','08:10:46','0000-00-00','00:00:00','2023-05-06 08:10:46','0000-00-00 00:00:00','?/sitio/autenticar'),(98,1,'0000-00-00','00:00:00','2023-05-06','16:02:21','0000-00-00 00:00:00','2023-05-06 16:02:21','?/sitio/salir'),(99,1,'2023-05-08','08:08:18','0000-00-00','00:00:00','2023-05-08 08:08:18','0000-00-00 00:00:00','?/sitio/autenticar'),(100,1,'0000-00-00','00:00:00','2023-05-08','16:03:02','0000-00-00 00:00:00','2023-05-08 16:03:02','?/sitio/salir'),(101,1,'2023-05-09','08:08:08','0000-00-00','00:00:00','2023-05-09 08:08:08','0000-00-00 00:00:00','?/sitio/autenticar'),(102,1,'2023-05-10','08:15:45','0000-00-00','00:00:00','2023-05-10 08:15:45','0000-00-00 00:00:00','?/sitio/autenticar'),(103,1,'2023-05-11','08:24:30','0000-00-00','00:00:00','2023-05-11 08:24:30','0000-00-00 00:00:00','?/sitio/autenticar'),(104,1,'2023-05-12','08:07:51','0000-00-00','00:00:00','2023-05-12 08:07:51','0000-00-00 00:00:00','?/sitio/autenticar'),(105,1,'0000-00-00','00:00:00','2023-05-12','13:45:13','0000-00-00 00:00:00','2023-05-12 13:45:13','?/sitio/salir'),(106,1,'2023-05-12','13:45:23','0000-00-00','00:00:00','2023-05-12 13:45:23','0000-00-00 00:00:00','?/sitio/autenticar'),(107,1,'2023-05-12','13:51:18','0000-00-00','00:00:00','2023-05-12 13:51:18','0000-00-00 00:00:00','?/sitio/autenticar'),(108,1,'0000-00-00','00:00:00','2023-05-12','13:53:46','0000-00-00 00:00:00','2023-05-12 13:53:46','?/sitio/salir'),(109,1,'2023-05-12','13:58:42','0000-00-00','00:00:00','2023-05-12 13:58:42','0000-00-00 00:00:00','?/sitio/autenticar'),(110,1,'0000-00-00','00:00:00','2023-05-12','14:01:01','0000-00-00 00:00:00','2023-05-12 14:01:01','?/sitio/salir'),(111,1,'2023-05-12','14:02:29','0000-00-00','00:00:00','2023-05-12 14:02:29','0000-00-00 00:00:00','?/sitio/autenticar'),(112,1,'0000-00-00','00:00:00','2023-05-12','14:05:31','0000-00-00 00:00:00','2023-05-12 14:05:31','?/sitio/salir'),(113,1,'2023-05-12','14:12:55','0000-00-00','00:00:00','2023-05-12 14:12:55','0000-00-00 00:00:00','?/sitio/autenticar'),(114,1,'0000-00-00','00:00:00','2023-05-12','14:38:34','0000-00-00 00:00:00','2023-05-12 14:38:34','?/sitio/salir'),(115,1,'2023-05-12','14:41:39','0000-00-00','00:00:00','2023-05-12 14:41:39','0000-00-00 00:00:00','?/sitio/autenticar'),(116,1,'2023-05-15','08:08:04','0000-00-00','00:00:00','2023-05-15 08:08:04','0000-00-00 00:00:00','?/sitio/autenticar'),(117,1,'2023-05-16','08:12:39','0000-00-00','00:00:00','2023-05-16 08:12:39','0000-00-00 00:00:00','?/sitio/autenticar'),(118,1,'2023-05-17','08:13:48','0000-00-00','00:00:00','2023-05-17 08:13:48','0000-00-00 00:00:00','?/sitio/autenticar'),(119,1,'0000-00-00','00:00:00','2023-05-17','17:00:46','0000-00-00 00:00:00','2023-05-17 17:00:46','?/sitio/salir'),(120,1,'2023-05-18','08:27:51','0000-00-00','00:00:00','2023-05-18 08:27:51','0000-00-00 00:00:00','?/sitio/autenticar'),(121,1,'2023-05-18','11:51:52','0000-00-00','00:00:00','2023-05-18 11:51:52','0000-00-00 00:00:00','?/sitio/autenticar'),(122,1,'2023-05-19','08:11:03','0000-00-00','00:00:00','2023-05-19 08:11:03','0000-00-00 00:00:00','?/sitio/autenticar'),(123,1,'0000-00-00','00:00:00','2023-05-19','16:56:12','0000-00-00 00:00:00','2023-05-19 16:56:12','?/sitio/salir'),(124,1,'2023-05-22','08:22:32','0000-00-00','00:00:00','2023-05-22 08:22:32','0000-00-00 00:00:00','?/sitio/autenticar'),(125,1,'0000-00-00','00:00:00','2023-05-22','13:35:55','0000-00-00 00:00:00','2023-05-22 13:35:55','?/sitio/salir'),(126,1,'2023-05-22','13:38:33','0000-00-00','00:00:00','2023-05-22 13:38:33','0000-00-00 00:00:00','?/sitio/autenticar'),(127,1,'0000-00-00','00:00:00','2023-05-22','13:41:49','0000-00-00 00:00:00','2023-05-22 13:41:49','?/sitio/salir'),(128,1,'2023-05-22','13:44:09','0000-00-00','00:00:00','2023-05-22 13:44:09','0000-00-00 00:00:00','?/sitio/autenticar'),(129,1,'0000-00-00','00:00:00','2023-05-22','16:07:24','0000-00-00 00:00:00','2023-05-22 16:07:24','?/sitio/salir'),(130,1,'2023-05-23','08:19:01','0000-00-00','00:00:00','2023-05-23 08:19:01','0000-00-00 00:00:00','?/sitio/autenticar'),(131,1,'0000-00-00','00:00:00','2023-05-23','17:02:02','0000-00-00 00:00:00','2023-05-23 17:02:02','?/sitio/salir'),(132,1,'2023-05-24','08:23:46','0000-00-00','00:00:00','2023-05-24 08:23:46','0000-00-00 00:00:00','?/sitio/autenticar'),(133,1,'0000-00-00','00:00:00','2023-05-24','17:16:04','0000-00-00 00:00:00','2023-05-24 17:16:04','?/sitio/salir'),(134,1,'2023-05-25','10:00:32','0000-00-00','00:00:00','2023-05-25 10:00:32','0000-00-00 00:00:00','?/sitio/login'),(135,1,'0000-00-00','00:00:00','2023-05-25','10:07:09','0000-00-00 00:00:00','2023-05-25 10:07:09','?/sitio/salir'),(136,1,'2023-05-25','10:11:37','0000-00-00','00:00:00','2023-05-25 10:11:37','0000-00-00 00:00:00','?/sitio/autenticar'),(137,1,'0000-00-00','00:00:00','2023-05-25','10:11:47','0000-00-00 00:00:00','2023-05-25 10:11:47','?/sitio/salir'),(138,1,'2023-05-25','10:28:26','0000-00-00','00:00:00','2023-05-25 10:28:26','0000-00-00 00:00:00','?/sitio/autenticar'),(139,1,'0000-00-00','00:00:00','2023-05-25','10:28:34','0000-00-00 00:00:00','2023-05-25 10:28:34','?/sitio/salir'),(140,1,'2023-05-25','10:28:50','0000-00-00','00:00:00','2023-05-25 10:28:50','0000-00-00 00:00:00','?/sitio/autenticar'),(141,1,'0000-00-00','00:00:00','2023-05-25','11:01:20','0000-00-00 00:00:00','2023-05-25 11:01:20','?/sitio/salir'),(142,1,'2023-05-25','11:01:27','0000-00-00','00:00:00','2023-05-25 11:01:27','0000-00-00 00:00:00','?/sitio/autenticar'),(143,1,'0000-00-00','00:00:00','2023-05-25','15:07:37','0000-00-00 00:00:00','2023-05-25 15:07:37','?/sitio/salir'),(144,1,'2023-05-25','15:07:43','0000-00-00','00:00:00','2023-05-25 15:07:43','0000-00-00 00:00:00','?/sitio/autenticar'),(145,1,'0000-00-00','00:00:00','2023-05-25','15:08:59','0000-00-00 00:00:00','2023-05-25 15:08:59','?/sitio/salir'),(146,1,'2023-05-25','15:09:09','0000-00-00','00:00:00','2023-05-25 15:09:09','0000-00-00 00:00:00','?/sitio/autenticar'),(147,1,'0000-00-00','00:00:00','2023-05-25','15:09:20','0000-00-00 00:00:00','2023-05-25 15:09:20','?/sitio/salir'),(148,1,'2023-05-25','15:10:29','0000-00-00','00:00:00','2023-05-25 15:10:29','0000-00-00 00:00:00','?/sitio/autenticar'),(149,1,'0000-00-00','00:00:00','2023-05-25','15:10:52','0000-00-00 00:00:00','2023-05-25 15:10:52','?/sitio/salir'),(150,1,'2023-05-25','15:11:38','0000-00-00','00:00:00','2023-05-25 15:11:38','0000-00-00 00:00:00','?/sitio/autenticar'),(151,1,'0000-00-00','00:00:00','2023-05-25','15:30:31','0000-00-00 00:00:00','2023-05-25 15:30:31','?/sitio/salir'),(152,1,'2023-05-25','15:30:39','0000-00-00','00:00:00','2023-05-25 15:30:39','0000-00-00 00:00:00','?/sitio/autenticar'),(153,1,'0000-00-00','00:00:00','2023-05-25','15:57:35','0000-00-00 00:00:00','2023-05-25 15:57:35','?/sitio/salir'),(154,1,'2023-05-25','15:57:41','0000-00-00','00:00:00','2023-05-25 15:57:41','0000-00-00 00:00:00','?/sitio/autenticar'),(155,1,'0000-00-00','00:00:00','2023-05-25','16:09:51','0000-00-00 00:00:00','2023-05-25 16:09:51','?/sitio/salir'),(156,1,'2023-05-25','16:09:54','0000-00-00','00:00:00','2023-05-25 16:09:54','0000-00-00 00:00:00','?/sitio/autenticar'),(157,1,'0000-00-00','00:00:00','2023-05-25','16:10:20','0000-00-00 00:00:00','2023-05-25 16:10:20','?/sitio/salir'),(158,1,'2023-05-25','16:12:13','0000-00-00','00:00:00','2023-05-25 16:12:13','0000-00-00 00:00:00','?/sitio/autenticar'),(159,1,'0000-00-00','00:00:00','2023-05-25','16:17:29','0000-00-00 00:00:00','2023-05-25 16:17:29','?/sitio/salir'),(160,1,'2023-05-25','16:24:02','0000-00-00','00:00:00','2023-05-25 16:24:02','0000-00-00 00:00:00','?/sitio/autenticar'),(161,1,'0000-00-00','00:00:00','2023-05-25','16:24:28','0000-00-00 00:00:00','2023-05-25 16:24:28','?/sitio/salir'),(162,1,'2023-05-25','16:35:37','0000-00-00','00:00:00','2023-05-25 16:35:37','0000-00-00 00:00:00','?/sitio/autenticar'),(163,1,'0000-00-00','00:00:00','2023-05-25','16:40:45','0000-00-00 00:00:00','2023-05-25 16:40:45','?/sitio/salir'),(164,1,'2023-05-25','16:44:28','0000-00-00','00:00:00','2023-05-25 16:44:28','0000-00-00 00:00:00','?/sitio/autenticar'),(165,1,'0000-00-00','00:00:00','2023-05-25','16:47:02','0000-00-00 00:00:00','2023-05-25 16:47:02','?/sitio/salir'),(166,1,'2023-05-25','16:47:31','0000-00-00','00:00:00','2023-05-25 16:47:31','0000-00-00 00:00:00','?/sitio/autenticar'),(167,1,'0000-00-00','00:00:00','2023-05-25','16:48:20','0000-00-00 00:00:00','2023-05-25 16:48:20','?/sitio/salir'),(168,1,'2023-05-25','16:48:24','0000-00-00','00:00:00','2023-05-25 16:48:24','0000-00-00 00:00:00','?/sitio/autenticar'),(169,1,'2023-05-26','08:09:03','0000-00-00','00:00:00','2023-05-26 08:09:03','0000-00-00 00:00:00','?/sitio/autenticar'),(170,1,'0000-00-00','00:00:00','2023-05-26','17:10:14','0000-00-00 00:00:00','2023-05-26 17:10:14','?/sitio/salir'),(171,1,'2023-05-29','08:19:08','0000-00-00','00:00:00','2023-05-29 08:19:08','0000-00-00 00:00:00','?/sitio/autenticar'),(172,1,'2023-05-30','08:08:28','0000-00-00','00:00:00','2023-05-30 08:08:28','0000-00-00 00:00:00','?/sitio/autenticar'),(173,1,'2023-05-31','08:16:31','0000-00-00','00:00:00','2023-05-31 08:16:31','0000-00-00 00:00:00','?/sitio/autenticar'),(174,1,'0000-00-00','00:00:00','2023-05-31','16:28:23','0000-00-00 00:00:00','2023-05-31 16:28:23','?/sitio/salir'),(175,1,'2023-05-31','16:39:40','0000-00-00','00:00:00','2023-05-31 16:39:40','0000-00-00 00:00:00','?/sitio/autenticar'),(176,1,'0000-00-00','00:00:00','2023-05-31','17:00:34','0000-00-00 00:00:00','2023-05-31 17:00:34','?/sitio/salir'),(177,1,'2023-06-01','08:18:43','0000-00-00','00:00:00','2023-06-01 08:18:43','0000-00-00 00:00:00','?/sitio/autenticar'),(178,1,'0000-00-00','00:00:00','2023-06-01','16:59:08','0000-00-00 00:00:00','2023-06-01 16:59:08','?/sitio/salir'),(179,1,'2023-06-02','08:26:39','0000-00-00','00:00:00','2023-06-02 08:26:39','0000-00-00 00:00:00','?/sitio/autenticar'),(180,1,'0000-00-00','00:00:00','2023-06-02','15:10:42','0000-00-00 00:00:00','2023-06-02 15:10:42','?/sitio/salir'),(181,1,'2023-06-02','15:12:40','0000-00-00','00:00:00','2023-06-02 15:12:40','0000-00-00 00:00:00','?/sitio/autenticar'),(182,1,'0000-00-00','00:00:00','2023-06-02','15:15:10','0000-00-00 00:00:00','2023-06-02 15:15:10','?/sitio/salir'),(183,5,'2023-06-02','15:15:43','0000-00-00','00:00:00','2023-06-02 15:15:43','0000-00-00 00:00:00','?/sitio/autenticar'),(184,5,'0000-00-00','00:00:00','2023-06-02','15:16:29','0000-00-00 00:00:00','2023-06-02 15:16:29','?/sitio/salir'),(185,1,'2023-06-02','15:16:36','0000-00-00','00:00:00','2023-06-02 15:16:36','0000-00-00 00:00:00','?/sitio/autenticar'),(186,1,'0000-00-00','00:00:00','2023-06-02','15:16:49','0000-00-00 00:00:00','2023-06-02 15:16:49','?/sitio/salir'),(187,1,'2023-06-02','15:16:55','0000-00-00','00:00:00','2023-06-02 15:16:55','0000-00-00 00:00:00','?/sitio/autenticar');
/*!40000 ALTER TABLE `sys_users_historial` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-02 16:29:20
