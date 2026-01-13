-- creation de la base de donnée si elle n'existe pas 

CREATE DATABASE IF NOT EXISTS biblio;

-- se positionner sur la base de donnée crée

USE biblio;
CREATE TABLE Etudiant (
    CodeEtudiant INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Adresse VARCHAR(100),
    Classe VARCHAR(20)
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
    DateEmprunt DATE,
    PRIMARY KEY (CodeEtudiant, CodeLivre),
    FOREIGN KEY (CodeEtudiant) REFERENCES Etudiant(CodeEtudiant),
    FOREIGN KEY (CodeLivre) REFERENCES Livre(CodeLivre)
);