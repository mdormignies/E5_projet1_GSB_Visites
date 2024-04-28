-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour md_gsb
DROP DATABASE IF EXISTS `md_gsb`;
CREATE DATABASE IF NOT EXISTS `md_gsb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `md_gsb`;

-- Listage de la structure de table md_gsb. famille
DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `idfamille` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idfamille`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table md_gsb.famille : ~10 rows (environ)
DELETE FROM `famille`;
INSERT INTO `famille` (`idfamille`, `libelle`) VALUES
	(1, 'Antibiotiques'),
	(2, 'Antalgiques'),
	(3, 'Anti-inflammatoires'),
	(4, 'Antihistaminiques'),
	(5, 'Antidépresseurs'),
	(6, 'Antispasmodiques'),
	(7, 'Hypnotiques'),
	(8, 'Antipyrétiques'),
	(9, 'Antifongiques'),
	(10, 'Antiviraux');

-- Listage de la structure de table md_gsb. medecin
DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `idmedecin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `specialiteComplementaire` varchar(30) DEFAULT NULL,
  `departement` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmedecin`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table md_gsb.medecin : ~14 rows (environ)
DELETE FROM `medecin`;
INSERT INTO `medecin` (`idmedecin`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `tel`, `specialiteComplementaire`, `departement`, `mail`) VALUES
	(1, 'Cameron', 'Jamais', '69 Rue de Turbigo', '75003', 'Paris', '0123456789', 'Médecin généraliste', 'Paris', 'jamais.cameron@gmail.com'),
	(2, 'Philippe', 'Phil', '40 Avenue de l\'avenue', '77300', 'Fontainebleau', '0638652410', 'Orthophoniste', 'Seine-et-Marne', 'phil.philippe@gmail.com'),
	(3, 'Hugues', 'Victor', '63 Rue du Général De Gaule', '78300', 'Poissy', '0797825221', 'Orthodentiste', 'Seine-Saint-Denis', 'victor.hugues@gmail.com'),
	(4, 'De Rien', 'Merci', '13 en bande organisé', '13001', 'Marseille', '0100000006', 'Radiologue', 'Bouches-du-Rhône', 'merci.derien@gmail.com'),
	(5, 'Macronne', 'Manu', '2 Allée de l\'Avenir', '61270', 'Les Genettes', '0617895458', 'Cardiologue', 'Orne', 'manu.macronne@gmail.com'),
	(6, 'Hollyday', 'John', 'à 200M, tourner à gauche', '38200', 'Vienne', '0465633224', 'Psychiatre', 'Isère', 'john.hollyday@gmail.com'),
	(7, 'Sonjack', 'Michel', '100 Avenue des enfants', '50025', 'Avranches', '0954123520', 'Pharmacien', 'Manche', 'michel.sonjack@gmail.com'),
	(8, 'Menon', 'Lionel', '2 Rue de la Ligue 2', '33000', 'Bordeaux', '0308065795', 'Réanimateur', 'Gironde', 'lionel.menon@gmail.com'),
	(9, 'McRonald', 'Cristian', '7 Allée du siuuu', '24100', 'Bergerac', '0677992233', 'Pharmacien', 'Dordogne', 'cristian.mcronald@gmail.com'),
	(10, 'Médecin', 'Docteur', '3 Rue de la rigolade', '39600', 'Arbois', '0102030405', 'Médecin généraliste', 'Jura', 'docteur.medecin@gmail.com'),
	(11, 'Vasile', 'Bugneac', 'test', 'test', 'test', 'test', 'test', 'test', 'vasile.bugneac@gmail.com'),
	(12, 'Sébastien', 'Patrice', '3 Rue des serviettes', '69000', 'Sardines', '0879623548', 'Tourneur', 'Rhones', 'patrice.sebastien@gmail.com'),
	(13, 'D', 'M', 'A', '75003', 'PARIS', '0642000000', 'Handicapé', 'Paris', 'dm.a@gmail.com'),
	(14, 'Neybar', 'Tres Santos Jr', '45 DO BRASIL', '75000', 'Paris', '0635655895', 'Kiné', 'Paris', 'neybar@gmail.com');

