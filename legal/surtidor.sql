-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2018 a las 21:32:42
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `AD_ID` int(11) NOT NULL,
  `AD_primernombre` varchar(20) NOT NULL,
  `AD_otronombre` varchar(20) DEFAULT NULL,
  `AD_primeapellido` varchar(20) NOT NULL,
  `AD_segundoapellido` varchar(20) DEFAULT NULL,
  `AD_correo` varchar(45) NOT NULL,
  `AD_contrasena` varchar(255) NOT NULL,
  `AD_pregunta` varchar(45) NOT NULL,
  `AD_respuesta` varchar(45) NOT NULL,
  `AD_inicio` datetime NOT NULL,
  `AD_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`AD_ID`, `AD_primernombre`, `AD_otronombre`, `AD_primeapellido`, `AD_segundoapellido`, `AD_correo`, `AD_contrasena`, `AD_pregunta`, `AD_respuesta`, `AD_inicio`, `AD_actualizacion`) VALUES
(1, 'Jose', 'Daniel', 'Urbina', 'Contreras ', 'josedurbinac@gmail.com', '$2y$10$NHRSrjymov8iLkQ0pP7W0uqqv7TjeP.rzmm3O9yyt9WrMbcBhUt/e', 'Perro', 'Donky', '2018-06-25 04:27:21', '2018-06-25 04:27:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CL_ID` int(11) NOT NULL,
  `CL_CI` varchar(9) NOT NULL,
  `CL_fechainicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CL_numerocompras` int(11) NOT NULL,
  `CL_fechaultimacompra` timestamp NULL DEFAULT NULL,
  `CL_direccion` varchar(60) DEFAULT NULL,
  `CL_numerotelefono` int(11) DEFAULT NULL,
  `CL_primernombre` varchar(20) NOT NULL,
  `CL_otronombre` varchar(20) DEFAULT NULL,
  `CL_primerapellido` varchar(20) NOT NULL,
  `CL_segundoapellido` varchar(20) DEFAULT NULL,
  `CL_correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteregular`
--

