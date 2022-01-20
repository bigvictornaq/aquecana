-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2022 a las 02:58:24
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `loginregister`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `IdDoc` int(11) NOT NULL,
  `Documento` varchar(260) NOT NULL,
  `url` varchar(200) NOT NULL,
  `idperiodo` int(11) NOT NULL,
  `año` varchar(100) NOT NULL,
  `semestre` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`IdDoc`, `Documento`, `url`, `idperiodo`, `año`, `semestre`) VALUES
(15, 'pdf_file', 'PDF-61e4a428843c86.61205250.pdf', 2, '2013', 2),
(16, 'pdf_file', 'PDF-61e6256ee39bb7.43456565.pdf', 2, '2015', 1),
(18, 'Actividad6.pdf', 'PDF-61e640376a8e30.83375506.pdf', 2, '2019', 1),
(19, 'Actividad6.pdf', 'PDF-61e64911884a91.67954356.pdf', 2, '2010', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL,
  `fecha_estipada` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `fecha_estipada`) VALUES
(1, 'ENE-JUN'),
(2, 'AGO-DEC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre_Completo` varchar(80) NOT NULL,
  `Perfil` varchar(260) NOT NULL,
  `Portada` varchar(260) NOT NULL,
  `Biografia` varchar(200) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Password` varchar(260) NOT NULL,
  `IdDoc` int(11) DEFAULT NULL,
  `IdRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre_Completo`, `Perfil`, `Portada`, `Biografia`, `Correo`, `Password`, `IdDoc`, `IdRol`) VALUES
(22, 'javier yair gonzalez ', 'IMG-61e856116ee223.33552020.jpg', 'IMG-61e855e3844b65.44895162.jpg', 'administrador de sistemas ', 'javier.yair78@gmail.com', '123', NULL, 1),
(23, 'correo de prueba', '', '', 'este correo es de prueba ', 'correo.prueba@gmail.com', '123', 15, 2),
(26, 'El navaBoy', '', '', '', 'cococo@gmail.com', '123', 16, 2),
(28, 'Goku', 'IMG-61e8b638136254.08868535.jpg', 'IMG-61e8ba3aede3f9.76353961.png', 'Hola', 'noob@goku.com', '123', NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`IdDoc`),
  ADD KEY `idperiodo` (`idperiodo`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDoc` (`IdDoc`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `IdDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`id_periodo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdDoc`) REFERENCES `documentos` (`IdDoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
