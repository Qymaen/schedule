
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 20 2015 г., 20:08
-- Версия сервера: 5.1.66
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u498654078_sched`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_consultation`
--

CREATE TABLE IF NOT EXISTS `tbl_consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `starttime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `checkpoint` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tbl_consultation`
--

INSERT INTO `tbl_consultation` (`id`, `surname`, `name`, `last_name`, `group_id`, `starttime`, `user_id`, `lesson_id`, `checkpoint`) VALUES
(1, 'Пальнова', 'Юлия', 'Андреевна', 1, '2015-06-13 10:15:00', 41, 5, 'control_work'),
(2, 'Иванов', 'Иван', 'Иванович', 6, '2015-06-10 22:20:00', 38, 34, 'independent_work'),
(3, 'Иванова', 'Инна', 'Николаевна', 5, '2015-06-01 10:30:00', 29, 60, 'essay'),
(4, 'Иванова', 'Инна', 'Николаевна', 5, '2015-06-18 15:05:00', 29, 60, 'essay');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_delivery`
--

CREATE TABLE IF NOT EXISTS `tbl_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_diploma`
--

CREATE TABLE IF NOT EXISTS `tbl_diploma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `starttime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `diploma_direction_type` enum('web','sppr','is') COLLATE utf8_unicode_ci NOT NULL,
  `rating` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `tbl_diploma`
--

