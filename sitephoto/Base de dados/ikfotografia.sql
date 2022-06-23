-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2022 às 17:16
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ikfotografia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `evento` varchar(255) NOT NULL,
  `pacote` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `texto` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `datamarc` date NOT NULL,
  `idc` int(11) NOT NULL,
  `fotografo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `evento`, `pacote`, `data`, `texto`, `status`, `datamarc`, `idc`, `fotografo`) VALUES
(2, 'Shoot', 'Basic', '2022-06-23', 'lkhdlkh', 'feito', '2022-06-08', 5, 2),
(2, 'Shoot', 'Basic', '2022-07-09', 'M', 'pendente', '2022-06-08', 7, 2),
(3, 'Shoot', 'Basic', '2022-06-07', 'kiihjklh', 'activo', '2022-06-09', 12, 0),
(3, 'Shoot', 'Basic', '2022-06-16', 'nm', 'pendente', '2022-06-09', 13, 2),
(1, 'Shoot', 'Basic', '2022-06-22', 'kj', 'pendente', '2022-06-09', 14, 2),
(4, 'Outros', 'Basic', '2022-06-11', 'JJ', 'activo', '2022-06-10', 15, 0),
(4, 'Shoot', 'Basic', '2022-07-09', 'n', 'pendente', '0000-00-00', 19, 0),
(4, 'Shoot', 'Basic', '2022-07-09', 'n', 'pendente', '0000-00-00', 20, 0),
(4, 'Shoot', 'Basic', '2022-06-09', 'klkl', 'pendente', '0000-00-00', 21, 0),
(4, 'Shoot', 'Basic', '2022-06-09', 'klkl', 'pendente', '0000-00-00', 22, 0),
(4, 'Casamento', 'Normal', '2022-06-02', 'kl', 'pendente', '0000-00-00', 23, 0),
(3, 'Casamento', 'Normal', '2022-06-15', 'mmb', 'pendente', '0000-00-00', 24, 0),
(3, 'Casamento', 'Normal', '2022-06-15', 'mmb', 'pendente', '0000-00-00', 25, 0),
(3, 'Casamento', 'Normal', '2022-06-15', 'mmb', 'pendente', '0000-00-00', 26, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `evento` varchar(225) NOT NULL,
  `pacote` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `datamarc` date DEFAULT NULL,
  `usuarioid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nome`, `apelido`, `evento`, `pacote`, `data`, `email`, `texto`, `status`, `datamarc`, `usuarioid`) VALUES
(11, 'Jorge', 'Matavel', 'Casamento', 'Plus', '2022-05-27', 'Jorgematavel@gmail.com', 'comeca no dia x', 'pendente', NULL, 0),
(12, 'Zizito', 'Muenga', 'Casamento', 'Plus', '2022-06-03', 'zito@gmail.com', 'khawir', 'feito', NULL, 0),
(13, 'Mario', 'Mabande', 'Shoot', 'Basic', '2022-07-28', 'Mario3@gmail.com', 'Siosklgtjf', 'pendente', NULL, 0),
(16, 'Rosaria', 'Monteiro ', 'Shoot', 'Basic', '2022-05-26', 'Rosaria@gmail.com', 'Capullana', 'pendente', NULL, 0),
(17, 'Marcia', 'Mugabe', 'Shoot', 'Basic', '2022-06-11', 'marcia@gmail.com', 'jjj', 'feito', NULL, 0),
(22, 'Iraldo', 'Muabsa', 'Casamento', 'Plus', '2022-06-09', 'iraldo@gmail.com', 'jgfdfhdc', 'pendente', NULL, 0),
(23, 'Alfredo', 'Mateus', 'Casamento', 'Plus', '2022-06-09', 'iraldo@gmail.com', 'lkhdlkh', 'pendente', '0000-00-00', 0),
(24, 'Alfredo', 'Mateus', 'Casamento', 'Plus', '2022-06-09', 'iraldo@gmail.com', 'lkhdlkh', 'pendente', '2022-06-08', 0),
(25, 'Marcia', 'Monteiro ', 'Shoot', 'Normal', '2022-06-29', 'imilsicio@gmail.com', 'comeca no dia x', 'pendente', '2022-06-07', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `expericencia`
--

CREATE TABLE `expericencia` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `adm` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `nomeUsuario`, `adm`, `clienteid`) VALUES
(1, 'imilsicio@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Imilsicio', 1, 1),
(2, 'iraldo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Iraldo', 2, 2),
(3, 'Jorgematavel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jorge', 0, 0),
(4, 'jose@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jose Muenga', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `adm` int(1) NOT NULL,
  `clienteid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `nomeUsuario`, `adm`, `clienteid`) VALUES
(1, 'khawir', '1234', 'Imilsicio', 1, 0),
(2, 'imil', '1234', 'Zev', 0, 0),
(3, 'iraldo', '1234', 'iraldom', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `expericencia`
--
ALTER TABLE `expericencia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteid` (`clienteid`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `expericencia`
--
ALTER TABLE `expericencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
