-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 06-Out-2020 às 16:24
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
  `primeiro_nome` varchar(60) NOT NULL,
  `nome_completo` varchar(180) NOT NULL,
  `email` varchar(120) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo_func`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `codigo_tel` int(11) NOT NULL AUTO_INCREMENT,
  `tel_contato` varchar(20) NOT NULL,
  `Funcionario_codigo_func` int(11) NOT NULL,
  PRIMARY KEY (`codigo_tel`),
  KEY `fk_Telefone_Funcionario1_idx` (`Funcionario_codigo_func`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_Telefone_Funcionario1` FOREIGN KEY (`Funcionario_codigo_func`) REFERENCES `funcionario` (`codigo_func`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
