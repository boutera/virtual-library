-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 sep. 2020 à 23:39
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ehtpreads`
--

-- --------------------------------------------------------

--
-- Structure de la table `affiche_rate`
--

CREATE TABLE `affiche_rate` (
  `idrate` int(10) NOT NULL,
  `idisbn` int(10) NOT NULL,
  `averrage` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affiche_rate`
--

INSERT INTO `affiche_rate` (`idrate`, `idisbn`, `averrage`) VALUES
(6, 26, 4),
(7, 26, 4),
(8, 26, 3),
(9, 1, 5),
(10, 1, 4.5),
(11, 2, 4),
(12, 3, 1),
(13, 19, 5),
(14, 23, 3),
(16, 30, 5),
(17, 32, 5),
(18, 31, 5),
(19, 30, 5),
(20, 32, 5),
(21, 31, 5),
(22, 30, 5),
(23, 32, 5),
(24, 31, 5),
(25, 26, 3),
(26, 30, 5),
(27, 3, 1),
(28, 3, 1),
(29, 3, 1),
(30, 3, 1),
(31, 3, 1),
(32, 3, 1),
(33, 3, 1),
(34, 3, 1),
(35, 3, 1),
(36, 21, 5),
(37, 21, 5),
(38, 21, 5),
(39, 32, 5),
(40, 26, 3),
(41, 24, 2),
(42, 24, 2),
(43, 26, 3),
(44, 26, 3),
(45, 26, 3),
(46, 26, 3),
(47, 26, 3),
(48, 26, 3),
(49, 26, 3),
(50, 26, 3),
(51, 3, 3),
(52, 22, 5),
(53, 1, 4.66667),
(54, 32, 5),
(55, 38, 4),
(56, 38, 4),
(57, 38, 4),
(58, 38, 4),
(59, 38, 4),
(60, 37, 4),
(61, 37, 4),
(62, 37, 4),
(63, 37, 4),
(64, 37, 4),
(65, 35, 2),
(66, 35, 2),
(67, 35, 2),
(68, 35, 2),
(69, 35, 2),
(70, 35, 2),
(71, 35, 2),
(72, 35, 2.66667),
(73, 34, 5),
(74, 36, 4);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `idAuteur` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `bio` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`idAuteur`, `nom`, `dateDeNaissance`, `bio`) VALUES
(155, 'william shaksper', '1956-07-07', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(15, 'victor hugo', '1949-01-03', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6321, 'whine rooney', '1989-01-12', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6322, 'aterr', '1996-08-13', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6323, 'mychel donnarts', '2010-08-29', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6324, 'mychel donnarts', '2011-08-10', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6325, 'shin moorey', '2011-08-15', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6326, 'dan saracusta', '2017-07-25', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6327, 'jax moulin', '2001-03-07', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6328, 'aron dieger', '2013-02-21', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6329, 'houcine', '2006-02-07', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6332, 'sophie white', '2009-09-02', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6333, 'sophie andrie', '2013-08-11', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6334, 'ronald amir', '2005-04-05', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6335, 'ronald amir', '2011-05-05', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6336, 'dorro san', '2020-08-13', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6337, 'dgdggdg', '2020-08-26', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6338, 'dgdggdg', '2020-08-26', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6339, 'aefeffzf', '2020-08-03', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6340, 'jak viona', '2020-08-19', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6341, 'Ben Forta', '2020-07-27', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6342, 'olivier cauet', '2020-08-03', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6343, 'Ben Forta', '2020-08-03', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.');

-- --------------------------------------------------------

--
-- Structure de la table `biblio`
--

CREATE TABLE `biblio` (
  `idbiblio` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `numisbn` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `biblio`
--

INSERT INTO `biblio` (`idbiblio`, `user`, `numisbn`) VALUES
(8, 'Hayat Amhid', 32),
(7, 'Hayat Amhid', 31),
(6, 'Hayat Amhid', 30),
(9, 'boutera youssef', 21),
(10, 'boutera youssef', 25),
(11, 'kirito', 22),
(12, 'kirito', 27),
(13, 'kirito', 2),
(14, 'kirito', 1),
(15, 'kirito', 26),
(16, 'melio', 19),
(17, 'melio', 23),
(18, 'melio', 24),
(19, 'dazai', 33),
(20, 'dazai', 34),
(21, 'natsu', 35),
(22, 'dazai', 36),
(23, 'houssine', 37),
(24, 'houssine', 38),
(25, 'houssinee', 39);

-- --------------------------------------------------------

--
-- Structure de la table `book_comments`
--

CREATE TABLE `book_comments` (
  `idComment` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `book_comments`
--

INSERT INTO `book_comments` (`idComment`, `idUtilisateur`, `idLivre`, `contenu`, `dateCreation`) VALUES
(1, 13, 1, 'un commentaire', '2020-08-19 19:55:43'),
(2, 13, 1, 'loved it', '2020-08-19 20:25:48'),
(3, 13, 1, 'good book', '2020-08-19 21:55:19'),
(4, 13, 1, 'hello', '2020-08-19 22:11:46'),
(5, 13, 1, 'bonjour', '2020-08-19 22:25:21'),
(6, 13, 1, 'awesome', '2020-08-19 22:36:36'),
(7, 13, 2, 'awesome book', '2020-08-19 22:41:52'),
(8, 12, 1, 'i liked it too', '2020-08-19 23:06:57'),
(9, 12, 37, 'excellent', '2020-08-20 15:11:51'),
(10, 12, 38, 'parfait', '2020-09-29 21:09:35');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `Customer` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Product` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`Customer`, `Product`) VALUES
('boutera youssef', 2),
('boutera youssef', 19),
('boutera youssef', 24),
('boutera youssef', 27),
('dazai', 32),
('houssine', 38),
('kirito', 2),
('kirito', 3),
('kunan', 1),
('kunan', 3),
('melio', 26);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idComment` int(8) NOT NULL,
  `contenu` text NOT NULL,
  `nomcomment` varchar(100) NOT NULL,
  `numlivre` int(8) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idComment`, `contenu`, `nomcomment`, `numlivre`, `post_time`) VALUES
(230, ' lord of the rings', 'boutera youssef', 2, '2020-08-15 18:24:42'),
(229, ' l', 'boutera youssef', 3, '2020-08-15 18:18:18'),
(228, ' cc', 'boutera youssef', 32, '2020-08-15 18:12:19'),
(227, ' mission', 'boutera youssef', 19, '2020-08-15 18:07:35'),
(226, ' harry potter', 'boutera youssef', 1, '2020-08-15 17:46:28');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `isbn` int(10) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `idAuteur` int(6) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `dateDeCreation` date NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `nomlogin` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`isbn`, `titre`, `idAuteur`, `genre`, `dateDeCreation`, `description`, `image`, `nomlogin`) VALUES
(1, 'Harry potter', 155, 'fantasia', '1940-02-09', 'It’s been another long summer at the Dursley’s for Harry Potter. He can’t wait to get back to Hogwarts and is counting down the days until he can return. He’s surprised when, on his birthday, a strange elfish creature named Dobby shows up with dire warnings for Harry: He must not return to Hogwarts!', 'harry.jpg', 'kirito'),
(2, 'lord of the rings', 15, 'adventure', '2000-06-02', 'Un jeune et timide `Hobbit\', Frodon Sacquet, hérite d\'un anneau magique. Bien loin d\'être une simple babiole, il s\'agit d\'un instrument de pouvoir absolu qui permettrait à Sauron, le `Seigneur des ténèbres\', de régner sur la `Terre du Milieu\' et de réduire en esclavage ses peuples. Frodon doit parvenir jusqu\'à la `Crevasse du Destin\' pour détruire l\'anneau.', 'lord-of-the-rings.jpg', 'kirito'),
(3, 'machine learning', 6321, 'sci-fiction', '0000-00-00', 'Le Machine Learning est une technologie d\'intelligence artificielle permettant aux ordinateurs d\'apprendre sans avoir ete programmes explicitement a cet effet. Pour apprendre et se developper, les ordinateurs ont toutefois besoin de donnees a analyser et sur lesquelles s\'entrainer. De fait, le Big Data est l\'essence du Machine Learning, et  c\'est la technologie qui permet d\'exploiter pleinement le potentiel du Big Data. Decouvrez pourquoi cette technique et le Big Data sont interdependants.', 'machine-learning.jpg', 'boutera youssef'),
(19, 'mission impossible', 6322, 'sci-fiction', '1996-08-13', '', 'tom.jpg', 'melio'),
(21, 'alice int the wonderland', 6323, 'Romance', '2010-08-29', '', 'alice.jpg', 'boutera youssef'),
(22, 'tale of ace and fire', 6324, 'fantasia', '2011-08-10', '', 'got.jpg', 'kirito'),
(23, 'ice age', 6325, 'sci-fiction', '2011-08-15', '', 'iceage.jpg', 'melio'),
(24, 'the index', 6326, 'Horror', '2017-07-25', '', 'index.jpg', 'melio'),
(25, 'the arsonist', 6327, 'drama', '2001-03-07', '', 'the-arsonist.jpg', 'boutera youssef'),
(26, 'sword art online', 6328, 'fantasia', '2013-02-21', '', 'kirito-sao.jpg', 'kirito'),
(27, 'hhhhh', 40, 'sci-fiction', '2006-02-07', '', 'pppp.jpg', 'kirito'),
(30, 'wuthering heights', 6333, 'drama', '2013-08-11', '', 'heights.jpg', 'Hayat Amhid'),
(31, 'Lion', 6334, 'drama', '2005-04-05', '', '363964.jpg', 'Hayat Amhid'),
(32, 'lincoln lawyer', 6335, 'fantasia', '2011-05-05', '', 'lincoln-lawyer.jpg', 'Hayat Amhid'),
(34, 'steins gate', 6338, 'sci-fiction', '2020-08-14', 'ddfgdgdhdh', 'Nghich-Loan-Thoi-Khong-Steins-Gate-Zero-250x350.jpg.jpg', 'dazai'),
(35, 'akami ga kill', 6339, 'drama', '2020-08-13', 'fff', '4420222.jpg-c_216_288_x-f_jpg-q_x-xxyxx.jpg', 'natsu'),
(36, 'the promised neverland', 6340, 'fantasia', '2020-08-03', 'nnnnnnnnnnnnnnnnnnnnnnnn', '3483516.jpg', 'dazai'),
(37, 'teach yourself sql', 6341, 'Horror', '2020-08-30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sqlLearn.jpg', 'houssine'),
(38, 'assembleur', 6342, 'Horror', '2020-08-30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'assembleur.jpg', 'houssine'),
(39, 'learn linux', 6343, 'Horror', '2020-08-30', '&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', 'linux.jpg', 'houssinee');

-- --------------------------------------------------------

--
-- Structure de la table `nbreplies`
--

CREATE TABLE `nbreplies` (
  `idnombre` int(11) NOT NULL,
  `idcom` int(10) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nbreplies`
--

INSERT INTO `nbreplies` (`idnombre`, `idcom`, `nombre`) VALUES
(181, 227, 1),
(180, 227, 1),
(179, 58, 0),
(178, 227, 1),
(177, 227, 1),
(176, 227, 1),
(175, 58, 0),
(174, 58, 0),
(173, 58, 0),
(172, 227, 1),
(171, 227, 1),
(170, 227, 1),
(169, 227, 1),
(168, 228, 1),
(167, 228, 1),
(166, 228, 1),
(165, 228, 1),
(164, 228, 1),
(163, 228, 1),
(162, 227, 1),
(161, 227, 1),
(160, 227, 1),
(159, 227, 1),
(158, 227, 1),
(157, 227, 1),
(156, 227, 1),
(155, 227, 1),
(154, 228, 1),
(153, 228, 1),
(152, 227, 1),
(151, 227, 1),
(150, 227, 1),
(149, 227, 1),
(148, 228, 1),
(147, 227, 1),
(146, 227, 1),
(145, 228, 1),
(144, 228, 1),
(143, 228, 1),
(142, 228, 1),
(141, 228, 1),
(140, 228, 1),
(139, 228, 1),
(138, 228, 1),
(137, 228, 1),
(136, 228, 1),
(135, 229, 2),
(134, 229, 2),
(133, 229, 2),
(132, 229, 2),
(131, 229, 2),
(130, 229, 2),
(129, 229, 2),
(128, 229, 2),
(127, 229, 2),
(126, 229, 2),
(125, 229, 2),
(124, 229, 2),
(123, 229, 1),
(122, 229, 0),
(121, 230, 2),
(120, 230, 1),
(119, 230, 1),
(118, 230, 1),
(117, 230, 1),
(116, 230, 1),
(115, 230, 1),
(114, 230, 0),
(113, 230, 0),
(112, 226, 2),
(111, 226, 2),
(110, 226, 2),
(109, 226, 2),
(108, 229, 0),
(107, 228, 1),
(106, 228, 0),
(105, 228, 0),
(104, 228, 0),
(103, 226, 2),
(102, 226, 2),
(101, 226, 2),
(100, 227, 1),
(99, 227, 0),
(98, 227, 0),
(97, 226, 2),
(96, 226, 1),
(94, 226, 1),
(93, 226, 0),
(95, 226, 1),
(182, 227, 1),
(183, 227, 1),
(184, 227, 1),
(185, 227, 1),
(186, 227, 1),
(187, 227, 1),
(188, 227, 1),
(189, 227, 1),
(190, 228, 1),
(191, 228, 1),
(192, 228, 1),
(193, 228, 1),
(194, 228, 1),
(195, 228, 1),
(196, 228, 1),
(197, 228, 1),
(198, 228, 1),
(199, 228, 1),
(200, 228, 1),
(201, 228, 1),
(202, 228, 1),
(203, 228, 1),
(204, 228, 1),
(205, 228, 1),
(206, 228, 1),
(207, 228, 1),
(208, 228, 1),
(209, 228, 1),
(210, 228, 1),
(211, 228, 1),
(212, 228, 1),
(213, 228, 1),
(214, 228, 1),
(215, 228, 1),
(216, 227, 1),
(217, 227, 1),
(218, 227, 1),
(219, 227, 1),
(220, 228, 1),
(221, 228, 1),
(222, 228, 2),
(223, 228, 2),
(224, 228, 2),
(225, 228, 2),
(226, 226, 2),
(227, 226, 2),
(228, 228, 2),
(229, 228, 2),
(230, 226, 2),
(231, 226, 2),
(232, 226, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nbreplies1`
--

CREATE TABLE `nbreplies1` (
  `id` int(11) NOT NULL,
  `idreply` int(11) NOT NULL,
  `nombre1` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nbreplies1`
--

INSERT INTO `nbreplies1` (`id`, `idreply`, `nombre1`) VALUES
(20, 57, 0),
(19, 56, 2),
(18, 58, 1),
(17, 58, 0),
(16, 56, 2),
(15, 56, 2),
(14, 56, 1),
(21, 59, 0),
(22, 19, 0),
(23, 20, 0),
(24, 60, 0),
(25, 24, 0),
(26, 24, 1),
(27, 24, 2),
(28, 24, 3),
(29, 24, 3),
(30, 24, 3),
(31, 61, 0),
(32, 62, 0),
(33, 63, 0),
(34, 33, 0),
(35, 33, 1),
(36, 33, 1),
(37, 33, 1),
(38, 62, 0),
(39, 63, 0),
(40, 62, 0),
(41, 32, 0),
(42, 33, 1),
(43, 25, 0),
(44, 25, 0),
(45, 25, 0),
(46, 25, 0),
(47, 24, 3),
(48, 58, 1),
(49, 15, 1),
(50, 15, 2),
(51, 15, 2),
(52, 15, 2),
(53, 15, 2),
(54, 18, 1),
(55, 18, 1),
(56, 58, 1),
(57, 58, 1),
(58, 58, 1),
(59, 58, 1),
(60, 58, 1),
(61, 58, 1),
(62, 58, 1),
(63, 58, 1),
(64, 58, 1),
(65, 58, 1),
(66, 58, 1),
(67, 58, 1),
(68, 58, 1),
(69, 58, 1),
(70, 58, 1),
(71, 24, 3),
(72, 24, 3),
(73, 24, 3),
(74, 24, 3),
(75, 24, 3),
(76, 24, 3),
(77, 24, 4),
(78, 24, 5),
(79, 24, 5),
(80, 24, 5),
(81, 24, 5),
(82, 24, 5),
(83, 24, 5),
(84, 24, 5),
(85, 24, 5),
(86, 58, 1),
(87, 58, 1),
(88, 24, 5),
(89, 24, 6),
(90, 64, 0),
(91, 24, 6),
(92, 56, 2),
(93, 24, 6),
(94, 56, 2);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `idCreateur`, `idLivre`, `contenu`, `dateCreation`) VALUES
(1, 12, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commodi vero id ut hic. Corporis, ex!', '2020-08-12 13:47:20'),
(2, 13, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commodi vero id ut hic. Corporis, ex!', '2019-06-12 15:22:22'),
(3, 12, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-08-12 21:11:09'),
(5, 12, 32, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-08-14 17:53:13'),
(7, 19, 34, 'steins gate', '2020-08-16 22:38:06'),
(8, 15, 35, 'fffffffff', '2020-08-16 22:53:47'),
(9, 19, 36, 'neverland', '2020-08-16 23:36:52'),
(10, 12, 37, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-08-16 23:53:32'),
(11, 12, 38, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-08-19 00:15:26'),
(12, 13, 39, '&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', '2020-08-19 11:08:57');

-- --------------------------------------------------------

--
-- Structure de la table `post_comments`
--

CREATE TABLE `post_comments` (
  `idComment` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post_comments`
--

INSERT INTO `post_comments` (`idComment`, `idUtilisateur`, `idPost`, `contenu`, `dateCreation`) VALUES
(1, 13, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commodi vero id ut hic. Corporis, ex!', '0000-00-00 00:00:00'),
(2, 12, 1, 'totally agreed', '0000-00-00 00:00:00'),
(3, 13, 2, 'indeed my friend', '0000-00-00 00:00:00'),
(4, 12, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commodi vero id ut hic. Corporis, ex!', '0000-00-00 00:00:00'),
(10, 12, 1, 'it works now', '2020-08-12 20:52:00'),
(11, 12, 1, 'comment', '2020-08-12 21:05:33'),
(12, 12, 1, 'orem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commoorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commo', '2020-08-12 21:06:22'),
(13, 12, 1, 'orem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commoorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commo', '2020-08-12 21:06:29'),
(14, 12, 1, 'orem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commoorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusantium porro commodi repudiandae pariatur voluptas ea sint aut corporis! Nesciunt dicta, ea quis commo', '2020-08-12 21:06:30'),
(15, 12, 1, 'another comment', '2020-08-12 21:12:22'),
(16, 13, 1, 'test', '2020-08-12 21:29:03'),
(17, 13, 1, 'this is a comment', '2020-08-12 23:46:38'),
(18, 13, 1, 'kkkk', '2020-08-13 00:08:28'),
(19, 13, 1, 'commentaire', '2020-08-13 00:13:15'),
(20, 13, 2, 'this is a test', '2020-08-13 00:21:00'),
(21, 13, 2, 'this is a test', '2020-08-13 00:21:13'),
(22, 13, 3, 'one more', '2020-08-13 00:21:53'),
(23, 13, 2, 'two more', '2020-08-13 00:22:08'),
(24, 13, 1, 'three more', '2020-08-13 00:22:14'),
(25, 13, 3, 'un avis', '2020-08-13 00:27:14'),
(26, 13, 3, 'hope it works', '2020-08-13 00:33:39'),
(29, 13, 3, 'machine learning', '2020-08-13 23:04:22'),
(30, 13, 3, 'interesting', '2020-08-13 23:04:57'),
(31, 13, 3, 'good', '2020-08-13 23:05:24'),
(59, 12, 10, 'sounds good', '2020-08-17 00:03:33'),
(60, 12, 10, 'this is actually a good book', '2020-08-19 00:01:03'),
(61, 12, 11, 'good book', '2020-08-19 00:17:32'),
(64, 13, 8, 'a comment', '2020-08-19 10:55:08'),
(65, 13, 7, 'good', '2020-08-19 10:59:17'),
(66, 13, 12, 'good book', '2020-08-19 11:09:20'),
(67, 13, 9, 'commentaire', '2020-08-19 11:09:47'),
(68, 13, 0, '', '2020-08-19 15:03:06'),
(69, 13, 0, 'kkkkkkkkk', '2020-08-19 15:11:58'),
(70, 13, 0, 'kkkk', '2020-08-19 15:12:36'),
(71, 13, 0, 'kkkk', '2020-08-19 15:12:36'),
(72, 13, 0, 'kkkk', '2020-08-19 15:12:38'),
(73, 13, 0, 'kkkk', '2020-08-19 15:12:39'),
(74, 13, 0, 'hello', '2020-08-19 15:13:48'),
(75, 13, 0, 'hello', '2020-08-19 15:14:20');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `php` int(11) NOT NULL,
  `numbook` int(11) NOT NULL,
  `rater` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id`, `php`, `numbook`, `rater`) VALUES
(138, 5, 36, '19'),
(137, 1, 35, '15'),
(139, 5, 37, '12'),
(140, 4, 38, '12'),
(141, 4, 38, 'houssine'),
(142, 3, 37, 'houssinee'),
(143, 3, 35, 'houssinee'),
(144, 4, 35, '13'),
(145, 5, 34, '13'),
(174, 3, 39, '13'),
(173, 2, 36, '13'),
(171, 2, 1, '13'),
(172, 5, 2, '13'),
(175, 5, 1, '12'),
(176, 3, 39, '12');

-- --------------------------------------------------------

--
-- Structure de la table `reply`
--

CREATE TABLE `reply` (
  `id` int(10) NOT NULL,
  `idparent` int(11) NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomcomment` varchar(100) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reply`
--

INSERT INTO `reply` (`id`, `idparent`, `contenu`, `nomcomment`, `post_time`) VALUES
(64, 228, ' v', 'boutera youssef', '2020-08-15 22:57:56'),
(63, 229, ' jhj', 'boutera youssef', '2020-08-15 18:31:01'),
(62, 229, ' mm', 'boutera youssef', '2020-08-15 18:30:57'),
(61, 230, ' m', 'boutera youssef', '2020-08-15 18:30:42'),
(60, 230, ' lord of the rings reply', 'boutera youssef', '2020-08-15 18:24:55'),
(24, 228, ' fff', 'boutera youssef', '2020-08-15 18:15:45'),
(58, 227, ' impossible', 'boutera youssef', '2020-08-15 18:07:44'),
(57, 226, ' potter', 'boutera youssef', '2020-08-15 18:02:19'),
(56, 226, ' harry', 'boutera youssef', '2020-08-15 17:46:47');

-- --------------------------------------------------------

--
-- Structure de la table `reply1`
--

CREATE TABLE `reply1` (
  `idreply1` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `nomcomment` varchar(100) NOT NULL,
  `idparent` int(10) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reply1`
--

INSERT INTO `reply1` (`idreply1`, `contenu`, `nomcomment`, `idparent`, `post_time`) VALUES
(17, ' bbbbbbbb', 'boutera youssef', 24, '2020-08-15 18:25:56'),
(18, ' good', 'boutera youssef', 33, '2020-08-15 18:31:06'),
(16, ' cccc', 'boutera youssef', 24, '2020-08-15 18:25:52'),
(15, ' b', 'boutera youssef', 24, '2020-08-15 18:25:42'),
(14, ' mission impo', 'boutera youssef', 58, '2020-08-15 18:08:01'),
(13, ' fff', 'boutera youssef', 56, '2020-08-15 18:00:32'),
(12, ' go', 'boutera youssef', 56, '2020-08-15 17:48:12'),
(21, ' ', 'boutera youssef', 24, '2020-08-15 22:44:37'),
(22, ' lets try this for tonight okay', 'boutera youssef', 24, '2020-08-15 22:44:53'),
(23, ' b', 'boutera youssef', 24, '2020-08-15 22:57:51');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `motDePasse`, `email`) VALUES
(12, 'houssine', '1234', 'houssinachari82@gmail.com'),
(13, 'houssinee', '1234', 'houssinachari82@gmail.comm'),
(14, 'boutera youssef', 'btr', 'boutera.19999@gmail.com'),
(15, 'natsu', 'bbb', 'bouteera.1999@gmail.com'),
(16, 'boutera', 'bbb', 'boutebra.1999@gmail.com'),
(17, 'bouteraaaa', 'bbb', 'boutebara.1999@gmail.com'),
(18, 'bouteraaaaa', 'bbb', 'boutebaraa.1999@gmail.com'),
(19, 'dazai', 'bbb', 'dazaisan@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affiche_rate`
--
ALTER TABLE `affiche_rate`
  ADD PRIMARY KEY (`idrate`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`idAuteur`);

--
-- Index pour la table `biblio`
--
ALTER TABLE `biblio`
  ADD PRIMARY KEY (`idbiblio`);

--
-- Index pour la table `book_comments`
--
ALTER TABLE `book_comments`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Customer`,`Product`),
  ADD KEY `Product` (`Product`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`),
  ADD UNIQUE KEY `idAuteur` (`idAuteur`);

--
-- Index pour la table `nbreplies`
--
ALTER TABLE `nbreplies`
  ADD PRIMARY KEY (`idnombre`);

--
-- Index pour la table `nbreplies1`
--
ALTER TABLE `nbreplies1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Index pour la table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reply1`
--
ALTER TABLE `reply1`
  ADD PRIMARY KEY (`idreply1`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affiche_rate`
--
ALTER TABLE `affiche_rate`
  MODIFY `idrate` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `idAuteur` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6344;

--
-- AUTO_INCREMENT pour la table `biblio`
--
ALTER TABLE `biblio`
  MODIFY `idbiblio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `book_comments`
--
ALTER TABLE `book_comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idComment` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `isbn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `nbreplies`
--
ALTER TABLE `nbreplies`
  MODIFY `idnombre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT pour la table `nbreplies1`
--
ALTER TABLE `nbreplies1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT pour la table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `reply1`
--
ALTER TABLE `reply1`
  MODIFY `idreply1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
