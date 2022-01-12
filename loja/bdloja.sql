-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 02-Out-2020 às 23:20
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdloja`
--
CREATE DATABASE IF NOT EXISTS `bdloja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdloja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `codcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomecategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`codcategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

DROP TABLE IF EXISTS `imagem`;
CREATE TABLE IF NOT EXISTS `imagem` (
  `codimagem` int(11) NOT NULL AUTO_INCREMENT,
  `nomeimagem` varchar(50) NOT NULL,
  `codproduto` int(11) NOT NULL,
  PRIMARY KEY (`codimagem`),
  KEY `codproduto` (`codproduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `codproduto` int(11) NOT NULL AUTO_INCREMENT,
  `codcategoria` int(11) NOT NULL,
  `nomeproduto` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `destaque` tinyint(1) NOT NULL,
  PRIMARY KEY (`codproduto`),
  KEY `codcategoria` (`codcategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `acesso` int(11) NOT NULL,
  PRIMARY KEY (`codusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
