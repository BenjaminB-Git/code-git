DELETE DATABASE IF EXISTS commandes;

CREATE DATABASE commandes;

USE commandes;


/** Client est remplacé par Client_site afin d'éviter les conflits **/
CREATE TABLE Client_site(
    N°Client COUNTER NOT NULL AUTO_INCREMENT,
    NomClient VARCHAR(50),
    PrenomClient VARCHAR(50),
    PRIMARY KEY (N°Client)
);

CREATE TABLE Article(
    N°Article COUNTER NOT NULL AUTO_INCREMENT,
    DesignationArticle VARCHAR(255),
    PUArticle DECIMAL(9,2),
    PRIMARY KEY (N°Article)
);

CREATE TABLE Commande(
    N°Commande COUNTER NOT NULL AUTO_INCREMENT,
    DateCommande DATE,
    MontantCommande DECIMAL(9,2),
    FOREIGN KEY (N°Client) REFERENCES Client_site(N°Client),
    PRIMARY KEY (N°Commande)
);

CREATE TABLE SeComposeDe(
    Qte INT,
    TauxTva DECIMAL(4,2),
    FOREIGN KEY (N°Article) REFERENCES Article (N°Article),
    FOREIGN KEY (N°Commande) REFERENCES Commande (N°Commande),
    PRIMARY KEY (N°Article, N°Commande)
);