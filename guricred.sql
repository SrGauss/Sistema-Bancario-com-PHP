-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 10-Jul-2024 às 14:50
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guricred`
--
CREATE DATABASE IF NOT EXISTS `guricred` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `guricred`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

DROP TABLE IF EXISTS `cartao`;
CREATE TABLE IF NOT EXISTS `cartao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartao` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `ativo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NomeGerente` varchar(100) NOT NULL,
  `NomeCliente` varchar(100) NOT NULL,
  `ativo` varchar(10) NOT NULL,
  `CEP` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `NomeGerente`, `NomeCliente`, `ativo`, `CEP`) VALUES
(1, 'Levi', 'Carlos', 's', '93543-097'),
(2, 'Gustavo', 'Miguel', 's', '85527-936'),
(3, 'Gustavo', 'Pedro', 's', '86600-000'),
(4, 'Gustavo', 'Luan', 's', '15383-679'),
(6, 'Gustavo', 'Roberto', 's', '85305-638'),
(7, 'Gustavo', 'Lucas', 's', '24466-010'),
(8, 'Gustavo', 'Kaua', 's', '47400-000'),
(9, 'Gustavo', 'Luquinhas', 's', '12345-678'),
(10, 'Gustavo', 'Caio', 's', '39317-000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

DROP TABLE IF EXISTS `gerente`;
CREATE TABLE IF NOT EXISTS `gerente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(50) NOT NULL,
  `Senha` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`id`, `User`, `Senha`) VALUES
(1, 'Levi', 'Senha123'),
(3, 'Gustavo', 'Senha');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
