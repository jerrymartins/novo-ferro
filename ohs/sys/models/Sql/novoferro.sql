-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `nf_admin`;
CREATE TABLE `nf_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `adNome` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `adEmail` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `adSenha` varchar(90) COLLATE latin1_general_ci NOT NULL,
  `adUltimoAcesso` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `nf_admin` (`id`, `adNome`, `adEmail`, `adSenha`, `adUltimoAcesso`) VALUES
(1,	'nfAdmin',	'jerry.adriany@operahouse.com.br',	'307315',	NULL);

DROP TABLE IF EXISTS `nf_cadastro`;
CREATE TABLE `nf_cadastro` (
  `nCadastro` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cCpfCnpj` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `cData` datetime NOT NULL,
  `cDataAlteracao` datetime DEFAULT NULL,
  `cTipo` enum('f','o','fo') COLLATE latin1_general_ci NOT NULL COMMENT 'onde ''f'' é fornecedor ,    ''o'' é oficina  e  ''fo'' é fornecedor e oficina',
  `cEmail` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `cRazaoSocial` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `cResponsavel` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cTelefone` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `cRua` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `cNumero` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `cBairro` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cPontoReferencia` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cCep` char(8) COLLATE latin1_general_ci NOT NULL,
  `cCidade` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `cEstado` char(2) COLLATE latin1_general_ci NOT NULL,
  `cSenha` varchar(90) COLLATE latin1_general_ci NOT NULL,
  `cInscricaoEstadual` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `cDDDTel` char(2) COLLATE latin1_general_ci NOT NULL,
  `cCelular` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `cDDDCel` char(2) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`nCadastro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `nf_cadastro` (`nCadastro`, `cCpfCnpj`, `cData`, `cDataAlteracao`, `cTipo`, `cEmail`, `cRazaoSocial`, `cResponsavel`, `cTelefone`, `cRua`, `cNumero`, `cBairro`, `cPontoReferencia`, `cCep`, `cCidade`, `cEstado`, `cSenha`, `cInscricaoEstadual`, `cDDDTel`, `cCelular`, `cDDDCel`) VALUES
