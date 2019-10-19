-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 19 oct. 2019 à 06:03
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idmessage`, `iddiscussion`, `statutmessage`) VALUES
(1, 9, 1),
(2, 8, 0),
(3, 8, 0),
(4, 7, 0),
(5, 7, 0),
(6, 7, 0),
(7, 7, 0),
(11, 7, 1),
(12, 6, 0),
(13, 6, 0),
(14, 6, 1),
(15, 1, 0),
(16, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

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
(20, 16, 5, 'test');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `mdp`, `pseudo`, `mail`, `role`) VALUES
(1, '', 'hugo', 'hugo.levet42130@gmail.com', 'admin'),
(2, '', 'hugopasnice', 'unmail@mail.com', 'membre'),
(3, '', 'bryan', 'unmail2@mail.com', 'membre'),
(4, '', 'admin', 'admin@admin.admin', 'admin'),
(5, '', 'noé', 'leagueoflegende@tournois.fr', 'membre'),
(6, '', 'vincent', 'jesuis20100@arobase.point', 'membre');

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
