--
-- Estrutura para tabela `nf_cadastro`
--

CREATE TABLE `nf_cadastro` (
  `nCadastro` mediumint(9) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `cCpfCnpj` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `cData` datetime NOT NULL,
  `cDataAlteracao` datetime DEFAULT NULL,
  `cTipo` enum('f','o','fo') COLLATE latin1_general_ci NOT NULL COMMENT 'onde 'f' é fornecedor , 'o' é oficina  e  'fo' é fornecedor e oficina',
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
  `cSenha` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `cInscricaoEstadual` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `cDDDTel` char(2) COLLATE latin1_general_ci NOT NULL,
  `cCelular` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `cDDDCel` char(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `nf_cadastro` (`nCadastro`, `cCpfCnpj`, `cData`, `cDataAlteracao`, `cTipo`, `cEmail`, `cRazaoSocial`, `cResponsavel`, `cTelefone`, `cRua`, `cNumero`, `cBairro`, `cPontoReferencia`, `cCep`, `cCidade`, `cEstado`, `cSenha`, `cInscricaoEstadual`, `cDDDTel`, `cCelular`, `cDDDCel`) VALUES
INSERT INTO `nf_cadastro` (`nCadastro`, `cCpfCnpj`, `cData`, `cDataAlteracao`, `cTipo`, `cEmail`, `cRazaoSocial`, `cResponsavel`, `cTelefone`, `cRua`, `cNumero`, `cBairro`, `cPontoReferencia`, `cCep`, `cCidade`, `cEstado`, `cSenha`, `cInscricaoEstadual`, `cDDDTel`, `cCelular`, `cDDDCel`) VALUES
(28, '4425846320014', '2017-09-29 12:08:36', NULL, 'f', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Salvador', 'BA', '$2y$10$PDL0U7lmYJDG0sU06UuzNO/vE2TJ.EInY1AKf1aguH8pw8Gge63wG', '456325412547895', '92', '992458745', '92'),
(29, '4452560010012', '2017-09-20 11:59:49', NULL, 'f', 'hash@email.com', 'Kaiux Moto Peças', 'contato hash', '36451544', 'rua hash', '89', 'bairro hash', '', '69852445', 'manaus', 'AM', '$2y$10$R3KUyOmNiNUzb9fVpDGza.jWoExOZaUBf1bST9Z38ujnrjugChVDG', '456254', '92', '994523655', '92'),
(30, '6642251023214', '2017-09-21 11:56:07', NULL, 'f', 'email.hash@email.com', 'criaÃ§Ã£o de sites', 'suporte', '36451578', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$Dqy4f5w.fqJr0AISF1IAouTu/KTorWPgvTzIr9Yw49fbYxatbfvTC', '154', '92', '992838426', '92'),
(31, '7780026020014', '2017-09-21 13:04:28', NULL, 'f', 'suporte@oh.com', 'criaÃ§Ã£o de sites', 'suporte', '36451563', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$98NpjVhvzIftx4C.TG.Bt.6tG3zDxPQdCLcs0iQZcBhz773hKOohG', '454563', '92', '992838426', '92'),
(32, '4425846320014', '2017-09-29 12:03:00', NULL, 'fo', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Manaus', 'AM', '$2y$10$NsGSaCN39gjPHV6M4ioY1.3IYklGAO5D/5P7Qo5YEmotqxpZpY4TS', '456325412547895', '92', '992458745', '92'),
(33, '4425846320014', '2017-09-29 12:12:19', NULL, 'f', 'nivea@natashamotocross.com.br', 'Natasha Moto Cross', 'Joyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Salvador', 'BA', '$2y$10$Stbd9GAa0wffBpT8kLTEFuQ08SsUb0G/VGoaZpltK2Ep8cvRIZZim', '456325412547895', '92', '992458745', '92'),
(34, '4425846320014', '2017-09-29 12:08:36', NULL, 'f', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Salvador', 'BA', '$2y$10$PDL0U7lmYJDG0sU06UuzNO/vE2TJ.EInY1AKf1aguH8pw8Gge63wG', '456325412547895', '92', '992458745', '92'),
(35, '4452560010012', '2017-09-20 11:59:49', NULL, 'f', 'hash@email.com', 'Kaiux Moto Peças', 'contato hash', '36451544', 'rua hash', '89', 'bairro hash', '', '69852445', 'manaus', 'AM', '$2y$10$R3KUyOmNiNUzb9fVpDGza.jWoExOZaUBf1bST9Z38ujnrjugChVDG', '456254', '92', '994523655', '92'),
(36, '6642251023214', '2017-09-21 11:56:07', NULL, 'f', 'email.hash@email.com', 'criaÃ§Ã£o de sites', 'suporte', '36451578', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$Dqy4f5w.fqJr0AISF1IAouTu/KTorWPgvTzIr9Yw49fbYxatbfvTC', '154', '92', '992838426', '92'),
(37, '7780026020014', '2017-09-21 13:04:28', NULL, 'f', 'suporte@oh.com', 'criaÃ§Ã£o de sites', 'suporte', '36451563', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$98NpjVhvzIftx4C.TG.Bt.6tG3zDxPQdCLcs0iQZcBhz773hKOohG', '454563', '92', '992838426', '92'),
(38, '4425846320014', '2017-09-29 12:03:00', NULL, 'fo', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Manaus', 'AM', '$2y$10$NsGSaCN39gjPHV6M4ioY1.3IYklGAO5D/5P7Qo5YEmotqxpZpY4TS', '456325412547895', '92', '992458745', '92'),
(39, '4425846320014', '2017-09-29 12:08:36', NULL, 'o', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Salvador', 'BA', '$2y$10$PDL0U7lmYJDG0sU06UuzNO/vE2TJ.EInY1AKf1aguH8pw8Gge63wG', '456325412547895', '92', '992458745', '92'),
(40, '4452560010012', '2017-09-20 11:59:49', NULL, 'o', 'hash@email.com', 'Kaiux Moto Peças', 'contato hash', '36451544', 'rua hash', '89', 'bairro hash', '', '69852445', 'manaus', 'AM', '$2y$10$R3KUyOmNiNUzb9fVpDGza.jWoExOZaUBf1bST9Z38ujnrjugChVDG', '456254', '92', '994523655', '92'),
(41, '6642251023214', '2017-09-21 11:56:07', NULL, 'o', 'email.hash@email.com', 'criaÃ§Ã£o de sites', 'suporte', '36451578', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$Dqy4f5w.fqJr0AISF1IAouTu/KTorWPgvTzIr9Yw49fbYxatbfvTC', '154', '92', '992838426', '92'),
(42, '7780026020014', '2017-09-21 13:04:28', NULL, 'o', 'suporte@oh.com', 'criaÃ§Ã£o de sites', 'suporte', '36451563', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$98NpjVhvzIftx4C.TG.Bt.6tG3zDxPQdCLcs0iQZcBhz773hKOohG', '454563', '92', '992838426', '92'),
(43, '4425846320014', '2017-09-29 12:03:00', NULL, 'o', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Manaus', 'AM', '$2y$10$NsGSaCN39gjPHV6M4ioY1.3IYklGAO5D/5P7Qo5YEmotqxpZpY4TS', '456325412547895', '92', '992458745', '92'),
(48, '4425846320014', '2017-09-29 12:08:36', NULL, 'f', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Salvador', 'BA', '$2y$10$PDL0U7lmYJDG0sU06UuzNO/vE2TJ.EInY1AKf1aguH8pw8Gge63wG', '456325412547895', '92', '992458745', '92'),
(49, '4452560010012', '2017-09-20 11:59:49', NULL, 'o', 'hash@email.com', 'Kaiux Moto Peças', 'contato hash', '36451544', 'rua hash', '89', 'bairro hash', '', '69852445', 'manaus', 'AM', '$2y$10$R3KUyOmNiNUzb9fVpDGza.jWoExOZaUBf1bST9Z38ujnrjugChVDG', '456254', '92', '994523655', '92'),
(50, '6642251023214', '2017-09-21 11:56:07', NULL, 'o', 'email.hash@email.com', 'criaÃ§Ã£o de sites', 'suporte', '36451578', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$Dqy4f5w.fqJr0AISF1IAouTu/KTorWPgvTzIr9Yw49fbYxatbfvTC', '154', '92', '992838426', '92'),
(51, '7780026020014', '2017-09-21 13:04:28', NULL, 'o', 'suporte@oh.com', 'criaÃ§Ã£o de sites', 'suporte', '36451563', 'rua eliete silveira', '66', 'santel', 'estaÃ§Ã£o de Ã´nibus', '69059220', 'manaus', 'AM', '$2y$10$98NpjVhvzIftx4C.TG.Bt.6tG3zDxPQdCLcs0iQZcBhz773hKOohG', '454563', '92', '992838426', '92'),
(52, '4425846320014', '2017-09-29 12:03:00', NULL, 'o', 'ligia@natashamotocross.com.br', 'Natasha Moto Cross', 'Keyce', '36458455', 'rua biribÃ¡', '48', 'SÃ£o Geraldo', 'Academia Rio negro', '69452224', 'Manaus', 'AM', '$2y$10$NsGSaCN39gjPHV6M4ioY1.3IYklGAO5D/5P7Qo5YEmotqxpZpY4TS', '456325412547895', '92', '992458745', '92');


--
-- Estrutura para tabela `nf_subcategoria`
--

CREATE TABLE `nf_subcategoria` (
  `nSubcategoria` mediumint(9) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `sSubCategoria` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sStatus` enum('ativo','inativo') NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


--
-- Estrutura para tabela `nf_item`
--

CREATE TABLE `nf_item` (
  `nItem` mediumint(9) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `iData` date NOT NULL,
  `iDataAlteracao` date DEFAULT NULL,
  `iStatus` enum('ativo','inativo') NOT NULL,
  `iCategoria` enum('carro','moto','lancha','caminhão') NOT NULL,
  `iEstado` enum('novo','seminovo') NOT NULL,
  `iTitulo` varchar(45) NOT NULL,
  `iPreco` float NOT NULL,
  `fk_subcategoria` mediumint(9) NOT NULL,
  `fk_dono` mediumint(9) NOT NULL,
    FOREIGN KEY (fk_dono) REFERENCES nf_cadastro(nCadastro),
    FOREIGN KEY (fk_subcategoria) REFERENCES nf_subcategoria(nSubcategoria)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `nf_item` (`iData`, `iDataAlteracao`, `iStatus`, `iCategoria`, `iEstado`, `iTitulo`, `iPreco`, `fk_subcategoria`, `fk_dono`) VALUES
('2017-10-04', NULL, 'ativo', 'carro', 'novo', 'Stx 200 Motard R5 - Roncar 01', 112.8, 4, 28);