(28,	'4425846320014',	'2017-09-29 12:08:36',	'2017-10-25 13:18:56',	'o',	'ligia@natashamotocross.com.br',	'Natasha Moto Cross ltda..',	'Keyce Ruiva',	'36458455',	'rua Eliete Silveira',	'66',	'Santa Etelvina',	'Academia Rio negro',	'69059220',	'Manaus',	'AM',	'8e6BgZ9WZhhPw',	'456325412547895',	'92',	'992458745',	'92'),
(29,	'4452560010012',	'2017-09-20 11:59:49',	'2017-11-29 15:50:46',	'o',	'hash@email.com',	'Kaiux Moto PeÃ§as',	'contato hash',	'36451544',	'Av. Gov. Amazonino Mendes',	'21',	'Santa Etelvina',	'',	'69059160',	'Manaus',	'AM',	'$2y$10$N5xZ88HXRrxzppK0Bwf1XexPySfP176qSmM6GZrQ85cvR5sz.Xvlq',	'456254',	'92',	'994523655',	'92'),
(30,	'6642251023214',	'2017-09-21 11:56:07',	'2017-11-28 20:52:18',	'o',	'via.norte@email.com',	'Shopping Via Norte',	'empresï¿½rios',	'36451578',	'Av. Arquiteto JosÃ© Henrique Bento Rodrigues',	'3760',	'Monte das Oliveiras',	'passando 300 metros do posto de gasolina',	'6909314',	'manaus',	'AM',	'$2y$10$KEbT2YD7dxkz0veNQr8ANOdYpb.qu5J8vD3f/VbfgP/ENXQJU2ySO',	'154',	'92',	'992838426',	'92'),
(68,	'7784452365412',	'2017-11-16 14:58:11',	'2017-12-02 14:17:19',	'o',	'zeroumbin@gmail.com',	'BinÃ¡rios',	'Jerry Martins',	'364515225',	'R. Jose Clemente',	'157',	'Centro',	'estaÃ§Ã£o de Ã´nibus',	'69010070',	'Manaus',	'AM',	'$2y$10$Vres3.k8Fn1u815JRJWsE.H515WfXyEfg99U3tO9NSWwUBSKsIENG',	'45632547845',	'92',	'995626842',	'92'),
(65,	'02849186000183',	'2017-10-26 15:10:21',	'2017-10-30 13:07:47',	'o',	'suporte@operahouse.com.br',	'Opera House Internet Ltda',	'Ricardo',	'36481800',	'Rua 15',	'450',	'Parque Dez de Novembro',	'CSU do Parque 10',	'6905533',	'Manaus',	'AM',	'$2y$10$o5rUaxu4FT8qPM/2Ygt2V.IRPd9a././FOxXCVYtWtSGFlxVnuvsm',	'04.144.455-8 Sn',	'92',	'991108045',	'92'),
(67,	'78976534567834',	'2017-11-01 23:25:08',	NULL,	'o',	'js.man@email.com',	'IrmÃ£o da Natasha',	'Jason Cunhado',	'',	'Rua Vicente de morais',	'297',	'Santo AntÃ´nio',	'',	'69093296',	'Manaus',	'AM',	'$2y$10$gCWX8jC1oCorgzrvwCFddO7UmobsuP7YUrJlHpQgVblMmOHOlrX/i',	'764678654',	'92',	'987657865',	'92'),
(69,	'0048865245874',	'2017-11-22 14:56:56',	'2017-11-28 20:33:08',	'o',	'jerry@giuliaiot.com',	'Giulia Autos',	'Jerry Martins',	'36452596',	'Av. Torquato TapajÃ³s',	'8251',	'Cachoeirinha',	'',	'69065160',	'Manaus',	'AM',	'$2y$10$Ik846uu4WvNmgqpAG8b.jepcs1AeZEWRdKv1W3cq2G/MwCYxaXcGa',	'145236547895412',	'92',	'993653560',	'92'),
(71,	'4456632145874',	'2017-12-12 16:45:09',	'2017-12-12 16:58:17',	'o',	'suporte@novoferro.com.br',	'Novo Ferro',	'Suporte NF',	'36254788',	'R. Samauma',	'156',	'Conjunto Galileia',	'escola velha2',	'69088420',	'Manaus',	'AM',	'$2y$10$n3WNSGp8fHswqpqUgcbHp.TpJ16w8zyLb/UqweEoehHV8A3Iyf61y',	'456321785412365',	'92',	'995632487',	'92');

