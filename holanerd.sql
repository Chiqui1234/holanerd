-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2019 a las 16:48:47
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
  `forumName` varchar(20) NOT NULL,
  `topicCounter` int(3) NOT NULL,
  `lastAnswerTopic` varchar(100) NOT NULL,
  `lastAnswerUser` varchar(25) NOT NULL,
  `subforum1` varchar(25) NOT NULL,
  `subforum2` varchar(25) NOT NULL,
  `subforum3` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `forums`
--

INSERT INTO `forums` (`id`, `forumName`, `topicCounter`, `lastAnswerTopic`, `lastAnswerUser`, `subforum1`, `subforum2`, `subforum3`) VALUES
(1, 'Computación', 0, '', '', 'Aportes', 'Preguntas', ''),
(2, 'Programación', 0, '', '', 'Aportes', 'Preguntas', ''),
(3, 'Diseño gráfico', 0, '', '', 'Aportes', 'Preguntas', ''),
(4, 'Audio', 0, '', '', 'Aportes', 'Preguntas', ''),
(5, 'Video', 0, '', '', 'Aportes', 'Preguntas', ''),
(6, 'Emprenderismo', 0, '', '', 'Ideas', 'Preguntas', 'Otras'),
(7, 'Universidades', 0, '', '', 'UBA', 'UTN', 'Otras'),
(8, 'Off-Topic', 0, '', '', 'Economía/Política', 'Videojuegos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `time` date NOT NULL,
  `author` varchar(100) NOT NULL,
  `forum` varchar(20) NOT NULL,
  `subforum` varchar(20) NOT NULL,
  `points` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `image`, `time`, `author`, `forum`, `subforum`, `points`, `title`, `post`) VALUES
(1, 'https://wallpaperaccess.com/full/234164.jpg', '0000-00-00', 'santiagogimenez@outlook.com.ar', 'Computación', 'Aportes', 0, 'Título del post acá', 'Mirá el lápiz en la punta superior izquierda de tu pantalla y divertite.\r\n\r\nHay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.\r\n\r\nSiempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n\r\n~ John F. Woods'),
(2, 'https://wallpaperaccess.com/full/234164.jpg', '0000-00-00', 'santiagogimenez@outlook.com.ar', 'Computación', 'Aportes', 0, 'Un aporte de prueba\r\n', 'El editor en vivo es simplemente genial... nada que ver con usar BBCodes o similar. ¡Gracias content tools!\r\n\r\n\r\nHay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.\r\n\r\nSiempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n\r\n~ John F. Woods'),
(3, 'https://prodavinci.com/wp-content/uploads/2018/03/ada-lovelace.jpg', '2019-02-14', 'santiagogimenez99@gmail.com', 'Programación', 'Aportes', 0, 'Ada Lovelace example', 'Ada Lovelace fue una programadora y matemática brillante que descubrió las bases actuales de la informática. Aunque en su tiempo no se le dió tanto crédito, hoy su historia es conocida por todos.'),
(4, 'https://wallpaperaccess.com/full/234164.jpg', '0000-00-00', 'santiagogimenez@outlook.com.ar', 'Computación', 'Aportes', 0, 'Hola tinchito', 'Mirá el lápiz en la punta superior izquierda de tu pantalla y divertite.\r\n\r\nHay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.\r\n\r\nSiempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís\r\n\r\n~ John F. Woods');

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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `dni` varchar(8) NOT NULL,
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `points` int(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `dni`, `avatar`, `points`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_public`, `is_deleted`) VALUES
(1, 'chiqui1234', 'santiagogimenez@outlook.com.ar', 'lilolilo10', '42214991', '', 60, '2019-02-10 00:00:00', '2019-02-10 00:00:00', 1, 1, 0, 0),
(2, '', 'santiagogimenez99@gmail.com', 'lilolilo10', '42214991', '', 60, '2000-07-01 00:00:00', '2000-07-01 00:00:00', 0, 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
