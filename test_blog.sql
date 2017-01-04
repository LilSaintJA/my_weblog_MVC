-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Janvier 2017 à 17:49
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_post` int(11) NOT NULL,
  `titre_post` varchar(255) COLLATE utf8_bin NOT NULL,
  `content_post` longtext COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `billet`
--

INSERT INTO `billet` (`id_post`, `titre_post`, `content_post`, `date`, `id_cat`) VALUES
(1, 'Mon titre', 'The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. For the last time, I don\'t like lilacs! Your \'first\' wife was the one who liked lilacs!\n\nI found what I need. And it\'s not friends, it\'s things. Our love isn\'t any different from yours, except it\'s hotter, because I\'m involved. Now Fry, it\'s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal?', '2016-12-30 18:21:31', 1),
(2, 'Mon titre', 'The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. For the last time, I don\'t like lilacs! Your \'first\' wife was the one who liked lilacs!\n\nI found what I need. And it\'s not friends, it\'s things. Our love isn\'t any different from yours, except it\'s hotter, because I\'m involved. Now Fry, it\'s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal?', '2016-12-30 18:27:15', 2),
(3, 'Mon titre', 'The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. For the last time, I don\'t like lilacs! Your \'first\' wife was the one who liked lilacs!\n\nI found what I need. And it\'s not friends, it\'s things. Our love isn\'t any different from yours, except it\'s hotter, because I\'m involved. Now Fry, it\'s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal?', '2016-12-30 18:29:26', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `titre_cat` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `titre_cat`) VALUES
(1, 'Piscine'),
(2, 'Long Board');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
