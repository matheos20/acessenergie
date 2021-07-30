<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729121503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gaz CHANGE pce1 pce1 VARCHAR(255) NOT NULL, CHANGE pce2 pce2 VARCHAR(255) NOT NULL, CHANGE pce3 pce3 VARCHAR(255) NOT NULL, CHANGE pce4 pce4 VARCHAR(255) NOT NULL, CHANGE pce5 pce5 VARCHAR(255) NOT NULL, CHANGE pce6 pce6 VARCHAR(255) NOT NULL, CHANGE pce7 pce7 VARCHAR(255) NOT NULL, CHANGE pce8 pce8 VARCHAR(255) NOT NULL, CHANGE pce9 pce9 VARCHAR(255) NOT NULL, CHANGE pce10 pce10 VARCHAR(255) NOT NULL, CHANGE pce11 pce11 VARCHAR(255) NOT NULL, CHANGE pce12 pce12 VARCHAR(255) NOT NULL, CHANGE pce13 pce13 VARCHAR(255) NOT NULL, CHANGE pce14 pce14 VARCHAR(255) NOT NULL, CHANGE pce15 pce15 VARCHAR(255) NOT NULL, CHANGE pce16 pce16 VARCHAR(255) NOT NULL, CHANGE pce17 pce17 VARCHAR(255) NOT NULL, CHANGE pce18 pce18 VARCHAR(255) NOT NULL, CHANGE pce19 pce19 VARCHAR(255) NOT NULL, CHANGE pce20 pce20 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gaz CHANGE pce1 pce1 INT DEFAULT NULL, CHANGE pce2 pce2 INT DEFAULT NULL, CHANGE pce3 pce3 INT DEFAULT NULL, CHANGE pce4 pce4 INT DEFAULT NULL, CHANGE pce5 pce5 INT DEFAULT NULL, CHANGE pce6 pce6 INT DEFAULT NULL, CHANGE pce7 pce7 INT DEFAULT NULL, CHANGE pce8 pce8 INT DEFAULT NULL, CHANGE pce9 pce9 INT DEFAULT NULL, CHANGE pce10 pce10 INT DEFAULT NULL, CHANGE pce11 pce11 INT DEFAULT NULL, CHANGE pce12 pce12 INT DEFAULT NULL, CHANGE pce13 pce13 INT DEFAULT NULL, CHANGE pce14 pce14 INT DEFAULT NULL, CHANGE pce15 pce15 INT DEFAULT NULL, CHANGE pce16 pce16 INT DEFAULT NULL, CHANGE pce17 pce17 INT DEFAULT NULL, CHANGE pce18 pce18 INT DEFAULT NULL, CHANGE pce19 pce19 INT DEFAULT NULL, CHANGE pce20 pce20 INT DEFAULT NULL');
    }
}
