-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 17 Décembre 2013 à 14:37
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `naouf`
--

-- --------------------------------------------------------

--
-- Structure de la table `nf`
--

CREATE TABLE IF NOT EXISTS `nf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `nf`
--

INSERT INTO `nf` (`id`, `artist`, `title`) VALUES
(2, 'Katia', 'Himeur'),
(3, 'Moustakbel', 'Jihane'),
(4, 'El frihmat', 'Mohamed'),
(5, 'Boumersal', 'Firdaous'),
(6, 'Said', 'Maroua'),
(7, 'Chttou', 'Soukaina'),
(8, 'billel', 'Remki'),
(9, 'Ghandri', 'Naoufel'),
(10, 'Abddelahfid', 'Bouchetouf'),
(11, 'haifi', 'Anas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
