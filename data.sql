CREATE DATABASE footballclub;
USE footballclub;

/* CREER LA TABLE POSITION */
CREATE TABLE poste (
	id INT PRIMARY KEY NOT NULL auto_increment,
    nom VARCHAR(50)
);

/* CREER LA TABLE CLUB */
CREATE TABLE club (
	id INT PRIMARY KEY NOT NULL auto_increment,
    nom VARCHAR(25)
);

/* CREER LA TABLE PRINCIPALE JOUEUR */
CREATE TABLE joueur (
	id INT PRIMARY KEY NOT NULL auto_increment,
    nom VARCHAR(25),
    numero INT,
    poste INT,
    FOREIGN KEY (poste) REFERENCES poste(id),
    club INT, 
    FOREIGN KEY (club) REFERENCES club(id)
);

/* INSERER DES VALEURS */
INSERT INTO poste (nom)
VALUES 
("attaquant"),
("milieu"),
("défenseur"),
("gardien");

INSERT INTO club (nom)
VALUES 
("psg"),
("om"),
("ol"),
("fcna");

INSERT INTO joueur (nom, numero, poste, club)
VALUES 
("mbappé", 7, 1, 1),
("lopez", 27, 2, 2),
("dubois", 14, 3, 3),
("petric", 30, 4, 4);







SELECT * FROM joueur;