INSERT INTO `tbl_diploma` (`id`, `surname`, `name`, `last_name`, `group_id`, `starttime`, `user_id`, `diploma_direction_type`, `rating`) VALUES
(1, 'Раскольников', 'Радион', 'Романович', 5, '2015-06-17 10:00:00', 38, 'web', 100),
(2, 'Иванов', 'Иван', 'Иванович', 3, '2015-06-16 11:30:00', 36, 'sppr', 82),
(3, 'Петров', 'Петр', 'Петрович', 6, '2015-06-18 17:30:00', 54, 'is', 76),
(4, 'Сидоров', 'Сидор', 'Сидорович', 4, '2015-06-19 10:30:00', 49, 'web', 84),
(5, 'Федоров', 'Федор', 'Федорович', 1, '2015-06-24 09:30:00', 40, 'sppr', 95),
(6, 'Ибрагимов', 'Ибрагим', 'Ибрагимович', 2, '2015-06-30 11:30:00', 37, 'is', 70),
(7, 'Емельяненко', 'Емеля', 'Емельевич', 3, '2014-06-18 12:00:00', 28, 'web', 86),
(8, 'Иванова', 'Инна', 'Николаевна', 5, '2015-06-18 10:30:00', 38, 'web', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_group`
--

CREATE TABLE IF NOT EXISTS `tbl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `title`, `description`, `year`) VALUES
(1, 'ИС-10Т', 'Интеллектуальные системы', 2010),
(2, 'ЛТ-14т', 'Литейное производство ', 2014),
(3, '1ЗВ-14', 'Сварочное производство', 2014),
(4, '1ТОР-12', 'Техническое обслуживание и ремонт обуродования предприятий машиностроения', 2012),
(5, '1РПЗ-11', 'Разработка программного обеспечния', 2011),
(6, '1ЛВ-13', 'Литейное производство ', 2013);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_lesson`
--

CREATE TABLE IF NOT EXISTS `tbl_lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `classroom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('lecture','practice') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=68 ;

--
-- Дамп данных таблицы `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`id`, `title`, `description`, `classroom`, `type`) VALUES
(1, 'ИСПР (практика)', 'Интеллектуальные системы принятия решений', '2432', 'practice'),
(2, 'Оптимизация (лекция)', 'Оптимизация', '2415', 'lecture'),
(3, 'АМУЕР (лекция)', 'АМУЕР', '6208', 'lecture'),
(4, 'ПРУК (лекция)', 'ПРУК', '6208', 'lecture'),
(5, 'ИСФБД (лекция)', 'ИСФБД', '6206', 'lecture'),
(6, 'СМППС (лекция)', 'СМППС', '2217', 'lecture'),
(7, 'АМУЕР (практика)', 'АМУЕР', '2415', 'practice'),
(8, 'УИР (практика)', 'УИР', '2430', 'practice'),
(9, 'ПРУРС (практика)', 'ПРУРС', '2432', 'practice'),
(10, 'ИСФБД (практика)', 'ИСФБД', '2430', 'practice'),
(11, 'Ин. яз.', 'Иностранный язык', '1210', 'lecture'),
(12, 'СМППС (практика)', 'СМППС', '2219', 'practice'),
(13, 'Оптимизация (практика)', 'Оптимизация', '2415', 'practice'),
(14, 'ПРУК (практика)', 'ПРУК', '2415', 'practice'),
(15, 'ПРУРС (лекция)', 'ПРУРС', '2415', 'lecture'),
(16, 'УИР (лекция)', 'УИР', '2415', 'lecture'),
(17, 'ТУ', 'Теория управления', '1212', 'lecture'),
(18, 'Физика (лекция)', 'Физика', '209', 'lecture'),
(19, 'ЗО (лекция)', 'Защита оттечества', '106', 'lecture'),
(20, 'Укр.лит. (лекция)', 'Украинская литература ', '107', 'lecture'),
(21, 'Всемирная история (лекция)', 'Всемирная история', '211', 'lecture'),
(22, 'Математика', 'Математика', '405', 'practice'),
(23, 'Ин.яз (практика)', 'Иностранный язык', '407', 'practice'),
(24, 'Физика (практика)', 'Физика', '209', 'practice'),
(25, 'Биология ', 'Биология ', '307', 'lecture'),
(26, 'Физ-ра', 'Физическая культура', 'С3', 'practice'),
(27, 'Математика', 'Математика', '405', 'lecture'),
(28, 'Укр.лит.(практика)', 'Украинская литература ', '107', 'practice'),
(29, 'Химия', 'Химия', '406', 'lecture'),
(30, 'Вс. лит. ', 'Всемирная литература', '222', 'lecture'),
(31, 'Человек и мир', 'Человек и мир', '307', 'lecture'),
(32, 'Укр.яз', 'Украинский язык', '407', 'practice'),
(33, 'Математика', 'Математика', '405', 'lecture'),
(34, 'Информатика (лекция)', 'Информатика', '413', 'lecture'),
(35, 'История Украины', 'История Украины', '411', 'lecture'),
(36, 'МСиАЛ (практика)', 'Металлорежущие станки и автоматические линии', '315', 'practice'),
(37, 'ТМ', 'Техническая механика', '221', 'lecture'),
(38, 'СКДУ', 'Система конструкторской документации Украины', '312', 'lecture'),
(39, 'ООТ', 'Основы охраны труда', '316', 'lecture'),
(40, 'ТОП для ЧПУ (лекция)', 'Технологические основы программирования для станков ЧПУ', '221', 'lecture'),
(41, 'ОУПиМ (лекция)', 'Основы управления производством и менеджмент', '205', 'lecture'),
(42, 'ТО', 'Техническое обслуживание, ремонта и монтаж тех.оборудования', '201', 'lecture'),
(43, 'ОКС', 'Организация компьютерных сетей', '412', 'practice'),
(44, 'ПИ (лекция)', 'Основы программной инженерии', '313', 'lecture'),
(45, 'КГ(практика)', 'Компьютерная графика', '412', 'practice'),
(46, 'Проектный практикум', 'Проектный практикум', '412', 'lecture'),
(47, 'ПИ (практика)', 'Основы программной инженерии', '313', 'lecture'),
(48, 'ВП (лекция)', 'Визуальное прогарммирование', '412', 'lecture'),
(49, 'ВП (практика)', 'Визуальное прогарммирование', '412', 'practice'),
(50, 'КГ(лекция)', 'Компьютерная графика', '412', 'lecture'),
(51, 'ЧМИ (лекция)', 'Человеко-машинный интерфейс', '412', 'lecture'),
(52, 'ОТ ', 'Охрана труда', '411', 'lecture'),
(53, 'ЧМИ (практика)', 'Человеко-машинный интерфейс', '412', 'lecture'),
(54, 'КГ(лекция)', 'Компьютерная графика', '412', 'lecture'),
(55, 'Проектный практикум (практика)', 'Проектный практикум', '414', 'practice'),
(56, 'ОКС (практика)', 'Организация компьютерных сетей', '414', 'practice'),
(57, 'ФХ (лекция)', 'Физическая химия', '406', 'lecture'),
(58, 'Культурология', 'Культурология', '406', 'lecture'),
(59, 'Технология металлов', 'Технология металлов', '206', 'lecture'),
(60, 'ИГ', 'Инженерная графика', '401', 'lecture'),
(61, 'ВМ', 'Высшая математика', '405', 'practice'),
(62, 'ИГ (практика)', 'Инженерная графика', '406', 'practice'),
(63, 'ТМ', 'Техническая механика', '315', 'lecture'),
(64, 'ФХ (практика)', 'Физическая химия', '406', 'lecture'),
(65, 'ОСМС', 'Основы стандартизации метрологии и сертификации ', '304', 'lecture'),
(66, 'ИВТ', 'Информатика и вычислительная техника', '413', 'lecture'),
(67, 'Электротехника (лекция)', 'Электротехника', '209', 'lecture');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_relation`
--

CREATE TABLE IF NOT EXISTS `tbl_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `lesson_number` enum('first','second','third','fourth','fifth') COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trimester` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `classroom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `day_of_week` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') COLLATE utf8_unicode_ci NOT NULL,
  `week_type` enum('even','odd','both') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'both',
  `schedule_type` enum('study','session','consultation') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'study',
  `session_type` enum('exam','offset','') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=106 ;

