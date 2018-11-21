-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 17:38:17
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
-- Estructura de tabla para la tabla `lista_libro`
--

CREATE TABLE `lista_libro` (
  `idLista` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_libro`
--
ALTER TABLE `lista_libro`
  ADD PRIMARY KEY (`idLista`,`idLibro`),
  ADD KEY `fk_lista_libro_libro` (`idLibro`);

--
-- Restricciones para tablas volcadas
--

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
