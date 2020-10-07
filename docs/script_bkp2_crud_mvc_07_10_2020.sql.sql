-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/10/2020 às 20:33
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `codigo_func` int(11) NOT NULL,
  `primeiro_nome` varchar(60) NOT NULL,
  `nome_completo` varchar(180) NOT NULL,
  `email` varchar(120) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo_func`, `primeiro_nome`, `nome_completo`, `email`, `cpf`, `rg`, `data_nascimento`, `foto`) VALUES
(11, 'Marcos', 'Marcos da Silva', 'marcos2@mail.com', '745.535.908-08', '800.301', '2020-10-10', 'c7ed058eb74d65ccf1a09c1a44a559fd.jpeg'),
(13, 'Mara', 'Mara da Silva Pereira', 'mara@mail.com', '959.219.616-80', '800.301', '1980-01-01', '56d1534f6d881d6d6596a03ea4662a5c.jpeg'),
(14, 'Marcos', 'Marcos da Silva', 'marcos@mail.com', '571.932.362-70', '800.301', '1980-10-20', 'a9b58dc7d54338d81167750c0058f640.png'),
(15, 'Antonia Maria', 'Antonia Maria Pereira da Silva', 'antonia@mail.com', '854.149.631-77', '800.301', '2001-12-12', '09893ea8b76e12d92a7d5d35a62d759b.jpeg'),
(16, 'Marcos', 'Marcos da Silva', 'a124fr@gmail.com', '125.389.071-44', '800.301', '1990-01-01', '8c49121ea6f6eb88d45f536a37705d1b.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `codigo_tel` int(11) NOT NULL,
  `tel_contato` varchar(20) NOT NULL,
  `Funcionario_codigo_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `telefone`
--

INSERT INTO `telefone` (`codigo_tel`, `tel_contato`, `Funcionario_codigo_func`) VALUES
(44, '(61) 9981-7286', 11),
(45, '(61) 9981-7281', 11),
(46, '(61) 9981-7287', 11),
(53, '(61) 9981-7270', 13),
(54, '(61) 9981-7271', 13),
(55, '(61) 9981-7286', 14),
(56, '(61) 9981-7287', 14),
(57, '(61) 9981-7281', 14),
(58, '(61) 9981-7286', 15),
(59, '(61) 9981-7281', 15),
(60, '(61) 9981-7286', 16);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codigo_func`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`codigo_tel`),
  ADD KEY `fk_Telefone_Funcionario1_idx` (`Funcionario_codigo_func`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `codigo_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `codigo_tel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_Telefone_Funcionario1` FOREIGN KEY (`Funcionario_codigo_func`) REFERENCES `funcionario` (`codigo_func`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
