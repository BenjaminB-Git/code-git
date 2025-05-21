DROP DATABASE IF EXISTS hotel;

CREATE DATABASE hotel;

USE hotel;

CREATE TABLE station(
    num_station INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_station VARCHAR(255) NOT NULL
);

CREATE TABLE hotel(
    capacite_hotel SMALLINT NOT NULL,
    categorie_hotel VARCHAR(255),
    nom_hotel VARCHAR(255),
    adresse_hotel VARCHAR(255),
    num_hotel INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    num_station INT NOT NULL,
    FOREIGN KEY (num_station) REFERENCES station(num_station)
);

CREATE TABLE chambre (
    capacite_chambre TINYINT NOT NULL,
    degre_confort TINYINT,
    exposition VARCHAR(255),
    type_chambre VARCHAR(255),
    num_chambre INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    num_hotel INT NOT NULL,
    FOREIGN KEY (num_hotel) REFERENCES hotel (num_hotel)
);

CREATE TABLE client_hotel (
    adresse_client VARCHAR(255),
    nom_client VARCHAR(255) NOT NULL,
    prenom_client VARCHAR(255) NOT NULL,
    num_client INT NOT NULL PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE reservation (
    num_chambre INT NOT NULL,
    num_client INT NOT NULL,
    date_debut DATE,
    date_fin DATE,
    date_reservation DATE,
    montant_arrhes DECIMAL,
    prix_total DECIMAL,
    FOREIGN KEY (num_chambre) REFERENCES chambre (num_chambre),
    FOREIGN KEY (num_client) REFERENCES client_hotel (num_client),
    PRIMARY KEY (num_chambre, num_client)
);


