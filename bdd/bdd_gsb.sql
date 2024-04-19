-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 avr. 2024 à 14:31
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsb-cake`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `authentification` (IN `etat` INT, IN `login` VARCHAR(255))   BEGIN
	INSERT INTO `authentification` (`nom_utilisateur`, `etat`) VALUES (login, etat);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `id` int NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id`, `nom_utilisateur`, `date`, `etat`) VALUES
(4, 'testerreur', '2024-04-18 22:00:00', 0),
(5, 'testerreur', '2024-04-18 22:00:00', 0),
(7, 'utilisateur', '2024-04-19 13:16:47', 0),
(8, 'eidjeid', '2024-04-19 13:17:02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2023-10-13 07:26:10', '2023-10-13 07:26:10', 0),
(20161031101316, 'AddSecretToUsers', '2023-10-13 07:26:10', '2023-10-13 07:26:10', 0),
(20190208174112, 'AddAdditionalDataToUsers', '2023-10-13 07:26:10', '2023-10-13 07:26:10', 0),
(20210929202041, 'AddLastLoginToUsers', '2023-10-13 07:26:10', '2023-10-13 07:26:10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` int NOT NULL,
  `etat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `etat`) VALUES
(1, 'Créée'),
(2, 'Cloturée'),
(3, 'Validée'),
(4, 'Mise en paiement'),
(5, 'Remboursée');

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE `fiches` (
  `id` int NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etat_id` int NOT NULL,
  `datemodif` timestamp NOT NULL,
  `montantvalide` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `user_id`, `etat_id`, `datemodif`, `montantvalide`, `date`) VALUES
(41, '8fb76d11-f4ea-4a2f-9dbd-cfac2611cdd8', 3, '2024-03-17 09:08:20', '600', '2024-01-01'),
(42, '8fb76d11-f4ea-4a2f-9dbd-cfac2611cdd8', 2, '2024-04-06 17:18:22', '160', '2024-02-01');

-- --------------------------------------------------------

--
-- Structure de la table `fiches_lignefraisforfaits`
--

