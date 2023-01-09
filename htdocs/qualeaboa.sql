-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/01/2023 às 21:47
-- Versão do servidor: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- Versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `qualeaboa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `codigo` int(11) NOT NULL,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `nome_evento` text NOT NULL,
  `data_evento` date NOT NULL,
  `hora` time(6) NOT NULL,
  `local_evento` varchar(100) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `classificacao_indicativa` int(2) NOT NULL,
  `cidade` text NOT NULL,
  `assunto` text NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`nome_evento`, `data_evento`, `hora`, `local_evento`, `preco`, `classificacao_indicativa`, `cidade`, `assunto`, `descricao`, `autor`) VALUES
('rei leao', '2023-12-31', '12:21:00.000000', 'copacabana', '0', 9, 'Niterói', 'Acadêmico', '						ano novo\r\n				  ', 'admingbluz'),
('sinuca', '2023-02-02', '12:00:00.000000', 'solar do jambeiro, 391', '4', 14, 'Maricá', 'Acadêmico', '												oi\r\n				  \r\n				  ', 'tardelli'),
('sdcsdc', '2023-03-12', '17:47:00.000000', 'dcsdcsdc', '90', 12, 'Maricá', 'Política', 'ecddcdcdsc', 'admin'),
('aaaa', '2023-09-12', '12:34:00.000000', 'aaaa', '10', 15, 'Maricá', 'Gastronomia', 'asdasxsxc', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(30) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varbinary(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`login`, `nome_usuario`, `sobrenome`, `email`, `senha`, `cpf`, `data_nascimento`) VALUES
('admingbluz', 'admin', 'admin', 'admin@admin.com', 0x61646d696e313233, '19740991727', '2003-12-23'),
('carlos tardelli', 'carlos', 'tardelli', 'carlostardelli.tardelli@gmail.com', 0x313233343536373839, '06928328746', '1973-08-12'),
('gbluz', 'gabriel', 'luz', 'a@a.com', 0x3132333435363738, '12345678911', '2004-12-27'),
('Hugo2', 'Hugo', 'Gonçalves', 'hugoo@gmail.com', 0x3132333435363738, '11111111111', '2023-01-03'),
('Jose45', 'Jose', 'Hugo', 'advhtr@gmail.com', 0x3132333435363738, '11111111111', '2023-01-10'),
('tardelli', 'David', 'Tardelli', 'danilobraz1001@gmail.com', 0x313233343536373839, '01634484770', '2005-03-05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
