-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 21 mars 2019 à 15:18
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_user`
--

DROP TABLE IF EXISTS `chat_user`;
CREATE TABLE IF NOT EXISTS `chat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_user`
--

INSERT INTO `chat_user` (`id`, `name`, `firstname`, `pseudo`, `password`, `email`, `color`) VALUES
(1, 'richard', 'dupuis', 'richardD', '25f9e794323b453885f5181f1b624d0b', 'fffffff@ffff.ff', 'red'),
(2, 'giulia', 'zimpa', 'giuliaZ', '25f9e794323b453885f5181f1b624d0b', 'bbbbbbbbb@bbbb.bb', 'blue'),
(3, 'leo', 'leGrand', 'leoL', '25f9e794323b453885f5181f1b624d0b', 'leo.leGrand@gmail.com', 'green');

-- --------------------------------------------------------

--
-- Structure de la table `fractest`
--

DROP TABLE IF EXISTS `fractest`;
CREATE TABLE IF NOT EXISTS `fractest` (
  `c1` time(2) DEFAULT NULL,
  `c2` datetime(2) DEFAULT NULL,
  `c3` timestamp(2) NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fractest`
--

INSERT INTO `fractest` (`c1`, `c2`, `c3`) VALUES
('17:51:04.78', '2018-09-08 17:51:04.78', '2018-09-08 15:51:04.78');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=374 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `content`, `user_id`, `time`) VALUES
(204, 'f', 1, '2019-03-20 20:06:31.176'),
(202, 'ffff', 1, '2019-03-20 15:29:01.000'),
(203, 'fffff', 1, '2019-03-20 15:29:29.000'),
(201, 'fff', 1, '2019-03-20 15:29:01.000'),
(373, 'hey', 2, '2019-03-21 11:42:00.386'),
(372, 'hey', 2, '2019-03-21 11:41:56.832'),
(371, 'sam', 2, '2019-03-21 11:39:37.596'),
(370, 'sss', 1, '2019-03-21 11:37:38.445'),
(369, 'ss', 1, '2019-03-21 11:22:35.678'),
(368, 'last date', 1, '2019-03-21 11:16:18.790'),
(367, 'kkkk', 1, '2019-03-21 11:10:12.540'),
(366, 'jj', 1, '2019-03-21 11:10:09.797'),
(365, 'jj', 1, '2019-03-21 11:09:51.640'),
(364, 'test', 1, '2019-03-21 00:52:15.260'),
(363, 'sdsd', 1, '2019-03-21 00:52:12.660'),
(362, 'sdsd', 1, '2019-03-21 00:52:11.710'),
(361, 'test', 1, '2019-03-20 23:44:31.247'),
(360, 'f', 1, '2019-03-20 23:44:25.443'),
(359, 'f', 1, '2019-03-20 23:44:25.790'),
(358, 'f', 1, '2019-03-20 23:44:24.616'),
(357, 'f', 1, '2019-03-20 23:44:24.137'),
(356, 'f', 1, '2019-03-20 23:44:23.632'),
(355, 'f', 1, '2019-03-20 23:44:23.142'),
(354, 'f', 1, '2019-03-20 23:44:22.630'),
(353, 'f', 1, '2019-03-20 23:44:21.987'),
(352, 'f', 1, '2019-03-20 23:44:21.364'),
(351, 's', 1, '2019-03-20 23:44:19.730'),
(350, 's', 1, '2019-03-20 23:44:19.350'),
(349, 's', 1, '2019-03-20 23:44:19.960'),
(348, 'ss', 1, '2019-03-20 23:44:18.822'),
(347, 's', 1, '2019-03-20 23:44:18.586'),
(346, 's', 1, '2019-03-20 23:44:18.269'),
(345, 'sam', 1, '2019-03-20 23:44:14.695');

-- --------------------------------------------------------

--
-- Structure de la table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d1` datetime DEFAULT NULL,
  `d2` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
