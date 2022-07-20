-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 juil. 2022 à 12:44
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
-- Base de données : `inta_online`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `commentaires_id` int(11) NOT NULL,
  `commentaires_auteur` int(11) NOT NULL,
  `commentaires_cours` int(11) NOT NULL,
  `commentaires_date` int(11) NOT NULL,
  `commentaires_texte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`commentaires_id`, `commentaires_auteur`, `commentaires_cours`, `commentaires_date`, `commentaires_texte`) VALUES
(1, 3, 3, 1649221264, 'Bonjour'),
(2, 3, 3, 1649221981, 'cc'),
(3, 3, 3, 1649856783, 'Fuck you');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `compte_id` int(11) NOT NULL,
  `compte_user_mail` varchar(30) NOT NULL,
  `compte_password` varchar(15) NOT NULL,
  `compte_confirmed_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `cours_id` int(11) NOT NULL,
  `cours_nom` varchar(255) NOT NULL,
  `cours_auteur` varchar(255) NOT NULL,
  `cours_module` varchar(255) NOT NULL,
  `cours_image` varchar(255) NOT NULL,
  `cours_description` text NOT NULL,
  `cours_prix` varchar(255) NOT NULL,
  `cours_prix2` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`cours_id`, `cours_nom`, `cours_auteur`, `cours_module`, `cours_image`, `cours_description`, `cours_prix`, `cours_prix2`) VALUES
(2, 'z', '1646630346.png', 'Informatique', '1646630346.png', '', '', ''),
(3, 'qssqdqs', '1646713609.jpg', 'Informatique', '1646713609.jpg', 'commeserfsd', '14SDS', '');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `etudiants_id` int(11) NOT NULL,
  `etudiants_nom` varchar(255) NOT NULL,
  `etudiants_prenom` varchar(255) NOT NULL,
  `etudiants_email` varchar(255) NOT NULL,
  `etudiants_module` varchar(255) DEFAULT NULL,
  `etudiants_phone` varchar(255) NOT NULL,
  `etudiants_inscription` int(11) NOT NULL,
  `etudiants_localite` varchar(255) NOT NULL,
  `etudiants_password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`etudiants_id`, `etudiants_nom`, `etudiants_prenom`, `etudiants_email`, `etudiants_module`, `etudiants_phone`, `etudiants_inscription`, `etudiants_localite`, `etudiants_password`) VALUES
(1, 'Auguste', 'Joker', 'soter@soter.tg', NULL, '******', 1646022021, 'kara', '65d40a2fc8d8dcbe280707c0fffe04c724f4e1ff'),
(3, 'Auguste', 'Joker', 'auguste.deo@gmail.com', NULL, '+22892547577', 1646086255, 'kara', '65d40a2fc8d8dcbe280707c0fffe04c724f4e1ff');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `inscription_id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `videos_id` int(11) NOT NULL,
  `videos_nom` varchar(255) NOT NULL,
  `videos_cours` int(11) NOT NULL,
  `videos_url` varchar(255) NOT NULL,
  `videos_rang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`videos_id`, `videos_nom`, `videos_cours`, `videos_url`, `videos_rang`) VALUES
(1, 'CV Auguste ALIDOU.pdf', 2, 'uploads/CV Auguste ALIDOU.pdf', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`commentaires_id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`compte_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`cours_id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`etudiants_id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`inscription_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `commentaires_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `compte_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `cours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `etudiants_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `inscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
