-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2014 a las 17:45:57
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libreria`
--
CREATE DATABASE IF NOT EXISTS `libreria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libreria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `fk_authassignment-usuario_idx` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `authassignment`:
--   `itemname`
--       `authitem` -> `name`
--   `userid`
--       `usuario` -> `IdUsuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `authitem`;
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
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `authitemchild`:
--   `parent`
--       `authitem` -> `name`
--   `child`
--       `authitem` -> `name`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `IdAutor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Nacionalidad` varchar(30) DEFAULT NULL,
  `Web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `categoria`;
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
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `IdCliente` int(11) NOT NULL,
  `DomicilioFacturacion` varchar(100) NOT NULL,
  `CPFacturacion` int(5) NOT NULL,
  `PoblacionFacturacion` varchar(60) NOT NULL,
  `ProvinciaFacturacion` varchar(40) NOT NULL,
  `DomicilioEnvio` varchar(100) NOT NULL,
  `CPEnvio` int(5) NOT NULL,
  `PoblacionEnvio` varchar(60) NOT NULL,
  `ProvinciaEnvio` varchar(40) NOT NULL,
  `TelefonoEnvio` int(9) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `cliente`:
--   `IdCliente`
--       `usuario` -> `IdUsuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `IdConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `Campo` varchar(50) NOT NULL,
  `Valor` varchar(50) NOT NULL,
  PRIMARY KEY (`IdConfiguracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `editorial`;
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
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `IdEstado` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE IF NOT EXISTS `forma_pago` (
  `IdPago` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`IdPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `idioma`;
CREATE TABLE IF NOT EXISTS `idioma` (
  `IdIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`IdIdioma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `libro`;
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

--
-- RELACIONES PARA LA TABLA `libro`:
--   `IdIdioma`
--       `idioma` -> `IdIdioma`
--   `IdEditorial`
--       `editorial` -> `IdEditorial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_autor`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `libro_autor`;
CREATE TABLE IF NOT EXISTS `libro_autor` (
  `IdLibro` int(11) NOT NULL,
  `IdAutor` int(11) NOT NULL,
  PRIMARY KEY (`IdLibro`,`IdAutor`),
  KEY `fk_Autores_Libro_Libros1_idx` (`IdLibro`),
  KEY `fk_Autores_Libro_Autores1_idx` (`IdAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `libro_autor`:
--   `IdLibro`
--       `libro` -> `IdLibro`
--   `IdAutor`
--       `autor` -> `IdAutor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_categoria`
--
-- Creación: 29-11-2014 a las 16:42:49
--

DROP TABLE IF EXISTS `libro_categoria`;
CREATE TABLE IF NOT EXISTS `libro_categoria` (
  `IdLibro` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  PRIMARY KEY (`IdCategoria`,`IdLibro`),
  KEY `fk_Categorias_Libro_Libros1_idx` (`IdLibro`),
  KEY `fk_Categorias_Libro_Categorias1_idx` (`IdCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `libro_categoria`:
--   `IdLibro`
--       `libro` -> `IdLibro`
--   `IdCategoria`
--       `categoria` -> `IdCategoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `linea`;
CREATE TABLE IF NOT EXISTS `linea` (
  `IdLinea` int(11) NOT NULL AUTO_INCREMENT,
  `IdPedido` int(11) NOT NULL,
  `IdLibro` int(11) NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `Importe` float NOT NULL,
  PRIMARY KEY (`IdLinea`),
  KEY `fk_linea-pedido_idx` (`IdPedido`),
  KEY `fk_linea-libro_idx` (`IdLibro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `linea`:
--   `IdPedido`
--       `pedido` -> `IdPedido`
--   `IdLibro`
--       `libro` -> `IdLibro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `IdPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Serie` int(5) NOT NULL,
  `Numero` int(8) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdPago` int(2) NOT NULL,
  `IVA` int(2) NOT NULL,
  `GastosEnvio` float NOT NULL,
  `Pagado` tinyint(1) NOT NULL,
  `IdEstado` int(2) NOT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `fk_pedido-estado_idx` (`IdEstado`),
  KEY `fk_pedido-cliente_idx` (`IdCliente`),
  KEY `fk_pedido-forma_pago_idx` (`IdPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `pedido`:
--   `IdEstado`
--       `estado` -> `IdEstado`
--   `IdCliente`
--       `cliente` -> `IdCliente`
--   `IdPago`
--       `forma_pago` -> `IdPago`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 29-11-2014 a las 16:42:50
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(80) NOT NULL,
  `NIF` varchar(9) NOT NULL,
  `Telefono` int(9) DEFAULT NULL,
  `Bloqueado` tinyint(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `Revisado` int(11) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
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
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`IdCliente`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_Libros_Idiomas` FOREIGN KEY (`IdIdioma`) REFERENCES `idioma` (`IdIdioma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Libros_Editoriales` FOREIGN KEY (`IdEditorial`) REFERENCES `editorial` (`IdEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD CONSTRAINT `fk_Autores_Libro_Libros1` FOREIGN KEY (`IdLibro`) REFERENCES `libro` (`IdLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Autores_Libro_Autores1` FOREIGN KEY (`IdAutor`) REFERENCES `autor` (`IdAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD CONSTRAINT `fk_Categorias_Libro_Libros1` FOREIGN KEY (`IdLibro`) REFERENCES `libro` (`IdLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Categorias_Libro_Categorias1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `linea`
--
ALTER TABLE `linea`
  ADD CONSTRAINT `fk_linea-pedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`IdPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_linea-libro` FOREIGN KEY (`IdLibro`) REFERENCES `libro` (`IdLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido-estado` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido-cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido-forma_pago` FOREIGN KEY (`IdPago`) REFERENCES `forma_pago` (`IdPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
