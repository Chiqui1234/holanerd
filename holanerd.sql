-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2019 a las 18:59:41
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
  `slug` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `forumName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `topicCounter` int(3) NOT NULL,
  `lastAnswerTopicSlug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastAnswerTopic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastAnswerUser` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `subforum1` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `subforum2` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `subforum3` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `forums`
--

INSERT INTO `forums` (`id`, `slug`, `forumName`, `topicCounter`, `lastAnswerTopicSlug`, `lastAnswerTopic`, `lastAnswerUser`, `subforum1`, `subforum2`, `subforum3`) VALUES
(1, 'computacion', 'Computación', 1, 'Título del post acá', 'Título del post acá', 'chiqui1234', 'Aportes', 'Preguntas', ''),
(2, 'programacion', 'Programación', 0, '\r\n', '\r\n', 'chiqui1234', 'Aportes', 'Preguntas', ''),
(3, 'disenoGrafico', 'Diseño gráfico', 0, '\r\n', '\r\n', 'chiqui1234', 'Aportes', 'Preguntas', ''),
(4, 'audio', 'Audio', 0, '', '', '', 'Aportes', 'Preguntas', ''),
(5, 'video', 'Video', 0, '', '', '', 'Aportes', 'Preguntas', ''),
(6, 'emprenderismo', 'Emprenderismo', 0, '', '', '', 'Ideas', 'Preguntas', 'Otras'),
(7, 'universidades', 'Universidades', 0, '\r\n', '\r\n', '', 'UBA', 'UTN', 'Otras'),
(8, 'offTopic', 'Off-Topic', 0, '\r\n', '\r\n', '', 'Economia-Politica', 'Videojuegos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_audio`
--

CREATE TABLE `posts_audio` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) NOT NULL COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_computacion`
--

CREATE TABLE `posts_computacion` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_computacion`
--

