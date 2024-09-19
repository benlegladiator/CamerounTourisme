-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 sep. 2024 à 08:52
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_tourisme`
--

-- --------------------------------------------------------

--
-- Structure de la table `sites_touristiques`
--

CREATE TABLE `sites_touristiques` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sites_touristiques`
--

INSERT INTO `sites_touristiques` (`id`, `nom`, `description`, `image`, `region_id`, `prix`) VALUES
(1, 'Mont Cameroun', 'Le Mont Cameroun est la plus haute montagne d\'Afrique de l\'Ouest.', 'montcameroun.jpeg', 1, '5000.00'),
(2, 'Parc National de Waza', 'Le Parc National de Waza est l\'un des parcs nationaux les plus importants du Cameroun.', 'mosgoum.jpg', 4, '3000.00'),
(3, 'Chutes de la Lobé', 'Les Chutes de la Lobé sont des chutes d\'eau spectaculaires situées dans la région du Sud.', 'chutte.jpg', 9, '2000.00'),
(4, 'Foumban Royal Palace', 'Le Palais Royal de Foumban est un site historique et culturel important.', 'musee.jpeg', 7, '2500.00'),
(5, 'Kribi', 'Kribi est une ville côtière connue pour ses plages magnifiques.', 'plagekribi.jpeg', 5, '4000.00'),
(6, 'Lac Nyos', 'Le Lac Nyos est un lac de cratère célèbre pour son histoire géologique.', 'adamaoua.jpeg', 3, '1500.00'),
(7, 'Parc National de Korup', 'Le Parc National de Korup est une réserve de biodiversité avec une faune et une flore riches.', 'park.jpeg', 10, '3500.00'),
(8, 'Réserve de faune du Dja', 'La Réserve de faune du Dja est un site du patrimoine mondial de l\'UNESCO.', 'resto.jpeg', 2, '3000.00'),
(9, 'Limbe Botanical Garden', 'Le Jardin Botanique de Limbe est un lieu de conservation des plantes et de détente.', 'park2.jpeg', 6, '2000.00'),
(10, 'Benoue National Park', 'Le Parc National de la Bénoué est une réserve naturelle avec une grande diversité d\'animaux.', 'plage2.jpg', 8, '3000.00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sites_touristiques`
--
ALTER TABLE `sites_touristiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sites_touristiques`
--
ALTER TABLE `sites_touristiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sites_touristiques`
--
ALTER TABLE `sites_touristiques`
  ADD CONSTRAINT `sites_touristiques_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
