-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 28 mai 2019 à 17:26
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbacters`
--

-- --------------------------------------------------------

--
-- Structure de la table `acters`
--

DROP TABLE IF EXISTS `acters`;
CREATE TABLE IF NOT EXISTS `acters` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pseudoname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `system` varchar(255) DEFAULT NULL,
  `viewpoint` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `connect` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acters`
--

INSERT INTO `acters` (`id`, `email`, `pseudoname`, `password`, `system`, `viewpoint`, `model`, `connect`) VALUES
(7, 'xxx@gmail.com', 'xxx', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', 'a', 'a', 'a', 1),
(8, 'xyz@gmail.com', 'xyz', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'b', 'b', 'b', 1),
(10, 'zzz@gmail.com', 'xyz', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'b', 'b', 'b', 1),
(11, 'asmae@gmail.com', 'asmae', 'b1017ab1177d72528be39841a24e2f9f459b2b36', 'c', 'c', 'c', 1),
(12, 'hafsa@gmail.com', 'hafsa', '0a51752a41491c29c1ccc4c4e9f92aa0e2af45b4', 'c', 'a', 'c', 1),
(9, 'ihssane', 'ihssan@gmail.com', ' b1017ab1177d72528be39841a24e2f9f459b2b36', 'd', 'd', 'd', 0),
(13, 'mama@gmail.com', 'mama', '5a804c9b9f803c4151f358d67cc0d69552373a44', 'a', 'a', 'a', 0),
(14, 'baba@gmail.com', 'baba', '2065e4ce7877897f83529126aae1cc59a142ed94', 'b', 'b', 'b', 0),
(16, 'admin@gmail.com', 'Admin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'c', 'c', 'c', 1);

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE IF NOT EXISTS `list` (
  `id_proposal` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `proposal` varchar(355) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `acter` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_proposal`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `list`
--

INSERT INTO `list` (`id_proposal`, `id`, `proposal`, `description`, `status`, `acter`) VALUES
(21, 14, 'ExerciceTD 2.pdf', 'uploads/5ced4e1e4b6284.26000144.pdf', 'statut1', 'acter1'),
(17, 14, '2017.pdf', 'uploads/5ced49d9b94e81.10640033.pdf', 'statut1', 'acter1'),
(14, 13, '2017.pdf', 'uploads/5ced443d221ef9.67495606.pdf', 'statut1', 'acter1'),
(15, 13, 'ECO-TD-MicMac-converted.pdf', 'uploads/5ced44692f4206.21320507.pdf', 'statut1', 'acter1'),
(16, 13, 'Ex1-exam-bdd-2018-v.-AE.pdf', 'uploads/5ced4586770fe4.14322642.pdf', 'statut1', 'acter1');

-- --------------------------------------------------------

--
-- Structure de la table `users_chat`
--

DROP TABLE IF EXISTS `users_chat`;
CREATE TABLE IF NOT EXISTS `users_chat` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_username` varchar(100) DEFAULT NULL,
  `receiver_username` varchar(100) DEFAULT NULL,
  `msg_content` varchar(255) DEFAULT NULL,
  `msg_status` text,
  `msg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(108, 'mama', 'xxx', 'ca va ?', 'unread', '2019-05-27 05:48:57'),
(107, 'mama', 'xxx', 'hi', 'unread', '2019-05-27 05:48:52'),
(106, 'mama', 'baba', 'haha', 'unread', '2019-05-26 23:38:08'),
(105, 'mama', 'baba', 'lwalid', 'unread', '2019-05-26 23:38:00'),
(104, 'mama', 'baba', 'salam', 'unread', '2019-05-26 23:37:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
