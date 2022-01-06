-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 jan. 2022 à 16:09
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carcraft`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `pseudo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `mail`, `mdp`, `pseudo`) VALUES
(1, 'Lecuyer', 'Thierry', 'romainlecuyer1@gmail.com', 'P@ssword', 'Mast'),
(2, 'Segarra', 'Theo', 'test.test@gmail.com', 'P@ssword', 'JackCitrouille');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `clientsId` int(11) DEFAULT NULL,
  `vehiculesID` int(11) DEFAULT NULL,
  `dat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `clientsId` int(11) NOT NULL,
  `vehiculesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`clientsId`, `vehiculesId`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `newletter`
--

CREATE TABLE `newletter` (
  `id` int(11) NOT NULL,
  `vehiculesID` int(11) DEFAULT NULL,
  `clientsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `newletter`
--

INSERT INTO `newletter` (`id`, `vehiculesID`, `clientsID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `souhait`
--

CREATE TABLE `souhait` (
  `id` int(11) NOT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `occasion` varchar(50) DEFAULT NULL,
  `prixMin` float DEFAULT NULL,
  `prixMax` float DEFAULT NULL,
  `clientId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `souhait`
--

INSERT INTO `souhait` (`id`, `marque`, `modele`, `occasion`, `prixMin`, `prixMax`, `clientId`) VALUES
(1, 'fia', 'multipla', 'oui', 1000, 10000, 1),
(2, 'fiat', 'multipla', 'oui', 1000, 10000, 1),
(3, 'fiat', 'multipla', 'oui', 1000, 10000, 1),
(4, 'fiat', 'multipla', 'oui', 1000, 10000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `occasion` varchar(3) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `marque`, `modele`, `occasion`, `stock`, `prix`) VALUES
(1, 'fiat', 'multipla', 'oui', 1, 3999),
(2, 'Tesla', 'Modele-S', 'non', 10, 99990);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientsId` (`clientsId`),
  ADD KEY `vehiculesID` (`vehiculesID`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD KEY `clientsId` (`clientsId`),
  ADD KEY `vehiculesId` (`vehiculesId`);

--
-- Index pour la table `newletter`
--
ALTER TABLE `newletter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculesID` (`vehiculesID`),
  ADD KEY `clientsID` (`clientsID`);

--
-- Index pour la table `souhait`
--
ALTER TABLE `souhait`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientId` (`clientId`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `newletter`
--
ALTER TABLE `newletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `souhait`
--
ALTER TABLE `souhait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`clientsId`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`vehiculesID`) REFERENCES `vehicules` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`clientsId`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`vehiculesId`) REFERENCES `vehicules` (`id`);

--
-- Contraintes pour la table `newletter`
--
ALTER TABLE `newletter`
  ADD CONSTRAINT `newletter_ibfk_1` FOREIGN KEY (`vehiculesID`) REFERENCES `vehicules` (`id`),
  ADD CONSTRAINT `newletter_ibfk_2` FOREIGN KEY (`clientsID`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `souhait`
--
ALTER TABLE `souhait`
  ADD CONSTRAINT `souhait_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
