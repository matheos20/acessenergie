<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610101216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, recolte_donne_id INT DEFAULT NULL, raison_sociale VARCHAR(255) NOT NULL, siren VARCHAR(255) NOT NULL, adresse_du_siege_social VARCHAR(255) NOT NULL, nom_du_signature VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, adresse_mail VARCHAR(255) NOT NULL, INDEX IDX_C74404554D26ECED (recolte_donne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur_recolte (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteurs (id INT AUTO_INCREMENT NOT NULL, compteur_recolte_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_EDFAEB4B9CA7C175 (compteur_recolte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perimetre (id INT AUTO_INCREMENT NOT NULL, compteurs_id INT DEFAULT NULL, recolte_donne_id INT DEFAULT NULL, nom_du_permetre VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_C4DE1CD6FA6C96D9 (compteurs_id), INDEX IDX_C4DE1CD64D26ECED (recolte_donne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recolte_donne (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554D26ECED FOREIGN KEY (recolte_donne_id) REFERENCES recolte_donne (id)');
        $this->addSql('ALTER TABLE compteurs ADD CONSTRAINT FK_EDFAEB4B9CA7C175 FOREIGN KEY (compteur_recolte_id) REFERENCES compteur_recolte (id)');
        $this->addSql('ALTER TABLE perimetre ADD CONSTRAINT FK_C4DE1CD6FA6C96D9 FOREIGN KEY (compteurs_id) REFERENCES compteurs (id)');
        $this->addSql('ALTER TABLE perimetre ADD CONSTRAINT FK_C4DE1CD64D26ECED FOREIGN KEY (recolte_donne_id) REFERENCES recolte_donne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compteurs DROP FOREIGN KEY FK_EDFAEB4B9CA7C175');
        $this->addSql('ALTER TABLE perimetre DROP FOREIGN KEY FK_C4DE1CD6FA6C96D9');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554D26ECED');
        $this->addSql('ALTER TABLE perimetre DROP FOREIGN KEY FK_C4DE1CD64D26ECED');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compteur_recolte');
        $this->addSql('DROP TABLE compteurs');
        $this->addSql('DROP TABLE perimetre');
        $this->addSql('DROP TABLE recolte_donne');
    }
}
