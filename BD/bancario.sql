-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Ago-2020 às 18:57
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

DROP TABLE IF EXISTS `contas`;
CREATE TABLE IF NOT EXISTS `contas` (
  `numConta` int(11) NOT NULL AUTO_INCREMENT,
  `limite` double NOT NULL,
  `saldo` double NOT NULL,
  `aberta` tinyint(1) NOT NULL,
  PRIMARY KEY (`numConta`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`numConta`, `limite`, `saldo`, `aberta`) VALUES
(1, 1000, 8000, 0),
(2, 3000, 4989, 1),
(3, 10000, 5910, 1),
(4, 500, 68251, 1),
(5, 300, 0, 0),
(6, 300, 0, 0),
(7, 5000, 0, 0),
(8, 2000, 20, 1),
(9, 50, 440, 1),
(10, 200, 220, 1),
(11, 10, 5050, 1),
(12, 2000, 0, 0),
(13, 3000, 0, 0),
(14, 2000, 0, 0),
(15, 3000, 460, 1),
(16, 2000, 0, 1),
(17, 3000, 40, 1),
(18, 2000, 0, 1),
(19, 3000, 0, 0),
(20, 5555, 0, 0),
(21, 5555, 0, 1),
(22, 5555, 0, 0),
(23, 5555, 0, 0),
(24, 5555, 400, 1),
(25, 5555, 0, 0),
(26, 5555, 500, 1),
(27, 5555, 400, 1),
(28, 5555, 0, 0),
(29, 5555, 0, 1),
(30, 5555, 0, 1),
(31, 5555, 0, 1),
(32, 5555, 0, 1),
(33, 5555, 0, 1),
(34, 5555, 0, 1),
(35, 5555, 0, 0),
(36, 5555, 0, 1),
(37, 12000, 0, 1),
(38, 3200, 0, 1),
(39, 500, 0, 1),
(40, 5000, 0, 1),
(41, 40000, 0, 1),
(42, 400, 0, 1),
(43, 5555, 0, 1),
(44, 500, 0, 1),
(45, 500, 0, 1),
(46, 500, 0, 1),
(47, 500, 0, 1),
(48, 5000, 0, 1),
(49, 5000, 0, 1),
(50, 5000, 0, 1),
(51, 5000, 0, 1),
(52, 5000, 0, 1),
(53, 5000, 0, 1),
(54, 0, 0, 1),
(55, 0, 0, 1),
(56, 500, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

DROP TABLE IF EXISTS `movimentos`;
CREATE TABLE IF NOT EXISTS `movimentos` (
  `numConta` int(11) NOT NULL,
  `valor` double NOT NULL,
  `tipo` int(2) DEFAULT NULL,
  `descricao` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`numConta`, `valor`, `tipo`, `descricao`) VALUES
(3, 5000, 1, 'DepÃ³sito'),
(1, 4500, 1, 'DepÃ³sito'),
(4, 20000, 1, 'DepÃ³sito'),
(2, 6000, 1, 'DepÃ³sito'),
(2, 3000, 1, 'DepÃ³sito'),
(1, 500, -1, 'Saque'),
(3, 200, -1, 'Saque'),
(4, 400, -1, 'Saque'),
(2, 200, -1, 'Saque'),
(1, 1000, -1, 'Saque'),
(1, 700, -1, 'TransferÃªncia'),
(3, 700, 1, 'TransferÃªncia'),
(1, 150, -1, 'TransferÃªncia'),
(3, 150, 1, 'TransferÃªncia'),
(3, 50, -1, 'TransferÃªncia'),
(4, 50, 1, 'TransferÃªncia'),
(1, 50, -1, 'TransferÃªncia'),
(2, 50, 1, 'TransferÃªncia'),
(1, 2100, -1, 'Saque'),
(3, 100, -1, 'TransferÃªncia'),
(5, 100, 1, 'TransferÃªncia'),
(5, 100, -1, 'Saque'),
(2, 4000, -1, 'Saque'),
(4, 1000, -1, 'Saque'),
(2, 3000, -1, 'Saque'),
(2, 1, -1, 'TransferÃªncia'),
(4, 1, 1, 'TransferÃªncia'),
(2, 10, -1, 'TransferÃªncia'),
(3, 10, 1, 'TransferÃªncia'),
(2, 1000, -1, 'Saque'),
(2, 1000, -1, 'Saque'),
(2, 800, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 100, -1, 'Saque'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 200, -1, 'TransferÃªncia'),
(10, 200, 1, 'TransferÃªncia'),
(2, 50, -1, 'TransferÃªncia'),
(11, 50, 1, 'TransferÃªncia'),
(2, 20, -1, 'TransferÃªncia'),
(8, 20, 1, 'TransferÃªncia'),
(13, 0, -1, 'Saque'),
(2, 1000, -1, 'Saque'),
(9, 400, 1, 'DepÃ³sito'),
(11, 5000, 1, 'DepÃ³sito'),
(2, 500, -1, 'TransferÃªncia'),
(15, 500, 1, 'TransferÃªncia'),
(2, 1500, -1, 'Saque'),
(27, 400, 1, 'DepÃ³sito'),
(26, 500, 1, 'DepÃ³sito'),
(2, 40, -1, 'TransferÃªncia'),
(17, 40, 1, 'TransferÃªncia'),
(4, 50000, 1, 'DepÃ³sito'),
(2, 1000, 1, 'DepÃ³sito'),
(2, 1000, -1, 'TransferÃªncia'),
(1, 1000, 1, 'TransferÃªncia'),
(2, 20, -1, 'Saque'),
(3, 400, 1, 'DepÃ³sito'),
(4, 0, 1, 'DepÃ³sito'),
(4, 200, -1, 'Saque'),
(4, 200, -1, 'Saque'),
(2, 5000, 1, 'DepÃ³sito'),
(15, 40, -1, 'TransferÃªncia'),
(9, 40, 1, 'TransferÃªncia'),
(24, 400, 1, 'DepÃ³sito'),
(2, 20, -1, 'TransferÃªncia'),
(10, 20, 1, 'TransferÃªncia');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
