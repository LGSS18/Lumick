-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Set-2022 às 04:54
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lumick`
--
CREATE DATABASE IF NOT EXISTS `lumick` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `lumick`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alugar`
--

DROP TABLE IF EXISTS `alugar`;
CREATE TABLE IF NOT EXISTS `alugar` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdFilme` int NOT NULL,
  `NomeUsuario` varchar(15) NOT NULL,
  `NomeFilme` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `alugar`
--

INSERT INTO `alugar` (`Id`, `IdFilme`, `NomeUsuario`, `NomeFilme`, `Status`) VALUES
(1, 1, 'Abner Leite', 'Deadpool', 'Concluido'),
(4, 1, 'martines', 'Deadpool', 'Ativo'),
(14, 1, 'Abner Leite', 'Deadpool', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE IF NOT EXISTS `filmes` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `Quantidade` int NOT NULL,
  `Preco` float NOT NULL,
  `Classificacao` int NOT NULL,
  `IdCadastrou` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`Id`, `Nome`, `Genero`, `Descricao`, `Quantidade`, `Preco`, `Classificacao`, `IdCadastrou`) VALUES
(1, 'Deadpool', 'Ação', 'Deadpool', 25, 27, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Login` varchar(11) NOT NULL,
  `Senha` varchar(15) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Idade` int NOT NULL,
  `Nivel` varchar(7) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`Id`, `Login`, `Senha`, `Nome`, `Idade`, `Nivel`) VALUES
(1, 'Lumick', 'fohat', 'Admin', 18, 'adm'),
(2, 'Abaporu', 'omelhor', 'Abner Leite', 18, 'cliente'),
(11, 'nata', 'abaporu', 'martines', 18, 'Cliente'),
(12, 'menor', '123', 'menor', 11, 'Cliente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
