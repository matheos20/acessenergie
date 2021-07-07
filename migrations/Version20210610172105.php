<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610172105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, data_collection_id INT DEFAULT NULL, social_reason VARCHAR(255) NOT NULL, mermaid VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, name_of_signatory VARCHAR(255) NOT NULL, function VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, INDEX IDX_C7440455A00B42D7 (data_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE counters (id INT AUTO_INCREMENT NOT NULL, counters_collection_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_45111491C2CBFC59 (counters_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE counters_collection (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_collection (id INT AUTO_INCREMENT NOT NULL, counters_collection_id INT DEFAULT NULL, INDEX IDX_33785FEBC2CBFC59 (counters_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perimeter (id INT AUTO_INCREMENT NOT NULL, counters_id INT DEFAULT NULL, data_collection_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_428E1D87DE8EE015 (counters_id), INDEX IDX_428E1D87A00B42D7 (data_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A00B42D7 FOREIGN KEY (data_collection_id) REFERENCES data_collection (id)');
        $this->addSql('ALTER TABLE counters ADD CONSTRAINT FK_45111491C2CBFC59 FOREIGN KEY (counters_collection_id) REFERENCES counters_collection (id)');
        $this->addSql('ALTER TABLE data_collection ADD CONSTRAINT FK_33785FEBC2CBFC59 FOREIGN KEY (counters_collection_id) REFERENCES counters_collection (id)');
        $this->addSql('ALTER TABLE perimeter ADD CONSTRAINT FK_428E1D87DE8EE015 FOREIGN KEY (counters_id) REFERENCES counters (id)');
        $this->addSql('ALTER TABLE perimeter ADD CONSTRAINT FK_428E1D87A00B42D7 FOREIGN KEY (data_collection_id) REFERENCES data_collection (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perimeter DROP FOREIGN KEY FK_428E1D87DE8EE015');
        $this->addSql('ALTER TABLE counters DROP FOREIGN KEY FK_45111491C2CBFC59');
        $this->addSql('ALTER TABLE data_collection DROP FOREIGN KEY FK_33785FEBC2CBFC59');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A00B42D7');
        $this->addSql('ALTER TABLE perimeter DROP FOREIGN KEY FK_428E1D87A00B42D7');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE counters');
        $this->addSql('DROP TABLE counters_collection');
        $this->addSql('DROP TABLE data_collection');
        $this->addSql('DROP TABLE perimeter');
    }
}
