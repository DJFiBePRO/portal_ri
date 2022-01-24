-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 18:49:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_vinculacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authority`
--

CREATE TABLE `authority` (
  `authority_id` int(10) UNSIGNED NOT NULL,
  `authority_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority_last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority_cv` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authority_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authority_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `authority_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authority_type` int(10) UNSIGNED NOT NULL,
  `authority_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authority`
--

INSERT INTO `authority` (`authority_id`, `authority_name`, `authority_last_name`, `authority_cv`, `authority_photo`, `authority_create`, `authority_update`, `authority_type`, `authority_management_area`) VALUES
(1, 'Nombre', 'Apellido', '', 'usuariom.png', '2017-08-16 20:28:24', '2019-05-11 00:26:02', 1, 1),
(3, 'Nombre', 'Apellido', NULL, 'usuario.png', '2019-05-11 00:26:18', '2019-05-11 00:26:41', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authority_type`
--

CREATE TABLE `authority_type` (
  `authority_type_id` int(10) UNSIGNED NOT NULL,
  `authority_type_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authority_type`
--

INSERT INTO `authority_type` (`authority_type_id`, `authority_type_description`) VALUES
(1, 'DIRECTOR RELACIONES INTERNACIONALES'),
(2, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_state` tinyint(4) NOT NULL,
  `category_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_parent` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `category_description`, `category_state`, `category_create`, `category_update`, `category_parent`) VALUES
(1, 'DOCUMENTACION', 1, '2017-12-02 01:35:24', '2017-12-02 01:35:24', NULL),
(2, 'textos', 1, '2017-12-02 01:35:58', '2017-12-02 01:35:58', 1),
(3, 'Hijo', 1, '2018-03-08 21:00:25', '2018-03-08 21:00:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conventions`
--

CREATE TABLE `conventions` (
  `conventions_id` int(10) UNSIGNED NOT NULL,
  `conventions_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `conventions_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `conventions_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conventions_state` tinyint(4) NOT NULL,
  `conventions_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `conventions_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conventions_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conventions`
--

INSERT INTO `conventions` (`conventions_id`, `conventions_name`, `conventions_type`, `conventions_file`, `conventions_state`, `conventions_create`, `conventions_update`, `conventions_management_area`) VALUES
(1, 'Tercera edicion', 'Informe Anual', 'Iglesia San Antonio Loma de Quito.pdf', 0, '2017-12-02 01:24:54', '2017-12-02 01:25:23', 1),
(2, 'asdasdasdadsasd asd aweqwe qweq', 'Convenio', 'SILABO ETICA Y LIDERAZGO MAYO 2016.docx', 0, '2018-03-08 20:40:15', '2018-05-31 00:39:51', 1),
(3, 'El convenio de GADM Riobamba en conjunto con la ESPOCH', 'Convenio', '', 0, '2018-05-31 02:11:27', '2018-05-31 02:11:32', 1),
(4, 'Convenio de colaboración entre la Escuela Superior Politécnica de Chimborazo (Ecuador) y la Cámara Internacional de Comercio Exterior (España) 011.CP.2017', 'Convenio', '', 1, '2018-05-31 02:49:15', '2018-05-30 21:50:11', 1),
(9, 'Convenio de colaboración entre la Universidad Santiago de Compostela (España) y la Escuela Superior Politécnica de Chimborazo (Ecuador) 012.CP.2017', 'Convenio', '', 1, '2018-05-31 02:51:49', '2018-05-31 02:51:49', 1),
(10, 'Convenio Marco de Cooperación Interinstitucional entre el Ministerio de Agricultura, Ganaderia, Acuacultura y Pesca (MAGAP) y la Escuela Superior Politécnica de Chimborazo (ESPOCH) 013.CP.2017', 'Convenio', '', 1, '2018-05-31 02:52:36', '2018-05-31 19:04:31', 1),
(11, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Secretaria de Agua 014.CP.2017', 'Convenio', '', 0, '2018-05-31 02:55:39', '2018-05-31 03:05:14', 1),
(12, 'Convenio específico de Cooperación Investigativa entre el Centro Experimental de Riego de la ESPOCH y el Instituto Nacional Autónomo de Investigaciones Agropecuarias - INIAP. 015.CP.2017', 'Convenio', '', 0, '2018-05-31 02:59:57', '2018-05-31 03:05:23', 1),
(13, 'Convenio de Cooperación Técnica entre el Instituto Nacional de Investigaciones Agropecuarias (INIAP) y la Escuela Superior Politénica de Chimborazo (ESPOCH) 014.CP.2017', 'Convenio', '', 1, '2018-05-31 03:04:42', '2018-05-31 03:04:42', 1),
(14, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Secretaria de Agua 015.CP.2017', 'Convenio', '', 1, '2018-05-31 03:09:58', '2018-05-31 03:09:58', 1),
(15, 'Convenio específico de Cooperación Investigativa entre el Centro Experimental de Riego de la ESPOCH y el Instituto Nacional Autónomo de Investigaciones Agropecuarias - INIAP. 016.CP.2017', 'Convenio', '', 1, '2018-05-31 03:15:50', '2018-05-31 19:24:54', 1),
(16, 'Convenio Marco a Suscribirse entre el Instituto Ecuatoriano de Seguridad Social (IESS) y la Universidad para Programas de Pasantías Rotativo y Becas de Posgrado 017.CP.2017', 'Convenio', '', 1, '2018-05-31 03:21:22', '2018-05-31 03:21:22', 1),
(17, 'Convenio Marco de Colaboración Interinstitucional entre la Escuela Superior Politécnica de Chimborazo de Ecuador y el Instituto de Ciencia Animal de Cuba 018.CP.2017', 'Convenio', '', 1, '2018-05-31 03:24:01', '2018-05-31 03:24:01', 1),
(18, 'Convenio de Cooperación Académica y Cultural entre la Escuela Superior Politécnica de Chimborazo y la Universidad Nuevo México 019.CP.2017', 'Convenio', '', 1, '2018-05-31 03:26:40', '2018-05-31 03:26:40', 1),
(19, 'Convenio de Cooperación Interinstitucional entre la Escuela Superior Politecnica de Chimborazo, Riobamba, Ecuador y el Consejo de Regentes del Sistema Universitario de Georgia, Athens, Georgia, Estados Unidos 023.CP.2017', 'Convenio', '', 1, '2018-05-31 03:29:44', '2018-05-31 03:29:44', 1),
(20, 'Convenio Marco de Cooperación Interinstitucional entre el Consejo de Participación Ciudadana y Control Social y la Escuela Superior Politécnica de Chimborazo 051.CP.2017', 'Convenio', '', 1, '2018-05-31 03:32:36', '2018-05-31 03:32:36', 1),
(21, 'Convenio Marco de Cooperación Interinstitucional entre la Fundación Charity Anywhere y la Escuela Superior Politécnica de Chimborazo, a través de la Facultad de Salud Pública y la Escuela de Educación para la Salud, para el Desarrollo de Actividades de Salud 070.CP.2017', 'Convenio', '', 1, '2018-05-31 03:36:42', '2018-05-31 03:36:42', 1),
(22, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo (ESPOCH) y el Gobierno Autónomo Descentralizado Municipal del Cantón Chambo “GADMCH” 072.CP.2016', 'Convenio', '', 1, '2018-05-31 03:41:42', '2018-05-31 03:41:42', 1),
(23, 'Convenio de Cooperación Institucional entre la Escuela Superior Politécnica de Chimborazo y la Dirección Provincial Agropecuaria de Tungurahua – “MAGAP” 073.CP.2017', 'Convenio', '', 1, '2018-05-31 03:44:19', '2018-05-31 03:44:19', 1),
(24, 'Convenio Específico de Prácticas Pre Profesionales entre la Agencia de Regulación y Control de las Telecomunicaciones y la Escuela Superior Politécnica de Chimborazo (ESPOCH) 074.CP.2017', 'Convenio', '', 1, '2018-05-31 03:48:07', '2018-05-31 03:48:07', 1),
(25, 'Convenio Marco de Cooperación Interinstitucional entre el Centro de Entrenamiento Gerencial C.E.G-FEDEXPOR y la Escuela Superior Politécnica de Chimborazo 075.CP.2017', 'Convenio', '', 1, '2018-05-31 03:51:02', '2018-05-31 03:51:02', 1),
(26, 'Convenio de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo (ESPOCH) y la Corporación Nacional de Telecomunicaciones CNT ep 076.CP.2017', 'Convenio', '', 1, '2018-05-31 18:27:35', '2018-05-31 18:27:35', 1),
(27, 'Carta de Intención de Cooperación Académica entre el Hospital Andino de Chimborazo y la Escuela Superior Politécnica de Chimborazo, Facultad de Ciencias- Escuela de Bioquimica y Farmacia 077.CP.2017', 'Convenio', '', 1, '2018-05-31 18:29:35', '2018-05-31 18:29:35', 1),
(28, 'Convenio de Cooperación Interinstitucional entre la Fundación Ecos Educación con Oportunidad y Servicio y la Escuela Superior Politécnica de Chimborazo 092.CP.2017', 'Convenio', '', 1, '2018-05-31 18:31:05', '2018-05-31 18:31:05', 1),
(29, 'Convenio Marco de Cooperación y Reciprocidad Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Unión Nacional de Asociaciones de Pequeños Productores Agropecuarios Certificados en Comercio Justo Ecuador, CEJ 093.CP.2017', 'Convenio', '', 1, '2018-05-31 18:33:45', '2018-05-31 18:33:45', 1),
(30, 'Convenio Marco de Cooperación Interinstitucional entre el Consejo Nacional de Gobiernos Parroquiales Rurales de Chimborazo y la Escuela Superior Politécnica de Chimborazo 094.CP.2017', 'Convenio', '', 1, '2018-05-31 18:35:14', '2018-05-31 18:35:14', 1),
(31, 'Convenio de Cooperación Interinstitucional para Prácticas Pre-Profesionales, Investigación y Desarrollo de Trabajos de Titulación Celebrado entre la Escuela Superior Politécnica de Chimborazo (ESPOCH) y el Vicariato Apostólico de Aguarico – Laboratorio LABSU 096.CP.2017', 'Convenio', '', 1, '2018-05-31 18:38:10', '2018-05-31 18:38:10', 1),
(32, 'Convenio de Cooperación Interinstitucional para Prácticas Pre-Profesionales, Investigación y Desarrollo de Trabajos de Titulación, celebrado entre la Escuela Superior Politécnica de Chimborazo (ESPOCH) y AQLAB Laboratorios de Análisis y Evaluación Ambiental 096.CP.2017', 'Convenio', '', 1, '2018-05-31 18:40:58', '2018-05-31 18:40:58', 1),
(33, 'Convenio de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Coordinación Zonal 3 del Ministerio de Turismo 097.CP.2017', 'Convenio', '', 1, '2018-05-31 18:45:36', '2018-05-31 18:45:36', 1),
(34, 'Convenio Ampliatorio al Convenio Especifico de Transferencia de Recursos N° 20140067CI, Celebrado en la Secretaría de Educación Superior, Ciencia, Tecnollogía e Innovación y la Escuela Superior Politécnica de Chimborazo 098.CP.2017', 'Convenio', '', 1, '2018-05-31 18:48:41', '2018-05-31 18:48:41', 1),
(35, 'Convenio Marco entre la Facultad de Ingenieria de la Universidad de Buenos Aires (Argentina) y la Escuela Superior Politécnica de Chimborazo (Ecuador) 138.CP.2017', 'Convenio', '', 1, '2018-05-31 18:50:23', '2018-05-31 18:50:23', 1),
(36, 'Convenio específico de Colaboración entre la Fundación Charles Darwin para las Islas Galapagos y la Escuela Superior Politécnica de Chimborazo 139.CP.2017', 'Convenio', '', 1, '2018-05-31 18:52:12', '2018-05-31 19:25:23', 1),
(37, 'Convenio Marco de Cooperación Interinstitucional entre el Consorcio Bloque 28 y la Escuela Superior Politécnica de Chimborazo 140.CP.2017', 'Convenio', '', 1, '2018-05-31 18:53:38', '2018-05-31 18:53:38', 1),
(38, 'Convenio específico de Cooperación Cientifica e Investigación entre la Universidad Nacional de Chimborazo y la Escuela Superior Politécnica de Chimborazo 141.CP.2017', 'Convenio', '', 1, '2018-05-31 18:55:05', '2018-05-31 19:25:46', 1),
(39, 'Convenio General de Cooperación Interinstitucional entre la Facultad de Recursos Naturales de la Escuela Superior Politécnica de Chimborazo y la Corporación para el Desarrollo de Turismo Comunitario de Chimborazo 142.CP.2017', 'Convenio', '', 1, '2018-05-31 19:02:27', '2018-05-31 19:02:27', 1),
(40, 'Convenio Marco de Colaboración Académica Cientifica y Cultural entre la Escuela Superior Politécnica de Chimborazo y la Universidad Tecnologica de la Habana Jose Antonio Echeverria (CUJAE) 143.CP.2017', 'Convenio', '', 1, '2018-05-31 19:07:09', '2018-05-31 19:07:57', 1),
(41, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Coordinación Zonal de Educación Zona 3. 146.CP.2017', 'Convenio', '', 1, '2018-05-31 19:09:45', '2018-05-31 19:09:45', 1),
(42, 'Convenio de colaboración entre la Escuela Superior Politécnica de Chimborazo (Ecuador) y la Cámara Internacional de Comercio Exterior (España) 147.CP.2017', 'Convenio', '', 1, '2018-05-31 19:11:49', '2018-05-31 19:11:49', 1),
(43, 'Convenio Marco Cooperación interinstitucional entre la Escuela Superior Politécnica de Chimborazo- ESPOCH y la Red Iberoamericana de Medio Ambiente-REIMA 148.CP.2017', 'Convenio', '', 1, '2018-05-31 19:22:33', '2018-05-31 19:22:33', 1),
(44, 'Acuerdo específico entre la Escuela Superior Politécnica de Chimborazo y la Universidad de Ciencias Forestales-U-ESNACIFOR 148A.CP.2017', 'Convenio', '', 1, '2018-05-31 19:24:33', '2018-05-31 19:24:33', 1),
(45, 'Convenio de Cooperación Interinstitucional de Uso de Instalaciones entre el Servicio Ecuatoriano de Capacitación Profesional SECAP y la Escuela Superior Politécnica de Chimborazo 173.CP.2017', 'Convenio', '', 1, '2018-05-31 19:28:07', '2018-05-31 19:28:07', 1),
(46, 'Convenio Marco de Cooperación entre la Escuela Superior Politécnica de Chimborazo, Ecuador y la Universidad de la Habana, Cuba 174.CP.2017', 'Convenio', '', 1, '2018-05-31 19:30:01', '2018-05-31 19:30:01', 1),
(47, 'Convenio de Cooperación Educativa entre la Universidad Internacional de la RIOJA-UNIR y la Escuela Superior Politécnica de Chimborazo” 198.CP.2017', 'Convenio', '', 1, '2018-05-31 19:31:56', '2018-05-31 19:31:56', 1),
(48, 'Convenio Marco de Cooperación Interinstitucional entre la Asociación de Trabajadores Agropecuarios y Productores de Semilla de Alfalfa “la Providencia los Pungales” y la Escuela Superior Politécnica de Chimborazo 199.CP.2017', 'Convenio', '', 1, '2018-05-31 19:34:16', '2018-05-31 19:34:16', 1),
(49, 'Convenio Marco de Colaboración Interinstitucional entre la Universidad de Aguas Calientes (Mexico) y la Escuela Superior Politécnica de Chimborazo (Ecuador)” 200.CP.2017', 'Convenio', '', 1, '2018-05-31 19:35:40', '2018-05-31 19:35:40', 1),
(50, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y el Centro Agrícola Cantonal de Riobamba 201.CP.2017', 'Convenio', '', 1, '2018-05-31 19:37:17', '2018-05-31 19:37:17', 1),
(51, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo – Ecuador y la Universidad de Córdoba – España 213.CP.2017', 'Convenio', '', 1, '2018-05-31 19:40:09', '2018-05-31 19:40:09', 1),
(52, 'Convenio específico de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo, el Ministerio de Ambiente Dirección Provincial de Chimborazo y el Consorcio Ecuatoriano para el Desarrollo de Internet Avanzado, para la Ejecución del Proyecto - Diseño de un Simulador Virtual de Incendios Forestales en la Provincia de Chimborazo 214.CP.2017', 'Convenio', '', 1, '2018-05-31 19:46:05', '2018-05-31 19:46:05', 1),
(53, 'Convenio Marco de Cooperación Interinstitucional Celebrando entre el Ministerio de Agricultura, Ganadería, Acuacultura y Pesca – MAGAP y la Escuela Superior Politécnica de Chimborazo – ESPOCH. 215.CP.2017', 'Convenio', '', 1, '2018-05-31 19:49:02', '2018-05-31 19:49:02', 1),
(54, 'Aprobar la reforma de la Resolución Nº. 200.CP.2017, de fecha 18 de abril del año 2017, quedando el nombre del convenio de la siguiente manera: Convenio Marco de Colaboración Interinstitucional entre la Universidad Politécnica de Aguas Calientes (Mexico) y la Escuela Superior Politécnica de Chimborazo (Ecuador) 216.CP.2017', 'Convenio', '', 1, '2018-05-31 19:52:34', '2018-06-01 19:26:10', 1),
(55, 'Convenio específico de Colaboración Interinstitucional entre el Instituto de Farmacia y Alimentos de la Universidad de la Habana (Cuba) y la Facultad de Ciencias de la Escuela Superior Politécnica de Chimborazo (Ecuador) 217.CP.2017', 'Convenio', '', 1, '2018-05-31 19:56:56', '2018-05-31 19:56:56', 1),
(56, 'Convenio específico de Cooperación Interinstitucional entre el Ministerio de Salud - Coordinación Zonal 3 Salud; y la Escuela Superior Politécnica de Chimborazo con la Escuela de Educación para la Salud, Escuela de Nutrición y Dietética, Escuela de Gastronomía, Escuela de Medicina. 218.CP.2017', 'Convenio', '', 1, '2018-05-31 19:59:52', '2018-05-31 19:59:52', 1),
(57, 'Aprobar la reforma a la Resolución Nº. 288.CP.2016, de fecha 04 de octubre del año 2016, en la que se resolvió: aprobar y ratificar los términos del \"Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo – Ecuador y Universidad Veracruzana – Mexico” y designar como nuevo coordinador de dicho compromiso al Ing. Danilo Mauricio Pástor, Msc. Profesor de la Facultad de Ciencias. 219.CP.2017', 'Convenio', '', 1, '2018-05-31 20:06:15', '2018-06-01 19:24:54', 1),
(58, 'Convenio de Cooperación Interinstitucional entre la Federación Deportiva de Chimborazo y la Escuela Superior Politécnica de Chimborazo 260.CP.2017', 'Convenio', '', 1, '2018-05-31 20:25:58', '2018-05-31 20:25:58', 1),
(59, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo “ESPOCH” y el Gobierno Autónomo Descentralizado Municipal del Cantón Chambo “GADMCH” 261.CP.2017', 'Convenio', '', 1, '2018-05-31 20:29:02', '2018-05-31 20:29:02', 1),
(60, 'Convenio específico de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo, el Ministerio de Ambiente Dirección Provincial de chimborazo y el Consorcio Ecuatoriano para Desarrollo de Internet Avanzado, para la Ejecución del Proyecto “Diseño de un Simulador Virtual de Incendios Forestales en la Provincia de Chimborazo” 262.CP.2017', 'Convenio', '', 1, '2018-05-31 20:32:28', '2018-05-31 20:32:28', 1),
(61, 'Aprobar la Reforma de la Resolución Nº. 070.CP.2017, de fecha 07 de febrero del año 2017, en la que se resolvió: aprobar y ratificar los términos del “Convenio Marco de Cooperación Interinstitucional entre la Fundación Charity Anywhere y la Escuela Superior Politécnica de Chimborazo, a través de la Facultad de Salud Pública y la Escuela de Educación para la Salud, para el desarrollo de actividades de salud” y designar como nueva coordinadora de dicho compromiso a la Dra. Martha Cecilia Mejía Paredes, Directora de la Escuela de Educación para la Salud. 227.CP.2017', 'Convenio', '', 1, '2018-05-31 20:36:05', '2018-05-31 20:36:05', 1),
(62, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo – Ecuador y la Fundación EKRURAL. 263.CP.2017', 'Convenio', '', 1, '2018-05-31 20:40:54', '2018-05-31 20:40:54', 1),
(63, 'Convenio Marco de Cooperación Interinstitucional Acuerdo de Compromiso entre la Facultad de Recursos Naturales de la Escuela Superior Politécnica de Chimborazo, la Secretaria Nacional del Agua – Demarcación Hidrográfica del Río Guayas-Centro de Atención Ciudadana Cañar, Consejo de la Cuenca Hidrográfica del Río Cañar. 264.CP.2017', 'Convenio', '', 1, '2018-05-31 20:43:59', '2018-05-31 20:43:59', 1),
(64, 'Convenio Marco de Cooperación Interinstitucional entre el Ministerio de Industrias y Productividad Zonal 2 y 3, y la Escuela Superior Politécnica de Chimborazo 265.CP.2017', 'Convenio', '', 1, '2018-05-31 20:45:29', '2018-05-31 20:45:29', 1),
(65, 'Convenio de Cooperación Interinstitucional entre el Ministerio de Electricidad y Energía Renovable “MEER” y la Escuela Superior Politécnica de Chimborazo “ESPOCH” 266.CP.2017', 'Convenio', '', 1, '2018-05-31 20:46:59', '2018-05-31 20:46:59', 1),
(66, 'Convenio de Pasantías entre la Unión Cementera Nacional UCEMC.E.M.- Planta Chimborazo y la Escuela Superior Politécnica de Chimborazo para el Ejercicio 2017. 267.CP.2017', 'Convenio', '', 1, '2018-05-31 20:50:20', '2018-05-31 20:50:20', 1),
(67, 'Convenio especifico de Colaboración Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Universidad Nuevo Mexico. 268.CP.2017', 'Convenio', '', 1, '2018-05-31 20:56:14', '2018-05-31 20:56:14', 1),
(68, 'Convenio Interinstitucional de Uso de Instalaciones, entre el Servicio Ecuatoriano de Capacitación Profesional SECAP y la Escuela Superior Politécnica de Chimborazo ESPOCH. 271.CP.2017', 'Convenio', '', 1, '2018-05-31 21:02:47', '2018-05-31 21:02:47', 1),
(69, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y el Instituto Nacional de Tecnología Agropecuario – INTA. 287.CP.2017', 'Convenio', '', 1, '2018-05-31 21:05:46', '2018-05-31 21:05:46', 1),
(70, 'Convenio de Cooperación Interinstitucional entre el Instituto Tecnológico Superior Tena y la Escuela Superior Politécnica de Chimborazo. 288.CP.2017', 'Convenio', '', 1, '2018-05-31 21:10:02', '2018-05-31 21:10:02', 1),
(71, 'Convenio Marco de Cooperación Técnica entre la Escuela Superior Politécnica de Chimborazo y el Gobierno Autónomo Provincial de Morona Santiago. 292.CP.2017', 'Convenio', '', 1, '2018-05-31 21:12:27', '2018-05-31 21:12:27', 1),
(72, 'Ratificar el Convenio Marco de Cooperación entre la Escuela Superior Politécnica de Chimborazo Ecuador y la Universidad de la Habana Cuba, Aprobado Mediante Resolución 174.CP.2017. 320CP.2017', 'Convenio', '', 1, '2018-05-31 21:17:59', '2018-05-31 21:17:59', 1),
(73, 'Convenio Marco de Cooperación Interinstitucional entre el Gobierno Autónomo Descentralizado Municipal del Cantón Guano y la Escuela Superior Politécnica de Chimborazo. 334.CP.2017', 'Convenio', '', 1, '2018-05-31 21:20:11', '2018-05-31 21:20:11', 1),
(74, 'Convenio específico de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo “ESPOCH” (Facultad de Mecánica) y la Empresa Municipal de Agua Potable y Alcantirillado de Riobamba “EP-EMAPARr”, a través de la Facultad de Mecánica. 335.CP.2017', 'Convenio', '', 1, '2018-05-31 21:23:13', '2018-05-31 21:23:13', 1),
(75, 'Convenio específico de Cooperación entre el Grupo de Investigación en Tecnologías Energéticas “GITE” el Centro de Investigación en Modelos de Gestión y Sistemas Informáticos “GIMOGSYS” de la Escuela Superior Politécnica de Chimborazo y el Ministerio de Ambiente para el Estudio de Levantamiento del Potencial Energético de la Biomasa Forestal y su Aprovechamiento en el Cantón Riobamba. 336.CP.2017', 'Convenio', '', 1, '2018-05-31 21:26:44', '2018-05-31 21:26:44', 1),
(76, 'Convenio Marco a Suscribirse entre el Instituto Ecuatoriano de Seguridad Social – IESS y la Escuela Superior Politécnica de Chimborazo, para Programas de Pasantías e Internado Rotativo. 337.CP.2017', 'Convenio', '', 1, '2018-05-31 21:29:02', '2018-05-31 21:29:02', 1),
(77, 'Convenio Marco de Cooperación Académica Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Corporación Grupo Ecuador. 338.CP.2017', 'Convenio', '', 1, '2018-05-31 21:30:26', '2018-05-31 21:30:52', 1),
(78, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo “ESPOCH” y el Servicio Ecuatoriano de Normalización “INEN” 339.CP.2017', 'Convenio', '', 1, '2018-05-31 21:38:34', '2018-05-31 21:38:34', 1),
(79, 'Convenio especifico de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Universidad Nacional de Chimborazo para el Desarrollo de Prácticas Pre Profesionales de los Estudiantes de la ESPOCH de la Facultad de Salud Pública de la Carrera de Promoción y Cuidados de Salud. 340.CP.2017', 'Convenio', '', 1, '2018-05-31 21:40:52', '2018-05-31 21:40:52', 1),
(80, 'Convenio específico de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo, el Ministerio de Ambiente Dirección Provincial de Chimborazo y el Consorcio Ecuatoriano para el Desarrollo de Internet Avanzado, para la Ejecución del Proyecto “Diseño de un Simulador Virtual de Incendios Forestales en la Provincia de Chimborazo. 341.CP.2017', 'Convenio', '', 1, '2018-05-31 21:43:57', '2018-05-31 21:45:03', 1),
(81, 'Carta de Compromiso entre la Facultad de Recursos Naturales de la Escuela Superior Politécnica de Chimborazo (ESPOCH) y Estación Experimental Litoral Sur del Instituto Nacional de Investigaciones Agropecuarias (INIAP) 342.CP.2017', 'Convenio', '', 1, '2018-05-31 21:47:58', '2018-05-31 21:47:58', 1),
(82, 'Convenio de Colaboración Académica, Científica y Cultural entre la Universidad de Sevilla (España) y la Escuela Superior Politécnica de Chimborazo (Ecuador) 343.CP.2017', 'Convenio', '', 1, '2018-05-31 21:50:56', '2018-05-31 21:50:56', 1),
(83, 'Acuerdo de Cooperación Interinstitucional para designar el personal académico que formará parte de las Comisiones de Evaluación de los Concursos de Merecimientos y Oposición en Calidad de Miembros Externos, entre la Universidad Nacional de Chimborazo y la Escuela Superior Politécnica de Chimborazo, 344.CP.2017', 'Convenio', '', 1, '2018-05-31 21:53:20', '2018-05-31 21:53:20', 1),
(84, 'Convenio de Cooperación Interinstitucional de uso de instalaciones entre el Servicio Ecuatoriano de Capacitación Profesional SECAP y la Escuela Superior Politécnica de Chimborazo, aprobado mediante resolución  173.CP.2017, de fecha 4 de abril de 2017. 345.CP.2017', 'Convenio', '', 1, '2018-05-31 21:55:58', '2018-05-31 21:56:38', 1),
(85, 'Convenio Cooperación entre la Escuela Superior Politécnica de Chimborazo y Medifra Soluciones Medico Ocupacionales Ecuador Cia. Ltda. 361.CP.2017', 'Convenio', '', 1, '2018-05-31 21:59:49', '2018-05-31 22:07:02', 1),
(86, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela superior Politécnica de Chimborazo y el Instituto de Altos Estudios Nacionales. 362.CP.2017', 'Convenio', '', 1, '2018-05-31 22:02:07', '2018-05-31 22:02:07', 1),
(87, 'Convenio Marco de Cooperación Interinstitucional Celebrado entre la Planta Industrial Ciudad del Auto Ciauto Cia. Ltda. y la Escuela Superior Politécnica de Chimborazo” 363.CP.2017', 'Convenio', '', 1, '2018-05-31 22:06:19', '2018-05-31 22:06:19', 1),
(88, 'Convenio de Cooperación Interinstitucional entre la Coordinación Zonal 9-Salud y la Escuela Superior Politécnica de Chimborazo (Facultad de Ciencias) Escuela de Bioquímica y Farmacia, para la ejecución de prácticas pre-profesionales. 365.CP.2017', 'Convenio', '', 1, '2018-05-31 22:08:20', '2018-05-31 22:09:59', 1),
(89, 'Convenio específico Interinstitucional entre la Escuela Superior Politécnica Nacional EPN y la Escuela Superior Politécnica de Chimborazo, ESPOCH para la integración de las comisiones de los consursos de merecimientos y oposición 404.CP.2017', 'Convenio', '', 1, '2018-05-31 22:11:47', '2018-05-31 22:11:47', 1),
(90, 'Convenio Marco de Cooperacion Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y el Gobierno Autónomo Descentralizado Parroquial Rural Gonzol. 405.CP.2017', 'Convenio', '', 1, '2018-05-31 22:13:24', '2018-05-31 22:13:24', 1),
(91, 'Convenio Marco de Cooperación Interinstitucional entre el Consorcio Bloque 28 y la Escuela Superior Politécnica de Chimborazo 406.CP.2017', 'Convenio', '', 1, '2018-05-31 22:14:33', '2018-05-31 22:14:33', 1),
(92, 'Convenio de Cooperación Interinstituccional entre la Fundación Apoyando Ecuador y la Escuela Superior Politécnica de Chimborazo. 407CP.2017', 'Convenio', '', 1, '2018-05-31 22:16:30', '2018-05-31 22:16:30', 1),
(93, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo “ESPOCH” y el Gobierno Autónomo Descentralizado Municipal  del Canton Guano  “GADMG” 408.CP.2017', 'Convenio', '', 1, '2018-05-31 22:18:26', '2018-05-31 22:18:26', 1),
(94, 'Convenio Marco de Cooperación Interinstitucional entre el Ministerio de Trabajo y la Escuela Superior Politécnica de Chimborazo. 439.CP.2017', 'Convenio', '', 1, '2018-06-01 18:31:09', '2018-06-01 19:01:09', 1),
(95, 'Convenio de Cooperación Interinstitucional entre el Ministerio de Desarrollo Urbano y Vivienda y la Escuela Superior Politécnica de Chimborazo “ESPOCH” 440.CP.2017', 'Convenio', '', 1, '2018-06-01 18:33:53', '2018-06-01 18:34:11', 1),
(96, 'Convenio Marco a Suscribirse entre el Instituto Ecuatoriano de Seguridad Social (IESS) y la Escuela Superior Politécnica de Chimborazo para Programas de Pasantías e Internado Rotativo. 441.CP.2017', 'Convenio', '', 1, '2018-06-01 18:38:34', '2018-06-01 18:38:34', 1),
(97, 'Convenio Marco de Cooperación Interinstitucional entre el Banco del Austro y la Escuela Superior Politecnica de Chimborazo. 442.CP.2017', 'Convenio', '', 1, '2018-06-01 18:39:59', '2018-06-01 18:39:59', 1),
(98, 'Convenio de Cooperación Interinstitucional entre el Instituto Tecnologico y Superior José Ortega y Gasset “ITSOG” y la Escuela Superior Politécnica de Chimborazo “ESPOCH” 443.CP.2017', 'Convenio', '', 1, '2018-06-01 18:41:57', '2018-06-01 18:59:58', 1),
(99, 'Convenio Marco de Cooperación Interinstitucional entre  la Agencia de Regulación y Control de Telecomunicaciones y la Escuela Superior Politécnica de Chimborazo. 444.CP.2017', 'Convenio', '', 1, '2018-06-01 18:43:59', '2018-06-01 19:00:48', 1),
(100, 'Convenio Marco de Cooperación Interinstitucional entre el Ministerio de Salud Pública y la Escuela Superior Politécnica de Chimborazo. 452.CP.2017', 'Convenio', '', 1, '2018-06-01 18:45:34', '2018-06-01 18:45:34', 1),
(101, 'Convenio Marco de Promoción Cultural entre la Fundación Arte Nativo Flores Franco y la Escuela Superior Politécnica de Chimborazo. 466.CP.2017', 'Convenio', '', 1, '2018-06-01 18:46:55', '2018-06-01 18:59:42', 1),
(102, 'Convenio Marco de Cooperación Interinstitucional entre la Gobernación de la Provincia de Chimborazo y la Escuela Superior Politécnica de Chimborazo. 467.CP.2017', 'Convenio', '', 1, '2018-06-01 18:48:23', '2018-06-01 18:48:23', 1),
(103, 'Convenio Específico de Cooperación Académica Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Corporación Grupo Ecuador. 468.CP.2017', 'Convenio', '', 1, '2018-06-01 18:50:00', '2018-06-01 18:50:27', 1),
(104, 'Convenio Marco de Cooperación y Vinculación con la sociedad para promover el Desarrollo Comunitario Integral en las Organizaciones Indígenas y Campesinas Filiales de la Federación Única Provincial de Afiliados y Jubilados al Seguro Social Campesino de la Provincia de Chimborazo. 469.CP.2017', 'Convenio', '', 1, '2018-06-01 18:53:35', '2018-06-01 18:54:11', 1),
(105, 'Convenio de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo; y CELEC Empresa Pública Hidroagoyán. 470.CP.2017', 'Convenio', '', 1, '2018-06-01 18:59:04', '2018-06-01 18:59:04', 1),
(106, 'Convenio de Cooperación Interinstitucional entre la Escuela Superior PolitÉcnica de Chimborazo y la Asociación de Productores Apícolas de Chimborazo (ASOPROACH) 471.CP.2017', 'Convenio', '', 1, '2018-06-01 19:04:08', '2018-06-01 19:04:08', 1),
(107, 'Convenio Interinstitucional de Cooperación entre el Gobierno Autonomo Descentalizado de la Provincia de Chimborazo y la Escuela Superior Politecnica de Chimborazo. 504.CP.2017', 'Convenio', '', 1, '2018-06-01 19:05:28', '2018-06-01 19:05:28', 1),
(108, 'Convenio Específico de Cooperación para el Desarrollo del Proyecto de Investigación “Impulso de la Producción Apícola a partir de la constitución de Sistema Agroecológicos entre la Escuela Superior Politécnica de Chimborazo “ESPOCH” y la Universidad Regional Amazónica “IKIAM” la Universidad Estatal Amazónica “UEA”, La Universidad Técnica de Ambato “UTA” y El Instituto Nacional de Investigación Agropecuaria “INIAP” amparados en el previo convenio marco suscrito entre las referidas instituciones. 505.CP.2017', 'Convenio', '', 1, '2018-06-01 19:10:44', '2018-06-01 19:11:59', 1),
(109, 'Convenio de Cooperación Interinstitucional entre el Hospital Básico 11-BCB Galápagos y la Escuela Superior Politécnica de Chimborazo, Facultad de Salud Pública, Carrera de Medicina para la realización de prácticas preprofesionales externado. 506.CP.2017', 'Convenio', '', 1, '2018-06-01 19:13:43', '2018-06-01 19:13:43', 1),
(110, 'Convenio Marco de Cooperación Científica e Investigativa entre la Universidad Nacional de Chimborazo y la  Escuela Superior Politécnica de Chimborazo. 507.CP.2017', 'Convenio', '', 1, '2018-06-01 19:15:17', '2018-06-01 19:15:17', 1),
(111, 'Convenio Marco de Cooperación Interinstitucional entre Banecuador B.P y la  Escuela Superior Politecnica de Chimborazo. 508.CP.2017', 'Convenio', '', 1, '2018-06-01 19:28:24', '2018-06-01 19:28:24', 1),
(112, 'Convenio Específico de Cooperación Interinstitucional en Ciencia e Investigación Científica entre la  Escuela Superior Politécnica de Chimborazo a través del centro de investigación de energías alternativas y ambiente (CEEA-ESPOCH) y la Empresa Electrica Riobamba S.A., 509.CP.2017', 'Convenio', '', 1, '2018-06-01 19:44:53', '2018-06-01 19:44:53', 1),
(113, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y la Secretaria del Agua. 510.CP.2017', 'Convenio', '', 1, '2018-06-01 19:57:36', '2018-06-01 19:57:36', 1),
(114, 'Convenio de Cooperación Académica entre la Escuela Superior Politecnica de Chimborazo – ESPOCH, a través de la Facultad de Administración de Empresas de Ingeniería Financiera y Comercio Exterior y la Empresa Pública Municipal de Mercado de Productores Agrícolas san Pedro de Riobamba “EP-EMMPA” 511.CP.2017', 'Convenio', '', 1, '2018-06-01 20:03:56', '2018-06-01 20:05:19', 1),
(115, 'Convenio Marco de Colaboración entre la Escuela Superior Politécnica de Chimborazo y el Gobierno Autónomo Descentralizado Municipal de Ambato. 512.CP.2017', 'Convenio', '', 1, '2018-06-01 20:09:38', '2018-06-01 20:09:38', 1),
(116, 'Convenio Marco de Cooperación Interinstitucional y de Vinculación con la Comunidad de Sibambe, entre la Escuela Superior Politécnica de Chimborazo y el Colegio Unidad Educativa “Sibambe” de la Parroquia Sibambe, Cantón Alausi, Provincia de Chimborazo. 513.CP.2017', 'Convenio', '', 1, '2018-06-01 20:12:01', '2018-06-01 20:12:01', 1),
(117, 'Convenio Marco de Cooperación Interinstitucional entre la Corporación de Empresarios del Parque Industrial Riobamba (CEPIR) y la Escuela Superior Politécnica de Chimborazo. 514.CP.2017', 'Convenio', '', 1, '2018-06-01 20:14:55', '2018-06-01 20:14:55', 1),
(118, 'Convenio Específico de Cooperación Interinstitucional entre  Universal Sweet Industries S.A y La Escuela Superior Politécnica de Chimborazo. 516.CP.2017', 'Convenio', '', 1, '2018-06-01 20:19:41', '2018-06-01 20:19:41', 1),
(119, 'Convenio de Cooperación Interinstitucional entre la Secretaría de Educación Superior, Ciencia, Tecnología e Innovación y la Escuela Superior Politécnica de Chimborazo para ejecutar el proceso de nivelación general correspondiente al segundo período académico del año 2017. 517.CP.2017', 'Convenio', '', 1, '2018-06-01 20:21:32', '2018-06-01 20:21:32', 1),
(120, 'Convenio Marco de Cooperación entre la ESPOCH y la Universidad de Milán Bicocca. 528.CP.2017', 'Convenio', '', 1, '2018-06-01 20:24:11', '2018-06-01 20:24:11', 1),
(121, 'Convenio Específico de Cooperación Interinstitucional entre la Universidad de Shanghai y la Escuela Superior Politecnica de Chimborazo. 539.CP.2017', 'Convenio', '', 1, '2018-06-01 20:26:49', '2018-06-01 20:26:49', 1),
(122, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y el Colegio de Químicos Farmacéuticos de Chimborazo. 540.CP.2017', 'Convenio', '', 1, '2018-06-01 20:31:01', '2018-06-01 20:31:01', 1),
(123, 'Convenio Marco de Colaboración Científica y Cultural entre la Escuela Superior Politécnica de Chimborazo – Ecuador y la Universidad de la Plata-Argentina. 541.CP.2017', 'Convenio', '', 1, '2018-06-01 20:32:41', '2018-06-01 20:32:41', 1),
(124, 'Convenio Específico Interinstitucional entre la Universidad de Cuenca y la Escuela Superior Politécnica del Chimborazo para la integración de las comisiones de los concursos de merecimientos y oposición para profesores titulares de la Institución. 542.CP.2017', 'Convenio', '', 1, '2018-06-01 20:35:39', '2018-06-01 20:52:42', 1),
(125, 'Convenio Específico Interinstitucional entre la Escuela Superior Politécnica del Litoral “ESPOL” y la Escuela Superior Politécnica del Chimborazo “ESPOCH” para la integración de las comisiones de concursos de merecimientos y oposición. 543.CP.2017', 'Convenio', '', 1, '2018-06-01 20:37:55', '2018-06-01 20:52:27', 1),
(126, 'Convenio Específico Interinstitucional entre la Universidad de las Fuerzas Armadas (ESPE) y la Escuela Superior Politécnica del Chimborazo “ESPOCH” para la integración de las comisiones de concursos de merecimientos y oposición. 544.CP.2017', 'Convenio', '', 1, '2018-06-01 20:52:12', '2018-06-01 20:52:12', 1),
(127, 'Convenio de Cooperación Interinstitucional entre  el Instituto Nacional de Economía Popular y Solidaria - IEPS y la Escuela Superior Politécnica de Chimborazo. 558.CP.2017', 'Convenio', '', 1, '2018-06-01 20:55:18', '2018-06-01 20:55:18', 1),
(128, 'Convenio para la Prestación de Servicios Bancarios a través de Cajeros Automáticos. 559.CP.2017', 'Convenio', '', 1, '2018-06-01 20:56:23', '2018-06-01 20:56:23', 1),
(129, 'Convenio Marco de Cooperación Interinstitucional entre el Gobierno Provincial de Santo Domingo de los Tsachillas y la Escuela Superior Politécnica de Chimborazo. 560.CP.2017', 'Convenio', '', 1, '2018-06-01 20:57:34', '2018-06-01 20:57:34', 1),
(130, 'Convenio para el desarrollo del proyecto “Creación de la Red Ecuatoriana de Investigación en Física de Astro Partículas, Rayos Cósmicos y Clima Espacial, Fase 2: Fortalecimiento y Extensión de la Red” entre la Corporación Ecuatoriana para el desarrollo de la Investigación y la Academia-CEDIA y la Escuela Superior Politécnica de Chimborazo. 561.CP.2017', 'Convenio', '', 1, '2018-06-01 21:03:18', '2018-06-01 21:03:18', 1),
(131, 'Convenio para el desarrollo del proyecto “Control Coordinado Multi Operador Aplicado a un Robot Manipulador Aéreo” entre la Corporación Ecuatoriana para el Desarrollo de la Investigación y la Academía-CEDIA y la Escuela Superior Politécnica de Chimborazo. 562.CP.2017', 'Convenio', '', 1, '2018-06-01 21:09:00', '2018-06-01 21:09:00', 1),
(132, 'Convenio Marco de Cooperación Inter-institucional entre la Escuela Superior Politécnica de Chimborazo, y la Empresa Publica de Servicios ESPOCH “Gasolinera Politécnica E.P” 563.CP.2017', 'Convenio', '', 1, '2018-06-01 21:10:50', '2018-06-01 21:10:50', 1),
(133, 'Convenio Marco de Cooperación entre la Universidad Nacional de Costa Rica y la Escuela Superior Politécnica de Chimborazo-Ecuador. 587.CP.2017', 'Convenio', '', 1, '2018-06-01 21:15:18', '2018-06-01 21:15:18', 1),
(134, 'Convenio Marco de Cooperación Interinstitucional entre la Diócesis de Riobamba y la Escuela Superior Politécnica de Chimborazo. 588.CP.2017', 'Convenio', '', 1, '2018-06-01 21:17:01', '2018-06-01 21:17:01', 1),
(135, 'Convenio de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo y el Gobierno Autónomo Descentralizado Municipal del Cantón Sucua. 589.CP.2017', 'Convenio', '', 1, '2018-06-01 21:18:44', '2018-06-01 21:18:44', 1),
(136, 'Convenio de Cooperación Interinstitucional entre el Instituto Tecnológico Superior Tena y la Escuela Superior Politécnica de Chimborazo. 590.CP.2017', 'Convenio', '', 1, '2018-06-01 21:24:49', '2018-06-01 21:24:49', 1),
(137, 'Convenio de Colaboración Interinstitucional entre la Junta General de Usuarios del Sistema de Riego Chambo Guano y la Escuela Superior Politécnica de Chimborazo. 591.CP.2017', 'Convenio', '', 1, '2018-06-01 21:26:28', '2018-06-01 21:26:28', 1),
(138, 'Convenio Marco de Cooperación Internacional entre la Universidad Nacional de Mar del Plata y la Escuela Superior Politécnica de Chimborazo. 592.CP.2017', 'Convenio', '', 1, '2018-06-01 21:28:18', '2018-06-01 21:28:18', 1),
(139, 'Convenio Marco de Cooperación Interinstitucional entre la Universidad de Colima (México) y la Escuela Superior Politécnica de Chimborazo (Ecuador) 606.CP.2017', 'Convenio', '', 1, '2018-06-01 21:29:52', '2018-06-01 21:29:52', 1),
(140, 'Convenio Marco de Colaboración entre el Gobierno Autónomo Descentralizado Municipaldad de Ambato y la Escuela Superior Politécnica de Chimborazo. 607.CP.2017', 'Convenio', '', 1, '2018-06-01 21:31:20', '2018-06-01 21:31:20', 1),
(141, 'Convenio Marco de Cooperación Interinstitucional entre la Acería del Ecuador C.A. ADELCA y la Escuela Superior Politécnica de Chimborazo. 608.CP.2017', 'Convenio', '', 1, '2018-06-01 21:32:37', '2018-06-01 21:32:37', 1),
(142, 'Convenio Marco de Cooperación Interinstitucional entre la Asamblea Nacional del Ecuador y la Escuela Superior Politécnica de Chimborazo. 609.CP.2017', 'Convenio', '', 1, '2018-06-01 21:33:58', '2018-06-01 21:33:58', 1),
(143, 'Convenio Marco de Cooperación entre la Escuela Superior Politécnica de Chimborazo y el Centro de Cooperación Internacional en investigación agronómica para el desarrollo (CIRAD) 610.CP.2017', 'Convenio', '', 1, '2018-06-01 21:35:37', '2018-06-01 21:35:37', 1),
(144, 'Convenio para la Cooperación Educativa y Científica entre la Universidad de Calabria (Italia) y la Escuela Superior Politécnica de Chimborazo. 601.CP.2017', 'Convenio', '', 1, '2018-06-01 21:37:19', '2018-06-01 21:37:19', 1),
(145, 'Convenio de Cooperación Académica y Cultural entre la Escuela Superior Politécnica de Chimborazo y la Embajada de la República Árabe Saharaui Democrática en Ecuador. 613.CP.2017', 'Convenio', '', 1, '2018-06-01 21:39:23', '2018-06-01 21:39:23', 1),
(146, 'Convenio para la creación de la Red Ecuatoriana para la Internacionalización de la Educación Superior – REIES. 013.CP.2018', 'Convenio', '', 1, '2018-06-01 21:40:50', '2018-06-01 21:42:22', 1),
(147, 'Convenio Marco de Cooperación Interinstitucional Académica y Cultural entre la Escuela Superior Politécnica de Chimborazo y la Universidad de Nuevo Mexico. 014.CP.2018', 'Convenio', '', 1, '2018-06-01 21:42:13', '2018-06-01 21:42:13', 1),
(148, 'Convenio Marco de Cooperación entre la Escuela Superior Politécnica de Chimborazo Extensión Morona Santiago y la Federación de Ciegos del Ecuador (FENCE) 015.CP.2018', 'Convenio', '', 1, '2018-06-01 21:44:43', '2018-06-01 21:44:43', 1),
(149, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de chimborazo y la Fundación Maquita Cushunchic Comercializando como Hermanos. 018.CP.2018', 'Convenio', '', 1, '2018-06-01 21:47:23', '2018-06-01 21:47:23', 1),
(150, 'Convenio Específico de Cooperación Interinstitucional entre la Escuela Superior politécnica de Chimborazo y la Coordinación Zonal de Educación Zona 3. 042.CP.2018', 'Convenio', '', 1, '2018-06-01 21:48:46', '2018-06-01 21:48:46', 1),
(151, 'Convenio para la prestación de Servicios Bancarios a través de Cajeros Automáticos. 043CP.2018', 'Convenio', '', 1, '2018-06-01 21:49:50', '2018-06-01 21:49:50', 1),
(152, 'Convenio Marco de Colaboración Interinstitucional entre la Universidad Politécnica de Aguas Calientes (México) y la Escuela Superior Politécnica de Chimborazo (Ecuador) 044.CP.2017', 'Convenio', '', 1, '2018-06-01 21:51:25', '2018-06-01 21:51:25', 1),
(153, 'Convenio Específico de Cooperación entre Hult Prize Ecuador y la Escuela Superior Politécnica de Chimborazo. 045.CP.2018', 'Convenio', '', 1, '2018-06-01 21:52:33', '2018-06-01 21:52:33', 1),
(154, 'Convenio Específico de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo “ESPOCH” y la Organización no Gubernamental Belga Trias-Andes “TRIAS” 047.CP.2018', 'Convenio', '', 1, '2018-06-01 21:54:04', '2018-06-01 21:54:04', 1),
(155, 'Convenio de Cooperación Interinstitucional entre el Ministerio de Trabajo y la Escuela Superior Politécnica de Chimborazo. 049.CP.2018', 'Convenio', '', 1, '2018-06-01 21:55:55', '2018-06-01 21:55:55', 1),
(156, 'Convenio Marco de Cooperación Interinstitucional entre la Escuela Superior Politécnica de Chimborazo-Ecuador y la Fundación de la Comunitat Valenciana Centro de Estudios Ambientales del Mediterráneo. 050.CP.2018', 'Convenio', '', 1, '2018-06-01 21:57:39', '2018-06-01 21:57:39', 1),
(157, 'Convenio Específico Interinstitucional entre la Escuela Politecnica Nacional “EPN” y la Escuela Superior Politécnica de Chimborazo “ESPOCH” para la integración de las comisiones de los concursos de merecimientos y oposición. 051.CP.2018', 'Convenio', '', 1, '2018-06-01 21:59:15', '2018-06-01 21:59:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultural_management`
--

CREATE TABLE `cultural_management` (
  `cultural_management_id` int(10) UNSIGNED NOT NULL,
  `cultural_management_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cultural_management_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cultural_management_description` text COLLATE utf8mb4_unicode_ci,
  `cultural_management_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cultural_management_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cultural_management_state` tinyint(4) NOT NULL,
  `cultural_management_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cultural_management`
--

INSERT INTO `cultural_management` (`cultural_management_id`, `cultural_management_name`, `cultural_management_image`, `cultural_management_description`, `cultural_management_create`, `cultural_management_update`, `cultural_management_state`, `cultural_management_management_area`) VALUES
(1, 'TALLERES DE DANZA', 'TALLERES DE DANZA.jpg', NULL, '2017-08-17 03:48:41', '2017-08-17 03:48:41', 1, 1),
(2, 'MÚSICA', 'MUSICA.jpg', '<p>La m&uacute;sica es el arte de combinar los sonidos en una secuencia temporal atendiendo a las leyes de la armon&iacute;a, la melod&iacute;a y el ritmo, o de producirlos con instrumentos musicales, por lo general producen un efecto est&eacute;tico o expresivo resultando agradables al o&iacute;do.</p>', '2017-08-17 03:49:12', '2017-08-17 03:49:12', 1, 1),
(3, 'TEATRO', 'TEATRO.jpg', '<p>&ldquo;El teatro es, de todas las artes el m&aacute;s humano, porque su finalidad e instrumento es el propio ser humano&rdquo;</p>', '2017-08-17 03:49:51', '2017-08-17 03:49:51', 1, 1),
(4, 'GRUPOS INSTITUCIONALES', 'GRUPOS INSTITUCIONALES.jpg', NULL, '2017-08-17 03:50:19', '2017-08-17 03:50:19', 1, 1),
(5, 'DESARROLLO', '22855586_1167362073395845_1345009820_n.jpg', '<p>Esta bien, hoy me voy de salida wiiiiii!!!</p>', '2017-12-02 01:26:48', '2019-04-24 01:32:29', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultural_management_types`
--

CREATE TABLE `cultural_management_types` (
  `cultural_management_types_id` int(10) UNSIGNED NOT NULL,
  `cultural_management_types_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cultural_management_types_description` text COLLATE utf8mb4_unicode_ci,
  `cultural_management_types_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cultural_management_types_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cultural_management_types_state` tinyint(4) NOT NULL,
  `cultural_management_types_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cultural_management_types`
--

INSERT INTO `cultural_management_types` (`cultural_management_types_id`, `cultural_management_types_name`, `cultural_management_types_description`, `cultural_management_types_create`, `cultural_management_types_update`, `cultural_management_types_state`, `cultural_management_types_area`) VALUES
(1, 'DANZA CONTEMPORÁNEA (Murayan)', '<p>Tiene sus inicios en el mes de abril del 2013, conformado por estudiantes de las diferentes facultades de la instituci&oacute;n, cuanta al momento con 15 integrantes con los cuales se ha venido trabajando en creaciones coreogr&aacute;ficas con t&eacute;cnicas de Graham, Humpery, Flying low, contac realese entre otras, teniendo una participaci&oacute;n en representaci&oacute;n de la ESPOCH en festivales locales y nacionales, obteniendo reconocimientos significativos en este recorrido art&iacute;stico cultural en representaci&oacute;n de la instituci&oacute;n.</p>', '2017-08-17 03:51:34', '2017-08-17 03:51:34', 1, 1),
(2, 'DANZA LATINA (Ayahuashca)', '<p>Se ha desarrollado durante varios a&ntilde;os bajo la direcci&oacute;n del Dr. David Bayas y es uno de los ambientes art&iacute;sticos propicios en donde ya han cursado varias generaciones de estudiantes polit&eacute;cnicos quienes en su af&aacute;n de cultivar el arte mediante la danza, han presentado sus diferentes trabajos coreogr&aacute;ficos en muchos lugares del pa&iacute;s, sabiendo que la pr&aacute;ctica de las artes no es m&aacute;s que un complemento para la formaci&oacute;n del futuro profesional.</p>', '2017-08-17 03:52:00', '2017-08-17 03:52:00', 1, 1),
(3, 'GUITARRA', '<p>La guitarra como parte de la expresi&oacute;n art&iacute;stica y cultural, es una herramienta que permite una incidencia en la formaci&oacute;n del ser humano, ya que por medio de su ejecuci&oacute;n, se consideran una serie de aspectos tanto motrices, cognitivos, as&iacute; como motivacionales que se reflejan en el pleno desenvolvimiento de quien lo practica. &quot;Si hubiera m&aacute;s escuelas de m&uacute;sica que militares por las calles, habr&iacute;a m&aacute;s guitarras que metralletas y m&aacute;s artistas que asesinos&quot;.</p>', '2017-08-26 04:16:15', '2017-08-26 04:16:15', 1, 2),
(4, 'INSTRUMENTOS ANDINOS', '<p>Los instrumentos de m&uacute;sica andina, especialmente los que son ejecutados con el soplido del int&eacute;rprete, (Zampo&ntilde;a y Quena) constituyen una herramienta b&aacute;sica en la formaci&oacute;n human&iacute;stica, ya que bas&aacute;ndonos en la incidencia hist&oacute;rica de estos instrumentos andinos, revivimos ritmos, costumbres, tradiciones y sobretodo recreamos un inter&eacute;s colectivo de identidad.</p>', '2017-08-26 04:16:33', '2017-08-26 04:16:33', 1, 2),
(5, 'PIANO', '<p>Para la pr&aacute;ctica del instrumento Piano los estudiantes disponen de un instrumento para cada uno ya que es parte de la Asignatura de Expresi&oacute;n Art&iacute;stica, teniendo los siguientes beneficios como: mantener j&oacute;venes los o&iacute;dos, innova cambios en nuestro cerebro, impacta positivamente en nuestras habilidades de comunicaci&oacute;n y lenguaje, mejora la memoria y atenci&oacute;n, es decir tocar el piano ayuda al desarrollo de la disciplina, paciencia, coordinaci&oacute;n y dedicaci&oacute;n a tener mayor capacidad para memorizar, ayuda a controlar el estr&eacute;s laboral y mejorar el estado de &aacute;nimo, siendo capaz de relacionarse f&aacute;cilmente con la sociedad.</p>', '2017-08-26 04:16:50', '2017-08-26 04:16:50', 1, 2),
(6, 'CANTO', '<p>La Materia de Expresi&oacute;n Art&iacute;stica especialidad Canto est&aacute; llamado a ensanchar los horizontes de todas las profesiones a manera de futuros puente de relaci&oacute;n con la sociedad excluida de la casona acad&eacute;mica, de suerte que profesi&oacute;n y arte, tecnolog&iacute;a y cultura, permitan entrelazar esfuerzos e identificar objetivos en pos del desarrollo integral y humanista tan esperado por nuestra colectividad. Identificar la m&uacute;sica popular ecuatoriana mediante el conocimiento y la pr&aacute;ctica r&iacute;tmica &ndash; auditiva de cada g&eacute;nero musical para su valoraci&oacute;n y cultivo en funci&oacute;n de su desenvolvimiento profesional.</p>', '2017-08-26 04:17:13', '2017-08-26 04:17:13', 1, 2),
(7, 'TEATRO CONVENCIONAL', '<p>A trav&eacute;s de la disciplina de Teatro Convencional se busca fomentar en las y los j&oacute;venes el conocimiento, estudio, valoraci&oacute;n y respeto de las culturas, mediante el reconocimiento de la diversidad y la comprensi&oacute;n de la pr&aacute;ctica art&iacute;stica e intercultural, para el cultivo de valores, como un mecanismo de relaci&oacute;n y comunicaci&oacute;n interpersonal y grupal, en el conjunto de nuestra sociedad. De manera particular el teatro y/o la pr&aacute;ctica teatral, provoca y facilita en cada una de las personas, las herramientas necesarias para hacer conciencia del uso corporal y de las expresiones que se generan a trav&eacute;s de los sentimientos, para poder desenvolverse en cualquier entorno social, como mecanismo de comunicaci&oacute;n.</p>', '2017-08-26 04:18:53', '2017-08-26 04:18:53', 1, 3),
(8, 'TEATRO POPULAR', '<p>La especialidad de Teatro Popular promueve una relaci&oacute;n sana entre las y los j&oacute;venes estudiantes basada en los principios de respeto, interculturalidad y solidaridad, por medio de la pr&aacute;ctica de t&eacute;cnicas teatrales populares como son la actuaci&oacute;n, el clown y el malabar; todo esto dentro de un ambiente divertido de convivencia colectiva que apunta a elevar el nivel de participaci&oacute;n socio cultural y autoconciencia cr&iacute;tica.</p>', '2017-08-26 04:19:10', '2017-08-26 04:19:10', 1, 3),
(9, 'GRUPO DE CÁMARA “ENTRE CUERDAS Y VIENTO”', '<p>El Grupo Musical tiene ya 2 a&ntilde;os en funcionamiento bajo la direcci&oacute;n del Lic. &Aacute;ngel Coba, con estudiantes Polit&eacute;cnicos que gustan del arte musical, el grupo cuenta con instrumentos de cuerda como: viol&iacute;n, Piano, bajo, Guitarra, tambi&eacute;n instrumentos de viento como es el saxof&oacute;n y la Trompeta, la agrupaci&oacute;n musical cuenta con 8 integrantes quienes participan en los diferentes Eventos Culturales y atendiendo a los requerimientos en las programaciones Institucionales</p>', '2017-08-26 04:20:10', '2017-08-26 04:20:10', 1, 4),
(10, 'GRUPO “ESPECTROFONIA”', '<p>Se estrena en septiembre de 2009 fruto de una nueva propuesta musical desde los talleres art&iacute;sticos permanentes de la Unidad de Formaci&oacute;n y Gesti&oacute;n Intercultural de la ESPOCH, en un espacio de debate que abarcan temas acerca de la problem&aacute;tica social tratada desde el g&eacute;nero Rock, como una manifestaci&oacute;n cultural juvenil reconocida. En la actualidad el grupo se encuentra pr&oacute;ximo a lanzar su primer disco con temas in&eacute;ditos con el apoyo del Centro de Producci&oacute;n Fonogr&aacute;fica POLIARTE.</p>', '2017-08-26 04:20:50', '2017-08-26 04:20:50', 1, 4),
(11, 'GRUPO FEMENINO DE MÚSICA ROCK “MIDNIGHT”', '<p>En septiembre de 2015 surge una iniciativa de un grupo de se&ntilde;oritas estudiantes por pertenecer al taller permanente de m&uacute;sica rock, es as&iacute; que aparece MIDNIGHT con el prop&oacute;sito de transmitir mensajes antidiscriminaci&oacute;n y equidad de g&eacute;nero. La mayor&iacute;a del repertorio rockero de esta banda se fundamenta principalmente en temas cl&aacute;sicos cuya voz principal es femenina.</p>', '2017-08-26 04:21:35', '2017-08-26 04:21:35', 1, 4),
(12, '“VOCES JUVENILES”', '<p>Contribuir en el proceso de educaci&oacute;n integral de las y los j&oacute;venes estudiantes de la ESPOCH y vincular las actividades art&iacute;stico-culturales en beneficio de la poblaci&oacute;n de la ciudad de Riobamba, a trav&eacute;s del ingreso libre del p&uacute;blico asistente y beneficiario directo del disfrute y consumo de los bienes culturales.</p>\r\n\r\n<p>Est&aacute; conformado por solistas, y por un duo de J&oacute;venes de igual manera talentosos con una virtualidad en el canto, dominando diferentes g&eacute;neros de la m&uacute;sica Pop Rom&aacute;ntica.</p>', '2017-08-26 04:22:07', '2017-08-26 04:22:07', 1, 4),
(13, 'GRUPO TABAKO', '<p>Es una agrupaci&oacute;n de j&oacute;venes talentosos que se conformaron hace cuatro a&ntilde;os desde la formaci&oacute;n integral que se les imparte en la materia de Expresi&oacute;n Art&iacute;stica especialidad canto, dirigida por el Maestro Marco C&aacute;rdenas F. TABAKO nace con la idea de recrear y fortalecer la m&uacute;sica en el g&eacute;nero pop rom&aacute;ntico, con un estilo ac&uacute;stico lleno de armon&iacute;a y sonoridad en cada una de sus interpretaciones, y con el deseo de representar a la ESPOCH con orgullo y responsabilidad en los mejores escenarios de la ciudad y el pa&iacute;s.</p>', '2017-08-26 04:22:50', '2017-08-26 04:22:50', 1, 4),
(14, 'GRUPO DE MÚSICA ANDINA CIMA DEL MUNDO', '<p>Su nombre viene inspirado por la majestuosidad del imponente nevado Chimborazo que nos inspira con su presencia en la sultana de los andes y sobre todo en nuestra instituci&oacute;n. Nace en los talleres permanentes de la Unidad de Expresi&oacute;n Art&iacute;stica y Desarrollo cultural en el a&ntilde;o 2002, conformado por estudiantes de las diferentes escuelas y facultades de la ESPOCH y su misi&oacute;n es la investigaci&oacute;n, rescate y difusi&oacute;n de las diferentes formas sonoras musicales andinas e interpretadas con instrumentos aut&oacute;ctonos de los pueblos la zona andina latinoamericana.</p>', '2017-08-26 04:23:21', '2017-08-26 04:23:21', 1, 4),
(15, 'Prueba', '<p>no se que le paso?</p>', '2017-12-02 01:30:18', '2017-12-02 01:30:58', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `download`
--

CREATE TABLE `download` (
  `download_id` int(10) UNSIGNED NOT NULL,
  `download_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_state` tinyint(4) NOT NULL,
  `download_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `download_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `download_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `faculty_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_state` tinyint(4) NOT NULL,
  `faculty_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `faculty_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `faculty_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_image`, `faculty_state`, `faculty_create`, `faculty_update`, `faculty_management_area`) VALUES
(1, 'FACULTAD DE INFORMÁTICA Y ELECTRÓNICA', 'LOGO-FIE.png', 1, '2017-10-25 07:24:21', '2018-03-08 20:34:58', 1),
(2, 'FACULTAD DE SALUD PÚBLICA', 'LOGO-SALUD-PUBLICA.png', 1, '2017-10-25 07:26:11', '2017-10-25 07:26:11', 1),
(3, 'FACULTAD DE MECÁNICA', 'LOGO-MECANICA.png', 1, '2017-10-25 07:26:31', '2017-10-25 07:26:31', 1),
(4, 'FACULTAD DE CIENCIAS PECUARIAS', 'LOGO-CIENCIAS-PECUARIAS.png', 1, '2017-10-25 07:27:13', '2017-10-25 07:27:13', 1),
(5, 'FACULTAD DE ADMINISTRACIÓN DE EMPRESAS', 'LOGO-FADE.png', 1, '2017-10-25 07:27:38', '2017-10-25 07:27:38', 1),
(6, 'FACULTAD DE RECURSOS NATURALES', 'LOGO-RECURSOS-NATURALES.png', 1, '2017-10-25 07:28:03', '2017-10-25 07:28:03', 1),
(7, 'FACULTAD DE CIENCIAS', 'LOGO-CIENCIAS.png', 1, '2017-10-25 07:28:22', '2017-10-25 07:28:22', 1),
(8, 'FACULTAD DE PERIODISMO', 'edificio.jpg', 0, '2017-12-02 01:17:36', '2017-12-02 01:21:43', 1),
(9, 'FACULTAD DE PSICOLOGIA', 'edificio.jpg', 0, '2017-12-06 01:21:22', '2017-12-06 01:23:22', 1),
(10, 'EXTENSIONES', 'extensiones.png', 1, '2018-08-02 20:38:56', '2018-08-02 20:39:07', 1),
(11, 'OTROS', 'otros.png', 1, '2018-08-02 20:39:16', '2018-08-02 20:39:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faculty_news`
--

CREATE TABLE `faculty_news` (
  `faculty_news_id` int(10) UNSIGNED NOT NULL,
  `faculty_news_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_news_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_news_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_news_state` tinyint(4) NOT NULL,
  `faculty_news_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `faculty_news_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `faculty_news_faculty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `faculty_news`
--

INSERT INTO `faculty_news` (`faculty_news_id`, `faculty_news_name`, `faculty_news_description`, `faculty_news_image`, `faculty_news_state`, `faculty_news_create`, `faculty_news_update`, `faculty_news_faculty`) VALUES
(1, 'Prueba', '<p>Flor es muy mala conmigo y no se porque ? aiuda!!!!!!</p>', '22855586_1167362073395845_1345009820_n.jpg', 0, '2017-12-02 01:23:10', '2017-12-02 01:24:15', 1),
(2, 'porbando', '<p>estoy muy sad</p>', '22855586_1167362073395845_1345009820_n.jpg', 0, '2017-12-06 01:26:25', '2017-12-06 01:27:23', 4),
(3, 'Los dias de la vida', '<p>asdasd asdad asdasdasdasd</p>', 'centroagricola.png', 0, '2018-03-08 20:36:54', '2018-05-29 00:47:25', 1),
(4, 'Impulso al desarrollo socio- productivo de la provincia de Chimborazo: Actualización Presupestaria', '<p>Impulso a los comerciantes minoristas de los mercados de los cantones Guano, Penipe, Chambo y Colta para fortalecer el desarrollo econ&oacute;mico a trav&eacute;s de la capacitaci&oacute;n y asesoramiento en el &aacute;rea contable, tributaria y financiera.</p>', 'Imagen Proyecto.png', 0, '2018-05-25 00:29:09', '2018-05-30 02:12:06', 5),
(5, 'Impulso al desarrollo socio- productivo de la provincia de Chimborazo: Proyecto Nuevo', '<p>Fortalecimiento de competitividad productiva - comercial de los productores agr&iacute;colas de la junta general de usuarios del sistema de riego Chambo Guano.</p>', 'Imagen Proyecto.png', 0, '2018-05-25 00:36:31', '2018-05-30 02:12:10', 5),
(6, 'Impulso al desarrollo socio- productivo de la provincia de Chimborazo: Actualización Presupuestaria', '<p>Fortalecimiento de las capacidades a las y los funcionarios del CONAGOPARE&nbsp;de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 0, '2018-05-25 00:51:26', '2018-05-30 02:12:24', 5),
(7, 'Programa de marketing y economía popular y solidaria: Actualización Presupuestaria', '<p>Proyecto de desarrollo micro-empresarial con inclusi&oacute;n econ&oacute;mica y social de actores de econom&iacute;a popular y solidaria y usuarios del MIES.</p>', 'Imagen Proyecto.png', 0, '2018-05-25 01:11:06', '2018-05-30 02:12:31', 5),
(8, 'asdasdasd ñlkasd jasdjas jasdnmnasd', '<p>justo id faucibus varius. Cras ultricies neque quis orci suscipit vestibulum.</p>', 'twitter.png', 0, '2018-05-29 03:13:21', '2018-05-30 02:13:24', 7),
(9, 'Fortalecimiento de la agenda de desarrollo económico del cantón Riobamba: Actualización Presupuestaria', '<p>Trabajo comunitario, t&eacute;cnico ambiental y social en las unidades educativas de la ciudad de Riobamba.</p>', 'Imagen Proyecto.png', 0, '2018-05-29 03:34:09', '2018-05-30 02:13:29', 7),
(10, 'Capacitación, asesoría, gestión y nuevos conocimientos para la sociedad del milenio: Actividad Presupuestaria', '<p>Centro de capacitaci&oacute;n, gesti&oacute;n y asesoramiento en las &aacute;reas de administraci&oacute;n, negocios, legislaci&oacute;n, matem&aacute;ticas, estad&iacute;sticas, educaci&oacute;n, informaci&oacute;n, comunicaci&oacute;n, servicios, tecnolog&iacute;as y otros del cant&oacute;n Riobamba.</p>', 'Imagen Proyecto.png', 0, '2018-05-29 18:51:19', '2018-05-30 02:12:38', 5),
(11, 'ESPOCH, politécnica latinoamericana por el comercio justo: Actualización Presupuestaria', '<p>Proyecto para desarrollar el comercio justo de productos org&aacute;nicos a fin de contribuir a la mejora de la calidad de vida de las personas discapacitadas de la fundaci&oacute;n protecci&oacute;n y descanso &ndash; Riobamba.</p>', 'Imagen Proyecto.png', 0, '2018-05-29 19:12:02', '2018-05-30 02:12:44', 5),
(12, 'Abriendo puertas al conocimiento para una mejor alimentación: Actividad Presupuestaria', '<p>Hoy comemos carne.&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 19:24:02', '2018-05-30 02:11:52', 4),
(13, 'Vinculación institucional con la sociedad: Actualización Presupuestaria', '<p>Proyecto de capacitaci&oacute;n, pasant&iacute;as, vinculaci&oacute;n tunshi ESPOCH (pro - capavi- te).&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 19:26:59', '2018-05-30 02:11:56', 4),
(14, 'Arte, Cultura y Patrimonio: Actualización Presupuestaria', '<p>Fortalecimiento del turismo comunitario n la Porvincia de Chimborazo.&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 19:58:21', '2018-05-30 02:13:13', 6),
(15, 'Uso racional de Plaguicidas: Actualización Presupuestaria', '<p>Dismunici&oacute;n del impacto ambiental, social y econ&oacute;mico por el uso inadecuado de agroqu&iacute;micos en los cultivos de las comunidades indigenas del Cant&oacute;n Guamote, Provincia de Chimborazo, Ecuador&nbsp;&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 20:04:49', '2018-05-30 02:13:20', 6),
(16, 'Servicios de alimentos y bebidas: Actualización Presupuestaria', '<p>Asesoria personalizada a los establecimientos de alimentos y bebidas en la Zona Centro N&deg;3&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 20:17:30', '2018-05-30 02:11:30', 2),
(17, 'Promoción de salud: Actualización Presupuestaria', '<p>Promoci&oacute;n de habitos saludabes para mejorar la calidad de salud y nutrici&oacute;n en la primera infancia en los CIBVS, centro infantiles de los cantones de Alaus&iacute;, Guamote, Colta y Riobamba del MIES Chimborazo.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 20:22:17', '2018-05-30 02:11:35', 2),
(18, 'Seguridad laboral y entornos saludables: Actualización Presupuestaria', '<p>Primeros auxilios basicos en Docentes de Colegios Fiscales del sector urbano del Cant&oacute;n Riobamba.&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 20:29:00', '2018-05-30 02:11:41', 2),
(19, 'Transferencia de tecnología a organizaciones públicas y privadas en la Zona de Planificación N° 3', '<p>Implementaci&oacute;n de sistemas de movilidad para la asociaci&oacute;n de familiares de personas excepcionales de Chimborazo (ALFAPECH).&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-29 20:37:24', '2018-05-30 02:11:46', 3),
(20, 'Fortalecimiento de la agenda de desarrollo de Riobamba: Actualización Presupuestaria', '<p>Desarrollo de servicios b&aacute;sicos relacionados con el ciclo del agua, la energ&iacute;a renovable y la salud p&uacute;blica de las comunidades rurales, mediante la implementaci&oacute;n de bater&iacute;as sanitarias aut&oacute;nomas y cocinas ecol&oacute;gicas de la parroquia de Pungal&aacute;.&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-30 01:20:59', '2018-05-30 02:12:18', 7),
(21, 'Impulso al desarrollo socio productivo de la provincia de Chimborazo: Actualización Presupuestaria', '<p>Proyecto centro de acopio para la comercializaci&oacute;n y almacenamiento de empaques y embalajes para la EP-EMMPA empresa p&uacute;blica municipal mercado de productores agr&iacute;colas San Pedro de Riobamba.</p>', 'Imagen Proyecto.png', 0, '2018-05-30 01:30:25', '2018-05-30 02:12:50', 5),
(22, 'Impulsar el desarrollo productivo de la Provincia de Chimborazo: Actualización Presupuestaria.', '<p>Proyecto de fortalecimiento de las capacidades a las y los t&eacute;cnicos del MAGAP y organizaciones socio productivas de la Provincia de Chimborazo a&ntilde;o 2017.</p>', 'Imagen Proyecto.png', 0, '2018-05-30 01:32:15', '2018-05-30 02:12:57', 5),
(23, 'Programa de marketing y economía popular y solidaria- Actualización Presupuestaria', '<p>Proyecto de vinculaci&oacute;n entre a escuela superior polit&eacute;cnica de Chimborazo ESPOCH y el instituto de econom&iacute;a popular y solidaria IEPS.</p>', 'Imagen Proyecto.png', 0, '2018-05-30 01:36:32', '2018-05-30 02:13:04', 5),
(24, 'Fortalecimiento de la agenda de desarrollo económico del cantón Riobamba - Actualización Presupuestaria', '<p>Proyecto para la ejecuci&oacute;n de un plan de comunicaci&oacute;n alternativa para incrementar la actividad econ&oacute;mica de los mercados de la ciudad de Riobamba mediante su reconocimiento social.</p>', 'Imagen Proyecto.png', 0, '2018-05-30 01:40:48', '2018-05-30 02:13:09', 5),
(25, 'Impulso al desarrollo productivo de la Provincia de Chimborazo: Actualización Presupuestaria.', '<p>Fortalecimiento de la producci&oacute;n pecuaria del cant&oacute;n Riobamba, mediante la cooperaci&oacute;n interinstitucional entre la facultad de ciencias pecuarias de la ESPOCH (FCP- ESPOCH) y el centro agr&iacute;cola cantonal de Riobamba (CAR).</p>', 'Imagen Proyecto.png', 0, '2018-05-30 01:54:10', '2018-05-30 02:12:01', 4),
(26, 'Trabajo comunitario, técnico ambiental y social en las unidades educativas de la ciudad de Riobamba: Actualización Presupuestaria', '<p>Fortalecimiento de la agenda de desarrollo econ&oacute;mico del Cant&oacute;n Riobamba.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:15:12', '2018-05-30 02:15:12', 7),
(27, 'Desarrollo de servicios básicos relacionados con el ciclo del agua, la energía renovable y la salud pública de las comunidades rurales, mediante la implementación de baterías sanitarias autónomas y cocinas ecológicas de la Parroquia de Pungalá: Actualización Presupuestaria.', '<p>Fortalecimiento de la agenda de desarrollo econ&oacute;mico del Cant&oacute;n Riobamba.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:16:33', '2018-05-30 02:16:33', 7),
(28, 'Centro de capacitación, gestión y asesoramiento en las áreas de administración, negocios, legislación, matemáticas, estadísticas, educación, información, comunicación, servicios, tecnologías y otros del Cantón Riobamba: Actualización Presupuestaria', '<p>Capacitaci&oacute;n, asesor&iacute;a, gesti&oacute;n y nuevos conocimientos para la sociedad del Milenio.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:17:40', '2018-05-30 02:17:40', 5),
(29, 'Impulso a los comerciantes minoristas de los mercados de los cantones: Guano Penipe, Chambo y Colta para fortalecer el desarrollo económico a través de la capacitación y asesoramiento en el área contable, tributaria y financiera - Actualización Presupuestaria', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:19:36', '2018-05-30 02:19:36', 5),
(30, 'Fortalecimiento de competitividad productiva - comercial de los productores agrícolas de la junta general de usuarios del sistema de riego Chambo Guano: Proyecto Nuevo', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:21:26', '2018-05-30 02:21:26', 5),
(31, 'Fortalecimiento de las capacidades a las y los funcionarios del CONAGOPARE de la Provincia de Chimborazo: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:23:13', '2018-05-30 02:23:13', 5),
(32, 'Proyecto centro de acopio para la comercialización y almacenamiento de empaques y embalajes para la EP-EMMPA empresa pública municipal mercado de productores agrícolas San Pedro de Riobamba: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:24:18', '2018-05-30 02:24:18', 5),
(33, 'Proyecto de desarrollo micro-empresarial con inclusión económica y social de actores de economía popular y solidaria y usuarios del MIES: Actualización Presupuestaria', '<p>Programa de marketing y econom&iacute;a popular y solidaria.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:25:40', '2018-05-30 02:25:40', 5),
(34, 'Proyecto de fortalecimiento de las capacidades a las y los técnicos del MAGAP y organizaciones socio productivas de la Provincia de Chimborazo año 2017: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:28:33', '2018-05-30 02:28:33', 5),
(35, 'Proyecto de vinculación entre a escuela superior politécnica de Chimborazo ESPOCH y el instituto de economía popular y solidaria IEPS: Actualización Presupuestaria', '<p>Programa de marketing y econom&iacute;a popular y solidaria.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:29:34', '2018-05-30 02:29:34', 5),
(36, 'Proyecto para desarrollar el comercio justo de productos orgánicos a fin de contribuir a la mejora de la calidad de vida de las personas discapacitadas de la fundación protección y descanso – Riobamba: Actualización Presupuestaria.', '<p>ESPOCH, polit&eacute;cnica latinoamericana por el comercio justo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:30:38', '2018-05-30 02:30:38', 5),
(37, 'Proyecto para la ejecución de un plan de comunicación alternativa para incrementar la actividad económica de los mercados de la ciudad de Riobamba mediante su reconocimiento social: Actualización Presupuestaria.', '<p>Fortalecimiento de la agenda de desarrollo econ&oacute;mico del Cant&oacute;n Riobamba.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:32:26', '2018-05-30 02:32:26', 5),
(38, 'Fortalecimiento de la producción pecuaria del cantón Riobamba, mediante la cooperación interinstitucional entre la facultad de ciencias pecuarias de la ESPOCH (FCP- ESPOCH) y el centro agrícola cantonal de Riobamba (CAR): Actualización Presupuestaria', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.&nbsp;</p>', 'Imagen Proyecto.png', 0, '2018-05-30 02:33:57', '2018-05-30 02:40:03', 6),
(39, 'Proyecto de desarrollo micro empresarial agropecuario con inclusión económica y social: Actualización Presupuestaria', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:37:32', '2018-05-30 02:37:32', 4),
(40, 'Fortalecimiento de la producción pecuaria del cantón Riobamba, mediante la cooperación interinstitucional entre la facultad de ciencias pecuarias de la ESPOCH (FCP- ESPOCH) y el centro agrícola cantonal de Riobamba (CAR)- Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:43:14', '2018-05-30 02:43:14', 4),
(41, 'Asistencia técnica para el desarrollo productivo de las familias del GAD parroquial la candelaria afectadas por el volcán Tungurahua como parte del Buen Vivir: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:45:30', '2018-05-30 02:45:30', 4),
(42, 'Hoy comemos carne: Actualización Presupuestarias.', '<p>Abriendo puertas al conocimiento para una mejor alimentaci&oacute;n.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:46:46', '2018-05-30 02:46:46', 4),
(43, 'Proyecto de capacitación, pasantías, vinculación tunshi ESPOCH (PRO - CAPAVI- TE): Actualizaciín Presupuestaria.', '<p>Vinculaci&oacute;n institucional con la sociedad.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:48:46', '2018-05-30 02:48:46', 4),
(44, 'Producción de semillas de leguminosas con agentes polinizadores manejo post cosecha y comercialización de semilla certificada: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:50:23', '2018-05-30 02:50:23', 4),
(45, 'Reactivación social y económica de la parroquia Licto mediante la inserción de estudiantes universitarios: Proyecto Nuevo.', '<p>Fortalecimiento de la agenda de desarrollo econ&oacute;mico del Cant&oacute;n Riobamba.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:55:16', '2018-05-30 02:55:16', 4),
(46, 'Apoyo terapéutico para el desarrollo psico-social de niños y niñas con capacidades diferentes de la ciudad de Riobamba: Actualización Presupuestaria.', '<p>La mascota Fel&iacute;z.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 02:57:10', '2018-05-30 02:57:10', 4),
(47, 'Asistencia y asesoramiento para el manejo y conservación de la vicuna de la RPFCH y comunidad san José de Tipin: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio-productivo de la Provincia de Chimborazo.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:01:16', '2018-05-30 03:01:16', 4),
(48, 'Cooperación técnico entre la escuela superior politécnica de Chimborazo y gobierno autónomo descentralizado municipal de Santiago de Quero: Actualización Presupuestaria.', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:03:08', '2018-05-30 03:03:08', 4),
(49, 'Creación de la unidad de difusión audiovisual EDG medios, para la difusión de producción audiovisual desarrollada en la ESPOCH:  Actualización Presupuestaria.', '<p>Tecnolog&iacute;a de la informaci&oacute;n y comunicaci&oacute;n aplicada a la educaci&oacute;n, arte y cultura, ambiente y energ&iacute;as alternativas.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:08:42', '2018-05-30 03:08:42', 1),
(50, 'Centro de tutorías y asesoría estudiantil de la facultad de informática y electrónica para estudiantes universitarios de Riobamba y de educación general básica media de los cantones Guano, Chambo y Riobamba.', '<p>Tecnolog&iacute;a de la informaci&oacute;n y comunicaci&oacute;n aplicada a la educaci&oacute;n, arte y cultura, ambiente y energ&iacute;as alternativas.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:10:57', '2018-05-30 03:10:57', 1),
(51, 'Centro de diseño gráfico y producción digital: Actualización Presupuestaria.', '<p>Tecnolog&iacute;a de la informaci&oacute;n y comunicaci&oacute;n aplicada a la educaci&oacute;n, arte y cultura, ambiente y energ&iacute;as alternativas.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:12:18', '2018-05-30 03:12:18', 1),
(52, 'Implementación de una red de sensores inalámbricos para el monitoreo y control de los contenedores de basura o ecotachos de la ciudad de Riobamba: Actualización Presupuestaria.', '<p>Tecnolog&iacute;a de la informaci&oacute;n y comunicaci&oacute;n aplicada a la educaci&oacute;n, arte y cultura, ambiente y energ&iacute;as alternativas.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:14:45', '2018-05-30 03:14:45', 1),
(53, 'Estrategias comunicativas a través de las tic para el aprendizaje del inglés (EFL) en los estudiantes no videntes en la unidad educativa especializada DR.: Luis Benavides: Actualización Presupuestaria.', '<p>Tecnolog&iacute;a de la informaci&oacute;n y comunicaci&oacute;n aplicada a la educaci&oacute;n, arte y cultura, ambiente y energ&iacute;as alternativas.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:17:15', '2018-05-30 03:17:15', 1),
(54, 'Implementación de sistemas de movilidad para la asociación de familiares de personas: Actualización Presupuestaria.', '<p>Transferencis de tecnolog&iacute;a a organnizaciones p&uacute;blicas y privadas en la zona de planificaci&oacute;n (3).</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:20:53', '2018-05-30 03:20:53', 3),
(55, 'Acciones de prevención y concientización dirigido a la colectividad para reducir siniestros de tránsito: Actualización Presupuestaria.', '<p>Fortalecimiento de la agenda de desarrollo econ&oacute;mico del cant&oacute;n Riobamba.</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:23:47', '2018-05-30 03:23:47', 3),
(56, 'HIDROAGOYAN CELEC-ESPOCH: Actualización Presupuestaria.', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:25:31', '2018-05-30 03:25:31', 3),
(57, 'Planificación y programación del mantenimiento de los equipos del hospital IESS Riobamba: Proyecto Nuevo', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:27:27', '2018-05-30 03:27:27', 3),
(58, 'Diagnostico técnico de los camiones de recolección de desechos sólidos del municipio de Riobamba basado en el monitoreo de parámetros de operación y mantenimiento: Proyecto Nuevo', '<p>Fortalecimeinto de la agenda de desarrollo econ&oacute;mico del Cant&oacute;n Riobamba.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:30:04', '2018-05-30 03:30:04', 3),
(59, 'Monitoreo de la condición de los equipos e instalaciones de las unidades médicas públicas de la provincia de Chimborazo: Proyecto Nuevo.', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:32:03', '2018-05-30 03:32:03', 3),
(60, 'Implementación de una granja integral en la unidad especializada Carlos Garbay: Actualización Presupuestaria.', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:38:51', '2018-05-30 03:38:51', 6),
(61, 'Diseño e implementación del proyecto de producción, transformación, comercialización y promoción de consumo de la quinua y sus derivados: Actualización Presupuestaria.', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:39:52', '2018-05-30 03:39:52', 6),
(62, 'Incremento de la producción a través del buen uso y manejo del agua de riego y niveles de fertilidad de los suelos, en la estación experimental Tunshi: Proyecto Nuevo', '<p>Impulso al desarrollo socio- productivo de la provincia de Chimborazo.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:42:14', '2018-05-30 03:42:14', 6),
(63, 'Fortalecimiento del turismo  comunitario en la provincia de Chimborazo: Actualización Presupuestaria', '<p>Arte, cultura y patrimonio&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:45:06', '2018-05-30 03:45:06', 6),
(64, 'Disminución del impacto ambiental, social y económico por el uso inadecuado de agroquímicos en los cultivos de las comunidades indígenas del cantón Guamote, provincia de Chimborazo, Ecuador: Actualización Presupuestaria.', '<p>Uso racional de PLAGUICIDAS</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:46:48', '2018-05-30 03:46:48', 6),
(65, 'Diseño e implementación de un programa de educación rural continua: Actualización Presupuestaria', '<p>Impulso al desarrollo socio-productivo de la Provincia de Chimborazo.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 03:49:47', '2018-05-30 03:49:47', 6),
(66, 'Aplicación de tecnologías Fitosanitarias para la protección de Mora, Frutilla y Tuna: Proyecto Nuevo', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:36:59', '2018-05-30 18:36:59', 6),
(67, 'Proyecto para desarrollar el comercio justo de productos orgánicos a fin de contribuir a la mejora de la calidad  de vida de las personas de la Fundación Protección y descanso Riobamba.', '<p>Vinculaci&oacute;n institucional con la sociedad.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:40:55', '2018-05-30 18:40:55', 6),
(68, 'Asesoría personalizada a los establecimientos de alimentos y bebidas en la Zona centro de N°3: Actualización Presupuestaria', '<p>Servicios de alimentos y bebidas.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:48:15', '2018-05-30 18:48:15', 2),
(69, 'Alimentación saludable para niñas y niños de la unidad educativa Nidia Jaramillo de la Ciudad de Riobamba 2017-2018: Actualización Presupuestaria', '<p>Servicios de alimentos y bebidas&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:50:25', '2018-05-30 18:50:25', 2),
(70, 'Promoción de hábitos saludables para mejorar la calidad de salud y nutrición en la primera infancia en los CIBVS, centros infantiles de los cantones Alausí, Guamote, Colta y Riobamba del MIES-Chimborazo: Actualización Presupuestaria.', '<p>Promoci&oacute;n de salud&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:53:13', '2018-05-30 18:53:13', 2),
(71, 'Hábitos de Aseo y alimentación de niños y niñas y adolescentes de las instituciones educativas del circuito Licto Flores.', '<p>Promoci&oacute;n de salud&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:54:52', '2018-05-30 18:54:52', 2),
(72, 'Primeros Auxilios básicos en docentes de colegios fiscales del sector urbano del Cantón Riobamba: Actualización Presupuestaria', '<p>Seguridad laboral y entornos saludables.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:57:15', '2018-05-30 18:57:15', 2),
(73, 'Asistencia gastronomica y nutrición a las familias productoras de Quinua orgánica de la Provincia de Chimborazo: Actualización Presupuestaria.', '<p>Servicios de alimentos y bebidas.&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 18:59:14', '2018-05-30 18:59:14', 2),
(74, 'Prevención de salud mental cogniscitivo y emocional en los adultos mayores del Hospital Geríatrico Bolívar Arguello del cantón Riobamba: Actualización Presupuestaria.', '<p>Promoci&oacute;n de salud&nbsp;</p>', 'Imagen Proyecto.png', 1, '2018-05-30 19:01:44', '2018-05-30 19:01:44', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `gallery_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_description` text COLLATE utf8mb4_unicode_ci,
  `gallery_state` tinyint(4) NOT NULL,
  `gallery_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gallery_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gallery_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`, `gallery_description`, `gallery_state`, `gallery_create`, `gallery_update`, `gallery_management_area`) VALUES
(7, 'Prueba', 'prueba', 0, '2019-01-09 19:39:22', '2019-03-28 20:38:01', 1),
(8, 'ESPOCH PRESENTE EN FERIA DE UNIVERSIDADES', 'ESPOCH PRESENTE EN FERIA DE UNIVERSIDADES', 1, '2019-03-28 20:39:15', '2019-03-28 20:39:46', 1),
(9, 'ESPOCH ENTREGA EQUIPAMIENTO PARA LA GRANJA INTEGRAL DE LA U.E. CARLOS GARBAY', 'ESPOCH ENTREGA EQUIPAMIENTO PARA LA GRANJA INTEGRAL DE LA U.E. CARLOS GARBAY', 1, '2019-03-28 20:44:13', '2019-03-28 20:44:13', 1),
(10, 'TALLER DE CAPACITACIÓN DIRIGIDO A LOS DOCENTES DE LA FADE', 'TALLER DE CAPACITACIÓN DIRIGIDO A LOS DOCENTES DE LA FADE', 1, '2019-03-29 03:32:37', '2019-03-29 03:32:37', 1),
(11, 'TALLER DE CAPACITACIÓN DIRIGIDO A LOS DOCENTES DE LA CARRERA DE NUTRICIÓN Y DIETÉTICA', 'TALLER DE CAPACITACIÓN DIRIGIDO A LOS DOCENTES DE LA CARRERA DE NUTRICIÓN Y DIETÉTICA', 1, '2019-03-29 03:44:05', '2019-03-29 03:44:05', 1),
(12, 'TALLER DE CAPACITACIÓN DIRIGIDO A LOS DOCENTES DE LA FACULTAD DE RECURSOS NATURALES', 'TALLER DE CAPACITACIÓN DIRIGIDO A LOS DOCENTES DE LA FACULTAD DE RECURSOS NATURALES', 1, '2019-03-29 03:48:55', '2019-03-29 03:48:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kryptonit3_counter_page`
--

CREATE TABLE `kryptonit3_counter_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `kryptonit3_counter_page`
--

INSERT INTO `kryptonit3_counter_page` (`id`, `page`) VALUES
(1, '77461b5f-d7ed-56a5-a2c2-a99aba7ce4f9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kryptonit3_counter_page_visitor`
--

CREATE TABLE `kryptonit3_counter_page_visitor` (
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `kryptonit3_counter_page_visitor`
--

INSERT INTO `kryptonit3_counter_page_visitor` (`page_id`, `visitor_id`, `created_at`) VALUES
(1, 1, '2017-08-26 04:58:25'),
(1, 2, '2019-04-11 02:03:03'),
(1, 3, '2017-08-25 07:07:18'),
(1, 4, '2017-08-26 07:29:36'),
(1, 5, '2017-08-26 09:26:06'),
(1, 6, '2017-08-29 10:52:09'),
(1, 7, '2018-01-22 04:51:45'),
(1, 8, '2017-09-22 11:00:06'),
(1, 9, '2018-07-06 21:21:26'),
(1, 10, '2017-10-02 21:41:52'),
(1, 11, '2017-09-22 11:13:14'),
(1, 12, '2017-10-18 19:53:11'),
(1, 13, '2017-10-26 06:09:44'),
(1, 14, '2017-12-04 01:28:38'),
(1, 15, '2017-11-10 00:50:14'),
(1, 16, '2017-12-01 20:01:11'),
(1, 17, '2017-11-28 03:30:01'),
(1, 18, '2018-03-02 18:06:41'),
(1, 19, '2017-11-30 01:43:43'),
(1, 20, '2017-11-23 07:22:00'),
(1, 21, '2018-08-18 01:40:37'),
(1, 22, '2017-11-23 22:47:28'),
(1, 23, '2017-11-24 00:49:51'),
(1, 24, '2017-11-24 22:18:03'),
(1, 25, '2017-11-25 04:54:48'),
(1, 26, '2017-11-28 00:48:27'),
(1, 27, '2018-06-08 09:04:36'),
(1, 28, '2017-11-28 03:03:39'),
(1, 29, '2017-11-29 02:11:11'),
(1, 30, '2017-12-01 03:47:51'),
(1, 31, '2017-12-03 07:21:03'),
(1, 32, '2018-02-16 19:14:27'),
(1, 33, '2018-02-02 19:09:33'),
(1, 34, '2018-02-20 22:30:04'),
(1, 35, '2018-03-01 00:03:27'),
(1, 36, '2018-03-01 00:03:51'),
(1, 37, '2018-03-01 19:43:25'),
(1, 38, '2018-03-22 18:24:00'),
(1, 39, '2018-08-08 04:04:32'),
(1, 40, '2018-11-19 21:38:59'),
(1, 41, '2018-12-19 20:06:09'),
(1, 42, '2018-03-24 00:46:27'),
(1, 43, '2018-03-08 23:41:00'),
(1, 44, '2018-03-22 01:53:02'),
(1, 45, '2019-03-20 22:25:45'),
(1, 46, '2018-03-22 03:48:15'),
(1, 47, '2018-03-22 05:08:52'),
(1, 48, '2018-03-22 05:59:23'),
(1, 49, '2018-03-22 19:51:54'),
(1, 50, '2018-03-23 07:49:32'),
(1, 51, '2018-03-23 00:50:49'),
(1, 52, '2018-03-23 01:33:35'),
(1, 53, '2018-03-23 02:09:53'),
(1, 54, '2018-03-23 07:13:25'),
(1, 55, '2018-03-23 07:18:01'),
(1, 56, '2018-03-23 16:41:50'),
(1, 57, '2018-03-23 19:41:24'),
(1, 58, '2018-03-23 22:52:22'),
(1, 59, '2018-03-24 03:49:00'),
(1, 60, '2018-03-24 04:00:57'),
(1, 61, '2018-03-25 01:12:48'),
(1, 62, '2018-03-26 18:17:32'),
(1, 63, '2018-03-26 21:13:51'),
(1, 64, '2018-05-14 20:34:33'),
(1, 65, '2018-12-20 02:38:30'),
(1, 66, '2018-03-27 18:59:33'),
(1, 67, '2018-03-27 21:49:47'),
(1, 68, '2018-03-28 01:30:32'),
(1, 69, '2018-03-29 01:23:55'),
(1, 70, '2018-03-29 05:32:55'),
(1, 71, '2018-04-28 17:34:43'),
(1, 72, '2018-03-29 19:17:23'),
(1, 73, '2018-03-29 20:53:49'),
(1, 74, '2018-03-29 21:11:29'),
(1, 75, '2018-03-29 23:58:18'),
(1, 76, '2018-04-09 05:36:11'),
(1, 77, '2018-04-02 06:08:15'),
(1, 78, '2018-04-02 07:36:38'),
(1, 79, '2019-01-07 04:42:47'),
(1, 80, '2018-04-03 08:27:50'),
(1, 81, '2018-04-10 09:17:56'),
(1, 82, '2018-04-04 07:15:39'),
(1, 83, '2018-04-04 22:56:57'),
(1, 84, '2018-04-05 00:16:13'),
(1, 85, '2018-04-05 04:11:11'),
(1, 86, '2018-04-06 00:53:18'),
(1, 87, '2018-04-06 19:25:30'),
(1, 88, '2018-04-09 06:02:46'),
(1, 89, '2018-04-11 00:33:39'),
(1, 90, '2018-04-11 00:50:03'),
(1, 91, '2018-04-11 04:43:05'),
(1, 92, '2018-04-11 19:09:44'),
(1, 93, '2018-04-11 21:54:54'),
(1, 94, '2018-04-11 22:43:07'),
(1, 95, '2018-04-11 23:44:37'),
(1, 96, '2018-04-12 01:38:00'),
(1, 97, '2018-04-13 06:22:45'),
(1, 98, '2018-04-13 20:27:15'),
(1, 99, '2018-04-13 21:54:39'),
(1, 100, '2018-04-19 09:03:13'),
(1, 101, '2018-04-18 03:46:27'),
(1, 102, '2018-04-18 20:30:01'),
(1, 103, '2018-04-19 16:59:20'),
(1, 104, '2018-04-19 22:00:10'),
(1, 105, '2018-04-20 05:44:21'),
(1, 971, '2019-05-11 01:19:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kryptonit3_counter_visitor`
--

CREATE TABLE `kryptonit3_counter_visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `kryptonit3_counter_visitor`
--

INSERT INTO `kryptonit3_counter_visitor` (`id`, `visitor`) VALUES
(79, '01d8647699842d30dd9b729ce5a468c0def333b58d8f8b25816ced164b7ec9d9'),
(20, '02a0311a23dbc13d5234458cf069dcaa135849c157e80b6ba972bd33a7c96b93'),
(52, '041ca15093d260dc60a7b33eaedd04c78fe99f2df7ca75ff2df4436f9037e34b'),
(34, '05f19ec8b77d4e371113ccaf362ab9c41aac561df40048322b21206d4521a1f3'),
(71, '09c8505780a87f593d2f82489944e82f65b6e7e514277509865f463b2c397cc7'),
(22, '0bd0704a15dd8ed7bf3fe65db94ad7e0b798c61eaf46bb5b21174adcbd39dfc1'),
(99, '11fa0d36c8b3b7dc20d1ce41ba3878263e40c0302e17734e4d56a06c718592b4'),
(80, '123f1b4378567594d60837bc448b5608055e992b9efad9e8e83e8d2485ad8294'),
(91, '131a2830ffa3b03d4d011ff67047ce4b43986af340b1b4ea98d0a1f9899dfd7a'),
(87, '1487ebb56d10913675a94393ae3bdc7d7aa4ba2ca757916052b7974389342189'),
(90, '1d9191b48e432829bf1c62d9370db3881706793bf4113ac4625c7441ef0a1838'),
(75, '1fdf081e5fcfe5b7b735c527ab0d28b6eaadcace99d1276a81017abccb385aeb'),
(3, '22ad30a54cdf9167fcb79b96f353fa4023f4ec0776a46bc29a6de1defd181ac3'),
(49, '241d2a9da075c9b7dac62f930365f06e19095c0ee320009ffa395cb9071c6bc9'),
(32, '26d5af7171dd5e8ba9712c2a37d23a5b66e513e47f50665803c706076b500884'),
(44, '2773801d83add2dd6faa83b109c251233d527f97da944597d3d29495f84da759'),
(65, '2e29ea5d026a195efd527a8957ab84fb8f86e76e1aa02fcc24264bb377516379'),
(36, '2edc6db72ca088abd9882aeaba291467e75b0e02280e720c192712bf8d8813fb'),
(51, '31da630be4b0d1b602cb425617a5e2b834ae0afc477d24e8581a421514956aa4'),
(7, '34494c20f11c6a6bf985c9baba6bb9f727bc98b65d22d746035d431181f37761'),
(12, '34aeaa2aad951fff3b7125333f145f95da55c6eb7d0901a6feeb9e28c7b9c8d0'),
(69, '369b246625adbac8a5b538a30da132160df5f7ff2125fee0983a881b16feeb56'),
(10, '370f029f515b3682abda4099a6d198001dd0da836c0a7b16d55241ff652012be'),
(100, '3725621c0cb18f15cbcf52d2c6b3dcd00043f2962c858a54e7e9156d9bf33bec'),
(14, '3a123123073b7fcaf8a27de139a72ec4070e353795125fdb8989dccd8d181e0c'),
(92, '3a456f1b8f5a32b777352b641b4d8745575cd4acc6a8836c2a6f38906cc17da3'),
(6, '3c31cbcccd78408ddff12676649e820d0380ff8190175f408b0ff2bc3f5b7849'),
(89, '428467c69bf63285a278512b0741a64f2b008f586e5b0ca667def726d132aad1'),
(105, '446e267cb7a71885142c819adb06f3509b760d08b692cd21a478f995e48ef732'),
(88, '44e0e79d2e9b7077bbf071225cb6375fa6549e870b59f0639c25f34a0d83b36f'),
(96, '458e23b0fc69585941c1fd980a9750b516425c11b96c9a676bfa35dc61086635'),
(102, '46911ca9af496e13af3afea6647714d44dec4e52b113afb8adef55f5019bae10'),
(72, '4f859e9ba25a968e5e899a4ad6cd8e7bd4e5fab61eda527b6dc90f9956e7661b'),
(971, '50b5a83bd46f3f62401613e5b790be90b44c87b7c4499c15a477e55ff712a43f'),
(29, '51731e4bac185955a322c92f552c4fe5eab8f338e5ac79196c2b45bd5be065e0'),
(47, '52bfff182596fc40c89dc8036dd15381d86a12ea2f376fa466a12b6cb2ea8eac'),
(58, '540b592eaea8592293771015f98b0bb80e246845fcc393e1aec43e03a096a85a'),
(24, '547297ba362b232bd9514a679f73622cd01804536d64abc755bfc1778667041b'),
(23, '563f89840404a8d1951117135ba7a4ef2531cf6357483e77564bc696c77d72e1'),
(67, '59404a6f3851ebd525d27d3c95bbbc040d938b4ec9e80514f94558283243f51f'),
(66, '5a7bbb5cf6c5ebc0fc00c2eca01c36dd630b91eaab2036573d27533af400c96c'),
(25, '5ab03cd3ebc12d32950fc210dbcd6afe03af3297e54923eedcffda5c0fd44bd6'),
(74, '5c3bca87e50eb8a8f36bff98d56c149e8232d4680797a520037f07afe7932a64'),
(93, '5d1ec1dda05a7164add797d838c958f806d6efb240f8ab35b420d3d90672ee37'),
(38, '5d5ea604c8dfae2edfc636d29706fe6a022b7007dd997e0556a173464b9730cb'),
(21, '5f7897e9d8237dea310a0d7655a7ee382b8fdebcc9fd87bdcc3891c574572d01'),
(15, '6074242405f0ac1714cef42a1500108216827018b661002629bfb7c09bddb318'),
(85, '6202214135c38fb4d804aefb9bba6c56fd939383a988aea070e1459163756d6e'),
(61, '621dcd5c5a9dd14d734aa50dc763fa23e2c3e0e6750f0fa5da3e5c18f9a34a38'),
(41, '726b1d3b5e8991359401324351e2bda8be8b0ffef204a38d41bc24122118fe3c'),
(40, '736339f370e2de8c820e6758ea61da5b396535383a03da44d2f718c52cfa09b2'),
(78, '7413897688f8ae4d4c83d841687f921b32ff9f85fd307ecfd1442a4ed055efb8'),
(86, '83da785a5da5ed1d82843955f9c9adba1aac1eb4d366bc1ea7d62d0b1ba9a772'),
(17, '8490fcc45535f5776758b80526ac09772b7cc92af2d609eb66aa80ba2b0b2f33'),
(48, '8bd52263ccccc39c34133ea04fc5e2901739638c1f190b1e6300d3e042f8bb3b'),
(35, '90ecf9648ecce7834b05c6972080045f451f2c205fa339a49484c54c839afe7c'),
(11, '916a78a82c592d0a0fc768d8f88ad72262842756c35d4afb0968199f7eb94e87'),
(31, '948fdb46a2e683653b6cceaeac44a9e1a253d2770132ce0120e9d5c8a42e04d8'),
(42, '9897824a165f6b6ae6dc80c32bbdec52943919a841fc96ee062d7cfb6d970cf2'),
(45, '9da3f003d07d182b6897469c97305195fb0674df2e8746b58f77544a7edb754e'),
(4, '9dc09bf43df458a22118f87a08c745d41871ef08b3d529c3dd131484fd0f0c70'),
(59, '9dd4902004a1d13818e3d40d1fc8b9dfaf37bd683a43f95d24fc95d5c221abf3'),
(68, '9ecee111df3afeca754ce54b066d8eb4340b45c5d90fec8216c45aef102a7e34'),
(9, '9fb802ddb985b2b67a7036cb6fe1d81d5dcd58620704b7c6934f260c3ef6086a'),
(43, 'a0a95452bccf9ed1209b01e1b27aeadc73d3531d79668b761a99b64adf85d41d'),
(104, 'a109c199d2e7aa53a60538dbba225b19c6006c1b9ee22723b3203746374f0457'),
(54, 'a27b3059442931985690a2f3d1f3b0320089549cb311e7fdb871c70abf9d1571'),
(53, 'a56ea7702bb65ec6b18de119b95cd713e2dc00e14ba1c426627cba5a9a5df7dd'),
(101, 'a733f43bdb20c4947decb7f73e8cbdb5c14a5f7306a52ccc8e1a34b69e200c98'),
(33, 'ad8fdcbbe772103f58d42b032f7cf76cad7d39103aaee81d32e5187d2f75dc7c'),
(19, 'afaaac18c8dde8fd53ca7df645b53760900acebac76f893311ce236e6f44e135'),
(64, 'b1ea36533970dbcd9dc660f56003e885952399e4b00d85370bee35b6531abc97'),
(82, 'ba9a2269142a933af4c48bfb0a3104100a4b8f78c57a017ad64fa4555b6687d5'),
(94, 'babf604d2676c5eb9b82d05eeebbc317f6aff33bdf2559d4b53002e14ec0381b'),
(18, 'bc49c563bd3f32fa7efbb971bf1864fa52f71365be11107d0d338dc2dfeff0fc'),
(39, 'bc86127e7b9733a6dd2ef5e3c7808ea0186d94ee8cf12770a37781e68d18e0b9'),
(46, 'beb9bd0f6af1bbeba2edac3bc4537ec2abb616f1d8c5428b7fac9b6b3f4867b5'),
(60, 'bf4ff22a345b0fa08b7cee63ea37c8fb60160045c1e4514faf05fe75b79784cf'),
(95, 'c0705e2ad2af678180c79af3396a66c7915c3116dcf0503d48105a07cafedabf'),
(30, 'c2b24b9a7cf4c1fc934c141106888660aa8705e23c6334ab5eea2bdf87743e6d'),
(55, 'c3b9f1b727c94d1c50c5003548b3000c1ac18f7fa2fb53a8eafbfd23f08779d8'),
(84, 'c5e965f2fb19d2a44e7168f57142ba69f033e40208adb332cb17e7a863d84687'),
(56, 'c87da645f201c9dcf71f40854d7d472aa3a23dff8761fd191aa0d90f2cf57b25'),
(26, 'cb129dfaf5e7b09273dfddd0e70bad3e1000d190c3735a3d2028d349b5921d80'),
(1, 'd0079facefea9642398a1e4a0447489d3340b6785b390e1c4f2818f604d893e8'),
(73, 'd096758ffa8ea0e954b0a65b5f03a0ad14bf480cbab12031dc401ae44bf0f709'),
(27, 'd1a77ea9d5a4bc3b6f6c2fe196c1b73bd82156824dfa10d194d62a1ddb668fb0'),
(83, 'd391b6d1da677e34daf0ed8430566e0fb24a800f726b84bfde92d1aaa01629f7'),
(2, 'd53b99e9fe9568808a6a643c88beb74a4cfe55419b6a9a663d6b3637249b88a2'),
(97, 'd9b340d697c77229de080813c8d2b03a87cab818464cc6e9cf0c11b8f3dea17f'),
(98, 'daf07a9efc3ea5c0837d3400e39ca0de82ff64813ad4933d0ca9892453b9e54b'),
(63, 'dbcd11bede1145a91450999ff42034e77f44a541a176c2063bb1813a189b1685'),
(16, 'dc9bd12918c7f33ff5b1512f695c7526176fdc3aa39b57dfef1cd1a407cf6142'),
(13, 'ddf95cf1486aeb7454b336c42225c94e4f5eaa2fee1137c2f2f7bdfa2524f7b8'),
(5, 'e0a1468d2fb6744f29cbc97f0bcc7ffd2281dce5e013e4033ba9228554553887'),
(81, 'e48ffe29ae76ffd574003106bdbf0d97005b9e36d1d630d06b446ccd01dbe351'),
(8, 'e4eb2ac57257f1b644e1238fa7ed5b638e6df48bdd1877922ff21a10d06cb4b3'),
(103, 'ebb76cda4a5f07595ffdfa51d28583d99412fb898f764b0995f5067eb8beee75'),
(77, 'ebeb67028e7d38c3932a0c36aac3ef64bf13ac4726b3c47dbcf56755de26f762'),
(76, 'ebefbf16c3aa1dc4cb9ed3b070f7e450fe32cd705b53558e646270350b1c14ec'),
(62, 'f0331e563ba02eceb1a51c89c99539cbcc30ab5c4df9b7bff1fb7923f7307231'),
(37, 'f171a7b7c6837574a76e0c1213e60e1ececafd09aec6b46db87e6f01d96d145b'),
(50, 'f3cd773039a10e9cc8063aea0b1ba72b29c9223460d20935d7e8558f7e624188'),
(70, 'f61915673acf953932bc775ac2a7f420554dfd1d071a3e98c163057dc645e788'),
(28, 'f697a458f2ad8ce6ca4ce1fa324def14a4a4613a704f3b3d8a6e39cd050bffc5'),
(57, 'f9d234abb86cc73b446ea196ac0b8950b912b2a93f7ebbb16375b17fa1954425');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link`
--

CREATE TABLE `link` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `link_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_description` text COLLATE utf8mb4_unicode_ci,
  `link_state` tinyint(4) NOT NULL,
  `link_category` int(10) UNSIGNED NOT NULL,
  `link_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `link`
--

INSERT INTO `link` (`link_id`, `link_name`, `link_url`, `link_description`, `link_state`, `link_category`, `link_create`, `link_update`, `link_management_area`) VALUES
(1, 'Documentacion', 'http://cimogsys.espoch.edu.ec/vinculacion/', 'Documentos', 1, 2, '2017-12-02 01:37:37', '2017-12-02 01:37:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `magazine`
--

CREATE TABLE `magazine` (
  `magazine_id` int(10) NOT NULL,
  `magazine_name` varchar(200) NOT NULL,
  `magazine_image` varchar(200) NOT NULL,
  `magazine_file` varchar(200) NOT NULL,
  `magazine_flash` varchar(200) NOT NULL,
  `magazine_state` int(1) NOT NULL COMMENT 'Eliminación lógica',
  `magazine_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para el registro de Revistas';

--
-- Volcado de datos para la tabla `magazine`
--

INSERT INTO `magazine` (`magazine_id`, `magazine_name`, `magazine_image`, `magazine_file`, `magazine_flash`, `magazine_state`, `magazine_management_area`) VALUES
(1, 'Primera edición', 'integra 1ra.PNG', 'Revista_Integra.pdf', 'Revista-Integra.swf', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `management_area`
--

CREATE TABLE `management_area` (
  `management_area_id` int(10) UNSIGNED NOT NULL,
  `management_area_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `management_area_logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_area_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_area_map` text COLLATE utf8mb4_unicode_ci,
  `management_area_mission` text COLLATE utf8mb4_unicode_ci,
  `management_area_vision` text COLLATE utf8mb4_unicode_ci,
  `management_area_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `management_area_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `management_area_objective` text COLLATE utf8mb4_unicode_ci,
  `management_area_description` text COLLATE utf8mb4_unicode_ci,
  `management_area_functions` text COLLATE utf8mb4_unicode_ci,
  `management_area_mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_area_direction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_area_image_mission` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_area_image_objective` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_area_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managment_main_image1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managment_main_image2` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managment_main_image3` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managment_main_image4` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `management_area`
--

INSERT INTO `management_area` (`management_area_id`, `management_area_name`, `management_area_logo`, `management_area_phone`, `management_area_map`, `management_area_mission`, `management_area_vision`, `management_area_create`, `management_area_update`, `management_area_objective`, `management_area_description`, `management_area_functions`, `management_area_mail`, `management_area_direction`, `management_area_image_mission`, `management_area_image_objective`, `management_area_image`, `managment_main_image1`, `managment_main_image2`, `managment_main_image3`, `managment_main_image4`) VALUES
(1, 'Relaciones Internacionales', 'WhatsApp Image 2019-05-07 at 9.21.45 AM.jpeg', 'ingresar Teléfono', 'https://maps.googleapis.com/maps/api/staticmap?center=ESPOCH&zoom=14&size=600x250&key= AIzaSyB3LjBxUQQxoo9am7zhgGavFQH1o6Z-zxQ', '<p>Ingresar Misi&oacute;n&nbsp;</p>', '<p>Ingresar Visi&oacute;n&nbsp;</p>', '2001-01-30 05:00:00', '2019-05-11 00:46:16', '<p>Ingresar Objetivos</p>', '<p>Ingresar Quienes Somos</p>', '<p>Ingresar Funciones</p>', 'ingresarcorreo@espoch.edu.ec', 'Panamericana Sur km 1 ½', 'IMAGEN-MISION.jpeg', 'IMAGEN-OBJETIVOS.jpeg', 'IMAGEN-INDEX.jpg', 'WhatsApp Image 2019-02-18 at 8.40.34 AM.jpeg', 'WhatsApp Image 2019-02-15 at 12.26.16 PM.jpeg', 'WhatsApp Image 2019-02-15 at 12.26.16 PM (1).jpeg', 'WhatsApp Image 2019-02-18 at 8.40.34 AM.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_03_12_004806_create_database_tables', 1),
(3, '2017_04_16_022414_newTables', 1),
(4, '2015_06_21_181359_create_kryptonit3_counter_page_table', 2),
(5, '2015_06_21_193003_create_kryptonit3_counter_visitor_table', 2),
(6, '2015_06_21_193059_create_kryptonit3_counter_page_visitor_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `multimedia_id` int(10) UNSIGNED NOT NULL,
  `multimedia_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multimedia_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multimedia_news` int(10) UNSIGNED DEFAULT NULL,
  `multimedia_gallery` int(10) UNSIGNED DEFAULT NULL,
  `multimedia_cultural_management_types` int(10) UNSIGNED DEFAULT NULL,
  `multimedia_type` int(10) UNSIGNED NOT NULL,
  `multimedia_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `multimedia_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`multimedia_id`, `multimedia_name`, `multimedia_url`, `multimedia_news`, `multimedia_gallery`, `multimedia_cultural_management_types`, `multimedia_type`, `multimedia_create`, `multimedia_update`) VALUES
(11, 'DANZA LATINA1.jpg', NULL, NULL, NULL, 2, 1, '2017-08-17 03:52:22', '2017-08-17 03:52:22'),
(12, 'DANZA LATINA2.jpg', NULL, NULL, NULL, 2, 1, '2017-08-17 03:52:22', '2017-08-17 03:52:22'),
(13, 'DANZA LATINA3.jpg', NULL, NULL, NULL, 2, 1, '2017-08-17 03:52:22', '2017-08-17 03:52:22'),
(14, 'DANZA CONTEMPORANEA.jpg', NULL, NULL, NULL, 1, 1, '2017-08-17 03:52:39', '2017-08-17 03:52:39'),
(24, 'GUITARRA.jpg', NULL, NULL, NULL, 3, 1, '2017-08-26 04:17:34', '2017-08-26 04:17:34'),
(25, 'CANTO.jpg', NULL, NULL, NULL, 6, 1, '2017-08-26 04:17:46', '2017-08-26 04:17:46'),
(26, 'PIANO.jpg', NULL, NULL, NULL, 5, 1, '2017-08-26 04:17:56', '2017-08-26 04:17:56'),
(27, 'INSTRUMENTOS ANDINOS.jpg', NULL, NULL, NULL, 4, 1, '2017-08-26 04:18:07', '2017-08-26 04:18:07'),
(28, 'TEATRO POPULAR.jpg', NULL, NULL, NULL, 8, 1, '2017-08-26 04:19:22', '2017-08-26 04:19:22'),
(29, 'TEATRO POPULAR1.jpg', NULL, NULL, NULL, 8, 1, '2017-08-26 04:19:22', '2017-08-26 04:19:22'),
(30, 'TEATRO CONVENCIONAL.jpg', NULL, NULL, NULL, 7, 1, '2017-08-26 04:19:34', '2017-08-26 04:19:34'),
(31, 'TEATRO CONVENCIONAL1.jpg', NULL, NULL, NULL, 7, 1, '2017-08-26 04:19:34', '2017-08-26 04:19:34'),
(37, 'GRUPO TABAKO.jpg', NULL, NULL, NULL, 13, 1, '2017-08-26 04:22:59', '2017-08-26 04:22:59'),
(38, 'GRUPO TABAKO1.jpg', NULL, NULL, NULL, 13, 1, '2017-08-26 04:22:59', '2017-08-26 04:22:59'),
(40, 'GRUPOS INSTITUCIONALES.jpg', NULL, NULL, NULL, 12, 1, '2017-08-26 04:23:45', '2017-08-26 04:23:45'),
(54, '22855586_1167362073395845_1345009820_n.jpg', NULL, NULL, NULL, 15, 1, '2017-12-02 01:30:49', '2017-12-02 01:30:49'),
(55, '22855586_1167362073395845_1345009820_n.jpg', NULL, NULL, NULL, 15, 1, '2017-12-02 01:30:51', '2017-12-02 01:30:51'),
(169, 'cima.jpg', NULL, NULL, NULL, 14, 1, '2018-06-28 21:30:55', '2018-06-28 21:30:55'),
(170, '04 W 945.jpg', NULL, NULL, NULL, 11, 1, '2018-06-28 21:34:24', '2018-06-28 21:34:24'),
(171, 'CUERDASyVIENTOS.jpg', NULL, NULL, NULL, 9, 1, '2018-06-28 21:40:27', '2018-06-28 21:40:27'),
(367, 'FU2.jpg', NULL, NULL, 8, NULL, 1, '2019-03-28 20:40:17', '2019-03-28 20:40:17'),
(368, 'FU3.jpg', NULL, NULL, 8, NULL, 1, '2019-03-28 20:40:30', '2019-03-28 20:40:30'),
(369, 'FU4.jpg', NULL, NULL, 8, NULL, 1, '2019-03-28 20:40:43', '2019-03-28 20:40:43'),
(370, 'EG2.jpg', NULL, NULL, 9, NULL, 1, '2019-03-28 20:46:33', '2019-03-28 20:46:33'),
(371, 'EG3.jpg', NULL, NULL, 9, NULL, 1, '2019-03-28 20:47:05', '2019-03-28 20:47:05'),
(372, 'EG4.jpg', NULL, NULL, 9, NULL, 1, '2019-03-28 20:47:24', '2019-03-28 20:47:24'),
(373, 'EG5.jpg', NULL, NULL, 9, NULL, 1, '2019-03-28 20:47:40', '2019-03-28 20:47:40'),
(381, 'SO-FADE2.jpg', NULL, NULL, 10, NULL, 1, '2019-03-29 03:42:23', '2019-03-29 03:42:23'),
(383, 'SONUTRI1.JPG', NULL, NULL, 11, NULL, 1, '2019-03-29 03:45:51', '2019-03-29 03:45:51'),
(384, 'SONUTRI2.JPG', NULL, NULL, 11, NULL, 1, '2019-03-29 03:46:06', '2019-03-29 03:46:06'),
(385, 'SONUTRI3.JPG', NULL, NULL, 11, NULL, 1, '2019-03-29 03:46:20', '2019-03-29 03:46:20'),
(386, 'SONUTRI4.JPG', NULL, NULL, 11, NULL, 1, '2019-03-29 03:46:34', '2019-03-29 03:46:34'),
(387, 'SORRNN1.JPG', NULL, NULL, 12, NULL, 1, '2019-03-29 03:49:15', '2019-03-29 03:49:15'),
(388, 'SORRNN2.JPG', NULL, NULL, 12, NULL, 1, '2019-03-29 03:49:30', '2019-03-29 03:49:30'),
(389, 'SORRNN3.JPG', NULL, NULL, 12, NULL, 1, '2019-03-29 03:49:43', '2019-03-29 03:49:43'),
(390, 'SORRNN4.JPG', NULL, NULL, 12, NULL, 1, '2019-03-29 03:49:56', '2019-03-29 03:49:56'),
(391, 'SORRNN5.JPG', NULL, NULL, 12, NULL, 1, '2019-03-29 03:50:30', '2019-03-29 03:50:30'),
(392, 'SORRNN6.JPG', NULL, NULL, 12, NULL, 1, '2019-03-29 03:50:46', '2019-03-29 03:50:46'),
(393, 'news.png', NULL, 4, NULL, NULL, 1, '2019-05-11 00:37:05', '2019-05-11 00:37:05'),
(394, 'cuestionario-evento_(1).png', NULL, 5, NULL, NULL, 1, '2019-05-11 00:37:55', '2019-05-11 00:37:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia_type`
--

CREATE TABLE `multimedia_type` (
  `multimedia_type_id` int(10) UNSIGNED NOT NULL,
  `multimedia_type_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `multimedia_type`
--

INSERT INTO `multimedia_type` (`multimedia_type_id`, `multimedia_type_description`) VALUES
(2, 'Archivo'),
(3, 'Enlace'),
(1, 'Fotografía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `news_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_state` tinyint(4) NOT NULL,
  `news_author` int(10) UNSIGNED NOT NULL,
  `news_type` int(10) UNSIGNED NOT NULL,
  `news_management_area` int(10) UNSIGNED NOT NULL,
  `news_user` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para referenciar '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_alias`, `news_create`, `news_update`, `news_state`, `news_author`, `news_type`, `news_management_area`, `news_user`) VALUES
(4, 'Noticia', '<p>Aqui debe ingresar la informaci&oacute;n de la noticia&nbsp;</p>', 'Este es un Ejemplo de Noticia', '2019-05-10 05:00:00', '2019-05-11 00:36:21', 1, 1, 2, 1, NULL),
(5, 'Evento', '<p>Ingresar la Informacion del Evento</p>', 'Este es un Ejemplo de Evento', '2019-05-11 00:37:41', '2019-05-11 00:37:41', 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_type`
--

CREATE TABLE `news_type` (
  `news_type_id` int(10) UNSIGNED NOT NULL,
  `news_type_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news_type`
--

INSERT INTO `news_type` (`news_type_id`, `news_type_description`) VALUES
(1, 'Evento'),
(2, 'Noticia'),
(3, 'Oferta Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `projects_id` int(10) UNSIGNED NOT NULL,
  `projects_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_state` tinyint(4) NOT NULL,
  `projects_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `projects_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `projects_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`projects_id`, `projects_name`, `projects_description`, `projects_state`, `projects_create`, `projects_update`, `projects_management_area`) VALUES
(1, 'proyecto', '<p>asdasdasd</p>', 1, '2017-08-17 03:44:03', '2017-08-17 03:44:03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_network`
--

CREATE TABLE `social_network` (
  `social_network_id` int(10) UNSIGNED NOT NULL,
  `social_network_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_network_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_network_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_network_state` tinyint(4) NOT NULL,
  `social_network_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `social_network_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `social_network_management_area` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `social_network`
--

INSERT INTO `social_network` (`social_network_id`, `social_network_name`, `social_network_url`, `social_network_image`, `social_network_state`, `social_network_create`, `social_network_update`, `social_network_management_area`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'facebook-verde1.svg', 1, '2017-08-25 03:24:28', '2019-05-10 19:38:21', 1),
(2, 'Twitter', 'https://twitter.com/', 'twitter-verde1.svg', 1, '2018-03-08 21:04:06', '2019-05-10 19:38:29', 1),
(3, 'Instragram', 'https://www.instagram.com/', 'instagram-verde1.svg', 1, '2017-11-30 01:41:26', '2019-05-10 19:38:39', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_last_name`, `user_mail`, `user_photo`, `user_create`, `user_update`, `remember_token`, `password`, `user_phone`, `user_type`) VALUES
(1, 'Centro', 'Cimogsys', 'direccion@cimogsys.com', NULL, '2017-08-12 22:08:54', '2019-04-15 21:21:49', 'lUbVivOv0Df3tog3oOM3h8tf4IzrFHBjS82vOjCW2i41z5AmKn0G9MeaP2Ir', '$2y$10$6.sc8ie9MrpMaT6Cg4tMUuDIXRVDB277XCAvM0efNf3lwTBmB73By', NULL, 1),
(2, 'director', 'director', 'director@gmail.com', NULL, '0000-00-00 00:00:00', '2018-10-16 15:28:39', 'Dvx5BnTGrjUDrw4hoTcNBVBeTJdzv7cLofqVSFMzKfJdQ2zQyAXHYHki9AH6', '$2y$10$clHj1CPS1PTid3EDZjmI7ebIYEQuhI753Q5TT8IhsH2VpFvo8pQPC', NULL, 2),
(4, 'editor', 'editor', 'editor@gmail.com', 'perfil-01.jpg', '0000-00-00 00:00:00', '2018-10-16 15:29:46', '5UVXr64ttuBg42XoC8JhcaiHeHjroiABbTh82C32X6FkB7qjRq5i4iTeE9oB', '$2y$10$D29/mOlf6dnEIYVDG4O1l.ycYT.54Fawo0mMF8V5Hql9kiyrsyMza', NULL, 3),
(9, 'Empresa', 'Universal', 'info@universal.com', NULL, '0000-00-00 00:00:00', '2018-08-09 20:18:27', 'QYRc0Cmmv4pWCpT5LGDmLLvNDG8AKVTyHpOMN7cxBMjCe6WWAAF4whxJUjmU', '$2y$10$XBNXSGQBJAKxhszNKOgZIuoHh087GA3wryHLrCm3mCqiQlityWDrm', '0999999910', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `user_type_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_description`) VALUES
(1, 'Cimogsys'),
(2, 'Director'),
(3, 'Editor'),
(4, 'Empresa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`authority_id`),
  ADD UNIQUE KEY `authority_authority_cv_unique` (`authority_cv`),
  ADD UNIQUE KEY `authority_authority_photo_unique` (`authority_photo`),
  ADD KEY `authority_authority_type_foreign` (`authority_type`),
  ADD KEY `authority_authority_management_area_foreign` (`authority_management_area`);

--
-- Indices de la tabla `authority_type`
--
ALTER TABLE `authority_type`
  ADD PRIMARY KEY (`authority_type_id`),
  ADD UNIQUE KEY `authority_type_authority_type_description_unique` (`authority_type_description`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_category_description_unique` (`category_description`),
  ADD KEY `category_category_parent_foreign` (`category_parent`);

--
-- Indices de la tabla `conventions`
--
ALTER TABLE `conventions`
  ADD PRIMARY KEY (`conventions_id`),
  ADD KEY `conventions_conventions_management_area_foreign` (`conventions_management_area`);

--
-- Indices de la tabla `cultural_management`
--
ALTER TABLE `cultural_management`
  ADD PRIMARY KEY (`cultural_management_id`),
  ADD UNIQUE KEY `cultural_management_cultural_management_name_unique` (`cultural_management_name`),
  ADD KEY `cultural_management_cultural_management_management_area_foreign` (`cultural_management_management_area`);

--
-- Indices de la tabla `cultural_management_types`
--
ALTER TABLE `cultural_management_types`
  ADD PRIMARY KEY (`cultural_management_types_id`),
  ADD UNIQUE KEY `cultural_management_types_cultural_management_types_name_unique` (`cultural_management_types_name`),
  ADD KEY `cultural_management_types_cultural_management_types_area_foreign` (`cultural_management_types_area`);

--
-- Indices de la tabla `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`download_id`),
  ADD UNIQUE KEY `download_download_name_unique` (`download_name`),
  ADD KEY `download_download_management_area_foreign` (`download_management_area`);

--
-- Indices de la tabla `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_faculty_name_unique` (`faculty_name`),
  ADD KEY `faculty_faculty_management_area_foreign` (`faculty_management_area`);

--
-- Indices de la tabla `faculty_news`
--
ALTER TABLE `faculty_news`
  ADD PRIMARY KEY (`faculty_news_id`),
  ADD KEY `faculty_news_faculty_news_faculty_foreign` (`faculty_news_faculty`);

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD UNIQUE KEY `gallery_gallery_name_unique` (`gallery_name`),
  ADD KEY `gallery_gallery_management_area_foreign` (`gallery_management_area`);

--
-- Indices de la tabla `kryptonit3_counter_page`
--
ALTER TABLE `kryptonit3_counter_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kryptonit3_counter_page_page_unique` (`page`);

--
-- Indices de la tabla `kryptonit3_counter_page_visitor`
--
ALTER TABLE `kryptonit3_counter_page_visitor`
  ADD KEY `kryptonit3_counter_page_visitor_page_id_index` (`page_id`),
  ADD KEY `kryptonit3_counter_page_visitor_visitor_id_index` (`visitor_id`);

--
-- Indices de la tabla `kryptonit3_counter_visitor`
--
ALTER TABLE `kryptonit3_counter_visitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kryptonit3_counter_visitor_visitor_unique` (`visitor`);

--
-- Indices de la tabla `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`link_id`),
  ADD UNIQUE KEY `link_link_name_unique` (`link_name`),
  ADD KEY `link_link_category_foreign` (`link_category`),
  ADD KEY `link_link_management_area_foreign` (`link_management_area`);

--
-- Indices de la tabla `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`magazine_id`),
  ADD KEY `magazine_management_area` (`magazine_management_area`);

--
-- Indices de la tabla `management_area`
--
ALTER TABLE `management_area`
  ADD PRIMARY KEY (`management_area_id`),
  ADD UNIQUE KEY `management_area_management_area_name_unique` (`management_area_name`),
  ADD UNIQUE KEY `management_area_management_area_logo_unique` (`management_area_logo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`multimedia_id`),
  ADD KEY `multimedia_multimedia_news_foreign` (`multimedia_news`),
  ADD KEY `multimedia_multimedia_type_foreign` (`multimedia_type`),
  ADD KEY `multimedia_multimedia_gallery_foreign` (`multimedia_gallery`),
  ADD KEY `multimedia_multimedia_cultural_management_types_foreign` (`multimedia_cultural_management_types`);

--
-- Indices de la tabla `multimedia_type`
--
ALTER TABLE `multimedia_type`
  ADD PRIMARY KEY (`multimedia_type_id`),
  ADD UNIQUE KEY `multimedia_type_multimedia_type_description_unique` (`multimedia_type_description`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD UNIQUE KEY `news_news_alias_unique` (`news_alias`),
  ADD KEY `news_news_type_foreign` (`news_type`),
  ADD KEY `news_news_author_foreign` (`news_author`),
  ADD KEY `news_news_management_area_foreign` (`news_management_area`),
  ADD KEY `news_user` (`news_user`);

--
-- Indices de la tabla `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`news_type_id`),
  ADD UNIQUE KEY `news_type_news_type_description_unique` (`news_type_description`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191)),
  ADD KEY `password_resets_token_index` (`token`(191));

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projects_id`),
  ADD UNIQUE KEY `projects_projects_name_unique` (`projects_name`),
  ADD KEY `projects_projects_management_area_foreign` (`projects_management_area`);

--
-- Indices de la tabla `social_network`
--
ALTER TABLE `social_network`
  ADD PRIMARY KEY (`social_network_id`),
  ADD UNIQUE KEY `social_network_social_network_name_unique` (`social_network_name`),
  ADD KEY `social_network_social_network_management_area_foreign` (`social_network_management_area`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_user_mail_unique` (`user_mail`),
  ADD UNIQUE KEY `user_user_photo_unique` (`user_photo`),
  ADD UNIQUE KEY `user_remember_token_unique` (`remember_token`),
  ADD UNIQUE KEY `user_user_phone_unique` (`user_phone`),
  ADD KEY `user_user_type_foreign` (`user_type`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`),
  ADD UNIQUE KEY `user_type_user_type_description_unique` (`user_type_description`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authority`
--
ALTER TABLE `authority`
  MODIFY `authority_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `authority_type`
--
ALTER TABLE `authority_type`
  MODIFY `authority_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `conventions`
--
ALTER TABLE `conventions`
  MODIFY `conventions_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `cultural_management`
--
ALTER TABLE `cultural_management`
  MODIFY `cultural_management_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cultural_management_types`
--
ALTER TABLE `cultural_management_types`
  MODIFY `cultural_management_types_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `download`
--
ALTER TABLE `download`
  MODIFY `download_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `faculty_news`
--
ALTER TABLE `faculty_news`
  MODIFY `faculty_news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `kryptonit3_counter_page`
--
ALTER TABLE `kryptonit3_counter_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `kryptonit3_counter_visitor`
--
ALTER TABLE `kryptonit3_counter_visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=972;

--
-- AUTO_INCREMENT de la tabla `link`
--
ALTER TABLE `link`
  MODIFY `link_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `magazine`
--
ALTER TABLE `magazine`
  MODIFY `magazine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `management_area`
--
ALTER TABLE `management_area`
  MODIFY `management_area_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `multimedia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT de la tabla `multimedia_type`
--
ALTER TABLE `multimedia_type`
  MODIFY `multimedia_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `news_type`
--
ALTER TABLE `news_type`
  MODIFY `news_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `social_network`
--
ALTER TABLE `social_network`
  MODIFY `social_network_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authority`
--
ALTER TABLE `authority`
  ADD CONSTRAINT `authority_authority_management_area_foreign` FOREIGN KEY (`authority_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `authority_authority_type_foreign` FOREIGN KEY (`authority_type`) REFERENCES `authority_type` (`authority_type_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_category_parent_foreign` FOREIGN KEY (`category_parent`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `conventions`
--
ALTER TABLE `conventions`
  ADD CONSTRAINT `conventions_conventions_management_area_foreign` FOREIGN KEY (`conventions_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cultural_management`
--
ALTER TABLE `cultural_management`
  ADD CONSTRAINT `cultural_management_cultural_management_management_area_foreign` FOREIGN KEY (`cultural_management_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cultural_management_types`
--
ALTER TABLE `cultural_management_types`
  ADD CONSTRAINT `cultural_management_types_cultural_management_types_area_foreign` FOREIGN KEY (`cultural_management_types_area`) REFERENCES `cultural_management` (`cultural_management_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `download`
--
ALTER TABLE `download`
  ADD CONSTRAINT `download_download_management_area_foreign` FOREIGN KEY (`download_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_faculty_management_area_foreign` FOREIGN KEY (`faculty_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `faculty_news`
--
ALTER TABLE `faculty_news`
  ADD CONSTRAINT `faculty_news_faculty_news_faculty_foreign` FOREIGN KEY (`faculty_news_faculty`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_gallery_management_area_foreign` FOREIGN KEY (`gallery_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `kryptonit3_counter_page_visitor`
--
ALTER TABLE `kryptonit3_counter_page_visitor`
  ADD CONSTRAINT `kryptonit3_counter_page_visitor_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `kryptonit3_counter_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kryptonit3_counter_page_visitor_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `kryptonit3_counter_visitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_link_category_foreign` FOREIGN KEY (`link_category`) REFERENCES `category` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `link_link_management_area_foreign` FOREIGN KEY (`link_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `magazine`
--
ALTER TABLE `magazine`
  ADD CONSTRAINT `magazine_ibfk_1` FOREIGN KEY (`magazine_management_area`) REFERENCES `management_area` (`management_area_id`);

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_multimedia_cultural_management_types_foreign` FOREIGN KEY (`multimedia_cultural_management_types`) REFERENCES `cultural_management_types` (`cultural_management_types_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multimedia_multimedia_gallery_foreign` FOREIGN KEY (`multimedia_gallery`) REFERENCES `gallery` (`gallery_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multimedia_multimedia_news_foreign` FOREIGN KEY (`multimedia_news`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `multimedia_multimedia_type_foreign` FOREIGN KEY (`multimedia_type`) REFERENCES `multimedia_type` (`multimedia_type_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`news_user`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `news_news_author_foreign` FOREIGN KEY (`news_author`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_news_management_area_foreign` FOREIGN KEY (`news_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_news_type_foreign` FOREIGN KEY (`news_type`) REFERENCES `news_type` (`news_type_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_projects_management_area_foreign` FOREIGN KEY (`projects_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `social_network`
--
ALTER TABLE `social_network`
  ADD CONSTRAINT `social_network_social_network_management_area_foreign` FOREIGN KEY (`social_network_management_area`) REFERENCES `management_area` (`management_area_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_user_type_foreign` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
