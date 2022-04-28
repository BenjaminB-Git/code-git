DROP DATABASE IF EXISTS exercice_1;

CREATE DATABASE exercice_1;
USE exercice_1;

CREATE TABLE clients(
    cli_num INT NOT NULL AUTO_INCREMENT,
    cli_nom VARCHAR(50) NOT NULL,
    cli_adresse VARCHAR(50),
    cli_tel VARCHAR(30),
    PRIMARY KEY (cli_num)
);

CREATE TABLE produit(
    pro_num INT NOT NULL AUTO_INCREMENT,
    pro_libelle VARCHAR(50) NOT NULL,
    pro_description VARCHAR(50),
    PRIMARY KEY (pro_num)
);

CREATE TABLE commande(
    com_num INT NOT NULL AUTO_INCREMENT,
    cli_num INT NOT NULL,
    com_date DATETIME NOT NULL,
    com_obs VARCHAR(50),
    FOREIGN KEY (cli_num) REFERENCES clients(cli_num),
    PRIMARY KEY (com_num)
);

CREATE TABLE est_compose(
    com_num INT NOT NULL,
    pro_num INT NOT NULL,
    est_qte INT NOT NULL,
    FOREIGN KEY (com_num) REFERENCES commande(com_num),
    FOREIGN KEY (pro_num) REFERENCES produit(pro_num),
    PRIMARY KEY (com_num,pro_num)
);

CREATE INDEX index_cli_nom
ON clients(cli_nom);