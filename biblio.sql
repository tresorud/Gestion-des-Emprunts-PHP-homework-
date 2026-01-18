-- creation de la base de donnée si elle n'existe pas 

CREATE DATABASE IF NOT EXISTS biblio;

-- se positionner sur la base de donnée crée

USE biblio;
CREATE TABLE Etudiant (
    CodeEtudiant INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Adresse VARCHAR(100),
    Classe VARCHAR(20),
    motdepasse VARCHAR(50) NOT NULL
);

CREATE TABLE administrateur (
    code_administrateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    motdepasse VARCHAR(50) NOT NULL
);

CREATE TABLE Livre (
    CodeLivre INT PRIMARY KEY AUTO_INCREMENT,
    Titre VARCHAR(100) NOT NULL,
    Auteur VARCHAR(100),
    DateEdition DATE
);

CREATE TABLE Emprunter (
    CodeEtudiant INT,
    CodeLivre INT,
    DateEmprunt DATE DEFAULT CURRENT_TIMESTAMP,
    date_fin DATETIME NOT NULL,
    status ENUM('en_cours','remis') NOT NULL DEFAULT 'en_cours',
    PRIMARY KEY (CodeEtudiant, CodeLivre),
    FOREIGN KEY (CodeEtudiant) REFERENCES Etudiant(CodeEtudiant),
    FOREIGN KEY (CodeLivre) REFERENCES Livre(CodeLivre)
);