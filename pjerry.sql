-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Maio-2017 às 00:49
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

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
  `id_carro` int(11) NOT NULL,
  `cor` varchar(40) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id_carro`, `cor`, `marca`, `modelo`, `placa`) VALUES
(5, 'Branco', 'Fiat', 'Uno Way 2007', 'LMO-5832'),
(2, 'Preto', 'Ford', 'Celta 2011', 'IGM-9865'),
(4, 'Cinza', 'Ford', 'Corsa 2008', 'JFN-6958'),
(6, 'Dourado', 'Volkswagen', 'GOL 1.0', 'MMO-6598'),
(7, 'Branco', 'Fiat', 'aaaaaa', 'aaaaa');

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
(3, 'Curralinhos', 'Piauí'),
(4, 'Parnarama', 'Maranhão'),
(5, 'Buriti', 'Piauí');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `endereco1` varchar(150) DEFAULT NULL,
  `endereco2` varchar(100) DEFAULT NULL,
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

INSERT INTO `clientes` (`id`, `nome`, `rg`, `cpf`, `data_nasc`, `endereco1`, `endereco2`, `bairro`, `cidade`, `regiao`, `estado`, `contato1`, `contato2`, `referencia`, `status`) VALUES
(2, 'Amando Raimundo Pereira de Sousa TT', '2.369.147', '258.392.147-88', NULL, 'Rua 12 Casa 89, Próximo Comercial Carvalho', '', 'Três Andares', 'Teresina', 'Sul', 'PI', '98845-4896', '98845-4896', 'Dona Chiquinha - 98896-5869', 'Negativado'),
(6, 'AAAAAAAAAAAAA', 'AAAAAA', 'AAAAAA', NULL, 'AAAAAAAAAA', '', 'AAAAAAAAA', 'AAAAAAA', 'Norte', 'PI', 'AAAAAA', 'AAAAAAAAAA', 'AAAAAAAAA', 'Ativo'),
(7, 'TESTE', '2.147.258', '014.852.123-56', '2017-03-30', 'Rua Cinco', 'Rua 10', 'Esplanada', 'Teresina', 'Sul', 'Piauí', '98874-5869', '99548-7896', 'Ponto X', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id_despesa` int(11) NOT NULL,
  `id_tipoDespesa` varchar(100) DEFAULT NULL,
  `valor` varchar(100) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id_despesa`, `id_tipoDespesa`, `valor`, `descricao`, `data`) VALUES
(8, '5', '450,00', 'Alimentação Funcionarios', '2017-03-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas_carros`
--

