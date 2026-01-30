-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 jan. 2026 à 15:02
-- Version du serveur : 9.1.0
-- Version de PHP : 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quiz_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `intitule` text NOT NULL,
  `quizz_id` bigint NOT NULL,
  `chemin_img` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_quizz_id_foreign` (`quizz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `intitule`, `quizz_id`, `chemin_img`) VALUES
(1, 'Qui est l\'auteur du célèbre manga Naruto ?', 2, './assets/imgs/naruto_photo.jpg'),
(2, 'Qui est l\'auteur du célèbre manga One Piece ?', 2, './assets/imgs/one_piece.jpg'),
(3, 'Le salaire de neymar ?', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(190) NOT NULL,
  `chemin_img` varchar(190) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `quizz_nom_unique` (`nom`),
  UNIQUE KEY `quizz_chemin_img_unique` (`chemin_img`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`id`, `nom`, `chemin_img`) VALUES
(1, 'Jeux Vidéos', './assets/imgs/jeu_video.jpg'),
(2, 'Mangas', './assets/imgs/manga.jpg'),
(3, 'Films', './assets/imgs/cinemas.png'),
(4, 'Musiques', './assets/imgs/musique.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `question_id` bigint NOT NULL,
  `is_correcte` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reponse_question_id_foreign` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `description`, `question_id`, `is_correcte`) VALUES
(1, 'Matashi Kizimoto', 1, 0),
(2, 'Nanami Limitoso', 1, 0),
(3, 'Masashi Kishimoto', 1, 1),
(4, 'Masashi Kichimoto', 1, 0),
(5, 'ALLLO', 2, 0),
(6, 'HELLO', 2, 0),
(7, 'HIII', 2, 1),
(8, 'OKKK', 2, 0),
(9, 'MEHLISH', 3, 0),
(10, 'SMEH', 3, 0),
(11, 'SALEM', 3, 0),
(12, 'OKKK', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` int NOT NULL,
  `quizz_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `score_quizz_id_foreign` (`quizz_id`),
  KEY `score_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `nombre`, `quizz_id`, `user_id`) VALUES
(1, 1, 2, 2),
(2, 2, 2, 2),
(3, 0, 2, 2),
(4, 1, 2, 2),
(5, 2, 2, 2),
(6, 1, 2, 2),
(7, 1, 2, 2),
(8, 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(190) NOT NULL,
  `password` varchar(190) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_pseudo_unique` (`pseudo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`) VALUES
(2, 'test', '$2y$10$pdABFpD92LfIHr6dJoLIKe2vC8yK4QBMrBXnibqRUJFGBjW0ItGsi'),
(3, 'azdadz', '$2y$12$KD0iFLDtjE.Wy3OqdBTW/el9CTYfSdtkb54BGbj3RXrFD9wjMwtDa'),
(4, 'salem', '$2y$12$gQf1WC9dI3vS8X8lm9XfC.C7bZlXz72uiTktDINj8adXma/u1f0NC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
