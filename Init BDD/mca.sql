-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 mars 2022 à 15:31
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mca`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- Erreur de lecture des données pour la table mca.blog : #1064 - Erreur de syntaxe près de 'FROM `mca`.`blog`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `photo` blob DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `premium` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `challenge`
--

DROP TABLE IF EXISTS `challenge`;
CREATE TABLE IF NOT EXISTS `challenge` (
  `nom` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sport` varchar(30) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `morphologie` varchar(30) DEFAULT NULL,
  `recompense` int(11) DEFAULT NULL,
  `nbrepetition` int(11) DEFAULT NULL,
  `nbserie` int(11) DEFAULT NULL,
  `tmprepos` int(11) DEFAULT NULL,
  `materiel` varchar(60) DEFAULT NULL,
  `tempsseanceminutes` int(11) DEFAULT NULL,
  `sexe` tinyint(1) DEFAULT NULL,
  `difficulte` int(11) DEFAULT NULL,
  `nbpartenaires` int(11) DEFAULT NULL,
  `domicile` tinyint(1) DEFAULT NULL,
  `recompensexp` int(11) DEFAULT NULL,
  `recompensepiece` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `challenge`
--

INSERT INTO `challenge` (`nom`, `description`, `sport`, `image`, `morphologie`, `recompense`, `nbrepetition`, `nbserie`, `tmprepos`, `materiel`, `tempsseanceminutes`, `sexe`, `difficulte`, `nbpartenaires`, `domicile`, `recompensexp`, `recompensepiece`, `id`) VALUES
('Pompe', 'Faire 150 pompes ! Recompenses 20 points !', 'musculation', '44c9395433b81f88e18b68449775d004', 'endomorphe', NULL, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1),
('Gainage', 'Objectif 3 minutes de gainage ! Recompenses 5 points !', '', '8038c470f0998870be69cf1f88ac0f85', 'endomorphe', NULL, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 5),
('Jump Squat', 'Objectif 150 jump squat ! Recompenses 10 points !', '', '3707fdb58807704226f1ec680148c5cc', 'ectomorphe', NULL, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 2),
('Pompes Diamants', 'Objectif 150 pompes diamants ! Recompenses 15 points !', '', 'c3250869cd96827824135541328115b2', 'ectomorphe', NULL, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 4),
('Abdominaux', 'Objectif faire  200 abdominaux ! Recompenses 15 points !', '', '747da6a4a83e65025f08b1fb099f6c04', '', NULL, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 6);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `nom` varchar(30) DEFAULT NULL,
  `sport` varchar(30) DEFAULT NULL,
  `lieu1` varchar(30) DEFAULT NULL,
  `lieu2` varchar(30) DEFAULT NULL,
  `recompense` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `datedebut` datetime DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `tmprepos` int(11) DEFAULT NULL,
  `materiel` varchar(100) DEFAULT NULL,
  `tempsseanceminutes` int(11) DEFAULT NULL,
  `domicile` tinyint(1) DEFAULT NULL,
  `recompensexp` int(11) DEFAULT NULL,
  `recompensepiece` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `message` text DEFAULT NULL,
  `pseudo` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `passe`
--

DROP TABLE IF EXISTS `passe`;
CREATE TABLE IF NOT EXISTS `passe` (
  `numplier` int(11) DEFAULT NULL,
  `recompense` varchar(100) DEFAULT NULL,
  `recompensepremium` varchar(100) DEFAULT NULL,
  `imagerecompense` blob DEFAULT NULL,
  `imagerecompensepremium` blob DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(20) DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `matieregrasse` int(11) DEFAULT NULL,
  `morphologie` varchar(20) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `avatar` blob DEFAULT NULL,
  `niveauxp` int(11) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `passeachat` tinyint(1) DEFAULT NULL,
  `administrateur` tinyint(1) DEFAULT NULL,
  `equipeSport` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `nom` varchar(35) DEFAULT NULL,
  `prenom` varchar(35) DEFAULT NULL,
  `motdepasse` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
