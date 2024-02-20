-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.5036
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para intranet
CREATE DATABASE IF NOT EXISTS `intranet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `intranet`;


-- Copiando estrutura para tabela intranet.acesso
CREATE TABLE IF NOT EXISTS `acesso` (
  `id_acesso` int(4) NOT NULL AUTO_INCREMENT,
  `tipo_acesso` varchar(45) DEFAULT NULL,
  `ip_id_acesso` varchar(45) DEFAULT NULL,
  `usuario_acesso` varchar(45) DEFAULT NULL,
  `senha_acesso` varchar(45) DEFAULT NULL,
  `local_acesso` varchar(45) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`id_acesso`),
  KEY `fk_Acesso_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_Acesso_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.acesso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.analogica
CREATE TABLE IF NOT EXISTS `analogica` (
  `num_analogica` varchar(35) NOT NULL,
  `dispositivo_analogica` varchar(45) DEFAULT NULL,
  `operadora_analogica` varchar(45) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`num_analogica`),
  KEY `fk_Analogicas_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_Analogicas_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.analogica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `analogica` DISABLE KEYS */;
/*!40000 ALTER TABLE `analogica` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(4) NOT NULL AUTO_INCREMENT,
  `grp_cliente` varchar(45) DEFAULT NULL,
  `nome_cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.cliente: ~45 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `grp_cliente`, `nome_cliente`) VALUES
	(31, 'VIAMAR', 'VIAMAR'),
	(69, 'RIO DE JANEIRO - ITAVEMA', 'ITAVEMA'),
	(72, 'RONCATO', 'RONCATO'),
	(74, 'NOVA CHEVROLET', 'NOVA CHEVROLET'),
	(75, 'LVBA', 'LVBA'),
	(78, 'PIANNA', 'PIANNA'),
	(79, 'EDITORA MODERNA', 'MODERNA'),
	(80, 'SOROCABA - AUTOMEC', 'AUTOMEC'),
	(81, 'REDENILF', 'REDENILF'),
	(82, 'SAO PAULO - CARAM', 'CARAM'),
	(83, 'SAO BERNADO - FIBAM', 'FIBAM'),
	(84, 'MARIO GARNEIRO', 'MARIO GARNEIRO'),
	(86, 'JULIO SIMOES', 'JULIO SIMOES'),
	(87, 'PALUANA', 'PALUANA'),
	(88, 'PERSEVERANCA', 'PERSEVERANCA'),
	(89, 'PROTENDIT', 'PROTENDIT'),
	(90, 'SERTIC', 'SERTIC'),
	(91, 'UP ESSENCIA', 'UP ESSENCIA'),
	(92, 'PLEXPEL', 'PLEXPEL'),
	(93, 'SABIN', 'SABIN'),
	(94, 'MERZ', 'BIOLAB'),
	(102, 'ITUPEVA - BALILLA', 'BALILLA'),
	(103, 'INDAIATUBA - BALILLA', 'BALILLA'),
	(104, 'SANUS', 'BIOLAB'),
	(105, 'FIAT - CARMAIS', 'CARMAIS'),
	(106, 'NISSAN - CARMAIS', 'CARMAIS'),
	(107, 'HONDA NOVALUZ', 'CARMAIS'),
	(108, 'HONDA NOSSA MOTO', 'CARMAIS'),
	(109, 'CONTERRANEA SCANEA', 'CARMAIS'),
	(110, 'SAO JOSE DOS PINHAIS', 'FLORENCA'),
	(111, 'CURITIBA - FLORENCA', 'FLORENCA'),
	(112, 'JOINVILHE - FLORENCA', 'FLORENCA'),
	(113, 'MATRIZ - IMOB', 'CARMAIS'),
	(114, 'MATRIZ - FLORENCA', 'FLORENCA'),
	(116, 'FORTALEZA - GNC', 'GNC'),
	(117, 'SALVADOR - GNC', 'GNC'),
	(118, 'MINAS - GNC', 'GNC'),
	(119, 'SAO PAULO - ITAVEMA', 'ITAVEMA'),
	(120, 'MACEIO - ITAVEMA', 'ITAVEMA'),
	(121, 'DIARIO EL PAIS', 'MODERNA'),
	(122, 'TRD', 'TRD'),
	(123, 'WAYPARTNERS', 'WAYPARTNERS'),
	(124, 'STARTEC', 'STARTEC'),
	(125, 'TRICO', 'TRICO'),
	(126, 'AUDI CENTER SOROCABA', 'ABRAO REZE');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(4) NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(45) DEFAULT NULL,
  `cargo_contato` varchar(45) DEFAULT NULL,
  `tel_contato` varchar(45) DEFAULT NULL,
  `ramal_contato` varchar(45) DEFAULT NULL,
  `email_contato` varchar(45) DEFAULT NULL,
  `lojas_id_loja` int(11) NOT NULL,
  PRIMARY KEY (`id_contato`),
  KEY `fk_contatos_Lojas1_idx` (`lojas_id_loja`),
  CONSTRAINT `fk_contatos_Lojas1` FOREIGN KEY (`lojas_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.contato: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`id_contato`, `nome_contato`, `cargo_contato`, `tel_contato`, `ramal_contato`, `email_contato`, `lojas_id_loja`) VALUES
	(4, '', '', '', '', '', 58),
	(5, 'ANDRE FOGACA', 'TI', '(15) 98134-4522 / (15) 3229-5353', '', 'andre.fogaca@abraoreze.com.br', 133);
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.e1
CREATE TABLE IF NOT EXISTS `e1` (
  `num_e1` varchar(35) NOT NULL,
  `tecn_e1` varchar(45) DEFAULT NULL,
  `rang_rddr_e1` varchar(35) DEFAULT NULL,
  `dispositivo_e1` varchar(45) DEFAULT NULL,
  `operadora_e1` varchar(45) DEFAULT NULL,
  `qtdcanais_e1` varchar(35) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`num_e1`),
  KEY `fk_E1_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_E1_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.e1: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `e1` DISABLE KEYS */;
INSERT INTO `e1` (`num_e1`, `tecn_e1`, `rang_rddr_e1`, `dispositivo_e1`, `operadora_e1`, `qtdcanais_e1`, `loja_id_loja`) VALUES
	('(15) 21028000', 'MODEM', '8000 A 8099', 'KHOMP', 'VIVO', '30', 58),
	('(15) 3141-9000', 'MODEM', '', 'GATEWAY UTECH 01 E1', 'VIVO', '30', 133);
/*!40000 ALTER TABLE `e1` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.gsm
CREATE TABLE IF NOT EXISTS `gsm` (
  `num_gsm` varchar(35) NOT NULL,
  `dispositivo_gsm` varchar(45) DEFAULT NULL,
  `operadora_gsm` varchar(45) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`num_gsm`),
  KEY `fk_Gsm_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_Gsm_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.gsm: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `gsm` DISABLE KEYS */;
/*!40000 ALTER TABLE `gsm` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.gw
CREATE TABLE IF NOT EXISTS `gw` (
  `id_gw` int(4) NOT NULL AUTO_INCREMENT,
  `tipo_gw` varchar(45) DEFAULT NULL,
  `modelo_gw` varchar(45) DEFAULT NULL,
  `ip_gw` varchar(45) DEFAULT NULL,
  `acesso_gw` varchar(45) DEFAULT NULL,
  `po_acesso_gw` varchar(45) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`id_gw`),
  KEY `fk_Gateway_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_Gateway_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.gw: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `gw` DISABLE KEYS */;
INSERT INTO `gw` (`id_gw`, `tipo_gw`, `modelo_gw`, `ip_gw`, `acesso_gw`, `po_acesso_gw`, `loja_id_loja`) VALUES
	(28, 'UTECH', 'e1', '192.168.15.11', '177.69.59.225', '8080', 133),
	(31, 'REALTONE 32P', 'fxs', '192.168.15.12', '177.69.59.225', '8081', 133);
/*!40000 ALTER TABLE `gw` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.loja
CREATE TABLE IF NOT EXISTS `loja` (
  `id_loja` int(4) NOT NULL AUTO_INCREMENT,
  `nome_loja` varchar(45) NOT NULL,
  `lograd_loja` varchar(45) DEFAULT NULL,
  `bairro_loja` varchar(45) DEFAULT NULL,
  `cidade_loja` varchar(45) DEFAULT NULL,
  `cnpj_loja` varchar(45) DEFAULT NULL,
  `rsoc_loja` varchar(45) DEFAULT NULL,
  `cliente_id_cliente` int(4) NOT NULL,
  PRIMARY KEY (`id_loja`),
  KEY `fk_Lojas_Clientes_idx` (`cliente_id_cliente`),
  CONSTRAINT `fk_Lojas_Clientes` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.loja: ~64 rows (aproximadamente)
/*!40000 ALTER TABLE `loja` DISABLE KEYS */;
INSERT INTO `loja` (`id_loja`, `nome_loja`, `lograd_loja`, `bairro_loja`, `cidade_loja`, `cnpj_loja`, `rsoc_loja`, `cliente_id_cliente`) VALUES
	(58, 'CHEVROLET AUTOMEC', '', '', '', '', '', 80),
	(73, 'FIAT BALILLA', NULL, NULL, NULL, NULL, NULL, 103),
	(74, 'VOLKSWAGEN IVESA BALILLA', NULL, NULL, NULL, NULL, NULL, 102),
	(75, 'BIOLAB CALL CENTER', NULL, NULL, NULL, NULL, NULL, 104),
	(76, 'BIOLAB MERZ', NULL, NULL, NULL, NULL, NULL, 94),
	(77, 'CARAM', NULL, NULL, NULL, NULL, NULL, 82),
	(79, 'FIAT CDA CARMAIS', NULL, NULL, NULL, NULL, NULL, 105),
	(80, 'NISSAN WS CARMAIS', NULL, NULL, NULL, NULL, NULL, 106),
	(81, 'NISSAN JANGADA IMPORT CARMAIS', NULL, NULL, NULL, NULL, NULL, 106),
	(83, 'TERRALUZ WS CARMAIS', NULL, NULL, NULL, NULL, NULL, 107),
	(84, 'CAUCAIA CARMAIS', NULL, NULL, NULL, NULL, NULL, 108),
	(86, 'FORTALEZA (MATRIZ) CARMAIS', NULL, NULL, NULL, NULL, NULL, 108),
	(87, 'BATURITE CARMAIS', NULL, NULL, NULL, NULL, NULL, 108),
	(88, 'CONTERRANEA MOSSORO CARMAIS', NULL, NULL, NULL, NULL, NULL, 109),
	(89, 'CONTERRANEA MACAIBA CARMAIS', NULL, NULL, NULL, NULL, NULL, 109),
	(90, 'CONTERRANEA MATRIZ CARMAIS', NULL, NULL, NULL, NULL, NULL, 109),
	(91, 'FIBAM', NULL, NULL, NULL, NULL, NULL, 83),
	(93, 'NOVALUZ BS CARMAIS', NULL, NULL, NULL, NULL, NULL, 107),
	(94, 'MARECHAL FLORENCA', NULL, NULL, NULL, NULL, NULL, 111),
	(96, 'XV DE NOVEMBRO FLORENCA', NULL, NULL, NULL, NULL, NULL, 112),
	(98, 'JEEP PINHAIS - FLORENCA', NULL, NULL, NULL, NULL, NULL, 110),
	(100, 'IMOBILIARIA CARMAIS', NULL, NULL, NULL, NULL, NULL, 113),
	(101, 'MATRIZ FLORENCA', NULL, NULL, NULL, NULL, NULL, 114),
	(102, 'CONTAGEM GNC', NULL, NULL, NULL, NULL, NULL, 118),
	(103, 'CODISMAN GNC', NULL, NULL, NULL, NULL, NULL, 116),
	(104, 'GRANDE BAHIA GNC', NULL, NULL, NULL, NULL, NULL, 117),
	(105, 'FIAT MEIER', NULL, NULL, NULL, NULL, NULL, 69),
	(106, 'FIAT CAMPO GRANDE', NULL, NULL, NULL, NULL, NULL, 69),
	(107, 'INTERJAPAN BOTA FOGO', NULL, NULL, NULL, NULL, NULL, 69),
	(108, 'INTERJAPAN SAO JOAO', NULL, NULL, NULL, NULL, NULL, 69),
	(109, 'FIAT NOVA IGUACU', NULL, NULL, NULL, NULL, NULL, 69),
	(110, 'HYUNDAI CAXIAS', NULL, NULL, NULL, NULL, NULL, 69),
	(111, 'HYUNDAI SAO JOAO', NULL, NULL, NULL, NULL, NULL, 69),
	(112, 'HYUNDAI CAMPO GRANDE', NULL, NULL, NULL, NULL, NULL, 69),
	(113, 'HYUNDAI RIO DAS OSTRAS', NULL, NULL, NULL, NULL, NULL, 69),
	(114, 'BMW REAL GRANDEZA', NULL, NULL, NULL, NULL, NULL, 69),
	(115, 'TOYOTA ADM CORIFEU', NULL, NULL, NULL, NULL, NULL, 119),
	(116, 'BMW DO BRASIL', NULL, NULL, NULL, NULL, NULL, 120),
	(117, 'ITAVEMA CALL CENTER', NULL, NULL, NULL, NULL, NULL, 119),
	(118, 'CITROEN CARRAO', NULL, NULL, NULL, NULL, NULL, 119),
	(119, 'ITAVEMA DIRETORIA', NULL, NULL, NULL, NULL, NULL, 119),
	(120, 'FIAT RUDGE', NULL, NULL, NULL, NULL, NULL, 119),
	(121, 'FRANCE NISSAN CEASA', NULL, NULL, NULL, NULL, NULL, 119),
	(124, 'LAND ROVER MURUNA', NULL, NULL, NULL, NULL, NULL, 119),
	(125, 'PEUGEOT ARICANDUVA', NULL, NULL, NULL, NULL, NULL, 119),
	(126, 'JULIO SIMOES', NULL, NULL, NULL, NULL, NULL, 86),
	(127, 'MODERNA  MATRIZ', NULL, NULL, NULL, NULL, NULL, 79),
	(128, 'MODERNA  FILIAL', NULL, NULL, NULL, NULL, NULL, 79),
	(129, 'DIARIO EL PAIS', NULL, NULL, NULL, NULL, NULL, 121),
	(130, 'CONDOMINIO MARIO GARNEIRO', NULL, NULL, NULL, NULL, NULL, 84),
	(131, 'LVBA', NULL, NULL, NULL, NULL, NULL, 75),
	(132, 'NOVA CHEVROLET', NULL, NULL, NULL, NULL, NULL, 74),
	(133, 'AUDI ABRAO REZE', 'AV DR ARMANDO PANNUNZIO, 1091', 'JARDIM VERA CRUZ', 'SOROCABA', '20.141.163/0001-00', 'AUDICENTER SOROCABA COM DE VEIC LTDA', 126),
	(134, 'PALUANA', NULL, NULL, NULL, NULL, NULL, 87),
	(135, 'PERSEVERANCA', NULL, NULL, NULL, NULL, NULL, 88),
	(136, 'PIANNA VEICULOS', NULL, NULL, NULL, NULL, NULL, 78),
	(137, 'PLEXPEL PAPEIS', NULL, NULL, NULL, NULL, NULL, 92),
	(138, 'PROTENDIT', NULL, NULL, NULL, NULL, NULL, 89),
	(139, 'REDENILF', NULL, NULL, NULL, NULL, NULL, 81),
	(140, 'RONCATO ADVOGADOS', NULL, NULL, NULL, NULL, NULL, 72),
	(141, 'SABIN UBERABA', NULL, NULL, NULL, NULL, NULL, 93),
	(142, 'SERTIC', NULL, NULL, NULL, NULL, NULL, 90),
	(143, 'STARTEC', NULL, NULL, NULL, NULL, NULL, 124),
	(144, 'TRD ALMANARA', NULL, NULL, NULL, NULL, NULL, 122);
/*!40000 ALTER TABLE `loja` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.num_0800
CREATE TABLE IF NOT EXISTS `num_0800` (
  `num_0800` varchar(35) NOT NULL,
  `ddr_0800` varchar(35) DEFAULT NULL,
  `chave_0800` varchar(35) DEFAULT NULL,
  `fila_vdt_0800` varchar(45) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`num_0800`),
  KEY `fk_0800_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_0800_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.num_0800: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `num_0800` DISABLE KEYS */;
/*!40000 ALTER TABLE `num_0800` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.obs
CREATE TABLE IF NOT EXISTS `obs` (
  `id_obs` int(4) NOT NULL AUTO_INCREMENT,
  `possui_mesa_virtual_obs` tinyint(1) DEFAULT NULL,
  `licenca_mesa_obs` varchar(45) DEFAULT NULL,
  `possui_tel_ip_obs` tinyint(1) DEFAULT NULL,
  `ip_tel_obs` varchar(45) DEFAULT NULL,
  `modelo_tel_obs` varchar(45) DEFAULT NULL,
  `possui_g729` tinyint(1) DEFAULT NULL,
  `qtd_g729` varchar(45) DEFAULT NULL,
  `rang_ramal_obs` varchar(45) DEFAULT NULL,
  `geral_obs` longtext,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`id_obs`),
  KEY `fk_Obsgeral_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_Obsgeral_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.obs: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `obs` DISABLE KEYS */;
INSERT INTO `obs` (`id_obs`, `possui_mesa_virtual_obs`, `licenca_mesa_obs`, `possui_tel_ip_obs`, `ip_tel_obs`, `modelo_tel_obs`, `possui_g729`, `qtd_g729`, `rang_ramal_obs`, `geral_obs`, `loja_id_loja`) VALUES
	(16, 0, '', 0, '', '', 0, '', '', '<p style=_aspas_margin: 0in; font-family: Calibri; font-size: 12pt;_aspas_><span style=_aspas_font-weight:bold_aspas_><br></span></p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 12pt;_aspas_><b><u>Contato suporte Tarifador</u></b></p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 12pt;_aspas_><span style=_aspas_font-weight:bold_aspas_><br></span></p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 12pt;_aspas_><span style=_aspas_font-weight:bold_aspas_>Viviana de Mello</span></p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 11pt;_aspas_><span style=_aspas_font-weight:bold_aspas_>Service Delivery Manager</span></p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 11pt;_aspas_>Damovodo Brasil S/A</p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 11pt;_aspas_>Tel : 55 19 3743-1298</p><p style=_aspas_margin: 0in; font-family: Calibri; font-size: 11pt;_aspas_>Cel : 55 19 99946-7025</p><p style=_aspas_margin:0in;font-family:Calibri;font-size:11.0pt_aspas_>E-mail:<span style=_aspas_color:blue_aspas_> </span><a href=_aspas_mailto:viviana.mello@damovo.com_aspas_>viviana.mello@damovo-latam.com</a></p><p style=_aspas_margin:0in;font-family:Calibri;font-size:11.0pt_aspas_><a href=_aspas_http://www.damovo.com/_aspas_><span lang=_aspas_en-US_aspas_>www.damovo.com</span></a></p><p style=_aspas_margin:0in_aspas_><br></p>', 58),
	(18, 1, '', 1, '', 'YEALINK', 0, '', '900 A 9099', '<br><br><br>', 133);
/*!40000 ALTER TABLE `obs` ENABLE KEYS */;


-- Copiando estrutura para tabela intranet.servidor
CREATE TABLE IF NOT EXISTS `servidor` (
  `id_servidor` int(4) NOT NULL AUTO_INCREMENT,
  `mod_servidor` varchar(45) NOT NULL,
  `ip_servidor` varchar(25) DEFAULT NULL,
  `ser_princ_servidor` varchar(85) DEFAULT NULL,
  `ssh_servidor` varchar(45) DEFAULT NULL,
  `port_ssh_servidor` varchar(35) DEFAULT NULL,
  `web_servidor` varchar(45) DEFAULT NULL,
  `port_web_servidor` varchar(35) DEFAULT NULL,
  `loja_id_loja` int(4) NOT NULL,
  PRIMARY KEY (`id_servidor`),
  KEY `fk_Servidores_Lojas1_idx` (`loja_id_loja`),
  CONSTRAINT `fk_Servidores_Lojas1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela intranet.servidor: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `servidor` DISABLE KEYS */;
INSERT INTO `servidor` (`id_servidor`, `mod_servidor`, `ip_servidor`, `ser_princ_servidor`, `ssh_servidor`, `port_ssh_servidor`, `web_servidor`, `port_web_servidor`, `loja_id_loja`) VALUES
	(9, 'SDC 2', '10.1.135.59', 'GWE1, WEB', '201.64.137.132', '2202', 'http://179.184.151.75:8080/vdt/', '8080', 58),
	(10, 'SDC 1', '10.1.135.57', 'PABX, PERL, ASTMAN, (2 PLACAS KHOMP 30 CANAIS)', '201.64.137.132', '2201', '', '', 58),
	(11, 'SERVIDOR 1', '192.168.15.10', 'PERL -- ASTMANPROXY -- HTTPD', '177.69.59.225', '2222', 'SEM ACESSO', '', 133);
/*!40000 ALTER TABLE `servidor` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
