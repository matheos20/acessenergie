<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210619052852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gaz (id INT AUTO_INCREMENT NOT NULL, pce1 INT NOT NULL, pce2 INT NOT NULL, pce3 INT NOT NULL, pce4 INT NOT NULL, pce5 INT NOT NULL, pce6 INT NOT NULL, pce7 INT NOT NULL, pce8 INT NOT NULL, pce9 INT NOT NULL, pce10 INT NOT NULL, pce11 INT NOT NULL, pce12 INT NOT NULL, pce13 INT NOT NULL, pce14 INT NOT NULL, pce15 INT NOT NULL, pce16 INT NOT NULL, pce17 INT NOT NULL, pce18 INT NOT NULL, pce19 INT NOT NULL, pce20 INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gaz');
    }
}
