-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbl_group`;
CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_group` (`id`, `title`, `description`, `year`) VALUES
(1,	'ИС-10Т',	'Интеллектуальные системы',	2010);

DROP TABLE IF EXISTS `tbl_lesson`;
CREATE TABLE `tbl_lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `classroom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('lecture','practice') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_lesson` (`id`, `title`, `description`, `classroom`, `type`) VALUES
(1,	'ИСПР (практика)',	'Интеллектуальные системы принятия решений',	'2432',	'practice'),
(2,	'Оптимизация (лекция)',	'Оптимизация',	'2415',	'lecture'),
(3,	'АМУЕР (лекция)',	'АМУЕР',	'6208',	'lecture'),
(4,	'ПРУК (лекция)',	'ПРУК',	'6208',	'lecture'),
(5,	'ИСФБД (лекция)',	'ИСФБД',	'6206',	'lecture'),
(6,	'СМППС (лекция)',	'СМППС',	'2217',	'lecture'),
(7,	'АМУЕР (практика)',	'АМУЕР',	'2415',	'practice'),
(8,	'УИР (практика)',	'УИР',	'2430',	'practice'),
(9,	'ПРУРС (практика)',	'ПРУРС',	'2432',	'practice'),
(10,	'ИСФБД (практика)',	'ИСФБД',	'2430',	'practice'),
(11,	'Ин. яз.',	'Иностранный язык',	'1210',	'lecture'),
(12,	'СМППС (практика)',	'СМППС',	'2219',	'practice'),
(13,	'Оптимизация (практика)',	'Оптимизация',	'2415',	'practice'),
(14,	'ПРУК (практика)',	'ПРУК',	'2415',	'practice'),
(15,	'ПРУРС (лекция)',	'ПРУРС',	'2415',	'lecture'),
(16,	'УИР (лекция)',	'УИР',	'2415',	'lecture');

DROP TABLE IF EXISTS `tbl_relation`;
CREATE TABLE `tbl_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `lesson_number` enum('first','second','third','fourth','fifth') COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trimester` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `classroom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `day_of_week` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') COLLATE utf8_unicode_ci NOT NULL,
  `week_type` enum('even','odd','both') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'both',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_relation` (`id`, `lesson_id`, `lesson_number`, `group_id`, `user_id`, `trimester`, `classroom`, `day_of_week`, `week_type`) VALUES
(1,	2,	'first',	1,	23,	'1',	'2',	'monday',	'both'),
(2,	3,	'second',	1,	23,	'1',	'3',	'monday',	'both'),
(3,	4,	'third',	1,	23,	'1',	'3',	'monday',	'both'),
(4,	13,	'first',	1,	23,	'1',	'2',	'tuesday',	'odd'),
(5,	14,	'first',	1,	23,	'1',	'2',	'tuesday',	'even'),
(6,	5,	'second',	1,	23,	'1',	'5',	'tuesday',	'both'),
(7,	6,	'third',	1,	23,	'1',	'6',	'tuesday',	'both'),
(8,	7,	'fourth',	1,	23,	'1',	'2',	'tuesday',	'odd'),
(9,	8,	'fourth',	1,	23,	'1',	'8',	'tuesday',	'even'),
(10,	10,	'first',	1,	23,	'1',	'8',	'wednesday',	'odd'),
(11,	9,	'first',	1,	23,	'1',	'1',	'wednesday',	'even'),
(12,	15,	'second',	1,	23,	'1',	'2',	'wednesday',	'both'),
(13,	16,	'third',	1,	23,	'1',	'2',	'wednesday',	'both'),
(14,	11,	'third',	1,	23,	'1',	'11',	'thursday',	'both'),
(15,	12,	'fourth',	1,	23,	'1',	'12',	'thursday',	'even');

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('student','teacher') COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) unsigned zerofill NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `role`, `phone`, `name`, `surname`, `last_name`) VALUES
(1,	'test1',	'pass1',	'test1@example.com',	'',	0000000000,	'',	'',	''),
(2,	'test2',	'pass2',	'test2@example.com',	'',	0000000000,	'',	'',	''),
(3,	'test3',	'pass3',	'test3@example.com',	'',	0000000000,	'',	'',	''),
(4,	'test4',	'pass4',	'test4@example.com',	'',	0000000000,	'',	'',	''),
(5,	'test5',	'pass5',	'test5@example.com',	'',	0000000000,	'',	'',	''),
(6,	'test6',	'pass6',	'test6@example.com',	'',	0000000000,	'',	'',	''),
(7,	'test7',	'pass7',	'test7@example.com',	'',	0000000000,	'',	'',	''),
(8,	'test8',	'pass8',	'test8@example.com',	'',	0000000000,	'',	'',	''),
(9,	'test9',	'pass9',	'test9@example.com',	'',	0000000000,	'',	'',	''),
(10,	'test10',	'pass10',	'test10@example.com',	'',	0000000000,	'',	'',	''),
(11,	'test11',	'pass11',	'test11@example.com',	'',	0000000000,	'',	'',	''),
(12,	'test12',	'pass12',	'test12@example.com',	'',	0000000000,	'',	'',	''),
(13,	'test13',	'pass13',	'test13@example.com',	'',	0000000000,	'',	'',	''),
(14,	'test14',	'pass14',	'test14@example.com',	'',	0000000000,	'',	'',	''),
(15,	'test15',	'pass15',	'test15@example.com',	'',	0000000000,	'',	'',	''),
(16,	'test16',	'pass16',	'test16@example.com',	'',	0000000000,	'',	'',	''),
(17,	'test17',	'pass17',	'test17@example.com',	'',	0000000000,	'',	'',	''),
(18,	'test18',	'pass18',	'test18@example.com',	'',	0000000000,	'',	'',	''),
(19,	'test19',	'pass19',	'test19@example.com',	'',	0000000000,	'',	'',	''),
(20,	'test20',	'pass20',	'test20@example.com',	'',	0000000000,	'',	'',	''),
(21,	'test21',	'pass21',	'test21@example.com',	'',	0000000000,	'',	'',	''),
(22,	'student',	'111111',	'student@example.com',	'student',	0509379992,	'Иван',	'Иванович',	'Иванов'),
(23,	'olkhovskaya',	'111111',	'olkhovskaya@example.com',	'teacher',	0501234567,	'Оксана',	'Леонидовна',	'Ольховская');

-- 2015-05-31 20:17:29
