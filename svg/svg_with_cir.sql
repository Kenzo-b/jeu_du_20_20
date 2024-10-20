-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 sep. 2024 à 10:40
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeu_du_20_20`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
                                         `id` int NOT NULL AUTO_INCREMENT,
                                         `content_text` varchar(255) NOT NULL,
                                         `content_code` varchar(255) DEFAULT NULL,
                                         `content_image` varchar(255) DEFAULT NULL,
                                         `is_true` tinyint(1) NOT NULL DEFAULT '0',
                                         `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                         `revised_at` datetime DEFAULT NULL,
                                         `fk_question` int NOT NULL,
                                         PRIMARY KEY (`id`),
                                         KEY `pk_question` (`fk_question`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
                                           `id` int NOT NULL AUTO_INCREMENT,
                                           `level` int NOT NULL DEFAULT '1',
                                           `content_text` varchar(255) NOT NULL,
                                           `content_code` varchar(255) DEFAULT NULL,
                                           `content_image` varchar(255) DEFAULT NULL,
                                           `is_to_be_revised` tinyint(1) NOT NULL DEFAULT '0',
                                           `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                           `revised_at` datetime DEFAULT NULL,
                                           PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
    ADD CONSTRAINT `pk_question` FOREIGN KEY (`fk_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
v