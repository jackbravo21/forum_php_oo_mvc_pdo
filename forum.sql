-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2020 às 14:58
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forumnew`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `idpost` int(255) NOT NULL,
  `idautor` int(255) NOT NULL,
  `nickautor` varchar(80) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `data` varchar(30) NOT NULL,
  `postedicao` varchar(30) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`idpost`, `idautor`, `nickautor`, `titulo`, `texto`, `data`, `postedicao`, `valor`) VALUES
(1, 1, 'Administrador', 'Sejam bem vindos ao meu fÃ³rum! Divirtam-se.', 'Este sistema de fÃ³rum foi criado para demonstrar o conhecimento total em PHP. VocÃª pode criar postagens, publicar comentÃ¡rios, editar ou excluir todo o conteÃºdo que vocÃª publicou. Tudo aqui funciona.', '17/06/2020 as 14:57', 'Nunca', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `idrespostas` int(255) NOT NULL,
  `idprincipal` int(255) NOT NULL,
  `iduser` int(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `restexto` varchar(255) NOT NULL,
  `datapost` varchar(30) NOT NULL,
  `respedicao` varchar(30) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(255) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `datacadastro` varchar(50) NOT NULL,
  `dataedicao` varchar(30) NOT NULL,
  `nivel` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nome`, `apelido`, `email`, `senha`, `datacadastro`, `dataedicao`, `nivel`) VALUES
(1, 'Jack', 'Administrador', 'admin@admin', '17f9b61099ac5e158010e6eb47c30f6b6c64e6fb', '13/06/2020 as 14:33', '17/06/2020 as 14:17', 3),
(2, 'Teste1', 'Teste1', 'teste1@teste1.com.br', '17f9b61099ac5e158010e6eb47c30f6b6c64e6fb', '13/06/2020 as 14:49', 'Nunca', 1),
(3, 'Teste2', 'Teste2', 'teste2@teste2.com.br', '96a62ca98bdec7f55343f8cfa594379bdba76cc9', '13/06/2020 as 14:50', 'Nunca', 1),
(4, 'Teste3', 'Teste3', 'teste3@teste3.com.br', '5458cb00631fc6748f9d3a52cf6c22ae9b232e91', '13/06/2020 as 14:52', 'Nunca', 1),
(5, 'Teste4', 'Teste4', 'teste4@teste4.com.br', '901d6751c6d43adfdc8fdd7f0a51d3fd34c7ae2e', '13/06/2020 as 15:14', 'Nunca', 1),
(6, 'Teste5', 'Teste5', 'teste5@teste5.com.br', '5dd8f4d5905fc6e848653e4acb58cb13c41c24de', '14/06/2020 as 03:43', 'Nunca', 0),
(7, 'Teste6', 'Teste6', 'teste6@teste6.com.br', 'd5ff767fd1e57c389f2efdd2f06bd73bf8992f6d', '15/06/2020 as 00:17', 'Nunca', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`idpost`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`idrespostas`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `idpost` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `idrespostas` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
