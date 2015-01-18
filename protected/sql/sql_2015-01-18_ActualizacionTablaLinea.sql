ALTER TABLE  `linea` DROP FOREIGN KEY  `fk_linea-pedido` ;

ALTER TABLE  `linea` ADD CONSTRAINT  `fk_linea-pedido` FOREIGN KEY (  `IdPedido` ) REFERENCES  `libreria`.`pedido` (
`IdPedido`
) ON DELETE CASCADE ON UPDATE NO ACTION ;