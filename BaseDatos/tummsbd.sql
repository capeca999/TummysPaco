-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2020 a las 16:09:42
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tummsbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE DATABASE tummsbd CHARACTER SET utf8mb4  COLLATE utf8mb4_bin;
use tummsbd;


CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` mediumint(9) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `way` enum('plaza','avenida','bulevar','calle') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `number`, `postal_code`, `location`, `province`, `country`, `way`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Plaza Rafael Amarillo', 'Numero 124', 46940, 'Manises', 'Valencia/Valéncia', 'Saipan', 'plaza', 131, NULL, NULL),
(2, 'Plaza Rafael Atard', 'Numero 124', 46936, 'Manises', 'Valencia/Valéncia', 'Spain', 'plaza', 131, NULL, NULL),
(3, 'Pintor Pinazo', '34', 46939, 'Manises', 'Valencia/Valéncia', 'Spain', 'plaza', 131, NULL, NULL),
(4, 'Calle Sorolla', '2', 46940, 'Manises', 'Lugo', 'Brazil', 'plaza', 150, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `race` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `species` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Hembra','Macho') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_found` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_found` date NOT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `animals`
--

INSERT INTO `animals` (`id`, `id_user`, `race`, `species`, `gender`, `date_of_birth`, `description`, `health`, `nickname`, `place_found`, `size`, `date_found`, `condition`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Ruso', 'Hamster', 'Hembra', '2017-11-14', 'Un hamster super enano pero enfadica', 'Sano', 'Chin Chin', 'Cheste', 'Pequeño', '2017-11-14', NULL, NULL, '2020-05-23 22:30:23'),
(4, 131, 'Bulldog', 'Canina', 'Hembra', '2020-04-05', 'Un perro con problemas para hacer pruebas', 'Enfermo', 'Problemas', 'Valencia', 'Grande', '2020-04-05', 'Le falta dos patas', NULL, '2020-05-23 22:27:18'),
(6, 142, 'Mestizo', 'Canina', 'Hembra', '2020-05-12', 'Perro adoptado prueba', 'Bien', 'PerritaAdoptada', 'Valencia', '1,5m', '2020-05-05', NULL, NULL, NULL),
(7, 131, 'Ruso', 'Hamster', 'Hembra', '2020-05-04', 'Pequeñito Hamster con muchos pelitos', 'Saludable', 'Xiconin', 'Valencia', '3cm', '2020-05-11', NULL, NULL, '2020-05-20 18:50:47'),
(8, NULL, 'Comun Europeo', 'Gato', 'Hembra', '2020-05-05', 'Gatito super pequeño', 'Saludable', 'Garrito', 'Manises', '2m', '2020-05-13', NULL, NULL, NULL),
(9, 131, 'Sphynx', 'Gato', 'Macho', '2010-01-01', 'Un gatet sin pelet muy gordito y guapo', 'Saludable', 'Pelut', 'Valencia', '1m', '2017-11-07', NULL, NULL, '2020-05-20 20:03:31'),
(10, NULL, 'Comun Europeo', 'Gato', 'Macho', '2020-05-26', 'Un gato super enano', 'Sano', 'Missu', 'Refugio', 'Grande', '2020-05-26', NULL, NULL, NULL),
(13, NULL, 'Comun Europeo', 'Gato', 'Macho', '2013-03-15', 'Un gatito muy grande y dormilon, pero a la vez petit', 'Sano, pero gordito', 'Missu', 'Refugio', 'Grande', '2013-03-15', NULL, NULL, NULL),
(14, NULL, 'Podenco', 'Canina', 'Hembra', '2014-04-14', 'Una perra super chula, que rechula cuando chulas', 'Sana', 'Chula', 'Andalucia', 'Mediano', '2014-05-25', NULL, NULL, NULL),
(15, NULL, 'Mestizo', 'Canina', 'Macho', '2017-01-16', 'Un gosset muy jugueton y travieso', 'Sano', 'Tudels', 'Calle, Valencia', 'Mediano', '2017-03-01', NULL, NULL, NULL),
(16, NULL, 'Ruso', 'Hamster', 'Hembra', '2017-11-17', 'Un hamster muy chin chineador', 'Sano pero menut', 'Chin Chin', 'Refugio', 'Muy petit', '2017-12-27', NULL, NULL, NULL),
(17, NULL, 'American shorthair', 'Gato', 'Macho', '2018-06-03', 'Un gatito con carita de enfadado', 'Sano', 'Furioso', 'Calle, Manises', 'Mediano', '2018-08-15', NULL, NULL, NULL),
(18, NULL, 'Bengala', 'Gato', 'Hembra', '2020-04-18', 'Una gatita muy pirotecnica', 'Sano', 'Mascleta', 'Calle, Mislata', 'Petit', '2020-05-27', NULL, NULL, NULL),
(19, NULL, 'British shorthair', 'Gato', 'Hembra', '2015-10-13', 'Una gateta con los ojos de color mandarina', 'Sano', 'Mandarina', 'Calle, Valencia', 'Mediano', '2015-12-19', NULL, NULL, NULL),
(20, NULL, 'Regamuffin', 'Gato', 'Hembra', '2016-09-21', 'Una gatita con color a leche merengada con canela', 'Sana', 'Canela', 'Calle', 'Grande', '2016-12-14', NULL, NULL, NULL),
(21, NULL, 'Van Turco', 'Gato', 'Macho', '2019-06-22', 'Un gatito con unos ojos especiales', 'Sano', 'Curro', 'Calle', 'Mediano', '2019-08-03', NULL, NULL, NULL),
(22, NULL, 'Pastor Aleman', 'Canina', 'Macho', '2015-02-14', 'Un pastor, muy cuidador', 'Sano', 'Linux', 'Calle, Valencia', 'Grande', '2015-04-03', NULL, NULL, NULL),
(23, NULL, 'Husky Siberiano', 'Canina', 'Macho', '2017-08-06', 'Un perrito muy helado', 'Sano', 'Polo', 'Bosque manises', 'Grande', '2017-10-13', NULL, NULL, NULL),
(24, NULL, 'Golden Retriver', 'Canina', 'Macho', '2019-11-15', 'Un perrito muy suave', 'Sano', 'Scottex', 'Calle, manises', 'petit', '2019-12-25', NULL, NULL, NULL),
(25, NULL, 'Caniche', 'Canina', 'Hembra', '2013-12-15', 'Una perrita muy bonnifacea', 'Sano', 'Bonny', 'Calle', 'Mediano', '2015-04-23', NULL, NULL, NULL),
(26, NULL, 'Chihuahua', 'Canina', 'Macho', '2015-06-07', 'Un perrito muy cuqui', 'Sano', 'Cuqui', 'Calle, quart de poblet', 'Petit', '2015-10-12', NULL, NULL, NULL),
(27, NULL, 'Chihuahua', 'Canina', 'Macho', '2018-03-06', 'Un perrito tan veloz como un rayo', 'Sano', 'Zeus', 'Calle, manises', 'Petit', '2018-06-12', NULL, NULL, NULL),
(28, NULL, 'Chihuahua', 'Canina', 'Macho', '2019-03-06', 'Un perrito tan fuerte como el martillo de Thor', 'Sano', 'Thor', 'Calle, Valencia', 'Petit', '2019-07-18', NULL, NULL, NULL),
(29, NULL, 'Terranova', 'Canina', 'Hembra', '2018-01-17', 'Una perrita con poco pelo', 'Sano', 'Luna', 'Calle, Mislata', 'Grande', '2018-05-27', NULL, NULL, NULL),
(30, NULL, 'Dalmata', 'Canina', 'Macho', '2017-04-28', 'Un perrito con muchas manchitas', 'Sano', 'Pongo', 'Calle, Quart de Poblet', 'Grande', '2017-11-25', NULL, NULL, NULL),
(31, NULL, 'Bulldog frances', 'Canina', 'Hembra', '2016-12-29', 'Una perrita muy juguetona', 'Sano', 'Bandita', 'Campo de Montroy', 'Mediana', '2017-03-19', NULL, NULL, NULL),
(32, NULL, 'Cobaya Peruana', 'Cobaya', 'Hembra', '2018-02-23', 'Una cobayita muy petita y muy peludita', 'Sano', 'Pelusa', 'Refugio', 'Petita', '2018-02-23', NULL, NULL, NULL),
(33, NULL, 'Cobaya Skinny', 'Cobaya', 'Macho', '2017-10-28', 'Una cobaya con color de vaca', 'Sano', 'Vaqui', 'Refugio', 'Petita', '2017-10-28', NULL, NULL, NULL),
(34, NULL, 'Cobaya Americana', 'Cobaya', 'Hembra', '2019-08-27', 'Una cobaya con unas orejas peculiares ', 'Sano', 'Orejotas', 'Refugio', 'Petita', '2019-08-27', NULL, NULL, NULL),
(35, NULL, 'Cobaya Americana', 'Cobaya', 'Macho', '2020-01-03', 'Una cobaya muy colorida', 'Sano', 'Rallitas', 'Refugio', 'Petita', '2020-01-03', NULL, NULL, NULL),
(36, NULL, 'Hamster Ruso', 'Hamster', 'Macho', '2018-02-03', 'Un hamster con unos bigotes muy largos', 'Sano', 'Bigotitos', 'Refugio', '4cm ', '2018-02-03', NULL, NULL, NULL),
(37, NULL, 'Hámster de Roborowski', 'Hamster', 'Hembra', '2019-03-17', 'Un hamster con una mezcla de colorines', 'Sano', 'Bolita', 'Refugio', '3cm', '2019-03-17', NULL, NULL, NULL),
(38, NULL, 'Hámster sirio o dorado', 'Hamster', 'Macho', '2019-12-24', 'Un hamster con color a cremita', 'Sano', 'Cremita', 'Refugio', '3cm', '2019-12-24', NULL, NULL, NULL),
(39, NULL, 'Hámster chino', 'Hamster', 'Macho', '2017-11-23', 'Un hamster con colita', 'Sano', 'Colita', 'Refugio', '10cm', '2017-11-23', NULL, NULL, NULL),
(40, NULL, 'Hámster enano de Campbell', 'Hamster', 'Hembra', '2019-08-24', 'Un hamster super blanquito', 'Sano', 'Blanca', 'Refugio', '6cm', '2019-08-24', NULL, NULL, NULL),
(41, NULL, 'Conejo comun', 'Conejo', 'Macho', '2018-09-04', 'Un conejo super peluquitas', 'Sano', 'Pelucas', 'Refugio', '34cm', '2018-09-04', NULL, NULL, NULL),
(42, NULL, 'Conejo Blanco de Hotot', 'Conejo', 'Hembra', '2015-07-12', 'Un conejo muy blanquito', 'Sano', 'Angora', 'Refugio', '35cm', '2015-07-12', NULL, NULL, NULL),
(43, NULL, 'Conejo rex', 'Conejo', 'Macho', '2016-10-17', 'Un conejo con unas orejas muuy grandes', 'Sano', 'Bugs', 'Refugio', '40cm', '2016-10-17', NULL, NULL, NULL),
(44, NULL, 'Conejo tan', 'Conejo', 'Hembra', '2014-09-18', 'Un conejo de color cafe', 'Sano', 'Cafe', 'Refugio', '37cm', '2014-09-18', NULL, NULL, NULL),
(45, NULL, 'Agaporni', 'Pajaro', 'Macho', '2019-11-15', 'Un agaporni con una pancheta molt suau', 'Sano', 'Pipiri', 'Refugio', '14cm', '2019-11-15', NULL, NULL, NULL),
(46, NULL, 'Agaporni', 'Pajaro', 'Macho', '2017-06-12', 'Un agaporni muy azul', 'Sano', 'PioPio', 'Refugio', '15cm', '2019-11-15', NULL, NULL, NULL),
(47, NULL, 'Periquito', 'Pajaro', 'Hembra', '2020-01-23', 'Un periquito muy volador', 'Sano', 'Pichi', 'Refugio', '15cm', '2020-01-23', NULL, NULL, NULL),
(48, NULL, 'Periquito', 'Pajaro', 'Hembra', '2019-03-12', 'Un periquito con un piquet molt bonic', 'Sano', 'Piquet', 'Refugio', '15cm', '2019-03-12', NULL, NULL, NULL),
(49, NULL, 'Whippet', 'Huron', 'Hembra', '2016-03-12', 'Un huron muy largo', 'Sano', 'Rosita', 'Refugio', '45cm', '2016-03-12', NULL, NULL, NULL),
(50, NULL, 'Whippet', 'Huron', 'Macho', '2017-07-26', 'Un huron muy gracioso', 'Sano', 'Pancho', 'Refugio', '38cm', '2017-07-26', NULL, NULL, NULL),
(51, NULL, 'Bull', 'Huron', 'Hembra', '2018-04-15', 'Un huron muy peludito', 'Sano', 'Pandita', 'Refugio', '38cm', '2018-04-15', NULL, NULL, NULL),
(52, NULL, 'Estandar', 'Huron', 'Macho', '2016-11-24', 'Un huron muy peludito', 'Sano', 'Colita ', 'Refugio', '40cm', '2016-11-24', NULL, NULL, NULL),
(53, NULL, 'Comun', 'Gato', 'Macho', '2017-09-21', 'Un gatito muy amoroso y con ganas de mimets', 'Sano', 'Tomas', 'Calle', 'Mediano', '2017-12-26', 'Se quedo sin patas por una mala caida', NULL, NULL),
(54, NULL, 'Comun', 'Gato', 'Hembra', '2018-02-21', 'Una gatita muy juguetona', 'Sano', 'Marie', 'Calle', 'Mediano', '2018-04-13', 'Se quedo sin un ojo porque su dueño la maltrataba y luego la tiro a la calle', NULL, NULL),
(55, NULL, 'Chihuahua', 'Canina', 'Macho', '2020-04-23', 'Es un perrito muy chiquitin con ganas de ser cuidado', 'Sano', 'Turbo', 'Calle', 'Petit', '2020-04-23', 'Nacio sin patas delanteras, pero es todo un luchador', NULL, NULL),
(56, NULL, 'Mestiza', 'Canina', 'Hembra', '2018-08-14', 'Es una perrita muy juguetona y tiene ganas de ser muy feliz en familia', 'Sano', 'Roko', 'Campo', 'Mediana', '2019-05-21', 'La atropello un coche y se dio a la fuga, mientras ella tuvo que ser operada de urgencia quedandose sin sus dos patitas delanteras', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_question` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `likes` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `answers`
--

