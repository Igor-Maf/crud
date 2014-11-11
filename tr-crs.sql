-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 06 2014 г., 22:47
-- Версия сервера: 5.5.27
-- Версия PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tr-crs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client_city`
--

CREATE TABLE IF NOT EXISTS `client_city` (
  `client_city_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_city_name` varchar(40) NOT NULL,
  PRIMARY KEY (`client_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `client_city`
--

INSERT INTO `client_city` (`client_city_id`, `client_city_name`) VALUES
(1, 'Одесса'),
(2, 'Измаил'),
(3, 'Николаев'),
(4, 'Кривой Рог'),
(5, 'Львов'),
(6, 'Днепропетровск');

-- --------------------------------------------------------

--
-- Структура таблицы `cont`
--

CREATE TABLE IF NOT EXISTS `cont` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_code` varchar(30) NOT NULL,
  `type_cont_id` int(11) NOT NULL,
  `cont_weight` text NOT NULL,
  `manufact_city_id` int(11) NOT NULL,
  `client_city_id` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `cont`
--

INSERT INTO `cont` (`cont_id`, `cont_code`, `type_cont_id`, `cont_weight`, `manufact_city_id`, `client_city_id`, `date_start`, `date_end`, `store_id`) VALUES
(2, '11-RC-21', 2, 'Дерево', 5, 5, '2014-10-01', '2014-11-21', 1),
(4, '12-МВ-323', 8, 'Мясо', 4, 4, '2014-10-02', '2014-11-22', 2),
(5, '3-RC-23', 2, 'Мебель, посуда', 3, 3, '2014-12-03', '2014-11-23', 4),
(6, '22-МC-329', 6, 'Алмазы', 2, 2, '2014-10-04', '2014-11-24', 9),
(7, '4-PT-2424', 1, 'Ювелирные изделия', 1, 1, '2014-11-05', '2014-11-25', 8),
(8, '13-09Т-02', 8, 'Масло', 1, 6, '2014-11-20', '2014-11-30', 9),
(9, '5-PT-2424', 2, 'Груз', 3, 4, '2014-10-01', '2014-11-07', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `manufact_city`
--

CREATE TABLE IF NOT EXISTS `manufact_city` (
  `manufact_city_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufact_city_name` varchar(30) NOT NULL,
  PRIMARY KEY (`manufact_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `manufact_city`
--

INSERT INTO `manufact_city` (`manufact_city_id`, `manufact_city_name`) VALUES
(1, 'Стамбул'),
(2, 'Люксембург'),
(3, 'Пекин'),
(4, 'Ливерпуль'),
(5, 'Нью-Йорк'),
(7, 'Москва');

-- --------------------------------------------------------

--
-- Структура таблицы `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(30) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `store`
--

INSERT INTO `store` (`store_id`, `store_name`) VALUES
(1, 'Пр. 1, скл. 1.1 (лев.)'),
(2, 'Пр. 1, скл. 1.2 (пр.)'),
(4, 'Пр. 2, скл. 2.1 (лев.)'),
(8, 'Пр. 3, скл. 3.1 (гл.)'),
(9, 'Пр. 2, скл. 2.2 (пр.)'),
(11, 'Пр. 2, скл. 2.4 (пр.)');

-- --------------------------------------------------------

--
-- Структура таблицы `type_cont`
--

CREATE TABLE IF NOT EXISTS `type_cont` (
  `type_cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_cont_name` varchar(40) NOT NULL,
  PRIMARY KEY (`type_cont_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `type_cont`
--

INSERT INTO `type_cont` (`type_cont_id`, `type_cont_name`) VALUES
(1, '20-ти футовый (стандарт)'),
(2, '40-ка футовый (стандартный)'),
(5, '40-ка футовый (Open Top)'),
(6, '20-ти футовый (рефрижераторный)'),
(7, '40-ка футовый (рефрижераторный)'),
(8, '20-ти футовый (герметичный)'),
(9, '20-ти футовый (вентилируемый)'),
(10, '20-ти футовый (для насыпных грузов)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
