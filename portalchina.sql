-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 179.188.16.2
-- Generation Time: 22-Maio-2023 às 12:40
-- Versão do servidor: 5.7.32-35-log
-- PHP Version: 5.6.40-0+deb8u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalchina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_pedidos` int(11) NOT NULL,
  `comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricas`
--

CREATE TABLE `fabricas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `acao` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pedido` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(12) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `acao`, `usuario`, `pedido`, `data`) VALUES
(1, 'Login', 'Ji', 'Nenhum', '12/05/2023'),
(2, 'ApagarFoto', 'Ji', '11', '12/05/2023'),
(3, 'InserirFoto', 'Ji', '11', '12/05/2023'),
(4, 'ApagarVetor', 'Ji', '11', '12/05/2023'),
(5, 'InserirVetor', 'Ji', '11', '12/05/2023'),
(6, 'EditouPedido', 'Ji', '11', '12/05/2023'),
(7, 'Login', 'Ji', 'Nenhum', '12/05/2023'),
(8, 'ApagarVetor', 'Ji', '11', '12/05/2023'),
(9, 'InserirFoto', 'Ji', '11', '12/05/2023'),
(10, 'Login', 'Ji', 'Nenhum', '12/05/2023'),
(11, 'InserirFoto', 'Ji', '11', '12/05/2023'),
(12, 'ApagarFoto', 'Ji', '11', '12/05/2023'),
(13, 'ApagarFoto', 'Ji', '11', '12/05/2023'),
(14, 'InserirFoto', 'Ji', '11', '12/05/2023'),
(15, 'ApagarVetor', 'Ji', '11', '12/05/2023'),
(16, 'Login', 'Ji', 'Nenhum', '13/05/2023'),
(17, 'Login', 'Ji', 'Nenhum', '13/05/2023'),
(18, 'Login', 'Ji', 'Nenhum', '15/05/2023'),
(19, 'Login', 'Ji', 'Nenhum', '15/05/2023'),
(20, 'Login', 'Ji', 'Nenhum', '16/05/2023'),
(21, 'EditouPedido', 'Ji', '11', '16/05/2023'),
(22, 'Login', 'Ji', 'Nenhum', '16/05/2023'),
(23, 'Login', 'Ji', 'Nenhum', '18/05/2023'),
(24, 'Login', 'Ji', 'Nenhum', '18/05/2023'),
(25, 'Login', 'Ji', 'Nenhum', '18/05/2023'),
(26, 'Login', 'Ji', 'Nenhum', '18/05/2023'),
(27, 'Login', 'Ji', 'Nenhum', '22/05/2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_fabrica` int(11) NOT NULL,
  `referencia` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `marca` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `linkDownload` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `dataEnvio` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `dataDownload` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `deadlineAmostra` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `statusAmostra` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `statusFinal` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `privilegio` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_fabrica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `privilegio`, `id_fabrica`) VALUES
(1, 'Ji', '123', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabricas`
--
ALTER TABLE `fabricas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fabricas`
--
ALTER TABLE `fabricas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
