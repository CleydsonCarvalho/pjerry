-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jan-2017 às 22:52
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjerry`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` int(11) NOT NULL,
  `cor` varchar(40) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `cor`, `marca`, `modelo`, `placa`) VALUES
(5, 'Branco', 'Fiat', 'Uno Way 2007', 'LMO-5832'),
(2, 'Preto', 'Ford', 'Celta 2011', 'IGM-9866'),
(4, 'Cinza', 'Ford', 'Corsa 2008', 'JFN-6958');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `idCidade` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`idCidade`, `nome`, `estado`) VALUES
(1, 'José de Freitas', 'Piauí'),
(2, 'Caxias', 'Maranhão'),
(3, 'Curralinhos', 'Piaií'),
(4, 'Parnarama', 'Maranhão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(80) DEFAULT NULL,
  `regiao` varchar(10) DEFAULT NULL,
  `estado` varchar(80) DEFAULT NULL,
  `contato1` varchar(45) DEFAULT NULL,
  `contato2` varchar(45) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `rg`, `cpf`, `endereco`, `bairro`, `cidade`, `regiao`, `estado`, `contato1`, `contato2`, `referencia`, `status`) VALUES
(2, 'Amando Raimundo Pereira de Sousa', '2.369.147', '258.392.147-88', 'Rua 12 Casa 89, Próximo Comercial Carvalho', 'Três Andares', 'Teresina', 'Sul', 'PI', '98845-4896', '98845-4896', 'Dona Chiquinha - 98896-5869', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cnpj` varchar(18) CHARACTER SET latin1 DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `bairro` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `numero` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `regiao` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `proprietario` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `telefoneFixo` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `telefoneCelular` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `endereco`, `bairro`, `numero`, `regiao`, `proprietario`, `telefoneFixo`, `telefoneCelular`, `email`, `cidade`, `estado`) VALUES
(1, 'J.A Cosmeticos TT', '02.558.157/0001-62', 'Quadra G Casa 26', 'Porto Alegre', '5698', 'Sul', 'Jerry Adriane', '86 93219-5698', '86 98874-6958', 'jerry@jerry.com', 'Teresina', 'PI'),
(2, 'Jerry Comesticos', '83.891.283.0001/36', 'Av. Ayrton Senna Quadra G Casa 25, Proximo ao Celso', 'Porto Alegre', '25', 'Sul', 'Jerry Adriane Lustosa', '86 3219-5869', '86 98856-6958', 'jerry@jerry.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`idEstado`, `estado`) VALUES
(1, 'PIaui'),
(2, 'Maranhão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cnpjCpf` varchar(40) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `regiao` varchar(40) DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  `representante` varchar(100) DEFAULT NULL,
  `contatoFixo` varchar(20) DEFAULT NULL,
  `contatoMovel` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `cnpjCpf`, `endereco`, `bairro`, `cidade`, `regiao`, `estado`, `representante`, `contatoFixo`, `contatoMovel`, `email`) VALUES
(9, 'Alfa Comesmeticos', '83.891.283.0001/36 ', 'Av. Mauro Tapety, Prox. Correios', 'Tabuleta', 'Teresina', 'Sul', 'PI', 'Naldo Arantes Nascimento', '86 3233-6958', '86 99974-6778', 'alfacomesticos@gmail.com'),
(10, 'JB Cosmeticos', '83.891.283.0001/36', 'Rua Tavares Barbosa, N° 4521, Prox. Rodoviaria', 'Dirceu', 'Teresina', 'Sul', 'PI', 'Naldo Arantes Nascimento Pinto', '86 3232-5698', '86 99974-6778', 'jb@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `regiao` varchar(45) NOT NULL,
  `celular1` varchar(45) NOT NULL,
  `celular2` varchar(45) NOT NULL,
  `funcao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `rg`, `endereco`, `bairro`, `cidade`, `estado`, `regiao`, `celular1`, `celular2`, `funcao`) VALUES
(3, 'Maria Conceição Pereira', '987.258.369-96', '1.147.258', 'Quadra 88, Cada 23B', 'Todos os Santos', 'Teresina', 'PI', 'Sul', '89 99987-6958', '86 98147-6958', 'Vendedor'),
(12, 'Jhonatas de Oliveira Sousa', '023.147.258-89', '2.147.200', 'Quadra 20 Casa 20, Proximo ao Comercial Santos', 'Portal da Alegria III', 'Teresina', 'PI', 'Sul', '86 98563-6958', '86 98147-5869', 'Supervisor'),
(13, 'Maria do Socorro Amparo', '654.321.987-85', '1.357.159', 'Rua 4, Quadra G Casa 15', 'Portal da Alegria', 'Teresina', 'PI', 'Sul', '86 99596-6854', '86 98562-6547', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao_rce`
--

CREATE TABLE `relacao_rce` (
  `idRelacao_rce` int(11) NOT NULL,
  `idRota` int(11) NOT NULL,
  `idCidade` int(11) DEFAULT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relacao_rce`
--

INSERT INTO `relacao_rce` (`idRelacao_rce`, `idRota`, `idCidade`, `idEstado`) VALUES
(1, 3, 4, 2),
(9, 3, 2, 2),
(8, 3, 2, 2),
(7, 3, 2, 2),
(10, 3, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotas`
--

CREATE TABLE `rotas` (
  `idRota` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rotas`
--

INSERT INTO `rotas` (`idRota`, `nome`, `idEstado`) VALUES
(3, 'Rota 3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`idCidade`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relacao_rce`
--
ALTER TABLE `relacao_rce`
  ADD PRIMARY KEY (`idRelacao_rce`);

--
-- Indexes for table `rotas`
--
ALTER TABLE `rotas`
  ADD PRIMARY KEY (`idRota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `relacao_rce`
--
ALTER TABLE `relacao_rce`
  MODIFY `idRelacao_rce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rotas`
--
ALTER TABLE `rotas`
  MODIFY `idRota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
