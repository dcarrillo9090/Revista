-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2016 a las 16:34:34
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `revista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `autor` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `claves` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `resumen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `file` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `publicado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `titulo`, `autor`, `claves`, `resumen`, `file`, `publicado`) VALUES
(1, 'Energías renovables en población rural', 'Carlos Diaz, Marcela Franco', 'energias, renovables,alternativas,verde', 'energía renovable a la energía que se obtiene de fuentes naturales virtualmente inagotables, ya sea por la inmensa cantidad de energía que contienen, o porque son capaces de regenerarse por medios naturales.', 'http://localhost/revista/tmp/Energías renovables en población rural.pdf', 1),
(2, 'Seguridad Informática: Uso empresaial', 'Carlos Prieto, Gabriel Gonzalez', 'seguridad, informática, legislación, hacking', 'seguridad informática o seguridad de tecnologáas de la información es el área de la informática que se enfoca en la protección de la infraestructura computacional y todo lo relacionado con esta y, especialmente, la información contenida o circulante.', 'http://localhost/revista/tmp/Seguridad Informática- Uso empresaial.pdf', 1),
(3, 'Drogas en la juventud', 'Cristina Dassa, Miguel Arroyave', 'drogas, jovenes, prevención, narcotrafico', 'Todas las drogas que producen adicción tienen la característica en común de liberar dopamina, un neurotransmisor que, al estimular el sistema nervioso central, provoca alegría, desinhibición y, en algunos casos, falta de cansancio y una mayor facilidad para concentrarse, explicación el psiquiatra Serapio Palma Patricio, médico especialista en adicciones.', 'http://localhost/revista/tmp/Drogas en la juventud.pdf', 1),
(4, 'Estrategias de comercio internacional', 'Gloria Barrero', 'comercio, banca, internacional, estrategia, contabilidad', 'comercio internacional o mundial, al intercambio de bienes, productos y servicios entre dos o más países o regiones econ?micas. Las economías que participan del comercio exterior se denominan econom?as abiertas.', 'http://localhost/revista/tmp/Estrategias de comercio internacional.pdf', 0),
(5, 'Fundamentación deportiva', 'Juan Pablo Cardoso', 'deporte, ejericios, tonoficación, gimnasio, alimentación', 'El núcleo de formación para el trabajo tiene como finalidad preparar al estudiante para desarrollar procesos de trabajo en un campo laboral específico por medio de procedimientos, t?cnicas e instrumentos, además de generar actitudes de valoración y responsabilidad ante esta actividad, lo que permitirá interactuar en forma útil con su entorno social y el sector productivo Como resultado del conocimiento teórico-práctico adquirido en el Núcleo.', 'http://localhost/revista/tmp/Fundamentación deportiva.pdf', 0),
(6, 'Gastronomía de la amazonía', 'Diana Arevalo, Pablo Fuquene, Elda Lombana', 'gatronomia,historia, cocina,amazonas', 'Las preparaciones culinarias del Amazonas son apetitosas, exóticas y se destacan por el conocimiento que las culturas indígenas han transmitido de una generación a otra para extraer el mayor provecho de la naturaleza y de sus manjares.', 'http://localhost/revista/tmp/Gastronomía de la amazonía.pdf', 0),
(7, 'Cultivos hidropónicos', 'Rosmery Dias', 'cultivo, hidroponía, alternativo', 'La hidroponía o agricultura hidropónica es un método utilizado para cultivar plantas usando soluciones minerales en vez de suelo agrícola', 'http://localhost/revista/tmp/Hidroponía.docx', 0),
(8, 'Física y matemática básica', 'Omar Pulido', 'matemática, física, cálculo', 'Información sobre los fundamentos y soportes téoricos', 'http://localhost/revista/tmp/EL_CODIGO.pdf', 0),
(9, 'Alimentación alternativa', 'Carlos Diaz, Marlon Moreno', 'alimentación, vegano, vegetariano, dieta', 'Una alimentación vegana solamente es saludable cuando se tienen en cuenta y se respetan una serie de reglas. Lamentablemente, según he podido observar, estas pocas reglas no siempre se tienen en cuenta, en especial cuando la dieta vegana se lleva a cabo por motivos éticos.', 'http://localhost/revista/tmp/EL_CODIGO.docx', 0),
(10, '2', 'p', 'p', 'p', 'http://localhost/revista/tmp/Avances_Proyecto_Integrador-Diego_Carrillo.pdf', 0),
(11, 'prueba 3', 'carlos', 'variables', 'pruebas, resumen, ensayos', 'http://localhost/revista/tmp/Avances_Proyecto_Integrador-Diego_Carrillo.docx', 0),
(12, 'prueba 3', 'prueba 3', 'prueba 3', 'prueba 3', 'http://localhost/revista/tmp/EL_CODIGO1.docx', 0),
(13, 'prueba 4', 'prueba 4', 'prueba 4', 'prueba 4', 'http://localhost/revista/tmp/Avances_Proyecto_Integrador-Diego_Carrillo2.pdf', 0),
(14, 'prueba final integrador', 'prueba final integrador', 'prueba final integrador', 'prueba final integrador', 'http://http://localhost/revista/tmp/Plano_llegada_CELTA-Model.pdf', 0),
(15, 'enerías renovables', 'Carlos Diaz, Marlon Moreno', 'enrgía, electricidad, alternativo', 'Se denomina energía renovable a la energía que se obtiene de fuentes naturales virtualmente inagotables, ya sea por la inmensa cantidad de energía que contienen, o porque son capaces de regenerarse por medios naturales.', 'http://http://localhost/revista/tmp/Taller_rescate-_Diego_Carrillo.pdf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` varchar(15) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `fullname`, `password`, `email`, `privilegio`) VALUES
('dcarrillo', 'Diego Carrillo', '855fa866d6d3f72f6a50bc213244e36d', 'dcarrillo@sanmateo.edu.co', 2),
('gcoronado', 'Giovanni Coronado', '855fa866d6d3f72f6a50bc213244e36d', 'dcarrillo90@gmail.com', 1),
('mbarrero', 'Martha Barrero', '855fa866d6d3f72f6a50bc213244e36d', 'dcarrillo@sanmateo.edu.co', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
