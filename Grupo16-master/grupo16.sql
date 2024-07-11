-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2024 a las 01:50:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo16`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `film2`
--

CREATE TABLE `film2` (
  `id` int(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `genero` int(100) NOT NULL,
  `director` varchar(80) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `film2`
--

INSERT INTO `film2` (`id`, `titulo`, `genero`, `director`, `sinopsis`) VALUES
(2, 'bad boys', 3, 'will smith', '    dos amigos que despues de años de ser compañeros en la policia se enfrentan a su peor desafio, limpiar el nombre de su ex jefe difunto.'),
(3, 'titanic', 3, 'James Cameron', '      Jake y rouse encuentran el amor en medio del crucero mas grande del mundo, pero una tragedia puede acortar la vida de este amor.'),
(4, 'pollitos en fuga', 4, ' Nick Park', 'En el corral las gallinas luchan dia a dia por escapar, un dia llega regi un pollo de circo, que les trae la solucion para volar lejos del corral.'),
(5, 'la bella y la bestia', 4, 'disney', 'la bella conoce a la bestia'),
(6, 'un dia de locos', 2, 'otro director', 'una sinopsis mas completa'),
(10, 'matrix recargado', 5, 'los hermanos', ' un mundo virtual en donde neo es el elegido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(100) NOT NULL,
  `nombre_genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre_genero`) VALUES
(1, 'comedia'),
(2, 'terror'),
(3, 'fantasia'),
(4, 'infantil'),
(5, 'drama'),
(6, 'romance'),
(7, 'policial'),
(8, 'documental');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `film2`
--
ALTER TABLE `film2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `film2`
--
ALTER TABLE `film2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `film2`
--
ALTER TABLE `film2`
  ADD CONSTRAINT `film2_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
