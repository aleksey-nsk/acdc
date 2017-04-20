-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 29 2016 г., 07:00
-- Версия сервера: 5.1.51-community
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mess`
--

CREATE TABLE IF NOT EXISTS `mess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `topic` text NOT NULL,
  `mess` text NOT NULL,
  `d` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `mess`
--

INSERT INTO `mess` (`id`, `id_user`, `topic`, `mess`, `d`) VALUES
(13, 39, 'The first message', 'Hello. This is my first message.', '2016-05-29 06:45:25'),
(14, 40, 'My tema', 'My message', '2016-05-29 06:47:32'),
(15, 41, 'Im new user', 'You can sign with ava, or without ava.', '2016-05-29 06:50:11'),
(16, 42, 'Types of pictures', 'Hello. You can use pictures of these types: jpg, jpeg and gif', '2016-05-29 06:54:02'),
(17, 43, 'My ava', 'My ava is GIF-picture!', '2016-05-29 06:56:54'),
(18, 44, 'Great site!', 'Hello people! I like this site!', '2016-05-29 06:59:08');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `pic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `email`, `pic`) VALUES
(39, 'Ivanov Ivan Ivanovich', 'ivan', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'test@mail.ru', 'pic/php2A7A1464504270.jpg'),
(40, 'Sidorov Sidor', 'sidor', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'test@mail.ru', 'pic/php60861464504415.jpg'),
(41, 'User WithoutAva', 'user', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'test@mail.ru', 'nopicture'),
(42, 'Sergey S', 'serg', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'test@mail.ru', 'pic/phpF4E01464504780.jpeg'),
(43, 'Man GIF', 'gifka', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'mail@gmail.com', 'pic/phpEA721464504974.gif'),
(44, 'Stepan', 'step', 'b79310c35ff2f5101d5b942de0738d6c', 'mail@gmail.com', 'pic/phpEDF51464505106.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
