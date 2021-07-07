<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210619055429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD gaz_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404559DE39C66 FOREIGN KEY (gaz_id) REFERENCES gaz (id)');
        $this->addSql('CREATE INDEX IDX_C74404559DE39C66 ON client (gaz_id)');
        $this->addSql('ALTER TABLE gaz CHANGE pce1 pce1 INT DEFAULT NULL, CHANGE pce2 pce2 INT DEFAULT NULL, CHANGE pce3 pce3 INT DEFAULT NULL, CHANGE pce4 pce4 INT DEFAULT NULL, CHANGE pce5 pce5 INT DEFAULT NULL, CHANGE pce6 pce6 INT DEFAULT NULL, CHANGE pce7 pce7 INT DEFAULT NULL, CHANGE pce8 pce8 INT DEFAULT NULL, CHANGE pce9 pce9 INT DEFAULT NULL, CHANGE pce10 pce10 INT DEFAULT NULL, CHANGE pce11 pce11 INT DEFAULT NULL, CHANGE pce12 pce12 INT DEFAULT NULL, CHANGE pce13 pce13 INT DEFAULT NULL, CHANGE pce14 pce14 INT DEFAULT NULL, CHANGE pce15 pce15 INT DEFAULT NULL, CHANGE pce16 pce16 INT DEFAULT NULL, CHANGE pce17 pce17 INT DEFAULT NULL, CHANGE pce18 pce18 INT DEFAULT NULL, CHANGE pce19 pce19 INT DEFAULT NULL, CHANGE pce20 pce20 INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404559DE39C66');
        $this->addSql('DROP INDEX IDX_C74404559DE39C66 ON client');
        $this->addSql('ALTER TABLE client DROP gaz_id');
        $this->addSql('ALTER TABLE gaz CHANGE pce1 pce1 INT NOT NULL, CHANGE pce2 pce2 INT NOT NULL, CHANGE pce3 pce3 INT NOT NULL, CHANGE pce4 pce4 INT NOT NULL, CHANGE pce5 pce5 INT NOT NULL, CHANGE pce6 pce6 INT NOT NULL, CHANGE pce7 pce7 INT NOT NULL, CHANGE pce8 pce8 INT NOT NULL, CHANGE pce9 pce9 INT NOT NULL, CHANGE pce10 pce10 INT NOT NULL, CHANGE pce11 pce11 INT NOT NULL, CHANGE pce12 pce12 INT NOT NULL, CHANGE pce13 pce13 INT NOT NULL, CHANGE pce14 pce14 INT NOT NULL, CHANGE pce15 pce15 INT NOT NULL, CHANGE pce16 pce16 INT NOT NULL, CHANGE pce17 pce17 INT NOT NULL, CHANGE pce18 pce18 INT NOT NULL, CHANGE pce19 pce19 INT NOT NULL, CHANGE pce20 pce20 INT NOT NULL');
    }
}
