-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 19 mai 2022 à 09:42
-- Version du serveur :  10.0.38-MariaDB
-- Version de PHP : 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_PRUVOST`
--

-- --------------------------------------------------------

--
-- Structure de la table `SAE23`
--

CREATE TABLE `SAE23` (
  `ID` int(255) NOT NULL,
  `Marque` varchar(32) NOT NULL,
  `Modèle` varchar(32) NOT NULL,
  `Année` int(10) NOT NULL,
  `Puissance(chevaux)` int(10) NOT NULL,
  `Cylindré(litres)` float NOT NULL,
  `Carburant` varchar(10) NOT NULL,
  `Nbr de porte` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `SAE23`
--

INSERT INTO `SAE23` (`ID`, `Marque`, `Modèle`, `Année`, `Puissance(chevaux)`, `Cylindré(litres)`, `Carburant`, `Nbr de porte`, `description`) VALUES
(1, 'HONDA', 'CIVIC', 1995, 102, 1.5, 'Essence', 2, 'La Honda Civic 5 coupé ou EJ2 est l\'un des meilleurs coupé des années 90 et je dis pas ça car j\'en ai une personnellement'),
(2, 'RENAULT', 'CLIO', 2008, 70, 1.5, 'Diesel', 5, 'La renault clio 3 est selon un propriétaire une voiture \"moyenne mais qui marche\"'),
(3, 'BMW', '3 16I', 1996, 115, 1.8, 'Essence', 4, ''),
(4, 'NISSAN', 'SKYLINE R32 GTR', 1990, 280, 2.6, 'Essence', 2, 'Surement l\'une des meilleur voiture produite par l\'industrie automobile japonaise.'),
(5, 'ALPINE', 'A310', 1980, 150, 2.7, 'Essence', 2, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `SAE23`
--
ALTER TABLE `SAE23`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
