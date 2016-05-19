-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bd_pdi
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(5) NOT NULL,
  `desc_cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'JEFE UNIDAD'),(2,'JEFE S.R'),(3,'NINGUNO');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casos`
--

DROP TABLE IF EXISTS `casos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casos` (
  `id_casos` int(5) NOT NULL,
  `nombre_casos` varchar(50) NOT NULL,
  PRIMARY KEY (`id_casos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casos`
--

LOCK TABLES `casos` WRITE;
/*!40000 ALTER TABLE `casos` DISABLE KEYS */;
/*!40000 ALTER TABLE `casos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_det`
--

DROP TABLE IF EXISTS `categoria_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_det` (
  `id_categoria_det` int(5) NOT NULL,
  `id_tipo_cat` int(5) NOT NULL,
  `nombre_cat_det` varchar(50) NOT NULL,
  `des_categoria_det` longtext NOT NULL,
  PRIMARY KEY (`id_categoria_det`),
  KEY `id_tipo_cat` (`id_tipo_cat`),
  CONSTRAINT `categoria_det_ibfk_1` FOREIGN KEY (`id_tipo_cat`) REFERENCES `tipo_cat` (`id_tipo_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_det`
--

LOCK TABLES `categoria_det` WRITE;
/*!40000 ALTER TABLE `categoria_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_usu`
--

DROP TABLE IF EXISTS `categoria_usu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_usu` (
  `id_categoria_usu` int(5) NOT NULL,
  `desc_categoria_usu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_categoria_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_usu`
--

LOCK TABLES `categoria_usu` WRITE;
/*!40000 ALTER TABLE `categoria_usu` DISABLE KEYS */;
INSERT INTO `categoria_usu` VALUES (1,'GRADO 6'),(2,'GRADO 7'),(3,'GRADO 8'),(4,'GRADO 9'),(5,'GRADO 10'),(6,'GRADO 11'),(7,'GRADO 12'),(8,'GRADO 13'),(9,'GRADO 14'),(10,'GRADO 15'),(11,'GRADO 16'),(12,'GRADO 17'),(13,'GRADO 18');
/*!40000 ALTER TABLE `categoria_usu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comuna`
--

DROP TABLE IF EXISTS `comuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comuna` (
  `comuna_id` int(5) NOT NULL DEFAULT '0',
  `comuna_nombre` varchar(20) DEFAULT NULL,
  `comuna_provincia_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`comuna_id`),
  KEY `COMUNA_PROVINCIA_ID` (`comuna_provincia_id`),
  CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`comuna_provincia_id`) REFERENCES `provincia` (`provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comuna`
--

LOCK TABLES `comuna` WRITE;
/*!40000 ALTER TABLE `comuna` DISABLE KEYS */;
INSERT INTO `comuna` VALUES (1101,'Iquique',11),(1107,'Alto Hospicio',11),(1401,'Pozo Almonte',14),(1402,'Camiña',14),(1403,'Colchane',14),(1404,'Huara',14),(1405,'Pica',14),(2101,'Antofagasta',21),(2102,'Mejillones',21),(2103,'Sierra Gorda',21),(2104,'Taltal',21),(2201,'Calama',22),(2202,'Ollagüe',22),(2203,'San Pedro de Atacama',22),(2301,'Tocopilla',23),(2302,'María Elena',23),(3101,'Copiapó',31),(3102,'Caldera',31),(3103,'Tierra Amarilla',31),(3201,'Chañaral',32),(3202,'Diego de Almagro',32),(3301,'Vallenar',33),(3302,'Alto del Carmen',33),(3303,'Freirina',33),(3304,'Huasco',33),(4101,'La Serena',41),(4102,'Coquimbo',41),(4103,'Andacollo',41),(4104,'La Higuera',41),(4105,'Paiguano',41),(4106,'Vicuña',41),(4201,'Illapel',42),(4202,'Canela',42),(4203,'Los Vilos',42),(4204,'Salamanca',42),(4301,'Ovalle',43),(4302,'Combarbalá',43),(4303,'Monte Patria',43),(4304,'Punitaqui',43),(4305,'Río Hurtado',43),(5101,'Valparaíso',51),(5102,'Casablanca',51),(5103,'Concón',51),(5104,'Juan Fernández',51),(5105,'Puchuncaví',51),(5107,'Quintero',51),(5109,'Viña del Mar',51),(5201,'Isla de Pascua',52),(5301,'Los Andes',53),(5302,'Calle Larga',53),(5303,'Rinconada',53),(5304,'San Esteban',53),(5401,'La Ligua',54),(5402,'Cabildo',54),(5403,'Papudo',54),(5404,'Petorca',54),(5405,'Zapallar',54),(5501,'Quillota',55),(5502,'Calera',55),(5503,'Hijuelas',55),(5504,'La Cruz',55),(5506,'Nogales',55),(5601,'San Antonio',56),(5602,'Algarrobo',56),(5603,'Cartagena',56),(5604,'El Quisco',56),(5605,'El Tabo',56),(5606,'Santo Domingo',56),(5701,'San Felipe',57),(5702,'Catemu',57),(5703,'Llaillay',57),(5704,'Panquehue',57),(5705,'Putaendo',57),(5706,'Santa María',57),(5801,'Quilpué',58),(5802,'Limache',58),(5803,'Olmué',58),(5804,'Villa Alemana',58),(6101,'Rancagua',61),(6102,'Codegua',61),(6103,'Coinco',61),(6104,'Coltauco',61),(6105,'Doñihue',61),(6106,'Graneros',61),(6107,'Las Cabras',61),(6108,'Machalí',61),(6109,'Malloa',61),(6110,'Mostazal',61),(6111,'Olivar',61),(6112,'Peumo',61),(6113,'Pichidegua',61),(6114,'Quinta de Tilcoco',61),(6115,'Rengo',61),(6116,'Requínoa',61),(6117,'San Vicente',61),(6201,'Pichilemu',62),(6202,'La Estrella',62),(6203,'Litueche',62),(6204,'Marchihue',62),(6205,'Navidad',62),(6206,'Paredones',62),(6301,'San Fernando',63),(6302,'Chépica',63),(6303,'Chimbarongo',63),(6304,'Lolol',63),(6305,'Nancagua',63),(6306,'Palmilla',63),(6307,'Peralillo',63),(6308,'Placilla',63),(6309,'Pumanque',63),(6310,'Santa Cruz',63),(7101,'Talca',71),(7102,'Constitución',71),(7103,'Curepto',71),(7104,'Empedrado',71),(7105,'Maule',71),(7106,'Pelarco',71),(7107,'Pencahue',71),(7108,'Río Claro',71),(7109,'San Clemente',71),(7110,'San Rafael',71),(7201,'Cauquenes',72),(7202,'Chanco',72),(7203,'Pelluhue',72),(7301,'Curicó',73),(7302,'Hualañé',73),(7303,'Licantén',73),(7304,'Molina',73),(7305,'Rauco',73),(7306,'Romeral',73),(7307,'Sagrada Familia',73),(7308,'Teno',73),(7309,'Vichuquén',73),(7401,'Linares',74),(7402,'Colbún',74),(7403,'Longaví',74),(7404,'Parral',74),(7405,'Retiro',74),(7406,'San Javier',74),(7407,'Villa Alegre',74),(7408,'Yerbas Buenas',74),(8101,'Concepción',81),(8102,'Coronel',81),(8103,'Chiguayante',81),(8104,'Florida',81),(8105,'Hualqui',81),(8106,'Lota',81),(8107,'Penco',81),(8108,'San Pedro de la Paz',81),(8109,'Santa Juana',81),(8110,'Talcahuano',81),(8111,'Tomé',81),(8112,'Hualpén',81),(8201,'Lebu',82),(8202,'Arauco',82),(8203,'Cañete',82),(8204,'Contulmo',82),(8205,'Curanilahue',82),(8206,'Los Álamos',82),(8207,'Tirúa',82),(8301,'Los Ángeles',83),(8302,'Antuco',83),(8303,'Cabrero',83),(8304,'Laja',83),(8305,'Mulchén',83),(8306,'Nacimiento',83),(8307,'Negrete',83),(8308,'Quilaco',83),(8309,'Quilleco',83),(8310,'San Rosendo',83),(8311,'Santa Bárbara',83),(8312,'Tucapel',83),(8313,'Yumbel',83),(8314,'Alto Biobío',83),(8401,'Chillán',84),(8402,'Bulnes',84),(8403,'Cobquecura',84),(8404,'Coelemu',84),(8405,'Coihueco',84),(8406,'Chillán Viejo',84),(8407,'El Carmen',84),(8408,'Ninhue',84),(8409,'Ñiquén',84),(8410,'Pemuco',84),(8411,'Pinto',84),(8412,'Portezuelo',84),(8413,'Quillón',84),(8414,'Quirihue',84),(8415,'Ránquil',84),(8416,'San Carlos',84),(8417,'San Fabián',84),(8418,'San Ignacio',84),(8419,'San Nicolás',84),(8420,'Treguaco',84),(8421,'Yungay',84),(9101,'Temuco',91),(9102,'Carahue',91),(9103,'Cunco',91),(9104,'Curarrehue',91),(9105,'Freire',91),(9106,'Galvarino',91),(9107,'Gorbea',91),(9108,'Lautaro',91),(9109,'Loncoche',91),(9110,'Melipeuco',91),(9111,'Nueva Imperial',91),(9112,'Padre las Casas',91),(9113,'Perquenco',91),(9114,'Pitrufquén',91),(9115,'Pucón',91),(9116,'Saavedra',91),(9117,'Teodoro Schmidt',91),(9118,'Toltén',91),(9119,'Vilcún',91),(9120,'Villarrica',91),(9121,'Cholchol',91),(9201,'Angol',92),(9202,'Collipulli',92),(9203,'Curacautín',92),(9204,'Ercilla',92),(9205,'Lonquimay',92),(9206,'Los Sauces',92),(9207,'Lumaco',92),(9208,'Purén',92),(9209,'Renaico',92),(9210,'Traiguén',92),(9211,'Victoria',92),(10101,'Puerto Montt',101),(10102,'Calbuco',101),(10103,'Cochamó',101),(10104,'Fresia',101),(10105,'Frutillar',101),(10106,'Los Muermos',101),(10107,'Llanquihue',101),(10108,'Maullín',101),(10109,'Puerto Varas',101),(10201,'Castro',102),(10202,'Ancud',102),(10203,'Chonchi',102),(10204,'Curaco de Vélez',102),(10205,'Dalcahue',102),(10206,'Puqueldón',102),(10207,'Queilén',102),(10208,'Quellón',102),(10209,'Quemchi',102),(10210,'Quinchao',102),(10301,'Osorno',103),(10302,'Puerto Octay',103),(10303,'Purranque',103),(10304,'Puyehue',103),(10305,'Río Negro',103),(10306,'San Juan de la Costa',103),(10307,'San Pablo',103),(10401,'Chaitén',104),(10402,'Futaleufú',104),(10403,'Hualaihué',104),(10404,'Palena',104),(11101,'Coihaique',111),(11102,'Lago Verde',111),(11201,'Aisén',112),(11202,'Cisnes',112),(11203,'Guaitecas',112),(11301,'Cochrane',113),(11302,'O’Higgins',113),(11303,'Tortel',113),(11401,'Chile Chico',114),(11402,'Río Ibáñez',114),(12101,'Punta Arenas',121),(12102,'Laguna Blanca',121),(12103,'Río Verde',121),(12104,'San Gregorio',121),(12201,'Cabo de Hornos',122),(12202,'Antártica',122),(12301,'Porvenir',123),(12302,'Primavera',123),(12303,'Timaukel',123),(12401,'Natales',124),(12402,'Torres del Paine',124),(13101,'Santiago',131),(13102,'Cerrillos',131),(13103,'Cerro Navia',131),(13104,'Conchalí',131),(13105,'El Bosque',131),(13106,'Estación Central',131),(13107,'Huechuraba',131),(13108,'Independencia',131),(13109,'La Cisterna',131),(13110,'La Florida',131),(13111,'La Granja',131),(13112,'La Pintana',131),(13113,'La Reina',131),(13114,'Las Condes',131),(13115,'Lo Barnechea',131),(13116,'Lo Espejo',131),(13117,'Lo Prado',131),(13118,'Macul',131),(13119,'Maipú',131),(13120,'Ñuñoa',131),(13121,'Pedro Aguirre Cerda',131),(13122,'Peñalolén',131),(13123,'Providencia',131),(13124,'Pudahuel',131),(13125,'Quilicura',131),(13126,'Quinta Normal',131),(13127,'Recoleta',131),(13128,'Renca',131),(13129,'San Joaquín',131),(13130,'San Miguel',131),(13131,'San Ramón',131),(13132,'Vitacura',131),(13201,'Puente Alto',132),(13202,'Pirque',132),(13203,'San José de Maipo',132),(13301,'Colina',133),(13302,'Lampa',133),(13303,'Tiltil',133),(13401,'San Bernardo',134),(13402,'Buin',134),(13403,'Calera de Tango',134),(13404,'Paine',134),(13501,'Melipilla',135),(13502,'Alhué',135),(13503,'Curacaví',135),(13504,'María Pinto',135),(13505,'San Pedro',135),(13601,'Talagante',136),(13602,'El Monte',136),(13603,'Isla de Maipo',136),(13604,'Padre Hurtado',136),(13605,'Peñaflor',136),(14101,'Valdivia',141),(14102,'Corral',141),(14103,'Lanco',141),(14104,'Los Lagos',141),(14105,'Máfil',141),(14106,'Mariquina',141),(14107,'Paillaco',141),(14108,'Panguipulli',141),(14201,'La Unión',142),(14202,'Futrono',142),(14203,'Lago Ranco',142),(14204,'Río Bueno',142),(15101,'Arica',151),(15102,'Camarones',151),(15201,'Putre',152),(15202,'General Lagos',152);
/*!40000 ALTER TABLE `comuna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_funcionario`
--

DROP TABLE IF EXISTS `detalle_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_funcionario` (
  `id_detalle_f` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `id_cargo` int(5) DEFAULT NULL,
  `id_categoria_usu` int(5) NOT NULL,
  `id_estado_usu` int(5) NOT NULL,
  `fecha_detalle_usuario` date NOT NULL,
  PRIMARY KEY (`id_detalle_f`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_grado` (`id_grado`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_categoria_usu` (`id_categoria_usu`),
  KEY `id_estado_usu` (`id_estado_usu`),
  CONSTRAINT `detalle_funcionario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `detalle_funcionario_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`),
  CONSTRAINT `detalle_funcionario_ibfk_3` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `detalle_funcionario_ibfk_4` FOREIGN KEY (`id_categoria_usu`) REFERENCES `categoria_usu` (`id_categoria_usu`),
  CONSTRAINT `detalle_funcionario_ibfk_6` FOREIGN KEY (`id_estado_usu`) REFERENCES `estado_usuario` (`id_estado_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_funcionario`
--

LOCK TABLES `detalle_funcionario` WRITE;
/*!40000 ALTER TABLE `detalle_funcionario` DISABLE KEYS */;
INSERT INTO `detalle_funcionario` VALUES (1,1,3,1,2,1,'2015-11-24'),(2,2,2,1,1,1,'2015-11-24'),(3,3,1,NULL,1,1,'2015-11-24'),(4,4,1,NULL,1,1,'2015-11-24'),(5,48,2,1,10,1,'2015-11-28'),(6,49,8,3,5,1,'2015-11-29'),(7,50,5,3,4,1,'2015-11-29'),(8,51,5,3,5,1,'2015-11-29'),(9,3,8,3,7,1,'2015-11-29'),(10,52,7,3,7,1,'2015-11-30');
/*!40000 ALTER TABLE `detalle_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_hoja_vida`
--

DROP TABLE IF EXISTS `detalle_hoja_vida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_hoja_vida` (
  `id_detalle_hv` int(5) NOT NULL,
  `id_tipo_casos` int(5) DEFAULT NULL,
  `id_subcategoria_det` int(5) DEFAULT NULL,
  `id_jefe_unidad` int(5) NOT NULL,
  `id_funcionario` int(5) NOT NULL,
  `id_cat_detalle` int(5) DEFAULT NULL,
  `fecha_hva` datetime NOT NULL,
  PRIMARY KEY (`id_detalle_hv`),
  KEY `id_tipo_casos` (`id_tipo_casos`),
  KEY `id_subcategoria_det` (`id_subcategoria_det`),
  KEY `id_jefe_unidad` (`id_jefe_unidad`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_cat_detalle` (`id_cat_detalle`),
  CONSTRAINT `detalle_hoja_vida_ibfk_1` FOREIGN KEY (`id_tipo_casos`) REFERENCES `tipo_casos` (`id_tipo_casos`),
  CONSTRAINT `detalle_hoja_vida_ibfk_2` FOREIGN KEY (`id_subcategoria_det`) REFERENCES `subcategoria_det` (`id_subcategoria_det`),
  CONSTRAINT `detalle_hoja_vida_ibfk_3` FOREIGN KEY (`id_jefe_unidad`) REFERENCES `unidad_jefe` (`id_unidad_jefe`),
  CONSTRAINT `detalle_hoja_vida_ibfk_4` FOREIGN KEY (`id_funcionario`) REFERENCES `unidad_jefe` (`id_unidad_jefe`),
  CONSTRAINT `detalle_hoja_vida_ibfk_5` FOREIGN KEY (`id_cat_detalle`) REFERENCES `categoria_det` (`id_categoria_det`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_hoja_vida`
--

LOCK TABLES `detalle_hoja_vida` WRITE;
/*!40000 ALTER TABLE `detalle_hoja_vida` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_hoja_vida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_usuario`
--

DROP TABLE IF EXISTS `estado_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_usuario` (
  `id_estado_usu` int(5) NOT NULL,
  `desc_estado_usu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_usuario`
--

LOCK TABLES `estado_usuario` WRITE;
/*!40000 ALTER TABLE `estado_usuario` DISABLE KEYS */;
INSERT INTO `estado_usuario` VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `estado_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `id_grado` int(5) NOT NULL,
  `desc_grado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'PREFECTO'),(2,'SUBPREFECTO'),(3,'COMISARIO'),(4,'SUBCOMISARIO'),(5,'INSPECTOR'),(6,'INSPECTOR (A)'),(7,'SUBINSPECTOR'),(8,'DETECTIVE'),(9,'ASISTENTE POLICIAL'),(10,'ASISTENTE TECNICO'),(11,'ASISTENTE ADMINISTRATIVO');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoja_vida`
--

DROP TABLE IF EXISTS `hoja_vida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoja_vida` (
  `id_hoja_vida` int(5) NOT NULL,
  `id_detalle_f` int(5) NOT NULL,
  `id_detalle_hv` int(5) NOT NULL,
  PRIMARY KEY (`id_hoja_vida`),
  KEY `id_detalle_f` (`id_detalle_f`),
  KEY `id_detalle_hv` (`id_detalle_hv`),
  CONSTRAINT `hoja_vida_ibfk_1` FOREIGN KEY (`id_detalle_f`) REFERENCES `detalle_funcionario` (`id_detalle_f`),
  CONSTRAINT `hoja_vida_ibfk_2` FOREIGN KEY (`id_detalle_hv`) REFERENCES `detalle_hoja_vida` (`id_detalle_hv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoja_vida`
--

LOCK TABLES `hoja_vida` WRITE;
/*!40000 ALTER TABLE `hoja_vida` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoja_vida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincia` (
  `provincia_id` int(3) NOT NULL DEFAULT '0',
  `provincia_nombre` varchar(23) DEFAULT NULL,
  `provincia_region_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`provincia_id`),
  KEY `PROVINCIA_REGION_ID` (`provincia_region_id`),
  CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`provincia_region_id`) REFERENCES `region` (`region_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (11,'Iquique',1),(14,'Tamarugal',1),(21,'Antofagasta',2),(22,'El Loa',2),(23,'Tocopilla',2),(31,'Copiapó',3),(32,'Chañaral',3),(33,'Huasco',3),(41,'Elqui',4),(42,'Choapa',4),(43,'Limarí',4),(51,'Valparaíso',5),(52,'Isla de Pascua',5),(53,'Los Andes',5),(54,'Petorca',5),(55,'Quillota',5),(56,'San Antonio',5),(57,'San Felipe de Aconcagua',5),(58,'Marga Marga',5),(61,'Cachapoal',6),(62,'Cardenal Caro',6),(63,'Colchagua',6),(71,'Talca',7),(72,'Cauquenes',7),(73,'Curicó',7),(74,'Linares',7),(81,'Concepción',8),(82,'Arauco',8),(83,'Biobío',8),(84,'Ñuble',8),(91,'Cautín',9),(92,'Malleco',9),(101,'Llanquihue',10),(102,'Chiloé',10),(103,'Osorno',10),(104,'Palena',10),(111,'Coihaique',11),(112,'Aisén',11),(113,'Capitán Prat',11),(114,'General Carrera',11),(121,'Magallanes',12),(122,'Antártica Chilena',12),(123,'Tierra del Fuego',12),(124,'Última Esperanza',12),(131,'Santiago',13),(132,'Cordillera',13),(133,'Chacabuco',13),(134,'Maipo',13),(135,'Melipilla',13),(136,'Talagante',13),(141,'Valdivia',14),(142,'Ranco',14),(151,'Arica',15),(152,'Parinacota',15);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `region_id` int(2) NOT NULL DEFAULT '0',
  `region_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Tarapacá'),(2,'Antofagasta'),(3,'Atacama'),(4,'Coquimbo'),(5,'Valparaíso'),(6,'Región del Libertador Gral. Bernardo O’Higgins'),(7,'Región del Maule'),(8,'Región del Biobío'),(9,'Región de la Araucanía'),(10,'Región de Los Lagos'),(11,'Región Aisén del Gral. Carlos Ibáñez del Campo'),(12,'Región de Magallanes y de la Antártica Chilena'),(13,'Región Metropolitana de Santiago'),(14,'Región de Los Ríos'),(15,'Arica y Parinacota');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategoria_det`
--

DROP TABLE IF EXISTS `subcategoria_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategoria_det` (
  `id_subcategoria_det` int(5) NOT NULL,
  `id_categoria_det` int(5) NOT NULL,
  `nombre_subcat` varchar(50) NOT NULL,
  `desc_subcat` longtext NOT NULL,
  PRIMARY KEY (`id_subcategoria_det`),
  KEY `id_categoria_det` (`id_categoria_det`),
  CONSTRAINT `subcategoria_det_ibfk_1` FOREIGN KEY (`id_categoria_det`) REFERENCES `categoria_det` (`id_categoria_det`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategoria_det`
--

LOCK TABLES `subcategoria_det` WRITE;
/*!40000 ALTER TABLE `subcategoria_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcategoria_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_casos`
--

DROP TABLE IF EXISTS `tipo_casos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_casos` (
  `id_tipo_casos` int(5) NOT NULL,
  `id_casos` int(5) NOT NULL,
  `c_r` int(20) DEFAULT NULL,
  `s_r` int(20) DEFAULT NULL,
  `total_rec` int(20) NOT NULL,
  PRIMARY KEY (`id_tipo_casos`),
  KEY `id_casos` (`id_casos`),
  CONSTRAINT `tipo_casos_ibfk_1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id_casos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_casos`
--

LOCK TABLES `tipo_casos` WRITE;
/*!40000 ALTER TABLE `tipo_casos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_casos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cat`
--

DROP TABLE IF EXISTS `tipo_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cat` (
  `id_tipo_cat` int(5) NOT NULL,
  `desc_tipo_cat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cat`
--

LOCK TABLES `tipo_cat` WRITE;
/*!40000 ALTER TABLE `tipo_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `id_unidad` int(5) NOT NULL,
  `nombre_unidad` varchar(80) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `desc_unidad` varchar(120) NOT NULL,
  `comuna_id` int(5) NOT NULL,
  `id_unidad_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`),
  KEY `comuna_id` (`comuna_id`),
  KEY `fk_unidad_padre` (`id_unidad_padre`),
  CONSTRAINT `fk_unidad_padre` FOREIGN KEY (`id_unidad_padre`) REFERENCES `unidad` (`id_unidad`),
  CONSTRAINT `unidad_ibfk_1` FOREIGN KEY (`comuna_id`) REFERENCES `comuna` (`comuna_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'PREFECTURA PROVINCIAL DEL BIO BIO','PROBIO','PREFECTURA PROVINCIAL',8301,NULL),(2,'BRIGADA DE INVESTIGACION CRIMINAL LOS ANGELES','BICRIM LAG','BRIGADA CRIMINAL',8301,1),(3,'BRIGADA DE INVESTIGACION CRIMINAL CABRERO','BICRIM CAB','BRIGADA CRIMINAL CABRERO',8303,1),(4,'BRIGADA ANTINARCOTICOS LOS ANGELES','BRIANT LAG','Brigada antinarcóticos',8301,1),(5,'BRIGADA INVESTIGADORA DE DELITOS SEXUALES Y MENORES LOS ANGELES','BRISEXME LAG','BRIGADA DE DELITOS SEXUALES Y MENORES',8301,1),(6,'BRIGADA DE HOMICIDIOS LOS ANGELES','BH LAG','BRIGADA DE HOMICIDIOS',8301,1),(7,'ASESORIA TECNICA LOS ANGELES','ASETEC LAG','ASESORÍA TECNICA',8301,1),(8,'GRUPO ESPECIALIZADO EN BIENES ROBADOS LOS ANGELES','GEBRO LAG','GRUPO ESPECIALIZADO EN BIENES ROBADOS',8301,1),(9,'DEPARTAMENTO DE EXTRANJERIA Y POLICIA INTERNACIONAL LOS ANGELES','POLINT LAG','DEPARTAMENTO DE EXTRANJERÍA Y POLICÍA INTERNACIONAL',8301,1),(10,'FUERZA TAREA PROBIO','FUERZA TAREA PROBIO','FUERZA TAREA',8301,1);
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_jefe`
--

DROP TABLE IF EXISTS `unidad_jefe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_jefe` (
  `id_unidad_jefe` int(5) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(5) NOT NULL,
  `id_funcionario` int(5) NOT NULL,
  `fecha` datetime NOT NULL,
  `jefe_funcionario` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_unidad_jefe`),
  KEY `id_unidad` (`id_unidad`),
  KEY `fk_jefe_jef` (`id_funcionario`),
  KEY `fk_jefe_funcionario` (`jefe_funcionario`),
  CONSTRAINT `fk_jefe_funcionario` FOREIGN KEY (`jefe_funcionario`) REFERENCES `unidad_jefe` (`id_funcionario`),
  CONSTRAINT `fk_jefe_jef` FOREIGN KEY (`id_funcionario`) REFERENCES `detalle_funcionario` (`id_detalle_f`),
  CONSTRAINT `fk_unidad_jefe` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_jefe`
--

LOCK TABLES `unidad_jefe` WRITE;
/*!40000 ALTER TABLE `unidad_jefe` DISABLE KEYS */;
INSERT INTO `unidad_jefe` VALUES (1,1,1,'2015-11-24 16:39:52',NULL),(2,1,3,'2015-11-25 16:40:03',1),(3,2,2,'2015-11-24 16:40:23',NULL),(4,2,4,'2015-11-27 16:40:43',2),(13,6,5,'2015-11-28 15:42:59',5),(16,1,8,'2015-11-29 01:40:57',NULL),(17,1,9,'2015-11-29 03:42:28',NULL),(18,1,10,'2015-11-30 18:58:40',NULL);
/*!40000 ALTER TABLE `unidad_jefe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `nombres_usu` varchar(80) NOT NULL,
  `apellidos_usu` varchar(80) NOT NULL,
  `rut` varchar(16) NOT NULL,
  `clave` varchar(5000) NOT NULL,
  `fecha_ing` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'VICTOR ','POLANCO','11.111.111-1','MTIzMTIz','2015-11-24'),(2,'ALBERTO','LOPEZ','15.897.286-7','MTIzMTIz','2015-11-25'),(3,'YONATAN EDUARDO','ESCOBAR','15.943.298-K','MTIzMTIz','2015-11-24'),(4,'JUAN','CABRERA','1.718.706-6','MTIzMTIz','2015-11-30'),(48,'VICTOR EMILIO','POLANCO CAMPOS','17.745.408-7','MTIzMTIz','2015-11-30'),(49,'Samuel','Guerra','19.771.965-6','MTIzMTIz','2015-11-29'),(50,'Roberto','Bonilla','19.323.534-4','MTIzMTIz','2015-11-01'),(51,'Fernando','Aragon','22.222.222-2','MTIzMTIz','2015-11-22'),(52,'Juan Ignacio','Lopez Rodriguez','33.333.333-3','MTIzMTIz','2015-11-01');
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

-- Dump completed on 2015-12-01 19:05:45
