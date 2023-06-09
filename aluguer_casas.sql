-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: aluguer_casas
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(400) NOT NULL,
  `telefone` int(11) NOT NULL,
  `senha` varchar(512) NOT NULL,
  `criadoem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permissoes` int(11) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Jocelmo','Silva Pinheiro','jocelmosilva@gmail.com',923828488,'12345','2023-04-26 08:33:42',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aluguer`
--

DROP TABLE IF EXISTS `aluguer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluguer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imovel` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data_alugado` date DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `qtd_meses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluguer`
--

LOCK TABLES `aluguer` WRITE;
/*!40000 ALTER TABLE `aluguer` DISABLE KEYS */;
INSERT INTO `aluguer` VALUES (1,10,20,'2023-05-26',1,1),(2,9,28,'2023-05-26',1,6);
/*!40000 ALTER TABLE `aluguer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compartimentos`
--

DROP TABLE IF EXISTS `compartimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compartimentos` (
  `idcompartimentos` int(11) NOT NULL AUTO_INCREMENT,
  `imovel` int(11) NOT NULL,
  `quartos` int(11) NOT NULL,
  `cozinhas` int(11) NOT NULL,
  `suite` int(11) NOT NULL,
  `sala` int(11) NOT NULL,
  `wc` int(11) NOT NULL,
  PRIMARY KEY (`idcompartimentos`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compartimentos`
--

