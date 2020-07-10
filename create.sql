--CREATION DE LA BASE DE DONNEES
DROP DATABASE IF EXISTS `inscrit`;
CREATE DATABASE `inscrit`;
USE `inscrit`;

--CREATION DE LA TABLE
CREATE TABLE IF NOT EXISTS `inscrit`
(
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NOT NULL,
  `prenom` VARCHAR(20) NOT NULL,
  `email` VARCHAR(320) NOT NULL,
  `telephone` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id_user`)
);
