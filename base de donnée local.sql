-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 25 oct. 2019 à 11:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `freenote`
--
CREATE DATABASE IF NOT EXISTS `freenote` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `freenote`;

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
CREATE TABLE IF NOT EXISTS `discussion` (
  `iddiscussion` int(11) NOT NULL AUTO_INCREMENT,
  `statutdiscussion` tinyint(1) NOT NULL,
  `titre` varchar(30) NOT NULL,
  PRIMARY KEY (`iddiscussion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `discussion`
--

INSERT INTO `discussion` (`iddiscussion`, `statutdiscussion`, `titre`) VALUES
(1, 1, 'test titre discussion'),
(6, 1, 'Projet Pigeon'),
(7, 1, 'L\'amour pour les nuls'),
(8, 0, 'kayakayak'),
(9, 1, 'Hello World');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idmessage` int(11) NOT NULL AUTO_INCREMENT,
  `iddiscussion` int(11) NOT NULL,
  `statutmessage` tinyint(1) NOT NULL,
  PRIMARY KEY (`idmessage`),
  KEY `iddisc` (`iddiscussion`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idmessage`, `iddiscussion`, `statutmessage`) VALUES
(1, 9, 1),
(2, 8, 0),
(3, 8, 1),
(4, 7, 1),
(5, 7, 1),
(6, 7, 1),
(7, 7, 1),
(11, 7, 1),
(12, 6, 1),
(13, 6, 1),
(14, 6, 1),
(15, 1, 1),
(16, 1, 0),
(18, 1, 1),
(34, 1, 0),
(35, 1, 0),
(36, 1, 0),
(37, 1, 0),
(38, 1, 1),
(39, 1, 1),
(40, 1, 1),
(41, 1, 1),
(42, 1, 1),
(43, 1, 1),
(44, 1, 1),
(45, 1, 1),
(46, 1, 1),
(47, 1, 1),
(48, 1, 1),
(49, 1, 1),
(50, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mot`
--

DROP TABLE IF EXISTS `mot`;
CREATE TABLE IF NOT EXISTS `mot` (
  `idmot` int(11) NOT NULL AUTO_INCREMENT,
  `idmessage` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `valeur` varchar(53) NOT NULL,
  PRIMARY KEY (`idmot`),
  KEY `idmsg` (`idmessage`),
  KEY `idutil` (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mot`
--

INSERT INTO `mot` (`idmot`, `idmessage`, `idutilisateur`, `valeur`) VALUES
(1, 1, 1, 'Hello world.'),
(2, 2, 2, 'Kayak a'),
(3, 2, 5, 'l\'envers'),
(4, 2, 3, 'ça fait'),
(5, 2, 2, 'kayak'),
(6, 3, 4, 'bob'),
(7, 4, 1, 'Il faut'),
(8, 4, 2, 'aimer'),
(9, 5, 1, 'toujours plus'),
(10, 5, 2, 'que plus'),
(11, 6, 1, 'pour aimer'),
(12, 7, 2, 'l\'amour'),
(13, 12, 4, 'Vive'),
(14, 12, 3, 'cocalc !'),
(15, 13, 4, 'qui ram'),
(16, 13, 5, 'bcp'),
(17, 14, 2, 'Le plus'),
(18, 15, 3, 'test'),
(19, 16, 4, 'test'),
(20, 16, 5, 'test'),
(21, 16, 1, 'autre test'),
(22, 16, 1, 'encore'),
(23, 16, 1, 'hello'),
(24, 16, 1, 'retsetostas'),
(25, 16, 1, 'lalalaalialoum'),
(26, 18, 1, 'lala'),
(27, 34, 1, 'lalalilalol'),
(28, 39, 4, 'lol'),
(29, 40, 1, 'hellloo'),
(30, 40, 1, 'hello ?'),
(31, 41, 1, '15'),
(32, 42, 1, 'test2'),
(33, 43, 1, 'lalala'),
(34, 44, 1, 'lolilol'),
(35, 44, 4, 'prout'),
(36, 45, 2, 'lolilol'),
(37, 45, 1, 'lalalala dz'),
(38, 46, 1, 'lala oh'),
(39, 46, 1, 'lala oh'),
(40, 47, 1, 'mot test'),
(41, 48, 1, 'z'),
(42, 49, 1, 'grevre vre'),
(43, 50, 1, 'cafÃ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(32) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `mdp`, `pseudo`, `mail`, `role`) VALUES
(1, 'd2104a400c7f629a197f33bb33fe80c0', 'hugo', 'hugo.levet42130@gmail.com', 'admin'),
(2, '4d77b0730f40bfb58fc477c876b898e4', 'hugopasnice', 'unmail@mail.com', 'membre'),
(3, '7d4ef62de50874a4db33e6da3ff79f75', 'bryan', 'unmail2@mail.com', 'membre'),
(4, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@admin.admin', 'admin'),
(5, 'ba3c971546abf11316b978de63dd1b2b', 'noé', 'leagueoflegende@tournois.fr', 'membre'),
(6, 'b15ab3f829f0f897fe507ef548741afb', 'vincent', 'jesuis20100@arobase.point', 'membre'),
(7, 'e10adc3949ba59abbe56e057f20f883e', 'hugobis', 'hugo@hugo.fr', 'membre');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`iddiscussion`) REFERENCES `discussion` (`iddiscussion`);

--
-- Contraintes pour la table `mot`
--
ALTER TABLE `mot`
  ADD CONSTRAINT `mot_ibfk_1` FOREIGN KEY (`idmessage`) REFERENCES `message` (`idmessage`),
  ADD CONSTRAINT `mot_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
