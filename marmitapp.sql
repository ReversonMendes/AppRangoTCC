-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Set-2015 às 18:03
-- Versão do servidor: 5.6.14
-- versão do PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `marmitapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapios`
--

CREATE TABLE IF NOT EXISTS `cardapios` (
  `idcardapio` int(11) NOT NULL AUTO_INCREMENT,
  `nomeprato` varchar(100) DEFAULT NULL,
  `diasemana` varchar(45) DEFAULT NULL,
  `dtalteracao` datetime DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `flaginativo` tinyint(1) DEFAULT NULL,
  `idempresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcardapio`),
  KEY `idusuario_idx` (`idusuario`),
  KEY `fk_cardapio_idempresa_idx` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cardapios`
--

INSERT INTO `cardapios` (`idcardapio`, `nomeprato`, `diasemana`, `dtalteracao`, `idusuario`, `flaginativo`, `idempresa`) VALUES
(1, 'XCCCCCCCCCCCCC', 'segunda', '0000-00-00 00:00:00', 47, 0, 1),
(2, 'xxxxxxxxxxxx', 'segunda', '0000-00-00 00:00:00', 47, 0, 1),
(3, 'teste', 'segunda', '2015-08-23 22:32:26', 47, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio_ingredientes`
--

CREATE TABLE IF NOT EXISTS `cardapio_ingredientes` (
  `idingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `idcardapio` int(11) NOT NULL,
  `nomeingrediente` varchar(45) DEFAULT NULL,
  `idempresa` int(11) NOT NULL,
  PRIMARY KEY (`idingrediente`),
  KEY `nomeingrediente` (`nomeingrediente`),
  KEY `idempresa` (`idempresa`),
  KEY `idcardapio` (`idcardapio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idempresa` int(11) NOT NULL,
  `razaosocial` varchar(45) DEFAULT NULL,
  `nomefantasia` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `fone` varchar(20) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idempresa`, `razaosocial`, `nomefantasia`, `endereco`, `cnpj`, `bairro`, `cep`, `fone`, `numero`, `email`) VALUES
(1, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregas`
--

CREATE TABLE IF NOT EXISTS `entregas` (
  `identrega` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `entregador` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`identrega`),
  KEY `fk_entregas_pedidos_idx` (`idpedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `idformapagamento` int(11) NOT NULL,
  `descrpagamento` varchar(45) DEFAULT NULL,
  `tipomoeda` varchar(45) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `dtalteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`idformapagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) NOT NULL,
  `nomecliente` varchar(45) DEFAULT NULL,
  `datapedido` datetime DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `idcardapio` int(11) DEFAULT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `localentrega` varchar(45) DEFAULT NULL,
  `fone` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `dtalteracao` datetime DEFAULT NULL,
  `idformapagamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_pedido_cardapio_idx` (`idcardapio`),
  KEY `fk_pedido_usuario_idx` (`idusuario`),
  KEY `fk_pedido_formapagamento_idx` (`idformapagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE IF NOT EXISTS `precos` (
  `idcardapio` int(11) NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `gramatura` varchar(45) DEFAULT NULL,
  `tamanho` varchar(1) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `dtalteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`idcardapio`),
  KEY `fk_idusuario_idx` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `dtnascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `flaginativo` tinyint(1) DEFAULT NULL,
  `idempresa` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_empresa_idx` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `usuario`, `senha`, `dtnascimento`, `email`, `flaginativo`, `idempresa`) VALUES
(47, 'Reverson', 'admin', '202cb962ac59075b964b07152d234b70', '0000-00-00', 'reversondv@gmail.com', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cardapios`
--
ALTER TABLE `cardapios`
  ADD CONSTRAINT `fk_cardapio_idempresa` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cardapio_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cardapio_ingredientes`
--
ALTER TABLE `cardapio_ingredientes`
  ADD CONSTRAINT `cardapio_ingredientes_ibfk_2` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`),
  ADD CONSTRAINT `cardapio_ingredientes_ibfk_3` FOREIGN KEY (`idcardapio`) REFERENCES `cardapios` (`idcardapio`);

--
-- Limitadores para a tabela `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `fk_entregas_pedidos` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_formapagamento` FOREIGN KEY (`idformapagamento`) REFERENCES `forma_pagamento` (`idformapagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idcardapio`) REFERENCES `cardapios` (`idcardapio`);

--
-- Limitadores para a tabela `precos`
--
ALTER TABLE `precos`
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `precos_ibfk_1` FOREIGN KEY (`idcardapio`) REFERENCES `cardapios` (`idcardapio`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