CREATE TABLE `clienteregular` (
  `CL_ID` int(11) NOT NULL,
  `CL_CI` varchar(9) NOT NULL,
  `SUCURSAL_SU_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteweb`
--

CREATE TABLE `clienteweb` (
  `CLWEB_ID` int(11) NOT NULL,
  `CLWEB_CI` varchar(9) NOT NULL,
  `CLWEB_correo` varchar(50) NOT NULL,
  `CLWEB_contrasena` varchar(255) NOT NULL,
  `CLWEB_direccion` text NOT NULL,
  `CLWEB_telefono` decimal(11,0) NOT NULL,
  `CLWEB_primernombre` varchar(20) NOT NULL,
  `CLWEB_otronombre` varchar(20) DEFAULT NULL,
  `CLWEB_primerapellido` varchar(20) NOT NULL,
  `CLWEB_segundoapellido` varchar(20) DEFAULT NULL,
  `CLWEB_pregunta` varchar(45) NOT NULL,
  `CLWEB_respuesta` varchar(20) NOT NULL,
  `CLWEB_inicio` datetime NOT NULL,
  `CLWEB_actualizacion` datetime NOT NULL,
  `CL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `CO_ID` int(11) NOT NULL,
  `CO_contenido` text NOT NULL,
  `PU_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionfactura`
--

CREATE TABLE `descripcionfactura` (
  `PR_ID` int(11) NOT NULL,
  `FA_ID` int(11) NOT NULL,
  `CL_ID` int(11) NOT NULL,
  `CL_CI` varchar(9) NOT NULL,
  `VE_ID` int(11) NOT NULL,
  `SU_ID` int(11) NOT NULL,
  `MT_ID` int(11) NOT NULL,
  `MP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `FA_ID` int(11) NOT NULL,
  `FA_precioneto` float NOT NULL,
  `FA_IVA` float NOT NULL,
  `FA_preciototal` float NOT NULL,
  `FA_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FA_NItem` int(11) NOT NULL,
  `CL_ID` int(11) NOT NULL,
  `CL_CI` varchar(9) NOT NULL,
  `VE_ID` int(11) NOT NULL,
  `SU_ID` int(11) NOT NULL,
  `MT_ID` int(11) NOT NULL,
  `MP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `HI_ID` int(11) NOT NULL,
  `HI_fecha` datetime DEFAULT NULL,
  `HI_evento` tinytext,
  `HI_usuario` varchar(20) DEFAULT NULL,
  `HI_referencia` varchar(10) DEFAULT NULL,
  `HI_viejo_nombre` varchar(50) DEFAULT NULL,
  `HI_nuevo_nombre` varchar(50) DEFAULT NULL,
  `HI_viejo_sucursal` varchar(50) DEFAULT NULL,
  `HI_nuevo_sucursal` varchar(50) DEFAULT NULL,
  `HI_viejo_user` tinytext,
  `HI_nuevo_user` tinytext,
  `HI_viejo_categoria` varchar(50) DEFAULT NULL,
  `HI_nuevo_categoria` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `HI_viejo_precio` float DEFAULT NULL,
  `HI_nuevo_precio` float DEFAULT NULL,
  `HI_viejo_cantidad` int(20) DEFAULT NULL,
  `HI_nuevo_cantidad` int(20) DEFAULT NULL,
  `PR_ID` int(11) NOT NULL,
  `PR_referencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariosucursal`
--

CREATE TABLE `inventariosucursal` (
  `PR_ID` int(11) NOT NULL,
  `SU_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metododepago`
--

CREATE TABLE `metododepago` (
  `MT_ID` int(11) NOT NULL,
  `MT_monto` int(11) NOT NULL,
  `MT_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mododepago`
--

CREATE TABLE `mododepago` (
  `MP_ID` int(11) NOT NULL,
  `MP_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MP_Moneda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PR_ID` int(11) NOT NULL,
  `PR_referencia` int(11) NOT NULL,
  `PR_actualizacion` datetime NOT NULL,
  `PR_nombre` varchar(45) NOT NULL,
  `PR_clientela` varchar(45) NOT NULL,
  `PR_categoria` varchar(20) NOT NULL,
  `PR_talla` varchar(10) NOT NULL,
  `PR_color` varchar(30) NOT NULL,
  `PR_marca` varchar(60) NOT NULL,
  `PR_material` varchar(20) NOT NULL,
  `PR_descripcion` varchar(60) NOT NULL,
  `PR_cantidad` int(11) NOT NULL,
  `PR_precio` float NOT NULL,
  `PR_foto` varchar(500) DEFAULT NULL,
  `AD_ID` int(11) NOT NULL,
  `PR_inicio` datetime NOT NULL,
  `PD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`PR_ID`, `PR_referencia`, `PR_actualizacion`, `PR_nombre`, `PR_clientela`, `PR_categoria`, `PR_talla`, `PR_color`, `PR_marca`, `PR_material`, `PR_descripcion`, `PR_cantidad`, `PR_precio`, `PR_foto`, `AD_ID`, `PR_inicio`, `PD_ID`) VALUES
(26, 12312, '2018-07-01 20:37:01', '3123123', 'Dama', 'Ropa intima', 'L XL', '3123', '131', '31', '31', 13, 132, './assets/archivos/files/26/22489717_10212606624538908_1919679665768772975_n.jpg', 1, '2018-07-01 20:37:01', 115);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `PRV_ID` int(11) NOT NULL,
  `PRV_RM` int(11) NOT NULL,
  `PRV_producto` text NOT NULL,
  `PRV_telefono` decimal(11,0) NOT NULL,
  `PRV_correo` varchar(40) NOT NULL,
  `PRV_primernombre` varchar(20) NOT NULL,
  `PRV_otronombre` varchar(20) DEFAULT NULL,
  `PRV_primerapellido` varchar(20) NOT NULL,
  `PRV_segundoapellido` varchar(20) DEFAULT NULL,
  `AD_ID` int(11) NOT NULL,
  `PRV_inicio` datetime NOT NULL,
  `PRV_actualizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`PRV_ID`, `PRV_RM`, `PRV_producto`, `PRV_telefono`, `PRV_correo`, `PRV_primernombre`, `PRV_otronombre`, `PRV_primerapellido`, `PRV_segundoapellido`, `AD_ID`, `PRV_inicio`, `PRV_actualizacion`) VALUES
(3, 25234913, 'Faldas', '4264105150', 'josedurbinac@gmail.com', 'Jose', 'Daniel', 'Urbina', 'Contreras', 1, '0000-00-00 00:00:00', 2018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `PU_ID` int(11) NOT NULL,
  `PU_valoracion` int(11) NOT NULL,
  `CLWEB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `SU_ID` int(11) NOT NULL,
  `SU_Numerofiscal` decimal(8,0) NOT NULL,
  `SU_direccion` text NOT NULL,
  `SU_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SU_cupoempleados` decimal(4,0) NOT NULL,
  `SU_empleados` decimal(4,0) NOT NULL,
  `SU_telefono` decimal(8,0) DEFAULT NULL,
  `AD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `VE_ID` int(11) NOT NULL,
  `VE_CI` int(11) NOT NULL,
  `VE_SS` varchar(20) NOT NULL,
  `VE_telefono` varchar(45) NOT NULL,
  `VE_direccion` text NOT NULL,
  `VE_fechainicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `VE_numeroemergencia` decimal(11,0) NOT NULL,
  `VE_sexo` varchar(9) NOT NULL,
  `VE_horario` varchar(25) NOT NULL,
  `VE_primernombre` varchar(20) NOT NULL,
  `VE_otronombre` varchar(20) DEFAULT NULL,
  `VE_primerapellido` varchar(20) NOT NULL,
  `VE_segundoapellido` varchar(20) DEFAULT NULL,
  `VE_correo` varchar(45) DEFAULT NULL,
  `SU_ID` int(11) NOT NULL,
  `AD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`AD_ID`),
  ADD UNIQUE KEY `AD_correo_UNIQUE` (`AD_correo`),
  ADD UNIQUE KEY `AD_pregunta_UNIQUE` (`AD_pregunta`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CL_ID`,`CL_CI`),
  ADD UNIQUE KEY `CL_CI_UNIQUE` (`CL_CI`),
  ADD UNIQUE KEY `CL_numerotelefono_UNIQUE` (`CL_numerotelefono`);