-- Listage de la structure de table md_gsb. medicament
DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `idmedicament` int NOT NULL AUTO_INCREMENT,
  `nomCommercial` varchar(50) DEFAULT NULL,
  `idfamille` int DEFAULT NULL,
  `composition` varchar(100) DEFAULT NULL,
  `effets` varchar(100) DEFAULT NULL,
  `contreindications` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idmedicament`),
  KEY `idfamille` (`idfamille`),
  CONSTRAINT `medicament_ibfk_1` FOREIGN KEY (`idfamille`) REFERENCES `famille` (`idfamille`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table md_gsb.medicament : ~10 rows (environ)
DELETE FROM `medicament`;
INSERT INTO `medicament` (`idmedicament`, `nomCommercial`, `idfamille`, `composition`, `effets`, `contreindications`) VALUES
	(1, 'Fluconazole', 9, 'Fluconazole', 'Traitement des infections fongiques', 'Hypersensibilité au médicament'),
	(2, 'Dicyclomine', 6, 'Dicyclomine', 'Soulagement des spasmes musculaires', 'Glaucome'),
	(3, 'Zolpidem', 7, 'Zolpidem', 'Induction du sommeil', 'Myasthénie grave'),
	(4, 'Loratadine', 4, 'Loratadine', 'Traitement des allergies', 'Hypersensibilité au médicament'),
	(5, 'Fluoxétine', 5, 'Fluoxétine', 'Traitement de la dépression', 'Prise concomitante d\'inhibiteurs de la MAO'),
	(6, 'Paracétamol', 2, 'Paracétamol', 'Réduction de la fièvre et des douleurs', 'Insuffisance hépatique'),
	(7, 'Ibuprofène', 3, 'Ibuprofène', 'Réduction de l inflammation et de la douleur', 'Ulcères gastro-intestinaux'),
	(8, 'Aspirine', 8, 'Acide acétylsalicylique', 'Réduction de la fièvre et des douleurs', 'Ulcères gastro-intestinaux'),
	(9, 'Amoxicilline', 1, 'Amoxicilline', 'Traitement des infections bactériennes', 'Allergie à la pénicilline'),
	(10, 'Aciclovir', 10, 'Aciclovir', 'Traitement des infections virales', 'Hypersensibilité au médicament');

-- Listage de la structure de table md_gsb. offrir
DROP TABLE IF EXISTS `offrir`;
CREATE TABLE IF NOT EXISTS `offrir` (
  `idrapport` int NOT NULL,
  `idmedicament` int NOT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`idrapport`,`idmedicament`),
  KEY `idmedicament` (`idmedicament`),
  CONSTRAINT `offrir_ibfk_1` FOREIGN KEY (`idrapport`) REFERENCES `rapport` (`idrapport`),
  CONSTRAINT `offrir_ibfk_2` FOREIGN KEY (`idmedicament`) REFERENCES `medicament` (`idmedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table md_gsb.offrir : ~3 rows (environ)
DELETE FROM `offrir`;
INSERT INTO `offrir` (`idrapport`, `idmedicament`, `quantite`) VALUES
	(1, 9, 2),
	(4, 6, 5),
	(10, 4, 4);

-- Listage de la structure de table md_gsb. rapport
DROP TABLE IF EXISTS `rapport`;
CREATE TABLE IF NOT EXISTS `rapport` (
  `idrapport` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `bilan` text,
  `idvisiteur` int DEFAULT NULL,
  `idmedecin` int DEFAULT NULL,
  PRIMARY KEY (`idrapport`),
  KEY `idvisiteur` (`idvisiteur`),
  KEY `idmedecin` (`idmedecin`),
  CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`idvisiteur`) REFERENCES `visiteur` (`idvisiteur`),
  CONSTRAINT `rapport_ibfk_2` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table md_gsb.rapport : ~10 rows (environ)
DELETE FROM `rapport`;
INSERT INTO `rapport` (`idrapport`, `date`, `motif`, `bilan`, `idvisiteur`, `idmedecin`) VALUES
	(1, '2023-01-02', 'Faux rapport', 'Ici c\'est bilan', 1, 4),
	(2, '2023-11-12', 'Pour quelque chose ?', 'Quel est donc ce pouvoir ?', 2, 1),
	(3, '2023-05-20', 'Consultation régulière', 'Patient en bonne santé générale', 2, 6),
	(4, '2023-11-15', 'Suivi de Traitement', 'Monsieur Hugues Victor est un drogué...', 2, 3),
	(5, '2023-06-08', 'Problèmes respiratoires', 'Recommandation pour des tests approfondis', 2, 5),
	(6, '2023-08-17', 'Blessure sportive', 'Repos recommandé et suivi médical', 2, 2),
	(7, '2023-09-25', 'Examen de routine', 'Aucun problème notable', 1, 7),
	(8, '2023-10-10', 'Douleurs articulaires', 'Prescription pour des examens radiologiques', 1, 8),
	(9, '2023-11-05', 'Suivi de grossesse', 'Échographies normales, aucun problème détecté.', 1, 9),
	(10, '2024-04-12', 'Gestion de Maladies Chroniques', '-', 5, 1);

-- Listage de la structure de table md_gsb. visiteur
DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `idvisiteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`idvisiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table md_gsb.visiteur : ~4 rows (environ)
DELETE FROM `visiteur`;
INSERT INTO `visiteur` (`idvisiteur`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `tel`, `dateEmbauche`) VALUES
	(1, 'Nomtest', 'Prenomtest', 'test01', 'testmdp01', '404 Avenue du test', '75404', 'Villetest', '0123456789', '2023-01-01'),
	(2, 'Vasile', 'Bugneac', 'vasile', '1234', '80 Rue de la Moldavie', '75001', 'Paris', '0687978550', '2023-11-12'),
	(3, 'D', 'M', 'MAXIME', 'MAXIME', 'A', '75003', 'PARIS', '0642000000', '2024-02-10'),
	(5, 'Zhuang', 'Jacques', 'jacques1', 'jacques1', '56 rue des fleurs', '92003', 'Bagnolet', '0145542102', '2024-04-12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
