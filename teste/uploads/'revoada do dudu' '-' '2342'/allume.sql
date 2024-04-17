-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/04/2024 às 04:47
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
  `id_edital` bigint(20) UNSIGNED NOT NULL,
  `nome_edital` varchar(255) DEFAULT NULL,
  `nome_orgao_edital` varchar(255) DEFAULT NULL,
  `numero_edital` float DEFAULT NULL,
  `numero_processo` float DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `tipo_fornecimento` varchar(255) DEFAULT NULL,
  `data_final_edital` date DEFAULT NULL,
  `data_limite_orcamento_edital` date DEFAULT NULL,
  `data_cadastro_edital` date DEFAULT NULL,
  `arquivo_edital` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editais`
--

INSERT INTO `editais` (`id_edital`, `nome_edital`, `nome_orgao_edital`, `numero_edital`, `numero_processo`, `tipo_documento`, `tipo_fornecimento`, `data_final_edital`, `data_limite_orcamento_edital`, `data_cadastro_edital`, `arquivo_edital`) VALUES
(1, NULL, 'Prefeitura do Rio Grande', 255, 654, 'NÃO', 'SERVIÇO', '2004-12-20', '2004-12-15', '2004-12-12', NULL),
(2, NULL, 'Receita Federal', 5454, 424.201, 'SRP', 'SERVIÇO', '2005-12-20', '2004-12-20', '2024-04-02', 'SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf'),
(3, NULL, 'Receita Federal', 5454, 424.201, 'SRP', 'SERVIÇO', '2005-12-20', '2004-12-20', '2024-04-02', 'SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf'),
(4, NULL, 'Receita Federal', 5454, 424.201, 'SRP', 'SERVIÇO', '2005-12-20', '2004-12-20', '2024-04-02', 'SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf'),
(5, NULL, 'Receita Federal', 5454, 424.201, 'SRP', 'SERVIÇO', '2005-12-20', '2004-12-20', '2024-04-02', 'SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf'),
(6, NULL, 'Receita Federal', 5454, 424.201, 'SRP', 'SERVIÇO', '2005-12-20', '2004-12-20', '2024-04-02', 'SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf'),
(7, NULL, 'Receita Federal', 5454, 424.201, 'SRP', 'SERVIÇO', '2005-12-20', '2004-12-20', '2024-04-02', 'SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf'),
(8, NULL, 'dfsfdsfsd', 0, 3213210000000, 'NORMAL', 'PRODUTO', '5431-06-25', '5654-12-31', '5464-12-31', 'Slides_DS2_Tecnico-Aula-4-A (1).pdf'),
(9, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(10, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(11, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(12, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(13, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(14, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(15, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(16, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(17, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(18, NULL, 'Mecanica Simas', 423432, 423432, 'SRP', 'PRODUTO', '2004-12-20', '2454-12-31', '4564-12-31', ''),
(19, NULL, 'sdadsads', 434343, 434343, 'SRP', 'SERVIÇO', '6543-03-21', '2132-12-31', '4453-12-31', ''),
(20, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(21, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(22, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(23, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(24, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(25, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(26, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(27, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(28, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(29, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(30, NULL, 'Simas Turbo', 543543, 543544000, 'NORMAL', 'SERVIÇO', '2004-12-20', '4654-05-31', '4764-05-06', ''),
(31, NULL, 'Receita do palword', 253432000, 432423000000, 'SRP', 'SERVIÇO', '3221-04-21', '3213-12-31', '5321-12-31', ''),
(32, NULL, 'POL', 321321000000, 321321, 'NORMAL', 'SERVIÇO', '5341-03-04', '2132-12-31', '2004-12-20', 'TERMO DE COMPROMISSO DE ESTÁGIO EMPRESA- OBRIGATÓRIO.pdf.pdf.pdf,Resp_exercicios_quimica_org_Eduardo_Silva.pdf,ListaIntroducaoQuimicaOrganicaRianSilva4C (2).pdf'),
(33, NULL, '4M', 31543500, 231321000, 'NORMAL', 'PRODUTOS_SERVIÇOS', '5321-12-31', '5331-12-31', '5431-03-21', ''),
(34, NULL, 'tamo mal', 321321, 321321000, 'NORMAL', 'SERVIÇO', '3234-03-12', '2564-03-04', '5432-03-04', 'TERMO_DE_COMPROMISSO_DE_ESTAGIO_EMPRESA-_OBRIGATORIO-Eduardo_Silva_assinado.pdf,SOLICITAÇÃO DE INGRESSO PARA O ESTÁGIO.pdf.pdf.pdf,TERMO DE COMPROMISSO DE ESTÁGIO EMPRESA- OBRIGATÓRIO.pdf.pdf.pdf,Resp_exercicios_quimica_org_Eduardo_Silva.pdf,ListaIntroduc'),
(35, NULL, 'Nem Sei', 321321, 543544000, 'SRP', 'SERVIÇO', '1234-03-04', '3531-12-31', '4363-12-31', 'atestadomatricula_Eduardo_Silva.pdf,SOLICITACAO_DE_INGRESSO_PARA_O_ESTAGIO_assinado.pdf,TERMO_DE_COMPROMISSO_DE_ESTAGIO_EMPRESA-_OBRIGATORIO-Eduardo_Silva_assinado (1).pdf,TERMO_DE_COMPROMISSO_DE_ESTAGIO_EMPRESA-_OBRIGATORIO-Eduardo_Silva_assinado.pdf'),
(36, NULL, 'madiaiki', 31321, 43534500, 'SRP', 'PRODUTOS_SERVIÇOS', '4321-03-12', '3221-12-31', '4222-02-23', ''),
(37, NULL, 'dsadasdsa', 32131300, 321321000, 'SRP', 'PRODUTO', '4322-12-31', '4312-12-31', '3123-12-31', 'benner__1_-removebg-preview.png,benner (1).png,14311477_963868000408504_8787332343585217034_o.jpg,10974248_661457500649557_6491971949534664213_o.jpg,10984458_660587524069888_5895043033508481963_n.jpg,11011206_661457517316222_3124999434491944347_o.jpg'),
(38, NULL, 'dsadasdsa', 32131300, 321321000, 'SRP', 'PRODUTO', '4322-12-31', '4312-12-31', '3123-12-31', ''),
(39, NULL, 'dsadasdsa', 32131300, 321321000, 'SRP', 'PRODUTO', '4322-12-31', '4312-12-31', '3123-12-31', 'benner__1_-removebg-preview.png,benner (1).png,14311477_963868000408504_8787332343585217034_o.jpg,10974248_661457500649557_6491971949534664213_o.jpg,10984458_660587524069888_5895043033508481963_n.jpg,11011206_661457517316222_3124999434491944347_o.jpg'),
(40, NULL, 'LOCA', 321321000, 321321000, 'SRP', 'PRODUTO', '2312-04-23', '3421-12-31', '5432-04-23', 'benner (1).png,14311477_963868000408504_8787332343585217034_o.jpg,10974248_661457500649557_6491971949534664213_o.jpg'),
(41, NULL, 'LOCA', 321321000, 321321000, 'SRP', 'PRODUTO', '2312-04-23', '3421-12-31', '5432-04-23', 'benner (1).png,14311477_963868000408504_8787332343585217034_o.jpg,10974248_661457500649557_6491971949534664213_o.jpg'),
(42, NULL, 'LOCA', 321321000, 321321000, 'SRP', 'PRODUTO', '2312-04-23', '3421-12-31', '5432-04-23', ''),
(43, NULL, 'LOCA', 321321000, 321321000, 'SRP', 'PRODUTO', '2312-04-23', '3421-12-31', '5432-04-23', ''),
(44, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(45, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(46, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(47, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(48, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(49, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(50, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(51, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(52, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(53, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(54, NULL, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '');

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
  `valor_referencia_produto` float DEFAULT NULL,
  `valor_custo_produto` float DEFAULT NULL,
  `valor_minimo_produto` float DEFAULT NULL,
  `valor_cadastro_produto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `qtd_produto`, `und_produto`, `desc_produto`, `marca_produto`, `modelo_produto`, `valor_referencia_produto`, `valor_custo_produto`, `valor_minimo_produto`, `valor_cadastro_produto`) VALUES
