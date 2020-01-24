-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2020 a las 17:11:26
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
-- Base de datos: `searchband`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idGrupo` int NOT NULL,
  `nombreGrupo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numeroIntegrantes` int NOT NULL,
  `cp` int NOT NULL,
  `estaCompleto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `nombreGrupo`, `numeroIntegrantes`, `cp`, `estaCompleto`) VALUES
(1, 'Putilatex', 5, 46910, 1),
(2, 'Putilatex', 5, 46910, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `idInstumento` int NOT NULL,
  `nombreInstrumento` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoInstrumento` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Marca` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`idInstumento`, `nombreInstrumento`, `tipoInstrumento`, `Marca`, `Modelo`) VALUES
(1, 'matasuegras', 'viento', 'yamaha', 123),
(2, 'matasuegras', 'viento', 'yamaha', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `idIntegrante` int NOT NULL,
  `idUsuarioInstrumento` int NOT NULL,
  `idGrupo` int NOT NULL,
  `habilidad` int NOT NULL,
  `experiencia` int NOT NULL,
  `lider` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`idIntegrante`, `idUsuarioInstrumento`, `idGrupo`, `habilidad`, `experiencia`, `lider`) VALUES
(1, 1, 1, 5, 5, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblaciones`
--

CREATE TABLE `poblaciones` (
  `idPoblacion` int NOT NULL,
  `cp` int NOT NULL,
  `nombreMunicipio` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasenya` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cp` int NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `contrasenya`, `cp`, `email`, `telefono`) VALUES
(1, 'puta', '1234', 46910, 'asdf@asdf.com', 123456789),
(2, 'puta', '1234', 46910, 'asdf@asdf.com', 123456789),
(3, 'puton', 'putoncete', 46910, 'putonberbenero@gmail.com', 603227429),
(4, 'puton', 'putoncete', 46910, 'putonberbenero@gmail.com', 603227429);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosinstrumentos`
--

CREATE TABLE `usuariosinstrumentos` (
  `idUsuarioInstrumento` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idInstumento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuariosinstrumentos`
--

INSERT INTO `usuariosinstrumentos` (`idUsuarioInstrumento`, `idUsuario`, `idInstumento`) VALUES
(1, 1, 1),
(2, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`idInstumento`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`idIntegrante`),
  ADD KEY `idUsuarioInstrumento` (`idUsuarioInstrumento`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `poblaciones`
--
ALTER TABLE `poblaciones`
  ADD PRIMARY KEY (`idPoblacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuariosinstrumentos`
--
ALTER TABLE `usuariosinstrumentos`
  ADD PRIMARY KEY (`idUsuarioInstrumento`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idInstumento` (`idInstumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idGrupo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `idInstumento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `idIntegrante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `poblaciones`
--
ALTER TABLE `poblaciones`
  MODIFY `idPoblacion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuariosinstrumentos`
--
ALTER TABLE `usuariosinstrumentos`
  MODIFY `idUsuarioInstrumento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrante_ibfk_1` FOREIGN KEY (`idUsuarioInstrumento`) REFERENCES `usuariosinstrumentos` (`idUsuarioInstrumento`),
  ADD CONSTRAINT `integrante_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`);

--
-- Filtros para la tabla `usuariosinstrumentos`
--
ALTER TABLE `usuariosinstrumentos`
  ADD CONSTRAINT `usuarioinstrumento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `usuarioinstrumento_ibfk_2` FOREIGN KEY (`idInstumento`) REFERENCES `instrumentos` (`idInstumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