--
-- Дамп данных таблицы `tbl_relation`
--

INSERT INTO `tbl_relation` (`id`, `lesson_id`, `lesson_number`, `group_id`, `user_id`, `trimester`, `classroom`, `day_of_week`, `week_type`, `schedule_type`, `session_type`) VALUES
(1, 2, 'first', 1, 23, '1', '2', 'monday', 'both', 'study', NULL),
(2, 3, 'second', 1, 23, '1', '3', 'monday', 'both', 'study', NULL),
(3, 4, 'third', 1, 23, '1', '3', 'monday', 'both', 'study', NULL),
(4, 13, 'first', 1, 23, '1', '2', 'tuesday', 'odd', 'study', NULL),
(5, 14, 'first', 1, 23, '1', '2', 'tuesday', 'even', 'study', NULL),
(6, 5, 'second', 1, 23, '1', '5', 'tuesday', 'both', 'study', NULL),
(7, 6, 'third', 1, 23, '1', '6', 'tuesday', 'both', 'study', NULL),
(8, 7, 'fourth', 1, 23, '1', '2', 'tuesday', 'odd', 'study', NULL),
(9, 8, 'fourth', 1, 23, '1', '8', 'tuesday', 'even', 'study', NULL),
(10, 10, 'first', 1, 23, '1', '8', 'wednesday', 'odd', 'study', NULL),
(11, 9, 'first', 1, 23, '1', '1', 'wednesday', 'even', 'study', NULL),
(12, 15, 'second', 1, 23, '1', '2', 'wednesday', 'both', 'study', NULL),
(13, 16, 'third', 1, 23, '1', '2', 'wednesday', 'both', 'study', NULL),
(14, 11, 'third', 1, 23, '1', '11', 'thursday', 'both', 'study', NULL),
(15, 12, 'fourth', 1, 23, '1', '12', 'thursday', 'even', 'study', NULL),
(16, 17, 'second', 2, 23, '1', '6', 'monday', 'even', 'study', NULL),
(17, 18, 'first', 3, 25, '1', '18', 'monday', 'both', 'study', NULL),
(18, 19, 'second', 3, 26, '1', '19', 'monday', 'both', 'study', NULL),
(19, 20, 'third', 3, 27, '1', '23', 'monday', 'both', 'study', NULL),
(20, 21, 'second', 3, 29, '1', '21', 'tuesday', 'both', 'study', NULL),
(21, 22, 'third', 3, 30, '1', '22', 'tuesday', 'both', 'study', NULL),
(22, 23, 'fourth', 3, 27, '1', '23', 'tuesday', 'both', 'study', NULL),
(23, 24, 'first', 3, 25, '1', '18', 'wednesday', 'even', 'study', NULL),
(24, 25, 'second', 3, 32, '1', '23', 'wednesday', 'both', 'study', NULL),
(25, 26, 'third', 3, 26, '1', '26', 'wednesday', 'both', 'study', NULL),
(26, 22, 'first', 3, 30, '1', '22', 'thursday', 'both', 'study', NULL),
(27, 20, 'second', 3, 27, '1', '23', 'thursday', 'both', 'study', NULL),
(28, 29, 'third', 3, 34, '1', '29', 'thursday', 'both', 'study', NULL),
(29, 30, 'fourth', 3, 35, '1', '30', 'thursday', 'both', 'study', NULL),
(30, 31, 'first', 3, 36, '1', '25', 'friday', 'both', 'study', NULL),
(31, 32, 'first', 3, 28, '1', '23', 'friday', 'both', 'study', NULL),
(32, 32, 'first', 3, 28, '1', '23', 'friday', 'both', 'study', NULL),
(33, 22, 'third', 3, 30, '1', '22', 'friday', 'even', 'study', NULL),
(34, 34, 'third', 3, 37, '1', '34', 'friday', 'odd', 'study', NULL),
(35, 35, 'fourth', 3, 29, '1', '21', 'friday', 'both', 'study', NULL),
(36, 36, 'first', 4, 38, '1', '36', 'monday', 'both', 'study', NULL),
(37, 37, 'second', 4, 38, '1', '37', 'monday', 'both', 'study', NULL),
(38, 38, 'third', 4, 39, '1', '38', 'monday', 'both', 'study', NULL),
(39, 26, 'second', 4, 40, '1', '26', 'tuesday', 'both', 'study', NULL),
(40, 39, 'third', 4, 41, '1', '39', 'tuesday', 'both', 'study', NULL),
(41, 40, 'fourth', 4, 42, '1', '37', 'tuesday', 'both', 'study', NULL),
(42, 36, 'first', 4, 38, '1', '36', 'wednesday', 'both', 'study', NULL),
(43, 37, 'second', 4, 38, '1', '39', 'wednesday', 'both', 'study', NULL),
(44, 41, 'third', 4, 43, '1', '41', 'wednesday', 'both', 'study', NULL),
(45, 36, 'first', 4, 38, '1', '37', 'thursday', 'both', 'study', NULL),
(46, 42, 'second', 4, 44, '1', '42', 'thursday', 'both', 'study', NULL),
(47, 23, 'third', 4, 45, '1', '25', 'thursday', 'both', 'study', NULL),
(48, 36, 'first', 4, 38, '1', '36', 'friday', 'both', 'study', NULL),
(49, 26, 'second', 4, 40, '1', '26', 'friday', 'both', 'study', NULL),
(50, 39, 'second', 4, 41, '1', '36', 'friday', 'both', 'study', NULL),
(51, 41, 'third', 4, 43, '1', '41', 'friday', 'both', 'study', NULL),
(52, 43, 'first', 5, 41, '1', '43', 'monday', 'both', 'study', NULL),
(53, 44, 'second', 5, 47, '1', '44', 'monday', 'both', 'study', NULL),
(54, 50, 'third', 5, 48, '1', '43', 'monday', 'both', 'study', NULL),
(55, 46, 'second', 5, 46, '1', '55', 'tuesday', 'both', 'study', NULL),
(56, 44, 'third', 5, 47, '1', '44', 'tuesday', 'both', 'study', NULL),
(57, 49, 'fourth', 5, 48, '1', '43', 'tuesday', 'both', 'study', NULL),
(58, 50, 'first', 5, 48, '1', '43', 'wednesday', 'both', 'study', NULL),
(59, 51, 'second', 5, 48, '1', '43', 'wednesday', 'both', 'study', NULL),
(60, 52, 'third', 5, 49, '1', '35', 'wednesday', 'both', 'study', NULL),
(61, 49, 'first', 5, 48, '1', '43', 'thursday', 'both', 'study', NULL),
(62, 53, 'second', 5, 48, '1', '43', 'thursday', 'both', 'study', NULL),
(63, 47, 'third', 5, 47, '1', '43', 'thursday', 'both', 'study', NULL),
(64, 45, 'first', 5, 48, '1', '43', 'friday', 'both', 'study', NULL),
(65, 55, 'second', 5, 46, '1', '55', 'friday', 'both', 'study', NULL),
(66, 43, 'third', 5, 46, '1', '55', 'friday', 'both', 'study', NULL),
(67, 57, 'first', 6, 34, '1', '29', 'monday', 'both', 'study', NULL),
(68, 58, 'second', 6, 27, '1', '23', 'monday', 'both', 'study', NULL),
(69, 59, 'third', 6, 50, '1', '59', 'monday', 'both', 'study', NULL),
(70, 60, 'fourth', 6, 51, '1', '60', 'monday', 'both', 'study', NULL),
(71, 61, 'second', 6, 30, '1', '22', 'tuesday', 'both', 'study', NULL),
(72, 62, 'third', 6, 51, '1', '29', 'tuesday', 'both', 'study', NULL),
(73, 37, 'fourth', 6, 52, '1', '36', 'tuesday', 'both', 'study', NULL),
(74, 57, 'first', 6, 34, '1', '29', 'wednesday', 'both', 'study', NULL),
(75, 26, 'second', 6, 53, '1', '26', 'wednesday', 'both', 'study', NULL),
(76, 65, 'third', 6, 41, '1', '65', 'wednesday', 'both', 'study', NULL),
(77, 35, 'fourth', 6, 29, '1', '21', 'wednesday', 'both', 'study', NULL),
(78, 18, 'first', 6, 25, '1', '41', 'thursday', 'both', 'study', NULL),
(79, 23, 'second', 6, 54, '1', '19', 'thursday', 'both', 'study', NULL),
(80, 65, 'third', 6, 41, '1', '65', 'monday', 'even', 'study', NULL),
(81, 61, 'third', 6, 30, '1', '22', 'thursday', 'odd', 'study', NULL),
(82, 66, 'fourth', 6, 37, '1', '34', 'thursday', 'both', 'study', NULL),
(83, 29, 'first', 6, 34, '1', '29', 'friday', 'even', 'study', NULL),
(84, 35, 'first', 6, 29, '1', '21', 'friday', 'odd', 'study', NULL),
(85, 67, 'second', 6, 25, '1', '18', 'friday', 'both', 'study', NULL),
(86, 22, 'third', 6, 55, '1', '35', 'friday', 'both', 'study', NULL),
(87, 32, 'fourth', 6, 28, '1', '23', 'friday', 'both', 'study', NULL),
(88, 7, 'first', 6, 30, '1', '1', 'monday', 'both', 'session', 'exam'),
(89, 61, 'first', 6, 29, '1', '1', 'monday', 'both', 'consultation', ''),
(90, 60, 'second', 5, 38, '1', '36', 'monday', 'both', 'session', 'exam'),
(91, 61, 'first', 5, 28, '1', '19', 'tuesday', 'both', 'session', 'offset'),
(92, 19, 'first', 5, 25, '1', '20', 'wednesday', 'both', 'session', 'exam'),
(93, 2, 'third', 5, 33, '1', '20', 'wednesday', 'both', 'session', 'offset'),
(94, 31, 'first', 5, 37, '2', '20', 'thursday', 'both', 'session', 'offset'),
(97, 19, 'first', 5, 30, '1', '20', 'monday', 'both', 'consultation', ''),
(96, 52, 'first', 5, 50, '1', '65', 'thursday', 'both', 'session', 'offset'),
(98, 60, 'second', 5, 29, '1', '20', 'tuesday', 'both', 'consultation', ''),
(103, 48, 'first', 5, 29, '1', '65', 'tuesday', 'both', 'study', ''),
(100, 52, 'third', 5, 27, '1', '25', 'wednesday', 'both', 'consultation', ''),
(102, 61, 'fourth', 5, 29, '1', '37', 'monday', 'both', 'study', ''),
(104, 49, 'first', 5, 29, '1', '19', 'monday', 'both', 'study', ''),
(105, 60, 'fourth', 5, 29, '1', '21', 'monday', 'both', 'consultation', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('student','teacher') COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) unsigned zerofill NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `role`, `phone`, `name`, `surname`, `last_name`, `group_id`) VALUES
(1, 'test1', 'pass1', 'test1@example.com', 'student', 0501234567, 'Василий', 'Василиевич', 'Василенко', 3),
(2, 'test2', 'pass2', 'test2@example.com', 'student', 0501234567, 'Иван', 'Иванович', 'Иванов', 4),
(3, 'test3', 'pass3', 'test3@example.com', 'student', 0501234567, 'Петр', 'Петрович', 'Петров', 3),
(4, 'test4', 'pass4', 'test4@example.com', 'student', 0501234567, 'Сидор', 'Сидорович', 'Сидоров', 3),
(5, 'test5', 'pass5', 'test5@example.com', 'student', 0501234567, 'Игорь', 'Игоревич', 'Игорько', 3),
(6, 'test6', 'pass6', 'test6@example.com', '', 0000000000, '', '', '', NULL),
(7, 'test7', 'pass7', 'test7@example.com', '', 0000000000, '', '', '', NULL),
(8, 'test8', 'pass8', 'test8@example.com', '', 0000000000, '', '', '', NULL),
(9, 'test9', 'pass9', 'test9@example.com', '', 0000000000, '', '', '', NULL),
(10, 'test10', 'pass10', 'test10@example.com', '', 0000000000, '', '', '', NULL),
(11, 'test11', 'pass11', 'test11@example.com', '', 0000000000, '', '', '', NULL),
(12, 'test12', 'pass12', 'test12@example.com', '', 0000000000, '', '', '', NULL),
(13, 'test13', 'pass13', 'test13@example.com', '', 0000000000, '', '', '', NULL),
(14, 'test14', 'pass14', 'test14@example.com', '', 0000000000, '', '', '', NULL),
(15, 'test15', 'pass15', 'test15@example.com', '', 0000000000, '', '', '', NULL),
(16, 'test16', 'pass16', 'test16@example.com', '', 0000000000, '', '', '', NULL),
(17, 'test17', 'pass17', 'test17@example.com', '', 0000000000, '', '', '', NULL),
(18, 'test18', 'pass18', 'test18@example.com', '', 0000000000, '', '', '', NULL),
(19, 'test19', 'pass19', 'test19@example.com', '', 0000000000, '', '', '', NULL),
(20, 'test20', 'pass20', 'test20@example.com', '', 0000000000, '', '', '', NULL),
(21, 'test21', 'pass21', 'test21@example.com', '', 0000000000, '', '', '', NULL),
(22, 'student', '111111', 'student@example.com', 'student', 0509379992, 'Иван', 'Иванович', 'Иванов', NULL),
(23, 'olkhovskaya', '111111', 'olkhovskaya@example.com', 'teacher', 0501234567, 'Оксана', 'Леонидовна', 'Ольховская', NULL),
(24, 'Julia', '123456', 'Juliara@mail.ru', 'student', 0501234567, 'Юлия', 'Андреевна', 'Хрусталёва', NULL),
(25, 'Kovalehko', '123456', 'Kovalehko@mail.ru', 'teacher', 4294967295, 'Татьяна', 'Ивановна', 'Коваленко', NULL),
(26, 'gena', '123456', 'gena@mail.ru', 'teacher', 4294967295, 'Генадий', 'Борисович', 'Поворознюк', NULL),
(27, 'ira', '123456', 'ira@mail.ru', 'teacher', 4294967295, 'Ирина', 'Владимировна', 'Белоцерковец', NULL),
(28, 'maria', '123456', 'maris@mail.ru', 'teacher', 4294967295, 'Александровна', 'Мария', 'Гашута', NULL),
(29, 'nata', '123456', 'nata@mail.ru', 'teacher', 4294967295, 'Наталия', 'Васильевна', 'Куракина', NULL),
(30, 'sveta', '123456', 'sveta@mail.ru', 'teacher', 4294967295, 'Светлана', 'Николаевна', 'Потапова', NULL),
(31, 'tany', '123456', 'tany@mail.ru', 'teacher', 4294967295, 'Татьяна', 'Ивновна', 'Коваленко', NULL),
(32, 'oly', '123456', 'oly@mail.ru', 'teacher', 4294967295, 'Ольга', 'Васильевна', 'Гречишкина', NULL),
(33, 'oly1', '123456', 'oly1@mail.ru', 'teacher', 4294967295, 'Ольга', 'Андреевна', 'Щербина', NULL),
(34, 'tanyha', '123456', 'tanchik@mail.ru', 'teacher', 4294967295, 'Татьяна', 'Степановна', 'Геращенко', NULL),
(35, 'yna', '123456', 'yna@mail.ru', 'teacher', 4294967295, 'Яна', 'Юрьевна', 'Кобзева', NULL),
(36, 'oly2', '123456', 'oly2@mail.ru', 'teacher', 4294967295, 'Ольга', 'Георгиевна', 'Шишкова', NULL),
(37, 'dima', '123456', 'dima@mail.ru', 'teacher', 4294967295, 'Александрович', 'Дмитрий', 'Кажурин', NULL),
(38, 'natka', '12345', 'natka@mail.ru', 'teacher', 4294967295, 'Наталия', 'Владимировна', 'Ковалёва', NULL),
(39, 'vlady', '123456', 'vlad@mail.ru', 'teacher', 4294967295, 'Владимир', 'Леонидович', 'Безродний', NULL),
(40, 'svetyliy', '123456', 'sveta2mail.ru', 'teacher', 4294967295, 'Светлана', 'Николаевна', 'Хохлова', NULL),
(41, 'vladik', '123456', 'vladik@maik.ru', 'teacher', 4294967295, 'Владимир', 'Леонидович', 'Рогач', NULL),
(42, 'sany', '123456', 'sany@mail.ru', 'teacher', 4294967295, 'Александр', 'Юрьевич', 'Амалицкий', NULL),
(43, 'aly', '123456', 'aly@mail.ru', 'teacher', 4294967295, 'Алёна', 'Владимировна', 'Карпачова', NULL),
(44, 'olka', '123456', 'olly@mail.ru', 'teacher', 4294967295, 'Ольга', 'Владимировна', 'Ищенко', NULL),
(45, 'margo', '123456', 'margo@mail.ru', 'teacher', 4294967295, 'Маргарита ', 'Анатольевна', 'Корсун', NULL),
(46, 'ser', '123456', 'ser@mail.ru', 'teacher', 4294967295, 'Сергей', 'Григорьевич', 'Богач', NULL),
(47, 'jek', '123456', 'jek@mail.ru', 'teacher', 4294967295, 'Евгений', 'Олегович', 'Кривенко', NULL),
(48, 'mary', '123456', 'mary@mail.ru', 'teacher', 4294967295, 'Марина', 'Александровна', 'Павлова', NULL),
(49, 'edy', '123456', 'edy@mail.ru', 'teacher', 4294967295, 'Эдуард', 'Игоревич', 'Миронов', NULL),
(50, 'leha', '123456', 'leha@mail.ru', 'teacher', 4294967295, 'Алексей', 'Алексеевич', 'Файчак', NULL),
(51, 'lenka', '123456', 'lenka@mail.ru', 'teacher', 4294967295, 'Елена', 'Юрьевна', 'Бережная', NULL),
(52, 'yra', '123456', 'yra@mail.ru', 'teacher', 4294967295, 'Юрий', 'Николаевич', 'Ильенко', NULL),
(53, 'mary12', '123456', 'mary12@mail.ru', 'teacher', 4294967295, 'Марина', 'Николаевна', 'Слюсар', NULL),
(54, 'olyk', '123456', 'oly3@mail.ru', 'teacher', 4294967295, 'Ольга', 'Валентиновна', 'Исаева', NULL),
(55, 'setik', '123456', 'setik@mail.ru', 'teacher', 4294967295, 'Светлана', 'Владимировна', 'Богоева', NULL),
(57, 'Inna', '123456', 'inna@mail.ru', 'student', 0509545652, 'Инна', 'Николаевна', 'Иванова', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
