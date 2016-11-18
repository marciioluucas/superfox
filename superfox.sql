-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2016 às 21:03
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superfox`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `pk_cargo` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` text,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`pk_cargo`, `nome`, `descricao`, `ativado`, `data_cadastro`, `data_ultima_alteracao`) VALUES
(1, 'teste', 'teste', 1, '0000-00-00', NULL),
(2, 'Repositor', 'Repoe os produtos na prateleira', 1, '0000-00-00', NULL),
(3, 'Gerente', 'Gerencia as dependencias do mercado', 1, '0000-00-00', NULL),
(4, 'Caixa', 'Passa as compras dos clientes e cadastra as vendas.', 1, '0000-00-00', NULL),
(5, 't', '423423', 1, '0000-00-00', '0000-00-00'),
(7, 'Dorama', 'efdhfgghb', 1, '0000-00-00', '0000-00-00'),
(10, 'asdasddt', '423423', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `pk_categoria` int(11) NOT NULL,
  `nome` varchar(180) NOT NULL,
  `descricao` text,
  `fk_produto` int(11) NOT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `pk_cliente` int(11) NOT NULL,
  `nome` varchar(180) NOT NULL,
  `cpf_cnpj` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `fk_cliente_endereco` int(11) NOT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_endereco`
--

CREATE TABLE `cliente_endereco` (
  `pk_cliente_endereco` int(11) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `pk_compra` int(11) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `hora_cadastro` time NOT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`pk_compra`, `valor`, `data_cadastro`, `hora_cadastro`, `ativado`, `data_ultima_alteracao`) VALUES
(1, 200.00, '0000-00-00', '00:00:11', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `pk_fornecedor` int(11) NOT NULL,
  `nome_empresarial` varchar(180) NOT NULL,
  `nome_fantasia` varchar(180) DEFAULT NULL,
  `cpf_cnpj` varchar(45) NOT NULL,
  `ramo` varchar(45) NOT NULL,
  `representante` varchar(180) NOT NULL,
  `mei` tinyint(1) NOT NULL DEFAULT '0',
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `data_ultima_alteracao` date DEFAULT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor_endereco`
--

CREATE TABLE `fornecedor_endereco` (
  `pk_fornecedor_endereco` int(11) NOT NULL,
  `fk_fornecedor` int(11) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `pk_funcionario` int(11) NOT NULL,
  `nome` varchar(180) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL,
  `fk_cargo` int(11) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`pk_funcionario`, `nome`, `data_cadastro`, `data_ultima_alteracao`, `fk_cargo`, `cpf`, `ativado`) VALUES
(1, 'Márcio Lucas', '2016-10-21', NULL, 3, '03794335163', 1),
(2, 'Marco Aurélio', '2016-10-21', NULL, 2, '12345678912', 1),
(3, 'João Victor', '2016-10-21', NULL, 4, '12545681351', 1),
(4, 'Juanes Adriano', '2016-10-21', NULL, 2, '65481256613', 1),
(5, 'Oto Gloria', '2016-10-21', NULL, 3, '45848979815', 1),
(6, 'Sadrak', '2016-10-21', NULL, 4, '51468487841', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_compra`
--

CREATE TABLE `itens_compra` (
  `fk_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `fk_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Acionadores `itens_compra`
--
DELIMITER $$
CREATE TRIGGER `itens_compra_AFTER_DELETE` AFTER DELETE ON `itens_compra` FOR EACH ROW BEGIN
UPDATE produto SET estoque = estoque - OLD.quantidade
WHERE pk_produto = OLD.fk_produto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `itens_compra_AFTER_INSERT` AFTER INSERT ON `itens_compra` FOR EACH ROW BEGIN
UPDATE produto SET estoque = estoque + NEW.quantidade
WHERE pk_produto = NEW.fk_produto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `fk_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `fk_venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Acionadores `itens_venda`
--
DELIMITER $$
CREATE TRIGGER `itens_venda_AFTER_DELETE` AFTER DELETE ON `itens_venda` FOR EACH ROW BEGIN
    UPDATE produto SET estoque = estoque + OLD.quantidade
WHERE pk_produto = OLD.fk_produto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `itens_venda_AFTER_INSERT` AFTER INSERT ON `itens_venda` FOR EACH ROW BEGIN
UPDATE produto SET estoque = estoque - NEW.quantidade
WHERE pk_produto = NEW.fk_produto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `pk_produto` int(11) NOT NULL,
  `codigo_de_barras` int(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `lote` varchar(45) NOT NULL,
  `validade` varchar(40) NOT NULL,
  `fabricacao` varchar(40) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoque_minimo` int(11) NOT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`pk_produto`, `codigo_de_barras`, `nome`, `marca`, `lote`, `validade`, `fabricacao`, `preco`, `estoque`, `estoque_minimo`, `ativado`, `data_cadastro`, `data_ultima_alteracao`) VALUES
(1, 123456789, 'teste1', 'marcateste1', 'lotet1', '11-11-2011', '11-11-2011', 1.00, 10, 2, 1, '0000-00-00', NULL),
(2, 546456489, 'teste2', 'marcateste2', 'lotet2', '11-11-2011', '11-11-2011', 2.00, 90, 3, 1, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `pk_usuario` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `fk_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`pk_usuario`, `login`, `senha`, `data_cadastro`, `data_ultima_alteracao`, `email`, `ativado`, `fk_funcionario`) VALUES
(23, 'marciioluucas', '123456', '2016-10-27', '0000-00-00', 'marciioluucas@gmail.com', 0, 1),
(24, 'marco.aurelio', '123', '2016-10-28', NULL, 'kbral99@gmail.com', 0, 2),
(25, 'joao.victor', '123', '2016-10-28', NULL, 'joaogarciafirmino@gmail.com', 1, 3),
(26, 'juanes-adriano', '123', '2016-10-28', NULL, 'juaneshtk50@gmail.com', 1, 4),
(27, 'oto.gloria', '123', '2016-10-28', NULL, 'otogloria@gmail.com', 1, 5),
(28, 'sadrak', '123', '2016-10-28', NULL, 'sadrakss@outlook.com', 0, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `pk_venda` int(11) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `ativado` tinyint(1) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ultima_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`pk_cargo`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`pk_categoria`,`fk_produto`),
  ADD KEY `fk_categoria_produto_idx` (`fk_produto`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`pk_cliente`,`fk_cliente_endereco`),
  ADD KEY `fk_cliente_cliente_endereco1_idx` (`fk_cliente_endereco`);

--
-- Indexes for table `cliente_endereco`
--
ALTER TABLE `cliente_endereco`
  ADD PRIMARY KEY (`pk_cliente_endereco`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`pk_compra`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`pk_fornecedor`);

--
-- Indexes for table `fornecedor_endereco`
--
ALTER TABLE `fornecedor_endereco`
  ADD PRIMARY KEY (`pk_fornecedor_endereco`,`fk_fornecedor`),
  ADD KEY `fk_fornecedor_endereco_fornecedor_idx` (`fk_fornecedor`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`pk_funcionario`),
  ADD KEY `fk_funcionario_cargo1_idx` (`fk_cargo`);

--
-- Indexes for table `itens_compra`
--
ALTER TABLE `itens_compra`
  ADD PRIMARY KEY (`fk_produto`,`fk_compra`),
  ADD KEY `fk_produto_has_compra_produto1_idx` (`fk_produto`),
  ADD KEY `fk_itens_compra_compra2_idx` (`fk_compra`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`fk_produto`,`fk_venda`),
  ADD KEY `fk_produto_has_venda_produto1_idx` (`fk_produto`),
  ADD KEY `fk_itens_venda_venda1_idx` (`fk_venda`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`pk_produto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_usuario`,`fk_funcionario`),
  ADD KEY `fk_usuario_funcionario1_idx` (`fk_funcionario`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`pk_venda`,`fk_usuario`),
  ADD KEY `fk_venda_table11_idx` (`fk_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `pk_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `pk_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente_endereco`
--
ALTER TABLE `cliente_endereco`
  MODIFY `pk_cliente_endereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `pk_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `pk_fornecedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fornecedor_endereco`
--
ALTER TABLE `fornecedor_endereco`
  MODIFY `pk_fornecedor_endereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `pk_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `pk_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `pk_venda` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_produto` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`pk_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_cliente_endereco1` FOREIGN KEY (`fk_cliente_endereco`) REFERENCES `cliente_endereco` (`pk_cliente_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedor_endereco`
--
ALTER TABLE `fornecedor_endereco`
  ADD CONSTRAINT `fk_fornecedor_endereco_fornecedor` FOREIGN KEY (`fk_fornecedor`) REFERENCES `fornecedor` (`pk_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_cargo1` FOREIGN KEY (`fk_cargo`) REFERENCES `cargo` (`pk_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_compra`
--
ALTER TABLE `itens_compra`
  ADD CONSTRAINT `fk_itens_compra_compra2` FOREIGN KEY (`fk_compra`) REFERENCES `compra` (`pk_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_has_compra_produto1` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`pk_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `fk_itens_venda_venda1` FOREIGN KEY (`fk_venda`) REFERENCES `venda` (`pk_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_has_venda_produto1` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`pk_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_funcionario1` FOREIGN KEY (`fk_funcionario`) REFERENCES `funcionario` (`pk_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_table11` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`pk_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
