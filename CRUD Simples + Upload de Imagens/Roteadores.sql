-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Abr-2019 às 21:43
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roteadores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `marca` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`idMarca`, `marca`) VALUES
(3, 'TP-Link'),
(4, 'D-Link'),
(5, 'Intelbras '),
(6, 'Linksys'),
(7, 'Asus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roteadores`
--

CREATE TABLE `roteadores` (
  `id` int(64) NOT NULL,
  `marca` varchar(64) NOT NULL,
  `modelo` varchar(64) NOT NULL,
  `qnt_wan` int(1) NOT NULL,
  `wan_gigabit` tinyint(1) NOT NULL,
  `qnt_lan` int(1) NOT NULL,
  `lan_gigabit` tinyint(1) NOT NULL,
  `frequencia_2g` tinyint(1) NOT NULL,
  `frequencia_5g` tinyint(1) NOT NULL,
  `padrao_2g` varchar(64) NOT NULL,
  `padrao_5g` varchar(64) NOT NULL,
  `ipv6` tinyint(1) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `roteadores`
--

INSERT INTO `roteadores` (`id`, `marca`, `modelo`, `qnt_wan`, `wan_gigabit`, `qnt_lan`, `lan_gigabit`, `frequencia_2g`, `frequencia_5g`, `padrao_2g`, `padrao_5g`, `ipv6`, `src`) VALUES
(13, ' 3 ', 'Archer C5', 1, 1, 1, 1, 1, 1, 'IEEE 802.11b/g/n', 'IEEE 802.11a/n/ac', 1, '20190405_1554421620.jpg'),
(14, ' 4 ', 'Dir-615', 1, 0, 4, 0, 1, 0, 'IEEE 802.11b/g', '0', 0, '20190405_1554421557.jpg'),
(15, ' 4 ', 'Dir-819', 1, 0, 4, 0, 1, 1, 'IEEE 802.11b/g/n', 'IEEE 802.11a/n/ac', 0, '20190405_1554421513.jpg'),
(17, ' 3 ', 'Archer C3200', 1, 1, 4, 1, 1, 1, 'IEEE 802.11b/g/n', 'IEEE 802.11a/n/ac', 1, '20190405_1554421631.jpg'),
(18, ' 7 ', 'RT-AC86U', 1, 1, 4, 1, 1, 1, 'IEEE 802.11b/g/n', 'IEEE 802.11a/n/ac', 1, '20190405_1554421525.jpg'),
(19, ' 7 ', 'RT-AC51U', 1, 0, 4, 0, 1, 1, 'IEEE 802.11b/g/n', 'IEEE 802.11a/n/ac', 1, '20190405_1554421538.jpg'),
(20, ' 6 ', 'WRT54GS', 1, 0, 4, 0, 1, 0, 'IEEE 802.11b/g/n', '0', 0, '20190405_1554421601.jpg'),
(21, ' 6 ', 'E3000', 1, 0, 4, 0, 1, 0, 'IEEE 802.11b/g/n', '0', 0, '20190405_1554421611.jpg'),
(22, ' 5 ', 'IWR 3000N', 1, 0, 4, 0, 1, 0, 'IEEE 802.11b/g/n', '0', 1, '20190405_1554421571.jpg'),
(24, ' 5 ', 'ACTION R1200', 1, 0, 4, 0, 1, 1, 'IEEE 802.11b/g/n', 'IEEE 802.11a/n/ac', 1, '20190405_1554421589.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indexes for table `roteadores`
--
ALTER TABLE `roteadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roteadores`
--
ALTER TABLE `roteadores`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
