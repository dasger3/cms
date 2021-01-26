-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 25 2020 р., 15:33
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `films`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Жанр', 0, NULL, NULL),
(2, 'Комедия', 1, NULL, NULL),
(3, 'Драма', 1, NULL, NULL),
(4, 'Триллеры', 1, NULL, NULL),
(5, 'Короткометражки', 2, NULL, NULL),
(6, 'Мелодрамы', 3, NULL, NULL),
(7, 'Ужастики', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `category_page`
--

CREATE TABLE `category_page` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `alias_of_category` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `category_page`
--

INSERT INTO `category_page` (`id`, `page_id`, `category_id`, `alias_of_category`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4, NULL, NULL),
(2, 2, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_28_110734_create_roles_table', 1),
(4, '2020_09_28_110958_create_role_user_table', 1),
(5, '2020_09_28_174854_create_pages_table', 1),
(6, '2020_10_13_200845_create_categories_table', 1),
(7, '2020_11_23_213508_create_category_page_table', 1),
(8, '2020_11_24_142454_add_categorry_id_pages_table', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categorry_id` int(10) UNSIGNED DEFAULT NULL,
  `alias_of` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `path`, `title`, `main_content`, `director`, `created_at`, `updated_at`, `categorry_id`, `alias_of`) VALUES
(1, 'game', 'Игры разума', 'От всемирной известности до греховных глубин - все это познал на своей шкуре Джон Форбс Нэш-младший. Математический гений, он на заре своей карьеры сделал титаническую работу в области теории игр, которая практически перевернула этот раздел математики и практически принесла ему международную известность. Однако буквально в то же время заносчивый и пользующийся успехом у женщин Нэш получает удар, который переворачивает уже его собственную жизнь - врачи ставят ему диагноз \"параноидная шизофрения\". Лишь после долгих лет борьбы ему удается победить свой недуг и наконец получить заслуженную Нобелевскую премию.', 'Рон Ховард', '2020-12-24 11:16:40', '2020-12-25 11:16:40', 7, NULL),
(2, 'lastChristmas', 'Рождество на двоих', 'Кейт работает в рождественском магазине, злоупотребляет алкоголем, не имеет постоянного дома и страдает от одиночества. Все меняется после встречи с Томом, который кажется ей мужчиной мечты.\r\n\r\nКейт, она же Катарина, когда-то жила в Югославии, откуда с родителями сбежала в Лондон. Здесь девушка мечтала стать известной певицей, но карьера не сложилась. Теперь она трудится эльфом в круглогодичном магазине рождественских товаров, бегает на неудачные прослушивания, напивается в барах и спит с разными мужчинами. У Кейт даже нет своего дома, так как соседка не выдержала ее поведения и выгнала. Девушке приходится вернуться к родителям, где не дает покоя гиперзаботливая мама. Более того, недавно героиня перенесла операцию по пересадке сердца, но совсем не следит за своим здоровьем.', 'Пол Фиг', '2020-12-18 11:16:40', '2020-12-25 11:16:40', 6, NULL),
(3, 'game_copy', '', '', '', NULL, NULL, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'author', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 3, 3, NULL, NULL),
(5, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
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
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$g085zGLYSp2GocwRlPyUpOMMokrLNH/OzXF30qgFJSlVlZoDDg4Ju', 'y2TW886OsIfsK4oSVIWzB3HkSAJwYoyxIyx2jGRhsZXyiP8IxAyJg9WgNmLV', '2020-12-25 09:06:13', '2020-12-25 09:06:13'),
(2, 'Author', 'author@author.com', NULL, '$2y$10$V/qP7IEk4XfsWQ0JBrCzlua6BkCkeM6rWaq6xSlRXc63sGKh40KtK', NULL, '2020-12-25 09:09:44', '2020-12-25 09:09:44'),
(3, 'User', 'user@user.com', NULL, '$2y$10$Nqq3UT0/jzmyjtAtV7Ye2ua8qE3ARM8oJYsLEnFW/51gyX2KF6f5m', NULL, '2020-12-25 09:10:47', '2020-12-25 09:10:47'),
(4, 'Alex', 'alex@gmail.com', NULL, '$2y$10$CjkMEGeNJk71Bmd1.ke54.kEB8sCMRh6PtSFrKLEf0SSFCkhQHowe', NULL, '2020-12-25 12:24:58', '2020-12-25 12:24:58');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `category_page`
--
ALTER TABLE `category_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_page_page_id_foreign` (`page_id`),
  ADD KEY `category_page_category_id_foreign` (`category_id`),
  ADD KEY `category_page_alias_of_category_foreign` (`alias_of_category`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_categorry_id_foreign` (`categorry_id`),
  ADD KEY `pages_alias_of_foreign` (`alias_of`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `category_page`
--
ALTER TABLE `category_page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `category_page`
--
ALTER TABLE `category_page`
  ADD CONSTRAINT `category_page_alias_of_category_foreign` FOREIGN KEY (`alias_of_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_page_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_page_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_alias_of_foreign` FOREIGN KEY (`alias_of`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_categorry_id_foreign` FOREIGN KEY (`categorry_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
