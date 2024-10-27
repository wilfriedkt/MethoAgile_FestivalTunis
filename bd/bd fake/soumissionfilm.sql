-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 oct. 2024 à 20:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival_tunis`
--

-- --------------------------------------------------------

--
-- Structure de la table `soumissionfilm`
--

CREATE TABLE `soumissionfilm` (
  `idFilm` int(11) NOT NULL,
  `titreFilm` varchar(255) NOT NULL,
  `descriptionFilm` text NOT NULL,
  `dureeFilm` int(11) NOT NULL,
  `fichierFilm` varchar(255) NOT NULL,
  `afficheFilm` varchar(255) NOT NULL,
  `nomRealisateur` varchar(255) NOT NULL,
  `nomProducteur` varchar(255) NOT NULL,
  `emailProducteur` varchar(255) NOT NULL,
  `telephoneProducteur` varchar(20) DEFAULT NULL,
  `dateSoumission` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `soumissionfilm`
--

INSERT INTO `soumissionfilm` (`idFilm`, `titreFilm`, `descriptionFilm`, `dureeFilm`, `fichierFilm`, `afficheFilm`, `nomRealisateur`, `nomProducteur`, `emailProducteur`, `telephoneProducteur`, `dateSoumission`, `userId`) VALUES
(1, 'llkf', 'yunetbrv', 2, '', '', 'Wilfried', 'TOURE', '0565077511', '0565077511', '2024-10-21 18:34:00', 3),
(2, 'kiri', 'yjntrgvcfexdwzs', 8, '', '', 'Wilfried', 'TOURE', '0565077511', '0565077511', '2024-10-21 18:35:41', 3),
(3, 'jhtgbvfcd', 'yujnhtbgrvfced', 3, '', '', ';u,yjnbhtgvrcfxeds', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 18:44:40', 3),
(4, 'jhtgbvfcd', 'zsetrfgyuhji', -3, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 18:55:41', 3),
(5, 'jhtgbvfcd', 'I8JU7HGY6TFDRF', 3, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:01:17', 3),
(6, 'jhtgbvfcd', 'ytrfdseftg', 5, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:03:05', 3),
(7, 'jhtgbvfcd', 'htrfgftgyy', 4, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:04:30', 3),
(8, 'jhtgbvfcd', 'iujnybhtgvrfc', 4, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:09:16', 3),
(9, 'jhtgbvfcd', 'ytgfrcdxe', 7, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:15:51', 3),
(10, 'jhtgbvfcd', 'cfgvjhnk,l', 4, '', '', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:18:54', 3),
(11, 'ertpkol', 'ertfjiçàuygu', -5, 'uploads/fichiersFilms/mon forfait idéal.docx', 'uploads/affiches/2.jpg', 'Wilfried', 'TOURE', 'wilfriedtoure914@gmail.com', '0565077511', '2024-10-21 19:21:54', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `soumissionfilm`
--
ALTER TABLE `soumissionfilm`
  ADD PRIMARY KEY (`idFilm`),
  ADD KEY `fk_producteur` (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `soumissionfilm`
--
ALTER TABLE `soumissionfilm`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `soumissionfilm`
--
ALTER TABLE `soumissionfilm`
  ADD CONSTRAINT `fk_producteur` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
