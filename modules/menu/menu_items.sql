-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 16 Kwi 2011, 20:09
-- Wersja serwera: 5.5.8
-- Wersja PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `heta`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `classes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `menu_items`
--

INSERT INTO `menu_items` (`id`, `parent_id`, `url`, `title`, `classes`) VALUES
(1, 0, 'http://www.google.pl', 'Google', ''),
(2, 0, 'http://www.interia.pl', 'Interia', ''),
(3, 0, 'http://www.wykop.pl', 'Wykop', 'dog cat'),
(4, 1, 'www.allegro.pl', 'Allegro', ''),
(5, 1, 'www.kohanaframework.org', 'Kohana', '');