DROP TABLE IF EXISTS `nf_config`;
CREATE TABLE `nf_config` (
  `nConfig` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `configName` varchar(20) NOT NULL,
  `configValue` varchar(255) NOT NULL,
  `configDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`nConfig`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Configurações do sistema NovoFerro';

INSERT INTO `nf_config` (`nConfig`, `configName`, `configValue`, `configDescription`) VALUES
(1,	'emailwebmaster',	'novoferro@operahouse.com.br',	'E-mail do webmaster (recebe notificação de erros do sistema'),
(2,	'emailnovoferro',	'novoferro@operahouse.com.br',	'E-mail do site (recebe notificações que não sejam do webmaster)'),
(3,	'debug',	'true',	'Ativar log de erros do site?'),
(4,	'qtd',	'16',	'Número de resultados nas listas e buscas'),
(5,	'telefonesite',	'0908.0961 | 6080.0962',	'Telefones exibidos no cabeçalho e rodapé do site'),
(6,	'facebook',	'https://facebook.com/novoferro',	'Endereço do Facebook'),
(7,	'instagram',	'https://instagram.com/novoferro',	'Endereço do Instagram'),
(8,	'googleplus',	'',	'Endereço do GooglePlus'),
(9,	'seotitle',	'Novo Ferro - Portal de peÃ§as para carros, motos, lanchas e cadastro de oficinas e fornecedores',	'SEO: Title (o título exibido na barra do navegador e indexado pelo Google)'),
(10,	'seodescription',	'PeÃ§as novas e usadas para carros, motos e lanchas. Cadastro de oficinas e fornecedores de peï¿½as',	'SEO: Description (a descrição sugerida ao Google)'),
(11,	'seokeywords',	'peÃ§as, oficinas, carros, motos, lanchas',	'SEO: Palavras-chave'),
(12,	'debug',	'sim',	'Debugar sistema?');

DROP TABLE IF EXISTS `nf_item`;
CREATE TABLE `nf_item` (
  `nItem` mediumint(9) NOT NULL AUTO_INCREMENT,
  `iData` datetime NOT NULL,
  `iDataAlteracao` datetime DEFAULT NULL,
  `iStatus` enum('ativo','inativo') COLLATE latin1_general_ci NOT NULL,
  `iCategoria` enum('carro','moto','lancha','caminhao') COLLATE latin1_general_ci NOT NULL,
  `iEstado` enum('novo','seminovo') COLLATE latin1_general_ci NOT NULL,
  `iTitulo` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `iPreco` float NOT NULL,
  `iPasta` int(9) DEFAULT NULL,
  `iImagem` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `iImagemMini` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `fk_subcategoria` mediumint(9) NOT NULL,
  `fk_dono` mediumint(9) NOT NULL,
  PRIMARY KEY (`nItem`),
  KEY `fk_dono` (`fk_dono`),
  KEY `fk_subcategoria` (`fk_subcategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `nf_item` (`nItem`, `iData`, `iDataAlteracao`, `iStatus`, `iCategoria`, `iEstado`, `iTitulo`, `iPreco`, `iPasta`, `iImagem`, `iImagemMini`, `fk_subcategoria`, `fk_dono`) VALUES
(125,	'2017-12-19 20:54:50',	NULL,	'ativo',	'lancha',	'novo',	'lancha nova',	175000,	2,	'image_resized1513716890.jpg',	NULL,	1,	71),
(124,	'2017-12-18 17:47:21',	'2017-12-18 17:47:56',	'ativo',	'moto',	'novo',	'roda aro preto liga carbono 17',	450,	2,	'image_resized1513619241.jpg',	NULL,	20,	71),
(123,	'2017-12-17 23:55:14',	NULL,	'ativo',	'moto',	'novo',	'guidÃ£o modelo XL',	179,	2,	'image_resized1513554914.jpg',	NULL,	13,	71),
(122,	'2017-12-17 21:43:16',	NULL,	'ativo',	'carro',	'novo',	'roda aro 18 ',	99,	1,	'image_resized1513546996.png',	NULL,	20,	71),
(116,	'2017-12-12 18:46:13',	'2017-12-17 21:19:19',	'ativo',	'moto',	'seminovo',	'guidÃ£o modelo v',	35.9,	1,	'image_resized1513545559.jpg',	NULL,	13,	71),
(120,	'2017-12-17 21:20:06',	'2017-12-18 17:43:55',	'ativo',	'moto',	'seminovo',	'carburador em bom estado de conservaÃ§Ã£o',	340,	2,	'image_resized1513619035.jpg',	NULL,	35,	71),
(118,	'2017-12-13 15:11:44',	'2017-12-17 21:16:48',	'ativo',	'moto',	'seminovo',	'XJ',	7000,	1,	'image_resized1513545408.jpg',	NULL,	32,	71),
(121,	'2017-12-17 21:27:57',	NULL,	'ativo',	'moto',	'novo',	'aro 16',	99,	1,	'image_resized1513546077.jpg',	NULL,	20,	71);

DROP TABLE IF EXISTS `nf_paginas`;
CREATE TABLE `nf_paginas` (
  `nPagina` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pDateUpdate` datetime NOT NULL,
  `pTitle` varchar(255) NOT NULL,
  `pDescription` varchar(255) NOT NULL,
  `pKeywords` varchar(255) NOT NULL,
  `pText` text NOT NULL,
  PRIMARY KEY (`nPagina`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Páginas do site Novo Ferro';

INSERT INTO `nf_paginas` (`nPagina`, `pDateUpdate`, `pTitle`, `pDescription`, `pKeywords`, `pText`) VALUES
(1,	'2017-12-12 18:39:49',	'Quem somos',	'Portal Novo Ferro | Quem Somos',	'peÃ§as, carros, motos, lanchas, caminhÃµes',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non libero lacus. Mauris a euismod tortor. Aliquam fringilla turpis ut metus aliquam tempus imperdiet dui tempor. Donec sit amet porttitor lorem. Ut sit amet massa vitae metus facilisis malesuada sed vel sapien. Curabitur ac dolor quam. \r\n\r\nQuisque non neque non lorem vulputate venenatis. Phasellus pellentesque sollicitudin justo, id malesuada dolor posuere nec. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\n\r\nPraesent ut orci felis, a tincidunt sem. Nam hendrerit, erat nec adipiscing feugiat, dolor orci elementum massa, id euismod felis eros at arcu. In ut leo luctus lectus condimentum gravida. Sed mattis, libero eget auctor venenatis, magna orci tempor neque, at blandit erat tellus at turpis. Aenean gravida, nulla ac cursus dignissim, odio metus semper dolor, vitae aliquam leo arcu a magna. Duis commodo convallis sollicitudin. \r\n\r\nSed eleifend, odio et ultrices dictum, lacus nisi malesuada urna, eget commodo turpis nibh at massa. Pellentesque sagittis iaculis nunc, sit amet suscipit risus molestie vel.\r\n');

DROP TABLE IF EXISTS `nf_subcategoria`;
CREATE TABLE `nf_subcategoria` (
  `nSubcategoria` mediumint(9) NOT NULL AUTO_INCREMENT,
  `sSubCategoria` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `sCarro` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'Categoria incluída para Carros',
  `sCaminhao` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'Categoria incluída para Caminhõess',
  `sLancha` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'Categoria incluída para Lanchas e Jets',
  `sMoto` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'Categoria incluída para Motos',
  PRIMARY KEY (`nSubcategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `nf_subcategoria` (`nSubcategoria`, `sSubCategoria`, `sCarro`, `sCaminhao`, `sLancha`, `sMoto`) VALUES
(1,	'Outros',	'1',	'1',	'1',	'1'),
(3,	'Cabos',	'0',	'1',	'1',	'1'),
(35,	'Carburador',	'1',	'1',	'1',	'1'),
(5,	'Carenagens',	'1',	'0',	'0',	'0'),
(30,	'nitrox',	'1',	'0',	'0',	'1'),
(7,	'Componentes de Freio',	'1',	'1',	'0',	'1'),
(8,	'Componentes ElÃ©tricos',	'1',	'1',	'1',	'1'),
(9,	'Embreagem',	'1',	'1',	'0',	'0'),
(10,	'Escapamentos',	'1',	'1',	'0',	'1'),
(12,	'Filtros',	'0',	'0',	'1',	'1'),
(13,	'GuidÃ£o',	'0',	'0',	'0',	'1'),
(14,	'Lubrificantes',	'1',	'1',	'1',	'1'),
(31,	'Bancos',	'1',	'0',	'1',	'1'),
(16,	'Manoplas',	'0',	'0',	'0',	'0'),
(18,	'Pedais e Pedaleiras',	'0',	'0',	'0',	'0'),
(19,	'Retrovisores',	'1',	'1',	'0',	'1'),
(20,	'Rodas e Componentes',	'1',	'1',	'0',	'1'),
(21,	'TransmissÃ£o',	'1',	'1',	'0',	'1'),
(32,	'Motor',	'1',	'0',	'1',	'1'),
(23,	'Bombas',	'0',	'0',	'1',	'0'),
(25,	'Rolamentos',	'1',	'1',	'0',	'1');

-- 2017-12-19 21:33:03