-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2019 г., 00:42
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bool_bool`
--

-- --------------------------------------------------------

--
-- Структура таблицы `book_a_table`
--

CREATE TABLE `book_a_table` (
  `heading` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_a_table`
--

INSERT INTO `book_a_table` (`heading`, `description`, `locale`) VALUES
('Book a table 1', '<p>Message to us via <span style=\"color:#1ebea5\">WhatsApp </span>to make reservation</p>', 'az'),
('ru Book a table', '<p>ru Message to us via <span style=\"color:#1ebea5\">WhatsApp </span>to make reservation</p>', 'ru'),
('en Book a table', '<p>en Message to us via <span style=\"color:#1ebea5\">WhatsApp </span>to make reservation</p>', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `heading` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`heading`, `description`, `locale`) VALUES
('Contacts', '<p><strong>Stay in touch, be a friend with us is something holy.</strong></p>\r\n\r\n<p>It&rsquo;s not about nutrients and calories.</p>\r\n\r\n<p>It&rsquo;s about sharing. It&rsquo;s about honesty.</p>', 'az'),
('ru Contacts', '<p><strong>ru Stay in touch, be a friend with us is something holy.</strong></p>\r\n\r\n<p>It&rsquo;s not about nutrients and calories.</p>\r\n\r\n<p>It&rsquo;s about sharing. It&rsquo;s about honesty.</p>', 'ru'),
('en Contacts', '<p><strong>en Stay in touch, be a friend with us is something holy.</strong></p>\r\n\r\n<p>It&rsquo;s not about nutrients and calories.</p>\r\n\r\n<p>It&rsquo;s about sharing. It&rsquo;s about honesty.</p>', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `header`
--

CREATE TABLE `header` (
  `heading` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(30) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `header`
--

INSERT INTO `header` (`heading`, `description`, `button_text`, `locale`) VALUES
('az Baku\'s first & only Mixology & Gastro Bar', 'az Легкая атмосфера, европейская и азиатская кухня', 'az make reservation', 'az'),
('ru Baku\'s first & only Mixology & Gastro Bar', 'ru Легкая атмосфера, европейская и азиатская кухня1', 'ru make reservation', 'ru'),
('en Baku\'s first & only Mixology & Gastro Bar 1 1', 'en Легкая атмосфера, европейская и азиатская кухня', 'en make reservation 1 1', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `instagram_feed_main`
--

CREATE TABLE `instagram_feed_main` (
  `heading` varchar(50) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `instagram_feed_main`
--

INSERT INTO `instagram_feed_main` (`heading`, `locale`) VALUES
('Instagram feed', 'az'),
('ru Instagram feed 1', 'ru'),
('en Instagram feed', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `locale` varchar(2) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `locale`, `image`) VALUES
(1, 'az', 'az.png'),
(2, 'ru', 'ru.png'),
(3, 'en', 'gb.png');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_categories`
--

INSERT INTO `menu_categories` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_category_translations`
--

CREATE TABLE `menu_category_translations` (
  `menu_category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_category_translations`
--

INSERT INTO `menu_category_translations` (`menu_category_id`, `name`, `locale`) VALUES
(1, 'Yemək 1', 'az'),
(1, 'ru Yemək', 'ru'),
(1, 'en Yemək', 'en'),
(2, 'Alkoqolsuz', 'az'),
(2, 'ru Alkoqolsuz', 'ru'),
(2, 'en Alkoqolsuz', 'en'),
(3, 'Alkoqollu', 'az'),
(3, 'ru Alkoqollu', 'ru'),
(3, 'en Alkoqollu', 'en'),
(4, 'Qəlyanlar', 'az'),
(4, 'ru Qəlyanlar', 'ru'),
(4, 'en Qəlyanlar', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_dishes`
--

CREATE TABLE `menu_dishes` (
  `id` int(11) NOT NULL,
  `menu_category_id` int(11) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_dishes`
--

INSERT INTO `menu_dishes` (`id`, `menu_category_id`, `price`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1200),
(6, 3, 1200),
(7, 4, 1200),
(8, 4, 1200),
(9, 1, 3),
(10, 1, 4),
(11, 1, 5),
(12, 1, 6),
(13, 2, 3),
(14, 2, 4),
(15, 2, 5),
(16, 2, 6),
(17, 2, 7),
(18, 2, 8),
(19, 2, 9),
(22, 1, 12211);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_dish_translations`
--

CREATE TABLE `menu_dish_translations` (
  `menu_dish_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_dish_translations`
--

INSERT INTO `menu_dish_translations` (`menu_dish_id`, `name`, `description`, `locale`) VALUES
(1, 'Klab sendviç1', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik1', 'az'),
(1, 'Klab sendviç1ru', 'ru Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik1', 'ru'),
(1, 'Klab sendviç1en', 'enToyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik1', 'en'),
(2, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(2, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(2, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(3, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(3, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(3, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(4, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(4, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(4, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(5, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(5, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(5, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(6, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(6, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(6, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(7, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(7, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(7, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(8, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(8, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(8, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(9, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(9, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(9, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(10, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(10, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(10, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(11, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(11, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(11, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(12, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(12, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(12, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(13, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(13, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(13, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(14, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(14, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(14, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(15, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(15, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(15, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(16, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(16, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(16, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(17, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(17, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(17, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(18, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(18, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(18, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(19, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'az'),
(19, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'ru'),
(19, 'Klab sendviç', 'Toyuq, yumurta, xiyar, pomidor, aysberq salatı, xardallı mayonez, quakamole sousu və sous klassik', 'en'),
(22, 'asdasdsada', 'asdasdsada', 'az'),
(22, '12323231', 'test ru up desc', 'ru'),
(22, 'asdasdsad', 'asdasdsad', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_main`
--

CREATE TABLE `menu_main` (
  `heading` varchar(30) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_main`
--

INSERT INTO `menu_main` (`heading`, `locale`) VALUES
('Menu 1', 'az'),
('ru Menu', 'ru'),
('en Menu', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `meta_tags`
--

CREATE TABLE `meta_tags` (
  `title` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_tags`
--

INSERT INTO `meta_tags` (`title`, `description`, `keywords`, `locale`) VALUES
('title1', 'description', 'keywords', 'az'),
('ru title1', 'ru description', 'ru keywords1 1 1', 'ru'),
('en title', 'en description1', 'en keywords', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `moments_images`
--

CREATE TABLE `moments_images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `moments_images`
--

INSERT INTO `moments_images` (`id`, `image_name`) VALUES
(1, 'grid_item_1.png'),
(2, 'grid_item_2.png'),
(3, 'grid_item_3.png'),
(4, 'grid_item_4.png'),
(5, 'grid_item_6.png'),
(6, 'grid_item_8.png'),
(7, 'grid_item_9.png'),
(8, 'grid_item_5.png'),
(9, 'grid_item_7.png');

-- --------------------------------------------------------

--
-- Структура таблицы `moments_main`
--

CREATE TABLE `moments_main` (
  `heading` varchar(30) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `moments_main`
--

INSERT INTO `moments_main` (`heading`, `locale`) VALUES
('Moments', 'az'),
('ru Moments', 'ru'),
('en Moments', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `our_story_images`
--

CREATE TABLE `our_story_images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `our_story_images`
--

INSERT INTO `our_story_images` (`id`, `image_name`) VALUES
(1, 'story_1.png'),
(2, 'story_1.png'),
(3, 'story_1.png'),
(4, 'story_1.png'),
(5, 'story_1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `our_story_main`
--

CREATE TABLE `our_story_main` (
  `heading` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `our_story_main`
--

INSERT INTO `our_story_main` (`heading`, `text`, `locale`) VALUES
('Our story', 'Food, in the end, in our own tradition, is something holy. It’s not about nutrients and calories. It’s about sharing. It’s about honesty. It’s about identity. Cras sed felis eget velit aliquet.', 'az'),
('ru Our story', 'ru Food, in the end, in our own tradition, is something holy. It’s not about nutrients and calories. It’s about sharing. It’s about honesty. It’s about identity. Cras sed felis eget velit aliquet. 2', 'ru'),
('en Our story 1', 'en Food, in the end, in our own tradition, is something holy. It’s not about nutrients and calories. It’s about sharing. It’s about honesty. It’s about identity. Cras sed felis eget velit aliquet.', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `phone` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `facebook_link` varchar(150) NOT NULL,
  `instagram_page_name` varchar(150) NOT NULL,
  `whatsapp_link` varchar(150) NOT NULL,
  `map_latitude` double NOT NULL,
  `map_longitude` double NOT NULL,
  `map_zoom` int(5) NOT NULL,
  `instagram_feed_count_of_lasts` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`phone`, `address`, `facebook_link`, `instagram_page_name`, `whatsapp_link`, `map_latitude`, `map_longitude`, `map_zoom`, `instagram_feed_count_of_lasts`) VALUES
('+994 55 814 41 91', 'Xocalı pr-ti., 14', 'https://www.facebook.com/pages/Bool-Bool-Dog/1883872428348784', 'boolbooldog', 'https://wa.me/994514222262', 40.3817537, 49.8663641, 16, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'selavi', '$2y$10$zqVfSa3yiWKXABpbRONcv.kRJc/YXC3BAe3hNq.Cbe3a9eB87pMyS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_dishes`
--
ALTER TABLE `menu_dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moments_images`
--
ALTER TABLE `moments_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `our_story_images`
--
ALTER TABLE `our_story_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `menu_dishes`
--
ALTER TABLE `menu_dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `moments_images`
--
ALTER TABLE `moments_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `our_story_images`
--
ALTER TABLE `our_story_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
