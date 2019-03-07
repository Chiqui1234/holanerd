-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2019 a las 23:14:18
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
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_computacion`
--

CREATE TABLE `comments_computacion` (
  `id` int(5) NOT NULL COMMENT 'Identificador del registro',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Usuario comentador',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `forum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Slug del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comments_computacion`
--

INSERT INTO `comments_computacion` (`id`, `username`, `comment`, `forum`, `post`) VALUES
(1, 'chiqui1234', 'Hola mamá! ¡¡Estoy en Internet!!', 'computacion', 'macri-cat'),
(2, 'testeado', 'Esta fuente tipo \"Consolata\" es muy buena :v', 'computacion', 'macri-cat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forums`
--

CREATE TABLE `forums` (
  `id` int(5) NOT NULL COMMENT 'Identificador del registro',
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Slug del foro',
  `forumName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre del foro',
  `topicCounter` int(11) NOT NULL COMMENT 'Contador de los posts del foro',
  `minutes` int(10) DEFAULT '0' COMMENT 'La cantidad de puntos/minutos que acumula el foro',
  `latSlug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Post con última respuesta (slug)',
  `latTitle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Post con última respuesta (título)',
  `latUser` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Post con última respuesta (usuario)',
  `subForum1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Sub-foro número 1',
  `subForum2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Sub-foro número 2',
  `subForum3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Sub-foro número 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `forums`
--

INSERT INTO `forums` (`id`, `slug`, `forumName`, `topicCounter`, `minutes`, `latSlug`, `latTitle`, `latUser`, `subForum1`, `subForum2`, `subForum3`) VALUES
(1, 'computacion', 'Computación', 0, 0, '', '', '', 'Aportes', 'Preguntas', ''),
(2, 'programacion', 'Programación', 0, 0, '', '', '', 'Aportes', 'Preguntas', ''),
(3, 'disenoGrafico', 'Diseño Gráfico', 0, 0, '', '', '', 'Aportes', 'Preguntas', ''),
(4, 'emprenderismo', 'Emprenderismo', 0, 0, '', '', '', 'Aportes', 'Preguntas', 'Ideas'),
(5, 'universidades', 'Universidades', 0, 0, '', '', '', 'UBA', 'UTN', 'Otras'),
(6, 'retro', 'Retro/Vintage', 0, 0, '', '', '', 'PCs', 'Consolas', 'Otros'),
(7, 'off_topic', 'Off-topic', 0, 0, '', '', '', 'Videojuegos', 'Economia-Politica', 'Otras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `points_computacion`
--

CREATE TABLE `points_computacion` (
  `id` int(11) NOT NULL,
  `post` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Slug del post',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'El usuario que dió puntos',
  `points` int(1) NOT NULL COMMENT 'Los puntos otorgados (1, 2, 3, 4 o 5 minutos)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Almacena todos los puntos otorgados a los posts de un foro';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_computacion`
--

CREATE TABLE `posts_computacion` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Posts de "Computación"';

--
-- Volcado de datos para la tabla `posts_computacion`
--

INSERT INTO `posts_computacion` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_disenografico`
--

CREATE TABLE `posts_disenografico` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_disenografico`
--

INSERT INTO `posts_disenografico` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_emprenderismo`
--

CREATE TABLE `posts_emprenderismo` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_emprenderismo`
--

INSERT INTO `posts_emprenderismo` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_off_topic`
--

CREATE TABLE `posts_off_topic` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_off_topic`
--

INSERT INTO `posts_off_topic` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_programacion`
--

CREATE TABLE `posts_programacion` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_programacion`
--

INSERT INTO `posts_programacion` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_retro`
--

CREATE TABLE `posts_retro` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_retro`
--

INSERT INTO `posts_retro` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_universidades`
--

CREATE TABLE `posts_universidades` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subForum` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Subforo del post en cuestión',
  `comments` int(5) DEFAULT '0',
  `points` int(5) DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL COMMENT 'Si el post está aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts_universidades`
--

INSERT INTO `posts_universidades` (`id`, `slug`, `author`, `date`, `image`, `title`, `content`, `subForum`, `comments`, `points`, `is_approved`) VALUES
(1, 'estamos-bien', 'chiqui1234', '06/03/2019 04:55:02 pm', 'https://pbs.twimg.com/media/CwtXLMJW8AIW8Fs.jpg', '¿Estamos bien?', '\r\n    <p data-editable=\"\">MAIAMEE.</p>\r\n    <p data-editable=\"\">Creado desde el Inspector. Get-Content-Tools se inhabilitó solicito... está tímido.</p>\r\n    \r\n    \r\n', 'preguntas', 0, 0, 1),
(2, 'macri-cat', 'chiqui1234', '06/03/2019 04:58:57 pm', 'https://i.imgur.com/sxoV3wW.jpg', 'Creando un post...', '\r\n    \r\n    \r\n    \r\n    <p>~ <i>Porque macricat(?). Creo este post para chequear que el mensaje de error es correcto :D</i></p>\r\n', 'aportes', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL COMMENT 'Identificador del registro',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre de la cuenta',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email de la cuenta',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contraseña de la cuenta',
  `dni` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Documento de identidad',
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL a un avatar',
  `background` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL a un fondo',
  `color1` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '3E09CF' COMMENT 'Color primario para el perfil (hex)',
  `color2` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1667E0' COMMENT 'Color secundario para el perfil (hex)',
  `less` tinyint(1) NOT NULL COMMENT 'Desactivar efectos y situaciones que ralentizan al equipo',
  `points` int(6) NOT NULL COMMENT 'Puntos/Minutos del usuario',
  `git` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL a tu perfil Git',
  `linkedin` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL a tu perfil LinkedIn',
  `web` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL a tu web personal',
  `is_admin` tinyint(1) NOT NULL COMMENT 'Indica el rango del usuario',
  `created_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Fecha de creación del usuario',
  `is_confirmed` tinyint(1) NOT NULL COMMENT 'Cuenta confirmada',
  `is_public` tinyint(1) NOT NULL COMMENT 'Indica si el perfil es público',
  `is_deleted` tinyint(1) NOT NULL COMMENT 'Cuenta eliminada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los usuarios';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `dni`, `avatar`, `background`, `color1`, `color2`, `less`, `points`, `git`, `linkedin`, `web`, `is_admin`, `created_at`, `is_confirmed`, `is_public`, `is_deleted`) VALUES
(1, 'chiqui1234', 'santiagogimenez@outlook.com.ar', 'test', '00000000', 'https://i.imgur.com/sBiHUGc.jpg', 'theme/holanerd/img/profile/wallpaper.jpg', '3E09CF', '1667E0', 0, 5, '', '', '', 1, '04/03/2019', 1, 0, 0),
(2, 'testeado', 'santiagogimenez99@gmail.com', 'test', '00000000', '', '', '3E09CF', '1667E0', 0, 60, '', '', '', 0, '07/03/2019', 1, 0, 0),
(4, 'test', 'pepito@test.com', 'lilolilo', '00000000', '', '', '3E09CF', '1667E0', 0, 60, '', '', '', 1, '07/03/2019', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `comments_computacion`
--
ALTER TABLE `comments_computacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts_computacion`
--
ALTER TABLE `posts_computacion`
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
-- AUTO_INCREMENT de la tabla `comments_computacion`
--
ALTER TABLE `comments_computacion`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `posts_computacion`
--
ALTER TABLE `posts_computacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
