
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 20 2017 г., 06:16
-- Версия сервера: 10.0.28-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u583616364_kurs`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `mess`
--

INSERT INTO `mess` (`id`, `id_user`, `topic`, `mess`, `d`) VALUES
(19, 39, 'Это опять я', 'Второе сообщение от того же самого юзера. Проверка!', '2016-05-29 08:01:05'),
(17, 39, 'Hello', 'Hello Everybody!', '2016-05-29 07:57:54'),
(18, 40, 'TEST', 'Сообщение на русском языке.', '2016-05-29 08:00:07'),
(16, 38, 'Тема 1', 'У данного пользователя нет фотографии. В данной гостевой книге можно использовать в качестве аватарки картинки следующих форматов: jpg, jpeg, gif', '2016-05-29 07:55:38'),
(15, 37, 'My thema. Моя тема', 'My first message. Моё первое сообщение.', '2016-05-29 07:52:26'),
(20, 41, 'упсс', ' Привет всем)', '2016-05-29 11:15:20');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `email`, `pic`) VALUES
(40, 'Рыжий', 'riz', '5ff2aedbccf86eda8bb9338f86b1c308', 'mymail@gmail.com', 'pic/1464508750.jpg'),
(39, 'Man GIF', 'gifka', '8b67e127f0da74d4da6fcb371f73c7a2', 'test@mail.ru', 'pic/1464508638.gif'),
(37, 'Ivanov Иван Ivanovich', 'ivan', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'test@mail.ru', 'pic/1464508303.jpg'),
(38, 'Юзер Без Фотки', 'user', 'ccc73e18345b3f6aa97100fbc61fc5e1', 'test@mail.ru', 'nopicture'),
(41, 'Olivia', 'olivia', '47bc17dc1a2f164967f55325d866c75c', 'umer92@mail.ru', 'pic/1464520486.jpg'),
(49, 'AlyceLexBN', 'AlyceLex', '32f26dcc4bfe0b1168973ae1df53382e', 'bufyn@veinard.ru', 'nopicture');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
