-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2024 at 11:51 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `VehiculeId` int DEFAULT NULL,
  `UtilisateurId` int DEFAULT NULL,
  `Commentaire` text,
  `Statut` enum('valide','non_valide') DEFAULT NULL,
  `is_marque` tinyint(1) NOT NULL DEFAULT '0',
  `nombre_like` int NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `note` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `VehiculeId` (`VehiculeId`),
  KEY `UtilisateurId` (`UtilisateurId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`Id`, `VehiculeId`, `UtilisateurId`, `Commentaire`, `Statut`, `is_marque`, `nombre_like`, `is_deleted`, `note`) VALUES
(1, 4, 4, 'Excellent véhicule, très confortable.', 'non_valide', 0, 10, 0, 4),
(2, 2, 2, 'La marque offre des produits de haute qualité.', 'valide', 1, 15, 0, 4),
(3, 4, 2, 'Pas satisfait du tout, le moteur a des problèmes.', 'valide', 0, 5, 0, 4),
(4, 3, 4, 'J aime la marque, mais ce modèle spécifique a des défauts.', 'valide', 1, 8, 0, 4),
(5, 4, 2, 'perfeeeect', 'valide', 0, 5, 0, 4),
(6, 4, 2, 'j aime trop', 'valide', 0, 5, 0, 4),
(7, 4, 2, 'voiture au top', 'valide', 0, 5, 0, 5),
(8, 4, 2, 'j aime bien', 'valide', 0, 4, 0, 5),
(9, 9, 2, 'erjwryj', 'valide', 0, 4, 0, 5),
(10, 3, 2, 'magnifique\r\n', 'valide', 0, 5, 0, 5),
(11, 3, 2, 'j aime bien', 'valide', 0, 5, 0, 5),
(12, 6, 2, 'tres belle voiture ', 'valide', 0, 4, 0, 5),
(13, 7, 2, 'j adore\r\n', 'valide', 0, 5, 0, 5),
(14, 7, 2, 'magnifique', 'valide', 0, 4, 0, 5),
(15, 7, 2, 'test', 'valide', 0, 4, 0, 4),
(16, 7, 2, 'j aime bien', 'valide', 0, 4, 0, 4),
(17, 7, 2, 'j aime bien ', 'valide', 0, 5, 0, 4),
(18, 7, 2, 'j aime bien ', 'valide', 1, 5, 0, 4),
(19, 3, 2, 'j aime bien cette marque\r\n', 'non_valide', 1, 5, 0, 5),
(20, 4, 2, 'parfait', 'valide', 0, 0, 0, 5),
(21, 3, 2, 'super\r\n', 'valide', 0, 0, 0, 4),
(22, 19, 2, 'j aime bien\r\n', 'valide', 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comparison`
--

DROP TABLE IF EXISTS `comparison`;
CREATE TABLE IF NOT EXISTS `comparison` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  `vehicle1Id` int DEFAULT NULL,
  `vehicle2Id` int DEFAULT NULL,
  `vehicle3Id` int DEFAULT NULL,
  `vehicle4Id` int DEFAULT NULL,
  `nbr_recherche` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `vehicle1Id` (`vehicle1Id`),
  KEY `vehicle2Id` (`vehicle2Id`),
  KEY `vehicle3Id` (`vehicle3Id`),
  KEY `vehicle4Id` (`vehicle4Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comparison`
--

INSERT INTO `comparison` (`id`, `userId`, `vehicle1Id`, `vehicle2Id`, `vehicle3Id`, `vehicle4Id`, `nbr_recherche`) VALUES
(1, NULL, 4, 3, 0, 0, 7),
(13, NULL, 4, 9, 0, 0, 1),
(12, NULL, 4, 5, 0, 0, 1),
(8, NULL, 4, 3, 5, 0, 100),
(9, NULL, 6, 7, 8, 0, 200),
(10, NULL, 4, 9, 10, 0, 99),
(11, NULL, 5, 3, 7, 0, 20),
(14, NULL, 18, 4, 0, 0, 1),
(15, NULL, 19, 4, 0, 0, 1),
(16, NULL, 4, 3, 18, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `img_marque` varchar(255) DEFAULT NULL,
  `PaysOrigine` varchar(255) DEFAULT NULL,
  `SiegeSocial` varchar(255) DEFAULT NULL,
  `AnneeCreation` int DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`Id`, `Nom`, `img_marque`, `PaysOrigine`, `SiegeSocial`, `AnneeCreation`, `is_deleted`) VALUES
(1, 'Toyota', 'uploads/toyota.jpg', 'Japon', 'Toyota City, Japon', 1937, 0),
(2, 'Ford', 'uploads/ford.png', 'États-Unis', 'Dearborn, Michigan, États-Unis', 1903, 0),
(3, 'BMW', 'uploads/bmw.jpg', 'Allemagne', 'Munich, Allemagne', 1916, 0),
(4, 'Honda', 'uploads/honda.png', 'Japon', 'Tokyo, Japon', 1948, 0),
(8, 'Mercedes-Benz', 'uploads/mercedes.jpg', 'Allemagne', 'Stuttgart, Allemagne', 1926, 0),
(11, 'test', 'uploads/voiture_3.jpg', 'test', 'test', 2002, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img_news` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `img_news`, `title`, `content`, `imageUrl`, `date`, `is_deleted`) VALUES
(1, 'uploads/voiture1.jpg', 'Quand Porsche se la joue Mercedes', 'Le constructeur Porsche rete-t-il de generer un phenomene viral semblable a celui de Mercedes avec son GLE et son Sand Mode', 'https://www.caradisiac.com/quand-porsche-se-la-joue-mercedes-206294.htm', '2023-12-30', 0),
(2, 'uploads/voiture2.png', 'Encore une mauvaise nouvelle pour Volkswagen', 'Concue d abord pour la Chine, la Volkswagen ID.7 semble ne pas plaire a la clientele locale pour l instant Encore une mauvaise nouvelle pour le constructeur allemand qui peine à seduire avec ses modeles electriques', 'https://www.caradisiac.com/encore-une-mauvaise-nouvelle-pour-volkswagen-206296.htm', '2023-02-02', 0),
(3, 'uploads/voiture5.jpg', 'Exciting New Model Unveiled at Auto Show', 'The latest car model was unveiled at the international auto show, boasting cutting-edge features and advanced technology.', 'https://www.caranddriver.com/news/', '2024-01-11', 0),
(4, 'uploads/toyota_3.jpg', 'Electric Cars Gaining Popularity', 'Electric vehicles are becoming increasingly popular as environmental concerns grow. Major car manufacturers are investing heavily in electric technology.', 'https://www.caranddriver.com/news/', '2024-01-12', 0),
(5, 'uploads/voiture2.png', 'Top Picks for Best Family Cars of the Year', 'Experts have compiled a list of the best family cars for the year, considering safety, comfort, and practicality.', 'https://www.caranddriver.com/news/', '2024-01-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Sexe` enum('male','femelle') DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `is_blocked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `username`, `Nom`, `Prenom`, `Sexe`, `MotDePasse`, `isAdmin`, `valide`, `is_blocked`) VALUES
(1, 'admin', 'admin', 'admin', 'male', 'admin', 1, 1, 0),
(2, 'linaarab0', 'lyna', 'arab', 'femelle', 'linaesi2233', 0, 1, 0),
(4, 'linaarab', 'lyna', 'arab', 'femelle', 'lina2233', 0, 0, 0),
(5, 'walidwalid0', 'walid', 'walid', 'male', 'walidwalid', 0, 1, 0),
(6, 'aghilesArab11', 'ghiles', 'arab', 'male', 'ghilesghile', 0, 0, 0),
(7, 'testtest', 'test', 'teest', 'male', 'testest', 0, 1, 0),
(8, 'testest1', 'test', 'test', 'femelle', 'testest', 0, 1, 0),
(9, 'new1', 'cherif', 'cherif', 'male', 'lina2233', 0, 1, 0),
(10, 'test2', 'lyna', 'lyna', 'femelle', 'linalina', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `marque_id` int DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `version` varchar(50) DEFAULT NULL,
  `annee` int DEFAULT NULL,
  `note` float DEFAULT NULL,
  `puissance` int DEFAULT NULL,
  `consommation` float DEFAULT NULL,
  `capacite` int DEFAULT NULL,
  `tarif_indicatif` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `page_detaillee_url` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `marque_id` (`marque_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`Id`, `marque_id`, `modele`, `version`, `annee`, `note`, `puissance`, `consommation`, `capacite`, `tarif_indicatif`, `image_url`, `page_detaillee_url`, `is_deleted`) VALUES
(4, 1, 'Rav4', 'XLEe', 2023, 4.7, 180, 7, 5, '32000.00', 'uploads/toyota_1.jpg', 'https://www.toyota.fr/vehicules-neufs/rav4', 0),
(3, 1, 'Corolla', 'Sedan', 2022, 4.5, 150, 6.2, 5, '25000.00', 'uploads/toyota_2.jpg', 'https://www.guideautoweb.com/articles/68988/honda-civic-vs-toyota-corolla-2023-comparons-les-chiffres/', 0),
(5, 2, 'Mustang', 'GT', 2022, 4.8, 450, 12, 4, '45000.00', 'uploads/ford_1.jpg', 'https://www.ford.fr/voitures-neuves/mustang', 0),
(6, 2, 'Explorer', 'Limited', 2023, 4.6, 300, 10.5, 7, '42000.00', 'uploads/ford_2.jpg', 'https://fr.wikipedia.org/wiki/Ford_Explorer', 0),
(7, 3, '3 Series', '320i', 2022, 4.7, 184, 8.5, 5, '38000.00', 'uploads/bmw1.jpg', 'https://www.bmw.fr/fr/tous-les-modeles/3-series.html', 0),
(8, 3, 'X5', 'xDrive40i', 2023, 4.9, 335, 11.5, 5, '59000.00', 'uploads/bmw2.jpg', 'https://www.bmw.fr/fr/tous-les-modeles/x-series/X5/2023/bmw-x5-apercu.html', 0),
(9, 4, 'Civic', 'Touring', 2022, 4.6, 180, 7.2, 5, '23000.00', 'uploads/honda1.png', 'https://fr.wikipedia.org/wiki/Honda_Civic', 0),
(10, 4, 'CR-V', 'EX-L', 2023, 4.7, 190, 8, 5, '29000.00', 'uploads/honda2.jpg', 'https://auto.honda.fr/cars/new/cr-v-hybrid/overview.html', 0),
(11, 1, 'Camry', 'SE', 2023, 4.6, 203, 8, 5, '29000.00', 'uploads/toyota_3.jpg', 'https://www.toyota.fr/vehicules-neufs/camry', 0),
(12, 2, 'F-150', 'Lariat', 2022, 4.8, 400, 11, 5, '45000.00', 'uploads/ford_3.jpg', 'https://www.ford.fr/vehicules-pick-up/f-150', 0),
(13, 3, 'X3', 'xDrive30i', 2022, 4.7, 248, 9, 5, '49000.00', 'uploads/bmw3.jpg', 'https://www.bmw.fr/fr/tous-les-modeles/x-series/X3/2022/bmw-x3-apercu.html', 0),
(14, 4, 'Pilot', 'Touring 8P', 2023, 4.8, 280, 10.5, 8, '41000.00', 'uploads/honda3.jpg', 'https://auto.honda.fr/cars/new/pilot/overview.html', 0),
(20, 8, 'GLE', 'GLE 450', 2022, 4.9, 362, 9.8, 5, '64000.00', 'uploads/mercedes_3.jpg', 'https://www.mercedes-benz.com/', 0),
(19, 8, 'E-Class', 'E350', 2022, 4.8, 255, 8.3, 5, '56000.00', 'uploads/mercedes_2.jpg', 'https://www.mercedes-benz.com/', 0),
(18, 8, 'C-Class', 'C300', 2023, 4.7, 255, 7.6, 5, '45000.00', 'uploads/mercedes_1.jpg', 'https://www.mercedes-benz.com/', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
