-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mars 2019 à 16:06
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
-- Structure de la table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `channel`
--

INSERT INTO `channel` (`id`, `title`, `description`) VALUES
(1, 'mon premier channel', 'test 1'),
(2, 'mon deuxième channel', 'test 2'),
(1000, 'SERONT AFFICHE ICI', 'Tous les messages');

-- --------------------------------------------------------

--
-- Structure de la table `channel_user`
--

DROP TABLE IF EXISTS `channel_user`;
CREATE TABLE IF NOT EXISTS `channel_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `channel_user`
--

INSERT INTO `channel_user` (`id`, `id_user`, `id_channel`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 2, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_user`
--

INSERT INTO `chat_user` (`id`, `name`, `firstname`, `pseudo`, `password`, `email`, `color`) VALUES
(1, 'richard', 'dupuis', 'richardD', '25f9e794323b453885f5181f1b624d0b', 'fffffff@ffff.ff', 'red'),
(2, 'giulia', 'zimpa', 'giuliaZ', '25f9e794323b453885f5181f1b624d0b', 'bbbbbbbbb@bbbb.bb', 'blue'),
(3, 'leo', 'leGrand', 'leoL', '25f9e794323b453885f5181f1b624d0b', 'leo.leGrand@gmail.com', 'green'),
(5, 'zoupati', 'clopain', 'zoupatiC', '25f9e794323b453885f5181f1b624d0b', 'zoupati.clopain@mail.fr', 'darkblue'),
(6, 'cloarec', 'samuel', 'samclo', '25f9e794323b453885f5181f1b624d0b', 'samuel.cloarec@hotmail.fr', '#71870a');

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
  `channel_id` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=518 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `content`, `user_id`, `time`, `channel_id`) VALUES
(489, 'eheh', 1, '2019-03-25 11:00:42.550', 1000),
(490, 'channel global', 1, '2019-03-25 11:07:16.271', 1000),
(491, 'channel ^partagé avec giu', 1, '2019-03-25 11:07:25.255', 1),
(488, 'prout', 1, '2019-03-25 10:59:45.353', 1),
(487, 'caca', 1, '2019-03-25 10:59:37.596', 1),
(485, 'caca', 1, '2019-03-25 10:56:47.637', 1000),
(498, 'ca fais longtemp', 2, '2019-03-25 11:30:38.689', 2),
(497, 'He leo', 2, '2019-03-25 11:30:34.998', 2),
(482, 'sam', 1, '2019-03-25 10:22:06.900', 1),
(500, 'je suis léo ', 3, '2019-03-25 11:31:32.372', 1000),
(499, 'hey giu ca vas et toi ?', 3, '2019-03-25 11:31:21.840', 2),
(493, 'blue my bitch', 5, '2019-03-25 11:28:54.613', 1000),
(492, 'waaa', 5, '2019-03-25 11:28:45.684', 1000),
(496, 'how are you ?', 2, '2019-03-25 11:30:27.710', 1),
(495, 'hey richard', 2, '2019-03-25 11:30:21.751', 1),
(494, 'wesh c\'est giu', 2, '2019-03-25 11:30:12.241', 1000),
(501, 'khjhkj', 1, '2019-03-25 11:44:42.550', 1000),
(502, 'date', 1, '2019-03-25 12:50:31.922', 1000),
(503, 's', 1, '2019-03-25 12:50:40.647', 1000),
(504, 's', 1, '2019-03-25 12:50:40.770', 1000),
(505, 's', 1, '2019-03-25 12:50:41.490', 1000),
(506, 's', 1, '2019-03-25 12:50:41.161', 1000),
(507, 's', 1, '2019-03-25 12:50:41.420', 1000),
(508, 's', 1, '2019-03-25 12:50:41.533', 1000),
(509, 'zzzzz', 1, '2019-03-25 13:27:16.930', 1000),
(510, 'sam', 1, '2019-03-25 13:48:47.860', 1000),
(511, 'sam', 6, '2019-03-25 15:53:45.346', 1000),
(512, 'sam', 6, '2019-03-25 15:53:49.994', 1000),
(513, 'sam', 6, '2019-03-25 15:53:56.310', 1000),
(514, 'sam', 6, '2019-03-25 15:54:26.655', 1000),
(515, 'sam', 2, '2019-03-25 16:03:07.966', 1),
(516, 'sam', 2, '2019-03-25 16:03:11.619', 2),
(517, 'iugiyg', 1, '2019-03-25 16:07:16.271', 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
