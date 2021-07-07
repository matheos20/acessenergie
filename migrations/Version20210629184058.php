<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629184058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A00B42D7');
        $this->addSql('DROP INDEX IDX_C7440455A00B42D7 ON client');
        $this->addSql('ALTER TABLE client ADD valider TINYINT(1) DEFAULT NULL, DROP data_collection_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD data_collection_id INT DEFAULT NULL, DROP valider');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A00B42D7 FOREIGN KEY (data_collection_id) REFERENCES data_collection (id)');
        $this->addSql('CREATE INDEX IDX_C7440455A00B42D7 ON client (data_collection_id)');
    }
}
