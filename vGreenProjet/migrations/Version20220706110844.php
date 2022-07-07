<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706110844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, sous_categorie_id INT NOT NULL, fournisseur_id INT DEFAULT NULL, art_nom VARCHAR(255) NOT NULL, art_description LONGTEXT DEFAULT NULL, art_prix_ht NUMERIC(9, 2) NOT NULL, art_taux_tva NUMERIC(4, 2) NOT NULL, art_tva NUMERIC(9, 2) NOT NULL, art_prix_ttc NUMERIC(9, 2) NOT NULL, art_prix_fournisseur_ht NUMERIC(9, 2) NOT NULL, art_prix_fournisseur_ttc NUMERIC(9, 2) NOT NULL, art_stock INT DEFAULT NULL, art_photo VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E66365BF48 (sous_categorie_id), INDEX IDX_23A0E66670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, cat_nom VARCHAR(255) NOT NULL, cat_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, com_date_creation DATETIME NOT NULL, com_date_validation DATETIME DEFAULT NULL, com_statut VARCHAR(255) DEFAULT NULL, com_commentaire LONGTEXT DEFAULT NULL, com_adresse_facture VARCHAR(255) DEFAULT NULL, com_adresse_facture2 VARCHAR(255) DEFAULT NULL, com_adresse_facture3 VARCHAR(255) DEFAULT NULL, com_code_postal_facture VARCHAR(5) DEFAULT NULL, com_commune_facture VARCHAR(255) DEFAULT NULL, INDEX IDX_6EEAA67DFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, article_id INT NOT NULL, det_quantite INT NOT NULL, det_prix_ht NUMERIC(9, 2) NOT NULL, det_tva NUMERIC(4, 2) NOT NULL, det_prix_ttc NUMERIC(9, 2) NOT NULL, det_date_paiement DATETIME DEFAULT NULL, INDEX IDX_2E067F9382EA2E54 (commande_id), INDEX IDX_2E067F937294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, fou_nom VARCHAR(255) NOT NULL, fou_adresse VARCHAR(255) NOT NULL, fou_code_postal VARCHAR(5) NOT NULL, fou_commune VARCHAR(255) NOT NULL, fou_mail VARCHAR(255) DEFAULT NULL, fou_telephone VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, liv_date_creation DATETIME NOT NULL, liv_date_expedition DATETIME DEFAULT NULL, liv_date_livraison DATETIME DEFAULT NULL, liv_nom_destinataire VARCHAR(255) NOT NULL, liv_prenom_destinataire VARCHAR(255) NOT NULL, liv_adresse VARCHAR(255) NOT NULL, liv_adresse2 VARCHAR(255) DEFAULT NULL, liv_adresse3 VARCHAR(255) DEFAULT NULL, liv_code_postal VARCHAR(5) NOT NULL, liv_commune VARCHAR(255) NOT NULL, liv_quantite_article INT DEFAULT NULL, INDEX IDX_A60C9F1F82EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_categorie (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, sou_cat_nom VARCHAR(255) NOT NULL, sou_cat_image VARCHAR(255) DEFAULT NULL, INDEX IDX_52743D7BBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, typ_nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, uti_nom VARCHAR(255) NOT NULL, uti_prenom VARCHAR(255) NOT NULL, uti_date_naissance DATE NOT NULL, uti_adresse VARCHAR(255) NOT NULL, uti_adresse2 VARCHAR(255) DEFAULT NULL, uti_adresse3 VARCHAR(255) DEFAULT NULL, uti_code_postal VARCHAR(5) NOT NULL, uti_commune VARCHAR(255) NOT NULL, uti_mail VARCHAR(255) NOT NULL, uti_telephone_fixe VARCHAR(20) DEFAULT NULL, uti_telephone_mobile VARCHAR(20) DEFAULT NULL, INDEX IDX_1D1C63B3C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66365BF48 FOREIGN KEY (sous_categorie_id) REFERENCES sous_categorie (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9382EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F937294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE sous_categorie ADD CONSTRAINT FK_52743D7BBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F937294869C');
        $this->addSql('ALTER TABLE sous_categorie DROP FOREIGN KEY FK_52743D7BBCF5E72D');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F9382EA2E54');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F82EA2E54');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66670C757F');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66365BF48');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3C54C8C93');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFB88E14F');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE sous_categorie');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE utilisateur');
    }
}
