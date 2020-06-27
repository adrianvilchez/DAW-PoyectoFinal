-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2020 a las 12:01:30
-- Versión del servidor: 8.0.19
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yourband`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idUsuario` int NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `titulo`, `descripcion`, `idUsuario`, `fecha`) VALUES
(1, 'Busco Batería', 'Busco batería con experiencia', 6, '0000-00-00 00:00:00'),
(2, 'asdasda', 'sadghfsgsFDSGf', 7, '2020-05-20 14:50:22'),
(3, 'SFGHGJKDSDGSFD', 'SDFGDGDHGJKDSHADGSFADfgcvhkjblhgdgsfashdgfxj', 1, '2020-05-28 14:50:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `idGenero` int NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(2083) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`idGenero`, `genero`, `imagen`) VALUES
(1, 'Rock', 'img/generos/Rock-icon.png'),
(2, 'Indie', 'img/generos/Disco-icon.png'),
(3, 'Pop', 'img/generos/Pop-icon.png'),
(4, 'Heavy Metal', 'img/generos/Heavy-Metal-icon.png'),
(5, 'Techno', 'img/generos/Techno-icon.png'),
(6, 'Dance', 'img/generos/Dance-icon.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idGrupo` int NOT NULL,
  `nombreGrupo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `generoGrupo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Indie',
  `descripcion` varchar(400) DEFAULT NULL,
  `numeroIntegrantes` int NOT NULL,
  `cp` int NOT NULL,
  `avatarGrupo` varchar(2083) NOT NULL DEFAULT 'http://localhost/DAW-PoyectoFinal/img/default_group.png',
  `estaCompleto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `nombreGrupo`, `generoGrupo`, `descripcion`, `numeroIntegrantes`, `cp`, `avatarGrupo`, `estaCompleto`) VALUES
(1, 'Putilatex', 'Rock', 'Grupo subnorpop originario de albacete, buscamos mecenas que nos apoye..', 5, 46910, 'http://localhost/DAW-ProyectoFinal/img/default_group.png', 1),
(3, 'Cantaflores', 'Pop', 'Somos un grupo de Pop, comenzamos allá por el 2013 y estamos en busca de nuevos integrantes!', 4, 46440, 'http://localhost/DAW-ProyectoFinal/img/default_group.png', 0),
(23, 'The Pepinillos', 'Indie', 'Buscamos batería con experiencia, no descartamos otras opciones, contacta!', 5, 46910, 'http://localhost/DAW-ProyectoFinal/img/default_group.png', 0),
(52, 'Pacman', 'Techno', 'Ey! Pacman busca teclista electrónico con experiencia en mezclas.', 5, 46910, 'http://localhost/DAW-ProyectoFinal/img/default_group.png', 1),
(58, 'Archero', 'Rock', 'Actualmente no buscamos integrantes pero si tienes alguna propuesta puedes ponerte en contacto con nosotros.', 3, 46910, 'http://localhost/DAW-ProyectoFinal/img/default_group.png', 1),
(171, 'Tribunal', 'Techno', 'Los del Tribunal', 4, 46200, '0', 0),
(173, 'xcvfdfdsxdvsdfsdsfsd', 'Rock', 'mkbljhbk', 2, 2, '0', 0),
(174, 'asdasasd', 'Rock', 'dfesdfsdf', 2, 2, '0', 0),
(176, 'fghfv', 'Rock', 'vhfdgdd', 2, 2, '0', 0),
(177, 'm hhmh mh', 'Indie', ' gng g ngnhg', 2, 2, '0', 0),
(179, 'sadasdasdsad', 'Rock', 'asdasdasdsad', 2, 2, '0', 0),
(180, 'sadasdas', 'Rock', 'sadasdsad', 2, 2, '0', 0),
(181, 'daasdad', 'Indie', 'sadasdadssa', 2, 2, '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `idInstrumento` int NOT NULL,
  `nombreInstrumento` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoInstrumento` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`idInstrumento`, `nombreInstrumento`, `tipoInstrumento`) VALUES
(1, 'matasuegras', 'viento'),
(3, 'Guitarra Eléctrica', 'Cuerda'),
(4, 'Bajo', 'Cuerda'),
(5, 'Batería', 'Percusión'),
(6, 'Guitarra Acústica', 'Cuerda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `idIntegrante` int NOT NULL,
  `idUsuarioInstrumento` int NOT NULL,
  `idGrupo` int NOT NULL,
  `habilidad` int DEFAULT NULL,
  `experiencia` int DEFAULT NULL,
  `lider` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`idIntegrante`, `idUsuarioInstrumento`, `idGrupo`, `habilidad`, `experiencia`, `lider`) VALUES
(43, 1, 52, NULL, NULL, 1),
(44, 6, 58, NULL, NULL, 0),
(45, 252, 52, NULL, NULL, 0),
(46, 252, 1, NULL, NULL, 0),
(63, 57, 1, 2, 2, 1),
(64, 69, 3, 2, 3, 1),
(65, 57, 23, 4, 4, 1),
(68, 1, 1, 5, 5, 0),
(69, 69, 180, NULL, NULL, 1),
(70, 69, 181, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `idPeticion` int NOT NULL,
  `idUsuarioRecepcion` int NOT NULL,
  `idUsuarioPeticion` int NOT NULL,
  `idGrupo` int NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`idPeticion`, `idUsuarioRecepcion`, `idUsuarioPeticion`, `idGrupo`, `estado`) VALUES
(21, 69, 1, 3, 0),
(22, 69, 6, 3, 0),
(23, 57, 69, 23, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblaciones`
--

CREATE TABLE `poblaciones` (
  `idPoblacion` int NOT NULL,
  `cp` int NOT NULL,
  `nombreMunicipio` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `poblaciones`
--

INSERT INTO `poblaciones` (`idPoblacion`, `cp`, `nombreMunicipio`) VALUES
(1, 46910, 'Sedaví'),
(2, 46910, 'Alfafar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasenya` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `cp` int DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `avatar` varchar(2083) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'img/default_user.png',
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `contrasenya`, `descripcion`, `cp`, `email`, `telefono`, `avatar`, `admin`) VALUES
(1, 'adrian', '1234', 'Prueba de impresión', 46910, 'avilchez758@gmail.com', 603227429, 'img/adrian.jpg', 1),
(6, 'brian', 'briana', 'Me interesa mucho el estilo musical Indie y estaría dispuesto a ensayar.', 46940, 'illipillocillo@gmail.com', 628526974, 'img/default_user.png', 0),
(57, 'JeanReno', 'jean', 'Recien venido de Francia con ganas de tocar algo de musica!', 46963, 'jean@gmail.com', 654565455, 'img/default_user.png', 0),
(69, 'sebastian', '123', 'Contactadme si os interesa el género Techno!', 49904, 'sebastiansanjuan86@gmail.com', 696587452, 'img/default_user.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosinstrumentos`
--

CREATE TABLE `usuariosinstrumentos` (
  `idUsuarioInstrumento` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idInstrumento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuariosinstrumentos`
--

INSERT INTO `usuariosinstrumentos` (`idUsuarioInstrumento`, `idUsuario`, `idInstrumento`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 6, 1),
(14, 1, 4),
(15, 1, 5),
(16, 1, 6),
(17, 1, 3),
(18, 252, 6),
(19, 255, 5),
(20, 1, 1),
(21, 1, 1),
(22, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idGenero`),
  ADD UNIQUE KEY `genero` (`genero`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`),
  ADD UNIQUE KEY `nombreGrupo` (`nombreGrupo`),
  ADD KEY `generos-grupos` (`generoGrupo`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`idInstrumento`),
  ADD UNIQUE KEY `nombreInstrumento` (`nombreInstrumento`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`idIntegrante`),
  ADD UNIQUE KEY `idUsuarioInstrumento_2` (`idUsuarioInstrumento`,`idGrupo`),
  ADD KEY `idUsuarioInstrumento` (`idUsuarioInstrumento`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`idPeticion`),
  ADD UNIQUE KEY `idUsuarioRecepcion` (`idUsuarioRecepcion`,`idUsuarioPeticion`,`idGrupo`),
  ADD KEY `idGrupo` (`idGrupo`),
  ADD KEY `idUsuarioPeticion` (`idUsuarioPeticion`);

--
-- Indices de la tabla `poblaciones`
--
ALTER TABLE `poblaciones`
  ADD PRIMARY KEY (`idPoblacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `nombre_2` (`nombre`);

--
-- Indices de la tabla `usuariosinstrumentos`
--
ALTER TABLE `usuariosinstrumentos`
  ADD PRIMARY KEY (`idUsuarioInstrumento`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idInstumento` (`idInstrumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `idGenero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idGrupo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `idInstrumento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `idIntegrante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `idPeticion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `poblaciones`
--
ALTER TABLE `poblaciones`
  MODIFY `idPoblacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT de la tabla `usuariosinstrumentos`
--
ALTER TABLE `usuariosinstrumentos`
  MODIFY `idUsuarioInstrumento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `generos-grupos` FOREIGN KEY (`generoGrupo`) REFERENCES `generos` (`genero`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrante_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`idUsuarioInstrumento`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticiones_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peticiones_ibfk_2` FOREIGN KEY (`idUsuarioPeticion`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peticiones_ibfk_3` FOREIGN KEY (`idUsuarioRecepcion`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariosinstrumentos`
--
ALTER TABLE `usuariosinstrumentos`
  ADD CONSTRAINT `usuarioinstrumento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `usuarioinstrumento_ibfk_2` FOREIGN KEY (`idInstrumento`) REFERENCES `instrumentos` (`idInstrumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
