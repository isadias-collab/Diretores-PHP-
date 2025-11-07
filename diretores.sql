-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/11/2025 às 18:27
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cinema_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretores`
--

CREATE TABLE `diretores` (
  `id` int NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `filme_mais_famoso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `diretores`
--

INSERT INTO `diretores` (`id`, `nome`, `nacionalidade`, `filme_mais_famoso`) VALUES
(1, 'esa', 'brasil', 'os farofeiros'),
(2, 'rodoanel', 'bangladechiano', 'meu malvado favorito 4'),
(3, 'rodoanel', 'bangladechiano', 'meu malvado favorito 4'),
(4, 'raó', 'sao paulino', 'mago rau'),
(5, 'raó', 'sao paulino', 'mago rau'),
(6, 'rafa', 'africana', 'por trás de uma janela '),
(7, 'rafa', 'africana', 'por trás de uma janela '),
(8, 'rafa', 'africana', 'por trás de uma janela '),
(9, 'rafa', 'africana', 'por trás de uma janela ');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `diretores`
--
ALTER TABLE `diretores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretores`
--
ALTER TABLE `diretores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
