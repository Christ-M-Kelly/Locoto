-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 juin 2024 à 02:26
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
-- Base de données : `locauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` varchar(1) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `prix` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie`, `prix`) VALUES
('A', 'Citadine', 60.00),
('B', 'Economique', 72.00),
('C', 'Compacte', 80.00),
('D', '4x4', 95.00),
('E', 'Berline', 120.00),
('F', 'Grande berline', 150.00),
('G', 'Sport, SUV', 230.00),
('H', 'Électrique', 0.00),
('V', 'Luxe', 350.00);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_type_client` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `adresse`, `id_type_client`, `photo`) VALUES
(1, 'Leprince', 'Nicolas', 'Rue des Aigris', 4, ''),
(2, 'Gallais', 'Corentin', 'Rennes', 1, ''),
(3, 'Riaud', 'Briac', 'Rennes', 1, ''),
(4, 'Guely', 'Sebastien', 'Rennes', 5, ''),
(5, 'Krasinski', 'Yann', 'Varsovie', 1, ''),
(6, 'Bouanga Niambi', 'Marc-Désir', 'Brazzaville', 2, ''),
(7, 'Kossa', 'Keliane', 'Abidjan', 2, ''),
(8, 'Meheut', 'Titouan', 'Rennes', 1, ''),
(9, 'Quartier', 'Maxime', 'Rennes', 1, ''),
(10, 'Zarnado', 'Adrien', 'Rennes', 1, ''),
(11, 'Lolivier', 'Tristan', 'Rennes', 1, ''),
(12, 'Benzati', 'Merwan', 'Tunis', 1, ''),
(13, 'Coulibaly', 'Imran', 'Bamako', 1, ''),
(14, 'Dhellot', 'Geremy', 'Caen', 1, ''),
(15, 'Agbrall', ' Paul', 'Rennes', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE `louer` (
  `id_louer` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `immatriculation` varchar(16) NOT NULL,
  `date_debut` varchar(10) NOT NULL,
  `date_fin` varchar(10) NOT NULL,
  `compteur_debut` int(11) NOT NULL,
  `compteur_fin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id_option` int(11) NOT NULL,
  `option` varchar(256) NOT NULL,
  `prix` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id_option`, `option`, `prix`) VALUES
(1, 'Assurance complementaire', 50.00),
(2, 'Nettoyage', 75.00),
(3, 'Complement carburant', 30.00),
(4, 'Retour autre ville', 250.00),
(5, 'Rabais dimanche', -40.00);

-- --------------------------------------------------------

--
-- Structure de la table `typesclient`
--

CREATE TABLE `typesclient` (
  `id_type_client` int(11) NOT NULL,
  `type_client` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `typesclient`
--

INSERT INTO `typesclient` (`id_type_client`, `type_client`) VALUES
(1, 'Particulier'),
(2, 'Entreprise'),
(3, 'Administration'),
(4, 'Association'),
(5, 'Longue duree');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `immatriculation` varchar(16) NOT NULL,
  `marque` varchar(256) NOT NULL,
  `modele` varchar(256) NOT NULL,
  `image` varchar(64) NOT NULL,
  `compteur` int(11) NOT NULL,
  `id_categorie` varchar(1) NOT NULL,
  `disponible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`immatriculation`, `marque`, `modele`, `image`, `compteur`, `id_categorie`, `disponible`) VALUES
('123 ABC 456', 'Volkswagen', 'ID.3', 'ID_3.jpg', 1000, 'E', 1),
('234 BCD 567', 'Peugeot', 'E-208', 'E-208.jpg', 0, 'A', 10),
('345 CDE 678', 'Citroën', 'E-C4 X', 'C4x.jpg', 1200, 'E', 1),
('CAD ESC 001', 'Cadillac', 'Escalade', 'Escalade.jpg', 0, 'V', 1),
('CH COR 1000', 'Chevrolet', 'Corvette', 'Corvette.jpg', 1500, 'G', 1),
('FI 600 RD', 'Fiat', '600e', '600e.jpg', 1500, 'G', 4),
('HON ACC 400', 'Honda', 'Accord', 'Accord.jpg', 2000, 'E', 1),
('IN A 5300', 'Audi', 'A5', 'A5.jpg', 1200, 'G', 3),
('IN Q4000 E', 'Audi', 'Q4 e-Tron', 'Q4 e-tron.jpg', 500, 'G', 2),
('KIA EV 6000', 'Kia', 'EV6', 'EV6.jpg', 0, 'G', 2),
('KIA TEL 1000', 'Kia', 'Telluride', 'Telluride.jpg', 0, 'D', 2),
('MAZ MX5 1000', 'Mazda', 'MX-5', 'MX-5.jpg', 0, 'G', 1),
('MB CLV 2000', 'Mercedes-Benz', 'Classe V', 'Classe V.jpg', 2000, 'V', 5),
('POR PANA 2000', 'Porsche', 'Panamera', 'Panamera.jpg', 1500, 'E', 1),
('POR TAY 1000', 'Porsche', 'Taycan', 'Taycan.jpg', 1500, 'F', 1),
('SUB OUT 200', 'Subaru', 'Outback', 'Outback.jpg', 0, 'D', 3),
('TO COR 1112', 'Toyota', 'Corolla', 'Corolla.jpg', 1000, 'E', 4),
('TO CROSS 12', 'Toyota', 'Corolla Cross', 'Corolla Cross.jpg', 1800, 'G', 2),
('TO GR86 1000', 'Toyota', 'GR 86', 'GR_86.jpg', 0, 'G', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `id_client` (`id_client`),
  ADD KEY `id_type_client` (`id_type_client`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`id_louer`),
  ADD UNIQUE KEY `id_louer` (`id_louer`),
  ADD KEY `id_client` (`id_client`,`immatriculation`),
  ADD KEY `immatriculation` (`immatriculation`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD UNIQUE KEY `id_option` (`id_option`);

--
-- Index pour la table `typesclient`
--
ALTER TABLE `typesclient`
  ADD UNIQUE KEY `id_type_client` (`id_type_client`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD UNIQUE KEY `id_voiture` (`immatriculation`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `louer`
--
ALTER TABLE `louer`
  MODIFY `id_louer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_type_client` FOREIGN KEY (`id_type_client`) REFERENCES `typesclient` (`id_type_client`),
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_type_client`) REFERENCES `typesclient` (`id_type_client`);

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `louer_voiture` FOREIGN KEY (`immatriculation`) REFERENCES `voitures` (`immatriculation`);

--
-- Contraintes pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD CONSTRAINT `voiture_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
