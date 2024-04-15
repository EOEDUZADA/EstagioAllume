-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15/04/2024 às 16:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `allume`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `editais`
--

CREATE TABLE `editais` (
  `id` int(11) NOT NULL,
  `nome_edital` varchar(255) DEFAULT NULL,
  `nome_orgao_edital` varchar(255) DEFAULT NULL,
  `numero_edital` float DEFAULT NULL,
  `numero_processo` float DEFAULT NULL,
  `modalidade_edital` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `tipo_fornecimento` varchar(255) DEFAULT NULL,
  `data_final_edital` datetime DEFAULT NULL,
  `data_cadastro_edital` datetime DEFAULT NULL,
  `data_limite_orcamento_edital` datetime DEFAULT NULL,
  `valor_referencia_produto` float DEFAULT NULL,
  `arquivo_edital` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editais`
--

INSERT INTO `editais` (`id`, `nome_edital`, `nome_orgao_edital`, `numero_edital`, `numero_processo`, `modalidade_edital`, `tipo_documento`, `tipo_fornecimento`, `data_final_edital`, `data_cadastro_edital`, `data_limite_orcamento_edital`, `valor_referencia_produto`, `arquivo_edital`) VALUES
(87, NULL, 'eodududasguria', 213124, 4234, NULL, 'SRP', 'PRODUTO', '2024-04-15 09:23:53', '2024-04-15 09:23:53', '2024-04-15 09:23:53', NULL, 'allume.sql');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `qtd_produto` int(11) DEFAULT NULL,
  `und_produto` varchar(255) DEFAULT NULL,
  `desc_produto` varchar(255) DEFAULT NULL,
  `marca_produto` varchar(255) DEFAULT NULL,
  `modelo_produto` varchar(255) DEFAULT NULL,
  `valor_custo_produto` float DEFAULT NULL,
  `valor_minimo_produto` float DEFAULT NULL,
  `valor_cadastro_produto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `qtd_produto`, `und_produto`, `desc_produto`, `marca_produto`, `modelo_produto`, `valor_custo_produto`, `valor_minimo_produto`, `valor_cadastro_produto`) VALUES
(2, 23, 'UND', 'SACO DE LIXO 50L PT', 'daeo', 'saquinho preto', 3, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_do_edital`
--

CREATE TABLE `produtos_do_edital` (
  `id_produto_edital` bigint(20) UNSIGNED NOT NULL,
  `lote_produto_edital` varchar(255) DEFAULT NULL,
  `item_edital` int(11) DEFAULT NULL,
  `valor_unit_ref_produto_edital` float DEFAULT NULL,
  `id_edital` int(11) DEFAULT NULL,
  `desc_produto_edital` varchar(255) DEFAULT NULL,
  `qtd_produto_edital` int(11) DEFAULT NULL,
  `und_produto_edital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos_do_edital`
--

INSERT INTO `produtos_do_edital` (`id_produto_edital`, `lote_produto_edital`, `item_edital`, `valor_unit_ref_produto_edital`, `id_edital`, `desc_produto_edital`, `qtd_produto_edital`, `und_produto_edital`) VALUES
(112, '1', 231, 25, 87, 'um baita pau', 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `password_usuario` varchar(255) DEFAULT NULL,
  `email_usuario` varchar(255) DEFAULT NULL,
  `funcao_usuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `password_usuario`, `email_usuario`, `funcao_usuario`) VALUES
(1, 'josé', '$2y$10$rtlJFFU0SWEmCufe8DtK6uXQsVTy/KnKsEdHBCeg4A7qiOiaTPpU.', 'jose@admin', 'ADMIN'),
(2, 'Eduardo', '$2y$10$O2FNtYtbPSdzng6jK1od/OTOkbNj2wgKsOGvkaJd/4CpLMsuDXC.S', 'eduardo@admin', 'ADMIN');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `editais`
--
ALTER TABLE `editais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `produtos_do_edital`
--
ALTER TABLE `produtos_do_edital`
  ADD PRIMARY KEY (`id_produto_edital`),
  ADD KEY `id_edital` (`id_edital`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `editais`
--
ALTER TABLE `editais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos_do_edital`
--
ALTER TABLE `produtos_do_edital`
  MODIFY `id_produto_edital` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos_do_edital`
--
ALTER TABLE `produtos_do_edital`
  ADD CONSTRAINT `produtos_do_edital_ibfk_1` FOREIGN KEY (`id_edital`) REFERENCES `editais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
