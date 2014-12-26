-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2014 a las 19:19:04
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `fk_authassignment-usuario_idx` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `IdAutor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `IdNacionalidad` int(11) NOT NULL,
  `Web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdAutor`),
  KEY `fk_Autor_Nacionalidad_idx` (`IdNacionalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`IdAutor`, `Nombre`, `IdNacionalidad`, `Web`) VALUES
(11, 'José Saramago', 1, 'www.josesaramago.org'),
(12, 'Arturo Pérez Reverte', 2, 'www.perezreverte.com'),
(13, 'Stieg Larsson', 3, 'www.serielarsson.com'),
(14, 'César Aira', 4, NULL),
(15, 'Antonio Muñoz Molina', 2, 'www.antoniomuñozmolina.es'),
(16, 'Javier Marías', 2, 'www.javiermarias.es'),
(17, 'Alice Munro', 5, 'www.alicemunro.ca'),
(18, 'Mario Vargas Llosa', 6, 'www.mvargasllosa.com'),
(19, 'Muriel Barbery', 7, NULL),
(20, 'Fernando Vallejo', 8, NULL),
(21, 'Carlos Ruiz Zafón', 2, 'www.carlosruizzafon.com'),
(22, 'Stephen King', 9, 'www.stephenking.com'),
(23, 'Ken Follet', 10, 'www.kenfollett.es'),
(24, 'Julian Barnes', 10, 'www.julianbarnes.com'),
(25, 'Paulo Coelho', 11, 'www.paulocoelho.com'),
(26, 'Dolores Redondo', 2, 'www.doloresredondomeira.com'),
(27, 'Blue Jeans', 2, 'www.lawebdebluejeans.com'),
(28, 'Daniel Kahneman', 9, NULL),
(29, 'Patrick Rothfuss', 9, 'www.patrickrothfuss.com'),
(30, 'George R. R. Martin', 9, 'www.georgerrmartin.com'),
(31, 'Jonas Jonasson', 3, NULL),
(32, 'John Green', 9, 'www.johngreenbooks.com'),
(33, 'Dan Brown', 9, 'www.danbrown.com'),
(34, 'Suzanne Collins', 9, 'www.suzannecollinsbooks.com'),
(35, 'Veronica Roth', 9, NULL),
(36, 'Megan Maxwell', 2, 'www.megan-maxwell.com'),
(37, 'Markus Zusak', 12, NULL),
(38, 'Brandon Sanderson', 9, 'www.brandonsanderson.com'),
(39, 'Corina Bomann', 13, NULL),
(40, 'Anne Rice', 9, 'www.annerice.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `IdCliente` int(11) NOT NULL,
  `DomicilioFacturacion` varchar(100) NOT NULL,
  `CPFacturacion` int(5) NOT NULL,
  `PoblacionFacturacion` varchar(60) NOT NULL,
  `ProvinciaFacturacion` varchar(40) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `Campo` varchar(50) NOT NULL,
  `Valor` varchar(50) NOT NULL,
  PRIMARY KEY (`Campo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`Campo`, `Valor`) VALUES
('IvaLibros', '21'),
('LibrosPagina', '25'),
('LineasPagina', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `IdEditorial` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdEditorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `IdEstado` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE IF NOT EXISTS `forma_pago` (
  `IdPago` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`IdPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
  `IdIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`IdIdioma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `IdLibro` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(13) NOT NULL,
  `IdEditorial` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Edicion` varchar(20) DEFAULT NULL,
  `Paginas` smallint(6) DEFAULT NULL,
  `Formato` varchar(20) DEFAULT NULL,
  `IdIdioma` int(11) NOT NULL,
  `Resumen` text NOT NULL,
  `Precio` float DEFAULT NULL,
  `Stock` int(4) DEFAULT NULL,
  PRIMARY KEY (`IdLibro`),
  UNIQUE KEY `Isbn_UNIQUE` (`ISBN`),
  KEY `fk_Libros_Idiomas_idx` (`IdIdioma`),
  KEY `fk_Libros_Editoriales_idx` (`IdEditorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_autor`
--

CREATE TABLE IF NOT EXISTS `libro_autor` (
  `IdLibro` int(11) NOT NULL,
  `IdAutor` int(11) NOT NULL,
  PRIMARY KEY (`IdLibro`,`IdAutor`),
  KEY `fk_Autores_Libro_Libros1_idx` (`IdLibro`),
  KEY `fk_Autores_Libro_Autores1_idx` (`IdAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_categoria`
--

CREATE TABLE IF NOT EXISTS `libro_categoria` (
  `IdLibro` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  PRIMARY KEY (`IdCategoria`,`IdLibro`),
  KEY `fk_Categorias_Libro_Libros1_idx` (`IdLibro`),
  KEY `fk_Categorias_Libro_Categorias1_idx` (`IdCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
  `IdLinea` int(11) NOT NULL AUTO_INCREMENT,
  `IdPedido` int(11) NOT NULL,
  `IdLibro` int(11) NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `Precio` float NOT NULL,
  `Importe` float NOT NULL,
  PRIMARY KEY (`IdLinea`),
  KEY `fk_linea-pedido_idx` (`IdPedido`),
  KEY `fk_linea-libro_idx` (`IdLibro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `IdNacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `NombreNacionalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`IdNacionalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`IdNacionalidad`, `NombreNacionalidad`) VALUES
(1, 'Portuguesa'),
(2, 'Española'),
(3, 'Sueca'),
(4, 'Argentina'),
(5, 'Canadiense'),
(6, 'Peruana'),
(7, 'Francesa'),
(8, 'Mexicana'),
(9, 'Estadounidense'),
(10, 'Británica'),
(11, 'Brasileña'),
(12, 'Australiana'),
(13, 'Alemana'),
(14, 'Colombiana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `IdPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Serie` int(4) NOT NULL,
  `Numero` int(8) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdPago` int(2) NOT NULL,
  `IVA` int(2) NOT NULL,
  `GastosEnvio` float NOT NULL,
  `Pagado` tinyint(1) NOT NULL,
  `IdEstado` int(2) NOT NULL,
  `DomicilioEnvio` varchar(100) NOT NULL,
  `CPEnvio` int(5) NOT NULL,
  `PoblacionEnvio` varchar(60) NOT NULL,
  `ProvinciaEnvio` varchar(40) NOT NULL,
  `TelefonoEnvio` int(9) NOT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `fk_pedido-estado_idx` (`IdEstado`),
  KEY `fk_pedido-cliente_idx` (`IdCliente`),
  KEY `fk_pedido-forma_pago_idx` (`IdPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(80) NOT NULL,
  `NIF` varchar(9) NOT NULL,
  `Telefono` int(9) DEFAULT NULL,
  `Bloqueado` tinyint(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `Revisado` int(11) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `NIF_UNIQUE` (`NIF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_authassignment-usuario` FOREIGN KEY (`userid`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_Autor_Nacionalidad` FOREIGN KEY (`IdNacionalidad`) REFERENCES `nacionalidad` (`IdNacionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`IdCliente`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_Libros_Editoriales` FOREIGN KEY (`IdEditorial`) REFERENCES `editorial` (`IdEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Libros_Idiomas` FOREIGN KEY (`IdIdioma`) REFERENCES `idioma` (`IdIdioma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD CONSTRAINT `fk_Autores_Libro_Autores1` FOREIGN KEY (`IdAutor`) REFERENCES `autor` (`IdAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Autores_Libro_Libros1` FOREIGN KEY (`IdLibro`) REFERENCES `libro` (`IdLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD CONSTRAINT `fk_Categorias_Libro_Categorias1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Categorias_Libro_Libros1` FOREIGN KEY (`IdLibro`) REFERENCES `libro` (`IdLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `linea`
--
ALTER TABLE `linea`
  ADD CONSTRAINT `fk_linea-libro` FOREIGN KEY (`IdLibro`) REFERENCES `libro` (`IdLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_linea-pedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`IdPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido-cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido-estado` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido-forma_pago` FOREIGN KEY (`IdPago`) REFERENCES `forma_pago` (`IdPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