INSERT INTO `answers` (`id`, `id_question`, `id_user`, `likes`, `views`, `fecha`, `title`, `description`, `created_at`, `updated_at`) VALUES
(13, 16, 142, 0, 0, '2020-05-31', 'Si que puedes', 'Tienes que tener cuidado eso si', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_badge` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `awards`
--

INSERT INTO `awards` (`id`, `id_user`, `id_badge`, `created_at`, `updated_at`) VALUES
(1, 142, 1, NULL, NULL),
(2, 131, 1, NULL, NULL),
(3, 131, 2, NULL, NULL),
(4, 131, 3, NULL, NULL),
(5, 141, 10, NULL, NULL),
(6, 141, 3, NULL, NULL),
(7, 141, 2, NULL, NULL),
(9, 140, 2, NULL, NULL),
(10, 140, 10, NULL, NULL),
(11, 145, 10, NULL, NULL),
(12, 141, 1, NULL, NULL),
(13, 149, 10, NULL, NULL),
(14, 150, 10, NULL, NULL),
(15, 150, 1, NULL, NULL),
(16, 150, 2, NULL, NULL),
(17, 131, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `badges`
--

INSERT INTO `badges` (`id`, `icon`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '/img/medallas/productbuyer.png', 'DonadorProductos', 'Medalla Por Comprar En La Tienda!', NULL, NULL),
(2, '/img/medallas/donador.png', 'Donador', 'Has donado al refugio de animales!', NULL, NULL),
(3, '/img/medallas/admin.png', 'Administrador de la página', 'Administrador de la página', NULL, NULL),
(10, '/img/medallas/new.png', 'NuevoUsuario', 'Bienvenido!', NULL, NULL),
(11, '/img/medallas/animal.png', 'Adoptador Animales', 'Has adoptado a un animal!', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`id`, `codigo`, `descuento`, `created_at`, `updated_at`) VALUES
(1, 'Tummysfriends', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ammount` int(11) NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `donations`
--

INSERT INTO `donations` (`id`, `id_user`, `reason`, `ammount`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(2, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(3, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(4, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(5, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(6, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(7, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(8, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(9, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(10, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(11, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(12, 141, 'Me gustan los animales', 10, 'Credit card', NULL, NULL),
(13, NULL, 'Me gustan los animales', 4, 'Credit card', NULL, NULL),
(14, 140, 'Ofrenda de amor', 2, 'Credit card', NULL, NULL),
(15, 140, 'Ofrenda de amor', 2, 'Credit card', NULL, NULL),
(16, 140, 'Ofrenda de amor', 2, 'Credit card', NULL, NULL),
(17, 140, 'Ofrenda de amor', 2, 'Credit card', NULL, NULL),
(18, 140, 'Ofrenda de amor', 2, 'Credit card', NULL, NULL),
(19, 140, 'Ofrenda de amor', 25, 'Credit card', NULL, NULL),
(20, 150, 'Me gustan los animales', 40, 'Credit card', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_animals`
--

CREATE TABLE `images_animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_animal` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `images_animals`
--

INSERT INTO `images_animals` (`id`, `id_animal`, `url`, `created_at`, `updated_at`) VALUES
(5, 3, '/img/animals/3.jpg', NULL, NULL),
(6, 4, '/img/animals/6.jpg', NULL, NULL),
(9, 6, '/img/animals/11.png', NULL, NULL),
(10, 7, '/img/animals/7.jpg', NULL, NULL),
(11, 9, '/img/animals/pelut.jpg', NULL, NULL),
(12, 10, '/img/animals/1.jpeg', NULL, NULL),
(15, 14, '/img/animals/podenco1.jpeg', NULL, NULL),
(16, 14, '/img/animals/podenco2.jpeg', NULL, NULL),
(17, 16, '/img/animals/9.jpg', NULL, NULL),
(18, 17, '/img/animals/american1.jpeg', NULL, NULL),
(19, 18, '/img/animals/bengala1.jpeg', NULL, NULL),
(20, 18, '/img/animals/bengala2.jpeg', NULL, NULL),
(21, 19, '/img/animals/gris1.jpeg', NULL, NULL),
(22, 19, '/img/animals/gris2.jpeg', NULL, NULL),
(23, 20, '/img/animals/raga1.jpeg', NULL, NULL),
(24, 20, '/img/animals/raga2.jpeg', NULL, NULL),
(25, 21, '/img/animals/curro1.jpeg', NULL, NULL),
(26, 21, '/img/animals/curro2.jpeg', NULL, NULL),
(27, 26, '/img/animals/cuqui1.jpeg', NULL, NULL),
(28, 26, '/img/animals/cuqui2.jpeg', NULL, NULL),
(29, 27, '/img/animals/zeus1.jpeg', NULL, NULL),
(31, 27, '/img/animals/zeus2.jpeg', '0000-00-00 00:00:00', NULL),
(32, 28, '/img/animals/thor1.jpeg', NULL, NULL),
(33, 28, '/img/animals/thor2.jpeg', NULL, NULL),
(34, 28, '/img/animals/thor3.jpeg', NULL, NULL),
(35, 29, '/img/animals/luna1.jpeg', NULL, NULL),
(36, 29, '/img/animals/luna2.jpeg', NULL, NULL),
(37, 30, '/img/animals/pongo1.jpeg', NULL, NULL),
(38, 30, '/img/animals/pongo2.jpeg', NULL, NULL),
(39, 31, '/img/animals/bull1.jpeg', NULL, NULL),
(40, 31, '/img/animals/bull2.jpeg', NULL, NULL),
(41, 32, '/img/animals/pelusa1.jpeg', NULL, NULL),
(42, 32, '/img/animals/pelusa2.jpeg', NULL, NULL),
(43, 33, '/img/animals/patitas1.jpeg', NULL, NULL),
(44, 33, '/img/animals/patitas2.jpeg', NULL, NULL),
(45, 41, '/img/animals/peluca1.jpeg', NULL, NULL),
(46, 41, '/img/animals/peluca2.jpeg', NULL, NULL),
(47, 47, '/img/animals/pichi1.jpeg', NULL, NULL),
(48, 45, '/img/animals/pipiri1.jpeg', NULL, NULL),
(49, 46, '/img/animals/piopio1.jpeg', NULL, NULL),
(50, 49, '/img/animals/rosita1.jpeg', NULL, NULL),
(51, 50, '/img/animals/pancho1.jpeg', NULL, NULL),
(52, 50, '/img/animals/pancho2.jpeg', NULL, NULL),
(53, 42, '/img/animals/hot1.jpeg', NULL, NULL),
(54, 42, '/img/animals/hot2.jpeg', NULL, NULL),
(55, 44, '/img/animals/cafe1.jpeg', NULL, NULL),
(56, 43, '/img/animals/bugs2.jpeg', NULL, NULL),
(57, 34, '/img/animals/orejotas.jpeg', NULL, NULL),
(58, 35, '/img/animals/rallitas1.jpeg', NULL, NULL),
(59, 36, '/img/animals/bigotitos1.jpeg', NULL, NULL),
(60, 37, '/img/animals/bolita1.jpeg', NULL, NULL),
(61, 37, '/img/animals/bolita2.jpeg', NULL, NULL),
(62, 38, '/img/animals/cremita1.jpeg', NULL, NULL),
(63, 38, '/img/animals/cremita2.jpeg', NULL, NULL),
(64, 39, '/img/animals/colita1.jpeg', NULL, NULL),
(65, 39, '/img/animals/colita2.jpeg', NULL, NULL),
(66, 40, '/img/animals/blanca1.jpeg', NULL, NULL),
(67, 40, '/img/animals/blanca2.jpeg', NULL, NULL),
(68, 48, '/img/animals/piquet1.jpeg', NULL, NULL),
(69, 51, '/img/animals/pandita1.jpeg', NULL, NULL),
(70, 52, '/img/animals/colitauron1.jpeg', NULL, NULL),
(71, 53, '/img/animals/tomas1.jpeg', NULL, NULL),
(72, 53, '/img/animals/tomas2.jpeg', NULL, NULL),
(73, 54, '/img/animals/marie1.jpeg', NULL, NULL),
(74, 55, '/img/animals/turbo1.jpeg', NULL, NULL),
(75, 56, '/img/animals/ruedas1.jpeg', NULL, NULL),
(76, 15, '/img/animals/tudels1.jpeg', NULL, NULL),
(77, 15, '/img/animals/tudels1.jpeg', NULL, NULL),
(78, 15, '/img/animals/tudels3.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_users`
--

CREATE TABLE `images_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_answers`
--

CREATE TABLE `like_answers` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_answer` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_questions`
--

CREATE TABLE `like_questions` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_question` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `like_questions`
--

INSERT INTO `like_questions` (`id_user`, `id_question`, `created_at`, `updated_at`) VALUES
(131, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lines`
--

CREATE TABLE `lines` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lines`
--

INSERT INTO `lines` (`id_order`, `id_product`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 2, NULL, NULL),
(2, 1, 10, 2, NULL, NULL),
(4, 1, 20, 3, NULL, NULL),
(5, 1, 20, 6, NULL, NULL),
(1, 2, 25, 4, NULL, NULL),
(2, 2, 25, 2, NULL, NULL),
(4, 2, 25, 2, NULL, NULL),
(6, 2, 25, 2, NULL, NULL),
(6, 4, 25, 1, NULL, NULL),
(3, 6, 25, 2, NULL, NULL),
(3, 9, 15, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_05_02_124242_animals', 1),
(3, '2020_05_02_140031_create_users_table', 1),
(4, '2020_05_02_145017_questions', 1),
(5, '2020_05_02_145633_answers', 1),
(6, '2020_05_02_150329_vaccinations', 1),
(7, '2020_05_02_150804_vaccines', 1),
(8, '2020_05_02_151147_images_animals', 1),
(9, '2020_05_02_151418_images_users', 1),
(10, '2020_05_02_151718_products', 1),
(11, '2020_05_02_152036_lines', 1),
(12, '2020_05_02_152638_orders', 1),
(13, '2020_05_02_152926_badges', 1),
(14, '2020_05_02_153014_awards', 1),
(15, '2020_05_02_153131_weights', 1),
(16, '2020_05_02_154319_fk_imagesanimals', 1),
(17, '2020_05_02_154453_fk_animaluser', 1),
(18, '2020_05_02_154655_fk_animalvaccinations', 1),
(19, '2020_05_02_154830_fk_animalweights', 1),
(20, '2020_05_02_155144_fk_usersorders', 1),
(21, '2020_05_02_155247_fk_orderslines', 1),
(22, '2020_05_02_155705_fk_linesproducts', 1),
(23, '2020_05_02_160016_fk_answersusers', 1),
(24, '2020_05_02_160347_fk_answersquestions', 1),
(25, '2020_05_02_160633_fk_questionsuser', 1),
(26, '2020_05_02_160749_fk_awardsuser', 1),
(27, '2020_05_02_161241_fk_badgeswards', 1),
(28, '2020_05_02_161459_fk_imagesuser', 1),
(29, '2020_05_02_161716_fk_vaccinesvaccinations', 1),
(30, '2020_05_05_175849_coupons', 1),
(31, '2020_05_05_192614_fk_pedidocoupon', 1),
(32, '2020_05_07_133413_petitions', 1),
(33, '2020_05_07_134954_fk_petitionuser', 1),
(34, '2020_05_07_135012_fk_petitionanimal', 1),
(35, '2020_05_10_173747_addresses', 1),
(36, '2020_05_10_200515_fk__addressesiduser', 1),
(37, '2020_05_13_202529_likes_question', 1),
(38, '2020_05_13_202637_fk_likes_questions', 1),
(39, '2020_05_13_202902_likes_answers', 1),
(40, '2020_05_13_202957_fk_likes_answers', 1),
(41, '2020_05_16_125926_fk_badgeselected', 1),
(42, '2020_05_18_211518_donations', 1),
(43, '2020_05_18_211557_fk_donationsuser', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `total_price` double(8,2) NOT NULL,
  `payment_method` enum('Credit card','Debit Card','Paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_arrival` date NOT NULL,
  `status` enum('Order Processed','Order Shipped','Order En Route','Order Arrived') COLLATE utf8mb4_unicode_ci NOT NULL,
  `USPS` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` mediumint(9) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `way` enum('plaza','avenida','bulevar','calle') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date_order`, `coupon_id`, `descuento`, `total_price`, `payment_method`, `expected_arrival`, `status`, `USPS`, `street`, `number`, `postal_code`, `location`, `province`, `country`, `way`, `created_at`, `updated_at`) VALUES
(1, 131, '0000-00-00 00:00:00', 1, 5, 115.00, 'Paypal', '0000-00-00', 'Order Arrived', '23074666585', 'Calle falsa', 'Numero 124', 46940, 'Manises', 'Valencia/Valéncia', 'Saipan', 'plaza', NULL, '2020-05-21 13:07:45'),
(2, 141, '2020-05-18 22:00:00', NULL, NULL, 70.00, 'Credit card', '0000-00-00', 'Order Arrived', '13571369858', 'Plaza Rafael Atard', 'Numero 124', 46940, 'Manises', 'Valencia/Valéncia', 'Spain', 'plaza', NULL, '2020-05-21 13:07:49'),
(3, 141, '2020-05-19 22:11:57', NULL, NULL, 65.00, 'Credit card', '0000-00-00', 'Order Arrived', '15912547129', 'Plaza Rafael Atard', 'Numero 124', 46938, 'Manises', 'Ávila', 'Senegal', 'plaza', NULL, '2020-05-21 13:07:51'),
(4, 131, '2020-05-21 15:33:16', NULL, NULL, 110.00, 'Credit card', '0000-00-00', 'Order En Route', '70821508522', 'Plaza Rafael Atard', 'Numero 124', 46936, 'Manises', 'Valencia/Valéncia', 'Spain', 'plaza', NULL, '2020-05-21 15:12:35'),
(5, 131, '2020-05-21 15:37:16', NULL, NULL, 120.00, 'Credit card', '0000-00-00', 'Order Processed', '24949681621', 'Calle Inventada', 'Numero Inventado', 46939, 'Manises', 'Valencia/Valéncia', 'Spain', 'plaza', NULL, NULL),
(6, 150, '2020-05-23 02:58:34', NULL, NULL, 75.00, 'Debit Card', '0000-00-00', 'Order Processed', '39994720784', 'Calle Falsa 123', 'jajsalu2', 46940, 'Manises', 'Lugo', 'Brazil', 'plaza', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `petitions`
--

CREATE TABLE `petitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_animal` bigint(20) UNSIGNED NOT NULL,
  `name_petition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_petition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('Sended','Accepted','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `stock`, `price`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 20, 'Taza Tummys White', 'Taza de tummys para el desayuno', '/img/products/TazaTummys/gif2.gif', NULL, '2020-05-23 01:16:08'),
(2, 10, 25, 'Camiseta Manga Larga Unisex Tummys White', 'Camiseta de Manga Larga Unisex 100% algodón con el logo de Tummys!', '/img/products/camisetaBlancaTummys/1.JPG', NULL, '2020-05-23 00:58:34'),
(3, 0, 25, 'Camiseta Manga Larga Unisex Tummys Gray', 'Camiseta de Manga Larga Unisex 100% algodón con el logo de Tummys!', '/img/products/camisetaGrisTummys/1.JPG', NULL, '2020-05-12 15:46:41'),
(4, 9, 25, 'Camiseta Manga Larga Unisex Tummys Black', 'Camiseta de Manga Larga Unisex 100% algodón con el logo de Tummys!', '/img/products/camisetaNegraTummys/1.JPG', NULL, '2020-05-23 00:58:34'),
(5, 4, 25, 'Camiseta Manga Corta Unisex Tummys White', 'Camiseta de Manga Corta Unisex 100% algodón con el logo de Tummys! ', '/img/products/camisetaCortaBlancaTummys/1.JPG', NULL, '2020-05-13 02:26:46'),
(6, 7, 25, 'Camiseta Manga Corta Unisex Tummys Purple', 'Camiseta de Manga Corta Unisex 100% algodón con el logo de Tummys! ', '/img/products/camisetaMoradaCortaTummys/1.JPG', NULL, '2020-05-19 20:11:58'),
(7, 90, 25, 'Camiseta Manga Corta Unisex Tummys Black', 'Camiseta de Manga Corta Unisex 100% algodón con el logo de Tummys! ', '/img/products/camisetaNegraCortaTummys/1.JPG', NULL, NULL),
(8, 20, 10, 'Alfombrilla Tummys Black', 'Navega con estilo con nuestra alfombrilla Tummys!.', '/img/products/alfombrilla/1.png', NULL, NULL),
(9, 18, 15, 'Collar Tummys Personalizable Black', 'Personaliza tu mascota con un collar personalizable!', '/img/products/collar/1.JPG', NULL, '2020-05-19 20:11:58'),
(10, 100, 10, 'Pulsera Goma Tummys Black!', 'Pulsera de goma negra de Tummys!', '/img/products/PulseraGoma/1.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `id_user`, `title`, `likes`, `views`, `date`, `description`, `created_at`, `updated_at`) VALUES
(16, 142, '¿Puedo pasear a mi gato?', 0, 1, '2020-05-31', 'No se si puedo pasearlo', NULL, '2020-05-31 14:12:20'),
(17, 148, '¿Puedo acariciar a mi perro si me ladra?', 0, 0, '2020-05-31', 'La ultima vez me mordió', NULL, NULL),
(18, 137, '¿Puedo vacunar a mi gato sin que muerda?', 0, 0, '2020-05-31', 'Siempre que lo vacuno me muerde la mano', NULL, NULL),
(19, 141, '¿Puedo tener más de un gato?', 1, 3, '2020-05-31', 'Mi gato creo que quiere estar solo', NULL, '2020-06-01 21:58:18'),
(20, 138, '¿Puedo tener mas de un huron?', 0, 0, '2020-05-31', 'Puedo?', NULL, NULL),
(21, 140, '¿Teneis alguna idea de como duchar a los gatos?', 0, 0, '2020-05-30', 'Mi gato siempre me muerde', NULL, NULL),
(22, 136, '¿Como puedo pasear a mi periquito?', 0, 0, '2020-05-31', '¿Puedo pasearlo o mejor no?', NULL, NULL),
(23, 145, '¿Puedo duchar a mi pájaro?', 0, 0, '2020-05-31', 'Se puede o no?', NULL, NULL),
(24, 135, '¿Teneis alguna idea si está página  va a crecer?', 0, 0, '2020-05-31', 'Me gusta mucho la página', NULL, NULL),
(25, 138, '¿Mi pájaro no para de dormir?', 0, 0, '2020-05-24', 'Porque duerme tanto?', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Usuario','Administrador') COLLATE utf8mb4_unicode_ci DEFAULT 'Usuario',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge_selected` bigint(20) UNSIGNED NOT NULL DEFAULT '10',
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nif`, `role`, `name`, `first_name`, `last_name`, `avatar`, `password`, `date_birth`, `email`, `badge_selected`, `province`, `location`, `telephone_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(131, '59701757J', 'Administrador', 'pollo', 'golfee', 'Romero', 'avatar.png', '$2y$10$n3dBowhNcFlbuz6EUtqQZOBhExCiDvMC3OuV4jLvLbbnSTLHag.xy', '2017-12-05', 'salvadorromerogolfe@hotmail.es', 3, 'Valencia', 'Manises Plaza Rafael Atard', '675820147', NULL, NULL, '2020-05-02 23:58:21', '2020-05-26 06:33:33'),
(132, '49573986Q', 'Usuario', 'holaaa', 'usuario', 'usuario', 'avatar.png', '$2y$10$hBO1De1w.OcqB94LzuAVnOaJrhK8.MMeX3807k9HHaW5NToMLFxgm', '0000-00-00', 'syzygy.tgio@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-09 11:58:19', '2020-05-26 06:54:36'),
(134, '49573981B', 'Usuario', 'Raul', 'aceituna', 'pinazo', 'avatar.png', '$2y$10$Pl27oaka.tr0W4QBl54fX.EWg4G.YGiLg07kPs2yzIqJwuUy0bEmm', '0000-00-00', 'raul@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-14 11:49:23', '2020-05-14 11:49:23'),
(135, '44443456G', 'Usuario', 'anomaly', 'guna', 'pinazo', 'avatar.png', '$2y$10$i1XHBIGt2qF0bb94MJc4xue/lCOK61V29Y01ngxL5LZDj5AcxoXpG', '0000-00-00', 'anomaly@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-14 11:52:04', '2020-05-14 11:52:04'),
(136, '45467876G', 'Usuario', 'Raul', 'guna', 'pinazo', 'avatar.png', '$2y$10$/Yz9qCr/8zQM0d/7sh93GO5BmcQXytEiIPc8m7AXoThtsjw80jIgG', '0000-00-00', 'raul2@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-14 11:55:09', '2020-05-14 11:55:09'),
(137, '32345676V', 'Usuario', 'raul3', 'guna', 'pinazo', 'avatar.png', '$2y$10$POv/I58W0vCuPzd24164M.bHnMfAFsddUa3hPpd.npeybojMbxuz6', '0000-00-00', 'raul3@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-14 13:03:05', '2020-05-14 13:03:05'),
(138, '56787656N', 'Usuario', 'raul4', 'Guna', 'Pinazo', 'avatar.png', '$2y$10$bxup2RcUojMxGpe8feoFeOAy3BhxvDxh8ZZ0P1tG1QySyLtWJYPna', '0000-00-00', 'raul4@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-14 13:31:54', '2020-05-14 13:31:54'),
(139, '43454657K', 'Usuario', 'raul5', 'guna', 'pinazo', 'avatar.png', '$2y$10$rGbe3w20JAjEUYCZ/1vqju5kthxGcpP.vb89K8S0Ss3amIza21PMO', '0000-00-00', 'raul5@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-14 15:27:55', '2020-05-14 15:27:55'),
(140, '44443222T', 'Usuario', 'Jose', 'Rodriguez', 'pinazo', 'avatar.png', '$2y$10$4GKdjB7f9HTOk3HWsfmWteq9UBMT7aJpeNpYfPD1LfeyMOQTE31hm', '0000-00-00', 'raul6@gmail.com', 2, '', '', '', NULL, NULL, '2020-05-14 17:58:49', '2020-05-18 21:39:07'),
(141, '35467896X', 'Usuario', 'raul7', 'guna', 'pinazo', 'avatar.png', '$2y$10$HxdYGhKD7OijG0FnzdqQAegnYRblI.2OS2MrONS/j0bldkgkyytHm', '0000-00-00', 'raul7@gmail.com', 2, '', '', '', NULL, NULL, '2020-05-14 19:24:48', '2020-05-23 00:48:12'),
(142, '11112345X', 'Usuario', 'Juana', 'guna', 'pinazo', 'avatar.png', '$2y$10$/d0ezbADZnebVDSUYO3/iOREnF2OtitU5.ikvlciyb9FoCObGlOmm', '0000-00-00', 'raul8@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-15 06:21:42', '2020-05-15 20:09:09'),
(143, '66665676S', 'Usuario', 'juan', 'garcia', 'castro', 'avatar.png', '$2y$10$HxFciGK4v.RjiooghEDZsesD7BG7A5IC5QDMcTQ3ep0/l50W7YZc.', '0000-00-00', 'juangarcia@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-15 20:17:45', '2020-05-15 20:17:45'),
(144, '44444456S', 'Usuario', 'Mirana', 'pinazo', 'pinazo', 'avatar.png', '$2y$10$9Q9pqkEH4ycqZGuv768cduCVSocp5HTUP7ckh2rOWsZ4xgR6NkUB.', '0000-00-00', 'syzygy2.tgio@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-15 20:19:03', '2020-05-15 20:19:03'),
(145, '88887876Y', 'Usuario', 'Paula', 'Palmero', 'Valencia', 'avatar.png', '$2y$10$9VRYDwWPYKDTR6aJQ9ZaeusmqQf5jVvC3EtqzTjkairaUguxV1gTq', '0000-00-00', 'paulavalenciapalmero@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-18 22:39:21', '2020-05-18 22:39:21'),
(148, '12223454N', 'Usuario', 'Paco', 'Guna', 'Pinazo', 'avatar.png', '$2y$10$8dI9jqV/07qMNX.rCbgeJOa1ICI1z6OGg3vcSb953/77j0hcHEksa', '0000-00-00', 'syzygy.tgio2@gmail.com', 10, '', '', '', NULL, NULL, '2020-05-21 13:26:45', '2020-05-21 13:26:45'),
(149, '44445432W', 'Usuario', 'Paco', 'Guna', 'Pinazo', 'avatar.png', '$2y$10$fkPJh2mDHicBtXVM7m2H.OSScC7hM/dRSREHyWgBzkN86TUOrue9S', '0000-00-00', 'capeca999@gmail.com', 10, '', '', '', NULL, 'rp95qIrFYJga5m0caswtUJ2rpqoWOnp6l2yFUw5ANApu4Ho4cOD4bAy5kmkY', '2020-05-21 13:30:10', '2020-05-23 11:01:45'),
(150, '44445456A', 'Usuario', 'Knight', 'guna', 'pinazo', 'avatar.png', '$2y$10$aJTXqiDU31AJlvj5fboVh.nzuoRNJwDtVsuX.Wp4l2MECc8/QxLMC', '0000-00-00', 'vambiarempresa@gmail.com', 10, 'Manises', 'Calle Magallanes 12121º4312', '', NULL, NULL, '2020-05-23 00:52:33', '2020-05-23 01:03:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vaccinations`
--

CREATE TABLE `vaccinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vaccine` bigint(20) UNSIGNED NOT NULL,
  `id_animal` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vaccinations`
--

INSERT INTO `vaccinations` (`id`, `id_vaccine`, `id_animal`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2020-05-19', NULL, NULL),
(4, 1, 6, '2020-05-23', NULL, NULL),
(5, 1, 6, '2020-05-23', NULL, NULL),
(6, 1, 6, '2020-05-23', NULL, NULL),
(7, 1, 6, '2020-05-23', NULL, NULL),
(9, 1, 9, '2020-05-18', NULL, NULL),
(10, 1, 3, '2020-05-04', NULL, NULL),
(11, 1, 10, '2020-05-27', NULL, NULL),
(12, 1, 10, '2020-05-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rabia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_animal` bigint(20) UNSIGNED NOT NULL,
  `kg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `weights`
--

INSERT INTO `weights` (`id`, `id_animal`, `kg`, `date`, `created_at`, `updated_at`) VALUES
(1, 9, '3', '2013-12-01', NULL, NULL),
(2, 9, '5', '2017-01-18', NULL, NULL),
(3, 9, '10', '2020-04-01', NULL, NULL),
(4, 9, '8', '2018-04-11', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_id_user_foreign` (`id_user`),
  ADD KEY `answers_id_question_foreign` (`id_question`);

--
-- Indices de la tabla `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `awards_id_user_id_badge_unique` (`id_user`,`id_badge`),
  ADD KEY `awards_id_badge_foreign` (`id_badge`);

--
-- Indices de la tabla `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `images_animals`
--
ALTER TABLE `images_animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_animals_id_animal_foreign` (`id_animal`);

--
-- Indices de la tabla `images_users`
--
ALTER TABLE `images_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_users_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `like_answers`
--
ALTER TABLE `like_answers`
  ADD PRIMARY KEY (`id_answer`,`id_user`),
  ADD KEY `like_answers_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `like_questions`
--
ALTER TABLE `like_questions`
  ADD PRIMARY KEY (`id_question`,`id_user`),
  ADD KEY `like_questions_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id_product`,`id_order`),
  ADD KEY `lines_id_order_foreign` (`id_order`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_user_foreign` (`id_user`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `petitions`
--
ALTER TABLE `petitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petitions_id_user_foreign` (`id_user`),
  ADD KEY `petitions_id_animal_foreign` (`id_animal`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nif_unique` (`nif`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_badge_selected_foreign` (`badge_selected`);

--
-- Indices de la tabla `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccinations_id_animal_foreign` (`id_animal`),
  ADD KEY `vaccinations_id_vaccine_foreign` (`id_vaccine`);

--
-- Indices de la tabla `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weights_id_animal_foreign` (`id_animal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `images_animals`
--
ALTER TABLE `images_animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `images_users`
--
ALTER TABLE `images_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `petitions`
--
ALTER TABLE `petitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_id_question_foreign` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_id_badge_foreign` FOREIGN KEY (`id_badge`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `awards_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `images_animals`
--
ALTER TABLE `images_animals`
  ADD CONSTRAINT `images_animals_id_animal_foreign` FOREIGN KEY (`id_animal`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `images_users`
--
ALTER TABLE `images_users`
  ADD CONSTRAINT `images_users_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `like_answers`
--
ALTER TABLE `like_answers`
  ADD CONSTRAINT `like_answers_id_answer_foreign` FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_answers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `like_questions`
--
ALTER TABLE `like_questions`
  ADD CONSTRAINT `like_questions_id_question_foreign` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_questions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lines`
--
ALTER TABLE `lines`
  ADD CONSTRAINT `lines_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lines_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `petitions`
--
ALTER TABLE `petitions`
  ADD CONSTRAINT `petitions_id_animal_foreign` FOREIGN KEY (`id_animal`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `petitions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_badge_selected_foreign` FOREIGN KEY (`badge_selected`) REFERENCES `badges` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `vaccinations_id_animal_foreign` FOREIGN KEY (`id_animal`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vaccinations_id_vaccine_foreign` FOREIGN KEY (`id_vaccine`) REFERENCES `vaccines` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `weights`
--
ALTER TABLE `weights`

  ADD CONSTRAINT `weights_id_animal_foreign` FOREIGN KEY (`id_animal`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

GRANT USAGE ON *.* TO 'tummysadmin'@'localhost' IDENTIFIED BY PASSWORD '*9EBA82B0350BA7FCFF6D91F97F777A98CC6B10AC';

GRANT ALL PRIVILEGES ON `tummsbd`.* TO 'tummysadmin'@'localhost' WITH GRANT OPTION;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
