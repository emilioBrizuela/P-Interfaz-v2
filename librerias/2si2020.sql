-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2020 a las 13:35:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2si2020`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_permisos`
--

CREATE TABLE `app_permisos` (
  `id_permisos` int(2) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `app_permisos`
--

INSERT INTO `app_permisos` (`id_permisos`, `nombre`, `descripcion`, `activo`) VALUES
(1, 'Creación', 'Creación de elementos en la base de datos', 'S'),
(2, 'Borrado', 'Borrado de elementos en la base de datos', 'N'),
(3, 'Modificación', 'Modificación elementos', 'N'),
(5, 'Consulta datos propios', 'Consulta de datos en la bases de datos', 'S'),
(6, 'Algo12XX', 'Insertar elementos XXX', 'N'),
(9, 'Algo 3', '123', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) UNSIGNED NOT NULL,
  `opcion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `funcion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `submenu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `id_submenu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `opcion`, `funcion`, `submenu`, `id_submenu`) VALUES
(1, 'Home', '', 'N', 0),
(2, 'Mantenimiento', '', 'S', 0),
(3, 'Usuario', 'getVista(\'Usuarios\', \'vistaInicio\');', 'S', 2),
(4, 'Permisos', 'getVista(\'Permisos\', \'vistaInicio\');', 'S', 2),
(5, 'Login', 'getVista(\'Usuarios\', \'vistaLogin\');', 'N', 0),
(6, 'Logout', 'loginUsuario(\'Usuarios\',\'logoutUsuario\');', 'N', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_1` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_2` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `sexo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `fechaAlta` date DEFAULT NULL,
  `mail` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `movil` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `login` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `activo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(32) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `nombre`, `apellido_1`, `apellido_2`, `sexo`, `fechaAlta`, `mail`, `movil`, `login`, `activo`, `pass`) VALUES