INSERT INTO `posts_computacion` (`id`, `slug`, `author`, `points`, `image`, `title`, `content`, `subforum`, `is_approved`, `date`) VALUES
(1, 'título-del-post-aca', 'chiqui1234', 0, 'wasd', 'Título del post acá', '\r\n    <p data-editable=\"\">Mirá el lápiz en la punta superior izquierda de tu pantalla <strong>y divertite</strong>.</p>\r\n    <p data-editable=\"\">Hay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.</p>\r\n    <blockquote title=\"Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.\">\r\n        Siempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n    </blockquote>\r\n    <p>~ <i>John F. Woods</i></p>\r\n', 'aportes', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_disenografico`
--

CREATE TABLE `posts_disenografico` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_emprenderismo`
--

CREATE TABLE `posts_emprenderismo` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_emprenderismo`
--

INSERT INTO `posts_emprenderismo` (`id`, `slug`, `author`, `points`, `image`, `title`, `content`, `subforum`, `is_approved`, `date`) VALUES
(1, '', 'chiqui1234', 0, 'https://www.showoffimports.nl/images/T/231930.jpg', 'Título del post acá', '\r\n    <p data-editable=\"\">Mirá el lápiz en la punta superior izquierda de tu pantalla <strong>y divertite</strong>.</p>\r\n    <p data-editable=\"\">Hay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.</p>\r\n    <blockquote title=\"Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.\">\r\n        Siempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n    </blockquote>\r\n    <p>~ <i>John F. Woods</i></p>\r\n', 'aportes', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_offtopic`
--

CREATE TABLE `posts_offtopic` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_programacion`
--

CREATE TABLE `posts_programacion` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_programacion`
--

INSERT INTO `posts_programacion` (`id`, `slug`, `author`, `points`, `image`, `title`, `content`, `subforum`, `is_approved`, `date`) VALUES
(1, 'pequeno-test', 'chiqui1234', 0, 'aaaa', 'pequeno test', '\r\n    <p data-editable=\"\">Mirá el lápiz en la punta superior izquierda de tu pantalla <strong>y divertite</strong>.</p>\r\n    <p data-editable=\"\">Hay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.</p>\r\n    <blockquote title=\"Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.\">\r\n        Siempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n    </blockquote>\r\n    <p>~ <i>John F. Woods</i></p>\r\n', 'aportes', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_universidades`
--

CREATE TABLE `posts_universidades` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_video`
--

CREATE TABLE `posts_video` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` int(100) NOT NULL COMMENT 'slug (url amigable)',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Autor del post',
  `points` int(11) DEFAULT '0' COMMENT 'Puntos ganados por el post',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imágen del post',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título del post',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contenido del post',
  `subforum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '1' COMMENT '¿El post está aprobado?',
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stats`
--

CREATE TABLE `stats` (
  `cantUsers` int(20) NOT NULL,
  `cantPosts` int(20) NOT NULL,
  `cantComments` int(20) NOT NULL,
  `cantTotalHours` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store_products`
--

CREATE TABLE `store_products` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(75) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del producto (amigable para URLs)',
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del producto',
  `download` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Si el producto es digital, ofrecé el link de descarga',
  `quantity` int(3) DEFAULT NULL COMMENT 'Cantidad de productos para vender',
  `category` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Categoría del producto',
  `slugCategory` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `sellerUsername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL COMMENT 'Su valor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `store_products`
--

INSERT INTO `store_products` (`id`, `slug`, `product`, `download`, `quantity`, `category`, `slugCategory`, `sellerUsername`, `points`) VALUES
(1, 'intel-core-i3-8100', 'Intel Core i3 8100', '', 10, 'Procesador', 'procesador', 'dummy', 200),
(2, 'test-', 'Test!', 'https://google.com.ar', 0, 'ninguno', 'ninguno', 'dummy', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store_transactions`
--

CREATE TABLE `store_transactions` (
  `id` int(5) NOT NULL,
  `sellerUsername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `buyerUsername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `productSlug` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(5) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_finished` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `store_transactions`
--

INSERT INTO `store_transactions` (`id`, `sellerUsername`, `buyerUsername`, `product`, `productSlug`, `points`, `token`, `is_finished`) VALUES
(51, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, '9mLvR020Lfvet0KYeL0o9ZLcESRcLdcpGLOGZ-xq2kyhV0-snpTmCBkT5V1YQMxQal2xKAS2BkYdKBuo1iBk8w--', 1),
(52, 'dummy', 'chiqui1234', 'Test!', 'test-', 60, 'pMXxYO-IN7BKOJ3dG-qxYSQHbEOdNLq8LW61BWZkoFdfPps8CXxTXW9gvBXd5GnZFxQTAou5jqscnVHAr62MSg--', 1),
(53, 'dummy', 'chiqui1234', 'Intel Core i3 8100', 'intel-core-i3-8100', 200, 'XiRQfv-GMgFtzQdllQ8ZdGZav6i-xe4q6TPlrFASEy8PLTsffwF2otFYUu8Yb1QOj6OEQmo5Fv95J7qR0uOWdw--', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dni` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `background` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color1` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `color2` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `less` tinyint(1) NOT NULL,
  `points` int(6) NOT NULL,
  `git` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'El link de tu perfil GIT',
  `linkedin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'El link de tu perfil LinkedIn',
  `web` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'El link de tu web o blog personal',
  `created_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `dni`, `avatar`, `background`, `color1`, `color2`, `less`, `points`, `git`, `linkedin`, `web`, `created_at`, `is_admin`, `is_confirmed`, `is_public`, `is_deleted`) VALUES
(1, 'chiqui1234', 'santiagogimenez@outlook.com.ar', 'test', '42214991', '', 'http://s1.1zoom.me/big7/144/Nissan_350z_rocket_488598.jpg', '', '', 1, 1000, NULL, NULL, NULL, '2019-02-10 00:00:00', 1, 1, 0, 0),
(2, 'dummy', 'dummyForHolanerd@hotmail.com', 'test', '42214991', 'https://i.imgur.com/jfrFsXA.png', 'https://i.imgur.com/2Grn39w.jpg', '', '', 0, 1000, '', '', '', '2019', 0, 1, 1, 0),
(3, 'test', 'test@outlook.com', 'test', '40000000', '', NULL, '', '', 0, 60, NULL, NULL, NULL, '04/03/2019', 0, 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_audio`
--
ALTER TABLE `posts_audio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_computacion`
--
ALTER TABLE `posts_computacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_disenografico`
--
ALTER TABLE `posts_disenografico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_emprenderismo`
--
ALTER TABLE `posts_emprenderismo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_offtopic`
--
ALTER TABLE `posts_offtopic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_programacion`
--
ALTER TABLE `posts_programacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_universidades`
--
ALTER TABLE `posts_universidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_video`
--
ALTER TABLE `posts_video`
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
-- AUTO_INCREMENT de la tabla `posts_audio`
--
ALTER TABLE `posts_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro';

--
-- AUTO_INCREMENT de la tabla `posts_computacion`
--
ALTER TABLE `posts_computacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `posts_disenografico`
--
ALTER TABLE `posts_disenografico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro';

--
-- AUTO_INCREMENT de la tabla `posts_emprenderismo`
--
ALTER TABLE `posts_emprenderismo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `posts_offtopic`
--
ALTER TABLE `posts_offtopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro';

--
-- AUTO_INCREMENT de la tabla `posts_programacion`
--
ALTER TABLE `posts_programacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `posts_universidades`
--
ALTER TABLE `posts_universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro';

--
-- AUTO_INCREMENT de la tabla `posts_video`
--
ALTER TABLE `posts_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro';

--
-- AUTO_INCREMENT de la tabla `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `store_transactions`
--
ALTER TABLE `store_transactions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
