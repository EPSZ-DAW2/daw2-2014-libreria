-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2014 a las 13:03:05
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

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `fk_authassignment-usuario_idx` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', 2, NULL, 'N;'),
('cliente', 3, NULL, 'N;'),
('gerente', 6, NULL, 'N;'),
('libreria', 5, NULL, 'N;'),
('sysadmin', 1, NULL, 'N;'),
('vendedor', 4, NULL, 'N;');

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

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('cliente', 2, '', NULL, 'N;'),
('gerente', 2, '', NULL, 'N;'),
('libreria', 2, '', NULL, 'N;'),
('sysadmin', 2, '', NULL, 'N;'),
('vendedor', 2, '', NULL, 'N;');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`IdAutor`, `Nombre`, `IdNacionalidad`, `Web`) VALUES
(1, 'John Ronald Reuel Tolkien', 10, NULL),
(2, 'Eme-Agra Fagúndez', 2, NULL),
(3, 'Ana María Matute', 2, 'www.clubcultura.com/clubliteratura/clubescritores/matute'),
(4, 'Gabriel Garcia Marquez', 14, NULL),
(5, 'Ramón Ybarra Rubio', 2, NULL),
(6, 'Emma Heyderman', 10, NULL),
(7, 'Peter May', 10, NULL),
(8, 'Patrick Rothfuss', 9, NULL),
(9, 'Dan Brown', 9, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`IdEditorial`, `Nombre`, `Web`) VALUES
(1, 'PLAZA & JANES EDITORES', 'www.megustaleer.com/sello/PJ/plaza-janes'),
(2, 'PLANETA', 'www.planetadelibros.com/editorial-editorial-planeta-8.html'),
(3, 'MINOTAURO', 'www.planetadelibros.com/seleccion-editorial-comunidad-fantasy-56.html'),
(4, 'BURLINGTON BOOKS', 'www.burlingtonbooks.com/Spain'),
(5, 'CAMBRIDGE UNIVERSITY PRESS', 'www.cambridge.org');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`IdIdioma`, `Nombre`) VALUES
(1, 'CASTELLANO'),
(2, 'INGLÉS');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`IdLibro`, `ISBN`, `IdEditorial`, `Titulo`, `Edicion`, `Paginas`, `Formato`, `IdIdioma`, `Resumen`, `Precio`, `Stock`) VALUES
(1, '9788401337208', 1, 'EL NOMBRE DEL VIENTO', '2011', 880, 'PAPEL', 1, 'El librero recomienda El nombre del viento ?Una increíble historia que sumergirá al lector en un mundo fantástico ambientado a la perfección. Rothfuss, renueva el término ?Fantasía épica? y la lleva a un nivel personal donde seremos el protagonista de la aventura?. (Jesús García Fernández, Librería de Málaga ) "Patri ck Rothfuss me recuerda a Ursula K. Le Guin, George R.R. Martin y J. R. R. Tokien, pero en ningún momento he sentido que estuviera imitándolos. Sin duda El nombre del viento se convertirá en un clásico". The Times "El nombre del viento es una de las mejores historias contadas en cualquier tipo de medio durante la última década... Colóquelo en la estantería al lado de El señor de los Anillos". A. V. Club. "Este es el tipo de primera novela que la mayoría de los autores tan solo puede soñar con escribir. El universo de la literatura tiene una nueva estrella".', 22, 50),
(2, '9788499899619', 1, 'EL TEMOR DE UN HOMBRE SABIO', '2011', 1200, 'PAPEL', 1, 'Músico, mendigo, ladrón, estudiante, mago, héroe y asesino. Kvothe es un personaje legendario, el héroe o el villano de miles de historias que circulan entre la gente. Todos le dan por muerto, cuando en realidad se ha ocultado con un nombre falso en una aldea perdida. Allí simplemente es el taciturno dueño de Roca de Guía, una posada en el camino. Hasta que hace un día un viajero llamado Cronista le reconoció y le suplicó que le revelase su historia, la auténtica, la que deshacía leyendas y rompía mitos, la que mostraba una verdad que sólo Kvothe conocía. A lo que finalmente Kvothe accedió, con una condición: había mucho que contar, y le llevaría tres días. Es la mañana del segundo día, y tres hombres se sientan a una mesa de Roca de Guía: un posadero de cabello rojo como una llama, su pupilo Bast y Cronista, que moja la pluma en el tintero y se prepara a transcribir... El temor de un hombre sabio empieza donde terminaba El nombre del viento: en la Universidad. De la que luego Kvothe se verá obligado a partir en pos del nombre del viento, en pos de la aventura, en pos de esas historias que aparecen en libros o se cuentan junto a una hoguera del camino o en una taberna, en pos de la antigua orden de los caballeros Amyr y, sobre todo, en pos de los Chandrian. Su viaje le lleva a la corte plagada de intrigas del maer Alveron en el reino de Vintas, al bosque de Eld en persecución de unos bandidos, a las colinas azotadas por las tormentas que rodean la ciudad de Ademre, a los confines crepusculares del reino de los Fata. Y cada vez parece que tiene algo más cerca la solución del misterio de los Chandrian, y su venganza.', 23, 30),
(3, '9788408096146', 2, 'EL CODIGO DA VINCI', '2010', 536, 'PAPEL', 1, 'Robert Langdon, experto en simbología, recibe una llamada en mitad de la noche: el conservador del museo del Louvre ha sido asesinado en extrañas circunstancias, y junto a su cadáver ha aparecido un desconcertante mensaje cifrado. Al profundizar en la investigación, Langdom descubre que las pistas conducen a las obras de Le onardo Da Vinci? y que están a la vista de todos, ocultas por el ingenio del pintor. Langdon une esfuerzos con la criptóloga francesa Sophie Neveu y descubre que el conservador del museo pertenecía al Priorato de Sión, una sociedad que a lo largo de los siglos ha contado con miembros tan destacados como Sir Isaac Newton, Botticelli, Victor Hugo o el propio Da Vinci, y que ha velado por mantener en secreto una sorprendente verdad histórica. Una mezcla trepidante de aventuras, intrigas vaticanas, simbología y enigmas cifrados que provocó una extraordinaria polémica al poner en duda algunos de los dogmas sobre los que se asienta la iglesia católica. Una mezcla trepidante de aventuras, intrigas vaticanas, simbología y enigmas cifrados que provocó una extraordinaria polémica al poner en duda algunos de los dogmas sobre los que se asienta la iglesia católica.', 18, 15),
(4, '9788408099239', 2, 'ANGELES Y DEMONIOS', '2011', 656, 'PAPEL', 1, 'En un laboratorio de máxima seguridad, aparece asesinado un científico con un extraño símbolo grabado a fuego en su pecho. Para Robert Langdon no hay duda: los Illuminati, los hombres enfrentados a la Iglesia desde los tiempos de Galileo, han regresado. Y esta vez disponen de la más mortífera arma que ha creado la humanidad . Acompañado de una joven científica y un audaz capitán de la Guardia Suiza, Langdon comienza una carrera contra reloj, en unabúsqueda desesperada por los rincones más secretos del Vaticano.', 9, 30),
(5, '9788445000663', 3, 'EL SEÑOR DE LOS ANILLOS I: LA COMUNIDAD DEL ANILLO ', '2012', 576, 'PAPEL', 1, 'En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y se internará en las sombras de Mordor, perseguido siempre por las huestes de Sauron, el Señor Oscuro, dispuesto a recuperar su creación para establecer el dominio definitivo del Mal.', 10, 20),
(6, '9788445000670', 3, 'EL SEÑOR DE LOS ANILLOS II: LAS DOS TORRES ', '2012', 480, 'PAPEL', 1, 'La Compañía se ha disuelto y sus integrantes emprenden caminos separados. Frodo y Sam continúan solos su viaje a lo largo del río Anduin, perseguidos por la sombra misteriosa de un ser extraño que también ambiciona la posesión del Anillo. Mientras, hombres, elfos y enanos se preparan para la batalla final contra las fuerzas del Señor del Mal.', 10, 5),
(7, '9788445073742', 3, 'EL SEÑOR DE LOS ANILLOS III: EL RETORNO DEL REY', '2002', 520, 'PAPEL', 1, 'Ningún escritor del género ha aprovechado tanto como Tolkien las propiedades características de la Misión, el viaje heroico, el Objeto Numinoso, satisfaciendo nuestro sentido de la realidad histórica y social... Tolkien ha triunfado donde fracasó Milton. -- W. H. Auden Ecologista avant-la-lettre, Tolkien adora los árboles, los cielos, los ríos, la luz.', 19, 12),
(8, '9789963468980', 4, 'FOREIGNER IN NEW YORK', '2003', 81, 'PAPEL', 2, '', 10, 15),
(9, '9780521741361', 5, 'COMPLETE PET STUDENT S BOOK WITH ANSWERS WITH CD-ROM', '2010', 239, 'PAPEL', 2, 'Informed by the Cambridge Learner Corpus, and providing an official PET past exam paper from Cambridge ESOL, Complete PET is the most authentic exam preparation course available. Each unit of the Students Book covers one part of each PET paper and provides thorough exam practice. Grammar and vocabulary exercises target areas that cause most problems for PET candidates, based on data from the Cambridge Learner Corpus, taken from real candidate scripts. The CD-ROM provides additional exam-style practice. A Students Book without answers with CD-ROM, a Teachers Book, Workbooks (with and without answers) and Class Audio CDs are also available.', 36, 22);

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

