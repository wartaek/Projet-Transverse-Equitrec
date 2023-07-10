-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 10 juil. 2023 à 09:13
-- Version du serveur : 8.0.32
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS = 0;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-transverse-32`
--

-- --------------------------------------------------------

--
-- Structure de la table `allure`
--

CREATE TABLE `allure` (
  `id` int NOT NULL,
  `val_allure` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `allure`
--

INSERT INTO `allure` (`id`, `val_allure`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_epreuve`
--

CREATE TABLE `categorie_epreuve` (
  `categorie_id` int NOT NULL,
  `epreuve_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cavalier`
--

CREATE TABLE `cavalier` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` int NOT NULL,
  `dossard` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cavalier`
--

INSERT INTO `cavalier` (`id`, `nom`, `prenom`, `license`, `dossard`) VALUES
(1, 'Dupont', 'Jean', 123456, '101'),
(2, 'Martin', 'Sophie', 654321, '102'),
(3, 'Dubois', 'Pierre', 987654, '103'),
(4, 'Lefebvre', 'Marie', 456789, '104'),
(5, 'Roux', 'Luc', 789456, '105'),
(6, 'Girard', 'Julie', 321654, '106'),
(7, 'test', 'test', 200, '203'),
(8, 'test', 'test', 120, '123456'),
(9, 'Nom', 'Prenom', 120, '123456'),
(10, 'france', 'gfd', 200, '600'),
(11, 'Nom', 'Prenom', 120, '123456'),
(12, 'Nom', 'Prenom', 120, '123456'),
(13, 'Enzo', 'coppel', 200, '123');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id` int NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id`, `nom`, `date`, `ville`, `cp`, `adresse`) VALUES
(1, 'Tournoi de tennis', '2023-07-08', 'Paris', '75001', '1 Rue de Rivoli'),
(2, 'Marathon de New York', '2023-07-08', 'New York', '10019', 'Central Park'),
(3, 'Championnat natation', '2023-07-08', 'Marseille', '13008', '8 Avenue de la Pointe Rouge'),
(4, 'Tournoi de golf', '2023-07-08', 'Nice', '06000', '123 Avenue des Fleurs'),
(5, 'Compétition gym', '2023-07-08', 'Lyon', '69002', '20 Rue de la République'),
(6, 'tennis', '2023-07-08', 'lyon', '69000', '22 revolat'),
(7, 'Coppel Julien', '2023-07-08', 'Saint-Romain-de-Jalionas', '38460', '22 Chemin du Revolat');

-- --------------------------------------------------------

--
-- Structure de la table `competition_cavalier`
--

