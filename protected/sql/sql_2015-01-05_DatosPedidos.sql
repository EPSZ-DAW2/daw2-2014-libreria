/* Datos para las tablas PEDIDO, ESTADO, LINEA y FORMA_PAGO de la base de datos LIBRERÍA */
INSERT INTO `estado` (`IdEstado`, `Nombre`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Enviado'),
(4, 'Entregado');

INSERT INTO `forma_pago` (`IdPago`, `Nombre`) VALUES
(1, 'Master Card'),
(2, 'Visa'),
(3, 'American Express'),
(4, 'PayPal'),
(5, 'Transferencia bancaria'),
(6, 'Contra reembolso');

INSERT INTO `pedido` (`IdPedido`, `Serie`, `Numero`, `Fecha`, `IdCliente`, `IdPago`, `IVA`, `GastosEnvio`, `Pagado`, `IdEstado`, `DomicilioEnvio`, `CPEnvio`, `PoblacionEnvio`, `ProvinciaEnvio`, `TelefonoEnvio`) VALUES
(2, 2015, 12345678, '2015-01-02 00:00:00', 7, 2, 21, 3, 1, 2, 'C/ Domicilio,1,1ºB', 49021, 'Zamora', 'Zamora', 980980980),
(3, 2015, 12345679, '2015-01-03 00:00:00', 8, 5, 21, 5, 1, 2, 'C/ Domicilio,1,1ªB', 49021, 'Zamora', 'Zamora', 981981981);

INSERT INTO `linea` (`IdLinea`, `IdPedido`, `IdLibro`, `Cantidad`, `Precio`, `Importe`) VALUES
(1, 2, 1, 1, 22, 22),
(2, 2, 9, 1, 36, 36),
(3, 3, 5, 1, 10, 10);