--
-- Indices de la tabla `clienteregular`
--
ALTER TABLE `clienteregular`
  ADD PRIMARY KEY (`CL_ID`,`CL_CI`,`SUCURSAL_SU_ID`),
  ADD KEY `fk_Clientesregular_CLIENTE1_idx` (`CL_ID`,`CL_CI`),
  ADD KEY `fk_Clientesregular_SUCURSAL1_idx` (`SUCURSAL_SU_ID`);

--
-- Indices de la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD PRIMARY KEY (`CLWEB_ID`),
  ADD UNIQUE KEY `CLWEB_correo_UNIQUE` (`CLWEB_correo`),
  ADD UNIQUE KEY `CLWEB_telefono_UNIQUE` (`CLWEB_telefono`),
  ADD UNIQUE KEY `CLWEB_contraseña_UNIQUE` (`CLWEB_contrasena`),
  ADD UNIQUE KEY `CLWEB_CI_UNIQUE` (`CLWEB_CI`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`CO_ID`,`PU_ID`),
  ADD KEY `fk_COMENTARIO_PUNTUACION1_idx` (`PU_ID`);

--
-- Indices de la tabla `descripcionfactura`
--
ALTER TABLE `descripcionfactura`
  ADD PRIMARY KEY (`PR_ID`,`FA_ID`,`CL_ID`,`CL_CI`,`VE_ID`,`SU_ID`,`MT_ID`,`MP_ID`),
  ADD KEY `fk_DescripcionFactura_FACTURA1_idx` (`FA_ID`,`CL_ID`,`CL_CI`,`VE_ID`,`SU_ID`,`MT_ID`,`MP_ID`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`FA_ID`,`CL_ID`,`CL_CI`,`VE_ID`,`SU_ID`,`MT_ID`,`MP_ID`),
  ADD UNIQUE KEY `idFactura_UNIQUE` (`FA_ID`),
  ADD KEY `fk_FACTURA_CLIENTE1_idx` (`CL_ID`,`CL_CI`),
  ADD KEY `fk_FACTURA_Vendedor1_idx` (`VE_ID`),
  ADD KEY `fk_FACTURA_SUCURSAL1_idx` (`SU_ID`),
  ADD KEY `fk_FACTURA_METODODEPAGO1_idx` (`MT_ID`),
  ADD KEY `fk_FACTURA_MODODEPAGO1_idx` (`MP_ID`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`HI_ID`,`PR_ID`,`PR_referencia`),
  ADD KEY `fk_historial_producto1_idx` (`PR_ID`,`PR_referencia`);

--
-- Indices de la tabla `inventariosucursal`
--
ALTER TABLE `inventariosucursal`
  ADD PRIMARY KEY (`PR_ID`,`SU_ID`),
  ADD KEY `fk_INVENTARIOSUCURSAL_SUCURSAL1_idx` (`SU_ID`);

--
-- Indices de la tabla `metododepago`
--
ALTER TABLE `metododepago`
  ADD PRIMARY KEY (`MT_ID`);