CREATE TABLE `fiches_lignefraisforfaits` (
  `fiche_id` int NOT NULL,
  `lignefraisforfait_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches_lignefraisforfaits`
--

INSERT INTO `fiches_lignefraisforfaits` (`fiche_id`, `lignefraisforfait_id`) VALUES
(41, 45),
(42, 46),
(41, 47),
(41, 48),
(41, 49),
(42, 50);

-- --------------------------------------------------------

--
-- Structure de la table `fiches_lignefraishfs`
--

CREATE TABLE `fiches_lignefraishfs` (
  `lignefraishf_id` int NOT NULL,
  `fiche_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiches_lignefraishfs`
--

INSERT INTO `fiches_lignefraishfs` (`lignefraishf_id`, `fiche_id`) VALUES
(19, 41),
(20, 41),
(22, 42);

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfaits`
--

CREATE TABLE `fraisforfaits` (
  `id` int NOT NULL,
  `montant` int NOT NULL,
  `label` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fraisforfaits`
--

INSERT INTO `fraisforfaits` (`id`, `montant`, `label`) VALUES
(1, 250, 'Hebergement'),
(2, 150, 'Restaurant'),
(3, 50, 'Taxi');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfaits`
--

CREATE TABLE `lignefraisforfaits` (
  `id` int NOT NULL,
  `fraisforfait_id` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignefraisforfaits`
--

INSERT INTO `lignefraisforfaits` (`id`, `fraisforfait_id`, `quantite`) VALUES
(43, 1, 1),
(44, 1, 5),
(45, 1, 9),
(46, 1, 3),
(47, 2, 3),
(48, 3, 5),
(49, 2, 5),
(50, 3, 12);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishfs`
--

CREATE TABLE `lignefraishfs` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `montant` int NOT NULL,
  `label` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignefraishfs`
--

INSERT INTO `lignefraishfs` (`id`, `date`, `montant`, `label`) VALUES
(18, '2024-01-03', 350, 'Evenement'),
(19, '2024-03-01', 400, 'Evenement'),
(20, '2024-03-01', 120, 'Evenement'),
(22, '2024-01-01', 200, 'Evenement');

-- --------------------------------------------------------

--
-- Structure de la table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token_secret` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`, `additional_data`, `last_login`) VALUES
('5b8e3787-6bc2-4eac-b047-39c38a0eb6fa', 'comptable', 'comptable.test@gmail.com', '$2y$10$5Vp2pt5I0I0n12R5jp4Bd.SwSKUwW4ryvypoMPUC6jQdmUojqJgZa', 'Comptable', 'test', '9cd1ed53bf80f92621600f21cf141e0f', '2024-03-13 18:13:54', NULL, NULL, NULL, NULL, '2024-03-13 17:13:54', 1, 0, 'comptable', '2024-03-13 17:13:54', '2024-03-13 17:13:54', NULL, '2024-03-17 09:07:57'),
('8fb76d11-f4ea-4a2f-9dbd-cfac2611cdd8', 'utilisateur', 'aurelienwiart24@gmail.com', '$2y$10$nIcPsc1hFF7iOZy4fK6BOOAqodHWJO72tElLXUU.IxtY30CMhPqyi', 'Aurélien', 'Wiart', '7be84bf03acce32c36d6e5b5c018c460', '2024-03-14 23:04:01', '0b3ef2bda4473aee2fa7', NULL, NULL, NULL, '2024-03-07 08:19:46', 1, 0, 'user', '2024-03-07 08:19:46', '2024-03-14 22:04:01', NULL, '2024-04-06 17:17:16'),
('93585189-5908-4ee9-b02b-e3490d40d444', 'admin', 'admintest@gmail.com', '$2y$10$rRkMfqi379IvkOZlGWwQIe8pc2Pm5OHBzntzdTJFSM7XB/uSFiwwW', 'admin', 'admin', '8f343d80e9f152fcb020204f2fd74d0f', '2024-03-16 19:55:36', NULL, NULL, NULL, NULL, '2024-03-16 18:55:36', 1, 1, 'superuser', '2024-03-16 18:55:36', '2024-03-16 18:55:36', NULL, '2024-03-16 18:56:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hhh` (`user_id`),
  ADD KEY `kuyfyufuy` (`etat_id`);

--
-- Index pour la table `fiches_lignefraisforfaits`
--
ALTER TABLE `fiches_lignefraisforfaits`
  ADD PRIMARY KEY (`fiche_id`,`lignefraisforfait_id`),
  ADD KEY `lolki` (`lignefraisforfait_id`);

--
-- Index pour la table `fiches_lignefraishfs`
--
ALTER TABLE `fiches_lignefraishfs`
  ADD PRIMARY KEY (`lignefraishf_id`,`fiche_id`),
  ADD KEY `hhfh` (`fiche_id`);

--
-- Index pour la table `fraisforfaits`
--
ALTER TABLE `fraisforfaits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfaits`
--
ALTER TABLE `lignefraisforfaits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ihbuhbu` (`fraisforfait_id`);

--
-- Index pour la table `lignefraishfs`
--
ALTER TABLE `lignefraishfs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `fraisforfaits`
--
ALTER TABLE `fraisforfaits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `lignefraisforfaits`
--
ALTER TABLE `lignefraisforfaits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `lignefraishfs`
--
ALTER TABLE `lignefraishfs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD CONSTRAINT `hhh` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kuyfyufuy` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`);

--
-- Contraintes pour la table `fiches_lignefraisforfaits`
--
ALTER TABLE `fiches_lignefraisforfaits`
  ADD CONSTRAINT `jijhi` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `lolki` FOREIGN KEY (`lignefraisforfait_id`) REFERENCES `lignefraisforfaits` (`id`);

--
-- Contraintes pour la table `fiches_lignefraishfs`
--
ALTER TABLE `fiches_lignefraishfs`
  ADD CONSTRAINT `hhfh` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `mpm` FOREIGN KEY (`lignefraishf_id`) REFERENCES `lignefraishfs` (`id`);

--
-- Contraintes pour la table `lignefraisforfaits`
--
ALTER TABLE `lignefraisforfaits`
  ADD CONSTRAINT `LigneFraisforfait_Fraisforfaits` FOREIGN KEY (`fraisforfait_id`) REFERENCES `fraisforfaits` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