CREATE TABLE `despesas_carros` (
  `id_dc` int(11) NOT NULL,
  `id_carro` int(11) NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `id_tipoDespesa` int(11) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesas_carros`
--

INSERT INTO `despesas_carros` (`id_dc`, `id_carro`, `id_motorista`, `id_tipoDespesa`, `valor`, `data`) VALUES
(1, 4, 13, 5, '18.20', '2017-02-14'),
(2, 2, 12, 5, '20.00', '2017-02-13'),
(3, 6, 12, 5, '20.00', '2017-02-21'),
(4, 5, 13, 5, '20.00', '2017-02-20'),
(5, 4, 13, 5, '19.00', '2017-02-14'),
(6, 6, 12, 5, '14.00', '2017-02-20'),
(7, 5, 12, 13, '70.00', '2017-02-24'),
(8, 6, 13, 5, '14.50', '2017-03-17'),
(9, 6, 13, 5, '14.50', '2017-03-17');

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
(1, 'J.A Cosmeticos TT', '02.558.157/0001-62', 'Quadra G Casa 26', 'Porto Alegre', '5698', 'Sul', 'Jerry Adriane', '86 93219-5698', '86 98874-6958', 'jerry@jerry.com', 'Teresina', 'PI');

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
(1, 'Piauí'),
(2, 'Maranhão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
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

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `cnpjCpf`, `endereco`, `bairro`, `cidade`, `regiao`, `estado`, `representante`, `contatoFixo`, `contatoMovel`, `email`) VALUES
(9, 'Alfa Comesmeticos TT', '83.891.283.0001/36 ', 'Av. Mauro Tapety, Prox. Correios', 'Tabuleta', 'Teresina', 'Sul', 'PI', 'Naldo Arantes Nascimento', '86 3233-6958', '86 99974-6778', 'alfacomesticos@gmail.com'),
(10, 'JB Cosmeticos', '83.891.283.0001/36', 'Rua Tavares Barbosa, N° 4521, Prox. Rodoviaria', 'Dirceu', 'Teresina', 'Sul', 'PI', 'Naldo Arantes Nascimento Pinto', '86 3232-5698', '86 99974-6778', 'jb@gmail.com'),
(11, 'dfdfdf', 'dfdf', 'dfd', 'fdf', 'fdf', 'dfdf', 'dfd', 'fdf', 'dfd', 'fd', 'df');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `cpf`, `rg`, `endereco`, `bairro`, `cidade`, `estado`, `regiao`, `celular1`, `celular2`, `funcao`) VALUES
(12, 'Jhonatas de Oliveira Sousa', '023.147.258-89', '2.147.200', 'Quadra 20 Casa 20, Proximo ao Comercial Santos', 'Portal da Alegria III', 'Teresina', 'PI', 'Sul', '86 98563-6958', '86 98147-5869', 'Motorista'),
(13, 'Marta Martins de Sousa', '852.963.741-89', '2.147.258', 'Rua Goitagaz Nº4578', 'Portal da Alegria', 'Teresina', 'PI', 'Sul', '86 99985-6958', '98147-5869', 'Motorista'),
(15, 'AAAAAA', 'AAA', 'AAA', 'AAAA', 'AAA', 'AAAA', 'PI', 'Leste', 'AAAA', 'AAAA', 'Cobrador'),
(16, 'Maria Luiz da silva Rocha', '951.357.123-45', '1.258.369', 'Rua 16 Casa 15 - Proximor ao Comercial do seu Xico', 'Lourival Parente', 'Teresina', 'PI', 'Sul', '86 99547-5869', '86.98825-4689', 'Vendedor'),
(17, 'Maria Pedro Joao', '852.963.852.25', '1.258.369', 'Rua 14, Casa 23, Prox. Parada de Onibus', 'Vermelha', 'Teresina', 'PI', 'Sul', '86 99684-6958', '86 98874-5869', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `quantidade` int(100) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `valor_compra` varchar(100) NOT NULL,
  `valor_venda` varchar(100) NOT NULL,
  `valor_prazo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `marca`, `quantidade`, `id_fornecedor`, `valor_compra`, `valor_venda`, `valor_prazo`) VALUES
