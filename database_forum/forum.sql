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


-- Listage de la structure de la base pour forum_asma
CREATE DATABASE IF NOT EXISTS `forum_asma` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_asma`;

-- Listage de la structure de table forum_asma. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL,
  `name_categorie` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_asma.categorie : ~0 rows (environ)

-- Listage de la structure de table forum_asma. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL,
  `dateCreation_message` date DEFAULT NULL,
  `texte_message` text COLLATE utf8mb4_bin,
  `id_user` int NOT NULL,
  `id_sujet` int NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_user` (`id_user`),
  KEY `id_sujet` (`id_sujet`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_asma.message : ~0 rows (environ)

-- Listage de la structure de table forum_asma. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int NOT NULL,
  `titre_sujet` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `dateCreation_sujet` date DEFAULT NULL,
  `id_categorie` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `sujet_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_asma.sujet : ~0 rows (environ)

-- Listage de la structure de table forum_asma. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `motDePasse` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `dateInscription` date DEFAULT NULL,
  `mail` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_asma.user : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