--
-- Indices de la tabla `mododepago`
--
ALTER TABLE `mododepago`
  ADD PRIMARY KEY (`MP_ID`),
  ADD UNIQUE KEY `MP_ID_UNIQUE` (`MP_ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`PR_ID`,`PR_referencia`,`AD_ID`,`PD_ID`),
  ADD UNIQUE KEY `PR_ID_UNIQUE` (`PR_ID`),
  ADD UNIQUE KEY `productocol_UNIQUE` (`PR_referencia`),
  ADD KEY `fk_producto_administrador1_idx` (`AD_ID`),
  ADD KEY `fk_producto_pedido1_idx` (`PD_ID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`PRV_ID`,`AD_ID`),
  ADD UNIQUE KEY `PROVEEDORcol_UNIQUE` (`PRV_RM`),
  ADD UNIQUE KEY `PRV_ID_UNIQUE` (`PRV_ID`),
  ADD UNIQUE KEY `PRV_telefono_UNIQUE` (`PRV_telefono`),
  ADD UNIQUE KEY `PRV_correo_UNIQUE` (`PRV_correo`),
  ADD KEY `fk_proveedor_administrador1_idx` (`AD_ID`);

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`PU_ID`),
  ADD UNIQUE KEY `idPuntuacion_UNIQUE` (`PU_ID`),
  ADD KEY `fk_PUNTUACION_USUARIOWEB1_idx` (`CLWEB_ID`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`SU_ID`,`SU_inicio`,`AD_ID`),
  ADD UNIQUE KEY `SU_ID_UNIQUE` (`SU_ID`),
  ADD UNIQUE KEY `sucursalcol_UNIQUE` (`SU_telefono`),
  ADD KEY `fk_sucursal_administrador1_idx` (`AD_ID`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`VE_ID`,`SU_ID`,`AD_ID`),
  ADD UNIQUE KEY `VE_CI_UNIQUE` (`VE_CI`),
  ADD UNIQUE KEY `VE_SS_UNIQUE` (`VE_SS`),
  ADD UNIQUE KEY `VE_ID_UNIQUE` (`VE_ID`),
  ADD KEY `fk_Vendedor_SUCURSAL1_idx` (`SU_ID`),
  ADD KEY `fk_vendedor_administrador1_idx` (`AD_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  MODIFY `CLWEB_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `CO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `FA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `HI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `PR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `PRV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `PU_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `SU_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `VE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clienteregular`
--
ALTER TABLE `clienteregular`
  ADD CONSTRAINT `fk_Clientesregular_CLIENTE1` FOREIGN KEY (`CL_ID`,`CL_CI`) REFERENCES `cliente` (`CL_ID`, `CL_CI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Clientesregular_SUCURSAL1` FOREIGN KEY (`SUCURSAL_SU_ID`) REFERENCES `sucursal` (`SU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_COMENTARIO_PUNTUACION1` FOREIGN KEY (`PU_ID`) REFERENCES `puntuacion` (`PU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descripcionfactura`
--
ALTER TABLE `descripcionfactura`
  ADD CONSTRAINT `fk_DescripcionFactura_FACTURA1` FOREIGN KEY (`FA_ID`,`CL_ID`,`CL_CI`,`VE_ID`,`SU_ID`,`MT_ID`,`MP_ID`) REFERENCES `factura` (`FA_ID`, `CL_ID`, `CL_CI`, `VE_ID`, `SU_ID`, `MT_ID`, `MP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DescripcionFactura_PRODUCTO1` FOREIGN KEY (`PR_ID`) REFERENCES `producto` (`PR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_FACTURA_CLIENTE1` FOREIGN KEY (`CL_ID`,`CL_CI`) REFERENCES `cliente` (`CL_ID`, `CL_CI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FACTURA_METODODEPAGO1` FOREIGN KEY (`MT_ID`) REFERENCES `metododepago` (`MT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FACTURA_MODODEPAGO1` FOREIGN KEY (`MP_ID`) REFERENCES `mododepago` (`MP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FACTURA_SUCURSAL1` FOREIGN KEY (`SU_ID`) REFERENCES `sucursal` (`SU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FACTURA_Vendedor1` FOREIGN KEY (`VE_ID`) REFERENCES `vendedor` (`VE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_producto1` FOREIGN KEY (`PR_ID`,`PR_referencia`) REFERENCES `producto` (`PR_ID`, `PR_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventariosucursal`
--
ALTER TABLE `inventariosucursal`
  ADD CONSTRAINT `fk_INVENTARIOSUCURSAL_PRODUCTO1` FOREIGN KEY (`PR_ID`) REFERENCES `producto` (`PR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_INVENTARIOSUCURSAL_SUCURSAL1` FOREIGN KEY (`SU_ID`) REFERENCES `sucursal` (`SU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_administrador1` FOREIGN KEY (`AD_ID`) REFERENCES `administrador` (`AD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_pedido1` FOREIGN KEY (`PD_ID`) REFERENCES `pedido` (`PD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_administrador1` FOREIGN KEY (`AD_ID`) REFERENCES `administrador` (`AD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `fk_PUNTUACION_USUARIOWEB1` FOREIGN KEY (`CLWEB_ID`) REFERENCES `clienteweb` (`CLWEB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_sucursal_administrador1` FOREIGN KEY (`AD_ID`) REFERENCES `administrador` (`AD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `fk_Vendedor_SUCURSAL1` FOREIGN KEY (`SU_ID`) REFERENCES `sucursal` (`SU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendedor_administrador1` FOREIGN KEY (`AD_ID`) REFERENCES `administrador` (`AD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
