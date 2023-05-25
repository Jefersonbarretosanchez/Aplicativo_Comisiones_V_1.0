CREATE DATABASE IF NOT EXISTS comisiones CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
use comisiones;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sql_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alianzas`
--

DROP TABLE IF EXISTS `alianzas`;
CREATE TABLE IF NOT EXISTS `alianzas` (
  `id_alianza` int NOT NULL AUTO_INCREMENT,
  `codigo_alianza` int NOT NULL,
  `nombre_alianza` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_alianza`),
  UNIQUE KEY `indx_codigo` (`codigo_alianza`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alianzas`
--

INSERT INTO `alianzas` (`id_alianza`, `codigo_alianza`, `nombre_alianza`) VALUES
(2, 1123, 'UCSS'),
(5, 1126, 'UNINORTE'),
(16, 1120, 'UNE'),
(17, 1140, 'UNAB'),
(18, 1141, 'UNINORTE2'),
(27, 1119, 'UNIMINUTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesores`
--

DROP TABLE IF EXISTS `asesores`;
CREATE TABLE IF NOT EXISTS `asesores` (
  `id_asesor` int NOT NULL AUTO_INCREMENT,
  `id_campania` int NOT NULL,
  `cedula_asesor` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `antiguedad` int NOT NULL,
  `tipo_asesor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_asesor`),
  UNIQUE KEY `indx_clave` (`cedula_asesor`),
  KEY `indx_campania` (`id_campania`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asesores`
--

INSERT INTO `asesores` (`id_asesor`, `id_campania`, `cedula_asesor`, `nombre`, `antiguedad`, `tipo_asesor`, `created_at`, `updated_at`) VALUES
(1, 15, 1016098246, 'Pedro Barreto', 9, '2', '2023-04-11 01:10:59', '2023-04-14 21:10:26'),
(2, 15, 1016098248, 'Barreto Sanchez', 24, '2', '2023-04-11 01:11:05', '2023-04-11 03:51:26'),
(4, 15, 1016098245, 'Arturo Rojas', 2, '1', '2023-04-11 01:13:48', '2023-04-11 03:50:57'),
(5, 15, 1016098243, 'Andrea Castillo', 36, '2', '2023-04-11 03:57:14', '2023-04-11 03:57:14'),
(7, 16, 1016098244, 'Maria Sanchez', 7, '2', '2023-04-11 04:37:05', '2023-04-11 04:37:05'),
(13, 16, 1016098250, 'Juanita Rojas', 5, '2', '2023-04-11 06:55:54', '2023-04-11 06:55:54'),
(14, 18, 1016098249, 'Albeiro Castro', 3, '1', '2023-04-11 07:09:11', '2023-04-11 07:09:11'),
(16, 18, 1016098234, 'Daniel Reina ', 9, '2', '2023-04-12 03:22:49', '2023-04-14 21:27:04'),
(20, 16, 1016098220, 'Carlos Andres Rojas', 1, '1', '2023-04-25 15:02:21', '2023-04-25 15:02:21'),
(32, 15, 1016098223, 'Camilo Jesus Castillo', 3, '1', '2023-05-17 23:31:08', '2023-05-17 23:31:08'),
(40, 15, 1016098221, 'Jeferson Sanchez', 12, '1', '2023-05-17 23:32:32', '2023-05-17 23:32:32'),
(46, 99, 1016098110, 'Flor Nidia Garcia', 1, '1', '2023-05-19 15:54:45', '2023-05-19 15:54:45'),
(47, 103, 1016098111, 'CESAR DAVID PEÑA', 10, '2', '2023-05-20 23:57:08', '2023-05-20 23:57:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanias`
--

DROP TABLE IF EXISTS `campanias`;
CREATE TABLE IF NOT EXISTS `campanias` (
  `id_campania` int NOT NULL AUTO_INCREMENT,
  `id_alianza` int NOT NULL,
  `codigo_campania` int NOT NULL,
  `nombre_campania` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_campania`),
  UNIQUE KEY `indx_codigo` (`codigo_campania`),
  KEY `id_alianza` (`id_alianza`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `campanias`
--

INSERT INTO `campanias` (`id_campania`, `id_alianza`, `codigo_campania`, `nombre_campania`, `descripcion`) VALUES
(15, 27, 102030, 'Mayo', 'Campaña de Mayo'),
(16, 27, 102031, 'Abril', 'Campaña de Abril'),
(18, 27, 102032, 'Junio', 'Campaña de Junio'),
(91, 2, 102029, 'Marzo', 'Campaña del mes de Marzo del 2023'),
(92, 2, 102036, 'Enero', 'Campaña de Enero del 2023'),
(93, 2, 102037, 'Febrero-23', 'Campaña del mes de Febrero del 2023'),
(99, 16, 102035, 'Febrero-22', 'Campaña del mes de Febrero del 2022'),
(103, 5, 102041, 'Agosto', 'Campaña del mes de Agosto 2023'),
(109, 5, 1020421, 'Febrero-23', '1111'),
(110, 5, 1020422, 'Febrero-22', '1111'),
(130, 27, 101010, 'UNMV', 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

DROP TABLE IF EXISTS `comisiones`;
CREATE TABLE IF NOT EXISTS `comisiones` (
  `id_comision` int NOT NULL AUTO_INCREMENT,
  `id_asesor` int NOT NULL,
  `nombre_asesor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_asesor` int NOT NULL,
  `fecha_calculo` date NOT NULL,
  `mes` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_ventas` int NOT NULL,
  `estatus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_comision`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comisiones`
--

INSERT INTO `comisiones` (`id_comision`, `id_asesor`, `nombre_asesor`, `cedula_asesor`, `fecha_calculo`, `mes`, `numero_ventas`, `estatus`) VALUES
(23, 20, 'Carlos Andres Rojas', 1016098220, '2023-05-18', '1', 10, '1'),
(30, 20, 'Carlos Andres Rojas', 1016098220, '2023-05-18', '2', 11, '1'),
(31, 20, 'Carlos Andres Rojas', 1016098220, '2023-05-18', '1', 12, '1'),
(32, 46, 'Flor Nidia Garcia', 1016098110, '2023-05-03', '1', 1, '1'),
(33, 20, 'Carlos Andres Rojas', 1016098220, '2023-05-18', '2', 10, '1'),
(34, 46, 'Flor Nidia Garcia', 1016098110, '2023-05-03', '1', 12, '1'),
(35, 46, 'Flor Nidia Garcia', 1016098110, '2023-05-03', '2', 21, '1'),
(36, 46, 'Flor Nidia Garcia', 1016098110, '2023-05-18', '1', 10, '2'),
(37, 20, 'Carlos Andres Rojas', 1016098220, '2023-05-19', '1', 10, '1'),
(38, 40, 'Jeferson Barreto Sanchez', 1016098221, '2023-05-18', '1', 20, '1'),
(39, 32, 'Camilo Jesus Castillo', 1016098223, '2023-05-18', '2', 1, '1'),
(40, 47, 'CESAR DAVID PEÑA', 1016098111, '2023-05-19', '1', 10, '1'),
(41, 1, '0', 0, '2023-05-18', '1', 10, '1'),
(42, 2, '0', 0, '2023-05-18', '1', 100, '1'),
(43, 4, '0', 0, '2023-05-18', '1', 1000, '1'),
(44, 5, '0', 0, '2023-05-18', '1', 10000, '1'),
(45, 4, '0', 0, '2023-05-18', '2', 200, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

DROP TABLE IF EXISTS `metas`;
CREATE TABLE IF NOT EXISTS `metas` (
  `id_meta` int NOT NULL AUTO_INCREMENT,
  `id_campania` int NOT NULL,
  `concepto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estatus` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valor` int NOT NULL,
  `meta_min` int NOT NULL,
  `meta_max` int NOT NULL,
  `meta_cumplida` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_meta`),
  KEY `indx_campania` (`id_campania`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metas`
--

INSERT INTO `metas` (`id_meta`, `id_campania`, `concepto`, `estatus`, `valor`, `meta_min`, `meta_max`, `meta_cumplida`) VALUES
(1, 15, '1', '1', 1500, 1, 1000, '1'),
(5, 16, '2', '1', 0, 1, 50, '2'),
(6, 15, '2', '1', 0, 1, 50, '2'),
(7, 16, '1', '1', 1100, 1, 1000, '1'),
(8, 99, '1', '1', 100, 1, 1000, '1'),
(9, 15, '3', '1', 2000, 51, 200, '1'),
(10, 16, '3', '1', 1500, 51, 200, '1'),
(11, 103, '3', '1', 1500, 51, 200, '1'),
(12, 15, '4', '1', 2500, 1001, 2000, '1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `metas_comisiones`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `metas_comisiones`;
CREATE TABLE IF NOT EXISTS `metas_comisiones` (
`id_asesor` int
,`campania1` varchar(30)
,`nombre_asesor` varchar(30)
,`cedula_asesor` int
,`suma` decimal(32,0)
,`Total` decimal(42,0)
,`estatus` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `indxmailunico` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin1234');

-- --------------------------------------------------------

--
-- Estructura para la vista `metas_comisiones`
--
DROP TABLE IF EXISTS `metas_comisiones`;

DROP VIEW IF EXISTS `metas_comisiones`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `metas_comisiones`  AS SELECT `co`.`id_asesor` AS `id_asesor`, `ca`.`nombre_campania` AS `campania1`, `co`.`nombre_asesor` AS `nombre_asesor`, `co`.`cedula_asesor` AS `cedula_asesor`, sum(`co`.`numero_ventas`) AS `suma`, if((sum(`co`.`numero_ventas`) > 300),(`m`.`valor` * sum(`co`.`numero_ventas`)),if((sum(`co`.`numero_ventas`) >= 50),(50 * sum(`co`.`numero_ventas`)),0)) AS `Total`, `co`.`estatus` AS `estatus` FROM (((`asesores` `a` join `comisiones` `co` on((`co`.`id_asesor` = `a`.`id_asesor`))) join `campanias` `ca` on((`a`.`id_campania` = `ca`.`id_campania`))) join `metas` `m` on(((`a`.`id_campania` = `ca`.`id_campania`) and (`ca`.`id_campania` = `m`.`id_campania`)))) GROUP BY `co`.`nombre_asesor` ORDER BY `co`.`cedula_asesor` ASC  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alianzas`
--
ALTER TABLE `alianzas` ADD FULLTEXT KEY `indx_nombre` (`nombre_alianza`);

--
-- Indices de la tabla `asesores`
--
ALTER TABLE `asesores` ADD FULLTEXT KEY `indx_nombre` (`nombre`);

--
-- Indices de la tabla `campanias`
--
ALTER TABLE `campanias` ADD FULLTEXT KEY `indx_nombre` (`nombre_campania`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas` ADD FULLTEXT KEY `ind_concepto` (`concepto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