LOCK TABLES `compartimentos` WRITE;
/*!40000 ALTER TABLE `compartimentos` DISABLE KEYS */;
INSERT INTO `compartimentos` VALUES (0,3,3,2,2,1,1),(1,1,2,2,2,2,2),(2,1,2,2,2,2,2),(3,1,2,2,2,2,2),(4,1,2,2,2,2,2),(5,1,23,7,6,4,3),(6,1,23,7,6,4,3),(7,1,23,7,6,4,3),(8,1,23,7,6,4,3),(9,1,11,7,6,4,3),(10,1,11,7,6,4,3),(11,1,3,3,2,2,2),(12,1,3,3,2,2,2),(13,1,3,3,2,2,2),(14,1,2,1,3,2,3),(15,3,1,2,2,1,1),(16,1,2,3,2,2,2),(17,1,2,3,2,2,2),(18,1,2,3,2,2,2),(19,1,5,2,2,1,1),(20,2,1,1,1,1,1),(21,2,1,1,1,1,1),(22,2,4,5,2,2,2);
/*!40000 ALTER TABLE `compartimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `contacto` varchar(250) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  KEY `usuario` (`usuario`),
  CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversa`
--

DROP TABLE IF EXISTS `conversa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(512) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `corretor` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `remetente` int(11) NOT NULL,
  `visto` tinyint(1) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversa`
--

LOCK TABLES `conversa` WRITE;
/*!40000 ALTER TABLE `conversa` DISABLE KEYS */;
INSERT INTO `conversa` VALUES (1,'Primeira mensagem','2023-03-25 02:11:00',1,20,0,0,0),(2,'Segunda mensagem','2023-03-29 05:44:23',2,20,0,NULL,NULL),(3,'Mensagem aleatoria','2023-03-29 05:44:23',1,20,1,0,0),(4,'Terceira Mensagem','2023-04-03 15:23:23',1,20,1,0,0),(5,'Quarta Mensagem no sistema','2023-04-03 15:26:56',1,20,1,0,0),(6,'Quinta Mensagem no sistema','2023-04-03 15:29:13',1,20,1,0,0),(7,'Sexta Mensagem no sistema','2023-04-03 15:54:20',1,20,1,0,0),(8,'Setima Mensagem no sistema','2023-04-23 23:00:00',1,20,1,0,0),(9,'Evidencia David','2023-04-23 23:00:00',2,20,1,0,0),(10,'Oitava Mensagem no sistema','2023-04-23 23:00:00',1,20,0,0,0),(11,'Nona Mensagem','2023-04-23 23:00:00',1,20,0,0,0),(12,'Terminando conversa','2023-04-23 23:00:00',1,20,1,0,0),(13,'Decima Mensagem','2023-04-23 23:00:00',1,20,0,0,0),(14,'oitava mensagem','2023-04-23 23:00:00',1,20,0,0,0),(15,'19.000','2023-04-23 23:00:00',1,20,1,0,0),(16,'7','2023-04-23 23:00:00',1,20,1,0,0),(17,'Decima Mensagem','2023-04-23 23:00:00',1,20,1,0,0),(19,'Defesa hoje de PT','2023-04-25 23:00:00',1,20,1,0,0),(20,'Sauda├º├Áes senhor proprietario estou interessado no seu imovel.','2023-05-12 11:36:17',3,20,1,0,0),(21,'Sauda├º├Áes senhor proprietario estou interessado no seu imovel.','2023-05-12 11:36:31',1,20,1,0,0),(32,'    Nova Mensagem','2023-05-21 23:00:00',1,20,0,0,0),(33,'Recebeu a mensagem','2023-05-21 23:00:00',1,20,0,0,0),(34,'Mensagem sobre venda','2023-05-22 08:26:29',1,20,0,0,0),(35,'Mensagem para o Pedro','2023-05-24 23:33:24',1,0,0,0,0),(36,'Gerar Comprovativo','2023-05-24 23:35:04',1,20,0,0,0),(37,'Novo comprovativo','2023-05-24 23:38:36',1,20,0,0,0),(38,'Novo compro','2023-05-24 23:39:47',1,20,0,0,0),(39,'Novo c','2023-05-24 23:41:20',1,20,0,0,0),(40,'kjkjkjk','2023-05-24 23:42:05',1,20,0,0,0),(41,'lkjlkjljklj','2023-05-24 23:45:45',1,20,0,0,0),(42,';jljhklhj','2023-05-24 23:46:53',1,20,0,0,0),(43,'Comprovativo','2023-05-25 00:04:21',1,20,0,0,0),(44,'Comprovativo2','2023-05-25 00:05:50',1,20,0,0,0),(45,'Comprovativo3','2023-05-25 00:07:05',1,20,0,0,0),(46,'Comprovativo3','2023-05-25 00:09:02',1,20,0,0,0),(47,'Youtube.com','2023-05-25 00:18:40',1,20,0,0,0),(48,'khkhkjh','2023-05-25 21:00:18',1,20,0,0,0),(49,'Novo Comprovativo','2023-05-25 21:05:44',1,20,0,0,0),(50,'comprovativos/ad6a665178605d11a1eaa9265405af20.jpg','2023-05-25 21:05:44',1,20,0,0,0),(51,'comprovativos/2b782dcd33559ed830ebe35364d267cf.jpg','2023-05-25 21:24:04',1,20,0,0,0),(52,'comprovativos/cb6c3ba7ce26d2d113239ccfd04b9689.jpg','2023-05-25 23:41:08',1,20,1,0,0),(53,'comprovativos/49f85909261c50da795054edb73807b8.jpg','2023-05-26 12:09:52',1,20,1,0,0),(54,'Recebi a fotografia','2023-05-26 12:10:51',1,20,0,0,0),(55,'Sauda├º├Áes senhor proprietario estou interessado no seu imovel.','2023-05-26 12:12:45',1,27,1,0,0),(56,'Sauda├º├Áes senhor proprietario estou interessado no seu imovel.','2023-06-05 06:22:54',1,27,1,0,0);
/*!40000 ALTER TABLE `conversa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corrector`
--

DROP TABLE IF EXISTS `corrector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corrector` (
  `idcorrector` int(11) NOT NULL AUTO_INCREMENT,
  `primeironome` varchar(500) NOT NULL,
  `ultimonome` varchar(500) NOT NULL,
  `nascimento` date NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `provincia` varchar(11) NOT NULL,
  PRIMARY KEY (`idcorrector`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corrector`
--

LOCK TABLES `corrector` WRITE;
/*!40000 ALTER TABLE `corrector` DISABLE KEYS */;
INSERT INTO `corrector` VALUES (1,'Jocelmo','silva','2003-04-04','92382983','jocelmo@gmail.com','12345','0'),(2,'Evidencia','David','2021-01-31','923482388','evidenciadavid2016@gmail.com','12345','0'),(3,'Valeriano','Messele','2003-04-01','923828488','valeriano@gmail.com','corrector','Luanda');
/*!40000 ALTER TABLE `corrector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `detalhes_imovel`
--

DROP TABLE IF EXISTS `detalhes_imovel`;
/*!50001 DROP VIEW IF EXISTS `detalhes_imovel`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `detalhes_imovel` (
  `id` tinyint NOT NULL,
  `nomecorrector` tinyint NOT NULL,
  `sobrenomecorrector` tinyint NOT NULL,
  `telefonecorrector` tinyint NOT NULL,
  `emailcorrector` tinyint NOT NULL,
  `quartos` tinyint NOT NULL,
  `wc` tinyint NOT NULL,
  `cozinhas` tinyint NOT NULL,
  `sala` tinyint NOT NULL,
  `suite` tinyint NOT NULL,
  `preco` tinyint NOT NULL,
  `imagem` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `disponibilidade`
--

DROP TABLE IF EXISTS `disponibilidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidade`
--

LOCK TABLES `disponibilidade` WRITE;
/*!40000 ALTER TABLE `disponibilidade` DISABLE KEYS */;
INSERT INTO `disponibilidade` VALUES (1,'Em Renda'),(2,'Arrenda-se'),(3,'Indisponivel'),(4,'Eliminada');
/*!40000 ALTER TABLE `disponibilidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_conversa`
--

DROP TABLE IF EXISTS `estado_conversa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_conversa` (
  `nome` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(512) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `corretor` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_conversa`
--

LOCK TABLES `estado_conversa` WRITE;
/*!40000 ALTER TABLE `estado_conversa` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_conversa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens`
--

DROP TABLE IF EXISTS `imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagens` (
  `idimagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `imovel` int(11) NOT NULL,
  PRIMARY KEY (`idimagem`),
  UNIQUE KEY `unica` (`idimagem`,`nome`),
  UNIQUE KEY `nome` (`nome`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens_imovel`
--

DROP TABLE IF EXISTS `imagens_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagens_imovel` (
  `idimagemimovel` int(11) NOT NULL AUTO_INCREMENT,
  `nomeimagem` varchar(512) NOT NULL,
  `imovel` int(11) NOT NULL,
  PRIMARY KEY (`idimagemimovel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens_imovel`
--

LOCK TABLES `imagens_imovel` WRITE;
/*!40000 ALTER TABLE `imagens_imovel` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagens_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imovel`
--

DROP TABLE IF EXISTS `imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` int(11) DEFAULT NULL,
  `municipio` varchar(250) DEFAULT NULL,
  `bairro` varchar(250) DEFAULT NULL,
  `topologia` int(250) NOT NULL,
  `descricao` longtext DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `disponibilidade` int(11) DEFAULT NULL,
  `compartimentos` int(11) NOT NULL,
  `imagemperfil` varchar(255) NOT NULL,
  `data_registo` date DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lg` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `compartimentos` (`compartimentos`),
  KEY `desponibilidade` (`disponibilidade`),
  KEY `topologia` (`topologia`),
  KEY `imovel_ibfk_1` (`proprietario`),
  CONSTRAINT `imovel_ibfk_1` FOREIGN KEY (`proprietario`) REFERENCES `corrector` (`idcorrector`),
  CONSTRAINT `imovel_ibfk_4` FOREIGN KEY (`disponibilidade`) REFERENCES `disponibilidade` (`id`),
  CONSTRAINT `imovel_ibfk_5` FOREIGN KEY (`topologia`) REFERENCES `topologia_casa` (`id`),
  CONSTRAINT `imovel_ibfk_6` FOREIGN KEY (`compartimentos`) REFERENCES `compartimentos` (`idcompartimentos`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imovel`
--

LOCK TABLES `imovel` WRITE;
/*!40000 ALTER TABLE `imovel` DISABLE KEYS */;
INSERT INTO `imovel` VALUES (7,1,'Luanda','Rua das actrizes',7,'Uma mans├úo para aqueles que procuram espa├ºo vasto e conforto',23000,1,2,10,'data/f9274d3c8b589bd8d1b5caf8949c0019.jpg','2023-01-15',-8.836488057070731,13.228244899985858),(8,1,'Belas','Rua das actrizes',7,'Um apartamento pequeno mas confortavel',14000,1,2,11,'data/6c5ab93b55ce0d020aa6f5d23ca8c699.jpg','2023-01-07',-8.841413015069735,13.26852115275682),(9,1,'Luanda','Rua das actrizes',7,'Um apartamento pequeno mas confortavel',25000,1,1,12,'data/be1805704615ce75ce8d4305a9970b2b.jpg','2022-09-09',-8.83023122061557,13.26672834241028),(10,1,'Viana','Rua das actrizes',7,'Um apartamento pequeno mas confortavel',10000,1,1,13,'data/165ec977e52a231f7b0d8e7d68257f8f.jpg','2023-01-25',-8.8184637345674,13.2355995355748),(12,1,'Belas','Ngola kiluange',6,'Vivenda de dois andares',55000,3,2,15,'data/378281042b2bbee586c7c3c0c4909f3f.jpg','2023-01-12',-8.830682349808903,13.219318526854401),(15,1,'Cacuaco','Kiluange',6,'Vivenda no Alvalade',15000,2,2,21,'data/eb87e12e28a1d28a1461cb05722b436b.jpg','2023-05-26',-8.836488057070731,13.228244899985858),(16,1,'Luanda','Ngola kiluange',6,'Vivenda com varios compartimentos',30000,2,2,22,'data/2c6a09f94073566afe4cdc23492a0a40.jpg','2023-05-27',-8.836488057070731,13.228244899985858);
/*!40000 ALTER TABLE `imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interesse_imovel`
--

DROP TABLE IF EXISTS `interesse_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interesse_imovel` (
  `idInteresse` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `imovel` int(11) NOT NULL,
  `dataInteresse` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visualizado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idInteresse`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interesse_imovel`
--

LOCK TABLES `interesse_imovel` WRITE;
/*!40000 ALTER TABLE `interesse_imovel` DISABLE KEYS */;
INSERT INTO `interesse_imovel` VALUES (40,23,7,'2023-02-21 08:51:45',1),(42,23,11,'2023-02-21 08:51:45',1),(43,23,9,'2023-02-21 08:51:45',1),(44,18,12,'2023-02-21 10:27:20',1),(45,23,8,'2023-04-24 12:28:27',1),(46,26,9,'2023-04-24 19:51:27',1),(47,20,12,'2023-04-26 08:24:14',1),(48,20,9,'2023-05-26 00:19:42',1),(49,27,10,'2023-05-26 12:29:38',1),(50,27,7,'2023-06-05 08:50:36',1);
/*!40000 ALTER TABLE `interesse_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `listar_interesse`
--

DROP TABLE IF EXISTS `listar_interesse`;
/*!50001 DROP VIEW IF EXISTS `listar_interesse`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `listar_interesse` (
  `idInteresse` tinyint NOT NULL,
  `idimovel` tinyint NOT NULL,
  `proprietario` tinyint NOT NULL,
  `nome` tinyint NOT NULL,
  `sobrenome` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `dataInteresse` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagens` (
  `idmensagem` int(11) NOT NULL AUTO_INCREMENT,
  `remetente` int(11) NOT NULL,
  `tiporemetente` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL,
  `tipodestinatario` int(11) NOT NULL,
  `mensagem` varchar(512) NOT NULL,
  `dataenvio` date NOT NULL,
  `datavisualizado` date NOT NULL,
  `visualizado` int(11) NOT NULL,
  PRIMARY KEY (`idmensagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_acesso`
--

DROP TABLE IF EXISTS `nivel_acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_acesso`
--

LOCK TABLES `nivel_acesso` WRITE;
/*!40000 ALTER TABLE `nivel_acesso` DISABLE KEYS */;
INSERT INTO `nivel_acesso` VALUES (0,'root'),(1,'Administrador'),(2,'Chef Editor'),(3,'Editor'),(4,'Afiliado'),(5,'Usuario normal');
/*!40000 ALTER TABLE `nivel_acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `idprovincias` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idprovincias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Luanda'),(2,'Benguela'),(3,'Huambo'),(4,'Bengo'),(5,'Bie'),(6,'Cabinda'),(7,'Cuando Cubango'),(8,'Cuanza Sul'),(9,'Cuanza Norte'),(10,'Cunene'),(11,'Huila'),(12,'Lunda Norte'),(13,'Lunda Sul'),(14,'Malanje'),(15,'Moxico'),(16,'Namibe'),(17,'Uige'),(18,'Zaire');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_imovel`
--

DROP TABLE IF EXISTS `tipo_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_imovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_imovel`
--

LOCK TABLES `tipo_imovel` WRITE;
/*!40000 ALTER TABLE `tipo_imovel` DISABLE KEYS */;
INSERT INTO `tipo_imovel` VALUES (1,'Vivenda'),(2,'Apartamento');
/*!40000 ALTER TABLE `tipo_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topologia_casa`
--

DROP TABLE IF EXISTS `topologia_casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topologia_casa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topologia` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topologia_casa`
--

LOCK TABLES `topologia_casa` WRITE;
/*!40000 ALTER TABLE `topologia_casa` DISABLE KEYS */;
INSERT INTO `topologia_casa` VALUES (6,'T-1'),(7,'T-2'),(8,'T-3'),(9,'T-4');
/*!40000 ALTER TABLE `topologia_casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `sobrenome` varchar(250) NOT NULL,
  `nacionalidade` varchar(250) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `senha` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `telefone` int(20) DEFAULT NULL,
  `genero` varchar(11) NOT NULL,
  `aniversario` date NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel_acesso` (`nivel_acesso`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivel_acesso`) REFERENCES `nivel_acesso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (18,'Duelyy','Diantantu','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','duely@infoestadia.co.ao',93283283,'','1999-09-03',''),(19,'Evidencia','Davi','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','evidenciadavid2016@gmail.com',99939992,'','2000-01-02',''),(20,'Pedro','Simao','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','pedro@gmail.com',923829830,'','2005-03-15','N\\a'),(23,'Duely','Diantantu','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','duelydiantantu18@gmail.com',943092,'Masculino','2000-10-06','N\\a'),(24,'JOAO','PEDRO','Angolana',5,'e10adc3949ba59abbe56e057f20f883e','joao@gmail.com',2147483647,'Masculino','2021-05-01','N\\a'),(25,'Pedro','Simao','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','pedrosimao@gmail.com',93239828,'Masculino','0000-00-00','N\\a'),(26,'Pedro','Simao','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','pedronovo@gmail.com',923829849,'Masculino','2003-03-30','N\\a'),(27,'Flavio','Augusto','Angolana',5,'827ccb0eea8a706c4c34a16891f84e7b','flavioaugusto@gmail.com',932842844,'Masculino','2003-04-01','N\\a'),(28,'Jocelmo','Da Silva','Angolana',5,'81dc9bdb52d04dc20036dbd8313ed055','jocelmo@gmail.com',923482938,'Masculino','2003-04-01','N\\a');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendaimovel`
--

DROP TABLE IF EXISTS `vendaimovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendaimovel` (
  `idvenda` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `imovel` int(11) NOT NULL,
  `datavenda` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idvenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendaimovel`
--

LOCK TABLES `vendaimovel` WRITE;
/*!40000 ALTER TABLE `vendaimovel` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendaimovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL AUTO_INCREMENT,
  `imovel` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `datavenda` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proprietarioimovel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvendas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'aluguer_casas'
--
/*!50003 DROP PROCEDURE IF EXISTS `criarimovel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `criarimovel`(IN `proprietario` INT, IN `topologia` INT,
 IN `quartos` INT, IN `cozinhas` INT, IN `suites` INT, IN `salas` INT, IN `wcs` INT, IN `estado` INT, IN `descricao` TEXT, 
 IN `provincia` INT, IN `municipio` VARCHAR(300), IN `rua` VARCHAR(500), IN `preco` DOUBLE, IN 
 `imagem` VARCHAR(300))
    NO SQL
BEGIN



DECLARE compartimentoUltimo int;

set compartimentoUltimo= 0;

INSERT INTO compartimentos VALUES( 0,proprietario, quartos, cozinhas, suites, salas, wcs);

set compartimentoUltimo = (select compartimentos.idcompartimentos from compartimentos ORDER by compartimentos.idcompartimentos DESC LIMIT 1);



INSERT INTO imovel VALUES( null,provincia, municipio, rua, topologia, descricao, preco, proprietario, 
estado, compartimentoUltimo, imagem, curdate(), '-8.836488057070731','13.228244899985858');

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `estatistica_corrector` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `estatistica_corrector`( id int, out qtd_imoveis int, out qtd_imoveis_vendidos int,
 out qtd_imoveis_alugados int, out qtd_interacoes int )
BEGIN
set qtd_imoveis = (SELECT count(imovel.id) FROM corrector inner join imovel on corrector.idcorrector=imovel.proprietario where corrector.idcorrector=id);
set qtd_imoveis_vendidos = 0;
set qtd_imoveis_alugados = 0;
set qtd_interacoes = (SELECT COUNT(idInteresse) from listar_interesse inner join 
corrector on corrector.idcorrector=listar_interesse.proprietario where corrector.idcorrector=id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `detalhes_imovel`
--

/*!50001 DROP TABLE IF EXISTS `detalhes_imovel`*/;
/*!50001 DROP VIEW IF EXISTS `detalhes_imovel`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `detalhes_imovel` AS select `imovel`.`id` AS `id`,`corrector`.`primeironome` AS `nomecorrector`,`corrector`.`ultimonome` AS `sobrenomecorrector`,`corrector`.`telemovel` AS `telefonecorrector`,`corrector`.`email` AS `emailcorrector`,`compartimentos`.`quartos` AS `quartos`,`compartimentos`.`wc` AS `wc`,`compartimentos`.`cozinhas` AS `cozinhas`,`compartimentos`.`sala` AS `sala`,`compartimentos`.`suite` AS `suite`,`imovel`.`preco` AS `preco`,`imovel`.`imagemperfil` AS `imagem` from ((`imovel` join `corrector` on(`imovel`.`proprietario` = `corrector`.`idcorrector`)) join `compartimentos` on(`imovel`.`compartimentos` = `compartimentos`.`idcompartimentos`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `listar_interesse`
--

/*!50001 DROP TABLE IF EXISTS `listar_interesse`*/;
/*!50001 DROP VIEW IF EXISTS `listar_interesse`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `listar_interesse` AS select `interesse_imovel`.`idInteresse` AS `idInteresse`,`imovel`.`id` AS `idimovel`,`imovel`.`proprietario` AS `proprietario`,`usuario`.`nome` AS `nome`,`usuario`.`sobrenome` AS `sobrenome`,`usuario`.`email` AS `email`,`interesse_imovel`.`dataInteresse` AS `dataInteresse` from ((`interesse_imovel` join `usuario` on(`interesse_imovel`.`usuario` = `usuario`.`id`)) join `imovel` on(`interesse_imovel`.`imovel` = `imovel`.`id`)) */;
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

-- Dump completed on 2023-06-08 19:49:57