--
-- Volcado de datos para la tabla `libro_autor`
--

INSERT INTO `libro_autor` (`IdLibro`, `IdAutor`) VALUES
(1, 8),
(2, 8),
(3, 9),
(4, 9),
(5, 1),
(6, 1),
(7, 1),
(8, 5),
(9, 3),
(9, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Email`, `Password`, `Nombre`, `Apellidos`, `NIF`, `Telefono`, `Bloqueado`, `FechaRegistro`, `Revisado`) VALUES
(1, 'sysadmin', 'sysadmin', 'Usuario de Prueba "sysadmin"', 'Apellidos de "sysadmin"', '123400000', 123456789, 0, '2014-12-21 11:53:27', 1),
(2, 'admin', 'admin', 'Usuario de Prueba "admin"', 'Apellidos de "admin"', '123400001', 123456789, 0, '2014-12-21 11:53:27', 1),
(3, 'cliente', 'cliente', 'Usuario de Prueba "cliente"', 'Apellidos de "cliente"', '123400002', 123456789, 0, '2014-12-21 11:53:27', 1),
(4, 'vendedor', 'vendedor', 'Usuario de Prueba "vendedor"', 'Apellidos de "vendedor"', '123400003', 123456789, 0, '2014-12-21 11:53:27', 1),
(5, 'libreria', 'libreria', 'Usuario de Prueba "libreria"', 'Apellidos de "libreria"', '123400004', 123456789, 0, '2014-12-21 11:53:27', 1),
(6, 'gerente', 'gerente', 'Usuario de Prueba "gerente"', 'Apellidos de "gerente"', '123400005', 123456789, 0, '2014-12-21 11:53:27', 1);

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
