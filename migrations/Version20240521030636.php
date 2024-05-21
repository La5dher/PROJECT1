<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521030636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD approuve TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE etudiant CHANGE nce nce INT DEFAULT NULL, CHANGE niveau niveau VARCHAR(255) DEFAULT NULL, CHANGE institut institut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD competence VARCHAR(255) DEFAULT NULL, ADD typeemploi VARCHAR(255) DEFAULT NULL, ADD lieutravail VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP approuve');
        $this->addSql('ALTER TABLE etudiant CHANGE nce nce INT NOT NULL, CHANGE niveau niveau VARCHAR(255) NOT NULL, CHANGE institut institut VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stage DROP competence, DROP typeemploi, DROP lieutravail');
    }
}
