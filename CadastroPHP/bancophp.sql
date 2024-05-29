-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 29/05/2024 às 18:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancophp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`cod`, `nome`) VALUES
(1, 'Dell'),
(2, 'Apple'),
(3, 'Amd'),
(4, 'Intel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pecas`
--

CREATE TABLE `pecas` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `pecas`
--
ALTER TABLE `pecas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `marca_cod` (`marca`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pecas`
--
ALTER TABLE `pecas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pecas`
--
ALTER TABLE `pecas`
  ADD CONSTRAINT `marca_cod` FOREIGN KEY (`marca`) REFERENCES `marcas` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