CREATE TABLE `competition_cavalier` (
  `competition_id` int NOT NULL,
  `cavalier_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competition_cavalier`
--

INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES
(1, 1),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int NOT NULL,
  `val_contrat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `val_contrat`) VALUES
(1, 3),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230314152347', '2023-07-08 13:31:21', 3242),
('DoctrineMigrations\\Version20230317103555', '2023-07-08 13:31:24', 90),
('DoctrineMigrations\\Version20230416103206', '2023-07-08 13:31:24', 315),
('DoctrineMigrations\\Version20230609100036', '2023-07-08 13:31:24', 824),
('DoctrineMigrations\\Version20230609100212', '2023-07-08 13:31:25', 1343),
('DoctrineMigrations\\Version20230609100625', '2023-07-08 13:31:26', 230),
('DoctrineMigrations\\Version20230626141209', '2023-07-08 13:31:27', 575),
('DoctrineMigrations\\Version20230708112546', '2023-07-08 13:34:12', 157),
('DoctrineMigrations\\Version20230709171822', '2023-07-09 17:18:27', 125),
('DoctrineMigrations\\Version20230709200214', '2023-07-09 20:02:29', 218),
('DoctrineMigrations\\Version20230709201049', '2023-07-09 20:10:54', 398),
('DoctrineMigrations\\Version20230709201841', '2023-07-09 20:18:49', 278);

-- --------------------------------------------------------

--
-- Structure de la table `epreuve`
--

CREATE TABLE `epreuve` (
  `id` int NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `epreuve`
--

INSERT INTO `epreuve` (`id`, `nom`, `commentaire`) VALUES
(1, 'test', 'test'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `epreuve_competition`
--

CREATE TABLE `epreuve_competition` (
  `epreuve_id` int NOT NULL,
  `competition_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `epreuve_competition`
--

INSERT INTO `epreuve_competition` (`epreuve_id`, `competition_id`) VALUES
(1, 1),
(1, 3),
(1, 5),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `epreuve_obstacle`
--

CREATE TABLE `epreuve_obstacle` (
  `epreuve_id` int NOT NULL,
  `obstacle_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int NOT NULL,
  `cavalier_id` int DEFAULT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `cavalier_id`, `nom`) VALUES
(1, 1, 'Club Poney 2'),
(2, 2, 'Club Elite'),
(3, 3, 'Club 1'),
(4, 4, 'Club 1'),
(5, 5, 'Amateur 3'),
(6, 6, 'Amateur Elite'),
(7, 7, 'Amateur 3'),
(8, 8, 'Amateur 2'),
(9, 9, 'Amateur 1'),
(10, 10, 'Amateur Elite'),
(11, 11, 'Amateur 1'),
(12, 12, 'Amateur 1'),
(13, 13, 'Amateur 2');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int NOT NULL,
  `cavalier_id` int DEFAULT NULL,
  `niveau_id` int DEFAULT NULL,
  `style_id` int DEFAULT NULL,
  `contrat_id` int DEFAULT NULL,
  `allure_id` int DEFAULT NULL,
  `penalite_id` int DEFAULT NULL,
  `obstacle_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `cavalier_id`, `niveau_id`, `style_id`, `contrat_id`, `allure_id`, `penalite_id`, `obstacle_id`) VALUES
(3, 1, 1, 1, 1, 1, 1, 2),
(5, 1, 1, 2, 1, 1, 1, 1),
(8, 2, 2, 2, 2, NULL, 2, 2),
(9, 3, 3, 3, NULL, 3, 3, 3),
(10, 3, 3, 3, NULL, 3, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `obstacle`
--

CREATE TABLE `obstacle` (
  `id` int NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `obstacle`
--

INSERT INTO `obstacle` (`id`, `nom`) VALUES
(1, 'test'),
(2, 'test'),
(3, '3');

-- --------------------------------------------------------

--
-- Structure de la table `parametrer`
--

CREATE TABLE `parametrer` (
  `id` int NOT NULL,
  `hauteur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `largeur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temps_max` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parametrer_epreuve`
--

CREATE TABLE `parametrer_epreuve` (
  `parametrer_id` int NOT NULL,
  `epreuve_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parametrer_niveau`
--

CREATE TABLE `parametrer_niveau` (
  `parametrer_id` int NOT NULL,
  `niveau_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parametrer_obstacle`
--

CREATE TABLE `parametrer_obstacle` (
  `parametrer_id` int NOT NULL,
  `obstacle_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `penalite`
--

CREATE TABLE `penalite` (
  `id` int NOT NULL,
  `libelle_penalite` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val_penalite` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `penalite`
--

INSERT INTO `penalite` (`id`, `libelle_penalite`, `description`, `val_penalite`) VALUES
(1, 'TB', NULL, 2),
(2, 'tt', NULL, 5),
(3, '3', '3', 3);

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

CREATE TABLE `style` (
  `id` int NOT NULL,
  `val_style` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `style`
--

INSERT INTO `style` (`id`, `val_style`) VALUES
(1, 4),
(2, 5),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `competition_id` int DEFAULT NULL,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `competition_id`, `email`, `roles`, `password`, `name`, `last_login`, `register_date`) VALUES
(1, NULL, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$kjlOQRQ7mCVZa1Pvx8VhU.hhQSCvqSxzrWkEXpM5Vbpoth2w6QlzO', 'admin', '2023-07-08 15:34:30', '2023-07-08 14:09:57'),
(2, 2, 'testbdd@test', '[]', '$2y$13$EsvUETRPQOn8B/4TEewjYO3yk7MxUyQi1Iivq5U0HA3YAmLRnGqZi', 'testBDD', '2023-06-26 19:30:26', '2023-06-26 19:30:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allure`
--
ALTER TABLE `allure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_epreuve`
--
ALTER TABLE `categorie_epreuve`
  ADD PRIMARY KEY (`categorie_id`,`epreuve_id`),
  ADD KEY `IDX_892E4ADDBCF5E72D` (`categorie_id`),
  ADD KEY `IDX_892E4ADDAB990336` (`epreuve_id`);

--
-- Index pour la table `cavalier`
--
ALTER TABLE `cavalier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competition_cavalier`
--
ALTER TABLE `competition_cavalier`
  ADD PRIMARY KEY (`competition_id`,`cavalier_id`),
  ADD KEY `IDX_CEA883887B39D312` (`competition_id`),
  ADD KEY `IDX_CEA883886965C0EA` (`cavalier_id`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `epreuve`
--
ALTER TABLE `epreuve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `epreuve_competition`
--
ALTER TABLE `epreuve_competition`
  ADD PRIMARY KEY (`epreuve_id`,`competition_id`),
  ADD KEY `IDX_113EE93DAB990336` (`epreuve_id`),
  ADD KEY `IDX_113EE93D7B39D312` (`competition_id`);

--
-- Index pour la table `epreuve_obstacle`
--
ALTER TABLE `epreuve_obstacle`
  ADD PRIMARY KEY (`epreuve_id`,`obstacle_id`),
  ADD KEY `IDX_28E472D2AB990336` (`epreuve_id`),
  ADD KEY `IDX_28E472D2F616DCDF` (`obstacle_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4BDFF36B6965C0EA` (`cavalier_id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFBDFA14F616DCDF` (`obstacle_id`),
  ADD KEY `IDX_CFBDFA14D0CCF327` (`penalite_id`),
  ADD KEY `IDX_CFBDFA146965C0EA` (`cavalier_id`),
  ADD KEY `IDX_CFBDFA14B3E9C81` (`niveau_id`),
  ADD KEY `IDX_CFBDFA14BACD6074` (`style_id`),
  ADD KEY `IDX_CFBDFA141823061F` (`contrat_id`),
  ADD KEY `IDX_CFBDFA142B4626E2` (`allure_id`);

--
-- Index pour la table `obstacle`
--
ALTER TABLE `obstacle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametrer`
--
ALTER TABLE `parametrer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametrer_epreuve`
--
ALTER TABLE `parametrer_epreuve`
  ADD PRIMARY KEY (`parametrer_id`,`epreuve_id`),
  ADD KEY `IDX_7E96F6B3FC1282CB` (`parametrer_id`),
  ADD KEY `IDX_7E96F6B3AB990336` (`epreuve_id`);

--
-- Index pour la table `parametrer_niveau`
--
ALTER TABLE `parametrer_niveau`
  ADD PRIMARY KEY (`parametrer_id`,`niveau_id`),
  ADD KEY `IDX_17126AC6FC1282CB` (`parametrer_id`),
  ADD KEY `IDX_17126AC6B3E9C81` (`niveau_id`);

--
-- Index pour la table `parametrer_obstacle`
--
ALTER TABLE `parametrer_obstacle`
  ADD PRIMARY KEY (`parametrer_id`,`obstacle_id`),
  ADD KEY `IDX_5EC5E838FC1282CB` (`parametrer_id`),
  ADD KEY `IDX_5EC5E838F616DCDF` (`obstacle_id`);

--
-- Index pour la table `penalite`
--
ALTER TABLE `penalite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D6497B39D312` (`competition_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allure`
--
ALTER TABLE `allure`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cavalier`
--
ALTER TABLE `cavalier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `epreuve`
--
ALTER TABLE `epreuve`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `obstacle`
--
ALTER TABLE `obstacle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `parametrer`
--
ALTER TABLE `parametrer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `penalite`
--
ALTER TABLE `penalite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `style`
--
ALTER TABLE `style`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_epreuve`
--
ALTER TABLE `categorie_epreuve`
  ADD CONSTRAINT `FK_892E4ADDAB990336` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuve` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_892E4ADDBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `competition_cavalier`
--
ALTER TABLE `competition_cavalier`
  ADD CONSTRAINT `FK_CEA883886965C0EA` FOREIGN KEY (`cavalier_id`) REFERENCES `cavalier` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CEA883887B39D312` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `epreuve_competition`
--
ALTER TABLE `epreuve_competition`
  ADD CONSTRAINT `FK_113EE93D7B39D312` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_113EE93DAB990336` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuve` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `epreuve_obstacle`
--
ALTER TABLE `epreuve_obstacle`
  ADD CONSTRAINT `FK_28E472D2AB990336` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuve` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_28E472D2F616DCDF` FOREIGN KEY (`obstacle_id`) REFERENCES `obstacle` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `FK_4BDFF36B6965C0EA` FOREIGN KEY (`cavalier_id`) REFERENCES `cavalier` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA141823061F` FOREIGN KEY (`contrat_id`) REFERENCES `contrat` (`id`),
  ADD CONSTRAINT `FK_CFBDFA142B4626E2` FOREIGN KEY (`allure_id`) REFERENCES `allure` (`id`),
  ADD CONSTRAINT `FK_CFBDFA146965C0EA` FOREIGN KEY (`cavalier_id`) REFERENCES `cavalier` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14BACD6074` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14D0CCF327` FOREIGN KEY (`penalite_id`) REFERENCES `penalite` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14F616DCDF` FOREIGN KEY (`obstacle_id`) REFERENCES `obstacle` (`id`);

--
-- Contraintes pour la table `parametrer_epreuve`
--
ALTER TABLE `parametrer_epreuve`
  ADD CONSTRAINT `FK_7E96F6B3AB990336` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuve` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7E96F6B3FC1282CB` FOREIGN KEY (`parametrer_id`) REFERENCES `parametrer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parametrer_niveau`
--
ALTER TABLE `parametrer_niveau`
  ADD CONSTRAINT `FK_17126AC6B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_17126AC6FC1282CB` FOREIGN KEY (`parametrer_id`) REFERENCES `parametrer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parametrer_obstacle`
--
ALTER TABLE `parametrer_obstacle`
  ADD CONSTRAINT `FK_5EC5E838F616DCDF` FOREIGN KEY (`obstacle_id`) REFERENCES `obstacle` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5EC5E838FC1282CB` FOREIGN KEY (`parametrer_id`) REFERENCES `parametrer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6497B39D312` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET FOREIGN_KEY_CHECKS = 1;
