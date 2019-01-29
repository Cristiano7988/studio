-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2018 às 16:15
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda2`
--

CREATE TABLE `agenda2` (
  `ALUGUEL` int(6) NOT NULL,
  `ID_DIA` int(6) NOT NULL,
  `COLABORADOR` varchar(30) DEFAULT NULL,
  `DIA` varchar(30) NOT NULL,
  `HORA` int(6) NOT NULL,
  `Posicao` int(6) NOT NULL,
  `ID_AGENDA` int(6) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `DTHR_CRIACAO` date NOT NULL,
  `ID_ANO` int(4) NOT NULL,
  `ID_MES` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda2`
--
ALTER TABLE `agenda2`
  ADD PRIMARY KEY (`ID_AGENDA`),
  ADD UNIQUE KEY `Posicao` (`Posicao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
