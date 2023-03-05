-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 24 avr. 2022 à 18:50
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `deluxecars`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation_deluxe`
--

CREATE TABLE `reservation_deluxe` (
  `NO_RESERVATION` int(11) NOT NULL,
  `RESERVE_NO_UTILISATEUR` int(11) NOT NULL,
  `RESERVE_NO_VEHICULE` int(11) NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `NBRE_JOURS` int(3) NOT NULL,
  `PRIX_TOTAL` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation_deluxe`
--

INSERT INTO `reservation_deluxe` (`NO_RESERVATION`, `RESERVE_NO_UTILISATEUR`, `RESERVE_NO_VEHICULE`, `DATE_DEBUT`, `NBRE_JOURS`, `PRIX_TOTAL`) VALUES
(1, 2, 5, '2022-03-31', 3, '198.00'),
(2, 5, 3, '0000-00-00', 2, '128.00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_deluxe`
--

CREATE TABLE `utilisateur_deluxe` (
  `NO_UTILISATEUR` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `ADRESSE_MAIL` varchar(100) NOT NULL,
  `MOT_PASSE` varchar(255) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `NO_TELEPHONE` varchar(20) DEFAULT NULL,
  `DATE_PERMIS` date NOT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur_deluxe`
--

INSERT INTO `utilisateur_deluxe` (`NO_UTILISATEUR`, `login`, `ADRESSE_MAIL`, `MOT_PASSE`, `NOM`, `PRENOM`, `NO_TELEPHONE`, `DATE_PERMIS`, `DATE_DEBUT`, `DATE_FIN`) VALUES
(25, 'toto', 'edwin.rizk@live.fr', '$2y$10$DoR6YhTewjVml2toSSZ./OtJIVJh1qReG4JgvWOc5pbozt4WmeNVa', 'Rizk', 'Edwin', '0631957341', '2022-04-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_deluxe`
--

CREATE TABLE `vehicule_deluxe` (
  `NO_vehicule` int(11) NOT NULL,
  `DATE_CIRCULATION` year(4) DEFAULT NULL,
  `modele` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `KILOMETRAGE` int(7) DEFAULT NULL,
  `PRIX_JOURNALIER` decimal(6,2) NOT NULL,
  `PRIX_JEUNE_CONDUCTEUR` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicule_deluxe`
--

INSERT INTO `vehicule_deluxe` (`NO_vehicule`, `DATE_CIRCULATION`, `modele`, `marque`, `image`, `KILOMETRAGE`, `PRIX_JOURNALIER`, `PRIX_JEUNE_CONDUCTEUR`) VALUES
(1, 2020, 'A3', 'AUDI', 'a3.jpg', 9000, '56.00', '64.00'),
(2, 2018, 'Serie1', 'BMW', 'serie1.jpg', 5000, '56.00', '64.00'),
(3, 2020, 'classe A', 'MERCEDES', 'classeA.png', 1000, '56.00', '64.00'),
(4, 2019, 'CIVIC R', 'HONDA', 'car1.jpg', 1000, '56.00', '64.00'),
(5, 2021, 'MODEL 3', 'TESLA', 'model3.jpg', 1500, '66.00', '74.00'),
(6, 2019, 'A5  ', 'AUDI', 'A5.jpg', 1000, '66.00', '74.00'),
(7, 2018, 'CIVIC', 'Honda', 'car2.jpg', 35000, '60.00', '80.00'),
(8, 2018, 'Classe C63 AMG', 'MERCEDES', 'mercedes_amg_c63.png', 25000, '80.00', '130.00'),
(9, 2018, 'GOLF 7 GTI', 'VOLKSWAGEN', 'golf7gti.png', 45000, '75.00', '110.00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservation_deluxe`
--
ALTER TABLE `reservation_deluxe`
  ADD PRIMARY KEY (`NO_RESERVATION`),
  ADD KEY `reservation_deluxe_ibfk_1` (`RESERVE_NO_UTILISATEUR`),
  ADD KEY `reservation_deluxe_ibfk_2` (`RESERVE_NO_VEHICULE`);

--
-- Index pour la table `utilisateur_deluxe`
--
ALTER TABLE `utilisateur_deluxe`
  ADD PRIMARY KEY (`NO_UTILISATEUR`);

--
-- Index pour la table `vehicule_deluxe`
--
ALTER TABLE `vehicule_deluxe`
  ADD PRIMARY KEY (`NO_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation_deluxe`
--
ALTER TABLE `reservation_deluxe`
  MODIFY `NO_RESERVATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur_deluxe`
--
ALTER TABLE `utilisateur_deluxe`
  MODIFY `NO_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `vehicule_deluxe`
--
ALTER TABLE `vehicule_deluxe`
  MODIFY `NO_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation_deluxe`
--
ALTER TABLE `reservation_deluxe`
  ADD CONSTRAINT `reservation_deluxe_ibfk_1` FOREIGN KEY (`RESERVE_NO_UTILISATEUR`) REFERENCES `utilisateur_deluxe` (`NO_UTILISATEUR`),
  ADD CONSTRAINT `reservation_deluxe_ibfk_2` FOREIGN KEY (`RESERVE_NO_VEHICULE`) REFERENCES `vehicule_deluxe` (`NO_vehicule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
