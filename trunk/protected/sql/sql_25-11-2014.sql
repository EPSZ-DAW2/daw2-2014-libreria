SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `libreria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `libreria`;

CREATE  TABLE IF NOT EXISTS `libreria`.`Libros` (
  `idLibro` INT(11) NOT NULL AUTO_INCREMENT ,
  `isbn` VARCHAR(13) NOT NULL ,
  `idEditorial` INT(11) NOT NULL ,
  `titulo` VARCHAR(50) NOT NULL ,
  `edicion` VARCHAR(20) NULL DEFAULT NULL ,
  `paginas` SMALLINT(6) NULL DEFAULT NULL ,
  `formato` VARCHAR(20) NULL DEFAULT NULL ,
  `idIdioma` INT(11) NOT NULL ,
  `resumen` TEXT NOT NULL ,
  `precio` FLOAT(11) NULL DEFAULT NULL ,
  `stock` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`idLibro`) ,
  UNIQUE INDEX `Isbn_UNIQUE` (`isbn` ASC) ,
  INDEX `fk_Libros_Idiomas_idx` (`idIdioma` ASC) ,
  INDEX `fk_Libros_Editoriales_idx` (`idEditorial` ASC) ,
  CONSTRAINT `fk_Libros_Idiomas`
    FOREIGN KEY (`idIdioma` )
    REFERENCES `libreria`.`Idiomas` (`idIdioma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Libros_Editoriales`
    FOREIGN KEY (`idEditorial` )
    REFERENCES `libreria`.`Editoriales` (`idEditorial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `libreria`.`Idiomas` (
  `idIdioma` INT(11) NOT NULL AUTO_INCREMENT ,
  `idioma` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`idIdioma`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `libreria`.`Editoriales` (
  `idEditorial` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `web` VARCHAR(50) NULL DEFAULT NULL ,
  PRIMARY KEY (`idEditorial`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `libreria`.`Categorias` (
  `idCategoria` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `descripcion` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`idCategoria`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `libreria`.`Categorias_Libro` (
  `idLibro` INT(11) NOT NULL ,
  `idCategoria` INT(11) NOT NULL ,
  INDEX `fk_Categorias_Libro_Libros1_idx` (`idLibro` ASC) ,
  INDEX `fk_Categorias_Libro_Categorias1_idx` (`idCategoria` ASC) ,
  PRIMARY KEY (`idCategoria`, `idLibro`) ,
  CONSTRAINT `fk_Categorias_Libro_Libros1`
    FOREIGN KEY (`idLibro` )
    REFERENCES `libreria`.`Libros` (`idLibro` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categorias_Libro_Categorias1`
    FOREIGN KEY (`idCategoria` )
    REFERENCES `libreria`.`Categorias` (`idCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
