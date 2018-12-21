-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 04:13 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finanzas`
--

-- --------------------------------------------------------

--
-- Table structure for table `activo`
--

CREATE TABLE `activo` (
  `idAc` int(11) NOT NULL,
  `codAct` varchar(150) NOT NULL,
  `descrip` varchar(150) NOT NULL,
  `idCat` varchar(60) NOT NULL,
  `idSub` varchar(60) NOT NULL,
  `estadoBoton` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `idUb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activo`
--

INSERT INTO `activo` (`idAc`, `codAct`, `descrip`, `idCat`, `idSub`, `estadoBoton`, `estado`, `idUb`) VALUES
(1, '12056-0035-V0120023-001', 'Toyota Corola 2016', '3', '1', 1, 1, 2),
(2, '12056-0014-H00230036-002', 'Terreno en la costa', '1', '3', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCat` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `cod` varchar(150) NOT NULL,
  `val` int(100) NOT NULL,
  `vidautil` int(5) NOT NULL,
  `vidaeco` int(5) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCat`, `nombre`, `cod`, `val`, `vidautil`, `vidaeco`, `estado`) VALUES
(1, 'TERRENO', 'H0023', 20, 0, 0, 1),
(2, 'Maquinaria y equipo', 'M003', 10, 5, 8, 1),
(3, 'Transporte', 'V012', 10, 5, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clasificaactivo`
--

