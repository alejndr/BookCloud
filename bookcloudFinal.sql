-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 08:36:19
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookcloud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `autor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `autor`) VALUES
(2, 'Brian Herbert'),
(3, 'Jennifer Marks'),
(4, 'Frank Herbert'),
(5, 'Terry Pratchett');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `critica`
--

CREATE TABLE `critica` (
  `idCritica` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `critica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
(1, 'Fiction'),
(2, 'Juvenile Nonfiction'),
(3, 'Education'),
(4, 'Discworld (Imaginary place)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `puntuacion` tinyint(4) DEFAULT NULL,
  `sinopsis` varchar(500) DEFAULT NULL,
  `portada` varchar(255) NOT NULL,
  `paginas` int(6) DEFAULT NULL,
  `compra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `titulo`, `fecha`, `isbn`, `puntuacion`, `sinopsis`, `portada`, `paginas`, `compra`) VALUES
(243, 'El mesÃ­as de Dune (Dune 2)', '2017-07-06', '8466342672', NULL, 'El mesÃ­as de Dune es la segunda entrega de la excepcional saga de Frank Herbert Â«DuneÂ», considerada la mejor serie de ciencia ficciÃ³n de todos los tiempos. Arrakis, tambiÃ©n llamado Dune: un mundo desierto en pos del sueÃ±o de convertirse en un paraÃ­so, cuna de mil guerras que se han extendido por todo el universo y de un anhelo mesiÃ¡nico que intenta alcanzar el sueÃ±o mÃ¡s antiguo de la humanidad... Paul Atreides: un personaje mÃ­tico, perturbado por la cercana presencia de una sombra dom', 'http://books.google.com/books/content?id=Q5HCDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=Q5HCDgAAQBAJ&rdid=book-Q5HCDgAAQBAJ&rdot=1&source=gbs_api'),
(244, 'Dune (Dune 1)', '2017-07-06', '8466342664', NULL, 'Dune es la primera novela de la serie homÃ³nima Â«DuneÂ» de Frank Herbert, una obra maestra unÃ¡nimemente reconocida como la mejor saga de ciencia ficciÃ³n de todos los tiempos. Arrakis: un planeta desÃ©rtico donde el agua es el bien mÃ¡s preciado y, donde llorar a los muertos es el sÃ­mbolo de mÃ¡xima prodigalidad. Paul Atreides: un adolescente marcado por un destino singular, dotado de extraÃ±os poderes y, abocado a convertirse en dictador, mesÃ­as y mÃ¡rtir. Los Harkonnen: personificaciÃ³n de', 'http://books.google.com/books/content?id=aJHCDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 701, 'https://play.google.com/store/books/details?id=aJHCDgAAQBAJ&rdid=book-aJHCDgAAQBAJ&rdot=1&source=gbs_api'),
(245, 'Hijos de Dune (Dune 3)', '2017-07-06', '8466342680', NULL, 'Hijos de Dune es la tercera novela de la serie Â«DuneÂ» de Frank Herbert, una obra maestra unÃ¡nimemente reconocida como la mejor saga de ciencia ficciÃ³n de todos los tiempos. Leto Atreides, el hijo de Paul -el mesÃ­as de una religiÃ³n que arrasÃ³ el universo, el mÃ¡rtir que, ciego, se adentrÃ³ en el desierto para morir-, tiene ahora nueve aÃ±os. Pero es mucho mÃ¡s que un niÃ±o, porque dentro de Ã©l laten miles de vidas que lo arrastran a un implacable destino. Ã‰l y su hermana gemela, bajo la ', 'http://books.google.com/books/content?id=15HCDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=15HCDgAAQBAJ&rdid=book-15HCDgAAQBAJ&rdot=1&source=gbs_api'),
(246, 'Herejes de Dune (Dune 5)', '2017-07-06', '8466342699', NULL, 'Herejes de Dune es la quinta novela de la serie Â«DuneÂ» de Frank Herbert, considerada la cumbre de la ciencia ficciÃ³n contemporÃ¡nea. Esta quinta entrega de la serie prosigue con las aventuras de la estirpe de los Atreides en el fascinante planeta de arena. Nos hallamos en el futuro respecto a la acciÃ³n de Dios emperador de Dune. La expansiÃ³n galÃ¡ctica que siguiÃ³ a la muerte de Leto ha terminado. Todos regresan al planeta madre, convertido de nuevo en el mundo inhÃ³spito y seco de sus orÃ­', 'http://books.google.com/books/content?id=spHCDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=spHCDgAAQBAJ&rdid=book-spHCDgAAQBAJ&rdot=1&source=gbs_api'),
(247, 'Casa Capitular (Dune 6)', '2017-07-06', '8466342702', NULL, 'Sexta entrega de la extraordinaria saga Â«DuneÂ», Casa Capitular abre insÃ³litas dimensiones a na narraciÃ³n que estÃ¡ considerada la cumbre de la ciencia ficciÃ³n contemporÃ¡nea. Las Honorables Madres se enfrentan, con sus terribles poderes, a la secular Bene Gesserit. Las revenidas Madres, ocultas y fortificadas en su planeta Casa Capitular, intentan revivir el viejo orden que les dio su antiguo poder en todo el universo. Un ghola de Miles Teg estÃ¡ siendo adiestrado para superar incluso a su ', 'http://books.google.com/books/content?id=8NfCDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=8NfCDgAAQBAJ&rdid=book-8NfCDgAAQBAJ&rdot=1&source=gbs_api'),
(248, 'Dune', '2012-03-30', '8490180148', NULL, 'Dune relata la historia del planeta desÃ©rtico Arrakis, Ãºnica fuente de melange, la especia necesaria para el viaje interestelar y que ademÃ¡s garantiza longevidad y poderes psÃ­quicos. La administraciÃ³n de Arrakis es transferida por el emperador de la noble Casa de Harkonnen a la Casa Atreides. Los primeros no quieren abandonar sus privilegios, y a travÃ©s de traiciones y sabotajes, destierran al joven duque Paul Atreides al duro entorno del planeta para que muera. Pero Paul podrÃ­a resultar ', 'http://books.google.com/books/content?id=2ClNyY6oG84C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=2ClNyY6oG84C&rdid=book-2ClNyY6oG84C&rdot=1&source=gbs_api'),
(249, 'Buggies Para Arena/Dune Buggies', '2006-09-01', '9780736877282', NULL, 'Simple text and photographs describe dune buggies, their design, and uses.', 'http://books.google.com/books/content?id=txKa-giMopkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 32, ''),
(250, 'MesÃ­as de Dune', '0000-00-00', '9788498006810', NULL, 'Arrakis es un mundo desierto, en pos del sueÃ±o de convertirse en un paraÃ­so, y cuna de mil guerras que se han extendido por todo el universo. Paul Atreides, proclamado doce aÃ±os antes gobernante de los fremen mediante una guerra santa, es un personaje perturbado por la sombra dominante de su hermana Alia y por el culto a su propia persona y mito. Frente a Ã©l se hallan los grandes intereses econÃ³micos, polÃ­ticos y religiosos que sacuden las esferas de influencia del hombre: la CHOAM, la Cof', 'http://books.google.com/books/content?id=PR3xtgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 312, ''),
(251, 'Mascarada (Mundodisco 18)', '2011-02-04', '8401347599', NULL, 'El mejor espectÃ¡culo nocturno del Mundodisco de Terry Pratchett. Las brujas del pequeÃ±o reino de Lancre tienen el siguiente problema: solamente son dos. Y un aquelarre compuesto por Yaya Ceravieja y Tata Ogg siempre es una discusiÃ³n inacabable y un dolor de cabeza, por no decir que ninguna de las dos sabe hacer bien las tostadas. Pero ya tienen en mente una candidata para hacer de tercera bruja... candidata que, por desgracia, se ha marchado a la gran ciudad. Concretamente a la Ã“pera de Ankh', 'http://books.google.com/books/content?id=EHl9ikNggsAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=EHl9ikNggsAC&rdid=book-EHl9ikNggsAC&rdot=1&source=gbs_api'),
(252, 'Snuff (Mundodisco 39)', '2013-01-17', '8401354633', NULL, 'Vuelve el universo fantÃ¡stico de Mundodisco. Incluso cuando se va de vacaciones, el comandante Sam Vimes demuestra ser un policÃ­a hasta la mÃ©dula. Lady Sybil ha conseguido por fin convencer a su marido, Sam Vimes, el comandante de la Guardia de Ankh-Morpork, de tomarse unas vacaciones. Pero conforme ella planifica unos merecidos dÃ­as de descanso en el campo, Ã©l hace lo imposible para no abandonar su despacho. Â¿El problema? El urbanita Vimes odia el campo: tanto aire fresco, tanto cantar de', 'http://books.google.com/books/content?id=x7AfmMziPyIC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=x7AfmMziPyIC&rdid=book-x7AfmMziPyIC&rdot=1&source=gbs_api'),
(253, 'PerillÃ¡n', '2014-07-03', '8415831463', NULL, 'En esta maravillosa novela para jÃ³venes y adultos, Terry Pratchett enlaza acontecimientos histÃ³ricos y elementos fantÃ¡sticos para ofrecernos una original historia de intriga y aprendizaje que rinde homenaje a la obra de Charles Dickens. PerillÃ¡n es un muchacho de diecisiete aÃ±os que sobrevive buscando objetos de valor en las cloacas del Londres victoriano. Tras una reyerta en la que defiende a una joven de un par de rufianes violentos, un periodista que responde al nombre de Charles Dickens', 'http://books.google.com/books/content?id=LqKpAwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 400, 'https://play.google.com/store/books/details?id=LqKpAwAAQBAJ&rdid=book-LqKpAwAAQBAJ&rdot=1&source=gbs_api'),
(254, 'Ritos Iguales (Mundodisco 3)', '2011-05-13', '8499086446', NULL, 'Humor y aventuras en esta nueva aventura de Mundodisco. Un mago moribundo cede su bastÃ³n -y por tanto su poder- a Eskarina, un reciÃ©n nacido que, segÃºn los rituales admitidos, no puede ser mago sino bruja. Con el tiempo, el rito de iniciaciÃ³n se completa con un aprendizaje mÃ¡s formal en la Universidad Invisible, inefable centro de estudios esotÃ©ricos, donde el mago SimÃ³n hace gala de sus increÃ­bles poderes. Juntos, Eskarina y SimÃ³n tendrÃ¡n que hacer frente a una invasiÃ³n de extraÃ±as ', 'http://books.google.com/books/content?id=_cQzol3L3lMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 267, 'https://play.google.com/store/books/details?id=_cQzol3L3lMC&rdid=book-_cQzol3L3lMC&rdot=1&source=gbs_api'),
(257, 'Hombres de Armas (Mundodisco 15)', '2011-02-18', '8401339898', NULL, 'Siguen las aventuras increÃ­bles en Mundodisco. Â«Â¡SÃ© un HOMBRE en la Guardia de la Ciudad! Â¡La Guardia de la Ciudad necesita HOMBRES!Â» Hasta ahora, sin embargo, la Guardia Nocturna solo cuenta con el cabo Zanahoria (tÃ©cnicamente un enano), el agente Cuddy (realmente un enano), el agente Detritus (un troll), la agente Angua (una mujer... la mayor parte del tiempo) y el cabo Nobbs (descalificado de la carrera evolutiva por hacer trampas). Y necesitan toda la ayuda que puedan conseguir. Porqu', 'http://books.google.com/books/content?id=FdLtzKYstQAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=FdLtzKYstQAC&rdid=book-FdLtzKYstQAC&rdot=1&source=gbs_api'),
(259, 'ImÃ¡genes en AcciÃ³n (Mundodisco 10)', '2011-01-14', '8499890199', NULL, 'Una nueva y fascinante aventura del Mundodisco. Los alquimistas del Mundodisco estÃ¡n haciendo de las suyas nuevamente. Esta vez han descubierto el secreto para obtener oro de la plata... o, mejor dicho, de la pantalla plateada. Y siguiendo el canto de sirena de Holly Wood estarÃ¡ Victor Tugelbend, un proyecto de mago reconvertido a figurante. No canta, no baila, pero sabe manejar la espada (un poco) y ahora quiere ser famoso. TambiÃ©n acudirÃ¡ Theda Wuthel, una mujer ambiciosa proveniente de un', 'http://books.google.com/books/content?id=YpED1ARHR2oC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, 'https://play.google.com/store/books/details?id=YpED1ARHR2oC&rdid=book-YpED1ARHR2oC&rdot=1&source=gbs_api');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_autor`
--

CREATE TABLE `libro_autor` (
  `idLibro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_autor`
--

INSERT INTO `libro_autor` (`idLibro`, `idAutor`) VALUES
(243, 4),
(244, 4),
(245, 4),
(246, 4),
(247, 4),
(248, 4),
(249, 3),
(250, 4),
(251, 5),
(252, 5),
(253, 5),
(254, 5),
(257, 5),
(259, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_genero`
--

CREATE TABLE `libro_genero` (
  `idLibro` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_genero`
--

INSERT INTO `libro_genero` (`idLibro`, `idGenero`) VALUES
(243, 1),
(244, 1),
(245, 1),
(246, 1),
(247, 1),
(248, 1),
(249, 2),
(250, 3),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(257, 1),
(259, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `idLista` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`idLista`, `idUsuario`, `tipo`) VALUES
(1, 16, 1),
(2, 16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_libro`
--

CREATE TABLE `lista_libro` (
  `idLista` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lista_libro`
--

INSERT INTO `lista_libro` (`idLista`, `idLibro`) VALUES
(1, 248),
(1, 249),
(1, 252);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL DEFAULT 'default.png',
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`, `email`, `imagen`, `tipo`) VALUES
(16, 'Administrador', 'Adminez', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@adminez.admin', './default.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `critica`
--
ALTER TABLE `critica`
  ADD PRIMARY KEY (`idCritica`),
  ADD KEY `fk_critica_usuario` (`idUsuario`),
  ADD KEY `fk_critica_libro` (`idLibro`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD PRIMARY KEY (`idLibro`,`idAutor`),
  ADD KEY `fk_autor_libro_autor` (`idAutor`);

--
-- Indices de la tabla `libro_genero`
--
ALTER TABLE `libro_genero`
  ADD PRIMARY KEY (`idLibro`,`idGenero`),
  ADD KEY `fk_genero_libro_genero` (`idGenero`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`idLista`),
  ADD KEY `fk_lista_usuario` (`idUsuario`);

--
-- Indices de la tabla `lista_libro`
--
ALTER TABLE `lista_libro`
  ADD PRIMARY KEY (`idLista`,`idLibro`),
  ADD KEY `fk_lista_libro_libro` (`idLibro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `critica`
--
ALTER TABLE `critica`
  MODIFY `idCritica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `idLista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `critica`
--
ALTER TABLE `critica`
  ADD CONSTRAINT `fk_critica_libro` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`),
  ADD CONSTRAINT `fk_critica_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD CONSTRAINT `fk_autor_libro_autor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  ADD CONSTRAINT `fk_autor_libro_libro` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

--
-- Filtros para la tabla `libro_genero`
--
ALTER TABLE `libro_genero`
  ADD CONSTRAINT `fk_genero_libro_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`),
  ADD CONSTRAINT `fk_genero_libro_libro` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `fk_lista_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `lista_libro`
--
ALTER TABLE `lista_libro`
  ADD CONSTRAINT `fk_lista_libro_libro` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`),
  ADD CONSTRAINT `fk_lista_libro_lista` FOREIGN KEY (`idLista`) REFERENCES `lista` (`idLista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
