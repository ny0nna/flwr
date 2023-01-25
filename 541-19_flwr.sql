-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 25 2023 г., 13:27
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `541-19_flwr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `cat`) VALUES
(1, 'Цветы'),
(2, 'Упаковка'),
(3, 'Дополнительно');

-- --------------------------------------------------------

--
-- Структура таблицы `chart`
--

CREATE TABLE `chart` (
  `id_chart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `chart`
--

INSERT INTO `chart` (`id_chart`, `id_user`, `id_prod`, `count`) VALUES
(16, 9, 8, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_chart` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Новый','Подтвержден','Удален') DEFAULT 'Новый',
  `reason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_order`, `id_chart`, `id_user`, `id_prod`, `count`, `time`, `status`, `reason`) VALUES
(5, NULL, 8, 6, 10, '2023-01-25 10:03:32', 'Новый', NULL),
(6, NULL, 8, 7, 127, '2023-01-25 10:03:32', 'Новый', NULL),
(7, NULL, 8, 8, 1, '2023-01-25 10:03:32', 'Новый', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `prod`
--

CREATE TABLE `prod` (
  `id_prod` int(11) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `count` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `prod`
--

INSERT INTO `prod` (`id_prod`, `photo`, `name`, `count`, `price`, `country`, `id_cat`, `color`, `time`) VALUES
(6, '/productImage/_j1j1VloSGBMXCIhX56ikhyg3OjFOFDQr5yx4rFOCpgOAWZH_C.png', 'fds', 39, 1000000, 'ru', 1, 'gray', '2023-01-19 13:04:00'),
(7, '/productImage/E7FFi44kUer5bEzMOPPVzYSSQeX4j0gGaNEDD-TXTUhWrhl_Jw.png', 'консерва летающая', 1228, 0, 'тейват', 3, 'непонятно', '2023-01-13 13:04:00'),
(8, '/productImage/Ws8JR4S4ezKQjdGjo1rdEg6aqDJwoNhW66yWXFDtZCWGb7XvT1.png', 'что тут??', 163, 10, 'не знаю', 3, 'черный', '2023-01-13 13:04:00'),
(9, '/productImage/P31aQ86lF8dprSuaTqSQDjV2S_-K0Dj-3BKgyUGAKj-4pIMYbp.jpg', 'посмотрим', 4, 1502, 'раша', 2, 'белый', '2023-01-13 13:04:00'),
(10, '/productImage/j-7IzpNO2KLh3P8LsB_tIkvINzCpLwXaXaTLHzd2lRMMv932RR.jpg', 'Admin', 1, 1200, 'Republic of Belarus', 3, 'Green', '2023-01-13 13:04:00'),
(11, '/productImage/qcTz_J3vTB0e4RDfGcojlMxjEDIxUCk-ee7hfMRBzdfpd5L-dB.jpg', 'фффф', 12, 120, 'хз', 3, 'не знаю', '2023-01-15 09:12:12');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `is_admin`) VALUES
(2, 'Яна', 'КириченкААА', 'Никалавна', 'yanaaa', 'podksjofhisish@gmail.com', 'sdfghghfds', 0),
(3, 'фывывпыав', 'ывпатьпоа', 'выпаптвчимявсы', 'ngdbgrdfbgn ', 'fgnfbdzfb@dvjkzflvdf.ru', '12345', 0),
(7, 'Михаил Петр', 'Иванов-Петров', 'Александрович', 'onigiri31', 'makisaki@sushi.poel', 'makimaki', 1),
(8, 'очень', 'тестовый', 'вариант', 'test', 'test@test.test', '11111', 0),
(9, 'Хью', 'Джекман', 'Тярентьевич', 'Wolverine', 'big.fut@yahoo.com', '20cFox', 0),
(10, 'Билли', 'Хэрингтон', 'Миллиганович', 'Boss', 'boss@gym.net', 'fuckyou', 0),
(11, 'Ван', 'Дарк', 'Холл', 'Dmaster', 'Dungeon@master.ru', 'fucking_cumming', 0),
(12, 'вапр', 'рпа', 'ывапр', 'testFFF', 'sdf@dsf.asdf', 'fuck_you', 0),
(13, 'ываит', 'ывапрь', 'ывапро', 'testAAAA', 'zaebalo@dsfgh.rtygh', 'fuck_you', 0),
(14, 'Гав', 'Кит', 'Котович', 'wuf', 'makisaki@sushi.neel', 'fuck_you', 0),
(15, 'Админ', 'Админович', '', 'admin', 'root@pkgh.edu', 'admin', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id_chart`),
  ADD KEY `id_user` (`id_user`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_chart` (`id_chart`),
  ADD KEY `id_user` (`id_user`,`id_prod`,`count`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Индексы таблицы `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_cat_2` (`id_cat`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`,`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `chart`
--
ALTER TABLE `chart`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `prod`
--
ALTER TABLE `prod`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chart`
--
ALTER TABLE `chart`
  ADD CONSTRAINT `chart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chart_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `prod` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_chart`) REFERENCES `chart` (`id_chart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `prod` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `prod`
--
ALTER TABLE `prod`
  ADD CONSTRAINT `prod_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
