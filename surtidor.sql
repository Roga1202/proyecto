-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2017 a las 02:30:12
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `surtidor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Usuario` varchar(50) NOT NULL,
  `Evento` text NOT NULL,
  `Fecha` datetime(6) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nom_art` varchar(50) NOT NULL,
  `sucursal` varchar(200) NOT NULL,
  `user` text NOT NULL,
  `cat` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `cant` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `articulo`
--
DELIMITER $$
CREATE TRIGGER `ARTICULO_AI` AFTER INSERT ON `articulo` FOR EACH ROW INSERT INTO HISTORIAL(FECHA,EVENTO,USUARIO,REF,NUEVO_NOM_ART,NUEVO_SUCURSAL,NUEVO_USER,NUEVO_CAT,NUEVO_PRECIO,NUEVO_CANT) VALUES (NOW(),'Agregado',CURRENT_USER(),NEW.REF,NEW.NOM_ART,NEW.SUCURSAL,NEW.USER,NEW.CAT,NEW.PRECIO,NEW.CANT)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ARTICULO_AU` BEFORE UPDATE ON `articulo` FOR EACH ROW INSERT INTO historial(FECHA,EVENTO,USUARIO,REF,VIEJO_NOM_ART,NUEVO_NOM_ART,VIEJO_SUCURSAL,NUEVO_SUCURSAL,VIEJO_USER,NUEVO_USER,VIEJO_CAT,
NUEVO_CAT,VIEJO_PRECIO,NUEVO_PRECIO,VIEJO_CANT,NUEVO_CANT)VALUES (NOW(),'Actualizacion',CURRENT_USER(),OLD.REF,OLD.NOM_ART,NEW.NOM_ART,OLD.SUCURSAL,NEW.SUCURSAL,OLD.USER,NEW.USER,OLD.CAT,NEW.CAT,OLD.PRECIO,NEW.PRECIO,
OLD.CANT,NEW.CANT)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ARTICULO_BD` BEFORE DELETE ON `articulo` FOR EACH ROW INSERT INTO HISTORIAL(FECHA,EVENTO,USUARIO,REF,VIEJO_NOM_ART,VIEJO_SUCURSAL,VIEJO_USER,VIEJO_CAT,VIEJO_PRECIO,VIEJO_CANT) VALUES (NOW(),'Eliminado',CURRENT_USER(),OLD.REF,OLD.NOM_ART,OLD.SUCURSAL,OLD.USER,OLD.CAT,OLD.PRECIO,OLD.CANT)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `N_MOV` int(11) NOT NULL,
  `FECHA` datetime DEFAULT NULL,
  `EVENTO` tinytext,
  `USUARIO` varchar(20) DEFAULT NULL,
  `REF` varchar(10) DEFAULT NULL,
  `VIEJO_NOM_ART` varchar(50) DEFAULT NULL,
  `NUEVO_NOM_ART` varchar(50) DEFAULT NULL,
  `VIEJO_SUCURSAL` varchar(50) DEFAULT NULL,
  `NUEVO_SUCURSAL` varchar(50) DEFAULT NULL,
  `VIEJO_USER` tinytext,
  `NUEVO_USER` tinytext,
  `VIEJO_CAT` varchar(50) DEFAULT NULL,
  `NUEVO_CAT` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `VIEJO_PRECIO` float DEFAULT NULL,
  `NUEVO_PRECIO` float DEFAULT NULL,
  `VIEJO_CANT` int(20) DEFAULT NULL,
  `NUEVO_CANT` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`N_MOV`, `FECHA`, `EVENTO`, `USUARIO`, `REF`, `VIEJO_NOM_ART`, `NUEVO_NOM_ART`, `VIEJO_SUCURSAL`, `NUEVO_SUCURSAL`, `VIEJO_USER`, `NUEVO_USER`, `VIEJO_CAT`, `NUEVO_CAT`, `VIEJO_PRECIO`, `NUEVO_PRECIO`, `VIEJO_CANT`, `NUEVO_CANT`) VALUES
(1, '2017-12-03 20:10:05', 'Agregado', 'root@localhost', NULL, NULL, 'ASDASDA', NULL, 'Surtisandalias,Centro', NULL, 'Dama', NULL, 'Ropa intima', NULL, 22, NULL, 22),
(2, '2017-12-03 20:12:21', 'Actualizacion', 'root@localhost', 'RF1', 'ASDASDA', 'ASDASDA', 'Surtisandalias,Centro', 'Surtisandalias,Centro', 'Dama', 'Dama', 'Ropa intima', 'Ropa intima', 22, 22, 22, 22),
(3, '2017-12-03 20:12:29', 'Actualizacion', 'root@localhost', 'RF1', 'ASDASDA', 'ASDASD', 'Surtisandalias,Centro', 'Surtisandalias,Centro', 'Dama', 'Dama', 'Ropa intima', 'Ropa intima', 22, 22, 22, 22),
(4, '2017-12-03 20:13:20', 'Agregado', 'root@localhost', 'RF2', NULL, 'AAA', NULL, 'El Surtidor,Tariba', NULL, 'Dama', NULL, 'Ropa intima', NULL, 222, NULL, 22),
(5, '2017-12-03 20:13:36', 'Eliminado', 'root@localhost', NULL, 'AAA', NULL, 'El Surtidor,Tariba', NULL, 'Dama', NULL, 'Ropa intima', NULL, 222, NULL, 22, NULL),
(6, '2017-12-03 20:14:03', 'Eliminado', 'root@localhost', 'RF1', 'ASDASD', NULL, 'Surtisandalias,Centro', NULL, 'Dama', NULL, 'Ropa intima', NULL, 22, NULL, 22, NULL),
(7, '2017-12-03 20:19:27', 'Agregado', 'root@localhost', 'rf112131', NULL, 'sdasdasd', NULL, 'El Surtidor,Centro', NULL, 'NiÃ±os', NULL, 'Prendas de vestir', NULL, 232312000, NULL, 111111),
(8, '2017-12-03 20:20:31', 'Actualizacion', 'root@localhost', 'rf112131', 'sdasdasd', 'sdasdabe', 'El Surtidor,Centro', 'El Surtidor,Centro', 'NiÃ±os', 'NiÃ±os', 'Prendas de vestir', 'Ropa intima', 232312000, 232312000, 111111, 111111),
(9, '2017-12-03 20:20:49', 'Eliminado', 'root@localhost', 'rf112131', 'sdasdabe', NULL, 'El Surtidor,Centro', NULL, 'NiÃ±os', NULL, 'Ropa intima', NULL, 232312000, NULL, 111111, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`ref`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`N_MOV`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `N_MOV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
