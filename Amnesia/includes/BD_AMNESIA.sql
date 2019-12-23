-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 07:27 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `h18bdfilms`
--
DROP DATABASE IF EXISTS `BD_AMNESIA`;

CREATE DATABASE IF NOT EXISTS `BD_AMNESIA` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `BD_AMNESIA`;

-- --------------------------------------------------------

--
-- Table structure 
CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `num_util` varchar(50) COLLATE utf8_unicode_ci ,
  `sexe` varchar(10) COLLATE utf8_unicode_ci,
  `date_naiss` Date,
  `tel` varchar(50) COLLATE utf8_unicode_ci ,
--   `photo`varchar(100) COLLATE utf8_unicode_ci,
  `id_adresse` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--


-- CREATE TABLE `Categorie_Util` (
 -- `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
 -- `nom_categorie`varchar(100) COLLATE utf8_unicode_ci
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `Adresse` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
 -- `no_civique`int(12),
  `id_ville` int(11),
  `adresse`varchar(100) COLLATE utf8_unicode_ci
 -- `no_apt`varchar(12) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `Ville` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `nom_ville`varchar(100) COLLATE utf8_unicode_ci NOT NULL  ,
 -- `province`varchar(100) COLLATE utf8_unicode_ci,
  `pays`varchar(100) COLLATE utf8_unicode_ci
 --  `photo`varchar(100) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `Restaurant` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `id_adresse`int(12),
  `nom`varchar(100) COLLATE utf8_unicode_ci,
  `lien_site`varchar(100) COLLATE utf8_unicode_ci,
  `classe_resto`varchar(100) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `Deplacement` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `date`DATE NOT NULL,
  `id_circuit`int(12) NOT NULL  ,
  `id_ville_depart`int(12),
  `id_ville_arrive`int(12),
  `description`varchar(100) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
CREATE TABLE `Mode_Deplacement` (
  `id`int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_circuit` int(11),
  `description`varchar(100) COLLATE utf8_unicode_ci
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `Message_Blog` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `id_util` int(12),
  `id_sujet_blog` int(12),
  `contenu` varchar(100) COLLATE utf8_unicode_ci,
  `date`  DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `Sujet_Blog` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `id_util`int(12),
  `date`DATE,
  `titre`varchar(100) COLLATE utf8_unicode_ci,
  `contenu`varchar(100) COLLATE utf8_unicode_ci,
  `photo_post`varchar(100) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
CREATE TABLE `Sujet_Blog_Categorie_Blog` (
  `id`int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `id_sujet_blog` int(11),
  `id_categorie_blog` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Categorie_blog` (
  `id`int(11) AUTO_INCREMENT PRIMARY KEY,
  `titre`varchar(100) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
CREATE TABLE `Connexion` (
  `id` int(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_util` int(11) NOT NULL  ,
  `categorie` varchar(50) COLLATE utf8_unicode_ci  NOT NULL,
  `motdepasse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(250) COLLATE utf8_unicode_ci  NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--

--
CREATE TABLE `Reservation` (
  `id` int(15) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `id_util` int(11) NOT NULL ,
  `id_circuit` int(11) NOT NULL  ,
  `nbr_place` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--

CREATE TABLE `Accompagnateur` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `id_reservation` int(11),
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(250) COLLATE utf8_unicode_ci,
  `tel` varchar(50) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

CREATE TABLE `Circuit` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `nbr_place` int(11),
  `nbr_inscrit` int(11),
  `prix` float,
  `date_debut`DATE,
  `date_fin`DATE,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--

CREATE TABLE `Payement` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_util` int(11),
  `id_mode_payement` int(11),
  `prix` float,
  `date`DATE,
  `detail` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
--


CREATE TABLE `Mode_Payement` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `description` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

CREATE TABLE `Promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_circuit` int(11),
  `taux` float,
  `date_debut`DATE,
  `date_fin`DATE,
  `detail` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
--

CREATE TABLE `Etape` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_circuit` int(11),
  `date_debut`DATE,
  `date_fin`DATE,
  `detail` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
CREATE TABLE `Jour` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date`DATE,
  `id_etape` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

--
CREATE TABLE `Jour_Activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_activite` int(11),
  `id_jour` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

--
CREATE TABLE `Activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `heure_debut`TIME,
  `heure_fin`TIME,
  `detail` varchar(250) COLLATE utf8_unicode_ci,
  `photo_activite` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
--
CREATE TABLE `Hebergement` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `categorie_heb` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `classe` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

--
CREATE TABLE `Etape_Hebergement` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_etape` int(11),
  `id_hebergement` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

--
CREATE TABLE `Etape_Restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_etape` int(11),
  `id_restaurant` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

  
ALTER TABLE `utilisateur`
  ADD FOREIGN KEY (id_adresse) REFERENCES Adresse(id);
  

ALTER TABLE `Mode_Deplacement`
  ADD FOREIGN KEY (id_circuit) REFERENCES Circuit(id);

  
ALTER TABLE `Adresse`
  ADD FOREIGN KEY (id_ville) REFERENCES Ville(id);
  
ALTER TABLE `Restaurant`
  ADD FOREIGN KEY (id_adresse) REFERENCES Adresse(id);
  
ALTER TABLE `Deplacement`
  ADD FOREIGN KEY (id_circuit) REFERENCES Circuit(id),
  ADD FOREIGN KEY (id_ville_depart) REFERENCES Ville(id),
  ADD FOREIGN KEY (id_ville_arrive) REFERENCES Ville(id);
  
ALTER TABLE `Message_Blog`
  ADD FOREIGN KEY (id_util) REFERENCES utilisateur(id),
  ADD FOREIGN KEY (id_sujet_blog) REFERENCES Sujet_Blog(id);
  
ALTER TABLE `Sujet_Blog`
  ADD FOREIGN KEY (id_util) REFERENCES Utilisateur(id);
  
ALTER TABLE `Sujet_Blog_Categorie_Blog`
  ADD FOREIGN KEY (id_sujet_blog) REFERENCES Sujet_Blog(id),
  ADD FOREIGN KEY (id_categorie_blog) REFERENCES Categorie_Blog(id);
  
ALTER TABLE `Connexion`
  ADD FOREIGN KEY (id_util) REFERENCES Utilisateur(id);
  
ALTER TABLE `Reservation`
  ADD FOREIGN KEY (id_util) REFERENCES utilisateur(id),
  ADD FOREIGN KEY (id_circuit) REFERENCES Circuit(id);
  
ALTER TABLE `Accompagnateur`
  ADD FOREIGN KEY (id_reservation) REFERENCES Reservation(id);

ALTER TABLE `Payement`
  ADD FOREIGN KEY (id_util) REFERENCES Utilisateur(id),
  ADD FOREIGN KEY (id_mode_payement) REFERENCES Mode_Payement(id);
  
ALTER TABLE `Promotion`
  ADD FOREIGN KEY (id_circuit) REFERENCES Circuit(id);

  
ALTER TABLE `Etape`
  ADD FOREIGN KEY (id_circuit) REFERENCES Circuit(id);

  
ALTER TABLE `Jour`
  ADD FOREIGN KEY (id_etape) REFERENCES Etape(id);
  
ALTER TABLE `Jour_Activite`
  ADD FOREIGN KEY (id_jour) REFERENCES Jour(id),
  ADD FOREIGN KEY (id_activite) REFERENCES Activite(id);
  
ALTER TABLE `Etape_Restaurant`
  ADD FOREIGN KEY (id_etape) REFERENCES Etape(id),
  ADD FOREIGN KEY (id_restaurant) REFERENCES Restaurant(id);
  
ALTER TABLE `Etape_Hebergement`
  ADD FOREIGN KEY (id_etape) REFERENCES Etape(id),
  ADD FOREIGN KEY (id_hebergement) REFERENCES Hebergement(id);
  
  
  
INSERT INTO `Ville` (`nom_ville`,`pays`) VALUES ('Montreal','Canada');
INSERT INTO `Adresse` (`id_ville`,`adresse`) VALUES (1, '2030 Pie-IX Blvd, H1V 2C8');
INSERT INTO `Utilisateur` (`nom`,`prenom`,`num_util`,`sexe`,date_naiss,`tel`,`id_adresse`) VALUES ('ADMIN', 'ADMIN','ADMIN','M','190-12-15','514-000-0000',1);
INSERT INTO `Connexion` (`id_util`,`categorie`,`motdepasse`,`courriel`) VALUES (1, 'admin','admin','admin@google.com');