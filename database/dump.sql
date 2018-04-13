CREATE TABLE `author` (
  `id` integer primary key AUTOINCREMENT,
  `name` varchar(30) NOT NULL
);

INSERT INTO `author` (`id`, `name`) VALUES (1,	'Hergé');
INSERT INTO `author` (`id`, `name`) VALUES (2,	'Lucas');

CREATE TABLE `book` (
  `id` integer primary key AUTOINCREMENT,
  `name` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `author_id` integer NOT NULL
 );

INSERT INTO `book` (`id`, `name`, `user_id`, `author_id`) VALUES (1,	'Tintin au tibet',	'1',	1);
INSERT INTO `book` (`id`, `name`, `user_id`, `author_id`) VALUES (2,	'L''Oreille cassée',	'1',	1);
INSERT INTO `book` (`id`, `name`, `user_id`, `author_id`) VALUES (3,	'Star wars 4',	'2',	2);
INSERT INTO `book` (`id`, `name`, `user_id`, `author_id`) VALUES (4,	'Star wars 5',	'2',	2);
INSERT INTO `book` (`id`, `name`, `user_id`, `author_id`) VALUES (5,	'Star wars 6',	'2',	2);

CREATE TABLE `user` (
  `id` integer primary key AUTOINCREMENT,
  `uuid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL
);

INSERT INTO `user` (`id`, `uuid`, `name`) VALUES (1,	'uuid-1',	'Sylvain');
INSERT INTO `user` (`id`, `uuid`, `name`) VALUES (2,	'uuid-2',	'François');

-- 2018-03-31 16:34:24
