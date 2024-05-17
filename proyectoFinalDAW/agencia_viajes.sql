-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia_viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Bruselas', 'Bruselas es la capital de Bélgica, conocida por su arquitectura histórica y su deliciosa comida.', 400),
(2, 'Islandia', 'Islandia es un país insular europeo conocido por su impresionante paisaje volcánico y sus aguas termales.', 600),
(3, 'Londres', 'Londres es la capital del Reino Unido, una ciudad cosmopolita con una rica historia y una vibrante escena cultural.', 550),
(4, 'Noruega', 'Noruega es un país escandinavo conocido por sus impresionantes fiordos, montañas y auroras boreales.', 700),
(5, 'Paris', 'París es la capital de Francia, famosa por su arte, su moda, su gastronomía y sus emblemáticos monumentos como la Torre Eiffel y el Louvre.', 500),
(6, 'Roma', 'Roma es la capital de Italia y una ciudad antigua con una rica historia, arte y arquitectura.', 480);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favoritos` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id_suscriptor` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suscripciones`
--

INSERT INTO `suscripciones` (`id_suscriptor`, `email`) VALUES
(1, 'prueba@email.com'),
(2, 'srodrcal@myuax.com'),
(8, 'sheilaroguez24@gmail.com'),
(9, 'sheilaroguez24@gmail.com'),
(10, 'unrayodesol2010@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`,`email`, `pass`) VALUES
(1,'Prueba', 'prueba@email.com', '123123'),
(2,'Sheila', 'rc_sheila@hotmail.com', '123123'),
(3,'Borja', 'diazrodriguezborja@gmail.com', '123123'),
(5,'Pepito', 'pepito@pepito.com', '123123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favoritos`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_destino` (`id_destino`);


--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id_suscriptor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favoritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id_suscriptor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id`);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
