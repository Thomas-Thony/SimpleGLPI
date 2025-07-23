-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 23 juil. 2025 à 22:05
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `glpi_inside`
--

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

DROP TABLE IF EXISTS `inventaire`;
CREATE TABLE IF NOT EXISTS `inventaire` (
  `idTypeMateriel` int NOT NULL,
  `idMateriel` int NOT NULL AUTO_INCREMENT,
  `nomMateriel` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idMateriel`),
  KEY `cleMateriel` (`idTypeMateriel`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inventaire`
--

INSERT INTO `inventaire` (`idTypeMateriel`, `idMateriel`, `nomMateriel`) VALUES
(1, 1, 'Asus Rog Zephyrus G14-403UI-QS1W'),
(4, 2, 'Samsung A25 5G'),
(2, 3, 'Alienware 16 Aurora'),
(2, 14, 'Asus VivoBook S17'),
(2, 17, 'HP Super Tuf'),
(6, 18, 'Switch Gigabit Ethernet S3270-10TM'),
(1, 19, 'LDLC PC Zen Artist 7 v3'),
(5, 20, 'Gigabit Ethernet S3900-48T6S-R'),
(3, 21, 'Logicom ILOA 150');

-- --------------------------------------------------------

--
-- Structure de la table `roleutilisateur`
--

DROP TABLE IF EXISTS `roleutilisateur`;
CREATE TABLE IF NOT EXISTS `roleutilisateur` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `libelleRole` varchar(30) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roleutilisateur`
--

INSERT INTO `roleutilisateur` (`idRole`, `libelleRole`) VALUES
(1, 'Gestionnaire');

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `TypeMachine` varchar(50) NOT NULL,
  `IdType` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `typemateriel`
--

INSERT INTO `typemateriel` (`TypeMachine`, `IdType`) VALUES
('Ordinateur', 1),
('Ordinateur Portable', 2),
('Téléphone fixe', 3),
('Téléphone Portable', 4),
('Switch', 5),
('Routeur', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `Prenom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pseudo` varchar(12) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Mot_De_Passe` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` int NOT NULL,
  `idCompte` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idCompte`),
  KEY `fk_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Prenom`, `Nom`, `Pseudo`, `Mail`, `Mot_De_Passe`, `role`, `idCompte`) VALUES
('SuperAdministrateur', 'Sudo', 'AdminIT', 'adminit@supportit.com', '$2y$10$A8bb4a.YG2ITuS3qjgBdRu0qbJE/FYP2vtqtQBVjBwATvnljU/Mn6', 0, 17);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inventaire`
--
ALTER TABLE `inventaire`
  ADD CONSTRAINT `cleMateriel` FOREIGN KEY (`idTypeMateriel`) REFERENCES `typemateriel` (`IdType`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
