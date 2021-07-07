<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624140528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE electricite_type (id INT AUTO_INCREMENT NOT NULL, pdl1 INT DEFAULT NULL, pdl2 INT DEFAULT NULL, pdl3 INT DEFAULT NULL, pdl4 INT DEFAULT NULL, pdl5 INT DEFAULT NULL, pdl6 INT DEFAULT NULL, pdl7 INT DEFAULT NULL, pdl8 INT DEFAULT NULL, pdl9 INT DEFAULT NULL, pdl10 INT DEFAULT NULL, pdl11 INT DEFAULT NULL, pdl12 INT DEFAULT NULL, pdl13 INT DEFAULT NULL, pdl14 INT DEFAULT NULL, pdl15 INT DEFAULT NULL, pdl16 INT DEFAULT NULL, pdl17 INT DEFAULT NULL, pdl18 INT DEFAULT NULL, pdl19 INT DEFAULT NULL, pdl20 INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE electrique (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD electrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045513032C85 FOREIGN KEY (electrique_id) REFERENCES electrique (id)');
        $this->addSql('CREATE INDEX IDX_C744045513032C85 ON client (electrique_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045513032C85');
        $this->addSql('DROP TABLE electricite_type');
        $this->addSql('DROP TABLE electrique');
        $this->addSql('DROP INDEX IDX_C744045513032C85 ON client');
        $this->addSql('ALTER TABLE client DROP electrique_id');
    }
}