(1, 200, 'M', 'Base giratória para relé fotoelétrico eletromagnético.Bivolt automático (100-240V),\r\ntomada giratória 360°', 'eletrolux', 'base 6mm', 243, 323, 3232, 323),
(2, 24, 'und', 'Conector de alumínio paralelo com parafuso, com pasta antioxidante.', 'brastemp', 'conect alu', 673, 7438, 7843, 23),
(3, 1000, 'UN', '\"Lâmpada sódio tubular 150W Lâmpada sódio tubular, 150W, base E40, 220V, vida útil mínima 25000 horas. para uso externo, iluminação pública.\"', 'OUROLUX', 'SODIO 150W E40 TUBULAR ', 0, 0, 0, 0),
(4, 1000, 'UN', '\"Lâmpada sódio tubular 150W Lâmpada sódio tubular, 150W, base E40, 220V, vida útil mínima 25000 horas. para uso externo, iluminação pública.\"', 'OUROLUX', 'SODIO 150W E40 TUBULAR ', 0, 0, 0, 0),
(5, 1000, 'UN', '\"Lâmpada sódio tubular 150W Lâmpada sódio tubular, 150W, base E40, 220V, vida útil mínima 25000 horas. para uso externo, iluminação pública.\"', 'OUROLUX', 'SODIO 150W E40 TUBULAR ', 0, 0, 0, 0);

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
(1, 'José Filipe foda', '$2y$10$EEWW5Yeh7Fik4qz55NNi0OqDwB8V3ohcJDj.cRg2WINKMalMftYjO', 'mydick@madkd', 'OPERACIONAL'),
(3, 'dada', '$2y$10$JMX5trMm/esSiTtkwg3NmOJSahzXg/c/8Si9cljWzTjSF76YPjtzm', 'dada@dada', 'ADMIN'),
(4, 'paulo', '$2y$10$265ZCDnjnR/AJAvahRzIhu5kRro/7ZBjWCXyh6xnZ0rEQKf0sOUYO', 'dickss@privs', 'ADMIN'),
(5, 'dsadsadsadsa', '$2y$10$ViqcLlbVCTRVD/1bQktPYuivzmuLxENLa5.jeTbVRAHGKCEcInqi2', 'dsadsa@dasdasdsadsa', 'FINANCEIRO'),
(6, 'dsadasdsa', '$2y$10$6a7rjkYkTicu1qnb36omP.mgrBvaBo0S82x1Uc2flPfHQfPd40hmK', 'sadsadsadsa@Ddasdsa', 'FINANCEIRO'),
(7, 'dasdsa', '$2y$10$DdlLbGgK2NlD9zDKkIOs6u.CLXyW6eYBOgwWAnMf43VHA9AKqR6Pq', '234432423@srresaesa', 'FINANCEIRO'),
(8, 'ddasdsa532532532', '$2y$10$Ju9IkgovzPyCtxoyMgsY5e6p4K8JTwMHryS7ZtQ7SFqBWl8hVWF6W', '321321@2431321321', 'FINANCEIRO'),
(9, '43213213213', '$2y$10$wB.WLpjKbe8fuG3YKDTMt.fAfmwgM4LamfodoAJDdIUZKTpkCJG1a', '321321@wedsadsa', 'ADMIN'),
(10, 'sdffsdsdfsdffsd', '$2y$10$DoOE3Q81jv2IKudPW0ztvOw89Fkz/IAhUUPHPzwEU1VrH.GJ4n1Ae', '|dsad@dadsdsasdasad', 'OPERACIONAL'),
(11, 'rrfdssdfsdffsd', '$2y$10$ntfq9azde1sx9rUGC.Lk7OioysgoDyZSP37pvofoiRjsWX9kP8Gl2', '|2dadsdas@dsadsa', 'OPERACIONAL'),
(12, 'dsadsa2321', '$2y$10$6gAQcWMea0gfUXKi8Mjnpe2P/ZKYOyPEsigIcVVJQVj3S7.4RRQwC', '32132123123132@dasdsads', 'FINANCEIRO'),
(13, 'ddsadasdsadsadsa', '$2y$10$JyVLgddLlmMF1jTxR2gqWOUyCUXUM6DAlNPKUF9d1gr1DBlLPXNTW', '21@dadsasdadsa', 'OPERACIONAL'),
(14, 'ghdfhdhdhfd', '$2y$10$bECIjZGlXNce6MW.FWeeEeu7rkd7ilwvg1C5Esq2lZV26ohZIdhLC', 'ffdsfdsdf@fsfafdsfsddfs', 'FINANCEIRO'),
(15, 'cleber', '$2y$10$af65i6ar9J2rrUWATxSEAe1rp4Zj66RSSw.Am2bNXi2PJiij8hdxK', 'cjaksdhk@nkjvnkjsv', 'FINANCEIRO'),
(16, 'dsadsadsadasdsadsa', '$2y$10$YkFY44zBkjMYrDgKEcxuSObkjlK6Snwe5OtxW0vPs9YPPr9CrS3k2', '1422142321231@sadsadas', 'OPERACIONAL'),
(17, 'naruto', '$2y$10$zOm5pE90HmEjVJct4x2D.eNBBjmsdIVKET3N2vzx0GD25/fXTzF.O', 'naruto@sasuke', 'ADMIN'),
(18, 'eduviado', '$2y$10$cXA5ttdJRvCYt1H3TScnxOaHa8gtVmwARJoLev4de1Zm6VNKy0j8.', 'navbnhskfbh@8978', 'FINANCEIRO'),
(19, 'jose mal de roda', '$2y$10$7vVr.DOyEHc1xLRvMjs5jukypiRCnsfdtzhGGyMOtBCocD1fCZ7C6', 'tracker@cambio', 'FINANCEIRO');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `editais`
--
ALTER TABLE `editais`
  ADD PRIMARY KEY (`id_edital`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

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
  MODIFY `id_edital` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
