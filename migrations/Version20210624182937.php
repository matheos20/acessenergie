<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624182937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD electricite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455D61730D0 FOREIGN KEY (electricite_id) REFERENCES electricite (id)');
        $this->addSql('CREATE INDEX IDX_C7440455D61730D0 ON client (electricite_id)');
        $this->addSql('ALTER TABLE electricite DROP FOREIGN KEY FK_1BBEC072D61730D0');
        $this->addSql('DROP INDEX IDX_1BBEC072D61730D0 ON electricite');
        $this->addSql('ALTER TABLE electricite DROP electricite_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455D61730D0');
        $this->addSql('DROP INDEX IDX_C7440455D61730D0 ON client');
        $this->addSql('ALTER TABLE client DROP electricite_id');
        $this->addSql('ALTER TABLE electricite ADD electricite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE electricite ADD CONSTRAINT FK_1BBEC072D61730D0 FOREIGN KEY (electricite_id) REFERENCES electricite (id)');
        $this->addSql('CREATE INDEX IDX_1BBEC072D61730D0 ON electricite (electricite_id)');
    }
}
