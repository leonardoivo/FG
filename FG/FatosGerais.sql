-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25/10/2021 às 02:30
-- Versão do servidor: 10.5.12-MariaDB-1:10.5.12+maria~focal
-- Versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `FatosGerais`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acervo`
--

CREATE TABLE `acervo` (
  `id_acervo` int(11) NOT NULL,
  `nome_acervo` varchar(60) DEFAULT NULL,
  `idtextojor` int(11) DEFAULT NULL,
  `Descricao` text DEFAULT NULL,
  `DataDeCriacao` date DEFAULT NULL,
  `id_tipomidia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `audios`
--

CREATE TABLE `audios` (
  `id_audio` int(11) NOT NULL,
  `nome_audio` varchar(60) DEFAULT NULL,
  `tipo_audio` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `formato` int(11) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `data_de_inclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `colunas`
--

CREATE TABLE `colunas` (
  `idcoluna` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `titular_coluna` varchar(60) DEFAULT NULL,
  `id_secao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `colunas`
--

INSERT INTO `colunas` (`idcoluna`, `nome`, `titular_coluna`, `id_secao`) VALUES
(1, 'teste', 'eu', 58);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(60) DEFAULT NULL,
  `tipo_imagem` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `formato` int(11) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `data_de_inclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` varchar(30) DEFAULT NULL,
  `tipo_acesso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `secoes`
--

CREATE TABLE `secoes` (
  `id_secao` int(11) NOT NULL,
  `nomeSecao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `secoes`
--

INSERT INTO `secoes` (`id_secao`, `nomeSecao`) VALUES
(8, 'test2'),
(9, 'test2'),
(10, 'test2'),
(11, 'test2'),
(12, 'test2'),
(13, 'test2'),
(14, 'test2'),
(15, 'test2'),
(16, 'test2'),
(17, 'test2'),
(18, 'test2'),
(19, 'test2'),
(20, 'test2'),
(21, 'test2'),
(22, 'test2'),
(23, 'test2'),
(24, 'Seção de teste de gravação'),
(25, 'Seção de teste de gravação'),
(26, 'Seção de teste de gravação'),
(27, 'Seção de teste de gravação'),
(28, 'Seção de teste de gravação'),
(29, 'Seção de teste de gravação22'),
(30, 'Seção de teste de gravação22'),
(31, 'Seção de teste de gravação22'),
(32, 'Seção de teste de gravação22'),
(33, 'Seção de teste de gravação22'),
(34, 'Seção de teste de gravação22'),
(35, 'Seção de teste de gravação22'),
(36, 'Seção de teste de gravação22'),
(37, 'Seção de teste de gravação22'),
(38, 'Seção de teste de gravação22'),
(39, 'Seção de teste de gravação22'),
(40, 'Seção de teste de gravação22'),
(41, 'Seção de teste de gravação22'),
(42, 'Seção de teste de gravação22'),
(43, 'Seção de teste de gravação22'),
(44, 'Seção de teste de gravação22'),
(45, 'Seção de teste de gravação22'),
(46, 'Seção de teste de gravação22'),
(47, 'Seção de teste de gravação22'),
(48, 'Seção de teste de gravação22'),
(49, 'Seção de teste de gravação22'),
(50, 'Seção de teste de gravação22'),
(51, 'Seção de teste de gravação22'),
(52, 'Seção de teste de gravação22'),
(53, 'Seção de teste de gravação22'),
(54, ''),
(55, 'Esportes'),
(56, 'politica'),
(57, 'cidade'),
(58, 'cidade'),
(59, 'humor'),
(60, 'zueira'),
(61, 'zueira'),
(62, 'zueira'),
(63, 'humor'),
(64, ''),
(65, ''),
(66, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TextoJornalistico`
--

CREATE TABLE `TextoJornalistico` (
  `idtextojor` int(11) NOT NULL,
  `texto` text DEFAULT NULL,
  `datapublicacao` date DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `id_secao` int(11) DEFAULT NULL,
  `idcoluna` int(11) DEFAULT NULL,
  `idtipotexto` int(11) DEFAULT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `subtitulo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `TextoJornalistico`
--

INSERT INTO `TextoJornalistico` (`idtextojor`, `texto`, `datapublicacao`, `idusuario`, `autor`, `id_secao`, `idcoluna`, `idtipotexto`, `titulo`, `subtitulo`) VALUES
(10, 'tste', '2021-04-24', 1, 'eu', 8, 1, 4, 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipomidia`
--

CREATE TABLE `tipomidia` (
  `id_tipomidia` int(11) NOT NULL,
  `nome_midia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipomidia`
--

INSERT INTO `tipomidia` (`id_tipomidia`, `nome_midia`) VALUES
(1, 'audio'),
(2, 'video'),
(3, 'imagem'),
(4, 'multimidia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipotexto`
--

CREATE TABLE `tipotexto` (
  `idtipotexto` int(11) NOT NULL,
  `tiptextonome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipotexto`
--

INSERT INTO `tipotexto` (`idtipotexto`, `tiptextonome`) VALUES
(1, 'Reportagem'),
(2, 'Blog'),
(3, 'Editorial'),
(4, 'Entrevista'),
(5, 'Artigo'),
(6, 'Informe Publicitário'),
(7, 'Podcast'),
(8, 'Live');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `tipusuariodesc` varchar(30) DEFAULT NULL,
  `tipo_acesso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `dataCadastramento` date DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `sobrenome`, `email`, `dataNascimento`, `login`, `senha`, `dataCadastramento`, `biografia`, `idtipousuario`) VALUES
(1, 'eu', 'eu mesmo', NULL, '2021-10-24', 'teste', 'teste123', '2021-10-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `nome_video` varchar(60) DEFAULT NULL,
  `tipo_video` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `formato` int(11) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `data_de_inclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`id_acervo`),
  ADD KEY `idtextojor` (`idtextojor`),
  ADD KEY `FK_TipoMida` (`id_tipomidia`);

--
-- Índices de tabela `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id_audio`),
  ADD KEY `id_acervo` (`id_acervo`);

--
-- Índices de tabela `colunas`
--
ALTER TABLE `colunas`
  ADD PRIMARY KEY (`idcoluna`),
  ADD KEY `fk_colunas` (`id_secao`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `id_acervo` (`id_acervo`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `secoes`
--
ALTER TABLE `secoes`
  ADD PRIMARY KEY (`id_secao`);

--
-- Índices de tabela `TextoJornalistico`
--
ALTER TABLE `TextoJornalistico`
  ADD PRIMARY KEY (`idtextojor`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `id_secao` (`id_secao`),
  ADD KEY `idcoluna` (`idcoluna`),
  ADD KEY `idtipotexto` (`idtipotexto`);

--
-- Índices de tabela `tipomidia`
--
ALTER TABLE `tipomidia`
  ADD PRIMARY KEY (`id_tipomidia`);

--
-- Índices de tabela `tipotexto`
--
ALTER TABLE `tipotexto`
  ADD PRIMARY KEY (`idtipotexto`);

--
-- Índices de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idtipousuario` (`idtipousuario`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_acervo` (`id_acervo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `acervo`
--
ALTER TABLE `acervo`
  MODIFY `id_acervo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `audios`
--
ALTER TABLE `audios`
  MODIFY `id_audio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `colunas`
--
ALTER TABLE `colunas`
  MODIFY `idcoluna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `secoes`
--
ALTER TABLE `secoes`
  MODIFY `id_secao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `TextoJornalistico`
--
ALTER TABLE `TextoJornalistico`
  MODIFY `idtextojor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tipomidia`
--
ALTER TABLE `tipomidia`
  MODIFY `id_tipomidia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipotexto`
--
ALTER TABLE `tipotexto`
  MODIFY `idtipotexto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `acervo`
--
ALTER TABLE `acervo`
  ADD CONSTRAINT `FK_TipoMida` FOREIGN KEY (`id_tipomidia`) REFERENCES `tipomidia` (`id_tipomidia`),
  ADD CONSTRAINT `acervo_ibfk_1` FOREIGN KEY (`idtextojor`) REFERENCES `TextoJornalistico` (`idtextojor`);

--
-- Restrições para tabelas `audios`
--
ALTER TABLE `audios`
  ADD CONSTRAINT `audios_ibfk_1` FOREIGN KEY (`id_acervo`) REFERENCES `acervo` (`id_acervo`);

--
-- Restrições para tabelas `colunas`
--
ALTER TABLE `colunas`
  ADD CONSTRAINT `fk_colunas` FOREIGN KEY (`id_secao`) REFERENCES `secoes` (`id_secao`);

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`id_acervo`) REFERENCES `acervo` (`id_acervo`);

--
-- Restrições para tabelas `TextoJornalistico`
--
ALTER TABLE `TextoJornalistico`
  ADD CONSTRAINT `TextoJornalistico_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_4` FOREIGN KEY (`id_secao`) REFERENCES `secoes` (`id_secao`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_5` FOREIGN KEY (`id_secao`) REFERENCES `secoes` (`id_secao`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_6` FOREIGN KEY (`idcoluna`) REFERENCES `colunas` (`idcoluna`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_7` FOREIGN KEY (`idcoluna`) REFERENCES `colunas` (`idcoluna`),
  ADD CONSTRAINT `TextoJornalistico_ibfk_8` FOREIGN KEY (`idtipotexto`) REFERENCES `tipotexto` (`idtipotexto`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`);

--
-- Restrições para tabelas `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_acervo`) REFERENCES `acervo` (`id_acervo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
