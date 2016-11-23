-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema superfox
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema superfox
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `superfox` DEFAULT CHARACTER SET utf8mb4 ;
USE `superfox` ;

-- -----------------------------------------------------
-- Table `superfox`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`cargo` (
  `pk_cargo` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_cargo`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`produto` (
  `pk_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo_de_barras` INT(15) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `lote` VARCHAR(45) NOT NULL,
  `validade` VARCHAR(40) NOT NULL,
  `fabricacao` VARCHAR(40) NOT NULL,
  `preco` FLOAT(10,2) NOT NULL,
  `estoque` INT(11) NOT NULL,
  `estoque_minimo` INT(11) NOT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_produto`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`categoria` (
  `pk_categoria` INT(11) NOT NULL,
  `nome` VARCHAR(180) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `fk_produto` INT(11) NOT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_categoria`, `fk_produto`),
  INDEX `fk_categoria_produto_idx` (`fk_produto` ASC),
  CONSTRAINT `fk_categoria_produto`
    FOREIGN KEY (`fk_produto`)
    REFERENCES `superfox`.`produto` (`pk_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`cliente_endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`cliente_endereco` (
  `pk_cliente_endereco` INT(11) NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(80) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `setor` VARCHAR(100) NOT NULL,
  `logradouro` VARCHAR(100) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_cliente_endereco`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`cliente` (
  `pk_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(180) NOT NULL,
  `cpf_cnpj` VARCHAR(45) NULL DEFAULT NULL,
  `telefone` VARCHAR(45) NULL DEFAULT NULL,
  `fk_cliente_endereco` INT(11) NOT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_cliente`, `fk_cliente_endereco`),
  INDEX `fk_cliente_cliente_endereco1_idx` (`fk_cliente_endereco` ASC),
  CONSTRAINT `fk_cliente_cliente_endereco1`
    FOREIGN KEY (`fk_cliente_endereco`)
    REFERENCES `superfox`.`cliente_endereco` (`pk_cliente_endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`compra` (
  `pk_compra` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` FLOAT(10,2) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `hora_cadastro` TIME NOT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_compra`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`fornecedor` (
  `pk_fornecedor` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_empresarial` VARCHAR(180) NOT NULL,
  `nome_fantasia` VARCHAR(180) NULL DEFAULT NULL,
  `cpf_cnpj` VARCHAR(45) NOT NULL,
  `ramo` VARCHAR(45) NOT NULL,
  `representante` VARCHAR(180) NOT NULL,
  `mei` TINYINT(1) NOT NULL DEFAULT '0',
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  `data_cadastro` DATE NOT NULL,
  PRIMARY KEY (`pk_fornecedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`fornecedor_endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`fornecedor_endereco` (
  `pk_fornecedor_endereco` INT(11) NOT NULL AUTO_INCREMENT,
  `fk_fornecedor` INT(11) NOT NULL,
  `cidade` VARCHAR(80) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `setor` VARCHAR(100) NOT NULL,
  `logradouro` VARCHAR(100) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_fornecedor_endereco`, `fk_fornecedor`),
  INDEX `fk_fornecedor_endereco_fornecedor_idx` (`fk_fornecedor` ASC),
  CONSTRAINT `fk_fornecedor_endereco_fornecedor`
    FOREIGN KEY (`fk_fornecedor`)
    REFERENCES `superfox`.`fornecedor` (`pk_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`funcionario` (
  `pk_funcionario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(180) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  `fk_cargo` INT(11) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pk_funcionario`),
  INDEX `fk_funcionario_cargo1_idx` (`fk_cargo` ASC),
  CONSTRAINT `fk_funcionario_cargo1`
    FOREIGN KEY (`fk_cargo`)
    REFERENCES `superfox`.`cargo` (`pk_cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`itens_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`itens_compra` (
  `fk_produto` INT(11) NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `fk_compra` INT(11) NOT NULL,
  PRIMARY KEY (`fk_produto`, `fk_compra`),
  INDEX `fk_produto_has_compra_produto1_idx` (`fk_produto` ASC),
  INDEX `fk_itens_compra_compra2_idx` (`fk_compra` ASC),
  CONSTRAINT `fk_itens_compra_compra2`
    FOREIGN KEY (`fk_compra`)
    REFERENCES `superfox`.`compra` (`pk_compra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_compra_produto1`
    FOREIGN KEY (`fk_produto`)
    REFERENCES `superfox`.`produto` (`pk_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`usuario` (
  `pk_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(32) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  `email` VARCHAR(180) NULL DEFAULT NULL,
  `ativado` TINYINT(1) NOT NULL DEFAULT '1',
  `fk_funcionario` INT(11) NOT NULL,
  PRIMARY KEY (`pk_usuario`, `fk_funcionario`),
  INDEX `fk_usuario_funcionario1_idx` (`fk_funcionario` ASC),
  CONSTRAINT `fk_usuario_funcionario1`
    FOREIGN KEY (`fk_funcionario`)
    REFERENCES `superfox`.`funcionario` (`pk_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`venda` (
  `pk_venda` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` FLOAT(10,2) NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `fk_usuario` INT(11) NOT NULL,
  `ativado` TINYINT(1) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `data_ultima_alteracao` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`pk_venda`, `fk_usuario`),
  INDEX `fk_venda_table11_idx` (`fk_usuario` ASC),
  CONSTRAINT `fk_venda_table11`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `superfox`.`usuario` (`pk_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `superfox`.`itens_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superfox`.`itens_venda` (
  `fk_produto` INT(11) NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `fk_venda` INT(11) NOT NULL,
  PRIMARY KEY (`fk_produto`, `fk_venda`),
  INDEX `fk_produto_has_venda_produto1_idx` (`fk_produto` ASC),
  INDEX `fk_itens_venda_venda1_idx` (`fk_venda` ASC),
  CONSTRAINT `fk_itens_venda_venda1`
    FOREIGN KEY (`fk_venda`)
    REFERENCES `superfox`.`venda` (`pk_venda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_venda_produto1`
    FOREIGN KEY (`fk_produto`)
    REFERENCES `superfox`.`produto` (`pk_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `superfox`;

DELIMITER $$
USE `superfox`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `superfox`.`itens_compra_AFTER_DELETE`
AFTER DELETE ON `superfox`.`itens_compra`
FOR EACH ROW
BEGIN
UPDATE produto SET estoque = estoque - OLD.quantidade
WHERE pk_produto = OLD.fk_produto;
END$$

USE `superfox`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `superfox`.`itens_compra_AFTER_INSERT`
AFTER INSERT ON `superfox`.`itens_compra`
FOR EACH ROW
BEGIN
UPDATE produto SET estoque = estoque + NEW.quantidade
WHERE pk_produto = NEW.fk_produto;
END$$

USE `superfox`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `superfox`.`itens_venda_AFTER_DELETE`
AFTER DELETE ON `superfox`.`itens_venda`
FOR EACH ROW
BEGIN
    UPDATE produto SET estoque = estoque + OLD.quantidade
WHERE pk_produto = OLD.fk_produto;
END$$

USE `superfox`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `superfox`.`itens_venda_AFTER_INSERT`
AFTER INSERT ON `superfox`.`itens_venda`
FOR EACH ROW
BEGIN
UPDATE produto SET estoque = estoque - NEW.quantidade
WHERE pk_produto = NEW.fk_produto;
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
