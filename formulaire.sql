-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 avr. 2024 à 14:09
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
-- Base de données : `formulaire`
Drop database if exists formulaire;
CREATE database if not exists formulaire char set='utf8';
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id`  int AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `demandes_contact`
--

CREATE TABLE `demandes_contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_demande` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandes_contact`
--

INSERT INTO `demandes_contact` (`id`, `nom`, `email`, `message`, `date_demande`) VALUES
(1, 'Tamboula', 'arthurotamboula10@gmail.com', 'bomjour le monde', '2024-04-10 05:41:35');

-- --------------------------------------------------------

--
-- Structure de la table `demandes_inscription_stages`
--

CREATE TABLE `demandes_inscription_stages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `stage` varchar(255) NOT NULL,
  `commentaires` text DEFAULT NULL,
  `date_demande` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandes_inscription_stages`
--

INSERT INTO `demandes_inscription_stages` (`id`, `nom`, `email`, `date_naissance`, `stage`, `commentaires`, `date_demande`) VALUES
(1, 'arthur', 'kabreltagouyem@gmail.com', '2001-10-04', 'Stage 1', '', '2024-04-10 05:52:32'),
(2, 'arthur', 'kabreltagouyem@gmail.com', '2001-10-04', 'Stage 1', '', '2024-04-10 05:53:22'),
(3, 'arthur', 'kabreltagouyem@gmail.com', '2001-10-04', 'Stage 2', '', '2024-04-10 05:53:53'),
(4, 'kabrel', 'aakabrel@gmail.com', '2000-06-22', 'Stage 2', 'stage stage stage', '2024-04-10 05:56:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demandes_contact`
--
ALTER TABLE `demandes_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandes_inscription_stages`
--
ALTER TABLE `demandes_inscription_stages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demandes_contact`
--
ALTER TABLE `demandes_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demandes_inscription_stages`
--
ALTER TABLE `demandes_inscription_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
