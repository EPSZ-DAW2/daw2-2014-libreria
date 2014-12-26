SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `libreria`.`cliente` DROP COLUMN `TelefonoEnvio` , DROP COLUMN `ProvinciaEnvio` , DROP COLUMN `PoblacionEnvio` , DROP COLUMN `CPEnvio` , DROP COLUMN `DomicilioEnvio` ;

ALTER TABLE `libreria`.`usuario` 
ADD UNIQUE INDEX `NIF_UNIQUE` (`NIF` ASC) ;

ALTER TABLE `libreria`.`pedido` CHANGE COLUMN `Serie` `Serie` INT(4) NOT NULL  , ADD COLUMN `DomicilioEnvio` VARCHAR(100) NOT NULL  AFTER `IdEstado` , ADD COLUMN `CPEnvio` INT(5) NOT NULL  AFTER `DomicilioEnvio` , ADD COLUMN `PoblacionEnvio` VARCHAR(60) NOT NULL  AFTER `CPEnvio` , ADD COLUMN `ProvinciaEnvio` VARCHAR(40) NOT NULL  AFTER `PoblacionEnvio` , ADD COLUMN `TelefonoEnvio` INT(9) NOT NULL  AFTER `ProvinciaEnvio` , DROP FOREIGN KEY `fk_pedido-estado` ;

ALTER TABLE `libreria`.`pedido` 
  ADD CONSTRAINT `fk_pedido-estado`
  FOREIGN KEY (`IdEstado` )
  REFERENCES `libreria`.`estado` (`IdEstado` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `libreria`.`linea` ADD COLUMN `Precio` FLOAT(11) NOT NULL  AFTER `Cantidad` , DROP FOREIGN KEY `fk_linea-pedido` ;

ALTER TABLE `libreria`.`linea` 
  ADD CONSTRAINT `fk_linea-pedido`
  FOREIGN KEY (`IdPedido` )
  REFERENCES `libreria`.`pedido` (`IdPedido` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `libreria`.`configuracion` DROP COLUMN `IdConfiguracion` 
, DROP PRIMARY KEY 
, ADD PRIMARY KEY (`Campo`) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
