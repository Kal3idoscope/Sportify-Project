-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 mai 2023 à 20:54
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sportify`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_Admin` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Nom`, `Prenom`, `Pass`, `Photo`, `Email`, `Status`) VALUES
(1, 'Boulic', 'Alexis', 'testadmin', '', 'boulicalexis@gmail.com', 'Active now');

-- --------------------------------------------------------

--
-- Structure de la table `ajoutersupprimer`
--

DROP TABLE IF EXISTS `ajoutersupprimer`;
CREATE TABLE IF NOT EXISTS `ajoutersupprimer` (
  `ID_Coach` int NOT NULL,
  `ID_admin` int NOT NULL,
  PRIMARY KEY (`ID_Coach`,`ID_admin`),
  KEY `AjouterSupprimer_Admin0_FK` (`ID_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_Client` int NOT NULL AUTO_INCREMENT,
  `ID_sport` int NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Adresse1` varchar(50) NOT NULL,
  `Adresse2` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Code_postal` varchar(50) NOT NULL,
  `Pays` varchar(50) NOT NULL,
  `Telephone` int NOT NULL,
  `Type_carte` varchar(50) NOT NULL,
  `Num_carte` varchar(50) NOT NULL,
  `Nom_carte` varchar(50) NOT NULL,
  `Date_d_expiration` date NOT NULL,
  PRIMARY KEY (`ID_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `ID_Coach` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `ID_sport` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Coach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `communiquer`
--

DROP TABLE IF EXISTS `communiquer`;
CREATE TABLE IF NOT EXISTS `communiquer` (
  `ID_Coach` int NOT NULL,
  `ID_Client` int NOT NULL,
  `Type_communication` varchar(50) NOT NULL,
  `Destinataire` varchar(50) NOT NULL,
  `Envoyeur` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`ID_Coach`,`ID_Client`),
  KEY `Communiquer_Client0_FK` (`ID_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

DROP TABLE IF EXISTS `effectuer`;
CREATE TABLE IF NOT EXISTS `effectuer` (
  `ID_Paiement` int NOT NULL,
  `ID_Client` int NOT NULL,
  PRIMARY KEY (`ID_Paiement`,`ID_Client`),
  KEY `Effectuer_Client0_FK` (`ID_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `ID_Paiement` int NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Montant` decimal(15,3) NOT NULL,
  PRIMARY KEY (`ID_Paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prendre_rdv`
--

DROP TABLE IF EXISTS `prendre_rdv`;
CREATE TABLE IF NOT EXISTS `prendre_rdv` (
  `ID_Coach` int NOT NULL,
  `ID_Paiement` int NOT NULL,
  `ID_Client` int NOT NULL,
  `Date_rdv` datetime NOT NULL,
  `Statut` int NOT NULL,
  PRIMARY KEY (`ID_Coach`,`ID_Paiement`,`ID_Client`),
  KEY `Prendre_rdv_Paiement0_FK` (`ID_Paiement`),
  KEY `Prendre_rdv_Client1_FK` (`ID_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle_de_sport`
--

DROP TABLE IF EXISTS `salle_de_sport`;
CREATE TABLE IF NOT EXISTS `salle_de_sport` (
  `ID_Salle` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Courriel` varchar(50) NOT NULL,
  `Telephone` int NOT NULL,
  `Horaire_ouverture` datetime NOT NULL,
  `Horaire_fermeture` datetime NOT NULL,
  `Lieu_salle` varchar(50) NOT NULL,
  `Regles` text NOT NULL,
  PRIMARY KEY (`ID_Salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `s´inscrire`
--

DROP TABLE IF EXISTS `s´inscrire`;
CREATE TABLE IF NOT EXISTS `s´inscrire` (
  `ID_Salle` int NOT NULL,
  `ID_Client` int NOT NULL,
  PRIMARY KEY (`ID_Salle`,`ID_Client`),
  KEY `S´inscrire_Client0_FK` (`ID_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajoutersupprimer`
--
ALTER TABLE `ajoutersupprimer`
  ADD CONSTRAINT `AjouterSupprimer_Admin0_FK` FOREIGN KEY (`ID_admin`) REFERENCES `admin` (`ID_Admin`),
  ADD CONSTRAINT `AjouterSupprimer_Coach_FK` FOREIGN KEY (`ID_Coach`) REFERENCES `coach` (`ID_Coach`);

--
-- Contraintes pour la table `communiquer`
--
ALTER TABLE `communiquer`
  ADD CONSTRAINT `Communiquer_Client0_FK` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`),
  ADD CONSTRAINT `Communiquer_Coach_FK` FOREIGN KEY (`ID_Coach`) REFERENCES `coach` (`ID_Coach`);

--
-- Contraintes pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `Effectuer_Client0_FK` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`),
  ADD CONSTRAINT `Effectuer_Paiement_FK` FOREIGN KEY (`ID_Paiement`) REFERENCES `paiement` (`ID_Paiement`);

--
-- Contraintes pour la table `prendre_rdv`
--
ALTER TABLE `prendre_rdv`
  ADD CONSTRAINT `Prendre_rdv_Client1_FK` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`),
  ADD CONSTRAINT `Prendre_rdv_Coach_FK` FOREIGN KEY (`ID_Coach`) REFERENCES `coach` (`ID_Coach`),
  ADD CONSTRAINT `Prendre_rdv_Paiement0_FK` FOREIGN KEY (`ID_Paiement`) REFERENCES `paiement` (`ID_Paiement`);

--
-- Contraintes pour la table `s´inscrire`
--
ALTER TABLE `s´inscrire`
  ADD CONSTRAINT `S´inscrire_Client0_FK` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`),
  ADD CONSTRAINT `S´inscrire_Salle_de_sport_FK` FOREIGN KEY (`ID_Salle`) REFERENCES `salle_de_sport` (`ID_Salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
