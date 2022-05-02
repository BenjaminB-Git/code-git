DROP DATABASE IF EXISTS village_green;

CREATE DATABASE village_green;

USE village_green;

CREATE TABLE fournisseur(
   fou_id INT NOT NULL AUTO_INCREMENT,
   fou_nom VARCHAR(50) NOT NULL,
   fou_adresse VARCHAR(100) NOT NULL,
   fou_code_postal VARCHAR(10) NOT NULL,
   fou_commune VARCHAR(50) NOT NULL,
   fou_mail VARCHAR(100),
   fou_telephone VARCHAR(20),
   PRIMARY KEY(fou_id)
);

CREATE TABLE type(
   typ_id INT NOT NULL AUTO_INCREMENT,
   typ_nom VARCHAR(30) NOT NULL,
   PRIMARY KEY (typ_id)
);

CREATE TABLE utilisateur(
   uti_id INT NOT NULL AUTO_INCREMENT,
   uti_nom VARCHAR(50) NOT NULL,
   uti_prenom VARCHAR(50) NOT NULL,
   typ_id INT NOT NULL,
   uti_date_naissance DATE NOT NULL,
   uti_adresse VARCHAR(100) NOT NULL,
   uti_adresse_2 VARCHAR(100),
   uti_adresse_3 VARCHAR(100),
   uti_code_postal VARCHAR(5) NOT NULL,
   uti_commune VARCHAR(50) NOT NULL,
   uti_mail VARCHAR(100),
   uti_telephone_fixe VARCHAR(20),
   uti_telephone_mobile VARCHAR(20),
   FOREIGN KEY (typ_id) REFERENCES type(typ_id),
   PRIMARY KEY(uti_id)
);

CREATE TABLE article(
   art_id INT NOT NULL AUTO_INCREMENT,
   art_nom VARCHAR(100) NOT NULL,
   art_description TEXT(1000),
   art_prix_ht DECIMAL(9,2) NOT NULL,
   art_taux_tva DECIMAL(4,3) NOT NULL,
   art_tva DECIMAL(9,2) NOT NULL,
   art_prix_ttc DECIMAL(9,2) NOT NULL,
   art_prix_fournisseur_ht DECIMAL(9,2) NOT NULL,
   art_prix_fournisseur_ttc DECIMAL(9,2) NOT NULL,
   art_stock INT NOT NULL,
   fou_id INT NOT NULL,
   PRIMARY KEY(art_id),
   FOREIGN KEY(fou_id) REFERENCES fournisseur(fou_id)
);

CREATE TABLE commande(
   com_id INT NOT NULL AUTO_INCREMENT,
   com_date_creation DATE NOT NULL,
   com_date_envoi DATE,
   com_date_facturation DATE,
   com_date_reception DATE,
   com_statut VARCHAR(30) NOT NULL,
   com_commentaire TEXT(500),
   uti_id INT NOT NULL,
   PRIMARY KEY(com_id),
   FOREIGN KEY(uti_id) REFERENCES utilisateur(uti_id)
);

CREATE TABLE detail(
   det_id INT NOT NULL AUTO_INCREMENT,
   det_quantite INT NOT NULL,
   det_prix_ht DECIMAL(9,2),
   det_tva DECIMAL(9,2),
   det_prix_ttc DECIMAL(9,2),
   com_id INT NOT NULL,
   art_id INT NOT NULL,
   PRIMARY KEY(det_id),
   FOREIGN KEY(com_id) REFERENCES commande(com_id),
   FOREIGN KEY(art_id) REFERENCES article(art_id)
);