-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 10:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repositorio`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivo`
--

CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `codigo` varchar(500) DEFAULT NULL,
  `nombre_documento` varchar(1000) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ubicacion` varchar(500) DEFAULT NULL,
  `estante` varchar(500) DEFAULT NULL,
  `modulo` varchar(500) DEFAULT NULL,
  `numero` varchar(500) DEFAULT NULL,
  `folio` varchar(500) DEFAULT NULL,
  `responsable` varchar(500) DEFAULT NULL,
  `aricho` varchar(500) DEFAULT NULL,
  `otros` varchar(500) DEFAULT NULL,
  `publico` tinyint(1) DEFAULT 0,
  `activo` tinyint(1) DEFAULT 0,
  `perdido` tinyint(1) DEFAULT 0,
  `transferido` tinyint(1) DEFAULT 0,
  `carpeta` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `usuario_id`, `tipo_id`, `codigo`, `nombre_documento`, `descripcion`, `ubicacion`, `estante`, `modulo`, `numero`, `folio`, `responsable`, `aricho`, `otros`, `publico`, `activo`, `perdido`, `transferido`, `carpeta`, `fecha`) VALUES
(1, 1, NULL, NULL, '2', 'dd', 'dd', NULL, NULL, NULL, '3', '3', NULL, 'WhatsApp_Image_2023-11-14_at_13.21.20_35913960.jpg', 0, 1, 0, 0, 0, '2024-04-26 09:24:02'),
(2, 1, NULL, NULL, 'Stratusweb', 'Descreption 1', 'C1B3', NULL, NULL, NULL, '1-2023', 'Said dani', NULL, '1.png', 0, 1, 0, 0, 0, '2024-05-10 21:08:48'),
(6, 1, NULL, NULL, 'Stratusweb', '', 'C1B3', NULL, NULL, NULL, '1-2023', 'Said dani', NULL, '3.png', 0, 1, 0, 0, 0, '2024-05-10 22:38:16'),
(7, 1, NULL, NULL, 'Numero dossier', '', 'Emplacement', NULL, NULL, NULL, 'Nombre piece', 'Objet', NULL, '5.png', 0, 1, 0, 0, 0, '2024-05-10 22:38:52'),
(8, 1, NULL, NULL, '10/2024', 'RAS', 'Armoire N 1 - Etage B - BA : 15', NULL, NULL, NULL, '4', 'Achat de materiel informatique pour le compte de la province Al Haouz', NULL, 'Eflea_Connect_-_Facture_11548.pdf', 0, 1, 0, 0, 0, '2024-05-10 22:51:58'),
(10, 1, NULL, NULL, '23-2023', '', 'A : 1', NULL, NULL, NULL, '3', ' Achat de matériel informatique pour le compte de la province d\'Al Haouz', NULL, 'Brand_Style_Guide_-_PSO_Admin_Use.pdf', 1, 1, 0, 0, 0, '2024-05-14 00:34:03'),
(11, 1, NULL, NULL, '34-2023', '', 'Armoire 1 , 2 , BA : 13', NULL, NULL, NULL, '5', 'Achat de materiel bureautique', NULL, 'Brand_Style_Guide_-_PSO_Admin_Use_1.pdf', 1, 1, 1, 0, 0, '2024-05-14 09:21:57'),
(12, 1, NULL, NULL, '29-2023', '', 'A2', NULL, NULL, NULL, '3', 'Achat de materiel bureautique', NULL, 'Brand_Style_Guide_-_PSO_Admin_Use_2.pdf', 0, 1, 0, 0, 0, '2024-05-14 19:17:14'),
(13, 1, NULL, NULL, '23-2022', '', 'A2', NULL, NULL, NULL, '6', 'Achat de matériel informatique', NULL, 'Brand_Style_Guide_-_PSO_Admin_Use_3.pdf', 0, 1, 0, 0, 0, '2024-05-14 21:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `area_oficina`
--

CREATE TABLE `area_oficina` (
  `id_area_oficina` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area_oficina`
--

