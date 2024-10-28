-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 oct. 2024 à 07:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `email`, `motPasse`, `telephone`, `date_creation`) VALUES
(1, 'ulo', 'oli', 'ulo@gmail.com', '@ulo', NULL, '2024-10-28 04:34:23');

-- --------------------------------------------------------

--
-- Structure de la table `films_rejetes`
--

CREATE TABLE `films_rejetes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fichier` varchar(255) NOT NULL,
  `date_rejet` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `films_retenus`
--

CREATE TABLE `films_retenus` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fichier` varchar(255) NOT NULL,
  `date_retenue` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `films_retenus`
--

INSERT INTO `films_retenus` (`id`, `titre`, `description`, `image`, `fichier`, `date_retenue`) VALUES
(1, 'BROOK', NULL, NULL, '', '2024-10-27 12:40:51'),
(2, 'ertpkol', 'ertfjiçàuygu', 'uploads/affiches/2.jpg', '', '2024-10-27 12:42:46'),
(3, 'BROOK', 'documentaire', 'uploads/affiches/Capture d\'écran 2024-10-24 112032.png', 'uploads/fichiersFilms/TWIN 3.pdf', '2024-10-27 13:05:10'),
(4, 'SEAUO', 'Un film doc', 'uploads/affiches/Capture d\'écran 2024-07-11 144435.png', 'uploads/fichiersFilms/TWIN 3.pdf', '2024-10-27 15:17:56'),
(5, 'BROOK', 'DOC FILM QUI DECRI LES HABITUDES DES ANIMAUX SAUVAGES EN EUROPE', 'uploads/affiches/téléchargement (3).jpeg', 'uploads/fichiersFilms/05_2nde_p_Chapitre_5_Refraction_et_dispersion_de_la_lumiere.pdf', '2024-10-27 15:17:59'),
(6, 'BOOK', 'Un film documentaire', 'uploads/affiches/9-La-science-des-reves.jpg', 'uploads/fichiersFilms/Creer-un-site-de-e-commerce.pdf', '2024-10-28 05:44:37'),
(7, 'MABITO', 'Un film doc', 'uploads/affiches/6-Cinema_Paradiso.jpg', 'uploads/fichiersFilms/METHO AGILE RAPPORT ICESCRUM.pdf', '2024-10-28 05:44:40'),
(8, 'MIKE', 'un film de fleur', 'uploads/affiches/12-Looking-for-Eric.jpg', 'uploads/fichiersFilms/ARRETE INTERDICTION FESCI.pdf', '2024-10-28 05:44:42'),
(9, 'BROOK', 'Un film documentaire pour les animaux', 'uploads/affiches/2-Le-gout-des-autres.jpg', 'uploads/fichiersFilms/projet agile 1.docx', '2024-10-28 05:58:00');

-- --------------------------------------------------------

--
-- Structure de la table `projectionfilm`
--

CREATE TABLE `projectionfilm` (
  `idProjection` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date_projection` date NOT NULL,
  `heure_projection` time NOT NULL,
  `lieu_projection` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projectionfilm`
--

INSERT INTO `projectionfilm` (`idProjection`, `id`, `date_projection`, `heure_projection`, `lieu_projection`) VALUES
(1, 6, '2024-10-29', '09:45:00', 'Place Tunis'),
(2, 7, '2024-10-30', '13:45:00', 'Labu'),
(3, 8, '2024-11-02', '10:46:00', 'LOOKD');

-- --------------------------------------------------------

--
-- Structure de la table `responsable_production`
--

CREATE TABLE `responsable_production` (
  `idResponsable` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `responsable_production`
--

INSERT INTO `responsable_production` (`idResponsable`, `nom`, `prenom`, `email`, `telephone`, `motPasse`, `date_creation`) VALUES
(1, 'geek', 'geek', 'geek@gmail.com', '0565077511', '@geek', '2024-10-27 11:34:11'),
(2, 'KOKO', 'FRANCK', 'jeady@gmail.com', '0565077511', '$2y$10$RNVCRy6ae/UEgGtswb6zxOgqA32ScZesOAQXpoju/LzRVcwe8l24u', '2024-10-28 04:35:30'),
(4, 'KOKO', 'FRANCK', 'jeadyy@gmail.com', '0565077511', '$2y$10$joSg9SkaZp676LOvfQo/2OWpXUJ5IP3gDeaSIzut8nB/RoRXwl4yi', '2024-10-28 04:38:09'),
(7, 'TOURE', 'Wilfried', 'wilfriedtoure91d4@gmail.com', '0565077511', '$2y$10$7GOOgc3iFqKpzHwHZ.w6oOHaxsO0KFn4N0kK9TKW8OhbVQWh3LMrK', '2024-10-28 04:40:49'),
(9, 'TOURE', 'Wilfried', 'toure914@gmail.com', '0565077511', '$2y$10$lgxQyrsuh8UmnBo1Id2H.eGkVBQ6acJpHT7aFIVEpdqMLnVXQvKNW', '2024-10-28 04:42:19');

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
(3, 'konan', 'josue', 'josue@gmail.com', 'Abidjan, Treichville', 565077511, 'Homme', '9f3349ce16d0d0fe87881d8bb1c6f554684be366', '9f3349ce16d0d0fe87881d8bb1c6f554684be366'),
(4, 'Kouadio', 'Aurel', 'aurel@gmail.com', 'Abidjan, Treichville', 565077511, 'M', '5dda118c976d38724f833263719d460df5f2f389', '5dda118c976d38724f833263719d460df5f2f389'),
(5, 'KOFFI', 'Wilfried', 'wilfriedtoure914@gmail.com', 'Étudiant à l&#039;École Supérieure Africaine des T', 565077511, 'Homme', '???OT?Z??;?k??ʀ>?', ''),
(6, 'KOFFI', 'Wilfried', 'wilfriedtoure914@gmail.com', 'Étudiant à l&#039;École Supérieure Africaine des T', 565077511, 'Homme', '???OT?Z??;?k??ʀ>?', ''),
(7, 'SAMA', 'YODI', 'wilfriedtoure914@gmail.com', 'Étudiant à l&#039;École Supérieure Africaine des T', 565077511, 'Homme', '??#}yʈ?dd??\r?cEQ9d', ''),
(8, 'SAMA', 'YODI', 'wilfriedtoure914@gmail.com', 'Étudiant à l&#039;École Supérieure Africaine des T', 565077511, 'Homme', '??#}yʈ?dd??\r?cEQ9d', ''),
(9, 'TOURE', 'Wilfried', 'wilfriedtoure914@gmail.com', 'Étudiant à l&#039;École Supérieure Africaine des T', 565077511, 'Homme', '??#}yʈ?dd??\r?cEQ9d', ''),
(10, 'TOURE', 'Wilfried', 'wilfriedtoure914@gmail.com', 'Étudiant à l&#039;École Supérieure Africaine des T', 565077511, 'Homme', '??#}yʈ?dd??\r?cEQ9d', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `films_rejetes`
--
ALTER TABLE `films_rejetes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films_retenus`
--
ALTER TABLE `films_retenus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projectionfilm`
--
ALTER TABLE `projectionfilm`
  ADD PRIMARY KEY (`idProjection`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `responsable_production`
--
ALTER TABLE `responsable_production`
  ADD PRIMARY KEY (`idResponsable`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `soumissionfilm`
--
ALTER TABLE `soumissionfilm`
  ADD PRIMARY KEY (`idFilm`),
  ADD KEY `fk_producteur` (`userId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `films_rejetes`
--
ALTER TABLE `films_rejetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `films_retenus`
--
ALTER TABLE `films_retenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `projectionfilm`
--
ALTER TABLE `projectionfilm`
  MODIFY `idProjection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `responsable_production`
--
ALTER TABLE `responsable_production`
  MODIFY `idResponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `soumissionfilm`
--
ALTER TABLE `soumissionfilm`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projectionfilm`
--
ALTER TABLE `projectionfilm`
  ADD CONSTRAINT `projectionfilm_ibfk_1` FOREIGN KEY (`id`) REFERENCES `films_retenus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `soumissionfilm`
--
ALTER TABLE `soumissionfilm`
  ADD CONSTRAINT `fk_producteur` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
