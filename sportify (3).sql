

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
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idadmin`, `nom`, `prenom`, `nom_utilisateur`, `courriel`, `mdp`, `photo`) VALUES
(1, 'Shahin', 'Sarah', 'sarah_shahin', 'sarahshahin10@gmail.com', 'mdp', 'sarah.jpg'),
(2, 'Chikhi', 'Anissa', 'anissa_chikhi', 'chikhianissa6@gmail.com', 'mdp', 'anissa.jpg'),
(3, 'Saidi', 'Soufiane', 'soufiane_saidi', 'So.saidi33@gmail.com', 'mdp', 'soufiane.jpg'),
(4, 'Tarnus', 'Mathieu', 'mathieu_tarnus', 'mathieu.tarnus@edu.ece.fr', 'mdp', 'mathieu.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `carte_etudiante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `info_de_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `nom`, `prenom`, `nom_utilisateur`, `mdp`, `adresse`, `telephone`, `courriel`, `carte_etudiante`, `info_de_paiement`) VALUES
(1, 'Chikhi', 'Anissa', '', '', '4 Allée du Blabla, Pais', 0, 'chikhianissa6@gmail.com', 'anissa.jpg', 'MASTERCARD'),
(2, 'Shahin', 'Sarah', '', '', '3 Allée la boetie, Sevran', 0, 'sarahshahin10@gmail.com', 'sarah.jpg', 'MASTERCARD'),
(3, 'Tarnus', 'Mathieu', '', '', '7 Allée du Blabla, Paris', 0, 'MathieuTarnus6@gmail.com', 'mathieu.jpg', 'VISA'),
(4, 'Saidi', 'Soufiane', '', '', '37 Allée de la Vachekiri, Paris', 0, 'So.saidi33@gmail.com', 'soufiane.jpg', 'APPLEPAY');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `idcoach` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `idsalle` int NOT NULL,
  PRIMARY KEY (`idcoach`),
  KEY `idsalle` (`idsalle`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`idcoach`, `nom`, `prenom`, `specialite`, `adresse`, `courriel`, `CV`, `photo`, `fonction`, `telephone`, `nom_utilisateur`, `mdp`, `idsalle`) VALUES
(1, 'Johnson', 'Dwayne', 'Musculation', '123 Rue des Sports', 'dwayne.johnson@gmail.com', 'CV_Musculation.pdf', 'coach_muscu.jpeg', 'Coach', '0692317547', 'dwayne_johnson', 'lapin', 0),
(2, 'Nadal', 'Rafael', 'Tennis', '456 Avenue du Tennis', 'rafael.nadal@gmail.com', 'CV_Tennis.pdf', 'coach_tennis.jpg', 'Coach', '0695763532', 'rafael_nadal', 'chien', 0),
(3, 'Phelps', 'Michael', 'Natation', '1212 Rue de la Natation', 'michael.phelps@gmail.com', 'CV_Natation.pdf', 'coach_natation.jpg', 'Coach', '061865025', 'michael_phelps', 'chien', 0),
(4, 'Smith', 'John', 'Plongeon', '1313 Avenue du Plongeon', 'john.smith@gmail.com', 'CV_Plongeon.pdf', 'coach_plongeon.jpg', 'Coach', '0622034530', 'john_smith', 'tortue', 0),
(5, 'Williams', 'Serena', 'Cardio Training', '1414 Boulevard du Tennis', 'serena.williams@gmail.com', 'CV_Tennis_Serena.pdf', 'coach_cardio.jpeg', 'Coach', '064577580', 'serena_williams', 'renard', 0),
(6, 'Ronaldo', 'Cristiano', 'Football', '1515 Rue du Football', 'cristiano.ronaldo@gmail.com', 'CV_Football_Cristiano.pdf', 'coach_football.jpg', 'Coach', '0656784311', 'cristiano_ronaldo', 'elephant', 0),
(7, 'Curry', 'Stephen', 'Basketball', '1616 Avenue du Basketball', 'stephen.curry@gmail.com', 'CV_Basketball_Stephen.pdf', 'coach_basketball.jpg', 'Coach', '0670188822', 'stephen_curry', 'curry', 0),
(8, 'Schwarzenegger', 'Arnold', 'rugby', '1717 Rue des Sports', 'arnold.schwarzenegger@gmail.com', 'CV_rugby_Arnold.pdf', 'coach_rugby.jpg', 'Coach', '0680591179', 'arnold_schwarzenegger', 'lapin', 0),
(9, 'Sharapova', 'Maria', 'fitness', '1818 Boulevard du Tennis', 'maria.sharapova@gmail.com', 'CV_fitness_Maria.pdf', 'coach_fitness.jpg', 'Coach', '0692389432', 'maria_sharapova', 'lion', 0),
(10, 'Bolt', 'Usain', 'Biking', '1919 Avenue du Biking', 'usain.bolt@gmail.com', 'CV_Biking_Usain.pdf', 'coach_biking.jpeg', 'Coach', '0620173625', 'usain_bolt', 'chat', 0),
(11, 'Gymnaste', 'Simone', 'Cours-collectif', '2020 Rue des Sports', 'simone.gymnaste@gmail.com', 'CV_Cours-collectif_Simone.pdf', 'coach_cours_collectifs.webp', 'Coach', '0623699835', 'simone_gymnaste', 'ours', 0);

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

DROP TABLE IF EXISTS `disponibilite`;
CREATE TABLE IF NOT EXISTS `disponibilite` (
  `iddisponibilite` int NOT NULL AUTO_INCREMENT,
  `idcoach` int NOT NULL,
  `jour` varchar(255) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  PRIMARY KEY (`iddisponibilite`),
  KEY `idcoach` (`idcoach`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `disponibilite`
--

INSERT INTO `disponibilite` (`iddisponibilite`, `idcoach`, `jour`, `heure_debut`, `heure_fin`) VALUES
(1, 1, 'Lundi', '08:00:00', '10:00:00'),
(2, 1, 'Lundi', '14:00:00', '16:00:00'),
(3, 1, 'Mardi', '10:00:00', '12:00:00'),
(4, 1, 'Mardi', '15:00:00', '17:00:00'),
(5, 1, 'Mercredi', '12:00:00', '14:00:00'),
(6, 1, 'Mercredi', '16:00:00', '18:00:00'),
(7, 1, 'Jeudi', '08:00:00', '10:00:00'),
(8, 1, 'Jeudi', '14:00:00', '16:00:00'),
(9, 1, 'Vendredi', '10:00:00', '12:00:00'),
(10, 1, 'Vendredi', '15:00:00', '17:00:00'),
(11, 2, 'Lundi', '09:00:00', '11:00:00'),
(12, 2, 'Lundi', '13:00:00', '15:00:00'),
(13, 2, 'Mardi', '11:00:00', '13:00:00'),
(14, 2, 'Mardi', '16:00:00', '18:00:00'),
(15, 2, 'Mercredi', '13:00:00', '15:00:00'),
(16, 2, 'Mercredi', '17:00:00', '19:00:00'),
(17, 2, 'Jeudi', '09:00:00', '11:00:00'),
(18, 2, 'Jeudi', '14:00:00', '16:00:00'),
(19, 2, 'Vendredi', '11:00:00', '13:00:00'),
(20, 2, 'Vendredi', '16:00:00', '18:00:00'),
(21, 3, 'Lundi', '10:00:00', '12:00:00'),
(22, 3, 'Lundi', '15:00:00', '17:00:00'),
(23, 3, 'Mardi', '12:00:00', '14:00:00'),
(24, 3, 'Mardi', '17:00:00', '19:00:00'),
(25, 3, 'Mercredi', '14:00:00', '16:00:00'),
(26, 3, 'Mercredi', '18:00:00', '20:00:00'),
(27, 3, 'Jeudi', '10:00:00', '12:00:00'),
(28, 3, 'Jeudi', '15:00:00', '17:00:00'),
(29, 3, 'Vendredi', '12:00:00', '14:00:00'),
(30, 3, 'Vendredi', '17:00:00', '19:00:00'),
(31, 4, 'Lundi', '11:00:00', '13:00:00'),
(32, 4, 'Lundi', '16:00:00', '18:00:00'),
(33, 4, 'Mardi', '13:00:00', '15:00:00'),
(34, 4, 'Mardi', '18:00:00', '20:00:00'),
(35, 4, 'Mercredi', '15:00:00', '17:00:00'),
(36, 4, 'Mercredi', '19:00:00', '21:00:00'),
(37, 4, 'Jeudi', '11:00:00', '13:00:00'),
(38, 4, 'Jeudi', '16:00:00', '18:00:00'),
(39, 4, 'Vendredi', '13:00:00', '15:00:00'),
(40, 4, 'Vendredi', '18:00:00', '20:00:00'),
(41, 5, 'Lundi', '12:00:00', '14:00:00'),
(42, 5, 'Lundi', '17:00:00', '19:00:00'),
(43, 5, 'Mardi', '14:00:00', '16:00:00'),
(44, 5, 'Mardi', '19:00:00', '21:00:00'),
(45, 5, 'Mercredi', '16:00:00', '18:00:00'),
(46, 5, 'Mercredi', '20:00:00', '22:00:00'),
(47, 5, 'Jeudi', '12:00:00', '14:00:00'),
(48, 5, 'Jeudi', '17:00:00', '19:00:00'),
(49, 5, 'Vendredi', '14:00:00', '16:00:00'),
(50, 5, 'Vendredi', '19:00:00', '21:00:00'),
(51, 1, 'Lundi', '08:00:00', '10:00:00'),
(52, 1, 'Lundi', '14:00:00', '16:00:00'),
(53, 1, 'Mardi', '10:00:00', '12:00:00'),
(54, 1, 'Mardi', '15:00:00', '17:00:00'),
(55, 1, 'Mercredi', '12:00:00', '14:00:00'),
(56, 1, 'Mercredi', '16:00:00', '18:00:00'),
(57, 1, 'Jeudi', '08:00:00', '10:00:00'),
(58, 1, 'Jeudi', '14:00:00', '16:00:00'),
(59, 1, 'Vendredi', '10:00:00', '12:00:00'),
(60, 1, 'Vendredi', '15:00:00', '17:00:00'),
(61, 2, 'Lundi', '09:00:00', '11:00:00'),
(62, 2, 'Lundi', '13:00:00', '15:00:00'),
(63, 2, 'Mardi', '11:00:00', '13:00:00'),
(64, 2, 'Mardi', '16:00:00', '18:00:00'),
(65, 2, 'Mercredi', '13:00:00', '15:00:00'),
(66, 2, 'Mercredi', '17:00:00', '19:00:00'),
(67, 2, 'Jeudi', '09:00:00', '11:00:00'),
(68, 2, 'Jeudi', '14:00:00', '16:00:00'),
(69, 2, 'Vendredi', '11:00:00', '13:00:00'),
(70, 2, 'Vendredi', '16:00:00', '18:00:00'),
(71, 3, 'Lundi', '10:00:00', '12:00:00'),
(72, 3, 'Lundi', '15:00:00', '17:00:00'),
(73, 3, 'Mardi', '12:00:00', '14:00:00'),
(74, 3, 'Mardi', '17:00:00', '19:00:00'),
(75, 3, 'Mercredi', '14:00:00', '16:00:00'),
(76, 3, 'Mercredi', '18:00:00', '20:00:00'),
(77, 3, 'Jeudi', '10:00:00', '12:00:00'),
(78, 3, 'Jeudi', '15:00:00', '17:00:00'),
(79, 3, 'Vendredi', '12:00:00', '14:00:00'),
(80, 3, 'Vendredi', '17:00:00', '19:00:00'),
(81, 4, 'Lundi', '11:00:00', '13:00:00'),
(82, 4, 'Lundi', '16:00:00', '18:00:00'),
(83, 4, 'Mardi', '13:00:00', '15:00:00'),
(84, 4, 'Mardi', '18:00:00', '20:00:00'),
(85, 4, 'Mercredi', '15:00:00', '17:00:00'),
(86, 4, 'Mercredi', '19:00:00', '21:00:00'),
(87, 4, 'Jeudi', '11:00:00', '13:00:00'),
(88, 4, 'Jeudi', '16:00:00', '18:00:00'),
(89, 4, 'Vendredi', '13:00:00', '15:00:00'),
(90, 4, 'Vendredi', '18:00:00', '20:00:00'),
(91, 11, 'Lundi', '12:00:00', '14:00:00'),
(92, 11, 'Lundi', '17:00:00', '19:00:00'),
(93, 11, 'Mardi', '14:00:00', '16:00:00'),
(94, 11, 'Mardi', '19:00:00', '21:00:00'),
(95, 11, 'Mercredi', '16:00:00', '18:00:00'),
(96, 11, 'Mercredi', '20:00:00', '22:00:00'),
(97, 11, 'Jeudi', '12:00:00', '14:00:00'),
(98, 11, 'Jeudi', '17:00:00', '19:00:00'),
(99, 11, 'Vendredi', '14:00:00', '16:00:00'),
(100, 11, 'Vendredi', '19:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `idrendezvous` int NOT NULL AUTO_INCREMENT,
  `idclient` int DEFAULT NULL,
  `idcoach` int NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  PRIMARY KEY (`idrendezvous`),
  KEY `idclient` (`idclient`),
  KEY `idcoach` (`idcoach`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`idrendezvous`, `idclient`, `idcoach`, `date`, `heure_debut`) VALUES
(1, 1, 4, '0000-00-00', '00:00:00'),
(2, 1, 4, '0000-00-00', '00:00:00'),
(3, 1, 4, '0000-00-00', '00:00:00'),
(4, 1, 4, '2023-12-18', '00:00:00'),
(5, 1, 5, '0000-00-00', '00:00:00'),
(6, 1, 5, '2023-12-18', '00:00:00'),
(7, 1, 4, '0000-00-00', '00:00:16'),
(8, 1, 4, '2023-12-18', '00:00:16'),
(9, 1, 4, '0000-00-00', '00:00:12'),
(10, 1, 4, '2023-12-18', '00:00:12'),
(11, 1, 4, '0000-00-00', '00:00:17'),
(12, 1, 4, '2023-12-18', '00:00:17'),
(13, 1, 4, '0000-00-00', '00:00:12'),
(14, 1, 4, '2023-12-18', '00:00:12'),
(15, 1, 4, '0000-00-00', '00:00:11'),
(16, 1, 4, '2023-12-18', '00:00:11'),
(17, 1, 5, '0000-00-00', '00:00:14'),
(18, 1, 5, '2023-12-18', '00:00:14'),
(19, 1, 5, '0000-00-00', '00:00:15'),
(20, 1, 5, '2023-12-18', '00:00:15'),
(21, 1, 5, '0000-00-00', '00:00:19'),
(22, 1, 5, '2023-12-18', '00:00:19'),
(23, 1, 11, '2023-12-18', '00:00:13');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `idsalle` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`idsalle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