INSERT INTO `area_oficina` (`id_area_oficina`, `nombre`, `detalle`, `activo`) VALUES
(1, 'test', '', 1),
(6, 'Service Budget et Comptabilite', 'Service Budget et Comptabilite ', 1),
(7, 'Bon de commande', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `arecarpeta`
--

CREATE TABLE `arecarpeta` (
  `id_area_carpeta` int(11) NOT NULL,
  `area_oficina_id` int(11) DEFAULT NULL,
  `carpeta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arecarpeta`
--

INSERT INTO `arecarpeta` (`id_area_carpeta`, `area_oficina_id`, `carpeta_id`) VALUES
(1, 1, 3),
(2, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `carpeta`
--

CREATE TABLE `carpeta` (
  `id_carpeta` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `codigo` varchar(500) DEFAULT NULL,
  `estante` varchar(500) DEFAULT NULL,
  `modulo` varchar(500) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carpeta`
--

INSERT INTO `carpeta` (`id_carpeta`, `usuario_id`, `periodo_id`, `nombre`, `codigo`, `estante`, `modulo`, `descripcion`, `fecha`) VALUES
(1, 1, NULL, 'test', 'test', 'test', '1', 'TEST', '2024-04-26 09:23:16'),
(2, 1, NULL, 'Bon de commande', 'Numérique', 'Armoire A, B', ' Vert', '', '2024-05-10 20:43:53'),
(3, 1, NULL, 'Bon de commande', '001', 'Youssef', '', '', '2024-05-10 21:07:19'),
(5, 1, NULL, 'Bon de commande', '001', 'Youssef', '30', '', '2024-05-10 22:37:44'),
(6, 1, NULL, 'Marche', 'Alphabétique', 'Armoire A', 'Rouge ', '', '2024-05-10 23:10:38'),
(7, 1, NULL, 'Convention', 'Numérique', 'Armoire B', 'Jaune ', '', '2024-05-10 23:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `carpetaarchivo`
--

CREATE TABLE `carpetaarchivo` (
  `id_carpetaarchivo` int(11) NOT NULL,
  `carpeta_id` int(11) NOT NULL,
  `archivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carpetaarchivo`
--

INSERT INTO `carpetaarchivo` (`id_carpetaarchivo`, `carpeta_id`, `archivo_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(6, 5, 6),
(7, 5, 7),
(8, 5, 8),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `archivo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `comentario_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `calidad` text DEFAULT NULL,
  `seguridad` text DEFAULT NULL,
  `garantia` text DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `valores` text DEFAULT NULL,
  `horario_atencion` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `gerente` text DEFAULT NULL,
  `texto1` text DEFAULT NULL,
  `texto2` text DEFAULT NULL,
  `texto3` text DEFAULT NULL,
  `texto4` text DEFAULT NULL,
  `texto5` text DEFAULT NULL,
  `texto6` text DEFAULT NULL,
  `footer1` text DEFAULT NULL,
  `footer2` text DEFAULT NULL,
  `footer3` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `ciudad` text DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `red_social1` text DEFAULT NULL,
  `red_social2` text DEFAULT NULL,
  `red_social3` text DEFAULT NULL,
  `red_social4` text DEFAULT NULL,
  `red_social5` text DEFAULT NULL,
  `red_social6` text DEFAULT NULL,
  `red_social7` text DEFAULT NULL,
  `is_activo` tinyint(1) DEFAULT 1,
  `is_publico` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT NULL,
  `fechaactualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `usuario_id`, `nombre`, `descripcion`, `direccion`, `calidad`, `seguridad`, `garantia`, `mision`, `vision`, `valores`, `horario_atencion`, `logo`, `imagen`, `gerente`, `texto1`, `texto2`, `texto3`, `texto4`, `texto5`, `texto6`, `footer1`, `footer2`, `footer3`, `telefono`, `ciudad`, `pais`, `email`, `red_social1`, `red_social2`, `red_social3`, `red_social4`, `red_social5`, `red_social6`, `red_social7`, `is_activo`, `is_publico`, `fecha`, `fechaactualizacion`) VALUES
(1, 1, 'PROVINCE D\'AL HOUZ', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'royaumedumaroc_1.png', 'royaumedumaroc.png', 'stratusweb.info', '', '', '', '', '', '', '', '', 'stratusweb.info', '0675323012', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `nombre`, `descripcion`, `activo`, `fecha`, `usuario_id`) VALUES
(1, '2022', '', 1, '2024-04-26 09:21:08', 1),
(2, '2023', 'Exercice', 1, '2024-05-10 21:11:07', 1),
(3, '2024', 'test', 1, '2024-05-10 23:07:04', 1),
(4, '2021', 'test', 1, '2024-05-13 23:20:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periodoarea`
--

CREATE TABLE `periodoarea` (
  `id_periodoarea` int(11) NOT NULL,
  `oficina_area_id` int(11) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periodoarea`
--

INSERT INTO `periodoarea` (`id_periodoarea`, `oficina_area_id`, `periodo_id`) VALUES
(7, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `periodocarpeta`
--

CREATE TABLE `periodocarpeta` (
  `id_periodocarpeta` int(11) NOT NULL,
  `carpeta_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periodocarpeta`
--

INSERT INTO `periodocarpeta` (`id_periodocarpeta`, `carpeta_id`, `periodo_id`) VALUES
(2, 2, 1),
(4, 6, 1),
(5, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `archivo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `area_oficina_id` int(11) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido` varchar(500) DEFAULT NULL,
  `dni` varchar(500) DEFAULT NULL,
  `telefono` varchar(500) DEFAULT NULL,
  `edad` varchar(500) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `sexo` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `usuario` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_modeficacion` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `admin` tinyint(1) DEFAULT 0,
  `publico` tinyint(1) DEFAULT 0,
  `jefe` tinyint(1) DEFAULT 0,
  `encargado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `area_oficina_id`, `nombre`, `apellido`, `dni`, `telefono`, `edad`, `imagen`, `sexo`, `email`, `usuario`, `password`, `fecha`, `fecha_modeficacion`, `activo`, `admin`, `publico`, `jefe`, `encargado`) VALUES
(1, NULL, 'YOUSSEF', 'admin', '70933255', '0675323012', '', '3.png', 'Varon', 'y.kostali@gmail.com', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '2024-04-26 09:12:24', '0000-00-00 00:00:00', 1, 1, 0, 0, 0),
(2, NULL, 'KOSTALI', 'YOUSSEF', '12', '876876876', NULL, NULL, NULL, '', 'youssef', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '2024-05-10 21:25:02', NULL, 1, 0, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indexes for table `area_oficina`
--
ALTER TABLE `area_oficina`
  ADD PRIMARY KEY (`id_area_oficina`);

--
-- Indexes for table `arecarpeta`
--
ALTER TABLE `arecarpeta`
  ADD PRIMARY KEY (`id_area_carpeta`),
  ADD KEY `area_oficina_id` (`area_oficina_id`),
  ADD KEY `carpeta_id` (`carpeta_id`);

--
-- Indexes for table `carpeta`
--
ALTER TABLE `carpeta`
  ADD PRIMARY KEY (`id_carpeta`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `carpetaarchivo`
--
ALTER TABLE `carpetaarchivo`
  ADD PRIMARY KEY (`id_carpetaarchivo`),
  ADD KEY `carpeta_id` (`carpeta_id`),
  ADD KEY `archivo_id` (`archivo_id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `archivo_id` (`archivo_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `comentario_id` (`comentario_id`);

--
-- Indexes for table `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_periodo`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `periodoarea`
--
ALTER TABLE `periodoarea`
  ADD PRIMARY KEY (`id_periodoarea`),
  ADD KEY `oficina_area_id` (`oficina_area_id`),
  ADD KEY `periodo_id` (`periodo_id`);

--
-- Indexes for table `periodocarpeta`
--
ALTER TABLE `periodocarpeta`
  ADD PRIMARY KEY (`id_periodocarpeta`),
  ADD KEY `carpeta_id` (`carpeta_id`),
  ADD KEY `periodo_id` (`periodo_id`);

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `archivo_id` (`archivo_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `area_oficina_id` (`area_oficina_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `area_oficina`
--
ALTER TABLE `area_oficina`
  MODIFY `id_area_oficina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `arecarpeta`
--
ALTER TABLE `arecarpeta`
  MODIFY `id_area_carpeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carpeta`
--
ALTER TABLE `carpeta`
  MODIFY `id_carpeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carpetaarchivo`
--
ALTER TABLE `carpetaarchivo`
  MODIFY `id_carpetaarchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periodoarea`
--
ALTER TABLE `periodoarea`
  MODIFY `id_periodoarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `periodocarpeta`
--
ALTER TABLE `periodocarpeta`
  MODIFY `id_periodocarpeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `archivo_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_documento` (`id_tipo`);

--
-- Constraints for table `arecarpeta`
--
ALTER TABLE `arecarpeta`
  ADD CONSTRAINT `arecarpeta_ibfk_1` FOREIGN KEY (`area_oficina_id`) REFERENCES `area_oficina` (`id_area_oficina`),
  ADD CONSTRAINT `arecarpeta_ibfk_2` FOREIGN KEY (`carpeta_id`) REFERENCES `carpeta` (`id_carpeta`);

--
-- Constraints for table `carpeta`
--
ALTER TABLE `carpeta`
  ADD CONSTRAINT `carpeta_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `carpetaarchivo`
--
ALTER TABLE `carpetaarchivo`
  ADD CONSTRAINT `carpetaarchivo_ibfk_1` FOREIGN KEY (`carpeta_id`) REFERENCES `carpeta` (`id_carpeta`),
  ADD CONSTRAINT `carpetaarchivo_ibfk_2` FOREIGN KEY (`archivo_id`) REFERENCES `archivo` (`id_archivo`);

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`archivo_id`) REFERENCES `archivo` (`id_archivo`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`comentario_id`) REFERENCES `comentario` (`id_comentario`);

--
-- Constraints for table `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `periodo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `periodoarea`
--
ALTER TABLE `periodoarea`
  ADD CONSTRAINT `periodoarea_ibfk_1` FOREIGN KEY (`oficina_area_id`) REFERENCES `area_oficina` (`id_area_oficina`),
  ADD CONSTRAINT `periodoarea_ibfk_2` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id_periodo`);

--
-- Constraints for table `periodocarpeta`
--
ALTER TABLE `periodocarpeta`
  ADD CONSTRAINT `periodocarpeta_ibfk_1` FOREIGN KEY (`carpeta_id`) REFERENCES `carpeta` (`id_carpeta`),
  ADD CONSTRAINT `periodocarpeta_ibfk_2` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id_periodo`);

--
-- Constraints for table `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`archivo_id`) REFERENCES `archivo` (`id_archivo`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`area_oficina_id`) REFERENCES `area_oficina` (`id_area_oficina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