CREATE TABLE `clasificaactivo` (
  `idClas` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `vida` int(25) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clasificaactivo`
--

INSERT INTO `clasificaactivo` (`idClas`, `nombre`, `vida`, `estado`) VALUES
(1, 'Terreno', 0, 1),
(2, 'Edificios', 20, 1),
(3, 'Mobiliario', 10, 1),
(4, 'Vehiculos', 5, 1),
(5, 'Maquinaria y herramientas', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `dui` varchar(150) NOT NULL,
  `nit` varchar(150) NOT NULL,
  `repre` varchar(100) NOT NULL,
  `tel` varchar(150) NOT NULL,
  `ocupacion` varchar(150) NOT NULL,
  `depa` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `direc` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `dui`, `nit`, `repre`, `tel`, `ocupacion`, `depa`, `fecha`, `direc`, `estado`, `tipo`) VALUES
(1, 'Jose Alberto', 'Morales Arias', '32323235-1', '1125-335644-354-11', '', '235-4512', 'Secretario', 'CuscatlÃ¡n', '2018-01-22', 'Colonia las margaritas pasaje las azucenas #123 cojutepeque,cuscatlan', 1, 1),
(2, 'Juan Carlos', 'Beltran Urias', '3226555-0', '5489-655899-321-1', '', '2315-4578', 'Gerente general', 'La Libertad', '2018-01-22', 'Colonia el chapulin avenida el trovador pasaje6 #123 ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `idCom` int(11) NOT NULL,
  `idProv` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `condicion` varchar(100) NOT NULL,
  `precioUni` varchar(100) NOT NULL,
  `codAct` int(50) NOT NULL,
  `donado` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`idCom`, `idProv`, `fecha`, `condicion`, `precioUni`, `codAct`, `donado`, `estado`) VALUES
(1, 1, '2018-01-15', 'Nuevo', '5000', 1, 'NO', 1),
(2, 2, '2018-01-22', 'Nuevo', '7500', 2, 'NO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `creditos`
--

CREATE TABLE `creditos` (
  `idCre` int(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `plazom` int(10) NOT NULL,
  `cmax` int(10) NOT NULL,
  `cmin` int(10) NOT NULL,
  `garantia` varchar(50) NOT NULL,
  `interes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditos`
--

INSERT INTO `creditos` (`idCre`, `tipo`, `plazom`, `cmax`, `cmin`, `garantia`, `interes`) VALUES
(1, 'Personal', 36, 1000, 100, 'Aval', 12),
(2, 'Agropecuario', 28, 1500, 200, 'Aval', 10),
(3, 'Hipotecario', 240, 20000, 1000, 'Hipotecaria', 12);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `idDep` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_activo`
--

CREATE TABLE `detalle_activo` (
  `id` int(20) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `fecha_adqui` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `valor_historico` double NOT NULL,
  `donado` varchar(6) NOT NULL,
  `vidautil_restante` int(10) NOT NULL,
  `marca_id` int(10) NOT NULL,
  `ubi_id` int(10) NOT NULL,
  `activofijo_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_activo`
--

INSERT INTO `detalle_activo` (`id`, `serie`, `fecha_adqui`, `fecha_inicio`, `valor_historico`, `donado`, `vidautil_restante`, `marca_id`, `ubi_id`, `activofijo_id`) VALUES
(1, 'P128-45', '2018-01-15', '2018-01-22', 5000, 'NO', 5, 1, 2, 1),
(2, 'h2200', '2018-01-22', '2018-01-22', 7500, 'NO', 0, 4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE `institucion` (
  `idIn` int(11) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `Nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`idIn`, `codigo`, `Nombre`) VALUES
(1, '12056', 'Institucion Financiera del Pueblo IFP');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`idMarca`, `nombre`, `estado`) VALUES
(1, 'Toyota', 1),
(2, 'Honda', 1),
(3, 'Hp', 1),
(4, 'Ninguna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

CREATE TABLE `movimiento` (
  `idMov` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movimiento`
--

INSERT INTO `movimiento` (`idMov`, `nombre`, `estado`) VALUES
(1, 'Venta de activos', 1),
(2, 'Donacion de activos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `idPag` int(11) NOT NULL,
  `saldo` double NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `fechapago` date NOT NULL,
  `atraso` int(10) NOT NULL,
  `mora` double NOT NULL,
  `total` double NOT NULL,
  `idPres` int(10) NOT NULL,
  `cuota` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `idPres` int(10) NOT NULL,
  `monto` double NOT NULL,
  `plazo` int(10) NOT NULL,
  `fechafinan` date NOT NULL,
  `cuota` double NOT NULL,
  `saldo` double NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idCli` int(10) NOT NULL,
  `idCre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestamo`
--

INSERT INTO `prestamo` (`idPres`, `monto`, `plazo`, `fechafinan`, `cuota`, `saldo`, `estado`, `idCli`, `idCre`) VALUES
(1, 1000, 18, '2018-01-22', 60.98, 1097.64, 'Pendiente', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `ide` int(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `nit` varchar(60) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`ide`, `nombre`, `direccion`, `nit`, `contacto`, `telefono`, `correo`, `observacion`, `estado`) VALUES
(1, 'Grupo Q', 'colonia el Centro 3ra calle poniente', '12566655-1', 'Jose Salazar Arias', '2354-4515', 'Jose@hotmail.com', 'es un bue n proveedor', 1),
(2, 'Lotificacion Milenium', 'colonia el progreso pasaje las primaveras avenida El gitano', '11333356-2', 'Maria Celeste Beltran', '2503-5614', 'Maria@gmail.com', 'tiene buenos lotes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reevaluar`
--

CREATE TABLE `reevaluar` (
  `idReeval` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valorAnt` varchar(50) NOT NULL,
  `idAc` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSub` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `idcat` int(50) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategoria`
--

INSERT INTO `subcategoria` (`idSub`, `nombre`, `idcat`, `codigo`, `estado`) VALUES
(1, 'Liviano', 3, 'V0120023', 1),
(2, 'Pesado', 3, 'V0120041', 1),
(3, 'terreno valdio', 1, 'H00230036', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idUb` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL,
  `codU` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ubicacion`
--

INSERT INTO `ubicacion` (`idUb`, `nombre`, `estado`, `codU`) VALUES
(1, 'Departamento de Informatica', 1, '0025'),
(2, 'Departamento de RH', 1, '0035'),
(3, 'Departamento de Finanzas', 1, '0045'),
(4, 'Costa del sol,Departamento de la Paz ', 1, '0014');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `idActi` int(11) NOT NULL,
  `idMovi` int(11) NOT NULL,
  `factNum` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `precVenta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`idAc`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `clasificaactivo`
--
ALTER TABLE `clasificaactivo`
  ADD PRIMARY KEY (`idClas`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCom`);

--
-- Indexes for table `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`idCre`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDep`);

--
-- Indexes for table `detalle_activo`
--
ALTER TABLE `detalle_activo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idIn`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indexes for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idMov`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPag`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPres`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ide`);

--
-- Indexes for table `reevaluar`
--
ALTER TABLE `reevaluar`
  ADD PRIMARY KEY (`idReeval`);

--
-- Indexes for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSub`);

--
-- Indexes for table `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idUb`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activo`
--
ALTER TABLE `activo`
  MODIFY `idAc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clasificaactivo`
--
ALTER TABLE `clasificaactivo`
  MODIFY `idClas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creditos`
--
ALTER TABLE `creditos`
  MODIFY `idCre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle_activo`
--
ALTER TABLE `detalle_activo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idIn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idMov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPres` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ide` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reevaluar`
--
ALTER TABLE `reevaluar`
  MODIFY `idReeval` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idUb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
