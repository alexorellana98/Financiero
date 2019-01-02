-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2018 a las 18:13:12
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siccif`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `codigo_a` varchar(5) NOT NULL,
  `nombre_a` varchar(50) NOT NULL,
  `rubro_a` int(11) NOT NULL,
  `estado_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `codigo_a`, `nombre_a`, `rubro_a`, `estado_a`) VALUES
(1, '1', 'Administración', 1, 1),
(2, '2', 'Recursos Humanos', 1, 1),
(3, '21', 'Empleado', 2, 1),
(4, '22', 'Asignar Privilegios', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_empleado`
--

CREATE TABLE `areas_empleado` (
  `id_ae` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas_empleado`
--

INSERT INTO `areas_empleado` (`id_ae`, `id_area`, `id_empleado`) VALUES
(1, 2, 6),
(2, 1, 10),
(3, 2, 2),
(4, 2, 6),
(5, 2, 9),
(6, 1, 2),
(7, 2, 2),
(8, 1, 6),
(9, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre_e` varchar(50) NOT NULL,
  `apellido_e` varchar(50) NOT NULL,
  `direccion_e` text NOT NULL,
  `fechanacimiento_e` date NOT NULL,
  `estadocivil_e` int(11) NOT NULL,
  `dui_e` varchar(11) NOT NULL,
  `nit_e` varchar(17) NOT NULL,
  `genero_e` int(11) NOT NULL,
  `cargo_e` int(11) NOT NULL,
  `correo_e` varchar(80) NOT NULL,
  `foto_e` text NOT NULL,
  `estado_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre_e`, `apellido_e`, `direccion_e`, `fechanacimiento_e`, `estadocivil_e`, `dui_e`, `nit_e`, `genero_e`, `cargo_e`, `correo_e`, `foto_e`, `estado_e`) VALUES
(1, 'Angel', 'Mejia', 'San Vicente', '1996-09-25', 1, '74956265-4', '1003-258935-101-3', 1, 1, 'angel@yahoo.com', '../guardar/Benji Villalobos.png', 1),
(2, 'Marcos', 'Sanchez', 'San Lorenzo', '1997-06-14', 2, '48484521-2', '1003-255111-101-6', 1, 2, 'sanchez@gmail.com', '../guardar/Fredy  Espinisa.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_empleado`
--

CREATE TABLE `telefono_empleado` (
  `id_tel_emp` int(11) NOT NULL,
  `telefono_e` varchar(16) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefono_empleado`
--

INSERT INTO `telefono_empleado` (`id_tel_emp`, `telefono_e`, `id_empleado`) VALUES
(1, '(503) 7848-9633', 1),
(2, '(503) 7895-6321', 1),
(4, '(503) 7859-6324', 2),
(5, '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `correo`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `id_tipo`) VALUES
(5, 'Magda', '$2y$10$kRv3m5ET4S3qd/ymNsAS8e2Rgj3lfrCcDDz7xK6nWSFAXldtNWiYa', 'Magdalena', 'magdacordova2@gmail.com', '2018-01-03 07:56:16', 1, 'b9a23d745f990cc8312b553f696acd62', '', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `areas_empleado`
--
ALTER TABLE `areas_empleado`
  ADD PRIMARY KEY (`id_ae`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `telefono_empleado`
--
ALTER TABLE `telefono_empleado`
  ADD PRIMARY KEY (`id_tel_emp`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `areas_empleado`
--
ALTER TABLE `areas_empleado`
  MODIFY `id_ae` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `telefono_empleado`
--
ALTER TABLE `telefono_empleado`
  MODIFY `id_tel_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
