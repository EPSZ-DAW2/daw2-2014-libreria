SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `libreria`.`autor` DROP FOREIGN KEY `fk_Autor_Nacionalidad` ;

ALTER TABLE `libreria`.`autor` DROP COLUMN `IdNacionalidad` , ADD COLUMN `IdNacionalidad` INT(11) NOT NULL  AFTER `Nombre` , 
  ADD CONSTRAINT `fk_Autor_Nacionalidad`
  FOREIGN KEY (`IdNacionalidad` )
  REFERENCES `libreria`.`nacionalidad` (`IdNacionalidad` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, DROP INDEX `fk_Autor_Nacionalidad_idx` 
, ADD INDEX `fk_Autor_Nacionalidad_idx` (`IdNacionalidad` ASC) ;

ALTER TABLE `libreria`.`nacionalidad` CHANGE COLUMN `IdNacionalidad` `IdNacionalidad` INT(11) NOT NULL AUTO_INCREMENT  ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
