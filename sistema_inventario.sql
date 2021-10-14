-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2021 a las 16:05:32
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_articulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `descripcion_articulo`, `created_at`, `updated_at`) VALUES
(1, 'Baterias', '2021-10-07 19:37:33', '2021-10-07 19:37:33'),
(2, 'Telefonos', '2021-10-07 19:37:40', '2021-10-07 19:37:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Cliente Final', '041200000', '2021-10-08 16:33:08', '2021-10-08 16:33:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_productos`
--

CREATE TABLE `historico_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `modelo_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_compra` decimal(8,2) NOT NULL,
  `precio_venta` decimal(8,2) NOT NULL,
  `cantidad_base` int(11) NOT NULL,
  `existencia_agregar` int(11) NOT NULL,
  `existencia_actual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historico_productos`
--

INSERT INTO `historico_productos` (`id`, `producto_id`, `articulo_id`, `modelo_id`, `descripcion`, `precio_compra`, `precio_venta`, `cantidad_base`, `existencia_agregar`, `existencia_actual`, `created_at`, `updated_at`) VALUES
(4, 5, 1, 1, 'Bateria Nokia Lumia', '5.00', '10.00', 9, 2, 7, '2021-10-09 15:04:39', '2021-10-09 15:04:39'),
(5, 5, 1, 1, 'Bateria Nokia Lumia', '5.00', '10.00', 12, 3, 10, '2021-10-09 15:05:10', '2021-10-09 15:05:10'),
(6, 4, 1, 2, 'bateria blu g 5', '5.00', '10.00', 20, 5, 15, '2021-10-09 17:00:54', '2021-10-09 17:00:54'),
(7, 7, 1, 1, 'nokia lumia 5', '5.00', '10.00', 8, 3, 8, '2021-10-14 12:31:16', '2021-10-14 12:31:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion_marca`, `created_at`, `updated_at`) VALUES
(1, 'NOKIA', '2021-10-07 19:37:53', '2021-10-07 19:37:53'),
(2, 'BLU', '2021-10-07 19:38:01', '2021-10-07 19:38:01');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `marcas_modelos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `marcas_modelos` (
`marca_id` bigint(20) unsigned
,`descripcion_marca` varchar(255)
,`modelo_id` bigint(20) unsigned
,`descripcion_modelo` varchar(255)
);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_03_04_190000_create_categorias_table', 1),
(10, '2020_03_04_190005_create_subcategoria_table', 1),
(11, '2020_03_04_190006_create_articulos_table', 1),
(12, '2020_03_04_190007_create_marcas_table', 1),
(13, '2020_03_04_190008_create_modelos_table', 1),
(14, '2020_03_04_190010_create_productos_table', 1),
(15, '2020_03_05_003009_create_ventas_table', 1),
(16, '2020_03_05_003110_create_producto_vendidos_table', 1),
(17, '2020_03_10_014423_create_clientes_table', 1),
(18, '2020_03_10_023628_agregar_id_cliente_ventas', 1),
(19, '2021_10_09_090820_create_historico_productos_table', 2),
(20, '2021_10_09_104554_create_historico_productos_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `marca_id`, `descripcion_modelo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nokia Lumia1', '2021-10-07 19:39:02', '2021-10-07 19:39:02'),
(2, 2, 'Blu g5', '2021-10-07 19:39:12', '2021-10-07 19:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `modelo_id` bigint(20) UNSIGNED NOT NULL,
  `codigo_barras` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_compra` decimal(9,2) NOT NULL,
  `precio_venta` decimal(9,2) NOT NULL,
  `cantidad_base` int(11) NOT NULL,
  `existencia_agregar` int(11) NOT NULL,
  `existencia_actual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `articulo_id`, `modelo_id`, `codigo_barras`, `descripcion`, `precio_compra`, `precio_venta`, `cantidad_base`, `existencia_agregar`, `existencia_actual`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'abcdf', 'bateria blu g 5', '5.00', '10.00', 20, 5, 13, '2021-10-08 16:36:06', '2021-10-14 13:00:04'),
