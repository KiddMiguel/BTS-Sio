-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 fév. 2022 à 10:58
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `service`
--

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `etat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `nom`, `etat`) VALUES
(1, 'Reproduction graph', 'En cours'),
(2, 'Problème de connexion', 'En attente'),
(3, 'Développement de la page personnelle', 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `travailleurs`
--

DROP TABLE IF EXISTS `travailleurs`;
CREATE TABLE IF NOT EXISTS `travailleurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travailleurs`
--

INSERT INTO `travailleurs` (`id`, `nom`, `prenom`, `e-mail`, `mdp`, `Pseudo`) VALUES
(1, 'Kidd', 'Miguel', 'kiddmiguel@mail.com', 'Kidd', 'kidd'),
(10, 'Kidimba', 'Miguel', 'Kidimbamiguel@gmail.com', 'AZERT', 'kidd2'),
(11, 'siassia dekamo', 'serdy adam', 'adamdekamo@gmail.com', 'azert', 'godson');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
