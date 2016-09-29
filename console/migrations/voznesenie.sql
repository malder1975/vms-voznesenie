-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2016 г., 10:24
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `voznesenie`
--
CREATE DATABASE IF NOT EXISTS `voznesenie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `voznesenie`;

-- --------------------------------------------------------

--
-- Структура таблицы `vms_mainmenu`
--

CREATE TABLE IF NOT EXISTS `vms_mainmenu` (
  `id` int(11) NOT NULL,
  `menutype_id` int(11) DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vms_mainmenu`
--

INSERT INTO `vms_mainmenu` (`id`, `menutype_id`, `parent_id`, `name`, `link`, `visible`, `title`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'О нас', '', 1, 'О ВМС Вознесение', NULL, NULL, 4294967295, 4294967295),
(2, 1, 0, 'Услуги', '', 1, 'Наши услуги', NULL, NULL, 4294967295, 4294967295),
(6, 2, 0, 'Памятники', NULL, 1, NULL, NULL, NULL, 4294967295, 4294967295),
(7, 3, 0, 'Каталог', NULL, 1, 'Каталог продукции', NULL, NULL, 4294967295, 4294967295),
(8, 3, 0, 'Контакты', NULL, 1, 'Наши контакты', NULL, NULL, 4294967295, 4294967295),
(9, 1, 1, 'История', NULL, 1, NULL, NULL, NULL, 4294967295, 4294967295),
(10, 1, 1, 'Советы потребителям', NULL, 1, NULL, NULL, NULL, 0, 0),
(11, 1, 1, 'Гарантия', NULL, 1, NULL, NULL, NULL, 0, 0),
(12, 1, 1, 'Отзывы', NULL, 1, NULL, NULL, NULL, 0, 0),
(13, 2, 0, 'Оградки, скамейки, столики', NULL, 1, NULL, NULL, NULL, 0, 0),
(14, 2, 0, 'Гравировка', NULL, 1, NULL, NULL, NULL, 0, 0),
(15, 2, 0, 'Эпитафии', NULL, 1, NULL, NULL, NULL, 0, 0),
(16, 2, 0, 'Наши работы', NULL, 1, NULL, NULL, NULL, 0, 0),
(17, 2, 6, 'Гранитные', NULL, 1, NULL, NULL, NULL, 0, 0),
(18, 2, 6, 'Мраморные', NULL, 1, NULL, NULL, NULL, 0, 0),
(19, 2, 6, 'Полимер-гранит', NULL, 1, NULL, NULL, NULL, 0, 0),
(20, 2, 17, 'Горизонтальные', NULL, 1, NULL, NULL, NULL, 0, 0),
(21, 2, 17, 'Вертикальные', NULL, 1, NULL, NULL, NULL, 0, 0),
(22, 2, 18, 'Горизонтальные', NULL, 1, NULL, NULL, NULL, 0, 0),
(23, 2, 18, 'Вертикальные', NULL, 1, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `vms_menutypes`
--

CREATE TABLE IF NOT EXISTS `vms_menutypes` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vms_menutypes`
--

INSERT INTO `vms_menutypes` (`id`, `type`) VALUES
(1, 'Верхнее левое'),
(2, 'Категории'),
(3, 'Верхнее правое');

-- --------------------------------------------------------

--
-- Структура таблицы `vms_migration`
--

CREATE TABLE IF NOT EXISTS `vms_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vms_migration`
--

INSERT INTO `vms_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1472646310),
('m130524_201442_init', 1472646314),
('m160909_070548_mainmenu_table', 1473409333);

-- --------------------------------------------------------

--
-- Структура таблицы `vms_user`
--

CREATE TABLE IF NOT EXISTS `vms_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `vms_mainmenu`
--
ALTER TABLE `vms_mainmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mainmenu_menutype` (`menutype_id`);

--
-- Индексы таблицы `vms_menutypes`
--
ALTER TABLE `vms_menutypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vms_migration`
--
ALTER TABLE `vms_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `vms_user`
--
ALTER TABLE `vms_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `vms_mainmenu`
--
ALTER TABLE `vms_mainmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `vms_menutypes`
--
ALTER TABLE `vms_menutypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `vms_user`
--
ALTER TABLE `vms_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `vms_mainmenu`
--
ALTER TABLE `vms_mainmenu`
  ADD CONSTRAINT `fk_mainmenu_menutype` FOREIGN KEY (`menutype_id`) REFERENCES `vms_menutypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
