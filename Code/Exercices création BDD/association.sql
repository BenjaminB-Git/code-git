DROP DATABASE IF EXISTS association;

CREATE DATABASE association;

USE association;

CREATE TABLE personne(
    per_num INT NOT NULL AUTO_INCREMENT,
    per_nom VARCHAR(255),
    per_prenom VARCHAR(255),
    per_adresse VARCHAR(255),
    per_ville VARCHAR(255),
    PRIMARY KEY (per_num)
);

CREATE TABLE groupe(
    gro_num INT NOT NULL AUTO_INCREMENT,
    gro_libelle VARCHAR(255),
    PRIMARY KEY (gro_num)
);

CREATE TABLE appartient(
    per_num INT NOT NULL,
    gro_num INT NOT NULL,
    FOREIGN KEY (per_num) REFERENCES personne(per_num),
    FOREIGN KEY (gro_num) REFERENCES groupe(gro_num),
    PRIMARY KEY (per_num, gro_num)
);