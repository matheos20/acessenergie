<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624181319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE electricite (id INT AUTO_INCREMENT NOT NULL, electricite_id INT DEFAULT NULL, pdl1 INT DEFAULT NULL, pdl2 INT DEFAULT NULL, pdl3 INT DEFAULT NULL, pdl4 INT DEFAULT NULL, pdl5 INT DEFAULT NULL, pdl6 INT DEFAULT NULL, pdl7 INT DEFAULT NULL, pdl8 INT DEFAULT NULL, pdl9 INT DEFAULT NULL, pdl10 INT DEFAULT NULL, pdl11 INT DEFAULT NULL, pdl12 INT DEFAULT NULL, pdl13 INT DEFAULT NULL, pdl14 INT DEFAULT NULL, pdl15 INT DEFAULT NULL, pdl16 INT DEFAULT NULL, pdl17 INT DEFAULT NULL, pdl18 INT DEFAULT NULL, pdl19 INT DEFAULT NULL, pdl20 INT DEFAULT NULL, INDEX IDX_1BBEC072D61730D0 (electricite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE electricite ADD CONSTRAINT FK_1BBEC072D61730D0 FOREIGN KEY (electricite_id) REFERENCES electricite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE electricite DROP FOREIGN KEY FK_1BBEC072D61730D0');
        $this->addSql('DROP TABLE electricite');
    }
}
