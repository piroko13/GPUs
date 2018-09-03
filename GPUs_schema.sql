-- MySQL Workbench Synchronization
-- Generated: 2018-09-02 19:12
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Luis

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `mydb`.`Tarjetas_de_Video` (
  `id_Tarjetas_de_Video` INT(10) UNSIGNED NOT NULL,
  `Modelo` VARCHAR(45) NOT NULL,
  `Procesador_grafico` VARCHAR(15) NOT NULL,
  `Numero_ventiladores` TINYINT(4) NOT NULL,
  `Cores` INT(10) NOT NULL,
  `Tipo_memoria` VARCHAR(10) NOT NULL,
  `Marca_idMarca` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_Tarjetas_de_Video`, `Marca_idMarca`),
  INDEX `fk_Tarjetas_de_Video_Marca_idx` (`Marca_idMarca` ASC),
  CONSTRAINT `fk_Tarjetas_de_Video_Marca`
    FOREIGN KEY (`Marca_idMarca`)
    REFERENCES `mydb`.`Marca` (`idMarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Marca` (
  `idMarca` INT(10) UNSIGNED NOT NULL,
  `nombre_marca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMarca`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
