-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/03/2023 às 20:45
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `recadastro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `nomeSocial` varchar(150) DEFAULT NULL,
  `cpf` varchar(18) NOT NULL,
  `rg` varchar(18) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pai` varchar(150) DEFAULT NULL,
  `mae` varchar(150) DEFAULT NULL,
  `etnia` varchar(45) DEFAULT NULL,
  `raca` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `escolaridade_id` int(11) NOT NULL,
  `nacionalidade_id` int(11) NOT NULL,
  `endereco_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `nome`, `nomeSocial`, `cpf`, `rg`, `data_nascimento`, `telefone`, `email`, `pai`, `mae`, `etnia`, `raca`, `sexo`, `genero`, `escolaridade_id`, `nacionalidade_id`, `endereco_id`) VALUES
(2, 'CHARLES BRUNO', 'CHARLES', '018.073.002-93', '3672417', '2023-03-01', '95991139073', NULL, 'JOSE FERREIRA SILVA', 'MARIA KASSIA SILVA DE SOUSA', 'NÃO POSSUI', 'BRANCO', 'MASCULINO', 'HETEROSEXUAL', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `num` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `num`, `bairro`, `cidade`, `estado`) VALUES
(1, '69312405', 'RUA PROVERBIO', '311', 'CINTURAO VERDE', 'BOA VISTA', 'RORAIMA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolaridade`
--

CREATE TABLE `escolaridade` (
  `id` int(11) NOT NULL,
  `escolaridade` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `escolaridade`, `tipo`) VALUES
(1, 'ENSINO SUPERIOR COMPLETO', 'PARTICULAR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `id` int(11) NOT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id`, `nacionalidade`, `pais`, `uf`, `cidade`) VALUES
(1, 'BRASILEIRO', 'BRASIL', 'RR', 'BOA VISTA'),
(2, 'ESTRANGEIRO', 'VENEZUELA', 'OUTROS', 'OUTROS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_beneficiario_escolaridade_idx` (`escolaridade_id`),
  ADD KEY `fk_beneficiario_nacionalidade1_idx` (`nacionalidade_id`),
  ADD KEY `fk_beneficiario_endereco1_idx` (`endereco_id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `escolaridade`
--
ALTER TABLE `escolaridade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `escolaridade`
--
ALTER TABLE `escolaridade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `fk_beneficiario_endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_beneficiario_escolaridade` FOREIGN KEY (`escolaridade_id`) REFERENCES `escolaridade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_beneficiario_nacionalidade1` FOREIGN KEY (`nacionalidade_id`) REFERENCES `nacionalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
