-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 oct. 2024 à 22:20
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
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `numTel` bigint(20) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `motPasse` text NOT NULL,
  `ConfmotPasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `adresse`, `numTel`, `sexe`, `motPasse`, `ConfmotPasse`) VALUES
(1, 'TOURE', 'Wilfried Kigninman', 'wilfriedtoure914@gmail.com', 'Abidjan, Treichville', 565077511, 'M', '0db50ef1cc232f40a549f51d660735fe1a8d1a36', '0db50ef1cc232f40a549f51d660735fe1a8d1a36'),
(2, 'TOURE', 'Wilfried', 'wilfried@gmail.com', 'Abidjan, Treichville', 565077511, 'M', '0db50ef1cc232f40a549f51d660735fe1a8d1a36', '0db50ef1cc232f40a549f51d660735fe1a8d1a36'),
(3, 'konan', 'josue', 'josue@gmail.com', 'Abidjan, Treichville', 565077511, 'M', '9f3349ce16d0d0fe87881d8bb1c6f554684be366', '9f3349ce16d0d0fe87881d8bb1c6f554684be366'),
(4, 'Kouadio', 'Aurel', 'aurel@gmail.com', 'Abidjan, Treichville', 565077511, 'M', '5dda118c976d38724f833263719d460df5f2f389', '5dda118c976d38724f833263719d460df5f2f389');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