(5, 1, 1, '6161943025530', 'Bateria Nokia Lumia', '5.00', '10.00', 12, 3, 9, '2021-10-09 12:08:00', '2021-10-14 12:55:04'),
(7, 1, 1, '6168310e8c995', 'nokia lumia 5', '5.00', '10.00', 8, 3, 8, '2021-10-14 12:30:54', '2021-10-14 12:31:16');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `productos_articulos_marcas_modelos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `productos_articulos_marcas_modelos` (
`marca_id` bigint(20) unsigned
,`descripcion_marca` varchar(255)
,`modelo_id` bigint(20) unsigned
,`descripcion_modelo` varchar(255)
,`articulo_id` bigint(20) unsigned
,`descripcion_articulo` varchar(255)
,`producto_id` bigint(20) unsigned
,`descripcion` varchar(255)
,`precio_compra` decimal(9,2)
,`precio_venta` decimal(9,2)
,`cantidad_base` int(11)
,`existencia_agregar` int(11)
,`existencia_actual` int(11)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barras` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `cantidad` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id`, `id_venta`, `descripcion`, `codigo_barras`, `precio`, `cantidad`, `created_at`, `updated_at`) VALUES
(5, 10, 'bateria blu g 5', 'abcdf', '10.00', '3.00', '2021-10-09 11:58:33', '2021-10-09 11:58:33'),
(6, 11, 'bateria blu g 5', 'abcdf', '10.00', '2.00', '2021-10-09 12:09:57', '2021-10-09 12:09:57'),
(7, 11, 'Bateria Nokia Lumia', '6161943025530', '10.00', '2.00', '2021-10-09 12:09:57', '2021-10-09 12:09:57'),
(8, 12, 'bateria blu g 5', 'abcdf', '10.00', '1.00', '2021-10-14 12:52:27', '2021-10-14 12:52:27'),
(9, 13, 'Bateria Nokia Lumia', '6161943025530', '10.00', '1.00', '2021-10-14 12:55:04', '2021-10-14 12:55:04'),
(10, 14, 'bateria blu g 5', 'abcdf', '10.00', '1.00', '2021-10-14 13:00:04', '2021-10-14 13:00:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'usuario', 'usuario@gmail.com', NULL, '$2y$10$RTWZEB6BJBAcBpcn4v3RhOkw47sjBuPM4TpLNaZkg5nrP7qG9O5nG', NULL, '2021-10-07 19:32:06', '2021-10-14 13:03:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `created_at`, `updated_at`, `id_cliente`) VALUES
(9, '2021-10-09 11:57:50', '2021-10-09 11:57:50', 1),
(10, '2021-10-09 11:58:33', '2021-10-09 11:58:33', 1),
(11, '2021-10-09 12:09:57', '2021-10-09 12:09:57', 1),
(12, '2021-10-14 12:52:27', '2021-10-14 12:52:27', 1),
(13, '2021-10-14 12:55:04', '2021-10-14 12:55:04', 1),
(14, '2021-10-14 13:00:03', '2021-10-14 13:00:03', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_hitorico_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_hitorico_productos` (
`marca_id` bigint(20) unsigned
,`descripcion_marca` varchar(255)
,`modelo_id` bigint(20) unsigned
,`descripcion_modelo` varchar(255)
,`articulo_id` bigint(20) unsigned
,`descripcion_articulo` varchar(255)
,`producto_id` bigint(20) unsigned
,`descripcion` varchar(255)
,`precio_compra` decimal(8,2)
,`precio_venta` decimal(8,2)
,`cantidad_base` int(11)
,`existencia_agregar` int(11)
,`existencia_actual` int(11)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Estructura para la vista `marcas_modelos`
--
DROP TABLE IF EXISTS `marcas_modelos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marcas_modelos`  AS SELECT `a`.`id` AS `marca_id`, `a`.`descripcion_marca` AS `descripcion_marca`, `b`.`id` AS `modelo_id`, `b`.`descripcion_modelo` AS `descripcion_modelo` FROM (`marcas` `a` join `modelos` `b`) WHERE `a`.`id` = `b`.`marca_id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `productos_articulos_marcas_modelos`
--
DROP TABLE IF EXISTS `productos_articulos_marcas_modelos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productos_articulos_marcas_modelos`  AS SELECT `a`.`marca_id` AS `marca_id`, `a`.`descripcion_marca` AS `descripcion_marca`, `a`.`modelo_id` AS `modelo_id`, `a`.`descripcion_modelo` AS `descripcion_modelo`, `b`.`id` AS `articulo_id`, `b`.`descripcion_articulo` AS `descripcion_articulo`, `c`.`id` AS `producto_id`, `c`.`descripcion` AS `descripcion`, `c`.`precio_compra` AS `precio_compra`, `c`.`precio_venta` AS `precio_venta`, `c`.`cantidad_base` AS `cantidad_base`, `c`.`existencia_agregar` AS `existencia_agregar`, `c`.`existencia_actual` AS `existencia_actual`, `c`.`created_at` AS `created_at`, `c`.`updated_at` AS `updated_at` FROM ((`marcas_modelos` `a` join `articulos` `b`) join `productos` `c`) WHERE `a`.`modelo_id` = `c`.`modelo_id` AND `b`.`id` = `c`.`articulo_id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_hitorico_productos`
--
DROP TABLE IF EXISTS `view_hitorico_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hitorico_productos`  AS SELECT `b`.`marca_id` AS `marca_id`, `b`.`descripcion_marca` AS `descripcion_marca`, `b`.`modelo_id` AS `modelo_id`, `b`.`descripcion_modelo` AS `descripcion_modelo`, `b`.`articulo_id` AS `articulo_id`, `b`.`descripcion_articulo` AS `descripcion_articulo`, `a`.`producto_id` AS `producto_id`, `a`.`descripcion` AS `descripcion`, `a`.`precio_compra` AS `precio_compra`, `a`.`precio_venta` AS `precio_venta`, `a`.`cantidad_base` AS `cantidad_base`, `a`.`existencia_agregar` AS `existencia_agregar`, `a`.`existencia_actual` AS `existencia_actual`, `a`.`created_at` AS `created_at`, `a`.`updated_at` AS `updated_at` FROM (`historico_productos` `a` join `productos_articulos_marcas_modelos` `b`) WHERE `a`.`producto_id` = `b`.`producto_id` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico_productos`
--
ALTER TABLE `historico_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historico_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelos_marca_id_foreign` (`marca_id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_articulo_id_foreign` (`articulo_id`),
  ADD KEY `productos_modelo_id_foreign` (`modelo_id`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_vendidos_id_venta_foreign` (`id_venta`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_id_cliente_foreign` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historico_productos`
--
ALTER TABLE `historico_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historico_productos`
--
ALTER TABLE `historico_productos`
  ADD CONSTRAINT `historico_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_id_venta_foreign` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
