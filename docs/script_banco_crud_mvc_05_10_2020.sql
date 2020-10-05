-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 06-Out-2020 às 01:16
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_mvc`
--
CREATE DATABASE IF NOT EXISTS `crud_mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crud_mvc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `codigo_func` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(180) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `foto` varchar(32) NOT NULL,
  `Login_codigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo_func`),
  KEY `fk_Funcionario_Login_idx` (`Login_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo_func`, `nome_completo`, `cpf`, `rg`, `data_nascimento`, `foto`, `Login_codigo`) VALUES
(1, 'Administrador', '000.000.001.01', '800300', '2000-01-01', 'foto.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `Ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`codigo`, `nome`, `email`, `senha`, `Ativo`) VALUES
(1, 'Admin', 'admin@mail.com', '1', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `codigo_tel` int(11) NOT NULL AUTO_INCREMENT,
  `tel_celular` varchar(20) NOT NULL,
  `tel_celular_whatsapp` varchar(20) DEFAULT NULL,
  `tel_contato` varchar(20) DEFAULT NULL,
  `tel_residencial` varchar(20) DEFAULT NULL,
  `Funcionario_codigo_func` int(11) NOT NULL,
  PRIMARY KEY (`codigo_tel`),
  KEY `fk_Telefone_Funcionario1_idx` (`Funcionario_codigo_func`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`codigo_tel`, `tel_celular`, `tel_celular_whatsapp`, `tel_contato`, `tel_residencial`, `Funcionario_codigo_func`) VALUES
(1, '61992805060', '61982651000', '61982651000', '6133992030', 1);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_Funcionario_Login` FOREIGN KEY (`Login_codigo`) REFERENCES `login` (`codigo`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_Telefone_Funcionario1` FOREIGN KEY (`Funcionario_codigo_func`) REFERENCES `funcionario` (`codigo_func`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
