-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2019 a las 02:00:00
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `holanerd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forums`
--

CREATE TABLE `forums` (
  `id` int(2) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `forumName` varchar(20) NOT NULL,
  `topicCounter` int(3) NOT NULL,
  `lastAnswerTopicSlug` varchar(100) NOT NULL,
  `lastAnswerTopic` varchar(100) NOT NULL,
  `lastAnswerUser` varchar(25) NOT NULL,
  `subforum1` varchar(25) NOT NULL,
  `subforum2` varchar(25) NOT NULL,
  `subforum3` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `forums`
--

INSERT INTO `forums` (`id`, `slug`, `forumName`, `topicCounter`, `lastAnswerTopicSlug`, `lastAnswerTopic`, `lastAnswerUser`, `subforum1`, `subforum2`, `subforum3`) VALUES
(1, 'computacion', 'Computación', 0, '', '', '', 'Aportes', 'Preguntas', ''),
(2, 'programacion', 'Programación', 2, '-Que-es-la-programacion-', '¿Qué es la programación?', 'chiqui1234', 'Aportes', 'Preguntas', ''),
(3, 'diseno-grafico', 'Diseño gráfico', 0, '', '', '', 'Aportes', 'Preguntas', ''),
(4, 'audio', 'Audio', 0, '', '', '', 'Aportes', 'Preguntas', ''),
(5, 'video', 'Video', 0, '', '', '', 'Aportes', 'Preguntas', ''),
(6, 'emprenderismo', 'Emprenderismo', 0, '', '', '', 'Ideas', 'Preguntas', 'Otras'),
(7, 'universidades', 'Universidades', 0, '', '', '', 'UBA', 'UTN', 'Otras'),
(8, 'off-topic', 'Off-Topic', 0, '', '', '', 'Economía y Política', 'Videojuegos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `forum` varchar(100) NOT NULL,
  `subforum` varchar(100) NOT NULL,
  `points` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `slug`, `image`, `time`, `author`, `forum`, `subforum`, `points`, `title`, `post`) VALUES
(3, '-Biografia---Analisis--Ada-Lovelace', 'https://i.imgur.com/ynlHNX0.jpg', '02/25/2019 10:25:42 pm', 'chiqui1234', 'programacion', 'aportes', 0, '[Biografía] [Análisis] Ada Lovelace', '<p>\r\n    <b>Augusta Ada King</b>, <b>Condesa de Lovelace</b> (<a href=\"https://es.wikipedia.org/wiki/Londres\">Londres</a>, <a href=\"https://es.wikipedia.org/wiki/10_de_diciembre\">10 de diciembre</a> de <a href=\"https://es.wikipedia.org/wiki/1815\">1815</a>-<i>íd.</i>, <a href=\"https://es.wikipedia.org/wiki/27_de_noviembre\">27 de noviembre</a> de <a href=\"https://es.wikipedia.org/wiki/1852\">1852</a>), registrada al nacer como <b>Augusta Ada Byron</b> y conocida habitualmente como <b>Ada Lovelace</b>, fue una <a href=\"https://es.wikipedia.org/wiki/Matemática\">matemática</a>, <a href=\"https://es.wikipedia.org/wiki/Informática\">informática</a> y <a href=\"https://es.wikipedia.org/wiki/Escritora\">escritora</a> británica, célebre sobre todo por su trabajo acerca de la calculadora de uso general de <a href=\"https://es.wikipedia.org/wiki/Charles_Babbage\">Charles Babbage</a>, la denominada <i><a href=\"https://es.wikipedia.org/wiki/Máquina_analítica\">máquina analítica</a></i>. Entre sus notas sobre la máquina, se encuentra lo que se reconoce hoy como el primer <a href=\"https://es.wikipedia.org/wiki/Algoritmo\">algoritmo</a> destinado a ser procesado por una máquina, por lo que se la considera como la primera <a href=\"https://es.wikipedia.org/wiki/Programadora\">programadora</a> de <a href=\"https://es.wikipedia.org/wiki/Ordenador\">ordenadores</a>.<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-FOOTNOTEFuegiFrancis200316–26-1\">1</a></sup>​<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-2\">2</a></sup>​<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-Lovelace_Google-3\">3</a></sup>​\r\n</p>\r\n<p>\r\n    Dedujo y previó la capacidad de los ordenadores para ir más allá de los simples cálculos de números, mientras que otros, incluido el propio Babbage, se centraron únicamente en estas capacidades.<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-FOOTNOTEFuegiFrancis200319,_25-4\">4</a></sup>​\r\n</p>\r\n<p>\r\n    Su madre, <a href=\"https://es.wikipedia.org/wiki/Anna_Isabella_Noel_Byron\">Anne Isabella Noel Byron</a>, fue matemática y <a href=\"https://es.wikipedia.org/w/index.php?title=Activista_política&action=edit&redlink=1\">activista política</a> y <a href=\"https://es.wikipedia.org/wiki/Activista_social\">social</a>.<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-:2-5\">5</a></sup>​ Su padre fue el conocido poeta <a href=\"https://es.wikipedia.org/wiki/Lord_Byron\">George Byron</a>.<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-6\">6</a></sup>​\r\n</p>\r\n<p>\r\n    Su posición social y su educación la llevaron a conocer a científicos importantes como <a href=\"https://es.wikipedia.org/w/index.php?title=Andrew_Crosse&action=edit&redlink=1\">Andrew Crosse</a>, Sir <a href=\"https://es.wikipedia.org/wiki/David_Brewster\">David Brewster</a>, <a href=\"https://es.wikipedia.org/wiki/Charles_Wheatstone\">Charles Wheatstone</a>, <a href=\"https://es.wikipedia.org/wiki/Michael_Faraday\">Michael Faraday</a> y al novelista <a href=\"https://es.wikipedia.org/wiki/Charles_Dickens\">Charles Dickens</a>, relaciones que aprovechó para llegar más lejos en su educación. Entre estas relaciones se encuentra <a href=\"https://es.wikipedia.org/wiki/Mary_Somerville\">Mary Somerville</a>, que fue su tutora durante un tiempo, además de amiga y estímulo intelectual.<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-:3-7\">7</a></sup>​ Ada Byron se refería a sí misma como una <i>científica poetisa</i> y como <i>analista (y metafísica).</i><sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-ABCL-8\">8</a></sup>​<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-9\">9</a></sup>​\r\n</p>\r\n<p>\r\n    A una edad temprana, su talento matemático la condujo a una relación de amistad prolongada con el matemático inglés Charles Babbage, y concretamente con la obra de Babbage sobre la máquina analítica.<sup><a href=\"https://es.wikipedia.org/wiki/Ada_Lovelace#cite_note-10\">10</a></sup>​ Entre 1842 y 1843, tradujo un artículo del ingeniero militar italiano <a href=\"https://es.wikipedia.org/wiki/Luigi_Menabrea\">Luigi Menabrea</a> sobre la máquina, que complementó con un amplio conjunto de notas propias, denominado simplemente <i>Notas</i>. Estas notas contienen lo que se considera como el primer programa de ordenador, esto es, un algoritmo codificado para que una máquina lo procese. Las notas de Lovelace son importantes en la historia de la <a href=\"https://es.wikipedia.org/wiki/Computación\">computación</a>.\r\n</p>\r\n<blockquote title=\"Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.\">\r\n    Siempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n</blockquote>\r\n<p>\r\n    ~ <i>John F. Woods</i>\r\n</p>'),
(5, '-Que-es-la-programacion-', 'https://wallpaperaccess.com/full/234164.jpg', '02/26/2019 12:34:53 am', 'chiqui1234', 'programacion', 'aportes', 0, '¿Qué es la programación?', '<p>\r\n    La programación es un proceso que se utiliza para idear y ordenar las <b>acciones</b> que se realizarán en el marco de un proyecto; al anuncio de las partes que componen un acto o espectáculo; a la preparación de máquinas para que cumplan con una cierta tarea en un momento determinado; a la elaboración de programas para la resolución de problemas mediante ordenadores; y a la preparación de los datos necesarios para obtener una solución de un problema.\r\n</p>\r\n<p>\r\n    En la actualidad, la noción de programación se encuentra muy asociada a la creación de aplicaciones <b>informáticas</b> y videojuegos; es el proceso por el cual una persona desarrolla un programa valiéndose de una herramienta que le permita escribir el código (el cual puede estar en uno o varios lenguajes, tales como C++, Java, Python entre otros) y de otra que sea capaz de “traducirlo” a lo que se conoce como <b>lenguaje de máquina</b>, el cual puede ser entendido por un microprocesador.\r\n</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stats`
--

CREATE TABLE `stats` (
  `cantUsers` int(20) NOT NULL,
  `cantPosts` int(20) NOT NULL,
  `cantComments` int(20) NOT NULL,
  `cantTotalHours` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store_products`
--

CREATE TABLE `store_products` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(75) NOT NULL COMMENT 'Nombre del producto (amigable para URLs)',
  `product` varchar(50) NOT NULL COMMENT 'Nombre del producto',
  `quantity` int(3) NOT NULL COMMENT 'Cantidad de productos para vender',
  `type` varchar(15) NOT NULL COMMENT '¿Este producto es físico o digital?',
  `category` varchar(25) NOT NULL COMMENT 'Categoría del producto',
  `slugCategory` varchar(35) NOT NULL,
  `sellerUsername` varchar(50) NOT NULL,
  `points` int(11) NOT NULL COMMENT 'Su valor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `store_products`
--

INSERT INTO `store_products` (`id`, `slug`, `product`, `quantity`, `type`, `category`, `slugCategory`, `sellerUsername`, `points`) VALUES
(1, 'intel-core-i3-8100', 'Intel Core i3 8100', 10, 'fisico', 'Procesador', 'procesador', 'dummy', 200),
(2, 'test-', 'Test!', 5, 'digital', 'ninguno', 'ninguno', 'dummy', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store_transactions`
--

CREATE TABLE `store_transactions` (
  `id` int(5) NOT NULL,
  `sellerUsername` varchar(50) NOT NULL,
  `buyerUsername` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `productSlug` varchar(75) NOT NULL,
  `points` int(5) NOT NULL,
  `token` varchar(255) NOT NULL,
  `finished` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `store_transactions`
--

INSERT INTO `store_transactions` (`id`, `sellerUsername`, `buyerUsername`, `product`, `productSlug`, `points`, `token`, `finished`) VALUES
(1, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, '1e32e3a94c5f54cdada8decdc6348846743df69c5a3e1e4703901f70d61909882ecae690a485a47c7c752f1805d35dfe73e2f208a3c6ff17d7db39f5c6ebe23c', 0),
(2, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, '8e832e720f4703102dc9ead00159f088374b9a45e8ac29a5f5b94e52904c8b7d50b2f0cb0464fe0be7c851991d2bee72067651cc7ff4957afeaf128b3e0c0eb0', 0),
(3, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, '554fe3f4468fe0c42ed234c866bffba126d821b7d66e08fcd2d09d4dab731009f21da5c78392b4c301db6d11703913914942f40b80364f32b3e6a10006aa2c5c', 0),
(4, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, '1bfcc3682c5b9c35ad7e9d01902e8cb1a49311ea9152ed4b45de8d735e69717c444048bf3961a8f097cf66035cfd5bfc66cbd6f598fa997928cad18887a8cefc', 0),
(5, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, '4ee2b10fcc7399dbe1e002d9bb4dd11613bc2dd5972a43e8628dbc98ed59b8e1aa6a1bce17d6b4195798c13eb316ef1c3e2ca40269d24db024be84e51819eb8f', 0),
(6, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'b48dff481268037036e2d199005401e35fde0489b32c52d7e5527e0c5d6f78ba5292b4d11a264540c46757e500c20b20d99418f723ce8a5c62e58828e9a39158', 0),
(7, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'IU60exu9R/n/qtSG6IPdxuasD+z319luAGZZy3h5eslRmJLJI99bGVyxFVwZqPb7DpoOwKcsQUCOXK9o9WDjvQ==', 0),
(8, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'G4hAi4BfAMUcEVwaYLjjog3Osl6cTAvYst+nkNsA/XMf1xtY+mYRZ8sK/HBdqCI7JMTFJpyQ417sKtuA1Tt49A==', 0),
(9, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'mpx8d2JmFPkYwVSwVrOGHpRzSV1srYCxTmd6Ph12pCZCVNHRpXK4wP6bEIhU2LOi72lQGA2PKdNYg0qYK8S4ng==', 0),
(10, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'eyj+OZ9rQS3N+lo6eKOWM5mcYt0aC31j9ZCNMXoA3Xo+cXfiXHD0Mrz+Bohk7fYLgJk+qaHb53dGAcpD3p4BsA==', 0),
(11, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'ro0mXQlDeYkVyL8Z6RptqnCVllz7sv1kwdxkqxE7gkbGrOFn6flVgzp8IGGCV7ZDQuKEidWJA2CX/QxxRwhTWg==', 0),
(12, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'vpUDvVW1BSjOkI3/oz5yx/Kgg1nJIuZ6/C5FbqXo3iCllvb0XjDXwyjwZGNby8tiPMYGMZPhOID8cKaK+hENUg==', 0),
(13, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'l/ZE+nTLRTmXmW5zNP+rbo8ZkKUyEf4j/g99AeiaxLeKJZg/dDRDn637cwxKTh/up3kRbF38ordx/bQnlXk7mg==', 0),
(14, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'ykhiwuRspEc550tL4QeL6IeThGmt6piZjI03dg9/m8Qztlg9ovvvApv59yrpsBIy47FNVnLHmF9aXSo2cDLHIw==', 0),
(15, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'nuKvftIJjhIhVFmEwYkKgbJK7BmoN/TMditQAEn6I5ync0R7sar77mwTEcIjhuoXeHY5a1+PyHj/MyUsoM6nuA==', 0),
(16, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'inZvEIh4FDouVjrGCSHWNZIqD+tmxQLzpini+cIpl6aT3dkKRAuireZGmrPrfspO5F7OfQXViR7vN1xyHvmPGw==', 0),
(17, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'l5eSuBe6qutKXxdG9KSII/nqV6q6xdiuoPocE3A9y+/mtbsWzynQIVwZjUxlXwEZOljXksQEP46RLfqbINT+UQ==', 0),
(18, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, '/KnECM6+Bkun68xE/X7L1DvvM8KsotJ6bf+xjy16yr98fMzUNhOxHHDS+Ks+kLkQU5mxpH2BDsfKbN5Ly6tckw==', 0),
(19, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, '6dQg+LIpOmDjx9sQ6Yys0yFqgfzRArxOgRHh2n8SxQSWL19GUcAaj1NAxVos6uMLhnpsPYXIWVKzit+57E0Alw==', 0),
(20, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'FtcRdcK4c9Nc/cQ0HyZ1+rkpllrrbBUiiL70zD0RuUsnNNbGGsRFPBSaEaewZ3pOlzhfwvS3gjRJLrSfx/hnsw==', 0),
(21, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, '_', 0),
(22, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'DSt1esBVbhEogeS54I7A958hA0hwvAj2XyxbHh4GV0bxWAMJpvCA2r3VNa0n3CjG7el7zYff-tyr7nJL-eRVPg--', 0),
(23, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'SANcPpZToyBcJFEgeV1oO36pnuU-Q1vYvTZlTjDxmJv561YQJsgjxxrhMCL8VHhGJEOSvwCEmDmkQEkSLUVnaw--', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `dni` varchar(8) NOT NULL,
  `avatar` varchar(100) DEFAULT 'default.jpg',
  `background` varchar(50) DEFAULT NULL,
  `color1` varchar(6) NOT NULL,
  `color2` varchar(6) NOT NULL,
  `less` tinyint(1) NOT NULL,
  `points` int(6) NOT NULL,
  `git` varchar(50) DEFAULT NULL COMMENT 'El link de tu perfil GIT',
  `linkedin` varchar(50) DEFAULT NULL COMMENT 'El link de tu perfil LinkedIn',
  `web` varchar(50) DEFAULT NULL COMMENT 'El link de tu web o blog personal',
  `created_at` varchar(50) NOT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `dni`, `avatar`, `background`, `color1`, `color2`, `less`, `points`, `git`, `linkedin`, `web`, `created_at`, `is_admin`, `is_confirmed`, `is_public`, `is_deleted`) VALUES
(1, 'chiqui1234', 'santiagogimenez@outlook.com.ar', 'lilolilo10', '42214991', '', NULL, '', '', 1, 1400, NULL, NULL, NULL, '2019-02-10 00:00:00', 1, 1, 0, 0),
(2, 'dummy', 'dummyForHolanerd@hotmail.com', 'lilolilo10', '42214991', '', '', '', '', 0, 1200, '', '', '', '2019', 0, 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `store_transactions`
--
ALTER TABLE `store_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `store_transactions`
--
ALTER TABLE `store_transactions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