(1, 'Javier', 'Lasheras', 'Lacosta', 'H', '2020-10-05', 'jlasheras@svalero.com', '976466599', 'javier', 'N', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', 'administrador', '', 'H', '2020-10-01', 'admin@svalero.com', '976466590', 'admin', 'S', '202cb962ac59075b964b07152d234b70'),
(103, 'Carine ', 'Schmitt', '', 'M', '2020-02-15', 'Schmitt@2si2020.es', '64103103', 'Schmitt', 'S', '202cb962ac59075b964b07152d234b70'),
(112, 'Jean', 'King', '', 'H', '2020-02-15', 'King@2si2020.es', '64112112', 'King', 'S', '202cb962ac59075b964b07152d234b70'),
(114, 'Peter', 'Ferguson', '', 'H', '2020-02-15', 'Ferguson@2si2020.es', '64114114', 'Ferguson', 'S', '202cb962ac59075b964b07152d234b70'),
(119, 'Janine ', 'Labrune', '', 'M', '2020-02-15', 'Labrune@2si2020.es', '64119119', 'Labrune', 'S', '202cb962ac59075b964b07152d234b70'),
(121, 'Jonas ', 'Bergulfsen', '', 'H', '2020-02-15', 'Bergulfsen@2si2020.es', '64121121', 'Bergulfsen', 'S', '202cb962ac59075b964b07152d234b70'),
(124, 'Susan', 'Nelson', '', 'H', '2020-02-15', 'Nelson@2si2020.es', '64124124', 'Nelson', 'S', '202cb962ac59075b964b07152d234b70'),
(125, 'Zbyszek ', 'Piestrzeniewicz', '', 'H', '2020-02-15', 'Piestrzeniewicz@2si2020.es', '64125125', 'Piestrzeniewicz', 'N', '202cb962ac59075b964b07152d234b70'),
(128, 'Roland', 'Keitel', '', 'H', '2020-02-15', 'Keitel@2si2020.es', '64128128', 'Keitel', 'S', '202cb962ac59075b964b07152d234b70'),
(129, 'Julie', 'Murphy', '', 'M', '2020-02-15', 'Murphy@2si2020.es', '64129129', 'Murphy', 'S', '202cb962ac59075b964b07152d234b70'),
(131, 'Kwai', 'Lee', '', 'H', '2020-02-15', 'Lee@2si2020.es', '64131131', 'Lee', 'N', '202cb962ac59075b964b07152d234b70'),
(141, 'Diego ', 'Freyre', '', 'H', '2020-02-15', 'Freyre@2si2020.es', '64141141', 'Freyre', 'S', '202cb962ac59075b964b07152d234b70'),
(144, 'Christina ', 'Berglund', '', 'M', '2020-02-15', 'Berglund@2si2020.es', '64144144', 'Berglund', 'N', '202cb962ac59075b964b07152d234b70'),
(145, 'Jytte ', 'Petersen', '', 'H', '2020-02-15', 'Petersen@2si2020.es', '64145145', 'Petersen', 'S', '202cb962ac59075b964b07152d234b70'),
(146, 'Mary ', 'Saveley', '', 'M', '2020-02-15', 'Saveley@2si2020.es', '64146146', 'Saveley', 'S', '202cb962ac59075b964b07152d234b70'),
(148, 'Eric', 'Natividad', '', 'H', '2020-02-15', 'Natividad@2si2020.es', '64148148', 'Natividad', 'N', '202cb962ac59075b964b07152d234b70'),
(151, 'Jeff', 'Young', '', 'H', '2020-02-15', 'Young@2si2020.es', '64151151', 'Young', 'S', '202cb962ac59075b964b07152d234b70'),
(157, 'Kelvin', 'Leong', '', 'H', '2020-02-15', 'Leong@2si2020.es', '64157157', 'Leong', 'S', '202cb962ac59075b964b07152d234b70'),
(161, 'Juri', 'Hashimoto', '', 'H', '2020-02-15', 'Hashimoto@2si2020.es', '64161161', 'Hashimoto', 'S', '202cb962ac59075b964b07152d234b70'),
(166, 'Wendy', 'Victorino', '', 'M', '2020-02-15', 'Victorino@2si2020.es', '64166166', 'Victorino', 'S', '202cb962ac59075b964b07152d234b70'),
(167, 'Veysel', 'Oeztan', '', 'H', '2020-02-15', 'Oeztan@2si2020.es', '64167167', 'Oeztan', 'N', '202cb962ac59075b964b07152d234b70'),
(168, 'Keith', 'Franco', '', 'H', '2020-02-15', 'Franco@2si2020.es', '64168168', 'Franco', 'S', '202cb962ac59075b964b07152d234b70'),
(169, 'Isabel ', 'de Castro', '', 'M', '2020-02-15', 'de Castro@2si2020.es', '64169169', 'de Castro', 'S', '202cb962ac59075b964b07152d234b70'),
(171, 'Martine ', 'Ranc', '', 'H', '2020-02-15', 'Ranc@2si2020.es', '64171171', 'Ranc', 'S', '202cb962ac59075b964b07152d234b70'),
(172, 'Marie', 'Bertrand', '', 'M', '2020-02-15', 'Bertrand@2si2020.es', '64172172', 'Bertrand', 'N', '202cb962ac59075b964b07152d234b70'),
(173, 'Jerry', 'Tseng', '', 'H', '2020-02-15', 'Tseng@2si2020.es', '64173173', 'Tseng', 'N', '202cb962ac59075b964b07152d234b70'),
(175, 'Julie', 'King2', '', 'M', '2020-02-15', 'King2@2si2020.es', '64175175', 'King2', 'S', '202cb962ac59075b964b07152d234b70'),
(177, 'Mory', 'Kentary', '', 'H', '2020-02-15', 'Kentary@2si2020.es', '64177177', 'Kentary', 'S', '202cb962ac59075b964b07152d234b70'),
(181, 'Michael', 'Frick', '', 'H', '2020-02-15', 'Frick4@2si2020.es', '64181181', 'Frick4', 'S', '202cb962ac59075b964b07152d234b70'),
(186, 'Matti', 'Karttunen', '', 'H', '2020-02-15', 'Karttunen@2si2020.es', '64186186', 'Karttunen', 'S', '202cb962ac59075b964b07152d234b70'),
(187, 'Rachel', 'Ashworth', '', 'M', '2020-02-15', 'Ashworth@2si2020.es', '64187187', 'Ashworth', 'S', '202cb962ac59075b964b07152d234b70'),
(189, 'Dean', 'Cassidy', '', 'H', '2020-02-15', 'Cassidy@2si2020.es', '64189189', 'Cassidy', 'S', '202cb962ac59075b964b07152d234b70'),
(198, 'Leslie', 'Taylor', '', 'M', '2020-02-15', 'Taylor@2si2020.es', '64198198', 'Taylor', 'S', '202cb962ac59075b964b07152d234b70'),
(201, 'Elizabeth', 'Devon', '', 'H', '2020-02-15', 'Devon@2si2020.es', '64201201', 'Devon', 'S', '202cb962ac59075b964b07152d234b70'),
(202, 'Yoshi ', 'Tamuri', '', 'H', '2020-02-15', 'Tamuri@2si2020.es', '64202202', 'Tamuri', 'S', '202cb962ac59075b964b07152d234b70'),
(204, 'Miguel', 'Barajas', '', 'H', '2020-02-15', 'Barajas@2si2020.es', '64204204', 'Barajas', 'S', '202cb962ac59075b964b07152d234b70'),
(205, 'Julie', 'Young', '', 'M', '2020-02-15', 'Young2@2si2020.es', '64205205', 'Young2', 'S', '202cb962ac59075b964b07152d234b70'),
(206, 'Brydey', 'Walker', '', 'H', '2020-02-15', 'Walker@2si2020.es', '64206206', 'Walker', 'N', '202cb962ac59075b964b07152d234b70'),
(209, 'Fréderique ', 'Citeaux', '', 'H', '2020-02-15', 'Citeaux@2si2020.es', '64209209', 'Citeaux', 'S', '202cb962ac59075b964b07152d234b70'),
(211, 'Mike', 'Gao', '', 'H', '2020-02-15', 'Gao@2si2020.es', '64211211', 'Gao', 'S', '202cb962ac59075b964b07152d234b70'),
(216, 'Eduardo ', 'Saavedra', '', 'H', '2020-02-15', 'Saavedra@2si2020.es', '64216216', 'Saavedra', 'N', '202cb962ac59075b964b07152d234b70'),
(219, 'Mary', 'Young', '', 'M', '2020-02-15', 'Young3@2si2020.es', '64219219', 'Young3', 'S', '202cb962ac59075b964b07152d234b70'),
(223, 'Horst ', 'Kloss', '', 'H', '2020-02-15', 'Kloss@2si2020.es', '64223223', 'Kloss', 'N', '202cb962ac59075b964b07152d234b70'),
(227, 'Palle', 'Ibsen', '', 'H', '2020-02-15', 'Ibsen@2si2020.es', '64227227', 'Ibsen', 'S', '202cb962ac59075b964b07152d234b70'),
(233, 'Jean ', 'Fresni?re', '', 'H', '2020-02-15', 'Fresni?re@2si2020.es', '64233233', 'Fresni?re', 'S', '202cb962ac59075b964b07152d234b70'),
(237, 'Alejandra ', 'Camino', '', 'M', '2020-02-15', 'Camino@2si2020.es', '64237237', 'Camino', 'S', '202cb962ac59075b964b07152d234b70'),
(239, 'Valarie', 'Thompson', '', 'M', '2020-02-15', 'Thompson2@2si2020.es', '64239239', 'Thompson2', 'S', '202cb962ac59075b964b07152d234b70'),
(240, 'Helen ', 'Bennett', '', 'M', '2020-02-15', 'Bennett@2si2020.es', '64240240', 'Bennett', 'S', '202cb962ac59075b964b07152d234b70'),
(242, 'Annette ', 'Roulet', '', 'M', '2020-02-15', 'Roulet@2si2020.es', '64242242', 'Roulet', 'S', '202cb962ac59075b964b07152d234b70'),
(247, 'Renate ', 'Messner', '', 'H', '2020-02-15', 'Messner@2si2020.es', '64247247', 'Messner', 'S', '202cb962ac59075b964b07152d234b70'),
(249, 'Paolo', 'Accortini', '', 'H', '2020-02-15', 'Accorti@2si2020.es', '64249249', 'Accorti', 'S', '202cb962ac59075b964b07152d234b70'),
(250, 'Daniel', 'Da Silva', '', 'H', '2020-02-15', 'Da Silva@2si2020.es', '64250250', 'Da Silva', 'S', '202cb962ac59075b964b07152d234b70'),
(256, 'Daniel ', 'Tonini', '', 'H', '2020-02-15', 'Tonini@2si2020.es', '64256256', 'Tonini', 'S', '202cb962ac59075b964b07152d234b70'),
(259, 'Henriette ', 'Pfalzheim', '', 'H', '2020-02-15', 'Pfalzheim@2si2020.es', '64259259', 'Pfalzheim', 'S', '202cb962ac59075b964b07152d234b70'),
(260, 'Elizabeth ', 'Lincoln', '', 'M', '2020-02-15', 'Lincoln@2si2020.es', '64260260', 'Lincoln', 'S', '202cb962ac59075b964b07152d234b70'),
(273, 'Peter ', 'Franken', '', 'H', '2020-02-15', 'Franken@2si2020.es', '64273273', 'Franken', 'S', '202cb962ac59075b964b07152d234b70'),
(276, 'Anna', 'O\'Hara', '', 'M', '2020-02-15', 'O\'Hara@2si2020.es', '64276276', 'O\'Hara', 'S', '202cb962ac59075b964b07152d234b70'),
(278, 'Giovanni ', 'Rovelli', '', 'H', '2020-02-15', 'Rovelli@2si2020.es', '64278278', 'Rovelli', 'S', '202cb962ac59075b964b07152d234b70'),
(282, 'Adrian', 'Huxley', '', 'H', '2020-02-15', 'Huxley@2si2020.es', '64282282', 'Huxley', 'S', '202cb962ac59075b964b07152d234b70'),
(286, 'Marta', 'Hernandez', '', 'M', '2020-02-15', 'Hernandez3@2si2020.es', '64286286', 'Hernandez3', 'N', '202cb962ac59075b964b07152d234b70'),
(293, 'Ed', 'Harrison', '', 'H', '2020-02-15', 'Harrison@2si2020.es', '64293293', 'Harrison', 'N', '202cb962ac59075b964b07152d234b70'),
(298, 'Mihael', 'Holz', '', 'H', '2020-02-15', 'Holz@2si2020.es', '64298298', 'Holz', 'S', '202cb962ac59075b964b07152d234b70'),
(299, 'Jan', 'Klaeboe', '', 'H', '2020-02-15', 'Klaeboe@2si2020.es', '64299299', 'Klaeboe', 'S', '202cb962ac59075b964b07152d234b70'),
(303, 'Bradley', 'Schuyler', '', 'H', '2020-02-15', 'Schuyler@2si2020.es', '64303303', 'Schuyler', 'S', '202cb962ac59075b964b07152d234b70'),
(307, 'Mel', 'Andersen', '', 'H', '2020-02-15', 'Andersen@2si2020.es', '64307307', 'Andersen', 'N', '202cb962ac59075b964b07152d234b70'),
(311, 'Pirkko', 'Koskitalo', '', 'H', '2020-02-15', 'Koskitalo@2si2020.es', '64311311', 'Koskitalo', 'S', '202cb962ac59075b964b07152d234b70'),
(314, 'Catherine ', 'Dewey', '', 'H', '2020-02-15', 'Dewey@2si2020.es', '64314314', 'Dewey', 'S', '202cb962ac59075b964b07152d234b70'),
(319, 'Steve', 'Frick', '', 'H', '2020-02-15', 'Frick2@2si2020.es', '64319319', 'Frick2', 'S', '202cb962ac59075b964b07152d234b70'),
(320, 'Wing', 'Huang', '', 'H', '2020-02-15', 'Huang@2si2020.es', '64320320', 'Huang', 'S', '202cb962ac59075b964b07152d234b70'),
(321, 'Julie', 'Brown', '', 'M', '2020-02-15', 'Brown@2si2020.es', '64321321', 'Brown', 'S', '202cb962ac59075b964b07152d234b70'),
(323, 'Mike', 'Graham', '', 'H', '2020-02-15', 'Graham@2si2020.es', '64323323', 'Graham', 'S', '202cb962ac59075b964b07152d234b70'),
(324, 'Ann ', 'Brown', '', 'M', '2020-02-15', 'Brown2@2si2020.es', '64324324', 'Brown2', 'S', '202cb962ac59075b964b07152d234b70'),
(328, 'William', 'Brown', '', 'H', '2020-02-15', 'Brown3@2si2020.es', '64328328', 'Brown3', 'S', '202cb962ac59075b964b07152d234b70'),
(333, 'Ben', 'Calaghan', '', 'H', '2020-02-15', 'Calaghan@2si2020.es', '64333333', 'Calaghan', 'S', '202cb962ac59075b964b07152d234b70'),
(334, 'Kalle', 'Suominen', '', 'H', '2020-02-15', 'Suominen@2si2020.es', '64334334', 'Suominen', 'S', '202cb962ac59075b964b07152d234b70'),
(335, 'Philip ', 'Cramer', '', 'H', '2020-02-15', 'Cramer@2si2020.es', '64335335', 'Cramer', 'S', '202cb962ac59075b964b07152d234b70'),
(339, 'Francisca', 'Cervantes', '', 'M', '2020-02-15', 'Cervantes@2si2020.es', '64339339', 'Cervantes', 'S', '202cb962ac59075b964b07152d234b70'),
(344, 'Jesus', 'Fernandez', '', 'H', '2020-02-15', 'Fernandez@2si2020.es', '64344344', 'Fernandez', 'S', '202cb962ac59075b964b07152d234b70'),
(347, 'Brian', 'Chandler', '', 'H', '2020-02-15', 'Chandler@2si2020.es', '64347347', 'Chandler', 'S', '202cb962ac59075b964b07152d234b70'),
(348, 'Patricia ', 'McKenna', '', 'M', '2020-02-15', 'McKenna@2si2020.es', '64348348', 'McKenna', 'S', '202cb962ac59075b964b07152d234b70'),
(350, 'Laurence ', 'Lebihan', '', 'H', '2020-02-15', 'Lebihan@2si2020.es', '64350350', 'Lebihan', 'N', '202cb962ac59075b964b07152d234b70'),
(353, 'Paul ', 'Henriot', '', 'H', '2020-02-15', 'Henriot@2si2020.es', '64353353', 'Henriot', 'S', '202cb962ac59075b964b07152d234b70'),
(356, 'Armand', 'Kuger', '', 'H', '2020-02-15', 'Kuger@2si2020.es', '64356356', 'Kuger', 'S', '202cb962ac59075b964b07152d234b70'),
(357, 'Wales', 'MacKinlay', '', 'H', '2020-02-15', 'MacKinlay@2si2020.es', '64357357', 'MacKinlay', 'S', '202cb962ac59075b964b07152d234b70'),
(361, 'Karin', 'Josephs', '', 'H', '2020-02-15', 'Josephs@2si2020.es', '64361361', 'Josephs', 'S', '202cb962ac59075b964b07152d234b70'),
(362, 'Juri', 'Yoshido', '', 'H', '2020-02-15', 'Yoshido@2si2020.es', '64362362', 'Yoshido', 'N', '202cb962ac59075b964b07152d234b70'),
(363, 'Dorothy', 'Young', '', 'M', '2020-02-15', 'Young4@2si2020.es', '64363363', 'Young4', 'S', '202cb962ac59075b964b07152d234b70'),
(369, 'Lino ', 'Rodriguez', '', 'H', '2020-02-15', 'Rodriguez@2si2020.es', '64369369', 'Rodriguez', 'S', '202cb962ac59075b964b07152d234b70'),
(376, 'Braun', 'Urs', '', 'H', '2020-02-15', 'Urs@2si2020.es', '64376376', 'Urs', 'S', '202cb962ac59075b964b07152d234b70'),
(379, 'Allen', 'Nelson', '', 'H', '2020-02-15', 'Nelson2@2si2020.es', '64379379', 'Nelson2', 'S', '202cb962ac59075b964b07152d234b70'),
(381, 'Pascale ', 'Cartrain', '', 'H', '2020-02-15', 'Cartrain@2si2020.es', '64381381', 'Cartrain', 'S', '202cb962ac59075b964b07152d234b70'),
(382, 'Georg ', 'Pipps', '', 'H', '2020-02-15', 'Pipps@2si2020.es', '64382382', 'Pipps', 'S', '202cb962ac59075b964b07152d234b70'),
(385, 'Arnold', 'Cruz', '', 'H', '2020-02-15', 'Cruz@2si2020.es', '64385385', 'Cruz', 'S', '202cb962ac59075b964b07152d234b70'),
(386, 'Maurizio ', 'Moroni', '', 'H', '2020-02-15', 'Moroni@2si2020.es', '64386386', 'Moroni', 'S', '202cb962ac59075b964b07152d234b70'),
(398, 'Akiko', 'Shimamura', '', 'H', '2020-02-15', 'Shimamura@2si2020.es', '64398398', 'Shimamura', 'S', '202cb962ac59075b964b07152d234b70'),
(406, 'Dominique', 'Perrier', '', 'H', '2020-02-15', 'Perrier@2si2020.es', '64406406', 'Perrier', 'S', '202cb962ac59075b964b07152d234b70'),
(409, 'Rita ', 'MÍller', '', 'M', '2020-02-15', 'M?ller@2si2020.es', '64409409', 'MIller', 'S', '202cb962ac59075b964b07152d234b70'),
(412, 'Sarah', 'McRoy', '', 'M', '2020-02-15', 'McRoy@2si2020.es', '64412412', 'McRoy', 'S', '202cb962ac59075b964b07152d234b70'),
(415, 'Michael', 'Donnermeyer', '', 'H', '2020-02-15', 'Donnermeyer@2si2020.es', '64415415', 'Donnermeyer', 'S', '202cb962ac59075b964b07152d234b70'),
(424, 'Maria', 'Hernandez', '', 'M', '2020-02-15', 'Hernandez2@2si2020.es', '64424424', 'Hernandez2', 'S', '202cb962ac59075b964b07152d234b70'),
(443, 'Alexander ', 'Feuer', '', 'H', '2020-02-15', 'Feuer@2si2020.es', '64443443', 'Feuer', 'S', '202cb962ac59075b964b07152d234b70'),
(447, 'Dan', 'Lewis', '', 'H', '2020-02-15', 'Lewis@2si2020.es', '64447447', 'Lewis', 'S', '202cb962ac59075b964b07152d234b70'),
(448, 'Martha', 'Larsson', '', 'M', '2020-02-15', 'Larsson@2si2020.es', '64448448', 'Larsson', 'S', '202cb962ac59075b964b07152d234b70'),
(450, 'Sue', 'Frick', '', '', '2020-02-15', 'Frick3@2si2020.es', '64450450', 'Frick3', 'S', '202cb962ac59075b964b07152d234b70'),
(452, 'Roland ', 'Mendel', '', 'H', '2020-02-15', 'Mendel@2si2020.es', '64452452', 'Mendel', 'S', '202cb962ac59075b964b07152d234b70'),
(455, 'Leslie', 'Murphy', '', 'M', '2020-02-15', 'Murphy2@2si2020.es', '64455455', 'Murphy2', 'S', '202cb962ac59075b964b07152d234b70'),
(456, 'Yu', 'Choi', '', 'H', '2020-02-15', 'Choi@2si2020.es', '64456456', 'Choi', 'S', '202cb962ac59075b964b07152d234b70'),
(458, 'Martín ', 'Sommer', '', 'H', '2020-02-15', 'Sommer@2si2020.es', '64458458', 'Sommer', 'S', '202cb962ac59075b964b07152d234b70'),
(459, 'Sven ', 'Ottlieb', '', 'H', '2020-02-15', 'Ottlieb@2si2020.es', '64459459', 'Ottlieb', 'S', '202cb962ac59075b964b07152d234b70'),
(462, 'Violeta', 'Benitez', '', 'M', '2020-02-15', 'Benitez@2si2020.es', '64462462', 'Benitez', 'S', '202cb962ac59075b964b07152d234b70'),
(465, 'Carmen', 'Anton', '', 'H', '2020-02-15', 'Anton@2si2020.es', '64465465', 'Anton', 'S', '202cb962ac59075b964b07152d234b70'),
(471, 'Sean', 'Clenahan', '', 'H', '2020-02-15', 'Clenahan@2si2020.es', '64471471', 'Clenahan', 'S', '202cb962ac59075b964b07152d234b70'),
(473, 'Franco', 'Ricotti', '', 'H', '2020-02-15', 'Ricotti@2si2020.es', '64473473', 'Ricotti', 'S', '202cb962ac59075b964b07152d234b70'),
(475, 'Steve', 'Thompson', '', 'H', '2020-02-15', 'Thompson3@2si2020.es', '64475475', 'Thompson3', 'S', '202cb962ac59075b964b07152d234b70'),
(477, 'Hanna ', 'Moos', '', 'M', '2020-02-15', 'Moos@2si2020.es', '64477477', 'Moos', 'S', '202cb962ac59075b964b07152d234b70'),
(480, 'Alexander ', 'Semenov', '', 'H', '2020-02-15', 'Semenov@2si2020.es', '64480480', 'Semenov', 'S', '202cb962ac59075b964b07152d234b70'),
(481, 'Raanan', 'Altagar,G M', '', 'H', '2020-02-15', 'Altagar,G M@2si2020.es', '64481481', 'Altagar,G M', 'N', '202cb962ac59075b964b07152d234b70'),
(484, 'José Pedro ', 'Roel', '', 'H', '2020-02-15', 'Roel@2si2020.es', '64484484', 'Roel', 'S', '202cb962ac59075b964b07152d234b70'),
(486, 'Rosa', 'Salazar', '', 'M', '2020-02-15', 'Salazar@2si2020.es', '64486486', 'Salazar', 'S', '202cb962ac59075b964b07152d234b70'),
(487, 'Sue', 'Taylor', '', 'M', '2020-02-15', 'Taylor2@2si2020.es', '64487487', 'Taylor2', 'S', '202cb962ac59075b964b07152d234b70'),
(489, 'Thomas ', 'Smith', '', 'H', '2020-02-15', 'Smith@2si2020.es', '64489489', 'Smith', 'S', '202cb962ac59075b964b07152d234b70'),
(495, 'Valarie', 'Franco', '', 'M', '2020-02-15', 'Franco2@2si2020.es', '64495495http://', 'Franco2', 'S', '202cb962ac59075b964b07152d234b70'),
(496, 'Tony', 'Snowden', '', 'H', '2020-02-15', 'Snowden@2si2020.es', '64496496', 'Snowden', 'N', '202cb962ac59075b964b07152d234b70'),
(500, 'emilito', '', '', '', NULL, '', '', 'emilito', 'S', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app_permisos`
--
ALTER TABLE `app_permisos`
  ADD PRIMARY KEY (`id_permisos`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app_permisos`
--
ALTER TABLE `app_permisos`
  MODIFY `id_permisos` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