(1, 'Shampoo Monica', 'Alway', 74, 9, '12.00', '18.25', '22.00'),
(2, 'Condicionador', 'Toda Bela', 37, 10, '15.00', '25.00', '28.00'),
(5, 'Creme Barbear', 'Joson', 74, 10, '18.50', '22.00', '24.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_vendidos`
--

CREATE TABLE `produtos_vendidos` (
  `id_vendidos` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor_produto` varchar(100) NOT NULL,
  `quantidade` varchar(100) NOT NULL,
  `total_produto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_vendidos`
--

INSERT INTO `produtos_vendidos` (`id_vendidos`, `id_venda`, `id_produto`, `valor_produto`, `quantidade`, `total_produto`) VALUES
(194, 158, 2, '25.00', '1', '25'),
(196, 158, 1, '18.25', '8', '146'),
(202, 178, 2, '25.00', '2', '50'),
(203, 178, 1, '18.25', '2', '36.5'),
(204, 178, 5, '22.00', '1', '22'),
(205, 179, 5, '22.00', '5', '110'),
(206, 158, 5, '22.00', '1', '22');

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
(60, 45, 2, 2),
(63, 62, 2, 2),
(62, 62, 4, 2),
(61, 62, 2, 2),
(59, 45, 4, 2),
(58, 43, 3, 1),
(57, 44, 4, 2),
(56, 44, 2, 2),
(55, 43, 1, 1),
(54, 43, 3, 1),
(53, 43, 5, 1),
(64, 43, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotas`
--

CREATE TABLE `rotas` (
  `idRota` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idEstado` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rotas`
--

INSERT INTO `rotas` (`idRota`, `nome`, `idEstado`) VALUES
(57, 'ROTA 9', 1),
(48, 'ROTA 6', 1),
(47, 'ROTA 5', 2),
(46, 'ROTA 4', 1),
(45, 'ROTA 3', 2),
(44, 'ROTA 2', 2),
(43, 'ROTA 1', 1),
(56, 'ROTA 8', 1),
(52, 'ROTA 7', 2),
(59, 'Rota-10', 1),
(62, 'Rota-11', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_despesa`
--

CREATE TABLE `tipo_despesa` (
  `id_tipoDespesa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_despesa`
--

INSERT INTO `tipo_despesa` (`id_tipoDespesa`, `nome`, `descricao`) VALUES
(1, 'Aluguel', 'Aluguel Empresa'),
(7, 'Luz', 'Luz Empresa'),
(5, 'Alimentação', 'Alimentação nas rotas'),
(12, 'Outros', 'Variados'),
(13, 'Gasolina', 'Constituível Carro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vale`
--

CREATE TABLE `vale` (
  `id_vale` int(11) NOT NULL,
  `id_funcionario` varchar(100) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vale`
--

INSERT INTO `vale` (`id_vale`, `id_funcionario`, `valor`, `data`) VALUES
(2, '12', '50.00', '2017-03-22'),
(5, '13', '20.00', '2017-03-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `id_rota` int(11) NOT NULL,
  `sub_total` varchar(30) NOT NULL,
  `entrada` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `modo_pagamento` varchar(100) NOT NULL,
  `quantidade_parcelas` int(10) DEFAULT '0',
  `valor_prestacao` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `data_prestacao1` date DEFAULT NULL,
  `data_prestacao2` date DEFAULT NULL,
  `data_prestacao3` date DEFAULT NULL,
  `data_registro` timestamp(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `id_cliente`, `id_vendedor`, `data_venda`, `id_rota`, `sub_total`, `entrada`, `total`, `modo_pagamento`, `quantidade_parcelas`, `valor_prestacao`, `data_prestacao1`, `data_prestacao2`, `data_prestacao3`, `data_registro`) VALUES
(179, 2, 16, '2017-05-07', 44, '110', '60', '50', 'Parcelado', 1, '50', '2017-06-07', NULL, NULL, '2017-05-07 08:40:57.730414'),
(158, 2, 16, '2017-04-23', 52, '193', '0', '193', 'À Vista', 0, '0', NULL, NULL, NULL, '2017-04-23 19:46:25.984094'),
(178, 6, 16, '2017-05-06', 48, '108.5', '8.50', '100', 'Parcelado', 2, '50', '2017-06-06', '2017-07-06', NULL, '2017-05-06 11:48:55.547856');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id_carro`);

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
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id_despesa`);

--
-- Indexes for table `despesas_carros`
--
ALTER TABLE `despesas_carros`
  ADD PRIMARY KEY (`id_dc`);

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
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `produtos_vendidos`
--
ALTER TABLE `produtos_vendidos`
  ADD PRIMARY KEY (`id_vendidos`);

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
-- Indexes for table `tipo_despesa`
--
ALTER TABLE `tipo_despesa`
  ADD PRIMARY KEY (`id_tipoDespesa`);

--
-- Indexes for table `vale`
--
ALTER TABLE `vale`
  ADD PRIMARY KEY (`id_vale`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carros`
--
ALTER TABLE `carros`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `despesas_carros`
--
ALTER TABLE `despesas_carros`
  MODIFY `id_dc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produtos_vendidos`
--
ALTER TABLE `produtos_vendidos`
  MODIFY `id_vendidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `relacao_rce`
--
ALTER TABLE `relacao_rce`
  MODIFY `idRelacao_rce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `rotas`
--
ALTER TABLE `rotas`
  MODIFY `idRota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tipo_despesa`
--
ALTER TABLE `tipo_despesa`
  MODIFY `id_tipoDespesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vale`
--
ALTER TABLE `vale`
  MODIFY `id_vale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
