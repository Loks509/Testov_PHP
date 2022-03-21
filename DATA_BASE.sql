-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: sql313.epizy.com
-- Время создания: Мар 21 2022 г., 05:50
-- Версия сервера: 10.3.27-MariaDB
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `epiz_31319235_PSU`
--

-- --------------------------------------------------------

--
-- Структура таблицы `shedule`
--

CREATE TABLE `shedule` (
  `id` int(11) NOT NULL,
  `id_subject` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shedule`
--

INSERT INTO `shedule` (`id`, `id_subject`, `date`) VALUES
(1, 2, '2022-03-16 21:33:00'),
(2, 4, '2022-03-09 21:40:00'),
(3, 5, '2022-03-24 21:47:00'),
(4, 4, '2022-03-10 09:10:00'),
(5, 6, '2022-03-09 07:20:00'),
(6, 7, '2022-03-12 14:23:00'),
(7, 5, '2022-03-28 01:38:00'),
(8, 1, '2022-03-23 02:40:00'),
(9, 7, '2022-03-01 09:50:00'),
(10, 7, '2022-03-09 14:06:00'),
(11, 5, '2022-03-31 09:50:00'),
(12, 6, '2022-03-04 15:40:00');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `code` char(10) DEFAULT NULL,
  `title` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id`, `code`, `title`) VALUES
(1, '18ВФ1', 'Фунд мат и мех'),
(2, '19вм1', 'описание спец 19вм1'),
(3, '19ВФ1', 'новая специальность 19вф1');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `title` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `title`) VALUES
(1, 'Алгебра'),
(6, 'Биология'),
(5, 'Геометрия'),
(3, 'История'),
(4, 'Обществознание'),
(7, 'Русский язык'),
(2, 'Физика');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_to_specialities`
--

CREATE TABLE `subjects_to_specialities` (
  `id` int(11) NOT NULL,
  `id_speciality` int(11) DEFAULT NULL,
  `id_subject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects_to_specialities`
--

INSERT INTO `subjects_to_specialities` (`id`, `id_speciality`, `id_subject`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 1, 2),
(4, 3, 4),
(5, 3, 6),
(6, 3, 7),
(7, 2, 2),
(8, 2, 3),
(9, 2, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Индексы таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_speciality` (`id_speciality`),
  ADD KEY `id_subject` (`id_subject`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shedule`
--
ALTER TABLE `shedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `shedule`
--
ALTER TABLE `shedule`
  ADD CONSTRAINT `shedule_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`);

--
-- Ограничения внешнего ключа таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  ADD CONSTRAINT `subjects_to_specialities_ibfk_1` FOREIGN KEY (`id_speciality`) REFERENCES `specialities` (`id`),
  ADD CONSTRAINT `subjects_to_specialities_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
