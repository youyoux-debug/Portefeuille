CREATE DATABASE portefeuille;

USE portefeuille;
-- Table des dépenses
CREATE TABLE depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    montant INT,
    libelle VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    moyendepaie VARCHAR(255) NOT NULL
);
-- Table des catégories
CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL
);
-- Table des portefeuille
CREATE TABLE portefeuille (
    id INT AUTO_INCREMENT PRIMARY KEY,
    montant INT,
    depense_id INT,
    categorie_id INT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (depense_id) REFERENCES depense(id),
    FOREIGN KEY (categorie_id) REFERENCES categorie(id)
);

CREATE TABLE Utilisateur(
    ID_Utilisateur INT NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(100) NOT NULL,
    Prenom VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Mdp VARCHAR(100) NOT NULL,
    PRIMARY KEY (ID_Utilisateur)
);